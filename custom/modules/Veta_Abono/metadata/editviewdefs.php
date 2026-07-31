<?php
$module_name = 'Veta_Abono';
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
      'form' => 
      array (
        'enctype' => 'multipart/form-data',
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
            'name' => 'monto',
            'label' => 'LBL_MONTO',
          ),
          1 => '',
        ),
        1 => 
        array (
          0 => 'description',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'custom_date_entered_applicant_c',
            'label' => 'LBL_CUSTOM_DATE_ENTERED_APPLICANT',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'deposit_validated_c',
            'label' => 'LBL_DEPOSIT_VALIDATED',
          ),
          1 => 
          array (
            'name' => 'uploadfile',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'transferred_amount_c',
            'label' => 'LBL_TRANSFERRED_AMOUNT',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
;
?>
