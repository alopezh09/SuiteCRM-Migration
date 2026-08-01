<?php
// created: 2021-10-13 16:46:00
$dictionary["Opportunity"]["fields"]["nvc_companies_opportunities"] = array (
  'name' => 'nvc_companies_opportunities',
  'type' => 'link',
  'relationship' => 'nvc_companies_opportunities',
  'source' => 'non-db',
  'module' => 'NVC_Companies',
  'bean_name' => 'NVC_Companies',
  'vname' => 'LBL_NVC_COMPANIES_OPPORTUNITIES_FROM_NVC_COMPANIES_TITLE',
  'id_name' => 'nvc_companies_opportunitiesnvc_companies_ida',
);
$dictionary["Opportunity"]["fields"]["nvc_companies_opportunities_name"] = array (
  'name' => 'nvc_companies_opportunities_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_NVC_COMPANIES_OPPORTUNITIES_FROM_NVC_COMPANIES_TITLE',
  'save' => true,
  'id_name' => 'nvc_companies_opportunitiesnvc_companies_ida',
  'link' => 'nvc_companies_opportunities',
  'table' => 'nvc_companies',
  'module' => 'NVC_Companies',
  'rname' => 'name',
);
$dictionary["Opportunity"]["fields"]["nvc_companies_opportunitiesnvc_companies_ida"] = array (
  'name' => 'nvc_companies_opportunitiesnvc_companies_ida',
  'type' => 'link',
  'relationship' => 'nvc_companies_opportunities',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_NVC_COMPANIES_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
);
