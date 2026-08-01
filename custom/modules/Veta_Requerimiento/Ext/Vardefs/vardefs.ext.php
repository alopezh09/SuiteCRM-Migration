<?php 
 //WARNING: The contents of this file are auto-generated


$dictionary['Veta_Requerimiento']['fields']['soel_fecha_expiracion_visa_lead'] = array(
    'name' => 'soel_fecha_expiracion_visa_lead',
    'vname' => 'LBL_SOEL_FECHA_EXPIRACION_VISA_LEAD',
    'type' => 'datetime',
    'source' => 'non-db',
    'enable_range_search' => true,
    'options' => 'date_range_search_dom',
    'massupdate' => false,
);


$dictionary['Veta_Requerimiento']['fields']['soel_departamento_contact'] = array(
    'name' => 'soel_departamento_contact',
    'vname' => 'LBL_SOEL_DEPARTAMENTO_CONTACT',
    'type' => 'enum',
    'source' => 'non-db',
    'options' => 'departamentos_list',
    'massupdate' => false,
);


$dictionary['Veta_Requerimiento']['fields']['soel_convertido_lead'] = array(
    'name' => 'soel_convertido_lead',
    'vname' => 'LBL_SOEL_CONVERTIDO_LEAD',
    'type' => 'enum',
    'source' => 'non-db',
    'function' => 'getYesNoOptions',
    'massupdate' => false,
);

$dictionary['Veta_Requerimiento']['fields']['soel_fecha_expiracion_visa_texto_lead'] = array(
    'name' => 'soel_fecha_expiracion_visa_texto_lead',
    'vname' => 'LBL_SOEL_EXPIRACION_VISA_TEXTO_LEAD',
    'type' => 'varchar',
    'source' => 'non-db',
    'massupdate' => false,
);


$dictionary['Veta_Requerimiento']['fields']['soel_campana_contact'] = array(
    'name' => 'soel_campana_contact',
    'vname' => 'LBL_SOEL_CAMPANA_CONTACT',
    'type' => 'enum',
    'source' => 'non-db',
    'function' => 'getCampanaLeads',
    'massupdate' => false,
);



// created: 2021-10-13 15:46:19
$dictionary["Veta_Requerimiento"]["fields"]["nvc_company_veta_requerimiento"] = array (
  'name' => 'nvc_company_veta_requerimiento',
  'type' => 'link',
  'relationship' => 'nvc_company_veta_requerimiento',
  'source' => 'non-db',
  'module' => 'NVC_Company',
  'bean_name' => false,
  'vname' => 'LBL_NVC_COMPANY_VETA_REQUERIMIENTO_FROM_NVC_COMPANY_TITLE',
  'id_name' => 'nvc_company_veta_requerimientonvc_company_ida',
);
$dictionary["Veta_Requerimiento"]["fields"]["nvc_company_veta_requerimiento_name"] = array (
  'name' => 'nvc_company_veta_requerimiento_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_NVC_COMPANY_VETA_REQUERIMIENTO_FROM_NVC_COMPANY_TITLE',
  'save' => true,
  'id_name' => 'nvc_company_veta_requerimientonvc_company_ida',
  'link' => 'nvc_company_veta_requerimiento',
  'table' => 'nvc_company',
  'module' => 'NVC_Company',
  'rname' => 'name',
);
$dictionary["Veta_Requerimiento"]["fields"]["nvc_company_veta_requerimientonvc_company_ida"] = array (
  'name' => 'nvc_company_veta_requerimientonvc_company_ida',
  'type' => 'link',
  'relationship' => 'nvc_company_veta_requerimiento',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_NVC_COMPANY_VETA_REQUERIMIENTO_FROM_VETA_REQUERIMIENTO_TITLE',
);


// created: 2020-10-14 00:58:36
$dictionary["Veta_Requerimiento"]["fields"]["veta_requerimiento_veta_recibo"] = array (
  'name' => 'veta_requerimiento_veta_recibo',
  'type' => 'link',
  'relationship' => 'veta_requerimiento_veta_recibo',
  'source' => 'non-db',
  'module' => 'Veta_Recibo',
  'bean_name' => 'Veta_Recibo',
  'side' => 'right',
  'vname' => 'LBL_VETA_REQUERIMIENTO_VETA_RECIBO_FROM_VETA_RECIBO_TITLE2',
);


$dictionary['Veta_Requerimiento']['fields']['soel_estado_lead'] = array(
    'name' => 'soel_estado_lead',
    'vname' => 'LBL_SOEL_ESTADO_LEAD',
    'type' => 'enum',
    'source' => 'non-db',
    'options' => 'lead_status_dom',
    'massupdate' => false,
);


// created: 2022-02-08 16:18:15
$dictionary["Veta_Requerimiento"]["fields"]["veta_requerimiento_doc_docssolicitados_1"] = array (
  'name' => 'veta_requerimiento_doc_docssolicitados_1',
  'type' => 'link',
  'relationship' => 'veta_requerimiento_doc_docssolicitados_1',
  'source' => 'non-db',
  'module' => 'Doc_DocsSolicitados',
  'bean_name' => 'Doc_DocsSolicitados',
  'side' => 'right',
  'vname' => 'LBL_VETA_REQUERIMIENTO_DOC_DOCSSOLICITADOS_1_FROM_DOC_DOCSSOLICITADOS_TITLE',
);


// created: 2020-10-14 00:58:35
$dictionary["Veta_Requerimiento"]["fields"]["veta_requerimiento_contacts"] = array (
  'name' => 'veta_requerimiento_contacts',
  'type' => 'link',
  'relationship' => 'veta_requerimiento_contacts',
  'source' => 'non-db',
  'module' => 'Contacts',
  'bean_name' => 'Contact',
  'vname' => 'LBL_VETA_REQUERIMIENTO_CONTACTS_FROM_CONTACTS_TITLE',
  'id_name' => 'veta_requerimiento_contactscontacts_ida',
);
$dictionary["Veta_Requerimiento"]["fields"]["veta_requerimiento_contacts_name"] = array (
  'name' => 'veta_requerimiento_contacts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VETA_REQUERIMIENTO_CONTACTS_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'veta_requerimiento_contactscontacts_ida',
  'link' => 'veta_requerimiento_contacts',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'massupdate' => false,
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Veta_Requerimiento"]["fields"]["veta_requerimiento_contactscontacts_ida"] = array (
  'name' => 'veta_requerimiento_contactscontacts_ida',
  'type' => 'link',
  'relationship' => 'veta_requerimiento_contacts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VETA_REQUERIMIENTO_CONTACTS_FROM_VETA_REQUERIMIENTO_TITLE',
);


