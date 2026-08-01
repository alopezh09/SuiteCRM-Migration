<?php
$module_name = 'NVC_Company';
$_object_name = 'nvc_company';
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
          1 => 'phone_office',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'website',
            'type' => 'link',
          ),
          1 => 
          array (
            'name' => 'phone_alternate',
            'label' => 'LBL_OTHER_PHONE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'company_contact_person_name',
            'label' => 'LBL_COMPANY_CONTACT_PERSON_NAME',
          ),
          1 => 
          array (
            'name' => 'company_sbs_expiry_date',
            'label' => 'LBL_COMPANY_SBS_EXPIRY_DATE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'company_contact_position',
            'label' => 'LBL_COMPANY_CONTACT_POSITION',
          ),
          1 => 
          array (
            'name' => 'company_leap_id',
            'label' => 'LBL_COMPANY_LEAP_ID',
          ),
        ),
        4 => 
        array (
          0 => 'employees',
          1 => 
          array (
            'name' => 'number_of_position_available',
            'label' => 'LBL_NUMBER_OF_POSITION_AVAILABLE',
          ),
        ),
        5 => 
        array (
          0 => 'nvc_company_type',
          1 => 'industry',
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO_NAME',
          ),
          1 => 
          array (
            'name' => 'date_entered',
            'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'billing_address_street',
            'label' => 'LBL_BILLING_ADDRESS',
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'billing',
            ),
          ),
          1 => 
          array (
            'name' => 'shipping_address_street',
            'label' => 'LBL_SHIPPING_ADDRESS',
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'shipping',
            ),
          ),
        ),
        8 => 
        array (
          0 => 'description',
        ),
        9 => 
        array (
          0 => 'email1',
        ),
      ),
    ),
  ),
);
;
?>
