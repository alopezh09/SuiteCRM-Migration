<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2020-10-14 00:58:31
$dictionary["Email"]["fields"]["veta_pagocolegios_activities_emails"] = array (
  'name' => 'veta_pagocolegios_activities_emails',
  'type' => 'link',
  'relationship' => 'veta_pagocolegios_activities_emails',
  'source' => 'non-db',
  'module' => 'Veta_PagoColegios',
  'bean_name' => 'Veta_PagoColegios',
  'vname' => 'LBL_VETA_PAGOCOLEGIOS_ACTIVITIES_EMAILS_FROM_VETA_PAGOCOLEGIOS_TITLE',
);


// created: 2020-10-14 00:58:38
$dictionary["Email"]["fields"]["veta_visa_activities_emails"] = array (
  'name' => 'veta_visa_activities_emails',
  'type' => 'link',
  'relationship' => 'veta_visa_activities_emails',
  'source' => 'non-db',
  'module' => 'Veta_Visa',
  'bean_name' => 'Veta_Visa',
  'vname' => 'LBL_VETA_VISA_ACTIVITIES_EMAILS_FROM_VETA_VISA_TITLE',
);


// created: 2020-10-14 00:58:20
$dictionary["Email"]["fields"]["veta_aplicacion_activities_emails"] = array (
  'name' => 'veta_aplicacion_activities_emails',
  'type' => 'link',
  'relationship' => 'veta_aplicacion_activities_emails',
  'source' => 'non-db',
  'module' => 'Veta_Aplicacion',
  'bean_name' => 'Veta_Aplicacion',
  'vname' => 'LBL_VETA_APLICACION_ACTIVITIES_EMAILS_FROM_VETA_APLICACION_TITLE',
);


// created: 2020-10-14 00:58:22
$dictionary["Email"]["fields"]["veta_coe_activities_emails"] = array (
  'name' => 'veta_coe_activities_emails',
  'type' => 'link',
  'relationship' => 'veta_coe_activities_emails',
  'source' => 'non-db',
  'module' => 'Veta_COE',
  'bean_name' => 'Veta_COE',
  'vname' => 'LBL_VETA_COE_ACTIVITIES_EMAILS_FROM_VETA_COE_TITLE',
);


// created: 2020-10-14 00:58:33
$dictionary["Email"]["fields"]["veta_presupuesto_emails"] = array (
  'name' => 'veta_presupuesto_emails',
  'type' => 'link',
  'relationship' => 'veta_presupuesto_emails',
  'source' => 'non-db',
  'module' => 'Veta_Presupuesto',
  'bean_name' => 'Veta_Presupuesto',
  'vname' => 'LBL_VETA_PRESUPUESTO_EMAILS_FROM_VETA_PRESUPUESTO_TITLE',
  'id_name' => 'veta_presupuesto_emailsveta_presupuesto_ida',
);
$dictionary["Email"]["fields"]["veta_presupuesto_emails_name"] = array (
  'name' => 'veta_presupuesto_emails_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VETA_PRESUPUESTO_EMAILS_FROM_VETA_PRESUPUESTO_TITLE',
  'save' => true,
  'id_name' => 'veta_presupuesto_emailsveta_presupuesto_ida',
  'link' => 'veta_presupuesto_emails',
  'table' => 'veta_presupuesto',
  'module' => 'Veta_Presupuesto',
  'rname' => 'name',
);
$dictionary["Email"]["fields"]["veta_presupuesto_emailsveta_presupuesto_ida"] = array (
  'name' => 'veta_presupuesto_emailsveta_presupuesto_ida',
  'type' => 'link',
  'relationship' => 'veta_presupuesto_emails',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VETA_PRESUPUESTO_EMAILS_FROM_EMAILS_TITLE',
);


