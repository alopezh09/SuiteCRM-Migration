<?php 
 //WARNING: The contents of this file are auto-generated


 // created: 2023-01-16 03:09:34
$layout_defs["Auto_Tickets"]["subpanel_setup"]['auto_tickets_emails'] = array (
  'order' => 100,
  'module' => 'Emails',
  'subpanel_name' => 'ForQueues',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_AUTO_TICKETS_EMAILS_FROM_EMAILS_TITLE',
  'get_subpanel_data' => 'auto_tickets_emails',
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


 // created: 2024-07-15 15:21:46
$layout_defs["Auto_Tickets"]["subpanel_setup"]['auto_tickets_calls_1'] = array (
  'order' => 100,
  'module' => 'Calls',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_AUTO_TICKETS_CALLS_1_FROM_CALLS_TITLE',
  'get_subpanel_data' => 'auto_tickets_calls_1',
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