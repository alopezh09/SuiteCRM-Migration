<?php

if (!defined('sugarEntry')) {
	define('sugarEntry', true);
}

include 'include/MVC/preDispatch.php';
$startTime = microtime(true);
require_once 'include/entryPoint.php';
ob_start();
require_once 'include/MVC/SugarApplication.php';

// include('modules/CSChe_Items_Requested/CSChe_Items_Requested.php');
include_once('modules/CSChe_Items_Requested/CSChe_Items_Requested.php');
include_once('modules/Doc_DocsSolicitados/Doc_DocsSolicitados.php');
include_once('modules/Doc_Documentos_Adic/Doc_Documentos_Adic.php');

// echo "EN APPROVE CHECKLIST";die;

$bean;
switch ($_REQUEST['module']) {
	case 'CSChe_Items_Requested':
		$bean = new CSChe_Items_Requested();

		break;
	case 'Doc_DocsSolicitados':
		$bean = new Doc_DocsSolicitados();
		break;
	case 'Doc_Documentos_Adic':
		$bean = new Doc_Documentos_Adic();
		break;

	default:
		echo "MODULO NO VALIDO";
		die;
		break;
}
$bean->retrieve($_REQUEST['id']);

if (empty($bean->name)) {
	echo "ID NO VALIDO";
	die;
}


switch ($_REQUEST['module']) {
	case 'CSChe_Items_Requested':
		$bean->status = 'Revising';
		break;
		
	case 'Doc_DocsSolicitados':
	case 'Doc_Documentos_Adic':
		$bean->estadodocumento = 'Revising';
		break;

	default:
		echo "MODULO NO VALIDO";
		die;
		break;
}

$bean->save();
//UPDATE csche_items_requested SET status = 'Aprobado' WHERE (id = "$record_id");