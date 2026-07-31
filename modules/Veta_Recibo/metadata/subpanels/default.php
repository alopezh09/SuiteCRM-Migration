<?php
$module_name='Veta_Recibo';
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
      'popup_module' => 'Veta_Recibo',
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
      //Label original
      //'label' => 'LBL_TIPOVISA',
      'label' => 'Visa Type',
      'width' => '10%',
      'default' => true,
      'name' => 'tipovisa',
    ),
      'name_visaType' => 
      array (
        'type' => 'varchar',
        'studio' => 'visible',
        //Label original
        //'label' => 'LBL_NAME_VISA_TYPE',
        'label' => 'Name Visa Type',
        'link' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'name_visaType',
      ),

      'description' => 
      array (
        'type' => 'text',
        'studio' => 'visible',
         //Label original
        //'label' => 'LBL_DESCRIPTION',
        'label' => 'Description',
        'link' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'description',
      ),

    
    'edit_button' => 
    array (
      'vname' => 'LBL_EDIT_BUTTON',
      'widget_class' => 'SubPanelEditButton',
      'module' => 'Veta_Recibo',
      'width' => '4%',
      'default' => true,
    ),
  ),
);