$dictionary['Veta_Requerimiento']['fields']['soel_ciudad_contact'] = array(
    'name' => 'soel_ciudad_contact',
    'vname' => 'LBL_SOEL_CIUDAD_CONTACT',
    'type' => 'enum',
    'source' => 'non-db',
    'options' => 'ciudades_list',
    'massupdate' => false,
);


// created: 2021-05-04 17:11:24
$dictionary["Veta_Requerimiento"]["fields"]["veta_requerimiento_activities_1_calls"] = array (
  'name' => 'veta_requerimiento_activities_1_calls',
  'type' => 'link',
  'relationship' => 'veta_requerimiento_activities_1_calls',
  'source' => 'non-db',
  'module' => 'Calls',
  'bean_name' => 'Call',
  'vname' => 'LBL_VETA_REQUERIMIENTO_ACTIVITIES_1_CALLS_FROM_CALLS_TITLE',
);


// created: 2021-05-04 17:11:25
$dictionary["Veta_Requerimiento"]["fields"]["veta_requerimiento_activities_1_tasks"] = array (
  'name' => 'veta_requerimiento_activities_1_tasks',
  'type' => 'link',
  'relationship' => 'veta_requerimiento_activities_1_tasks',
  'source' => 'non-db',
  'module' => 'Tasks',
  'bean_name' => 'Task',
  'vname' => 'LBL_VETA_REQUERIMIENTO_ACTIVITIES_1_TASKS_FROM_TASKS_TITLE',
);


$dictionary['Veta_Requerimiento']['fields']['soel_carrera_universitaria'] = array(
    'name' => 'soel_carrera_universitaria',
    'vname' => 'LBL_SOEL_CARRERA_UNIVERSITARIA',
    'type' => 'varchar',
    'source' => 'non-db',
    'massupdate' => false,
);


$dictionary['Veta_Requerimiento']['fields']['soel_mobile_phone_lead'] = array(
    'name' => 'soel_mobiLe_phone_lead',
    'vname' => 'LBL_SOEL_MOBILE_PHONE_LEAD',
    'type' => 'varchar',
    'source' => 'non-db',
    'massupdate' => false,
);


$dictionary['Veta_Requerimiento']['fields']['soel_fuente_contact'] = array(
    'name' => 'soel_fuente_contact',
    'vname' => 'LBL_SOEL_FUENTE_CONTACT',
    'type' => 'enum',
    'source' => 'non-db',
    'options' => 'lead_source_dom',
    'massupdate' => false,
);




$dictionary['Veta_Requerimiento']['fields']['soel_oficina_comercial'] = array(
    'name' => 'soel_oficina_comercial',
    'vname' => 'LBL_SOEL_OFICINA_COMERCIAL',
    'type' => 'enum',
    'source' => 'non-db',
    'function' => 'getOficinasComercial',
    'massupdate' => false,
);


// created: 2020-10-14 00:58:35
$dictionary["Veta_Requerimiento"]["fields"]["veta_requerimiento_leads"] = array (
  'name' => 'veta_requerimiento_leads',
  'type' => 'link',
  'relationship' => 'veta_requerimiento_leads',
  'source' => 'non-db',
  'module' => 'Leads',
  'bean_name' => 'Lead',
  'vname' => 'LBL_VETA_REQUERIMIENTO_LEADS_FROM_LEADS_TITLE',
  'id_name' => 'veta_requerimiento_leadsleads_ida',
);
$dictionary["Veta_Requerimiento"]["fields"]["veta_requerimiento_leads_name"] = array (
  'name' => 'veta_requerimiento_leads_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VETA_REQUERIMIENTO_LEADS_FROM_LEADS_TITLE',
  'save' => true,
  'id_name' => 'veta_requerimiento_leadsleads_ida',
  'link' => 'veta_requerimiento_leads',
  'table' => 'leads',
  'module' => 'Leads',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Veta_Requerimiento"]["fields"]["veta_requerimiento_leadsleads_ida"] = array (
  'name' => 'veta_requerimiento_leadsleads_ida',
  'type' => 'link',
  'relationship' => 'veta_requerimiento_leads',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VETA_REQUERIMIENTO_LEADS_FROM_VETA_REQUERIMIENTO_TITLE',
);


$dictionary['Veta_Requerimiento']['fields']['soel_campana_lead'] = array(
    'name' => 'soel_campana_lead',
    'vname' => 'LBL_SOEL_CAMPANA_LEAD',
    'type' => 'enum',
    'source' => 'non-db',
    'function' => 'getCampanaLeads',
    'massupdate' => false,
);



$dictionary['Veta_Requerimiento']['fields']['soel_pais_lead'] = array(
    'name' => 'soel_pais_lead',
    'vname' => 'LBL_SOEL_PAIS_LEAD',
    'type' => 'enum',
    'source' => 'non-db',
    'options' => 'pais_list',
    'massupdate' => false,
);


// created: 2022-02-08 16:48:12
$dictionary["Veta_Requerimiento"]["fields"]["veta_requerimiento_doc_comentarios_1"] = array (
  'name' => 'veta_requerimiento_doc_comentarios_1',
  'type' => 'link',
  'relationship' => 'veta_requerimiento_doc_comentarios_1',
  'source' => 'non-db',
  'module' => 'Doc_Comentarios',
  'bean_name' => 'Doc_Comentarios',
  'side' => 'right',
  'vname' => 'LBL_VETA_REQUERIMIENTO_DOC_COMENTARIOS_1_FROM_DOC_COMENTARIOS_TITLE',
);


$dictionary['Veta_Requerimiento']['fields']['soel_edad_lead'] = array(
    'name' => 'soel_edad_lead',
    'vname' => 'LBL_SOEL_EDAD_LEAD',
    'type' => 'varchar',
    'source' => 'non-db',
    'massupdate' => false,
);


$dictionary['Veta_Requerimiento']['fields']['soel_departamento_lead'] = array(
    'name' => 'soel_departamento_lead',
    'vname' => 'LBL_SOEL_DEPARTAMENTO_LEAD',
    'type' => 'enum',
    'source' => 'non-db',
    'options' => 'departamentos_list',
    'massupdate' => false,
);


$dictionary['Veta_Requerimiento']['fields']['soel_visa_lead'] = array(
    'name' => 'soel_visa_lead',
    'vname' => 'LBL_SOEL_VISA_LEAD',
    'type' => 'varchar',
    'source' => 'non-db',
    'massupdate' => false

);


$dictionary['Veta_Requerimiento']['fields']['soel_pasaporte_lead'] = array(
    'name' => 'soel_pasaporte_lead',
    'vname' => 'LBL_SOEL_PASAPORTE_LEAD',
    'type' => 'varchar',
    'source' => 'non-db',
    'massupdate' => false,
);


