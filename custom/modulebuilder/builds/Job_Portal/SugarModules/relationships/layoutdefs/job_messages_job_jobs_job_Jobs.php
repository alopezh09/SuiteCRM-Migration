<?php
 // created: 2022-11-19 00:04:16
$layout_defs["job_Jobs"]["subpanel_setup"]['job_messages_job_jobs'] = array (
  'order' => 100,
  'module' => 'job_Messages',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_JOB_MESSAGES_JOB_JOBS_FROM_JOB_MESSAGES_TITLE',
  'get_subpanel_data' => 'job_messages_job_jobs',
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
