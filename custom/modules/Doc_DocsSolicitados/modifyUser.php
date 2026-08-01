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
class modifyUserClass
{

	function update_semaforizacion($bean)
	{
		$opportunity = self::get_opportunity($bean);

		if ($bean->estadodocumento === 'Aprobado' || $bean->estadodocumento === 'Rechazado' || $bean->estadodocumento === 'Revising') {
			$detalle = json_decode($opportunity->detalle_semaforizacion_c, true);

			if (is_null($detalle))
				$detalle = [];

			unset($detalle["documentos_$opportunity->id"]);

			if (!count(get_object_vars($detalle))) {
				$opportunity->estado_semaforizacion_c = 'Verde';
			}

			$opportunity->detalle_semaforizacion_c = json_encode($detalle);

			$opportunity->save();
		}
	}


	function commentInput($bean)
	{
		$bean->document_comment_c = "<input id='document_comment_c_$bean->id' type = 'text' placeholder='$bean->document_comment_c'/>";
		//$bean->change_status_c =  "<input type='checkbox' id='change_status_c_$bean->id' name='change_status_c_$bean->id' class='change_status_c_checkbox' value='0'>";

	}

	function changeUrl($focus)
	{
		global $current_user;
		$bean = BeanFactory::getBean('Doc_DocsSolicitados', $focus->id);


		if ((isset($focus->url)) and ($focus->url != '')) {
			//$focus->url = "<a href='$focus->url' target='_blank'>$focus->name</a>";
			$focus->url = "<a href='$focus->url' target='_blank'>Document Link</a>";
			$focus->change_status_c =  "<input type='checkbox' id='change_status_c_$focus->id' name='change_status_c_$focus->id' class='change_status_c_checkbox' value='0'>";
		}

		// if ($focus->id != "41486932-6872-11ee-8817-161ba90d7237") return;

		// var_dump(!empty($bean->fetched_row['url']),$bean->fetched_row,$bean->name);die;

		if (!empty($bean->fetched_row['url'])) return;


		$opportunity = self::get_opportunity($bean);


		if (empty($opportunity)) {
			$requerimiento = self::get_opportunity($bean);
			if (empty($requerimiento)) return;

			$l = $requerimiento->get_linked_beans('veta_requerimiento_leads');
		} else {

			$l = $opportunity->get_linked_beans('leads_opportunities_1');
		}

		if (!count($l)) {
			return;
		}
		$lead = $l[0];

		$o = $bean->get_linked_beans('doc_docssolicitados_doc_documentos');
		if (!count($o)) {
			return;
		}
		$documento = $o[0];
		$field = "lead_id_c";
		if ($bean->requested_to_c === "Company") {

			$r = $opportunity->get_linked_beans('veta_recibo_opportunities', 'Veta_Recibo');
			if (!count($r)) {
				return;
			}
			$recibo = $r[0];

			$rq = $recibo->get_linked_beans('veta_requerimiento_veta_recibo', 'Veta_Requerimiento');
			if (!count($rq)) {
				return;
			}
			$requerimiento = $rq[0];

			$c = $requerimiento->get_linked_beans('nvc_companies_veta_requerimiento_1', 'NVC_Companies');
			if (!count($c)) {
				return;
			}

			$lead = $c[0];
			$field = "nvc_companies_id_c";
		}

		$docPersonal = BeanFactory::getBean('GDocs_Global_Documents_Uploaded');
		$lastDoc = $docPersonal->get_list("date_entered DESC", "doc_documentos_id_c='$documento->id' AND $field='$lead->id'");

		if ($lastDoc['list']) {
			$docPersonal = $lastDoc['list'][0];
			$focus->url = "<b> this document was loaded previously, to reuseit click <a href='index.php?module=Doc_DocsSolicitados&action=duplicate&id=$bean->id&did=$docPersonal->id&oid=$opportunity->id'>here</a></b>";
		}
	}

