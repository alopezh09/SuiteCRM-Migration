<?php
$popupMeta = array (
    'moduleMain' => 'Veta_Recibo',
    'varName' => 'Veta_Recibo',
    'orderBy' => 'veta_recibo.name',
    'whereClauses' => array (
  'name' => 'veta_recibo.name',
  'veta_recibo_leads_name' => 'veta_recibo.veta_recibo_leads_name',
  'veta_recibo_contacts_name' => 'veta_recibo.veta_recibo_contacts_name',
  'veta_recibo_veta_presupuesto_name' => 'veta_recibo.veta_recibo_veta_presupuesto_name',
  'tipo_visa' => 'veta_recibo.tipo_visa',
  'veta_recibo_opportunities_name' => 'veta_recibo.veta_recibo_opportunities_name',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'veta_recibo_leads_name',
  5 => 'veta_recibo_contacts_name',
  6 => 'veta_recibo_veta_presupuesto_name',
  8 => 'tipo_visa',
  9 => 'veta_recibo_opportunities_name',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'tipo_visa' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_TIPO_VISA',
    'id' => 'VETA_TIPOSVISA_ID_C',
    'link' => true,
    'width' => '10%',
    'name' => 'tipo_visa',
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


  
),
);
