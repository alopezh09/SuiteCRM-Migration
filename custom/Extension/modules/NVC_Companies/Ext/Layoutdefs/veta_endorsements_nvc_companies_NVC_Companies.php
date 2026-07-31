<?php
 // created: 2024-07-03 18:26:04
$layout_defs["NVC_Companies"]["subpanel_setup"]['veta_endorsements_nvc_companies'] = array (
  'order' => 100,
  'module' => 'Veta_Endorsements',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_VETA_ENDORSEMENTS_NVC_COMPANIES_FROM_VETA_ENDORSEMENTS_TITLE',
  'get_subpanel_data' => 'veta_endorsements_nvc_companies',
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
