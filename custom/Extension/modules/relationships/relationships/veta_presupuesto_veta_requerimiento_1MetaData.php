<?php
// created: 2021-10-15 18:06:33
$dictionary["veta_presupuesto_veta_requerimiento_1"] = array (
  'true_relationship_type' => 'one-to-one',
  'from_studio' => true,
  'relationships' => 
  array (
    'veta_presupuesto_veta_requerimiento_1' => 
    array (
      'lhs_module' => 'Veta_Presupuesto',
      'lhs_table' => 'veta_presupuesto',
      'lhs_key' => 'id',
      'rhs_module' => 'Veta_Requerimiento',
      'rhs_table' => 'veta_requerimiento',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'veta_presupuesto_veta_requerimiento_1_c',
      'join_key_lhs' => 'veta_presupuesto_veta_requerimiento_1veta_presupuesto_ida',
      'join_key_rhs' => 'veta_presupuesto_veta_requerimiento_1veta_requerimiento_idb',
    ),
  ),
  'table' => 'veta_presupuesto_veta_requerimiento_1_c',
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
      'name' => 'veta_presupuesto_veta_requerimiento_1veta_presupuesto_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'veta_presupuesto_veta_requerimiento_1veta_requerimiento_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'veta_presupuesto_veta_requerimiento_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'veta_presupuesto_veta_requerimiento_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'veta_presupuesto_veta_requerimiento_1veta_presupuesto_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'veta_presupuesto_veta_requerimiento_1_idb2',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'veta_presupuesto_veta_requerimiento_1veta_requerimiento_idb',
      ),
    ),
  ),
);