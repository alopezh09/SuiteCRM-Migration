<?php
 // created: 2023-03-14 17:10:05
$layout_defs["Veta_Visa"]["subpanel_setup"]['veta_visa_csche_items_requested_1'] = array (
  'order' => 100,
  'module' => 'CSChe_Items_Requested',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_VETA_VISA_CSCHE_ITEMS_REQUESTED_1_FROM_CSCHE_ITEMS_REQUESTED_TITLE',
  'get_subpanel_data' => 'veta_visa_csche_items_requested_1',
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
