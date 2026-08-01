<?php 
 //WARNING: The contents of this file are auto-generated


$dictionary['Veta_Visa']['fields']['soel_fecha_expiracion_visa'] = array(
    'name' => 'soel_fecha_expiracion_visa',
    'vname' => 'LBL_SOEL_FECHA_EXPIRACION_VISA',
    'type' => 'datetime',
    'source' => 'non-db',
    'enable_range_search' => true,
    'options' => 'date_range_search_dom',

);


// created: 2020-10-14 00:58:38
$dictionary["Veta_Visa"]["fields"]["veta_visa_cases"] = array (
  'name' => 'veta_visa_cases',
  'type' => 'link',
  'relationship' => 'veta_visa_cases',
  'source' => 'non-db',
  'module' => 'Cases',
  'bean_name' => 'Case',
  'side' => 'right',
  'vname' => 'LBL_VETA_VISA_CASES_FROM_CASES_TITLE',
);


// created: 2023-03-14 17:11:40
$dictionary["Veta_Visa"]["fields"]["veta_visa_csche_cs_checklist_1"] = array (
  'name' => 'veta_visa_csche_cs_checklist_1',
  'type' => 'link',
  'relationship' => 'veta_visa_csche_cs_checklist_1',
  'source' => 'non-db',
  'module' => 'CSChe_CS_Checklist',
  'bean_name' => 'CSChe_CS_Checklist',
  'vname' => 'LBL_VETA_VISA_CSCHE_CS_CHECKLIST_1_FROM_CSCHE_CS_CHECKLIST_TITLE',
);


// created: 2020-10-14 00:58:38
$dictionary["Veta_Visa"]["fields"]["veta_visa_activities_calls"] = array (
  'name' => 'veta_visa_activities_calls',
  'type' => 'link',
  'relationship' => 'veta_visa_activities_calls',
  'source' => 'non-db',
  'module' => 'Calls',
  'bean_name' => 'Call',
  'vname' => 'LBL_VETA_VISA_ACTIVITIES_CALLS_FROM_CALLS_TITLE',
);


// created: 2023-03-14 17:10:05
$dictionary["Veta_Visa"]["fields"]["veta_visa_csche_items_requested_1"] = array (
  'name' => 'veta_visa_csche_items_requested_1',
  'type' => 'link',
  'relationship' => 'veta_visa_csche_items_requested_1',
  'source' => 'non-db',
  'module' => 'CSChe_Items_Requested',
  'bean_name' => 'CSChe_Items_Requested',
  'vname' => 'LBL_VETA_VISA_CSCHE_ITEMS_REQUESTED_1_FROM_CSCHE_ITEMS_REQUESTED_TITLE',
);


// created: 2020-10-14 00:58:39
$dictionary["Veta_Visa"]["fields"]["veta_visa_veta_serviciocliente"] = array (
  'name' => 'veta_visa_veta_serviciocliente',
  'type' => 'link',
  'relationship' => 'veta_visa_veta_serviciocliente',
  'source' => 'non-db',
  'module' => 'Veta_ServicioCliente',
  'bean_name' => 'Veta_ServicioCliente',
  'vname' => 'LBL_VETA_VISA_VETA_SERVICIOCLIENTE_FROM_VETA_SERVICIOCLIENTE_TITLE',
  'id_name' => 'veta_visa_veta_servicioclienteveta_serviciocliente_idb',
);
$dictionary["Veta_Visa"]["fields"]["veta_visa_veta_serviciocliente_name"] = array (
  'name' => 'veta_visa_veta_serviciocliente_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VETA_VISA_VETA_SERVICIOCLIENTE_FROM_VETA_SERVICIOCLIENTE_TITLE',
  'save' => true,
  'id_name' => 'veta_visa_veta_servicioclienteveta_serviciocliente_idb',
  'link' => 'veta_visa_veta_serviciocliente',
  'table' => 'veta_serviciocliente',
  'module' => 'Veta_ServicioCliente',
  'rname' => 'name',
);
$dictionary["Veta_Visa"]["fields"]["veta_visa_veta_servicioclienteveta_serviciocliente_idb"] = array (
  'name' => 'veta_visa_veta_servicioclienteveta_serviciocliente_idb',
  'type' => 'link',
  'relationship' => 'veta_visa_veta_serviciocliente',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_VETA_VISA_VETA_SERVICIOCLIENTE_FROM_VETA_SERVICIOCLIENTE_TITLE',
);


// created: 2020-10-14 00:58:38
$dictionary["Veta_Visa"]["fields"]["veta_visa_activities_meetings"] = array (
  'name' => 'veta_visa_activities_meetings',
  'type' => 'link',
  'relationship' => 'veta_visa_activities_meetings',
  'source' => 'non-db',
  'module' => 'Meetings',
  'bean_name' => 'Meeting',
  'vname' => 'LBL_VETA_VISA_ACTIVITIES_MEETINGS_FROM_MEETINGS_TITLE',
);


// created: 2020-10-14 00:58:38
$dictionary["Veta_Visa"]["fields"]["veta_visa_activities_emails"] = array (
  'name' => 'veta_visa_activities_emails',
  'type' => 'link',
  'relationship' => 'veta_visa_activities_emails',
  'source' => 'non-db',
  'module' => 'Emails',
  'bean_name' => 'Email',
  'vname' => 'LBL_VETA_VISA_ACTIVITIES_EMAILS_FROM_EMAILS_TITLE',
);


$dictionary['Veta_Visa']['fields']['soel_fecha_viaje'] = array(
    'name' => 'soel_fecha_viaje',
    'vname' => 'LBL_SOEL_FECHA_VIAJE',
    'type' => 'datetime',
    'source' => 'non-db',
    'enable_range_search' => true,
    'options' => 'date_range_search_dom',
);



// created: 2020-10-14 00:58:38
$dictionary["Veta_Visa"]["fields"]["veta_visa_activities_notes"] = array (
  'name' => 'veta_visa_activities_notes',
  'type' => 'link',
  'relationship' => 'veta_visa_activities_notes',
  'source' => 'non-db',
  'module' => 'Notes',
  'bean_name' => 'Note',
  'vname' => 'LBL_VETA_VISA_ACTIVITIES_NOTES_FROM_NOTES_TITLE',
);


