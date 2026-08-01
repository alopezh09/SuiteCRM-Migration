<?php
$module_name = 'Round_Round_Robin_Management';
$listViewDefs [$module_name] = 
array (
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
  ),
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'COUNTER' => 
  array (
    'type' => 'int',
    'label' => 'LBL_COUNTER',
    'width' => '10%',
    'default' => true,
  ),
  'LAST_ASSIGNATION_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_LAST_ASSIGNATION_ID',
    'width' => '10%',
    'default' => true,
  ),
  'LAST_ASSIGNATION_DATE' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_LAST_ASSIGNATION_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => false,
  ),
);
;
?>
