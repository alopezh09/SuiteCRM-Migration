<?php
// created: 2021-10-22 22:49:06
$dictionary["nvc_companies_veta_requerimiento_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'nvc_companies_veta_requerimiento_1' => 
    array (
      'lhs_module' => 'NVC_Companies',
      'lhs_table' => 'nvc_companies',
      'lhs_key' => 'id',
      'rhs_module' => 'Veta_Requerimiento',
      'rhs_table' => 'veta_requerimiento',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'nvc_companies_veta_requerimiento_1_c',
      'join_key_lhs' => 'nvc_companies_veta_requerimiento_1nvc_companies_ida',
      'join_key_rhs' => 'nvc_companies_veta_requerimiento_1veta_requerimiento_idb',
    ),
  ),
  'table' => 'nvc_companies_veta_requerimiento_1_c',
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
      'name' => 'nvc_companies_veta_requerimiento_1nvc_companies_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'nvc_companies_veta_requerimiento_1veta_requerimiento_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'nvc_companies_veta_requerimiento_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'nvc_companies_veta_requerimiento_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'nvc_companies_veta_requerimiento_1nvc_companies_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'nvc_companies_veta_requerimiento_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'nvc_companies_veta_requerimiento_1veta_requerimiento_idb',
      ),
    ),
  ),
);