$dictionary['Veta_Visa']['fields']['soel_referido'] = array(
    'name' => 'soel_referido',
    'vname' => 'LBL_SOEL_REFERIDO',
    'type' => 'varchar',
    'source' => 'non-db',
);


// created: 2020-10-14 00:58:38
$dictionary["Veta_Visa"]["fields"]["veta_visa_opportunities"] = array (
  'name' => 'veta_visa_opportunities',
  'type' => 'link',
  'relationship' => 'veta_visa_opportunities',
  'source' => 'non-db',
  'module' => 'Opportunities',
  'bean_name' => 'Opportunity',
  'vname' => 'LBL_VETA_VISA_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
  'id_name' => 'veta_visa_opportunitiesopportunities_ida',
);
$dictionary["Veta_Visa"]["fields"]["veta_visa_opportunities_name"] = array (
  'name' => 'veta_visa_opportunities_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VETA_VISA_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
  'save' => true,
  'id_name' => 'veta_visa_opportunitiesopportunities_ida',
  'link' => 'veta_visa_opportunities',
  'table' => 'opportunities',
  'module' => 'Opportunities',
  'rname' => 'name',
);
$dictionary["Veta_Visa"]["fields"]["veta_visa_opportunitiesopportunities_ida"] = array (
  'name' => 'veta_visa_opportunitiesopportunities_ida',
  'type' => 'link',
  'relationship' => 'veta_visa_opportunities',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VETA_VISA_OPPORTUNITIES_FROM_VETA_VISA_TITLE',
);


// created: 2020-10-14 00:58:38
$dictionary["Veta_Visa"]["fields"]["veta_visa_activities_tasks"] = array (
  'name' => 'veta_visa_activities_tasks',
  'type' => 'link',
  'relationship' => 'veta_visa_activities_tasks',
  'source' => 'non-db',
  'module' => 'Tasks',
  'bean_name' => 'Task',
  'vname' => 'LBL_VETA_VISA_ACTIVITIES_TASKS_FROM_TASKS_TITLE',
);


 // created: 2024-06-11 21:39:56
