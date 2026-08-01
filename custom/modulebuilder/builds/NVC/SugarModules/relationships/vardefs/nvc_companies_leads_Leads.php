<?php
// created: 2021-10-13 15:20:29
$dictionary["Lead"]["fields"]["nvc_companies_leads"] = array (
  'name' => 'nvc_companies_leads',
  'type' => 'link',
  'relationship' => 'nvc_companies_leads',
  'source' => 'non-db',
  'module' => 'NVC_Companies',
  'bean_name' => 'NVC_Companies',
  'vname' => 'LBL_NVC_COMPANIES_LEADS_FROM_NVC_COMPANIES_TITLE',
  'id_name' => 'nvc_companies_leadsnvc_companies_ida',
);
$dictionary["Lead"]["fields"]["nvc_companies_leads_name"] = array (
  'name' => 'nvc_companies_leads_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_NVC_COMPANIES_LEADS_FROM_NVC_COMPANIES_TITLE',
  'save' => true,
  'id_name' => 'nvc_companies_leadsnvc_companies_ida',
  'link' => 'nvc_companies_leads',
  'table' => 'nvc_companies',
  'module' => 'NVC_Companies',
  'rname' => 'name',
);
$dictionary["Lead"]["fields"]["nvc_companies_leadsnvc_companies_ida"] = array (
  'name' => 'nvc_companies_leadsnvc_companies_ida',
  'type' => 'link',
  'relationship' => 'nvc_companies_leads',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_NVC_COMPANIES_LEADS_FROM_LEADS_TITLE',
);
