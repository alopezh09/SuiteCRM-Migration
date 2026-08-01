<?php
$module_name = 'Zoom_Calls';
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
          0 => 'assigned_user_name',
          1 => 
          array (
            'name' => 'zoom_calls_leads_name',
            'label' => 'LBL_ZOOM_CALLS_LEADS_FROM_LEADS_TITLE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'date_entered',
            'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
            'label' => 'LBL_DATE_ENTERED',
          ),
          1 => 
          array (
            'name' => 'call_date',
            'label' => 'LBL_CALL_DATE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'call_result',
            'studio' => 'visible',
            'label' => 'LBL_CALL_RESULT',
          ),
          1 => 
          array (
            'name' => 'direction',
            'studio' => 'visible',
            'label' => 'LBL_DIRECTION',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'duration',
            'label' => 'LBL_DURATION',
          ),
          1 => 
          array (
            'name' => 'country_code',
            'label' => 'LBL_COUNTRY_CODE',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'recording_status',
            'studio' => 'visible',
            'label' => 'LBL_RECORDING_STATUS',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
;
?>
