<?php

class Veta_ReciboHooks
{
	
	public function create_note_pre($bean)
    {
        if (!empty($bean->virtual_note)) {
            $bean->note = new Note();
            $bean->note->description = $bean->virtual_note;

            $bean->virtual_note = '';
        }
    }

    public function create_note_post($bean)
    {
        global $current_user;
        if (!empty($bean->note)) {

            $query = "SELECT veta_recibo_contactscontacts_ida as id 
            FROM  veta_recibo_contacts_c
            WHERE veta_recibo_contactsveta_recibo_idb = '" . $bean->id . "' AND deleted = 0";

            $result = $bean->db->query(
                $query,
                true,
                "Error obteniendo informacion del contacto asociado al Presupuesto " . $bean->id
            );

            $row    = $bean->db->fetchByAssoc($result);

            $bean->note->parent_type = 'Veta_Recibo';
            $bean->note->parent_id = $bean->id;
            $bean->note->assigned_user_id = $current_user->id;
            $now = date('Y-m-d H:i:s');
            $bean->note->name = "Nota $bean->name $now";
            $bean->note->contact_id = $row['id'];
            $bean->note->save();
        }
    }
	
	public function validate_transferred_billing($bean)
    {
        global $current_user;
		error_log("transferido Billing");
		if(!$bean->all_deposits_transferred_c){
			
			$requermimentos = $bean->get_linked_beans('veta_requerimiento_veta_recibo', 'Veta_Recibo');			
			$id_requermimiento = "";			
			foreach ($requermimentos as $req_pre) {
				$id_requermimiento = $req_pre->id;				
				error_log("transferido Requerimiento" . $id_requermimiento);
				
			}
			$req = new Veta_Requerimiento();
            $req->retrieve($id_requermimiento);
			
			error_log("transferido Billing id " . $req->veta_recibo_id_c);
			
			$old_billing = new Veta_Recibo();
            $old_billing->retrieve($req->veta_recibo_id_c);
			
			error_log("transferido Billing number " . $old_billing->name);
			
			
			
			
			$applicant_deposits       = $old_billing->get_linked_beans('veta_abono_veta_recibo', 'Veta_Abono');
			$applicant_payment_trasnferred = 0;

			$company_deposits = $old_billing->get_linked_beans('veta_recibo_nvc_deposit_company_1', 'NVC_Deposit_company');
			$company_payment_trasnferred = 0;
			
			
			global $db;

			foreach ($applicant_deposits as $ad) {
				$applicant_payment_trasnferred += $ad->monto * 1;

				if ($ad->transferred_amount_c > 0 && $ad->transferred_to_new_billing_c != 1) {
					error_log("transferido valor a transferir " . $ad->transferred_amount_c . " del abono " . $ad->name );

					// Preparar datos
					$nuevo_id = create_guid();
					$name = $db->quote($ad->name . '-1');
					$monto = floatval($ad->transferred_amount_c);
					$fecha = $ad->fetched_row['date_entered'];
					$usuario = $current_user->id;
					

					// 1. Insertar en veta_abono
					$sql_abono = "INSERT INTO veta_abono (
						id, name, monto, deleted,
						assigned_user_id, created_by, modified_user_id,
						date_entered, date_modified
					) VALUES (
						'{$nuevo_id}', '{$name}', {$monto}, 0,
						'{$usuario}', '{$usuario}', '{$usuario}',
						'{$fecha}', '{$fecha}'
					)";
					$db->query($sql_abono);
					error_log("transferido Insertado en veta_abono con ID {$nuevo_id}");
					error_log("transferido Insertado en veta_abono con ID {$sql_abono}");
					
					
					// 2. Insertar en veta_abono_cstm
					
					$ad->load_relationship('veta_abono_veta_recibo');
					$recibos = $ad->veta_abono_veta_recibo->getBeans();
					if (!empty($recibos)) {
						$id_recibo = array_key_first($recibos);						
					}					
					$sql_cstm = "INSERT INTO veta_abono_cstm (
						id_c, transferred_amount_c, veta_recibo_id_c, veta_abono_id_c
					) VALUES (
						'{$nuevo_id}', 0, '{$id_recibo}','{$ad->id}'
					)";
					$db->query($sql_cstm);
					error_log("transferido Insertado en veta_abono_cstm con ID {$nuevo_id}");
					error_log("transferido Insertado en veta_abono_cstm con ID {$sql_cstm}");

					// 3. Relacionar con el mismo recibo				
					$rel_id = create_guid();
					$rel_sql = "INSERT INTO veta_abono_veta_recibo_c (
						id, date_modified, deleted,
						veta_abono_veta_reciboveta_abono_idb,
						veta_abono_veta_reciboveta_recibo_ida
					) VALUES (
						'{$rel_id}', NOW(), 0, '{$nuevo_id}', '{$bean->id}'
					)";
					$db->query($rel_sql);
					error_log("transferido Relación creada con el recibo ID {$bean->id}");
					error_log("transferido Relación creada con el recibo ID {$rel_sql}");
					
					// 4. Marcar el abono original como transferido
					$sql_update_ad = "UPDATE veta_abono_cstm 
									  SET transferred_to_new_billing_c = 1 
									  WHERE id_c = '{$ad->id}'";
					$db->query($sql_update_ad);
					error_log("✅ Marcado el abono original {$ad->id} como transferido");
					
					// Guardar valor original y actualizar monto
					$original_monto = floatval($ad->monto);
					$nuevo_monto = $original_monto - floatval($ad->transferred_amount_c);

					// 1. Actualizar monto en la tabla principal
					$sql_update_monto_ad = "UPDATE veta_abono 
											SET monto = {$nuevo_monto}
											WHERE id = '{$ad->id}'";
					$db->query($sql_update_monto_ad);

					// 2. Guardar monto original en campo personalizado
					$sql_update_cstm_ad = "UPDATE veta_abono_cstm 
										   SET payment_amount_before_transfer_c = {$original_monto}
										   WHERE id_c = '{$ad->id}'";
					$db->query($sql_update_cstm_ad);

					error_log("✅ Actualizado monto en abono {$ad->id}, nuevo: {$nuevo_monto}, original guardado: {$original_monto}");
					
				}
			}			
			
			foreach ($company_deposits as $cd) {
				$company_payment_trasnferred += $cd->deposit_amount * 1;

				if ($cd->transferred_amount_c > 0 && $cd->transferred_to_new_billing_c != 1) {
					error_log("transferido valor a transferir " . $cd->transferred_amount_c . " del depósito empresa " . $cd->name);

					// Preparar datos
					$nuevo_id = create_guid();
					$name = $db->quote($cd->name . '-1');
					$monto = floatval($cd->transferred_amount_c);
					$fecha = $cd->fetched_row['date_entered'];
					$usuario = $current_user->id;

					// 1. Insertar en nvc_deposit_company
					$sql_company = "INSERT INTO nvc_deposit_company (
						id, name, deposit_amount, deleted,
						assigned_user_id, created_by, modified_user_id,
						date_entered, date_modified
					) VALUES (
						'{$nuevo_id}', '{$name}', {$monto}, 0,
						'{$usuario}', '{$usuario}', '{$usuario}',
						'{$fecha}', '{$fecha}'
					)";
					$db->query($sql_company);
					error_log("transferido Insertado en nvc_deposit_company con ID {$nuevo_id}");
					error_log("transferido SQL usado: {$sql_company}");

					// 2. Insertar en nvc_deposit_company_cstm
					$sql_company_cstm = "INSERT INTO nvc_deposit_company_cstm (
						id_c, transferred_amount_c, veta_recibo_id_c, nvc_deposit_company_id_c
					) VALUES (
						'{$nuevo_id}', 0, '{$bean->id}', '{$cd->id}'
					)";
					$db->query($sql_company_cstm);
					error_log("transferido Insertado en nvc_deposit_company_cstm con ID {$nuevo_id}");
					error_log("transferido SQL usado: {$sql_company_cstm}");

					// 3. Relacionar con el mismo recibo
					$rel_id = create_guid();
					$sql_relacion = "INSERT INTO veta_recibo_nvc_deposit_company_1_c (
						id, date_modified, deleted,
						veta_recibo_nvc_deposit_company_1veta_recibo_ida,
						veta_recibo_nvc_deposit_company_1nvc_deposit_company_idb
					) VALUES (
						'{$rel_id}', NOW(), 0, '{$bean->id}', '{$nuevo_id}'
					)";
					$db->query($sql_relacion);
					error_log("transferido Relación creada con el recibo ID {$bean->id}");
					error_log("transferido SQL usado: {$sql_relacion}");
					
					// 4. Marcar el depósito original como transferido
					$sql_update_cd = "UPDATE nvc_deposit_company_cstm 
									  SET transferred_to_new_billing_c = 1 
									  WHERE id_c = '{$cd->id}'";
					$db->query($sql_update_cd);
					error_log("✅ Marcado el depósito empresa original {$cd->id} como transferido");
					
					// Guardar valor original y actualizar deposit_amount
					$original_deposit = floatval($cd->deposit_amount);
					$nuevo_deposit = $original_deposit - floatval($cd->transferred_amount_c);

					// 1. Actualizar deposit_amount en la tabla principal
					$sql_update_monto_cd = "UPDATE nvc_deposit_company 
											SET deposit_amount = {$nuevo_deposit}
											WHERE id = '{$cd->id}'";
					$db->query($sql_update_monto_cd);

					// 2. Guardar deposit_amount original en campo personalizado
					$sql_update_cstm_cd = "UPDATE nvc_deposit_company_cstm 
										   SET payment_amount_before_transfer_c = {$original_deposit}
										   WHERE id_c = '{$cd->id}'";
					$db->query($sql_update_cstm_cd);

					error_log("✅ Actualizado depósito en empresa {$cd->id}, nuevo: {$nuevo_deposit}, original guardado: {$original_deposit}");

				}
			}
			
			
			/*
			$abono = new Veta_Abono();
			$abono->abono_c = ceil($data['checkout']['price']['unit_amount'] / 100);
			$abono->monedapago_c = $college->moneda_c;
			$abono->paid_to_c = 'Agencia';
			$abono->fecha_abono_c = $now;
			$abono->fecha_abono = $now;
			$abono->abono_validado_c = true;
			$abono->reciboId = $recibo->id;
			 
			$abono->save();
			$abono->load_relationship('veta_abono_veta_recibo');
			$abono->veta_abono_veta_recibo->add($recibo->id);
			*/
			
		}
		
		
		
		/*
        if (!empty($bean->note)) {

            $query = "SELECT veta_recibo_contactscontacts_ida as id 
            FROM  veta_recibo_contacts_c
            WHERE veta_recibo_contactsveta_recibo_idb = '" . $bean->id . "' AND deleted = 0";

            $result = $bean->db->query(
                $query,
                true,
                "Error obteniendo informacion del contacto asociado al Presupuesto " . $bean->id
            );

            $row    = $bean->db->fetchByAssoc($result);

            $bean->note->parent_type = 'Veta_Recibo';
            $bean->note->parent_id = $bean->id;
            $bean->note->assigned_user_id = $current_user->id;
            $now = date('Y-m-d H:i:s');
            $bean->note->name = "Nota $bean->name $now";
            $bean->note->contact_id = $row['id'];
            $bean->note->save();
        }
		*/
    }
}
