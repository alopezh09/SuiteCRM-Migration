<?php

class Veta_VisaHooks
{
	function procesar($focus, $event, $args)
	{
		$this->asignar_info($focus);
		$this->asignar_info_contact($focus);
	}

	private function asignar_info($bean)
	{
		global $app_list_strings, $current_user;
		$dateformat = $current_user->getPreference('datef');

		$query = "SELECT  
                    veta_requerimiento.referido AS REFERIDO,
                    veta_requerimiento.fecha_viaje AS FECHAVIAJE,
                    veta_requerimiento.id AS ID_REQUERIMIENTO,
                    veta_requerimiento.name AS REQUERIMIENTO
                FROM veta_visa 
                INNER JOIN veta_visa_veta_serviciocliente_c ON veta_visa_veta_serviciocliente_c.veta_visa_veta_servicioclienteveta_visa_ida = veta_visa.id 
                INNER JOIN veta_serviciocliente ON veta_serviciocliente.id = veta_visa_veta_serviciocliente_c.veta_visa_veta_servicioclienteveta_serviciocliente_idb AND veta_serviciocliente.deleted = 0
                INNER JOIN veta_serviciocliente_opportunities_c ON veta_serviciocliente_opportunities_c.veta_serviciocliente_opportunitiesveta_serviciocliente_idb = veta_serviciocliente.id AND veta_serviciocliente_opportunities_c.deleted = 0 
                INNER JOIN opportunities ON opportunities.id = veta_serviciocliente_opportunities_c.veta_serviciocliente_opportunitiesopportunities_ida AND opportunities.deleted = 0 
                INNER JOIN veta_recibo_opportunities_c ON veta_recibo_opportunities_c.veta_recibo_opportunitiesopportunities_idb = opportunities.id AND veta_recibo_opportunities_c.deleted = 0 
                INNER JOIN veta_requerimiento_veta_recibo_c ON veta_requerimiento_veta_recibo_c.veta_requerimiento_veta_reciboveta_recibo_idb = veta_recibo_opportunities_c.veta_recibo_opportunitiesveta_recibo_ida AND veta_requerimiento_veta_recibo_c.deleted = 0
                INNER JOIN veta_requerimiento ON veta_requerimiento.id =  veta_requerimiento_veta_recibo_c.veta_requerimiento_veta_reciboveta_requerimiento_ida
                 WHERE veta_requerimiento.deleted = 0 AND veta_visa.deleted = 0 AND veta_visa.id = '" . $bean->id . "'";

		$result = $bean->db->query(
			$query,
			true,
			"Error obteniendo informacion la fecha de viaje de la visa " . $bean->id
		);
		$row    = $bean->db->fetchByAssoc($result);

		if ($row != null) {

			$bean->soel_referido = $row['REFERIDO'];
			//$bean->soel_fecha_viaje = $row[ 'FECHAVIAJE' ];
			$aux = date_create($row['FECHAVIAJE']);
			$bean->soel_fecha_viaje = date_format($aux, $dateformat);

			$loc                      = "index.php?action=DetailView&module=Veta_Requerimiento&record={$row['ID_REQUERIMIENTO']}";
			$bean->soel_requerimiento = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='{$loc}' target=\"_blank\" style='border:none;' >{$row['REQUERIMIENTO']}</a>";
		}

		return $bean;
	}

