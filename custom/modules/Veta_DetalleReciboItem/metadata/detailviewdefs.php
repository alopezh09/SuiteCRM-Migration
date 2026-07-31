<?php
$module_name = 'Veta_DetalleReciboItem';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
          3 => 'FIND_DUPLICATES',
        ),
      ),
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
          0 => 'name',
          1 => 
          array (
            'name' => 'monto',
            'label' => 'LBL_MONTO',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'date_modified',
            'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
            'label' => 'LBL_DATE_MODIFIED',
          ),
          1 => 
          array (
            'name' => 'type_of_fee_c',
            'studio' => 'visible',
            'label' => 'LBL_TYPE_OF_FEE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'veta_detallereciboitem_veta_detallerecibo_name',
            'label' => 'LBL_VETA_DETALLERECIBOITEM_VETA_DETALLERECIBO_FROM_VETA_DETALLERECIBO_TITLE',
          ),
          1 => 
          array (
            'name' => 'veta_detallereciboitem_veta_recibo_name',
            'label' => 'LBL_VETA_DETALLERECIBOITEM_VETA_RECIBO_FROM_VETA_RECIBO_TITLE',
          ),
        ),
      ),
    ),
  ),
);
;
?>
