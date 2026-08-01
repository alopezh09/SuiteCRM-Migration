<?php
$module_name = 'Veta_Presupuesto';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'modules/Veta_Presupuesto/javascript/seguro_soel.js',
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
          0 => 
          array (

            'name' => 'components',
            'studio' => 'visible',
            'label' => 'LBL_COMPONENT',
            
          ),
          1 => 
          array (
            'name' => 'concept',
            'studio' => 'visible',
            'label' => 'LBL_CONCEPT',
          
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
            'name' => 'tipo_visa',
            'studio' => 'visible',
            'label' => 'LBL_TIPO_VISA',
          ),
        ),
       
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'soel_asegurador',
            'label' => 'LBL_SOEL_ASEGURADOR',
            'type' => 'enum',
            'function' => array(
                'name'=>'getAseguradores'),
          ),
          1 => 
          array (
            'name' => 'seguro',
            'label' => 'LBL_SEGURO',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'duracion',
            'label' => 'LBL_DURACION',
          ),
          1 => 
          array (
            'name' => 'tipo_seguro',
            'studio' => 'visible',
            'label' => 'LBL_TIPO_SEGURO',
          ),
        ),
      ),
    ),
  ),
);
;
?>
