<?php

if (!defined('sugarEntry')) {
	define('sugarEntry', true);
}

include 'include/MVC/preDispatch.php';
$startTime = microtime(true);
require_once 'include/entryPoint.php';
ob_start();
require_once 'include/MVC/SugarApplication.php';

$inactiveModules = [
	"AM_ProjectTemplates",
	"AM_TaskTemplates",
	"AOS_Contracts",
	"AOS_Invoices",
	"AOS_Line_Item_Groups",
	"AOS_Product_Categories",
	"AOS_Products",
	"AOS_Products_Quotes",
	"AOS_Quotes",
	"Accounts",
	"Account",
	"OAuthToken",
	"Currencies",
	"Curso_DetallePresupuesto",
	"Curso_DetalleRecibo",
	"Curso_DetallesCursos",
	"Project",
	"SurveyQuestionOptions",
	"SurveyQuestionResponses",
	"SurveyQuestions",
	"SurveyResponses",
	"Surveys",
	"Trav_Service",
	"Veta_Ciudadania",
	"Veta_CorreccionCOE",
	"Veta_InformacionAcademica",
	"Veta_InformacionLaboral",
	"Veta_OtrosNombres",
	"Veta_Pasaporte",
	"Veta_ServiciosAdicionales",
	"Veta_SolvenciaEconomica",
	"Veta_Visas",
	"SecurityGroup",
	"Task",
	"Meeting",
	"Meetings",
	"Email",
	"EmailAddress",
	"Project",
	"User",
	"Users",
	"Note",
	"Contacts",
	"Contact",
	"Lead",
	"Leads",
	"Calls",
	"Call",
	"Case",
	"Doc_Comentarios",
	"Auto_Tickets",
	"CampaignLog",
	"Veta_DetalleReciboItem",
	"Emails",
	"EmailTemplates",
	"SecurityGroups",
	"ProjectTask",
	"Bug",
	"Auto_Recordatorio",
	"Cases",
	"Notes",
	"Tasks",
	"ProspectLists",
	"Col_ComentariosColAge",
	"Col_ComentariosColEstAge",
	"Col_DocSolicitadosColegio",
	"Col_Plantilla_Colegio",
	"Col_Usuario_Colegio",
];


$map = [
	"User" => "Users",
	"Contact" => "Contacts",
	"Lead" => "Leads",
	"Call" => "Calls",
	'Opportunity' => "Opportunities",
	"Account" => "Accounts",
	"Campaign" => "Campaigns",

];

$bean = BeanFactory::getBean("Veta_Requerimiento");
define("MAX_DEPTH", 100);
$passedBeans = [];
$relData = [];
$relFieldData = [];
$beanData = [];

$basicBean = new Basic();

function getBeanData($bean, &$data)
{
	global $basicBean;

	$data[$bean->module_name] = [
		"properties" => array_filter(
			$bean->getFieldDefinitions(),
			function ($fieldDef) {
				return $fieldDef["type"]!=="relate" && $fieldDef["type"]!=="link";
			}
		),
		"functions" => array_diff(get_class_methods($bean), get_class_methods($basicBean))
	];
}

function fillRelData(&$relData, &$relFieldData, &$passedBeans, &$beanData, $bean, $depth = 0)
{
	global $inactiveModules, $map;
	if (in_array($bean->module_name, array_merge($passedBeans, $inactiveModules)) || $depth > MAX_DEPTH) {
		// echo "Salio de $bean->module_name : " . ((in_array($passedBeans, $bean->module_name)) ? "1" : "0") . "||" . ($depth > 4 ? "1" : "0") . "<br>";
		return;
	}
	getBeanData($bean, $beanData);
	$passedBeans[] = $bean->module_name;
	foreach ($bean->getFieldDefinitions() as $key => $val) {

		if (isset($val['type']) && $val['type'] === 'link' && $val['module'] && !in_array($val['module'], $inactiveModules)) {
			$newBean = BeanFactory::getBean($val['module']);

			if ($map[$val['module']]) $val['module'] = $map[$val['module']];

			$rel = [$bean->module_name, $val['module']];
			sort($rel);
			$relData[] = $rel;

			if ($newBean) {
				fillRelData($relData, $relFieldData, $passedBeans, $beanData, $newBean, $depth + 1);
			}
		} elseif (isset($val['type']) && $val['type'] === 'relate' && $val['module'] && !in_array($val['module'], $inactiveModules)) {
			// var_dump($val);die;


			$rel = [$bean->module_name, $val['module']];
			sort($rel);
			$relFieldData[] = $rel;

			$newBean = BeanFactory::getBean($val['module']);
			// echo "existe " . $val['module'] . " " . (!!$newBean ? "1" : "0") . "<br>";
			if ($newBean) {
				fillRelData($relData, $relFieldData, $passedBeans, $beanData, $newBean, $depth + 1);
			}
		}
	}
}

fillRelData($relData, $relFieldData, $passedBeans, $beanData, $bean);
// var_dump(array_map("serialize", array_values($relData)));
// var_dump(array_map("unserialize", array_unique(array_map("serialize", array_values($relData)))));

