<?php
$dashletData['Veta_CursoDashlet']['searchFields'] = array (
  'name' => 
  array (
    'default' => '',
  ),
  'college' => 
  array (
    'default' => '',
  ),
);
$dashletData['Veta_CursoDashlet']['columns'] = array (
  'name' => 
  array (
    'width' => '40%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'default' => true,
    'name' => 'name',
  ),

  'tipovisa' => 
  array (
    'type' => 'dynamicenum',
    'studio' => 'visible',
    'label' => 'LBL_TIPOVISA',
    'width' => '10%',
    'default' => true,
    'name' => 'tipovisa',
  ),
  'name_visaType' => 
  array (
    'type' => 'varchar',
    'studio' => 'visible',
    'label' => 'LBL_NAME_VISA_TYPE',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'name' => 'name_visaType',
  ),
  
  'description' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_DESCRIPTION',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'name' => 'description',
  ),
  
  
);