$dictionary['Veta_Requerimiento']['fields']['soel_ciudad_lead'] = array(
    'name' => 'soel_ciudad_lead',
    'vname' => 'LBL_SOEL_CIUDAD_LEAD',
    'type' => 'enum',
    'source' => 'non-db',
    'options' => 'ciudades_list',
    'massupdate' => false,
);


$dictionary['Veta_Requerimiento']['fields']['soel_mobile_phone_contact'] = array(
    'name' => 'soel_mobile_phone_contact',
    'vname' => 'LBL_SOEL_MOBILE_PHONE_CONTACT',
    'type' => 'varchar',
    'source' => 'non-db',
    'massupdate' => false,
);


$dictionary['Veta_Requerimiento']['fields']['soel_fuente_lead'] = array(
    'name' => 'soel_fuente_lead',
    'vname' => 'LBL_SOEL_FUENTE_LEAD',
    'type' => 'enum',
    'source' => 'non-db',
    'options' => 'lead_source_dom',
    'massupdate' => false,
);


// created: 2021-10-13 16:46:00
$dictionary["Veta_Requerimiento"]["fields"]["nvc_companies_veta_requerimiento"] = array (
  'name' => 'nvc_companies_veta_requerimiento',
  'type' => 'link',
  'relationship' => 'nvc_companies_veta_requerimiento',
  'source' => 'non-db',
  'module' => 'NVC_Companies',
  'bean_name' => 'NVC_Companies',
  'vname' => 'LBL_NVC_COMPANIES_VETA_REQUERIMIENTO_FROM_NVC_COMPANIES_TITLE',
  'id_name' => 'nvc_companies_veta_requerimientonvc_companies_ida',
);
$dictionary["Veta_Requerimiento"]["fields"]["nvc_companies_veta_requerimiento_name"] = array (
  'name' => 'nvc_companies_veta_requerimiento_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_NVC_COMPANIES_VETA_REQUERIMIENTO_FROM_NVC_COMPANIES_TITLE',
  'save' => true,
  'id_name' => 'nvc_companies_veta_requerimientonvc_companies_ida',
  'link' => 'nvc_companies_veta_requerimiento',
  'table' => 'nvc_companies',
  'module' => 'NVC_Companies',
  'rname' => 'name',
);
$dictionary["Veta_Requerimiento"]["fields"]["nvc_companies_veta_requerimientonvc_companies_ida"] = array (
  'name' => 'nvc_companies_veta_requerimientonvc_companies_ida',
  'type' => 'link',
  'relationship' => 'nvc_companies_veta_requerimiento',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_NVC_COMPANIES_VETA_REQUERIMIENTO_FROM_VETA_REQUERIMIENTO_TITLE',
);


$dictionary['Veta_Requerimiento']['fields']['soel_fecha_expiracion_visa_contact'] = array(
    'name' => 'soel_fecha_expiracion_visa_contact',
    'vname' => 'LBL_SOEL_FECHA_EXPIRACION_VISA_CONTACT',
    'type' => 'datetime',
    'source' => 'non-db',
    'enable_range_search' => true,
    'options' => 'date_range_search_dom',
    'massupdate' => false,
);


// created: 2021-10-23 01:58:11
$dictionary["Veta_Requerimiento"]["fields"]["nvc_companies_veta_requerimiento_1"] = array (
  'name' => 'nvc_companies_veta_requerimiento_1',
  'type' => 'link',
  'relationship' => 'nvc_companies_veta_requerimiento_1',
  'source' => 'non-db',
  'module' => 'NVC_Companies',
  'bean_name' => 'NVC_Companies',
  'vname' => 'LBL_NVC_COMPANIES_VETA_REQUERIMIENTO_1_FROM_NVC_COMPANIES_TITLE',
  'id_name' => 'nvc_companies_veta_requerimiento_1nvc_companies_ida',
);
$dictionary["Veta_Requerimiento"]["fields"]["nvc_companies_veta_requerimiento_1_name"] = array (
  'name' => 'nvc_companies_veta_requerimiento_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_NVC_COMPANIES_VETA_REQUERIMIENTO_1_FROM_NVC_COMPANIES_TITLE',
  'save' => true,
  'id_name' => 'nvc_companies_veta_requerimiento_1nvc_companies_ida',
  'link' => 'nvc_companies_veta_requerimiento_1',
  'table' => 'nvc_companies',
  'module' => 'NVC_Companies',
  'rname' => 'name',
);
$dictionary["Veta_Requerimiento"]["fields"]["nvc_companies_veta_requerimiento_1nvc_companies_ida"] = array (
  'name' => 'nvc_companies_veta_requerimiento_1nvc_companies_ida',
  'type' => 'link',
  'relationship' => 'nvc_companies_veta_requerimiento_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_NVC_COMPANIES_VETA_REQUERIMIENTO_1_FROM_VETA_REQUERIMIENTO_TITLE',
);


// created: 2020-10-14 00:58:35
$dictionary["Veta_Requerimiento"]["fields"]["veta_requerimiento_veta_presupuesto"] = array (
  'name' => 'veta_requerimiento_veta_presupuesto',
  'type' => 'link',
  'relationship' => 'veta_requerimiento_veta_presupuesto',
  'source' => 'non-db',
  'module' => 'Veta_Presupuesto',
  'bean_name' => 'Veta_Presupuesto',
  'side' => 'right',
  'vname' => 'LBL_VETA_REQUERIMIENTO_VETA_PRESUPUESTO_FROM_VETA_PRESUPUESTO_TITLE',
);


$dictionary['Veta_Requerimiento']['fields']['soel_trabajo_actual'] = array(
    'name' => 'soel_trabajo_actual',
    'vname' => 'LBL_SOEL_TRABAJO_ACTUAL',
    'type' => 'varchar',
    'source' => 'non-db',
    'massupdate' => false,
);


$dictionary['Veta_Requerimiento']['fields']['soel_home_phone_contact'] = array(
    'name' => 'soel_home_phone_contact',
    'vname' => 'LBL_SOEL_HOME_PHONE_CONTACT',
    'type' => 'varchar',
    'source' => 'non-db',
    'massupdate' => false,
);


// created: 2023-01-16 03:09:34
$dictionary["Veta_Requerimiento"]["fields"]["auto_tickets_veta_requerimiento"] = array (
  'name' => 'auto_tickets_veta_requerimiento',
  'type' => 'link',
  'relationship' => 'auto_tickets_veta_requerimiento',
  'source' => 'non-db',
  'module' => 'Auto_Tickets',
  'bean_name' => 'Auto_Tickets',
  'side' => 'right',
  'vname' => 'LBL_AUTO_TICKETS_VETA_REQUERIMIENTO_FROM_AUTO_TICKETS_TITLE',
);


