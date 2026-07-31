<?php
$dashletData['Veta_ReciboDashlet']['searchFields'] = array (
  'tipo_visa' => 
  array (
    'default' => '',
  ),
  'veta_recibo_leads_name' => 
  array (
    'default' => '',
  ),
  'veta_recibo_veta_presupuesto_name' => 
  array (
    'default' => '',
  ),
  'veta_recibo_contacts_name' => 
  array (
    'default' => '',
  ),
  'date_entered' => 
  array (
    'default' => '',
  ),
);
$dashletData['Veta_ReciboDashlet']['columns'] = array (
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
	  
  
  // 'seguro' => 
  // array (
  //   'type' => 'currency',
  //   'default' => true,
  //   'label' => 'LBL_SEGURO',
  //   'currency_format' => true,
  //   'width' => '10%',
  // ),
  // 'examen_medico' => 
  // array (
  //   'type' => 'currency',
  //   'default' => true,
  //   'label' => 'LBL_EXAMEN_MEDICO',
  //   'currency_format' => true,
  //   'width' => '10%',
  // ),
  // 'subtotal' => 
  // array (
  //   'type' => 'currency',
  //   'default' => true,
  //   'label' => 'LBL_SUBTOTAL',
  //   'currency_format' => true,
  //   'width' => '10%',
  // ),
  // 'gran_total' => 
  // array (
  //   'type' => 'currency',
  //   'default' => true,
  //   'label' => 'LBL_GRAN_TOTAL',
  //   'currency_format' => true,
  //   'width' => '10%',
  // ),
  // 'veta_recibo_leads_name' => 
  // array (
  //   'type' => 'relate',
  //   'link' => true,
  //   'label' => 'LBL_VETA_RECIBO_LEADS_FROM_LEADS_TITLE',
  //   'id' => 'VETA_RECIBO_LEADSLEADS_IDA',
  //   'width' => '10%',
  //   'default' => true,
  // ),
  // 'veta_recibo_veta_presupuesto_name' => 
  // array (
  //   'type' => 'relate',
  //   'link' => true,
  //   'label' => 'LBL_VETA_RECIBO_VETA_PRESUPUESTO_FROM_VETA_PRESUPUESTO_TITLE',
  //   'id' => 'VETA_RECIBO_VETA_PRESUPUESTOVETA_PRESUPUESTO_IDA',
  //   'width' => '10%',
  //   'default' => true,
  // ),
  // 'veta_recibo_contacts_name' => 
  // array (
  //   'type' => 'relate',
  //   'link' => true,
  //   'label' => 'LBL_VETA_RECIBO_CONTACTS_FROM_CONTACTS_TITLE',
  //   'id' => 'VETA_RECIBO_CONTACTSCONTACTS_IDA',
  //   'width' => '10%',
  //   'default' => true,
  // ),
  // 'date_modified' => 
  // array (
  //   'width' => '15%',
  //   'label' => 'LBL_DATE_MODIFIED',
  //   'name' => 'date_modified',
  //   'default' => false,
  // ),
  // 'created_by' => 
  // array (
  //   'width' => '8%',
  //   'label' => 'LBL_CREATED',
  //   'name' => 'created_by',
  //   'default' => false,
  // ),
  // 'assigned_user_name' => 
  // array (
  //   'width' => '8%',
  //   'label' => 'LBL_LIST_ASSIGNED_USER',
  //   'name' => 'assigned_user_name',
  //   'default' => false,
  // ),
  // 'date_entered' => 
  // array (
  //   'width' => '15%',
  //   'label' => 'LBL_DATE_ENTERED',
  //   'default' => false,
  //   'name' => 'date_entered',
  // ),
);
