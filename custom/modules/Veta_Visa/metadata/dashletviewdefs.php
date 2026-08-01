<?php
$dashletData['Veta_VisaDashlet']['searchFields'] = array (
  'estado' => 
  array (
    'default' => '',
  ),
  'nomination_app_expectation_date_c' => 
  array (
    'default' => '',
  ),
  'eoi_expectation_date_c' => 
  array (
    'default' => '',
  ),
  'rcb_expectation_date_c' => 
  array (
    'default' => '',
  ),
  'tas_expectation_date_c' => 
  array (
    'default' => '',
  ),
  'lmt_expectation_date_c' => 
  array (
    'default' => '',
  ),
  'sbs_expectation_date_c' => 
  array (
    'default' => '',
  ),
  'roi_expectation_date_c' => 
  array (
    'default' => '',
  ),
  'skill_assessment_app_expectation_date_c' => 
  array (
    'default' => '',
  ),
  'case_manager_c' => 
  array (
    'default' => '',
  ),
  'customer_service_c' => 
  array (
    'default' => '',
  ),
);
$dashletData['Veta_VisaDashlet']['columns'] = array (
  'name' => 
  array (
    'width' => '40%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'default' => true,
    'name' => 'name',
  ),
  'estado' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_ESTADO',
    'width' => '10%',
    'default' => true,
    'name' => 'estado',
  ),
  'estudiante' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_ESTUDIANTE',
    'id' => 'CONTACT_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'name' => 'estudiante',
  ),
  'veta_visa_opportunities_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_VETA_VISA_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
    'id' => 'VETA_VISA_OPPORTUNITIESOPPORTUNITIES_IDA',
    'width' => '10%',
    'default' => true,
    'name' => 'veta_visa_opportunities_name',
  ),
  'fecha_expiracion_visa' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_FECHA_EXPIRACION_VISA',
    'width' => '10%',
    'default' => true,
    'name' => 'fecha_expiracion_visa',
  ),
  'date_entered' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => true,
    'name' => 'date_entered',
  ),
  'date_modified' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_MODIFIED',
    'name' => 'date_modified',
    'default' => false,
  ),
  'created_by' => 
  array (
    'width' => '8%',
    'label' => 'LBL_CREATED',
    'name' => 'created_by',
    'default' => false,
  ),
  'assigned_user_name' => 
  array (
    'width' => '8%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'name' => 'assigned_user_name',
    'default' => false,
  ),
  'nomination_app_expectation_date_c' => 
  array (
    'type' => 'date',
    'default' => false,
    'label' => 'LBL_NOMINATION_APP_EXPECTATION_DATE',
    'width' => '10%',
    'name' => 'nomination_app_expectation_date_c',
  ),
  'rcb_expectation_date_c' => 
  array (
    'type' => 'date',
    'default' => false,
    'label' => 'LBL_RCB_EXPECTATION_DATE',
    'width' => '10%',
  ),
  'eoi_expectation_date_c' => 
  array (
    'type' => 'date',
    'default' => false,
    'label' => 'LBL_EOI_EXPECTATION_DATE',
    'width' => '10%',
  ),
  'tas_expectation_date_c' => 
  array (
    'type' => 'date',
    'default' => false,
    'label' => 'LBL_TAS_EXPECTATION_DATE',
    'width' => '10%',
  ),
  'lmt_expectation_date_c' => 
  array (
    'type' => 'date',
    'default' => false,
    'label' => 'LBL_LMT_EXPECTATION_DATE',
    'width' => '10%',
  ),
  'roi_expectation_date_c' => 
  array (
    'type' => 'date',
    'default' => false,
    'label' => 'LBL_ROI_EXPECTATION_DATE',
    'width' => '10%',
  ),
  'sbs_expectation_date_c' => 
  array (
    'type' => 'date',
    'default' => false,
    'label' => 'LBL_SBS_EXPECTATION_DATE',
    'width' => '10%',
  ),
  'skill_assessment_app_expectation_date_c' => 
  array (
    'type' => 'date',
    'default' => false,
    'label' => 'LBL_SKILL_ASSESSMENT_APP_EXPECTATION_DATE',
    'width' => '10%',
  ),
);
