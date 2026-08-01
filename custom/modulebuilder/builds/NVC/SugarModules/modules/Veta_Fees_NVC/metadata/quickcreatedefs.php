<?php
$module_name = 'Veta_Fees_NVC';
$viewdefs [$module_name] = 
array (
  'QuickCreate' => 
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
);
;
?>
