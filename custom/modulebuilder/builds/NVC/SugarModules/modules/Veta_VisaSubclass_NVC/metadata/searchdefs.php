<?php
$module_name = 'Veta_VisaSubclass_NVC';
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
        'studio' => 'visible',
        'label' => 'LBL_TIPOVISA',
        'width' => '10%',
        'default' => true,
        'name' => 'tipovisa',
      ),
      
      'activo' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_ACTIVO',
        'width' => '10%',
        'name' => 'activo',
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
