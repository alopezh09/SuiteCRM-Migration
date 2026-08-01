<?php
$module_name='Veta_DetalleRecibo';
$subpanel_layout = array (
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateButton',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'popup_module' => 'Veta_DetalleRecibo',
    ),
  ),
  'where' => '',
  'list_fields' => 
  array (
    'name' => 
    array (
      'vname' => 'LBL_NAME',
      'widget_class' => 'SubPanelDetailViewLink',
      'width' => '45%',
      'default' => true,
    ),

     //Nuevo 
	  
	   'tipovisa' => 
    array (
      'type' => 'dynamicenum',
      'studio' => 'visible',
      'label' => 'LBL_TIPOVISA',
      'width' => '10%',
      'default' => true,
      'name' => 'tipovisa',
    ),
      'name_visaType' => 
      array (
        'type' => 'varchar',
        'studio' => 'visible',
        'label' => 'LBL_NAME_VISA_TYPE',
        'link' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'name_visaType',
      ),

      'description' => 
      array (
        'type' => 'text',
        'studio' => 'visible',
        'label' => 'LBL_DESCRIPTION',
        'link' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'description',
      ),
	  
    'edit_button' => 
    array (
      'vname' => 'LBL_EDIT_BUTTON',
      'widget_class' => 'SubPanelEditButton',
      'module' => 'Veta_DetalleRecibo',
      'width' => '4%',
      'default' => true,
    ),
  ),
);