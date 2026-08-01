<?php
$module_name = 'Auto_Tickets';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
  'STATUS' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_STATUS',
    'width' => '10%',
    'default' => true,
  ),
  'DATE_SENT' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_DATE_SENT',
    'width' => '10%',
    'default' => true,
  ),
  'LAST_ANSWERED' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_LAST_ANSWERED',
    'width' => '10%',
    'default' => true,
  ),
  'AUTO_TICKETS_OPPORTUNITIES_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_AUTO_TICKETS_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
    'id' => 'AUTO_TICKETS_OPPORTUNITIESOPPORTUNITIES_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'AUTO_TICKETS_VETA_REQUERIMIENTO_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_AUTO_TICKETS_VETA_REQUERIMIENTO_FROM_VETA_REQUERIMIENTO_TITLE',
    'id' => 'AUTO_TICKETS_VETA_REQUERIMIENTOVETA_REQUERIMIENTO_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'AUTO_TICKETS_VETA_PRESUPUESTO_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_AUTO_TICKETS_VETA_PRESUPUESTO_FROM_VETA_PRESUPUESTO_TITLE',
    'id' => 'AUTO_TICKETS_VETA_PRESUPUESTOVETA_PRESUPUESTO_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'AUTO_TICKETS_VETA_RECIBO_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_AUTO_TICKETS_VETA_RECIBO_FROM_VETA_RECIBO_TITLE',
    'id' => 'AUTO_TICKETS_VETA_RECIBOVETA_RECIBO_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'AUTO_TICKETS_VETA_SERVICIOCLIENTE_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_AUTO_TICKETS_VETA_SERVICIOCLIENTE_FROM_VETA_SERVICIOCLIENTE_TITLE',
    'id' => 'AUTO_TICKETS_VETA_SERVICIOCLIENTEVETA_SERVICIOCLIENTE_IDA',
    'width' => '10%',
    'default' => true,
  ),
);
;
?>
