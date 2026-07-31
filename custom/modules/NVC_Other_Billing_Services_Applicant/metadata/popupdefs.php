<?php
$popupMeta = array (
    'moduleMain' => 'NVC_Other_Billing_Services_Applicant',
    'varName' => 'NVC_Other_Billing_Services_Applicant',
    'orderBy' => 'nvc_other_billing_services_applicant.name',
    'whereClauses' => array (
  'name' => 'nvc_other_billing_services_applicant.name',
  'created_by_name' => 'nvc_other_billing_services_applicant.created_by_name',
  'date_entered' => 'nvc_other_billing_services_applicant.date_entered',
  'deposit_amount' => 'nvc_other_billing_services_applicant.deposit_amount',
  'description' => 'nvc_other_billing_services_applicant.description',
  'assigned_user_id' => 'nvc_other_billing_services_applicant.assigned_user_id',
  'date_modified' => 'nvc_other_billing_services_applicant.date_modified',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'created_by_name',
  5 => 'date_entered',
  6 => 'deposit_amount',
  7 => 'description',
  8 => 'assigned_user_id',
  9 => 'date_modified',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'created_by_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_CREATED',
    'id' => 'CREATED_BY',
    'width' => '10%',
    'name' => 'created_by_name',
  ),
  'date_entered' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'name' => 'date_entered',
  ),
  'deposit_amount' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_DEPOSIT_AMOUNT',
    'currency_format' => true,
    'width' => '10%',
    'name' => 'deposit_amount',
  ),
  'description' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'name' => 'description',
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
  'date_modified' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'name' => 'date_modified',
  ),
),
);
