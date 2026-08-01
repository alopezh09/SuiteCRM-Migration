<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2021-11-17 16:06:29
$dictionary["Doc_Documentos_Adic"]["fields"]["doc_documentos_adic_opportunities"] = array (
  'name' => 'doc_documentos_adic_opportunities',
  'type' => 'link',
  'relationship' => 'doc_documentos_adic_opportunities',
  'source' => 'non-db',
  'module' => 'Opportunities',
  'bean_name' => 'Opportunity',
  'vname' => 'LBL_DOC_DOCUMENTOS_ADIC_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
);


// created: 2022-02-08 16:30:45
$dictionary["Doc_Documentos_Adic"]["fields"]["veta_requerimiento_doc_documentos_adic_1"] = array (
  'name' => 'veta_requerimiento_doc_documentos_adic_1',
  'type' => 'link',
  'relationship' => 'veta_requerimiento_doc_documentos_adic_1',
  'source' => 'non-db',
  'module' => 'Veta_Requerimiento',
  'bean_name' => 'Veta_Requerimiento',
  'vname' => 'LBL_VETA_REQUERIMIENTO_DOC_DOCUMENTOS_ADIC_1_FROM_VETA_REQUERIMIENTO_TITLE',
);


$dictionary['Doc_Documentos_Adic']['fields']['filename']=array(
    'name' => 'filename',
    'vname' => 'LBL_FILENAME',
    'type' => 'varchar',
    'required'=>true,
    'importable' => 'required',
    'len' => '255',
    'studio' => 'false',
);
$dictionary['Doc_Documentos_Adic']['fields']['file_ext']=array(
    'name' => 'file_ext',
    'vname' => 'LBL_FILE_EXTENSION',
    'type' => 'varchar',
    'len' => 100,
);
$dictionary['Doc_Documentos_Adic']['fields']['file_mime_type']=array(
    'name' => 'file_mime_type',
    'vname' => 'LBL_MIME',
    'type' => 'varchar',
    'len' => '100',
);
$dictionary['Doc_Documentos_Adic']['fields']['uploadfile']=array(
    'name'=>'uploadfile',
    'vname' => 'LBL_FILE_UPLOAD',
    'type' => 'file',
    'len' => '255',
    'dbType' => 'varchar',
); 

/*
$dictionary['Doc_Documentos_Adic']['fields']['document_comment_c']=array( 
    'name' => 'document_comment_c',
    'vname' => 'LBL_DOCUMENT_COMMENT',
    'type' => 'text',
    'required'=>true,
    'importable' => 'required',
    'len' => '255',
    //'studio' => 'false',
	'studio' => true,
);
*/
$dictionary['Doc_Documentos_Adic']['fields']['document_comment_c'] = array(
    'name' => 'document_comment_c',
    'vname' => 'LBL_DOCUMENT_COMMENT',
    'type' => 'varchar',
    'len' => '255',
	'inline_edit' => true,   
    'studio' => array(
        'editview' => false,
        'detailview' => false,
        'quickcreate' => false,
    ),
); 


 // created: 2023-01-25 13:49:50
$dictionary['Doc_Documentos_Adic']['fields']['restricted_document_c']['inline_edit']='';
$dictionary['Doc_Documentos_Adic']['fields']['restricted_document_c']['labelValue']='Restricted Document';

 

 // created: 2025-10-17 22:37:26
$dictionary['Doc_Documentos_Adic']['fields']['send_individual_email_for_bva_or_bvc_c']['inline_edit']='1';
$dictionary['Doc_Documentos_Adic']['fields']['send_individual_email_for_bva_or_bvc_c']['labelValue']='Send Individual Email for BVA or BVC';

 

 // created: 2024-09-06 21:55:49
$dictionary['Doc_Documentos_Adic']['fields']['checklist_name_c']['inline_edit']='1';
$dictionary['Doc_Documentos_Adic']['fields']['checklist_name_c']['labelValue']='Checklist Name';

 

 // created: 2022-03-28 16:54:04
