<?php
if (!defined('sugarEntry')) {
	define('sugarEntry', true);
}
include 'include/MVC/preDispatch.php';
$startTime = microtime(true);
require_once 'include/entryPoint.php';
ob_start();
require_once 'include/MVC/SugarApplication.php';


global $sugar_config, $session_id;

$admin = new Administration();
$admin->retrieveSettings();

function getLead($number)
{
	global $db;

	$query = "SELECT id
    FROM leads
    WHERE phone_home = '$number'
    OR phone_mobile = '$number'
    OR phone_work = '$number'
    OR phone_other = '$number'";

	$res = $db->query($query);

	if ($row = $db->fetchByAssoc($res)) {
		return BeanFactory::getBean('Leads', $row['id']);
	}

	return false;
}

function getDeparment($to)
{
	return [
		"whatsapp:+16813083164" => "Sales_Coordinator",
		"whatsapp:+16319003186" => "Customer_service"
	][$to];
}

function getUserId($lead)
{

	$department = getDeparment($_REQUEST['To']);

	$r = $lead->get_linked_beans('veta_requerimiento_leads', 'Veta_Requerimiento', 'date_entered DESC');



	if ($department !== 'Sales_Coordinator') {

		$o = $lead->get_linked_beans('leads_opportunities_1', 'Opportunity', 'date_entered DESC');
		if (!count($o)) return;
		$opportunity = $o[0];

		switch ($department) {
			case 'Customer_service':
				return $opportunity->user_id2_c;
			default:
				return $opportunity->assigned_user_id;
		}
	}

	foreach ($r as $_r) {
		if ($_r->estado !== 'Cerrado' && $_r->estado !== 'Descartado')
			$requerimiento = $_r;
	}

	if (empty($requerimiento)) return $lead->assigned_user_id;

	return $requerimiento->assigned_user_id;
}

function getLinkedModule($lead)
{
	$r = $lead->get_linked_beans('veta_requerimiento_leads', 'Veta_Requerimiento', 'date_entered DESC');

	if (!count($r)) return $lead;

	foreach ($r as $_r) {
		if ($_r->estado !== 'Cerrado' && $_r->estado !== 'Descartado')
			$requerimiento = $_r;
	}

	if (getDeparment($_REQUEST['To']) !== 'Sales_Coordinator') {
		$o = $lead->get_linked_beans('leads_opportunities_1', 'Opportunity', 'date_entered DESC');

		if (!count($o)) return $lead;


		return $o[0];
	}
	return $requerimiento;
}

function createTicket($user, $relatedBean)
{
	$modulePre = [
		"Opportunities" => "PRO",
		"Veta_Presupuesto" => "PRE",
		"Veta_Recibo" => "REC",
		"Veta_Requerimiento" => "REQ",
		"Veta_Aplicacion" => "APP",
		"Veta_ServicioCliente" => "SVC"
	][$relatedBean->module_name];

	return Auto_Tickets::createNew([
		'NAME' => "WhatsApp conversation $modulePre" . "_" . "$relatedBean->name",
		'DATE_SENT_RECEIVED' => date("Y-m-d H:i:s"),
	], $user);
}

