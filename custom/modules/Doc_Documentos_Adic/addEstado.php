<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

/*
 * Copyright 2014 BoredWookie
 *
 * Special thanks to this guy: http://cheleguanaco.blogspot.de/2009/06/simple-sugarcrm-logic-hook-example.html
 *
 * License: MIT
 * Disclaimer: For educational purposes, be sure you know what you are doing!
 */

// This class deals with attaching a URL to the case so the agent can generate a work agreement

require_once('modules/Veta_Presupuesto/clases/Media.php');
require_once('modules/EmailTemplates/EmailTemplate.php');
require_once('include/phpmailer/class.phpmailer.php');


class addEstadoClass
{

	function commentInput($bean)
	{
		$bean->document_comment_c = "<input id='document_comment_c_$bean->id' type = 'text' placeholder='$bean->document_comment_c'/>";
		//$bean->change_status_c =  "<input type='checkbox' id='change_status_c_$bean->id' name='change_status_c_$bean->id' class='change_status_c_checkbox' value='0'>";

	}

	function changeUrl($bean)
	{
		if ((isset($bean->url)) and ($bean->url != '')) {
			//$bean->url = "<a href='$bean->url' target='_blank'>$bean->name</a>";
			$bean->url = "<a href='$bean->url' target='_blank'>Document Link</a>";
			$bean->change_status_c =  "<input type='checkbox' id='change_status_c_$bean->id' name='change_status_c_$bean->id' class='change_status_c_checkbox' value='0'>";
		}
	}

	function addEstado($bean, $event, $arguments)
	{
		if ($bean->fetched_row['estadodocumento'] !== $bean->estadodocumento)
			$this->approveFile($bean);
		$this->notify_doc($bean);

		$idDocumento = $bean->id;

		if ($bean->fetched_row == false) {


			$sqlUpdate = "UPDATE doc_documentos_adic set estadodocumento = 'Pendiente' where id='" . $idDocumento . "'";
			if (
				($bean->estado_de_visa_c != 'New_Additional_Doc') and
				($bean->estado_de_visa_c != 'New_RFI_Document')
			) {
				$bean->estadodocumento = 'Aprobado';
				$sqlUpdate = "UPDATE doc_documentos_adic set estadodocumento = 'Aprobado' where id='" . $idDocumento . "'";
			}



			$GLOBALS['db']->query($sqlUpdate);
		}
		logerror(["estadodocumento addEstado", $bean->estadodocumento]);
	}


	function approveFile($bean)
	{

		$url = 'http://127.0.0.1:8080/';

		switch ($bean->estadodocumento) {
			case 'Rechazado':
				$url .= 'reject';
				break;
			case 'Revising':
				$url .= 'revise';
				break;
			case 'Aprobado':
				break;

			default:
				return;
		}

		$q = "SELECT
				ds.id,
				ds.name AS file_name,
				mds.name AS module_number,
				mds.type AS module_name,
				mds.date_entered as workflow_creation_date,
				l.id AS lead_name
			FROM
				doc_documentos_adic ds
				JOIN (
					SELECT
						o.name,
						o.date_entered,
						'Workflow' AS type,
						doc_documentos_adic_opportunitiesdoc_documentos_adic_ida AS docid,
						rl.veta_recibo_leadsleads_ida AS leadid
					FROM
						doc_documentos_adic_opportunities_c dso
						JOIN opportunities o ON o.id = dso.doc_documentos_adic_opportunitiesopportunities_idb
						JOIN veta_recibo_opportunities_c ro ON ro.veta_recibo_opportunitiesopportunities_idb = o.id
						JOIN veta_recibo_leads_c rl ON rl.veta_recibo_leadsveta_recibo_idb = ro.veta_recibo_opportunitiesveta_recibo_ida
					union
					SELECT
						r.name,
						r.date_entered,
						'Requeriment' AS type,
						rds.veta_requerimiento_doc_documentos_adic_1doc_documentos_adic_idb AS docid,
						rql.veta_requerimiento_leadsleads_ida AS leadid
					FROM
						veta_requerimiento_doc_documentos_adic_1_c rds
						JOIN veta_requerimiento r ON r.id = rds.veta_requerimiento_doc_documentos_adic_1veta_requerimiento_ida
						JOIN veta_requerimiento_leads_c rql ON rql.veta_requerimiento_leadsveta_requerimiento_idb = r.id
				) mds ON mds.docid = ds.id
				JOIN leads l ON l.id = mds.leadid
			WHERE ds.id = '$bean->id'";

		$res = $bean->db->query($q);

		$folder = $bean->estado_de_visa_c == "New_RFI_Document" ? 'RFI Docs' : 'Additional Docs';
		
		$checklist_query = "
			SELECT checklist_name_c 
			FROM doc_documentos_adic_cstm 
			WHERE id_c = '{$bean->id}'
		";

		$res_checklist = $bean->db->query($checklist_query);

		$checklist_name = null;

		// Obtener el resultado
		if ($row = $bean->db->fetchByAssoc($res_checklist)) {
			$checklist_name = $row['checklist_name_c'];
		}

		// Validar y asignar folder
		if (!empty($checklist_name)) {
			$folder = $checklist_name;
		}
		
		
		logerror($folder);
		if ($row = $bean->db->fetchByAssoc($res)) {


			// if ($row['module_number'] == '233') {
			// if ($row['module_number'] == '233' || (substr($row['workflow_creation_date'], 0, 10) >= "2022-03-08" && $row['module_name'] === 'Worflow')) {
			if (isset($bean->requested_to_c) and ($bean->requested_to_c == '') || $bean->requested_to_c == 'Applicant') {
				$requestTo = "Applicant";
			}

			if ($bean->requested_to_c == 'Company') {
				$requestTo = "Company";
			}
			// }
			$data = [
				"fileName" => $row['file_name'],
				"moduleName" => $row['module_name'],
				"moduleNumber" => $row['module_number'],
				"templates" => [$folder],
				"leadName" => $row['lead_name'],
				"requestTo" => $requestTo,
				"use_sharepoint" => true
			];

			// if ($row['module_number'] === '233') {
			$data["status"] = $bean->fetched_row['estadodocumento'];
			// }
		}

		while ($row = $bean->db->fetchByAssoc($res)) {
			$data['templates'][] = $folder;
		}


		$additional_headers = array(
			'Accept: application/json',
			'Content-Type: application/json'
		);
		logerror("approveFile", $url, $data);

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $additional_headers);

		$server_output = curl_exec($ch);











		$q = "SELECT
				ds.id,
				ds.name AS file_name,
				mds.name AS module_number,
				mds.type AS module_name,
				mds.date_entered as workflow_creation_date,
				trim(concat(ifnull(l.first_name, ''), ' ', l.last_name)) AS lead_name
			FROM
				doc_documentos_adic ds
				JOIN (
					SELECT
						o.name,
						o.date_entered,
						'Workflow' AS type,
						doc_documentos_adic_opportunitiesdoc_documentos_adic_ida AS docid,
						rl.veta_recibo_leadsleads_ida AS leadid
					FROM
						doc_documentos_adic_opportunities_c dso
						JOIN opportunities o ON o.id = dso.doc_documentos_adic_opportunitiesopportunities_idb
						JOIN veta_recibo_opportunities_c ro ON ro.veta_recibo_opportunitiesopportunities_idb = o.id
						JOIN veta_recibo_leads_c rl ON rl.veta_recibo_leadsveta_recibo_idb = ro.veta_recibo_opportunitiesveta_recibo_ida
					union
					SELECT
						r.name,
						r.date_entered,
						'Requeriment' AS type,
						rds.veta_requerimiento_doc_documentos_adic_1doc_documentos_adic_idb AS docid,
						rql.veta_requerimiento_leadsleads_ida AS leadid
					FROM
						veta_requerimiento_doc_documentos_adic_1_c rds
						JOIN veta_requerimiento r ON r.id = rds.veta_requerimiento_doc_documentos_adic_1veta_requerimiento_ida
						JOIN veta_requerimiento_leads_c rql ON rql.veta_requerimiento_leadsveta_requerimiento_idb = r.id
				) mds ON mds.docid = ds.id
				JOIN leads l ON l.id = mds.leadid
			WHERE ds.id = '$bean->id'";

		$res = $bean->db->query($q);

		if ($row = $bean->db->fetchByAssoc($res)) {

			// if ($row['module_number'] == '233') {
			// if ($row['module_number'] == '233' || (substr($row['workflow_creation_date'], 0, 10) >= "2022-03-08" && $row['module_name'] === 'Worflow')) {
			if (isset($bean->requested_to_c) and ($bean->requested_to_c == '') || $bean->requested_to_c == 'Applicant') {
				$requestTo = "Applicant";
			}

			if ($bean->requested_to_c == 'Company') {
				$requestTo = "Company";
			}
			// }

			$data = [
				"fileName" => $row['file_name'],
				"moduleName" => $row['module_name'],
				"moduleNumber" => $row['module_number'],
				"templates" => [$folder],
				"leadName" => $row['lead_name'],
				"requestTo" => $requestTo,
				"use_sharepoint" => true
			];
			// if ($row['module_number'] === '233') {
			$data["status"] = $bean->fetched_row['estadodocumento'];
			// }
		}

