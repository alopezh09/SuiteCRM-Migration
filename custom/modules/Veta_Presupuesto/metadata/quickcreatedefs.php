<?php
$module_name = 'Veta_Presupuesto';
$viewdefs [$module_name] = 
array (
  'QuickCreate' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'hidden' => 
        array (
          0 => '<input type="hidden" id="asegurador" name="asegurador" value="{$fields.asegurador.value}">',
        ),
      ),
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
        'LBL_QUICKCREATE_PANEL2' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_QUICKCREATE_PANEL3' => 
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
            'name' => 'descuento',
            'label' => 'LBL_DESCUENTO',
          ),
          1 => 
          array (
            'name' => 'company_discount_c',
            'label' => 'LBL_COMPANY_DISCOUNT',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO_NAME',
          ),
        ),
      ),
      'lbl_quickcreate_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'department_visa_fee_1_c',
            'studio' => 'visible',
            'label' => 'LBL_DEPARTMENT_VISA_FEE_1',
          ),
          1 => 
          array (
            'name' => 'department_visa_fee_2_c',
            'studio' => 'visible',
            'label' => 'LBL_DEPARTMENT_VISA_FEE_2',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'department_visa_fee_3_c',
            'studio' => 'visible',
            'label' => 'LBL_DEPARTMENT_VISA_FEE_3',
          ),
          1 => 
          array (
            'name' => 'department_visa_fee_4_c',
            'studio' => 'visible',
            'label' => 'LBL_DEPARTMENT_VISA_FEE_4',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'department_visa_fee_5_c',
            'studio' => 'visible',
            'label' => 'LBL_DEPARTMENT_VISA_FEE_5',
          ),
          1 => 
          array (
            'name' => 'department_visa_fee_6_c',
            'studio' => 'visible',
            'label' => 'LBL_DEPARTMENT_VISA_FEE_6',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'department_visa_fee_7_c',
            'studio' => 'visible',
            'label' => 'LBL_DEPARTMENT_VISA_FEE_7',
          ),
          1 => '',
        ),
      ),
      'lbl_quickcreate_panel3' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'department_visa_fee_company1_c',
            'studio' => 'visible',
            'label' => 'LBL_DEPARTMENT_VISA_FEE_COMPANY1',
          ),
          1 => 
          array (
            'name' => 'department_visa_fee_company2_c',
            'studio' => 'visible',
            'label' => 'LBL_DEPARTMENT_VISA_FEE_COMPANY2',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'department_visa_fee_company3_c',
            'studio' => 'visible',
            'label' => 'LBL_DEPARTMENT_VISA_FEE_COMPANY3',
          ),
          1 => 
          array (
            'name' => 'department_visa_fee_company4_c',
            'studio' => 'visible',
            'label' => 'LBL_DEPARTMENT_VISA_FEE_COMPANY4',
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
            'function' => 
            array (
              'name' => 'getAseguradores',
            ),
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
