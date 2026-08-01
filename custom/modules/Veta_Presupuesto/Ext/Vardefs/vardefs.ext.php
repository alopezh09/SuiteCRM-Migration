<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2020-10-14 00:58:35
$dictionary["Veta_Presupuesto"]["fields"]["veta_requerimiento_veta_presupuesto"] = array (
  'name' => 'veta_requerimiento_veta_presupuesto',
  'type' => 'link',
  'relationship' => 'veta_requerimiento_veta_presupuesto',
  'source' => 'non-db',
  'module' => 'Veta_Requerimiento',
  'bean_name' => 'Veta_Requerimiento',
  'vname' => 'LBL_VETA_REQUERIMIENTO_VETA_PRESUPUESTO_FROM_VETA_REQUERIMIENTO_TITLE',
  'id_name' => 'veta_requerimiento_veta_presupuestoveta_requerimiento_ida',
);
$dictionary["Veta_Presupuesto"]["fields"]["veta_requerimiento_veta_presupuesto_name"] = array (
  'name' => 'veta_requerimiento_veta_presupuesto_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VETA_REQUERIMIENTO_VETA_PRESUPUESTO_FROM_VETA_REQUERIMIENTO_TITLE',
  'save' => true,
  'id_name' => 'veta_requerimiento_veta_presupuestoveta_requerimiento_ida',
  'link' => 'veta_requerimiento_veta_presupuesto',
  'table' => 'veta_requerimiento',
  'module' => 'Veta_Requerimiento',
  'rname' => 'name',
);
$dictionary["Veta_Presupuesto"]["fields"]["veta_requerimiento_veta_presupuestoveta_requerimiento_ida"] = array (
  'name' => 'veta_requerimiento_veta_presupuestoveta_requerimiento_ida',
  'type' => 'link',
  'relationship' => 'veta_requerimiento_veta_presupuesto',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VETA_REQUERIMIENTO_VETA_PRESUPUESTO_FROM_VETA_PRESUPUESTO_TITLE',
);


// created: 2023-01-16 03:09:34
$dictionary["Veta_Presupuesto"]["fields"]["auto_tickets_veta_presupuesto"] = array (
  'name' => 'auto_tickets_veta_presupuesto',
  'type' => 'link',
  'relationship' => 'auto_tickets_veta_presupuesto',
  'source' => 'non-db',
  'module' => 'Auto_Tickets',
  'bean_name' => 'Auto_Tickets',
  'side' => 'right',
  'vname' => 'LBL_AUTO_TICKETS_VETA_PRESUPUESTO_FROM_AUTO_TICKETS_TITLE',
);


// created: 2020-10-14 00:58:33
$dictionary["Veta_Presupuesto"]["fields"]["veta_presupuesto_emails"] = array (
  'name' => 'veta_presupuesto_emails',
  'type' => 'link',
  'relationship' => 'veta_presupuesto_emails',
  'source' => 'non-db',
  'module' => 'Emails',
  'bean_name' => 'Email',
  'side' => 'right',
  'vname' => 'LBL_VETA_PRESUPUESTO_EMAILS_FROM_EMAILS_TITLE',
);


$dictionary['Veta_Presupuesto']['fields']['soel_asegurador'] = array(
    'name' => 'soel_asegurador',
    'vname' => 'LBL_SOEL_ASEGURADOR',
    'type' => 'enum',
    'source' => 'non-db',
    'function' => 'getAseguradores',
);


// created: 2020-10-14 00:58:33
$dictionary["Veta_Presupuesto"]["fields"]["veta_presupuesto_contacts"] = array (
  'name' => 'veta_presupuesto_contacts',
  'type' => 'link',
  'relationship' => 'veta_presupuesto_contacts',
  'source' => 'non-db',
  'module' => 'Contacts',
  'bean_name' => 'Contact',
  'vname' => 'LBL_VETA_PRESUPUESTO_CONTACTS_FROM_CONTACTS_TITLE',
  'id_name' => 'veta_presupuesto_contactscontacts_ida',
);
$dictionary["Veta_Presupuesto"]["fields"]["veta_presupuesto_contacts_name"] = array (
  'name' => 'veta_presupuesto_contacts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VETA_PRESUPUESTO_CONTACTS_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'veta_presupuesto_contactscontacts_ida',
  'link' => 'veta_presupuesto_contacts',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Veta_Presupuesto"]["fields"]["veta_presupuesto_contactscontacts_ida"] = array (
  'name' => 'veta_presupuesto_contactscontacts_ida',
  'type' => 'link',
  'relationship' => 'veta_presupuesto_contacts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VETA_PRESUPUESTO_CONTACTS_FROM_VETA_PRESUPUESTO_TITLE',
);


