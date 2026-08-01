<?php

class Doc_DocsSolicitadosViewDuplicate extends ViewDetail
{

	function _preDisplay()
	{

		$opportunityId = $_REQUEST['oid'];
		$globalDocumentId = $_REQUEST['did'];
		$docSolicitadoId = $_REQUEST['id'];

		$globalDocument = new GDocs_Global_Documents_Uploaded();
		$globalDocument->retrieve($globalDocumentId);

		$opportunity = new Opportunity();
		$opportunity->retrieve($opportunityId);


		$l = $opportunity->get_linked_beans('leads_opportunities_1', 'Leads');
		if (!count($l)) return;
		$leads = $l[0];

		$docSolicitado = new Doc_DocsSolicitados();
		$docSolicitado->retrieve($docSolicitadoId);

		$d = $docSolicitado->get_linked_beans('doc_docssolicitados_doc_documentos', 'Doc_Documentos');
		if (!count($d)) return;
		$documento = $d[0];

		$plantillasDocs = $documento->get_linked_beans('doc_plantillas_doc_documentos', 'Doc_Plantillas');
		if (!count($plantillasDocs)) return;

		$plantillasWorkflow = $documento->get_linked_beans('doc_plantillas_doc_documentos', 'Doc_Plantillas');
		if (!count($plantillasWorkflow)) return;

		$templates = [];

		foreach ($plantillasDocs as $planitllaDoc) {
			foreach ($plantillasWorkflow as $plantillaWorkflow) {
				if ($planitllaDoc->id === $plantillaWorkflow->id) {
					array_push($templates, $planitllaDoc->name);
				}
			}
		}


		$data = [
			"fileName" => $globalDocument->name,
			"moduleName" => 'Workflow',
			"moduleNumber" => $opportunity->name,
			"templates" => $templates,
			"leadName" => $leads->id,
			"requestTo" => 'Company',
			"move" => $globalDocument->onedrive_folder,
			"wait" => true
		];

		$data = self::moveFile($data);
		if ($data) {
			$docSolicitado->url = $data->url;
			$docSolicitado->save();
		} else {

			$data = [
				"fileName" => $globalDocument->name,
				"moduleName" => 'Workflow',
				"moduleNumber" => $opportunity->name,
				"templates" => $templates,
				"leadName" => str_replace(' ', '_', $leads->full_name),
				"requestTo" => 'Company',
				"move" => $globalDocument->onedrive_folder,
				"wait" => true
			];

			$data = self::moveFile($data);
			if ($data) {
				$docSolicitado->url = $data->url;
				$docSolicitado->save();
			}
		}

		header("Location: index.php?module=Opportunities&action=DetailView&record=$opportunityId");
	}

	function preDisplay()
	{

		$opportunityId = $_REQUEST['oid'];
		$personalDocumentId = $_REQUEST['did'];
		$docSolicitadoId = $_REQUEST['id'];

		$personalDocument = BeanFactory::getBean('GDocs_Global_Documents_Uploaded', $personalDocumentId);

		$opportunity = BeanFactory::getBean('Opportunities', $opportunityId);

		$l = $opportunity->get_linked_beans('leads_opportunities_1', 'Leads');
		if (!count($l)) {
			echo '!count($l)';
			return;
		}
		$lead = $l[0];

		$docSolicitado = BeanFactory::getBean('Doc_DocsSolicitados', $docSolicitadoId);

		$docSolicitado->url = $personalDocument->file_url;
		$docSolicitado->estadodocumento = 'Aprobado';

		$docSolicitado->save();

		$d = $docSolicitado->get_linked_beans('doc_docssolicitados_doc_documentos', 'Doc_Documentos');
		if (!count($d)) {
			echo '!count($d)';
			return;
		}
		$documento = $d[0];


		$templates = $opportunity->get_linked_beans('doc_plantillas_opportunities', 'Doc_Plantillas', '', 0, -1, 0, "doc_plantillas.id in (SELECT doc_plantillas_doc_documentosdoc_plantillas_ida from doc_plantillas_doc_documentos_c where doc_plantillas_doc_documentosdoc_documentos_idb = '$documento->id')");

		$data = [
			"fileName" => $personalDocument->name,
			"moduleName" => 'Workflow',
			"moduleNumber" => $opportunity->name,
			"templates" => array_map(function ($template) {
				return $template->name;
			}, $templates),
			"leadName" => $lead->id,
			"from" => $personalDocument->ms_id_c
		];
		$data = self::moveFile($data);


		header("Location: index.php?module=Opportunities&action=DetailView&record=$opportunityId");
	}

	static function moveFile($data)
	{
		$url = 'http://127.0.0.1:8080/copy';

		$additional_headers = array(
			'Accept: application/json',
			'Content-Type: application/json'
		);
		// var_dump($data);die;

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $additional_headers);

		$server_output = curl_exec($ch);
		return json_decode($server_output);
	}

	// static function moveFile($data)
	// {
	// 	$url = 'http://127.0.0.1:8080/move';

	// 	$additional_headers = array(
	// 		'Accept: application/json',
	// 		'Content-Type: application/json'
	// 	);

	// 	$ch = curl_init($url);
	// 	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	// 	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
	// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// 	curl_setopt($ch, CURLOPT_HTTPHEADER, $additional_headers);

	// 	$server_output = curl_exec($ch);
	// 	return json_decode($server_output);
	// }
}
