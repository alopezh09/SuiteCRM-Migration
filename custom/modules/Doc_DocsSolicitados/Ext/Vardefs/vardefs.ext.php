<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2022-02-08 16:18:15
$dictionary["Doc_DocsSolicitados"]["fields"]["veta_requerimiento_doc_docssolicitados_1"] = array (
  'name' => 'veta_requerimiento_doc_docssolicitados_1',
  'type' => 'link',
  'relationship' => 'veta_requerimiento_doc_docssolicitados_1',
  'source' => 'non-db',
  'module' => 'Veta_Requerimiento',
  'bean_name' => 'Veta_Requerimiento',
  'vname' => 'LBL_VETA_REQUERIMIENTO_DOC_DOCSSOLICITADOS_1_FROM_VETA_REQUERIMIENTO_TITLE',
  'id_name' => 'veta_requerimiento_doc_docssolicitados_1veta_requerimiento_ida',
);
$dictionary["Doc_DocsSolicitados"]["fields"]["veta_requerimiento_doc_docssolicitados_1_name"] = array (
  'name' => 'veta_requerimiento_doc_docssolicitados_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VETA_REQUERIMIENTO_DOC_DOCSSOLICITADOS_1_FROM_VETA_REQUERIMIENTO_TITLE',
  'save' => true,
  'id_name' => 'veta_requerimiento_doc_docssolicitados_1veta_requerimiento_ida',
  'link' => 'veta_requerimiento_doc_docssolicitados_1',
  'table' => 'veta_requerimiento',
  'module' => 'Veta_Requerimiento',
  'rname' => 'name',
);
$dictionary["Doc_DocsSolicitados"]["fields"]["veta_requerimiento_doc_docssolicitados_1veta_requerimiento_ida"] = array (
  'name' => 'veta_requerimiento_doc_docssolicitados_1veta_requerimiento_ida',
  'type' => 'link',
  'relationship' => 'veta_requerimiento_doc_docssolicitados_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VETA_REQUERIMIENTO_DOC_DOCSSOLICITADOS_1_FROM_DOC_DOCSSOLICITADOS_TITLE',
);


// created: 2021-11-17 16:06:29
$dictionary["Doc_DocsSolicitados"]["fields"]["doc_docssolicitados_opportunities"] = array (
  'name' => 'doc_docssolicitados_opportunities',
  'type' => 'link',
  'relationship' => 'doc_docssolicitados_opportunities',
  'source' => 'non-db',
  'module' => 'Opportunities',
  'bean_name' => 'Opportunity',
  'vname' => 'LBL_DOC_DOCSSOLICITADOS_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
  'id_name' => 'doc_docssolicitados_opportunitiesopportunities_ida',
);
$dictionary["Doc_DocsSolicitados"]["fields"]["doc_docssolicitados_opportunities_name"] = array (
  'name' => 'doc_docssolicitados_opportunities_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_DOC_DOCSSOLICITADOS_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
  'save' => true,
  'id_name' => 'doc_docssolicitados_opportunitiesopportunities_ida',
  'link' => 'doc_docssolicitados_opportunities',
  'table' => 'opportunities',
  'module' => 'Opportunities',
  'rname' => 'name',
);
$dictionary["Doc_DocsSolicitados"]["fields"]["doc_docssolicitados_opportunitiesopportunities_ida"] = array (
  'name' => 'doc_docssolicitados_opportunitiesopportunities_ida',
  'type' => 'link',
  'relationship' => 'doc_docssolicitados_opportunities',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_DOC_DOCSSOLICITADOS_OPPORTUNITIES_FROM_DOC_DOCSSOLICITADOS_TITLE',
);


// created: 2021-11-17 16:06:29
$dictionary["Doc_DocsSolicitados"]["fields"]["doc_docssolicitados_doc_documentos"] = array (
  'name' => 'doc_docssolicitados_doc_documentos',
  'type' => 'link',
  'relationship' => 'doc_docssolicitados_doc_documentos',
  'source' => 'non-db',
  'module' => 'Doc_Documentos',
  'bean_name' => 'Doc_Documentos',
  'side' => 'right',
  'vname' => 'LBL_DOC_DOCSSOLICITADOS_DOC_DOCUMENTOS_FROM_DOC_DOCUMENTOS_TITLE',
);


 // created: 2022-03-29 15:57:57
$dictionary['Doc_DocsSolicitados']['fields']['user_id_c']['inline_edit']=1;

 

 // created: 2022-08-31 21:13:31
$dictionary['Doc_DocsSolicitados']['fields']['url_multi_docs_c']['inline_edit']='1';
$dictionary['Doc_DocsSolicitados']['fields']['url_multi_docs_c']['labelValue']='URL Multi Docs';

 

 // created: 2023-05-30 15:30:36
$dictionary['Doc_DocsSolicitados']['fields']['change_status_c']['inline_edit']='1';
$dictionary['Doc_DocsSolicitados']['fields']['change_status_c']['labelValue']='Change Status';

 

 // created: 2023-08-24 17:12:57
$dictionary['Doc_DocsSolicitados']['fields']['document_comment_c']['inline_edit']='1';
$dictionary['Doc_DocsSolicitados']['fields']['document_comment_c']['labelValue']='Document Comments';

 

 // created: 2022-03-29 15:57:57
$dictionary['Doc_DocsSolicitados']['fields']['uploaded_by_c']['inline_edit']='1';
$dictionary['Doc_DocsSolicitados']['fields']['uploaded_by_c']['labelValue']='Uploaded By';

 

 // created: 2023-01-13 23:12:18
$dictionary['Doc_DocsSolicitados']['fields']['internal_document_c']['inline_edit']='1';
$dictionary['Doc_DocsSolicitados']['fields']['internal_document_c']['labelValue']='Internal Document';

 

 // created: 2022-08-31 20:30:05
$dictionary['Doc_DocsSolicitados']['fields']['urls_multi_docs_c']['inline_edit']='';
$dictionary['Doc_DocsSolicitados']['fields']['urls_multi_docs_c']['labelValue']='URLs Multi docs c';

 

 // created: 2023-11-16 17:45:29
$dictionary['Doc_DocsSolicitados']['fields']['ms_id_c']['inline_edit']='1';
$dictionary['Doc_DocsSolicitados']['fields']['ms_id_c']['labelValue']='ms id';

 

 // created: 2022-06-01 14:28:39
$dictionary['Doc_DocsSolicitados']['fields']['requested_to_c']['inline_edit']='1';
$dictionary['Doc_DocsSolicitados']['fields']['requested_to_c']['labelValue']='Requested To';

 
?>