$dictionary['Veta_Requerimiento']['fields']['soel_ciudad_tmp'] = array(
    'name' => 'soel_ciudad_tmp',
    'vname' => 'LBL_SOEL_CIUDAD_TMP',
    'type' => 'varchar',
    'source' => 'non-db',
    'massupdate' => false,
);


$dictionary['Veta_Requerimiento']['fields']['soel_asignado_contact'] = array(
    'name' => 'soel_asignado_contact',
    'vname' => 'LBL_SOEL_ASIGNADO_CONTACT',
    'type' => 'enum',
    'source' => 'non-db',
    'function' => 'getAsignadoLeads',
    'massupdate' => false,
);


$dictionary['Veta_Requerimiento']['fields']['soel_asignado_lead'] = array(
    'name' => 'soel_asignado_lead',
    'vname' => 'LBL_SOEL_ASIGNADO_LEAD',
    'type' => 'enum',
    'source' => 'non-db',
    'function' => 'getAsignadoLeads',
    'massupdate' => false,
);


$dictionary['Veta_Requerimiento']['fields']['soel_visa_contact'] = array(
    'name' => 'soel_visa_contact',
    'vname' => 'LBL_SOEL_VISA_CONTACT',
    'type' => 'varchar',
    'source' => 'non-db',
    'massupdate' => false,
);


// created: 2022-02-08 16:30:45
$dictionary["Veta_Requerimiento"]["fields"]["veta_requerimiento_doc_documentos_adic_1"] = array (
  'name' => 'veta_requerimiento_doc_documentos_adic_1',
  'type' => 'link',
  'relationship' => 'veta_requerimiento_doc_documentos_adic_1',
  'source' => 'non-db',
  'module' => 'Doc_Documentos_Adic',
  'bean_name' => 'Doc_Documentos_Adic',
  'vname' => 'LBL_VETA_REQUERIMIENTO_DOC_DOCUMENTOS_ADIC_1_FROM_DOC_DOCUMENTOS_ADIC_TITLE',
);


$dictionary['Veta_Requerimiento']['fields']['soel_pais_contact'] = array(
    'name' => 'soel_pais_contact',
    'vname' => 'LBL_SOEL_PAIS_CONTACT',
    'type' => 'enum',
    'source' => 'non-db',
    'options' => 'pais_list',
    'massupdate' => false,
);


// created: 2021-05-04 17:11:25
$dictionary["Veta_Requerimiento"]["fields"]["veta_requerimiento_activities_1_notes"] = array (
  'name' => 'veta_requerimiento_activities_1_notes',
  'type' => 'link',
  'relationship' => 'veta_requerimiento_activities_1_notes',
  'source' => 'non-db',
  'module' => 'Notes',
  'bean_name' => 'Note',
  'vname' => 'LBL_VETA_REQUERIMIENTO_ACTIVITIES_1_NOTES_FROM_NOTES_TITLE',
);


$dictionary['Veta_Requerimiento']['fields']['soel_docs_solicitados'] = array(
    'name' => 'soel_docs_solicitados',
    'vname' => 'LBL_SOEL_DOCS_SOLICITADOS',
    'type' => 'varchar',
    'source' => 'non-db',
);


$dictionary['Veta_Requerimiento']['fields']['soel_docs_pendientes'] = array(
    'name' => 'soel_docs_pendientes',
    'vname' => 'LBL_SOEL_DOCS_PENDIENTES',
    'type' => 'varchar',
    'source' => 'non-db',
);

$dictionary['Veta_Requerimiento']['fields']['soel_docs_cargados'] = array(
    'name' => 'soel_docs_cargados',
    'vname' => 'LBL_SOEL_DOCS_CARGADOS',
    'type' => 'varchar',
    'source' => 'non-db',
);

$dictionary['Veta_Requerimiento']['fields']['soel_docs_aprobados'] = array(
    'name' => 'soel_docs_aprobados',
    'vname' => 'LBL_SOEL_DOCS_APROBADOS',
    'type' => 'varchar',
    'source' => 'non-db',
);

$dictionary['Veta_Requerimiento']['fields']['soel_fecha_modificacion_lead'] = array(
    'name' => 'soel_fecha_modificacion_lead',
    'vname' => 'LBL_SOEL_FECHA_MODIFICACION_LEAD',
    'type' => 'datetime',
    'source' => 'non-db',
    'enable_range_search' => true,
    'options' => 'date_range_search_dom',
    'massupdate' => false,
);


// created: 2021-05-04 17:11:25
$dictionary["Veta_Requerimiento"]["fields"]["veta_requerimiento_activities_1_meetings"] = array (
  'name' => 'veta_requerimiento_activities_1_meetings',
  'type' => 'link',
  'relationship' => 'veta_requerimiento_activities_1_meetings',
  'source' => 'non-db',
  'module' => 'Meetings',
  'bean_name' => 'Meeting',
  'vname' => 'LBL_VETA_REQUERIMIENTO_ACTIVITIES_1_MEETINGS_FROM_MEETINGS_TITLE',
);


// created: 2021-05-04 17:11:25
$dictionary["Veta_Requerimiento"]["fields"]["veta_requerimiento_activities_1_emails"] = array (
  'name' => 'veta_requerimiento_activities_1_emails',
  'type' => 'link',
  'relationship' => 'veta_requerimiento_activities_1_emails',
  'source' => 'non-db',
  'module' => 'Emails',
  'bean_name' => 'Email',
  'vname' => 'LBL_VETA_REQUERIMIENTO_ACTIVITIES_1_EMAILS_FROM_EMAILS_TITLE',
);


// created: 2024-04-24 16:01:00
$dictionary["Veta_Requerimiento"]["fields"]["veta_profile_veta_requerimiento"] = array (
  'name' => 'veta_profile_veta_requerimiento',
  'type' => 'link',
  'relationship' => 'veta_profile_veta_requerimiento',
  'source' => 'non-db',
  'module' => 'Veta_Profile',
  'bean_name' => 'Veta_Profile',
  'side' => 'right',
  'vname' => 'LBL_VETA_PROFILE_VETA_REQUERIMIENTO_FROM_VETA_PROFILE_TITLE',
);


$dictionary['Veta_Requerimiento']['fields']['soel_fecha_modificacion_contact'] = array(
    'name' => 'soel_fecha_modificacion_contact',
    'vname' => 'LBL_SOEL_FECHA_MODIFICACION_CONTACT',
    'type' => 'datetime',
    'source' => 'non-db',
    'enable_range_search' => true,
    'options' => 'date_range_search_dom',
    'massupdate' => false,
);


// created: 2022-02-08 16:42:45
$dictionary["Veta_Requerimiento"]["fields"]["veta_requerimiento_doc_plantillas_1"] = array (
  'name' => 'veta_requerimiento_doc_plantillas_1',
  'type' => 'link',
  'relationship' => 'veta_requerimiento_doc_plantillas_1',
  'source' => 'non-db',
  'module' => 'Doc_Plantillas',
  'bean_name' => 'Doc_Plantillas',
  'vname' => 'LBL_VETA_REQUERIMIENTO_DOC_PLANTILLAS_1_FROM_DOC_PLANTILLAS_TITLE',
);


