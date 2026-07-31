<?php
// created: 2022-06-21 21:17:40
$dictionary["veta_recibo_conta_refunds_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'veta_recibo_conta_refunds_1' => 
    array (
      'lhs_module' => 'Veta_Recibo',
      'lhs_table' => 'veta_recibo',
      'lhs_key' => 'id',
      'rhs_module' => 'Conta_refunds',
      'rhs_table' => 'conta_refunds',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'veta_recibo_conta_refunds_1_c',
      'join_key_lhs' => 'veta_recibo_conta_refunds_1veta_recibo_ida',
      'join_key_rhs' => 'veta_recibo_conta_refunds_1conta_refunds_idb',
    ),
  ),
  'table' => 'veta_recibo_conta_refunds_1_c',
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
      'name' => 'veta_recibo_conta_refunds_1veta_recibo_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'veta_recibo_conta_refunds_1conta_refunds_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'veta_recibo_conta_refunds_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'veta_recibo_conta_refunds_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'veta_recibo_conta_refunds_1veta_recibo_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'veta_recibo_conta_refunds_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'veta_recibo_conta_refunds_1conta_refunds_idb',
      ),
    ),
  ),
);