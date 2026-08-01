<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2020-10-14 00:58:33
$dictionary["Veta_Recibo"]["fields"]["veta_recibo_leads"] = array (
  'name' => 'veta_recibo_leads',
  'type' => 'link',
  'relationship' => 'veta_recibo_leads',
  'source' => 'non-db',
  'module' => 'Leads',
  'bean_name' => 'Lead',
  'vname' => 'LBL_VETA_RECIBO_LEADS_FROM_LEADS_TITLE',
  'id_name' => 'veta_recibo_leadsleads_ida',
);
$dictionary["Veta_Recibo"]["fields"]["veta_recibo_leads_name"] = array (
  'name' => 'veta_recibo_leads_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VETA_RECIBO_LEADS_FROM_LEADS_TITLE',
  'save' => true,
  'id_name' => 'veta_recibo_leadsleads_ida',
  'link' => 'veta_recibo_leads',
  'table' => 'leads',
  'module' => 'Leads',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Veta_Recibo"]["fields"]["veta_recibo_leadsleads_ida"] = array (
  'name' => 'veta_recibo_leadsleads_ida',
  'type' => 'link',
  'relationship' => 'veta_recibo_leads',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VETA_RECIBO_LEADS_FROM_VETA_RECIBO_TITLE',
);


// created: 2022-06-21 21:17:41
$dictionary["Veta_Recibo"]["fields"]["veta_recibo_conta_refunds_1"] = array (
  'name' => 'veta_recibo_conta_refunds_1',
  'type' => 'link',
  'relationship' => 'veta_recibo_conta_refunds_1',
  'source' => 'non-db',
  'module' => 'Conta_refunds',
  'bean_name' => 'Conta_refunds',
  'side' => 'right',
  'vname' => 'LBL_VETA_RECIBO_CONTA_REFUNDS_1_FROM_CONTA_REFUNDS_TITLE',
);


// created: 2022-02-03 23:13:16
$dictionary["Veta_Recibo"]["fields"]["veta_recibo_spay_schedule_payment_company_1"] = array (
  'name' => 'veta_recibo_spay_schedule_payment_company_1',
  'type' => 'link',
  'relationship' => 'veta_recibo_spay_schedule_payment_company_1',
  'source' => 'non-db',
  'module' => 'Spay_Schedule_Payment_Company',
  'bean_name' => 'Spay_Schedule_Payment_Company',
  'side' => 'right',
  'vname' => 'LBL_VETA_RECIBO_SPAY_SCHEDULE_PAYMENT_COMPANY_1_FROM_SPAY_SCHEDULE_PAYMENT_COMPANY_TITLE',
);


// created: 2020-10-14 00:58:33
$dictionary["Veta_Recibo"]["fields"]["veta_recibo_contacts"] = array (
  'name' => 'veta_recibo_contacts',
  'type' => 'link',
  'relationship' => 'veta_recibo_contacts',
  'source' => 'non-db',
  'module' => 'Contacts',
  'bean_name' => 'Contact',
  'vname' => 'LBL_VETA_RECIBO_CONTACTS_FROM_CONTACTS_TITLE',
  'id_name' => 'veta_recibo_contactscontacts_ida',
);
$dictionary["Veta_Recibo"]["fields"]["veta_recibo_contacts_name"] = array (
  'name' => 'veta_recibo_contacts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VETA_RECIBO_CONTACTS_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'veta_recibo_contactscontacts_ida',
  'link' => 'veta_recibo_contacts',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Veta_Recibo"]["fields"]["veta_recibo_contactscontacts_ida"] = array (
  'name' => 'veta_recibo_contactscontacts_ida',
  'type' => 'link',
  'relationship' => 'veta_recibo_contacts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VETA_RECIBO_CONTACTS_FROM_VETA_RECIBO_TITLE',
);


// created: 2021-10-13 16:47:42
$dictionary["Veta_Recibo"]["fields"]["nvc_taxes_and_fees_config_veta_recibo"] = array (
  'name' => 'nvc_taxes_and_fees_config_veta_recibo',
  'type' => 'link',
  'relationship' => 'nvc_taxes_and_fees_config_veta_recibo',
  'source' => 'non-db',
  'module' => 'NVC_Taxes_and_Fees_Config',
  'bean_name' => 'NVC_Taxes_and_Fees_Config',
  'vname' => 'LBL_NVC_TAXES_AND_FEES_CONFIG_VETA_RECIBO_FROM_NVC_TAXES_AND_FEES_CONFIG_TITLE',
  'id_name' => 'nvc_taxes_02a7_config_ida',
);
$dictionary["Veta_Recibo"]["fields"]["nvc_taxes_and_fees_config_veta_recibo_name"] = array (
  'name' => 'nvc_taxes_and_fees_config_veta_recibo_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_NVC_TAXES_AND_FEES_CONFIG_VETA_RECIBO_FROM_NVC_TAXES_AND_FEES_CONFIG_TITLE',
  'save' => true,
  'id_name' => 'nvc_taxes_02a7_config_ida',
  'link' => 'nvc_taxes_and_fees_config_veta_recibo',
  'table' => 'nvc_taxes_and_fees_config',
  'module' => 'NVC_Taxes_and_Fees_Config',
  'rname' => 'name',
);
$dictionary["Veta_Recibo"]["fields"]["nvc_taxes_02a7_config_ida"] = array (
  'name' => 'nvc_taxes_02a7_config_ida',
  'type' => 'link',
  'relationship' => 'nvc_taxes_and_fees_config_veta_recibo',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_NVC_TAXES_AND_FEES_CONFIG_VETA_RECIBO_FROM_NVC_TAXES_AND_FEES_CONFIG_TITLE',
);


