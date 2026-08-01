<?php
$popupMeta = array (
    'moduleMain' => 'Veta_Endorsements',
    'varName' => 'Veta_Endorsements',
    'orderBy' => 'veta_endorsements.name',
    'whereClauses' => array (
  'name' => 'veta_endorsements.name',
),
    'searchInputs' => array (
  0 => 'veta_endorsements_number',
  1 => 'name',
  2 => 'priority',
  3 => 'status',
),
    'listviewdefs' => array (
  'VETA_ENDORSEMENTS_NVC_COMPANIES_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_VETA_ENDORSEMENTS_NVC_COMPANIES_FROM_NVC_COMPANIES_TITLE',
    'id' => 'VETA_ENDORSEMENTS_NVC_COMPANIESNVC_COMPANIES_IDA',
    'width' => '10%',
    'default' => true,
    'name' => 'veta_endorsements_nvc_companies_name',
  ),
  'VISA_TYPE' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_VISA_TYPE',
    'width' => '10%',
    'default' => true,
    'name' => 'visa_type',
  ),
  'OCUPATION' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_OCUPATION',
    'width' => '10%',
    'default' => true,
    'name' => 'ocupation',
  ),
  'POSITIONS_YEAR_1' => 
  array (
    'type' => 'int',
    'label' => 'LBL_POSITIONS_YEAR_1',
    'width' => '10%',
    'default' => true,
    'name' => 'positions_year_1',
  ),
  'POSITIONS_YEAR_2' => 
  array (
    'type' => 'int',
    'label' => 'LBL_POSITIONS_YEAR_2',
    'width' => '10%',
    'default' => true,
    'name' => 'positions_year_2',
  ),
  'POSITIONS_YEAR_3' => 
  array (
    'type' => 'int',
    'label' => 'LBL_POSITIONS_YEAR_3',
    'width' => '10%',
    'default' => true,
    'name' => 'positions_year_3',
  ),
  'POSITIONS_YEAR_4' => 
  array (
    'type' => 'int',
    'label' => 'LBL_POSITIONS_YEAR_4',
    'width' => '10%',
    'default' => true,
    'name' => 'positions_year_4',
  ),
  'POSITIONS_YEAR_5' => 
  array (
    'type' => 'int',
    'label' => 'LBL_POSITIONS_YEAR_5',
    'width' => '10%',
    'default' => true,
    'name' => 'positions_year_5',
  ),
  'DATE_MODIFIED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'default' => true,
    'name' => 'date_modified',
  ),
),
);