// created: 2023-01-16 03:09:34
$dictionary["Email"]["fields"]["auto_tickets_emails"] = array (
  'name' => 'auto_tickets_emails',
  'type' => 'link',
  'relationship' => 'auto_tickets_emails',
  'source' => 'non-db',
  'module' => 'Auto_Tickets',
  'bean_name' => 'Auto_Tickets',
  'vname' => 'LBL_AUTO_TICKETS_EMAILS_FROM_AUTO_TICKETS_TITLE',
  'id_name' => 'auto_tickets_emailsauto_tickets_ida',
);
$dictionary["Email"]["fields"]["auto_tickets_emails_name"] = array (
  'name' => 'auto_tickets_emails_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_AUTO_TICKETS_EMAILS_FROM_AUTO_TICKETS_TITLE',
  'save' => true,
  'id_name' => 'auto_tickets_emailsauto_tickets_ida',
  'link' => 'auto_tickets_emails',
  'table' => 'auto_tickets',
  'module' => 'Auto_Tickets',
  'rname' => 'name',
);
$dictionary["Email"]["fields"]["auto_tickets_emailsauto_tickets_ida"] = array (
  'name' => 'auto_tickets_emailsauto_tickets_ida',
  'type' => 'link',
  'relationship' => 'auto_tickets_emails',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_AUTO_TICKETS_EMAILS_FROM_EMAILS_TITLE',
);


// created: 2020-10-14 00:58:28
$dictionary["Email"]["fields"]["veta_loo_activities_emails"] = array (
  'name' => 'veta_loo_activities_emails',
  'type' => 'link',
  'relationship' => 'veta_loo_activities_emails',
  'source' => 'non-db',
  'module' => 'Veta_Loo',
  'bean_name' => 'Veta_Loo',
  'vname' => 'LBL_VETA_LOO_ACTIVITIES_EMAILS_FROM_VETA_LOO_TITLE',
);


// created: 2025-03-05 17:24:22
$dictionary["Email"]["fields"]["auto_recordatorio_emails"] = array (
  'name' => 'auto_recordatorio_emails',
  'type' => 'link',
  'relationship' => 'auto_recordatorio_emails',
  'source' => 'non-db',
  'module' => 'Auto_Recordatorio',
  'bean_name' => 'Auto_Recordatorio',
  'vname' => 'LBL_AUTO_RECORDATORIO_EMAILS_FROM_AUTO_RECORDATORIO_TITLE',
  'id_name' => 'auto_recordatorio_emailsauto_recordatorio_ida',
);
$dictionary["Email"]["fields"]["auto_recordatorio_emails_name"] = array (
  'name' => 'auto_recordatorio_emails_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_AUTO_RECORDATORIO_EMAILS_FROM_AUTO_RECORDATORIO_TITLE',
  'save' => true,
  'id_name' => 'auto_recordatorio_emailsauto_recordatorio_ida',
  'link' => 'auto_recordatorio_emails',
  'table' => 'auto_recordatorio',
  'module' => 'Auto_Recordatorio',
  'rname' => 'name',
);
$dictionary["Email"]["fields"]["auto_recordatorio_emailsauto_recordatorio_ida"] = array (
  'name' => 'auto_recordatorio_emailsauto_recordatorio_ida',
  'type' => 'link',
  'relationship' => 'auto_recordatorio_emails',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_AUTO_RECORDATORIO_EMAILS_FROM_EMAILS_TITLE',
);


// created: 2020-10-14 00:58:27
$dictionary["Email"]["fields"]["veta_liquidacion_activities_emails"] = array (
  'name' => 'veta_liquidacion_activities_emails',
  'type' => 'link',
  'relationship' => 'veta_liquidacion_activities_emails',
  'source' => 'non-db',
  'module' => 'Veta_Liquidacion',
  'bean_name' => 'Veta_Liquidacion',
  'vname' => 'LBL_VETA_LIQUIDACION_ACTIVITIES_EMAILS_FROM_VETA_LIQUIDACION_TITLE',
);


