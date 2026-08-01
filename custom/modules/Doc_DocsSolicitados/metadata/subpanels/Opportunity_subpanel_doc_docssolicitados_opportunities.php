<?php
// created: 2023-05-30 17:43:00
$subpanel_layout['list_fields'] = array (
  'change_status_c' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'vname' => 'LBL_CHANGE_STATUS',
    'width' => '10%',
  ),
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '45%',
    'default' => true,
  ),
  'date_modified' => 
  array (
    'vname' => 'LBL_DATE_MODIFIED',
    'width' => '45%',
    'default' => true,
  ),
  'fechaaprobado' => 
  array (
    'type' => 'datetimecombo',
    'vname' => 'LBL_FECHAAPROBADO',
    'width' => '10%',
    'default' => true,
  ),
  'url' => 
  array (
    'type' => 'url',
    'vname' => 'LBL_URL',
    'width' => '10%',
    'default' => true,
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'Doc_DocsSolicitados',
    'width' => '4%',
    'default' => true,
  ),
  'estadodocumento' => 
  array (
    'type' => 'dynamicenum',
    'studio' => 'visible',
    'vname' => 'LBL_ESTADODOCUMENTO',
    'width' => '10%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'Doc_DocsSolicitados',
    'width' => '5%',
    'default' => true,
  ),
  'approve_button' => 
  array (
    'vname' => 'LBL_APPROVE',
    'widget_class' => 'SubPanelApproveButtonChecklist',
    'module' => 'Doc_DocsSolicitados',
    'width' => '5%',
    'default' => true,
  ),
  'reject_button' => 
  array (
    'vname' => 'LBL_APPROVE',
    'widget_class' => 'SubPanelRejectButtonChecklist',
    'module' => 'Doc_Documentos_Adic',
    'width' => '5%',
    'default' => true,
  ),
  'revising_button' => 
  array (
    'vname' => 'LBL_REVISING',
    'widget_class' => 'SubPanelRevisingButtonChecklist',
    'module' => 'Doc_Documentos_Adic',
    'width' => '5%',
    'default' => true,
  ),
  'ayuda' => 
  array (
    'name' => 'ayuda',
    'vname' => 'LBL_AYUDA',
    'width' => '15%',
    'force_blank' => true,
    'force_exists' => true,
    'force_default' => '(SELECT docs.ayuda FROM doc_docssolicitados_doc_documentos_c docsoldoc,doc_documentos docs 
WHERE docsoldoc.doc_docssolicitados_doc_documentosdoc_documentos_idb = docs.id
and docsoldoc.doc_docssolicitados_doc_documentosdoc_docssolicitados_ida = doc_docssolicitados.id) AS',
    'default' => true,
  ),
  'description' => 
  array (
    'name' => 'description',
    'vname' => 'LBL_DESCRIPCION',
    'width' => '15%',
    'force_blank' => true,
    'force_exists' => true,
    'force_default' => '(SELECT docs.description FROM doc_docssolicitados_doc_documentos_c docsoldoc,doc_documentos docs 
WHERE docsoldoc.doc_docssolicitados_doc_documentosdoc_documentos_idb = docs.id
and docsoldoc.doc_docssolicitados_doc_documentosdoc_docssolicitados_ida = doc_docssolicitados.id) AS',
    'default' => true,
  ),
  'observaciones' => 
  array (
    'name' => 'observaciones',
    'vname' => 'LBL_OBSERVACIONES',
    'width' => '15%',
    'force_blank' => true,
    'force_exists' => true,
    'force_default' => '(SELECT docs.observaciones FROM doc_docssolicitados_doc_documentos_c docsoldoc,doc_documentos docs 
WHERE docsoldoc.doc_docssolicitados_doc_documentosdoc_documentos_idb = docs.id
and docsoldoc.doc_docssolicitados_doc_documentosdoc_docssolicitados_ida = doc_docssolicitados.id) AS',
    'default' => true,
  ),
  'recursos' => 
  array (
    'name' => 'recursos',
    'vname' => 'LBL_RECURSOS',
    'width' => '15%',
    'force_blank' => true,
    'force_exists' => true,
    'force_default' => '(SELECT docs.recursos FROM doc_docssolicitados_doc_documentos_c docsoldoc,doc_documentos docs 
WHERE docsoldoc.doc_docssolicitados_doc_documentosdoc_documentos_idb = docs.id
and docsoldoc.doc_docssolicitados_doc_documentosdoc_docssolicitados_ida = doc_docssolicitados.id) AS',
    'default' => true,
  ),
  'requested_to_c' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'vname' => 'LBL_REQUESTED_TO',
    'width' => '10%',
  ),
  'uploaded_by_c' => 
  array (
    'type' => 'relate',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_UPLOADED_BY',
    'id' => 'USER_ID_C',
    'link' => true,
    'width' => '10%',
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'Users',
    'target_record_key' => 'user_id_c',
  ),
  'solicitadopor' => 
  array (
    'name' => 'solicitadopor',
    'vname' => 'LBL_SOLICITADOPOR',
    'width' => '15%',
    'force_blank' => true,
    'force_exists' => true,
    'force_default' => '(SELECT docs.solicitadopor FROM doc_docssolicitados_doc_documentos_c docsoldoc,doc_documentos docs 
WHERE docsoldoc.doc_docssolicitados_doc_documentosdoc_documentos_idb = docs.id
and docsoldoc.doc_docssolicitados_doc_documentosdoc_docssolicitados_ida = doc_docssolicitados.id) AS',
    'default' => true,
  ),
  'document_comment_c' => 
  array (
    'vname' => 'LBL_DOCUMENT_COMMENT_C',
    'width' => '45%',
    'default' => true,
    'type' => 'varchar',
    'link' => false,
    'enabled' => true,
    'editable' => true,
    'displayParams' => 
    array (
      'size' => '20',
    ),
  ),
);