// created: 2020-10-14 00:58:24
$dictionary["Veta_Presupuesto"]["fields"]["veta_detallepresupuesto_veta_presupuesto"] = array (
  'name' => 'veta_detallepresupuesto_veta_presupuesto',
  'type' => 'link',
  'relationship' => 'veta_detallepresupuesto_veta_presupuesto',
  'source' => 'non-db',
  'module' => 'Veta_DetallePresupuesto',
  'bean_name' => 'Veta_DetallePresupuesto',
  'side' => 'right',
  'vname' => 'LBL_VETA_DETALLEPRESUPUESTO_VETA_PRESUPUESTO_FROM_VETA_DETALLEPRESUPUESTO_TITLE',
);


// created: 2020-10-14 00:58:34
$dictionary["Veta_Presupuesto"]["fields"]["veta_recibo_veta_presupuesto"] = array (
  'name' => 'veta_recibo_veta_presupuesto',
  'type' => 'link',
  'relationship' => 'veta_recibo_veta_presupuesto',
  'source' => 'non-db',
  'module' => 'Veta_Recibo',
  'bean_name' => 'Veta_Recibo',
  'side' => 'right',
  'vname' => 'LBL_VETA_RECIBO_VETA_PRESUPUESTO_FROM_VETA_RECIBO_TITLE',
);


// created: 2020-10-14 00:58:33
$dictionary["Veta_Presupuesto"]["fields"]["veta_presupuesto_leads"] = array (
  'name' => 'veta_presupuesto_leads',
  'type' => 'link',
  'relationship' => 'veta_presupuesto_leads',
  'source' => 'non-db',
  'module' => 'Leads',
  'bean_name' => 'Lead',
  'vname' => 'LBL_VETA_PRESUPUESTO_LEADS_FROM_LEADS_TITLE',
  'id_name' => 'veta_presupuesto_leadsleads_ida',
);
$dictionary["Veta_Presupuesto"]["fields"]["veta_presupuesto_leads_name"] = array (
  'name' => 'veta_presupuesto_leads_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VETA_PRESUPUESTO_LEADS_FROM_LEADS_TITLE',
  'save' => true,
  'id_name' => 'veta_presupuesto_leadsleads_ida',
  'link' => 'veta_presupuesto_leads',
  'table' => 'leads',
  'module' => 'Leads',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Veta_Presupuesto"]["fields"]["veta_presupuesto_leadsleads_ida"] = array (
  'name' => 'veta_presupuesto_leadsleads_ida',
  'type' => 'link',
  'relationship' => 'veta_presupuesto_leads',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VETA_PRESUPUESTO_LEADS_FROM_VETA_PRESUPUESTO_TITLE',
);


// created: 2023-05-03 21:44:15
$dictionary["Veta_Presupuesto"]["fields"]["nvc_companies_veta_presupuesto_1"] = array (
  'name' => 'nvc_companies_veta_presupuesto_1',
  'type' => 'link',
  'relationship' => 'nvc_companies_veta_presupuesto_1',
  'source' => 'non-db',
  'module' => 'NVC_Companies',
  'bean_name' => 'NVC_Companies',
  'vname' => 'LBL_NVC_COMPANIES_VETA_PRESUPUESTO_1_FROM_NVC_COMPANIES_TITLE',
  'id_name' => 'nvc_companies_veta_presupuesto_1nvc_companies_ida',
);
$dictionary["Veta_Presupuesto"]["fields"]["nvc_companies_veta_presupuesto_1_name"] = array (
  'name' => 'nvc_companies_veta_presupuesto_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_NVC_COMPANIES_VETA_PRESUPUESTO_1_FROM_NVC_COMPANIES_TITLE',
  'save' => true,
  'id_name' => 'nvc_companies_veta_presupuesto_1nvc_companies_ida',
  'link' => 'nvc_companies_veta_presupuesto_1',
  'table' => 'nvc_companies',
  'module' => 'NVC_Companies',
  'rname' => 'name',
);
$dictionary["Veta_Presupuesto"]["fields"]["nvc_companies_veta_presupuesto_1nvc_companies_ida"] = array (
  'name' => 'nvc_companies_veta_presupuesto_1nvc_companies_ida',
  'type' => 'link',
  'relationship' => 'nvc_companies_veta_presupuesto_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_NVC_COMPANIES_VETA_PRESUPUESTO_1_FROM_VETA_PRESUPUESTO_TITLE',
);


 // created: 2022-02-03 21:29:36
$dictionary['Veta_Presupuesto']['fields']['veta_tiposvisa_id11_c']['inline_edit']=1;

 

 // created: 2021-11-19 19:34:50