	/**
	 * Este metodo asigna el telefono de la casa del prospecto al requerimiento
	 *
	 * @param $focus
	 */
	private function asignar_info_contact($focus)
	{
		global $app_list_strings, $current_user;
		$dateformat = $current_user->getPreference('datef');
		$departamentos = $app_list_strings['departamentos_list'];
		$ciudades      = $app_list_strings['ciudades_list'];

		$query = "SELECT contacts.id AS ID,
                    CONCAT(contacts.first_name, ' ' , contacts.last_name) AS NOMBRE,
                    CONCAT(asignado.first_name, ' ', asignado.last_name) AS ASIGNADO,
                    TRIM(UPPER(asignado.address_city)) AS OFICINA,
                    contacts.phone_home AS TELCASA,
                    contacts.phone_mobile AS CELULAR,
                    contacts.lead_source AS FUENTE,
                    contacts_cstm.pais_c AS PAIS,
                    contacts_cstm.departamento_c AS DEPARTAMENTO,
                    contacts_cstm.ciudad_c AS CIUDAD,     
                    contacts_cstm.fecha_expiracion_visa_c AS FECHAEXPIRACIONVISA,
                    contacts.date_modified AS FECHAMODIFICACION,
                    contacts_cstm.visa_c AS VISA,
                    campaigns.name as CAMPANA                                   
                FROM contacts 
                INNER JOIN contacts_cstm ON contacts_cstm.id_c = contacts.id
                INNER JOIN veta_requerimiento_contacts_c ON veta_requerimiento_contacts_c.veta_requerimiento_contactscontacts_ida = contacts.id AND veta_requerimiento_contacts_c.deleted = 0 
                INNER JOIN veta_requerimiento ON veta_requerimiento.id = veta_requerimiento_contacts_c.veta_requerimiento_contactsveta_requerimiento_idb 
                INNER JOIN veta_requerimiento_veta_recibo_c ON veta_requerimiento_veta_recibo_c.veta_requerimiento_veta_reciboveta_requerimiento_ida = veta_requerimiento.id AND veta_requerimiento_veta_recibo_c.deleted = 0                  
                INNER JOIN veta_recibo ON veta_recibo.id = veta_requerimiento_veta_recibo_c.veta_requerimiento_veta_reciboveta_recibo_idb AND veta_recibo.deleted = 0 
                INNER JOIN veta_recibo_opportunities_c ON veta_recibo_opportunities_c.veta_recibo_opportunitiesveta_recibo_ida = veta_recibo.id AND veta_recibo_opportunities_c.deleted = 0 
                INNER JOIN opportunities ON opportunities.id = veta_recibo_opportunities_c.veta_recibo_opportunitiesopportunities_idb AND opportunities.deleted = 0 
                INNER JOIN veta_serviciocliente_opportunities_c ON veta_serviciocliente_opportunities_c.veta_serviciocliente_opportunitiesopportunities_ida  = opportunities.id AND veta_serviciocliente_opportunities_c.deleted = 0 
                INNER JOIN veta_serviciocliente ON veta_serviciocliente.id = veta_serviciocliente_opportunities_c.veta_serviciocliente_opportunitiesveta_serviciocliente_idb  AND veta_serviciocliente.deleted = 0
                INNER JOIN veta_visa_veta_serviciocliente_c ON veta_serviciocliente.id = veta_visa_veta_serviciocliente_c.veta_visa_veta_servicioclienteveta_serviciocliente_idb AND veta_visa_veta_serviciocliente_c.deleted = 0
                INNER JOIN veta_visa ON veta_visa.id = veta_visa_veta_serviciocliente_c.veta_visa_veta_servicioclienteveta_visa_ida     
                LEFT JOIN users asignado ON asignado.id = contacts.assigned_user_id AND asignado.deleted = 0
                LEFT JOIN campaigns ON campaigns.id = contacts.campaign_id AND campaigns.deleted = 0 
                WHERE veta_visa.deleted = 0 AND veta_visa.id = '" . $focus->id . "'";

		/*$query = "SELECT contacts.id AS ID,
                    CONCAT(contacts.first_name, ' ' , contacts.last_name) AS NOMBRE,
                    CONCAT(asignado.first_name, ' ', asignado.last_name) AS ASIGNADO,
                    TRIM(UPPER(asignado.address_city)) AS OFICINA,
                    contacts.phone_home AS TELCASA,
                    contacts.phone_mobile AS CELULAR,
                    contacts.lead_source AS FUENTE,
                    contacts_cstm.pais_c AS PAIS,
                    contacts_cstm.departamento_c AS DEPARTAMENTO,
                    contacts_cstm.ciudad_c AS CIUDAD,     
                    contacts_cstm.fecha_expiracion_visa_c AS FECHAEXPIRACIONVISA,
                    contacts.date_modified AS FECHAMODIFICACION,
                    contacts_cstm.visa_c AS VISA,
                    campaigns.name as CAMPANA                                   
                FROM contacts 
                INNER JOIN contacts_cstm ON contacts_cstm.id_c = contacts.id
                INNER JOIN contacts_opportunities_1_c ON contacts_opportunities_1_c.contacts_opportunities_1contacts_ida = contacts.id AND contacts_opportunities_1_c.deleted = 0 
                INNER JOIN opportunities ON opportunities.id = contacts_opportunities_1_c.contacts_opportunities_1opportunities_idb AND opportunities.deleted = 0 
                INNER JOIN veta_serviciocliente_opportunities_c ON veta_serviciocliente_opportunities_c.veta_serviciocliente_opportunitiesopportunities_ida  = opportunities.id AND veta_serviciocliente_opportunities_c.deleted = 0 
                INNER JOIN veta_serviciocliente ON veta_serviciocliente.id = veta_serviciocliente_opportunities_c.veta_serviciocliente_opportunitiesveta_serviciocliente_idb  AND veta_serviciocliente.deleted = 0
                INNER JOIN veta_visa_veta_serviciocliente_c ON veta_serviciocliente.id = veta_visa_veta_serviciocliente_c.veta_visa_veta_servicioclienteveta_serviciocliente_idb AND veta_visa_veta_serviciocliente_c.deleted = 0
                INNER JOIN veta_visa ON veta_visa.id = veta_visa_veta_serviciocliente_c.veta_visa_veta_servicioclienteveta_visa_ida     
                LEFT JOIN users asignado ON asignado.id = contacts.assigned_user_id AND asignado.deleted = 0
                LEFT JOIN campaigns ON campaigns.id = contacts.campaign_id AND campaigns.deleted = 0 
                WHERE veta_visa.deleted = 0 AND veta_visa.id = '" . $focus->id . "'";*/

		$result = $focus->db->query($query, true, "Error obteniendo informacion del contacto asociado a la carta de oferta " . $focus->id);
		$row    = $focus->db->fetchByAssoc($result);

		if ($row != null) {

			/*$focus->soel_home_phone_contact            = $row[ 'TELCASA' ];
            $focus->soel_mobile_phone_contact          = $row[ 'CELULAR' ];
            $focus->soel_fuente_contact                = $row[ 'FUENTE' ];
            $focus->soel_pais_contact                  = $row[ 'PAIS' ];
            $focus->soel_departamento_contact          = $row[ 'DEPARTAMENTO' ];
            $focus->soel_ciudad_contact                = $row[ 'CIUDAD' ];*/

			$aux = date_create($row['FECHAEXPIRACIONVISA']);
			$focus->soel_fecha_expiracion_visa = date_format($aux, $dateformat);

			//$focus->soel_fecha_expiracion_visa = $row[ 'FECHAEXPIRACIONVISA' ];
			/*$focus->soel_asignado_contact              = $row[ 'ASIGNADO' ];
            $focus->soel_fecha_modificacion_contact    = $row[ 'FECHAMODIFICACION' ];
            $focus->soel_visa_contact                  = $row[ 'VISA' ];
            $focus->soel_campana_contact               = $row[ 'CAMPANA' ]; */
		}

		return $focus;
	}

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

