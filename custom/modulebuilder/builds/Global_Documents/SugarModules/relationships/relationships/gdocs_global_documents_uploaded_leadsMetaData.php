<?php
// created: 2023-04-17 22:58:09
$dictionary["gdocs_global_documents_uploaded_leads"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'gdocs_global_documents_uploaded_leads' => 
    array (
      'lhs_module' => 'Leads',
      'lhs_table' => 'leads',
      'lhs_key' => 'id',
      'rhs_module' => 'GDocs_Global_Documents_Uploaded',
      'rhs_table' => 'gdocs_global_documents_uploaded',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'gdocs_global_documents_uploaded_leads_c',
      'join_key_lhs' => 'gdocs_global_documents_uploaded_leadsleads_ida',
      'join_key_rhs' => 'gdocs_glob2768ploaded_idb',
    ),
  ),
  'table' => 'gdocs_global_documents_uploaded_leads_c',
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
      'name' => 'gdocs_global_documents_uploaded_leadsleads_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'gdocs_glob2768ploaded_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'gdocs_global_documents_uploaded_leadsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'gdocs_global_documents_uploaded_leads_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'gdocs_global_documents_uploaded_leadsleads_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'gdocs_global_documents_uploaded_leads_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'gdocs_glob2768ploaded_idb',
      ),
    ),
  ),
);