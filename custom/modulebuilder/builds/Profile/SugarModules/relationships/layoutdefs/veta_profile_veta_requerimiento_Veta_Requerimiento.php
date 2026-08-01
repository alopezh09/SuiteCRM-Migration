<?php
 // created: 2024-04-24 16:01:00
$layout_defs["Veta_Requerimiento"]["subpanel_setup"]['veta_profile_veta_requerimiento'] = array (
  'order' => 100,
  'module' => 'Veta_Profile',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_VETA_PROFILE_VETA_REQUERIMIENTO_FROM_VETA_PROFILE_TITLE',
  'get_subpanel_data' => 'veta_profile_veta_requerimiento',
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
