<?php
$module_name = 'Veta_College';
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
;
?>
