<?php
// created: 2024-07-31 18:36:54
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'name' => 'name',
    'vname' => 'LBL_LIST_OPPORTUNITY_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '40%',
    'default' => true,
  ),
  'contacts_opportunities_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'vname' => 'LBL_CONTACTS_OPPORTUNITIES_1_FROM_CONTACTS_TITLE',
    'id' => 'CONTACTS_OPPORTUNITIES_1CONTACTS_IDA',
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'Contacts',
    'target_record_key' => 'contacts_opportunities_1contacts_ida',
  ),
  'estado_visas_c' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_ESTADO_VISAS',
    'width' => '10%',
  ),
  'estado_servicio_al_cliente_c' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_ESTADO_SERVICIO_AL_CLIENTE',
    'width' => '10%',
  ),
  'currency_id' => 
  array (
    'usage' => 'query_only',
  ),
);