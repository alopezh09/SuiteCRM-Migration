<?php
$module_name = 'Veta_TiposVisa';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
          3 => 'FIND_DUPLICATES',
        ),
      ),
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
            'name' => 'type_of_department_fee_c',
            'studio' => 'visible',
            'label' => 'LBL_TYPE_OF_DEPARTMENT_FEE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'total_visa',
            'label' => 'LBL_TOTAL_VISA',
          ),
          1 => 
          array (
            'name' => 'costo_examen',
            'label' => 'LBL_COSTO_EXAMEN',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'process_type_c',
            'studio' => 'visible',
            'label' => 'LBL_PROCESS_TYPE',
          ),
          1 => 
          array (
            'name' => 'training_plan_fee_c',
            'label' => 'LBL_TRAINING_PLAN_FEE',
          ),
        ),
      ),
    ),
  ),
);
;
?>
