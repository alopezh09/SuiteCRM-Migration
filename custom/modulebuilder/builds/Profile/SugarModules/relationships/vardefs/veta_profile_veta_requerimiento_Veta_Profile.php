<?php
// created: 2024-04-24 16:01:00
$dictionary["Veta_Profile"]["fields"]["veta_profile_veta_requerimiento"] = array (
  'name' => 'veta_profile_veta_requerimiento',
  'type' => 'link',
  'relationship' => 'veta_profile_veta_requerimiento',
  'source' => 'non-db',
  'module' => 'Veta_Requerimiento',
  'bean_name' => 'Veta_Requerimiento',
  'vname' => 'LBL_VETA_PROFILE_VETA_REQUERIMIENTO_FROM_VETA_REQUERIMIENTO_TITLE',
  'id_name' => 'veta_profile_veta_requerimientoveta_requerimiento_ida',
);
$dictionary["Veta_Profile"]["fields"]["veta_profile_veta_requerimiento_name"] = array (
  'name' => 'veta_profile_veta_requerimiento_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VETA_PROFILE_VETA_REQUERIMIENTO_FROM_VETA_REQUERIMIENTO_TITLE',
  'save' => true,
  'id_name' => 'veta_profile_veta_requerimientoveta_requerimiento_ida',
  'link' => 'veta_profile_veta_requerimiento',
  'table' => 'veta_requerimiento',
  'module' => 'Veta_Requerimiento',
  'rname' => 'name',
);
$dictionary["Veta_Profile"]["fields"]["veta_profile_veta_requerimientoveta_requerimiento_ida"] = array (
  'name' => 'veta_profile_veta_requerimientoveta_requerimiento_ida',
  'type' => 'link',
  'relationship' => 'veta_profile_veta_requerimiento',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VETA_PROFILE_VETA_REQUERIMIENTO_FROM_VETA_PROFILE_TITLE',
);