function createCall($lead)
{
	global $db;

	$userid = getUserId($lead);
	/** @var User $user */
	$user = BeanFactory::getBean('Users', $userid);



	$time = gmdate("Y-m-d H:i:s");

	$relatedBean = getLinkedModule($lead);

	/** @var Calls $call */
	$call = BeanFactory::newBean('Calls');

	logerror("Whatsapp", $lead->full_name);


	$call->name = "Whatsapp_" . explode(':', $_REQUEST['From'])[1];
	$call->direction = 'Inbound';
	$call->status = 'Recieved';
	$call->date_start = $time;
	$call->date_end = $time;
	$call->date_entered = $time;
	$call->date_modified = $time;
	$call->description = $_REQUEST['Body'];
	$call->parent_type = $relatedBean->module_name;
	$call->parent_id = $relatedBean->id;
	$call->modified_user_id = $user->id;
	$call->created_by = $user->id;
	$call->update_modified_by = false;
	$call->set_created_by = false;
	$call->assigned_user_id = $user->id;
	$call->img_desc = $_REQUEST['MediaUrl0'];
	$call->file_type_c = $_REQUEST['MediaContentType0'] ? $_REQUEST['MediaContentType0'] : NULL;
	$call->assigned_user_name = $user->full_name;
	$call->save();


	logerror("Whatsapp", $lead->full_name, $call->description);

	$relationName = [
		'Opportunities' => 'opportunity_calls',
		'Veta_Requerimiento' => 'veta_requerimiento_activities_1_calls',
		'Lead' => 'calls_leads'
	][$relatedBean->module_name];

	if ($relatedBean->module_name !== 'Lead') {
		$relatedBean->load_relationship($relationName);
		if (empty($relatedBean->$relationName)) {
		} else {
			$relatedBean->$relationName->add($call->id);
		}
	}

	logerror("Whatsapp", $lead->full_name, $call->description);

	$lead->load_relationship('calls');
	$lead->calls->add($call->id);
	// sendToAPI($call, $lead);
	sendToAPI2($call, $lead);

	/** @var Auto_Tickets[] $tickets */
	$tickets = createTicket($user, $relatedBean);
	if ($tickets)
		foreach ($tickets as $ticket) {
			$ticket->load_relationship('auto_tickets_calls_1');
			$ticket->auto_tickets_calls_1->add($call->id);
			logerror('createCall', $ticket->name, $relatedBean->module_name);
			if ($relatedBean->module_name !== 'Lead') {

				$relationName = [
					'Opportunities' => 'auto_tickets_opportunities',
					'Veta_Requerimiento' => 'auto_tickets_veta_requerimiento'
				][$relatedBean->module_name];

				$ticket->load_relationship($relationName);
				$ticket->$relationName->add($relatedBean->id);


				$detalle = json_decode($relatedBean->detalle_semaforizacion_c, true);
				$table = $relatedBean->get_custom_table_name();

				if (is_null($detalle))
					$detalle = [];
				$detalle["ticket" . "_" . "$ticket->id"] = true;
				logerror('createCall', json_encode($detalle));

				$relatedBean->detalle_semaforizacion_c = json_encode($detalle);
				$query = "UPDATE $table SET estado_semaforizacion_c = 'Amarillo', detalle_semaforizacion_c = '$relatedBean->detalle_semaforizacion_c' WHERE id_c = '$relatedBean->id'";

				$db = DBManagerFactory::getInstance();
				$res = $db->query($query);
			}
		}

	return array('call' => $call, 'user' => $user, 'tickets' => $tickets);
}

function createAlert($call, $user)
{
	/** @var Alerts $alert */
	$alert = BeanFactory::newBean('Alerts');
	$alert->name = "New WhatsApp Message for you";
	$alert->url_redirect = "index.php?module=Calls&action=DetailView&record=$call->id";
	$alert->target_module = 'Calls';
	$alert->assigned_user_id = $user->id;
	$alert->type = 'info';
	$alert->is_read = 0;
	$alert->save();

	return $alert;
}

function sendToAPI($call, $lead)
{
	$url = 'http://localhost:6060/cache/update';
	$additional_headers = array(
		'Accept: application/json',
		'Content-Type: application/json',
		'Cookie: PHPSESSID=noexistesession;'
	);

	$msg = [
		"action_date" => $call->date_entered,
		"assigned_user_id" => $call->assigned_user_id,
		"file_type_c" => $call->file_type_c,
		"id" => $call->id,
		"img_desc" => $call->img_desc,
		"lead" => $lead->id,
		"msg" => $call->description,
		"msg_status" => $call->status,
		"number" => $call->name,
		"read" => false,
		"status" => $call->direction

	];
	$data = ["message" => $msg, "module" => "_CallsNC"];
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $additional_headers);

	$server_output = curl_exec($ch);
}
function sendToAPI2($call, $lead)
{
	$url = 'http://localhost:6060/messages/new';
	$additional_headers = array(
		'Accept: application/json',
		'Content-Type: application/json',
		'Cookie: PHPSESSID=noexistesession;'
	);

	$msg = [
		"action_date" => $call->date_entered,
		"assigned_user_id" => $call->assigned_user_id,
		"file_type_c" => $call->file_type_c,
		"id" => $call->id,
		"img_desc" => $call->img_desc,
		"lead" => $lead->id,
		"msg" => $call->description,
		"msg_status" => $call->status,
		"number" => $call->name,
		"read" => false,
		"status" => $call->direction

	];
	$data = ["message" => $msg, "module" => "_CallsNC"];
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $additional_headers);

	$server_output = curl_exec($ch);
	logerror("Whatsapp",$server_output);
}


if (!empty($_REQUEST['From'])) {
	$lead = getLead(explode(":", $_REQUEST['From'])[1]);
	logerror("Whatsapp", $_REQUEST);

	if (!$lead) logerror($_REQUEST['From'] . " doesnt exists");

	[$call, $user] = createCall($lead);

	$alert = createAlert($call, $user);
} else {
	logerror($_REQUEST);
}
