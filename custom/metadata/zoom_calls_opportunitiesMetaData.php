<?php
// created: 2025-05-29 21:21:08
$dictionary["zoom_calls_opportunities"] = array (
  'true_relationship_type' => 'many-to-many',
  'relationships' => 
  array (
    'zoom_calls_opportunities' => 
    array (
      'lhs_module' => 'Zoom_Calls',
      'lhs_table' => 'zoom_calls',
      'lhs_key' => 'id',
      'rhs_module' => 'Opportunities',
      'rhs_table' => 'opportunities',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'zoom_calls_opportunities_c',
      'join_key_lhs' => 'zoom_calls_opportunitieszoom_calls_ida',
      'join_key_rhs' => 'zoom_calls_opportunitiesopportunities_idb',
    ),
  ),
  'table' => 'zoom_calls_opportunities_c',
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
      'name' => 'zoom_calls_opportunitieszoom_calls_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'zoom_calls_opportunitiesopportunities_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'zoom_calls_opportunitiesspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'zoom_calls_opportunities_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'zoom_calls_opportunitieszoom_calls_ida',
        1 => 'zoom_calls_opportunitiesopportunities_idb',
      ),
    ),
  ),
);