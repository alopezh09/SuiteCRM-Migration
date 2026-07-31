<?php
// created: 2021-10-13 17:57:34
$dictionary["Lead"]["fields"]["nvc_companies_leads_1"] = array (
  'name' => 'nvc_companies_leads_1',
  'type' => 'link',
  'relationship' => 'nvc_companies_leads_1',
  'source' => 'non-db',
  'module' => 'NVC_Companies',
  'bean_name' => 'NVC_Companies',
  'vname' => 'LBL_NVC_COMPANIES_LEADS_1_FROM_NVC_COMPANIES_TITLE',
  'id_name' => 'nvc_companies_leads_1nvc_companies_ida',
);
$dictionary["Lead"]["fields"]["nvc_companies_leads_1_name"] = array (
  'name' => 'nvc_companies_leads_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_NVC_COMPANIES_LEADS_1_FROM_NVC_COMPANIES_TITLE',
  'save' => true,
  'id_name' => 'nvc_companies_leads_1nvc_companies_ida',
  'link' => 'nvc_companies_leads_1',
  'table' => 'nvc_companies',
  'module' => 'NVC_Companies',
  'rname' => 'name',
);
$dictionary["Lead"]["fields"]["nvc_companies_leads_1nvc_companies_ida"] = array (
  'name' => 'nvc_companies_leads_1nvc_companies_ida',
  'type' => 'link',
  'relationship' => 'nvc_companies_leads_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_NVC_COMPANIES_LEADS_1_FROM_LEADS_TITLE',
);
