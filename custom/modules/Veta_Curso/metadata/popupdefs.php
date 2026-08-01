<?php
$popupMeta = array (
    'moduleMain' => 'Veta_Curso',
    'varName' => 'Veta_Curso',
    'orderBy' => 'veta_curso.name',
    'whereClauses' => array (
  'name' => 'veta_curso.name',
  'display_name_c' => 'veta_curso_cstm.display_name_c',
),
    'searchInputs' => array (
  1 => 'name',
  2 => 'display_name_c',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'display_name_c' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_DISPLAY_NAME',
    'width' => '10%',
    'name' => 'display_name_c',
  ),
),
    'listviewdefs' => array (
  'NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
    'name' => 'name',
  ),
  'DISPLAY_NAME_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_DISPLAY_NAME',
    'width' => '10%',
  ),
),
);
