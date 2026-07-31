<?php
// created: 2025-04-24 22:14:37
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '45%',
    'default' => true,
  ),
  'deposit_amount' => 
  array (
    'type' => 'currency',
    'vname' => 'LBL_DEPOSIT_AMOUNT',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
  ),
  'transferred_amount_c' => 
  array (
    'type' => 'currency',
    'default' => true,
    'vname' => 'LBL_TRANSFERRED_AMOUNT',
    'currency_format' => true,
    'width' => '10%',
  ),
  'transferred_from_billing_c' => 
  array (
    'type' => 'relate',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_TRANSFERRED_FROM_BILLING',
    'id' => 'VETA_RECIBO_ID_C',
    'link' => true,
    'width' => '10%',
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'Veta_Recibo',
    'target_record_key' => 'veta_recibo_id_c',
  ),
  'transferred_from_deposit_c' => 
  array (
    'type' => 'relate',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_TRANSFERRED_FROM_DEPOSIT',
    'id' => 'NVC_DEPOSIT_COMPANY_ID_C',
    'link' => true,
    'width' => '10%',
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'NVC_Deposit_company',
    'target_record_key' => 'nvc_deposit_company_id_c',
  ),
  'description' => 
  array (
    'type' => 'text',
    'vname' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'deposit_validated_c' => 
  array (
    'type' => 'bool',
    'default' => true,
    'vname' => 'LBL_DEPOSIT_VALIDATED',
    'width' => '10%',
  ),
  'date_entered' => 
  array (
    'type' => 'datetime',
    'vname' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
  ),
  'date_modified' => 
  array (
    'vname' => 'LBL_DATE_MODIFIED',
    'width' => '45%',
    'default' => true,
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'NVC_Deposit_company',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'NVC_Deposit_company',
    'width' => '5%',
    'default' => true,
  ),
);