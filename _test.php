<?php

if (!defined('sugarEntry')) {
	define('sugarEntry', true);
}

include 'include/MVC/preDispatch.php';
$startTime = microtime(true);
require_once 'include/entryPoint.php';
ob_start();
require_once 'include/MVC/SugarApplication.php';
include_once('modules/Doc_DocsSolicitados/Doc_DocsSolicitados.php');
error_reporting(E_ALL ^ E_NOTICE);

include_once('modules/Veta_Presupuesto/clases/Media.php');

// function send_request($url, $data)
// {
// 	$additional_headers = array(
// 		'Accept: application/json',
// 		'Content-Type: application/json',
// 		'Cookie: PHPSESSID=crmsession'
// 	);

// 	$ch = curl_init($url);
// 	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
// 	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// 	curl_setopt($ch, CURLOPT_HTTPHEADER, $additional_headers);

// 	$server_output = curl_exec($ch);
// 	// var_dump($server_output);
// 	try {
// 		$res = json_decode($server_output);
// 		if ($res->success)
// 			return $res->data;
// 		return [];
// 	} catch (Exception $e) {
// 		logerror($e);
// 		return [];
// 	}
// }

// function send_doc_remainder()
// {
// 	global $db;
// 	$current_date = new DateTime();

// 	// $hour = $current_date->format('i');
// 	$sim_date = clone $current_date;

// 	// $interval = DateInterval::createFromDateString("$hour day");
// 	// $sim_date->add($interval);

// 	$periodicy = 8;

// 	$currentDate = $sim_date->format('Y-m-d');

// 	$templatedict = [
// 		'407' => [
// 			'Company' => 'd301f845-3563-8d7f-dbae-67043a866146',
// 			'Applicant' => '89168d7d-ac27-4e84-8bbc-67043b821f90'
// 		],
// 		'485' => [
// 			'Applicant' => 'e493337a-e804-2a62-23b4-67043b2e2e2b'
// 		],
// 		'482' => [
// 			'Company' => '3a708793-670c-312e-4b29-67043cbfe787',
// 			'Applicant' => '74747819-5c7e-5a37-cd68-67043c11ccf0'
// 		],

// 	];

// 	$templateId = 'bb7dd488-a004-0cf2-135b-66ff737f3fc5';

// 	// var_dump($current_date->format('Y-m-d H:i:s'), $sim_date->format('Y-m-d H:i:s'));
// 	$query = "SELECT
// 				o.name,
// 				o.id as wfid,
// 				concat(
// 					'http://ec2-34-239-163-93.compute-1.amazonaws.com/index.php?module=Opportunities&action=DetailView&record=',
// 					o.id
// 				) as link,
// 				_ds.requested_to_c,
// 				m.id as companyid,
// 				dr.veta_curso_id_c as feeid,
// 				lo.leads_opportunities_1leads_ida as leadid
// 			FROM
// 				vetacrm2.opportunities o
// 				JOIN opportunities_cstm oc ON oc.id_c = o.id
// 				JOIN (
// 					SELECT
// 						dso.doc_docssolicitados_opportunitiesopportunities_ida as oppid,
// 						dsc.requested_to_c,
// 						IF(
// 							group_concat(distinct ds.estadodocumento) <> 'Aprobado',
// 							null,
// 							max(ds.date_modified)
// 						) as last_approved
// 					FROM
// 						doc_docssolicitados ds
// 						JOIN doc_docssolicitados_cstm dsc ON dsc.id_c = ds.id
// 						JOIN doc_docssolicitados_opportunities_c dso ON dso.doc_docssolicitados_opportunitiesdoc_docssolicitados_idb = ds.id
// 					GROUP BY
// 						dso.doc_docssolicitados_opportunitiesopportunities_ida,
// 						dsc.requested_to_c
// 				) _ds ON _ds.oppid = o.id
// 				JOIN veta_serviciocliente_opportunities_c sco ON sco.veta_serviciocliente_opportunitiesopportunities_ida = o.id
// 				JOIN veta_serviciocliente sc ON sc.id = sco.veta_serviciocliente_opportunitiesveta_serviciocliente_idb
// 				JOIN veta_recibo_opportunities_c ro ON ro.veta_recibo_opportunitiesopportunities_idb = o.id
// 				JOIN veta_requerimiento_veta_recibo_c rr ON rr.veta_requerimiento_veta_reciboveta_recibo_idb = ro.veta_recibo_opportunitiesveta_recibo_ida
// 				JOIN veta_requerimiento r ON r.id = rr.veta_requerimiento_veta_reciboveta_requerimiento_ida
// 				JOIN leads_opportunities_1_c lo ON lo.leads_opportunities_1opportunities_idb = o.id
// 				LEFT JOIN nvc_companies_veta_requerimiento_1_c mr ON mr.nvc_companies_veta_requerimiento_1veta_requerimiento_idb = r.id
// 				LEFT JOIN nvc_companies m ON m.id = mr.nvc_companies_veta_requerimiento_1nvc_companies_ida
// 				LEFT JOIN veta_detallerecibo_veta_recibo_c drr ON drr.veta_detallerecibo_veta_reciboveta_recibo_ida = rr.veta_requerimiento_veta_reciboveta_recibo_idb
// 				LEFT JOIN veta_detallerecibo dr ON dr.id = drr.veta_detallerecibo_veta_reciboveta_detallerecibo_idb
// 			WHERE
// 				last_approved IS NULL
// 				AND sc.estado NOT IN ('Descartado', 'Refund')
// 				AND MOD(
// 					DATEDIFF(
// 						date(
// 							CASE
// 								WHEN _ds.requested_to_c = 'Company' THEN oc.company_checklist_sent_date_c
// 								WHEN _ds.requested_to_c = 'Applicant' THEN oc.checklist_sent_date_c
// 								ELSE o.date_entered
// 							END
// 						),
// 						'$currentDate'
// 					),
// 					$periodicy
// 				) = 0
// 			LIMIT 20;";