$dictionary['Veta_Requerimiento']['fields']['soel_home_phone_lead'] = array(
    'name' => 'soel_home_phone_lead',
    'vname' => 'LBL_SOEL_HOME_PHONE_LEAD',
    'type' => 'varchar',
    'source' => 'non-db',
    'massupdate' => false,
);


 // created: 2022-01-14 16:16:53
$dictionary['Veta_Requerimiento']['fields']['australian_sponsor_name_c']['inline_edit']='';
$dictionary['Veta_Requerimiento']['fields']['australian_sponsor_name_c']['labelValue']='Australian Sponsor\'s name';

 

 // created: 2021-10-23 02:11:14
$dictionary['Veta_Requerimiento']['fields']['company_total_c']['inline_edit']=1;

 

 // created: 2023-12-19 20:16:41
$dictionary['Veta_Requerimiento']['fields']['third_dependent_dob_c']['inline_edit']='';
$dictionary['Veta_Requerimiento']['fields']['third_dependent_dob_c']['options']='date_range_search_dom';
$dictionary['Veta_Requerimiento']['fields']['third_dependent_dob_c']['labelValue']='3rd dependent dob';
$dictionary['Veta_Requerimiento']['fields']['third_dependent_dob_c']['enable_range_search']='1';

 

 // created: 2024-07-04 22:20:38
$dictionary['Veta_Requerimiento']['fields']['opportunity_id_c']['inline_edit']=1;

 

 // created: 2023-08-30 22:24:18
$dictionary['Veta_Requerimiento']['fields']['company_first_invoice_sent_c']['inline_edit']='1';
$dictionary['Veta_Requerimiento']['fields']['company_first_invoice_sent_c']['labelValue']='Company First Invoice Sent';

 

 // created: 2022-04-06 20:42:38
$dictionary['Veta_Requerimiento']['fields']['marketing_question_1_c']['inline_edit']='1';
$dictionary['Veta_Requerimiento']['fields']['marketing_question_1_c']['labelValue']='Marketing Question 1';

 

 // created: 2022-06-01 22:14:21
$dictionary['Veta_Requerimiento']['fields']['fuente']['required']=true;

 

 // created: 2025-03-05 20:28:39
$dictionary['Veta_Requerimiento']['fields']['transferred_from_billing_c']['inline_edit']='1';
$dictionary['Veta_Requerimiento']['fields']['transferred_from_billing_c']['labelValue']='Transferred From Billing';

 

 // created: 2023-12-19 20:16:30
$dictionary['Veta_Requerimiento']['fields']['fourth_dependent_dob_c']['inline_edit']='';
$dictionary['Veta_Requerimiento']['fields']['fourth_dependent_dob_c']['options']='date_range_search_dom';
$dictionary['Veta_Requerimiento']['fields']['fourth_dependent_dob_c']['labelValue']='4th Dependent DOB';
$dictionary['Veta_Requerimiento']['fields']['fourth_dependent_dob_c']['enable_range_search']='1';

 

 // created: 2023-12-19 20:14:10
$dictionary['Veta_Requerimiento']['fields']['visa_expire_4th_dependent_date_c']['inline_edit']='1';
$dictionary['Veta_Requerimiento']['fields']['visa_expire_4th_dependent_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Requerimiento']['fields']['visa_expire_4th_dependent_date_c']['labelValue']='Visa expire 4th Dependent Date c';
$dictionary['Veta_Requerimiento']['fields']['visa_expire_4th_dependent_date_c']['enable_range_search']='1';

 

 // created: 2023-05-03 18:05:42
$dictionary['Veta_Requerimiento']['fields']['from_a_company_c']['inline_edit']='1';
$dictionary['Veta_Requerimiento']['fields']['from_a_company_c']['labelValue']='From a Company';

 

 // created: 2021-12-14 21:37:05
$dictionary['Veta_Requerimiento']['fields']['applicant_company_outstanding_c']['inline_edit']='1';
$dictionary['Veta_Requerimiento']['fields']['applicant_company_outstanding_c']['labelValue']='Applicant/Company Outstanding Amount';

 

 // created: 2026-04-13 21:17:56
$dictionary['Veta_Requerimiento']['fields']['company_industry']['required']=true;

 

 // created: 2021-12-16 18:43:55
$dictionary['Veta_Requerimiento']['fields']['australian_citizen_partner_c']['inline_edit']='';
$dictionary['Veta_Requerimiento']['fields']['australian_citizen_partner_c']['labelValue']='Australian citizen partner';

 

 // created: 2022-09-15 17:11:07
$dictionary['Veta_Requerimiento']['fields']['rcb_application_date_c']['inline_edit']='';
$dictionary['Veta_Requerimiento']['fields']['rcb_application_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Requerimiento']['fields']['rcb_application_date_c']['labelValue']='RCB Application Date';
$dictionary['Veta_Requerimiento']['fields']['rcb_application_date_c']['enable_range_search']='1';

 

 // created: 2026-01-30 20:49:02
$dictionary['Veta_Requerimiento']['fields']['workplace_location_c']['inline_edit']='1';
$dictionary['Veta_Requerimiento']['fields']['workplace_location_c']['labelValue']='Workplace Location';

 

 // created: 2021-10-23 02:11:14
$dictionary['Veta_Requerimiento']['fields']['company_outstanding_amount_c']['inline_edit']=1;

 

 // created: 2022-09-15 17:11:29
$dictionary['Veta_Requerimiento']['fields']['roi_application_date_c']['inline_edit']='';
$dictionary['Veta_Requerimiento']['fields']['roi_application_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Requerimiento']['fields']['roi_application_date_c']['labelValue']='ROI Application Date';
$dictionary['Veta_Requerimiento']['fields']['roi_application_date_c']['enable_range_search']='1';

 

 // created: 2021-12-14 22:17:35
$dictionary['Veta_Requerimiento']['fields']['currently_living_together_c']['inline_edit']='1';
$dictionary['Veta_Requerimiento']['fields']['currently_living_together_c']['labelValue']='Currently living together';

 

 // created: 2022-01-04 22:01:28
$dictionary['Veta_Requerimiento']['fields']['applicant_company_outstandin_c']['inline_edit']='1';
$dictionary['Veta_Requerimiento']['fields']['applicant_company_outstandin_c']['labelValue']='Applicant/Company Outstanding Amount';

 

 // created: 2024-07-04 22:20:38
