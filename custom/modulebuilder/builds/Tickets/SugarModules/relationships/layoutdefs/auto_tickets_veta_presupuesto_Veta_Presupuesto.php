<?php
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