// die;
$relData = array_values(array_map("unserialize", array_unique(array_map("serialize", array_values($relData)))));
$relFieldData = array_values(array_map("unserialize", array_unique(array_map("serialize", array_values($relFieldData)))));

$data = [];
foreach ($relData as $key => $value) {
	$data[] = [
		"from" => $value[0],
		"to" => $value[1],
		"color" => "rgba(255,0,0,0.5)",
	];
}
foreach ($relFieldData as $key => $value) {
	$data[] = [
		"from" => $value[0],
		"to" => $value[1],
		"color" => "rgba(0,0,255,0.5)",
	];
}
$data = array_values(array_map("unserialize", array_unique(array_map("serialize", array_values($data)))));

$jsonRelData = json_encode($data);
// $jsonrRelFieldData = json_encode($relFieldData);

// header("Content-type: application/json");
// echo json_encode($bean->relationship_fields	, JSON_PRETTY_PRINT);
// echo json_encode(array_keys((array)$bean), JSON_PRETTY_PRINT);
// echo $jsonRelData; die;
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/networkgraph.js"></script>
</head>

<body>
	<style>
		.h5,
		h5 {
			font-size: 1.25rem;
		}



		body {
			margin: 0;
			font-family: var(--bs-body-font-family);
			font-size: var(--bs-body-font-size);
			font-weight: var(--bs-body-font-weight);
			line-height: var(--bs-body-line-height);
			color: var(--bs-body-color);
			text-align: var(--bs-body-text-align);
			background-color: var(--bs-body-bg);
			-webkit-text-size-adjust: 100%;
			-webkit-tap-highlight-color: transparent;
		}

		.card {
			border: 1px solid black;
			max-width: 36rem;
			margin:15px;

		}

		.card-title {
			border-bottom: 1px solid black;
			text-align: center;
			padding: 10px 0 10px;
			margin: 0;
		}

		ul {
			border-bottom: 1px solid black;
			padding: 10px 0 10px 10px;
			margin: 0;
			list-style-type: none;
			max-height: 15lh;
			overflow-y: scroll;
		}
		li{
			height: 1lh;	
			line-height: 1lh;	
		}

		ul:last-child {
			border-bottom: unset;

		}

		.d-none {
			display: none;
		}
	</style>
	<figure class="highcharts-figure">
		<div id="container"></div>
	</figure>
	<figure class="highcharts-figure">
		<div id="container_propuesta"></div>
	</figure>

	<script>
		// Add the nodes option through an event call. We want to start with the parent
		// item and apply separate colors to each child element, then the same color to
		// grandchildren.
		Highcharts.chart('container', {
			chart: {
				type: 'networkgraph',
				height: 800
			},
			title: {
				text: 'Actual'
			},
			plotOptions: {
				networkgraph: {
					layoutAlgorithm: {
						linkLength: 50 // in pixels
					},
					link: {
						color: 'red'
					}
				}
			},
			series: [{
				data: <?php echo $jsonRelData; ?>,
				dataLabels: {
					enabled: true,
					linkFormat: '',
					style: {
						fontSize: '0.8em',
						fontWeight: 'normal'
					}
				}
			}]
		})

		Highcharts.chart('container_propuesta', {
			chart: {
				type: 'networkgraph',
				height: 800
			},
			title: {
				text: 'Propuesta'
			},
			plotOptions: {
				networkgraph: {
					layoutAlgorithm: {
						linkLength: 50 // in pixels
					},
					link: {
						color: 'red'
					}
				}
			},
			series: [{
				data: [{
						from: "Veta_Requerimiento",
						to: "Campaigns",
						color: 'rgba(0,0,255,0.5)'
					},
					{
						from: "Veta_Requerimiento",
						to: "Veta_Presupuesto",
						color: 'rgba(255,0,0,0.5)'
					},
					{
						from: "Veta_Requerimiento",
						to: "Veta_Perfilamiento",
						color: 'rgba(255,0,0,0.5)'
					},
					{
						from: "Veta_Presupuesto",
						to: "Veta_Recibo",
						color: 'rgba(255,0,0,0.5)'
					},
					{
						from: "Veta_Recibo",
						to: "Opportunities",
						color: 'rgba(255,0,0,0.5)'
					},
					{
						from: "Veta_Recibo",
						to: "Veta_DetalleRecibo",
						color: 'rgba(255,0,0,0.5)'
					},
					{
						from: "Opportunities",
						to: "Veta_Cartera",
						color: 'rgba(255,0,0,0.5)'
					},
					{
						from: "Veta_Cartera",
						to: "srefu_Scheduled_Refund",
						color: 'rgba(255,0,0,0.5)'
					},
					{
						from: "srefu_Scheduled_Refund",
						to: "srefu_Refund",
						color: 'rgba(255,0,0,0.5)'
					},
					{
						from: "Veta_Cartera",
						to: "Veta_Abono",
						color: 'rgba(255,0,0,0.5)'
					},
					{
						from: "Veta_Cartera",
						to: "Futpa_Schedulled_Payments",
						color: 'rgba(255,0,0,0.5)'
					},
					{
						from: "Futpa_Schedulled_Payments",
						to: "Futpa_Installment_Payments",
						color: 'rgba(255,0,0,0.5)'
					},
					{
						from: "Veta_Cartera",
						to: "Veta_PagoColegios",
						color: 'rgba(255,0,0,0.5)'
					},
					{
						from: "Veta_PagoColegios",
						to: "Veta_Aplicacion",
						color: 'rgba(0, 255, 255, 0.5)'
					},
					{
						from: "Veta_PagoColegios",
						to: "Veta_NotificacionPagoColegios",
						color: 'rgba(255,0, 0, 0.5)'
					},
					{
						from: "Veta_PagoColegios",
						to: "Futpa_Schedulled_Payments",
						color: 'rgba(0, 255, 255, 0.5)'
					},
					{
						from: "Veta_Cartera",
						to: "Veta_Liquidacion",
						color: 'rgba(255,0,0,0.5)'
					},
					{
						from: "Veta_Liquidacion",
						to: "Veta_Aplicacion",
						color: 'rgba(255,0,0,0.5)'
					},
					{
						from: "Veta_Liquidacion",
						to: "Veta_Pagos",
						color: 'rgba(255,0,0,0.5)'
					},
					{
						from: "Opportunities",
						to: "Veta_Aplicacion",
						color: 'rgba(255,0,0,0.5)'
					},
					{
						from: "Veta_DetalleRecibo",
						to: "Veta_Aplicacion",
						color: 'rgba(255,0,0,0.5)'
					},
					{
						from: "Veta_Aplicacion",
						to: "Veta_LOO",
						color: 'rgba(255,0,0,0.5)'
					},
					{
						from: "Veta_Aplicacion",
						to: "Veta_COE",
						color: 'rgba(255,0,0,0.5)'
					},
					{
						from: "Veta_Aplicacion",
						to: "Veta_Curso",
						color: 'rgba(0,0,255,0.5)'
					},
					{
						from: "Veta_Curso",
						to: "Veta_College",
						color: 'rgba(255,0,0,0.5)'
					},
					{
						from: "Opportunities",
						to: "Veta_Visa",
						color: 'rgba(255,0,0,0.5)'
					},
					{
						from: "Opportunities",
						to: "Veta_ServicioCliente",
						color: 'rgba(255,0,0,0.5)'
					},
					{
						from: "Veta_ServicioCliente",
						to: "Veta_Aplicacion",
						color: 'rgba(255,0,0,0.5)'
					},
					{
						from: "Veta_ServicioCliente",
						to: "Veta_Visa",
						color: 'rgba(255,0,0,0.5)'
					},
					{
						from: "Opportunities",
						to: "Doc_DocsSolicitados",
						color: 'rgba(255,0,0,0.5)'
					},
					{
						from: "Opportunities",
						to: "Doc_Plantillas",
						color: 'rgba(255,0,0,0.5)',
						width: 4,
						dashStyle: 'dot'
					},
					{
						from: "Doc_Plantillas",
						to: "Doc_Documentos",
						color: 'rgba(255,0,0,0.5)'
					},
					{
						from: "Doc_Documentos",
						to: "Doc_DocsSolicitados",
						color: 'rgba(0,0,255,0.5)'
					},
					{
						from: "Opportunities",
						to: "Doc_Documentos_Adic",
						color: 'rgba(255,0,0,0.5)'
					},

				],
				nodes: [{
						id: "Doc_Documentos_Adic",
						marker: {
							symbol: "triangle",
							radius: 5
						}
					}, {
						id: "Veta_Curso",
						color: "green",
					}, {
						id: "Veta_College",
						color: "green",
					}, {
						id: "Campaigns",
						color: "green",
					}, {
						id: "Doc_Plantillas",
						color: "green",
					}, {
						id: "Doc_Documentos",
						color: "green",
					},

				],
				dataLabels: {
					enabled: true,
					linkFormat: '',
					style: {
						fontSize: '0.8em',
						fontWeight: 'normal'
					}
				}
			}]
		})
	</script>
	<!-- <pre>
		<?php
		echo count($relData); ?>,
		<?php sort($passedBeans);
		echo json_encode($passedBeans, JSON_PRETTY_PRINT); ?>,
	</pre> -->

	<div style="display: flex; flex-wrap: wrap;">


		<?php
		foreach ($beanData as $module => $data) {
		?>

			<div class="card">
				<div class="card-body">
					<h5 class="card-title"><?php echo $module; ?></h5>
					<div class="card-text">
						<ul>
							<?php
							foreach ($data["properties"] as $property) {
								echo "<li>" . ($property["source"] === "non-db" ? "▲ " : "+ ") . $property["name"] . ": " . $property["type"] . "</li>";
							}
							?>
						</ul>
						<ul>
							<?php
							foreach ($data["functions"] as $function) {
								echo "<li>- $function()</li>";
							}
							?>
						</ul>
					</div>
				</div>
			</div>
		<?php
		}
		?>
	</div>



</body>

</html>