<?php

include_once('modules/ACLRoles/ACLRole.php');
require_once('modules/Veta_Recibo/Veta_Recibo.php');

if (! defined('sugarEntry') || ! sugarEntry) {
	die('Not A Valid Entry Point');
}

class SOELHooksRecibo
{

	function __construct() {}

	/*function establecer_condiciones_iniciales( Opportunity &$bean , $event , $arguments ) {

        if( empty( $bean->sales_stage ) ) {
            $p = new Contact();
            $p->retrieve( $_POST[ 'contacts_opportunities_1contacts_ida' ] );

            $bean->sales_stage = "Inicio";
            $bean->saldo_pendiente_pago_c = $bean->amount * 1;
            $bean->porcentaje_pago_c = 0;
            $bean->fecha_expiracion_visa_c = $p->fecha_expiracion_visa_c;

        }
    } */

	/*function verificar_rol( &$bean , $event , $arguments ) {
        global $current_user;
        $o = new Opportunity();
        $o->retrieve( $bean->id );

        if( $bean->estado_recoleccion_documento_c != $o->estado_recoleccion_documento_c ) {
            $objACLRole = new ACLRole();
            $roles = $objACLRole->getUserRoles( $current_user->id );

            if( ! in_array( 'Servicio al Cliente' , $roles ) ) {
                $msg = "No tiene privilegios suficientes para cambiar el estado de la recoleccion de documentos";
                $this->redireccionar( $msg , $bean->id );
                //exit;
            }
        }
    }*/

	/**
	 * Establece el consecutivo del presupuesto
	 */
	public function set_consecutivo(Opportunity &$o)
	{

		if (! isset($o->name) || empty($o->name)) {

			$result = $o->db->query('FLUSH TABLES WITH READ LOCK');
			//$query  = "SELECT COUNT(id) AS num from opportunities limit 1";
			$query  = "SELECT name as num FROM vetacrm2.opportunities order by date_entered desc limit 1";
			$result = $o->db->query($query, true, "Error obteniendo el consecutivo de la oportunidad");
			$row    = $o->db->fetchByAssoc($result);

			if ($row != null) {
				$o->name = intval($row['num']) + 1;
			}

			$o->db->query('UNLOCK TABLES');
		}
	}

	private function get_recibo(Opportunity $o)
	{

		$r = null;

		$recibos = $o->get_linked_beans('veta_recibo_opportunities', 'Veta_Recibo');

		foreach ($recibos as $rec) {
			$r = $rec;
		}

		return $r;
	}

	/**
	 * Este metodo obtiene una lista con las Aplicaciones relacionadas con la Oportunidad
	 *
	 * @param Opportunity $o
	 * @return Una lista de Aplicaciones
	 */
	private function get_aplicaciones(Opportunity $o)
	{

		return $o->get_linked_beans('veta_aplicacion_opportunities', 'Veta_Aplicacion');
	}

	/**
	 * Este metodo obtiene una lista con los Servicios al Cliente relacionados con la Oportunidad
	 *
	 * @param Opportunity $o
	 * @return Una lista de Servicios al Cliente
	 */
	private function get_servicios_cliente(Opportunity $o)
	{

		return $o->get_linked_beans('veta_serviciocliente_opportunities', 'Veta_ServicioCliente');
	}

	private function get_pendiente_pago_colegios(Opportunity $o)
	{

		$pendiente = null;
		$r         = $this->get_recibo($o);

		if ($r != null) {

			$pendiente = $r->gran_total * 1;
			$pagado    = 0;

			$aplicaciones = $o->get_linked_beans('veta_aplicacion_opportunities', 'Veta_Aplicacion');

			foreach ($aplicaciones as $a) {

				$loos = $a->get_linked_beans('veta_loo_veta_aplicacion', 'Veta_Loo');

				foreach ($loos as $loo) {

					$liquidaciones = $loo->get_linked_beans('veta_liquidacion_veta_loo', 'Veta_Liquidacion');

					foreach ($liquidaciones as $l) {
						$pagado += $l->total_pagado * 1;
					}
				}
			}

			$pendiente -= $pagado;
		}

		return $pendiente;
	}

