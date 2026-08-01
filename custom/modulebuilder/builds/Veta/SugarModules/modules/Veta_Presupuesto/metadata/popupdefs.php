<?php
$popupMeta = array (
    'moduleMain' => 'Veta_Presupuesto',
    'varName' => 'Veta_Presupuesto',
    'orderBy' => 'veta_presupuesto.name',
    'whereClauses' => array (
  'name' => 'veta_presupuesto.name',
  'veta_presupuesto_leads_name' => 'veta_presupuesto.veta_presupuesto_leads_name',
  'veta_presupuesto_contacts_name' => 'veta_presupuesto.veta_presupuesto_contacts_name',
  'tipo_visa' => 'veta_presupuesto.tipo_visa',
  'assigned_user_name' => 'veta_presupuesto.assigned_user_name',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'veta_presupuesto_leads_name',
  5 => 'veta_presupuesto_contacts_name',
  6 => 'tipo_visa',
  7 => 'assigned_user_name',
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