$dictionary['Doc_Documentos_Adic']['fields']['user_id_c']['inline_edit']=1;

 

 // created: 2023-05-29 15:42:29
$dictionary['Doc_Documentos_Adic']['fields']['change_status_c']['inline_edit']='1';
$dictionary['Doc_Documentos_Adic']['fields']['change_status_c']['labelValue']='Change Status';

 

 // created: 2023-08-24 17:12:42
$dictionary['Doc_Documentos_Adic']['fields']['document_comment_c']['inline_edit']='1';
$dictionary['Doc_Documentos_Adic']['fields']['document_comment_c']['labelValue']='Document Comments';

 

 // created: 2023-02-28 15:22:00
$dictionary['Doc_Documentos_Adic']['fields']['description_2_c']['inline_edit']='1';
$dictionary['Doc_Documentos_Adic']['fields']['description_2_c']['labelValue']='Descriptions';

 

 // created: 2023-03-10 16:15:08
$dictionary['Doc_Documentos_Adic']['fields']['expectation_date_c']['inline_edit']='1';
$dictionary['Doc_Documentos_Adic']['fields']['expectation_date_c']['labelValue']='Expectation Date';

 

 // created: 2023-03-30 22:32:50
$dictionary['Doc_Documentos_Adic']['fields']['visa_trn_c']['inline_edit']='1';
$dictionary['Doc_Documentos_Adic']['fields']['visa_trn_c']['labelValue']='Visa TRN';

 

 // created: 2023-03-07 16:08:21
$dictionary['Doc_Documentos_Adic']['fields']['fecha_exp_req1_c']['inline_edit']='1';
$dictionary['Doc_Documentos_Adic']['fields']['fecha_exp_req1_c']['labelValue']='RFI Expiration Date';

 

 // created: 2022-03-28 16:54:04
$dictionary['Doc_Documentos_Adic']['fields']['uploaded_by_c']['inline_edit']='1';
$dictionary['Doc_Documentos_Adic']['fields']['uploaded_by_c']['labelValue']='Uploaded by';

 

 // created: 2022-03-25 15:50:19
$dictionary['Doc_Documentos_Adic']['fields']['internal_document_c']['inline_edit']='1';
$dictionary['Doc_Documentos_Adic']['fields']['internal_document_c']['labelValue']='Internal Document';

 

 // created: 2023-02-03 21:14:29
$dictionary['Doc_Documentos_Adic']['fields']['visa_application_date_c']['inline_edit']='1';
$dictionary['Doc_Documentos_Adic']['fields']['visa_application_date_c']['labelValue']='Visa Application Date';

 

 // created: 2023-03-07 16:30:01
$dictionary['Doc_Documentos_Adic']['fields']['rfi_received_date_c']['inline_edit']='1';
$dictionary['Doc_Documentos_Adic']['fields']['rfi_received_date_c']['labelValue']='RFI Received Date';

 

 // created: 2023-02-03 21:14:55
$dictionary['Doc_Documentos_Adic']['fields']['granted_date_c']['inline_edit']='1';
$dictionary['Doc_Documentos_Adic']['fields']['granted_date_c']['labelValue']='Granted Date';

 

 // created: 2024-09-06 20:58:21
$dictionary['Doc_Documentos_Adic']['fields']['checklist_c']['inline_edit']='1';
$dictionary['Doc_Documentos_Adic']['fields']['checklist_c']['labelValue']='Checklist';

 

 // created: 2023-03-07 16:03:22
$dictionary['Doc_Documentos_Adic']['fields']['rfi_name_1_c']['inline_edit']='1';
$dictionary['Doc_Documentos_Adic']['fields']['rfi_name_1_c']['labelValue']='RFI Name';

 

 // created: 2023-03-07 16:28:19
$dictionary['Doc_Documentos_Adic']['fields']['rfi_type_c']['inline_edit']='1';
$dictionary['Doc_Documentos_Adic']['fields']['rfi_type_c']['labelValue']='RFI Type';

 

 // created: 2023-03-07 16:03:31
