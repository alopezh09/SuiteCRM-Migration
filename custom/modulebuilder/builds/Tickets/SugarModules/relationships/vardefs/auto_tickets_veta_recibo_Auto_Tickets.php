<?php
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