// created: 2020-10-14 00:58:20
$dictionary["Veta_Recibo"]["fields"]["veta_abono_veta_recibo"] = array (
  'name' => 'veta_abono_veta_recibo',
  'type' => 'link',
  'relationship' => 'veta_abono_veta_recibo',
  'source' => 'non-db',
  'module' => 'Veta_Abono',
  'bean_name' => 'Veta_Abono',
  'side' => 'right',
  'vname' => 'LBL_VETA_ABONO_VETA_RECIBO_FROM_VETA_ABONO_TITLE',
);


// created: 2023-01-16 03:09:34
$dictionary["Veta_Recibo"]["fields"]["auto_tickets_veta_recibo"] = array (
  'name' => 'auto_tickets_veta_recibo',
  'type' => 'link',
  'relationship' => 'auto_tickets_veta_recibo',
  'source' => 'non-db',
  'module' => 'Auto_Tickets',
  'bean_name' => 'Auto_Tickets',
  'side' => 'right',
  'vname' => 'LBL_AUTO_TICKETS_VETA_RECIBO_FROM_AUTO_TICKETS_TITLE',
);


// created: 2021-10-23 02:01:19
$dictionary["Veta_Recibo"]["fields"]["veta_recibo_nvc_deposit_company_1"] = array (
  'name' => 'veta_recibo_nvc_deposit_company_1',
  'type' => 'link',
  'relationship' => 'veta_recibo_nvc_deposit_company_1',
  'source' => 'non-db',
  'module' => 'NVC_Deposit_company',
  'bean_name' => 'NVC_Deposit_company',
  'side' => 'right',
  'vname' => 'LBL_VETA_RECIBO_NVC_DEPOSIT_COMPANY_1_FROM_NVC_DEPOSIT_COMPANY_TITLE',
);


// created: 2020-10-14 00:58:25
$dictionary["Veta_Recibo"]["fields"]["veta_detallerecibo_veta_recibo"] = array (
  'name' => 'veta_detallerecibo_veta_recibo',
  'type' => 'link',
  'relationship' => 'veta_detallerecibo_veta_recibo',
  'source' => 'non-db',
  'module' => 'Veta_DetalleRecibo',
  'bean_name' => 'Veta_DetalleRecibo',
  'side' => 'right',
  'vname' => 'LBL_VETA_DETALLERECIBO_VETA_RECIBO_FROM_VETA_DETALLERECIBO_TITLE',
);


// created: 2020-10-14 00:58:34
$dictionary["Veta_Recibo"]["fields"]["veta_recibo_emails"] = array (
  'name' => 'veta_recibo_emails',
  'type' => 'link',
  'relationship' => 'veta_recibo_emails',
  'source' => 'non-db',
  'module' => 'Emails',
  'bean_name' => 'Email',
  'side' => 'right',
  'vname' => 'LBL_VETA_RECIBO_EMAILS_FROM_EMAILS_TITLE',
);


$dictionary['Veta_Recibo']['fields']['soel_asegurador'] = array(
    'name' => 'soel_asegurador',
    'vname' => 'LBL_SOEL_ASEGURADOR',
    'type' => 'enum',
    'source' => 'non-db',
    'function' => 'getAseguradores',
    
);


// created: 2020-10-14 00:58:34
$dictionary["Veta_Recibo"]["fields"]["veta_recibo_opportunities"] = array (
  'name' => 'veta_recibo_opportunities',
  'type' => 'link',
  'relationship' => 'veta_recibo_opportunities',
  'source' => 'non-db',
  'module' => 'Opportunities',
  'bean_name' => 'Opportunity',
  'vname' => 'LBL_VETA_RECIBO_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
  'id_name' => 'veta_recibo_opportunitiesopportunities_idb',
);
$dictionary["Veta_Recibo"]["fields"]["veta_recibo_opportunities_name"] = array (
  'name' => 'veta_recibo_opportunities_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VETA_RECIBO_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
  'save' => true,
  'id_name' => 'veta_recibo_opportunitiesopportunities_idb',
  'link' => 'veta_recibo_opportunities',
  'table' => 'opportunities',
  'module' => 'Opportunities',
  'rname' => 'name',
);
$dictionary["Veta_Recibo"]["fields"]["veta_recibo_opportunitiesopportunities_idb"] = array (
  'name' => 'veta_recibo_opportunitiesopportunities_idb',
  'type' => 'link',
  'relationship' => 'veta_recibo_opportunities',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_VETA_RECIBO_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
);


