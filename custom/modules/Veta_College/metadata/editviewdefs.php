<?php
$module_name = 'Veta_College';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'type_of_fee_c',
            'studio' => 'visible',
            'label' => 'LBL_TYPE_OF_FEE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'fee',
            'studio' => 'visible',
            'label' => 'LBL_FEE',
          ),
          1 => 
          array (
            'name' => 'process_type_c',
            'studio' => 'visible',
            'label' => 'LBL_PROCESS_TYPE',
          ),
        ),
      ),
    ),
  ),
);
;
?>