$dictionary['Veta_Presupuesto']['fields']['tipo_visa']['duplicate_merge']='enabled';
$dictionary['Veta_Presupuesto']['fields']['tipo_visa']['duplicate_merge_dom_value']='1';

 

 // created: 2022-02-07 16:03:37
$dictionary['Veta_Presupuesto']['fields']['emailtemplate_id1_c']['inline_edit']=1;

 

 // created: 2022-02-04 17:43:51
$dictionary['Veta_Presupuesto']['fields']['send_quote_to_applicant_and_company_c']['inline_edit']='1';
$dictionary['Veta_Presupuesto']['fields']['send_quote_to_applicant_and_company_c']['labelValue']='Send Both Quote to applicant';

 

 // created: 2021-12-06 19:01:28
$dictionary['Veta_Presupuesto']['fields']['department_visa_fee_1_c']['inline_edit']='';
$dictionary['Veta_Presupuesto']['fields']['department_visa_fee_1_c']['labelValue']='Department´s Visa Fee - 1';

 

 // created: 2021-11-19 21:56:49
$dictionary['Veta_Presupuesto']['fields']['veta_tiposvisa_id1_c']['inline_edit']=1;

 

 // created: 2021-12-06 19:04:53
$dictionary['Veta_Presupuesto']['fields']['department_visa_fee_5_c']['inline_edit']='';
$dictionary['Veta_Presupuesto']['fields']['department_visa_fee_5_c']['labelValue']='Department´s Visa Fee - 5';

 

 // created: 2022-02-04 17:44:02
$dictionary['Veta_Presupuesto']['fields']['send_both_quote_to_company_c']['inline_edit']='1';
$dictionary['Veta_Presupuesto']['fields']['send_both_quote_to_company_c']['labelValue']='Send Both Quote to company';

 

 // created: 2022-02-07 16:06:28
$dictionary['Veta_Presupuesto']['fields']['send_both_quote_to_applicant_c']['inline_edit']='1';
$dictionary['Veta_Presupuesto']['fields']['send_both_quote_to_applicant_c']['labelValue']='Send Both Quote to applicant';

 

 // created: 2022-02-07 16:03:53
$dictionary['Veta_Presupuesto']['fields']['emailtemplate_id2_c']['inline_edit']=1;

 

 // created: 2021-12-06 19:04:52
$dictionary['Veta_Presupuesto']['fields']['veta_tiposvisa_id6_c']['inline_edit']=1;

 

 // created: 2021-12-06 19:01:28
$dictionary['Veta_Presupuesto']['fields']['veta_tiposvisa_id2_c']['inline_edit']=1;

 

 // created: 2021-11-19 21:56:49
$dictionary['Veta_Presupuesto']['fields']['visa_subclass_2_c']['inline_edit']='';
$dictionary['Veta_Presupuesto']['fields']['visa_subclass_2_c']['labelValue']='visa subclass 2';

 

 // created: 2021-12-06 19:08:01
$dictionary['Veta_Presupuesto']['fields']['department_visa_fee_company4_c']['inline_edit']='';
$dictionary['Veta_Presupuesto']['fields']['department_visa_fee_company4_c']['labelValue']='Department´s Visa Fee - 4';

 

 // created: 2022-01-12 20:15:43
$dictionary['Veta_Presupuesto']['fields']['total_visa_company_c']['inline_edit']='';
$dictionary['Veta_Presupuesto']['fields']['total_visa_company_c']['labelValue']='Total Visa Company';

 

 // created: 2021-12-06 19:04:24
$dictionary['Veta_Presupuesto']['fields']['department_visa_fee_4_c']['inline_edit']='';
$dictionary['Veta_Presupuesto']['fields']['department_visa_fee_4_c']['labelValue']='Department´s Visa Fee - 4';

 

 // created: 2021-12-06 19:08:01
$dictionary['Veta_Presupuesto']['fields']['veta_tiposvisa_id10_c']['inline_edit']=1;

 

 // created: 2022-02-07 16:03:37
$dictionary['Veta_Presupuesto']['fields']['applicant_email_template_c']['inline_edit']='1';
$dictionary['Veta_Presupuesto']['fields']['applicant_email_template_c']['labelValue']='Applicant Email Template';

 

 // created: 2021-12-06 19:05:10
$dictionary['Veta_Presupuesto']['fields']['department_visa_fee_3_c']['inline_edit']='';
$dictionary['Veta_Presupuesto']['fields']['department_visa_fee_3_c']['labelValue']='Department´s Visa Fee - 3';

 

 // created: 2021-12-06 19:06:36
