<?php
// created: 2021-10-15 18:06:34
$dictionary["Veta_Presupuesto"]["fields"]["veta_presupuesto_veta_requerimiento_1"] = array (
  'name' => 'veta_presupuesto_veta_requerimiento_1',
  'type' => 'link',
  'relationship' => 'veta_presupuesto_veta_requerimiento_1',
  'source' => 'non-db',
  'module' => 'Veta_Requerimiento',
  'bean_name' => 'Veta_Requerimiento',
  'vname' => 'LBL_VETA_PRESUPUESTO_VETA_REQUERIMIENTO_1_FROM_VETA_REQUERIMIENTO_TITLE',
  'id_name' => 'veta_presupuesto_veta_requerimiento_1veta_requerimiento_idb',
);
$dictionary["Veta_Presupuesto"]["fields"]["veta_presupuesto_veta_requerimiento_1_name"] = array (
  'name' => 'veta_presupuesto_veta_requerimiento_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VETA_PRESUPUESTO_VETA_REQUERIMIENTO_1_FROM_VETA_REQUERIMIENTO_TITLE',
  'save' => true,
  'id_name' => 'veta_presupuesto_veta_requerimiento_1veta_requerimiento_idb',
  'link' => 'veta_presupuesto_veta_requerimiento_1',
  'table' => 'veta_requerimiento',
  'module' => 'Veta_Requerimiento',
  'rname' => 'name',
);
$dictionary["Veta_Presupuesto"]["fields"]["veta_presupuesto_veta_requerimiento_1veta_requerimiento_idb"] = array (
  'name' => 'veta_presupuesto_veta_requerimiento_1veta_requerimiento_idb',
  'type' => 'link',
  'relationship' => 'veta_presupuesto_veta_requerimiento_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_VETA_PRESUPUESTO_VETA_REQUERIMIENTO_1_FROM_VETA_REQUERIMIENTO_TITLE',
);
