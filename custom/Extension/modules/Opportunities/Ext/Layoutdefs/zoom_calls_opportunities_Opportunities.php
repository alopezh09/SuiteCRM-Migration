<?php
 // created: 2025-05-29 21:21:08
$layout_defs["Opportunities"]["subpanel_setup"]['zoom_calls_opportunities'] = array (
  'order' => 100,
  'module' => 'Zoom_Calls',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_ZOOM_CALLS_OPPORTUNITIES_FROM_ZOOM_CALLS_TITLE',
  'get_subpanel_data' => 'zoom_calls_opportunities',
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