$dictionary['Veta_Visa']['fields']['tas_value_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['tas_value_c']['labelValue']='TAS Value';

 

 // created: 2024-10-02 20:43:47
$dictionary['Veta_Visa']['fields']['endorsement_notification_approved_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['endorsement_notification_approved_c']['labelValue']='Endorsement Notification Approved';

 

 // created: 2022-09-23 19:54:22
$dictionary['Veta_Visa']['fields']['tas_expectation_date_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['tas_expectation_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['tas_expectation_date_c']['labelValue']='TAS Expectation date';
$dictionary['Veta_Visa']['fields']['tas_expectation_date_c']['enable_range_search']='1';

 

 // created: 2023-11-29 19:42:39
$dictionary['Veta_Visa']['fields']['user_id2_c']['inline_edit']=1;

 

 // created: 2023-02-22 14:55:16
$dictionary['Veta_Visa']['fields']['sbs_expectation_date_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['sbs_expectation_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['sbs_expectation_date_c']['labelValue']='SBS Expectation Date';
$dictionary['Veta_Visa']['fields']['sbs_expectation_date_c']['enable_range_search']='1';

 

 // created: 2021-02-16 17:06:53
$dictionary['Veta_Visa']['fields']['fecha_avac']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['fecha_avac']['enable_range_search']='1';

 

 // created: 2023-01-27 15:20:38
$dictionary['Veta_Visa']['fields']['recruitment_notification_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['recruitment_notification_c']['labelValue']='Recruitment Notification';

 

 // created: 2023-12-15 20:23:41
$dictionary['Veta_Visa']['fields']['sbs_draft_done_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['sbs_draft_done_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['sbs_draft_done_c']['labelValue']='SBS Draft Done';
$dictionary['Veta_Visa']['fields']['sbs_draft_done_c']['enable_range_search']='1';

 

 // created: 2024-06-11 21:39:35
$dictionary['Veta_Visa']['fields']['state_nomination_value_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['state_nomination_value_c']['labelValue']='State Nomination Value';

 

 // created: 2023-03-28 22:48:14
$dictionary['Veta_Visa']['fields']['rfi_3_ext_request_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['rfi_3_ext_request_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['rfi_3_ext_request_c']['labelValue']='RFI 3 Extension Request';
$dictionary['Veta_Visa']['fields']['rfi_3_ext_request_c']['enable_range_search']='1';

 

 // created: 2022-07-27 00:49:30
$dictionary['Veta_Visa']['fields']['rfi_name_3_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['rfi_name_3_c']['labelValue']='RFI Name 3';

 

 // created: 2023-01-27 16:45:01
$dictionary['Veta_Visa']['fields']['skill_assessment_notification_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['skill_assessment_notification_c']['labelValue']='Skill Assessment Notification';

 

 // created: 2024-06-17 19:02:52
$dictionary['Veta_Visa']['fields']['user_id3_c']['inline_edit']=1;

 

 // created: 2023-12-15 20:24:27
$dictionary['Veta_Visa']['fields']['state_nomination_draft_done_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['state_nomination_draft_done_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['state_nomination_draft_done_c']['labelValue']='State Nomination Draft Done';
$dictionary['Veta_Visa']['fields']['state_nomination_draft_done_c']['enable_range_search']='1';

 

 // created: 2022-07-26 21:02:04
$dictionary['Veta_Visa']['fields']['fecha_response_req4_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['fecha_response_req4_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['fecha_response_req4_c']['labelValue']='RFI 4 response date';
$dictionary['Veta_Visa']['fields']['fecha_response_req4_c']['enable_range_search']='1';

 

 // created: 2023-05-24 21:17:40
$dictionary['Veta_Visa']['fields']['lmt_url_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['lmt_url_c']['labelValue']='LMT Url';

 

 // created: 2024-03-08 15:16:42
$dictionary['Veta_Visa']['fields']['visa_value_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['visa_value_c']['labelValue']='Visa Value';

 

 // created: 2023-01-27 15:19:22
$dictionary['Veta_Visa']['fields']['skill_assessmen_notification_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['skill_assessmen_notification_c']['labelValue']='Skill Assessmen Notification';

 

 // created: 2022-09-23 19:51:31
$dictionary['Veta_Visa']['fields']['tas_application_date_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['tas_application_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['tas_application_date_c']['labelValue']='TAS Application Date';
$dictionary['Veta_Visa']['fields']['tas_application_date_c']['enable_range_search']='1';

 

 // created: 2024-10-02 20:41:03
$dictionary['Veta_Visa']['fields']['endorsement_approval_date_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['endorsement_approval_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['endorsement_approval_date_c']['labelValue']='Endorsement Approval Date';
$dictionary['Veta_Visa']['fields']['endorsement_approval_date_c']['enable_range_search']='1';

 

 // created: 2022-09-23 19:58:35
$dictionary['Veta_Visa']['fields']['rcb_application_date_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['rcb_application_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['rcb_application_date_c']['labelValue']='RCB Application Date';
$dictionary['Veta_Visa']['fields']['rcb_application_date_c']['enable_range_search']='1';

 

 // created: 2023-07-31 23:07:15
$dictionary['Veta_Visa']['fields']['fecha_response_req2_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['fecha_response_req2_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['fecha_response_req2_c']['labelValue']='RFI 2 RFI answered date';
$dictionary['Veta_Visa']['fields']['fecha_response_req2_c']['enable_range_search']='1';

 

 // created: 2023-01-27 16:41:10
$dictionary['Veta_Visa']['fields']['skill_assessment__notification_approved_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['skill_assessment__notification_approved_c']['labelValue']='Skill Assessment Notification Approved';

 

 // created: 2022-09-23 19:59:31
$dictionary['Veta_Visa']['fields']['roi_application_date_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['roi_application_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['roi_application_date_c']['labelValue']='ROI Application Date';
$dictionary['Veta_Visa']['fields']['roi_application_date_c']['enable_range_search']='1';

 

 // created: 2024-10-02 20:36:41
$dictionary['Veta_Visa']['fields']['labor_agreement_notification_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['labor_agreement_notification_c']['labelValue']='Labor Agreement Notification';

 

 // created: 2024-10-02 20:31:14
$dictionary['Veta_Visa']['fields']['labor_agreement_approval_date_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['labor_agreement_approval_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['labor_agreement_approval_date_c']['labelValue']='Labor Agreement Approval Date';
$dictionary['Veta_Visa']['fields']['labor_agreement_approval_date_c']['enable_range_search']='1';

 

 // created: 2023-05-24 21:15:47
$dictionary['Veta_Visa']['fields']['lmt_start_date_3_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['lmt_start_date_3_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['lmt_start_date_3_c']['labelValue']='LMT Start Date 3';
$dictionary['Veta_Visa']['fields']['lmt_start_date_3_c']['enable_range_search']='1';

 

 // created: 2023-01-27 15:18:39
$dictionary['Veta_Visa']['fields']['roi_notification_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['roi_notification_c']['labelValue']='ROI Notification';

 

 // created: 2024-10-02 20:34:20
$dictionary['Veta_Visa']['fields']['labor_agreement_draft_done_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['labor_agreement_draft_done_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['labor_agreement_draft_done_c']['labelValue']='Labor Agreement Draft Done';
$dictionary['Veta_Visa']['fields']['labor_agreement_draft_done_c']['enable_range_search']='1';

 

 // created: 2024-03-06 20:58:32
$dictionary['Veta_Visa']['fields']['insurance_value_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['insurance_value_c']['labelValue']='Insurance Value';

 

 // created: 2024-06-11 21:36:23
$dictionary['Veta_Visa']['fields']['eoi_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['eoi_c']['labelValue']='EOI';

 

 // created: 2024-06-11 21:38:21
$dictionary['Veta_Visa']['fields']['rcb_value_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['rcb_value_c']['labelValue']='RCB Value';

 

 // created: 2021-02-16 17:07:23
$dictionary['Veta_Visa']['fields']['fecha_expiracion_requerimiento']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['fecha_expiracion_requerimiento']['enable_range_search']='1';

 

 // created: 2024-08-28 19:53:22
$dictionary['Veta_Visa']['fields']['dama_trn_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['dama_trn_c']['labelValue']='Dama TRN';

 

 // created: 2023-07-31 23:07:27
$dictionary['Veta_Visa']['fields']['fecha_response_req1_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['fecha_response_req1_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['fecha_response_req1_c']['labelValue']='RFI 1 RFI answered date';
$dictionary['Veta_Visa']['fields']['fecha_response_req1_c']['enable_range_search']='1';

 

 // created: 2022-11-23 17:05:18
$dictionary['Veta_Visa']['fields']['eoi_3_expectation_date_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['eoi_3_expectation_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['eoi_3_expectation_date_c']['labelValue']='EOI 3 Expectation Date';
$dictionary['Veta_Visa']['fields']['eoi_3_expectation_date_c']['enable_range_search']='1';

 

 // created: 2022-07-26 21:04:31
$dictionary['Veta_Visa']['fields']['fecha_req4_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['fecha_req4_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['fecha_req4_c']['labelValue']='RFI 4 Date';
$dictionary['Veta_Visa']['fields']['fecha_req4_c']['enable_range_search']='1';

 

 // created: 2023-03-30 22:26:22
$dictionary['Veta_Visa']['fields']['visa_trn_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['visa_trn_c']['labelValue']='Visa TRN';

 

 // created: 2023-03-28 22:46:51
$dictionary['Veta_Visa']['fields']['rfi_1_ext_request_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['rfi_1_ext_request_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['rfi_1_ext_request_c']['labelValue']='RFI 1 Extension Request';
$dictionary['Veta_Visa']['fields']['rfi_1_ext_request_c']['enable_range_search']='1';

 

 // created: 2023-01-27 15:17:01
$dictionary['Veta_Visa']['fields']['nomination_notification_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['nomination_notification_c']['labelValue']='Nomination Notification';

 

 // created: 2023-11-29 19:42:01
$dictionary['Veta_Visa']['fields']['case_manager_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['case_manager_c']['labelValue']='Case Manager';

 

 // created: 2022-09-23 19:44:43
$dictionary['Veta_Visa']['fields']['nomination_app_expectation_date_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['nomination_app_expectation_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['nomination_app_expectation_date_c']['labelValue']='Nomination APP expectation Date';
$dictionary['Veta_Visa']['fields']['nomination_app_expectation_date_c']['enable_range_search']='1';

 

 // created: 2022-11-23 17:06:03
$dictionary['Veta_Visa']['fields']['eoi_3_appoval_date_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['eoi_3_appoval_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['eoi_3_appoval_date_c']['labelValue']='EOI 3 Appoval Date';
$dictionary['Veta_Visa']['fields']['eoi_3_appoval_date_c']['enable_range_search']='1';

 

 // created: 2025-04-10 21:52:01
$dictionary['Veta_Visa']['fields']['art_lodge_date_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['art_lodge_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['art_lodge_date_c']['labelValue']='ART Lodge Date';
$dictionary['Veta_Visa']['fields']['art_lodge_date_c']['enable_range_search']='1';

 

 // created: 2023-11-29 19:42:39
$dictionary['Veta_Visa']['fields']['customer_service_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['customer_service_c']['labelValue']='Customer Service';

 

 // created: 2021-02-16 17:07:12
$dictionary['Veta_Visa']['fields']['fecha_exp_req1']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['fecha_exp_req1']['enable_range_search']='1';

 

 // created: 2023-01-27 16:43:55
$dictionary['Veta_Visa']['fields']['eoi_notification_approved_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['eoi_notification_approved_c']['labelValue']='EOI Notification Approved';

 

 // created: 2023-01-27 16:43:37
$dictionary['Veta_Visa']['fields']['lmt_notification_approved_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['lmt_notification_approved_c']['labelValue']='LMT Notification Approved';

 

 // created: 2024-10-02 20:38:51
$dictionary['Veta_Visa']['fields']['labor_agreement_final_payment_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['labor_agreement_final_payment_c']['labelValue']='Labor Agreement Final Payment';

 

 // created: 2022-11-29 18:12:59
$dictionary['Veta_Visa']['fields']['fecha_aplicacion']['audited']=true;

 

 // created: 2023-01-30 23:05:49
$dictionary['Veta_Visa']['fields']['state_nomination_expectation_date_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['state_nomination_expectation_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['state_nomination_expectation_date_c']['labelValue']='State Nomination Expectation Date';
$dictionary['Veta_Visa']['fields']['state_nomination_expectation_date_c']['enable_range_search']='1';

 

 // created: 2022-09-23 20:01:49
$dictionary['Veta_Visa']['fields']['recruitment_expectation_date_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['recruitment_expectation_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['recruitment_expectation_date_c']['labelValue']='Recruitment expectation Date';
$dictionary['Veta_Visa']['fields']['recruitment_expectation_date_c']['enable_range_search']='1';

 

 // created: 2022-09-23 19:45:54
$dictionary['Veta_Visa']['fields']['skill_assessment_app_expectation_date_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['skill_assessment_app_expectation_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['skill_assessment_app_expectation_date_c']['labelValue']='Skill Assessment APP expectation Date';
$dictionary['Veta_Visa']['fields']['skill_assessment_app_expectation_date_c']['enable_range_search']='1';

 

 // created: 2023-05-24 21:19:56
$dictionary['Veta_Visa']['fields']['lmt_start_date_2_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['lmt_start_date_2_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['lmt_start_date_2_c']['labelValue']='LMT Start Date 2';
$dictionary['Veta_Visa']['fields']['lmt_start_date_2_c']['enable_range_search']='1';

 

 // created: 2025-04-10 21:45:47
$dictionary['Veta_Visa']['fields']['sponsor_lodge_date_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['sponsor_lodge_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['sponsor_lodge_date_c']['labelValue']='Sponsor Lodge Date';
$dictionary['Veta_Visa']['fields']['sponsor_lodge_date_c']['enable_range_search']='1';

 

 // created: 2023-12-15 20:22:47
$dictionary['Veta_Visa']['fields']['eoi_draft_done_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['eoi_draft_done_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['eoi_draft_done_c']['labelValue']='EOI Draft Done';
$dictionary['Veta_Visa']['fields']['eoi_draft_done_c']['enable_range_search']='1';

 

 // created: 2023-03-28 22:49:11
$dictionary['Veta_Visa']['fields']['rfi_5_ext_request_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['rfi_5_ext_request_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['rfi_5_ext_request_c']['labelValue']='RFI 5 Extension Request';
$dictionary['Veta_Visa']['fields']['rfi_5_ext_request_c']['enable_range_search']='1';

 

 // created: 2023-03-30 22:17:21
$dictionary['Veta_Visa']['fields']['trn_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['trn_c']['labelValue']='TRN';

 

 // created: 2023-02-22 14:56:15
$dictionary['Veta_Visa']['fields']['sbs_application_date_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['sbs_application_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['sbs_application_date_c']['labelValue']='SBS Application Date';
$dictionary['Veta_Visa']['fields']['sbs_application_date_c']['enable_range_search']='1';

 

 // created: 2024-10-02 20:36:01
$dictionary['Veta_Visa']['fields']['labor_agreement_notification_approved_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['labor_agreement_notification_approved_c']['labelValue']='Labor Agreement Notification Approved';

 

 // created: 2024-10-02 20:42:28
$dictionary['Veta_Visa']['fields']['endorsement_expectation_date_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['endorsement_expectation_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['endorsement_expectation_date_c']['labelValue']='Endorsement Expectation Date';
$dictionary['Veta_Visa']['fields']['endorsement_expectation_date_c']['enable_range_search']='1';

 

 // created: 2023-02-15 19:43:40
$dictionary['Veta_Visa']['fields']['process_stages_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['process_stages_c']['labelValue']='Process Stages';

 

 // created: 2022-09-23 19:58:09
$dictionary['Veta_Visa']['fields']['eoi_appoval_date_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['eoi_appoval_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['eoi_appoval_date_c']['labelValue']='EOI Appoval Date';
$dictionary['Veta_Visa']['fields']['eoi_appoval_date_c']['enable_range_search']='1';

 

 // created: 2023-01-30 23:06:54
$dictionary['Veta_Visa']['fields']['state_nomination_approval_date_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['state_nomination_approval_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['state_nomination_approval_date_c']['labelValue']='State Nomination Approval Date';
$dictionary['Veta_Visa']['fields']['state_nomination_approval_date_c']['enable_range_search']='1';

 

 // created: 2023-05-24 21:16:31
$dictionary['Veta_Visa']['fields']['lmt_expectation_date_3_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['lmt_expectation_date_3_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['lmt_expectation_date_3_c']['labelValue']='LMT Expectation date 3';
$dictionary['Veta_Visa']['fields']['lmt_expectation_date_3_c']['enable_range_search']='1';

 

 // created: 2022-09-23 19:47:02
$dictionary['Veta_Visa']['fields']['lmt_start_date_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['lmt_start_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['lmt_start_date_c']['labelValue']='LMT Start Date';
$dictionary['Veta_Visa']['fields']['lmt_start_date_c']['enable_range_search']='1';

 

 // created: 2024-10-02 20:30:24
$dictionary['Veta_Visa']['fields']['labor_agreement_application_date_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['labor_agreement_application_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['labor_agreement_application_date_c']['labelValue']='Labor Agreement Application Date';
$dictionary['Veta_Visa']['fields']['labor_agreement_application_date_c']['enable_range_search']='1';

 

 // created: 2022-09-23 19:49:28
$dictionary['Veta_Visa']['fields']['lmt_expectation_date_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['lmt_expectation_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['lmt_expectation_date_c']['labelValue']='LMT Expectation date';
$dictionary['Veta_Visa']['fields']['lmt_expectation_date_c']['enable_range_search']='1';

 

 // created: 2023-12-15 20:24:03
$dictionary['Veta_Visa']['fields']['skill_assessment_draft_done_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['skill_assessment_draft_done_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['skill_assessment_draft_done_c']['labelValue']='Skill Assessment Draft Done';
$dictionary['Veta_Visa']['fields']['skill_assessment_draft_done_c']['enable_range_search']='1';

 

 // created: 2022-07-27 00:48:52
$dictionary['Veta_Visa']['fields']['rfi_name_1_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['rfi_name_1_c']['labelValue']='RFI Name 1';

 

 // created: 2023-03-28 22:47:19
$dictionary['Veta_Visa']['fields']['rfi_2_ext_request_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['rfi_2_ext_request_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['rfi_2_ext_request_c']['labelValue']='RFI 2 Extension Request';
$dictionary['Veta_Visa']['fields']['rfi_2_ext_request_c']['enable_range_search']='1';

 

 // created: 2023-01-27 16:41:33
$dictionary['Veta_Visa']['fields']['sbs_notification_approved_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['sbs_notification_approved_c']['labelValue']='SBS Notification Approved';

 

 // created: 2022-09-23 19:58:50
$dictionary['Veta_Visa']['fields']['rcb_expectation_date_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['rcb_expectation_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['rcb_expectation_date_c']['labelValue']='RCB Expectation Date';
$dictionary['Veta_Visa']['fields']['rcb_expectation_date_c']['enable_range_search']='1';

 

 // created: 2023-01-30 23:08:44
$dictionary['Veta_Visa']['fields']['state_nomination_notification_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['state_nomination_notification_c']['labelValue']='State Nomination Notification';

 

 // created: 2022-07-13 23:57:00
$dictionary['Veta_Visa']['fields']['rfi_1_types_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['rfi_1_types_c']['labelValue']='RFI 1 Types';

 

 // created: 2022-07-26 21:02:35
$dictionary['Veta_Visa']['fields']['fecha_response_req5_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['fecha_response_req5_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['fecha_response_req5_c']['labelValue']='RFI 5 response date';
$dictionary['Veta_Visa']['fields']['fecha_response_req5_c']['enable_range_search']='1';

 

 // created: 2023-03-23 01:26:29
$dictionary['Veta_Visa']['fields']['sbs_process_stage_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['sbs_process_stage_c']['labelValue']='SBS';

 

 // created: 2023-03-23 01:24:30
$dictionary['Veta_Visa']['fields']['roi_process_stage_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['roi_process_stage_c']['labelValue']='ROI';

 

 // created: 2023-07-31 23:07:57
$dictionary['Veta_Visa']['fields']['fecha_response_req3_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['fecha_response_req3_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['fecha_response_req3_c']['labelValue']='RFI 3  RFI answered date';
$dictionary['Veta_Visa']['fields']['fecha_response_req3_c']['enable_range_search']='1';

 

 // created: 2023-12-15 20:23:18
$dictionary['Veta_Visa']['fields']['rcb_draft_done_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['rcb_draft_done_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['rcb_draft_done_c']['labelValue']='RCB Draft Done';
$dictionary['Veta_Visa']['fields']['rcb_draft_done_c']['enable_range_search']='1';

 

 // created: 2023-01-27 16:42:44
$dictionary['Veta_Visa']['fields']['rcb_notification_approved_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['rcb_notification_approved_c']['labelValue']='RCB Notification Approved';

 

 // created: 2023-05-24 21:18:32
$dictionary['Veta_Visa']['fields']['lmt_url_3_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['lmt_url_3_c']['labelValue']='LMT Url 3';

 

 // created: 2022-07-27 00:49:48
$dictionary['Veta_Visa']['fields']['rfi_name_4_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['rfi_name_4_c']['labelValue']='RFI Name 4';

 

 // created: 2023-03-23 01:25:37
$dictionary['Veta_Visa']['fields']['eoi_process_stage_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['eoi_process_stage_c']['labelValue']='EOI';

 

 // created: 2023-12-20 22:07:02
$dictionary['Veta_Visa']['fields']['visa_draft_done_date_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['visa_draft_done_date_c']['labelValue']='Visa Draft Done Date';

 

 // created: 2023-01-27 15:20:49
$dictionary['Veta_Visa']['fields']['sbs_notification_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['sbs_notification_c']['labelValue']='SBS Notification';

 

 // created: 2022-07-26 21:09:24
$dictionary['Veta_Visa']['fields']['rfi_5_types_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['rfi_5_types_c']['labelValue']='RFI 5 Types';

 

 // created: 2022-09-23 20:00:10
$dictionary['Veta_Visa']['fields']['roi_approval_date_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['roi_approval_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['roi_approval_date_c']['labelValue']='ROI Approval Date';
$dictionary['Veta_Visa']['fields']['roi_approval_date_c']['enable_range_search']='1';

 

 // created: 2023-12-15 20:23:05
$dictionary['Veta_Visa']['fields']['nomination_draft_done_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['nomination_draft_done_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['nomination_draft_done_c']['labelValue']='Nomination Draft Done';
$dictionary['Veta_Visa']['fields']['nomination_draft_done_c']['enable_range_search']='1';

 

 // created: 2024-10-02 20:44:51
$dictionary['Veta_Visa']['fields']['endorsement_process_stage_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['endorsement_process_stage_c']['labelValue']='Endorsement';

 

 // created: 2024-04-24 20:25:15
$dictionary['Veta_Visa']['fields']['lmt_finished_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['lmt_finished_c']['labelValue']='LMT Finished';

 

 // created: 2022-09-23 19:55:14
$dictionary['Veta_Visa']['fields']['tas_approval_date_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['tas_approval_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['tas_approval_date_c']['labelValue']='TAS Approval Date';
$dictionary['Veta_Visa']['fields']['tas_approval_date_c']['enable_range_search']='1';

 

 // created: 2022-07-27 00:50:04
$dictionary['Veta_Visa']['fields']['rfi_name_5_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['rfi_name_5_c']['labelValue']='RFI Name 5';

 

 // created: 2023-01-30 23:09:14
$dictionary['Veta_Visa']['fields']['state_nomination_notification_approved_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['state_nomination_notification_approved_c']['labelValue']='State Nomination Notification Approved';

 

 // created: 2023-01-27 15:21:12
$dictionary['Veta_Visa']['fields']['lmt_notification_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['lmt_notification_c']['labelValue']='LMT Notification';

 

 // created: 2022-09-23 19:59:47
$dictionary['Veta_Visa']['fields']['roi_expectation_date_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['roi_expectation_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['roi_expectation_date_c']['labelValue']='ROI Expectation Date';
$dictionary['Veta_Visa']['fields']['roi_expectation_date_c']['enable_range_search']='1';

 

 // created: 2024-06-11 21:38:38
$dictionary['Veta_Visa']['fields']['roi_value_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['roi_value_c']['labelValue']='ROI Value';

 

 // created: 2023-05-24 21:16:48
$dictionary['Veta_Visa']['fields']['lmt_expectation_date_2_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['lmt_expectation_date_2_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['lmt_expectation_date_2_c']['labelValue']='LMT Expectation date 2';
$dictionary['Veta_Visa']['fields']['lmt_expectation_date_2_c']['enable_range_search']='1';

 

 // created: 2023-03-30 22:26:34
$dictionary['Veta_Visa']['fields']['nomination_trn_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['nomination_trn_c']['labelValue']='Nomination TRN';

 

 // created: 2024-06-11 21:39:13
$dictionary['Veta_Visa']['fields']['skill_assessment_value_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['skill_assessment_value_c']['labelValue']='Skill Assessment Value';

 

 // created: 2023-11-29 19:42:01
$dictionary['Veta_Visa']['fields']['user_id1_c']['inline_edit']=1;

 

 // created: 2022-11-29 18:12:25
$dictionary['Veta_Visa']['fields']['fecha_otorgada']['audited']=true;

 

 // created: 2022-07-25 21:58:37
$dictionary['Veta_Visa']['fields']['rfi_4_types_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['rfi_4_types_c']['labelValue']='RFI 4 Types';

 

 // created: 2022-09-23 19:45:04
$dictionary['Veta_Visa']['fields']['nomination_approval_date_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['nomination_approval_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['nomination_approval_date_c']['labelValue']='Nomination Approval Date';
$dictionary['Veta_Visa']['fields']['nomination_approval_date_c']['enable_range_search']='1';

 

 // created: 2022-11-23 17:06:39
$dictionary['Veta_Visa']['fields']['eoi_2_application_date_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['eoi_2_application_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['eoi_2_application_date_c']['labelValue']='EOI 2 Application Date';
$dictionary['Veta_Visa']['fields']['eoi_2_application_date_c']['enable_range_search']='1';

 

 // created: 2022-07-26 21:07:57
$dictionary['Veta_Visa']['fields']['fecha_exp_req5_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['fecha_exp_req5_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['fecha_exp_req5_c']['labelValue']='RFI 5 Expiration Date';
$dictionary['Veta_Visa']['fields']['fecha_exp_req5_c']['enable_range_search']='1';

 

 // created: 2023-03-23 01:26:01
$dictionary['Veta_Visa']['fields']['rcb_process_stage_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['rcb_process_stage_c']['labelValue']='RCB';

 

 // created: 2022-11-01 18:12:37
$dictionary['Veta_Visa']['fields']['visa_expectation_date_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['visa_expectation_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['visa_expectation_date_c']['labelValue']='Visa Expectation Date';
$dictionary['Veta_Visa']['fields']['visa_expectation_date_c']['enable_range_search']='1';

 

 // created: 2023-01-30 22:12:59
$dictionary['Veta_Visa']['fields']['state_nomination_application_date_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['state_nomination_application_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['state_nomination_application_date_c']['labelValue']='State Nomination Application Date';
$dictionary['Veta_Visa']['fields']['state_nomination_application_date_c']['enable_range_search']='1';

 

 // created: 2024-06-11 21:38:53
$dictionary['Veta_Visa']['fields']['sbs_value_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['sbs_value_c']['labelValue']='SBS Value';

 

 // created: 2022-07-13 23:57:50
$dictionary['Veta_Visa']['fields']['rfi_3_types_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['rfi_3_types_c']['labelValue']='RFI 3 Types';

 

 // created: 2023-03-23 01:27:48
$dictionary['Veta_Visa']['fields']['nomination_process_stage_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['nomination_process_stage_c']['labelValue']='Nomination';

 

 // created: 2023-01-27 16:42:27
$dictionary['Veta_Visa']['fields']['recruitment_notification_approved_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['recruitment_notification_approved_c']['labelValue']='Recruitment Notification Approved';

 

 // created: 2022-09-23 19:56:52
$dictionary['Veta_Visa']['fields']['eoi_expectation_date_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['eoi_expectation_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['eoi_expectation_date_c']['labelValue']='EOI Expectation Date';
$dictionary['Veta_Visa']['fields']['eoi_expectation_date_c']['enable_range_search']='1';

 

 // created: 2021-02-16 17:05:21
$dictionary['Veta_Visa']['fields']['fecha_firma_acta']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['fecha_firma_acta']['enable_range_search']='1';

 

 // created: 2022-09-23 19:50:18
$dictionary['Veta_Visa']['fields']['skill_assessment_app_date_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['skill_assessment_app_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['skill_assessment_app_date_c']['labelValue']='Skill Assessment APP Date';
$dictionary['Veta_Visa']['fields']['skill_assessment_app_date_c']['enable_range_search']='1';

 

 // created: 2024-06-14 20:13:10
$dictionary['Veta_Visa']['fields']['citizenship_draft_done_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['citizenship_draft_done_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['citizenship_draft_done_c']['labelValue']='Citizenship Draft Done';
$dictionary['Veta_Visa']['fields']['citizenship_draft_done_c']['enable_range_search']='1';

 

 // created: 2022-07-26 21:06:41
$dictionary['Veta_Visa']['fields']['fecha_exp_req4_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['fecha_exp_req4_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['fecha_exp_req4_c']['labelValue']='RFI 4 Expiration Date';
$dictionary['Veta_Visa']['fields']['fecha_exp_req4_c']['enable_range_search']='1';

 

 // created: 2023-01-27 15:18:28
$dictionary['Veta_Visa']['fields']['rcb_notification_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['rcb_notification_c']['labelValue']='RCB Notification';

 

 // created: 2024-10-02 20:37:57
$dictionary['Veta_Visa']['fields']['labor_agreement_process_stage_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['labor_agreement_process_stage_c']['labelValue']='Labor Agreement';

 

 // created: 2023-01-27 16:40:23
$dictionary['Veta_Visa']['fields']['tas_notification_approved_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['tas_notification_approved_c']['labelValue']='TAS Notification Approved';

 

 // created: 2022-07-26 21:05:31
$dictionary['Veta_Visa']['fields']['fecha_req5_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['fecha_req5_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['fecha_req5_c']['labelValue']='RFI 5 Date';
$dictionary['Veta_Visa']['fields']['fecha_req5_c']['enable_range_search']='1';

 

 // created: 2024-06-11 21:37:30
$dictionary['Veta_Visa']['fields']['eoi_value_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['eoi_value_c']['labelValue']='EOI Value';

 

 // created: 2023-03-23 01:27:13
$dictionary['Veta_Visa']['fields']['skill_assessment_process_stage_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['skill_assessment_process_stage_c']['labelValue']='Skill Assessment';

 

 // created: 2023-01-27 16:43:15
$dictionary['Veta_Visa']['fields']['nomination_notification_approved_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['nomination_notification_approved_c']['labelValue']='Nomination Notification Approved';

 

 // created: 2023-02-22 14:54:53
$dictionary['Veta_Visa']['fields']['sbs_approval_date_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['sbs_approval_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['sbs_approval_date_c']['labelValue']='SBS Approval Date';
$dictionary['Veta_Visa']['fields']['sbs_approval_date_c']['enable_range_search']='1';

 

 // created: 2022-09-23 19:55:49
$dictionary['Veta_Visa']['fields']['eoi_application_date_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['eoi_application_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['eoi_application_date_c']['labelValue']='EOI Application Date';
$dictionary['Veta_Visa']['fields']['eoi_application_date_c']['enable_range_search']='1';

 

 // created: 2025-04-10 21:51:42
$dictionary['Veta_Visa']['fields']['art_lodge_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['art_lodge_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['art_lodge_c']['labelValue']='ART Lodge';
$dictionary['Veta_Visa']['fields']['art_lodge_c']['enable_range_search']='1';

 

 // created: 2022-11-23 17:07:44
$dictionary['Veta_Visa']['fields']['eoi_3_application_date_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['eoi_3_application_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['eoi_3_application_date_c']['labelValue']='EOI 3 Application Date';
$dictionary['Veta_Visa']['fields']['eoi_3_application_date_c']['enable_range_search']='1';

 

 // created: 2024-10-02 20:35:16
$dictionary['Veta_Visa']['fields']['labor_agreement_expectation_date_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['labor_agreement_expectation_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['labor_agreement_expectation_date_c']['labelValue']='Labor Agreement Expectation Date';
$dictionary['Veta_Visa']['fields']['labor_agreement_expectation_date_c']['enable_range_search']='1';

 

 // created: 2023-05-24 21:18:15
$dictionary['Veta_Visa']['fields']['lmt_url_2_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['lmt_url_2_c']['labelValue']='LMT Url 2';

 

 // created: 2022-11-23 17:05:44
$dictionary['Veta_Visa']['fields']['eoi_2_appoval_date_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['eoi_2_appoval_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['eoi_2_appoval_date_c']['labelValue']='EOI 2 Appoval Date';
$dictionary['Veta_Visa']['fields']['eoi_2_appoval_date_c']['enable_range_search']='1';

 

 // created: 2024-06-14 19:54:14
$dictionary['Veta_Visa']['fields']['citizenship_process_stage_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['citizenship_process_stage_c']['labelValue']='Citizenship';

 

 // created: 2024-10-02 20:44:17
$dictionary['Veta_Visa']['fields']['endorsement_notification_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['endorsement_notification_c']['labelValue']='Endorsement Notification';

 

 // created: 2023-03-23 01:28:42
$dictionary['Veta_Visa']['fields']['tas_process_stage_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['tas_process_stage_c']['labelValue']='TAS';

 

 // created: 2024-06-17 19:02:52
$dictionary['Veta_Visa']['fields']['followup_user_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['followup_user_c']['labelValue']='Followup user';

 

 // created: 2024-10-02 20:41:44
$dictionary['Veta_Visa']['fields']['endorsement_draft_done_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['endorsement_draft_done_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['endorsement_draft_done_c']['labelValue']='Endorsement Draft Done';
$dictionary['Veta_Visa']['fields']['endorsement_draft_done_c']['enable_range_search']='1';

 

 // created: 2022-09-23 19:59:06
$dictionary['Veta_Visa']['fields']['rcb_approval_date_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['rcb_approval_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['rcb_approval_date_c']['labelValue']='RCB Approval Date';
$dictionary['Veta_Visa']['fields']['rcb_approval_date_c']['enable_range_search']='1';

 

 // created: 2022-09-23 19:42:13
$dictionary['Veta_Visa']['fields']['nomination_app_date_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['nomination_app_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['nomination_app_date_c']['labelValue']='Nomination APP Date';
$dictionary['Veta_Visa']['fields']['nomination_app_date_c']['enable_range_search']='1';

 

 // created: 2023-01-27 15:19:44
$dictionary['Veta_Visa']['fields']['tas_notification_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['tas_notification_c']['labelValue']='TAS Notification';

 

 // created: 2023-03-23 01:30:32
$dictionary['Veta_Visa']['fields']['state_nomination_process_stage_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['state_nomination_process_stage_c']['labelValue']='State Nomination';

 

 // created: 2023-12-15 20:24:42
$dictionary['Veta_Visa']['fields']['tas_draft_done_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['tas_draft_done_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['tas_draft_done_c']['labelValue']='TAS Draft Done';
$dictionary['Veta_Visa']['fields']['tas_draft_done_c']['enable_range_search']='1';

 

 // created: 2022-11-23 17:05:02
$dictionary['Veta_Visa']['fields']['eoi_2_expectation_date_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['eoi_2_expectation_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['eoi_2_expectation_date_c']['labelValue']='EOI 2 Expectation Date';
$dictionary['Veta_Visa']['fields']['eoi_2_expectation_date_c']['enable_range_search']='1';

 

 // created: 2023-01-27 15:19:56
$dictionary['Veta_Visa']['fields']['eoi_notification_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['eoi_notification_c']['labelValue']='EOI Notification';

 

 // created: 2024-10-02 20:45:30
$dictionary['Veta_Visa']['fields']['endorsement_final_payment_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['endorsement_final_payment_c']['labelValue']='Endorsement Final Payment';

 

 // created: 2023-03-28 22:48:45
$dictionary['Veta_Visa']['fields']['rfi_4_ext_request_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['rfi_4_ext_request_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['rfi_4_ext_request_c']['labelValue']='RFI 4 Extension Request';
$dictionary['Veta_Visa']['fields']['rfi_4_ext_request_c']['enable_range_search']='1';

 

 // created: 2024-06-11 21:37:31
$dictionary['Veta_Visa']['fields']['currency_id']['inline_edit']=1;

 

 // created: 2023-01-27 16:41:50
$dictionary['Veta_Visa']['fields']['roi__notification_approved_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['roi__notification_approved_c']['labelValue']='ROI Notification Approved';

 

 // created: 2024-07-23 17:26:40
$dictionary['Veta_Visa']['fields']['region_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['region_c']['labelValue']='Region';

 

 // created: 2022-11-29 18:12:09
$dictionary['Veta_Visa']['fields']['rejected_date_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['rejected_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['rejected_date_c']['labelValue']='Rejected Date';
$dictionary['Veta_Visa']['fields']['rejected_date_c']['enable_range_search']='1';

 

 // created: 2023-01-30 15:36:09

 

 // created: 2024-10-02 20:40:20
$dictionary['Veta_Visa']['fields']['endorsement_application_date_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['endorsement_application_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['endorsement_application_date_c']['labelValue']='Endorsement Application Date';
$dictionary['Veta_Visa']['fields']['endorsement_application_date_c']['enable_range_search']='1';

 

 // created: 2024-07-23 17:26:40
$dictionary['Veta_Visa']['fields']['util_region_id_c']['inline_edit']=1;

 

 // created: 2023-12-15 20:23:28
$dictionary['Veta_Visa']['fields']['roi_draft_done_c']['inline_edit']='';
$dictionary['Veta_Visa']['fields']['roi_draft_done_c']['options']='date_range_search_dom';
$dictionary['Veta_Visa']['fields']['roi_draft_done_c']['labelValue']='ROI Draft Done';
$dictionary['Veta_Visa']['fields']['roi_draft_done_c']['enable_range_search']='1';

 

 // created: 2022-07-27 00:49:13
$dictionary['Veta_Visa']['fields']['rfi_name_2_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['rfi_name_2_c']['labelValue']='RFI Name 2';

 

 // created: 2022-07-13 23:57:34
$dictionary['Veta_Visa']['fields']['rfi_2_types_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['rfi_2_types_c']['labelValue']='RFI 2 Types';

 

 // created: 2024-06-11 21:37:51
$dictionary['Veta_Visa']['fields']['nomination_value_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['nomination_value_c']['labelValue']='Nomination Value';

 

 // created: 2023-03-23 01:28:12
$dictionary['Veta_Visa']['fields']['lmt_process_stage_c']['inline_edit']='1';
$dictionary['Veta_Visa']['fields']['lmt_process_stage_c']['labelValue']='LMT';

 
?>