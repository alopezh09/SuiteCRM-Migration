<?php
$popupMeta = array (
    'moduleMain' => 'Veta_DetallePresupuesto',
    'varName' => 'Veta_DetallePresupuesto',
    'orderBy' => 'veta_detallepresupuesto.name',
    'whereClauses' => array (
  'name' => 'veta_detallepresupuesto.name',
  'veta_detallepresupuesto_veta_presupuesto_name' => 'veta_detallepresupuesto.veta_detallepresupuesto_veta_presupuesto_name',
  'institucion' => 'veta_detallepresupuesto.institucion',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'veta_detallepresupuesto_veta_presupuesto_name',
  6 => 'institucion',
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
        'id' => 'VETA_TIPOSVISA_ID_C',
        'studio' => 'visible',
        'label' => 'LBL_TIPOVISA',
        'width' => '10%',
        'default' => true,
        'name' => 'tipovisa',
      ),

  'name_visatype' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_NAME_VISA_TYPE',
    'width' => '10%',
    'name' => 'name_visatype',
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
  
 
  'veta_detallepresupuesto_veta_presupuesto_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_VETA_DETALLEPRESUPUESTO_VETA_PRESUPUESTO_FROM_VETA_PRESUPUESTO_TITLE',
    'id' => 'VETA_DETALLEPRESUPUESTO_VETA_PRESUPUESTOVETA_PRESUPUESTO_IDA',
    'width' => '10%',
    'name' => 'veta_detallepresupuesto_veta_presupuesto_name',
  ),
),
);
