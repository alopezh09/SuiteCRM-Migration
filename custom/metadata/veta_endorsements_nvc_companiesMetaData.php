<?php
// created: 2024-07-03 18:26:04
$dictionary["veta_endorsements_nvc_companies"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'veta_endorsements_nvc_companies' => 
    array (
      'lhs_module' => 'NVC_Companies',
      'lhs_table' => 'nvc_companies',
      'lhs_key' => 'id',
      'rhs_module' => 'Veta_Endorsements',
      'rhs_table' => 'veta_endorsements',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'veta_endorsements_nvc_companies_c',
      'join_key_lhs' => 'veta_endorsements_nvc_companiesnvc_companies_ida',
      'join_key_rhs' => 'veta_endorsements_nvc_companiesveta_endorsements_idb',
    ),
  ),
  'table' => 'veta_endorsements_nvc_companies_c',
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
      'name' => 'veta_endorsements_nvc_companiesnvc_companies_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'veta_endorsements_nvc_companiesveta_endorsements_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'veta_endorsements_nvc_companiesspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'veta_endorsements_nvc_companies_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'veta_endorsements_nvc_companiesnvc_companies_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'veta_endorsements_nvc_companies_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'veta_endorsements_nvc_companiesveta_endorsements_idb',
      ),
    ),
  ),
);