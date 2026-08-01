<?php
header("Access-Control-Allow-Origin: *");

if (!defined('sugarEntry')) {
    define('sugarEntry', true);
}

include 'include/MVC/preDispatch.php';
$startTime = microtime(true);
require_once 'include/entryPoint.php';
ob_start();
require_once 'include/MVC/SugarApplication.php';

include_once('modules/Veta_Recibo/Veta_Recibo.php');

include_once('modules/Users/User.php');
require_once('modules/Veta_Recibo/clases/Media.php');



function send_notification()
{
    $r = new Veta_Recibo();
    $r->retrieve($_REQUEST['rid']);
    $u = new User();
    $u->retrieve($r->assigned_user_id);
    // var_dump($r);
    if (!empty($r->veta_recibo_leadsleads_ida)) {

        $o = new Lead();
        $o->retrieve($r->veta_recibo_leadsleads_ida);
    } else {
        echo "contacto no existe";
        return;
    }

    $media = new MediaRecibo();

    $body = "<p>The student $o->full_name has signed his Cost agreement, you can see it <a href='http://ec2-34-239-163-93.compute-1.amazonaws.com/index.php?module=Veta_Recibo&action=pdf&rid=$r->id'>here</a></p>";

    if ($media->send_email($u->email1, $body, "Cost Agreement signed")) {
        echo "Correo enviado";
    } else {
        echo "Correo no enviado";
    }

    // $q="SELECT * FROM";
    // $r->db;
}

send_notification();
