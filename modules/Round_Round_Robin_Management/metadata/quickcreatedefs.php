<?php
$module_name = 'Round_Round_Robin_Management';
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
            'name' => 'counter',
            'label' => 'LBL_COUNTER',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'last_assignation_id',
            'label' => 'LBL_LAST_ASSIGNATION_ID',
          ),
          1 => 
          array (
            'name' => 'last_assignation_date',
            'label' => 'LBL_LAST_ASSIGNATION_DATE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
;
?>
