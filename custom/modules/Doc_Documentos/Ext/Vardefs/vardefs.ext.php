<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2021-11-17 16:06:29
$dictionary["Doc_Documentos"]["fields"]["doc_docssolicitados_doc_documentos"] = array (
  'name' => 'doc_docssolicitados_doc_documentos',
  'type' => 'link',
  'relationship' => 'doc_docssolicitados_doc_documentos',
  'source' => 'non-db',
  'module' => 'Doc_DocsSolicitados',
  'bean_name' => 'Doc_DocsSolicitados',
  'vname' => 'LBL_DOC_DOCSSOLICITADOS_DOC_DOCUMENTOS_FROM_DOC_DOCSSOLICITADOS_TITLE',
  'id_name' => 'doc_docssolicitados_doc_documentosdoc_docssolicitados_ida',
);
$dictionary["Doc_Documentos"]["fields"]["doc_docssolicitados_doc_documentos_name"] = array (
  'name' => 'doc_docssolicitados_doc_documentos_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_DOC_DOCSSOLICITADOS_DOC_DOCUMENTOS_FROM_DOC_DOCSSOLICITADOS_TITLE',
  'save' => true,
  'id_name' => 'doc_docssolicitados_doc_documentosdoc_docssolicitados_ida',
  'link' => 'doc_docssolicitados_doc_documentos',
  'table' => 'doc_docssolicitados',
  'module' => 'Doc_DocsSolicitados',
  'rname' => 'name',
);
$dictionary["Doc_Documentos"]["fields"]["doc_docssolicitados_doc_documentosdoc_docssolicitados_ida"] = array (
  'name' => 'doc_docssolicitados_doc_documentosdoc_docssolicitados_ida',
  'type' => 'link',
  'relationship' => 'doc_docssolicitados_doc_documentos',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_DOC_DOCSSOLICITADOS_DOC_DOCUMENTOS_FROM_DOC_DOCUMENTOS_TITLE',
);


// created: 2021-11-17 16:06:29
$dictionary["Doc_Documentos"]["fields"]["doc_plantillas_doc_documentos"] = array (
  'name' => 'doc_plantillas_doc_documentos',
  'type' => 'link',
  'relationship' => 'doc_plantillas_doc_documentos',
  'source' => 'non-db',
  'module' => 'Doc_Plantillas',
  'bean_name' => 'Doc_Plantillas',
  'vname' => 'LBL_DOC_PLANTILLAS_DOC_DOCUMENTOS_FROM_DOC_PLANTILLAS_TITLE',
);


 // created: 2023-05-25 22:11:19

 

 // created: 2025-11-24 17:28:05
$dictionary['Doc_Documentos']['fields']['client_display_name_c']['inline_edit']='';
$dictionary['Doc_Documentos']['fields']['client_display_name_c']['labelValue']='Client Display Name';

 

 // created: 2022-03-25 21:10:50
$dictionary['Doc_Documentos']['fields']['internal_document_c']['inline_edit']='1';
$dictionary['Doc_Documentos']['fields']['internal_document_c']['labelValue']='Internal Document';

 

 // created: 2022-09-07 21:38:36
$dictionary['Doc_Documentos']['fields']['resources_text_label2_c']['inline_edit']='1';
$dictionary['Doc_Documentos']['fields']['resources_text_label2_c']['labelValue']='Resources Text Label 2';

 

 // created: 2022-09-07 21:37:00
$dictionary['Doc_Documentos']['fields']['resources2_c']['inline_edit']='1';
$dictionary['Doc_Documentos']['fields']['resources2_c']['labelValue']='Resources 2';

 

 // created: 2022-09-07 21:38:57
$dictionary['Doc_Documentos']['fields']['resources_text_label3_c']['inline_edit']='1';
$dictionary['Doc_Documentos']['fields']['resources_text_label3_c']['labelValue']='Resources Text Label 3';

 

 // created: 2023-05-25 22:10:45
$dictionary['Doc_Documentos']['fields']['resources_text_label_c']['inline_edit']='1';
$dictionary['Doc_Documentos']['fields']['resources_text_label_c']['labelValue']='Video Resources Text Label';

 

 // created: 2022-09-07 21:37:14
$dictionary['Doc_Documentos']['fields']['resources3_c']['inline_edit']='1';
$dictionary['Doc_Documentos']['fields']['resources3_c']['labelValue']='Resources3';

 

 // created: 2022-08-01 21:45:33
$dictionary['Doc_Documentos']['fields']['quantity_documents_c']['inline_edit']='1';
$dictionary['Doc_Documentos']['fields']['quantity_documents_c']['labelValue']='Quantity of Documents';

 

 // created: 2022-05-27 04:04:01
$dictionary['Doc_Documentos']['fields']['requested_to_c']['inline_edit']='1';
$dictionary['Doc_Documentos']['fields']['requested_to_c']['labelValue']='Requested To';

 

 // created: 2023-01-18 22:12:46
$dictionary['Doc_Documentos']['fields']['type_of_item_c']['inline_edit']='1';
$dictionary['Doc_Documentos']['fields']['type_of_item_c']['labelValue']='Type Of Item';

 
?>