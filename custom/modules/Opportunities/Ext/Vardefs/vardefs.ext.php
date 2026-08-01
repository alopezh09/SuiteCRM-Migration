<?php 
 //WARNING: The contents of this file are auto-generated


$dictionary['Opportunity']['fields']['soel_fecha_expiracion_visa'] = array(
    'name' => 'soel_fecha_expiracion_visa',
    'vname' => 'LBL_SOEL_FECHA_EXPIRACION_VISA',
    'type' => 'datetime',
    'source' => 'non-db',
    'enable_range_search' => true,
    'options' => 'date_range_search_dom',
);


// created: 2019-11-02 16:48:22
$dictionary["Opportunity"]["fields"]["contacts_opportunities_1"] = array (
  'name' => 'contacts_opportunities_1',
  'type' => 'link',
  'relationship' => 'contacts_opportunities_1',
  'source' => 'non-db',
  'module' => 'Contacts',
  'bean_name' => 'Contact',
  'vname' => 'LBL_CONTACTS_OPPORTUNITIES_1_FROM_CONTACTS_TITLE',
  'id_name' => 'contacts_opportunities_1contacts_ida',
);
$dictionary["Opportunity"]["fields"]["contacts_opportunities_1_name"] = array (
  'name' => 'contacts_opportunities_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_CONTACTS_OPPORTUNITIES_1_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'contacts_opportunities_1contacts_ida',
  'link' => 'contacts_opportunities_1',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Opportunity"]["fields"]["contacts_opportunities_1contacts_ida"] = array (
  'name' => 'contacts_opportunities_1contacts_ida',
  'type' => 'link',
  'relationship' => 'contacts_opportunities_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_CONTACTS_OPPORTUNITIES_1_FROM_OPPORTUNITIES_TITLE',
);


// created: 2019-12-07 16:06:28
$dictionary["Opportunity"]["fields"]["leads_opportunities_1"] = array (
  'name' => 'leads_opportunities_1',
  'type' => 'link',
  'relationship' => 'leads_opportunities_1',
  'source' => 'non-db',
  'module' => 'Leads',
  'bean_name' => 'Lead',
  'vname' => 'LBL_LEADS_OPPORTUNITIES_1_FROM_LEADS_TITLE',
  'id_name' => 'leads_opportunities_1leads_ida',
);
$dictionary["Opportunity"]["fields"]["leads_opportunities_1_name"] = array (
  'name' => 'leads_opportunities_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LEADS_OPPORTUNITIES_1_FROM_LEADS_TITLE',
  'save' => true,
  'id_name' => 'leads_opportunities_1leads_ida',
  'link' => 'leads_opportunities_1',
  'table' => 'leads',
  'module' => 'Leads',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Opportunity"]["fields"]["leads_opportunities_1leads_ida"] = array (
  'name' => 'leads_opportunities_1leads_ida',
  'type' => 'link',
  'relationship' => 'leads_opportunities_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LEADS_OPPORTUNITIES_1_FROM_OPPORTUNITIES_TITLE',
);


// created: 2019-11-02 17:11:43
$dictionary["Opportunity"]["fields"]["opportunities_cases_1"] = array (
  'name' => 'opportunities_cases_1',
  'type' => 'link',
  'relationship' => 'opportunities_cases_1',
  'source' => 'non-db',
  'module' => 'Cases',
  'bean_name' => 'Case',
  'side' => 'right',
  'vname' => 'LBL_OPPORTUNITIES_CASES_1_FROM_CASES_TITLE',
);


// created: 2020-10-14 00:58:37
$dictionary["Opportunity"]["fields"]["veta_serviciocliente_opportunities"] = array (
  'name' => 'veta_serviciocliente_opportunities',
  'type' => 'link',
  'relationship' => 'veta_serviciocliente_opportunities',
  'source' => 'non-db',
  'module' => 'Veta_ServicioCliente',
  'bean_name' => 'Veta_ServicioCliente',
  'side' => 'right',
  'vname' => 'LBL_VETA_SERVICIOCLIENTE_OPPORTUNITIES_FROM_VETA_SERVICIOCLIENTE_TITLE',
);


// created: 2021-11-17 16:06:29
$dictionary["Opportunity"]["fields"]["doc_docssolicitados_opportunities"] = array (
  'name' => 'doc_docssolicitados_opportunities',
  'type' => 'link',
  'relationship' => 'doc_docssolicitados_opportunities',
  'source' => 'non-db',
  'module' => 'Doc_DocsSolicitados',
  'bean_name' => 'Doc_DocsSolicitados',
  'side' => 'right',
  'vname' => 'LBL_DOC_DOCSSOLICITADOS_OPPORTUNITIES_FROM_DOC_DOCSSOLICITADOS_TITLE',
);



$dictionary['Opportunity']['fields']['soel_oficina'] = array(
    'name' => 'soel_oficina',
    'vname' => 'LBL_SOEL_OFICINA',
    'type' => 'enum',
    'source' => 'non-db',
    'function' => 'getOficinasComercial',
);

$dictionary['Opportunity']['fields']['soel_visto_bueno_comercial'] = array(
    'name' => 'soel_visto_bueno_comercial',
    'vname' => 'LBL_SOEL_VISTO_BUENO_COMERCIAL',
    'type' => 'bool',
    'source' => 'non-db',
    'default' => '0',
    'no_default' => false,
);

// created: 2020-10-14 00:58:31
$dictionary["Opportunity"]["fields"]["veta_pagocolegios_opportunities"] = array (
  'name' => 'veta_pagocolegios_opportunities',
  'type' => 'link',
  'relationship' => 'veta_pagocolegios_opportunities',
  'source' => 'non-db',
  'module' => 'Veta_PagoColegios',
  'bean_name' => 'Veta_PagoColegios',
  'side' => 'right',
  'vname' => 'LBL_VETA_PAGOCOLEGIOS_OPPORTUNITIES_FROM_VETA_PAGOCOLEGIOS_TITLE',
);


$dictionary['Opportunity']['fields']['soel_visto_bueno_visas'] = array(
    'name' => 'soel_visto_bueno_visas',
    'vname' => 'LBL_SOEL_VISTO_BUENO_VISAS',
    'type' => 'bool',
    'source' => 'non-db',
    'default' => '0',
    'no_default' => false,
);

$dictionary['Opportunity']['fields']['soel_docs_solicitados'] = array(
    'name' => 'soel_docs_solicitados',
    'vname' => 'LBL_SOEL_DOCS_SOLICITADOS',
    'type' => 'varchar',
    'source' => 'non-db',


);


$dictionary['Opportunity']['fields']['soel_docs_pendientes'] = array(
    'name' => 'soel_docs_pendientes',
    'vname' => 'LBL_SOEL_DOCS_PENDIENTES',
    'type' => 'varchar',
    'source' => 'non-db',


);

$dictionary['Opportunity']['fields']['soel_docs_cargados'] = array(
    'name' => 'soel_docs_cargados',
    'vname' => 'LBL_SOEL_DOCS_CARGADOS',
    'type' => 'varchar',
    'source' => 'non-db',


);

$dictionary['Opportunity']['fields']['soel_docs_aprobados'] = array(
    'name' => 'soel_docs_aprobados',
    'vname' => 'LBL_SOEL_DOCS_APROBADOS',
    'type' => 'varchar',
    'source' => 'non-db',


);


$dictionary['Opportunity']['fields']['soel_date_estudiante'] = array(
    'name' => 'soel_date_estudiante',
    'vname' => 'LBL_SOEL_DATE_ESTUDIANTE',
    'type' => 'datetime',
    'source' => 'non-db',
    'enable_range_search' => true,
    'options' => 'date_range_search_dom',
);


$dictionary['Opportunity']['fields']['soel_date_asesor'] = array(
    'name' => 'soel_date_asesor',
    'vname' => 'LBL_SOEL_DATE_ASESOR',
    'type' => 'datetime',
    'source' => 'non-db',
    'enable_range_search' => true,
    'options' => 'date_range_search_dom',
);

$dictionary['Opportunity']['fields']['virtual_note'] = array(
    'name' => 'virtual_note',
    'vname' => 'LBL_NEW_NOTES',
    'type' => 'text',
    'source' => 'non-db',
);

$dictionary['Opportunity']['fields']['virtual_all_notes'] =  array(
    'name' => 'virtual_all_notes',
    'vname' => 'LBL_VIRTUAL_NOTE',
    'type' => 'text',
    'source' => 'non-db',
);


// created: 2023-01-16 03:09:34
$dictionary["Opportunity"]["fields"]["auto_tickets_opportunities"] = array (
  'name' => 'auto_tickets_opportunities',
  'type' => 'link',
  'relationship' => 'auto_tickets_opportunities',
  'source' => 'non-db',
  'module' => 'Auto_Tickets',
  'bean_name' => 'Auto_Tickets',
  'side' => 'right',
  'vname' => 'LBL_AUTO_TICKETS_OPPORTUNITIES_FROM_AUTO_TICKETS_TITLE',
);


// created: 2021-11-17 16:06:29
$dictionary["Opportunity"]["fields"]["doc_documentos_adic_opportunities"] = array (
  'name' => 'doc_documentos_adic_opportunities',
  'type' => 'link',
  'relationship' => 'doc_documentos_adic_opportunities',
  'source' => 'non-db',
  'module' => 'Doc_Documentos_Adic',
  'bean_name' => 'Doc_Documentos_Adic',
  'vname' => 'LBL_DOC_DOCUMENTOS_ADIC_OPPORTUNITIES_FROM_DOC_DOCUMENTOS_ADIC_TITLE',
);


// created: 2021-10-13 15:46:19
$dictionary["Opportunity"]["fields"]["nvc_company_opportunities"] = array (
  'name' => 'nvc_company_opportunities',
  'type' => 'link',
  'relationship' => 'nvc_company_opportunities',
  'source' => 'non-db',
  'module' => 'NVC_Company',
  'bean_name' => false,
  'vname' => 'LBL_NVC_COMPANY_OPPORTUNITIES_FROM_NVC_COMPANY_TITLE',
  'id_name' => 'nvc_company_opportunitiesnvc_company_ida',
);
$dictionary["Opportunity"]["fields"]["nvc_company_opportunities_name"] = array (
  'name' => 'nvc_company_opportunities_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_NVC_COMPANY_OPPORTUNITIES_FROM_NVC_COMPANY_TITLE',
  'save' => true,
  'id_name' => 'nvc_company_opportunitiesnvc_company_ida',
  'link' => 'nvc_company_opportunities',
  'table' => 'nvc_company',
  'module' => 'NVC_Company',
  'rname' => 'name',
);
$dictionary["Opportunity"]["fields"]["nvc_company_opportunitiesnvc_company_ida"] = array (
  'name' => 'nvc_company_opportunitiesnvc_company_ida',
  'type' => 'link',
  'relationship' => 'nvc_company_opportunities',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_NVC_COMPANY_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
);


