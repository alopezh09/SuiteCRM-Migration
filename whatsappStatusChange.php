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
        $lead = new Lead();
        $lead->retrieve($row['id']);
        // $lead = BeanFactory::getBean('Leads', $row['id']);
        logerror("Whatsapp status change", $lead->id, $row['id']);
        return $lead->id === $row['id'] ? $lead : false;
    }

    return false;
}

function sendToAPI($call, $lead)
{
    $url = 'http://localhost:6060/cache/update';
    logerror("Whatsapp status change", $call->date_entered, $call->fetched_row['date_entered']);
    $additional_headers = array(
        'Accept: application/json',
        'Content-Type: application/json',
        'Cookie: PHPSESSID=noexistesession;'
    );

    $msg = [
        "action_date" => $call->fetched_row['date_entered'],
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
    logerror("Whatsapp status change", $server_output);
}
function sendToAPI2($call, $lead)
{
    $url = 'http://localhost:6060/messages/new';
    logerror("Whatsapp status change", $call->date_entered, $call->fetched_row['date_entered']);
    $additional_headers = array(
        'Accept: application/json',
        'Content-Type: application/json',
        'Cookie: PHPSESSID=noexistesession;'
    );

    $msg = [
        "action_date" => $call->fetched_row['date_entered'],
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
    logerror("Whatsapp status change", $server_output);
}

if ($_REQUEST['SmsSid']) {
    $msgId = $_REQUEST['SmsSid'];

    $callInstance = new Call();
    $beanList = $callInstance->get_list(
        'date_created',
        "calls_cstm.message_id_c = '$msgId'"
    );


    if (!count($beanList['list'])) die;

    $callInstance->retrieve($beanList['list'][0]->id);

    /** @var Lead $lead */
    $lead = getLead(explode(":", $_REQUEST['To'])[1]);

    $statusDict = [
        'sent' => 'Sent',
        'delivered' => 'Received',
        'read' => 'Read'
    ];
    $callInstance->status = $statusDict[$_REQUEST['SmsStatus']];

    logerror(['Whatsapp status change', !!$lead]);
    if ($lead)
        sendToAPI2($callInstance, $lead);

    $callInstance->save();
}
