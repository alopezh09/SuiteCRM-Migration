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
include_once('modules/Veta_Recibo/clases/ReciboPDF.php');
include_once('modules/Veta_Recibo/clases/ReciboPDF_company.php');

$r = new Veta_Recibo();
$r->retrieve($_REQUEST['rid']);

$pdf = new ReciboPDF('P', 'mm', 'Letter');
$pdf->generate_pdf($r);

$pdf = new ReciboPDF_company('P', 'mm', 'Letter');
$pdf->generate_pdf($r);