<?php
// created: 2021-10-15 18:06:34
$dictionary["Veta_Requerimiento"]["fields"]["veta_presupuesto_veta_requerimiento_1"] = array (
  'name' => 'veta_presupuesto_veta_requerimiento_1',
  'type' => 'link',
  'relationship' => 'veta_presupuesto_veta_requerimiento_1',
  'source' => 'non-db',
  'module' => 'Veta_Presupuesto',
  'bean_name' => 'Veta_Presupuesto',
  'vname' => 'LBL_VETA_PRESUPUESTO_VETA_REQUERIMIENTO_1_FROM_VETA_PRESUPUESTO_TITLE',
  'id_name' => 'veta_presupuesto_veta_requerimiento_1veta_presupuesto_ida',
);
$dictionary["Veta_Requerimiento"]["fields"]["veta_presupuesto_veta_requerimiento_1_name"] = array (
  'name' => 'veta_presupuesto_veta_requerimiento_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VETA_PRESUPUESTO_VETA_REQUERIMIENTO_1_FROM_VETA_PRESUPUESTO_TITLE',
  'save' => true,
  'id_name' => 'veta_presupuesto_veta_requerimiento_1veta_presupuesto_ida',
  'link' => 'veta_presupuesto_veta_requerimiento_1',
  'table' => 'veta_presupuesto',
  'module' => 'Veta_Presupuesto',
  'rname' => 'name',
);
$dictionary["Veta_Requerimiento"]["fields"]["veta_presupuesto_veta_requerimiento_1veta_presupuesto_ida"] = array (
  'name' => 'veta_presupuesto_veta_requerimiento_1veta_presupuesto_ida',
  'type' => 'link',
  'relationship' => 'veta_presupuesto_veta_requerimiento_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_VETA_PRESUPUESTO_VETA_REQUERIMIENTO_1_FROM_VETA_PRESUPUESTO_TITLE',
);
