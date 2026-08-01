<?php
$module_name = 'Veta_Curso';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '6%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ), 

  'COMPONENT' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_COMPONENT',
    'width' => '10%',
    'default' => true,
  ),

  'TIPOVISA' => 
  array (
    'type' => 'dynamicenum',
    'id' => 'VETA_TIPOSVISA_ID_C',
    'studio' => 'visible',
    'label' => 'LBL_TIPOVISA',
    'width' => '10%',
    'default' => true,
  ),

  

   'ACTIVE' => 
  array (
    'type' => 'bool',
    'label' => 'LBL_ACTIVE',
    'width' => '6%',
    'default' => true,
  ),
);
;
?>
