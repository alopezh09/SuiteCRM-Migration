<?php
$module_name='Veta_Presupuesto';
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
      'popup_module' => 'Veta_Presupuesto',
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
   
    'tipo_visa' => 
    array (
      'type' => 'relate',
      'studio' => 'visible',
      'vname' => 'LBL_TIPO_VISA',
      'id' => 'VETA_TIPOSVISA_ID_C',
      'link' => true,
      'width' => '10%',
      'default' => true,
      'widget_class' => 'SubPanelDetailViewLink',
      'target_module' => 'Veta_TiposVisa',
      'target_record_key' => 'veta_tiposvisa_id_c',
    ),
    'total_visa' => 
    array (
      'type' => 'currency',
      'default' => true,
      'vname' => 'LBL_TOTAL_VISA',
      'currency_format' => true,
      'width' => '10%',
    ),

     //Nuevo 
	   
	 
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
      'module' => 'Veta_Presupuesto',
      'width' => '4%',
      'default' => true,
    ),
  ),
);