<?php
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
