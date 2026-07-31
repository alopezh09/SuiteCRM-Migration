<?php
if (!defined('sugarEntry')) {
    define('sugarEntry', true);
}
include 'include/MVC/preDispatch.php';
$startTime = microtime(true);
require_once 'include/entryPoint.php';
ob_start();
require_once 'include/MVC/SugarApplication.php';


global $sugar_config, $session_id, $db;

$admin = new Administration();
$admin->retrieveSettings();


$baseConfig =  array (
  'dashlets' => 
  array (
    'b6452963-f60b-4560-58a3-6542a171c3c9' => 
    array (
      'className' => 'Doc_DocsSolicitadosDashlet',
      'module' => 'Doc_DocsSolicitados',
      'options' => 
      array (
        'filters' => 
        array (
          'date_entered' => 
          array (
            'type' => 'TP_this_month',
          ),
          'date_modified' => 
          array (
          ),
          'estadodocumento' => 
          array (
            0 => 'Cargado',
          ),
        ),
        'title' => 'Documents pending to approve',
        'myItemsOnly' => false,
        'displayRows' => '5',
        'displayColumns' => 
        array (
          0 => 'name',
          1 => 'doc_docssolicitados_opportunities_name',
          2 => 'veta_requerimiento_doc_docssolicitados_1_name',
          3 => 'estadodocumento',
          4 => 'date_entered',
        ),
        'autoRefresh' => '0',
      ),
      'fileLocation' => 'modules/Doc_DocsSolicitados/Dashlets/Doc_DocsSolicitadosDashlet/Doc_DocsSolicitadosDashlet.php',
      'sort_options' => 
      array (
        'sortOrder' => 'asc',
        'orderBy' => 'date_entered',
      ),
    ),
    '27391046-7380-6fe0-9cb8-65664656c749' => 
    array (
      'className' => 'MyOpportunitiesDashlet',
      'module' => 'Opportunities',
      'options' => 
      array (
        'filters' => 
        array (
          'date_entered' => 
          array (
          ),
          'estado_servicio_al_cliente_c' => 
          array (
            0 => 'Preparacion_Embajada',
            1 => 'SBS_And_Nomination_Checklist',
            2 => 'Checklist_Consultation_Sent',
            3 => 'Collecting_Documents',
            4 => 'Nomination_Checklist_Sent',
            5 => 'SBS_Checklist_Sent',
            6 => 'Revisado',
            7 => 'Visa',
            8 => 'Process_Requested',
            9 => 'Process_Lodge',
            10 => 'Process_Incompleted',
          ),
          'estado_visas_c' => 
          array (
            0 => 'Pendiente_Luz_Verde',
            1 => 'HAP_ID_Solicitar',
            2 => 'Draft_Done',
            3 => 'Draft_Incomplete',
            4 => 'Lodge_Requested',
            5 => 'Lodge_Incompleted',
            6 => 'Process_Draft_Requested',
            7 => 'Process_Draft_Incompleted',
            8 => 'Process_Draft_Done',
            9 => 'Process_Lodge_Requested',
            10 => 'Process_Lodge_Incompleted',
            11 => 'Process_Lodged',
          ),
          'asignado_servicio_cliente_c' => 
          array (
            0 => '13c7773f-3825-2926-aeff-620d486536e6',
          ),
          'fecha_cierre_c' => 
          array (
          ),
        ),
        'title' => 'Active cases',
        'myItemsOnly' => false,
        'displayRows' => '5',
        'displayColumns' => 
        array (
          0 => 'name',
          1 => 'leads_opportunities_1_name',
          2 => 'estado_servicio_al_cliente_c',
          3 => 'estado_visas_c',
          4 => 'virtual_visa_exp_date_c',
        ),
        'autoRefresh' => '0',
      ),
      'fileLocation' => 'modules/Opportunities/Dashlets/MyOpportunitiesDashlet/MyOpportunitiesDashlet.php',
      'sort_options' => 
      array (
        'sortOrder' => 'asc',
        'orderBy' => 'virtual_visa_exp_date_c',
      ),
    ),
    '128e2f82-fb0b-cf7c-71d1-656649dd4723' => 
    array (
      'className' => 'Veta_VisaDashlet',
      'module' => 'Veta_Visa',
      'options' => 
      array (
        'filters' => 
        array (
          'estado' => 
          array (
            0 => 'Pendiente_Luz_Verde',
            1 => 'HAP_ID_Solicitar',
            2 => 'Draft_Done',
            3 => 'Draft_Incomplete',
            4 => 'Lodge_Requested',
            5 => 'Lodge_Incompleted',
            6 => 'Process_Draft_Requested',
            7 => 'Process_Draft_Incompleted',
            8 => 'Process_Draft_Done',
            9 => 'Process_Lodge_Requested',
            10 => 'Process_Lodge_Incompleted',
            11 => 'Process_Lodged',
          ),
          'nomination_app_expectation_date_c' => 
          array (
            'type' => 'TP_not_null',
          ),
          'eoi_expectation_date_c' => 
          array (
          ),
          'rcb_expectation_date_c' => 
          array (
          ),
          'tas_expectation_date_c' => 
          array (
          ),
          'lmt_expectation_date_c' => 
          array (
          ),
          'sbs_expectation_date_c' => 
          array (
          ),
          'roi_expectation_date_c' => 
          array (
          ),
          'skill_assessment_app_expectation_date_c' => 
          array (
          ),
          'customer_service_c' => 
          array (
            0 => '13c7773f-3825-2926-aeff-620d486536e6',
          ),
        ),
        'title' => 'Nomination expiration date',
        'myItemsOnly' => false,
        'displayRows' => '5',
        'displayColumns' => 
        array (
          0 => 'veta_visa_opportunities_name',
          1 => 'name',
          2 => 'estado',
          3 => 'date_entered',
          4 => 'nomination_app_expectation_date_c',
        ),
        'autoRefresh' => '0',
      ),
      'fileLocation' => 'modules/Veta_Visa/Dashlets/Veta_VisaDashlet/Veta_VisaDashlet.php',
      'sort_options' => 
      array (
        'sortOrder' => 'desc',
        'orderBy' => 'nomination_app_expectation_date_c',
      ),
    ),
    '228e2f82-fb0b-cf7c-71d1-656649dd4723' => 
    array (
      'className' => 'Veta_VisaDashlet',
      'module' => 'Veta_Visa',
      'options' => 
      array (
        'filters' => 
        array (
          'estado' => 
          array (
            0 => 'Pendiente_Luz_Verde',
            1 => 'HAP_ID_Solicitar',
            2 => 'Draft_Done',
            3 => 'Draft_Incomplete',
            4 => 'Lodge_Requested',
            5 => 'Lodge_Incompleted',
            6 => 'Process_Draft_Requested',
            7 => 'Process_Draft_Incompleted',
            8 => 'Process_Draft_Done',
            9 => 'Process_Lodge_Requested',
            10 => 'Process_Lodge_Incompleted',
            11 => 'Process_Lodged',
          ),
          'fecha_aplicacion' => 
          array (
          ),
          'fecha_pago' => 
          array (
          ),
          'eoi_expectation_date_c' => 
          array (
            'type' => 'TP_not_null',
          ),
          'fecha_otorgada' => 
          array (
          ),
          'fecha_firma_acta' => 
          array (
          ),
          'fecha_expiracion' => 
          array (
          ),
          'fecha_examenes_medicos' => 
          array (
          ),
          'fecha_avac' => 
          array (
          ),
          'customer_service_c' => 
          array (
            0 => '13c7773f-3825-2926-aeff-620d486536e6',
          ),
        ),
        'title' => 'EOI expectation date',
        'myItemsOnly' => false,
        'displayRows' => '5',
        'displayColumns' => 
        array (
          0 => 'veta_visa_opportunities_name',
          1 => 'name',
          2 => 'estado',
          3 => 'date_entered',
          4 => 'eoi_expectation_date_c',
        ),
        'autoRefresh' => '0',
      ),
      'fileLocation' => 'modules/Veta_Visa/Dashlets/Veta_VisaDashlet/Veta_VisaDashlet.php',
      'sort_options' => 
      array (
        'sortOrder' => 'asc',
        'orderBy' => 'eoi_expectation_date_c',
      ),
    ),
    '328e2f82-fb0b-cf7c-71d1-656649dd4723' => 
    array (
      'className' => 'Veta_VisaDashlet',
      'module' => 'Veta_Visa',
      'options' => 
      array (
        'filters' => 
        array (
          'estado' => 
          array (
            0 => 'Pendiente_Luz_Verde',
            1 => 'HAP_ID_Solicitar',
            2 => 'Draft_Done',
            3 => 'Draft_Incomplete',
            4 => 'Lodge_Requested',
            5 => 'Lodge_Incompleted',
            6 => 'Process_Draft_Requested',
            7 => 'Process_Draft_Incompleted',
            8 => 'Process_Draft_Done',
            9 => 'Process_Lodge_Requested',
            10 => 'Process_Lodge_Incompleted',
            11 => 'Process_Lodged',
          ),
          'fecha_aplicacion' => 
          array (
          ),
          'fecha_pago' => 
          array (
          ),
          'rcb_expectation_date_c' => 
          array (
            'type' => 'TP_not_null',
          ),
          'fecha_otorgada' => 
          array (
          ),
          'fecha_firma_acta' => 
          array (
          ),
          'fecha_expiracion' => 
          array (
          ),
          'fecha_examenes_medicos' => 
          array (
          ),
          'fecha_avac' => 
          array (
          ),
          'customer_service_c' => 
          array (
            0 => '13c7773f-3825-2926-aeff-620d486536e6',
          ),
        ),
        'title' => 'RCB expectation date',
        'myItemsOnly' => false,
        'displayRows' => '5',
        'displayColumns' => 
        array (
          0 => 'veta_visa_opportunities_name',
          1 => 'name',
          2 => 'estado',
          3 => 'date_entered',
          4 => 'rcb_expectation_date_c',
        ),
        'autoRefresh' => '0',
      ),
      'fileLocation' => 'modules/Veta_Visa/Dashlets/Veta_VisaDashlet/Veta_VisaDashlet.php',
      'sort_options' => 
      array (
        'sortOrder' => 'asc',
        'orderBy' => 'rcb_expectation_date_c',
      ),
    ),
    '428e2f82-fb0b-cf7c-71d1-656649dd4723' => 
    array (
      'className' => 'Veta_VisaDashlet',
      'module' => 'Veta_Visa',
      'options' => 
      array (
        'filters' => 
        array (
          'estado' => 
          array (
            0 => 'Pendiente_Luz_Verde',
            1 => 'HAP_ID_Solicitar',
            2 => 'Draft_Done',
            3 => 'Draft_Incomplete',
            4 => 'Lodge_Requested',
            5 => 'Lodge_Incompleted',
            6 => 'Process_Draft_Requested',
            7 => 'Process_Draft_Incompleted',
            8 => 'Process_Draft_Done',
            9 => 'Process_Lodge_Requested',
            10 => 'Process_Lodge_Incompleted',
            11 => 'Process_Lodged',
          ),
          'fecha_aplicacion' => 
          array (
          ),
          'fecha_pago' => 
          array (
          ),
          'tas_expectation_date_c' => 
          array (
            'type' => 'TP_not_null',
          ),
          'fecha_otorgada' => 
          array (
          ),
          'fecha_firma_acta' => 
          array (
          ),
          'fecha_expiracion' => 
          array (
          ),
          'fecha_examenes_medicos' => 
          array (
          ),
          'fecha_avac' => 
          array (
          ),
          'customer_service_c' => 
          array (
            0 => '13c7773f-3825-2926-aeff-620d486536e6',
          ),
        ),
        'title' => 'TAS expiration date',
        'myItemsOnly' => false,
        'displayRows' => '5',
        'displayColumns' => 
        array (
          0 => 'veta_visa_opportunities_name',
          1 => 'name',
          2 => 'estado',
          3 => 'date_entered',
          4 => 'tas_expectation_date_c',
        ),
        'autoRefresh' => '0',
      ),
      'fileLocation' => 'modules/Veta_Visa/Dashlets/Veta_VisaDashlet/Veta_VisaDashlet.php',
      'sort_options' => 
      array (
        'sortOrder' => 'asc',
        'orderBy' => 'tas_expectation_date_c',
      ),
    ),
    '528e2f82-fb0b-cf7c-71d1-656649dd4723' => 
    array (
      'className' => 'Veta_VisaDashlet',
      'module' => 'Veta_Visa',
      'options' => 
      array (
        'filters' => 
        array (
          'estado' => 
          array (
            0 => 'Pendiente_Luz_Verde',
            1 => 'HAP_ID_Solicitar',
            2 => 'Draft_Done',
            3 => 'Draft_Incomplete',
            4 => 'Lodge_Requested',
            5 => 'Lodge_Incompleted',
            6 => 'Process_Draft_Requested',
            7 => 'Process_Draft_Incompleted',
            8 => 'Process_Draft_Done',
            9 => 'Process_Lodge_Requested',
            10 => 'Process_Lodge_Incompleted',
            11 => 'Process_Lodged',
          ),
          'fecha_aplicacion' => 
          array (
          ),
          'fecha_pago' => 
          array (
          ),
          'lmt_expectation_date_c' => 
          array (
            'type' => 'TP_not_null',
          ),
          'fecha_otorgada' => 
          array (
          ),
          'fecha_firma_acta' => 
          array (
          ),
          'fecha_expiracion' => 
          array (
          ),
          'fecha_examenes_medicos' => 
          array (
          ),
          'fecha_avac' => 
          array (
          ),
          'customer_service_c' => 
          array (
            0 => '13c7773f-3825-2926-aeff-620d486536e6',
          ),
        ),
        'title' => 'LMT expiration date',
        'myItemsOnly' => false,
        'displayRows' => '5',
        'displayColumns' => 
        array (
          0 => 'veta_visa_opportunities_name',
          1 => 'name',
          2 => 'estado',
          3 => 'date_entered',
          4 => 'lmt_expectation_date_c',
        ),
        'autoRefresh' => '0',
      ),
      'fileLocation' => 'modules/Veta_Visa/Dashlets/Veta_VisaDashlet/Veta_VisaDashlet.php',
      'sort_options' => 
      array (
        'sortOrder' => 'asc',
        'orderBy' => 'lmt_expectation_date_c',
      ),
    ),
    '628e2f82-fb0b-cf7c-71d1-656649dd4723' => 
    array (
      'className' => 'Veta_VisaDashlet',
      'module' => 'Veta_Visa',
      'options' => 
      array (
        'filters' => 
        array (
          'estado' => 
          array (
            0 => 'Pendiente_Luz_Verde',
            1 => 'HAP_ID_Solicitar',
            2 => 'Draft_Done',
            3 => 'Draft_Incomplete',
            4 => 'Lodge_Requested',
            5 => 'Lodge_Incompleted',
            6 => 'Process_Draft_Requested',
            7 => 'Process_Draft_Incompleted',
            8 => 'Process_Draft_Done',
            9 => 'Process_Lodge_Requested',
            10 => 'Process_Lodge_Incompleted',
            11 => 'Process_Lodged',
          ),
          'fecha_aplicacion' => 
          array (
          ),
          'fecha_pago' => 
          array (
          ),
          'sbs_expectation_date_c' => 
          array (
            'type' => 'TP_not_null',
          ),
          'fecha_otorgada' => 
          array (
          ),
          'fecha_firma_acta' => 
          array (
          ),
          'fecha_expiracion' => 
          array (
          ),
          'fecha_examenes_medicos' => 
          array (
          ),
          'fecha_avac' => 
          array (
          ),
          'customer_service_c' => 
          array (
            0 => '13c7773f-3825-2926-aeff-620d486536e6',
          ),
        ),
        'title' => 'SBS expiration date',
        'myItemsOnly' => false,
        'displayRows' => '5',
        'displayColumns' => 
        array (
          0 => 'veta_visa_opportunities_name',
          1 => 'name',
          2 => 'estado',
          3 => 'date_entered',
          4 => 'sbs_expectation_date_c',
        ),
        'autoRefresh' => '0',
      ),
      'fileLocation' => 'modules/Veta_Visa/Dashlets/Veta_VisaDashlet/Veta_VisaDashlet.php',
      'sort_options' => 
      array (
        'sortOrder' => 'asc',
        'orderBy' => 'sbs_expectation_date_c',
      ),
    ),
    '728e2f82-fb0b-cf7c-71d1-656649dd4723' => 
    array (
      'className' => 'Veta_VisaDashlet',
      'module' => 'Veta_Visa',
      'options' => 
      array (
        'filters' => 
        array (
          'estado' => 
          array (
            0 => 'Pendiente_Luz_Verde',
            1 => 'HAP_ID_Solicitar',
            2 => 'Draft_Done',
            3 => 'Draft_Incomplete',
            4 => 'Lodge_Requested',
            5 => 'Lodge_Incompleted',
            6 => 'Process_Draft_Requested',
            7 => 'Process_Draft_Incompleted',
            8 => 'Process_Draft_Done',
            9 => 'Process_Lodge_Requested',
            10 => 'Process_Lodge_Incompleted',
            11 => 'Process_Lodged',
          ),
          'fecha_aplicacion' => 
          array (
          ),
          'fecha_pago' => 
          array (
          ),
          'roi_expectation_date_c' => 
          array (
            'type' => 'TP_not_null',
          ),
          'fecha_otorgada' => 
          array (
          ),
          'fecha_firma_acta' => 
          array (
          ),
          'fecha_expiracion' => 
          array (
          ),
          'fecha_examenes_medicos' => 
          array (
          ),
          'fecha_avac' => 
          array (
          ),
          'customer_service_c' => 
          array (
            0 => '13c7773f-3825-2926-aeff-620d486536e6',
          ),
        ),
        'title' => 'ROI expiration date',
        'myItemsOnly' => false,
        'displayRows' => '5',
        'displayColumns' => 
        array (
          0 => 'veta_visa_opportunities_name',
          1 => 'name',
          2 => 'estado',
          3 => 'date_entered',
          4 => 'roi_expectation_date_c',
        ),
        'autoRefresh' => '0',
      ),
      'fileLocation' => 'modules/Veta_Visa/Dashlets/Veta_VisaDashlet/Veta_VisaDashlet.php',
      'sort_options' => 
      array (
        'sortOrder' => 'asc',
        'orderBy' => 'roi_expectation_date_c',
      ),
    ),
    '828e2f82-fb0b-cf7c-71d1-656649dd4723' => 
    array (
      'className' => 'Veta_VisaDashlet',
      'module' => 'Veta_Visa',
      'options' => 
      array (
        'filters' => 
        array (
          'estado' => 
          array (
            0 => 'Pendiente_Luz_Verde',
            1 => 'HAP_ID_Solicitar',
            2 => 'Draft_Done',
            3 => 'Draft_Incomplete',
            4 => 'Lodge_Requested',
            5 => 'Lodge_Incompleted',
            6 => 'Process_Draft_Requested',
            7 => 'Process_Draft_Incompleted',
            8 => 'Process_Draft_Done',
            9 => 'Process_Lodge_Requested',
            10 => 'Process_Lodge_Incompleted',
            11 => 'Process_Lodged',
          ),
          'fecha_aplicacion' => 
          array (
          ),
          'fecha_pago' => 
          array (
          ),
          'skill_assessment_app_expectation_date_c' => 
          array (
            'type' => 'TP_not_null',
          ),
          'fecha_otorgada' => 
          array (
          ),
          'fecha_firma_acta' => 
          array (
          ),
          'fecha_expiracion' => 
          array (
          ),
          'fecha_examenes_medicos' => 
          array (
          ),
          'fecha_avac' => 
          array (
          ),
          'customer_service_c' => 
          array (
            0 => '13c7773f-3825-2926-aeff-620d486536e6',
          ),
        ),
        'title' => 'Skill Assessment APP expiration date',
        'myItemsOnly' => false,
        'displayRows' => '5',
        'displayColumns' => 
        array (
          0 => 'veta_visa_opportunities_name',
          1 => 'name',
          2 => 'estado',
          3 => 'date_entered',
          4 => 'skill_assessment_app_expectation_date_c',
        ),
        'autoRefresh' => '0',
      ),
      'fileLocation' => 'modules/Veta_Visa/Dashlets/Veta_VisaDashlet/Veta_VisaDashlet.php',
      'sort_options' => 
      array (
        'sortOrder' => 'asc',
        'orderBy' => 'skill_assessment_app_expectation_date_c',
      ),
    ),
    '7e5d0a42-fe3b-38e0-734b-65664af3f962' => 
    array (
      'className' => 'MyOpportunitiesDashlet',
      'module' => 'Opportunities',
      'options' => 
      array (
        'filters' => 
        array (
          'date_entered' => 
          array (
          ),
          'estado_servicio_al_cliente_c' => 
          array (
            0 => 'Preparacion_Embajada',
            1 => 'SBS_And_Nomination_Checklist',
            2 => 'Checklist_Consultation_Sent',
            3 => 'Collecting_Documents',
            4 => 'Nomination_Checklist_Sent',
            5 => 'SBS_Checklist_Sent',
            6 => 'Revisado',
            7 => 'Visa',
            8 => 'Process_Requested',
            9 => 'Process_Lodge',
            10 => 'Process_Incompleted',
          ),
          'estado_visas_c' => 
          array (
            0 => 'Pendiente_Luz_Verde',
            1 => 'HAP_ID_Solicitar',
            2 => 'Draft_Done',
            3 => 'Draft_Incomplete',
            4 => 'Lodge_Requested',
            5 => 'Lodge_Incompleted',
            6 => 'Process_Draft_Requested',
            7 => 'Process_Draft_Incompleted',
            8 => 'Process_Draft_Done',
            9 => 'Process_Lodge_Requested',
            10 => 'Process_Lodge_Incompleted',
            11 => 'Process_Lodged',
          ),
          'asignado_servicio_cliente_c' => 
          array (
            0 => '13c7773f-3825-2926-aeff-620d486536e6',
          ),
          'fecha_cierre_c' => 
          array (
          ),
        ),
        'title' => 'Next Contact date',
        'myItemsOnly' => false,
        'displayRows' => '5',
        'displayColumns' => 
        array (
          0 => 'name',
          1 => 'opportunity_type',
          2 => 'estado_servicio_al_cliente_c',
          3 => 'estado_visas_c',
          4 => 'leads_opportunities_1_name',
          5 => 'next_contact_date_company_c',
        ),
        'autoRefresh' => '0',
      ),
      'fileLocation' => 'modules/Opportunities/Dashlets/MyOpportunitiesDashlet/MyOpportunitiesDashlet.php',
      'sort_options' => 
      array (
        'sortOrder' => 'asc',
        'orderBy' => 'next_contact_date_company_c',
      ),
    ),
  ),
  'pages' => 
  array (
    0 => 
    array (
      'columns' => 
      array (
        0 => 
        array (
          'width' => '60%',
          'dashlets' => 
          array (
            0 => '7e5d0a42-fe3b-38e0-734b-65664af3f962',
            1 => 'b6452963-f60b-4560-58a3-6542a171c3c9',
            2 => '228e2f82-fb0b-cf7c-71d1-656649dd4723',
            3 => '428e2f82-fb0b-cf7c-71d1-656649dd4723',
            4 => '628e2f82-fb0b-cf7c-71d1-656649dd4723',
            5 => '828e2f82-fb0b-cf7c-71d1-656649dd4723',
          ),
        ),
        1 => 
        array (
          'width' => '40%',
          'dashlets' => 
          array (
            0 => '27391046-7380-6fe0-9cb8-65664656c749',
            1 => '128e2f82-fb0b-cf7c-71d1-656649dd4723',
            2 => '328e2f82-fb0b-cf7c-71d1-656649dd4723',
            3 => '528e2f82-fb0b-cf7c-71d1-656649dd4723',
            4 => '728e2f82-fb0b-cf7c-71d1-656649dd4723',
          ),
        ),
      ),
      'numColumns' => '3',
      'pageTitleLabel' => 'LBL_HOME_PAGE_1_NAME',
    ),
  ),
);

