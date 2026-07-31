<?php
// created: 2021-10-13 15:46:19
$dictionary["Opportunity"]["fields"]["nvc_company_opportunities"] = array (
  'name' => 'nvc_company_opportunities',
  'type' => 'link',
  'relationship' => 'nvc_company_opportunities',
  'source' => 'non-db',
  'module' => 'NVC_Company',
  'bean_name' => false,
  'vname' => 'LBL_NVC_COMPANY_OPPORTUNITIES_FROM_NVC_COMPANY_TITLE',
  'id_name' => 'nvc_company_opportunitiesnvc_company_ida',
);
$dictionary["Opportunity"]["fields"]["nvc_company_opportunities_name"] = array (
  'name' => 'nvc_company_opportunities_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_NVC_COMPANY_OPPORTUNITIES_FROM_NVC_COMPANY_TITLE',
  'save' => true,
  'id_name' => 'nvc_company_opportunitiesnvc_company_ida',
  'link' => 'nvc_company_opportunities',
  'table' => 'nvc_company',
  'module' => 'NVC_Company',
  'rname' => 'name',
);
$dictionary["Opportunity"]["fields"]["nvc_company_opportunitiesnvc_company_ida"] = array (
  'name' => 'nvc_company_opportunitiesnvc_company_ida',
  'type' => 'link',
  'relationship' => 'nvc_company_opportunities',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_NVC_COMPANY_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
);
