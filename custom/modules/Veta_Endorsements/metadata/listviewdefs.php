<?php
$module_name = 'Veta_Endorsements';
$listViewDefs [$module_name] = 
array (
  'VETA_ENDORSEMENTS_NVC_COMPANIES_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_VETA_ENDORSEMENTS_NVC_COMPANIES_FROM_NVC_COMPANIES_TITLE',
    'id' => 'VETA_ENDORSEMENTS_NVC_COMPANIESNVC_COMPANIES_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'ENDORSEMENT_DATE_C' => 
  array (
    'type' => 'date',
    'default' => true,
    'label' => 'LBL_ENDORSEMENT_DATE',
    'width' => '10%',
  ),
  'VISA_TYPE' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_VISA_TYPE',
    'width' => '10%',
    'default' => true,
  ),
  'OCUPATION' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_OCUPATION',
    'width' => '10%',
    'default' => true,
  ),
  'POSITIONS_YEAR_1' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_POSITIONS_LIST_1',
    'width' => '10%',
    'default' => true,
  ),
  'POSITIONS_YEAR_2' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_POSITIONS_LIST_2',
    'width' => '10%',
    'default' => true,
  ),
  'POSITIONS_YEAR_3' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_POSITIONS_LIST_3',
    'width' => '10%',
    'default' => true,
  ),
  'POSITIONS_YEAR_4' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_POSITIONS_LIST_4',
    'width' => '10%',
    'default' => true,
  ),
  'POSITIONS_YEAR_5' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_POSITIONS_LIST_5',
    'width' => '10%',
    'default' => true,
  ),
  'DATE_MODIFIED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_MODIFIED',
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
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => false,
  ),
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => false,
    'link' => true,
  ),
);
;
?>
