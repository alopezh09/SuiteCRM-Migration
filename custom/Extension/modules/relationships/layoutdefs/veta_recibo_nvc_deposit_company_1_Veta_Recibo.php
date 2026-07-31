<?php
 // created: 2021-10-23 02:01:19
$layout_defs["Veta_Recibo"]["subpanel_setup"]['veta_recibo_nvc_deposit_company_1'] = array (
  'order' => 100,
  'module' => 'NVC_Deposit_company',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_VETA_RECIBO_NVC_DEPOSIT_COMPANY_1_FROM_NVC_DEPOSIT_COMPANY_TITLE',
  'get_subpanel_data' => 'veta_recibo_nvc_deposit_company_1',
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
