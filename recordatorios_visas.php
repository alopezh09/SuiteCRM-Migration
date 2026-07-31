<?php

if (!defined('sugarEntry')) {
    define('sugarEntry', true);
}

include 'include/MVC/preDispatch.php';
$startTime = microtime(true);
require_once 'include/entryPoint.php';
ob_start();
require_once 'include/MVC/SugarApplication.php';
$interval = "WEEK";
$remaindersDef = [

    "visa_aplicada" => [
        "orden" => 15,
        "title" => "Visas Lodged",
        "type" => "Accion",
        "periodicy" => "N/A",
        "planned_query" => "SELECT 'Opportunities' as module_name,vo.veta_visa_opportunitiesopportunities_ida  as module_id, 'planed' as type,date_created as date,curdate() - INTERVAL 1 $interval as start_date, curdate() as end_date, '' as description
                            FROM veta_visa_audit 
                            JOIN veta_visa_opportunities_c vo ON vo.veta_visa_opportunitiesveta_visa_idb = parent_id
                            WHERE after_value_string = 'Visa_Aplicada'
                            AND date(date_created) BETWEEN curdate() - INTERVAL 1 $interval AND curdate()",
        "queued_query" => "SELECT parent_type as module_name, parent_id as module_id, 'queued' as type,date_entered as date,curdate() - INTERVAL 1 $interval  as start_date, curdate() as end_date, outlook_api_description_c as description
                            FROM emails 
                            JOIN emails_cstm ON id_c = id
                            WHERE (name like 'Visa Application Acknowledgement' )
                            AND type = 'archived'
                            AND intent = 'pick'
                            AND automatic_c = 1
                            AND date(date_entered) BETWEEN curdate() - INTERVAL 1 $interval   AND curdate();"

    ],
    // "visa_denied" => [
    //     "orden" => 15,
    //     "title" => "Visas Denied",
    //     "type" => "Accion",
    //     "periodicy" => "N/A",
    //     "planned_query" => "SELECT 'Opportunities' as module_name,vo.veta_visa_opportunitiesopportunities_ida  as module_id, 'planed' as type,date_created as date,curdate() - INTERVAL 1 $interval as start_date, curdate() as end_date, '' as description
    //                         FROM veta_visa_audit 
    //                         JOIN veta_visa_opportunities_c vo ON vo.veta_visa_opportunitiesveta_visa_idb = parent_id
    //                         WHERE after_value_string = 'Visa_Negada'
    //                         AND date(date_created) BETWEEN curdate() - INTERVAL 1 $interval  AND curdate()",
    //     "queued_query" => "SELECT parent_type as module_name, parent_id as module_id, 'queued' as type,date_entered as date,curdate() - INTERVAL 1 $interval  as start_date, curdate() as end_date, outlook_api_description_c as description
    //                         FROM emails 
    //                         JOIN emails_cstm ON id_c = id
    //                         WHERE name like 'NOTIFICACION RESPUESTA OFICIAL VISA -%' 
    //                         AND type = 'archived'
    //                         AND intent = 'pick'
    //                         AND automatic_c = 1
    //                         AND date(date_entered) BETWEEN curdate() - INTERVAL 1 $interval   AND curdate();"

    // ],
    "visa_approved" => [
        "orden" => 15,
        "title" => "Visas Approved",
        "type" => "Accion",
        "periodicy" => "N/A",
        "planned_query" => "SELECT 'Opportunities' as module_name,vo.veta_visa_opportunitiesopportunities_ida  as module_id, 'planed' as type,date_created as date,curdate() - INTERVAL 1 $interval as start_date, curdate() as end_date, '' as description
                            FROM veta_visa_audit 
                            JOIN veta_visa_opportunities_c vo ON vo.veta_visa_opportunitiesveta_visa_idb = parent_id
                            WHERE after_value_string = 'Visa_Otorgada'
                            AND date(date_created) BETWEEN curdate() - INTERVAL 1 $interval  AND curdate()",
        "queued_query" => "SELECT parent_type as module_name, parent_id as module_id, 'queued' as type,date_entered as date,curdate() - INTERVAL 1 $interval  as start_date, curdate() as end_date, outlook_api_description_c as description
                            FROM emails 
                            JOIN emails_cstm ON id_c = id
                            WHERE (name like 'Visa Granted' )
                            AND type = 'archived'
                            AND intent = 'pick'
                            AND automatic_c = 1
                            AND date(date_entered) BETWEEN curdate() - INTERVAL 1 $interval   AND curdate();"

    ],
    "requerimientos" => [
        "orden" => 15,
        "title" => "RFI requested",
        "type" => "Accion",
        "periodicy" => "N/A",
        "planned_query" => "SELECT 'Opportunities' as module_name,vo.veta_visa_opportunitiesopportunities_ida  as module_id, 'planed' as type,date_created as date,curdate() - INTERVAL 1 $interval as start_date, curdate() as end_date, '' as description
                            FROM veta_visa_audit 
                            JOIN veta_visa_opportunities_c vo ON vo.veta_visa_opportunitiesveta_visa_idb = parent_id
                            WHERE 
                            field_name IN ('rfi_name_1_c','rfi_name_2_c','rfi_name_3_c','rfi_name_4_c','rfi_name_5_c')
                            AND (after_value_string is not null OR after_value_string <> '')
                            AND date(date_created) BETWEEN curdate() - INTERVAL 1 $interval  AND curdate()",
        "queued_query" => "SELECT parent_type as module_name, parent_id as module_id, 'queued' as type,date_entered as date,curdate() - INTERVAL 1 $interval  as start_date, curdate() as end_date, outlook_api_description_c as description
                            FROM emails 
                            JOIN emails_cstm ON id_c = id
                            WHERE (name LIKE'RFI Requested')
                            AND type = 'archived'
                            AND intent = 'pick'
                            AND automatic_c = 1
                            AND date(date_entered) BETWEEN curdate() - INTERVAL 1 $interval   AND curdate();"

    ],
    "Nomination_Lodged" => [
        "orden" => 15,
        "title" => "Nomination Lodged",
        "type" => "Accion",
        "periodicy" => "N/A",
        "planned_query" => "SELECT 'Opportunities' as module_name,vo.veta_visa_opportunitiesopportunities_ida  as module_id, 'planed' as type,date_created as date,curdate() - INTERVAL 1 $interval as start_date, curdate() as end_date, '' as description
                            FROM veta_visa_audit 
                            JOIN veta_visa_opportunities_c vo ON vo.veta_visa_opportunitiesveta_visa_idb = parent_id
                            WHERE 
                            field_name = 'nomination_process_stage_c'
                            AND (after_value_text LIKE '%^Lodged^%')
                            AND date(date_created) BETWEEN curdate() - INTERVAL 1 $interval  AND curdate()",
        "queued_query" => "SELECT parent_type as module_name, parent_id as module_id, 'queued' as type,date_entered as date,curdate() - INTERVAL 1 $interval  as start_date, curdate() as end_date, outlook_api_description_c as description
                            FROM emails 
                            JOIN emails_cstm ON id_c = id
                            WHERE (name LIKE 'Nomination Lodged')
                            AND type = 'archived'
                            AND intent = 'pick'
                            AND automatic_c = 1
                            AND date(date_entered) BETWEEN curdate() - INTERVAL 1 $interval   AND curdate();"

    ],
    "Nomination_Approved" => [
        "orden" => 15,
        "title" => "Nomination Approved",
        "type" => "Accion",
        "periodicy" => "N/A",
        "planned_query" => "SELECT 'Opportunities' as module_name,vo.veta_visa_opportunitiesopportunities_ida  as module_id, 'planed' as type,date_created as date,curdate() - INTERVAL 1 $interval as start_date, curdate() as end_date, '' as description
                            FROM veta_visa_audit 
                            JOIN veta_visa_opportunities_c vo ON vo.veta_visa_opportunitiesveta_visa_idb = parent_id
                            WHERE 
                            field_name = 'nomination_process_stage_c'
                            AND (after_value_text LIKE '%^Granted^%')
                            AND date(date_created) BETWEEN curdate() - INTERVAL 1 $interval  AND curdate()",
        "queued_query" => "SELECT parent_type as module_name, parent_id as module_id, 'queued' as type,date_entered as date,curdate() - INTERVAL 1 $interval  as start_date, curdate() as end_date, outlook_api_description_c as description
                            FROM emails 
                            JOIN emails_cstm ON id_c = id
                            WHERE (name LIKE 'Nomination have been Approved')
                            AND type = 'archived'
                            AND intent = 'pick'
                            AND automatic_c = 1
                            AND date(date_entered) BETWEEN curdate() - INTERVAL 1 $interval   AND curdate();"

    ],
    "Skill_Assesment_Lodged" => [
        "orden" => 15,
        "title" => "Skill Assesments Lodged",
        "type" => "Accion",
        "periodicy" => "N/A",
        "planned_query" => "SELECT 'Opportunities' as module_name,vo.veta_visa_opportunitiesopportunities_ida  as module_id, 'planed' as type,date_created as date,curdate() - INTERVAL 1 $interval as start_date, curdate() as end_date, '' as description
                            FROM veta_visa_audit 
                            JOIN veta_visa_opportunities_c vo ON vo.veta_visa_opportunitiesveta_visa_idb = parent_id
                            WHERE 
                            field_name = 'skill_assessment_process_stage_c'
                            AND (after_value_text LIKE '%^Lodged^%')
                            AND date(date_created) BETWEEN curdate() - INTERVAL 1 $interval  AND curdate()",
        "queued_query" => "SELECT parent_type as module_name, parent_id as module_id, 'queued' as type,date_entered as date,curdate() - INTERVAL 1 $interval  as start_date, curdate() as end_date, outlook_api_description_c as description
                            FROM emails 
                            JOIN emails_cstm ON id_c = id
                            WHERE (name LIKE 'Skill Assesments has been lodged')
                            AND type = 'archived'
                            AND intent = 'pick'
                            AND automatic_c = 1
                            AND date(date_entered) BETWEEN curdate() - INTERVAL 1 $interval   AND curdate();"

    ],
    "Skill_Assesment_Approved" => [
        "orden" => 15,
        "title" => "Skill Assesments Approved",
        "type" => "Accion",
        "periodicy" => "N/A",
        "planned_query" => "SELECT 'Opportunities' as module_name,vo.veta_visa_opportunitiesopportunities_ida  as module_id, 'planed' as type,date_created as date,curdate() - INTERVAL 1 $interval as start_date, curdate() as end_date, '' as description
                            FROM veta_visa_audit 
                            JOIN veta_visa_opportunities_c vo ON vo.veta_visa_opportunitiesveta_visa_idb = parent_id
                            WHERE 
                            field_name = 'skill_assessment_process_stage_c'
                            AND (after_value_text LIKE '%^Granted^%')
                            AND date(date_created) BETWEEN curdate() - INTERVAL 1 $interval  AND curdate()",
        "queued_query" => "SELECT parent_type as module_name, parent_id as module_id, 'queued' as type,date_entered as date,curdate() - INTERVAL 1 $interval  as start_date, curdate() as end_date, outlook_api_description_c as description
                            FROM emails 
                            JOIN emails_cstm ON id_c = id
                            WHERE (name LIKE 'Skill Assesments Granted')
                            AND type = 'archived'
                            AND intent = 'pick'
                            AND automatic_c = 1
                            AND date(date_entered) BETWEEN curdate() - INTERVAL 1 $interval   AND curdate();"

    ],
    "TAS_Lodged" => [
        "orden" => 15,
        "title" => "TAS Lodged",
        "type" => "Accion",
        "periodicy" => "N/A",
        "planned_query" => "SELECT 'Opportunities' as module_name,vo.veta_visa_opportunitiesopportunities_ida  as module_id, 'planed' as type,date_created as date,curdate() - INTERVAL 1 $interval as start_date, curdate() as end_date, '' as description
                            FROM veta_visa_audit 
                            JOIN veta_visa_opportunities_c vo ON vo.veta_visa_opportunitiesveta_visa_idb = parent_id
                            WHERE 
                            field_name = 'tas_process_stage_c'
                            AND (after_value_text LIKE '%^Lodged^%')
                            AND date(date_created) BETWEEN curdate() - INTERVAL 1 $interval  AND curdate()",
        "queued_query" => "SELECT parent_type as module_name, parent_id as module_id, 'queued' as type,date_entered as date,curdate() - INTERVAL 1 $interval  as start_date, curdate() as end_date, outlook_api_description_c as description
                            FROM emails 
                            JOIN emails_cstm ON id_c = id
                            WHERE (name LIKE 'Temporary Activities Sponsorship (TAS) application has been lodged')
                            AND type = 'archived'
                            AND intent = 'pick'
                            AND automatic_c = 1
                            AND date(date_entered) BETWEEN curdate() - INTERVAL 1 $interval   AND curdate();"

    ],
    "TAS_Approved" => [
        "orden" => 15,
        "title" => "TAS Approved",
        "type" => "Accion",
        "periodicy" => "N/A",
        "planned_query" => "SELECT 'Opportunities' as module_name,vo.veta_visa_opportunitiesopportunities_ida  as module_id, 'planed' as type,date_created as date,curdate() - INTERVAL 1 $interval as start_date, curdate() as end_date, '' as description
                            FROM veta_visa_audit 
                            JOIN veta_visa_opportunities_c vo ON vo.veta_visa_opportunitiesveta_visa_idb = parent_id
                            WHERE 
                            field_name = 'tas_process_stage_c'
                            AND (after_value_text LIKE '%^Granted^%')
                            AND date(date_created) BETWEEN curdate() - INTERVAL 1 $interval  AND curdate()",
        "queued_query" => "SELECT parent_type as module_name, parent_id as module_id, 'queued' as type,date_entered as date,curdate() - INTERVAL 1 $interval  as start_date, curdate() as end_date, outlook_api_description_c as description
                            FROM emails 
                            JOIN emails_cstm ON id_c = id
                            WHERE (name LIKE 'Temporary Activities Sponsorship (TAS) has been granted')
                            AND type = 'archived'
                            AND intent = 'pick'
                            AND automatic_c = 1
                            AND date(date_entered) BETWEEN curdate() - INTERVAL 1 $interval   AND curdate();"

    ],
    "EOI_Lodged" => [
        "orden" => 15,
        "title" => "EOI Lodged",
        "type" => "Accion",
        "periodicy" => "N/A",
        "planned_query" => "SELECT 'Opportunities' as module_name,vo.veta_visa_opportunitiesopportunities_ida  as module_id, 'planed' as type,date_created as date,curdate() - INTERVAL 1 $interval as start_date, curdate() as end_date, '' as description
                            FROM veta_visa_audit 
                            JOIN veta_visa_opportunities_c vo ON vo.veta_visa_opportunitiesveta_visa_idb = parent_id
                            WHERE 
                            field_name = 'eoi_process_stage_c'
                            AND (after_value_text LIKE '%^Lodged^%')
                            AND date(date_created) BETWEEN curdate() - INTERVAL 1 $interval  AND curdate()",
        "queued_query" => "SELECT parent_type as module_name, parent_id as module_id, 'queued' as type,date_entered as date,curdate() - INTERVAL 1 $interval  as start_date, curdate() as end_date, outlook_api_description_c as description
                            FROM emails 
                            JOIN emails_cstm ON id_c = id
                            WHERE (name LIKE 'Expression of Interest (EOI) has been lodged')
                            AND type = 'archived'
                            AND intent = 'pick'
                            AND automatic_c = 1
                            AND date(date_entered) BETWEEN curdate() - INTERVAL 1 $interval   AND curdate();"

    ],
    "EOI_Approved" => [
        "orden" => 15,
        "title" => "EOI Approved",
        "type" => "Accion",
        "periodicy" => "N/A",
        "planned_query" => "SELECT 'Opportunities' as module_name,vo.veta_visa_opportunitiesopportunities_ida  as module_id, 'planed' as type,date_created as date,curdate() - INTERVAL 1 $interval as start_date, curdate() as end_date, '' as description
                            FROM veta_visa_audit 
                            JOIN veta_visa_opportunities_c vo ON vo.veta_visa_opportunitiesveta_visa_idb = parent_id
                            WHERE 
                            field_name = 'eoi_process_stage_c'
                            AND (after_value_text LIKE '%^Granted^%')
                            AND date(date_created) BETWEEN curdate() - INTERVAL 1 $interval  AND curdate()",
        "queued_query" => "SELECT parent_type as module_name, parent_id as module_id, 'queued' as type,date_entered as date,curdate() - INTERVAL 1 $interval  as start_date, curdate() as end_date, outlook_api_description_c as description
                            FROM emails 
                            JOIN emails_cstm ON id_c = id
                            WHERE (name LIKE 'Inivtation received for your EOI')
                            AND type = 'archived'
                            AND intent = 'pick'
                            AND automatic_c = 1
                            AND date(date_entered) BETWEEN curdate() - INTERVAL 1 $interval   AND curdate();"

    ],
    "SBS_Lodged" => [
        "orden" => 15,
        "title" => "SBS Lodged",
        "type" => "Accion",
        "periodicy" => "N/A",
        "planned_query" => "SELECT 'Opportunities' as module_name,vo.veta_visa_opportunitiesopportunities_ida  as module_id, 'planed' as type,date_created as date,curdate() - INTERVAL 1 $interval as start_date, curdate() as end_date, '' as description
                            FROM veta_visa_audit 
                            JOIN veta_visa_opportunities_c vo ON vo.veta_visa_opportunitiesveta_visa_idb = parent_id
                            WHERE 
                            field_name = 'sbs_process_stage_c'
                            AND (after_value_text LIKE '%^Lodged^%')
                            AND date(date_created) BETWEEN curdate() - INTERVAL 1 $interval  AND curdate()",
        "queued_query" => "SELECT parent_type as module_name, parent_id as module_id, 'queued' as type,date_entered as date,curdate() - INTERVAL 1 $interval  as start_date, curdate() as end_date, outlook_api_description_c as description
                            FROM emails 
                            JOIN emails_cstm ON id_c = id
                            WHERE (name LIKE 'Standard Business Sponsorship (SBS) has been lodged')
                            AND type = 'archived'
                            AND intent = 'pick'
                            AND automatic_c = 1
                            AND date(date_entered) BETWEEN curdate() - INTERVAL 1 $interval   AND curdate();"

    ],
    "SBS_Approved" => [
        "orden" => 15,
        "title" => "SBS Approved",
        "type" => "Accion",
        "periodicy" => "N/A",
        "planned_query" => "SELECT 'Opportunities' as module_name,vo.veta_visa_opportunitiesopportunities_ida  as module_id, 'planed' as type,date_created as date,curdate() - INTERVAL 1 $interval as start_date, curdate() as end_date, '' as description
                            FROM veta_visa_audit 
                            JOIN veta_visa_opportunities_c vo ON vo.veta_visa_opportunitiesveta_visa_idb = parent_id
                            WHERE 
                            field_name = 'sbs_process_stage_c'
                            AND (after_value_text LIKE '%^Granted^%')
                            AND date(date_created) BETWEEN curdate() - INTERVAL 1 $interval  AND curdate()",
        "queued_query" => "SELECT parent_type as module_name, parent_id as module_id, 'queued' as type,date_entered as date,curdate() - INTERVAL 1 $interval  as start_date, curdate() as end_date, outlook_api_description_c as description
                            FROM emails 
                            JOIN emails_cstm ON id_c = id
                            WHERE (name LIKE 'Standard Business Sponsorship (SBS) has been approved')
                            AND type = 'archived'
                            AND intent = 'pick'
                            AND automatic_c = 1
                            AND date(date_entered) BETWEEN curdate() - INTERVAL 1 $interval   AND curdate();"

    ],
    "State_Nomination_Lodged" => [
        "orden" => 15,
        "title" => "State_Nomination Lodged",
        "type" => "Accion",
        "periodicy" => "N/A",
        "planned_query" => "SELECT 'Opportunities' as module_name,vo.veta_visa_opportunitiesopportunities_ida  as module_id, 'planed' as type,date_created as date,curdate() - INTERVAL 1 $interval as start_date, curdate() as end_date, '' as description
                            FROM veta_visa_audit 
                            JOIN veta_visa_opportunities_c vo ON vo.veta_visa_opportunitiesveta_visa_idb = parent_id
                            WHERE 
                            field_name = 'state_nomination_process_stage_c'
                            AND (after_value_text LIKE '%^Lodged^%')
                            AND date(date_created) BETWEEN curdate() - INTERVAL 1 $interval  AND curdate()",
        "queued_query" => "SELECT parent_type as module_name, parent_id as module_id, 'queued' as type,date_entered as date,curdate() - INTERVAL 1 $interval  as start_date, curdate() as end_date, outlook_api_description_c as description
                            FROM emails 
                            JOIN emails_cstm ON id_c = id
                            WHERE (name LIKE 'Invitation Received for NSW Nomination')
                            AND type = 'archived'
                            AND intent = 'pick'
                            AND automatic_c = 1
                            AND date(date_entered) BETWEEN curdate() - INTERVAL 1 $interval   AND curdate();"

    ],
    "State_Nomination_Approved" => [
        "orden" => 15,
        "title" => "State_Nomination Approved",
        "type" => "Accion",
        "periodicy" => "N/A",
        "planned_query" => "SELECT 'Opportunities' as module_name,vo.veta_visa_opportunitiesopportunities_ida  as module_id, 'planed' as type,date_created as date,curdate() - INTERVAL 1 $interval as start_date, curdate() as end_date, '' as description
                            FROM veta_visa_audit 
                            JOIN veta_visa_opportunities_c vo ON vo.veta_visa_opportunitiesveta_visa_idb = parent_id
                            WHERE 
                            field_name = 'state_nomination_process_stage_c'
                            AND (after_value_text LIKE '%^Granted^%')
                            AND date(date_created) BETWEEN curdate() - INTERVAL 1 $interval  AND curdate()",
        "queued_query" => "SELECT parent_type as module_name, parent_id as module_id, 'queued' as type,date_entered as date,curdate() - INTERVAL 1 $interval  as start_date, curdate() as end_date, outlook_api_description_c as description
                            FROM emails 
                            JOIN emails_cstm ON id_c = id
                            WHERE (name LIKE 'State Nomination has been approved')
                            AND type = 'archived'
                            AND intent = 'pick'
                            AND automatic_c = 1
                            AND date(date_entered) BETWEEN curdate() - INTERVAL 1 $interval   AND curdate();"

    ],
    "RCB_Lodged" => [
        "orden" => 15,
        "title" => "RCB Lodged",
        "type" => "Accion",
        "periodicy" => "N/A",
        "planned_query" => "SELECT 'Opportunities' as module_name,vo.veta_visa_opportunitiesopportunities_ida  as module_id, 'planed' as type,date_created as date,curdate() - INTERVAL 1 $interval as start_date, curdate() as end_date, '' as description
                            FROM veta_visa_audit 
                            JOIN veta_visa_opportunities_c vo ON vo.veta_visa_opportunitiesveta_visa_idb = parent_id
                            WHERE 
                            field_name = 'rcb_process_stage_c'
                            AND (after_value_text LIKE '%^Lodged^%')
                            AND date(date_created) BETWEEN curdate() - INTERVAL 1 $interval  AND curdate()",
        "queued_query" => "SELECT parent_type as module_name, parent_id as module_id, 'queued' as type,date_entered as date,curdate() - INTERVAL 1 $interval  as start_date, curdate() as end_date, outlook_api_description_c as description
                            FROM emails 
                            JOIN emails_cstm ON id_c = id
                            WHERE (name LIKE 'RCB has been lodged')
                            AND type = 'archived'
                            AND intent = 'pick'
                            AND automatic_c = 1
                            AND date(date_entered) BETWEEN curdate() - INTERVAL 1 $interval   AND curdate();"

    ],
    "RCB_Approved" => [
        "orden" => 15,
        "title" => "RCB Approved",
        "type" => "Accion",
        "periodicy" => "N/A",
        "planned_query" => "SELECT 'Opportunities' as module_name,vo.veta_visa_opportunitiesopportunities_ida  as module_id, 'planed' as type,date_created as date,curdate() - INTERVAL 1 $interval as start_date, curdate() as end_date, '' as description
                            FROM veta_visa_audit 
                            JOIN veta_visa_opportunities_c vo ON vo.veta_visa_opportunitiesveta_visa_idb = parent_id
                            WHERE 
                            field_name = 'rcb_process_stage_c'
                            AND (after_value_text LIKE '%^Granted^%')
                            AND date(date_created) BETWEEN curdate() - INTERVAL 1 $interval  AND curdate()",
        "queued_query" => "SELECT parent_type as module_name, parent_id as module_id, 'queued' as type,date_entered as date,curdate() - INTERVAL 1 $interval  as start_date, curdate() as end_date, outlook_api_description_c as description
                            FROM emails 
                            JOIN emails_cstm ON id_c = id
                            WHERE (name LIKE 'RCB Application approved')
                            AND type = 'archived'
                            AND intent = 'pick'
                            AND automatic_c = 1
                            AND date(date_entered) BETWEEN curdate() - INTERVAL 1 $interval   AND curdate();"

    ],
];
$remainders = [];
foreach ($remaindersDef as $key => $remainder) {
    extract($remainder);

    // echo "<br>$planned_query <br> UNION <br> $queued_query<br>";

    $remainders[$key] = [
        'planned' => 0,
        'queued' => 0,
        'sent' => 0,
        'start_date_planned' => 'no_info',
        'end_date_planned' => 'no_info',
        'start_date_queued' => 'no_info',
        'end_date_queued' => 'no_info',
        'planned_pvs' => [],
        'queued_pvs' => [],
        'raw' => []
    ];

    $resPlanned = $db->query($planned_query);
    while ($rowPlanned = $db->fetchByAssoc($resPlanned)) {
        extract($rowPlanned);

        $remainders[$key]['planned']++;
        $remainders[$key]['start_date_planned'] = $start_date;
        $remainders[$key]['end_date_planned'] = $end_date;
        $remainders[$key]['planned_pvs'][] = $module_id;
        $remainders[$key]['raw'][] = $rowPlanned;
    }

    $resQueued = $db->query($queued_query);
    while ($rowQueued = $db->fetchByAssoc($resQueued)) {
        extract($rowQueued);
        $parsedDescription = json_decode(html_entity_decode($description, ENT_QUOTES));
        $remainders[$key]['queued']++;
        if (!isset($parsedDescription) || $parsedDescription->sent) {
            $remainders[$key]['sent']++;
        } elseif ($parsedDescription->failed) {
        }
        $remainders[$key]['start_date_queued'] = $start_date;
        $remainders[$key]['end_date_queued'] = $end_date;
        $remainders[$key]['queued_pvs'][] = $module_id;
        $remainders[$key]['raw'][] = $rowQueued;
    }
    // die;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Bootstrap Centered Table Card</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div class="container d-flex justify-content-center  vh-100">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Recordatorio</th>
                    <th scope="col">Planeados</th>
                    <th scope="col">Encolados</th>
                    <th scope="col">Enviados</th>
                    <th scope="col">Resumen</th>
                </tr>
            </thead>
            <tbody>
                <?php
                function pvId2ListItem($pvId)
                {
                    $opportunity = BeanFactory::getBean("Opportunities", $pvId);
                    return "<li><a href='https://crmmmigration.com/index.php?module=Opportunities&action=DetailView&record=$opportunity->id' target = '_blank'>$opportunity->name</a></li>";
                }

                foreach ($remainders as $key => $remainder) {
                    $title = $remaindersDef[$key]['title'];
                    extract($remainder);

                    $plannedNotQueued = array_diff($planned_pvs, $queued_pvs);
                    $queuedNotPlanned = array_diff($queued_pvs, $planned_pvs);
                    $queuedNotSent = array_filter($raw, function ($row) {
                        $parsedDescription = json_decode(html_entity_decode($row['description'], ENT_QUOTES));
                        return $parsedDescription && $parsedDescription->failed;
                    });

                    $uq_queue = $queued_pvs;
                    $uq_queue = array_unique($uq_queue);

                    $repeated_queue = array_diff_assoc($queued_pvs, $uq_queue);

                    $description = "";
                    if (count($planned_pvs)) {

                        $description = "Periodo Revisado Planeados: $start_date_planned - $end_date_planned <br>";
                        $description .= "Periodo Revisado Encolados: $start_date_queued - $end_date_queued <br>";
                        $description .= count($plannedNotQueued) ? "<p>Planeados no encolados</p><ul>" . implode("", array_map('pvId2ListItem', $plannedNotQueued)) . "</ul><br>" : "";
                        $description .= count($queuedNotPlanned) ? "<p>Encolados no planeados</p><ul>" . implode("", array_map('pvId2ListItem', $queuedNotPlanned)) . "</ul><br>" : "";
                        $description .= count($repeated_queue) ? "<p>Encolados repetidos</p><ul>" . implode("", array_map('pvId2ListItem', $repeated_queue)) . "</ul><br>" : "";
                        // $description .= count($planned_pvs) ? "<p>Planeados</p><ul>" . implode("", array_map('pvId2ListItem', $planned_pvs)) . "</ul><br>" : "";
                    }

                    echo "<tr id= '$key'>
                    <th scope='row'>$title</th>
                    <td>$planned</td>
                    <td>$queued</td>
                    <td>$sent</td>
                    <td>$description</td>
                </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- <?php echo "<pre>" .  json_encode($remainders, JSON_PRETTY_PRINT) . "<pre>"; ?> -->
</body>

</html>