		while ($row = $bean->db->fetchByAssoc($res)) {
			$data['templates'][] = $folder;
		}


		$additional_headers = array(
			'Accept: application/json',
			'Content-Type: application/json'
		);
		logerror($data);

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $additional_headers);

		$server_output = curl_exec($ch);
	}

	function prepareApplicationAcknowledmentLetter($bean, $lead, $opportunity, $template, $template2 = null)
	{
		//Busca detalle recibo y requerimiento
		$r = $opportunity->get_linked_beans('veta_recibo_opportunities', 'Veta_Recibo');
		$recibo = $r[0];
		if (is_null($recibo)) {
			logerror('is_null($recibo)');
			return;
		}

		$dr = $recibo->get_linked_beans('veta_detallerecibo_veta_recibo', 'Veta_DetalleRecibo');
		$visa_subclass = $dr[0];
		if (is_null($visa_subclass)) {
			logerror('is_null($visa_subclass)');

			return;
		}

		$curso = new Veta_Curso();
		$curso->retrieve($visa_subclass->veta_curso_id_c);

		$req = $recibo->get_linked_beans('veta_detallerecibo_veta_recibo', 'Veta_DetalleRecibo');
		$requierement = $req[0];
		if (is_null($requierement)) {
			logerror('is_null($requierement)');
			return;
		}

		$requermimento_presupuesto = $recibo->get_linked_beans('veta_requerimiento_veta_recibo', 'Veta_Recibo');
		$id_requermimiento = "";
		foreach ($requermimento_presupuesto as $req_pre) {
			$id_requermimiento = $req_pre->id;
		}


		$requeriment = new Veta_Requerimiento();
		$requeriment->retrieve($id_requermimiento);

		$company = new NVC_Companies;
		$company->retrieve($requeriment->nvc_companies_veta_requerimiento_1nvc_companies_ida);

		$caseManager = new User();
		$caseManager->retrieve($opportunity->user_id3_c);

		if ($caseManager->status == 'Inactive') {
			if ($opportunity->name == '233') {
				$caseManager->retrieve("c5da6f79-e3de-2d8f-f42b-60d6505f50c2");
				error_log("CORREO ENVIADO 233 dentro de la function a nombre de " . $caseManager->first_name);
			} else {
				$caseManager->retrieve("13c7773f-3825-2926-aeff-620d486536e6");
			}
		}






		$docNameLink = '';

		//Busca doc Bridging_Visa_A_Grant_Letter
		$grantvisa = $opportunity->get_linked_beans('doc_documentos_adic_opportunities', 'Doc_Documentos_Adic', '', 0, -1, 0, "estado_de_visa_c LIKE 'Bridging_Visa_A_Grant_Letter%'");

		$grantvisaReplace = [];

		foreach ($grantvisa as $additionalDoc) {
			$grantvisaReplace[] = "<a href='$additionalDoc->url'> $additionalDoc->estado_de_visa_c</a>";
		}
		//Plantilla para Visa_Application_Acknowledgement_Letter
		//$templateId = '83841b3a-557c-2047-b386-633c6144f25d';

		$doc = new Doc_Documentos_Adic();
		$doc->retrieve($bean->id);

		$rfi_type_text = '';
		$document = $doc->name;
		$document_url = $doc->url;




		if ($doc->rfi_type_c == 'Police_Check') {
			$rfi_type_text = "- AFP with your name on the passport checked: <br />
								Australian Federal Police (AFP) check - please follow this link to apply online
								<a href='https://www.afp.gov.au/what-we-do/services/criminal-records/national-police-checks' target='_blank'>https://www.afp.gov.au/what-we-do/services/criminal-records/national-police-checks</a><br />
								Please note the following when applying:<br />
								Question 2.3<br/>
								Purpose Type - Commonwealth Employment/Purpose<br/>
								Purpose of check - Code 33";
			/*
			$document = '';
			$document_url = '';
			*/
			$document = "Police Check";
		} else if ($doc->rfi_type_c == 'Medical_Examination') {
			$rfi_type_text = "- Health examinations<br/> 
								Please find attached your eMedical Referral Letter. You can use the following link to book your appointment at a time and location convenient for you: <a href='http://www.bupamvs.com.au/' target='_blank'>http://www.bupamvs.com.au/</a>. Please take the letters and your passports with you on the day to the examinations. Once completed, the Department of Immigration will be automatically notified of your attendance and the results. Kindly forward us the health exam booking confirmations and/or receipts for our records.";
			$document = "eMedical Referral Letter";
		}

		$docNameLink = "<br/><a href='$document_url'>- $document</a>";



		$new_expiration_date = $doc->new_expiration_date_c;
		$new_granted_date = $doc->granted_date_c;



		if ($opportunity->name == '233') {


			$sql = "SELECT vetaVisa.idVisa as idVisa,veta_visa.name , veta_visa.estado
					from veta_visa, (SELECT  vetaOP.veta_visa_opportunitiesveta_visa_idb as idVisa
					FROM vetacrm2.doc_documentos_adic  as docAdic
					join  doc_documentos_adic_opportunities_c as docAdicOp on docAdic.id = docAdicOp.doc_documentos_adic_opportunitiesdoc_documentos_adic_ida
					join veta_visa_opportunities_c as vetaOP on vetaOP.veta_visa_opportunitiesopportunities_ida = docAdicOp.doc_documentos_adic_opportunitiesopportunities_idb
					where docAdic.id = '$bean->id') as vetaVisa
					where vetaVisa.idVisa = veta_visa.id
					and veta_visa.deleted = 0";

			$respuesta = $bean->db->query($sql);

			if ($row = $bean->db->fetchByAssoc($respuesta)) {

				$visaId = $row['idVisa'];
				$visa = new Veta_Visa();
				$visa->retrieve($visaId);

				if (($bean->estado_de_visa_c == 'Visa_Granted_Letter_Secondary_Applicant')
					or ($bean->estado_de_visa_c == 'Visa_Granted_Letter_First_Dependant')
					or ($bean->estado_de_visa_c == 'Visa_Granted_Letter_Second_Dependant')
					or ($bean->estado_de_visa_c == 'Visa_Granted_Letter_Third_Dependant')
				) {

					$new_expiration_date = substr($visa->fecha_expiracion, 0, 10);
					$new_granted_date = substr($visa->fecha_otorgada, 0, 10);
				}
			}
		}










		$visaSubClassName = $visa_subclass->name;

		if ((isset($curso->display_name_c)) and ($curso->display_name_c != '')) {
			$visaSubClassName = $curso->display_name_c;
		}


		$employerContactName = $company->name;

		if ((isset($company->company_contact_person_name)) and ($company->company_contact_person_name != '')) {
			$employerContactName = $company->company_contact_person_name;
		}


		if ((isset($curso->subclass_c)) and ($curso->subclass_c != '')) {
			if (($bean->estado_de_visa_c == "Nomination_Lodged") or ($bean->estado_de_visa_c == "Nomination_Approved")) {
				$visaSubClassName = $curso->subclass_c . " Nomination";
			}
		}

		//if ($opportunity->name == '233') {

		if ($bean->estado_de_visa_c ==  'Visa_Granted_Letter') {
			//[$templateId, $replace] = $this->prepareApplicationAcknowledmentLetter($bean, $lead, $opportunity, '84c70841-f5c1-de2f-4fef-63d826a8b4fa')
			//Busca doc Bridging_Visa_A_Grant_Letter
			$docs_adic = $opportunity->get_linked_beans('doc_documentos_adic_opportunities', 'Doc_Documentos_Adic');

			foreach ($docs_adic as $additionalDoc) {
				if (strpos($additionalDoc->name, "Visa_Granted_Letter") !== false && $additionalDoc->name != "Visa_Granted_Letter") {

					$docNameLink = $docNameLink . "<br/><a href='$additionalDoc->url'>- $additionalDoc->name</a>";
				}
			}
			error_log("AUTOMATICO - documentos adicionales " . count($docs_adic));






			$additional_note_granted = '';
			error_log("additional_note " . $curso->display_name_c);

			if (preg_match('/482|186|494|407/', $curso->display_name_c)) {
				error_log("additional_note dentro del si " . $curso->display_name_c);
				$additional_note_granted = "Please let your sponsor know that your visa has been granted so they are aware they need to commence and comply with their sponsorship obligations. Please provide your approval if you wish for us to contact your employer on your behalf to let them know that your visa has been granted.";
			}
			
			if (strpos($curso->display_name_c, '482') !== false) {
				$message_482 = "<strong style='color:red;'>IMPORTANT: IF YOU TAKE LEAVE WITHOUT PAY WHILST HOLDING THE 482 VISA, THIS WILL IMPACT THE TWO YEARS REQUIRED FOR THE 186 TRT.  IMMIGRATION WILL NOT ACCEPT LEAVE WITHOUT PAY TOWARDS THE TWO YEAR REQUIREMENT.</strong>";
			} else {
				$message_482 = '';
			}
		}

		//}

		/*
		$visa_subclass->subclass_c;
		$visa_subclass->tipovisa;
		$visa_subclass->process_type_c
		*/
		/*
		if (!empty($bean->alternative_email_name_c)) {
			$emailto = [$bean->alternative_email_name_c];
		}
		*/
		//Tags para reemplazar en la plantilla
		$replace = [
			'$applicant' => $lead->full_name,
			'$current_visa' => $requeriment->current_visa_subclass,
			'$visa_subclass' => $visaSubClassName,
			//'$employer' => $employerContactName,
			'$employer' => !empty($bean->alternative_email_name_c) ? $bean->alternative_email_name_c : $employerContactName,
			'$today' => date('d/m/Y'),
			'Visa Application Acknowledgement Letter' => "<a href='$doc->url'>Visa Application Acknowledgement Letter</a>",
			'Bridging Visa A Grant Letter' => implode("<br>", $grantvisaReplace),
			'$document' => $docNameLink,
			'$Document' => $docNameLink,
			'$granted_date_c' => $new_granted_date,
			'$new_expiration_date_c' => $new_expiration_date,
			'$rfi_deadline_date_c' => $doc->rfi_deadline_date_c,
			'$rfi_type_text' => $rfi_type_text,
			'$additional_note_granted' => $additional_note_granted,
			'$case_manager_name' => $caseManager->first_name,
			'$482_message' => $message_482,

		];

		return [$template, $replace];
	}

	function notify_doc($bean)
	{
		if (!empty($bean->fetched_row)) return;
		//Busca Workflow y lead
		$o = $bean->get_linked_beans('doc_documentos_adic_opportunities', 'Opportunity');
		$opportunity = $o[0];
		if (is_null($opportunity)) {
			logerror('is_null($opportunity)');
			return;
		}

		$l = $opportunity->get_linked_beans('leads_opportunities_1', 'Lead');
		$lead = $l[0];
		// if (is_null($lead)) {
		// 	logerror('is_null($lead)');
		// 	return;
		// }

		switch ($bean->estado_de_visa_c) {
			/*
			case  'Visa_Application_Acknowledgement_Letter':
				[$templateId, $replace] = $this->prepareApplicationAcknowledmentLetter($bean, $lead, $opportunity, '83841b3a-557c-2047-b386-633c6144f25d');
				break;
			*/
			
			
			case 'Visa_Application_Acknowledgement_Letter':
				// Template por defecto
				$tplId = '83841b3a-557c-2047-b386-633c6144f25d';

				// Si existe al menos un Bridging_Visa_C_Grant_Letter, usar el alterno
				$docs_adic = $opportunity->get_linked_beans(
					'doc_documentos_adic_opportunities',
					'Doc_Documentos_Adic',
					'',
					0,
					-1,
					0,
					"estado_de_visa_c LIKE 'Bridging_Visa_C_Grant_Letter%'"
				);

				if (!empty($docs_adic)) {
					$tplId = '9e6b6e73-a451-40af-c133-68f15acb18e0';
				}

				[$templateId, $replace] = $this->prepareApplicationAcknowledmentLetter($bean, $lead, $opportunity, $tplId);
				break;
	
	
	
	
	

			case  'Visa_Granted_Letter':
				[$templateId, $replace] = $this->prepareApplicationAcknowledmentLetter($bean, $lead, $opportunity, '84c70841-f5c1-de2f-4fef-63d826a8b4fa');
				break;


			/*
			case  'Visa_Granted_Letter_Secondary_Applicant':
				[$templateId, $replace] = $this->prepareApplicationAcknowledmentLetter($bean, $lead, $opportunity, '84c70841-f5c1-de2f-4fef-63d826a8b4fa');
				break;
			case  'Visa_Granted_Letter_First_Dependant':
				[$templateId, $replace] = $this->prepareApplicationAcknowledmentLetter($bean, $lead, $opportunity, '84c70841-f5c1-de2f-4fef-63d826a8b4fa');
				break;
			case  'Visa_Granted_Letter_Second_Dependant':
				[$templateId, $replace] = $this->prepareApplicationAcknowledmentLetter($bean, $lead, $opportunity, '84c70841-f5c1-de2f-4fef-63d826a8b4fa');
				break;
			case  'Visa_Granted_Letter_Third_Dependant':
				[$templateId, $replace] = $this->prepareApplicationAcknowledmentLetter($bean, $lead, $opportunity, '84c70841-f5c1-de2f-4fef-63d826a8b4fa');
				break;
			*/


			case  'LMT_Lodged':
				[$templateId, $replace] = $this->prepareApplicationAcknowledmentLetter($bean, $lead, $opportunity, '2ead0df7-6fd3-8662-0074-63f4db187a92');
				//return;
				break;
			case  'Nomination_Lodged':
				[$templateId, $replace] = $this->prepareApplicationAcknowledmentLetter($bean, $lead, $opportunity, '3c657658-75ce-d0b8-dfbd-63f5181776f4');
				//return;
				break;
			case  'Nomination_Approved':
				[$templateId, $replace] = $this->prepareApplicationAcknowledmentLetter($bean, $lead, $opportunity, 'b6b20df8-10dc-fbeb-8a05-63ff838f09c3');
				//return;
				break;
			case  'Skill_Assessment_Lodged':
				[$templateId, $replace] = $this->prepareApplicationAcknowledmentLetter($bean, $lead, $opportunity, '573a789e-5e09-14c8-c83b-63ff7fb5cc77');
				//return;
				break;
			case  'Skill_Assessment_Approved':
				[$templateId, $replace] = $this->prepareApplicationAcknowledmentLetter($bean, $lead, $opportunity, '8309dcd4-52a8-82b1-31da-63ff7f864c67');
				//return;
				break;
			case  'TAS_Lodged':
				[$templateId, $replace] = $this->prepareApplicationAcknowledmentLetter($bean, $lead, $opportunity, '2e0363cd-e688-3b74-44a5-63ff819a59d6');
				//return;
				break;
			case  'TAS_Approved':
				[$templateId, $replace] = $this->prepareApplicationAcknowledmentLetter($bean, $lead, $opportunity, '426330ba-251a-0554-2ee1-63ff81268d16');
				//return;
				break;
			case  'EOI_Lodged':
				[$templateId, $replace] = $this->prepareApplicationAcknowledmentLetter($bean, $lead, $opportunity, '464b1ff5-2479-8de0-a11e-63ffa70eeb2f');
				//return;
				break;
			case  'EOI_Approved':
				[$templateId, $replace] = $this->prepareApplicationAcknowledmentLetter($bean, $lead, $opportunity, '8f3927e0-8bde-eddb-df4c-63ffa78740c0');
				//return;
				break;

			case  'SBS_Lodged':
				[$templateId, $replace] = $this->prepareApplicationAcknowledmentLetter($bean, $lead, $opportunity, '6343312d-6c6b-6004-ef52-63e40b894ef2');
				//return;
				break;
			case  'SBS_Approved':
				[$templateId, $replace] = $this->prepareApplicationAcknowledmentLetter($bean, $lead, $opportunity, '15c80602-bff7-14cc-9a4b-63ff85f9712f');
				//return;
				break;
			case  'State_Nomination_Lodged':
				[$templateId, $replace] = $this->prepareApplicationAcknowledmentLetter($bean, $lead, $opportunity, '1ad4d117-b24c-95cb-a5ca-63ffa950e417');
				//return;
				break;
			case  'State_Nomination_Approved':
				[$templateId, $replace] = $this->prepareApplicationAcknowledmentLetter($bean, $lead, $opportunity, '1961c861-b954-bfb5-bd51-63ffa9ab6175');
				//return;
				break;
			case  'RCB_Lodged':
				[$templateId, $replace] = $this->prepareApplicationAcknowledmentLetter($bean, $lead, $opportunity, 'b10b312c-33b8-7960-f683-63ffd381c53d');
				//return;
				break;
			case  'RCB_Approved':
				[$templateId, $replace] = $this->prepareApplicationAcknowledmentLetter($bean, $lead, $opportunity, '823de11b-c480-6734-1bf8-63ffd4c9182f');
				//return;
				break;

			case  'RFI_1':
				[$templateId, $replace] = $this->prepareApplicationAcknowledmentLetter($bean, $lead, $opportunity, 'bf192832-cb0e-9d57-9033-63f8e3640dc8');
				//return;
				break;

			case  'RFI_2':
				[$templateId, $replace] = $this->prepareApplicationAcknowledmentLetter($bean, $lead, $opportunity, 'bf192832-cb0e-9d57-9033-63f8e3640dc8');
				//return;
				break;

			case  'RFI_3':
				[$templateId, $replace] = $this->prepareApplicationAcknowledmentLetter($bean, $lead, $opportunity, 'bf192832-cb0e-9d57-9033-63f8e3640dc8');
				//return;
				break;

			case  'RFI_4':
				[$templateId, $replace] = $this->prepareApplicationAcknowledmentLetter($bean, $lead, $opportunity, 'bf192832-cb0e-9d57-9033-63f8e3640dc8');
				//return;
				break;

			case  'RFI_5':
				[$templateId, $replace] = $this->prepareApplicationAcknowledmentLetter($bean, $lead, $opportunity, 'bf192832-cb0e-9d57-9033-63f8e3640dc8');
				//return;
				break;


			case  'Labor_Agreement_Lodged':
				[$templateId, $replace] = $this->prepareApplicationAcknowledmentLetter($bean, $lead, $opportunity, 'Labor_Agreement_template_lodged');
				//return;
				break;
			case  'Labor_Agreement_Approved':
				[$templateId, $replace] = $this->prepareApplicationAcknowledmentLetter($bean, $lead, $opportunity, 'Labor_Agreement_template_granted');
				//return;
				break;
			case  'Endorsement_Lodged':
				[$templateId, $replace] = $this->prepareApplicationAcknowledmentLetter($bean, $lead, $opportunity, 'Endorsement_lodged');
				//return;
				break;
			case  'Endorsement_Approved':
				[$templateId, $replace] = $this->prepareApplicationAcknowledmentLetter($bean, $lead, $opportunity, 'Endorsement_granted');
				//return;
				break;
			
			case 'Bridging_Visa_A_Grant_Letter':
			case 'Bridging_Visa_A_Grant_Letter_Secondary_Applicant':
			case 'Bridging_Visa_A_Grant_Letter_First_Dependant':
			case 'Bridging_Visa_A_Grant_Letter_Secondary_Dependant':
			case 'Bridging_Visa_A_Grant_Letter_Third_Dependant':
			
                if ($bean->send_individual_email_for_bva_or_bvc_c != 1) {
                    return;
                }
                [$templateId, $replace] = $this->prepareApplicationAcknowledmentLetter($bean, $lead, $opportunity, 'a30d2b0f-68bd-9635-9d8b-68f6c732f8a0');
                break;
				
			case 'Bridging_Visa_C_Grant_Letter':
            case 'Bridging_Visa_C_Grant_Letter_Secondary_Applicant':
            case 'Bridging_Visa_C_Grant_Letter_First_Dependant':
            case 'Bridging_Visa_C_Grant_Letter_Secondary_Dependant':
            case 'Bridging_Visa_C_Grant_Letter_Third_Dependant':
                
                if ($bean->send_individual_email_for_bva_or_bvc_c != 1) {
                    return;
                }

                // 2. Usar la NUEVA plantilla para BVC
                [$templateId, $replace] = $this->prepareApplicationAcknowledmentLetter($bean, $lead, $opportunity, '1ec00229-e8d2-ac1d-f62c-690d1cc4d75d');
                break;

			default:
				return;
				break;
		}

		//Crea objeto de email


		//Busca detalle recibo y requerimiento
		$r = $opportunity->get_linked_beans('veta_recibo_opportunities', 'Veta_Recibo');
		$recibo = $r[0];
		if (is_null($recibo)) {
			logerror('is_null($recibo)');
			return;
		}

		$dr = $recibo->get_linked_beans('veta_detallerecibo_veta_recibo', 'Veta_DetalleRecibo');
		$visa_subclass = $dr[0];
		if (is_null($visa_subclass)) {
			logerror('is_null($visa_subclass)');
			return;
		}

		$req = $recibo->get_linked_beans('veta_detallerecibo_veta_recibo', 'Veta_DetalleRecibo');
		$requierement = $req[0];
		if (is_null($requierement)) {
			logerror('is_null($requierement)');
			return;
		}

		$requermimento_presupuesto = $recibo->get_linked_beans('veta_requerimiento_veta_recibo', 'Veta_Recibo');
		$id_requermimiento = "";
		foreach ($requermimento_presupuesto as $req_pre) {
			$id_requermimiento = $req_pre->id;
		}


		$requeriment = new Veta_Requerimiento();
		$requeriment->retrieve($id_requermimiento);

		$company = new NVC_Companies;
		$company->retrieve($requeriment->nvc_companies_veta_requerimiento_1nvc_companies_ida);





		$send_email = true;
		$emailto = [$lead->email1];

		if (
			($bean->estado_de_visa_c == "LMT_Lodged") or
			($bean->estado_de_visa_c == "Nomination_Lodged") or
			($bean->estado_de_visa_c == "Nomination_Approved") or
			($bean->estado_de_visa_c == "SBS_Lodged") or
			($bean->estado_de_visa_c == "SBS_Approved") or
			($bean->estado_de_visa_c == "TAS_Lodged") or
			($bean->estado_de_visa_c == "TAS_Approved") or
			/*
			($bean->estado_de_visa_c == "Endorsement_Lodged") or
			($bean->estado_de_visa_c == "Endorsement_Approved") or
			($bean->estado_de_visa_c == "Labor_Agreement_Lodged") or
			($bean->estado_de_visa_c == "Labor_Agreement_Approved") or
			*/

			($bean->estado_de_visa_c == "RCB_Lodged") or
			($bean->estado_de_visa_c == "RCB_Approved")

		) {
			$emailto = [$company->email1];
		} elseif (!$lead) {
			return;
		}

		if (!empty($bean->alternative_email_c)) {
			$emailto = [$bean->alternative_email_c];
		}


		logerror("addestado_notify_doc", $emailto, $company->id, $bean->estado_de_visa_c);
		if (($bean->rfi_type_c == "Military_Record") or ($bean->rfi_type_c == "Exotic") or ($bean->rfi_type_c == "Other") or ($bean->rfi_type_c == "Police_check_Medical_Examination_Military_record")
			or ($bean->estado_de_visa_c == 'BVB_Lodge')
		) {
			$send_email = false;
		}

		/*
		$sql = "SELECT vetaVisa.idVisa as idVisa,veta_visa.name , veta_visa.estado
			from veta_visa, (SELECT  vetaOP.veta_visa_opportunitiesveta_visa_idb as idVisa
			FROM vetacrm2.doc_documentos_adic  as docAdic
			join  doc_documentos_adic_opportunities_c as docAdicOp on docAdic.id = docAdicOp.doc_documentos_adic_opportunitiesdoc_documentos_adic_ida
			join veta_visa_opportunities_c as vetaOP on vetaOP.veta_visa_opportunitiesopportunities_ida = docAdicOp.doc_documentos_adic_opportunitiesopportunities_idb
			where docAdic.id = '$bean->id') as vetaVisa
			where vetaVisa.idVisa = veta_visa.id
			and veta_visa.deleted = 0";

		$respuesta = $bean->db->query($sql);

		if ($row = $bean->db->fetchByAssoc($respuesta)) {		

			$visaId = $row['idVisa'];
			$visa = new Veta_Visa();
			$visa->retrieve($visaId);

			error_log("VALIDACION VISA ". $visa->id);
			if (
				($visa->lmt_notification_c == "1") or
				($visa->roi_notification_c == "1") or
				($visa->rcb_notification_c == "1") or
				($visa->sbs_notification_c == "1") or
				($visa->tas_notification_c == "1") or
				($visa->eoi_notification_c == "1") or
				($visa->nomination_notification_c == "1") or
				($visa->skill_assessment_notification_c == "1") or
				($visa->state_aomination_notification_c == "1") or

				($visa->lmt_notification_approved_c == "1") or
				($visa->roi_notification_approved_c == "1") or
				($visa->rcb_notification_approved_c == "1") or
				($visa->sbs_notification_approved_c == "1") or
				($visa->tas_notification_approved_c == "1") or
				($visa->eoi_notification_approved_c == "1") or
				($visa->nomination_notification_approved_c == "1") or
				($visa->skill_assessment_notification_approved_c == "1") or
				($visa->state_nomination_notification_approved_c == "1")
			) {
				error_log("VALIDACION NO SE ENVIA EMAIL");
				$send_email = false;
			}

		}
		*/


		if ($opportunity->name == '233') {
			//[$templateId, $replace] = $this->prepareApplicationAcknowledmentLetter($bean, $lead, $opportunity, 'b5a987b7-75da-b684-0863-64275dd5fb3d');
		}


		$email = Media::prepare_email_from_template(null, $emailto, $templateId, $replace);

		//CC a case manager
		$caseManager = new User();
		$caseManager->retrieve($opportunity->user_id3_c);

		$customerServices = new User();
		$customerServices->retrieve($opportunity->user_id2_c);



		if ($caseManager->status == 'Inactive') {
			if ($opportunity->name == '233') {
				$caseManager->retrieve("c5da6f79-e3de-2d8f-f42b-60d6505f50c2");
				error_log("CORREO ENVIADO 233 fuera de la function a nombre de " . $caseManager->first_name);
			} else {
				$caseManager->retrieve("13c7773f-3825-2926-aeff-620d486536e6");
			}
		}






		$emailFrom = $caseManager->email1;

		if ($opportunity->name == '233') {
			if (!isset($emailFrom) || $emailFrom == null || $emailFrom == '') {
				$caseManager->retrieve("13c7773f-3825-2926-aeff-620d486536e6"); // email Melanie           
				//$caseManager->retrieve("c5da6f79-e3de-2d8f-f42b-60d6505f50c2"); //Super
				$emailFrom = $caseManager->email1;
			}
		}

		error_log("VALIDACION - CASEMANAGER EMAIL " . $emailFrom);



		if (($bean->estado_de_visa_c == 'RFI_1') or ($bean->estado_de_visa_c == 'RFI_2') or ($bean->estado_de_visa_c == 'RFI_3') or ($bean->estado_de_visa_c == 'RFI_4') or ($bean->estado_de_visa_c == 'RFI_5')) {
			$emailFrom = $customerServices->email1;
			error_log("Asignacion de email " . $customerServices->email1);
		}




		error_log("VISAGRANTED Afuera del si");




		$email->AddCC($caseManager->email1);

		//Enviar Confirmacion de Visa Granted Letter a TWG
		if (($company->id == '2a4a474e-f55a-fc10-9cde-61f45ec31026' || $company->id == '233a52f1-8022-c97f-5b63-61f45e3b784e') && $bean->estado_de_visa_c == "Visa_Granted_Letter") {
			$email->AddCC("HR@trippaswhitegroup.com.au");
			//$email->AddCC("sharon.sin@trippaswhitegroup.com.au");
			$email->AddCC("junice.liu@trippaswhitegroup.com.au");
			$email->AddCC("craig.nicholson@trippaswhitegroup.com.au");
			
		}
		
		//Enviar Confirmacion de Visa Granted Letter a Alliance Opco Resources
		if (($company->id == 'ca383701-b95d-17f7-be33-63688921cb31') && $bean->estado_de_visa_c == "Visa_Granted_Letter") {
			$email->AddCC("HR@trippaswhitegroup.com.au");			
			$email->AddCC("junice.liu@trippaswhitegroup.com.au");
			
		}
		
		//Enviar Confirmacion de Visa Granted Letter a GREEN LEAVES
		if (($company->id == 'ac4cb4de-73f4-27c5-04d2-66b03daee439' || $company->id == 'd0611915-95d2-e0c7-08df-6631843177bc') && $bean->estado_de_visa_c == "Visa_Granted_Letter") {
			$email->AddCC("louise@greenleavesgroup.com.au");			
		}
		
		
		if (($company->id == 'ee1455f1-42e4-f377-f7b5-68d24b869dec' || $company->id == '9b4e774c-498e-eaae-a108-68d2491e28ef') && $bean->estado_de_visa_c == "Visa_Granted_Letter") {
			$email->AddCC("reem.nadaw@gmail.com");
			$email->AddCC("yassnada67@gmail.com");
		}


		$email->AddBCC("visas_department@mmmigration.com.au"); 
		// $email->addReplyTo($caseManager->email1);

		$email->From = $emailFrom;





		//if ($opportunity->name == '233') { 

		$doc_name_attach = $bean->estado_de_visa_c;
		if ($bean->rfi_type_c != '') {
			$doc_name_attach = $bean->rfi_type_c;
		}

		$email->AddAttachment("/var/www/crm.australiaveta.com.develop/upload/" . $bean->id, $doc_name_attach  . "." . $bean->file_ext, 'base64', $bean->file_mime_type);

		if ($bean->estado_de_visa_c ==  'Visa_Granted_Letter') {

			$docs_adic = $opportunity->get_linked_beans('doc_documentos_adic_opportunities', 'Doc_Documentos_Adic');

			foreach ($docs_adic as $additionalDoc) {
				if (strpos($additionalDoc->name, "Visa_Granted_Letter") !== false && $additionalDoc->name != "Visa_Granted_Letter") {
					$email->AddAttachment("/var/www/crm.australiaveta.com.develop/upload/" . $additionalDoc->id, $additionalDoc->name . "." . $additionalDoc->file_ext, 'base64', $additionalDoc->file_mime_type);
				}
			}
		}

		if ($bean->estado_de_visa_c == 'Visa_Application_Acknowledgement_Letter') {
			//Busca doc Bridging_Visa_A_Grant_Letter
			$docs_adic = $opportunity->get_linked_beans('doc_documentos_adic_opportunities', 'Doc_Documentos_Adic', '', 0, -1, 0, "estado_de_visa_c LIKE 'Bridging_Visa_A_Grant_Letter%'");


			foreach ($docs_adic as $additionalDoc) {
				$email->AddAttachment("/var/www/crm.australiaveta.com.develop/upload/" . $additionalDoc->id, $additionalDoc->name . "." . $additionalDoc->file_ext, 'base64', $additionalDoc->file_mime_type);
			}
			
			//Busca doc Bridging_Visa_C_Grant_Letter
			$docs_adic = $opportunity->get_linked_beans('doc_documentos_adic_opportunities', 'Doc_Documentos_Adic', '', 0, -1, 0, "estado_de_visa_c LIKE 'Bridging_Visa_C_Grant_Letter%'");


			foreach ($docs_adic as $additionalDoc) {
				$email->AddAttachment("/var/www/crm.australiaveta.com.develop/upload/" . $additionalDoc->id, $additionalDoc->name . "." . $additionalDoc->file_ext, 'base64', $additionalDoc->file_mime_type);
			}
		} else {
			if ($bean->send_individual_email_for_bva_or_bvc_c == 1) {
				//Busca doc Bridging_Visa_A_Grant_Letter
				$docs_adic = $opportunity->get_linked_beans('doc_documentos_adic_opportunities', 'Doc_Documentos_Adic', '', 0, -1, 0, "estado_de_visa_c LIKE 'Bridging_Visa_A_Grant_Letter%'");


				foreach ($docs_adic as $additionalDoc) {
					$email->AddAttachment("/var/www/crm.australiaveta.com.develop/upload/" . $additionalDoc->id, $additionalDoc->name . "." . $additionalDoc->file_ext, 'base64', $additionalDoc->file_mime_type);
				}
				
				//Busca doc Bridging_Visa_C_Grant_Letter
				$docs_adic = $opportunity->get_linked_beans('doc_documentos_adic_opportunities', 'Doc_Documentos_Adic', '', 0, -1, 0, "estado_de_visa_c LIKE 'Bridging_Visa_C_Grant_Letter%'");


				foreach ($docs_adic as $additionalDoc) {
					$email->AddAttachment("/var/www/crm.australiaveta.com.develop/upload/" . $additionalDoc->id, $additionalDoc->name . "." . $additionalDoc->file_ext, 'base64', $additionalDoc->file_mime_type);
				}
			}
		}


		
		if ((isset($requeriment->leap_id)) and ($requeriment->leap_id != '')) { 
			$email->Subject = $email->Subject . " - Leap ID " .  $requeriment->leap_id;
		}
		
		//Envia correo
		if ($send_email) {
			if ($email->send()) {

				//Logea en historial
				crear_email($opportunity, $email, true);
				logerror("Correo enviado");
				error_log("PROBLEMA - SE ENVIO CORREO DE " . $emailFrom);
			} else {
				logerror(["Correo no enviado", $email->ErrorInfo]);
				error_log("PROBLEMA - NO ENVIO CORREO DE " . $emailFrom);
			}
		}
	}

	function post_save($bean)
	{
		$this->uploadFile($bean);
		$this->addEstado($bean);
	}

	function uploadFile($bean)
	{
		global $current_user;

		error_log("AUTOMATIZACION entro");


		error_log("CARGA - INGRESO " . $bean->id . "NOMBRE DOCUMENTO ADICIONAL " . $bean->estado_de_visa_c);

		if (!empty($bean->url)) return;

		$idDocumento = $bean->id;

		$workflow = new Opportunity();
		$workflow->retrieve($_REQUEST['relate_id']);

		error_log("CARGA - WORKFLOW " . $workflow->id);

		$file_extension = '';
		$doc_name = "";


		if ($bean->estado_de_visa_c != '' || $bean->estado_de_visa_c != null) {

			$url = 'http://127.0.0.1:8080/upload';

			$q = "SELECT
					ds.id,
					ds.name AS file_name,
                    ds.file_ext AS file_ext,
					mds.name AS module_number,
					mds.type AS module_name,
					trim(concat(ifnull(l.first_name, ''), ' ', l.last_name)) AS lead_name,
                    l.id as lead_id,
					mds.date_entered as workflow_creation_date
				FROM
					doc_documentos_adic ds
					JOIN (
						SELECT
							o.name,
							o.date_entered,
							'Workflow' AS type,
							doc_documentos_adic_opportunitiesdoc_documentos_adic_ida AS docid,
							rl.veta_recibo_leadsleads_ida AS leadid
						FROM
							doc_documentos_adic_opportunities_c dso
							JOIN opportunities o ON o.id = dso.doc_documentos_adic_opportunitiesopportunities_idb
							JOIN veta_recibo_opportunities_c ro ON ro.veta_recibo_opportunitiesopportunities_idb = o.id
							JOIN veta_recibo_leads_c rl ON rl.veta_recibo_leadsveta_recibo_idb = ro.veta_recibo_opportunitiesveta_recibo_ida                  
					) mds ON mds.docid = ds.id
					JOIN leads l ON l.id = mds.leadid
				WHERE ds.id = '$bean->id'";

			$res = $bean->db->query($q);


			if (($bean->estado_de_visa_c == "New_Additional_Doc") or ($bean->estado_de_visa_c == "New_RFI_Document")) {

				$doc_name = $bean->name;
				error_log("CARGA - entro documento nombre " . $doc_name);
			} else {
				$doc_name = $bean->estado_de_visa_c;
				error_log("CARGA - entro documento SELECCIONADO " . $doc_name);
			}

			logerror(["Antes de data set", $q]);

			$folder = $bean->estado_de_visa_c == "New_RFI_Document" ? 'RFI Docs' : 'Additional Docs';
			
			$res_checklist = $bean->db->query($checklist_query);

			$checklist_name = null;

			// Obtener el resultado
			if ($row = $bean->db->fetchByAssoc($res_checklist)) {
				$checklist_name = $row['checklist_name_c'];
			}

			// Validar y asignar folder
			if (!empty($checklist_name)) {
				$folder = $checklist_name;
			}

			$row = $bean->db->fetchByAssoc($res);
			if (!$row) {

				$q = "SELECT 
					ds.id,
					ds.name AS file_name,
					ds.file_ext AS file_ext,
					mds.name AS module_number,
					mds.type AS module_name,
					l.name AS lead_name,
					l.id AS lead_id,
					mds.date_entered AS workflow_creation_date
				FROM
					doc_documentos_adic ds
						JOIN
					(SELECT 
						o.name,
							o.date_entered,
							'Workflow' AS type,
							doc_documentos_adic_opportunitiesdoc_documentos_adic_ida AS docid,
							cr.nvc_companies_veta_requerimiento_1nvc_companies_ida AS leadid
					FROM
						doc_documentos_adic_opportunities_c dso
					JOIN opportunities o ON o.id = dso.doc_documentos_adic_opportunitiesopportunities_idb
					JOIN veta_recibo_opportunities_c ro ON ro.veta_recibo_opportunitiesopportunities_idb = o.id AND ro.deleted =0
								JOIN veta_requerimiento_veta_recibo_c rr ON rr.veta_requerimiento_veta_reciboveta_recibo_idb = ro.veta_recibo_opportunitiesveta_recibo_ida AND rr.deleted = 0
								join nvc_companies_veta_requerimiento_1_c cr on cr.nvc_companies_veta_requerimiento_1veta_requerimiento_idb = rr.veta_requerimiento_veta_reciboveta_requerimiento_ida
				
					
					
					) mds ON mds.docid = ds.id
						LEFT JOIN
					nvc_companies l ON l.id = mds.leadid
					WHERE ds.id = '$bean->id'";

				$res = $bean->db->query($q);
				$row = $bean->db->fetchByAssoc($res);
			}

			if ($row) {



				$requestTo = "";
				// if ($row['module_number'] == '233') {
				if (isset($bean->requested_to_c) and ($bean->requested_to_c == '') || $bean->requested_to_c == 'Applicant') {
					$requestTo = "Applicant";
				}

				if ($bean->requested_to_c == 'Company') {
					$requestTo = "Company";
				}
				// }




				error_log("CARGA - entro a la carga del documento SELECCIONADO " . $doc_name);
				$data = [
					"fileName" => $doc_name . "." . $row['file_ext'],
					"moduleName" => 'Workflow',
					"moduleNumber" => $row['module_number'],
					"templates" => [$folder],
					"leadName" => $row['lead_id'],
					"upload" => "/var/www/crm.australiaveta.com.develop/upload/" . $bean->id,
					"notAproved" => str_contains($bean->estado_de_visa_c, 'LOO'),
					"wait" => true,
					"use_sharepoint" => true,
					"requestTo" => $requestTo
				];

				// if ($row['module_number'] === '233') {
				$data["status"] = $bean->fetched_row['estadodocumento'];
				$data["upload_folder"] = "dont_touch";
				// }
				logerror(["En data set", $data, json_encode($data)]);
				$file_extension = $row['file_ext'];
			}
			//"docId" => $bean->id





			$additional_headers = array(
				'Accept: application/json',
				'Content-Type: application/json'
			);
			logerror($data);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $additional_headers);

			$server_output = curl_exec($ch);

			if ($doc_name == 'aplicacion' && empty($bean->fetched_row['url'])) {
				$this->loadAplicacion($bean);
			}

			error_log("CARGA - datos enviados a API - MODULE NUMBER " . $row['module_number'] . " - LEAD ID - " . $row['lead_id']);

			try {
				$out_parsed = json_decode($server_output);
				logerror($out_parsed);
				$one_drive_url = $out_parsed->url;
			} catch (\Throwable $th) {
				logerror($th);
				$media = new Media();
				$email = $media->prepare_user_mail();
				$email->Subject = utf8_decode("Falla en subida de doc adicional");
				$email->Body    = utf8_decode(html_entity_decode("Workflow-" . $row['module_number'] . " - $this->name - " . $th['message']));
				$email->addAddress("chidalgo@australiaveta.com.co");
				$email->send();
			}

			// $one_drive_url = "https://mmmveta-my.sharepoint.com/personal/admin_mmmveta_onmicrosoft_com/_layouts/15/onedrive.aspx?ga=1&id=/personal/admin_mmmveta_onmicrosoft_com/Documents/Documentos/";
			// $crm_date_to_onedrive = $row['lead_id'] . "/PV_" . $row['module_number'] . "/Doc Adicionales/Aprobados/";
			// $file_name = $doc_name . "." . $row['file_ext'];

			// $second_one_drive_url = "&parent=/personal/admin_mmmveta_onmicrosoft_com/Documents/Documentos/";

			// $one_drive_url = $one_drive_url . "" . $crm_date_to_onedrive . "" . $file_name . "" . $second_one_drive_url . "" . $crm_date_to_onedrive;


			// if (empty($bean->fetched_row) || empty($bean->fetched_row['uploadfile'])) {
			if (str_contains($bean->estado_de_visa_c, 'LOO') || (str_contains($bean->estado_de_visa_c, 'COE') && $bean->estadodocumento !== 'Aprobado')) {

				$sqlUpdate = "UPDATE doc_documentos_adic set 
											estadodocumento = 'Pending', 
											name = '$doc_name',
											url = '$one_drive_url'
										where id='" . $idDocumento . "'";
			} else {
				$sqlUpdate = "UPDATE doc_documentos_adic set 
											estadodocumento = 'Aprobado', 
											name = '$doc_name',
											url = '$one_drive_url'
										where id='" . $idDocumento . "'";
			}

			if (($bean->estado_de_visa_c == "New_Additional_Doc") or ($bean->estado_de_visa_c == "New_RFI_Document")) {
				$sqlUpdate = "UPDATE doc_documentos_adic set 
											estadodocumento = 'Pendiente', 
											name = '$doc_name',
											url = '$one_drive_url'
										where id='" . $idDocumento . "'";
			}
			// }
			logerror(["estadodocumento uploadFile", $sqlUpdate]);

			$GLOBALS['db']->query($sqlUpdate);


			error_log("AUTOMATIZACION ACABA DE ACTUALIZAR EL ESTADO DEL DOCUMENTO " . $bean->visa_application_date_c);


			//error_log("CARGA - url array json - ". print_r(json_decode($server_output), TRUE));
			//error_log("CARGA - url array - ". print_r($server_output, TRUE));				
			//error_log("CARGA - url json- ". json_encode(json_decode($server_output)));
			//error_log("CARGA - url text- ". $server_output);




			// ACTUALIZACION DE ESTADO
			error_log("PROCESO_ADICIONAL - PROCESO SELECCIONADO " . $bean->estado_de_visa_c);

			if (
				/*
				($bean->estado_de_visa_c == 'certificado_de_aplicacion') or 
				($bean->estado_de_visa_c == 'Visa_Granted_Letter') or 
				($bean->estado_de_visa_c == 'visa_negada') or 
				($bean->estado_de_visa_c == 'Visa_Application_Acknowledgement_Letter')
				*/
				($bean->estado_de_visa_c != '') and ($bean->estado_de_visa_c != 'New_Additional_Doc') and ($bean->estado_de_visa_c != "New_RFI_Document")
			) {

				error_log("PROCESO_ADICIONAL - PROCESO SELECCIONADO entro al si ");

				error_log("CARGA - FECHA Y HORA 1 " . date('Y-m-d H:i:s'));


				$sql = "SELECT vetaVisa.idVisa as idVisa,veta_visa.name , veta_visa.estado
					from veta_visa, (SELECT  vetaOP.veta_visa_opportunitiesveta_visa_idb as idVisa
					FROM vetacrm2.doc_documentos_adic  as docAdic
					join  doc_documentos_adic_opportunities_c as docAdicOp on docAdic.id = docAdicOp.doc_documentos_adic_opportunitiesdoc_documentos_adic_ida
					join veta_visa_opportunities_c as vetaOP on vetaOP.veta_visa_opportunitiesopportunities_ida = docAdicOp.doc_documentos_adic_opportunitiesopportunities_idb
					where docAdic.id = '$bean->id') as vetaVisa
					where vetaVisa.idVisa = veta_visa.id
					and veta_visa.deleted = 0";

				$respuesta = $bean->db->query($sql);

				if ($row = $bean->db->fetchByAssoc($respuesta)) {
					error_log("PROCESO_ADICIONAL - PROCESO SELECCIONADO entro al SEGUNDO SI ");

					$visaId = $row['idVisa'];
					$visa = new Veta_Visa();
					$visa->retrieve($visaId);

					error_log("AUTOMATIZACION VISA ID " . $visa->id);

					//$texto = $bean->estado_de_visa_c;
					$texto = "";


					$tEmail = new EmailTemplate();


					if (($bean->estado_de_visa_c == 'certificado_de_aplicacion') or ($bean->estado_de_visa_c == 'Visa_Application_Acknowledgement_Letter') or ($bean->estado_de_visa_c == 'BVB_Lodge')) {
						$texto = 'Visa_Aplicada';
						//$currentDateTime = date('Y-m-d H:i:s');						
						$visa->fecha_aplicacion = date('Y-m-d H:i:s');
						$newDateTime = date('Y-m-d H:i:s', strtotime($bean->visa_application_date_c . ' + 6 hours'));
						$visa->fecha_aplicacion = $newDateTime;

						if ((isset($bean->visa_trn_c)) and ($bean->visa_trn_c != '')) {
							$visa->visa_trn_c = $bean->visa_trn_c;
						}

						$tEmail->retrieve('83841b3a-557c-2047-b386-633c6144f25d');  // -> Generico VISA APLICADA AUSTRALIA OFFSHORE - AUTOMATICO

					}

					if ($bean->estado_de_visa_c == 'Visa_Granted_Letter') {
						$texto = 'Visa_Otorgada';

						$visa->fecha_otorgada_date = date('Y-m-d H:i:s');
						$newDateTime = date('Y-m-d H:i:s', strtotime($bean->granted_date_c . ' + 6 hours'));
						$visa->fecha_otorgada = $newDateTime;

						$newDateTime = date('Y-m-d H:i:s', strtotime($bean->new_expiration_date_c . ' + 6 hours'));
						$visa->fecha_expiracion = $newDateTime;

						$tEmail->retrieve('84c70841-f5c1-de2f-4fef-63d826a8b4fa'); // VISA OTORGADA OFFSHORE ALLIANZ AUSTRALIA - AUTOMATICA
					}

					if ($bean->estado_de_visa_c == 'visa_negada') {
						$texto = 'Visa_Negada';
					}
					
					if ($bean->estado_de_visa_c == 'Visa_Rejected') {
						$texto = 'Visa_Negada';
					}
					
					
					// NUEVO ESTADO: Visa_lodge_801 -> Visa_Aplicada SIN TRN NI CORREO
					if ($bean->estado_de_visa_c == 'Visa_lodge_801') {
						$texto = 'Visa_Aplicada';
						$visa->fecha_aplicacion = date('Y-m-d H:i:s');
						$newDateTime = date('Y-m-d H:i:s', strtotime($bean->visa_application_date_c . ' + 6 hours'));
						$visa->fecha_aplicacion = $newDateTime;
					}
					
					
					
					

					$texto_proceso = '';
					$texto_proceso_pending = '';
					
					
					if ($bean->estado_de_visa_c == 'Sponsor_Lodge') {
						//$texto_proceso_pending = '^LMT_Pending^';
						//$texto_proceso = "^LMT^";

						$visa->sponsor_lodge_date_c = date('Y-m-d');						

						//$visa->lmt_process_stage_c = '^Lodged^';
					}
					if ($bean->estado_de_visa_c == 'ART_Lodge') {
						//$texto_proceso_pending = '^LMT_Pending^';
						//$texto_proceso = "^LMT^";

						$visa->art_lodge_date_c = date('Y-m-d');						

						//$visa->lmt_process_stage_c = '^Lodged^';
					}
					
					

					if ($bean->estado_de_visa_c == 'LMT_Lodged') {
						$texto_proceso_pending = '^LMT_Pending^';
						$texto_proceso = "^LMT^";

						$visa->lmt_start_date_c = date('Y-m-d');
						$visa->lmt_notification_c = 1;

						$visa->lmt_process_stage_c = '^Lodged^';
					}
					if ($bean->estado_de_visa_c == 'LMT_Approved') {
						$texto_proceso_pending = '^LMT_Approved^';
						$texto_proceso = "^LMT_Pending^";

						$visa->lmt_expectation_date_c = date('Y-m-d');
						$visa->lmt_notification_approved_c = 1;

						$visa->lmt_process_stage_c = '^Granted^';
					}



					if ($bean->estado_de_visa_c == 'Nomination_Lodged') {
						$texto_proceso_pending = '^Nomination_Pending^';
						$texto_proceso = "^Nomination^";

						$visa->nomination_app_date_c = date('Y-m-d');
						$visa->nomination_app_expectation_date_c = $bean->expectation_date_c;
						$visa->nomination_notification_c = 1;

						$visa->nomination_process_stage_c = '^Lodged^';

						if ((isset($bean->nomination_trn_c)) and ($bean->nomination_trn_c != '')) {
							$visa->nomination_trn_c = $bean->nomination_trn_c;
						}
					}
					if ($bean->estado_de_visa_c == 'Nomination_Approved') {
						$texto_proceso_pending = '^Nomination_Approved^';
						$texto_proceso = "^Nomination_Pending^";

						$visa->nomination_approval_date_c = date('Y-m-d');
						$visa->nomination_notification_approved_c = 1;

						$visa->nomination_process_stage_c = '^Granted^';
					}

					if ($bean->estado_de_visa_c == 'Skill_Assessment_Lodged') {
						$texto_proceso_pending = '^Skill_Assessment_Pending^';
						$texto_proceso = "^Skill_Assessment^";

						$visa->skill_assessment_app_date_c = date('Y-m-d');
						$visa->skill_assessment_app_expectation_date_c = $bean->expectation_date_c;
						$visa->skill_assessment_notification_c = 1;

						$visa->skill_assessment_process_stage_c = '^Lodged^';
					}
					if ($bean->estado_de_visa_c == 'Skill_Assessment_Approved') {
						$texto_proceso_pending = '^Skill_Assessment_Approved^';
						$texto_proceso = "^Skill_Assessment_Pending^";

						$visa->skill_assessment_app_date_c = date('Y-m-d');
						$visa->skill_assessment__notification_approved_c = 1;

						$visa->skill_assessment_process_stage_c = '^Granted^';
					}

					if ($bean->estado_de_visa_c == 'TAS_Lodged') {
						$texto_proceso_pending = '^TAS_Pending^';
						$texto_proceso = "^TAS^";

						$visa->tas_application_date_c = date('Y-m-d');
						$visa->tas_expectation_date_c = $bean->expectation_date_c;
						$visa->tas_notification_c = 1;

						$visa->tas_process_stage_c = '^Lodged^';
					}
					if ($bean->estado_de_visa_c == 'TAS_Approved') {
						$texto_proceso_pending = '^TAS_Approved^';
						$texto_proceso = "^TAS_Pending^";

						$visa->tas_approval_date_c = date('Y-m-d');
						$visa->tas_notification_approved_c = 1;

						$visa->tas_process_stage_c = '^Granted^';
					}








					if ($bean->estado_de_visa_c == 'Labor_Agreement_Lodged') {
						$texto_proceso_pending = '^Labor_Agreement_Pending^';
						$texto_proceso = "^Labor_Agreement^";

						$visa->labor_agreement_application_date_c = date('Y-m-d');
						$visa->labor_agreement_expectation_date_c = $bean->expectation_date_c;
						$visa->labor_agreement_notification_c = 1;

						$visa->labor_agreement_process_stage_c = '^Lodged^';
					}
					if ($bean->estado_de_visa_c == 'Labor_Agreement_Approved') {
						$texto_proceso_pending = '^Labor_Agreement_Approved^';
						$texto_proceso = "^Labor_Agreement_Pending^";

						$visa->labor_agreement_approval_date_c = date('Y-m-d');
						$visa->labor_agreement_notification_approved_c = 1;

						$visa->labor_agreement_process_stage_c = '^Granted^';
					}
					if ($bean->estado_de_visa_c == 'Endorsement_Lodged') {
						$texto_proceso_pending = '^Endorsement_Pending^';
						$texto_proceso = "^Endorsement^";

						$visa->endorsement_application_date_c = date('Y-m-d');
						$visa->endorsement_expectation_date_c = $bean->expectation_date_c;
						$visa->endorsement_notification_c = 1;

						$visa->endorsement_process_stage_c = '^Lodged^';
					}
					if ($bean->estado_de_visa_c == 'Endorsement_Approved') {
						$texto_proceso_pending = '^Endorsement_Approved^';
						$texto_proceso = "^Endorsement_Pending^";

						$visa->endorsement_approval_date_c = date('Y-m-d');
						$visa->endorsement_notification_approved_c = 1;

						$visa->endorsement_process_stage_c = '^Granted^';
					}















					if ($bean->estado_de_visa_c == 'ROI_Lodged') {
						$texto_proceso_pending = '^ROI_Pending^';
						$texto_proceso = "^ROI^";

						$visa->roi_application_date_c = date('Y-m-d');
						$visa->roi_expectation_date_c = $bean->expectation_date_c;
						$visa->roi_notification_c = 1;

						$visa->roi_process_stage_c = '^Lodged^';
					}
					if ($bean->estado_de_visa_c == 'ROI_Approved') {
						$texto_proceso_pending = '^ROI_Approved^';
						$texto_proceso = "^ROI_Pending^";

						$visa->roi_approval_date_c = date('Y-m-d');
						$visa->roi_notification_approved_c = 1;

						$visa->roi_process_stage_c = '^Granted^';
					}


					if ($bean->estado_de_visa_c == 'EOI_Lodged') {
						$texto_proceso_pending = '^EOI_Pending^';
						$texto_proceso = "^EOI^";

						$visa->eoi_application_date_c = date('Y-m-d');
						$visa->eoi_expectation_date_c = $bean->expectation_date_c;
						$visa->eoi_notification_c = 1;

						$visa->eoi_process_stage_c = '^Lodged^';
					}
					if ($bean->estado_de_visa_c == 'EOI_Approved') {
						$texto_proceso_pending = '^EOI_Approved^';
						$texto_proceso = "^EOI_Pending^";

						$visa->eoi_appoval_date_c = date('Y-m-d');
						$visa->eoi_notification_approved_c = 1;

						$visa->eoi_process_stage_c = '^Granted^';
					}

					if ($bean->estado_de_visa_c == 'EOI_2_Lodged') {
						$texto_proceso_pending = '^EOI_Pending^';
						$texto_proceso = "^EOI^";

						$visa->eoi_2_application_date_c = date('Y-m-d');
						$visa->eoi_2_expectation_date_c = $bean->expectation_date_c;
						$visa->eoi_notification_c = 1;
					}
					if ($bean->estado_de_visa_c == 'EOI_3_Lodged') {
						$texto_proceso_pending = '^EOI_Pending^';
						$texto_proceso = "^EOI^";

						$visa->eoi_3_application_date_c = date('Y-m-d');
						$visa->eoi_3_expectation_date_c = $bean->expectation_date_c;
						$visa->eoi_notification_c = 1;
					}

					if ($bean->estado_de_visa_c == 'SBS_Lodged') {
						$texto_proceso_pending = '^SBS_Pending^';
						$texto_proceso = "^SBS^";

						$visa->sbs_application_date_c = date('Y-m-d');
						$visa->sbs_expectation_date_c = $bean->expectation_date_c;
						$visa->sbs_notification_c = 1;

						$visa->sbs_process_stage_c = '^Lodged^';
					}

					if ($bean->estado_de_visa_c == 'SBS_Approved') {
						$texto_proceso_pending = '^SBS_Approved^';
						$texto_proceso = "^SBS_Pending^";

						$visa->sbs_approval_date_c = date('Y-m-d');
						$visa->sbs_notification_approved_c = 1;

						$visa->sbs_process_stage_c = '^Granted^';
					}


					if ($bean->estado_de_visa_c == 'State_Nomination_Lodged') {
						$texto_proceso_pending = '^State_Nomination_Pending^';
						$texto_proceso = "^State_Nommination^";

						$visa->state_nomination_application_date_c = date('Y-m-d');
						$visa->state_nomination_expectation_date_c = $bean->expectation_date_c;
						$visa->state_nomination_notification_c = 1;

						$visa->state_nomination_process_stage_c = '^Lodged^';
					}
					if ($bean->estado_de_visa_c == 'State_Nomination_Approved') {
						$texto_proceso_pending = '^State_Nomination_Approved^';
						$texto_proceso = "^State_Nomination_Pending^";

						$visa->state_nomination_approval_date_c = date('Y-m-d');
						$visa->state_nomination_notification_approved_c = 1;

						$visa->state_nomination_process_stage_c = '^Granted^';
					}


					/*
					if ($bean->estado_de_visa_c == 'citizenship_Lodged') {
						$texto_proceso_pending = '^citizenship_Pending^';
						$texto_proceso = "^Citizenship^";

						$visa->state_nomination_application_date_c = date('Y-m-d');
						$visa->state_nomination_expectation_date_c = $bean->expectation_date_c;
						$visa->state_nomination_notification_c = 1;
						
						$visa->state_nomination_process_stage_c = '^Lodged^';
					}
					if ($bean->estado_de_visa_c == 'citizenship_Approved') {
						$texto_proceso_pending = '^citizenship_Approved^';
						$texto_proceso = "^citizenship_Pending^";

						$visa->state_nomination_approval_date_c = date('Y-m-d');
						$visa->state_nomination_notification_approved_c = 1;
						
						$visa->state_nomination_process_stage_c = '^Granted^';
					}
					*/







					if ($bean->estado_de_visa_c == 'RCB_Lodged') {
						$texto_proceso_pending = '^RCB_Pending^';
						$texto_proceso = "^RCB^";

						$visa->rcb_application_date_c = date('Y-m-d');
						$visa->rcb_expectation_date_c = $bean->expectation_date_c;
						$visa->rcb_notification_c = 1;

						$visa->rcb_process_stage_c = '^Lodged^';
					}
					if ($bean->estado_de_visa_c == 'RCB_Approved') {
						$texto_proceso_pending = '^RCB_Approved^';
						$texto_proceso = "^RCB_Pending^";

						$visa->rcb_approval_date_c = date('Y-m-d');
						$visa->rcb_notification_approved_c = 1;

						$visa->rcb_process_stage_c = '^Granted^';
					}



					if ($bean->estado_de_visa_c == 'RFI_1') {
						/*
						$texto_proceso_pending = '^RCB_Pending^';
						$texto_proceso = "^RCB^";
						*/
						$visa->fecha_req1 = $bean->rfi_received_date_c;
						$visa->fecha_exp_req1 = $bean->rfi_deadline_date_c;
						$visa->rfi_name_1_c = $bean->rfi_name_c;
						$visa->rfi_1_types_c = $bean->rfi_type_c;

						//$visa->rcb_notification_c = 1;
					}

					if ($bean->estado_de_visa_c == 'RFI_2') {
						/*
						$texto_proceso_pending = '^RCB_Pending^';
						$texto_proceso = "^RCB^";
						*/
						$visa->fecha_req2 = $bean->rfi_received_date_c;
						$visa->fecha_exp_req2 = $bean->rfi_deadline_date_c;
						$visa->rfi_name_2_c = $bean->rfi_name_c;
						$visa->rfi_2_types_c = $bean->rfi_type_c;

						//$visa->rcb_notification_c = 1;
					}


					if ($bean->estado_de_visa_c == 'RFI_3') {
						/*
						$texto_proceso_pending = '^RCB_Pending^';
						$texto_proceso = "^RCB^";
						*/
						$visa->fecha_req3 = $bean->rfi_received_date_c;
						$visa->fecha_exp_req3 = $bean->rfi_deadline_date_c;
						$visa->rfi_name_3_c = $bean->rfi_name_c;
						$visa->rfi_3_types_c = $bean->rfi_type_c;

						//$visa->rcb_notification_c = 1;
					}


					if ($bean->estado_de_visa_c == 'RFI_4') {
						/*
						$texto_proceso_pending = '^RCB_Pending^';
						$texto_proceso = "^RCB^";
						*/
						$visa->fecha_req4_c = $bean->rfi_received_date_c;
						$visa->fecha_exp_req4_c = $bean->rfi_deadline_date_c;
						$visa->rfi_name_4_c = $bean->rfi_name_c;
						$visa->rfi_4_types_c = $bean->rfi_type_c;

						//$visa->rcb_notification_c = 1;
					}


					if ($bean->estado_de_visa_c == 'RFI_5') {
						/*
						$texto_proceso_pending = '^RCB_Pending^';
						$texto_proceso = "^RCB^";
						*/
						$visa->fecha_req5_c = $bean->rfi_received_date_c;
						$visa->fecha_exp_req5_c = $bean->rfi_deadline_date_c;
						$visa->rfi_name_5_c = $bean->rfi_name_c;
						$visa->rfi_5_types_c = $bean->rfi_type_c;

						//$visa->rcb_notification_c = 1;
					}






					if ($texto != "") {
						$visa->estado = $texto;
					} else {
						error_log("estado_visa variable texto_proceso " . $texto_proceso);
						if (($texto_proceso != "") || (strpos($bean->estado_de_visa_c, 'Lodged') !== false)) {
							error_log("estado_visa entro " . trim($texto_proceso, '^') . "_Process_Lodged");
							$visa->estado = trim($texto_proceso, '^') . "_Process_Lodged";
						}
					}


					error_log("PROCESO_ADICIONAL - ANTES " . $visa->process_stages_c);
					//$visa->process_stages_c = $texto_proceso;

					if (($texto_proceso != '') and ($texto_proceso_pending != '')) {
						$visa->process_stages_c = str_replace($texto_proceso, $texto_proceso_pending, $visa->process_stages_c);
					}



					error_log("PROCESO_ADICIONAL - DESPUES " . $visa->process_stages_c);


					$visa->envio_email_estado_visa_c = $bean->estado_de_visa_c;
					$visa->verificacion_envio_correo_c = false;


					error_log("AUTOMATIZACION VISA OTORGADA fecha de Otorgado en visas ULTIMA INTERACCION " . $visa->fecha_otorgada);

					error_log("AUTOMATIZACION VISA OTORGADA fecha de expiracion en visas ULTIMA INTERACCION " . $visa->fecha_expiracion);



					$visa->save();
					error_log("AUTOMATIZACION VISA ID finalizando" . $visa->id);
				}
			}
		}
		logerror(["estadodocumento upload", $bean->estadodocumento]);
	}
}
