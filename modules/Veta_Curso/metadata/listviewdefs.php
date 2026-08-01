<?php
$module_name = 'Veta_Curso';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ), 


  'TIPOVISA' => 
  array (
    'type' => 'dynamicenum',
    'studio' => 'visible',
    'id' => 'VETA_TIPOSVISA_ID_C',
    'label' => 'LBL_TIPOVISA',
    'width' => '10%',
    'default' => true,
  ), 

   'ACTIVO' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_ACTIVO',
    'width' => '10%',
  ),

  
);
;
?>
