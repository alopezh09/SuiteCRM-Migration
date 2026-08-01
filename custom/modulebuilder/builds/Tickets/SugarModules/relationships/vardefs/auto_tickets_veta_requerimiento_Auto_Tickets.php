<?php
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
