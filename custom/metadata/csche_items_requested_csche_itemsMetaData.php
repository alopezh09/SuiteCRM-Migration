<?php
// created: 2023-03-08 18:39:15
$dictionary["csche_items_requested_csche_items"] = array (
  'true_relationship_type' => 'many-to-many',
  'relationships' => 
  array (
    'csche_items_requested_csche_items' => 
    array (
      'lhs_module' => 'CSChe_Items_Requested',
      'lhs_table' => 'csche_items_requested',
      'lhs_key' => 'id',
      'rhs_module' => 'CSChe_Items',
      'rhs_table' => 'csche_items',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'csche_items_requested_csche_items_c',
      'join_key_lhs' => 'csche_items_requested_csche_itemscsche_items_requested_ida',
      'join_key_rhs' => 'csche_items_requested_csche_itemscsche_items_idb',
    ),
  ),
  'table' => 'csche_items_requested_csche_items_c',
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
      'name' => 'csche_items_requested_csche_itemscsche_items_requested_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'csche_items_requested_csche_itemscsche_items_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'csche_items_requested_csche_itemsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'csche_items_requested_csche_items_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'csche_items_requested_csche_itemscsche_items_requested_ida',
        1 => 'csche_items_requested_csche_itemscsche_items_idb',
      ),
    ),
  ),
);