$dictionary['Doc_Documentos_Adic']['fields']['rfi_1_types_c']['inline_edit']='1';
$dictionary['Doc_Documentos_Adic']['fields']['rfi_1_types_c']['labelValue']='RFI Type';

 

 // created: 2025-03-26 16:35:40
$dictionary['Doc_Documentos_Adic']['fields']['alternative_email_c']['inline_edit']='1';
$dictionary['Doc_Documentos_Adic']['fields']['alternative_email_c']['labelValue']='Alternative Email';

 

 // created: 2023-02-08 19:53:36
$dictionary['Doc_Documentos_Adic']['fields']['name']['audited']=true;
$dictionary['Doc_Documentos_Adic']['fields']['name']['inline_edit']=true;
$dictionary['Doc_Documentos_Adic']['fields']['name']['duplicate_merge']='disabled';
$dictionary['Doc_Documentos_Adic']['fields']['name']['duplicate_merge_dom_value']='0';
$dictionary['Doc_Documentos_Adic']['fields']['name']['merge_filter']='disabled';
$dictionary['Doc_Documentos_Adic']['fields']['name']['unified_search']=false;

 

 // created: 2023-02-27 21:46:36
$dictionary['Doc_Documentos_Adic']['fields']['estado_de_visa_c']['inline_edit']='';
$dictionary['Doc_Documentos_Adic']['fields']['estado_de_visa_c']['labelValue']='Doc Type';

 

 // created: 2023-02-15 17:24:18
$dictionary['Doc_Documentos_Adic']['fields']['tas_approval_date_c']['inline_edit']='1';
$dictionary['Doc_Documentos_Adic']['fields']['tas_approval_date_c']['labelValue']='TAS Approval date';

 

 // created: 2023-02-03 21:14:36
$dictionary['Doc_Documentos_Adic']['fields']['new_expiration_date_c']['inline_edit']='1';
$dictionary['Doc_Documentos_Adic']['fields']['new_expiration_date_c']['labelValue']='New Expiration Date';

 

 // created: 2026-01-29 23:18:43
$dictionary['Doc_Documentos_Adic']['fields']['checklist_related_c']['inline_edit']='1';
$dictionary['Doc_Documentos_Adic']['fields']['checklist_related_c']['labelValue']='Checklist Related';

 

 // created: 2023-03-07 16:30:38
$dictionary['Doc_Documentos_Adic']['fields']['rfi_deadline_date_c']['inline_edit']='1';
$dictionary['Doc_Documentos_Adic']['fields']['rfi_deadline_date_c']['labelValue']='RFI Deadline Date';

 

 // created: 2023-03-30 22:33:05
$dictionary['Doc_Documentos_Adic']['fields']['nomination_trn_c']['inline_edit']='1';
$dictionary['Doc_Documentos_Adic']['fields']['nomination_trn_c']['labelValue']='Nomination TRN';

 

 // created: 2023-03-07 16:08:29
$dictionary['Doc_Documentos_Adic']['fields']['fecha_req1_c']['inline_edit']='1';
$dictionary['Doc_Documentos_Adic']['fields']['fecha_req1_c']['labelValue']='RFI Date';

 

 // created: 2023-03-07 16:27:54
$dictionary['Doc_Documentos_Adic']['fields']['rfi_name_c']['inline_edit']='1';
$dictionary['Doc_Documentos_Adic']['fields']['rfi_name_c']['labelValue']='RFI Name';

 

 // created: 2025-04-10 21:25:51
$dictionary['Doc_Documentos_Adic']['fields']['alternative_email_name_c']['inline_edit']='1';
$dictionary['Doc_Documentos_Adic']['fields']['alternative_email_name_c']['labelValue']='Alternative Email Name';

 

 // created: 2022-05-25 21:55:22
$dictionary['Doc_Documentos_Adic']['fields']['requested_to_c']['inline_edit']='1';
$dictionary['Doc_Documentos_Adic']['fields']['requested_to_c']['labelValue']='Requested To';

 

 // created: 2023-02-09 22:42:41
$dictionary['Doc_Documentos_Adic']['fields']['uploadfile']['required']=false;

 
?>