	function _changeUrl($bean)
	{
		if ((isset($bean->url)) and ($bean->url != '')) {
			//$bean->url = "<a href='$bean->url' target='_blank'>$bean->name</a>";
			$bean->url = "<a href='$bean->url' target='_blank'>Document Link</a>";
			$bean->change_status_c =  "<input type='checkbox' id='change_status_c_$bean->id' name='change_status_c_$bean->id' class='change_status_c_checkbox' value='0'>";
		}

		//if is company doc

		if ($bean->id == 'e92e154d-cf38-11ed-8817-161ba90d7237')
			logerror(['duplicate', explode('.', $bean->requested_to_c)[0], $bean->name, $bean->id]);
		if ($bean->requested_to_c == 'Company') {

			$o = $bean->get_linked_beans('doc_docssolicitados_opportunities', 'Opportunities');
			if (!count($o)) return;
			$opportunity = $o[0];

			$r = $opportunity->get_linked_beans('veta_recibo_opportunities', 'Veta_Recibo');
			if (!count($r)) return;
			$recibo = $r[0];

			$rq = $recibo->get_linked_beans('veta_requerimiento_veta_recibo', 'Veta_Requerimiento');
			if (!count($rq)) return;
			$requerimiento = $rq[0];

			$c = $requerimiento->get_linked_beans('nvc_companies_veta_requerimiento_1', 'NVC_Companies');
			if (!count($c)) return;
			$company = $c[0];

			$d = $company->get_linked_beans('gdocs_global_documents_uploaded_nvc_companies', 'GDocs_Global_Documents_Uploaded');
			if (!count($d)) return;
			$globalDocument = $d[0];

			if ($bean->id == 'e92e154d-cf38-11ed-8817-161ba90d7237')
				logerror(['duplicate', explode('.', $globalDocument->name)[0], $bean->name, $bean->id]);

			if (explode('.', $globalDocument->name)[0] == $bean->name) {
				$bean->requested_to_c = "Company <a href='index.php?module=Doc_DocsSolicitados&action=duplicate&id=$bean->id&did=$globalDocument->id&oid=$opportunity->id'>load</a>";
				// $bean->requested_to_c =" Hey";
			}
		}
	}

	function modifyUser($bean, $event, $arguments)
	{
		//global $current_user;
		$idProceso = $bean->id;
		$estadonuevo = $bean->estadodocumento;

		$sql = "SELECT * FROM doc_docssolicitados WHERE id = '" . $idProceso . "'";

		$result = $GLOBALS['db']->query($sql);

		$this->approveFile($bean);

		while ($row = $GLOBALS['db']->fetchByAssoc($result)) {
			//Use $row['id'] to grab the id fields value
			$idUserModify = $row['modified_user_id'];
			$sqlUsers = "SELECT * FROM users WHERE id = '" . $idUserModify . "'";

			$resultUsers = $GLOBALS['db']->query($sqlUsers);

			while ($rowUsers = $GLOBALS['db']->fetchByAssoc($resultUsers)) {
				$nombreUser = $rowUsers['first_name'];
				$apellidoUser = $rowUsers['last_name'];
				//Consulta el documento por ID Documento
				$sqlUpdate = "UPDATE doc_docssolicitados set description = '" . $nombreUser . " " . $apellidoUser . "' where id='" . $idProceso . "'";

				$GLOBALS['db']->query($sqlUpdate);

				//Update la fecha si es estado aprobado
				if ($estadonuevo == "Aprobado") {
					$fechaaprobado = date('Y-m-d H:i:s');
					$sqlUpdateAprobado = "UPDATE doc_docssolicitados set fechaaprobado= '" . $fechaaprobado . "' where id='" . $idProceso . "'";
					$GLOBALS['db']->query($sqlUpdateAprobado);
				}
			}
		}





		//error_log("auto_consultation - se actualizo el documento " . $bean->name);
		$r = $bean->get_linked_beans('veta_requerimiento_doc_docssolicitados_1', 'Doc_DocsSolicitados');
		if (!count($r)) return;
		$req = $r[0];


		//if($req->name = '107051'){
		//error_log("auto_consultation - el requerimiento es  " . $req->name);

		$documents = $req->get_linked_beans('veta_requerimiento_doc_docssolicitados_1', 'Doc_DocsSolicitados');
		if (count($documents) > 0) {
			$pending_docs = 0;
			foreach ($documents as $doc) {
				if ($doc->estadodocumento != 'Aprobado') {
					$pending_docs = 1;
				}
			}

			if ($pending_docs == 1) {
				error_log("auto_consultation - hay documentos pendientes  ");
			} else {
				$req->estado = 'Consultation_Docs_Completed';
				$req->save();
				error_log("auto_consultation - se actualizo el estado  ");
			}
		}
		//}




	}


