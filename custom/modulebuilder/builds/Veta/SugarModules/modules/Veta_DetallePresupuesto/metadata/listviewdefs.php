<?php
$module_name = 'Veta_DetallePresupuesto';
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
