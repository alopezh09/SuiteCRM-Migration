<?php
// created: 2021-10-13 16:46:00
$dictionary["Veta_Requerimiento"]["fields"]["nvc_companies_veta_requerimiento"] = array (
  'name' => 'nvc_companies_veta_requerimiento',
  'type' => 'link',
  'relationship' => 'nvc_companies_veta_requerimiento',
  'source' => 'non-db',
  'module' => 'NVC_Companies',
  'bean_name' => 'NVC_Companies',
  'vname' => 'LBL_NVC_COMPANIES_VETA_REQUERIMIENTO_FROM_NVC_COMPANIES_TITLE',
  'id_name' => 'nvc_companies_veta_requerimientonvc_companies_ida',
);
$dictionary["Veta_Requerimiento"]["fields"]["nvc_companies_veta_requerimiento_name"] = array (
  'name' => 'nvc_companies_veta_requerimiento_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_NVC_COMPANIES_VETA_REQUERIMIENTO_FROM_NVC_COMPANIES_TITLE',
  'save' => true,
  'id_name' => 'nvc_companies_veta_requerimientonvc_companies_ida',
  'link' => 'nvc_companies_veta_requerimiento',
  'table' => 'nvc_companies',
  'module' => 'NVC_Companies',
  'rname' => 'name',
);
$dictionary["Veta_Requerimiento"]["fields"]["nvc_companies_veta_requerimientonvc_companies_ida"] = array (
  'name' => 'nvc_companies_veta_requerimientonvc_companies_ida',
  'type' => 'link',
  'relationship' => 'nvc_companies_veta_requerimiento',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_NVC_COMPANIES_VETA_REQUERIMIENTO_FROM_VETA_REQUERIMIENTO_TITLE',
);
