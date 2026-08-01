<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2021-11-17 16:06:29
$dictionary["Doc_Comentarios"]["fields"]["doc_comentarios_opportunities"] = array (
  'name' => 'doc_comentarios_opportunities',
  'type' => 'link',
  'relationship' => 'doc_comentarios_opportunities',
  'source' => 'non-db',
  'module' => 'Opportunities',
  'bean_name' => 'Opportunity',
  'vname' => 'LBL_DOC_COMENTARIOS_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
  'id_name' => 'doc_comentarios_opportunitiesopportunities_ida',
);
$dictionary["Doc_Comentarios"]["fields"]["doc_comentarios_opportunities_name"] = array (
  'name' => 'doc_comentarios_opportunities_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_DOC_COMENTARIOS_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
  'save' => true,
  'id_name' => 'doc_comentarios_opportunitiesopportunities_ida',
  'link' => 'doc_comentarios_opportunities',
  'table' => 'opportunities',
  'module' => 'Opportunities',
  'rname' => 'name',
);
$dictionary["Doc_Comentarios"]["fields"]["doc_comentarios_opportunitiesopportunities_ida"] = array (
  'name' => 'doc_comentarios_opportunitiesopportunities_ida',
  'type' => 'link',
  'relationship' => 'doc_comentarios_opportunities',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_DOC_COMENTARIOS_OPPORTUNITIES_FROM_DOC_COMENTARIOS_TITLE',
);


// created: 2022-02-08 16:48:12
$dictionary["Doc_Comentarios"]["fields"]["veta_requerimiento_doc_comentarios_1"] = array (
  'name' => 'veta_requerimiento_doc_comentarios_1',
  'type' => 'link',
  'relationship' => 'veta_requerimiento_doc_comentarios_1',
  'source' => 'non-db',
  'module' => 'Veta_Requerimiento',
  'bean_name' => 'Veta_Requerimiento',
  'vname' => 'LBL_VETA_REQUERIMIENTO_DOC_COMENTARIOS_1_FROM_VETA_REQUERIMIENTO_TITLE',
  'id_name' => 'veta_requerimiento_doc_comentarios_1veta_requerimiento_ida',
);
$dictionary["Doc_Comentarios"]["fields"]["veta_requerimiento_doc_comentarios_1_name"] = array (
  'name' => 'veta_requerimiento_doc_comentarios_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VETA_REQUERIMIENTO_DOC_COMENTARIOS_1_FROM_VETA_REQUERIMIENTO_TITLE',
  'save' => true,
  'id_name' => 'veta_requerimiento_doc_comentarios_1veta_requerimiento_ida',
  'link' => 'veta_requerimiento_doc_comentarios_1',
  'table' => 'veta_requerimiento',
  'module' => 'Veta_Requerimiento',
  'rname' => 'name',
);
$dictionary["Doc_Comentarios"]["fields"]["veta_requerimiento_doc_comentarios_1veta_requerimiento_ida"] = array (
  'name' => 'veta_requerimiento_doc_comentarios_1veta_requerimiento_ida',
  'type' => 'link',
  'relationship' => 'veta_requerimiento_doc_comentarios_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VETA_REQUERIMIENTO_DOC_COMENTARIOS_1_FROM_DOC_COMENTARIOS_TITLE',
);


 // created: 2022-05-26 16:43:27
$dictionary['Doc_Comentarios']['fields']['received_by_type_c']['inline_edit']='1';
$dictionary['Doc_Comentarios']['fields']['received_by_type_c']['labelValue']='Received By Type';

 

 // created: 2022-05-26 15:28:13
$dictionary['Doc_Comentarios']['fields']['sent_to_c']['inline_edit']='1';
$dictionary['Doc_Comentarios']['fields']['sent_to_c']['labelValue']='Sent To';

 
?>