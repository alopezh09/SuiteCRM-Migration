<?php
// created: 2024-09-16 17:21:44
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '45%',
    'default' => true,
  ),
  'type_of_fee_c' => 
  array (
    'type' => 'dynamicenum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_TYPE_OF_FEE',
    'width' => '10%',
  ),
  'fee' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'vname' => 'LBL_FEE',
    'width' => '10%',
  ),
  'company_fee_c' => 
  array (
    'type' => 'currency',
    'default' => true,
    'vname' => 'LBL_COMPANY_FEE',
    'currency_format' => true,
    'width' => '10%',
  ),
  'process_type_c' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_PROCESS_TYPE',
    'width' => '10%',
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
    'module' => 'Veta_College',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'Veta_College',
    'width' => '5%',
    'default' => true,
  ),
);