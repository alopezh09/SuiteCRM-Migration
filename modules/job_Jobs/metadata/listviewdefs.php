<?php
$module_name = 'job_Jobs';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'COMPANY' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_COMPANY',
    'id' => 'NVC_COMPANIES_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'LOCATION' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_LOCATION',
    'width' => '10%',
    'default' => true,
  ),
  'SKILLS_REQUIRED' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SKILLS_REQUIRED',
    'width' => '10%',
    'default' => true,
  ),
  'SALARY_DOWN' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SALARY_DOWN',
    'width' => '10%',
    'default' => true,
  ),
  'CATEGORY' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_CATEGORY',
    'id' => 'JOB_CATEGORIES_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'POSITIONS' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_POSITIONS',
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
  'EXPIRATION_DATE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_EXPIRATION_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
  ),
  'STATUS' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_STATUS',
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
