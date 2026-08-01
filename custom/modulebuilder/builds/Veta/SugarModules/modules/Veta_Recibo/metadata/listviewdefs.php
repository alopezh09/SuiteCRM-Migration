<?php
$module_name = 'Veta_Recibo';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
 
  'TIPO_VISA' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_TIPO_VISA',
    'id' => 'VETA_TIPOSVISA_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
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
 
 
);
;
?>
