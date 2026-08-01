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
        'LBL_EDITVIEW_PANEL1' => 
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
            'name' => 'tipovisa',
            'studio' => 'visible',
            'label' => 'LBL_TIPOVISA',
          ),
          
        ),

        1 => 
        array (
         
          0 => 
          array ( 
            'name' => 'description',
            'studio' => 'visible',
            'label' => 'LBL_DESCRIPTION',
          ),
         
        ),
		  
      ),
     
    ),
  ),
);
;
?>
