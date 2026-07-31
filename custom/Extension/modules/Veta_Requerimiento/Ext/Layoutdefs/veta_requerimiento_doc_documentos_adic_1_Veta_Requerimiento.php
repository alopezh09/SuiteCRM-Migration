<?php
 // created: 2022-02-08 16:30:45
$layout_defs["Veta_Requerimiento"]["subpanel_setup"]['veta_requerimiento_doc_documentos_adic_1'] = array (
  'order' => 100,
  'module' => 'Doc_Documentos_Adic',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_VETA_REQUERIMIENTO_DOC_DOCUMENTOS_ADIC_1_FROM_DOC_DOCUMENTOS_ADIC_TITLE',
  'get_subpanel_data' => 'veta_requerimiento_doc_documentos_adic_1',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    /*
	1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
	*/
	1 => 
    array (
      'widget_class' => 'SubPanelTopButtonCustomApprove',      
    ), 
	
	2 => 
    array (
      'widget_class' => 'SubPanelTopButtonCustomReject',      
    ), 
	
  ),
);
