<?php
$module_name = 'Auto_Tickets';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      0 => 'name',
      1 => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
      ),
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'status' => 
      array (
        'type' => 'enum',
        'studio' => 'visible',
        'label' => 'LBL_STATUS',
        'width' => '10%',
        'default' => true,
        'name' => 'status',
      ),
      'last_answered' => 
      array (
        'type' => 'datetimecombo',
        'label' => 'LBL_LAST_ANSWERED',
        'width' => '10%',
        'default' => true,
        'name' => 'last_answered',
      ),
      'date_sent' => 
      array (
        'type' => 'datetimecombo',
        'label' => 'LBL_DATE_SENT',
        'width' => '10%',
        'default' => true,
        'name' => 'date_sent',
      ),
      'auto_tickets_opportunities_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_AUTO_TICKETS_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
        'id' => 'AUTO_TICKETS_OPPORTUNITIESOPPORTUNITIES_IDA',
        'width' => '10%',
        'default' => true,
        'name' => 'auto_tickets_opportunities_name',
      ),
      'auto_tickets_veta_presupuesto_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_AUTO_TICKETS_VETA_PRESUPUESTO_FROM_VETA_PRESUPUESTO_TITLE',
        'id' => 'AUTO_TICKETS_VETA_PRESUPUESTOVETA_PRESUPUESTO_IDA',
        'width' => '10%',
        'default' => true,
        'name' => 'auto_tickets_veta_presupuesto_name',
      ),
      'auto_tickets_veta_requerimiento_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_AUTO_TICKETS_VETA_REQUERIMIENTO_FROM_VETA_REQUERIMIENTO_TITLE',
        'id' => 'AUTO_TICKETS_VETA_REQUERIMIENTOVETA_REQUERIMIENTO_IDA',
        'width' => '10%',
        'default' => true,
        'name' => 'auto_tickets_veta_requerimiento_name',
      ),
      'auto_tickets_veta_recibo_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_AUTO_TICKETS_VETA_RECIBO_FROM_VETA_RECIBO_TITLE',
        'id' => 'AUTO_TICKETS_VETA_RECIBOVETA_RECIBO_IDA',
        'width' => '10%',
        'default' => true,
        'name' => 'auto_tickets_veta_recibo_name',
      ),
      'auto_tickets_veta_serviciocliente_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_AUTO_TICKETS_VETA_SERVICIOCLIENTE_FROM_VETA_SERVICIOCLIENTE_TITLE',
        'id' => 'AUTO_TICKETS_VETA_SERVICIOCLIENTEVETA_SERVICIOCLIENTE_IDA',
        'width' => '10%',
        'default' => true,
        'name' => 'auto_tickets_veta_serviciocliente_name',
      ),
      'current_user_only' => 
      array (
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'width' => '10%',
        'default' => true,
        'name' => 'current_user_only',
      ),
      'assigned_user_id' => 
      array (
        'name' => 'assigned_user_id',
        'label' => 'LBL_ASSIGNED_TO',
        'type' => 'enum',
        'function' => 
        array (
          'name' => 'get_user_array',
          'params' => 
          array (
            0 => false,
          ),
        ),
        'default' => true,
        'width' => '10%',
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'maxColumnsBasic' => '4',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
;
?>
