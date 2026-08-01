<?php 
 //WARNING: The contents of this file are auto-generated


 // created: 2020-09-10 02:09:35
$layout_defs["Veta_Requerimiento"]["subpanel_setup"]['veta_requerimiento_veta_recibo'] = array (
  'order' => 100,
  'module' => 'Veta_Recibo',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_VETA_REQUERIMIENTO_VETA_RECIBO_FROM_VETA_RECIBO_TITLE2',
  'get_subpanel_data' => 'veta_requerimiento_veta_recibo',
  'top_buttons' => 
  array (
    /* 0 =>
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),     */
    
  ),
);


 // created: 2022-02-08 16:18:15
$layout_defs["Veta_Requerimiento"]["subpanel_setup"]['veta_requerimiento_doc_docssolicitados_1'] = array (
  'order' => 100,
  'module' => 'Doc_DocsSolicitados',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_VETA_REQUERIMIENTO_DOC_DOCSSOLICITADOS_1_FROM_DOC_DOCSSOLICITADOS_TITLE',
  'get_subpanel_data' => 'veta_requerimiento_doc_docssolicitados_1',
  'top_buttons' => 
  array (
	/*
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
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


 // created: 2021-05-04 17:11:24
$layout_defs["Veta_Requerimiento"]["subpanel_setup"]['activities'] = array (
  'order' => 10,
  'sort_order' => 'desc',
  'sort_by' => 'date_due',
  'title_key' => 'LBL_ACTIVITIES_SUBPANEL_TITLE',
  'type' => 'collection',
  'subpanel_name' => 'activities',
  'module' => 'Activities',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateTaskButton',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopScheduleMeetingButton',
    ),
    2 => 
    array (
      'widget_class' => 'SubPanelTopScheduleCallButton',
    ),
    3 => 
    array (
      'widget_class' => 'SubPanelTopComposeEmailButton',
    ),
  ),
  'collection_list' => 
  array (
    'meetings' => 
    array (
      'module' => 'Meetings',
      'subpanel_name' => 'ForActivities',
      'get_subpanel_data' => 'veta_requerimiento_activities_1_meetings',
    ),
    'tasks' => 
    array (
      'module' => 'Tasks',
      'subpanel_name' => 'ForActivities',
      'get_subpanel_data' => 'veta_requerimiento_activities_1_tasks',
    ),
    'calls' => 
    array (
      'module' => 'Calls',
      'subpanel_name' => 'ForActivities',
      'get_subpanel_data' => 'veta_requerimiento_activities_1_calls',
    ),
  ),
  'get_subpanel_data' => 'activities',
);
$layout_defs["Veta_Requerimiento"]["subpanel_setup"]['history'] = array (
  'order' => 20,
  'sort_order' => 'desc',
  'sort_by' => 'date_modified',
  'title_key' => 'LBL_HISTORY',
  'type' => 'collection',
  'subpanel_name' => 'history',
  'module' => 'History',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateNoteButton',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopArchiveEmailButton',
    ),
    2 => 
    array (
      'widget_class' => 'SubPanelTopSummaryButton',
    ),
  ),
  'collection_list' => 
  array (
    'meetings' => 
    array (
      'module' => 'Meetings',
      'subpanel_name' => 'ForHistory',
      'get_subpanel_data' => 'veta_requerimiento_activities_1_meetings',
    ),
    'tasks' => 
    array (
      'module' => 'Tasks',
      'subpanel_name' => 'ForHistory',
      'get_subpanel_data' => 'veta_requerimiento_activities_1_tasks',
    ),
    'calls' => 
    array (
      'module' => 'Calls',
      'subpanel_name' => 'ForHistory',
      'get_subpanel_data' => 'veta_requerimiento_activities_1_calls',
    ),
    'notes' => 
    array (
      'module' => 'Notes',
      'subpanel_name' => 'ForHistory',
      'get_subpanel_data' => 'veta_requerimiento_activities_1_notes',
    ),
    'emails' => 
    array (
      'module' => 'Emails',
      'subpanel_name' => 'ForHistory',
      'get_subpanel_data' => 'veta_requerimiento_activities_1_emails',
    ),
  ),
  'get_subpanel_data' => 'history',
);


 // created: 2022-02-08 16:48:12
$layout_defs["Veta_Requerimiento"]["subpanel_setup"]['veta_requerimiento_doc_comentarios_1'] = array (
  'order' => 100,
  'module' => 'Doc_Comentarios',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_VETA_REQUERIMIENTO_DOC_COMENTARIOS_1_FROM_DOC_COMENTARIOS_TITLE',
  'get_subpanel_data' => 'veta_requerimiento_doc_comentarios_1',
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
  ),
);


 // created: 2020-10-14 00:58:35
$layout_defs["Veta_Requerimiento"]["subpanel_setup"]['veta_requerimiento_veta_presupuesto'] = array (
  'order' => 100,
  'module' => 'Veta_Presupuesto',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_VETA_REQUERIMIENTO_VETA_PRESUPUESTO_FROM_VETA_PRESUPUESTO_TITLE',
  'get_subpanel_data' => 'veta_requerimiento_veta_presupuesto',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateButton',
    ),/*
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),*/
  ),
);


 // created: 2023-01-16 03:09:34
