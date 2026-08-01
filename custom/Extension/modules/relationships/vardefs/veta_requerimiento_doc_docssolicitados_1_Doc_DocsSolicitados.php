<?php
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
