<?php
$popupMeta = array (
    'moduleMain' => 'Doc_Plantillas',
    'varName' => 'Doc_Plantillas',
    'orderBy' => 'doc_plantillas.name',
    'whereClauses' => array (
  'name' => 'doc_plantillas.name',
  'tipoproceso' => 'doc_plantillas.tipoproceso',
  'tipovisa' => 'doc_plantillas.tipovisa',
  'pais' => 'doc_plantillas.pais',
  'college' => 'doc_plantillas.college',
  'nacionalidad' => 'doc_plantillas.nacionalidad',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'tipoproceso',
  5 => 'tipovisa',
  6 => 'pais',
  7 => 'college',
  8 => 'nacionalidad',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'tipoproceso' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_TIPOPROCESO',
    'width' => '10%',
    'name' => 'tipoproceso',
  ),
  'tipovisa' => 
  array (
    'type' => 'dynamicenum',
    'studio' => 'visible',
    'label' => 'LBL_TIPOVISA',
    'width' => '10%',
    'name' => 'tipovisa',
  ),
  'pais' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_PAIS',
    'width' => '10%',
    'name' => 'pais',
  ),
  'college' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_COLLEGE',
    'id' => 'VETA_COLLEGE_ID_C',
    'link' => true,
    'width' => '10%',
    'name' => 'college',
  ),
  'nacionalidad' => 
  array (
    'type' => 'dynamicenum',
    'studio' => 'visible',
    'label' => 'LBL_NACIONALIDAD',
    'width' => '10%',
    'name' => 'nacionalidad',
  ),
),
);
