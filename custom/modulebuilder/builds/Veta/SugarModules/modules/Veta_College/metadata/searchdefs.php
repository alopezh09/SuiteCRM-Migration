<?php
$module_name = 'Veta_College';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
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
