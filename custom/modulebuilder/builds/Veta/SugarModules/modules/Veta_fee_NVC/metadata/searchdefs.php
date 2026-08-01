<?php
$module_name = 'Veta_fee_NVC';
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
        'id' => 'VETA_TIPOSVISA_ID_C',
        'width' => '10%',
        'default' => true,
        'name' => 'tipovisa',
      ),
    
      'active' => 
      array (
        'type' => 'bool',
        'studio' => 'visible',
        'label' => 'LBL_ACTIVE',
        'link' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'active',
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
