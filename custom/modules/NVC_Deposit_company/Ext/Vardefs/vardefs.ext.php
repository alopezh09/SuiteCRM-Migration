<?php 
 //WARNING: The contents of this file are auto-generated


$dictionary['NVC_Deposit_company']['fields']['filename']=array(
    'name' => 'filename',
    'vname' => 'LBL_FILENAME',
    'type' => 'varchar',
    'required'=>true,
    'importable' => 'required',
    'len' => '255',
    'studio' => 'false',
);
$dictionary['NVC_Deposit_company']['fields']['file_ext']=array(
    'name' => 'file_ext',
    'vname' => 'LBL_FILE_EXTENSION',
    'type' => 'varchar',
    'len' => 100,
);
$dictionary['NVC_Deposit_company']['fields']['file_mime_type']=array(
    'name' => 'file_mime_type',
    'vname' => 'LBL_MIME',
    'type' => 'varchar',
    'len' => '100',
);
$dictionary['NVC_Deposit_company']['fields']['uploadfile']=array(
    'name'=>'uploadfile',
    'vname' => 'LBL_FILE_UPLOAD',
    'type' => 'file',
    'len' => '255',
    'dbType' => 'varchar',
);

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


 // created: 2025-03-06 16:25:13
$dictionary['NVC_Deposit_company']['fields']['transferred_from_billing_c']['inline_edit']='1';
$dictionary['NVC_Deposit_company']['fields']['transferred_from_billing_c']['labelValue']='Transferred From Billing';

 

 // created: 2025-04-23 20:13:14
$dictionary['NVC_Deposit_company']['fields']['transferred_from_deposit_c']['inline_edit']='';
$dictionary['NVC_Deposit_company']['fields']['transferred_from_deposit_c']['labelValue']='Transferred From Deposit';

 

 // created: 2025-02-14 23:20:02
$dictionary['NVC_Deposit_company']['fields']['deposit_validated_c']['inline_edit']='1';
$dictionary['NVC_Deposit_company']['fields']['deposit_validated_c']['labelValue']='Deposit Validated';

 

 // created: 2025-04-24 22:28:13
$dictionary['NVC_Deposit_company']['fields']['payment_amount_before_transfer_c']['inline_edit']='';
$dictionary['NVC_Deposit_company']['fields']['payment_amount_before_transfer_c']['labelValue']='Payment Amount Before Transfer';

 

 // created: 2022-02-13 22:29:54
$dictionary['NVC_Deposit_company']['fields']['custom_date_entered_company_c']['inline_edit']='';
$dictionary['NVC_Deposit_company']['fields']['custom_date_entered_company_c']['labelValue']='Custom Date Entered';

 

 // created: 2025-04-23 20:14:07
$dictionary['NVC_Deposit_company']['fields']['transferred_amount_c']['inline_edit']='';
$dictionary['NVC_Deposit_company']['fields']['transferred_amount_c']['labelValue']='Transferred Amount';

 

 // created: 2025-03-06 16:25:13
$dictionary['NVC_Deposit_company']['fields']['veta_recibo_id_c']['inline_edit']=1;

 

 // created: 2021-10-21 20:05:28
$dictionary['NVC_Deposit_company']['fields']['name']['inline_edit']=true;
$dictionary['NVC_Deposit_company']['fields']['name']['duplicate_merge']='disabled';
$dictionary['NVC_Deposit_company']['fields']['name']['duplicate_merge_dom_value']='0';
$dictionary['NVC_Deposit_company']['fields']['name']['merge_filter']='disabled';
$dictionary['NVC_Deposit_company']['fields']['name']['unified_search']=false;

 

 // created: 2025-04-24 22:18:34
$dictionary['NVC_Deposit_company']['fields']['transferred_to_new_billing_c']['inline_edit']='';
$dictionary['NVC_Deposit_company']['fields']['transferred_to_new_billing_c']['labelValue']='Transferred to new Billing';

 

 // created: 2025-04-23 20:13:14
$dictionary['NVC_Deposit_company']['fields']['nvc_deposit_company_id_c']['inline_edit']=1;

 
?>