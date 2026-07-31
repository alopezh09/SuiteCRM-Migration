<?php
$dashletData['Doc_DocsSolicitadosDashlet']['searchFields'] = array (
  'date_entered' => 
  array (
    'default' => '',
  ),
  'date_modified' => 
  array (
    'default' => '',
  ),
  'estadodocumento' => 
  array (
    'default' => '',
  ),
  'assigned_user_id' => 
  array (
    'default' => '',
  ),
);
$dashletData['Doc_DocsSolicitadosDashlet']['columns'] = array (
  'name' => 
  array (
    'width' => '40%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'default' => true,
    'name' => 'name',
  ),
  'doc_docssolicitados_opportunities_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_DOC_DOCSSOLICITADOS_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
    'id' => 'DOC_DOCSSOLICITADOS_OPPORTUNITIESOPPORTUNITIES_IDA',
    'width' => '10%',
    'default' => true,
    'name' => 'doc_docssolicitados_opportunities_name',
  ),
  'veta_requerimiento_doc_docssolicitados_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_VETA_REQUERIMIENTO_DOC_DOCSSOLICITADOS_1_FROM_VETA_REQUERIMIENTO_TITLE',
    'id' => 'VETA_REQUERIMIENTO_DOC_DOCSSOLICITADOS_1VETA_REQUERIMIENTO_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'estadodocumento' => 
  array (
    'type' => 'dynamicenum',
    'studio' => 'visible',
    'label' => 'LBL_ESTADODOCUMENTO',
    'width' => '10%',
    'default' => true,
    'name' => 'estadodocumento',
  ),
  'date_modified' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_MODIFIED',
    'name' => 'date_modified',
    'default' => true,
  ),
  'created_by' => 
  array (
    'width' => '8%',
    'label' => 'LBL_CREATED',
    'name' => 'created_by',
    'default' => false,
  ),
  'date_entered' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => false,
    'name' => 'date_entered',
  ),
  'assigned_user_name' => 
  array (
    'width' => '8%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'name' => 'assigned_user_name',
    'default' => false,
  ),
);
