<?php
// created: 2021-10-13 15:46:19
$dictionary["Veta_Requerimiento"]["fields"]["nvc_company_veta_requerimiento"] = array (
  'name' => 'nvc_company_veta_requerimiento',
  'type' => 'link',
  'relationship' => 'nvc_company_veta_requerimiento',
  'source' => 'non-db',
  'module' => 'NVC_Company',
  'bean_name' => false,
  'vname' => 'LBL_NVC_COMPANY_VETA_REQUERIMIENTO_FROM_NVC_COMPANY_TITLE',
  'id_name' => 'nvc_company_veta_requerimientonvc_company_ida',
);
$dictionary["Veta_Requerimiento"]["fields"]["nvc_company_veta_requerimiento_name"] = array (
  'name' => 'nvc_company_veta_requerimiento_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_NVC_COMPANY_VETA_REQUERIMIENTO_FROM_NVC_COMPANY_TITLE',
  'save' => true,
  'id_name' => 'nvc_company_veta_requerimientonvc_company_ida',
  'link' => 'nvc_company_veta_requerimiento',
  'table' => 'nvc_company',
  'module' => 'NVC_Company',
  'rname' => 'name',
);
$dictionary["Veta_Requerimiento"]["fields"]["nvc_company_veta_requerimientonvc_company_ida"] = array (
  'name' => 'nvc_company_veta_requerimientonvc_company_ida',
  'type' => 'link',
  'relationship' => 'nvc_company_veta_requerimiento',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_NVC_COMPANY_VETA_REQUERIMIENTO_FROM_VETA_REQUERIMIENTO_TITLE',
);
