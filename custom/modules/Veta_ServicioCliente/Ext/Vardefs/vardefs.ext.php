<?php 
 //WARNING: The contents of this file are auto-generated


$dictionary['Veta_ServicioCliente']['fields']['soel_fecha_expiracion_visa'] = array(
    'name' => 'soel_fecha_expiracion_visa',
    'vname' => 'LBL_SOEL_FECHA_EXPIRACION_VISA',
    'type' => 'date',
    'source' => 'non-db',
    'enable_range_search' => true,
    'options' => 'date_range_search_dom',
);


// created: 2023-01-16 03:09:34
$dictionary["Veta_ServicioCliente"]["fields"]["auto_tickets_veta_serviciocliente"] = array (
  'name' => 'auto_tickets_veta_serviciocliente',
  'type' => 'link',
  'relationship' => 'auto_tickets_veta_serviciocliente',
  'source' => 'non-db',
  'module' => 'Auto_Tickets',
  'bean_name' => 'Auto_Tickets',
  'side' => 'right',
  'vname' => 'LBL_AUTO_TICKETS_VETA_SERVICIOCLIENTE_FROM_AUTO_TICKETS_TITLE',
);


// created: 2023-03-08 18:39:15
$dictionary["Veta_ServicioCliente"]["fields"]["csche_items_requested_veta_serviciocliente"] = array (
  'name' => 'csche_items_requested_veta_serviciocliente',
  'type' => 'link',
  'relationship' => 'csche_items_requested_veta_serviciocliente',
  'source' => 'non-db',
  'module' => 'CSChe_Items_Requested',
  'bean_name' => 'CSChe_Items_Requested',
  'vname' => 'LBL_CSCHE_ITEMS_REQUESTED_VETA_SERVICIOCLIENTE_FROM_CSCHE_ITEMS_REQUESTED_TITLE',
);


// created: 2023-03-08 18:39:15
$dictionary["Veta_ServicioCliente"]["fields"]["csche_cs_checklist_veta_serviciocliente"] = array (
  'name' => 'csche_cs_checklist_veta_serviciocliente',
  'type' => 'link',
  'relationship' => 'csche_cs_checklist_veta_serviciocliente',
  'source' => 'non-db',
  'module' => 'CSChe_CS_Checklist',
  'bean_name' => 'CSChe_CS_Checklist',
  'vname' => 'LBL_CSCHE_CS_CHECKLIST_VETA_SERVICIOCLIENTE_FROM_CSCHE_CS_CHECKLIST_TITLE',
);


// created: 2020-10-14 00:58:39
$dictionary["Veta_ServicioCliente"]["fields"]["veta_visa_veta_serviciocliente"] = array (
  'name' => 'veta_visa_veta_serviciocliente',
  'type' => 'link',
  'relationship' => 'veta_visa_veta_serviciocliente',
  'source' => 'non-db',
  'module' => 'Veta_Visa',
  'bean_name' => 'Veta_Visa',
  'vname' => 'LBL_VETA_VISA_VETA_SERVICIOCLIENTE_FROM_VETA_VISA_TITLE',
  'id_name' => 'veta_visa_veta_servicioclienteveta_visa_ida',
);
$dictionary["Veta_ServicioCliente"]["fields"]["veta_visa_veta_serviciocliente_name"] = array (
  'name' => 'veta_visa_veta_serviciocliente_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VETA_VISA_VETA_SERVICIOCLIENTE_FROM_VETA_VISA_TITLE',
  'save' => true,
  'id_name' => 'veta_visa_veta_servicioclienteveta_visa_ida',
  'link' => 'veta_visa_veta_serviciocliente',
  'table' => 'veta_visa',
  'module' => 'Veta_Visa',
  'rname' => 'name',
);
$dictionary["Veta_ServicioCliente"]["fields"]["veta_visa_veta_servicioclienteveta_visa_ida"] = array (
  'name' => 'veta_visa_veta_servicioclienteveta_visa_ida',
  'type' => 'link',
  'relationship' => 'veta_visa_veta_serviciocliente',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_VETA_VISA_VETA_SERVICIOCLIENTE_FROM_VETA_VISA_TITLE',
);