// created: 2020-10-14 00:58:38
$dictionary["Opportunity"]["fields"]["veta_visa_opportunities"] = array (
  'name' => 'veta_visa_opportunities',
  'type' => 'link',
  'relationship' => 'veta_visa_opportunities',
  'source' => 'non-db',
  'module' => 'Veta_Visa',
  'bean_name' => 'Veta_Visa',
  'side' => 'right',
  'vname' => 'LBL_VETA_VISA_OPPORTUNITIES_FROM_VETA_VISA_TITLE',
);


// created: 2021-10-13 17:15:55
$dictionary["Opportunity"]["fields"]["nvc_taxes_and_fees_config_opportunities"] = array (
  'name' => 'nvc_taxes_and_fees_config_opportunities',
  'type' => 'link',
  'relationship' => 'nvc_taxes_and_fees_config_opportunities',
  'source' => 'non-db',
  'module' => 'NVC_Taxes_and_Fees_Config',
  'bean_name' => 'NVC_Taxes_and_Fees_Config',
  'vname' => 'LBL_NVC_TAXES_AND_FEES_CONFIG_OPPORTUNITIES_FROM_NVC_TAXES_AND_FEES_CONFIG_TITLE',
  'id_name' => 'nvc_taxes_5b0d_config_ida',
);
$dictionary["Opportunity"]["fields"]["nvc_taxes_and_fees_config_opportunities_name"] = array (
  'name' => 'nvc_taxes_and_fees_config_opportunities_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_NVC_TAXES_AND_FEES_CONFIG_OPPORTUNITIES_FROM_NVC_TAXES_AND_FEES_CONFIG_TITLE',
  'save' => true,
  'id_name' => 'nvc_taxes_5b0d_config_ida',
  'link' => 'nvc_taxes_and_fees_config_opportunities',
  'table' => 'nvc_taxes_and_fees_config',
  'module' => 'NVC_Taxes_and_Fees_Config',
  'rname' => 'name',
);
$dictionary["Opportunity"]["fields"]["nvc_taxes_5b0d_config_ida"] = array (
  'name' => 'nvc_taxes_5b0d_config_ida',
  'type' => 'link',
  'relationship' => 'nvc_taxes_and_fees_config_opportunities',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_NVC_TAXES_AND_FEES_CONFIG_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
);


// created: 2020-10-14 00:58:20
$dictionary["Opportunity"]["fields"]["veta_aplicacion_opportunities"] = array (
  'name' => 'veta_aplicacion_opportunities',
  'type' => 'link',
  'relationship' => 'veta_aplicacion_opportunities',
  'source' => 'non-db',
  'module' => 'Veta_Aplicacion',
  'bean_name' => 'Veta_Aplicacion',
  'side' => 'right',
  'vname' => 'LBL_VETA_APLICACION_OPPORTUNITIES_FROM_VETA_APLICACION_TITLE',
);


$dictionary['Opportunity']['fields']['soel_fecha_viaje'] = array(
    'name' => 'soel_fecha_viaje',
    'vname' => 'LBL_SOEL_FECHA_VIAJE',
    'type' => 'datetime',
    'source' => 'non-db',
    'enable_range_search' => true,
    'options' => 'date_range_search_dom',
);


// created: 2020-10-14 00:58:34
$dictionary["Opportunity"]["fields"]["veta_recibo_opportunities"] = array (
  'name' => 'veta_recibo_opportunities',
  'type' => 'link',
  'relationship' => 'veta_recibo_opportunities',
  'source' => 'non-db',
  'module' => 'Veta_Recibo',
  'bean_name' => 'Veta_Recibo',
  'vname' => 'LBL_VETA_RECIBO_OPPORTUNITIES_FROM_VETA_RECIBO_TITLE',
  'id_name' => 'veta_recibo_opportunitiesveta_recibo_ida',
);
$dictionary["Opportunity"]["fields"]["veta_recibo_opportunities_name"] = array (
  'name' => 'veta_recibo_opportunities_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VETA_RECIBO_OPPORTUNITIES_FROM_VETA_RECIBO_TITLE',
  'save' => true,
  'id_name' => 'veta_recibo_opportunitiesveta_recibo_ida',
  'link' => 'veta_recibo_opportunities',
  'table' => 'veta_recibo',
  'module' => 'Veta_Recibo',
  'rname' => 'name',
);
$dictionary["Opportunity"]["fields"]["veta_recibo_opportunitiesveta_recibo_ida"] = array (
  'name' => 'veta_recibo_opportunitiesveta_recibo_ida',
  'type' => 'link',
  'relationship' => 'veta_recibo_opportunities',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_VETA_RECIBO_OPPORTUNITIES_FROM_VETA_RECIBO_TITLE',
);


// created: 2025-05-29 21:21:08
$dictionary["Opportunity"]["fields"]["zoom_calls_opportunities"] = array (
  'name' => 'zoom_calls_opportunities',
  'type' => 'link',
  'relationship' => 'zoom_calls_opportunities',
  'source' => 'non-db',
  'module' => 'Zoom_Calls',
  'bean_name' => 'Zoom_Calls',
  'vname' => 'LBL_ZOOM_CALLS_OPPORTUNITIES_FROM_ZOOM_CALLS_TITLE',
);


// created: 2020-10-14 00:58:22
$dictionary["Opportunity"]["fields"]["veta_coe_opportunities"] = array (
  'name' => 'veta_coe_opportunities',
  'type' => 'link',
  'relationship' => 'veta_coe_opportunities',
  'source' => 'non-db',
  'module' => 'Veta_COE',
  'bean_name' => 'Veta_COE',
  'side' => 'right',
  'vname' => 'LBL_VETA_COE_OPPORTUNITIES_FROM_VETA_COE_TITLE',
);


// created: 2021-10-13 17:47:39
$dictionary["Opportunity"]["fields"]["nvc_companies_opportunities_1"] = array (
  'name' => 'nvc_companies_opportunities_1',
  'type' => 'link',
  'relationship' => 'nvc_companies_opportunities_1',
  'source' => 'non-db',
  'module' => 'NVC_Companies',
  'bean_name' => 'NVC_Companies',
  'vname' => 'LBL_NVC_COMPANIES_OPPORTUNITIES_1_FROM_NVC_COMPANIES_TITLE',
  'id_name' => 'nvc_companies_opportunities_1nvc_companies_ida',
);
$dictionary["Opportunity"]["fields"]["nvc_companies_opportunities_1_name"] = array (
  'name' => 'nvc_companies_opportunities_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_NVC_COMPANIES_OPPORTUNITIES_1_FROM_NVC_COMPANIES_TITLE',
  'save' => true,
  'id_name' => 'nvc_companies_opportunities_1nvc_companies_ida',
  'link' => 'nvc_companies_opportunities_1',
  'table' => 'nvc_companies',
  'module' => 'NVC_Companies',
  'rname' => 'name',
);
$dictionary["Opportunity"]["fields"]["nvc_companies_opportunities_1nvc_companies_ida"] = array (
  'name' => 'nvc_companies_opportunities_1nvc_companies_ida',
  'type' => 'link',
  'relationship' => 'nvc_companies_opportunities_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_NVC_COMPANIES_OPPORTUNITIES_1_FROM_OPPORTUNITIES_TITLE',
);


// created: 2021-10-13 16:46:00
$dictionary["Opportunity"]["fields"]["nvc_companies_opportunities"] = array (
  'name' => 'nvc_companies_opportunities',
  'type' => 'link',
  'relationship' => 'nvc_companies_opportunities',
  'source' => 'non-db',
  'module' => 'NVC_Companies',
  'bean_name' => 'NVC_Companies',
  'vname' => 'LBL_NVC_COMPANIES_OPPORTUNITIES_FROM_NVC_COMPANIES_TITLE',
  'id_name' => 'nvc_companies_opportunitiesnvc_companies_ida',
);
$dictionary["Opportunity"]["fields"]["nvc_companies_opportunities_name"] = array (
  'name' => 'nvc_companies_opportunities_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_NVC_COMPANIES_OPPORTUNITIES_FROM_NVC_COMPANIES_TITLE',
  'save' => true,
  'id_name' => 'nvc_companies_opportunitiesnvc_companies_ida',
  'link' => 'nvc_companies_opportunities',
  'table' => 'nvc_companies',
  'module' => 'NVC_Companies',
  'rname' => 'name',
);
$dictionary["Opportunity"]["fields"]["nvc_companies_opportunitiesnvc_companies_ida"] = array (
  'name' => 'nvc_companies_opportunitiesnvc_companies_ida',
  'type' => 'link',
  'relationship' => 'nvc_companies_opportunities',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_NVC_COMPANIES_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
);


$dictionary['Opportunity']['fields']['soel_referido'] = array(
    'name' => 'soel_referido',
    'vname' => 'LBL_SOEL_REFERIDO',
    'type' => 'varchar',
    'source' => 'non-db',
    
);


// created: 2021-11-17 16:06:29
$dictionary["Opportunity"]["fields"]["doc_comentarios_opportunities"] = array (
  'name' => 'doc_comentarios_opportunities',
  'type' => 'link',
  'relationship' => 'doc_comentarios_opportunities',
  'source' => 'non-db',
  'module' => 'Doc_Comentarios',
  'bean_name' => 'Doc_Comentarios',
  'side' => 'right',
  'vname' => 'LBL_DOC_COMENTARIOS_OPPORTUNITIES_FROM_DOC_COMENTARIOS_TITLE',
);


// created: 2021-11-17 16:06:29
$dictionary["Opportunity"]["fields"]["doc_plantillas_opportunities"] = array (
  'name' => 'doc_plantillas_opportunities',
  'type' => 'link',
  'relationship' => 'doc_plantillas_opportunities',
  'source' => 'non-db',
  'module' => 'Doc_Plantillas',
  'bean_name' => 'Doc_Plantillas',
  'vname' => 'LBL_DOC_PLANTILLAS_OPPORTUNITIES_FROM_DOC_PLANTILLAS_TITLE',
);


 // created: 2022-04-27 16:17:42