// 	$type = "documents";
// 	echo "<pre>";
// 	echo "$query <br>";
// 	// echo "</pre>";
// 	// die;
// 	$res = $db->query($query);
// 	while ($row = $db->fetchByAssoc($res)) {

// 		// var_dump($row);

// 		//send email
// 		$opportunity = BeanFactory::getBean("Opportunities", $row['wfid']);
// 		$lead = BeanFactory::getBean("Leads", $row['leadid']);
// 		$fee = BeanFactory::getBean("Veta_Curso", $row['feeid']);


// 		$templateId = $templatedict[$fee->subclass_c][$row['requested_to_c']];
// 		if (!$templateId) continue;


// 		if ($row['companyid']) {
// 			$company = BeanFactory::getBean("NVC_Companies", $row['companyid']);
// 		}
// 		$user = BeanFactory::getBean('Users', "c5da6f79-e3de-2d8f-f42b-60d6505f50c2");

// 		$mail = Media::prepare_email_from_template($user, ['craulhidalgop@gmail.com'], $templateId, [
// 			'$type' => $type,
// 			'$requested' => $row['requested_to_c'],
// 			'$wf' => $row['name'],
// 			'$subclass' => $fee->subclass_c,
// 			'$to' => $row['requested_to_c'] === 'Company' ? $company->name : $lead->full_name
// 		]);

// 		if ($mail->Send()) {
// 			sleep(1);

// 			$dummy_opportunity = BeanFactory::getBean("Opportunities", '9aa84ee2-65ac-5d58-67a4-66ff6dbdfc82');

// 			// echo "<br> enviando correo<br>";
// 			$emailObj = crear_email($dummy_opportunity, $mail, true);

// 			// $r->load_relationship('veta_recibo_emails');
// 			// $r->veta_recibo_emails->add($emailObj->id);
// 		} else {
// 			// echo "<br> correo_no_enviado<br>";
// 		}
// 		$requestedTo = $row['requested_to_c'];
// 		//send whatsapp
// 		$data = [
// 			"status" => "Outbound",
// 			"msg_status" => "Planned",
// 			"action_date" => date("c"),
// 			"msg" => "$lead->full_name - $type - $opportunity->name - $requestedTo - $fee->subclass_c",
// 			// 'template_contentSid' => "HX87d89684401bb4f59cd2b018c3171011",
// 			// 'template_contentVariables' => "{1: 'SuperUser',2: 'Christian'}",
// 			"phone" => "+573004233919",
// 			"name" => $lead->full_name,
// 			"beanId" => $lead->id,
// 			"user" => $user->fetched_row,
// 		];

