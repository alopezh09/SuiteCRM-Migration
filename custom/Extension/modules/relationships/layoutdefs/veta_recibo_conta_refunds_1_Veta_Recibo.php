<?php
 // created: 2022-06-21 21:17:40
$layout_defs["Veta_Recibo"]["subpanel_setup"]['veta_recibo_conta_refunds_1'] = array (
  'order' => 100,
  'module' => 'Conta_refunds',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_VETA_RECIBO_CONTA_REFUNDS_1_FROM_CONTA_REFUNDS_TITLE',
  'get_subpanel_data' => 'veta_recibo_conta_refunds_1',
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
