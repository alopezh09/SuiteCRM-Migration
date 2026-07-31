<?php
// created: 2022-11-19 00:04:16
$dictionary["job_messages_job_jobs"] = array (
  'true_relationship_type' => 'many-to-many',
  'relationships' => 
  array (
    'job_messages_job_jobs' => 
    array (
      'lhs_module' => 'job_Messages',
      'lhs_table' => 'job_messages',
      'lhs_key' => 'id',
      'rhs_module' => 'job_Jobs',
      'rhs_table' => 'job_jobs',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'job_messages_job_jobs_c',
      'join_key_lhs' => 'job_messages_job_jobsjob_messages_ida',
      'join_key_rhs' => 'job_messages_job_jobsjob_jobs_idb',
    ),
  ),
  'table' => 'job_messages_job_jobs_c',
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
      'name' => 'job_messages_job_jobsjob_messages_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'job_messages_job_jobsjob_jobs_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'job_messages_job_jobsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'job_messages_job_jobs_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'job_messages_job_jobsjob_messages_ida',
        1 => 'job_messages_job_jobsjob_jobs_idb',
      ),
    ),
  ),
);