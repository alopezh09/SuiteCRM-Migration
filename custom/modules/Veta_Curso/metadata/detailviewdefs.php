<?php
$module_name = 'Veta_Curso';
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
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'display_name_c',
            'label' => 'LBL_DISPLAY_NAME',
          ),
          1 => 
          array (
            'name' => 'created_by_name',
            'label' => 'LBL_CREATED',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'subclass_c',
            'studio' => 'visible',
            'label' => 'LBL_SUBCLASS',
          ),
          1 => 
          array (
            'name' => 'tipovisa',
            'studio' => 'visible',
            'label' => 'LBL_TIPOVISA',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'processes_c',
            'studio' => 'visible',
            'label' => 'LBL_PROCESSES',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'studio' => 'visible',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'terms_and_conditions_company_c',
            'studio' => 'visible',
            'label' => 'LBL_TERMS_AND_CONDITIONS_COMPANY',
          ),
        ),
      ),
    ),
  ),
);
;
?>
