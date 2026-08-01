<?php
// created: 2021-10-22 22:47:16
$dictionary["Veta_Requerimiento"]["fields"]["nvc_deposit_company_veta_requerimiento_1"] = array (
  'name' => 'nvc_deposit_company_veta_requerimiento_1',
  'type' => 'link',
  'relationship' => 'nvc_deposit_company_veta_requerimiento_1',
  'source' => 'non-db',
  'module' => 'NVC_Deposit_company',
  'bean_name' => 'NVC_Deposit_company',
  'vname' => 'LBL_NVC_DEPOSIT_COMPANY_VETA_REQUERIMIENTO_1_FROM_NVC_DEPOSIT_COMPANY_TITLE',
  'id_name' => 'nvc_deposit_company_veta_requerimiento_1nvc_deposit_company_ida',
);
$dictionary["Veta_Requerimiento"]["fields"]["nvc_deposit_company_veta_requerimiento_1_name"] = array (
  'name' => 'nvc_deposit_company_veta_requerimiento_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_NVC_DEPOSIT_COMPANY_VETA_REQUERIMIENTO_1_FROM_NVC_DEPOSIT_COMPANY_TITLE',
  'save' => true,
  'id_name' => 'nvc_deposit_company_veta_requerimiento_1nvc_deposit_company_ida',
  'link' => 'nvc_deposit_company_veta_requerimiento_1',
  'table' => 'nvc_deposit_company',
  'module' => 'NVC_Deposit_company',
  'rname' => 'name',
);
$dictionary["Veta_Requerimiento"]["fields"]["nvc_deposit_company_veta_requerimiento_1nvc_deposit_company_ida"] = array (
  'name' => 'nvc_deposit_company_veta_requerimiento_1nvc_deposit_company_ida',
  'type' => 'link',
  'relationship' => 'nvc_deposit_company_veta_requerimiento_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_NVC_DEPOSIT_COMPANY_VETA_REQUERIMIENTO_1_FROM_VETA_REQUERIMIENTO_TITLE',
);
