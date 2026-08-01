<?php
$module_name = 'Veta_DetallePresupuesto';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'name' => 
      array (
        'type' => 'name',
        'link' => true,
        'label' => 'LBL_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'name',
      ),
      
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'type' => 'name',
        'link' => true,
        'label' => 'LBL_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'name',
      ),

      //Nuevos
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
      'tipovisa' => 
      array (
        'type' => 'dynamicenum',
        'id' => 'VETA_TIPOSVISA_ID_C',
        'studio' => 'visible',
        'label' => 'LBL_TIPOVISA',
        'width' => '10%',
        'default' => true,
        'name' => 'tipovisa',
      ),
     
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'maxColumnsBasic' => '4',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
;
?>
