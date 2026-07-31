<?php
// created: 2022-06-21 21:17:41
$dictionary["Conta_refunds"]["fields"]["veta_recibo_conta_refunds_1"] = array (
  'name' => 'veta_recibo_conta_refunds_1',
  'type' => 'link',
  'relationship' => 'veta_recibo_conta_refunds_1',
  'source' => 'non-db',
  'module' => 'Veta_Recibo',
  'bean_name' => 'Veta_Recibo',
  'vname' => 'LBL_VETA_RECIBO_CONTA_REFUNDS_1_FROM_VETA_RECIBO_TITLE',
  'id_name' => 'veta_recibo_conta_refunds_1veta_recibo_ida',
);
$dictionary["Conta_refunds"]["fields"]["veta_recibo_conta_refunds_1_name"] = array (
  'name' => 'veta_recibo_conta_refunds_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VETA_RECIBO_CONTA_REFUNDS_1_FROM_VETA_RECIBO_TITLE',
  'save' => true,
  'id_name' => 'veta_recibo_conta_refunds_1veta_recibo_ida',
  'link' => 'veta_recibo_conta_refunds_1',
  'table' => 'veta_recibo',
  'module' => 'Veta_Recibo',
  'rname' => 'name',
);
$dictionary["Conta_refunds"]["fields"]["veta_recibo_conta_refunds_1veta_recibo_ida"] = array (
  'name' => 'veta_recibo_conta_refunds_1veta_recibo_ida',
  'type' => 'link',
  'relationship' => 'veta_recibo_conta_refunds_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VETA_RECIBO_CONTA_REFUNDS_1_FROM_CONTA_REFUNDS_TITLE',
);
