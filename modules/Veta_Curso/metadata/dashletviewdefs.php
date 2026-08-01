<?php
$dashletData['Veta_CursoDashlet']['searchFields'] = array (
  'name' => 
  array (
    'default' => '',
  ),
  'college' => 
  array (
    'default' => '',
  ), 
);
$dashletData['Veta_CursoDashlet']['columns'] = array (
  'name' => 
  array (
    'width' => '40%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'default' => true,
    'name' => 'name',
  ),
  'college' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_COLLEGE',
    'id' => 'VETA_COLLEGE_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'name' => 'college',
  ),
  'date_entered' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => true,
    'name' => 'date_entered',
  ),
  'deposito' => 
  array (
    'type' => 'currency',
    'default' => false,
    'label' => 'LBL_DEPOSITO',
    'currency_format' => true,
    'width' => '10%',
    'name' => 'deposito',
  ),
  'costo_extra' => 
  array (
    'type' => 'currency',
    'default' => false,
    'label' => 'LBL_COSTO_EXTRA',
    'currency_format' => true,
    'width' => '10%',
    'name' => 'costo_extra',
  ),
  'costo_materiales' => 
  array (
    'type' => 'currency',
    'default' => false,
    'label' => 'LBL_COSTO_MATERIALES',
    'currency_format' => true,
    'width' => '10%',
    'name' => 'costo_materiales',
  ),
  'inscripcion' => 
  array (
    'type' => 'currency',
    'default' => false,
    'label' => 'LBL_INSCRIPCION',
    'currency_format' => true,
    'width' => '10%',
    'name' => 'inscripcion',
  ),
  'duracion' => 
  array (
    'type' => 'int',
    'label' => 'LBL_DURACION',
    'width' => '10%',
    'default' => false,
    'name' => 'duracion',
  ),
  'intake' => 
  array (
    'type' => 'date',
    'label' => 'LBL_INTAKE',
    'width' => '10%',
    'default' => false,
    'name' => 'intake',
  ),
  'pps' => 
  array (
    'type' => 'currency',
    'default' => false,
    'label' => 'LBL_PPS',
    'currency_format' => true,
    'width' => '10%',
    'name' => 'pps',
  ),

  //Nuevo 

  'tipovisa' => 
  array (
    'required' => false,
    'name' => 'tipovisa',
    'vname' => 'LBL_TIPOVISA',
    'id' => 'VETA_TIPOSVISA_ID_C',
    'type' => 'varchar',
    'massupdate' => 0,
    'no_default' => false,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => true,
    'inline_edit' => '',
    'reportable' => true,
    'unified_search' => false,
    'merge_filter' => 'disabled',
    'len' => '255',
    'size' => '20',
  ),

  'name_visatype' => 
  array (
    'required' => false,
    'name' => 'name_visatype',
    'vname' => 'LBL_NAME_VISA_TYPE',
    'type' => 'varchar',
    'massupdate' => 0,
    'no_default' => false,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => true,
    'inline_edit' => '',
    'reportable' => true,
    'unified_search' => false,
    'merge_filter' => 'disabled',
    'len' => '255',
    'size' => '20',
  ),
  'description' => 
  array (
    'name' => 'description',
    'vname' => 'LBL_DESCRIPTION',
    'type' => 'text',
    'comment' => 'Full text of the note',
    'rows' => '6',
    'cols' => '80',
    'required' => false,
    'massupdate' => 0,
    'no_default' => false,
    'comments' => 'Full text of the note',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => true,
    'inline_edit' => '',
    'reportable' => true,
    'unified_search' => false,
    'merge_filter' => 'disabled',
    'size' => '20',
    'studio' => 'visible',
  ),
);
