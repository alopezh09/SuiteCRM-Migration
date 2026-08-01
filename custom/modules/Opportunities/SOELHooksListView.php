<?php

class SOELHooksListView
{
	function ver_oficina($focus, $event, $args)
	{
		/*
		$person = $this->get_person($focus);

		if (isset($person)) {

			$u = new User();
			$u->retrieve($person->assigned_user_id);
			$focus->soel_oficina = $u->address_city;
		}
		*/
		$this->set_vistos_buenos($focus);
	}

	/**
	 * Este metodo establece los vistos buenos para la oportunidad los cuales son tomados del prospecto
	 * @param $focus
	 */
	private function set_vistos_buenos($focus)
	{

		//$focus->soel_visto_bueno_comercial = 0;

		/*$query = "SELECT estudiante.id as eid, prospecto.id as pid,
                    IFNULL(prospecto_cstm.ok_comercial_c, IFNULL(convertido_cstm.ok_comercial_c,0) ) as visto_bueno_comercial, 
                    IFNULL(prospecto_cstm.ok_visas_c, IFNULL(convertido_cstm.ok_visas_c,0) ) as visto_bueno_visas,
                    prospecto.id AS PROSPECTO_ID,
                    TRIM(UPPER(CONCAT(prospecto.first_name, ' ', prospecto.last_name))) AS PROSPECTO
                    FROM opportunities venta 
                    LEFT JOIN contacts_opportunities_1_c ON contacts_opportunities_1_c.contacts_opportunities_1opportunities_idb = venta.id AND contacts_opportunities_1_c.deleted = 0
                    LEFT JOIN contacts estudiante ON estudiante.id = contacts_opportunities_1_c.contacts_opportunities_1contacts_ida 
                    LEFT JOIN leads_opportunities_1_c ON leads_opportunities_1_c.leads_opportunities_1opportunities_idb = venta.id AND leads_opportunities_1_c.deleted = 0
                    LEFT JOIN leads prospecto ON prospecto.id = leads_opportunities_1_c.leads_opportunities_1leads_ida 
                    LEFT JOIN leads_cstm prospecto_cstm ON prospecto_cstm.id_c = prospecto.id 
                    LEFT JOIN leads convertido ON convertido.contact_id = estudiante.id
                    LEFT JOIN leads_cstm convertido_cstm on convertido_cstm.id_c = convertido.id                     
                    WHERE venta.deleted = 0 AND venta.id = '" . $focus->id . "'";*/
		
		$query = "SELECT 
                    IFNULL(veta_requerimiento.visto_bueno_comercial, 0 ) as visto_bueno_comercial,
                    IFNULL(veta_requerimiento.visto_bueno_visas, 0 ) as visto_bueno_visas
                 FROM opportunities venta   
                 LEFT JOIN veta_recibo_opportunities_c ON veta_recibo_opportunities_c.veta_recibo_opportunitiesopportunities_idb = venta.id AND veta_recibo_opportunities_c.deleted =0
                 LEFT JOIN veta_requerimiento_veta_recibo_c ON veta_requerimiento_veta_recibo_c.veta_requerimiento_veta_reciboveta_recibo_idb = veta_recibo_opportunities_c.veta_recibo_opportunitiesveta_recibo_ida AND veta_requerimiento_veta_recibo_c.deleted = 0
                 LEFT JOIN veta_requerimiento ON veta_requerimiento.id = veta_requerimiento_veta_recibo_c.veta_requerimiento_veta_reciboveta_requerimiento_ida AND veta_requerimiento.deleted = 0 
                 WHERE venta.deleted = 0 AND venta.id = '" . $focus->id . "'";


		$result = $focus->db->query($query, true, "Error obteniendo el visto bueno comercial del requerimiento");
		$row    = $focus->db->fetchByAssoc($result);

		if ($row != null) {

			$focus->soel_visto_bueno_comercial = $row['visto_bueno_comercial'];
			$focus->soel_visto_bueno_visas     = $row['visto_bueno_visas'];
		}
		/*
		$queryDocumentos = "SELECT
			id,
			a.requested_to_c,
			sum(aprobados) as aprobados,
			sum(cargados) as cargados,
			sum(pendientes) as pendientes,
			sum(solicitados) as solicitados
		FROM
			(
				SELECT
					o.id,
					dsc.requested_to_c,
					SUM(IF(ds.estadodocumento = 'Aprobado', 1, 0)) as aprobados,
					SUM(IF(ds.estadodocumento = 'Cargado', 1, 0)) as cargados,
					COUNT(*) - SUM(IF(ds.estadodocumento = 'Aprobado', 1, 0)) as pendientes,
					COUNT(*) as solicitados
				FROM
					opportunities o
					JOIN doc_docssolicitados_opportunities_c dso ON dso.doc_docssolicitados_opportunitiesopportunities_ida = o.id
					JOIN doc_docssolicitados ds ON ds.id = dso.doc_docssolicitados_opportunitiesdoc_docssolicitados_idb
					JOIN doc_docssolicitados_cstm dsc ON dsc.id_c = ds.id
				WHERE
					ds.deleted = 0
					AND o.deleted = 0
				GROUP BY
					o.id, dsc.requested_to_c
				UNION
				SELECT
					o.id,
					dsc.requested_to_c,
					SUM(IF(ds.estadodocumento = 'Aprobado', 1, 0)) as aprobados,
					SUM(IF(ds.estadodocumento = 'Cargado', 1, 0)) as cargados,
					COUNT(*) - SUM(IF(ds.estadodocumento = 'Aprobado', 1, 0)) as pendientes,
					COUNT(*) as solicitados
				FROM
					opportunities o
					JOIN doc_documentos_adic_opportunities_c dso ON dso.doc_documentos_adic_opportunitiesopportunities_idb = o.id
					JOIN doc_documentos_adic ds ON ds.id = dso.doc_documentos_adic_opportunitiesdoc_documentos_adic_ida
					JOIN doc_documentos_adic_cstm dsc ON dsc.id_c = ds.id
				WHERE
					ds.deleted = 0
					AND o.deleted = 0
				GROUP BY
					o.id,dsc.requested_to_c
			) a
		WHERE
			a.id = '$focus->id'
		group by
			a.id,a.requested_to_c;";


		$result = $focus->db->query($queryDocumentos, true, "Error obteniendo el visto bueno comercial del requerimiento");

		while ($row = $focus->db->fetchByAssoc($result)) {
			//logerror($row);
			switch ($row['requested_to_c']) {
				case 'Applicant':
					$focus->soel_docs_solicitados = $row['solicitados'] ? $row['solicitados'] : 0;
					$focus->soel_docs_pendientes = $row['pendientes'] ? $row['pendientes'] : 0;
					$focus->soel_docs_cargados = $row['cargados'] ? $row['cargados'] : 0;
					$focus->soel_docs_aprobados = $row['aprobados'] ? $row['aprobados'] : 0;
					break;
				case 'Company':
					$focus->company_requested_docs_c = $row['solicitados'] ? $row['solicitados'] : 0;
					$focus->company_pending_docs_c = $row['pendientes'] ? $row['pendientes'] : 0;
					$focus->company_uploaded_docs_c = $row['cargados'] ? $row['cargados'] : 0;
					$focus->company_approved_docs_c = $row['aprobados'] ? $row['aprobados'] : 0;
					break;
				default:
					break;
			}
		}
		*/
		$queryFechaEstudiantes = "select dd.date_entered as fecha
		from doc_docssolicitados dd , doc_docssolicitados_opportunities_c docop
		where docop.doc_docssolicitados_opportunitiesopportunities_ida ='" . $focus->id . "' 
		and docop.doc_docssolicitados_opportunitiesdoc_docssolicitados_idb = dd.id 
		UNION
		select dc.date_modified as fecha 
		from doc_comentarios dc , doc_comentarios_opportunities_c dcoc 
		where dc.id = dcoc.doc_comentarios_opportunitiesdoc_comentarios_idb 
		and dcoc.doc_comentarios_opportunitiesopportunities_ida ='" . $focus->id . "' 
		and dc.date_entered is null
		UNION
		select dda.fechacargado as fecha from doc_documentos_adic dda ,doc_docssolicitados_opportunities_c ddoc where dda.id = ddoc.doc_docssolicitados_opportunitiesdoc_docssolicitados_idb and ddoc.doc_docssolicitados_opportunitiesopportunities_ida ='" . $focus->id . "' order by fecha desc limit 1";
		$resultFechaEstudiantes = $focus->db->query($queryFechaEstudiantes, true, "Error obteniendo el visto bueno comercial del requerimiento");
		$rowFechaEstudiantes = $focus->db->fetchByAssoc($resultFechaEstudiantes);
		if ($rowFechaEstudiantes != null) {
			$focus->soel_date_estudiante = $rowFechaEstudiantes['fecha'];
		}

		$queryFechaAsesor = "select dd.fechaaprobado as fecha
			from doc_docssolicitados dd , doc_docssolicitados_opportunities_c docop
			where docop.doc_docssolicitados_opportunitiesopportunities_ida ='" . $focus->id . "'
			and dd.id = docop.doc_docssolicitados_opportunitiesdoc_docssolicitados_idb 
			UNION
			select dc.date_entered as fecha 
			from doc_comentarios dc , doc_comentarios_opportunities_c dcoc 
			where dc.id = dcoc.doc_comentarios_opportunitiesdoc_comentarios_idb 
			and dcoc.doc_comentarios_opportunitiesopportunities_ida ='" . $focus->id . "' 
			UNION
			select dda.fechaaprobado as fecha from doc_documentos_adic dda ,doc_docssolicitados_opportunities_c ddoc where dda.id = ddoc.doc_docssolicitados_opportunitiesdoc_docssolicitados_idb and ddoc.doc_docssolicitados_opportunitiesopportunities_ida ='" . $focus->id . "'
			order by fecha desc limit 1
			";
		$resultFechaAsesor = $focus->db->query($queryFechaAsesor, true, "Error obteniendo el visto bueno comercial del requerimiento");
		$rowFechaAsesor = $focus->db->fetchByAssoc($resultFechaAsesor);
		if ($rowFechaAsesor != null) {
			$focus->soel_date_asesor = $rowFechaAsesor['fecha'];
		}
		/*
		$queryCampus = "select vc.campus as CAMPUS from veta_curso vc 
                        inner join veta_detallerecibo vd on vc.id = vd.veta_curso_id_c 
                        inner join veta_detallerecibo_veta_recibo_c vdvrc on vd.id = vdvrc.veta_detallerecibo_veta_reciboveta_detallerecibo_idb 
                        inner join veta_recibo vr on vdvrc.veta_detallerecibo_veta_reciboveta_recibo_ida = vr.id 
                        inner join veta_recibo_opportunities_c vroc on vr.id = vroc.veta_recibo_opportunitiesveta_recibo_ida 
                        where vroc.veta_recibo_opportunitiesopportunities_idb ='" . $focus->id . "' order by vc.intake desc limit 1";

		$resultCampus = $focus->db->query($queryCampus, true, "Error obteniendo campus");
		$rowCampus = $focus->db->fetchByAssoc($resultCampus);
		if ($rowCampus != null) {
			$focus->soel_campus = $rowCampus['CAMPUS'];
		}
		*/
	}

