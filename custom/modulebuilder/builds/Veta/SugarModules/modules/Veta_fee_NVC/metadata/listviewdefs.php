<?php
$module_name = 'Veta_fee_NVC';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),

  //Nuevo
  
  'COMPONENTS' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_COMPONENT',
    'width' => '6%',
    'default' => true,
  ),

   'CONCEPT' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CONCEPT',
    'studio' => 'visible',
    'width' => '6%',
    'default' => true,
  ),

  'FEE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_FEE',
    'studio' => 'visible',
    'width' => '6%',
    'default' => true,
  ),

  'TIPOVISA' => 
  array (
    'type' => 'dynamicenum',
    'studio' => 'visible',
    'label' => 'LBL_TIPOVISA',
    'id' => 'VETA_TIPOSVISA_ID_C',
    'width' => '10%',
    'default' => true,
  ),

);
;
?>