// created: 2020-10-14 00:58:36
$dictionary["Veta_Recibo"]["fields"]["veta_requerimiento_veta_recibo"] = array (
  'name' => 'veta_requerimiento_veta_recibo',
  'type' => 'link',
  'relationship' => 'veta_requerimiento_veta_recibo',
  'source' => 'non-db',
  'module' => 'Veta_Requerimiento',
  'bean_name' => 'Veta_Requerimiento',
  'vname' => 'LBL_VETA_REQUERIMIENTO_VETA_RECIBO_FROM_VETA_REQUERIMIENTO_TITLE',
  'id_name' => 'veta_requerimiento_veta_reciboveta_requerimiento_ida',
);
$dictionary["Veta_Recibo"]["fields"]["veta_requerimiento_veta_recibo_name"] = array (
  'name' => 'veta_requerimiento_veta_recibo_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VETA_REQUERIMIENTO_VETA_RECIBO_FROM_VETA_REQUERIMIENTO_TITLE',
  'save' => true,
  'id_name' => 'veta_requerimiento_veta_reciboveta_requerimiento_ida',
  'link' => 'veta_requerimiento_veta_recibo',
  'table' => 'veta_requerimiento',
  'module' => 'Veta_Requerimiento',
  'rname' => 'name',
);
$dictionary["Veta_Recibo"]["fields"]["veta_requerimiento_veta_reciboveta_requerimiento_ida"] = array (
  'name' => 'veta_requerimiento_veta_reciboveta_requerimiento_ida',
  'type' => 'link',
  'relationship' => 'veta_requerimiento_veta_recibo',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VETA_REQUERIMIENTO_VETA_RECIBO_FROM_VETA_RECIBO_TITLE2',
);


// created: 2021-12-13 16:27:10
$dictionary["Veta_Recibo"]["fields"]["veta_recibo_veta_college_1"] = array (
  'name' => 'veta_recibo_veta_college_1',
  'type' => 'link',
  'relationship' => 'veta_recibo_veta_college_1',
  'source' => 'non-db',
  'module' => 'Veta_College',
  'bean_name' => 'Veta_College',
  'side' => 'right',
  'vname' => 'LBL_VETA_RECIBO_VETA_COLLEGE_1_FROM_VETA_COLLEGE_TITLE',
);


// created: 2022-02-03 23:11:13
$dictionary["Veta_Recibo"]["fields"]["veta_recibo_spay_schedule_payment_applicant_1"] = array (
  'name' => 'veta_recibo_spay_schedule_payment_applicant_1',
  'type' => 'link',
  'relationship' => 'veta_recibo_spay_schedule_payment_applicant_1',
  'source' => 'non-db',
  'module' => 'Spay_Schedule_Payment_Applicant',
  'bean_name' => 'Spay_Schedule_Payment_Applicant',
  'side' => 'right',
  'vname' => 'LBL_VETA_RECIBO_SPAY_SCHEDULE_PAYMENT_APPLICANT_1_FROM_SPAY_SCHEDULE_PAYMENT_APPLICANT_TITLE',
);


// created: 2020-10-14 00:58:25
$dictionary["Veta_Recibo"]["fields"]["veta_detallereciboitem_veta_recibo"] = array (
  'name' => 'veta_detallereciboitem_veta_recibo',
  'type' => 'link',
  'relationship' => 'veta_detallereciboitem_veta_recibo',
  'source' => 'non-db',
  'module' => 'Veta_DetalleReciboItem',
  'bean_name' => 'Veta_DetalleReciboItem',
  'side' => 'right',
  'vname' => 'LBL_VETA_DETALLERECIBOITEM_VETA_RECIBO_FROM_VETA_DETALLERECIBOITEM_TITLE',
);


