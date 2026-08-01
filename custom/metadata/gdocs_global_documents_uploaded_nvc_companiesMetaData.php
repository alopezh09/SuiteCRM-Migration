<?php
// created: 2023-04-17 22:58:09
$dictionary["gdocs_global_documents_uploaded_nvc_companies"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'gdocs_global_documents_uploaded_nvc_companies' => 
    array (
      'lhs_module' => 'NVC_Companies',
      'lhs_table' => 'nvc_companies',
      'lhs_key' => 'id',
      'rhs_module' => 'GDocs_Global_Documents_Uploaded',
      'rhs_table' => 'gdocs_global_documents_uploaded',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'gdocs_global_documents_uploaded_nvc_companies_c',
      'join_key_lhs' => 'gdocs_global_documents_uploaded_nvc_companiesnvc_companies_ida',
      'join_key_rhs' => 'gdocs_glob3f1fploaded_idb',
    ),
  ),
  'table' => 'gdocs_global_documents_uploaded_nvc_companies_c',
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
      'name' => 'gdocs_global_documents_uploaded_nvc_companiesnvc_companies_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'gdocs_glob3f1fploaded_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'gdocs_global_documents_uploaded_nvc_companiesspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'gdocs_global_documents_uploaded_nvc_companies_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'gdocs_global_documents_uploaded_nvc_companiesnvc_companies_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'gdocs_global_documents_uploaded_nvc_companies_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'gdocs_glob3f1fploaded_idb',
      ),
    ),
  ),
);