	function pre_save(&$bean, $event, $arguments)
	{

		global $timedate;
		$r = new Veta_Recibo();
		//$r->retrieve( $_GET[ "rid" ] );
		$r->retrieve($bean->veta_recibo_opportunitiesveta_recibo_ida);

		if (! isset($r->id)) {
			$r = $this->get_recibo($bean);
		}

		$this->set_consecutivo($bean);

		if (isset($r)) {
			$p = $r->get_person();
		}

		if (isset($p)) {

			if (empty($bean->fecha_expiracion_visa_c)) {
				$bean->fecha_expiracion_visa_c = $timedate->to_db($p->fecha_expiracion_visa_c);
			}

			if (empty($bean->fecha_ultimo_contacto_c)) {
				$bean->fecha_ultimo_contacto_c = $timedate->to_db($p->fecha_ultimo_contacto_c);
			}

			if (empty($bean->fecha_proximo_contacto_c)) {
				$bean->fecha_proximo_contacto_c = $timedate->to_db($p->fecha_proximo_contacto_c);
			}

			if (empty($bean->fecha_viaje_c) and isset($p->fecha_viaje_2_c)) {
				$bean->fecha_viaje_c = $timedate->to_db_date($p->fecha_viaje_2_c);
			}

			if (empty($bean->lead_source) and isset($p->lead_source)) {
				$bean->lead_source = $p->lead_source;
			}

			if (empty($bean->campaign_id) and isset($p->campaign_id)) {
				$bean->campaign_id = $p->campaign_id;
			}
		}

		/*
        if ( isset( $r ) ) {		
			
			
			
			$pa = $r->get_primer_abono();
			$cpa = $r->get_company_first_payment();
			$sw = 0;
			$sw1 = 0;
			$sw0 = 0;
            if ( isset( $pa ) )
            {
				if ($r->pagado > 0)
				{
					error_log('ALFONSO - RECIBO - PAGO APLICANTE - DENTRO DE LA OPORTUNIDAD ' . $pa->date_entered);
					
					$bean->date_closed = $timedate->to_db_date( $pa->date_entered );					
					$bean->aplicant_1st_payment_date = $timedate->to_db_date( $pa->date_entered );
					$bean->closing_date_applicant_c = $timedate->to_db_date($pa->date_entered);
					$bean->fecha_cierre_c = $timedate->to_db_date( $pa->date_entered );
					$bean->aplicant_first_payment_amount = $pa->monto * 1;
					$sw0 = 1;
					if ( isset( $cpa ) ) {
						if ($timedate->to_db_date($pa->date_entered) > $timedate->to_db_date($cpa->date_entered)) {
							$bean->date_closed = $cpa->date_entered;
							$bean->date_closed = $timedate->to_db_date( $cpa->date_entered );
							$bean->fecha_cierre_c = $timedate->to_db_date( $cpa->date_entered );
							$sw = 1;
						}
					}  				
				}
				else {
					$bean->aplicant_first_payment_amount = 0;	
					$bean->closing_date_applicant_c = '';
					error_log('ALFONSO - NO EXISTE PAGO APLICANTE 1 ');	
				}
            }
			else {
				$bean->aplicant_first_payment_amount = 0;																					
				$bean->closing_date_applicant_c = '';
				error_log('ALFONSO - NO EXISTE PAGO APLICANTE 2 ');	
			}
            

            if ( isset( $cpa ) )
            {     
				if($r->company_paid_c > 0)
				{
					error_log('ALFONSO - RECIBO - PAGO COMPANIA - DENTRO DE LA OPORTUNIDAD ' . $timedate->to_db_date( $cpa->date_entered ));
					
					
					$bean->company_1st_payment_date = $timedate->to_db_date( $cpa->date_entered );					
					$bean->closing_date_company_c = $timedate->to_db_date( $cpa->date_entered );
					$bean->company_first_payment_amount =$cpa->deposit_amount * 1;	
					
					error_log('ALFONSO - RECIBO - PAGO COMPANIA - DENTRO DE LA OPORTUNIDAD - VALOR ' . $cpa->deposit_amount);
					
					
					if ($sw == 0) {
						$bean->date_closed = $cpa->date_entered;
						$bean->date_closed = $timedate->to_db_date( $cpa->date_entered );
						$bean->fecha_cierre_c = $timedate->to_db_date( $cpa->date_entered );
						$sw1 = 1;
					}
				}
				else {
					$bean->company_first_payment_amount = 0;	
					$bean->closing_date_company_c = '';	
					$bean->company_1st_payment_date = '';	
					error_log('ALFONSO - NO EXISTE PAGO COMPANIA 1 ');					
				}
            }
			else {
				$bean->company_first_payment_amount = 0;																					
				$bean->closing_date_company_c = '';
				$bean->company_1st_payment_date = '';	
				error_log('ALFONSO - NO EXISTE PAGO COMPANIA 2 ');					
			}
			
			if (($sw == 0) and ($sw1 == 0) and ($sw0 == 0)) {
				error_log('ALFONSO - NO EXISTE NINGUN PAGO ');					
				$bean->fecha_cierre_c = '';
				$bean->date_closed = '';
			}
        }
		*/


		/*
        if ( isset( $pa ) ) {

            $bean->fecha_cierre_c = $timedate->to_db($pa->date_entered);
            $bean->date_closed    = substr( $timedate->to_db($pa->date_entered) , 0 , 10 );
        }
		*/

		if ($this->es_descartado($bean)) {
			$bean->sales_stage = 'Descartado';
		}

		if (isset($this->estado_admisiones_c) && $this->estado_admisiones_c == 'COE_Guardado_Enviado') {
			$this->sales_stage = 'Finalizado';
		}

		if (isset($r->id)) {
			$bean->estado_cartera_c = $r->estado;
		}

		$bean->pendiente_pago_colegios_c = $this->get_pendiente_pago_colegios($bean);

		if (!empty($bean->date_closed)) {

			$bean->date_closed = $timedate->to_db($bean->date_closed);
		}

		global $current_user, $timedate;
		//if($current_user->id == 'c5da6f79-e3de-2d8f-f42b-60d6505f50c2'){
		if (($bean->reviewed_and_approved_c == 1) and ($bean->reviewed_and_approved_date_c == '')) {
			global $current_user, $timedate;
			$bean->reviewed_and_approved_date_c = $timedate->nowDb();
			$bean->user_id4_c = $current_user->id;
		} else if (($bean->reviewed_and_approved_c == 0) and ($bean->reviewed_and_approved_date_c != '')) {
			$bean->reviewed_and_approved_date_c = "";
			$bean->user_id4_c = "";
		}
		//}


	}

	private function es_descartado($bean)
	{

		$descartado = false;

		if (isset($bean->estado_cartera_c) && substr_count(
			strtolower($bean->estado_cartera_c),
			'descartad'
		) > 0) {
			$descartado = true;
		}

		if (isset($bean->estado_admisiones_c) && substr_count(
			strtolower($bean->estado_admisiones_c),
			'descartad'
		) > 0) {
			$descartado = true;
		}

		if (isset($bean->estado_servicio_al_cliente_c) && substr_count(
			strtolower($bean->estado_servicio_al_cliente_c),
			'descartad'
		) > 0) {
			$descartado = true;
		}

		if (isset($bean->estado_gestion_comercial_c) && substr_count(
			strtolower($bean->estado_gestion_comercial_c),
			'descartad'
		) > 0) {
			$descartado = true;
		}

		if (isset($bean->estado_pago_institucion_c) && substr_count(
			strtolower($bean->estado_pago_institucion_c),
			'descartad'
		) > 0) {
			$descartado = true;
		}

		if (isset($bean->estado_visas_c) && substr_count(strtolower($bean->estado_visas_c), 'descartad') > 0) {
			$descartado = true;
		}

		return $descartado;
	}

