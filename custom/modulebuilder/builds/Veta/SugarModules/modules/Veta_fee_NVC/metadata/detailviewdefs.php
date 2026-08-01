<?php
$module_name = 'Veta_fee_NVC';
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
            'name' => 'components',
            'studio' => 'visible',
            'label' => 'LBL_COMPONENT',
          ),
         
        ),

        1 => 
        array (
          0 => 
          array (
            'name' => 'concept',
            'studio' => 'visible',
            'label' => 'LBL_CONCEPT',
          ),
          1 => 
          array (
            'name' => 'fee',
            'studio' => 'visible',
            'label' => 'LBL_FEE',
          ),
        ),
       

        2 => 
        array (
          0 => 
          array (
            'name' => 'tipovisa',
            'studio' => 'visible',
            'label' => 'LBL_TIPOVISA',
          ),
        ),
        ),
      ),
    ),
  ),
);
;
?>
