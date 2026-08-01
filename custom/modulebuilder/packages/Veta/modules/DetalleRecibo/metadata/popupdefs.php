<?php
$popupMeta = array (
    'moduleMain' => 'Veta_DetalleRecibo',
    'varName' => 'Veta_DetalleRecibo',
    'orderBy' => 'veta_detallerecibo.name',
    'whereClauses' => array (
  'name' => 'veta_detallerecibo.name',
  'veta_detallerecibo_veta_recibo_name' => 'veta_detallerecibo.veta_detallerecibo_veta_recibo_name',
  'assigned_user_id' => 'veta_detallerecibo.assigned_user_id',
  'institucion' => 'veta_detallerecibo.institucion',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'veta_detallerecibo_veta_recibo_name',
  5 => 'assigned_user_id',
  6 => 'institucion',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),

  //Nuevo 	
	
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

  'veta_detallerecibo_veta_recibo_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_VETA_DETALLERECIBO_VETA_RECIBO_FROM_VETA_RECIBO_TITLE',
    'id' => 'VETA_DETALLERECIBO_VETA_RECIBOVETA_RECIBO_IDA',
    'width' => '10%',
    'name' => 'veta_detallerecibo_veta_recibo_name',
  ),
  'assigned_user_id' => 
  array (
    'name' => 'assigned_user_id',
    'label' => 'LBL_ASSIGNED_TO',
    'type' => 'enum',
    'function' => 
    array (
      'name' => 'get_user_array',
      'params' => 
      array (
        0 => false,
      ),
    ),
    'width' => '10%',
  ),
),
);
