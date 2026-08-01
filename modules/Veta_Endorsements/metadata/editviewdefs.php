<?php
$module_name = 'Veta_Endorsements';
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
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'visa_type',
            'studio' => 'visible',
            'label' => 'LBL_VISA_TYPE',
          ),
          1 => 
          array (
            'name' => 'ocupation',
            'label' => 'LBL_OCUPATION',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'positions_year_1',
            'label' => 'LBL_POSITIONS_YEAR_1',
          ),
          1 => 
          array (
            'name' => 'positions_year_2',
            'label' => 'LBL_POSITIONS_YEAR_2',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'positions_year_3',
            'label' => 'LBL_POSITIONS_YEAR_3',
          ),
          1 => 
          array (
            'name' => 'positions_year_4',
            'label' => 'LBL_POSITIONS_YEAR_4',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'positions_year_5',
            'label' => 'LBL_POSITIONS_YEAR_5',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
;
?>
