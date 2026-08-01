<?php
$dashletData['Veta_PresupuestoDashlet']['searchFields'] = array (
  'tipo_visa' => 
  array (
    'default' => '',
  ),
  'veta_presupuesto_leads_name' => 
  array (
    'default' => '',
  ),
  'veta_presupuesto_contacts_name' => 
  array (
    'default' => '',
  ),
  'assigned_user_id' => 
  array (
    'default' => '',
  ),
);
$dashletData['Veta_PresupuestoDashlet']['columns'] = array (
  'name' => 
  array (
    'width' => '40%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'default' => true,
    'name' => 'name',
  ),
  
  'tipo_visa' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_TIPO_VISA',
    'id' => 'VETA_TIPOSVISA_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'total_visa' => 
  array (
    'type' => 'currency',
    'default' => true,
    'label' => 'LBL_TOTAL_VISA',
    'currency_format' => true,
    'width' => '10%',
  ),

     //Nuevo
     'components' => 
     array (
       'type' => 'varchar',
       'studio' => 'visible',
       'label' => 'LBL_COMPONENT',
       'link' => true,
       'width' => '10%',
       'default' => true,
       'name' => 'components',
     ),
     'concept' => 
     array (
       'type' => 'varchar',
       'studio' => 'visible',
       'label' => 'LBL_CONCEPT',
       'link' => true,
       'width' => '10%',
       'default' => true,
       'name' => 'concept',
     ),
     'fee' => 
     array (
       'type' => 'varchar',
       'studio' => 'visible',
       'label' => 'LBL_FEE',
       'link' => true,
       'width' => '10%',
       'default' => true,
       'name' => 'fee',
     ),
     'tipovisa' => 
     array (
       'type' => 'dynamicenum',
       'studio' => 'visible',
       'label' => 'LBL_TIPOVISA',
       'id' => 'VETA_TIPOSVISA_ID_C',
       'width' => '10%',
       'default' => true,
       'name' => 'tipovisa',
     ),

  
);
