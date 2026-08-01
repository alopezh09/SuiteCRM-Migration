<?php
// created: 2023-01-16 03:09:34
$dictionary["auto_tickets_veta_presupuesto"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'auto_tickets_veta_presupuesto' => 
    array (
      'lhs_module' => 'Veta_Presupuesto',
      'lhs_table' => 'veta_presupuesto',
      'lhs_key' => 'id',
      'rhs_module' => 'Auto_Tickets',
      'rhs_table' => 'auto_tickets',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'auto_tickets_veta_presupuesto_c',
      'join_key_lhs' => 'auto_tickets_veta_presupuestoveta_presupuesto_ida',
      'join_key_rhs' => 'auto_tickets_veta_presupuestoauto_tickets_idb',
    ),
  ),
  'table' => 'auto_tickets_veta_presupuesto_c',
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
      'name' => 'auto_tickets_veta_presupuestoveta_presupuesto_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'auto_tickets_veta_presupuestoauto_tickets_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'auto_tickets_veta_presupuestospk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'auto_tickets_veta_presupuesto_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'auto_tickets_veta_presupuestoveta_presupuesto_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'auto_tickets_veta_presupuesto_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'auto_tickets_veta_presupuestoauto_tickets_idb',
      ),
    ),
  ),
);