$query = "SELECT u.id, up.id as preference_id, up.contents
FROM users u 
JOIN users_cstm uc ON uc.id_c = u.id
LEFT JOIN user_preferences up ON u.id = up.assigned_user_id AND up.category = 'Home'
WHERE u.id in (
  '9cbaad3d-e291-fdbf-67f4-628537e3607e',
  '75e58911-68d1-4057-1936-64ed20d4b0ce',
  '7aaf1b9f-0e9a-f471-84fb-6425a3e89353',
  '32c647db-0c23-3327-30e2-64a5f326b93a'
)
";

$res = $db->query($query);

while ($row = $db->fetchByAssoc($res)) {
    $contents = $baseConfig;

    $contents['dashlets']['27391046-7380-6fe0-9cb8-65664656c749']['options']['filters']['asignado_servicio_cliente_c'] = [$row['id']];
    $contents['dashlets']['128e2f82-fb0b-cf7c-71d1-656649dd4723']['options']['filters']['customer_service_c'] = [$row['id']];
    $contents['dashlets']['228e2f82-fb0b-cf7c-71d1-656649dd4723']['options']['filters']['customer_service_c'] = [$row['id']];
    $contents['dashlets']['328e2f82-fb0b-cf7c-71d1-656649dd4723']['options']['filters']['customer_service_c'] = [$row['id']];
    $contents['dashlets']['428e2f82-fb0b-cf7c-71d1-656649dd4723']['options']['filters']['customer_service_c'] = [$row['id']];
    $contents['dashlets']['528e2f82-fb0b-cf7c-71d1-656649dd4723']['options']['filters']['customer_service_c'] = [$row['id']];
    $contents['dashlets']['628e2f82-fb0b-cf7c-71d1-656649dd4723']['options']['filters']['customer_service_c'] = [$row['id']];
    $contents['dashlets']['728e2f82-fb0b-cf7c-71d1-656649dd4723']['options']['filters']['customer_service_c'] = [$row['id']];
    $contents['dashlets']['828e2f82-fb0b-cf7c-71d1-656649dd4723']['options']['filters']['customer_service_c'] = [$row['id']];
    $contents['dashlets']['7e5d0a42-fe3b-38e0-734b-65664af3f962']['options']['filters']['asignado_servicio_cliente_c'] = [$row['id']];

    // echo $contents['dashlets']['6cebb9d2-bef0-17a5-04c9-653be2547b81']['options']['filters']['created_by'] . "<br>";
    // echo "$updateQuery <br>";

    $contentsStr = base64_encode(serialize($contents));
    if ($row['preference_id']) {
        $updateQuery = "UPDATE user_preferences SET contents = '$contentsStr' WHERE id = '" . $row['preference_id'] . "';";
        echo "$updateQuery <br>";
    }
}
