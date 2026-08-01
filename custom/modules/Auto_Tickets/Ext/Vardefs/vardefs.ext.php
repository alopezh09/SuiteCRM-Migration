<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2023-01-16 03:09:34
$dictionary["Auto_Tickets"]["fields"]["auto_tickets_veta_presupuesto"] = array (
  'name' => 'auto_tickets_veta_presupuesto',
  'type' => 'link',
  'relationship' => 'auto_tickets_veta_presupuesto',
  'source' => 'non-db',
  'module' => 'Veta_Presupuesto',
  'bean_name' => 'Veta_Presupuesto',
  'vname' => 'LBL_AUTO_TICKETS_VETA_PRESUPUESTO_FROM_VETA_PRESUPUESTO_TITLE',
  'id_name' => 'auto_tickets_veta_presupuestoveta_presupuesto_ida',
);
$dictionary["Auto_Tickets"]["fields"]["auto_tickets_veta_presupuesto_name"] = array (
  'name' => 'auto_tickets_veta_presupuesto_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_AUTO_TICKETS_VETA_PRESUPUESTO_FROM_VETA_PRESUPUESTO_TITLE',
  'save' => true,
  'id_name' => 'auto_tickets_veta_presupuestoveta_presupuesto_ida',
  'link' => 'auto_tickets_veta_presupuesto',
  'table' => 'veta_presupuesto',
  'module' => 'Veta_Presupuesto',
  'rname' => 'name',
);
$dictionary["Auto_Tickets"]["fields"]["auto_tickets_veta_presupuestoveta_presupuesto_ida"] = array (
  'name' => 'auto_tickets_veta_presupuestoveta_presupuesto_ida',
  'type' => 'link',
  'relationship' => 'auto_tickets_veta_presupuesto',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_AUTO_TICKETS_VETA_PRESUPUESTO_FROM_AUTO_TICKETS_TITLE',
);


// created: 2023-01-16 03:09:34
$dictionary["Auto_Tickets"]["fields"]["auto_tickets_veta_recibo"] = array (
  'name' => 'auto_tickets_veta_recibo',
  'type' => 'link',
  'relationship' => 'auto_tickets_veta_recibo',
  'source' => 'non-db',
  'module' => 'Veta_Recibo',
  'bean_name' => 'Veta_Recibo',
  'vname' => 'LBL_AUTO_TICKETS_VETA_RECIBO_FROM_VETA_RECIBO_TITLE',
  'id_name' => 'auto_tickets_veta_reciboveta_recibo_ida',
);
$dictionary["Auto_Tickets"]["fields"]["auto_tickets_veta_recibo_name"] = array (
  'name' => 'auto_tickets_veta_recibo_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_AUTO_TICKETS_VETA_RECIBO_FROM_VETA_RECIBO_TITLE',
  'save' => true,
  'id_name' => 'auto_tickets_veta_reciboveta_recibo_ida',
  'link' => 'auto_tickets_veta_recibo',
  'table' => 'veta_recibo',
  'module' => 'Veta_Recibo',
  'rname' => 'name',
);
$dictionary["Auto_Tickets"]["fields"]["auto_tickets_veta_reciboveta_recibo_ida"] = array (
  'name' => 'auto_tickets_veta_reciboveta_recibo_ida',
  'type' => 'link',
  'relationship' => 'auto_tickets_veta_recibo',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_AUTO_TICKETS_VETA_RECIBO_FROM_AUTO_TICKETS_TITLE',
);


// created: 2023-01-16 03:09:34
$dictionary["Auto_Tickets"]["fields"]["auto_tickets_opportunities"] = array (
  'name' => 'auto_tickets_opportunities',
  'type' => 'link',
  'relationship' => 'auto_tickets_opportunities',
  'source' => 'non-db',
  'module' => 'Opportunities',
  'bean_name' => 'Opportunity',
  'vname' => 'LBL_AUTO_TICKETS_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
  'id_name' => 'auto_tickets_opportunitiesopportunities_ida',
);
$dictionary["Auto_Tickets"]["fields"]["auto_tickets_opportunities_name"] = array (
  'name' => 'auto_tickets_opportunities_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_AUTO_TICKETS_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
  'save' => true,
  'id_name' => 'auto_tickets_opportunitiesopportunities_ida',
  'link' => 'auto_tickets_opportunities',
  'table' => 'opportunities',
  'module' => 'Opportunities',
  'rname' => 'name',
);
$dictionary["Auto_Tickets"]["fields"]["auto_tickets_opportunitiesopportunities_ida"] = array (
  'name' => 'auto_tickets_opportunitiesopportunities_ida',
  'type' => 'link',
  'relationship' => 'auto_tickets_opportunities',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_AUTO_TICKETS_OPPORTUNITIES_FROM_AUTO_TICKETS_TITLE',
);


