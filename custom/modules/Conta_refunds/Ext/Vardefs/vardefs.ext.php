<?php 
 //WARNING: The contents of this file are auto-generated


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


 // created: 2024-09-25 21:54:22
$dictionary['Conta_refunds']['fields']['description']['required']=true;
$dictionary['Conta_refunds']['fields']['description']['inline_edit']=true;
$dictionary['Conta_refunds']['fields']['description']['comments']='Full text of the note';
$dictionary['Conta_refunds']['fields']['description']['merge_filter']='disabled';

 

 // created: 2022-06-22 17:43:55
$dictionary['Conta_refunds']['fields']['refund_to']['required']=true;
$dictionary['Conta_refunds']['fields']['refund_to']['audited']=true;

 

 // created: 2022-06-22 17:44:11
$dictionary['Conta_refunds']['fields']['amount']['required']=true;
$dictionary['Conta_refunds']['fields']['amount']['audited']=true;

 

 // created: 2024-12-05 18:44:36
$dictionary['Conta_refunds']['fields']['refund_requested_date_c']['inline_edit']='';
$dictionary['Conta_refunds']['fields']['refund_requested_date_c']['options']='date_range_search_dom';
$dictionary['Conta_refunds']['fields']['refund_requested_date_c']['labelValue']='Refund Requested Date';
$dictionary['Conta_refunds']['fields']['refund_requested_date_c']['enable_range_search']='1';

 

 // created: 2022-06-22 17:43:40
$dictionary['Conta_refunds']['fields']['category_c']['inline_edit']='1';
$dictionary['Conta_refunds']['fields']['category_c']['labelValue']='Category';

 
?>