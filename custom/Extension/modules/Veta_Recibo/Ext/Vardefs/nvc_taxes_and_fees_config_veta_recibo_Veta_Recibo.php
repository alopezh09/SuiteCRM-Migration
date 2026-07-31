<?php
// created: 2021-10-13 16:47:42
$dictionary["Veta_Recibo"]["fields"]["nvc_taxes_and_fees_config_veta_recibo"] = array (
  'name' => 'nvc_taxes_and_fees_config_veta_recibo',
  'type' => 'link',
  'relationship' => 'nvc_taxes_and_fees_config_veta_recibo',
  'source' => 'non-db',
  'module' => 'NVC_Taxes_and_Fees_Config',
  'bean_name' => 'NVC_Taxes_and_Fees_Config',
  'vname' => 'LBL_NVC_TAXES_AND_FEES_CONFIG_VETA_RECIBO_FROM_NVC_TAXES_AND_FEES_CONFIG_TITLE',
  'id_name' => 'nvc_taxes_02a7_config_ida',
);
$dictionary["Veta_Recibo"]["fields"]["nvc_taxes_and_fees_config_veta_recibo_name"] = array (
  'name' => 'nvc_taxes_and_fees_config_veta_recibo_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_NVC_TAXES_AND_FEES_CONFIG_VETA_RECIBO_FROM_NVC_TAXES_AND_FEES_CONFIG_TITLE',
  'save' => true,
  'id_name' => 'nvc_taxes_02a7_config_ida',
  'link' => 'nvc_taxes_and_fees_config_veta_recibo',
  'table' => 'nvc_taxes_and_fees_config',
  'module' => 'NVC_Taxes_and_Fees_Config',
  'rname' => 'name',
);
$dictionary["Veta_Recibo"]["fields"]["nvc_taxes_02a7_config_ida"] = array (
  'name' => 'nvc_taxes_02a7_config_ida',
  'type' => 'link',
  'relationship' => 'nvc_taxes_and_fees_config_veta_recibo',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_NVC_TAXES_AND_FEES_CONFIG_VETA_RECIBO_FROM_NVC_TAXES_AND_FEES_CONFIG_TITLE',
);