$dictionary['Veta_ServicioCliente']['fields']['soel_fecha_viaje'] = array(
    'name' => 'soel_fecha_viaje',
    'vname' => 'LBL_SOEL_FECHA_VIAJE',
    'type' => 'datetime',
    'source' => 'non-db',
    'enable_range_search' => true,
    'options' => 'date_range_search_dom',

    );


$dictionary['Veta_ServicioCliente']['fields']['soel_referido'] = array(
    'name' => 'soel_referido',
    'vname' => 'LBL_SOEL_REFERIDO',
    'type' => 'varchar',
    'source' => 'non-db',
);


// created: 2020-10-14 00:58:37
$dictionary["Veta_ServicioCliente"]["fields"]["veta_serviciocliente_opportunities"] = array (
  'name' => 'veta_serviciocliente_opportunities',
  'type' => 'link',
  'relationship' => 'veta_serviciocliente_opportunities',
  'source' => 'non-db',
  'module' => 'Opportunities',
  'bean_name' => 'Opportunity',
  'vname' => 'LBL_VETA_SERVICIOCLIENTE_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
  'id_name' => 'veta_serviciocliente_opportunitiesopportunities_ida',
);
$dictionary["Veta_ServicioCliente"]["fields"]["veta_serviciocliente_opportunities_name"] = array (
  'name' => 'veta_serviciocliente_opportunities_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VETA_SERVICIOCLIENTE_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
  'save' => true,
  'id_name' => 'veta_serviciocliente_opportunitiesopportunities_ida',
  'link' => 'veta_serviciocliente_opportunities',
  'table' => 'opportunities',
  'module' => 'Opportunities',
  'rname' => 'name',
);
$dictionary["Veta_ServicioCliente"]["fields"]["veta_serviciocliente_opportunitiesopportunities_ida"] = array (
  'name' => 'veta_serviciocliente_opportunitiesopportunities_ida',
  'type' => 'link',
  'relationship' => 'veta_serviciocliente_opportunities',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VETA_SERVICIOCLIENTE_OPPORTUNITIES_FROM_VETA_SERVICIOCLIENTE_TITLE',
);


 // created: 2025-04-10 19:19:21
$dictionary['Veta_ServicioCliente']['fields']['wa_automatic_message_c']['inline_edit']='1';
$dictionary['Veta_ServicioCliente']['fields']['wa_automatic_message_c']['labelValue']='wa automatic message';

 

 // created: 2022-06-24 21:16:44
$dictionary['Veta_ServicioCliente']['fields']['next_contact_date_company_c']['inline_edit']='';
$dictionary['Veta_ServicioCliente']['fields']['next_contact_date_company_c']['options']='date_range_search_dom';
$dictionary['Veta_ServicioCliente']['fields']['next_contact_date_company_c']['labelValue']='Next Contact Date Company';
$dictionary['Veta_ServicioCliente']['fields']['next_contact_date_company_c']['enable_range_search']='1';

 

 // created: 2021-02-16 13:23:51
$dictionary['Veta_ServicioCliente']['fields']['fecha_ultimo_contacto']['options']='date_range_search_dom';
$dictionary['Veta_ServicioCliente']['fields']['fecha_ultimo_contacto']['enable_range_search']='1';

 

 // created: 2022-06-24 21:15:54

 

 // created: 2021-02-16 13:23:47
$dictionary['Veta_ServicioCliente']['fields']['fecha_expiracion_visa']['options']='date_range_search_dom';
$dictionary['Veta_ServicioCliente']['fields']['fecha_expiracion_visa']['enable_range_search']='1';

 

 // created: 2025-05-22 15:16:21
$dictionary['Veta_ServicioCliente']['fields']['apply_tranning_plan_c']['inline_edit']='1';
$dictionary['Veta_ServicioCliente']['fields']['apply_tranning_plan_c']['labelValue']='Apply Tranning Plan';

 
?>