			$query = "SELECT contacts.id
            FROM contacts 
            INNER JOIN contacts_cstm ON contacts_cstm.id_c = contacts.id
            INNER JOIN veta_requerimiento_contacts_c ON veta_requerimiento_contacts_c.veta_requerimiento_contactscontacts_ida = contacts.id AND veta_requerimiento_contacts_c.deleted = 0 
            INNER JOIN veta_requerimiento ON veta_requerimiento.id = veta_requerimiento_contacts_c.veta_requerimiento_contactsveta_requerimiento_idb 
            INNER JOIN veta_requerimiento_veta_recibo_c ON veta_requerimiento_veta_recibo_c.veta_requerimiento_veta_reciboveta_requerimiento_ida = veta_requerimiento.id AND veta_requerimiento_veta_recibo_c.deleted = 0                  
            INNER JOIN veta_recibo ON veta_recibo.id = veta_requerimiento_veta_recibo_c.veta_requerimiento_veta_reciboveta_recibo_idb AND veta_recibo.deleted = 0 
            INNER JOIN veta_recibo_opportunities_c ON veta_recibo_opportunities_c.veta_recibo_opportunitiesveta_recibo_ida = veta_recibo.id AND veta_recibo_opportunities_c.deleted = 0 
            INNER JOIN opportunities ON opportunities.id = veta_recibo_opportunities_c.veta_recibo_opportunitiesopportunities_idb AND opportunities.deleted = 0 
            INNER JOIN veta_serviciocliente_opportunities_c ON veta_serviciocliente_opportunities_c.veta_serviciocliente_opportunitiesopportunities_ida  = opportunities.id AND veta_serviciocliente_opportunities_c.deleted = 0 
            INNER JOIN veta_serviciocliente ON veta_serviciocliente.id = veta_serviciocliente_opportunities_c.veta_serviciocliente_opportunitiesveta_serviciocliente_idb  AND veta_serviciocliente.deleted = 0
            INNER JOIN veta_visa_veta_serviciocliente_c ON veta_serviciocliente.id = veta_visa_veta_serviciocliente_c.veta_visa_veta_servicioclienteveta_serviciocliente_idb AND veta_visa_veta_serviciocliente_c.deleted = 0
            INNER JOIN veta_visa ON veta_visa.id = veta_visa_veta_serviciocliente_c.veta_visa_veta_servicioclienteveta_visa_ida
            WHERE veta_visa.deleted = 0 AND veta_visa.id = '" . $bean->id . "'";

