<?php

if (!defined('sugarEntry')) {
    define('sugarEntry', true);
}

include 'include/MVC/preDispatch.php';
$startTime = microtime(true);
require_once 'include/entryPoint.php';
ob_start();
require_once 'include/MVC/SugarApplication.php';

include_once('modules/Veta_Recibo/Veta_Recibo.php');
include_once('modules/Veta_Requerimiento/Veta_Requerimiento.php');
include_once('modules/NVC_Companies/NVC_Companies.php');

include_once('modules/Users/User.php');
require_once('modules/Veta_Recibo/clases/Media.php');



function send_notification()
{
    $r = new Veta_Recibo();
    $r->retrieve($_REQUEST['rid']);
    $u = new User();
    $u->retrieve($r->assigned_user_id);
    
    $requeriment = new Veta_Requerimiento();
    $requeriment->retrieve($r->veta_requerimiento_veta_reciboveta_requerimiento_ida);
    
    $company = new NVC_Companies;
    $company->retrieve($requeriment->nvc_companies_veta_requerimiento_1nvc_companies_ida);
    
    
    $media = new MediaRecibo();
    
    $body = "<p>Company $company->name has signed his Cost agreement, you can see it <a href='http://ec2-34-239-163-93.compute-1.amazonaws.com/index.php?module=Veta_Recibo&action=pdf_company&rid=$r->id'>here</a></p>";
    
    if ($media->send_email($u->email1, $body, "Cost Agreement signed")) {
        echo "Correo enviado";
    } else {
        echo "Correo no enviado";
    }

    // $q="SELECT * FROM";
    // $r->db;
}

send_notification();
