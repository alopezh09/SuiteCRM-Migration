<?php
// created: 2022-11-19 00:04:16
$dictionary["job_jobs_leads"] = array (
  'true_relationship_type' => 'many-to-many',
  'relationships' => 
  array (
    'job_jobs_leads' => 
    array (
      'lhs_module' => 'job_Jobs',
      'lhs_table' => 'job_jobs',
      'lhs_key' => 'id',
      'rhs_module' => 'Leads',
      'rhs_table' => 'leads',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'job_jobs_leads_c',
      'join_key_lhs' => 'job_jobs_leadsjob_jobs_ida',
      'join_key_rhs' => 'job_jobs_leadsleads_idb',
    ),
  ),
  'table' => 'job_jobs_leads_c',
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
      'name' => 'job_jobs_leadsjob_jobs_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'job_jobs_leadsleads_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'job_jobs_leadsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'job_jobs_leads_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'job_jobs_leadsjob_jobs_ida',
        1 => 'job_jobs_leadsleads_idb',
      ),
    ),
  ),
);