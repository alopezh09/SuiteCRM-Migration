<?php
// created: 2021-10-13 15:46:19
$dictionary["nvc_company_veta_requerimiento"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'nvc_company_veta_requerimiento' => 
    array (
      'lhs_module' => 'NVC_Company',
      'lhs_table' => 'nvc_company',
      'lhs_key' => 'id',
      'rhs_module' => 'Veta_Requerimiento',
      'rhs_table' => 'veta_requerimiento',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'nvc_company_veta_requerimiento_c',
      'join_key_lhs' => 'nvc_company_veta_requerimientonvc_company_ida',
      'join_key_rhs' => 'nvc_company_veta_requerimientoveta_requerimiento_idb',
    ),
  ),
  'table' => 'nvc_company_veta_requerimiento_c',
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
      'name' => 'nvc_company_veta_requerimientonvc_company_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'nvc_company_veta_requerimientoveta_requerimiento_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'nvc_company_veta_requerimientospk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'nvc_company_veta_requerimiento_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'nvc_company_veta_requerimientonvc_company_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'nvc_company_veta_requerimiento_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'nvc_company_veta_requerimientoveta_requerimiento_idb',
      ),
    ),
  ),
);