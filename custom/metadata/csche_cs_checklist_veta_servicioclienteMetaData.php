<?php
// created: 2023-03-08 18:39:15
$dictionary["csche_cs_checklist_veta_serviciocliente"] = array (
  'true_relationship_type' => 'many-to-many',
  'relationships' => 
  array (
    'csche_cs_checklist_veta_serviciocliente' => 
    array (
      'lhs_module' => 'CSChe_CS_Checklist',
      'lhs_table' => 'csche_cs_checklist',
      'lhs_key' => 'id',
      'rhs_module' => 'Veta_ServicioCliente',
      'rhs_table' => 'veta_serviciocliente',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'csche_cs_checklist_veta_serviciocliente_c',
      'join_key_lhs' => 'csche_cs_checklist_veta_servicioclientecsche_cs_checklist_ida',
      'join_key_rhs' => 'csche_cs_checklist_veta_servicioclienteveta_serviciocliente_idb',
    ),
  ),
  'table' => 'csche_cs_checklist_veta_serviciocliente_c',
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
      'name' => 'csche_cs_checklist_veta_servicioclientecsche_cs_checklist_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'csche_cs_checklist_veta_servicioclienteveta_serviciocliente_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'csche_cs_checklist_veta_servicioclientespk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'csche_cs_checklist_veta_serviciocliente_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'csche_cs_checklist_veta_servicioclientecsche_cs_checklist_ida',
        1 => 'csche_cs_checklist_veta_servicioclienteveta_serviciocliente_idb',
      ),
    ),
  ),
);