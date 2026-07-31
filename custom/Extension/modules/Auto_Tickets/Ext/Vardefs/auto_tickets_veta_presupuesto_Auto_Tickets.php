<?php
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
