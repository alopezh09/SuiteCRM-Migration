<?php
// created: 2023-03-08 21:18:15
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '45%',
    'default' => true,
  ),
  'status' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_STATUS',
    'width' => '10%',
  ),
  'date_modified' => 
  array (
    'vname' => 'LBL_DATE_MODIFIED',
    'width' => '45%',
    'default' => true,
  ),
  
  'approve_button' => 
  array (
    'vname' => 'LBL_APPROVE',
    'widget_class' => 'SubPanelApproveButtonChecklist',
    'module' => 'CSChe_Items_Requested',
    'width' => '5%',
    'default' => true,
  ),
  
  
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'CSChe_Items_Requested',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'CSChe_Items_Requested',
    'width' => '5%',
    'default' => true,
  ),
  
  
  
  
);