<?php
// created: 2022-02-08 16:48:12
$dictionary["veta_requerimiento_doc_comentarios_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'veta_requerimiento_doc_comentarios_1' => 
    array (
      'lhs_module' => 'Veta_Requerimiento',
      'lhs_table' => 'veta_requerimiento',
      'lhs_key' => 'id',
      'rhs_module' => 'Doc_Comentarios',
      'rhs_table' => 'doc_comentarios',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'veta_requerimiento_doc_comentarios_1_c',
      'join_key_lhs' => 'veta_requerimiento_doc_comentarios_1veta_requerimiento_ida',
      'join_key_rhs' => 'veta_requerimiento_doc_comentarios_1doc_comentarios_idb',
    ),
  ),
  'table' => 'veta_requerimiento_doc_comentarios_1_c',
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
      'name' => 'veta_requerimiento_doc_comentarios_1veta_requerimiento_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'veta_requerimiento_doc_comentarios_1doc_comentarios_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'veta_requerimiento_doc_comentarios_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'veta_requerimiento_doc_comentarios_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'veta_requerimiento_doc_comentarios_1veta_requerimiento_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'veta_requerimiento_doc_comentarios_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'veta_requerimiento_doc_comentarios_1doc_comentarios_idb',
      ),
    ),
  ),
);