// created: 2023-05-03 21:44:34
$dictionary["Veta_Recibo"]["fields"]["nvc_companies_veta_recibo_1"] = array (
  'name' => 'nvc_companies_veta_recibo_1',
  'type' => 'link',
  'relationship' => 'nvc_companies_veta_recibo_1',
  'source' => 'non-db',
  'module' => 'NVC_Companies',
  'bean_name' => 'NVC_Companies',
  'vname' => 'LBL_NVC_COMPANIES_VETA_RECIBO_1_FROM_NVC_COMPANIES_TITLE',
  'id_name' => 'nvc_companies_veta_recibo_1nvc_companies_ida',
);
$dictionary["Veta_Recibo"]["fields"]["nvc_companies_veta_recibo_1_name"] = array (
  'name' => 'nvc_companies_veta_recibo_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_NVC_COMPANIES_VETA_RECIBO_1_FROM_NVC_COMPANIES_TITLE',
  'save' => true,
  'id_name' => 'nvc_companies_veta_recibo_1nvc_companies_ida',
  'link' => 'nvc_companies_veta_recibo_1',
  'table' => 'nvc_companies',
  'module' => 'NVC_Companies',
  'rname' => 'name',
);
$dictionary["Veta_Recibo"]["fields"]["nvc_companies_veta_recibo_1nvc_companies_ida"] = array (
  'name' => 'nvc_companies_veta_recibo_1nvc_companies_ida',
  'type' => 'link',
  'relationship' => 'nvc_companies_veta_recibo_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_NVC_COMPANIES_VETA_RECIBO_1_FROM_VETA_RECIBO_TITLE',
);


// created: 2020-10-14 00:58:34
$dictionary["Veta_Recibo"]["fields"]["veta_recibo_veta_presupuesto"] = array (
  'name' => 'veta_recibo_veta_presupuesto',
  'type' => 'link',
  'relationship' => 'veta_recibo_veta_presupuesto',
  'source' => 'non-db',
  'module' => 'Veta_Presupuesto',
  'bean_name' => 'Veta_Presupuesto',
  'vname' => 'LBL_VETA_RECIBO_VETA_PRESUPUESTO_FROM_VETA_PRESUPUESTO_TITLE',
  'id_name' => 'veta_recibo_veta_presupuestoveta_presupuesto_ida',
);
$dictionary["Veta_Recibo"]["fields"]["veta_recibo_veta_presupuesto_name"] = array (
  'name' => 'veta_recibo_veta_presupuesto_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VETA_RECIBO_VETA_PRESUPUESTO_FROM_VETA_PRESUPUESTO_TITLE',
  'save' => true,
  'id_name' => 'veta_recibo_veta_presupuestoveta_presupuesto_ida',
  'link' => 'veta_recibo_veta_presupuesto',
  'table' => 'veta_presupuesto',
  'module' => 'Veta_Presupuesto',
  'rname' => 'name',
);
$dictionary["Veta_Recibo"]["fields"]["veta_recibo_veta_presupuestoveta_presupuesto_ida"] = array (
  'name' => 'veta_recibo_veta_presupuestoveta_presupuesto_ida',
  'type' => 'link',
  'relationship' => 'veta_recibo_veta_presupuesto',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VETA_RECIBO_VETA_PRESUPUESTO_FROM_VETA_RECIBO_TITLE',
);


 // created: 2022-01-14 15:12:20
