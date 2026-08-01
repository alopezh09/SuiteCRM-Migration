<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2020-10-14 00:58:20
$dictionary["Veta_Abono"]["fields"]["veta_abono_veta_recibo"] = array (
  'name' => 'veta_abono_veta_recibo',
  'type' => 'link',
  'relationship' => 'veta_abono_veta_recibo',
  'source' => 'non-db',
  'module' => 'Veta_Recibo',
  'bean_name' => 'Veta_Recibo',
  'vname' => 'LBL_VETA_ABONO_VETA_RECIBO_FROM_VETA_RECIBO_TITLE',
  'id_name' => 'veta_abono_veta_reciboveta_recibo_ida',
);
$dictionary["Veta_Abono"]["fields"]["veta_abono_veta_recibo_name"] = array (
  'name' => 'veta_abono_veta_recibo_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VETA_ABONO_VETA_RECIBO_FROM_VETA_RECIBO_TITLE',
  'save' => true,
  'id_name' => 'veta_abono_veta_reciboveta_recibo_ida',
  'link' => 'veta_abono_veta_recibo',
  'table' => 'veta_recibo',
  'module' => 'Veta_Recibo',
  'rname' => 'name',
);
$dictionary["Veta_Abono"]["fields"]["veta_abono_veta_reciboveta_recibo_ida"] = array (
  'name' => 'veta_abono_veta_reciboveta_recibo_ida',
  'type' => 'link',
  'relationship' => 'veta_abono_veta_recibo',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VETA_ABONO_VETA_RECIBO_FROM_VETA_ABONO_TITLE',
);


$dictionary['Veta_Abono']['fields']['filename']=array(
    'name' => 'filename',
    'vname' => 'LBL_FILENAME',
    'type' => 'varchar',
    'required'=>true,
    'importable' => 'required',
    'len' => '255',
    'studio' => 'false',
);
$dictionary['Veta_Abono']['fields']['file_ext']=array(
    'name' => 'file_ext',
    'vname' => 'LBL_FILE_EXTENSION',
    'type' => 'varchar',
    'len' => 100,
);
$dictionary['Veta_Abono']['fields']['file_mime_type']=array(
    'name' => 'file_mime_type',
    'vname' => 'LBL_MIME',
    'type' => 'varchar',
    'len' => '100',
);
$dictionary['Veta_Abono']['fields']['uploadfile']=array(
    'name'=>'uploadfile',
    'vname' => 'LBL_FILE_UPLOAD',
    'type' => 'file',
    'len' => '255',
    'dbType' => 'varchar',
);

 // created: 2025-04-23 20:06:35
$dictionary['Veta_Abono']['fields']['amount_to_transfer_c']['inline_edit']='';
$dictionary['Veta_Abono']['fields']['amount_to_transfer_c']['labelValue']='Amount to Transfer';

 

 // created: 2025-03-06 16:24:38
$dictionary['Veta_Abono']['fields']['transferred_from_billing_c']['inline_edit']='1';
$dictionary['Veta_Abono']['fields']['transferred_from_billing_c']['labelValue']='Transferred From Billing';

 

 // created: 2025-04-23 20:11:14
$dictionary['Veta_Abono']['fields']['veta_abono_id_c']['inline_edit']=1;

 

 // created: 2025-04-23 20:11:14
$dictionary['Veta_Abono']['fields']['transferred_from_deposit_c']['inline_edit']='';
$dictionary['Veta_Abono']['fields']['transferred_from_deposit_c']['labelValue']='Transferred From Deposit';

 

 // created: 2025-02-14 23:27:06
$dictionary['Veta_Abono']['fields']['deposit_validated_c']['inline_edit']='1';
$dictionary['Veta_Abono']['fields']['deposit_validated_c']['labelValue']='Deposit Validated';

 

 // created: 2025-04-24 22:26:50
$dictionary['Veta_Abono']['fields']['payment_amount_before_transfer_c']['inline_edit']='';
$dictionary['Veta_Abono']['fields']['payment_amount_before_transfer_c']['labelValue']='Payment Amount Before Transfer';

 

 // created: 2025-04-23 20:08:42
$dictionary['Veta_Abono']['fields']['transferred_amount_c']['inline_edit']='';
$dictionary['Veta_Abono']['fields']['transferred_amount_c']['labelValue']='Transferred Amount';

 

 // created: 2025-03-06 16:24:38
$dictionary['Veta_Abono']['fields']['veta_recibo_id_c']['inline_edit']=1;

 

 // created: 2022-02-13 22:36:46
$dictionary['Veta_Abono']['fields']['custom_date_entered_applicant_c']['inline_edit']='';
$dictionary['Veta_Abono']['fields']['custom_date_entered_applicant_c']['labelValue']='Custom Date Entered';

 

 // created: 2025-02-14 23:19:37
$dictionary['Veta_Abono']['fields']['deposit_vadidated_c']['inline_edit']='1';
$dictionary['Veta_Abono']['fields']['deposit_vadidated_c']['labelValue']='Deposit Vadidated';

 

 // created: 2025-04-24 22:17:56
$dictionary['Veta_Abono']['fields']['transferred_to_new_billing_c']['inline_edit']='';
$dictionary['Veta_Abono']['fields']['transferred_to_new_billing_c']['labelValue']='Transferred to new Billing';

 
?>