$dictionary['Opportunity']['fields']['billingstatement_description_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['billingstatement_description_c']['labelValue']='Description billing statement';

 

 // created: 2021-10-19 20:01:21
$dictionary['Opportunity']['fields']['company_total_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['company_total_c']['labelValue']='Company total to pay';

 

 // created: 2022-04-27 16:19:00
$dictionary['Opportunity']['fields']['pagocolegios_description_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['pagocolegios_description_c']['labelValue']='Description school payments';

 

 // created: 2022-04-29 21:00:41
$dictionary['Opportunity']['fields']['third_dependent_dob_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['third_dependent_dob_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['third_dependent_dob_c']['labelValue']='3nd Dependent DOB';
$dictionary['Opportunity']['fields']['third_dependent_dob_c']['enable_range_search']='1';

 

 // created: 2019-12-05 07:55:52
$dictionary['Opportunity']['fields']['pendiente_pago_colegios_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['pendiente_pago_colegios_c']['labelValue']='Pendiente Pago Colegios';

 

 // created: 2022-09-23 21:06:45
$dictionary['Opportunity']['fields']['tas_expectation_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['tas_expectation_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['tas_expectation_date_c']['labelValue']='TAS Expectation date';
$dictionary['Opportunity']['fields']['tas_expectation_date_c']['enable_range_search']='1';

 

 // created: 2019-11-02 16:57:24
$dictionary['Opportunity']['fields']['estado_recoleccion_documento_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['estado_recoleccion_documento_c']['labelValue']='Estado recolección documentos';

 

 // created: 2023-03-17 23:32:21
$dictionary['Opportunity']['fields']['company_uploaded_docs_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['company_uploaded_docs_c']['labelValue']='Company Uploaded Docs';

 

 // created: 2020-03-16 15:31:02
$dictionary['Opportunity']['fields']['user_id2_c']['inline_edit']=1;

 

 // created: 2023-02-22 14:59:35
$dictionary['Opportunity']['fields']['sbs_expectation_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['sbs_expectation_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['sbs_expectation_date_c']['labelValue']='SBS Expectation Date';
$dictionary['Opportunity']['fields']['sbs_expectation_date_c']['enable_range_search']='1';

 

 // created: 2019-11-02 16:55:58
$dictionary['Opportunity']['fields']['comision_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['comision_c']['labelValue']='Comision';

 

 // created: 2021-10-12 20:29:51

 

 // created: 2021-12-14 21:40:26
$dictionary['Opportunity']['fields']['applicant_company_mmm_fees_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['applicant_company_mmm_fees_c']['labelValue']='Applicant/Company MMM Fees';

 

 // created: 2023-03-28 22:28:52
$dictionary['Opportunity']['fields']['rfi_3_ext_request_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['rfi_3_ext_request_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['rfi_3_ext_request_c']['labelValue']='RFI 3 Extension Request';
$dictionary['Opportunity']['fields']['rfi_3_ext_request_c']['enable_range_search']='1';

 

 // created: 2022-06-17 20:32:43
$dictionary['Opportunity']['fields']['virtual_labour_expectation_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['virtual_labour_expectation_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['virtual_labour_expectation_date_c']['labelValue']='Labour Expectation Date';
$dictionary['Opportunity']['fields']['virtual_labour_expectation_date_c']['enable_range_search']='1';

 

 // created: 2019-12-04 09:55:26
$dictionary['Opportunity']['fields']['estado_cartera_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['estado_cartera_c']['labelValue']='Estado Cartera';

 

 // created: 2022-07-26 23:19:47
$dictionary['Opportunity']['fields']['rfi_name_3_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['rfi_name_3_c']['labelValue']='RFI Name 3';

 

 // created: 2022-07-07 16:14:08
$dictionary['Opportunity']['fields']['third_quarter_mmm_fees_paid_company_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['third_quarter_mmm_fees_paid_company_c']['labelValue']='Third Quarter MMM Fees Paid Company';

 

 // created: 2022-06-21 23:49:15
$dictionary['Opportunity']['fields']['user_id3_c']['inline_edit']=1;

 

 // created: 2022-04-27 16:15:12
$dictionary['Opportunity']['fields']['requirement_description_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['requirement_description_c']['labelValue']='Description Requirement';

 

 // created: 2022-07-25 21:38:36
$dictionary['Opportunity']['fields']['fecha_response_req4_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['fecha_response_req4_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['fecha_response_req4_c']['labelValue']='RFI 4 response date';
$dictionary['Opportunity']['fields']['fecha_response_req4_c']['enable_range_search']='1';

 

 // created: 2022-05-06 20:24:43
$dictionary['Opportunity']['fields']['second_quarter_mmm_fees_paid_applicant_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['second_quarter_mmm_fees_paid_applicant_c']['labelValue']='Second Quarter MMM Fees Paid Applicant';

 

 // created: 2023-05-24 21:24:34
$dictionary['Opportunity']['fields']['lmt_url_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['lmt_url_c']['labelValue']='LMT Url';

 

 // created: 2022-02-27 20:18:54
$dictionary['Opportunity']['fields']['total_skill_assessmente_applicant_company_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['total_skill_assessmente_applicant_company_c']['labelValue']='Total Skill Assessmente Applicant Company';

 

 // created: 2023-08-25 06:09:23
$dictionary['Opportunity']['fields']['lead_visa_expiration_date_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['lead_visa_expiration_date_c']['labelValue']='Applicant Visa Expiration Date';

 

 // created: 2022-05-06 20:25:33
$dictionary['Opportunity']['fields']['second_quarter_mmm_fees_outstanding_amount_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['second_quarter_mmm_fees_outstanding_amount_c']['labelValue']='Second Quarter MMM Fees Outstanding Amount';

 

 // created: 2022-02-25 20:20:27
$dictionary['Opportunity']['fields']['applicant_company_outstanding_amount_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['applicant_company_outstanding_amount_c']['labelValue']='Applicant Company Outstanding Amount';

 

 // created: 2023-12-19 20:45:41
$dictionary['Opportunity']['fields']['fourth_dependent_dob_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['fourth_dependent_dob_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['fourth_dependent_dob_c']['labelValue']='4th Dependent DOB';
$dictionary['Opportunity']['fields']['fourth_dependent_dob_c']['enable_range_search']='1';

 

 // created: 2022-06-17 20:25:16
$dictionary['Opportunity']['fields']['virtual_sbs_expectation_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['virtual_sbs_expectation_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['virtual_sbs_expectation_date_c']['labelValue']='SBS Expectation Date';
$dictionary['Opportunity']['fields']['virtual_sbs_expectation_date_c']['enable_range_search']='1';

 

 // created: 2022-09-23 21:06:22
$dictionary['Opportunity']['fields']['tas_application_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['tas_application_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['tas_application_date_c']['labelValue']='TAS Application Date';
$dictionary['Opportunity']['fields']['tas_application_date_c']['enable_range_search']='1';

 

 // created: 2021-12-14 21:36:57
$dictionary['Opportunity']['fields']['applicant_company_outstanding_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['applicant_company_outstanding_c']['labelValue']='Applicant/Company Outstanding Amount';

 

 // created: 2023-09-04 21:34:30
$dictionary['Opportunity']['fields']['applicant_requested_docs_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['applicant_requested_docs_c']['labelValue']='Applicant Requested Docs';

 

 // created: 2024-10-02 22:57:21
$dictionary['Opportunity']['fields']['endorsement_approval_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['endorsement_approval_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['endorsement_approval_date_c']['labelValue']='Endorsement Approval Date';
$dictionary['Opportunity']['fields']['endorsement_approval_date_c']['enable_range_search']='1';

 

 // created: 2022-04-07 17:17:30
$dictionary['Opportunity']['fields']['dynamic_ac_mmm_paid_period_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['dynamic_ac_mmm_paid_period_c']['labelValue']='Dynamic AC MMM Paid Period';

 

 // created: 2021-12-22 21:16:46
$dictionary['Opportunity']['fields']['australian_citizen_partner_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['australian_citizen_partner_c']['labelValue']='Australian citizen partner';

 

 // created: 2022-09-23 21:10:23
$dictionary['Opportunity']['fields']['rcb_application_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['rcb_application_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['rcb_application_date_c']['labelValue']='RCB Application Date';
$dictionary['Opportunity']['fields']['rcb_application_date_c']['enable_range_search']='1';

 

 // created: 2023-07-31 01:53:12
$dictionary['Opportunity']['fields']['fecha_response_req2_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['fecha_response_req2_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['fecha_response_req2_c']['labelValue']='RFI 2 answered date';
$dictionary['Opportunity']['fields']['fecha_response_req2_c']['enable_range_search']='1';

 

 // created: 2021-10-19 20:00:59
$dictionary['Opportunity']['fields']['company_outstanding_amount_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['company_outstanding_amount_c']['labelValue']='Company Outstanding Amount';

 

 // created: 2023-03-30 20:46:19
$dictionary['Opportunity']['fields']['virtual_folder_url_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['virtual_folder_url_c']['labelValue']='Docs Folder URL';

 

 // created: 2019-11-02 17:07:51
$dictionary['Opportunity']['fields']['monto_dolares_australianos_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['monto_dolares_australianos_c']['labelValue']='Monto Dolares Australianos';

 

 // created: 2020-03-16 15:28:07
$dictionary['Opportunity']['fields']['user_id_c']['inline_edit']=1;

 

 // created: 2022-09-23 21:11:15
$dictionary['Opportunity']['fields']['roi_application_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['roi_application_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['roi_application_date_c']['labelValue']='ROI Application Date';
$dictionary['Opportunity']['fields']['roi_application_date_c']['enable_range_search']='1';

 

 // created: 2024-10-02 22:56:55
$dictionary['Opportunity']['fields']['labor_agreement_approval_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['labor_agreement_approval_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['labor_agreement_approval_date_c']['labelValue']='Labor Agreement Approval Date';
$dictionary['Opportunity']['fields']['labor_agreement_approval_date_c']['enable_range_search']='1';

 

 // created: 2023-05-24 21:23:36
$dictionary['Opportunity']['fields']['lmt_start_date_3_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['lmt_start_date_3_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['lmt_start_date_3_c']['labelValue']='LMT Start Date 3';
$dictionary['Opportunity']['fields']['lmt_start_date_3_c']['enable_range_search']='1';

 

 // created: 2022-08-24 22:14:37
$dictionary['Opportunity']['fields']['company_sbs_application_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['company_sbs_application_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['company_sbs_application_date_c']['labelValue']='Company SBS Application Date';
$dictionary['Opportunity']['fields']['company_sbs_application_date_c']['enable_range_search']='1';

 

 // created: 2024-02-13 21:52:57
$dictionary['Opportunity']['fields']['doc_id3_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['doc_id3_c']['labelValue']='DOC ID3';

 

 // created: 2021-12-22 21:17:27
$dictionary['Opportunity']['fields']['currently_living_together_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['currently_living_together_c']['labelValue']='Currently living together';

 

 // created: 2022-06-24 21:18:26
$dictionary['Opportunity']['fields']['fecha_proximo_contacto_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['fecha_proximo_contacto_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['fecha_proximo_contacto_c']['labelValue']='Next Contact Date Applicant';
$dictionary['Opportunity']['fields']['fecha_proximo_contacto_c']['enable_range_search']='1';

 

 // created: 2020-01-23 13:01:04
$dictionary['Opportunity']['fields']['fecha_ultimo_contacto_new_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['fecha_ultimo_contacto_new_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['fecha_ultimo_contacto_new_c']['labelValue']='Fecha Ultimo Contacto.';
$dictionary['Opportunity']['fields']['fecha_ultimo_contacto_new_c']['enable_range_search']='1';

 

 // created: 2023-07-18 14:50:16
$dictionary['Opportunity']['fields']['user_id4_c']['inline_edit']=1;

 

 // created: 2022-02-24 19:51:13
$dictionary['Opportunity']['fields']['company_first_payment_date_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['company_first_payment_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['company_first_payment_date_c']['labelValue']='Company First Payment Date';
$dictionary['Opportunity']['fields']['company_first_payment_date_c']['enable_range_search']='1';

 

 // created: 2022-05-11 22:39:43
$dictionary['Opportunity']['fields']['virtual_visa_expire_1st_dependent_date_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['virtual_visa_expire_1st_dependent_date_c']['labelValue']='First Dependent Visa Expiry Date';

 

 // created: 2021-10-19 19:59:28
$dictionary['Opportunity']['fields']['company_dept_visa_fee_base_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['company_dept_visa_fee_base_c']['labelValue']='Company Department Visa Fee Base application charge';

 

 // created: 2022-05-11 22:40:44
$dictionary['Opportunity']['fields']['virtual_visa_expire_2nd_dependent_date_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['virtual_visa_expire_2nd_dependent_date_c']['labelValue']='Second Dependent Visa Expiry Date';

 

 // created: 2019-12-11 13:04:59
$dictionary['Opportunity']['fields']['recibo_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['recibo_c']['labelValue']='Recibo';

 

 // created: 2019-10-09 10:48:07
$dictionary['Opportunity']['fields']['jjwg_maps_address_c']['inline_edit']=1;

 

 // created: 2019-12-05 07:29:58
$dictionary['Opportunity']['fields']['estado_servicio_al_cliente_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['estado_servicio_al_cliente_c']['labelValue']='Estado Servicio al Cliente';

 

 // created: 2019-12-07 15:56:54
$dictionary['Opportunity']['fields']['estado_pago_institucion_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['estado_pago_institucion_c']['labelValue']='Estado Pago Institución';

 

 // created: 2022-02-27 20:07:23
$dictionary['Opportunity']['fields']['total_skill_assessmente_applicant_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['total_skill_assessmente_applicant_c']['labelValue']='Total Skill Assessmente Applicant';

 

 // created: 2022-02-27 20:08:24
$dictionary['Opportunity']['fields']['total_skill_assessmente_company_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['total_skill_assessmente_company_c']['labelValue']='Total Skill Assessmente Company';

 

 // created: 2022-02-27 21:01:09
$dictionary['Opportunity']['fields']['applicant_company_department_credit_card_surcharge_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['applicant_company_department_credit_card_surcharge_c']['labelValue']='Applicant Company Department Credit Card Surcharge';

 

 // created: 2023-07-31 01:52:25
$dictionary['Opportunity']['fields']['fecha_response_req1_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['fecha_response_req1_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['fecha_response_req1_c']['labelValue']='RFI 1 answered date';
$dictionary['Opportunity']['fields']['fecha_response_req1_c']['enable_range_search']='1';

 

 // created: 2024-09-25 21:31:45
$dictionary['Opportunity']['fields']['time_to_checklist_sent_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['time_to_checklist_sent_c']['labelValue']='Time to checklist sent';

 

 // created: 2022-11-23 16:45:58
$dictionary['Opportunity']['fields']['eoi_3_expectation_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['eoi_3_expectation_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['eoi_3_expectation_date_c']['labelValue']='EOI 3 Expectation Date';
$dictionary['Opportunity']['fields']['eoi_3_expectation_date_c']['enable_range_search']='1';

 

 // created: 2022-04-27 16:15:56
$dictionary['Opportunity']['fields']['customerservice_description_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['customerservice_description_c']['labelValue']='Description customer service';

 

 // created: 2022-07-07 16:10:58
$dictionary['Opportunity']['fields']['third_quarter_mmm_fees_outstanding_amount_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['third_quarter_mmm_fees_outstanding_amount_c']['labelValue']='Third Quarter MMM Fees Outstanding Amount';

 

 // created: 2022-05-03 16:01:20
$dictionary['Opportunity']['fields']['virtual_lead_email_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['virtual_lead_email_c']['labelValue']='Virtual Lead Email';

 

 // created: 2023-07-18 14:50:16
$dictionary['Opportunity']['fields']['reviewed_and_approved_by_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['reviewed_and_approved_by_c']['labelValue']='Reviewed And Approved By';

 

 // created: 2022-07-25 21:31:44
$dictionary['Opportunity']['fields']['fecha_req4_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['fecha_req4_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['fecha_req4_c']['labelValue']='RFI 4 Date';
$dictionary['Opportunity']['fields']['fecha_req4_c']['enable_range_search']='1';

 

 // created: 2023-03-30 22:27:52
$dictionary['Opportunity']['fields']['visa_trn_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['visa_trn_c']['labelValue']='Visa TRN';

 

 // created: 2023-03-28 22:24:13
$dictionary['Opportunity']['fields']['rfi_1_ext_request_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['rfi_1_ext_request_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['rfi_1_ext_request_c']['labelValue']='RFI 1 Extension Request';
$dictionary['Opportunity']['fields']['rfi_1_ext_request_c']['enable_range_search']='1';

 

 // created: 2021-10-12 20:30:22

 

 // created: 2020-01-26 13:14:12
$dictionary['Opportunity']['fields']['estado_admisiones_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['estado_admisiones_c']['labelValue']='Estado Admisiones';

 

 // created: 2023-03-17 22:10:14
$dictionary['Opportunity']['fields']['case_manager_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['case_manager_c']['labelValue']='Case Manager';

 

 // created: 2022-04-28 21:14:43
$dictionary['Opportunity']['fields']['fecha_exp_req1_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['fecha_exp_req1_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['fecha_exp_req1_c']['labelValue']='Requeriment 1 expiry date';
$dictionary['Opportunity']['fields']['fecha_exp_req1_c']['enable_range_search']='1';

 

 // created: 2022-02-26 00:46:04
$dictionary['Opportunity']['fields']['primer_pago_compania_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['primer_pago_compania_c']['labelValue']='primer pago compania';

 

 // created: 2022-04-28 21:14:55
$dictionary['Opportunity']['fields']['fecha_exp_req3_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['fecha_exp_req3_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['fecha_exp_req3_c']['labelValue']='Requeriment 3 expiry date';
$dictionary['Opportunity']['fields']['fecha_exp_req3_c']['enable_range_search']='1';

 

 // created: 2021-10-12 20:29:44

 

 // created: 2019-10-09 10:48:06
$dictionary['Opportunity']['fields']['jjwg_maps_geocode_status_c']['inline_edit']=1;

 

 // created: 2022-09-23 21:12:35
$dictionary['Opportunity']['fields']['nomination_app_expectation_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['nomination_app_expectation_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['nomination_app_expectation_date_c']['labelValue']='Nomination APP expectation Date';
$dictionary['Opportunity']['fields']['nomination_app_expectation_date_c']['enable_range_search']='1';

 

 // created: 2022-11-23 16:48:23
$dictionary['Opportunity']['fields']['eoi_3_appoval_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['eoi_3_appoval_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['eoi_3_appoval_date_c']['labelValue']='EOI 3 Appoval Date';
$dictionary['Opportunity']['fields']['eoi_3_appoval_date_c']['enable_range_search']='1';

 

 // created: 2019-12-27 14:03:26
$dictionary['Opportunity']['fields']['description']['audited']=true;
$dictionary['Opportunity']['fields']['description']['inline_edit']='';
$dictionary['Opportunity']['fields']['description']['comments']='Full text of the note';
$dictionary['Opportunity']['fields']['description']['merge_filter']='disabled';

 

 // created: 2023-12-19 20:46:45
$dictionary['Opportunity']['fields']['virtual_visa_expire_4th_dependent_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['virtual_visa_expire_4th_dependent_date_c']['labelValue']='Virtual Visa Expire 4th Dependent Date';

 

 // created: 2025-10-17 21:32:21
$dictionary['Opportunity']['fields']['visa_expiration_text_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['visa_expiration_text_c']['labelValue']='Visa Expiration TEXT';

 

 // created: 2023-03-29 19:31:36
$dictionary['Opportunity']['fields']['asignado_visas_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['asignado_visas_c']['labelValue']='Assigned Visas';

 

 // created: 2022-04-29 21:01:32
$dictionary['Opportunity']['fields']['first_dependent_name_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['first_dependent_name_c']['labelValue']='1nd Dependent Name';

 

 // created: 2023-01-31 00:00:49
$dictionary['Opportunity']['fields']['state_nomination_expectation_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['state_nomination_expectation_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['state_nomination_expectation_date_c']['labelValue']='State Nomination Expectation Date';
$dictionary['Opportunity']['fields']['state_nomination_expectation_date_c']['enable_range_search']='1';

 

 // created: 2022-05-06 20:23:06
$dictionary['Opportunity']['fields']['second_quarter_mmm_fees_paid_company_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['second_quarter_mmm_fees_paid_company_c']['labelValue']='Second Quarter MMM Fees Paid Company';

 

 // created: 2022-05-06 20:23:54
$dictionary['Opportunity']['fields']['second_quarter_mmm_fees_paid_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['second_quarter_mmm_fees_paid_c']['labelValue']='Second Quarter MMM Fees Paid';

 

 // created: 2022-02-28 19:58:11
$dictionary['Opportunity']['fields']['applicant_company_mmm_fees_outstanding_amount_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['applicant_company_mmm_fees_outstanding_amount_c']['labelValue']='Applicant Company MMM Fees Outstanding Amount';

 

 // created: 2022-09-23 21:12:07
$dictionary['Opportunity']['fields']['recruitment_expectation_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['recruitment_expectation_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['recruitment_expectation_date_c']['labelValue']='Recruitment expectation Date';
$dictionary['Opportunity']['fields']['recruitment_expectation_date_c']['enable_range_search']='1';

 

 // created: 2022-09-23 21:05:59
$dictionary['Opportunity']['fields']['skill_assessment_app_expectation_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['skill_assessment_app_expectation_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['skill_assessment_app_expectation_date_c']['labelValue']='Skill Assessment APP expectation Date';
$dictionary['Opportunity']['fields']['skill_assessment_app_expectation_date_c']['enable_range_search']='1';

 

 // created: 2019-11-02 17:03:35
$dictionary['Opportunity']['fields']['fecha_firma_contrato_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['fecha_firma_contrato_c']['labelValue']='Fecha Firma Contrato';

 

 // created: 2021-10-19 19:58:09
$dictionary['Opportunity']['fields']['company_deposits_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['company_deposits_c']['labelValue']='Company Deposits';

 

 // created: 2023-05-24 21:23:25
$dictionary['Opportunity']['fields']['lmt_start_date_2_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['lmt_start_date_2_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['lmt_start_date_2_c']['labelValue']='LMT Start Date 2';
$dictionary['Opportunity']['fields']['lmt_start_date_2_c']['enable_range_search']='1';

 

 // created: 2022-04-28 21:14:26
$dictionary['Opportunity']['fields']['fecha_exp_req2_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['fecha_exp_req2_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['fecha_exp_req2_c']['labelValue']='Requeriment 2 expiry date';
$dictionary['Opportunity']['fields']['fecha_exp_req2_c']['enable_range_search']='1';

 

 // created: 2019-11-02 16:58:17
$dictionary['Opportunity']['fields']['fecha_apertura_cuenta_bancar_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['fecha_apertura_cuenta_bancar_c']['labelValue']='Fecha Apertura Cuenta Bancaria';

 

 // created: 2023-03-28 22:27:23
$dictionary['Opportunity']['fields']['rfi_5_ext_request_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['rfi_5_ext_request_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['rfi_5_ext_request_c']['labelValue']='RFI 5 Extension Request';
$dictionary['Opportunity']['fields']['rfi_5_ext_request_c']['enable_range_search']='1';

 

 // created: 2019-11-02 17:05:05
$dictionary['Opportunity']['fields']['fecha_solicitud_pago_contado_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['fecha_solicitud_pago_contado_c']['labelValue']='Fecha de Solicitud de Pago al Contador';

 

 // created: 2022-02-25 22:22:55
$dictionary['Opportunity']['fields']['company_first_deposit_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['company_first_deposit_c']['labelValue']='Company First Payment Amount';

 

 // created: 2023-03-30 22:16:49
$dictionary['Opportunity']['fields']['trn_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['trn_c']['labelValue']='TRN';

 

 // created: 2022-06-17 20:26:03
$dictionary['Opportunity']['fields']['virtual_sbs_approval_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['virtual_sbs_approval_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['virtual_sbs_approval_date_c']['labelValue']='SBS Approval Date';
$dictionary['Opportunity']['fields']['virtual_sbs_approval_date_c']['enable_range_search']='1';

 

 // created: 2023-02-22 14:58:58
$dictionary['Opportunity']['fields']['sbs_application_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['sbs_application_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['sbs_application_date_c']['labelValue']='SBS application date';
$dictionary['Opportunity']['fields']['sbs_application_date_c']['enable_range_search']='1';

 

 // created: 2022-05-05 17:25:49
$dictionary['Opportunity']['fields']['prueba_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['prueba_c']['labelValue']='prueba';

 

 // created: 2022-04-29 21:07:00
$dictionary['Opportunity']['fields']['visa_expire_secondary_applic_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['visa_expire_secondary_applic_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['visa_expire_secondary_applic_c']['labelValue']='Visa expire Secondary Applicant date';
$dictionary['Opportunity']['fields']['visa_expire_secondary_applic_c']['enable_range_search']='1';

 

 // created: 2022-06-24 21:19:18
$dictionary['Opportunity']['fields']['next_contact_date_company_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['next_contact_date_company_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['next_contact_date_company_c']['labelValue']='Next Contact Date Company';
$dictionary['Opportunity']['fields']['next_contact_date_company_c']['enable_range_search']='1';

 

 // created: 2022-02-27 21:02:13
$dictionary['Opportunity']['fields']['applicant_company_departments_visa_fee_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['applicant_company_departments_visa_fee_c']['labelValue']='Applicant Company Departments Visa Fee';

 

 // created: 2021-10-19 20:01:42
$dictionary['Opportunity']['fields']['company_total_without_gst_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['company_total_without_gst_c']['labelValue']='Total Company MMM Fee Without GST';

 

 // created: 2021-12-14 21:35:56
$dictionary['Opportunity']['fields']['applicant_company_mmm_fees_without_gst_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['applicant_company_mmm_fees_without_gst_c']['labelValue']='Applicant/Company MMM Fees Without GST';

 

 // created: 2024-10-02 22:58:53
$dictionary['Opportunity']['fields']['endorsement_expectation_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['endorsement_expectation_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['endorsement_expectation_date_c']['labelValue']='Endorsement Expectation Date';
$dictionary['Opportunity']['fields']['endorsement_expectation_date_c']['enable_range_search']='1';

 

 // created: 2023-02-21 18:38:36
$dictionary['Opportunity']['fields']['process_stages_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['process_stages_c']['labelValue']='Process Stages';

 

 // created: 2022-09-23 21:10:09
$dictionary['Opportunity']['fields']['eoi_appoval_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['eoi_appoval_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['eoi_appoval_date_c']['labelValue']='EOI Appoval Date';
$dictionary['Opportunity']['fields']['eoi_appoval_date_c']['enable_range_search']='1';

 

 // created: 2021-05-11 13:51:03
$dictionary['Opportunity']['fields']['fecha_aplicacion_visa_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['fecha_aplicacion_visa_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['fecha_aplicacion_visa_c']['labelValue']='Visa Application Date';
$dictionary['Opportunity']['fields']['fecha_aplicacion_visa_c']['enable_range_search']='1';

 

 // created: 2020-01-23 13:05:03
$dictionary['Opportunity']['fields']['fecha_expiracion_visa_new_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['fecha_expiracion_visa_new_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['fecha_expiracion_visa_new_c']['labelValue']='Fecha Expiracion Visa.';
$dictionary['Opportunity']['fields']['fecha_expiracion_visa_new_c']['enable_range_search']='1';

 

 // created: 2021-10-23 05:26:29
$dictionary['Opportunity']['fields']['company_aditional_services_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['company_aditional_services_c']['labelValue']='Company Aditional Services';

 

 // created: 2022-09-23 21:12:49
$dictionary['Opportunity']['fields']['nomination_app_date_visa_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['nomination_app_date_visa_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['nomination_app_date_visa_c']['labelValue']='Nomination APP Date';
$dictionary['Opportunity']['fields']['nomination_app_date_visa_c']['enable_range_search']='1';

 

 // created: 2022-04-27 16:14:15
$dictionary['Opportunity']['fields']['budget_description_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['budget_description_c']['labelValue']='Description Budget';

 

 // created: 2021-10-23 05:25:45
$dictionary['Opportunity']['fields']['applicant_aditional_services_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['applicant_aditional_services_c']['labelValue']='Applicant Aditional Services';

 

 // created: 2023-01-31 00:18:39
$dictionary['Opportunity']['fields']['state_nomination_approval_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['state_nomination_approval_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['state_nomination_approval_date_c']['labelValue']='State Nomination Approval Date';
$dictionary['Opportunity']['fields']['state_nomination_approval_date_c']['enable_range_search']='1';

 

 // created: 2022-08-08 22:30:38
$dictionary['Opportunity']['fields']['docs_portal_url_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['docs_portal_url_c']['labelValue']='Docs Portal URL';

 

 // created: 2023-05-24 21:24:14
$dictionary['Opportunity']['fields']['lmt_expectation_date_3_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['lmt_expectation_date_3_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['lmt_expectation_date_3_c']['labelValue']='LMT Expectation Date 3';
$dictionary['Opportunity']['fields']['lmt_expectation_date_3_c']['enable_range_search']='1';

 

 // created: 2022-09-23 21:13:09
$dictionary['Opportunity']['fields']['lmt_start_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['lmt_start_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['lmt_start_date_c']['labelValue']='LMT Start Date';
$dictionary['Opportunity']['fields']['lmt_start_date_c']['enable_range_search']='1';

 

 // created: 2024-10-02 22:55:16
$dictionary['Opportunity']['fields']['labor_agreement_application_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['labor_agreement_application_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['labor_agreement_application_date_c']['labelValue']='Labor Agreement Application Date';
$dictionary['Opportunity']['fields']['labor_agreement_application_date_c']['enable_range_search']='1';

 

 // created: 2022-09-23 21:02:51
$dictionary['Opportunity']['fields']['lmt_expectation_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['lmt_expectation_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['lmt_expectation_date_c']['labelValue']='LMT Expectation date';
$dictionary['Opportunity']['fields']['lmt_expectation_date_c']['enable_range_search']='1';

 

 // created: 2022-05-03 16:01:39
$dictionary['Opportunity']['fields']['virtual_lead_phone_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['virtual_lead_phone_c']['labelValue']='Virtual Lead Phone';

 

 // created: 2023-09-04 21:34:56
$dictionary['Opportunity']['fields']['applicant_pending_docs_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['applicant_pending_docs_c']['options']='numeric_range_search_dom';
$dictionary['Opportunity']['fields']['applicant_pending_docs_c']['labelValue']='Applicant Pending Docs';
$dictionary['Opportunity']['fields']['applicant_pending_docs_c']['enable_range_search']='1';

 

 // created: 2024-11-26 00:16:12
$dictionary['Opportunity']['fields']['estado_semaforizacion_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['estado_semaforizacion_c']['labelValue']='Follow-up status';

 

 // created: 2022-07-26 23:19:12
$dictionary['Opportunity']['fields']['rfi_name_1_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['rfi_name_1_c']['labelValue']='RFI Name 1';

 

 // created: 2023-03-28 22:25:08
$dictionary['Opportunity']['fields']['rfi_2_ext_request_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['rfi_2_ext_request_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['rfi_2_ext_request_c']['labelValue']='RFI 2 Extension Request';
$dictionary['Opportunity']['fields']['rfi_2_ext_request_c']['enable_range_search']='1';

 

 // created: 2022-02-27 20:55:58
$dictionary['Opportunity']['fields']['applicant_company_gst_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['applicant_company_gst_c']['labelValue']='Applicant Company GST';

 

 // created: 2020-01-23 15:02:34
$dictionary['Opportunity']['fields']['fecha_expiracion_visa_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['fecha_expiracion_visa_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['fecha_expiracion_visa_c']['labelValue']='Fecha Expiracion Visa';
$dictionary['Opportunity']['fields']['fecha_expiracion_visa_c']['enable_range_search']='1';

 

 // created: 2022-07-07 16:12:03
$dictionary['Opportunity']['fields']['third_quarter_mmm_fees_paid_applicant_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['third_quarter_mmm_fees_paid_applicant_c']['labelValue']='Third Quarter MMM Fees Paid Applicant';

 

 // created: 2020-01-23 13:03:06
$dictionary['Opportunity']['fields']['fecha_proximo_contacto_new_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['fecha_proximo_contacto_new_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['fecha_proximo_contacto_new_c']['labelValue']='Fecha Proximo Contacto.';
$dictionary['Opportunity']['fields']['fecha_proximo_contacto_new_c']['enable_range_search']='1';

 

 // created: 2023-07-18 14:49:00
$dictionary['Opportunity']['fields']['reviewed_and_approved_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['reviewed_and_approved_c']['labelValue']='Reviewed And Approved';

 

 // created: 2022-09-23 21:10:43
$dictionary['Opportunity']['fields']['rcb_expectation_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['rcb_expectation_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['rcb_expectation_date_c']['labelValue']='RCB Expectation Date';
$dictionary['Opportunity']['fields']['rcb_expectation_date_c']['enable_range_search']='1';

 

 // created: 2024-05-06 19:54:31
$dictionary['Opportunity']['fields']['lmt_finished_3_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['lmt_finished_3_c']['labelValue']='LMT Finished 3';

 

 // created: 2022-07-25 21:59:54
$dictionary['Opportunity']['fields']['rfi_1_types_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['rfi_1_types_c']['labelValue']='RFI 1 types';

 

 // created: 2022-02-25 20:19:06
$dictionary['Opportunity']['fields']['applicant_company_total_paid_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['applicant_company_total_paid_c']['labelValue']='Applicant Company Total Paid';

 

 // created: 2022-07-25 21:39:02
$dictionary['Opportunity']['fields']['fecha_response_req5_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['fecha_response_req5_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['fecha_response_req5_c']['labelValue']='RFI 5 response date';
$dictionary['Opportunity']['fields']['fecha_response_req5_c']['enable_range_search']='1';

 

 // created: 2024-09-12 23:33:03
$dictionary['Opportunity']['fields']['time_to_visa_applied_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['time_to_visa_applied_c']['labelValue']='Time to visa applied';

 

 // created: 2023-03-24 20:24:20
$dictionary['Opportunity']['fields']['sbs_process_stage_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['sbs_process_stage_c']['labelValue']='SBS';

 

 // created: 2023-03-24 20:24:42
$dictionary['Opportunity']['fields']['roi_process_stage_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['roi_process_stage_c']['labelValue']='ROI';

 

 // created: 2022-02-28 22:34:28
$dictionary['Opportunity']['fields']['applicant_company_total_without_gst_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['applicant_company_total_without_gst_c']['labelValue']='Applicant Company Total MMM Fees Without GST';

 

 // created: 2023-07-31 01:54:15
$dictionary['Opportunity']['fields']['fecha_response_req3_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['fecha_response_req3_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['fecha_response_req3_c']['labelValue']='RFI 3 answered date';
$dictionary['Opportunity']['fields']['fecha_response_req3_c']['enable_range_search']='1';

 

 // created: 2022-09-23 21:04:44
$dictionary['Opportunity']['fields']['skill_assessment_app_date_visa_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['skill_assessment_app_date_visa_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['skill_assessment_app_date_visa_c']['labelValue']='Skill Assessment APP Date';
$dictionary['Opportunity']['fields']['skill_assessment_app_date_visa_c']['enable_range_search']='1';

 

 // created: 2023-05-24 21:25:11
$dictionary['Opportunity']['fields']['lmt_url_3_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['lmt_url_3_c']['labelValue']='LMT Url 3';

 

 // created: 2022-07-26 23:20:02
$dictionary['Opportunity']['fields']['rfi_name_4_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['rfi_name_4_c']['labelValue']='RFI Name 4';

 

 // created: 2022-04-08 21:00:54
$dictionary['Opportunity']['fields']['first_quarter_mmm_fees_paid_applicant_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['first_quarter_mmm_fees_paid_applicant_c']['labelValue']='First Quarter MMM Fees Paid Applicant';

 

 // created: 2019-12-11 13:04:59
$dictionary['Opportunity']['fields']['veta_recibo_id_c']['inline_edit']=1;

 

 // created: 2023-03-17 23:32:43
$dictionary['Opportunity']['fields']['company_pending_docs_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['company_pending_docs_c']['labelValue']='Company Pending Docs';

 

 // created: 2022-12-16 19:49:56
$dictionary['Opportunity']['fields']['company_checklist_sent_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['company_checklist_sent_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['company_checklist_sent_date_c']['labelValue']='Company Checklist Sent Date';
$dictionary['Opportunity']['fields']['company_checklist_sent_date_c']['enable_range_search']='1';

 

 // created: 2024-09-25 21:07:38
$dictionary['Opportunity']['fields']['time_to_visa_granted_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['time_to_visa_granted_c']['labelValue']='Time to visa granted';

 

 // created: 2023-03-24 20:26:18
$dictionary['Opportunity']['fields']['eoi_process_stage_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['eoi_process_stage_c']['labelValue']='EOI';

 

 // created: 2022-07-25 22:01:30
$dictionary['Opportunity']['fields']['rfi_5_types_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['rfi_5_types_c']['labelValue']='RFI 5 types';

 

 // created: 2022-09-23 21:11:46
$dictionary['Opportunity']['fields']['roi_approval_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['roi_approval_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['roi_approval_date_c']['labelValue']='ROI Approval Date';
$dictionary['Opportunity']['fields']['roi_approval_date_c']['enable_range_search']='1';

 

 // created: 2024-10-02 23:01:17
$dictionary['Opportunity']['fields']['endorsement_process_stage_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['endorsement_process_stage_c']['labelValue']='Endorsement';

 

 // created: 2022-05-26 17:00:11
$dictionary['Opportunity']['fields']['uploaded_documents_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['uploaded_documents_c']['labelValue']='Uploaded Documents';

 

 // created: 2024-04-24 20:25:19
$dictionary['Opportunity']['fields']['lmt_finished_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['lmt_finished_c']['labelValue']='LMT Finished';

 

 // created: 2022-09-23 21:07:02
$dictionary['Opportunity']['fields']['tas_approval_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['tas_approval_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['tas_approval_date_c']['labelValue']='TAS Approval Date';
$dictionary['Opportunity']['fields']['tas_approval_date_c']['enable_range_search']='1';

 

 // created: 2020-03-16 15:28:07
$dictionary['Opportunity']['fields']['asignado_aplicacion_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['asignado_aplicacion_c']['labelValue']='Asignado Aplicacion';

 

 // created: 2019-11-02 17:10:03
$dictionary['Opportunity']['fields']['saldo_pendiente_pago_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['saldo_pendiente_pago_c']['labelValue']='Saldo Pendiente de Pago';

 

 // created: 2022-07-26 23:20:18
$dictionary['Opportunity']['fields']['rfi_name_5_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['rfi_name_5_c']['labelValue']='RFI Name 5';

 

 // created: 2022-09-23 21:11:30
$dictionary['Opportunity']['fields']['roi_expectation_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['roi_expectation_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['roi_expectation_date_c']['labelValue']='ROI Expectation Date';
$dictionary['Opportunity']['fields']['roi_expectation_date_c']['enable_range_search']='1';

 

 // created: 2022-03-10 04:15:37
$dictionary['Opportunity']['fields']['company_leap_id_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['company_leap_id_c']['labelValue']='Company Leap id';

 

 // created: 2023-09-04 21:35:20
$dictionary['Opportunity']['fields']['applicant_uploaded_docs_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['applicant_uploaded_docs_c']['options']='numeric_range_search_dom';
$dictionary['Opportunity']['fields']['applicant_uploaded_docs_c']['labelValue']='Applicant Uploaded Docs';
$dictionary['Opportunity']['fields']['applicant_uploaded_docs_c']['enable_range_search']='1';

 

 // created: 2019-10-09 10:48:06
$dictionary['Opportunity']['fields']['jjwg_maps_lng_c']['inline_edit']=1;

 

 // created: 2023-05-24 21:24:03
$dictionary['Opportunity']['fields']['lmt_expectation_date_2_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['lmt_expectation_date_2_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['lmt_expectation_date_2_c']['labelValue']='LMT Expectation Date 2';
$dictionary['Opportunity']['fields']['lmt_expectation_date_2_c']['enable_range_search']='1';

 

 // created: 2019-12-11 18:49:09
$dictionary['Opportunity']['fields']['asesor_servicio_cliente_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['asesor_servicio_cliente_c']['labelValue']='Asesor Servicio al Cliente';
$dictionary['Opportunity']['fields']['asesor_servicio_cliente_c']['massupdate']=true;

 

 // created: 2024-02-13 21:56:05
$dictionary['Opportunity']['fields']['doc_id0_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['doc_id0_c']['labelValue']='DOC ID0';

 

 // created: 2022-06-17 20:27:01
$dictionary['Opportunity']['fields']['virtual_tbs_application_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['virtual_tbs_application_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['virtual_tbs_application_date_c']['labelValue']='TBS Application Date';
$dictionary['Opportunity']['fields']['virtual_tbs_application_date_c']['enable_range_search']='1';

 

 // created: 2023-03-30 22:28:06
$dictionary['Opportunity']['fields']['nomination_trn_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['nomination_trn_c']['labelValue']='Nomination TRN';

 

 // created: 2020-03-16 15:28:42
$dictionary['Opportunity']['fields']['user_id1_c']['inline_edit']=1;

 

 // created: 2022-05-26 17:03:08
$dictionary['Opportunity']['fields']['filter_uploaded_docs_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['filter_uploaded_docs_c']['labelValue']='Filter Uploaded Docs';

 

 // created: 2022-05-11 22:41:39
$dictionary['Opportunity']['fields']['virtual_visa_expire_3rd_dependent_date_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['virtual_visa_expire_3rd_dependent_date_c']['labelValue']='Third Dependent Visa Expiry Date';

 

 // created: 2021-10-19 19:58:35
$dictionary['Opportunity']['fields']['company_dept_cc_surcharge_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['company_dept_cc_surcharge_c']['labelValue']='Company Department Credit Card Surcharge percentage';

 

 // created: 2022-04-28 20:43:59
$dictionary['Opportunity']['fields']['fecha_req1_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['fecha_req1_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['fecha_req1_c']['labelValue']='Requeriment 1 date';
$dictionary['Opportunity']['fields']['fecha_req1_c']['enable_range_search']='1';

 

 // created: 2023-09-04 21:35:42
$dictionary['Opportunity']['fields']['applicant_approved_docs_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['applicant_approved_docs_c']['options']='numeric_range_search_dom';
$dictionary['Opportunity']['fields']['applicant_approved_docs_c']['labelValue']='Applicant Approved Docs';
$dictionary['Opportunity']['fields']['applicant_approved_docs_c']['enable_range_search']='1';

 

 // created: 2022-07-25 22:01:16
$dictionary['Opportunity']['fields']['rfi_4_types_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['rfi_4_types_c']['labelValue']='RFI 4 types';

 

 // created: 2023-07-31 01:55:47
$dictionary['Opportunity']['fields']['fecha_req3_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['fecha_req3_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['fecha_req3_c']['labelValue']='RFI 3 Received Date';
$dictionary['Opportunity']['fields']['fecha_req3_c']['enable_range_search']='1';

 

 // created: 2022-09-23 21:12:23
$dictionary['Opportunity']['fields']['nomination_approval_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['nomination_approval_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['nomination_approval_date_c']['labelValue']='Nomination Approval Date';
$dictionary['Opportunity']['fields']['nomination_approval_date_c']['enable_range_search']='1';

 

 // created: 2022-06-17 20:27:37
$dictionary['Opportunity']['fields']['virtual_tbs_expectation_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['virtual_tbs_expectation_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['virtual_tbs_expectation_date_c']['labelValue']='TBS Expectation Date';
$dictionary['Opportunity']['fields']['virtual_tbs_expectation_date_c']['enable_range_search']='1';

 

 // created: 2022-11-23 16:49:14
$dictionary['Opportunity']['fields']['eoi_2_application_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['eoi_2_application_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['eoi_2_application_date_c']['labelValue']='EOI 2 Application Date';
$dictionary['Opportunity']['fields']['eoi_2_application_date_c']['enable_range_search']='1';

 

 // created: 2022-07-25 21:40:29
$dictionary['Opportunity']['fields']['fecha_exp_req5_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['fecha_exp_req5_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['fecha_exp_req5_c']['labelValue']='RFI 5 Expiration Date';
$dictionary['Opportunity']['fields']['fecha_exp_req5_c']['enable_range_search']='1';

 

 // created: 2023-03-24 20:25:02
$dictionary['Opportunity']['fields']['rcb_process_stage_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['rcb_process_stage_c']['labelValue']='RCB';

 

 // created: 2021-10-19 19:59:54
$dictionary['Opportunity']['fields']['company_discount_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['company_discount_c']['labelValue']='Company Discount';

 

 // created: 2022-10-16 19:53:17
$dictionary['Opportunity']['fields']['visa_expectation_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['visa_expectation_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['visa_expectation_date_c']['labelValue']='Visa Expectation Date';
$dictionary['Opportunity']['fields']['visa_expectation_date_c']['enable_range_search']='1';

 

 // created: 2023-01-10 19:27:30
$dictionary['Opportunity']['fields']['url_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['url_c']['labelValue']='URL';

 

 // created: 2022-04-08 13:02:17
$dictionary['Opportunity']['fields']['first_quarter_mmm_fees_paid_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['first_quarter_mmm_fees_paid_c']['labelValue']='First Quarter MMM Fees Paid';

 

 // created: 2023-01-31 00:00:10
$dictionary['Opportunity']['fields']['state_nomination_application_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['state_nomination_application_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['state_nomination_application_date_c']['labelValue']='State Nomination Application Date';
$dictionary['Opportunity']['fields']['state_nomination_application_date_c']['enable_range_search']='1';

 

 // created: 2024-11-26 00:16:00
$dictionary['Opportunity']['fields']['detalle_semaforizacion_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['detalle_semaforizacion_c']['labelValue']='Follow-up detail';

 

 // created: 2023-07-18 15:04:03
$dictionary['Opportunity']['fields']['reviewed_and_approved_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['reviewed_and_approved_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['reviewed_and_approved_date_c']['labelValue']='Reviewed And Approved Date';
$dictionary['Opportunity']['fields']['reviewed_and_approved_date_c']['enable_range_search']='1';

 

 // created: 2022-07-25 22:01:03
$dictionary['Opportunity']['fields']['rfi_3_types_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['rfi_3_types_c']['labelValue']='RFI 3 types';

 

 // created: 2023-01-13 22:28:43
$dictionary['Opportunity']['fields']['new_chat_comments_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['new_chat_comments_c']['labelValue']='New Chat Comments';

 

 // created: 2021-10-19 20:00:37
$dictionary['Opportunity']['fields']['company_lead_id_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['company_lead_id_c']['labelValue']='Company Lead ID';

 

 // created: 2022-06-21 23:14:09
$dictionary['Opportunity']['fields']['virtual_customer_service_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['virtual_customer_service_c']['labelValue']='Customer Service';

 

 // created: 2024-05-06 19:49:37
$dictionary['Opportunity']['fields']['lmt_finished_2_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['lmt_finished_2_c']['labelValue']='LMT Finished 2';

 

 // created: 2023-03-24 20:25:37
$dictionary['Opportunity']['fields']['nomination_process_stage_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['nomination_process_stage_c']['labelValue']='Nomination';

 

 // created: 2019-11-02 17:09:15
$dictionary['Opportunity']['fields']['revision_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['revision_c']['labelValue']='Revisión';

 

 // created: 2023-03-17 23:35:27
$dictionary['Opportunity']['fields']['company_approved_docs_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['company_approved_docs_c']['labelValue']='Company Approved Docs';

 

 // created: 2022-09-23 21:09:00
$dictionary['Opportunity']['fields']['eoi_expectation_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['eoi_expectation_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['eoi_expectation_date_c']['labelValue']='EOI Expectation Date';
$dictionary['Opportunity']['fields']['eoi_expectation_date_c']['enable_range_search']='1';

 

 // created: 2022-04-27 16:18:02
$dictionary['Opportunity']['fields']['visa_description_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['visa_description_c']['labelValue']='Description visa';

 

 // created: 2022-06-17 20:29:06
$dictionary['Opportunity']['fields']['virtual_tbs_approval_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['virtual_tbs_approval_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['virtual_tbs_approval_date_c']['labelValue']='TBS Approval Date';
$dictionary['Opportunity']['fields']['virtual_tbs_approval_date_c']['enable_range_search']='1';

 

 // created: 2022-05-11 22:38:28
$dictionary['Opportunity']['fields']['virtual_visa_expire_secondary_applicant_date_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['virtual_visa_expire_secondary_applicant_date_c']['labelValue']='Secondary Applicant Visa Expiry Date';

 

 // created: 2020-01-23 15:00:52
$dictionary['Opportunity']['fields']['fecha_ultimo_contacto_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['fecha_ultimo_contacto_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['fecha_ultimo_contacto_c']['labelValue']='Fecha Ultimo Contacto';
$dictionary['Opportunity']['fields']['fecha_ultimo_contacto_c']['enable_range_search']='1';

 

 // created: 2022-02-28 19:39:18
$dictionary['Opportunity']['fields']['mmm_fees_outstanding_amount_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['mmm_fees_outstanding_amount_c']['labelValue']='MMM Fees Outstanding Amount';

 

 // created: 2024-10-01 21:37:30
$dictionary['Opportunity']['fields']['time_to_checklist_company_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['time_to_checklist_company_c']['labelValue']='Time to company checklist  sent';

 

 // created: 2022-06-17 22:42:49
$dictionary['Opportunity']['fields']['virtual_requeriment_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['virtual_requeriment_c']['labelValue']='Requeriment';

 

 // created: 2022-07-26 23:16:09
$dictionary['Opportunity']['fields']['rfi_name_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['rfi_name_c']['labelValue']='RFI Name';

 

 // created: 2022-02-27 20:59:34
$dictionary['Opportunity']['fields']['applicant_company_department_visa_fee_base_application_charge_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['applicant_company_department_visa_fee_base_application_charge_c']['labelValue']='Applicant Company Department Visa Fee Base application charge';

 

 // created: 2022-07-25 21:40:10
$dictionary['Opportunity']['fields']['fecha_exp_req4_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['fecha_exp_req4_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['fecha_exp_req4_c']['labelValue']='RFI 4 Expiration Date';
$dictionary['Opportunity']['fields']['fecha_exp_req4_c']['enable_range_search']='1';

 

 // created: 2022-02-25 20:20:44
$dictionary['Opportunity']['fields']['applicant_company_total_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['applicant_company_total_c']['labelValue']='Applicant Company Total';

 

 // created: 2021-10-19 20:00:17
$dictionary['Opportunity']['fields']['company_gst_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['company_gst_c']['labelValue']='Company GST';

 

 // created: 2024-10-02 23:00:07
$dictionary['Opportunity']['fields']['labor_agreement_process_stage_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['labor_agreement_process_stage_c']['labelValue']='Labor Agreement';

 

 // created: 2022-04-08 21:01:30
$dictionary['Opportunity']['fields']['first_quarter_mmm_fees_paid_company_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['first_quarter_mmm_fees_paid_company_c']['labelValue']='First Quarter MMM Fees Paid Company';

 

 // created: 2022-07-25 21:32:11
$dictionary['Opportunity']['fields']['fecha_req5_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['fecha_req5_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['fecha_req5_c']['labelValue']='RFI 5 Date';
$dictionary['Opportunity']['fields']['fecha_req5_c']['enable_range_search']='1';

 

 // created: 2023-03-24 20:24:03
$dictionary['Opportunity']['fields']['skill_assessment_process_stage_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['skill_assessment_process_stage_c']['labelValue']='Skill Assessment';

 

 // created: 2022-05-03 20:44:39
$dictionary['Opportunity']['fields']['zero_payment_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['zero_payment_c']['labelValue']='Zero Payment';

 

 // created: 2019-10-09 10:48:06
$dictionary['Opportunity']['fields']['jjwg_maps_lat_c']['inline_edit']=1;

 

 // created: 2019-11-02 17:02:02
$dictionary['Opportunity']['fields']['fecha_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['fecha_c']['labelValue']='Fecha';

 

 // created: 2023-02-22 14:59:16
$dictionary['Opportunity']['fields']['sbs_approval_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['sbs_approval_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['sbs_approval_date_c']['labelValue']='SBS Approval Date';
$dictionary['Opportunity']['fields']['sbs_approval_date_c']['enable_range_search']='1';

 

 // created: 2024-02-13 21:53:10
$dictionary['Opportunity']['fields']['doc_id4_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['doc_id4_c']['labelValue']='DOC ID4';

 

 // created: 2023-03-29 17:54:36
$dictionary['Opportunity']['fields']['virtual_visa_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['virtual_visa_c']['labelValue']='Virtual Visa';

 

 // created: 2022-09-23 21:07:44
$dictionary['Opportunity']['fields']['eoi_application_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['eoi_application_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['eoi_application_date_c']['labelValue']='EOI Application Date';
$dictionary['Opportunity']['fields']['eoi_application_date_c']['enable_range_search']='1';

 

 // created: 2024-09-24 22:33:03
$dictionary['Opportunity']['fields']['department_fees_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['department_fees_c']['labelValue']='Department Fees';

 

 // created: 2022-11-23 16:49:33
$dictionary['Opportunity']['fields']['eoi_3_application_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['eoi_3_application_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['eoi_3_application_date_c']['labelValue']='EOI 3 Application Date';
$dictionary['Opportunity']['fields']['eoi_3_application_date_c']['enable_range_search']='1';

 

 // created: 2022-05-25 20:08:38
$dictionary['Opportunity']['fields']['applicant_industry_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['applicant_industry_c']['labelValue']='Industry Applicant';

 

 // created: 2024-02-13 21:54:00
$dictionary['Opportunity']['fields']['doc_id_main_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['doc_id_main_c']['labelValue']='DOC ID MAIN';

 

 // created: 2022-05-06 18:34:34
$dictionary['Opportunity']['fields']['second_quarter_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['second_quarter_c']['labelValue']='Second Quarter';

 

 // created: 2024-10-02 22:58:22
$dictionary['Opportunity']['fields']['labor_agreement_expectation_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['labor_agreement_expectation_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['labor_agreement_expectation_date_c']['labelValue']='Labor Agreement Expectation Date';
$dictionary['Opportunity']['fields']['labor_agreement_expectation_date_c']['enable_range_search']='1';

 

 // created: 2023-05-24 21:25:00
$dictionary['Opportunity']['fields']['lmt_url_2_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['lmt_url_2_c']['labelValue']='LMT Url 2';

 

 // created: 2022-11-23 16:46:31
$dictionary['Opportunity']['fields']['eoi_2_appoval_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['eoi_2_appoval_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['eoi_2_appoval_date_c']['labelValue']='EOI 2 Appoval Date';
$dictionary['Opportunity']['fields']['eoi_2_appoval_date_c']['enable_range_search']='1';

 

 // created: 2022-02-24 20:03:56
$dictionary['Opportunity']['fields']['closing_date_applicant_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['closing_date_applicant_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['closing_date_applicant_c']['labelValue']='Closing Date Applicant';
$dictionary['Opportunity']['fields']['closing_date_applicant_c']['enable_range_search']='1';

 

 // created: 2023-12-19 20:45:03
$dictionary['Opportunity']['fields']['fourth_dependent_name_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['fourth_dependent_name_c']['labelValue']='4th Dependent Name';

 

 // created: 2024-06-14 20:16:05
$dictionary['Opportunity']['fields']['citizenship_process_stage_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['citizenship_process_stage_c']['labelValue']='Citizenship';

 

 // created: 2023-03-17 23:32:00
$dictionary['Opportunity']['fields']['company_requested_docs_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['company_requested_docs_c']['labelValue']='Company Requested Docs';

 

 // created: 2023-03-24 20:20:05
$dictionary['Opportunity']['fields']['tas_process_stage_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['tas_process_stage_c']['labelValue']='TAS';

 

 // created: 2022-04-29 21:01:07
$dictionary['Opportunity']['fields']['first_dependent_dob_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['first_dependent_dob_c']['labelValue']='1nd Dependent DOB';

 

 // created: 2022-07-11 04:04:55
$dictionary['Opportunity']['fields']['virtual_visa_exp_date_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['virtual_visa_exp_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['virtual_visa_exp_date_c']['labelValue']='Visa Expiration Date';
$dictionary['Opportunity']['fields']['virtual_visa_exp_date_c']['enable_range_search']='1';

 

 // created: 2022-07-07 16:13:16
$dictionary['Opportunity']['fields']['third_quarter_mmm_fees_paid_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['third_quarter_mmm_fees_paid_c']['labelValue']='Third Quarter MMM Fees Paid';

 

 // created: 2022-09-23 21:10:58
$dictionary['Opportunity']['fields']['rcb_approval_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['rcb_approval_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['rcb_approval_date_c']['labelValue']='RCB Approval Date';
$dictionary['Opportunity']['fields']['rcb_approval_date_c']['enable_range_search']='1';

 

 // created: 2022-02-28 19:38:51
$dictionary['Opportunity']['fields']['total_mmm_fees_paid_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['total_mmm_fees_paid_c']['labelValue']='Total MMM Fees Paid';

 

 // created: 2019-11-02 17:04:19
$dictionary['Opportunity']['fields']['fecha_otorgamiento_visa_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['fecha_otorgamiento_visa_c']['labelValue']='Fecha Otorgamiento Visa';

 

 // created: 2019-12-05 07:25:03
$dictionary['Opportunity']['fields']['estado_gestion_comercial_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['estado_gestion_comercial_c']['labelValue']='Estado Gestion Comercial';

 

 // created: 2020-03-16 08:52:11
$dictionary['Opportunity']['fields']['fecha_viaje_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['fecha_viaje_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['fecha_viaje_c']['labelValue']='Fecha de Viaje';
$dictionary['Opportunity']['fields']['fecha_viaje_c']['enable_range_search']='1';

 

 // created: 2023-03-24 20:23:32
$dictionary['Opportunity']['fields']['state_nomination_process_stage_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['state_nomination_process_stage_c']['labelValue']='State Nomination';

 

 // created: 2022-04-28 20:46:04
$dictionary['Opportunity']['fields']['fecha_req2_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['fecha_req2_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['fecha_req2_c']['labelValue']='Requeriment 2 date';
$dictionary['Opportunity']['fields']['fecha_req2_c']['enable_range_search']='1';

 

 // created: 2019-11-02 17:08:42
$dictionary['Opportunity']['fields']['porcentaje_pago_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['porcentaje_pago_c']['labelValue']='Porcentaje Pago';

 

 // created: 2022-04-29 21:05:59
$dictionary['Opportunity']['fields']['visa_expire_2st_dependent_da_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['visa_expire_2st_dependent_da_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['visa_expire_2st_dependent_da_c']['labelValue']='Visa expire 2st dependent date';
$dictionary['Opportunity']['fields']['visa_expire_2st_dependent_da_c']['enable_range_search']='1';

 

 // created: 2022-06-17 20:32:00
$dictionary['Opportunity']['fields']['virtual_labour_application_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['virtual_labour_application_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['virtual_labour_application_date_c']['labelValue']='Labour Application Date';
$dictionary['Opportunity']['fields']['virtual_labour_application_date_c']['enable_range_search']='1';

 

 // created: 2022-04-29 21:06:11
$dictionary['Opportunity']['fields']['visa_expire_3st_dependent_da_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['visa_expire_3st_dependent_da_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['visa_expire_3st_dependent_da_c']['labelValue']='Visa expire 3st dependent date';
$dictionary['Opportunity']['fields']['visa_expire_3st_dependent_da_c']['enable_range_search']='1';

 

 // created: 2020-01-23 13:03:49
$dictionary['Opportunity']['fields']['fecha_cierre_new_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['fecha_cierre_new_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['fecha_cierre_new_c']['labelValue']='Fecha de Cierre.';
$dictionary['Opportunity']['fields']['fecha_cierre_new_c']['enable_range_search']='1';

 

 // created: 2022-11-23 16:45:40
$dictionary['Opportunity']['fields']['eoi_2_expectation_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['eoi_2_expectation_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['eoi_2_expectation_date_c']['labelValue']='EOI 2 Expectation Date';
$dictionary['Opportunity']['fields']['eoi_2_expectation_date_c']['enable_range_search']='1';

 

 // created: 2022-04-29 21:04:20
$dictionary['Opportunity']['fields']['visa_expire_1st_dependent_da_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['visa_expire_1st_dependent_da_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['visa_expire_1st_dependent_da_c']['labelValue']='Visa expire 1st dependent date';
$dictionary['Opportunity']['fields']['visa_expire_1st_dependent_da_c']['enable_range_search']='1';

 

 // created: 2021-06-16 21:30:50
$dictionary['Opportunity']['fields']['fecha_cierre_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['fecha_cierre_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['fecha_cierre_c']['labelValue']='Fecha de Cierre';
$dictionary['Opportunity']['fields']['fecha_cierre_c']['enable_range_search']='1';

 

 // created: 2023-03-28 22:27:01
$dictionary['Opportunity']['fields']['rfi_4_ext_request_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['rfi_4_ext_request_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['rfi_4_ext_request_c']['labelValue']='RFI 4 Extension Request';
$dictionary['Opportunity']['fields']['rfi_4_ext_request_c']['enable_range_search']='1';

 

 // created: 2019-12-05 07:55:24
$dictionary['Opportunity']['fields']['pendiente_cartera_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['pendiente_cartera_c']['labelValue']='Pendiente Cartera';

 

 // created: 2023-03-17 22:19:39
$dictionary['Opportunity']['fields']['asignado_servicio_cliente_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['asignado_servicio_cliente_c']['labelValue']='Customer Service';

 

 // created: 2022-05-03 21:56:46
$dictionary['Opportunity']['fields']['pending_payments_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['pending_payments_c']['labelValue']='Pending Payments';

 

 // created: 2019-12-07 15:45:37
$dictionary['Opportunity']['fields']['sales_stage']['default']='Progreso';
$dictionary['Opportunity']['fields']['sales_stage']['options']='sales_stage_list';

 

 // created: 2019-12-05 07:34:08
$dictionary['Opportunity']['fields']['estado_visas_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['estado_visas_c']['labelValue']='Estado Visas';

 

 // created: 2024-09-12 23:34:43
$dictionary['Opportunity']['fields']['time_to_visa_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['time_to_visa_c']['labelValue']='Time to visa';

 

 // created: 2022-04-11 15:47:28
$dictionary['Opportunity']['fields']['first_quarter_mmm_fees_outstanding_amount_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['first_quarter_mmm_fees_outstanding_amount_c']['labelValue']='First Quarter MMM Fees Outstanding Amount';

 

 // created: 2023-03-28 22:26:22
$dictionary['Opportunity']['fields']['rfi_3_extension_request_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['rfi_3_extension_request_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['rfi_3_extension_request_c']['labelValue']='RFI 3 Extension Request';
$dictionary['Opportunity']['fields']['rfi_3_extension_request_c']['enable_range_search']='1';

 

 // created: 2023-08-15 14:45:13
$dictionary['Opportunity']['fields']['email_docs_portal_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['email_docs_portal_c']['labelValue']='Email Docs Portal';

 

 // created: 2024-02-13 21:52:41
$dictionary['Opportunity']['fields']['doc_id2_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['doc_id2_c']['labelValue']='DOC ID2';

 

 // created: 2024-10-02 22:56:11
$dictionary['Opportunity']['fields']['endorsement_application_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['endorsement_application_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['endorsement_application_date_c']['labelValue']='Endorsement Application Date';
$dictionary['Opportunity']['fields']['endorsement_application_date_c']['enable_range_search']='1';

 

 // created: 2022-02-28 22:36:30
$dictionary['Opportunity']['fields']['applicant_company_total_mmm_fees_paid_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['applicant_company_total_mmm_fees_paid_c']['labelValue']='Applicant Company total MMM fees Without GST paid';

 

 // created: 2022-07-07 16:09:46
$dictionary['Opportunity']['fields']['third_quarter_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['third_quarter_c']['labelValue']='Third Quarter';

 

 // created: 2022-06-17 20:30:26
$dictionary['Opportunity']['fields']['virtual_nomination_approval_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['virtual_nomination_approval_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['virtual_nomination_approval_date_c']['labelValue']='Nomination Approval Date';
$dictionary['Opportunity']['fields']['virtual_nomination_approval_date_c']['enable_range_search']='1';

 

 // created: 2022-02-27 20:27:32
$dictionary['Opportunity']['fields']['company_departments_visa_fee_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['company_departments_visa_fee_c']['labelValue']='Company Departments Visa fee';

 

 // created: 2020-03-16 13:06:55
$dictionary['Opportunity']['fields']['fecha_presupuesto_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['fecha_presupuesto_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['fecha_presupuesto_c']['labelValue']='Fecha del Presupuesto';
$dictionary['Opportunity']['fields']['fecha_presupuesto_c']['enable_range_search']='1';

 

 // created: 2022-07-26 23:19:31
$dictionary['Opportunity']['fields']['rfi_name_2_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['rfi_name_2_c']['labelValue']='RFI Name 2';

 

 // created: 2022-12-16 19:50:12
$dictionary['Opportunity']['fields']['checklist_sent_date_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['checklist_sent_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['checklist_sent_date_c']['labelValue']='Applicant Checklist Sent Date';
$dictionary['Opportunity']['fields']['checklist_sent_date_c']['enable_range_search']='1';

 

 // created: 2022-07-25 22:00:49
$dictionary['Opportunity']['fields']['rfi_2_types_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['rfi_2_types_c']['labelValue']='RFI 2 types';

 

 // created: 2024-02-13 21:51:50
$dictionary['Opportunity']['fields']['doc_id1_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['doc_id1_c']['labelValue']='DOC ID1';

 

 // created: 2022-02-24 20:04:11
$dictionary['Opportunity']['fields']['closing_date_company_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['closing_date_company_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['closing_date_company_c']['labelValue']='Closing Date Company';
$dictionary['Opportunity']['fields']['closing_date_company_c']['enable_range_search']='1';

 

 // created: 2023-03-24 20:25:56
$dictionary['Opportunity']['fields']['lmt_process_stage_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['lmt_process_stage_c']['labelValue']='LMT';

 
?>