	function post_save(&$bean, $event, $arguments)
	{

		$r = new Veta_Recibo();
		$r->retrieve($_GET["rid"]);

		if ($r != null) {

			$p = $r->get_person();

			// Crear relacion con el prospecto o con el estudiante
			if (isset($p) && $p->module_name == "Leads") {

				$aux1 = $bean->load_relationship('leads_opportunities_1');
				$aux2 = $bean->leads_opportunities_1->add($p->id);
			}

			if (isset($p) && $p->module_name == "Contacts") {

				$bean->load_relationship('contacts_opportunities_1');
				$bean->contacts_opportunities_1->add($p->id);
			}

			if (empty($bean->fetched_rows)) {
				$this->relate_emails($bean);
			}
		}

		//error_log( "Alfonso ARRAY REQUEST ".print_r($_REQUEST, TRUE) );
		if ($_REQUEST["module"] == "Opportunities") {
			$this->update_visa($bean);


			$recibo = new Veta_Recibo();
			$recibo->retrieve($bean->veta_recibo_opportunitiesveta_recibo_ida);

			error_log("anszco recibo " . $recibo->name);

			$requerimientos = $recibo->get_linked_beans('veta_requerimiento_veta_recibo', 'Veta_Recibo');
			foreach ($requerimientos as $req) {
				error_log("anszco requerimiento " . $req->name);
				if ((isset($bean->ocupation)) and ($bean->ocupation != '') and ($bean->ocupation != $req->ocupation)) {
					$bean->db->query("UPDATE veta_requerimiento SET ocupation = '" . $bean->ocupation . "' WHERE id = '" . $req->id . "'");
				}
			}
		}
	}

	private function redireccionar($msg, $registro)
	{
		if (! empty($registro)) {
			$aux = "<script>
                      var registro='" . $registro . "';";

			$aux .= "alert('" . $msg . "');
                    window.location = 'index.php?module=Opportunities&action=DetailView&record=' + registro;
                 </script>";

			echo $aux;
		} else {
			echo "<script>alert('" . $msg . "')</script>";
		}

		exit;
	}

	/**
	 * Este metodo establece el estado del COE, LOO , Servicio al Cliente y Visa como descartado
	 *
	 * @param $bean Representa la oportunidad
	 * @param $event
	 * @param $arguments
	 */
	function pre_delete(&$bean, $event, $arguments)
	{

		$aplicaciones = $this->get_aplicaciones($bean);

		foreach ($aplicaciones as $a) {

			$a->descartar();
		}

		$servicios_cliente = $this->get_servicios_cliente($bean);

		foreach ($servicios_cliente as $sc) {

			$sc->descartar();
		}
	}