	static function get_opportunity($bean)
	{
		$o = $bean->get_linked_beans('doc_docssolicitados_opportunities', 'Opportunities');
		if (!count($o)) return;
		$opportunity = $o[0];
		return $opportunity;
	}
	static function get_requeriment($bean)
	{
		$r = $bean->get_linked_beans('veta_requerimiento_doc_docssolicitados_1');
		if (!count($r)) return;
		$requeriment = $r[0];
		return $requeriment;
	}

	static function get_ms_id($bean, $dataId)
	{
		global $current_user;
		$url = 'http://127.0.0.1:8080/get_info';

		$additional_headers = array(
			'Accept: application/json',
			'Content-Type: application/json'
		);
		$data = [
			'path' => $dataId['leadName'] . "/" . $dataId['moduleName'] . "_" . $dataId['moduleNumber'],
			'file_name' => $bean->name
		];
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $additional_headers);

		// $server_output = curl_exec($ch);
		// $out_data = json_decode($server_output);
		// if ($current_user->id === 'c5da6f79-e3de-2d8f-f42b-60d6505f50c2') {
		// 	var_dump($data,$server_output);
		// 	die;
		// }
		// return $out_data->id;
	}

	function save_personal_doc($bean, $dataId)
	{
		// if ($bean->estadodocumento !== 'Aprobado' || $bean->fetched_row['estadodocumento'] === 'Aprobado') return;
		if ($bean->estadodocumento !== 'Aprobado') return;

		$o = $bean->get_linked_beans('doc_docssolicitados_doc_documentos');
		if (!count($o)) return;
		$documento = $o[0];

		$requestedToId = $dataId['leadName'];
		$requestedToField = "lead_id_c";

		if ($bean->requested_to_c == 'Company') {
			$opportunity = self::get_opportunity($bean);

			$recibo = $opportunity->get_linked_beans("veta_recibo_opportunities")[0];
			if (empty($recibo)) return;

			$requerimiento = $recibo->get_linked_beans("veta_requerimiento_veta_recibo")[0];
			if (empty($requerimiento)) return;

			$company = $recibo->get_linked_beans("veta_requerimiento_doc_docssolicitados_1")[0];
			if (empty($company)) return;

			$requestedToField = "nvc_companies_id_c";
			$requestedToId = $company->id;
		}

		$docPersonal = BeanFactory::getBean('GDocs_Global_Documents_Uploaded');
		$lastDoc = $docPersonal->get_list("date_entered DESC", "doc_documentos_id_c='$documento->id' AND $requestedToField='$requestedToId'");
		// var_dump($lastDoc, "doc_documentos_id_c='$documento->id' AND  $requestedToField='$requestedToId'");
		// die;
		if ($lastDoc['list']) {
			$docPersonal = $lastDoc['list'][0];
		} else {
			$docPersonal = BeanFactory::getBean('GDocs_Global_Documents_Uploaded');
		}


		$docPersonal->name = $bean->name;
		$docPersonal->{$requestedToField} = $requestedToId;

		$docPersonal->doc_documentos_id_c = $documento->id;
		$docPersonal->file_url = $bean->url;
		$docPersonal->ms_id_c = self::get_ms_id($bean, $dataId);

		$docPersonal->save();
	}

	function approveFile($bean)
	{
		global $current_user;

		$this->update_semaforizacion($bean);

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
		$opportunity = self::get_opportunity($bean);

		$lead = $opportunity->get_linked_beans("leads_opportunities_1")[0];
		if (!$lead) {

			$r = $opportunity->get_linked_beans('veta_recibo_opportunities', 'Veta_Recibo');
			if (!count($r)) {
				return;
			}
			$recibo = $r[0];

			$rq = $recibo->get_linked_beans('veta_requerimiento_veta_recibo', 'Veta_Requerimiento');
			if (!count($rq)) {
				return;
			}
			$requerimiento = $rq[0];

			$c = $requerimiento->get_linked_beans('nvc_companies_veta_requerimiento_1', 'NVC_Companies');
			if (!count($c)) {
				return;
			}

			$lead = $c[0];
			$q = "SELECT IF(ds.date_entered < d.date_modified ,ds.name ,d.name ) AS file_name,
			mds.name AS module_number,
			mds.type AS module_name, 
			'$lead->id' AS lead_name, 
			p.name AS plantilla, 
			mds.date_entered as workflow_creation_date
			FROM doc_docssolicitados ds
			JOIN (
			SELECT o.name,o.date_entered, 'Workflow' AS type, doc_docssolicitados_opportunitiesdoc_docssolicitados_idb AS docid, po.doc_plantillas_opportunitiesdoc_plantillas_ida as plantillaid
			FROM doc_docssolicitados_opportunities_c dso
			JOIN opportunities o ON o.id = dso.doc_docssolicitados_opportunitiesopportunities_ida
			JOIN veta_recibo_opportunities_c ro ON ro.veta_recibo_opportunitiesopportunities_idb = o.id
			JOIN doc_plantillas_opportunities_c po ON po.doc_plantillas_opportunitiesopportunities_idb = o.id
			 union
			SELECT r.name,r.date_entered, 'Requeriment' AS type, rds.veta_requerimiento_doc_docssolicitados_1doc_docssolicitados_idb AS docid, rp.veta_requerimiento_doc_plantillas_1doc_plantillas_idb as plantillaid
			FROM veta_requerimiento_doc_docssolicitados_1_c rds 
			JOIN veta_requerimiento r ON r.id = rds.veta_requerimiento_doc_docssolicitados_1veta_requerimiento_ida
			JOIN veta_requerimiento_doc_plantillas_1_c rp ON rp.veta_requerimiento_doc_plantillas_1veta_requerimiento_ida = r.id
			) mds ON mds.docid = ds.id
			JOIN doc_docssolicitados_doc_documentos_c dsd on dsd.doc_docssolicitados_doc_documentosdoc_docssolicitados_ida = ds.id
			JOIN doc_documentos d ON d.id = dsd.doc_docssolicitados_doc_documentosdoc_documentos_idb
			JOIN doc_plantillas_doc_documentos_c pd ON pd.doc_plantillas_doc_documentosdoc_documentos_idb = dsd.doc_docssolicitados_doc_documentosdoc_documentos_idb
			JOIN doc_plantillas p ON p.id = pd.doc_plantillas_doc_documentosdoc_plantillas_ida AND p.id = mds.plantillaid
			WHERE ds.id = '$bean->id'";
		} else {
			$q = "SELECT IF(ds.date_entered < d.date_modified ,ds.name ,d.name ) AS file_name,
			mds.name AS module_number,
			mds.type AS module_name, 
			l.id AS lead_name, 
			p.name AS plantilla, 
			mds.date_entered as workflow_creation_date
			FROM doc_docssolicitados ds
			JOIN (
			SELECT o.name,o.date_entered, 'Workflow' AS type, doc_docssolicitados_opportunitiesdoc_docssolicitados_idb AS docid, rl.veta_recibo_leadsleads_ida AS leadid, po.doc_plantillas_opportunitiesdoc_plantillas_ida as plantillaid
			FROM doc_docssolicitados_opportunities_c dso
			JOIN opportunities o ON o.id = dso.doc_docssolicitados_opportunitiesopportunities_ida
			JOIN veta_recibo_opportunities_c ro ON ro.veta_recibo_opportunitiesopportunities_idb = o.id
			JOIN veta_recibo_leads_c rl ON rl.veta_recibo_leadsveta_recibo_idb = ro.veta_recibo_opportunitiesveta_recibo_ida
			JOIN doc_plantillas_opportunities_c po ON po.doc_plantillas_opportunitiesopportunities_idb = o.id
			 union
			SELECT r.name,r.date_entered, 'Requeriment' AS type, rds.veta_requerimiento_doc_docssolicitados_1doc_docssolicitados_idb AS docid, rql.veta_requerimiento_leadsleads_ida AS leadid, rp.veta_requerimiento_doc_plantillas_1doc_plantillas_idb as plantillaid
			FROM veta_requerimiento_doc_docssolicitados_1_c rds 
			JOIN veta_requerimiento r ON r.id = rds.veta_requerimiento_doc_docssolicitados_1veta_requerimiento_ida
			JOIN veta_requerimiento_leads_c rql ON rql.veta_requerimiento_leadsveta_requerimiento_idb = r.id
			JOIN veta_requerimiento_doc_plantillas_1_c rp ON rp.veta_requerimiento_doc_plantillas_1veta_requerimiento_ida = r.id
			) mds ON mds.docid = ds.id
			JOIN leads l ON l.id = mds.leadid
			JOIN doc_docssolicitados_doc_documentos_c dsd on dsd.doc_docssolicitados_doc_documentosdoc_docssolicitados_ida = ds.id
			JOIN doc_documentos d ON d.id = dsd.doc_docssolicitados_doc_documentosdoc_documentos_idb
			JOIN doc_plantillas_doc_documentos_c pd ON pd.doc_plantillas_doc_documentosdoc_documentos_idb = dsd.doc_docssolicitados_doc_documentosdoc_documentos_idb
			JOIN doc_plantillas p ON p.id = pd.doc_plantillas_doc_documentosdoc_plantillas_ida AND p.id = mds.plantillaid
			WHERE ds.id = '$bean->id'";
		}



		$res = $bean->db->query($q);


		if ($row = $bean->db->fetchByAssoc($res)) {

			$requestTo = $bean->requested_to_c;
			// if ($row['module_number'] == '233') {
			// if ($row['module_number'] == '233' || (substr($row['workflow_creation_date'], 0, 10) >= "2022-03-08" && $row['module_name'] === 'Worflow')) {
			if (isset($bean->requested_to_c) and ($bean->requested_to_c == '')) {
				$requestTo = "Applicant";
			}
			if ($bean->requested_to_c == 'Applicant') {
				$requestTo = "Applicant";
			}

			if ($bean->requested_to_c == 'Company') {
				$requestTo = "Company";
			}
			// }

			/*
			if(substr($row['workflow_creation_date'], 0, 10) < "2022-03-08"){
				$requestTo = "";				
			}
			*/



			$data = [
				"fileName" => $row['file_name'],
				"moduleName" => $row['module_name'],
				"moduleNumber" => $row['module_number'],
				"templates" => [$row['plantilla']],
				"leadName" => $row['lead_name'],
				"use_sharepoint" => true,
				"requestTo" => $requestTo
			];

			// if ($row['module_number'] === '233') {
			$data["status"] = $bean->fetched_row['estadodocumento'];
			// }
		}

		while ($row = $bean->db->fetchByAssoc($res)) {
			$data['templates'][] = $row['plantilla'];
		}


		$additional_headers = array(
			'Accept: application/json',
			'Content-Type: application/json'
		);
		logerror($url, $data);

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $additional_headers);

		$server_output = curl_exec($ch);

		// if ($current_user->id === 'c5da6f79-e3de-2d8f-f42b-60d6505f50c2') {
		$this->save_personal_doc($bean, $data);
		// var_dump($data, $server_output);
		// die;
		// }








		$q = "SELECT IF(ds.date_modified > '2023-03-16 01:39:00',d.name ,ds.name ) AS file_name,mds.name AS module_number,mds.type AS module_name, trim(concat(ifnull(l.first_name,''),' ',l.last_name))  AS lead_name, p.name AS plantilla, mds.date_entered as workflow_creation_date
		FROM doc_docssolicitados ds
		JOIN (
		SELECT o.name,o.date_entered, 'Workflow' AS type, doc_docssolicitados_opportunitiesdoc_docssolicitados_idb AS docid, rl.veta_recibo_leadsleads_ida AS leadid, po.doc_plantillas_opportunitiesdoc_plantillas_ida as plantillaid
		FROM doc_docssolicitados_opportunities_c dso
		JOIN opportunities o ON o.id = dso.doc_docssolicitados_opportunitiesopportunities_ida
		JOIN veta_recibo_opportunities_c ro ON ro.veta_recibo_opportunitiesopportunities_idb = o.id
		JOIN veta_recibo_leads_c rl ON rl.veta_recibo_leadsveta_recibo_idb = ro.veta_recibo_opportunitiesveta_recibo_ida
		JOIN doc_plantillas_opportunities_c po ON po.doc_plantillas_opportunitiesopportunities_idb = o.id
		 union
		SELECT r.name,r.date_entered, 'Requeriment' AS type, rds.veta_requerimiento_doc_docssolicitados_1doc_docssolicitados_idb AS docid, rql.veta_requerimiento_leadsleads_ida AS leadid, rp.veta_requerimiento_doc_plantillas_1doc_plantillas_idb as plantillaid
		FROM veta_requerimiento_doc_docssolicitados_1_c rds 
		JOIN veta_requerimiento r ON r.id = rds.veta_requerimiento_doc_docssolicitados_1veta_requerimiento_ida
		JOIN veta_requerimiento_leads_c rql ON rql.veta_requerimiento_leadsveta_requerimiento_idb = r.id
		JOIN veta_requerimiento_doc_plantillas_1_c rp ON rp.veta_requerimiento_doc_plantillas_1veta_requerimiento_ida = r.id
		) mds ON mds.docid = ds.id
		JOIN leads l ON l.id = mds.leadid
        JOIN doc_docssolicitados_doc_documentos_c dsd on dsd.doc_docssolicitados_doc_documentosdoc_docssolicitados_ida = ds.id
		JOIN doc_documentos d ON d.id = dsd.doc_docssolicitados_doc_documentosdoc_documentos_idb
        JOIN doc_plantillas_doc_documentos_c pd ON pd.doc_plantillas_doc_documentosdoc_documentos_idb = dsd.doc_docssolicitados_doc_documentosdoc_documentos_idb
		JOIN doc_plantillas p ON p.id = pd.doc_plantillas_doc_documentosdoc_plantillas_ida AND p.id = mds.plantillaid
		WHERE ds.id = '$bean->id'";

		$res = $bean->db->query($q);

		if ($row = $bean->db->fetchByAssoc($res)) {
			$requestTo = "";
			// if ($row['module_number'] == '233') {
			// if ($row['module_number'] == '233' || (substr($row['workflow_creation_date'], 0, 10) >= "2022-03-08" && $row['module_name'] === 'Worflow')) {
			if (isset($bean->requested_to_c) and ($bean->requested_to_c == '')) {
				$requestTo = "Applicant";
			}
			if ($bean->requested_to_c == 'Applicant') {
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
				"templates" => [$row['plantilla']],
				"leadName" => $row['lead_name'],
				"use_sharepoint" => true,
				"requestTo" => $requestTo
			];

			// if ($row['module_number'] === '233') {
			$data["status"] = $bean->fetched_row['estadodocumento'];
			// }
		}

		while ($row = $bean->db->fetchByAssoc($res)) {
			$data['templates'][] = $row['plantilla'];
		}


		$additional_headers = array(
			'Accept: application/json',
			'Content-Type: application/json'
		);

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $additional_headers);

		$server_output = curl_exec($ch);
	}
}