$dictionary['Veta_Requerimiento']['fields']['previous_workflow_c']['inline_edit']='1';
$dictionary['Veta_Requerimiento']['fields']['previous_workflow_c']['labelValue']='Previous workflow';

 

 // created: 2021-12-23 20:04:49
$dictionary['Veta_Requerimiento']['fields']['company_first_payment_date_c']['inline_edit']='1';
$dictionary['Veta_Requerimiento']['fields']['company_first_payment_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Requerimiento']['fields']['company_first_payment_date_c']['labelValue']='Company first payment date';
$dictionary['Veta_Requerimiento']['fields']['company_first_payment_date_c']['enable_range_search']='1';

 

 // created: 2021-10-23 02:11:14
$dictionary['Veta_Requerimiento']['fields']['company_dept_visa_fee_base_c']['inline_edit']=1;

 

 // created: 2022-04-06 20:42:58
$dictionary['Veta_Requerimiento']['fields']['marketing_question_2_c']['inline_edit']='1';
$dictionary['Veta_Requerimiento']['fields']['marketing_question_2_c']['labelValue']='Marketing Question 2';

 

 // created: 2021-12-14 20:48:17
$dictionary['Veta_Requerimiento']['fields']['aplicant_company_total_c']['inline_edit']='1';
$dictionary['Veta_Requerimiento']['fields']['aplicant_company_total_c']['labelValue']='Aplicant/Company total to pay';

 

 // created: 2023-12-19 20:18:24
$dictionary['Veta_Requerimiento']['fields']['first_dependent_name_c']['inline_edit']='';
$dictionary['Veta_Requerimiento']['fields']['first_dependent_name_c']['labelValue']='1nd Dependent Name';

 

 // created: 2022-06-17 20:15:31
$dictionary['Veta_Requerimiento']['fields']['tbs_expectation_date_c']['inline_edit']='';
$dictionary['Veta_Requerimiento']['fields']['tbs_expectation_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Requerimiento']['fields']['tbs_expectation_date_c']['labelValue']='TBS Expectation date';
$dictionary['Veta_Requerimiento']['fields']['tbs_expectation_date_c']['enable_range_search']='1';

 

 // created: 2021-10-23 02:11:14
$dictionary['Veta_Requerimiento']['fields']['company_deposits_c']['inline_edit']=1;

 

 // created: 2021-12-23 20:30:16
$dictionary['Veta_Requerimiento']['fields']['visa_expire_secondary_applicant_date_c']['inline_edit']='1';
$dictionary['Veta_Requerimiento']['fields']['visa_expire_secondary_applicant_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Requerimiento']['fields']['visa_expire_secondary_applicant_date_c']['labelValue']='Visa expire Secondary Applicant date';
$dictionary['Veta_Requerimiento']['fields']['visa_expire_secondary_applicant_date_c']['enable_range_search']='1';

 

 // created: 2021-10-23 02:11:14
$dictionary['Veta_Requerimiento']['fields']['company_total_without_gst_c']['inline_edit']=1;

 

 // created: 2021-12-14 21:35:47
$dictionary['Veta_Requerimiento']['fields']['applicant_company_mmm_fees_without_gst_c']['inline_edit']='1';
$dictionary['Veta_Requerimiento']['fields']['applicant_company_mmm_fees_without_gst_c']['labelValue']='Applicant/Company MMM Fees Without GST';

 

 // created: 2022-09-15 17:07:40
$dictionary['Veta_Requerimiento']['fields']['eoi_appoval_date_c']['inline_edit']='';
$dictionary['Veta_Requerimiento']['fields']['eoi_appoval_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Requerimiento']['fields']['eoi_appoval_date_c']['labelValue']='EOI Appoval Date';
$dictionary['Veta_Requerimiento']['fields']['eoi_appoval_date_c']['enable_range_search']='1';

 

 // created: 2021-10-23 05:24:54
$dictionary['Veta_Requerimiento']['fields']['company_aditional_services_c']['inline_edit']='';
$dictionary['Veta_Requerimiento']['fields']['company_aditional_services_c']['labelValue']='Company Aditional Services';

 

 // created: 2021-10-23 05:24:37
$dictionary['Veta_Requerimiento']['fields']['applicant_aditional_services_c']['inline_edit']='';
$dictionary['Veta_Requerimiento']['fields']['applicant_aditional_services_c']['labelValue']='Applicant Aditional Services';

 

 // created: 2023-12-19 20:19:42
$dictionary['Veta_Requerimiento']['fields']['fourth_dependent_c']['inline_edit']='';
$dictionary['Veta_Requerimiento']['fields']['fourth_dependent_c']['labelValue']='Fourth Dependent ?';

 

 // created: 2024-11-26 00:16:56
$dictionary['Veta_Requerimiento']['fields']['estado_semaforizacion_c']['inline_edit']='1';
$dictionary['Veta_Requerimiento']['fields']['estado_semaforizacion_c']['labelValue']='Follow-up status';

 

 // created: 2022-09-15 17:12:16
$dictionary['Veta_Requerimiento']['fields']['rcb_expectation_date_c']['inline_edit']='';
$dictionary['Veta_Requerimiento']['fields']['rcb_expectation_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Requerimiento']['fields']['rcb_expectation_date_c']['labelValue']='RCB Expectation Date';
$dictionary['Veta_Requerimiento']['fields']['rcb_expectation_date_c']['enable_range_search']='1';

 

 // created: 2021-12-14 21:39:27
$dictionary['Veta_Requerimiento']['fields']['applicant_company_total_paid_c']['inline_edit']='1';
$dictionary['Veta_Requerimiento']['fields']['applicant_company_total_paid_c']['labelValue']='Applicant/Company total paid';

 

 // created: 2023-08-04 19:55:24
$dictionary['Veta_Requerimiento']['fields']['consultation_fee_to_company_c']['inline_edit']='1';
$dictionary['Veta_Requerimiento']['fields']['consultation_fee_to_company_c']['labelValue']='Consultation Fee To Company';

 

 // created: 2021-10-22 15:54:26
$dictionary['Veta_Requerimiento']['fields']['company_selection_c']['inline_edit']='1';
$dictionary['Veta_Requerimiento']['fields']['company_selection_c']['labelValue']='Company Selection';

 

 // created: 2022-06-17 20:16:00
$dictionary['Veta_Requerimiento']['fields']['tbs_approval_date_c']['inline_edit']='';
$dictionary['Veta_Requerimiento']['fields']['tbs_approval_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Requerimiento']['fields']['tbs_approval_date_c']['labelValue']='TBS Approval Date';
$dictionary['Veta_Requerimiento']['fields']['tbs_approval_date_c']['enable_range_search']='1';

 

 // created: 2025-03-05 20:28:39
$dictionary['Veta_Requerimiento']['fields']['veta_recibo_id_c']['inline_edit']=1;

 

 // created: 2023-12-19 20:14:33