$dictionary['Veta_Recibo']['fields']['australian_sponsor_name_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['australian_sponsor_name_c']['labelValue']='Australian Sponsor\'s name';

 

 // created: 2022-02-21 21:36:20
$dictionary['Veta_Recibo']['fields']['company_skill_assessment_fee3_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['company_skill_assessment_fee3_c']['labelValue']='Company Skill Assessment Fee3';

 

 // created: 2022-02-03 18:15:25
$dictionary['Veta_Recibo']['fields']['veta_tiposvisa_id11_c']['inline_edit']=1;

 

 // created: 2024-09-16 16:57:02
$dictionary['Veta_Recibo']['fields']['sbs_amount_c']['inline_edit']='1';
$dictionary['Veta_Recibo']['fields']['sbs_amount_c']['labelValue']='SBS Amount';

 

 // created: 2022-02-03 17:50:21
$dictionary['Veta_Recibo']['fields']['additional_company_department_fees_label_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['additional_company_department_fees_label_c']['labelValue']='Additional Company Department Fees Label';

 

 // created: 2022-02-07 19:21:34
$dictionary['Veta_Recibo']['fields']['emailtemplate_id1_c']['inline_edit']=1;

 

 // created: 2025-01-15 16:14:11
$dictionary['Veta_Recibo']['fields']['send_form_956_c']['inline_edit']='1';
$dictionary['Veta_Recibo']['fields']['send_form_956_c']['labelValue']='Send Form 956';

 

 // created: 2022-02-07 19:18:48
$dictionary['Veta_Recibo']['fields']['doc_plantillas_id_c']['inline_edit']=1;

 

 // created: 2022-02-03 12:50:44
$dictionary['Veta_Recibo']['fields']['applicant_department_fees_amount_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['applicant_department_fees_amount_c']['labelValue']='Applicant Department\'s Fees Amount';

 

 // created: 2022-01-26 22:14:07
$dictionary['Veta_Recibo']['fields']['signature_request_id_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['signature_request_id_c']['labelValue']='Signature Request ID';

 

 // created: 2022-02-03 17:48:09
$dictionary['Veta_Recibo']['fields']['addiontal_applicant_department_fees_label_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['addiontal_applicant_department_fees_label_c']['labelValue']='Addiontal Applicant Department Fees Label';

 

 // created: 2021-12-07 18:09:20
$dictionary['Veta_Recibo']['fields']['department_visa_fee_1_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['department_visa_fee_1_c']['labelValue']='Department´s Visa Fee - 1';

 

 // created: 2022-01-26 22:14:42
$dictionary['Veta_Recibo']['fields']['signature_status_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['signature_status_c']['labelValue']='Signature Status';

 

 // created: 2024-09-16 16:58:56
$dictionary['Veta_Recibo']['fields']['visa_amount_c']['inline_edit']='1';
$dictionary['Veta_Recibo']['fields']['visa_amount_c']['labelValue']='VISA Amount';

 

 // created: 2022-02-03 17:51:06
$dictionary['Veta_Recibo']['fields']['additional_company_department_fees_amount_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['additional_company_department_fees_amount_c']['labelValue']='Additional Company Department Fees Amount';

 

 // created: 2021-12-07 18:09:20
$dictionary['Veta_Recibo']['fields']['veta_tiposvisa_id1_c']['inline_edit']=1;

 

 // created: 2023-06-29 14:27:51
$dictionary['Veta_Recibo']['fields']['workplace_location_c']['inline_edit']='1';
$dictionary['Veta_Recibo']['fields']['workplace_location_c']['labelValue']='Workplace Location';

 

 // created: 2021-12-07 18:12:49
$dictionary['Veta_Recibo']['fields']['department_visa_fee_5_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['department_visa_fee_5_c']['labelValue']='Department´s Visa Fee - 5';

 

 // created: 2021-10-21 20:32:21
$dictionary['Veta_Recibo']['fields']['company_outstanding_amount_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['company_outstanding_amount_c']['labelValue']='Company Outstanding Amount';

 

 // created: 2022-02-07 20:56:22
$dictionary['Veta_Recibo']['fields']['send_both_quote_to_company_c']['inline_edit']='1';
$dictionary['Veta_Recibo']['fields']['send_both_quote_to_company_c']['labelValue']='Send Both Quote To Company';

 

 // created: 2022-02-07 20:55:32
$dictionary['Veta_Recibo']['fields']['send_both_quote_to_applicant_c']['inline_edit']='1';
$dictionary['Veta_Recibo']['fields']['send_both_quote_to_applicant_c']['labelValue']='Send Both Quote To Applicant';

 

 // created: 2022-02-03 12:47:09
$dictionary['Veta_Recibo']['fields']['company_department_fees_label_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['company_department_fees_label_c']['labelValue']='Company Department\'s Fees Label';

 

 // created: 2022-01-13 20:29:02
$dictionary['Veta_Recibo']['fields']['comments_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['comments_c']['labelValue']='Comments';

 

 // created: 2022-02-24 19:49:00
$dictionary['Veta_Recibo']['fields']['company_first_payment_date_c']['inline_edit']='1';
$dictionary['Veta_Recibo']['fields']['company_first_payment_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Recibo']['fields']['company_first_payment_date_c']['labelValue']='Company First Payment Date';
$dictionary['Veta_Recibo']['fields']['company_first_payment_date_c']['enable_range_search']='1';

 

 // created: 2024-09-16 16:57:16
$dictionary['Veta_Recibo']['fields']['eoi_amount_c']['inline_edit']='1';
$dictionary['Veta_Recibo']['fields']['eoi_amount_c']['labelValue']='EOI Amount';

 

 // created: 2021-12-07 18:15:12
$dictionary['Veta_Recibo']['fields']['veta_tiposvisa_id6_c']['inline_edit']=1;

 

 // created: 2021-12-07 18:10:14
$dictionary['Veta_Recibo']['fields']['veta_tiposvisa_id2_c']['inline_edit']=1;

 

 // created: 2021-10-21 20:40:39
$dictionary['Veta_Recibo']['fields']['company_paid_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['company_paid_c']['labelValue']='Company Paid';

 

 // created: 2022-02-21 21:50:49
$dictionary['Veta_Recibo']['fields']['total_skill_assessmente_applicant_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['total_skill_assessmente_applicant_c']['labelValue']='Total Skill Assessmente Applicant';

 

 // created: 2022-02-03 12:37:29
$dictionary['Veta_Recibo']['fields']['applicant_departments_fees_label_c']['inline_edit']='1';
$dictionary['Veta_Recibo']['fields']['applicant_departments_fees_label_c']['labelValue']='Applicant Department\'s Fees Label';

 

 // created: 2022-02-21 21:51:20
$dictionary['Veta_Recibo']['fields']['total_skill_assessmente_company_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['total_skill_assessmente_company_c']['labelValue']='Total Skill Assessmente Company';

 

 // created: 2021-12-07 18:17:28
$dictionary['Veta_Recibo']['fields']['department_visa_fee_company4_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['department_visa_fee_company4_c']['labelValue']='Department´s Visa Fee - 4';

 

 // created: 2022-02-21 21:36:20
$dictionary['Veta_Recibo']['fields']['veta_tiposvisa_id18_c']['inline_edit']=1;

 

 // created: 2021-10-19 14:27:49
$dictionary['Veta_Recibo']['fields']['total_visa_company_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['total_visa_company_c']['labelValue']='Total Visa Company';

 

 // created: 2022-02-03 17:49:23
$dictionary['Veta_Recibo']['fields']['additional_applicant_department_fees_amount__c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['additional_applicant_department_fees_amount__c']['labelValue']='Additional Applicant Department Fees Amount';

 

 // created: 2024-10-02 23:47:30
$dictionary['Veta_Recibo']['fields']['labor_agreement_amount_c']['inline_edit']='1';
$dictionary['Veta_Recibo']['fields']['labor_agreement_amount_c']['labelValue']='Labor Agreement Amount';

 

 // created: 2021-12-07 18:12:04
$dictionary['Veta_Recibo']['fields']['department_visa_fee_4_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['department_visa_fee_4_c']['labelValue']='Department´s Visa Fee - 4';

 

 // created: 2025-04-23 20:47:19
$dictionary['Veta_Recibo']['fields']['all_deposits_transferred_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['all_deposits_transferred_c']['labelValue']='All Deposits Transferred';

 

 // created: 2022-01-14 20:12:43
$dictionary['Veta_Recibo']['fields']['company_comments_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['company_comments_c']['labelValue']='Company Comments';

 

 // created: 2022-02-21 21:26:26
$dictionary['Veta_Recibo']['fields']['veta_tiposvisa_id13_c']['inline_edit']=1;

 

 // created: 2022-02-13 22:28:33
$dictionary['Veta_Recibo']['fields']['custom_date_entered_company_c']['inline_edit']='1';
$dictionary['Veta_Recibo']['fields']['custom_date_entered_company_c']['labelValue']='Custom Date Entered Company';

 

 // created: 2022-02-03 18:14:38
$dictionary['Veta_Recibo']['fields']['veta_tiposvisa_id10_c']['inline_edit']=1;

 

 // created: 2022-02-21 21:35:37
$dictionary['Veta_Recibo']['fields']['veta_tiposvisa_id16_c']['inline_edit']=1;

 

 // created: 2026-01-29 17:10:06
$dictionary['Veta_Recibo']['fields']['invoice_company_creation_date_c']['inline_edit']='1';
$dictionary['Veta_Recibo']['fields']['invoice_company_creation_date_c']['labelValue']='Invoice Company Creation Date';

 

 // created: 2022-02-07 19:20:58
$dictionary['Veta_Recibo']['fields']['applicant_email_template_c']['inline_edit']='1';
$dictionary['Veta_Recibo']['fields']['applicant_email_template_c']['labelValue']='Applicant Email Template';

 

 // created: 2022-02-21 21:36:00
$dictionary['Veta_Recibo']['fields']['company_skill_assessment_fee2_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['company_skill_assessment_fee2_c']['labelValue']='Company Skill Assessment Fee2';

 

 // created: 2022-02-02 20:48:46
$dictionary['Veta_Recibo']['fields']['additional_cost_company_amount_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['additional_cost_company_amount_c']['labelValue']='Additional Cost Company Amount';

 

 // created: 2021-12-07 18:11:32
$dictionary['Veta_Recibo']['fields']['department_visa_fee_3_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['department_visa_fee_3_c']['labelValue']='Department´s Visa Fee - 3';

 

 // created: 2024-09-16 16:59:25
$dictionary['Veta_Recibo']['fields']['nomination_amount_c']['inline_edit']='1';
$dictionary['Veta_Recibo']['fields']['nomination_amount_c']['labelValue']='Nomination Amount';

 

 // created: 2021-12-07 18:15:12
$dictionary['Veta_Recibo']['fields']['department_visa_fee_company1_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['department_visa_fee_company1_c']['labelValue']='Department´s Visa Fee - 1';

 

 // created: 2022-02-21 21:36:00
$dictionary['Veta_Recibo']['fields']['veta_tiposvisa_id17_c']['inline_edit']=1;

 

 // created: 2022-02-21 21:36:39
$dictionary['Veta_Recibo']['fields']['veta_tiposvisa_id19_c']['inline_edit']=1;

 

 // created: 2021-10-23 05:14:09
$dictionary['Veta_Recibo']['fields']['company_aditional_services_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['company_aditional_services_c']['labelValue']='Company Aditional Services';

 

 // created: 2021-10-23 05:13:28
$dictionary['Veta_Recibo']['fields']['applicant_aditional_services_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['applicant_aditional_services_c']['labelValue']='Applicant Aditional Services';

 

 // created: 2021-12-07 18:10:14
$dictionary['Veta_Recibo']['fields']['department_visa_fee_2_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['department_visa_fee_2_c']['labelValue']='Department´s Visa Fee - 2';

 

 // created: 2022-02-02 20:53:07
$dictionary['Veta_Recibo']['fields']['additional_cost_company_label_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['additional_cost_company_label_c']['labelValue']='Additional Cost Company Label';

 

 // created: 2022-02-21 21:24:42
$dictionary['Veta_Recibo']['fields']['veta_tiposvisa_id12_c']['inline_edit']=1;

 

 // created: 2024-10-31 17:13:13
$dictionary['Veta_Recibo']['fields']['applicant_gst_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['applicant_gst_c']['labelValue']='Applicant GST';

 

 // created: 2022-02-03 12:55:58
$dictionary['Veta_Recibo']['fields']['company_department_fees_amount_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['company_department_fees_amount_c']['labelValue']='Company Department\'s Fees Amount';

 

 // created: 2021-12-07 18:16:55
$dictionary['Veta_Recibo']['fields']['department_visa_fee_company3_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['department_visa_fee_company3_c']['labelValue']='Department´s Visa Fee - 3';

 

 // created: 2024-09-16 16:58:38
$dictionary['Veta_Recibo']['fields']['tas_amount_c']['inline_edit']='1';
$dictionary['Veta_Recibo']['fields']['tas_amount_c']['labelValue']='TAS Amount';

 

 // created: 2021-12-07 18:16:55
$dictionary['Veta_Recibo']['fields']['veta_tiposvisa_id8_c']['inline_edit']=1;

 

 // created: 2024-09-16 17:00:06
$dictionary['Veta_Recibo']['fields']['roi_amount_c']['inline_edit']='1';
$dictionary['Veta_Recibo']['fields']['roi_amount_c']['labelValue']='ROI Amount';

 

 // created: 2022-02-21 21:28:42
$dictionary['Veta_Recibo']['fields']['applicant_skill_assessment_fee1_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['applicant_skill_assessment_fee1_c']['labelValue']='Applicant Skill Assessment Fee1';

 

 // created: 2021-12-07 18:12:49
$dictionary['Veta_Recibo']['fields']['veta_tiposvisa_id5_c']['inline_edit']=1;

 

 // created: 2021-12-07 18:17:28
$dictionary['Veta_Recibo']['fields']['veta_tiposvisa_id9_c']['inline_edit']=1;

 

 // created: 2021-12-07 18:16:18
$dictionary['Veta_Recibo']['fields']['department_visa_fee_company2_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['department_visa_fee_company2_c']['labelValue']='Department´s Visa Fee - 2';

 

 // created: 2022-02-03 18:15:38
$dictionary['Veta_Recibo']['fields']['department_visa_fee_6_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['department_visa_fee_6_c']['labelValue']='Department´s Visa Fee - 6';

 

 // created: 2022-02-07 19:19:26
$dictionary['Veta_Recibo']['fields']['doc_plantillas_id1_c']['inline_edit']=1;

 

 // created: 2022-01-14 15:11:33
$dictionary['Veta_Recibo']['fields']['sponsored_australian_citizen_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['sponsored_australian_citizen_c']['labelValue']='Sponsored by Australian citizen';

 

 // created: 2021-10-18 15:47:18
$dictionary['Veta_Recibo']['fields']['company_discount_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['company_discount_c']['labelValue']='Company Discount';

 

 // created: 2022-02-21 21:36:39
$dictionary['Veta_Recibo']['fields']['company_skill_assessment_fee4_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['company_skill_assessment_fee4_c']['labelValue']='Company Skill Assessment Fee4';

 

 // created: 2025-12-03 23:07:25
$dictionary['Veta_Recibo']['fields']['invoice_creation_date_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['invoice_creation_date_c']['labelValue']='Invoice Creation Date';

 

 // created: 2022-02-21 21:29:59
$dictionary['Veta_Recibo']['fields']['veta_tiposvisa_id15_c']['inline_edit']=1;

 

 // created: 2022-02-21 21:29:59
$dictionary['Veta_Recibo']['fields']['applicant_skill_assessment_fee4_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['applicant_skill_assessment_fee4_c']['labelValue']='Applicant Skill Assessment Fee4';

 

 // created: 2024-10-02 23:48:02
$dictionary['Veta_Recibo']['fields']['endorsement_amount_c']['inline_edit']='1';
$dictionary['Veta_Recibo']['fields']['endorsement_amount_c']['labelValue']='Endorsement Amount';

 

 // created: 2021-12-07 18:16:18
$dictionary['Veta_Recibo']['fields']['veta_tiposvisa_id7_c']['inline_edit']=1;

 

 // created: 2022-02-02 20:54:49
$dictionary['Veta_Recibo']['fields']['additional_cost_applicant_label_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['additional_cost_applicant_label_c']['labelValue']='Additional Cost Applicant Label';

 

 // created: 2022-02-03 17:58:07
$dictionary['Veta_Recibo']['fields']['additional_applicant_department_fees_label_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['additional_applicant_department_fees_label_c']['labelValue']='Additional Applicant Department Fees Label';

 

 // created: 2024-10-31 17:13:32
$dictionary['Veta_Recibo']['fields']['company_gst_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['company_gst_c']['labelValue']='Company GST';

 

 // created: 2021-12-07 18:11:32
$dictionary['Veta_Recibo']['fields']['veta_tiposvisa_id3_c']['inline_edit']=1;

 

 // created: 2022-02-02 20:51:23
$dictionary['Veta_Recibo']['fields']['additional_cost_applicant_amount_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['additional_cost_applicant_amount_c']['labelValue']='Additional Cost Applicant Amount';

 

 // created: 2022-02-03 12:44:05
$dictionary['Veta_Recibo']['fields']['applicant_department_fees_label_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['applicant_department_fees_label_c']['labelValue']='Applicant Department\'s Fees Label';

 

 // created: 2022-02-21 21:35:37
$dictionary['Veta_Recibo']['fields']['company_skill_assessment_fee1_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['company_skill_assessment_fee1_c']['labelValue']='Company Skill Assessment Fee1';

 

 // created: 2022-02-21 21:27:00
$dictionary['Veta_Recibo']['fields']['applicant_skill_assessment_fee3_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['applicant_skill_assessment_fee3_c']['labelValue']='Applicant Skill Assessment Fee3';

 

 // created: 2022-02-07 19:20:58
$dictionary['Veta_Recibo']['fields']['emailtemplate_id_c']['inline_edit']=1;

 

 // created: 2021-12-07 18:12:04
$dictionary['Veta_Recibo']['fields']['veta_tiposvisa_id4_c']['inline_edit']=1;

 

 // created: 2022-01-26 22:15:06
$dictionary['Veta_Recibo']['fields']['signature_url_c']['inline_edit']='1';
$dictionary['Veta_Recibo']['fields']['signature_url_c']['labelValue']='Signature URL';

 

 // created: 2022-02-07 19:21:34
$dictionary['Veta_Recibo']['fields']['company_email_template_c']['inline_edit']='1';
$dictionary['Veta_Recibo']['fields']['company_email_template_c']['labelValue']='Company Email Template';

 

 // created: 2024-09-16 16:58:18
$dictionary['Veta_Recibo']['fields']['state_nomination_amount_c']['inline_edit']='1';
$dictionary['Veta_Recibo']['fields']['state_nomination_amount_c']['labelValue']='State Nomination Amount';

 

 // created: 2022-02-03 18:15:25
$dictionary['Veta_Recibo']['fields']['department_visa_fee_7_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['department_visa_fee_7_c']['labelValue']='Department´s Visa Fee - 7';

 

 // created: 2022-02-21 21:27:00
$dictionary['Veta_Recibo']['fields']['veta_tiposvisa_id14_c']['inline_edit']=1;

 

 // created: 2022-07-19 22:18:51
$dictionary['Veta_Recibo']['fields']['invoice_due_date_c']['inline_edit']='1';
$dictionary['Veta_Recibo']['fields']['invoice_due_date_c']['labelValue']='Invoice Due Date';

 

 // created: 2022-02-13 22:27:31
$dictionary['Veta_Recibo']['fields']['custom_date_entered_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['custom_date_entered_c']['labelValue']='Custom Date Entered';

 

 // created: 2021-10-21 20:36:20
$dictionary['Veta_Recibo']['fields']['company_grand_total_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['company_grand_total_c']['labelValue']='Company Grand Total';

 

 // created: 2024-09-16 16:59:43
$dictionary['Veta_Recibo']['fields']['rcb_amount_c']['inline_edit']='1';
$dictionary['Veta_Recibo']['fields']['rcb_amount_c']['labelValue']='RCB Amount';

 

 // created: 2024-09-16 16:57:52
$dictionary['Veta_Recibo']['fields']['skill_assessment_amount_c']['inline_edit']='1';
$dictionary['Veta_Recibo']['fields']['skill_assessment_amount_c']['labelValue']='Skill Assessment Amount';

 

 // created: 2022-02-21 21:26:26
$dictionary['Veta_Recibo']['fields']['applicant_skill_assessment_fee2_c']['inline_edit']='';
$dictionary['Veta_Recibo']['fields']['applicant_skill_assessment_fee2_c']['labelValue']='Applicant Skill Assessment Fee2';

 
?>