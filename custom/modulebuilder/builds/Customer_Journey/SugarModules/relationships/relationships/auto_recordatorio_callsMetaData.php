<?php
// created: 2025-03-05 17:24:22
$dictionary["auto_recordatorio_calls"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'auto_recordatorio_calls' => 
    array (
      'lhs_module' => 'Auto_Recordatorio',
      'lhs_table' => 'auto_recordatorio',
      'lhs_key' => 'id',
      'rhs_module' => 'Calls',
      'rhs_table' => 'calls',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'auto_recordatorio_calls_c',
      'join_key_lhs' => 'auto_recordatorio_callsauto_recordatorio_ida',
      'join_key_rhs' => 'auto_recordatorio_callscalls_idb',
    ),
  ),
  'table' => 'auto_recordatorio_calls_c',
  'fields' => 
  array (
    0 => 
    array (
      'name' => 'id',
      'type' => 'varchar',
      'len' => 36,
    ),
    1 => 
    array (
      'name' => 'date_modified',
      'type' => 'datetime',
    ),
    2 => 
    array (
      'name' => 'deleted',
      'type' => 'bool',
      'len' => '1',
      'default' => '0',
      'required' => true,
    ),
    3 => 
    array (
      'name' => 'auto_recordatorio_callsauto_recordatorio_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'auto_recordatorio_callscalls_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'auto_recordatorio_callsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'auto_recordatorio_calls_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'auto_recordatorio_callsauto_recordatorio_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'auto_recordatorio_calls_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'auto_recordatorio_callscalls_idb',
      ),
    ),
  ),
);