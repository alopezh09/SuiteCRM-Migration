<?php
$module_name = 'Zoom_Calls';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
  'ZOOM_CALLS_LEADS_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_ZOOM_CALLS_LEADS_FROM_LEADS_TITLE',
    'id' => 'ZOOM_CALLS_LEADSLEADS_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'CALL_DATE' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_CALL_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'DURATION' => 
  array (
    'type' => 'int',
    'label' => 'LBL_DURATION',
    'width' => '10%',
    'default' => true,
  ),
  'COUNTRY_CODE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_COUNTRY_CODE',
    'width' => '10%',
    'default' => true,
  ),
  'DIRECTION' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_DIRECTION',
    'width' => '10%',
    'default' => true,
  ),
  'CALL_RESULT' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_CALL_RESULT',
    'width' => '10%',
    'default' => true,
  ),
  'RECORDING_STATUS' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_RECORDING_STATUS',
    'width' => '10%',
    'default' => true,
  ),
);
;
?>