$dictionary['Veta_Requerimiento']['fields']['visa_expire_2nd_dependent_date_c']['inline_edit']='1';
$dictionary['Veta_Requerimiento']['fields']['visa_expire_2nd_dependent_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Requerimiento']['fields']['visa_expire_2nd_dependent_date_c']['labelValue']='Visa expire 2nd Dependent date';
$dictionary['Veta_Requerimiento']['fields']['visa_expire_2nd_dependent_date_c']['enable_range_search']='1';

 

 // created: 2021-10-15 16:16:48

 

 // created: 2022-09-15 17:08:54
$dictionary['Veta_Requerimiento']['fields']['roi_approval_date_c']['inline_edit']='';
$dictionary['Veta_Requerimiento']['fields']['roi_approval_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Requerimiento']['fields']['roi_approval_date_c']['labelValue']='ROI Approval Date';
$dictionary['Veta_Requerimiento']['fields']['roi_approval_date_c']['enable_range_search']='1';

 

 // created: 2021-12-22 22:58:51
$dictionary['Veta_Requerimiento']['fields']['fecha_viaje_txt']['required']=false;

 

 // created: 2022-09-15 17:11:55
$dictionary['Veta_Requerimiento']['fields']['roi_expectation_date_c']['inline_edit']='';
$dictionary['Veta_Requerimiento']['fields']['roi_expectation_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Requerimiento']['fields']['roi_expectation_date_c']['labelValue']='ROI Expectation Date';
$dictionary['Veta_Requerimiento']['fields']['roi_expectation_date_c']['enable_range_search']='1';

 

 // created: 2025-03-05 17:05:26
$dictionary['Veta_Requerimiento']['fields']['veta_abntaxfile_id_c']['inline_edit']=1;

 

 // created: 2022-05-24 15:44:00
$dictionary['Veta_Requerimiento']['fields']['industry_c']['inline_edit']='';
$dictionary['Veta_Requerimiento']['fields']['industry_c']['labelValue']='Industry';

 

 // created: 2021-10-23 02:11:14
$dictionary['Veta_Requerimiento']['fields']['company_dept_cc_surcharge_c']['inline_edit']=1;

 

 // created: 2023-12-19 20:17:09
$dictionary['Veta_Requerimiento']['fields']['second_dependent_dob']['len']='';
$dictionary['Veta_Requerimiento']['fields']['second_dependent_dob']['options']='date_range_search_dom';
$dictionary['Veta_Requerimiento']['fields']['second_dependent_dob']['enable_range_search']='1';

 

 // created: 2022-06-16 23:50:52
$dictionary['Veta_Requerimiento']['fields']['nomination_approval_date_c']['inline_edit']='';
$dictionary['Veta_Requerimiento']['fields']['nomination_approval_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Requerimiento']['fields']['nomination_approval_date_c']['labelValue']='Nomination Approval Date';
$dictionary['Veta_Requerimiento']['fields']['nomination_approval_date_c']['enable_range_search']='1';

 

 // created: 2023-12-19 20:20:11
$dictionary['Veta_Requerimiento']['fields']['secondary_dependent_c']['inline_edit']='';
$dictionary['Veta_Requerimiento']['fields']['secondary_dependent_c']['labelValue']='Secondary Dependent ?';

 

 // created: 2021-10-22 15:54:26
$dictionary['Veta_Requerimiento']['fields']['nvc_companies_id_c']['inline_edit']=1;

 

 // created: 2022-01-11 16:00:11
$dictionary['Veta_Requerimiento']['fields']['sponsored_australian_citizen_c']['inline_edit']='';
$dictionary['Veta_Requerimiento']['fields']['sponsored_australian_citizen_c']['labelValue']='Sponsored by Australian citizen';

 

 // created: 2021-10-23 02:11:14
$dictionary['Veta_Requerimiento']['fields']['company_discount_c']['inline_edit']=1;

 

 // created: 2023-12-19 20:14:43
$dictionary['Veta_Requerimiento']['fields']['visa_expire_1st_dependent_date_c']['inline_edit']='1';
$dictionary['Veta_Requerimiento']['fields']['visa_expire_1st_dependent_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Requerimiento']['fields']['visa_expire_1st_dependent_date_c']['labelValue']='Visa expire 1st dependent date';
$dictionary['Veta_Requerimiento']['fields']['visa_expire_1st_dependent_date_c']['enable_range_search']='1';

 

 // created: 2021-11-30 20:11:07
$dictionary['Veta_Requerimiento']['fields']['lead_id_c']['inline_edit']=1;

 

 // created: 2023-01-10 22:27:29
$dictionary['Veta_Requerimiento']['fields']['url_c']['inline_edit']='1';
$dictionary['Veta_Requerimiento']['fields']['url_c']['labelValue']='URL';

 

 // created: 2025-10-07 16:22:50
$dictionary['Veta_Requerimiento']['fields']['current_visa_subclass']['required']=true;

 

 // created: 2024-11-26 00:16:42
$dictionary['Veta_Requerimiento']['fields']['detalle_semaforizacion_c']['inline_edit']='1';
$dictionary['Veta_Requerimiento']['fields']['detalle_semaforizacion_c']['labelValue']='Follow-up detail';

 

 // created: 2021-10-23 02:11:14
$dictionary['Veta_Requerimiento']['fields']['company_lead_id_c']['inline_edit']=1;

 

 // created: 2024-06-17 19:45:13
$dictionary['Veta_Requerimiento']['fields']['de_posventa_c']['inline_edit']='1';
$dictionary['Veta_Requerimiento']['fields']['de_posventa_c']['labelValue']='From Postsale';

 

 // created: 2022-06-17 20:17:29
$dictionary['Veta_Requerimiento']['fields']['labour_expectation_date_c']['inline_edit']='';
$dictionary['Veta_Requerimiento']['fields']['labour_expectation_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Requerimiento']['fields']['labour_expectation_date_c']['labelValue']='Labour Expectation date';
$dictionary['Veta_Requerimiento']['fields']['labour_expectation_date_c']['enable_range_search']='1';

 

 // created: 2022-09-15 17:12:40
$dictionary['Veta_Requerimiento']['fields']['eoi_expectation_date_c']['inline_edit']='';
$dictionary['Veta_Requerimiento']['fields']['eoi_expectation_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Requerimiento']['fields']['eoi_expectation_date_c']['labelValue']='EOI Expectation Date';
$dictionary['Veta_Requerimiento']['fields']['eoi_expectation_date_c']['enable_range_search']='1';

 

 // created: 2023-12-19 20:19:58
$dictionary['Veta_Requerimiento']['fields']['first_dependent_c']['inline_edit']='';
$dictionary['Veta_Requerimiento']['fields']['first_dependent_c']['labelValue']='First Dependent ?';

 

 // created: 2022-02-23 18:13:23
