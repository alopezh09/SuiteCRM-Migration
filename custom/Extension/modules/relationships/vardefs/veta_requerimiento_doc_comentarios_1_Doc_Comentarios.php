<?php
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