// created: 2023-01-16 03:09:34
$dictionary["Auto_Tickets"]["fields"]["auto_tickets_veta_serviciocliente"] = array (
  'name' => 'auto_tickets_veta_serviciocliente',
  'type' => 'link',
  'relationship' => 'auto_tickets_veta_serviciocliente',
  'source' => 'non-db',
  'module' => 'Veta_ServicioCliente',
  'bean_name' => 'Veta_ServicioCliente',
  'vname' => 'LBL_AUTO_TICKETS_VETA_SERVICIOCLIENTE_FROM_VETA_SERVICIOCLIENTE_TITLE',
  'id_name' => 'auto_tickets_veta_servicioclienteveta_serviciocliente_ida',
);
$dictionary["Auto_Tickets"]["fields"]["auto_tickets_veta_serviciocliente_name"] = array (
  'name' => 'auto_tickets_veta_serviciocliente_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_AUTO_TICKETS_VETA_SERVICIOCLIENTE_FROM_VETA_SERVICIOCLIENTE_TITLE',
  'save' => true,
  'id_name' => 'auto_tickets_veta_servicioclienteveta_serviciocliente_ida',
  'link' => 'auto_tickets_veta_serviciocliente',
  'table' => 'veta_serviciocliente',
  'module' => 'Veta_ServicioCliente',
  'rname' => 'name',
);
$dictionary["Auto_Tickets"]["fields"]["auto_tickets_veta_servicioclienteveta_serviciocliente_ida"] = array (
  'name' => 'auto_tickets_veta_servicioclienteveta_serviciocliente_ida',
  'type' => 'link',
  'relationship' => 'auto_tickets_veta_serviciocliente',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_AUTO_TICKETS_VETA_SERVICIOCLIENTE_FROM_AUTO_TICKETS_TITLE',
);


// created: 2023-01-16 03:09:34
$dictionary["Auto_Tickets"]["fields"]["auto_tickets_emails"] = array (
  'name' => 'auto_tickets_emails',
  'type' => 'link',
  'relationship' => 'auto_tickets_emails',
  'source' => 'non-db',
  'module' => 'Emails',
  'bean_name' => 'Email',
  'side' => 'right',
  'vname' => 'LBL_AUTO_TICKETS_EMAILS_FROM_EMAILS_TITLE',
);


// created: 2023-01-16 03:09:34
$dictionary["Auto_Tickets"]["fields"]["auto_tickets_veta_requerimiento"] = array (
  'name' => 'auto_tickets_veta_requerimiento',
  'type' => 'link',
  'relationship' => 'auto_tickets_veta_requerimiento',
  'source' => 'non-db',
  'module' => 'Veta_Requerimiento',
  'bean_name' => 'Veta_Requerimiento',
  'vname' => 'LBL_AUTO_TICKETS_VETA_REQUERIMIENTO_FROM_VETA_REQUERIMIENTO_TITLE',
  'id_name' => 'auto_tickets_veta_requerimientoveta_requerimiento_ida',
);
$dictionary["Auto_Tickets"]["fields"]["auto_tickets_veta_requerimiento_name"] = array (
  'name' => 'auto_tickets_veta_requerimiento_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_AUTO_TICKETS_VETA_REQUERIMIENTO_FROM_VETA_REQUERIMIENTO_TITLE',
  'save' => true,
  'id_name' => 'auto_tickets_veta_requerimientoveta_requerimiento_ida',
  'link' => 'auto_tickets_veta_requerimiento',
  'table' => 'veta_requerimiento',
  'module' => 'Veta_Requerimiento',
  'rname' => 'name',
);
$dictionary["Auto_Tickets"]["fields"]["auto_tickets_veta_requerimientoveta_requerimiento_ida"] = array (
  'name' => 'auto_tickets_veta_requerimientoveta_requerimiento_ida',
  'type' => 'link',
  'relationship' => 'auto_tickets_veta_requerimiento',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_AUTO_TICKETS_VETA_REQUERIMIENTO_FROM_AUTO_TICKETS_TITLE',
);


// created: 2024-07-15 15:21:46
$dictionary["Auto_Tickets"]["fields"]["auto_tickets_calls_1"] = array (
  'name' => 'auto_tickets_calls_1',
  'type' => 'link',
  'relationship' => 'auto_tickets_calls_1',
  'source' => 'non-db',
  'module' => 'Calls',
  'bean_name' => 'Call',
  'side' => 'right',
  'vname' => 'LBL_AUTO_TICKETS_CALLS_1_FROM_CALLS_TITLE',
);

?>