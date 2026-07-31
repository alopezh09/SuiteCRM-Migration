<?php
// created: 2024-04-24 16:01:00
$dictionary["veta_profile_veta_requerimiento"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'veta_profile_veta_requerimiento' => 
    array (
      'lhs_module' => 'Veta_Requerimiento',
      'lhs_table' => 'veta_requerimiento',
      'lhs_key' => 'id',
      'rhs_module' => 'Veta_Profile',
      'rhs_table' => 'veta_profile',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'veta_profile_veta_requerimiento_c',
      'join_key_lhs' => 'veta_profile_veta_requerimientoveta_requerimiento_ida',
      'join_key_rhs' => 'veta_profile_veta_requerimientoveta_profile_idb',
    ),
  ),
  'table' => 'veta_profile_veta_requerimiento_c',
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
      'name' => 'veta_profile_veta_requerimientoveta_requerimiento_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'veta_profile_veta_requerimientoveta_profile_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'veta_profile_veta_requerimientospk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'veta_profile_veta_requerimiento_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'veta_profile_veta_requerimientoveta_requerimiento_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'veta_profile_veta_requerimiento_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'veta_profile_veta_requerimientoveta_profile_idb',
      ),
    ),
  ),
);