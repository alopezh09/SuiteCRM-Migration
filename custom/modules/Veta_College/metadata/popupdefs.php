<?php
$popupMeta = array (
    'moduleMain' => 'Veta_College',
    'varName' => 'Veta_College',
    'orderBy' => 'veta_college.name',
    'whereClauses' => array (
  'name' => 'veta_college.name',
  'components' => 'veta_college.components',
  'concept' => 'veta_college.concept',
  'fee' => 'veta_college.fee',
  'type_of_fee_c' => 'veta_college_cstm.type_of_fee_c',
  'tipovisa' => 'veta_college.tipovisa',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'components',
  5 => 'concept',
  6 => 'fee',
  8 => 'type_of_fee_c',
  9 => 'tipovisa',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'type_of_fee_c' => 
  array (
    'type' => 'dynamicenum',
    'studio' => 'visible',
    'label' => 'LBL_TYPE_OF_FEE',
    'width' => '10%',
    'name' => 'type_of_fee_c',
  ),
  'components' => 
  array (
    'type' => 'varchar',
    'studio' => 'visible',
    'label' => 'LBL_COMPONENT',
    'link' => true,
    'width' => '10%',
    'name' => 'components',
  ),
  'concept' => 
  array (
    'type' => 'varchar',
    'studio' => 'visible',
    'label' => 'LBL_CONCEPT',
    'link' => true,
    'width' => '10%',
    'name' => 'concept',
  ),
  'fee' => 
  array (
    'type' => 'varchar',
    'studio' => 'visible',
    'label' => 'LBL_FEE',
    'link' => true,
    'width' => '10%',
    'name' => 'fee',
  ),
  'tipovisa' => 
  array (
    'type' => 'dynamicenum',
    'studio' => 'visible',
    'label' => 'LBL_TIPOVISA',
    'id' => 'VETA_TIPOSVISA_ID_C',
    'width' => '10%',
    'name' => 'tipovisa',
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
  'TYPE_OF_FEE_C' => 
  array (
    'type' => 'dynamicenum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_TYPE_OF_FEE',
    'width' => '10%',
    'name' => 'type_of_fee_c',
  ),
  'FEE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_FEE',
    'studio' => 'visible',
    'width' => '6%',
    'default' => true,
    'name' => 'fee',
  ),
  'COMPANY_FEE_C' => 
  array (
    'type' => 'currency',
    'default' => true,
    'label' => 'LBL_COMPANY_FEE',
    'currency_format' => true,
    'width' => '10%',
    'name' => 'company_fee_c',
  ),
  'TIPOVISA' => 
  array (
    'type' => 'dynamicenum',
    'studio' => 'visible',
    'label' => 'LBL_TIPOVISA',
    'id' => 'VETA_TIPOSVISA_ID_C',
    'width' => '10%',
    'default' => true,
    'name' => 'tipovisa',
  ),
),
);
