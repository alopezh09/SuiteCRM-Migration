<?php
 // created: 2022-11-19 00:04:16
$layout_defs["job_Jobs"]["subpanel_setup"]['job_jobs_leads'] = array (
  'order' => 100,
  'module' => 'Leads',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_JOB_JOBS_LEADS_FROM_LEADS_TITLE',
  'get_subpanel_data' => 'job_jobs_leads',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);
