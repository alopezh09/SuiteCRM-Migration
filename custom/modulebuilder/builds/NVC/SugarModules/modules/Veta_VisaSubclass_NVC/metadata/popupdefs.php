<?php
$popupMeta = array (
    'moduleMain' => 'Veta_Curso',
    'varName' => 'Veta_Curso',
    'orderBy' => 'veta_curso.name',
    'whereClauses' => array (
  'name' => 'veta_curso.name',
  'college' => 'veta_curso.college',
  'tipo_curso' => 'veta_curso.tipo_curso',
  'activo' => 'veta_curso.activo',
),
    'searchInputs' => array (
  1 => 'name',
  // 4 => 'college',
  // 5 => 'tipo_curso',
  6 => 'activo',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),

  'tipovisa' => 
  array (
    'type' => 'dynamicenum',
    'studio' => 'visible',
    'label' => 'LBL_TIPOVISA',
    'width' => '10%',
    'default' => true,
    'name' => 'tipovisa',
  ),
      'name_visaType' => 
      array (
        'type' => 'varchar',
        'studio' => 'visible',
        'label' => 'LBL_NAME_VISA_TYPE',
        'link' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'name_visaType',
      ),

  
  'activo' => 
  array (
    'type' => 'bool',
    'label' => 'LBL_ACTIVO',
    'width' => '10%',
    'name' => 'activo',
  ),
  'description' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_DESCRIPTION',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'name' => 'description',
  ),
),
);
