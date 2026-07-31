<?php
// created: 2023-05-03 21:44:15
$dictionary["Veta_Presupuesto"]["fields"]["nvc_companies_veta_presupuesto_1"] = array (
  'name' => 'nvc_companies_veta_presupuesto_1',
  'type' => 'link',
  'relationship' => 'nvc_companies_veta_presupuesto_1',
  'source' => 'non-db',
  'module' => 'NVC_Companies',
  'bean_name' => 'NVC_Companies',
  'vname' => 'LBL_NVC_COMPANIES_VETA_PRESUPUESTO_1_FROM_NVC_COMPANIES_TITLE',
  'id_name' => 'nvc_companies_veta_presupuesto_1nvc_companies_ida',
);
$dictionary["Veta_Presupuesto"]["fields"]["nvc_companies_veta_presupuesto_1_name"] = array (
  'name' => 'nvc_companies_veta_presupuesto_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_NVC_COMPANIES_VETA_PRESUPUESTO_1_FROM_NVC_COMPANIES_TITLE',
  'save' => true,
  'id_name' => 'nvc_companies_veta_presupuesto_1nvc_companies_ida',
  'link' => 'nvc_companies_veta_presupuesto_1',
  'table' => 'nvc_companies',
  'module' => 'NVC_Companies',
  'rname' => 'name',
);
$dictionary["Veta_Presupuesto"]["fields"]["nvc_companies_veta_presupuesto_1nvc_companies_ida"] = array (
  'name' => 'nvc_companies_veta_presupuesto_1nvc_companies_ida',
  'type' => 'link',
  'relationship' => 'nvc_companies_veta_presupuesto_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_NVC_COMPANIES_VETA_PRESUPUESTO_1_FROM_VETA_PRESUPUESTO_TITLE',
);
