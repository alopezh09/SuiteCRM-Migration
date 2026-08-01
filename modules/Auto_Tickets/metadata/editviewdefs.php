<?php
$module_name = 'Auto_Tickets';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'assigned_user_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'auto_tickets_opportunities_name',
            'label' => 'LBL_AUTO_TICKETS_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
          ),
          1 => 
          array (
            'name' => 'auto_tickets_veta_presupuesto_name',
            'label' => 'LBL_AUTO_TICKETS_VETA_PRESUPUESTO_FROM_VETA_PRESUPUESTO_TITLE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'auto_tickets_veta_recibo_name',
            'label' => 'LBL_AUTO_TICKETS_VETA_RECIBO_FROM_VETA_RECIBO_TITLE',
          ),
          1 => 
          array (
            'name' => 'auto_tickets_veta_requerimiento_name',
            'label' => 'LBL_AUTO_TICKETS_VETA_REQUERIMIENTO_FROM_VETA_REQUERIMIENTO_TITLE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'auto_tickets_veta_serviciocliente_name',
            'label' => 'LBL_AUTO_TICKETS_VETA_SERVICIOCLIENTE_FROM_VETA_SERVICIOCLIENTE_TITLE',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
;
?>
