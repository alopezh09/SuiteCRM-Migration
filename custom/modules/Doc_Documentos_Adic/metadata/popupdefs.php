<?php
$popupMeta = array (
    'moduleMain' => 'Doc_Documentos_Adic',
    'varName' => 'Doc_Documentos_Adic',
    'orderBy' => 'doc_documentos_adic.name',
    'whereClauses' => array (
  'name' => 'doc_documentos_adic.name',
),
    'searchInputs' => array (
  0 => 'doc_documentos_adic_number',
  1 => 'name',
  2 => 'priority',
  3 => 'status',
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
  'FECHAAPROBADO' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_FECHAAPROBADO',
    'width' => '10%',
    'default' => true,
  ),
  'URL' => 
  array (
    'type' => 'url',
    'label' => 'LBL_URL',
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
    'name' => 'assigned_user_name',
  ),
  'INTERNAL_DOCUMENT_C' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_INTERNAL_DOCUMENT',
    'width' => '10%',
  ),
),
);
