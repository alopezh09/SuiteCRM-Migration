<?php
$module_name = 'Doc_Documentos_Adic';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
  'DOCUMENT_COMMENTS' => 
  array (
    'vname' => 'LBL_DOCUMENT_COMMENT',
    'widget_class' => 'SubPanelQuickCreate',
    'editable' => true,
    'width' => '10%',
    'default' => false,
  ),
);
;
?>
