<?php
// created: 2021-12-13 16:27:10
$dictionary["Veta_College"]["fields"]["veta_recibo_veta_college_1"] = array (
  'name' => 'veta_recibo_veta_college_1',
  'type' => 'link',
  'relationship' => 'veta_recibo_veta_college_1',
  'source' => 'non-db',
  'module' => 'Veta_Recibo',
  'bean_name' => 'Veta_Recibo',
  'vname' => 'LBL_VETA_RECIBO_VETA_COLLEGE_1_FROM_VETA_RECIBO_TITLE',
  'id_name' => 'veta_recibo_veta_college_1veta_recibo_ida',
);
$dictionary["Veta_College"]["fields"]["veta_recibo_veta_college_1_name"] = array (
  'name' => 'veta_recibo_veta_college_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VETA_RECIBO_VETA_COLLEGE_1_FROM_VETA_RECIBO_TITLE',
  'save' => true,
  'id_name' => 'veta_recibo_veta_college_1veta_recibo_ida',
  'link' => 'veta_recibo_veta_college_1',
  'table' => 'veta_recibo',
  'module' => 'Veta_Recibo',
  'rname' => 'name',
);
$dictionary["Veta_College"]["fields"]["veta_recibo_veta_college_1veta_recibo_ida"] = array (
  'name' => 'veta_recibo_veta_college_1veta_recibo_ida',
  'type' => 'link',
  'relationship' => 'veta_recibo_veta_college_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VETA_RECIBO_VETA_COLLEGE_1_FROM_VETA_COLLEGE_TITLE',
);