	private function update_visa(&$bean)
	{
		$visa = new Veta_Visa();
		$visa = $bean->get_linked_beans('veta_visa_opportunities', 'Veta_Visa');
		error_log("Alfonso - ENTRO A ESCRBIR EN LAS VISAS");
		foreach ($visa as $v) {
			if ($v->id != '') {
				$this_visa = $v->id;

				$query2 = "SELECT * FROM veta_visa_cstm where id_c = '" . $v->id . "'";

				$result2 = $bean->db->query(
					$query2,
					true,
					"Error obteniendo informacion del prospecto asociado al requerimiento " . $bean->id
				);
				$row2    = $bean->db->fetchByAssoc($result2);

				//error_log("Alfonso - Array query VETA VISA ". print_r($row2, TRUE) );


				$bean->db->query("UPDATE veta_visa SET fecha_req1 = '" . $bean->fecha_req1_c . "', fecha_req2 = '" . $bean->fecha_req2_c . "', fecha_req3 = '" . $bean->fecha_req3_c . "', fecha_exp_req1 = '" . $bean->fecha_exp_req1_c . "', fecha_exp_req2 = '" . $bean->fecha_exp_req2_c . "', fecha_exp_req3 = '" . $bean->fecha_exp_req3_c . "' WHERE id = '" . $v->id . "'");

				//error_log("Alfonso - query VETA VISA 1". $query);

				if ($row2 != null) {
					$bean->db->query("UPDATE veta_visa_cstm 
										SET 
											
											fecha_response_req1_c = '" . $bean->fecha_response_req1_c . "',
											fecha_response_req2_c = '" . $bean->fecha_response_req2_c . "',
											fecha_response_req3_c = '" . $bean->fecha_response_req3_c . "',
											fecha_response_req4_c = '" . $bean->fecha_response_req4_c . "',
											fecha_response_req5_c = '" . $bean->fecha_response_req5_c . "',
											
											fecha_req4_c = '" . $bean->fecha_req4_c . "',
											fecha_req5_c = '" . $bean->fecha_req5_c . "',
											
											fecha_exp_req4_c = '" . $bean->fecha_exp_req4_c . "',
											fecha_exp_req5_c = '" . $bean->fecha_exp_req5_c . "',
											
											rfi_name_1_c = '" . $bean->rfi_name_1_c . "',
											rfi_name_2_c = '" . $bean->rfi_name_2_c . "',
											rfi_name_3_c = '" . $bean->rfi_name_3_c . "',
											rfi_name_4_c = '" . $bean->rfi_name_4_c . "',
											rfi_name_5_c = '" . $bean->rfi_name_5_c . "',
											
											rfi_1_types_c = '" . $bean->rfi_1_types_c . "',
											rfi_2_types_c = '" . $bean->rfi_2_types_c . "',
											rfi_3_types_c = '" . $bean->rfi_3_types_c . "',
											rfi_4_types_c = '" . $bean->rfi_4_types_c . "',
											rfi_5_types_c = '" . $bean->rfi_5_types_c . "',
											
											nomination_app_date_c = '" . $bean->nomination_app_date_visa_c . "',
											nomination_app_expectation_date_c = '" . $bean->nomination_app_expectation_date_c . "',
											nomination_approval_date_c = '" . $bean->nomination_approval_date_c . "',
											skill_assessment_app_expectation_date_c = '" . $bean->skill_assessment_app_expectation_date_c . "',
											lmt_start_date_c = '" . $bean->lmt_start_date_c . "',
											lmt_expectation_date_c = '" . $bean->lmt_expectation_date_c . "',
											skill_assessment_app_date_c = '" . $bean->skill_assessment_app_date_visa_c . "',
											tas_application_date_c = '" . $bean->tas_application_date_c . "',
											tas_expectation_date_c = '" . $bean->tas_expectation_date_c . "',
											tas_approval_date_c = '" . $bean->tas_approval_date_c . "',
											eoi_application_date_c = '" . $bean->eoi_application_date_c . "',
											eoi_expectation_date_c = '" . $bean->eoi_expectation_date_c . "',
											eoi_appoval_date_c = '" . $bean->eoi_appoval_date_c . "',
											
											eoi_2_application_date_c = '" . $bean->eoi_2_application_date_c . "',
											eoi_2_expectation_date_c = '" . $bean->eoi_2_expectation_date_c . "',
											eoi_2_appoval_date_c = '" . $bean->eoi_2_appoval_date_c . "',
											eoi_3_application_date_c = '" . $bean->eoi_3_application_date_c . "',
											eoi_3_expectation_date_c = '" . $bean->eoi_3_expectation_date_c . "',											
											eoi_3_appoval_date_c = '" . $bean->eoi_3_appoval_date_c . "',
											
											rcb_application_date_c = '" . $bean->rcb_application_date_c . "',
											rcb_expectation_date_c = '" . $bean->rcb_expectation_date_c . "',
											rcb_approval_date_c = '" . $bean->rcb_approval_date_c . "',
											roi_application_date_c = '" . $bean->roi_application_date_c . "',
											roi_expectation_date_c = '" . $bean->roi_expectation_date_c . "',
											roi_approval_date_c = '" . $bean->roi_approval_date_c . "',
											
											roi_application_date_c = '" . $bean->roi_application_date_c . "',
											roi_expectation_date_c = '" . $bean->roi_expectation_date_c . "',
											roi_approval_date_c = '" . $bean->roi_approval_date_c . "',
											
											state_nomination_application_date_c = '" . $this->state_nomination_application_date_c . "',
											state_nomination_expectation_date_c = '" . $this->state_nomination_expectation_date_c . "',
											state_nomination_approval_date_c = '" . $this->state_nomination_approval_date_c . "',
											
											recruitment_expectation_date_c = '" . $bean->recruitment_expectation_date_c . "',
											visa_expectation_date_c = '" . $bean->visa_expectation_date_c . "'
											
										WHERE 
											id_c = '" . $v->id . "'");
				} else {
					$bean->db->query("INSERT INTO veta_visa_cstm 
											(id_c, 
											fecha_response_req1_c, 
											fecha_response_req2_c, 
											fecha_response_req3_c,
											fecha_response_req4_c,
											fecha_response_req5_c,
											
											fecha_req4_c,
											fecha_req5_c,
											
											fecha_exp_req4_c,
											fecha_exp_req5_c,
											
											rfi_name_1_c, 
											rfi_name_2_c, 
											rfi_name_3_c,
											rfi_name_4_c,
											rfi_name_5_c,
											
											rfi_1_types_c,
											rfi_2_types_c,
											rfi_3_types_c,
											rfi_4_types_c,
											rfi_5_types_c,

											nomination_app_date_c,
											nomination_app_expectation_date_c,
											nomination_approval_date_c,
											skill_assessment_app_expectation_date_c,
											lmt_start_date_c,
											lmt_expectation_date_c,
											skill_assessment_app_date_c,
											tas_application_date_c,
											tas_expectation_date_c,
											tas_approval_date_c,
											
											eoi_application_date_c,
											eoi_expectation_date_c,
											eoi_appoval_date_c,											
											
											eoi_2_application_date_c,
											eoi_2_expectation_date_c,
											eoi_2_appoval_date_c,											
											eoi_3_application_date_c,
											eoi_3_expectation_date_c,
											eoi_3_appoval_date_c,											
											
											rcb_application_date_c,
											rcb_expectation_date_c,
											rcb_approval_date_c,
											roi_application_date_c,
											roi_expectation_date_c,
											roi_approval_date_c,
											recruitment_expectation_date_c,
											visa_expectation_date_c
											) 
										VALUES 
											('" . $v->id . "', 
											'" . ($v->fecha_response_req1_c) . "',
											'" . ($v->fecha_response_req2_c) . "',
											'" . ($v->fecha_response_req3_c) . "',
											'" . ($v->fecha_response_req4_c) . "',
											'" . ($v->fecha_response_req5_c) . "',
											
											'" . ($v->fecha_req4_c) . "',
											'" . ($v->fecha_req5_c) . "',
											
											'" . ($v->fecha_exp_req4_c) . "',											
											'" . ($v->fecha_exp_req5_c) . "',

											'" . ($v->rfi_name_1_c) . "',
											'" . ($v->rfi_name_2_c) . "',
											'" . ($v->rfi_name_3_c) . "',
											'" . ($v->rfi_name_4_c) . "',
											'" . ($v->rfi_name_5_c) . "',											
											
											'" . ($v->rfi_1_types_c) . "',
											'" . ($v->rfi_2_types_c) . "',
											'" . ($v->rfi_3_types_c) . "',
											'" . ($v->rfi_4_types_c) . "',
											'" . ($v->rfi_5_types_c) . "',
											
											'" . ($v->nomination_app_date_visa_c) . "',
											'" . ($v->nomination_app_expectation_date_c) . "',
											'" . ($v->nomination_approval_date_c) . "',
											'" . ($v->skill_assessment_app_expectation_date_c) . "',
											'" . ($v->lmt_start_date_c) . "',
											'" . ($v->lmt_expectation_date_c) . "',
											'" . ($v->skill_assessment_app_date_visa_c) . "',
											'" . ($v->tas_application_date_c) . "',
											'" . ($v->tas_expectation_date_c) . "',
											'" . ($v->tas_approval_date_c) . "',
											'" . ($v->eoi_application_date_c) . "',
											'" . ($v->eoi_expectation_date_c) . "',
											'" . ($v->eoi_appoval_date_c) . "',
											
											'" . ($v->eoi_2_application_date_c) . "',
											'" . ($v->eoi_2_expectation_date_c) . "',
											'" . ($v->eoi_2_appoval_date_c) . "',
											'" . ($v->eoi_3_application_date_c) . "',
											'" . ($v->eoi_3_expectation_date_c) . "',
											'" . ($v->eoi_3_appoval_date_c) . "',
											
											'" . ($v->rcb_application_date_c) . "',
											'" . ($v->rcb_expectation_date_c) . "',
											'" . ($v->rcb_approval_date_c) . "',
											'" . ($v->roi_application_date_c) . "',
											'" . ($v->roi_expectation_date_c) . "',
											'" . ($v->roi_approval_date_c) . "',
											'" . ($v->recruitment_expectation_date_c) . "',
											'" . ($v->visa_expectation_date_c) . "')");
				}





				//$v->fecha_req1 = $bean->fecha_req1_c;
				//$v->save();
			}
		}
	}

	private function relate_emails($bean)
	{
		$recibo = $bean->get_linked_beans('veta_recibo_opportunities')[0];
		if (empty($recibo)) return;

		$requerimiento = $recibo->get_linked_beans('veta_requerimiento_veta_recibo')[0];
		if (empty($requerimiento)) return;
		
		$lead = $requerimiento->get_linked_beans('veta_requerimiento_leads')[0];
		if (empty($lead)) return;

		$query = "SELECT * 
				FROM emails 
				WHERE (parent_type,parent_id) IN (
					('Veta_Recibo','$recibo->id'),
					('Veta_Requerimiento','$requerimiento->id')
				)
				AND deleted = 0";

		$result = $bean->db->query($query, true, "Error $bean->id");
		while ($row = $bean->db->fetchByAssoc($result)) {

			$bean->load_relationship('emails');
			$bean->emails->add($row['id']);
		}
	}
}

class addTotalOpportunities
{
	protected static $valorAPagarEmpresa = 0;
	protected static $empresaValorAPagar = 0;
	protected static $totalPagar = 0;
	protected static $totalPagado = 0;
	protected static $empresaPrimerPago = 0;

	protected static $aplicant_first_payment_amount = 0;
	protected static $company_first_payment_amount = 0;
	protected static $aplicant_mmm_fee = 0;
	protected static $aplicant_departments_visa_fee = 0;

	protected static $outstanding_amount = 0;
	protected static $deposit = 0;
	protected static $department_credit_card_surcharge_percentage = 0;
	protected static $monto_dolares_australianos_c = 0;
	protected static $department_visa_fee_base_application_charge = 0;
	protected static $insurance_value = 0;
	protected static $consultation_fee = 0;
	protected static $gst_percentage = 0;
	protected static $total_without_gst = 0;
	protected static $discount = 0;

	protected static $company_deposits_c = 0;
	protected static $company_dept_cc_surcharge_c = 0;
	protected static $company_dept_visa_fee_base_c = 0;
	protected static $company_discount_c = 0;
	protected static $company_gst_c = 0;
	protected static $company_outstanding_amount_c = 0;
	protected static $company_total_c = 0;
	protected static $company_total_without_gst_c = 0;

	protected static $applicant_company_total_c = 0;
	protected static $applicant_company_total_paid_c = 0;
	protected static $applicant_company_outstanding_amount_c = 0;
	protected static $total_skill_assessmente_applicant_company_c = 0;
	protected static $applicant_company_department_credit_card_surcharge_c = 0;
	protected static $applicant_company_departments_visa_fee_c = 0;
	protected static $applicant_company_gst_c = 0;
	protected static $applicant_company_total_without_gst_c = 0;
	protected static $applicant_company_department_visa_fee_base_application_charge_c = 0;
	protected static $aplicant_company_mmm_fees = 0;

	protected static $applicant_company_total_mmm_fees_paid_c = 0;
	protected static $applicant_company_mmm_fees_outstanding_amount_c = 0;



	protected static $first_quarter_mmm_fees_paid_c = 0;
	protected static $first_quarter_mmm_fees_paid_applicant_c = 0;
	protected static $first_quarter_mmm_fees_paid_company_c = 0;
	protected static $first_quarter_mmm_fees_outstanding_amount_c = 0;

	protected static $second_quarter_mmm_fees_paid_c = 0;
	protected static $second_quarter_mmm_fees_paid_applicant_c = 0;
	protected static $second_quarter_mmm_fees_paid_company_c = 0;
	protected static $second_quarter_mmm_fees_outstanding_amount_c = 0;

	protected static $third_quarter_mmm_fees_paid_c = 0;
	protected static $third_quarter_mmm_fees_paid_applicant_c = 0;
	protected static $third_quarter_mmm_fees_paid_company_c = 0;
	protected static $third_quarter_mmm_fees_outstanding_amount_c = 0;



	//applicant_company_total_mmm_fees_paid_c
	//applicant_company_mmm_fees_outstanding_amount_c

	//applicant_company_total_without_gst_c
	//applicant_company_total_paid_c

	/*
	function console_log( $data ){
	  echo '<script>';
	  echo 'console.log('. json_encode( $data ) .')';
	  echo '</script>';
	}	
	*/

	function stepOne(&$focus, $event, $arguments)
	{

		$focus->custom_fields->retrieve();
		if ((isset($focus->company_mmm_fee)) and ($focus->company_mmm_fee != ''))
			self::$valorAPagarEmpresa += ($focus->company_mmm_fee * 1);
		if ((isset($focus->aplicant_company_mmm)) and ($focus->aplicant_company_mmm != ''))
			self::$empresaValorAPagar += ($focus->aplicant_company_mmm * 1);
		if ((isset($focus->total)) and ($focus->total != ''))
			self::$totalPagar += ($focus->total * 1);
		if ((isset($focus->total_paid)) and ($focus->total_paid != ''))
			self::$totalPagado += ($focus->total_paid * 1);
		if ((isset($focus->aplicant_first_payment_amount)) and ($focus->aplicant_first_payment_amount != ''))
			self::$aplicant_first_payment_amount += ($focus->aplicant_first_payment_amount * 1);
		if ((isset($focus->company_first_payment_amount)) and ($focus->company_first_payment_amount != ''))
			self::$company_first_payment_amount += ($focus->company_first_payment_amount * 1);


		if ((isset($focus->aplicant_mmm_fee)) and ($focus->aplicant_mmm_fee != ''))
			self::$aplicant_mmm_fee += ($focus->aplicant_mmm_fee * 1);
		if ((isset($focus->aplicant_departments_visa_fee)) and ($focus->aplicant_departments_visa_fee != ''))
			self::$aplicant_departments_visa_fee += ($focus->aplicant_departments_visa_fee * 1);
		if ((isset($focus->outstanding_amount)) and ($focus->outstanding_amount != ''))
			self::$outstanding_amount += ($focus->outstanding_amount * 1);
		if ((isset($focus->deposit)) and ($focus->deposit != ''))
			self::$deposit += ($focus->deposit * 1);
		if ((isset($focus->department_credit_card_surcharge_percentage)) and ($focus->department_credit_card_surcharge_percentage != ''))
			self::$department_credit_card_surcharge_percentage += ($focus->department_credit_card_surcharge_percentage * 1);
		if ((isset($focus->monto_dolares_australianos_c)) and ($focus->monto_dolares_australianos_c != ''))
			self::$monto_dolares_australianos_c += ($focus->monto_dolares_australianos_c * 1);
		if ((isset($focus->department_visa_fee_base_application_charge)) and ($focus->department_visa_fee_base_application_charge != ''))
			self::$department_visa_fee_base_application_charge += ($focus->department_visa_fee_base_application_charge * 1);
		if ((isset($focus->insurance_value)) and ($focus->insurance_value != ''))
			self::$insurance_value += ($focus->insurance_value * 1);
		if ((isset($focus->consultation_fee)) and ($focus->consultation_fee != ''))
			self::$consultation_fee += ($focus->consultation_fee * 1);
		if ((isset($focus->gst_percentage)) and ($focus->gst_percentage != ''))
			self::$gst_percentage += ($focus->gst_percentage * 1);
		if ((isset($focus->total_without_gst)) and ($focus->total_without_gst != ''))
			self::$total_without_gst += ($focus->total_without_gst * 1);
		if ((isset($focus->discount)) and ($focus->discount != ''))
			self::$discount += ($focus->discount * 1);

		self::$company_deposits_c += ($focus->company_deposits_c * 1);
		self::$company_dept_cc_surcharge_c += ($focus->company_dept_cc_surcharge_c * 1);
		self::$company_dept_visa_fee_base_c += ($focus->company_dept_visa_fee_base_c * 1);
		self::$company_discount_c += ($focus->company_discount_c * 1);
		self::$company_gst_c += ($focus->company_gst_c * 1);
		self::$company_outstanding_amount_c += ($focus->company_outstanding_amount_c * 1);
		self::$company_total_c += ($focus->company_total_c * 1);
		self::$company_total_without_gst_c += ($focus->company_total_without_gst_c * 1);

		self::$total_skill_assessmente_applicant_company_c += ($focus->total_skill_assessmente_applicant_company_c * 1);
		self::$applicant_company_department_credit_card_surcharge_c += ($focus->applicant_company_department_credit_card_surcharge_c * 1);
		self::$applicant_company_departments_visa_fee_c += ($focus->applicant_company_departments_visa_fee_c * 1);
		self::$applicant_company_gst_c += ($focus->applicant_company_gst_c * 1);
		self::$applicant_company_total_without_gst_c += ($focus->applicant_company_total_without_gst_c * 1);
		self::$applicant_company_department_visa_fee_base_application_charge_c += ($focus->applicant_company_department_visa_fee_base_application_charge_c * 1);

		if ((isset($focus->aplicant_company_mmm_fees)) and ($focus->aplicant_company_mmm_fees != ''))
			self::$aplicant_company_mmm_fees += ($focus->aplicant_company_mmm_fees * 1);

		self::$applicant_company_total_c += ($focus->applicant_company_total_c  * 1);
		self::$applicant_company_total_paid_c += ($focus->applicant_company_total_paid_c * 1);
		self::$applicant_company_outstanding_amount_c += ($focus->applicant_company_outstanding_amount_c * 1);

		self::$applicant_company_total_mmm_fees_paid_c += ($focus->applicant_company_total_mmm_fees_paid_c * 1);
		self::$applicant_company_mmm_fees_outstanding_amount_c += ($focus->applicant_company_mmm_fees_outstanding_amount_c * 1);
		/*
			$this->console_log( "outstanding " . $focus->applicant_company_mmm_fees_outstanding_amount_c ); // [1,2,3]
			$this->console_log( "Paid " . $focus->applicant_company_total_mmm_fees_paid_c ); // [1,2,3]
			
			$this->console_log( "total outstanding " . self::$applicant_company_mmm_fees_outstanding_amount_c ); // [1,2,3]
			$this->console_log( "total Paid " . self::$applicant_company_total_mmm_fees_paid_c ); // [1,2,3]
			*/



		if ((isset($focus->first_quarter_mmm_fees_paid_c)) and ($focus->first_quarter_mmm_fees_paid_c != ''))
			self::$first_quarter_mmm_fees_paid_c += ($focus->first_quarter_mmm_fees_paid_c * 1);
		if ((isset($focus->first_quarter_mmm_fees_paid_applicant_c)) and ($focus->first_quarter_mmm_fees_paid_applicant_c != ''))
			self::$first_quarter_mmm_fees_paid_applicant_c += ($focus->first_quarter_mmm_fees_paid_applicant_c * 1);
		if ((isset($focus->first_quarter_mmm_fees_paid_company_c)) and ($focus->first_quarter_mmm_fees_paid_company_c != ''))
			self::$first_quarter_mmm_fees_paid_company_c += ($focus->first_quarter_mmm_fees_paid_company_c * 1);
		if ((isset($focus->first_quarter_mmm_fees_outstanding_amount_c)) and ($focus->first_quarter_mmm_fees_outstanding_amount_c != ''))
			self::$first_quarter_mmm_fees_outstanding_amount_c += ($focus->first_quarter_mmm_fees_outstanding_amount_c * 1);


		if ((isset($focus->second_quarter_mmm_fees_paid_c)) and ($focus->second_quarter_mmm_fees_paid_c != ''))
			self::$second_quarter_mmm_fees_paid_c += ($focus->second_quarter_mmm_fees_paid_c * 1);
		if ((isset($focus->second_quarter_mmm_fees_paid_applicant_c)) and ($focus->second_quarter_mmm_fees_paid_applicant_c != ''))
			self::$second_quarter_mmm_fees_paid_applicant_c += ($focus->second_quarter_mmm_fees_paid_applicant_c * 1);
		if ((isset($focus->second_quarter_mmm_fees_paid_company_c)) and ($focus->second_quarter_mmm_fees_paid_company_c != ''))
			self::$second_quarter_mmm_fees_paid_company_c += ($focus->second_quarter_mmm_fees_paid_company_c * 1);
		if ((isset($focus->second_quarter_mmm_fees_outstanding_amount_c)) and ($focus->second_quarter_mmm_fees_outstanding_amount_c != ''))
			self::$second_quarter_mmm_fees_outstanding_amount_c += ($focus->second_quarter_mmm_fees_outstanding_amount_c * 1);

		if ((isset($focus->third_quarter_mmm_fees_paid_c)) and ($focus->third_quarter_mmm_fees_paid_c != ''))
			self::$third_quarter_mmm_fees_paid_c += ($focus->third_quarter_mmm_fees_paid_c * 1);
		if ((isset($focus->third_quarter_mmm_fees_paid_applicant_c)) and ($focus->third_quarter_mmm_fees_paid_applicant_c != ''))
			self::$third_quarter_mmm_fees_paid_applicant_c += ($focus->third_quarter_mmm_fees_paid_applicant_c * 1);
		if ((isset($focus->third_quarter_mmm_fees_paid_company_c)) and ($focus->third_quarter_mmm_fees_paid_company_c != ''))
			self::$third_quarter_mmm_fees_paid_company_c += ($focus->third_quarter_mmm_fees_paid_company_c * 1);
		if ((isset($focus->third_quarter_mmm_fees_outstanding_amount_c)) and ($focus->third_quarter_mmm_fees_outstanding_amount_c != ''))
			self::$third_quarter_mmm_fees_outstanding_amount_c += ($focus->third_quarter_mmm_fees_outstanding_amount_c * 1);
	}

	function stepTwo($event, $arguments)
	{
		if ($GLOBALS['action'] == 'index' || $GLOBALS['action'] == 'ListView') {
			$valorAPagarEmpresa = self::$valorAPagarEmpresa;
			$empresaValorAPagar = self::$empresaValorAPagar;
			$totalPagar = self::$totalPagar;
			$totalPagado = self::$totalPagado;
			$deposit = self::$deposit;

			$outstanding_amount = self::$outstanding_amount;
			$company_first_payment_amount = self::$company_first_payment_amount;
			$aplicant_mmm_fee = self::$aplicant_mmm_fee;
			$aplicant_departments_visa_fee = self::$aplicant_departments_visa_fee;

			$department_credit_card_surcharge_percentage = self::$department_credit_card_surcharge_percentage;
			$monto_dolares_australianos_c = self::$monto_dolares_australianos_c;
			$department_visa_fee_base_application_charge = self::$department_visa_fee_base_application_charge;
			$insurance_value = self::$insurance_value;
			$consultation_fee = self::$consultation_fee;
			$gst_percentage = self::$gst_percentage;
			$total_without_gst = self::$total_without_gst;
			$discount = self::$discount;

			$company_deposits_c = self::$company_deposits_c;
			$company_dept_cc_surcharge_c = self::$company_dept_cc_surcharge_c;
			$company_dept_visa_fee_base_c = self::$company_dept_visa_fee_base_c;
			$company_discount_c = self::$company_discount_c;
			$company_gst_c = self::$company_gst_c;
			$company_outstanding_amount_c = self::$company_outstanding_amount_c;
			$company_total_c = self::$company_total_c;
			$company_total_without_gst_c = self::$company_total_without_gst_c;

			$applicant_company_total_c = self::$applicant_company_total_c;





			$applicant_company_total_paid_c = self::$applicant_company_total_paid_c;
			$applicant_company_outstanding_amount_c = self::$applicant_company_outstanding_amount_c;
			$total_skill_assessmente_applicant_company_c = self::$total_skill_assessmente_applicant_company_c;
			$applicant_company_department_credit_card_surcharge_c = self::$applicant_company_department_credit_card_surcharge_c;
			$applicant_company_departments_visa_fee_c = self::$applicant_company_departments_visa_fee_c;
			$applicant_company_gst_c = self::$applicant_company_gst_c;
			$applicant_company_total_without_gst_c = self::$applicant_company_total_without_gst_c;
			$applicant_company_department_visa_fee_base_application_charge_c = self::$applicant_company_department_visa_fee_base_application_charge_c;
			$aplicant_company_mmm_fees = self::$aplicant_company_mmm_fees;

			$applicant_company_mmm_fees_outstanding_amount_c = self::$applicant_company_mmm_fees_outstanding_amount_c;
			$applicant_company_total_mmm_fees_paid_c = self::$applicant_company_total_mmm_fees_paid_c;







			$first_quarter_mmm_fees_paid_c = self::$first_quarter_mmm_fees_paid_c;
			$first_quarter_mmm_fees_paid_applicant_c = self::$first_quarter_mmm_fees_paid_applicant_c;
			$first_quarter_mmm_fees_paid_company_c = self::$first_quarter_mmm_fees_paid_company_c;
			$first_quarter_mmm_fees_outstanding_amount_c = self::$first_quarter_mmm_fees_outstanding_amount_c;

			$second_quarter_mmm_fees_paid_c = self::$second_quarter_mmm_fees_paid_c;
			$second_quarter_mmm_fees_paid_applicant_c = self::$second_quarter_mmm_fees_paid_applicant_c;
			$second_quarter_mmm_fees_paid_company_c = self::$second_quarter_mmm_fees_paid_company_c;
			$second_quarter_mmm_fees_outstanding_amount_c = self::$second_quarter_mmm_fees_outstanding_amount_c;

			$third_quarter_mmm_fees_paid_c = self::$third_quarter_mmm_fees_paid_c;
			$third_quarter_mmm_fees_paid_applicant_c = self::$third_quarter_mmm_fees_paid_applicant_c;
			$third_quarter_mmm_fees_paid_company_c = self::$third_quarter_mmm_fees_paid_company_c;
			$third_quarter_mmm_fees_outstanding_amount_c = self::$third_quarter_mmm_fees_outstanding_amount_c;










			$aplicant_company_mmm_fees = number_format($aplicant_company_mmm_fees, 2, ',', '.');
			$applicant_company_department_visa_fee_base_application_charge_c = number_format($applicant_company_department_visa_fee_base_application_charge_c, 2, ',', '.');
			$applicant_company_total_without_gst_c = number_format($applicant_company_total_without_gst_c, 2, ',', '.');
			$applicant_company_gst_c = number_format($applicant_company_gst_c, 2, ',', '.');
			$applicant_company_departments_visa_fee_c = number_format($applicant_company_departments_visa_fee_c, 2, ',', '.');
			$applicant_company_department_credit_card_surcharge_c = number_format($applicant_company_department_credit_card_surcharge_c, 2, ',', '.');
			$total_skill_assessmente_applicant_company_c = number_format($total_skill_assessmente_applicant_company_c, 2, ',', '.');
			$applicant_company_outstanding_amount_c = number_format($applicant_company_outstanding_amount_c, 2, ',', '.');
			$applicant_company_total_paid_c = number_format($applicant_company_total_paid_c, 2, ',', '.');
			$applicant_company_total_c = number_format($applicant_company_total_c, 2, ',', '.');

			$applicant_company_total_mmm_fees_paid_c = number_format($applicant_company_total_mmm_fees_paid_c, 2, ',', '.');
			$applicant_company_mmm_fees_outstanding_amount_c = number_format($applicant_company_mmm_fees_outstanding_amount_c, 2, ',', '.');



			$first_quarter_mmm_fees_paid_c = number_format($first_quarter_mmm_fees_paid_c, 2, ',', '.');
			$first_quarter_mmm_fees_paid_applicant_c = number_format($first_quarter_mmm_fees_paid_applicant_c, 2, ',', '.');
			$first_quarter_mmm_fees_paid_company_c = number_format($first_quarter_mmm_fees_paid_company_c, 2, ',', '.');
			$first_quarter_mmm_fees_outstanding_amount_c = number_format($first_quarter_mmm_fees_outstanding_amount_c, 2, ',', '.');

			$second_quarter_mmm_fees_paid_c = number_format($second_quarter_mmm_fees_paid_c, 2, ',', '.');
			$second_quarter_mmm_fees_paid_applicant_c = number_format($second_quarter_mmm_fees_paid_applicant_c, 2, ',', '.');
			$second_quarter_mmm_fees_paid_company_c = number_format($second_quarter_mmm_fees_paid_company_c, 2, ',', '.');
			$second_quarter_mmm_fees_outstanding_amount_c = number_format($second_quarter_mmm_fees_outstanding_amount_c, 2, ',', '.');

			$third_quarter_mmm_fees_paid_c = number_format($third_quarter_mmm_fees_paid_c, 2, ',', '.');
			$third_quarter_mmm_fees_paid_applicant_c = number_format($third_quarter_mmm_fees_paid_applicant_c, 2, ',', '.');
			$third_quarter_mmm_fees_paid_company_c = number_format($third_quarter_mmm_fees_paid_company_c, 2, ',', '.');
			$third_quarter_mmm_fees_outstanding_amount_c = number_format($third_quarter_mmm_fees_outstanding_amount_c, 2, ',', '.');






			global $current_user;
			//error_log( print_r($current_user->user_department_c, TRUE) );
			if ($current_user->user_department_c != 'Customer_service') {

				echo <<<EOHTML
<script type="text/javascript">
$('<td nowrap="nowrap" align="center" class="paginationChangeButtons"><b>Applicant/Company MMM fee without GST: {$applicant_company_total_without_gst_c}</b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons"><b>Applicant/Company GST: {$applicant_company_gst_c}</b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons"><b>Applicant/Company Department Fee: {$applicant_company_departments_visa_fee_c}</b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons"><b>Applicant/Company Department CC Surcharge: {$applicant_company_department_credit_card_surcharge_c}</b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons"><b>Applicant/Company Department Department Fee Base Application Charge: {$applicant_company_department_visa_fee_base_application_charge_c}</b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons"><b>Applicant/Company Skill Assessment: {$total_skill_assessmente_applicant_company_c}</b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons"><b>Applicant/Company Total to Pay: {$applicant_company_total_c}</b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons"><b>Applicant/Company Total Paid: {$applicant_company_total_paid_c}</b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons"><b>Applicant/Company Outstanding Amount: {$applicant_company_outstanding_amount_c}</b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons"><b>Applicant/Company MMM Fees Without GST Paid: <span class="color_amounts_green">{$applicant_company_total_mmm_fees_paid_c}</span></b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons"><b>Applicant/Company MMM Fees Outstanding Amount: <span class="color_amounts_green">{$applicant_company_mmm_fees_outstanding_amount_c}</span></b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons"><b>First Quarter MMM Fees Paid: <span class="color_amounts">{$first_quarter_mmm_fees_paid_c}</span></b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons"><b>First Quarter MMM Fees Outstanding Amount: <span class="color_amounts">{$first_quarter_mmm_fees_outstanding_amount_c}</span></b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons"><b>Second Quarter MMM Fees Paid: <span class="color_amounts_color_amounts_second">{$second_quarter_mmm_fees_paid_c}</span></b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons"><b>Second Quarter MMM Fees Outstanding Amount: <span class="color_amounts_second">{$second_quarter_mmm_fees_outstanding_amount_c}</span></b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons"><b>Current Quarter MMM Fees Paid: <span class="color_amounts_current">{$third_quarter_mmm_fees_paid_c}</span></b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons"><b>Current Quarter MMM Fees Outstanding Amount: <span class="color_amounts_current">{$third_quarter_mmm_fees_outstanding_amount_c}</span></b></td>').insertBefore('.paginationChangeButtons');
</script>
<style>.color_amounts { color: red;}</style>
<style>.color_amounts_current { color: blue;}</style>
<style>.color_amounts_green { color: green;}</style>
<style>.color_amounts_second { color: grey;}</style>

EOHTML;
			}
		}
	}
}
