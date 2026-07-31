<?php
$module_name = 'Veta_Curso';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
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
      'subclass_c' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_SUBCLASS',
        'width' => '10%',
        'name' => 'subclass_c',
      ),
      'process_type_c' => 
      array (
        'type' => 'multienum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PROCESS_TYPE',
        'width' => '10%',
        'name' => 'process_type_c',
      ),
      'tipovisa' => 
      array (
        'type' => 'dynamicenum',
        'id' => 'VETA_TIPOSVISA_ID_C',
        'studio' => 'visible',
        'label' => 'LBL_TIPOVISA',
        'width' => '10%',
        'default' => true,
        'name' => 'tipovisa',
      ),
      'turnover_c' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_TURNOVER',
        'width' => '10%',
        'name' => 'turnover_c',
      ),
      'processes_c' => 
      array (
        'type' => 'multienum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PROCESSES',
        'width' => '10%',
        'name' => 'processes_c',
      ),
      'activo' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_ACTIVO',
        'width' => '10%',
        'name' => 'activo',
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
