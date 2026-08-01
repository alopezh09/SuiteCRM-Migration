<?php 
 //WARNING: The contents of this file are auto-generated


 // created: 2025-03-05 17:24:22
$layout_defs["Auto_Recordatorio"]["subpanel_setup"]['auto_recordatorio_calls'] = array (
  'order' => 100,
  'module' => 'Calls',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_AUTO_RECORDATORIO_CALLS_FROM_CALLS_TITLE',
  'get_subpanel_data' => 'auto_recordatorio_calls',
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


 // created: 2025-03-05 17:24:22
$layout_defs["Auto_Recordatorio"]["subpanel_setup"]['auto_recordatorio_emails'] = array (
  'order' => 100,
  'module' => 'Emails',
  'subpanel_name' => 'ForQueues',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_AUTO_RECORDATORIO_EMAILS_FROM_EMAILS_TITLE',
  'get_subpanel_data' => 'auto_recordatorio_emails',
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

?>