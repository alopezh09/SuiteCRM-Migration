<?php
// created: 2022-02-08 16:30:45
$dictionary["veta_requerimiento_doc_documentos_adic_1"] = array (
  'true_relationship_type' => 'many-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'veta_requerimiento_doc_documentos_adic_1' => 
    array (
      'lhs_module' => 'Veta_Requerimiento',
      'lhs_table' => 'veta_requerimiento',
      'lhs_key' => 'id',
      'rhs_module' => 'Doc_Documentos_Adic',
      'rhs_table' => 'doc_documentos_adic',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'veta_requerimiento_doc_documentos_adic_1_c',
      'join_key_lhs' => 'veta_requerimiento_doc_documentos_adic_1veta_requerimiento_ida',
      'join_key_rhs' => 'veta_requerimiento_doc_documentos_adic_1doc_documentos_adic_idb',
    ),
  ),
  'table' => 'veta_requerimiento_doc_documentos_adic_1_c',
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
      'name' => 'veta_requerimiento_doc_documentos_adic_1veta_requerimiento_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'veta_requerimiento_doc_documentos_adic_1doc_documentos_adic_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'veta_requerimiento_doc_documentos_adic_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'veta_requerimiento_doc_documentos_adic_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'veta_requerimiento_doc_documentos_adic_1veta_requerimiento_ida',
        1 => 'veta_requerimiento_doc_documentos_adic_1doc_documentos_adic_idb',
      ),
    ),
  ),
);