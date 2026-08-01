<?php
$module_name = 'Zoom_Calls';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      0 => 'name',
      1 => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
      ),
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'zoom_calls_leads_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_ZOOM_CALLS_LEADS_FROM_LEADS_TITLE',
        'id' => 'ZOOM_CALLS_LEADSLEADS_IDA',
        'width' => '10%',
        'default' => true,
        'name' => 'zoom_calls_leads_name',
      ),
      'assigned_user_id' => 
      array (
        'name' => 'assigned_user_id',
        'label' => 'LBL_ASSIGNED_TO',
        'type' => 'enum',
        'function' => 
        array (
          'name' => 'get_user_array',
          'params' => 
          array (
            0 => false,
          ),
        ),
        'default' => true,
        'width' => '10%',
      ),
      'country_code' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_COUNTRY_CODE',
        'width' => '10%',
        'default' => true,
        'name' => 'country_code',
      ),
      'call_date' => 
      array (
        'type' => 'datetimecombo',
        'label' => 'LBL_CALL_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'call_date',
      ),
      'recording_status' => 
      array (
        'type' => 'enum',
        'studio' => 'visible',
        'label' => 'LBL_RECORDING_STATUS',
        'width' => '10%',
        'default' => true,
        'name' => 'recording_status',
      ),
      'direction' => 
      array (
        'type' => 'enum',
        'studio' => 'visible',
        'label' => 'LBL_DIRECTION',
        'width' => '10%',
        'default' => true,
        'name' => 'direction',
      ),
      'call_result' => 
      array (
        'type' => 'enum',
        'studio' => 'visible',
        'label' => 'LBL_CALL_RESULT',
        'width' => '10%',
        'default' => true,
        'name' => 'call_result',
      ),
      'current_user_only' => 
      array (
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'width' => '10%',
        'default' => true,
        'name' => 'current_user_only',
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'maxColumnsBasic' => '4',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
;
?>
