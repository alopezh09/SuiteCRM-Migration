<?php
 // created: 2023-03-08 18:39:15
$layout_defs["Veta_ServicioCliente"]["subpanel_setup"]['csche_cs_checklist_veta_serviciocliente'] = array (
  'order' => 100,
  'module' => 'CSChe_CS_Checklist',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_CSCHE_CS_CHECKLIST_VETA_SERVICIOCLIENTE_FROM_CSCHE_CS_CHECKLIST_TITLE',
  'get_subpanel_data' => 'csche_cs_checklist_veta_serviciocliente',
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
