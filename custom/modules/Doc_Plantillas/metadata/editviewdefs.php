<?php
$module_name = 'Doc_Plantillas';
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
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
        ),
        1 => 
        array (
          0 => 'description',
          1 => 
          array (
            'name' => 'document_module_c',
            'studio' => 'visible',
            'label' => 'LBL_DOCUMENT_MODULE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'process_type_c',
            'studio' => 'visible',
            'label' => 'LBL_PROCESS_TYPE',
          ),
          1 => 
          array (
            'name' => 'type_of_checklist_c',
            'studio' => 'visible',
            'label' => 'LBL_TYPE_OF_CHECKLIST',
          ),
        ),
      ),
    ),
  ),
);
;
?>
