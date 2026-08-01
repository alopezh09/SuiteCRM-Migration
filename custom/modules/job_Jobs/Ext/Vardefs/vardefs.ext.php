<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2022-11-19 00:04:16
$dictionary["job_Jobs"]["fields"]["job_jobs_leads"] = array (
  'name' => 'job_jobs_leads',
  'type' => 'link',
  'relationship' => 'job_jobs_leads',
  'source' => 'non-db',
  'module' => 'Leads',
  'bean_name' => 'Lead',
  'vname' => 'LBL_JOB_JOBS_LEADS_FROM_LEADS_TITLE',
);


// created: 2022-11-19 00:04:16
$dictionary["job_Jobs"]["fields"]["job_messages_job_jobs"] = array (
  'name' => 'job_messages_job_jobs',
  'type' => 'link',
  'relationship' => 'job_messages_job_jobs',
  'source' => 'non-db',
  'module' => 'job_Messages',
  'bean_name' => 'job_Messages',
  'vname' => 'LBL_JOB_MESSAGES_JOB_JOBS_FROM_JOB_MESSAGES_TITLE',
);


// created: 2022-11-19 00:04:16
$dictionary["job_Jobs"]["fields"]["job_jobs_nvc_companies"] = array (
  'name' => 'job_jobs_nvc_companies',
  'type' => 'link',
  'relationship' => 'job_jobs_nvc_companies',
  'source' => 'non-db',
  'module' => 'NVC_Companies',
  'bean_name' => 'NVC_Companies',
  'vname' => 'LBL_JOB_JOBS_NVC_COMPANIES_FROM_NVC_COMPANIES_TITLE',
  'id_name' => 'job_jobs_nvc_companiesnvc_companies_ida',
);
$dictionary["job_Jobs"]["fields"]["job_jobs_nvc_companies_name"] = array (
  'name' => 'job_jobs_nvc_companies_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_JOB_JOBS_NVC_COMPANIES_FROM_NVC_COMPANIES_TITLE',
  'save' => true,
  'id_name' => 'job_jobs_nvc_companiesnvc_companies_ida',
  'link' => 'job_jobs_nvc_companies',
  'table' => 'nvc_companies',
  'module' => 'NVC_Companies',
  'rname' => 'name',
);
$dictionary["job_Jobs"]["fields"]["job_jobs_nvc_companiesnvc_companies_ida"] = array (
  'name' => 'job_jobs_nvc_companiesnvc_companies_ida',
  'type' => 'link',
  'relationship' => 'job_jobs_nvc_companies',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_JOB_JOBS_NVC_COMPANIES_FROM_JOB_JOBS_TITLE',
);

?>