<?php
// created: 2021-10-13 16:47:42
$dictionary["NVC_Taxes_and_Fees_Config"]["fields"]["nvc_taxes_and_fees_config_veta_recibo"] = array (
  'name' => 'nvc_taxes_and_fees_config_veta_recibo',
  'type' => 'link',
  'relationship' => 'nvc_taxes_and_fees_config_veta_recibo',
  'source' => 'non-db',
  'module' => 'Veta_Recibo',
  'bean_name' => 'Veta_Recibo',
  'vname' => 'LBL_NVC_TAXES_AND_FEES_CONFIG_VETA_RECIBO_FROM_VETA_RECIBO_TITLE',
  'id_name' => 'nvc_taxes_and_fees_config_veta_reciboveta_recibo_idb',
);
$dictionary["NVC_Taxes_and_Fees_Config"]["fields"]["nvc_taxes_and_fees_config_veta_recibo_name"] = array (
  'name' => 'nvc_taxes_and_fees_config_veta_recibo_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_NVC_TAXES_AND_FEES_CONFIG_VETA_RECIBO_FROM_VETA_RECIBO_TITLE',
  'save' => true,
  'id_name' => 'nvc_taxes_and_fees_config_veta_reciboveta_recibo_idb',
  'link' => 'nvc_taxes_and_fees_config_veta_recibo',
  'table' => 'veta_recibo',
  'module' => 'Veta_Recibo',
  'rname' => 'name',
);
$dictionary["NVC_Taxes_and_Fees_Config"]["fields"]["nvc_taxes_and_fees_config_veta_reciboveta_recibo_idb"] = array (
  'name' => 'nvc_taxes_and_fees_config_veta_reciboveta_recibo_idb',
  'type' => 'link',
  'relationship' => 'nvc_taxes_and_fees_config_veta_recibo',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_NVC_TAXES_AND_FEES_CONFIG_VETA_RECIBO_FROM_VETA_RECIBO_TITLE',
);