	private function get_person(Opportunity $o)
	{

		$p = null;

		$leads    = $o->get_linked_beans('leads_opportunities_1', 'Leads');
		$contacts = $o->get_linked_beans('contacts_opportunities_1', 'Contacts');

		foreach ($leads as $lead) {
			$p = $lead;
		}

		foreach ($contacts as $contact) {
			$p = $contact;
		}

		return $p;
	}

	function procesar(&$bean, $event, $args)
	{


		$this->asignar_info($bean);
		//$this->asignar_info_person($bean);
		//$this->assign_customer_service_info($bean); 

		$this->assign_company_info($bean);

		//$this->load_requerimiento_info($bean);

		//$this->define_closing_date($bean);
		//$this->calculate_second_quarter( $bean );  
		//$this->calculate_MMM_Fees_payment( $bean );

		$this->semaforizacion($bean);

		//$this->calculate_third_quarter( $bean );  		 
		//$this->calculate_outstanding_amount($bean);
		$this->filterList($bean);
	}

	function semaforizacion($bean)
	{
		switch ($bean->estado_semaforizacion_c) {
			case 'Verde':
				$color = '#0fcf15';
				break;
			case 'Amarillo':
				$color = '#ebb212';
				break;
			case 'Naranja':
				$color = '#ff9d24';
				break;
			case 'Rojo':
				$color = '#d66c60';
				break;

			default:
				$color = '#0fcf15';
				break;
		}

		$bean->estado_semaforizacion_c = "<div style='width: 20px;height: 20px;background: $color;border-radius: 50%;margin: auto;'></div>";
	}

	private function filterList(&$bean)
	{
		global $current_user;

		error_log("filtro - entro");

		// Obtener el ID del usuario actual
		$userID = $current_user->id;

		// Verificar si el usuario actual está en alguno de los campos de asignación
		if ($bean->assigned_user_id != $userID && $bean->user_id3_c != $userID && $bean->user_id2_c != $userID && $bean->user_id1_c != $userID) {
			// Si no lo está, no mostrar el registro en la lista
			$bean->custom_disable_row = true;
			error_log("filtro - entro al si de la validacion");
		}
		$bean->custom_disable_row = false;
	}

	private function calculate_outstanding_amount(&$bean)
	{
		global $current_user;

		if ($current_user->id == 'c5da6f79-e3de-2d8f-f42b-60d6505f50c2') {

			$workflow = new Opportunity();
			$workflow->retrieve($bean->id);

			$invoice = new Veta_Recibo();
			$invoice->retrieve($workflow->veta_recibo_opportunitiesveta_recibo_ida);
			//error_log('SE ENCONTRO EL ID DEL SEARCH QUE SE VA A UTILIZAR '. $invoice->name);

			//company_outstanding_amount_c
			//outstanding_amount

			error_log('outstanding - SE ENCONTRO EL ID DEL SEARCH QUE SE VA A UTILIZAR ' . $invoice->name);
			error_log('outstanding - TOTAL PAGADO APLICANTE ' . $invoice->pendiente_por_pagar);
			error_log('outstanding - TOTAL PAGADO COMPANIA ' . $invoice->company_outstanding_amount_c);

			//pendiente_por_pagar
			//company_outstanding_amount_c

			/*
			$query2 = "SELECT * FROM opportunities_cstm where id_c = '" . $bean->id . "'";

			$result2 = $bean->db->query(
				$query2,
				true,
				"Error obteniendo informacion del prospecto asociado al requerimiento " . $bean->id
			);
			$row2    = $bean->db->fetchByAssoc($result2);

			if ($row2 != null) {
				$bean->db->query("UPDATE opportunities_cstm 
									SET 
										company_outstanding_amount_c = " . $invoice->company_outstanding_amount_c . "										
									WHERE 
										id_c = '" . $bean->id . "'");
			} else {
				$bean->db->query("INSERT INTO opportunities_cstm 
										(id_c, 
										company_outstanding_amount_c) 
									VALUES 
										('" . $bean->id . "', 
										" . ($invoice->company_outstanding_amount_c* 1) . ")");
			}
			
			$bean->db->query("UPDATE opportunities 
								SET 
									outstanding_amount = " . $invoice->pendiente_por_pagar . "										
								WHERE 
									id_c = '" . $bean->id . "'");
									
			*/
		}

		return bean;
	}


	private function assign_customer_service_info(&$bean)
	{
		$o = new Opportunity();
		$o->retrieve($bean->id);

		$q = "select * from users where id in (
		select veta_serviciocliente.assigned_user_id 
		from 
			veta_serviciocliente 
			left join veta_serviciocliente_opportunities_c on veta_serviciocliente_opportunities_c.veta_serviciocliente_opportunitiesveta_serviciocliente_idb = veta_serviciocliente.id
			where veta_serviciocliente_opportunities_c.veta_serviciocliente_opportunitiesopportunities_ida = '" . $bean->id . "'
			)";


		$result = $bean->db->query($q, true, "Error obteniendo informacion del requerimiento asociado a la oportunidad " . $bean->id);
		$row = $bean->db->fetchByAssoc($result);

		if ($row != null) {
			$bean->virtual_customer_service_c = $row['first_name'] . " " . $row['last_name'];
		}

