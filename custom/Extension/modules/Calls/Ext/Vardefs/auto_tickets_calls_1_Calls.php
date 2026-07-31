<?php
// created: 2024-07-15 15:21:46
$dictionary["Call"]["fields"]["auto_tickets_calls_1"] = array (
  'name' => 'auto_tickets_calls_1',
  'type' => 'link',
  'relationship' => 'auto_tickets_calls_1',
  'source' => 'non-db',
  'module' => 'Auto_Tickets',
  'bean_name' => 'Auto_Tickets',
  'vname' => 'LBL_AUTO_TICKETS_CALLS_1_FROM_AUTO_TICKETS_TITLE',
  'id_name' => 'auto_tickets_calls_1auto_tickets_ida',
);
$dictionary["Call"]["fields"]["auto_tickets_calls_1_name"] = array (
  'name' => 'auto_tickets_calls_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_AUTO_TICKETS_CALLS_1_FROM_AUTO_TICKETS_TITLE',
  'save' => true,
  'id_name' => 'auto_tickets_calls_1auto_tickets_ida',
  'link' => 'auto_tickets_calls_1',
  'table' => 'auto_tickets',
  'module' => 'Auto_Tickets',
  'rname' => 'name',
);
$dictionary["Call"]["fields"]["auto_tickets_calls_1auto_tickets_ida"] = array (
  'name' => 'auto_tickets_calls_1auto_tickets_ida',
  'type' => 'link',
  'relationship' => 'auto_tickets_calls_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_AUTO_TICKETS_CALLS_1_FROM_CALLS_TITLE',
);
