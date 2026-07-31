<?php
// created: 2025-03-05 17:24:22
$dictionary["Call"]["fields"]["auto_recordatorio_calls"] = array (
  'name' => 'auto_recordatorio_calls',
  'type' => 'link',
  'relationship' => 'auto_recordatorio_calls',
  'source' => 'non-db',
  'module' => 'Auto_Recordatorio',
  'bean_name' => 'Auto_Recordatorio',
  'vname' => 'LBL_AUTO_RECORDATORIO_CALLS_FROM_AUTO_RECORDATORIO_TITLE',
  'id_name' => 'auto_recordatorio_callsauto_recordatorio_ida',
);
$dictionary["Call"]["fields"]["auto_recordatorio_calls_name"] = array (
  'name' => 'auto_recordatorio_calls_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_AUTO_RECORDATORIO_CALLS_FROM_AUTO_RECORDATORIO_TITLE',
  'save' => true,
  'id_name' => 'auto_recordatorio_callsauto_recordatorio_ida',
  'link' => 'auto_recordatorio_calls',
  'table' => 'auto_recordatorio',
  'module' => 'Auto_Recordatorio',
  'rname' => 'name',
);
$dictionary["Call"]["fields"]["auto_recordatorio_callsauto_recordatorio_ida"] = array (
  'name' => 'auto_recordatorio_callsauto_recordatorio_ida',
  'type' => 'link',
  'relationship' => 'auto_recordatorio_calls',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_AUTO_RECORDATORIO_CALLS_FROM_CALLS_TITLE',
);
