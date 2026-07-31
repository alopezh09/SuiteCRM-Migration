<?php
$module_name = 'NVC_Deposit_company';
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
            'name' => 'deposit_amount',
            'label' => 'LBL_DEPOSIT_AMOUNT',
          ),
        ),
        1 => 
        array (
          0 => 'assigned_user_name',
          1 => 
          array (
            'name' => 'veta_recibo_nvc_deposit_company_1_name',
            'label' => 'LBL_VETA_RECIBO_NVC_DEPOSIT_COMPANY_1_FROM_VETA_RECIBO_TITLE',
          ),
        ),
        2 => 
        array (
          0 => 'description',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'date_entered',
            'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
            'label' => 'LBL_DATE_ENTERED',
          ),
          1 => 
          array (
            'name' => 'date_modified',
            'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
            'label' => 'LBL_DATE_MODIFIED',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'deposit_validated_c',
            'label' => 'LBL_DEPOSIT_VALIDATED',
          ),
          1 => '',
        ),
        5 => 
        array (
          0 => '',
          1 => '',
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'uploadfile',
            'label' => 'LBL_FILE_UPLOAD',
          ),
          1 => 
          array (
            'name' => 'transferred_amount_c',
            'label' => 'LBL_TRANSFERRED_AMOUNT',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'transferred_from_billing_c',
            'studio' => 'visible',
            'label' => 'LBL_TRANSFERRED_FROM_BILLING',
          ),
          1 => 
          array (
            'name' => 'transferred_from_deposit_c',
            'studio' => 'visible',
            'label' => 'LBL_TRANSFERRED_FROM_DEPOSIT',
          ),
        ),
      ),
    ),
  ),
);
;
?>
