<?php 
 //WARNING: The contents of this file are auto-generated


 // created: 2019-11-02 17:11:43
$layout_defs["Opportunities"]["subpanel_setup"]['opportunities_cases_1'] = array (
  'order' => 100,
  'module' => 'Cases',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_OPPORTUNITIES_CASES_1_FROM_CASES_TITLE',
  'get_subpanel_data' => 'opportunities_cases_1',
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


 // created: 2020-10-14 00:58:36
$layout_defs["Opportunities"]["subpanel_setup"]['veta_serviciocliente_opportunities'] = array (
  'order' => 100,
  'module' => 'Veta_ServicioCliente',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_VETA_SERVICIOCLIENTE_OPPORTUNITIES_FROM_VETA_SERVICIOCLIENTE_TITLE',
  'get_subpanel_data' => 'veta_serviciocliente_opportunities',
  'top_buttons' => 
  array (
    /*0 =>
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),*/
  ),
);


 // created: 2021-11-17 16:06:29
$layout_defs["Opportunities"]["subpanel_setup"]['doc_docssolicitados_opportunities'] = array (
  'order' => 100,
  'module' => 'Doc_DocsSolicitados',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_DOC_DOCSSOLICITADOS_OPPORTUNITIES_FROM_DOC_DOCSSOLICITADOS_TITLE',
  'get_subpanel_data' => 'doc_docssolicitados_opportunities',
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



//SOEL
unset($layout_defs["Opportunities"]["subpanel_setup"]['veta_coe_opportunities']);
unset($layout_defs['Opportunities']['subpanel_setup']['contacts']);
unset($layout_defs['Opportunities']['subpanel_setup']['leads']);
unset($layout_defs['Opportunities']['subpanel_setup']['documents']);
unset($layout_defs['Opportunities']['subpanel_setup']['veta_pagocolegios_opportunities']);
unset($layout_defs["Opportunities"]["subpanel_setup"]['veta_aplicacion_opportunities']); 




 // created: 2020-10-14 00:58:31
$layout_defs["Opportunities"]["subpanel_setup"]['veta_pagocolegios_opportunities'] = array (
  'order' => 100,
  'module' => 'Veta_PagoColegios',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_VETA_PAGOCOLEGIOS_OPPORTUNITIES_FROM_VETA_PAGOCOLEGIOS_TITLE',
  'get_subpanel_data' => 'veta_pagocolegios_opportunities',
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


 // created: 2023-01-16 03:09:34
$layout_defs["Opportunities"]["subpanel_setup"]['auto_tickets_opportunities'] = array (
  'order' => 100,
  'module' => 'Auto_Tickets',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_AUTO_TICKETS_OPPORTUNITIES_FROM_AUTO_TICKETS_TITLE',
  'get_subpanel_data' => 'auto_tickets_opportunities',
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


 // created: 2021-11-17 16:06:29
$layout_defs["Opportunities"]["subpanel_setup"]['doc_documentos_adic_opportunities'] = array (
  'order' => 100,
  'module' => 'Doc_Documentos_Adic',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_DOC_DOCUMENTOS_ADIC_OPPORTUNITIES_FROM_DOC_DOCUMENTOS_ADIC_TITLE',
  'get_subpanel_data' => 'doc_documentos_adic_opportunities',
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


 // created: 2020-10-14 00:58:38
$layout_defs["Opportunities"]["subpanel_setup"]['veta_visa_opportunities'] = array (
  'order' => 100,
  'module' => 'Veta_Visa',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_VETA_VISA_OPPORTUNITIES_FROM_VETA_VISA_TITLE',
  'get_subpanel_data' => 'veta_visa_opportunities',
  'top_buttons' => 
  array (
    /*0 =>
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),*/
  ),
);


// created: 2020-10-14 00:58:20 soel soel soel
$layout_defs["Opportunities"]["subpanel_setup"]['veta_aplicacion_opportunities'] = array (
    'order' => 100,
    'module' => 'Veta_Aplicacion',
    'subpanel_name' => 'default',
    'sort_order' => 'asc',
    'sort_by' => 'id',
    'title_key' => 'LBL_VETA_APLICACION_OPPORTUNITIES_FROM_VETA_APLICACION_TITLE',
    'get_subpanel_data' => 'veta_aplicacion_opportunities',
    'top_buttons' =>
        array (
            /*0 =>
            array (
              'widget_class' => 'SubPanelTopButtonQuickCreate',
            ),
            1 =>
            array (
              'widget_class' => 'SubPanelTopSelectButton',
              'mode' => 'MultiSelect',
            ),*/
        ),
);


unset($layout_defs["Opportunities"]["subpanel_setup"]['veta_aplicacion_opportunities']);
unset($layout_defs["Opportunities"]["subpanel_setup"]['veta_coe_opportunities']);
unset($layout_defs["Opportunities"]["subpanel_setup"]['veta_pagocolegios_opportunities']); 

 // created: 2025-05-29 21:21:08
$layout_defs["Opportunities"]["subpanel_setup"]['zoom_calls_opportunities'] = array (
  'order' => 100,
  'module' => 'Zoom_Calls',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_ZOOM_CALLS_OPPORTUNITIES_FROM_ZOOM_CALLS_TITLE',
  'get_subpanel_data' => 'zoom_calls_opportunities',
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


 // created: 2020-10-14 00:58:22
$layout_defs["Opportunities"]["subpanel_setup"]['veta_coe_opportunities'] = array (
  'order' => 100,
  'module' => 'Veta_COE',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_VETA_COE_OPPORTUNITIES_FROM_VETA_COE_TITLE',
  'get_subpanel_data' => 'veta_coe_opportunities',
  'top_buttons' => 
  array (
    /*0 =>
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),*/
  ),
);


 // created: 2021-11-17 16:06:28
$layout_defs["Opportunities"]["subpanel_setup"]['doc_comentarios_opportunities'] = array (
  'order' => 100,
  'module' => 'Doc_Comentarios',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_DOC_COMENTARIOS_OPPORTUNITIES_FROM_DOC_COMENTARIOS_TITLE',
  'get_subpanel_data' => 'doc_comentarios_opportunities',
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


 // created: 2021-11-17 16:06:29
$layout_defs["Opportunities"]["subpanel_setup"]['doc_plantillas_opportunities'] = array (
  'order' => 100,
  'module' => 'Doc_Plantillas',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_DOC_PLANTILLAS_OPPORTUNITIES_FROM_DOC_PLANTILLAS_TITLE',
  'get_subpanel_data' => 'doc_plantillas_opportunities',
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
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);


//auto-generated file DO NOT EDIT
$layout_defs['Opportunities']['subpanel_setup']['doc_docssolicitados_opportunities']['override_subpanel_name'] = 'Opportunity_subpanel_doc_docssolicitados_opportunities';


//auto-generated file DO NOT EDIT
$layout_defs['Opportunities']['subpanel_setup']['veta_aplicacion_opportunities']['override_subpanel_name'] = 'Opportunity_subpanel_veta_aplicacion_opportunities';


//auto-generated file DO NOT EDIT
$layout_defs['Opportunities']['subpanel_setup']['doc_plantillas_opportunities']['override_subpanel_name'] = 'Opportunity_subpanel_doc_plantillas_opportunities';


//auto-generated file DO NOT EDIT
$layout_defs['Opportunities']['subpanel_setup']['opportunities_cases_1']['override_subpanel_name'] = 'Opportunity_subpanel_opportunities_cases_1';


//auto-generated file DO NOT EDIT
$layout_defs['Opportunities']['subpanel_setup']['veta_serviciocliente_opportunities']['override_subpanel_name'] = 'Opportunity_subpanel_veta_serviciocliente_opportunities';


//auto-generated file DO NOT EDIT
$layout_defs['Opportunities']['subpanel_setup']['zoom_calls_opportunities']['override_subpanel_name'] = 'Opportunity_subpanel_zoom_calls_opportunities';


//auto-generated file DO NOT EDIT
$layout_defs['Opportunities']['subpanel_setup']['veta_coe_opportunities']['override_subpanel_name'] = 'Opportunity_subpanel_veta_coe_opportunities';


//auto-generated file DO NOT EDIT
$layout_defs['Opportunities']['subpanel_setup']['doc_comentarios_opportunities']['override_subpanel_name'] = 'Opportunity_subpanel_doc_comentarios_opportunities';


//auto-generated file DO NOT EDIT
$layout_defs['Opportunities']['subpanel_setup']['doc_documentos_adic_opportunities']['override_subpanel_name'] = 'Opportunity_subpanel_doc_documentos_adic_opportunities';

?>