			$result = $bean->db->query(
				$query,
				true,
				"Error obteniendo informacion del contacto asociado al Presupuesto " . $bean->id
			);

			$row    = $bean->db->fetchByAssoc($result);

			$bean->note->parent_type = 'Veta_Visa';
			$bean->note->parent_id = $bean->id;
			$bean->note->assigned_user_id = $current_user->id;
			$now = date('Y-m-d H:i:s');
			$bean->note->name = "Nota $bean->name $now";
			$bean->note->contact_id = $row['id'];
			$bean->note->save();
		}
	}

	static function getAge($then, $now = null)
	{
		$then_ts = !empty($then) ? strtotime($then) : time();
		$now_ts = !empty($now) ? strtotime($now) : time();
		$then_year = date('Y', $then_ts);
		$age = date('Y', $now_ts) - $then_year;

		if (strtotime('+' . $age . ' years', $then_ts) > time()) $age--;
		return $age;
	}

	static function get_visa_subclasses($bill)
	{
		$fees = $bill->get_linked_beans("veta_recibo_veta_college_1", '', '', 0, -1, 0, 'name LIKE "%DAMA%"');

		if (empty($fees)) return;

		$visa_subclasses = [];
		foreach ($fees as $fee) {
			$subclasses = $fee->get_linked_beans("veta_curso_veta_college_1");
			if (empty($subclasses)) continue;
			foreach ($subclasses as $subclass) {
				$visa_subclasses[$subclass->subclass_c] = true;
			}
		}

		return array_keys($visa_subclasses);
	}

	function use_endorsment($bean)
	{


		$workflow = $bean->get_linked_beans("veta_visa_opportunities")[0];
		if (empty($workflow)) return;

		$bill = $workflow->get_linked_beans("veta_recibo_opportunities")[0];
		if (empty($bill)) return;

		$requeriment = $bill->get_linked_beans("veta_requerimiento_veta_recibo")[0];
		if (empty($requeriment)) return;

		$company = $requeriment->get_linked_beans("nvc_companies_veta_requerimiento_1")[0];
		if (empty($company)) return;

		$custom_where = "trn_c = $bean->dama_trn_c";

		$endorsements = $company->get_linked_beans(
			"veta_endorsements_nvc_companies",
			"Veta_Endorsements",
			"",
			0,
			-1,
			0,
			$custom_where
		);

		foreach ($endorsements as $endorsement) {
			$aplication_date =  $bean->fecha_aplicacion;
			$year = Self::getAge($endorsement->fetched_row['endorsement_date_c'], $aplication_date) + 1;
			logerror("use_endorsment", $year, $endorsement->fetched_row['endorsement_date_c'], $aplication_date, Self::getAge($endorsement->fetched_row['endorsement_date_c'], $aplication_date));
			if ($year <= 5 && $year >= 1) {
				$endorsement->{"positions_used_$year"} = +$endorsement->{"positions_used_$year"} + 1;
				$endorsement->save();
			}
		}
	}

	function create_post_sale_requeriment($bean)
	{
		global $current_user;
		if (
			$bean->estado == "Visa_Aplicada"
			&& $bean->estado !== $bean->fetched_row['estado']
		) $this->use_endorsment($bean);
		// if ($bean->estado == "Visa_Aplicada") $this->use_endorsment($bean);
		if ($bean->estado !== "Visa_Otorgada" || empty($bean->fecha_otorgada) || $bean->estado === $bean->fetched_row['estado']) return;

		//crear requerimiento
		$requeriment = BeanFactory::getBean("Veta_Requerimiento");


		$workflow = $bean->get_linked_beans("veta_visa_opportunities")[0];
		if (empty($workflow)) return;

		$bill = $workflow->get_linked_beans("veta_recibo_opportunities")[0];
		if (empty($bill)) return;

		$old_requeriment = $bill->get_linked_beans("veta_requerimiento_veta_recibo")[0];
		if (empty($old_requeriment)) return;

		$fields = [
			"from_a_company_c",
			"referido",
			"assigned_user_id",
			"campana",
			"fuente",
			"profession",
			"current_job_position",
			"month_of_experience",
			"level_of_english",
			"nationality",
			"potential_visa_subclass",
			"leap_id",
			"migration_manager_user_c",
			"migration_manager_password_c",
			"recluter_name",
			"company_name",
			"industry_aplicant",
			"ocupation",
			"sponsored_australian_citizen_c",
			"australian_sponsor_name_c",
			"main_aplicant_name",
			"secondary_aplicant_name",
			"secondary_dob",
			"secondary_pasport_number",
			"dependent_name",
			"dependent_dob",
			"second_dependent_name",
			"second_dependent_dob",
			"third_dependent_name",
			"third_dependent_dob_c",
			"fourth_dependent_name_c",
			"fourth_dependent_dob_c",
			"migration_agent_name",
			"company_city",
			"company_industry",
			"email_company",
			"phone_company",
			"company_lead_id_c",
			"company_turnover_c",
		];

		foreach ($fields as $field) {
			$requeriment->{$field} = $old_requeriment->{$field};
		}

		$requeriment->estado = "Asignado_Posventa";
		$requeriment->de_posventa_c = true;
		$requeriment->opportunity_id_c = $workflow->id;
		// var_dump($requeriment->opportunity_id_c, $workflow->id);die;
		$requeriment->current_visa_subclass = $workflow->potential_visa_subclass;


		$requeriment->save();

		$lead = $old_requeriment->get_linked_beans("veta_requerimiento_leads")[0];
		if (empty($lead)) return;

		$contact = $old_requeriment->get_linked_beans("veta_requerimiento_contacts")[0];
		if (empty($contact)) return;

		$company = $old_requeriment->get_linked_beans("nvc_companies_veta_requerimiento_1")[0];
		if (empty($company)) return;



		$requeriment->load_relationship('veta_requerimiento_leads');
		$requeriment->veta_requerimiento_leads->add($lead->id);

		$requeriment->load_relationship('veta_requerimiento_contacts');
		$requeriment->veta_requerimiento_contacts->add($contact->id);

		$requeriment->load_relationship('nvc_companies_veta_requerimiento_1');
		$requeriment->nvc_companies_veta_requerimiento_1->add($company->id);
	}
}