$dictionary['Veta_Requerimiento']['fields']['company_stage_c']['inline_edit']='';
$dictionary['Veta_Requerimiento']['fields']['company_stage_c']['labelValue']='Company Stage';

 

 // created: 2023-06-06 21:22:20
$dictionary['Veta_Requerimiento']['fields']['secondary_applicant_c']['inline_edit']='1';
$dictionary['Veta_Requerimiento']['fields']['secondary_applicant_c']['labelValue']='Secondary Applicant ?';

 

 // created: 2022-12-21 20:53:51
$dictionary['Veta_Requerimiento']['fields']['migration_manager_password_c']['inline_edit']='1';
$dictionary['Veta_Requerimiento']['fields']['migration_manager_password_c']['labelValue']='Migration Manager Password';

 

 // created: 2021-12-14 21:37:54
$dictionary['Veta_Requerimiento']['fields']['applicant_company_total_c']['inline_edit']='1';
$dictionary['Veta_Requerimiento']['fields']['applicant_company_total_c']['labelValue']='Applicant/Company total';

 

 // created: 2021-10-23 02:11:14
$dictionary['Veta_Requerimiento']['fields']['company_gst_c']['inline_edit']=1;

 

 // created: 2021-12-14 22:16:22
$dictionary['Veta_Requerimiento']['fields']['carrera_universitaria_c']['inline_edit']='1';
$dictionary['Veta_Requerimiento']['fields']['carrera_universitaria_c']['labelValue']='Univertity Career';

 

 // created: 2022-09-15 17:10:20
$dictionary['Veta_Requerimiento']['fields']['eoi_application_date_c']['inline_edit']='';
$dictionary['Veta_Requerimiento']['fields']['eoi_application_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Requerimiento']['fields']['eoi_application_date_c']['labelValue']='EOI Application Date';
$dictionary['Veta_Requerimiento']['fields']['eoi_application_date_c']['enable_range_search']='1';

 

 // created: 2022-05-24 15:45:41
$dictionary['Veta_Requerimiento']['fields']['applicant_industry_c']['inline_edit']='';
$dictionary['Veta_Requerimiento']['fields']['applicant_industry_c']['labelValue']='Applicant Industry';

 

 // created: 2022-12-21 20:53:16
$dictionary['Veta_Requerimiento']['fields']['migration_manager_user_c']['inline_edit']='1';
$dictionary['Veta_Requerimiento']['fields']['migration_manager_user_c']['labelValue']='Migration Manager User';

 

 // created: 2023-12-19 20:18:05
$dictionary['Veta_Requerimiento']['fields']['fourth_dependent_name_c']['inline_edit']='';
$dictionary['Veta_Requerimiento']['fields']['fourth_dependent_name_c']['labelValue']='4th Dependent Name';

 

 // created: 2023-12-19 20:16:56
$dictionary['Veta_Requerimiento']['fields']['first_dependent_dob_c']['inline_edit']='';
$dictionary['Veta_Requerimiento']['fields']['first_dependent_dob_c']['labelValue']='1nd Dependent DOB';

 

 // created: 2022-09-15 17:08:04
$dictionary['Veta_Requerimiento']['fields']['rcb_approval_date_c']['inline_edit']='';
$dictionary['Veta_Requerimiento']['fields']['rcb_approval_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Requerimiento']['fields']['rcb_approval_date_c']['labelValue']='RCB Approval Date';
$dictionary['Veta_Requerimiento']['fields']['rcb_approval_date_c']['enable_range_search']='1';

 

 // created: 2022-06-16 23:52:54
$dictionary['Veta_Requerimiento']['fields']['labour_application_date_c']['inline_edit']='';
$dictionary['Veta_Requerimiento']['fields']['labour_application_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Requerimiento']['fields']['labour_application_date_c']['labelValue']='Labour Application Date';
$dictionary['Veta_Requerimiento']['fields']['labour_application_date_c']['enable_range_search']='1';

 

 // created: 2023-06-06 21:18:34
$dictionary['Veta_Requerimiento']['fields']['has_secondary_applicant_c']['inline_edit']='1';
$dictionary['Veta_Requerimiento']['fields']['has_secondary_applicant_c']['labelValue']='Has Secondary Applicant ?';

 

 // created: 2023-01-11 22:04:57

 

 // created: 2021-12-14 20:51:31
$dictionary['Veta_Requerimiento']['fields']['currency_id']['inline_edit']=1;

 

 // created: 2022-01-18 20:30:40
$dictionary['Veta_Requerimiento']['fields']['applicant_email_c']['inline_edit']='';
$dictionary['Veta_Requerimiento']['fields']['applicant_email_c']['labelValue']='Applicant email';

 

 // created: 2023-08-30 22:24:00
$dictionary['Veta_Requerimiento']['fields']['applicant_first_invoice_sent_c']['inline_edit']='1';
$dictionary['Veta_Requerimiento']['fields']['applicant_first_invoice_sent_c']['labelValue']='Applicant First Invoice Sent';

 

 // created: 2022-06-17 20:15:07
$dictionary['Veta_Requerimiento']['fields']['tbs_application_date_c']['inline_edit']='';
$dictionary['Veta_Requerimiento']['fields']['tbs_application_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Requerimiento']['fields']['tbs_application_date_c']['labelValue']='TBS Application Date';
$dictionary['Veta_Requerimiento']['fields']['tbs_application_date_c']['enable_range_search']='1';

 

 // created: 2023-12-19 20:14:22
$dictionary['Veta_Requerimiento']['fields']['visa_expire_3rd_dependent_date_c']['inline_edit']='1';
$dictionary['Veta_Requerimiento']['fields']['visa_expire_3rd_dependent_date_c']['options']='date_range_search_dom';
$dictionary['Veta_Requerimiento']['fields']['visa_expire_3rd_dependent_date_c']['labelValue']='Visa expire 3rd Dependent date';
$dictionary['Veta_Requerimiento']['fields']['visa_expire_3rd_dependent_date_c']['enable_range_search']='1';

 

 // created: 2021-12-22 22:58:58
$dictionary['Veta_Requerimiento']['fields']['fecha_viaje']['required']=false;

 

 // created: 2023-12-19 20:20:21
$dictionary['Veta_Requerimiento']['fields']['third_dependent_c']['inline_edit']='';
$dictionary['Veta_Requerimiento']['fields']['third_dependent_c']['labelValue']='Third Dependent ?';

 

 // created: 2023-07-04 20:27:44
$dictionary['Veta_Requerimiento']['fields']['company_turnover_c']['inline_edit']='';
$dictionary['Veta_Requerimiento']['fields']['company_turnover_c']['labelValue']='Company Turnover';

 
?>