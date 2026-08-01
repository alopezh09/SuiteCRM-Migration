<?php
// created: 2021-10-13 17:15:55
$dictionary["nvc_taxes_and_fees_config_opportunities"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'nvc_taxes_and_fees_config_opportunities' => 
    array (
      'lhs_module' => 'NVC_Taxes_and_Fees_Config',
      'lhs_table' => 'nvc_taxes_and_fees_config',
      'lhs_key' => 'id',
      'rhs_module' => 'Opportunities',
      'rhs_table' => 'opportunities',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'nvc_taxes_and_fees_config_opportunities_c',
      'join_key_lhs' => 'nvc_taxes_5b0d_config_ida',
      'join_key_rhs' => 'nvc_taxes_and_fees_config_opportunitiesopportunities_idb',
    ),
  ),
  'table' => 'nvc_taxes_and_fees_config_opportunities_c',
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
      'name' => 'nvc_taxes_5b0d_config_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'nvc_taxes_and_fees_config_opportunitiesopportunities_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'nvc_taxes_and_fees_config_opportunitiesspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'nvc_taxes_and_fees_config_opportunities_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'nvc_taxes_5b0d_config_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'nvc_taxes_and_fees_config_opportunities_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'nvc_taxes_and_fees_config_opportunitiesopportunities_idb',
      ),
    ),
  ),
);