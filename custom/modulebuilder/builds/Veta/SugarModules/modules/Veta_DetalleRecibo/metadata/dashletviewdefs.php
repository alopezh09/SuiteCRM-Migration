<?php
$dashletData['Veta_DetalleReciboDashlet']['searchFields'] = array (
  'name' => 
  array (
    'default' => '',
  ),
  'institucion' => 
  array (
    'default' => '',
  ),
  'veta_detallerecibo_veta_recibo_name' => 
  array (
    'default' => '',
  ),
  'assigned_user_id' => 
  array (
    'default' => '',
  ),
);
$dashletData['Veta_DetalleReciboDashlet']['columns'] = array (
  'name' => 
  array (
    'width' => '40%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'default' => true,
    'name' => 'name',
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

  
);
