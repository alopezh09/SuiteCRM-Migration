<?php
 // created: 2021-10-13 15:46:19
$layout_defs["NVC_Company"]["subpanel_setup"]['nvc_company_opportunities'] = array (
  'order' => 100,
  'module' => 'Opportunities',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_NVC_COMPANY_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
  'get_subpanel_data' => 'nvc_company_opportunities',
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