$layout_defs["Veta_Requerimiento"]["subpanel_setup"]['auto_tickets_veta_requerimiento'] = array (
  'order' => 100,
  'module' => 'Auto_Tickets',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_AUTO_TICKETS_VETA_REQUERIMIENTO_FROM_AUTO_TICKETS_TITLE',
  'get_subpanel_data' => 'auto_tickets_veta_requerimiento',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);


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


 // created: 2024-04-24 16:01:00
$layout_defs["Veta_Requerimiento"]["subpanel_setup"]['veta_profile_veta_requerimiento'] = array (
  'order' => 100,
  'module' => 'Veta_Profile',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_VETA_PROFILE_VETA_REQUERIMIENTO_FROM_VETA_PROFILE_TITLE',
  'get_subpanel_data' => 'veta_profile_veta_requerimiento',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);


 // created: 2022-02-08 16:42:45
$layout_defs["Veta_Requerimiento"]["subpanel_setup"]['veta_requerimiento_doc_plantillas_1'] = array (
  'order' => 100,
  'module' => 'Doc_Plantillas',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_VETA_REQUERIMIENTO_DOC_PLANTILLAS_1_FROM_DOC_PLANTILLAS_TITLE',
  'get_subpanel_data' => 'veta_requerimiento_doc_plantillas_1',
  'top_buttons' => 
  array (
    /*
	0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
	*/
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButtonCustomTemplates',
	  //'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',	  
    ),
  ),
);


//auto-generated file DO NOT EDIT
$layout_defs['Veta_Requerimiento']['subpanel_setup']['veta_requerimiento_veta_presupuesto']['override_subpanel_name'] = 'Veta_Requerimiento_subpanel_veta_requerimiento_veta_presupuesto';


//auto-generated file DO NOT EDIT
$layout_defs['Veta_Requerimiento']['subpanel_setup']['veta_requerimiento_doc_documentos_adic_1']['override_subpanel_name'] = 'Veta_Requerimiento_subpanel_veta_requerimiento_doc_documentos_adic_1';


//auto-generated file DO NOT EDIT
$layout_defs['Veta_Requerimiento']['subpanel_setup']['veta_requerimiento_veta_recibo']['override_subpanel_name'] = 'Veta_Requerimiento_subpanel_veta_requerimiento_veta_recibo';


//auto-generated file DO NOT EDIT
$layout_defs['Veta_Requerimiento']['subpanel_setup']['veta_requerimiento_doc_docssolicitados_1']['override_subpanel_name'] = 'Veta_Requerimiento_subpanel_veta_requerimiento_doc_docssolicitados_1';

?>