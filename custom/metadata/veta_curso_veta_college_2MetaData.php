<?php
// created: 2021-09-21 21:40:40
$dictionary["veta_curso_veta_college_2"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'veta_curso_veta_college_2' => 
    array (
      'lhs_module' => 'Veta_Curso',
      'lhs_table' => 'veta_curso',
      'lhs_key' => 'id',
      'rhs_module' => 'Veta_College',
      'rhs_table' => 'veta_college',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'veta_curso_veta_college_2_c',
      'join_key_lhs' => 'veta_curso_veta_college_2veta_curso_ida',
      'join_key_rhs' => 'veta_curso_veta_college_2veta_college_idb',
    ),
  ),
  'table' => 'veta_curso_veta_college_2_c',
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
      'name' => 'veta_curso_veta_college_2veta_curso_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'veta_curso_veta_college_2veta_college_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'veta_curso_veta_college_2spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'veta_curso_veta_college_2_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'veta_curso_veta_college_2veta_curso_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'veta_curso_veta_college_2_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'veta_curso_veta_college_2veta_college_idb',
      ),
    ),
  ),
);