$dictionary['Veta_Presupuesto']['fields']['department_visa_fee_company1_c']['inline_edit']='';
$dictionary['Veta_Presupuesto']['fields']['department_visa_fee_company1_c']['labelValue']='Department´s Visa Fee - 1';

 

 // created: 2021-12-06 19:02:34
$dictionary['Veta_Presupuesto']['fields']['department_visa_fee_2_c']['inline_edit']='';
$dictionary['Veta_Presupuesto']['fields']['department_visa_fee_2_c']['labelValue']='Department´s Visa Fee - 2';

 

 // created: 2022-02-03 21:30:06
$dictionary['Veta_Presupuesto']['fields']['veta_tiposvisa_id12_c']['inline_edit']=1;

 

 // created: 2021-12-06 19:07:32
$dictionary['Veta_Presupuesto']['fields']['department_visa_fee_company3_c']['inline_edit']='';
$dictionary['Veta_Presupuesto']['fields']['department_visa_fee_company3_c']['labelValue']='Department´s Visa Fee - 3';

 

 // created: 2021-12-06 19:07:05
$dictionary['Veta_Presupuesto']['fields']['veta_tiposvisa_id8_c']['inline_edit']=1;

 

 // created: 2021-10-18 19:25:16
$dictionary['Veta_Presupuesto']['fields']['name']['full_text_search']=array (
);

 

 // created: 2021-12-06 19:04:24
$dictionary['Veta_Presupuesto']['fields']['veta_tiposvisa_id5_c']['inline_edit']=1;

 

 // created: 2021-12-06 19:07:32
$dictionary['Veta_Presupuesto']['fields']['veta_tiposvisa_id9_c']['inline_edit']=1;

 

 // created: 2021-10-18 19:29:50
$dictionary['Veta_Presupuesto']['fields']['company_total_visa_c']['inline_edit']='1';
$dictionary['Veta_Presupuesto']['fields']['company_total_visa_c']['labelValue']='company total visa c';

 

 // created: 2021-12-06 19:07:05
$dictionary['Veta_Presupuesto']['fields']['department_visa_fee_company2_c']['inline_edit']='';
$dictionary['Veta_Presupuesto']['fields']['department_visa_fee_company2_c']['labelValue']='Department´s Visa Fee - 2';

 

 // created: 2022-02-02 17:24:12
$dictionary['Veta_Presupuesto']['fields']['email_template_c']['inline_edit']='';
$dictionary['Veta_Presupuesto']['fields']['email_template_c']['labelValue']='Email Template';

 

 // created: 2022-02-03 21:29:36
$dictionary['Veta_Presupuesto']['fields']['department_visa_fee_6_c']['inline_edit']='';
$dictionary['Veta_Presupuesto']['fields']['department_visa_fee_6_c']['labelValue']='Department´s Visa Fee - 6';

 

 // created: 2022-01-11 16:02:42
$dictionary['Veta_Presupuesto']['fields']['sponsored_australian_citizen_c']['inline_edit']='';
$dictionary['Veta_Presupuesto']['fields']['sponsored_australian_citizen_c']['labelValue']='Sponsored by Australian citizen';

 

 // created: 2021-10-14 14:37:18
$dictionary['Veta_Presupuesto']['fields']['company_discount_c']['inline_edit']='';
$dictionary['Veta_Presupuesto']['fields']['company_discount_c']['labelValue']='Company Discount';

 

 // created: 2021-12-06 19:06:36
$dictionary['Veta_Presupuesto']['fields']['veta_tiposvisa_id7_c']['inline_edit']=1;

 

 // created: 2021-12-06 19:02:34
$dictionary['Veta_Presupuesto']['fields']['veta_tiposvisa_id3_c']['inline_edit']=1;

 

 // created: 2022-02-02 17:24:12
$dictionary['Veta_Presupuesto']['fields']['emailtemplate_id_c']['inline_edit']=1;

 

 // created: 2021-12-06 19:03:00
$dictionary['Veta_Presupuesto']['fields']['veta_tiposvisa_id4_c']['inline_edit']=1;

 

 // created: 2022-02-07 16:03:53
$dictionary['Veta_Presupuesto']['fields']['company_email_template_c']['inline_edit']='1';
$dictionary['Veta_Presupuesto']['fields']['company_email_template_c']['labelValue']='Company Email Template';

 

 // created: 2022-01-12 20:16:00
$dictionary['Veta_Presupuesto']['fields']['total_visa']['required']=false;

 

 // created: 2022-02-03 21:30:06
$dictionary['Veta_Presupuesto']['fields']['department_visa_fee_7_c']['inline_edit']='';
$dictionary['Veta_Presupuesto']['fields']['department_visa_fee_7_c']['labelValue']='Department´s Visa Fee - 7';

 
?>