// created: 2021-05-04 17:11:25
$dictionary["Email"]["fields"]["veta_requerimiento_activities_1_emails"] = array (
  'name' => 'veta_requerimiento_activities_1_emails',
  'type' => 'link',
  'relationship' => 'veta_requerimiento_activities_1_emails',
  'source' => 'non-db',
  'module' => 'Veta_Requerimiento',
  'bean_name' => 'Veta_Requerimiento',
  'vname' => 'LBL_VETA_REQUERIMIENTO_ACTIVITIES_1_EMAILS_FROM_VETA_REQUERIMIENTO_TITLE',
);


// created: 2020-10-14 00:58:34
$dictionary["Email"]["fields"]["veta_recibo_emails"] = array (
  'name' => 'veta_recibo_emails',
  'type' => 'link',
  'relationship' => 'veta_recibo_emails',
  'source' => 'non-db',
  'module' => 'Veta_Recibo',
  'bean_name' => 'Veta_Recibo',
  'vname' => 'LBL_VETA_RECIBO_EMAILS_FROM_VETA_RECIBO_TITLE',
  'id_name' => 'veta_recibo_emailsveta_recibo_ida',
);
$dictionary["Email"]["fields"]["veta_recibo_emails_name"] = array (
  'name' => 'veta_recibo_emails_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VETA_RECIBO_EMAILS_FROM_VETA_RECIBO_TITLE',
  'save' => true,
  'id_name' => 'veta_recibo_emailsveta_recibo_ida',
  'link' => 'veta_recibo_emails',
  'table' => 'veta_recibo',
  'module' => 'Veta_Recibo',
  'rname' => 'name',
);
$dictionary["Email"]["fields"]["veta_recibo_emailsveta_recibo_ida"] = array (
  'name' => 'veta_recibo_emailsveta_recibo_ida',
  'type' => 'link',
  'relationship' => 'veta_recibo_emails',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VETA_RECIBO_EMAILS_FROM_EMAILS_TITLE',
);


 // created: 2023-10-29 22:17:07
$dictionary['Email']['fields']['folder_c']['inline_edit']='1';
$dictionary['Email']['fields']['folder_c']['labelValue']='folder';

 

 // created: 2024-09-10 19:23:48
$dictionary['Email']['fields']['automatic_c']['inline_edit']='1';
$dictionary['Email']['fields']['automatic_c']['labelValue']='Automatic';

 

 // created: 2023-10-29 22:15:08
$dictionary['Email']['fields']['folder']['type']='enum';
$dictionary['Email']['fields']['folder']['inline_edit']=true;
$dictionary['Email']['fields']['folder']['options']='folder_list';
$dictionary['Email']['fields']['folder']['importable']='true';
$dictionary['Email']['fields']['folder']['merge_filter']='disabled';

 

 // created: 2023-10-26 21:24:29
$dictionary['Email']['fields']['email_to_applicant_c']['inline_edit']='1';
$dictionary['Email']['fields']['email_to_applicant_c']['labelValue']='Email To Applicant';

 

 // created: 2025-05-20 15:07:35
$dictionary['Email']['fields']['outlook_api_description_c']['inline_edit']='1';
$dictionary['Email']['fields']['outlook_api_description_c']['labelValue']='outlook api description';

 

 // created: 2023-10-26 21:25:15
$dictionary['Email']['fields']['email_to_company_c']['inline_edit']='1';
$dictionary['Email']['fields']['email_to_company_c']['labelValue']='Email To Company';

 

 // created: 2023-10-29 23:25:42
$dictionary['Email']['fields']['has_ms_attachment_c']['inline_edit']='1';
$dictionary['Email']['fields']['has_ms_attachment_c']['labelValue']='has ms attachment';

 

 // created: 2025-05-20 15:07:13
$dictionary['Email']['fields']['outlook_api_id_c']['inline_edit']='1';
$dictionary['Email']['fields']['outlook_api_id_c']['labelValue']='outlook api id';

 
?>