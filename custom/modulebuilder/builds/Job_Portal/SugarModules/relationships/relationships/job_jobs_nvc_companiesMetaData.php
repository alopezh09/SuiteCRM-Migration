<?php
// created: 2022-11-19 00:04:16
$dictionary["job_jobs_nvc_companies"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'job_jobs_nvc_companies' => 
    array (
      'lhs_module' => 'NVC_Companies',
      'lhs_table' => 'nvc_companies',
      'lhs_key' => 'id',
      'rhs_module' => 'job_Jobs',
      'rhs_table' => 'job_jobs',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'job_jobs_nvc_companies_c',
      'join_key_lhs' => 'job_jobs_nvc_companiesnvc_companies_ida',
      'join_key_rhs' => 'job_jobs_nvc_companiesjob_jobs_idb',
    ),
  ),
  'table' => 'job_jobs_nvc_companies_c',
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
      'name' => 'job_jobs_nvc_companiesnvc_companies_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'job_jobs_nvc_companiesjob_jobs_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'job_jobs_nvc_companiesspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'job_jobs_nvc_companies_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'job_jobs_nvc_companiesnvc_companies_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'job_jobs_nvc_companies_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'job_jobs_nvc_companiesjob_jobs_idb',
      ),
    ),
  ),
);