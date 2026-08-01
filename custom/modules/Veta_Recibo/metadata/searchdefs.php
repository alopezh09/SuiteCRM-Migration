<?php
$module_name = 'Veta_Recibo';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
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
      'tipo_visa' => 
      array (
        'type' => 'relate',
        'studio' => 'visible',
        'label' => 'LBL_TIPO_VISA',
        'id' => 'VETA_TIPOSVISA_ID_C',
        'link' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'tipo_visa',
      ),
      'veta_recibo_opportunities_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_VETA_RECIBO_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
        'id' => 'VETA_RECIBO_OPPORTUNITIESOPPORTUNITIES_IDB',
        'width' => '10%',
        'default' => true,
        'name' => 'veta_recibo_opportunities_name',
      ),
      'components' => 
      array (
        'type' => 'varchar',
        'studio' => 'visible',
        'label' => 'LBL_COMPONENT',
        'link' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'components',
      ),
      'concept' => 
      array (
        'type' => 'varchar',
        'studio' => 'visible',
        'label' => 'LBL_CONCEPT',
        'link' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'concept',
      ),
      'fee' => 
      array (
        'type' => 'varchar',
        'studio' => 'visible',
        'label' => 'LBL_FEE',
        'link' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'fee',
      ),
      'date_entered' => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_DATE_ENTERED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_entered',
      ),
      'created_by' => 
      array (
        'type' => 'assigned_user_name',
        'label' => 'LBL_CREATED',
        'width' => '10%',
        'default' => true,
        'name' => 'created_by',
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
