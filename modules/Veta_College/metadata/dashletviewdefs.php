<?php
$dashletData['Veta_CollegeDashlet']['searchFields'] = array (
  'name' => 
  array (
    'default' => '',
  ),
  'components' => 
  array (
    'default' => '',
  ),
  'concept' => 
  array (
    'default' => '',
  ),
  'fee' => 
  array (
    'default' => '',
  ),
  'visaType' => 
  array (
    'default' => '',
  ),
  // 'pais' => 
  // array (
  //   'default' => '',
  // ),
  // 'estado' => 
  // array (
  //   'default' => '',
  // ),
  // 'ciudad' => 
  // array (
  //   'default' => '',
  // ),
  // 'date_entered' => 
  // array (
  //   'default' => '',
  // ),
  // 'date_modified' => 
  // array (
  //   'default' => '',
  // ),
);
$dashletData['Veta_CollegeDashlet']['columns'] = array (
  'name' => 
  array (
    'width' => '40%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'default' => true,
    'name' => 'name',
  ),

  //Nuevo
  'components' => 
  array (
    'type' => 'varchar',
    'studio' => 'visible',
    'label' => 'LBL_COMPONENT',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'name' => 'components',
  ),
  'concept' => 
  array (
    'type' => 'varchar',
    'studio' => 'visible',
    'label' => 'LBL_CONCEPT',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'name' => 'concept',
  ),
  'fee' => 
  array (
    'type' => 'varchar',
    'studio' => 'visible',
    'label' => 'LBL_FEE',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'name' => 'fee',
  ),
  'tipovisa' => 
  array (
    'type' => 'dynamicenum',
    'studio' => 'visible',
    'label' => 'LBL_TIPOVISA',
    'id' => 'VETA_TIPOSVISA_ID_C',
    'width' => '10%',
    'default' => true,
    'name' => 'tipovisa',
  ),
  
  
);
