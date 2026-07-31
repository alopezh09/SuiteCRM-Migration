<?php
// created: 2021-10-23 02:01:19
$dictionary["NVC_Deposit_company"]["fields"]["veta_recibo_nvc_deposit_company_1"] = array (
  'name' => 'veta_recibo_nvc_deposit_company_1',
  'type' => 'link',
  'relationship' => 'veta_recibo_nvc_deposit_company_1',
  'source' => 'non-db',
  'module' => 'Veta_Recibo',
  'bean_name' => 'Veta_Recibo',
  'vname' => 'LBL_VETA_RECIBO_NVC_DEPOSIT_COMPANY_1_FROM_VETA_RECIBO_TITLE',
  'id_name' => 'veta_recibo_nvc_deposit_company_1veta_recibo_ida',
);
$dictionary["NVC_Deposit_company"]["fields"]["veta_recibo_nvc_deposit_company_1_name"] = array (
  'name' => 'veta_recibo_nvc_deposit_company_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VETA_RECIBO_NVC_DEPOSIT_COMPANY_1_FROM_VETA_RECIBO_TITLE',
  'save' => true,
  'id_name' => 'veta_recibo_nvc_deposit_company_1veta_recibo_ida',
  'link' => 'veta_recibo_nvc_deposit_company_1',
  'table' => 'veta_recibo',
  'module' => 'Veta_Recibo',
  'rname' => 'name',
);
$dictionary["NVC_Deposit_company"]["fields"]["veta_recibo_nvc_deposit_company_1veta_recibo_ida"] = array (
  'name' => 'veta_recibo_nvc_deposit_company_1veta_recibo_ida',
  'type' => 'link',
  'relationship' => 'veta_recibo_nvc_deposit_company_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VETA_RECIBO_NVC_DEPOSIT_COMPANY_1_FROM_NVC_DEPOSIT_COMPANY_TITLE',
);
