<?php
$popupMeta = array (
    'moduleMain' => 'Veta_TiposVisa',
    'varName' => 'Veta_TiposVisa',
    'orderBy' => 'veta_tiposvisa.name',
    'whereClauses' => array (
  'name' => 'veta_tiposvisa.name',
  'type_of_department_fee_c' => 'veta_tiposvisa_cstm.type_of_department_fee_c',
),
    'searchInputs' => array (
  1 => 'name',
  2 => 'type_of_department_fee_c',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'type_of_department_fee_c' => 
  array (
    'type' => 'dynamicenum',
    'studio' => 'visible',
    'label' => 'LBL_TYPE_OF_DEPARTMENT_FEE',
    'width' => '10%',
    'name' => 'type_of_department_fee_c',
  ),
),
    'listviewdefs' => array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
    'name' => 'name',
  ),
  'TOTAL_VISA' => 
  array (
    'type' => 'currency',
    'default' => true,
    'label' => 'LBL_TOTAL_VISA',
    'currency_format' => true,
    'width' => '10%',
  ),
  'COSTO_EXAMEN' => 
  array (
    'type' => 'currency',
    'default' => true,
    'label' => 'LBL_COSTO_EXAMEN',
    'currency_format' => true,
    'width' => '10%',
  ),
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
  ),
),
);
