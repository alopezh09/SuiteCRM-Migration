<?php
 // created: 2023-05-03 21:44:15
$layout_defs["NVC_Companies"]["subpanel_setup"]['nvc_companies_veta_presupuesto_1'] = array (
  'order' => 100,
  'module' => 'Veta_Presupuesto',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_NVC_COMPANIES_VETA_PRESUPUESTO_1_FROM_VETA_PRESUPUESTO_TITLE',
  'get_subpanel_data' => 'nvc_companies_veta_presupuesto_1',
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