// 		var_dump($data);
// 		$resWa = send_request('http://localhost:6060/messages', $data);
// 		$callId = $resWa;

// 		//create record
// 		$queryRemainder = "SELECT id FROM auto_recordatorio WHERE lead_id_c = '$lead->id' AND type = '$type';";

// 		$resRemainder = $db->query($queryRemainder);
// 		$rowRemainder = $db->fetchByAssoc($resRemainder);

// 		$remainder = BeanFactory::getBean("Auto_Recordatorio", $rowRemainder['id']);

// 		$remainder->name = "$lead->full_name - $type - $opportunity->name";

// 		$next_date = clone $current_date;

// 		$interval = DateInterval::createFromDateString("$periodicy day");
// 		$next_date->add($interval);

// 		$remainder->next = $next_date->format('Y-m-d');
// 		$remainder->type = $type;
// 		$remainder->lead_id_c = $lead->id;
// 		$remainder->save();

// 		if ($emailObj->id) {
// 			$remainder->load_relationship('auto_recordatorio_emails');
// 			$remainder->auto_recordatorio_emails->add($emailObj->id);
// 		}

// 		if ($callId) {
// 			$remainder->load_relationship('auto_recordatorio_calls');
// 			$remainder->auto_recordatorio_calls->add($callId);
// 		}


// 		var_dump($remainder->name);
// 	}

// 	echo "</pre>";
// }

// // send_doc_remainder();



// class whatsappMessager
// {
// 	static function send_request($url, $data)
// 	{
// 		$additional_headers = array(
// 			'Accept: application/json',
// 			'Content-Type: application/json',
// 			'Cookie: PHPSESSID=crmsession'
// 		);

// 		$ch = curl_init($url);
// 		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
// 		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
// 		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// 		curl_setopt($ch, CURLOPT_HTTPHEADER, $additional_headers);

// 		$server_output = curl_exec($ch);

// 		echo "<pre>";
// 		echo json_encode($data, JSON_PRETTY_PRINT);
// 		echo "\n";
// 		echo json_encode(json_decode($server_output), JSON_PRETTY_PRINT);
// 		echo "</pre>";

// 		try {
// 			$res = json_decode($server_output);
// 			if ($res->success)
// 				return $res->data;
// 			return [];
// 		} catch (Exception $e) {
// 			logerror($e);
// 			return [];
// 		}
// 	}

// 	static function executeRFI()
// 	{
// 		$query = "";
// 		return;
// 	}

// 	static function get_template($serviciocliente)
// 	{
// 		return [
// 			'mmmprod_sc_follow_up',
// 			'prod3_following4',
// 			'prod3_following5',
// 			'prod3_following6'
// 		][rand(0, 3)];
// 	}

// 	static function mark_pending($serviciocliente)
// 	{
// 		$serviciocliente->wa_automatic_message_c = "HX35f117647574abe9692f730435f26cd4";
// 		$serviciocliente->save();
// 	}

// 	static function get_random_time($requerimiento)
// 	{
// 		$offset = 0;

// 		switch ($requerimiento->estado) {
// 			case 'Asignado':
// 			case 'Inmediato':
// 				$range = 2;
// 				break;
// 			case 'Potencial':
// 			default:
// 				$range = 7;
// 				break;
// 		}
// 	}

// 	static function send($serviciocliente)
// 	{
// 		$opportunity = $serviciocliente->obtener_oportunidad();
// 		$l = $opportunity->get_linked_beans('leads_opportunities_1');
// 		if (!count($l)) return;
// 		$lead = $l[0];
// 		$user = BeanFactory::getBean('Users',  $serviciocliente->assigned_user_id);

// 		$call = new Call();

// 		$call->name = "WhatsApp_$lead->phone_mobile";
// 		$call->direction = 'Outbound';
// 		$call->status = 'Planned';
// 		$call->date_start = new DateTime();
// 		$call->date_end = new DateTime();
// 		$call->description = "Hi $lead->full_name, I am $user->full_name, I am following up your case, could you please let me know if you have questions? Thank you";
// 		$call->parent_type = "Opportunities";
// 		$call->parent_id = $opportunity->id;
// 		$call->modified_user_id = $user->id;
// 		$call->created_by = $user->id;
// 		$call->assigned_user_id = $user->id;
// 		$call->save();
// 	}

