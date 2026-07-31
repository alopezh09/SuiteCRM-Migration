<?php
// created: 2021-10-13 17:15:55
$dictionary["Opportunity"]["fields"]["nvc_taxes_and_fees_config_opportunities"] = array (
  'name' => 'nvc_taxes_and_fees_config_opportunities',
  'type' => 'link',
  'relationship' => 'nvc_taxes_and_fees_config_opportunities',
  'source' => 'non-db',
  'module' => 'NVC_Taxes_and_Fees_Config',
  'bean_name' => 'NVC_Taxes_and_Fees_Config',
  'vname' => 'LBL_NVC_TAXES_AND_FEES_CONFIG_OPPORTUNITIES_FROM_NVC_TAXES_AND_FEES_CONFIG_TITLE',
  'id_name' => 'nvc_taxes_5b0d_config_ida',
);
$dictionary["Opportunity"]["fields"]["nvc_taxes_and_fees_config_opportunities_name"] = array (
  'name' => 'nvc_taxes_and_fees_config_opportunities_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_NVC_TAXES_AND_FEES_CONFIG_OPPORTUNITIES_FROM_NVC_TAXES_AND_FEES_CONFIG_TITLE',
  'save' => true,
  'id_name' => 'nvc_taxes_5b0d_config_ida',
  'link' => 'nvc_taxes_and_fees_config_opportunities',
  'table' => 'nvc_taxes_and_fees_config',
  'module' => 'NVC_Taxes_and_Fees_Config',
  'rname' => 'name',
);
$dictionary["Opportunity"]["fields"]["nvc_taxes_5b0d_config_ida"] = array (
  'name' => 'nvc_taxes_5b0d_config_ida',
  'type' => 'link',
  'relationship' => 'nvc_taxes_and_fees_config_opportunities',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_NVC_TAXES_AND_FEES_CONFIG_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
);