		return $bean;
	}


	private function assign_company_info(&$bean)
	{
		global $current_user;

		$o = new Opportunity();
		$o->retrieve($bean->id);

		$r = new Veta_Recibo();
		$r->retrieve($o->veta_recibo_opportunitiesveta_recibo_ida);

		$req = new Veta_Requerimiento();
		$req->retrieve($r->veta_requerimiento_veta_reciboveta_requerimiento_ida);

		if (isset($req)) {
			if ($current_user->id == 'c5da6f79-e3de-2d8f-f42b-60d6505f50c2') {


				error_log("SYNC - Entro a actualizar la infor del requerimiento ");
				$query = '';
				/*
				$query = "UPDATE opportunities SET current_visa_subclass = '" . $req->current_visa_subclass . "',
							ocupation = '" . $req->ocupation . "',
							consultation_fee = '" . $req->consultation_fee . "',
							profession = '" . $req->profession . "',
							current_job_position = '" . $req->current_job_position . "',
							month_of_experience = '" . $req->month_of_experience . "',
							level_of_english = '" . $req->level_of_english . "',
							nationality = '" . $req->nationality . "',
							potential_visa_subclass = '" . $req->potential_visa_subclass . "',
							migration_agent_name = '" . $req->migration_agent_name . "',
							leap_id = '" . $req->leap_id . "',
							recluter_name = '" . $req->recluter_name . "',
							secondary_aplicant_name = '" . $req->secondary_aplicant_name . "',
							
							secondary_dob = '" . $req->secondary_dob . "',
							secondary_pasport_number = '" . $req->secondary_pasport_number . "',
							dependent_name = '" . $req->dependent_name . "',
							dependent_dob = '" . $req->dependent_dob . "',
							second_dependent_name = '" . $req->second_dependent_name . "',
							second_dependent_dob = '" . $req->second_dependent_dob . "',
							third_dependent_name = '" . $req->third_dependent_name . "'
							
							
					WHERE id = '" . $bean->id . "'";
				*/

				/*
				$bean->ocupation = $req->ocupation;
				$bean->current_visa_subclass = $req->current_visa_subclass;				
				$bean->consultation_fee = $req->consultation_fee;
				
				$bean->consultation_date = $req->consultation_date;
				
				
				$bean->profession = $req->profession;
				$bean->current_job_position = $req->current_job_position;
				$bean->month_of_experience = $req->month_of_experience;
				$bean->level_of_english = $req->level_of_english;
				$bean->nationality = $req->nationality;
				$bean->potential_visa_subclass = $req->potential_visa_subclass;
				$bean->migration_agent_name = $req->migration_agent_name;
				$bean->leap_id = $req->leap_id;
				$bean->recluter_name = $req->recluter_name;
				
				$bean->secondary_aplicant_name = $req->secondary_aplicant_name;
				
				$bean->secondary_dob = $req->secondary_dob;
				$bean->secondary_pasport_number = $req->secondary_pasport_number;
				
				$bean->dependent_name = $req->dependent_name;
				
				$bean->dependent_dob = $req->dependent_dob;
				$bean->second_dependent_name = $req->second_dependent_name;
				
				$bean->second_dependent_dob = $req->second_dependent_dob;
				$bean->third_dependent_name = $req->third_dependent_name;
				*/

				/*
				
				$workflow->virtual_visa_expire_3rd_dependent_date_c = $this->visa_expire_3rd_dependent_date_c;
				$workflow->third_dependent_dob_c = $this->third_dependent_dob_c;
				$workflow->virtual_visa_expire_2nd_dependent_date_c = $this->visa_expire_2nd_dependent_date_c;
				$workflow->visa_expire_1st_dependent_date_c = $this->virtual_visa_expire_1st_dependent_date_c;				
				$workflow->applicant_industry_c = $this->industry_aplicant;
				$workflow->virtual_visa_expire_secondary_applicant_date_c = $this->visa_expire_secondary_applicant_date_c;
				*/


				//error_log("current_visa - actualizacion desde el workflow ". $query);
				//$bean->db->query($query);
			}
		}

		$c = new NVC_Companies();
		$c->retrieve($req->nvc_companies_veta_requerimiento_1nvc_companies_ida);

		if (isset($c)) {
			/*
			$bean->company_leap_id_c = $c->company_leap_id;
			$bean->virtual_sbs_approval_date_c = $c->sbs_approval_date_c;
			$bean->virtual_sbs_expectation_date_c = $c->sbs_expectation_date_c;
			$bean->company_sbs_expiry_date = $c->company_sbs_expiry_date;
			*/
			//$bean->company_name = $c->name;

			$bean->company_name = "<a href='/index.php?action=ajaxui#ajaxUILoc=index.php%3Fmodule%3DNVC_Companies%26offset%3D1%26stamp%3D1669409324088543100%26return_module%3DNVC_Companies%26action%3DDetailView%26record%3D$c->id' target='_blank'>$c->name</a>";

			//$bean->phone_company = $c->phone_office;
			$bean->email_company = $c->email1;
			//$bean->company_industry = $c->industry;

			/*
			$bean->tas_application_date_c = $c->tas_application_date_c;
			$bean->tas_expectation_date_c = $c->tas_expectation_date_c;
			$bean->tas_approval_date_c = $c->tas_approval_date_c;

			*/

			//if ($current_user->id == 'c5da6f79-e3de-2d8f-f42b-60d6505f50c2') {
			/*
			$query = '';
			$query = "UPDATE opportunities 
							SET 
								company_industry = '$c->industry', 
								company_name = '$c->name', 
								phone_company = '$c->phone_office', 
								company_city = '$c->billing_address_city',
								email_company = '$c->email1'
								
							WHERE id = '" . $bean->id . "'";

			$bean->db->query($query);

			$bean->db->query("UPDATE opportunities_cstm SET company_lead_id_c = '$c->company_leap_id' WHERE id_c = '" . $bean->id . "'");
*/





			//}
		}

		return $bean;
	}



	private function define_closing_date(&$bean)
	{
		global $current_user;
		if ($current_user->id == 'c5da6f79-e3de-2d8f-f42b-60d6505f50c2') {
			//if ($bean->name != '456') return;

			error_log("CLOSING - Entro a Closgin Date");

			if ((isset($bean->closing_date_applicant_c)) and ($bean->closing_date_applicant_c != '')) {
				error_log("CLOSING - Existe closing date del aplicante " . $bean->closing_date_applicant_c);

				$applicant_date = DateTime::createFromFormat('d/m/Y', $bean->closing_date_applicant_c);
				//$bean->fecha_cierre_c = $bean->closing_date_applicant_c;
				$bean->fecha_cierre_c = $applicant_date->format('Y-m-d');

				if ((isset($bean->closing_date_company_c)) and ($bean->closing_date_company_c != '')) {
					$company_date = DateTime::createFromFormat('d/m/Y', $bean->closing_date_company_c);

					error_log("CLOSING - Existe closing date de la compañia " . $bean->closing_date_company_c);
					/*
					if ($bean->closing_date_applicant_c < $bean->closing_date_company_c) {
						error_log("CLOSING - El closing date del aplicante es menor que el de la compañia");
						$bean->fecha_cierre_c = $bean->closing_date_applicant_c;
					} else {
						error_log("CLOSING - El closing date de la compania es menor o igual que el del aplicante");
						$bean->fecha_cierre_c = $bean->closing_date_company_c;
					}
					*/
					if ($applicant_date > $company_date) {
						error_log("CLOSING - El closing date de la compania es menor o igual que el del aplicante");
						//$bean->fecha_cierre_c = $bean->closing_date_company_c;
						$bean->fecha_cierre_c = $company_date->format('Y-m-d');
					}
				}
			} else if ((isset($bean->closing_date_company_c)) and ($bean->closing_date_company_c != '')) {
				error_log("CLOSING - Existe closing date de compania " . $bean->closing_date_company_c);
				$company_date = DateTime::createFromFormat('d/m/Y', $bean->closing_date_company_c);
				$bean->fecha_cierre_c = $company_date->format('Y-m-d');
			}

			$query2 = "SELECT * FROM opportunities_cstm where id_c = '" . $bean->id . "'";
			$result2 = $bean->db->query(
				$query2,
				true,
				"Error obteniendo informacion del prospecto asociado al requerimiento " . $bean->id
			);
			$row2    = $bean->db->fetchByAssoc($result2);

			//$bean->save();

			if ($row2 != null) {
				$bean->db->query("UPDATE opportunities_cstm SET fecha_cierre_c = '$bean->fecha_cierre_c' WHERE id_c = '" . $bean->id . "'");
			} else {
				$bean->db->query("INSERT INTO opportunities_cstm (id_c, fecha_cierre_c) VALUES ('" . $bean->id . "', '" . $bean->fecha_cierre_c . "')");
			}
		}
	}

	private function get_id_saved_search($dynamic_field)
	{

		//error_log('SAVED SEARACH FUNCTION '. $dynamic_field);
		return true;
		if (($dynamic_field == '') or ($dynamic_field === null)) {
			return true;
		} else {
			return false;
		}

		/*
		if ((isset($_REQUEST['saved_search_select'])) and($_REQUEST['saved_search_select'] == '9a914815-3ccd-5241-6a9c-624f45d561a1')) {
			return true;
		} else {
			//return false;
			return true;
		}
		*/
	}
	private function calculate_first_quarter(&$bean)
	{
		global $current_user;
		if ($current_user->id == 'c5da6f79-e3de-2d8f-f42b-60d6505f50c2-2') {

			if ($this->get_id_saved_search($bean->first_quarter_mmm_fees_paid_c)) {
				//first_quarter_mmm_fees_paid_c
				$workflow = new Opportunity();
				$workflow->retrieve($bean->id);

				$invoice = new Veta_Recibo();
				$invoice->retrieve($workflow->veta_recibo_opportunitiesveta_recibo_ida);
				//error_log('SE ENCONTRO EL ID DEL SEARCH QUE SE VA A UTILIZAR '. $invoice->name);

				$applicant_payments = $this->get_applicant_payment($invoice);
				$company_payments = $this->get_company_payment($invoice);

				$payments_in_range_applicant = 0;
				foreach ($applicant_payments as $a_payment) {
					//error_log('Valor del aplicante '. $a_payment->monto);
					//error_log('FECGA del aplicante '. $a_payment->date_entered);

					$time = strtotime($a_payment->date_entered);
					$newformat = date('Y-m-d', $time);
					//error_log ('CONVERT DATE ' .$newformat);				

					if (($newformat >= '2022-01-01') and ($newformat <= '2022-03-31')) {
						//error_log('FECHA APLICANTE DENTRO DEL PRIMER QUARTER '. $a_payment->date_entered);
						$payments_in_range_applicant = $payments_in_range_applicant + $a_payment->monto;
					}
				}

				$payments_in_range_company = 0;
				foreach ($company_payments as $c_payment) {
					//error_log('Valor del Company '. $c_payment->deposit_amount);
					$time = strtotime($c_payment->date_entered);
					$newformat = date('Y-m-d', $time);
					//error_log ('CONVERT DATE ' .$newformat);								
					if (($newformat >= '2022-01-01') and ($newformat <= '2022-03-31')) {
						//if (($c_payment->date_entered >= '01-01-2022 00:00') and ($c_payment->date_entered <= '31-03-2022 23:59')) {
						//error_log('FECHA COMPANY DENTRO DEL PRIMER QUARTER '. $c_payment->date_entered);
						$payments_in_range_company = $payments_in_range_company + $c_payment->deposit_amount;
					}
				}



				$total_amount_applicant_MMM = $workflow->total_without_gst;
				$total_amount_company_MMM = $workflow->company_total_without_gst_c;
				//$workflow->applicant_company_total_without_gst_c

				/*
				error_log('APPLICANT TOTAL WITHOUT GST '. $total_amount_applicant_MMM);
				error_log('COMPANY TOTAL WITHOUT GST '. $total_amount_company_MMM);
				*/
				$diferencia_MMM_applicant = $total_amount_applicant_MMM - $payments_in_range_applicant;
				$diferencia_MMM_company = $total_amount_company_MMM - $payments_in_range_company;

				$total_applicant_MMM_paid = 0;
				$total_company_MMM_paid = 0;

				if ($diferencia_MMM_applicant <= 0) {
					//error_log('DIFERENCIA APLICANTE '. $diferencia_MMM_applicant);
					$diferencia_MMM_applicant = 0;
					$total_applicant_MMM_paid = $total_amount_applicant_MMM;
				} else {
					$total_applicant_MMM_paid = $payments_in_range_applicant;
					//error_log('DIFERENCIA APLICANTE MAYOR A CERO');				
				}

				if ($diferencia_MMM_company <= 0) {
					//error_log('DIFERENCIA COMPANIA '. $diferencia_MMM_company);
					$diferencia_MMM_company = 0;
					$total_company_MMM_paid = $total_amount_company_MMM;
				} else {
					$total_company_MMM_paid = $payments_in_range_company;
					//error_log('DIFERENCIA COMPANIA MAYOR A CERO');				
				}


				$first_quarter_mmm_fees_outstanding_amount = 0;
				if (($workflow->applicant_company_total_without_gst_c - ($total_applicant_MMM_paid + $total_company_MMM_paid)) <= 0) {
					//error_log('DIFERENCIA COMPANIA '. $diferencia_MMM_company);
					//$diferencia_MMM_company = 0;
					$first_quarter_mmm_fees_outstanding_amount = 0;
				} else {
					$first_quarter_mmm_fees_outstanding_amount = ($workflow->applicant_company_total_without_gst_c - ($total_applicant_MMM_paid + $total_company_MMM_paid)) * 1;
					//error_log('DIFERENCIA COMPANIA MAYOR A CERO');				
				}



				//error_log('TOTAL PAGADO APLICANTE '. $total_applicant_MMM_paid);				
				//error_log('TOTAL PAGADO COMPANIA '. $total_company_MMM_paid);				
				$total_paid = ($total_company_MMM_paid + $total_applicant_MMM_paid) * 1;
				//error_log('TOTAL PAGADO EN RANGO DE FECHAS '. $total_paid);				

				$total_outstanding_amount = ($total_amount_applicant_MMM + $total_amount_company_MMM) - $total_paid;
				//error_log('TOTAL OUTSTANDING AMOUNT '. $total_outstanding_amount);

				/*
				first_quarter_mmm_fees_paid_company_c
				first_quarter_mmm_fees_paid_applicant_c
				*/

				//$bean->first_quarter_mmm_fees_paid_c = $total_paid;

				$query2 = "SELECT * FROM opportunities_cstm where id_c = '" . $bean->id . "'";

				$result2 = $bean->db->query(
					$query2,
					true,
					"Error obteniendo informacion del prospecto asociado al requerimiento " . $bean->id
				);
				$row2    = $bean->db->fetchByAssoc($result2);

				if ($row2 != null) {
					$bean->db->query("UPDATE opportunities_cstm 
										SET 
											first_quarter_mmm_fees_paid_c = " . $total_paid . ",
											first_quarter_mmm_fees_paid_applicant_c = " . $total_applicant_MMM_paid . ",
											first_quarter_mmm_fees_paid_company_c = " . $total_company_MMM_paid . ",
											first_quarter_mmm_fees_outstanding_amount_c = " . $first_quarter_mmm_fees_outstanding_amount . "
											
										WHERE 
											id_c = '" . $bean->id . "'");
				} else {
					$bean->db->query("INSERT INTO opportunities_cstm 
											(id_c, 
											first_quarter_mmm_fees_paid_c, 
											first_quarter_mmm_fees_paid_applicant_c, 
											first_quarter_mmm_fees_paid_company_c,
											first_quarter_mmm_fees_outstanding_amount_c) 
										VALUES 
											('" . $bean->id . "', 
											" . ($total_paid * 1) . ",
											" . ($total_applicant_MMM_paid * 1) . ",
											" . ($total_company_MMM_paid * 1) . ",
											" . ($first_quarter_mmm_fees_outstanding_amount * 1) . ")");
				}
				$bean->first_quarter_mmm_fees_paid_c = $total_paid;
				$bean->first_quarter_mmm_fees_paid_applicant_c = $total_applicant_MMM_paid;
				$bean->first_quarter_mmm_fees_paid_company_c = $total_company_MMM_paid;
				$bean->first_quarter_mmm_fees_outstanding_amount_c = $first_quarter_mmm_fees_outstanding_amount;
			}
		}
	}

	private function calculate_second_quarter(&$bean)
	{
		global $current_user;
		/*
		error_log( print_r($_REQUEST["second_quarter_c"], TRUE) );
		error_log( print_r($_REQUEST["second_quarter"], TRUE) );
		*/
		if ($current_user->id == 'c5da6f79-e3de-2d8f-f42b-60d6505f50c2') {
			if ($bean->name == '0000000000') {


				//error_log("SECOND QUARTER REPORT");

				$workflow = new Opportunity();
				$workflow->retrieve($bean->id);

				$invoice = new Veta_Recibo();
				$invoice->retrieve($workflow->veta_recibo_opportunitiesveta_recibo_ida);
				//error_log('SE ENCONTRO EL ID DEL SEARCH QUE SE VA A UTILIZAR '. $invoice->name);

				$applicant_payments = $this->get_applicant_payment($invoice);
				$company_payments = $this->get_company_payment($invoice);

				$last_payment_company = 0;
				$last_payment_applicant = 0;

				$payments_in_range_applicant = 0;
				foreach ($applicant_payments as $a_payment) {
					//error_log('Valor del aplicante '. $a_payment->monto);
					//error_log('FECGA del aplicante '. $a_payment->date_entered);

					$time = strtotime($a_payment->date_entered);
					$newformat = date('Y-m-d', $time);
					//error_log ('CONVERT DATE ' .$newformat);				

					if (($newformat >= '2022-04-01') and ($newformat <= '2022-06-30')) {
						//error_log('FECHA APLICANTE DENTRO DEL PRIMER QUARTER '. $a_payment->date_entered);
						$payments_in_range_applicant = $payments_in_range_applicant + $a_payment->monto;
					} else if ($newformat <= '2022-03-31') {
						$last_payment_applicant = $last_payment_applicant + $a_payment->monto;
					}
				}

				$payments_in_range_company = 0;
				foreach ($company_payments as $c_payment) {
					//error_log('Valor del Company '. $c_payment->deposit_amount);
					$time = strtotime($c_payment->date_entered);
					$newformat = date('Y-m-d', $time);
					//error_log ('CONVERT DATE ' .$newformat);								
					if (($newformat >= '2022-04-01') and ($newformat <= '2022-06-30')) {
						//if (($c_payment->date_entered >= '01-01-2022 00:00') and ($c_payment->date_entered <= '31-03-2022 23:59')) {
						//error_log('FECHA COMPANY DENTRO DEL PRIMER QUARTER '. $c_payment->date_entered);
						$payments_in_range_company = $payments_in_range_company + $c_payment->deposit_amount;
					} else if ($newformat <= '2022-03-31') {
						$last_payment_company = $last_payment_company + $c_payment->deposit_amount;
					}
				}


				/*
				$total_amount_applicant_MMM = $workflow->total_without_gst - $workflow->first_quarter_mmm_fees_paid_applicant_c;
				$total_amount_company_MMM = $workflow->company_total_without_gst_c - $workflow->first_quarter_mmm_fees_paid_company_c;
				*/


				$total_amount_applicant_MMM = $workflow->total_without_gst - $last_payment_applicant;
				$total_amount_company_MMM = $workflow->company_total_without_gst_c - $last_payment_company;


				/*
				$total_amount_applicant_MMM = $workflow->total_without_gst - $workflow->first_quarter_mmm_fees_paid_applicant_c;
				$total_amount_company_MMM = $workflow->company_total_without_gst_c - $workflow->first_quarter_mmm_fees_paid_company_c;
				*/

				//$workflow->applicant_company_total_without_gst_c

				/*
				error_log('APPLICANT TOTAL WITHOUT GST '. $total_amount_applicant_MMM);
				error_log('COMPANY TOTAL WITHOUT GST '. $total_amount_company_MMM);
				*/

				$diferencia_MMM_applicant = "No";
				if ($total_amount_applicant_MMM > 0) {
					$diferencia_MMM_applicant = $total_amount_applicant_MMM - $payments_in_range_applicant;
				}

				$diferencia_MMM_company = "No";
				if ($total_amount_company_MMM > 0) {
					$diferencia_MMM_company = $total_amount_company_MMM - $payments_in_range_company;
				}

				error_log(" alfonso - last payment applicant " . $last_payment_applicant . " alfonso - total_amount_applicant_MMM " . $total_amount_applicant_MMM . " alfonso - payments_in_range_applicant " . $payments_in_range_applicant . " alfonso - diferencia_MMM_applicant " . $diferencia_MMM_applicant);
				error_log(" alfonso - last payment Company " . $last_payment_company . " alfonso - total_amount_company_MMM " . $total_amount_company_MMM . " alfonso - payments_in_range_company " . $payments_in_range_company . " alfonso - diferencia_MMM_company " . $diferencia_MMM_company);

				$total_applicant_MMM_paid = 0;
				$total_company_MMM_paid = 0;

				if ($diferencia_MMM_applicant == 'No') {
					$total_applicant_MMM_paid = 0;
				} else if ($diferencia_MMM_applicant <= 0) {
					//error_log('DIFERENCIA APLICANTE '. $diferencia_MMM_applicant);
					$diferencia_MMM_applicant = 0;
					$total_applicant_MMM_paid = $total_amount_applicant_MMM;
					//$total_applicant_MMM_paid = $workflow->total_without_gst;

				} else {
					$total_applicant_MMM_paid = $payments_in_range_applicant;
					//error_log('DIFERENCIA APLICANTE MAYOR A CERO');				
				}

				if ($diferencia_MMM_company == 'No') {
					$total_company_MMM_paid = 0;
				} else if ($diferencia_MMM_company <= 0) {
					//error_log('DIFERENCIA COMPANIA '. $diferencia_MMM_company);
					$diferencia_MMM_company = 0;
					$total_company_MMM_paid = $total_amount_company_MMM;
					//$total_company_MMM_paid = $workflow->company_total_without_gst_c;

				} else {
					$total_company_MMM_paid = $payments_in_range_company;
					//error_log('DIFERENCIA COMPANIA MAYOR A CERO');				
				}

				if ((($total_applicant_MMM_paid * 1) - ($this->get_refunds($bean, "Applicant") * 1)) <= 0) {
					$total_applicant_MMM_paid = 0;
				} else {
					$total_applicant_MMM_paid = ($total_applicant_MMM_paid * 1) - ($this->get_refunds($bean, "Applicant") * 1);
				}

				if ((($total_company_MMM_paid * 1) - ($this->get_refunds($bean, "Company") * 1)) <= 0) {
					$total_company_MMM_paid = 0;
				} else {
					$total_company_MMM_paid = ($total_company_MMM_paid * 1) - ($this->get_refunds($bean, "Company") * 1);
				}





				$second_quarter_mmm_fees_outstanding_amount = 0;
				if (($workflow->applicant_company_mmm_fees_outstanding_amount_c - ($total_applicant_MMM_paid + $total_company_MMM_paid)) <= 0) {
					//error_log('DIFERENCIA COMPANIA '. $diferencia_MMM_company);
					//$diferencia_MMM_company = 0;
					$second_quarter_mmm_fees_outstanding_amount = 0;
				} else {
					$second_quarter_mmm_fees_outstanding_amount = ($workflow->applicant_company_mmm_fees_outstanding_amount_c - ($total_applicant_MMM_paid + $total_company_MMM_paid)) * 1;
					//error_log('DIFERENCIA COMPANIA MAYOR A CERO');				
				}



				//error_log('TOTAL PAGADO APLICANTE '. $total_applicant_MMM_paid);				
				//error_log('TOTAL PAGADO COMPANIA '. $total_company_MMM_paid);				
				$total_paid = ($total_company_MMM_paid + $total_applicant_MMM_paid) * 1;
				//error_log('TOTAL PAGADO EN RANGO DE FECHAS '. $total_paid);				

				$total_outstanding_amount = ($total_amount_applicant_MMM + $total_amount_company_MMM) - $total_paid;
				//error_log('TOTAL OUTSTANDING AMOUNT '. $total_outstanding_amount);

				/*
				first_quarter_mmm_fees_paid_company_c
				first_quarter_mmm_fees_paid_applicant_c
				*/

				//$bean->first_quarter_mmm_fees_paid_c = $total_paid;
				if ($current_user->id == 'c5da6f79-e3de-2d8f-f42b-60d6505f50c2') {

					$query2 = "SELECT * FROM opportunities_cstm where id_c = '" . $bean->id . "'";

					$result2 = $bean->db->query(
						$query2,
						true,
						"Error obteniendo informacion del prospecto asociado al requerimiento " . $bean->id
					);
					$row2    = $bean->db->fetchByAssoc($result2);

					if ($row2 != null) {
						$bean->db->query("UPDATE opportunities_cstm 
											SET 
												second_quarter_mmm_fees_paid_c = " . $total_paid . ",
												second_quarter_mmm_fees_paid_applicant_c = " . $total_applicant_MMM_paid . ",
												second_quarter_mmm_fees_paid_company_c = " . $total_company_MMM_paid . ",
												second_quarter_mmm_fees_outstanding_amount_c = " . $second_quarter_mmm_fees_outstanding_amount . "
												
											WHERE 
												id_c = '" . $bean->id . "'");
					} else {
						$bean->db->query("INSERT INTO opportunities_cstm 
												(id_c, 
												second_quarter_mmm_fees_paid_c, 
												second_quarter_mmm_fees_paid_applicant_c, 
												second_quarter_mmm_fees_paid_company_c,
												second_quarter_mmm_fees_outstanding_amount_c) 
											VALUES 
												('" . $bean->id . "', 
												" . ($total_paid * 1) . ",
												" . ($total_applicant_MMM_paid * 1) . ",
												" . ($total_company_MMM_paid * 1) . ",
												" . ($second_quarter_mmm_fees_outstanding_amount * 1) . ")");
					}
				}

				$bean->second_quarter_mmm_fees_paid_c = $total_paid;
				$bean->second_quarter_mmm_fees_paid_applicant_c = $total_applicant_MMM_paid;
				$bean->second_quarter_mmm_fees_paid_company_c = $total_company_MMM_paid;
				$bean->second_quarter_mmm_fees_outstanding_amount_c = $second_quarter_mmm_fees_outstanding_amount;
			}
		}
	}

	private function calculate_third_quarter(&$bean)
	{

		global $current_user;
		/*
		error_log( print_r($_REQUEST["second_quarter_c"], TRUE) );
		error_log( print_r($_REQUEST["second_quarter"], TRUE) );
		*/
		//error_log("fuera si THIRD QUARTER REPORT - Alfonso");
		if ($current_user->id == 'c5da6f79-e3de-2d8f-f42b-60d6505f50c2') {

			if (!$bean->id == 'ae28db80-bc34-ae1d-af77-62b01d531b04') {
				error_log("Alfonso - WORKFLOW 456");
			}


			//if($bean->name == '0000000000') {
			if (!$bean->id == '4292e744-07ee-38d2-617e-62d1de6c2380') return;


			//error_log("THIRD QUARTER REPORT - Alfonso");

			$workflow = new Opportunity();
			$workflow->retrieve($bean->id);

			$invoice = new Veta_Recibo();
			$invoice->retrieve($workflow->veta_recibo_opportunitiesveta_recibo_ida);
			//error_log('SE ENCONTRO EL ID DEL SEARCH QUE SE VA A UTILIZAR '. $invoice->name);

			$applicant_payments = $this->get_applicant_payment($invoice);
			$company_payments = $this->get_company_payment($invoice);

			$last_payment_company = 0;
			$last_payment_applicant = 0;

			$payments_in_range_applicant = 0;
			foreach ($applicant_payments as $a_payment) {

				if (!$bean->id == '4292e744-07ee-38d2-617e-62d1de6c2380') return;


				//error_log('Valor del aplicante '. $a_payment->monto);
				//error_log('FECGA del aplicante '. $a_payment->date_entered);

				$time = strtotime($a_payment->date_entered);
				$newformat = date('Y-m-d', $time);
				//error_log ('CONVERT DATE ' .$newformat);				

				if (($newformat >= '2022-07-01') and ($newformat <= '2022-09-30')) {
					//error_log('FECHA APLICANTE DENTRO DEL PRIMER QUARTER '. $a_payment->date_entered);
					$payments_in_range_applicant = $payments_in_range_applicant + $a_payment->monto;
				} else if ($newformat <= '2022-06-30') {
					$last_payment_applicant = $last_payment_applicant + $a_payment->monto;
				}
			}

			$payments_in_range_company = 0;
			foreach ($company_payments as $c_payment) {

				if (!$bean->id == '4292e744-07ee-38d2-617e-62d1de6c2380') return;


				//error_log('Valor del Company '. $c_payment->deposit_amount);
				$time = strtotime($c_payment->date_entered);
				$newformat = date('Y-m-d', $time);
				//error_log ('CONVERT DATE ' .$newformat);								
				if (($newformat >= '2022-07-01') and ($newformat <= '2022-09-30')) {
					//if (($c_payment->date_entered >= '01-01-2022 00:00') and ($c_payment->date_entered <= '31-03-2022 23:59')) {
					//error_log('FECHA COMPANY DENTRO DEL PRIMER QUARTER '. $c_payment->date_entered);
					$payments_in_range_company = $payments_in_range_company + $c_payment->deposit_amount;
				} else if ($newformat <= '2022-06-30') {
					$last_payment_company = $last_payment_company + $c_payment->deposit_amount;
				}
			}


			/*
				$total_amount_applicant_MMM = $workflow->total_without_gst - $workflow->first_quarter_mmm_fees_paid_applicant_c;
				$total_amount_company_MMM = $workflow->company_total_without_gst_c - $workflow->first_quarter_mmm_fees_paid_company_c;
				*/


			$total_amount_applicant_MMM = $workflow->total_without_gst - $last_payment_applicant;
			$total_amount_company_MMM = $workflow->company_total_without_gst_c - $last_payment_company;


			/*
				$total_amount_applicant_MMM = $workflow->total_without_gst - $workflow->first_quarter_mmm_fees_paid_applicant_c;
				$total_amount_company_MMM = $workflow->company_total_without_gst_c - $workflow->first_quarter_mmm_fees_paid_company_c;
				*/

			//$workflow->applicant_company_total_without_gst_c

			/*
				error_log('APPLICANT TOTAL WITHOUT GST '. $total_amount_applicant_MMM);
				error_log('COMPANY TOTAL WITHOUT GST '. $total_amount_company_MMM);
				*/

			$diferencia_MMM_applicant = "No";
			if ($total_amount_applicant_MMM > 0) {
				$diferencia_MMM_applicant = $total_amount_applicant_MMM - $payments_in_range_applicant;
			}

			$diferencia_MMM_company = "No";
			if ($total_amount_company_MMM > 0) {
				$diferencia_MMM_company = $total_amount_company_MMM - $payments_in_range_company;
			}

			//error_log(" Alfonso - last payment applicant ". $last_payment_applicant . " alfonso - total_amount_applicant_MMM " . $total_amount_applicant_MMM . " alfonso - payments_in_range_applicant " . $payments_in_range_applicant . " alfonso - diferencia_MMM_applicant " . $diferencia_MMM_applicant);
			//error_log(" Alfonso - last payment Company ". $last_payment_company . " alfonso - total_amount_company_MMM " . $total_amount_company_MMM . " alfonso - payments_in_range_company " . $payments_in_range_company . " alfonso - diferencia_MMM_company " . $diferencia_MMM_company);

			$total_applicant_MMM_paid = 0;
			$total_company_MMM_paid = 0;

			if ($diferencia_MMM_applicant == 'No') {
				$total_applicant_MMM_paid = 0;
			} else if ($diferencia_MMM_applicant <= 0) {
				//error_log('DIFERENCIA APLICANTE '. $diferencia_MMM_applicant);
				$diferencia_MMM_applicant = 0;
				$total_applicant_MMM_paid = $total_amount_applicant_MMM;
				//$total_applicant_MMM_paid = $workflow->total_without_gst;

			} else {
				$total_applicant_MMM_paid = $payments_in_range_applicant;
				//error_log('DIFERENCIA APLICANTE MAYOR A CERO');				
			}

			if ($diferencia_MMM_company == 'No') {
				$total_company_MMM_paid = 0;
			} else if ($diferencia_MMM_company <= 0) {
				//error_log('DIFERENCIA COMPANIA '. $diferencia_MMM_company);
				$diferencia_MMM_company = 0;
				$total_company_MMM_paid = $total_amount_company_MMM;
				//$total_company_MMM_paid = $workflow->company_total_without_gst_c;

			} else {
				$total_company_MMM_paid = $payments_in_range_company;
				//error_log('DIFERENCIA COMPANIA MAYOR A CERO');				
			}

			if ((($total_applicant_MMM_paid * 1) - ($this->get_refunds($bean, "Applicant") * 1)) <= 0) {
				$total_applicant_MMM_paid = 0;
			} else {
				$total_applicant_MMM_paid = ($total_applicant_MMM_paid * 1) - ($this->get_refunds($bean, "Applicant") * 1);
			}

			if ((($total_company_MMM_paid * 1) - ($this->get_refunds($bean, "Company") * 1)) <= 0) {
				$total_company_MMM_paid = 0;
			} else {
				$total_company_MMM_paid = ($total_company_MMM_paid * 1) - ($this->get_refunds($bean, "Company") * 1);
			}





			$third_quarter_mmm_fees_outstanding_amount = 0;
			if (($workflow->applicant_company_mmm_fees_outstanding_amount_c - ($total_applicant_MMM_paid + $total_company_MMM_paid)) <= 0) {
				//error_log('DIFERENCIA COMPANIA '. $diferencia_MMM_company);
				//$diferencia_MMM_company = 0;
				$third_quarter_mmm_fees_outstanding_amount = 0;
			} else {
				$third_quarter_mmm_fees_outstanding_amount = ($workflow->applicant_company_mmm_fees_outstanding_amount_c - ($total_applicant_MMM_paid + $total_company_MMM_paid)) * 1;
				//error_log('DIFERENCIA COMPANIA MAYOR A CERO');				
			}



			//error_log('TOTAL PAGADO APLICANTE '. $total_applicant_MMM_paid);				
			//error_log('TOTAL PAGADO COMPANIA '. $total_company_MMM_paid);				
			$total_paid = ($total_company_MMM_paid + $total_applicant_MMM_paid) * 1;
			//error_log('TOTAL PAGADO EN RANGO DE FECHAS '. $total_paid);				

			$total_outstanding_amount = ($total_amount_applicant_MMM + $total_amount_company_MMM) - $total_paid;
			//error_log('TOTAL OUTSTANDING AMOUNT '. $total_outstanding_amount);

			/*
				first_quarter_mmm_fees_paid_company_c
				first_quarter_mmm_fees_paid_applicant_c
				*/

			//$bean->first_quarter_mmm_fees_paid_c = $total_paid;
			if ($current_user->id == 'c5da6f79-e3de-2d8f-f42b-60d6505f50c2') {

				$query2 = "SELECT * FROM opportunities_cstm where id_c = '" . $bean->id . "'";

				$result2 = $bean->db->query(
					$query2,
					true,
					"Error obteniendo informacion del prospecto asociado al requerimiento " . $bean->id
				);
				$row2    = $bean->db->fetchByAssoc($result2);

				if ($row2 != null) {
					$bean->db->query("UPDATE opportunities_cstm 
											SET 
												third_quarter_mmm_fees_paid_c = " . $total_paid . ",
												third_quarter_mmm_fees_paid_applicant_c = " . $total_applicant_MMM_paid . ",
												third_quarter_mmm_fees_paid_company_c = " . $total_company_MMM_paid . ",
												third_quarter_mmm_fees_outstanding_amount_c = " . $third_quarter_mmm_fees_outstanding_amount . "
												
											WHERE 
												id_c = '" . $bean->id . "'");
				} else {
					$bean->db->query("INSERT INTO opportunities_cstm 
												(id_c, 
												third_quarter_mmm_fees_paid_c, 
												third_quarter_mmm_fees_paid_applicant_c, 
												third_quarter_mmm_fees_paid_company_c,
												third_quarter_mmm_fees_outstanding_amount_c) 
											VALUES 
												('" . $bean->id . "', 
												" . ($total_paid * 1) . ",
												" . ($total_applicant_MMM_paid * 1) . ",
												" . ($total_company_MMM_paid * 1) . ",
												" . ($third_quarter_mmm_fees_outstanding_amount * 1) . ")");
				}
			}

			$bean->third_quarter_mmm_fees_paid_c = $total_paid;
			$bean->third_quarter_mmm_fees_paid_applicant_c = $total_applicant_MMM_paid;
			$bean->third_quarter_mmm_fees_paid_company_c = $total_company_MMM_paid;
			$bean->third_quarter_mmm_fees_outstanding_amount_c = $third_quarter_mmm_fees_outstanding_amount;
			//}

		}
	}

	public function get_applicant_payment($invoice)
	{
		$abono        = null;
		$abonos       = $invoice->get_linked_beans('veta_abono_veta_recibo', 'Veta_Abono', 'date_entered ASC');

		return $abonos;
	}

	public function get_company_payment($invoice)
	{
		$abono        = null;
		$abonos       = $invoice->get_linked_beans('veta_recibo_nvc_deposit_company_1', 'NVC_Deposit_company', 'date_entered ASC');

		return $abonos;
	}


	private function calculate_MMM_Fees_payment(&$bean)
	{
		//applicant_company_total_mmm_fees_paid_c
		//applicant_company_mmm_fees_outstanding_amount_c

		//applicant_company_total_without_gst_c
		//applicant_company_total_paid_c
		/*
		total_without_gst
		company_total_without_gst_c
		total_paid
		deposit
		company_deposits_c
		
		aplicant 6000
		pago 6600
		company 2300
		pago 2200
		6000 - 6600
		-600
		6000
		
		2300 - 2200
		100
		2200
		
		6000 + 2200
		8200*/

		$workflow = new Opportunity();
		//$workflow = $bean;
		$workflow->retrieve($bean->id);

		$diferencia_aplicante = $workflow->total_without_gst - $workflow->total_paid;
		if ($diferencia_aplicante <= 0) {
			$monto_aplicante = $workflow->total_without_gst;
		} else {
			$monto_aplicante = $workflow->total_paid;
		}

		$diferencia_company = $workflow->company_total_without_gst_c - $workflow->company_deposits_c;
		if ($diferencia_company <= 0) {
			$monto_company = $workflow->company_total_without_gst_c;
		} else {
			$monto_company = $workflow->company_deposits_c;
		}

		$bean->applicant_company_total_mmm_fees_paid_c = ($monto_aplicante * 1) + ($monto_company * 1);


		/*
		$diferencia = ($bean->applicant_company_total_paid_c *1) - ($bean->applicant_company_total_without_gst_c * 1);		
		if(($diferencia * 1) >= 0 ) {
			$bean->applicant_company_total_mmm_fees_paid_c = ($bean->applicant_company_total_without_gst_c * 1);
		} else {
			$bean->applicant_company_total_mmm_fees_paid_c = ($bean->applicant_company_total_paid_c * 1);
		}	*/

		$bean->applicant_company_mmm_fees_outstanding_amount_c =  ($workflow->applicant_company_total_without_gst_c * 1) - ($bean->applicant_company_total_mmm_fees_paid_c * 1);


		$query2 = "SELECT * FROM opportunities_cstm where id_c = '" . $bean->id . "'";
		$result2 = $bean->db->query(
			$query2,
			true,
			"Error obteniendo informacion del prospecto asociado al requerimiento " . $bean->id
		);
		$row2    = $bean->db->fetchByAssoc($result2);



		if ($row2 != null) {
			$bean->db->query("UPDATE opportunities_cstm SET applicant_company_total_mmm_fees_paid_c = " . $bean->applicant_company_total_mmm_fees_paid_c . ", applicant_company_mmm_fees_outstanding_amount_c = " . $bean->applicant_company_mmm_fees_outstanding_amount_c . " WHERE id_c = '" . $bean->id . "'");
		} else {
			$bean->db->query("INSERT INTO opportunities_cstm (id_c, applicant_company_total_mmm_fees_paid_c, applicant_company_total_mmm_fees_paid_c) VALUES ('" . $bean->id . "', " . ($bean->applicant_company_mmm_fees_outstanding_amount_c * 1) . ", " . ($bean->applicant_company_mmm_fees_outstanding_amount_c * 1) . ")");
		}
	}



	private function asignar_info(&$bean)
	{
		global $current_user;
		$dateformat = $current_user->getPreference('datef');

		$query = "SELECT  
                    veta_requerimiento.referido AS REFERIDO,
                    veta_requerimiento.fecha_viaje AS FECHAVIAJE,
                    veta_requerimiento.id AS ID_REQUERIMIENTO,
                    veta_requerimiento.name AS REQUERIMIENTO
					/*,
					veta_requerimiento.secondary_aplicant_name,
					veta_requerimiento.secondary_dob,
					veta_requerimiento_cstm.visa_expire_secondary_applicant_date_c,
					veta_requerimiento.dependent_name,
					veta_requerimiento.second_dependent_name,
					veta_requerimiento.third_dependent_name,
					veta_requerimiento_cstm.visa_expire_2nd_dependent_date_c,
					veta_requerimiento_cstm.visa_expire_1st_dependent_date_c,
					veta_requerimiento.dependent_dob,
					veta_requerimiento.second_dependent_dob,
					veta_requerimiento_cstm.third_dependent_dob_c,
					veta_requerimiento_cstm.visa_expire_3rd_dependent_date_c,
					
					veta_requerimiento.nomination_app_exp_date,
					veta_requerimiento.nomination_app_date,
					veta_requerimiento_cstm.nomination_approval_date_c,
					veta_requerimiento.skill_assessment_app_exp_date,
					veta_requerimiento_cstm.labour_application_date_c,
					veta_requerimiento_cstm.labour_expectation_date_c,
					veta_requerimiento.skill_assessment_app_date,
					veta_requerimiento.visa_app_exp_date,
					veta_requerimiento_cstm.tbs_application_date_c,
					veta_requerimiento_cstm.tbs_expectation_date_c,
					veta_requerimiento_cstm.tbs_approval_date_c,
					
					veta_requerimiento.leap_id
					*/

					
                FROM opportunities 
                INNER JOIN veta_recibo_opportunities_c ON veta_recibo_opportunities_c.veta_recibo_opportunitiesopportunities_idb = opportunities.id AND veta_recibo_opportunities_c.deleted = 0 
                INNER JOIN veta_requerimiento_veta_recibo_c ON veta_requerimiento_veta_recibo_c.veta_requerimiento_veta_reciboveta_recibo_idb = veta_recibo_opportunities_c.veta_recibo_opportunitiesveta_recibo_ida AND veta_requerimiento_veta_recibo_c.deleted = 0
                INNER JOIN veta_requerimiento ON veta_requerimiento.id =  veta_requerimiento_veta_recibo_c.veta_requerimiento_veta_reciboveta_requerimiento_ida
                /*LEFT JOIN veta_requerimiento_cstm ON veta_requerimiento_cstm.id_c = veta_requerimiento.id*/
                 WHERE veta_requerimiento.deleted = 0 AND opportunities.deleted = 0 AND opportunities.id = '" . $bean->id . "'";

		$result = $bean->db->query($query, true, "Error obteniendo informacion del comercial asociado al proceso de venta " . $bean->id);
		$row    = $bean->db->fetchByAssoc($result);

		if ($row != null) {

			$bean->soel_referido = $row['REFERIDO'];
			/*
			$bean->virtual_sbs_expectation_date_c = $row['sbs_expectation_date_c'];
			$bean->virtual_sbs_approval_date_c = $row['sbs_approval_date_c'];
			*/
			/*
			$bean->virtual_tbs_application_date_c = $row['tbs_application_date_c'];
			$bean->virtual_tbs_expectation_date_c = $row['tbs_expectation_date_c'];
			$bean->virtual_tbs_approval_date_c = $row['tbs_approval_date_c'];
			$bean->virtual_nomination_approval_date_c = $row['nomination_approval_date_c'];
			$bean->virtual_labour_application_date_c = $row['labour_application_date_c'];
			$bean->virtual_labour_expectation_date_c = $row['labour_expectation_date_c'];
			*/
			$bean->virtual_requeriment_c = "<a target='_blank' href='index.php?action=DetailView&module=Veta_Requerimiento&record={$row['ID_REQUERIMIENTO']}'>" . $row['REQUERIMIENTO'] . "</a>";

			/*
			$bean->leap_id = $row['leap_id'];
			if ($current_user->id == 'c5da6f79-e3de-2d8f-f42b-60d6505f50c2') {
				$bean->db->query("UPDATE opportunities SET leap_id = '" . $row['leap_id'] . "' WHERE id = '" . $bean->id . "'");
			}
			*/



			if (!empty($row['FECHAVIAJE'])) {
				$aux                    = date_create($row['FECHAVIAJE']);
				$bean->soel_fecha_viaje = date_format($aux, $dateformat);
			}
			/*
			if (!empty($row['secondary_aplicant_name'])) {
				$bean->secondary_aplicant_name = $row['secondary_aplicant_name'];
				$aux = date_create($row['secondary_dob']);
				$bean->secondary_dob = date_format($aux, $dateformat);
				$aux = date_create($row['visa_expire_secondary_applicant_date_c']);
				$bean->visa_expire_secondary_applic_c = date_format($aux, $dateformat);

				$bean->dependent_name = $row['dependent_name'];
				$aux = date_create($row['dependent_dob']);
				$bean->dependent_dob = date_format($aux, $dateformat);
				$aux = date_create($row['visa_expire_dependant_1_c']);
				$bean->visa_expire_1st_dependent_da_c = date_format($aux, $dateformat);

				$bean->second_dependent_name = $row['second_dependent_name'];
				$aux = date_create($row['second_dependent_dob']);
				$bean->second_dependent_dob = date_format($aux, $dateformat);
				$aux = date_create($row['visa_expire_2nd_dependent_date_c']);
				$bean->visa_expire_2st_dependent_da_c = date_format($aux, $dateformat);

				$bean->third_dependent_name = $row['third_dependent_name'];
				$aux = date_create($row['third_dependent_dob_c']);
				$bean->third_dependent_dob_c = date_format($aux, $dateformat);
				$aux = date_create($row['visa_expire_3rd_dependent_date_c']);
				$bean->visa_expire_3st_dependent_da_c = date_format($aux, $dateformat);
			}
			*/

			$loc                      = "index.php?action=DetailView&module=Veta_Requerimiento&record={$row['ID_REQUERIMIENTO']}";
			$bean->soel_requerimiento = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='{$loc}' target=\"_blank\" style='border:none;' >{$row['REQUERIMIENTO']}</a>";
		}





		/*

		$query = "select 
					vc.name as name_MMM_fee, 
					vc.* from veta_detallerecibo vc                         
                        inner join veta_detallerecibo_veta_recibo_c vdvrc on vc.id = vdvrc.veta_detallerecibo_veta_reciboveta_detallerecibo_idb 
                        inner join veta_recibo vr on vdvrc.veta_detallerecibo_veta_reciboveta_recibo_ida = vr.id 
                        inner join veta_recibo_opportunities_c vroc on vr.id = vroc.veta_recibo_opportunitiesveta_recibo_ida 
                        where vroc.veta_recibo_opportunitiesopportunities_idb =  '" . $bean->id . "' order by vc.intake asc limit 1;";

		$result = $bean->db->query($query, true, "Error obteniendo informacion del comercial asociado al proceso de venta " . $bean->id);
		$row    = $bean->db->fetchByAssoc($result);

		if ($row != null) {
			$bean->cost_agrement_visa_subclass = $row['name_MMM_fee'];
		}


		$query = "select					
					c.name as college_name
					from veta_detallerecibo vc
					inner join veta_detallerecibo_veta_recibo_c vdvrc on vc.id = vdvrc.veta_detallerecibo_veta_reciboveta_detallerecibo_idb
					inner join veta_recibo vr on vdvrc.veta_detallerecibo_veta_reciboveta_recibo_ida = vr.id
					inner join veta_recibo_opportunities_c vroc on vr.id = vroc.veta_recibo_opportunitiesveta_recibo_ida
					join veta_curso_veta_college_1_c cc on cc.veta_curso_veta_college_1veta_curso_ida = vc.veta_curso_id_c
					join veta_college c on c.id = cc.veta_curso_veta_college_1veta_college_idb
					where vroc.veta_recibo_opportunitiesopportunities_idb = '" . $bean->id . "' order by vc.intake asc";

		$result = $bean->db->query($query, true, "Error obteniendo informacion del comercial asociado al proceso de venta " . $bean->id);
		
		

		while ($row = $bean->db->fetchByAssoc($result)) {
			$bean->cost_agrement_visa_subclass = $bean->cost_agrement_visa_subclass . "<br/>" . $row['college_name'];
		}
		
		*/

		$o = new Opportunity();
		$o->retrieve($bean->id);
		$docs_portal_url = $o->url_c;
		// $docs_portal_url = "https://mmmveta-my.sharepoint.com/personal/admin_mmmveta_onmicrosoft_com/_layouts/15/onedrive.aspx?q=workflow_".$bean->name."&view=7&id=/personal/admin_mmmveta_onmicrosoft_com/Documents/DocsMMMigration&searchScope=folder";
		if ($docs_portal_url) {
			$bean->docs_portal_url_c = "<a href='{$docs_portal_url}' target=\"_blank\" style='border:none;' >Docs Portal URL</a>";
		}



		//cost_agrement_visa_subclass

		return $bean;
	}

	public function get_persona($bean)
	{

		$p = null;

		$leads    = $bean->get_linked_beans('leads_opportunities_1', 'Leads');
		//$contacts = $bean->get_linked_beans( 'contacts_opportunities_1', 'Contacts' );

		foreach ($leads as $lead) {
			$p = $lead;
		}

		/*foreach ( $contacts as $contact )
        {
            $p = $contact;
        }*/

		return $p;
	}

	public function get_estudiante($bean)
	{

		$p = null;

		$leads    = $bean->get_linked_beans('contacts_opportunities_1', 'Contacts');
		//Opportunities
		//$contacts = $bean->get_linked_beans( 'contacts_opportunities_1', 'Contacts' );

		foreach ($leads as $lead) {
			$p = $lead;
		}

		/*foreach ( $contacts as $contact )
        {
            $p = $contact;
        }*/

		return $p;
	}

	function convertToDatabaseDate($inputDatetime)
	{
		// Lista de formatos posibles de datetime
		$possibleFormats = ['d/m/Y H:i', 'd-m-Y H:i', 'm/d/Y H:i', 'm-d-Y H:i', 'Y-m-d H:i'];

		foreach ($possibleFormats as $format) {
			$date = DateTime::createFromFormat($format, $inputDatetime);
			if ($date && $date->format($format) === $inputDatetime) {
				return $date->format('Y-m-d'); // Extraemos solo la parte de la fecha
			}
		}

		// Si no se encuentra ningún formato válido, intentamos extraer solo la parte de la fecha
		$parts = explode(' ', $inputDatetime);
		if (count($parts) > 0) {
			return $parts[0];
		}

		// Si no podemos determinar el formato, devolvemos el datetime original
		return $inputDatetime;
	}

	private function asignar_info_person(&$bean)
	{
		global $current_user;
		$person = $this->get_persona($bean);

		if (isset($person)) {
			$bean->soel_fecha_expiracion_visa = $person->fecha_expiracion_visa_c;
			//$bean->virtual_visa_exp_date_c = $person->fecha_expiracion_visa_c;
			$bean->virtual_lead_phone_c = $person->phone_mobile;
			$bean->virtual_lead_email_c = $person->email1;

			/*
			if ($current_user->id == 'c5da6f79-e3de-2d8f-f42b-60d6505f50c2'){				
				$formattedDate = $this->convertToDatabaseDate($person->fecha_expiracion_visa_c);
				$query = "UPDATE opportunities_cstm SET virtual_visa_exp_date_c = '" . $formattedDate . "' WHERE id_c = '" . $bean->id . "'";			
				$bean->db->query($query);
				error_log("UPDATE_PERSON - Formatted date: " . $formattedDate);
			}
			*/

			if ($current_user->id == 'c5da6f79-e3de-2d8f-f42b-60d6505f50c2') {
				// Verifica si $person->fecha_expiracion_visa_c está vacío o es nulo
				if (empty($person->fecha_expiracion_visa_c)) {
					error_log("UPDATE_PERSON - NO EXISTE");
				} else {
					$formattedDate = $this->convertToDatabaseDate($person->fecha_expiracion_visa_c);
					error_log("UPDATE_PERSON - Formatted: " . $formattedDate);
					$query = "UPDATE opportunities_cstm SET virtual_visa_exp_date_c = '" . $formattedDate . "' WHERE id_c = '" . $bean->id . "'";
					$bean->db->query($query);
				}
			}
		} else {
			$estudiante = $this->get_estudiante($bean);
			if (isset($estudiante)) {
				/*
                
                $bean->soel_ciudad_tmp = $estudiante->ciudad_tmp_c; 
                */
				$bean->soel_fecha_expiracion_visa = $estudiante->fecha_expiracion_visa_c;
				$bean->virtual_lead_phone_c = $estudiante->phone_mobile;
				$bean->virtual_lead_email_c = $estudiante->email1;
			}
		}

		return $bean;
	}


	private function load_requerimiento_info(&$bean)
	{
		global $current_user;
		$dateformat = $current_user->getPreference('datef');

		$q = "SELECT fecha_req1,
        fecha_exp_req1,
        fecha_req2,
        fecha_exp_req2,
        fecha_req3,
        fecha_exp_req3,
        vc.fecha_response_req1_c,
        vc.fecha_response_req2_c,
        vc.fecha_response_req3_c,
		v.name as visa_name,
		v.id as visa_id,
		
		v.fecha_aplicacion
		
        FROM vetacrm2.veta_visa_opportunities_c vo
        JOIN veta_visa v ON vo.veta_visa_opportunitiesveta_visa_idb = v.id
        JOIN veta_visa_cstm vc ON vo.veta_visa_opportunitiesveta_visa_idb = vc.id_c
        WHERE vo.veta_visa_opportunitiesopportunities_ida = '" . $bean->id . "'";


		$result = $bean->db->query($q, true, "Error obteniendo informacion del requerimiento asociado a la oportunidad " . $bean->id);
		$row = $bean->db->fetchByAssoc($result);

		if ($row != null) {

			$aux = date_create($row['fecha_req1']);
			// $bean->fecha_req1_c = date_format($aux, $dateformat);
			$bean->fecha_req1_c = !empty($row['fecha_req1']) && $row['fecha_req1'] !== '0000-00-00' && $row['fecha_req1'] !== '0000-00-00 00:00:00'  ? date_format($aux, $dateformat) : '';

			$aux = date_create($row['fecha_exp_req1']);
			// $bean->fecha_exp_req1_c = date_format($aux, $dateformat);
			$bean->fecha_exp_req1_c = !empty($row['fecha_exp_req1']) && $row['fecha_exp_req1'] !== '0000-00-00' && $row['fecha_exp_req1'] !== '0000-00-00 00:00:00'  ? date_format($aux, $dateformat) : '';

			$aux = date_create($row['fecha_response_req1_c']);
			// $bean->fecha_response_req1_c = date_format($aux, $dateformat);
			$bean->fecha_response_req1_c = !empty($row['fecha_response_req1_c']) && $row['fecha_response_req1_c'] !== '0000-00-00' && $row['fecha_response_req1_c'] !== '0000-00-00 00:00:00'  ? date_format($aux, $dateformat) : '';

			$aux = date_create($row['fecha_req2']);
			// $bean->fecha_req2_c = date_format($aux, $dateformat);
			$bean->fecha_req2_c = !empty($row['fecha_req2']) && $row['fecha_req2'] !== '0000-00-00' && $row['fecha_req2'] !== '0000-00-00 00:00:00'  ? date_format($aux, $dateformat) : '';

			$aux = date_create($row['fecha_exp_req2']);
			// $bean->fecha_exp_req2_c = date_format($aux, $dateformat);
			$bean->fecha_exp_req2_c = !empty($row['fecha_exp_req2']) && $row['fecha_exp_req2'] !== '0000-00-00' && $row['fecha_exp_req2'] !== '0000-00-00 00:00:00'  ? date_format($aux, $dateformat) : '';

			$aux = date_create($row['fecha_response_req2_c']);
			$bean->fecha_response_req2_c = !empty($row['fecha_response_req2_c']) && $row['fecha_response_req2_c'] !== '0000-00-00' && $row['fecha_response_req2_c'] !== '0000-00-00 00:00:00'  ? date_format($aux, $dateformat) : '';
			// $bean->fecha_response_req2_c = date_format($aux, $dateformat);

			$aux = date_create($row['fecha_req3']);
			// $bean->fecha_req3_c = date_format($aux, $dateformat);
			$bean->fecha_req3_c = !empty($row['fecha_req3']) && $row['fecha_req3'] !== '0000-00-00' && $row['fecha_req3'] !== '0000-00-00 00:00:00'  ? date_format($aux, $dateformat) : '';
			$aux = date_create($row['fecha_exp_req3']);
			// $bean->fecha_exp_req3_c = date_format($aux, $dateformat);
			$bean->fecha_exp_req3_c = !empty($row['fecha_exp_req3']) && $row['fecha_exp_req3'] !== '0000-00-00' && $row['fecha_exp_req3'] !== '0000-00-00 00:00:00'  ? date_format($aux, $dateformat) : '';
			$aux = date_create($row['fecha_response_req3_c']);
			// $bean->fecha_response_req3_c = date_format($aux, $dateformat);
			$bean->fecha_response_req3_c = !empty($row['fecha_response_req3_c']) && $row['fecha_response_req3_c'] !== '0000-00-00' && $row['fecha_response_req3_c'] !== '0000-00-00 00:00:00'  ? date_format($aux, $dateformat) : '';


			$visa_id = $row['visa_id'];
			$visa_name = $row['visa_name'];
			//$bean->virtual_visa_c = $row['visa_name'];
			$bean->virtual_visa_c = "<a href='/index.php?action=ajaxui#ajaxUILoc=index.php%3Fmodule%3DVeta_Visa%26offset%3D1%26stamp%3D1669409324088543100%26return_module%3DVeta_Visa%26action%3DEditView%26record%3D$visa_id' target='_blank'>$visa_name</a>";


			if ((isset($row['fecha_aplicacion'])) and (($row['fecha_aplicacion']) != "")) {
				$visa_aplication_date = substr($row['fecha_aplicacion'], 0, 10);
				error_log("visa aplicacion - " . $visa_aplication_date);
				$bean->db->query("UPDATE opportunities_cstm SET fecha_aplicacion_visa_c = '" . $visa_aplication_date . "' WHERE id_c = '" . $bean->id . "'");
			}
		}
	}

	public function create_note_pre($bean)
	{
		if (!empty($bean->virtual_note)) {
			$bean->note = new Note();
			$bean->note->description = $bean->virtual_note;
			
			$detalle = json_decode($bean->detalle_semaforizacion_c,true);

			if (is_null($detalle))
				$detalle = [];

			unset($detalle["documentos_$bean->id"]);

			if (!count(get_object_vars($detalle))) {
				$bean->estado_semaforizacion_c = 'Verde';
			}
	
			$bean->detalle_semaforizacion_c = json_encode($detalle);
			
			$bean->virtual_note = '';
		}
	}

	public function create_note_post($bean)
	{
		global $current_user;
		if (!empty($bean->note)) {

			$query = "SELECT rc.veta_recibo_contactscontacts_ida as id
			FROM veta_recibo_opportunities_c ro 
			JOIN veta_recibo_contacts_c rc ON rc.veta_recibo_contactsveta_recibo_idb=ro.veta_recibo_opportunitiesveta_recibo_ida
			WHERE ro.veta_recibo_opportunitiesopportunities_idb = '" . $bean->id . "'";

			$result = $bean->db->query(
				$query,
				true,
				"Error obteniendo informacion del contacto asociado al Presupuesto " . $bean->id
			);

			$row    = $bean->db->fetchByAssoc($result);

			$bean->note->parent_type = 'Opportunities';
			$bean->note->parent_id = $bean->id;
			$bean->note->assigned_user_id = $current_user->id;
			$now = date('Y-m-d H:i:s');
			$bean->note->name = "Nota $bean->name $now";
			$bean->note->contact_id = $row['id'];
			$bean->note->save();
		}
	}

	public function get_refunds($bean, $refund_to = false)
	{

		$q = "SELECT ro.veta_recibo_opportunitiesveta_recibo_ida as id_recibo
					FROM veta_recibo_opportunities_c ro 	
					WHERE ro.veta_recibo_opportunitiesopportunities_idb = '" . $bean->id . "'";

		$result = $bean->db->query($q, true, "Error obteniendo informacion del requerimiento asociado a la oportunidad " . $bean->id);
		$row = $bean->db->fetchByAssoc($result);

		$recibo = new Veta_Recibo();
		//$recibo = null;

		if ($row != null) {

			$recibo->retrieve($row['id_recibo']);
		}

		$refunds = $recibo->get_linked_beans('veta_recibo_conta_refunds_1', 'Conta_refunds');
		$total_refunds = 0;

		foreach ($refunds as $a) {
			//if($a->refund_to == $refund_to) {				
			if ($a->category_c == 'MMM_Professional_Fees') {

				$total_refunds = ($total_refunds * 1) + ($a->amount * 1);
			}
		}
		//error_log("Refund Alfonso - opportunities.php - ". $total_refunds);

		return 0;
		//return $total_refunds;
	}
}
