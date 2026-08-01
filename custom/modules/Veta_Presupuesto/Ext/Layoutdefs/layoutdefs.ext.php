<?php 
 //WARNING: The contents of this file are auto-generated


 // created: 2023-01-16 03:09:34
$layout_defs["Veta_Presupuesto"]["subpanel_setup"]['auto_tickets_veta_presupuesto'] = array (
  'order' => 100,
  'module' => 'Auto_Tickets',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_AUTO_TICKETS_VETA_PRESUPUESTO_FROM_AUTO_TICKETS_TITLE',
  'get_subpanel_data' => 'auto_tickets_veta_presupuesto',
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


// created: 2019-11-30 17:29:25
$layout_defs["Veta_Presupuesto"]["subpanel_setup"]['veta_presupuesto_emails'] = array (
    'order' => 100,
    'module' => 'Emails',
    'subpanel_name' => 'ForQueues',
    'sort_order' => 'asc',
    'sort_by' => 'id',
    'title_key' => 'LBL_VETA_PRESUPUESTO_EMAILS_FROM_EMAILS_TITLE',
    'get_subpanel_data' => 'veta_presupuesto_emails',
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


 // created: 2020-10-14 00:58:24
$layout_defs["Veta_Presupuesto"]["subpanel_setup"]['veta_detallepresupuesto_veta_presupuesto'] = array (
  'order' => 100,
  'module' => 'Veta_DetallePresupuesto',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_VETA_DETALLEPRESUPUESTO_VETA_PRESUPUESTO_FROM_VETA_DETALLEPRESUPUESTO_TITLE',
  'get_subpanel_data' => 'veta_detallepresupuesto_veta_presupuesto',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),/*
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),*/
  ),
);


// created: 2019-11-30 14:01:33
$layout_defs["Veta_Presupuesto"]["subpanel_setup"]['veta_recibo_veta_presupuesto'] = array (
    'order' => 100,
    'module' => 'Veta_Recibo',
    'subpanel_name' => 'default',
    'sort_order' => 'asc',
    'sort_by' => 'id',
    'title_key' => 'LBL_VETA_RECIBO_VETA_PRESUPUESTO_FROM_VETA_RECIBO_TITLE',
    'get_subpanel_data' => 'veta_recibo_veta_presupuesto',
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


//auto-generated file DO NOT EDIT
$layout_defs['Veta_Presupuesto']['subpanel_setup']['veta_detallepresupuesto_veta_presupuesto']['override_subpanel_name'] = 'Veta_Presupuesto_subpanel_veta_detallepresupuesto_veta_presupuesto';

?>