// 	static function getLocalization()
// 	{
// 		$now = new DateTime(date("Y-m-d H:i:s"));

// 		$timeZones = [
// 			"America/Bogota" => "Offshore",
// 			"Australia/Sydney" => "Onshore",
// 		];

// 		foreach ($timeZones as $timeZone => $localization) {
// 			$start = new DateTime(date("Y-m-d 10:00:00"), new DateTimeZone($timeZone));
// 			$end = new DateTime(date("Y-m-d 16:00:00"), new DateTimeZone($timeZone));
// 			if ($start < $now && $now < $end) {
// 				return $localization;
// 			}
// 		}
// 	}


// 	static function execute()
// 	{
// 		global $db;

// 		$query = "SELECT * 
//         FROM veta_serviciocliente_cstm 
//         WHERE wa_automatic_message_c IS NOT NULL 
//         AND wa_automatic_message_c <>''
//             LIMIT 10
//             ";
// 		echo $query;
// 		$res = $db->query($query);

// 		while ($row = $db->fetchByAssoc($res)) {
// 			$serviciocliente = BeanFactory::getBean('Veta_ServicioCliente',  $row['id_c']);
// 			self::send($serviciocliente);
// 		}
// 	}
// }

// function updateSCNextContactDate()
// {
// 	$query = "SELECT sc.id,scc.wa_automatic_message_c,sc.estado
// 			FROM veta_serviciocliente sc
// 			JOIN veta_serviciocliente_cstm scc ON scc.id_c = sc.id
// 			WHERE estado NOT IN ('SBS_And_Nomination_Checklist',
// 					'SBS_Checklist_Sent',
// 					'SBS_Process_Lodged',
// 					'Completo',
// 					'Descartado',
// 					'Refund',
// 					'Refund_Approved',
// 					'Refund_Done',
// 					'Hold',
// 					'Hold_Process_Lodge',
// 					'Closed',
// 					'Visa_Otorgada')
// 			AND sc.date_modified < sc.fecha_proximo_contacto 
// 			AND DATE(sc.fecha_proximo_contacto) BETWEEN (DATE(NOW()) - INTERVAL 1 DAY) AND DATE(NOW())
// 			ORDER BY sc.fecha_proximo_contacto DESC
// 			LIMIT 1000";

// 	$db = DBManagerFactory::getInstance();
// 	$res = $db->query($query);
// 	while ($row = $db->fetchByAssoc($res)) {
// 		if (empty($row['wa_automatic_message_c'])) {
// 			$serviciocliente = BeanFactory::getBean("Veta_ServicioCliente", $row['id']);
// 			whatsappMessager::mark_pending($serviciocliente);
// 		}
// 	}
// }


function match_emails()
{
    global $db;
    $emailsFolder = "/home/ubuntu/outlook-api/files";
    $emails = array_diff(scandir($emailsFolder), array('..', '.'));
	var_dump($emails);
    foreach ($emails as $emailFile) {
        $emailPath = "$emailsFolder/$emailFile";
        $modified_date = filemtime($emailPath);
        if ($modified_date < strtotime("-1 week")) continue;
        $email = json_decode(file_get_contents($emailPath));
        $time = date('Y-m-d H:i:s', $email->time);
        $to = $email->to[0][0];
        $query = "SELECT e.id 
                    FROM emails e
                    JOIN emails_cstm ec ON ec.id_c = e.id
                    JOIN emails_email_addr_rel eeabr ON eeabr.email_id = e.id
                    JOIN email_addresses ea ON ea.id = eeabr.email_address_id
                    WHERE e.name = '$email->subject' AND date(e.date_sent_received) = date('$time') AND ea.email_address_caps = UPPER('$to') AND (ec.outlook_api_id_c is null or ec.outlook_api_id_c <> '')";
        $result = $db->query($query, true, "Error obteniendo informacion la fecha de viaje de la aplicacion ");
        $row = $db->fetchByAssoc($result);
        if ($row != null) {
            extract($row);

            $description = json_encode([
                "sent" => $email->sent,
                'failed' => $email->failed,
                'error' => $email->error
            ]);

            echo "UPDATE emails_cstm SET outlook_api_id_c = '$emailFile',outlook_api_description_c = '$description' WHERE id_c = '$id'; <br>";
        }
    }
}


echo "<pre>";
match_emails();
echo "</pre>";
