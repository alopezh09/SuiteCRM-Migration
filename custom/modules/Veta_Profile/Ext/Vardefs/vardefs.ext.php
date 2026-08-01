<?php 
 //WARNING: The contents of this file are auto-generated


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


 // created: 2024-05-03 21:00:55
$dictionary['Veta_Profile']['fields']['consultation_notes_c']['inline_edit']='1';
$dictionary['Veta_Profile']['fields']['consultation_notes_c']['labelValue']='Consultation Notes';

 

 // created: 2024-05-03 21:10:02
$dictionary['Veta_Profile']['fields']['subclass']['options']='masterclass_subclass_list';

 

 // created: 2024-04-29 19:06:15
$dictionary['Veta_Profile']['fields']['description']['inline_edit']=true;
$dictionary['Veta_Profile']['fields']['description']['comments']='Full text of the note';
$dictionary['Veta_Profile']['fields']['description']['merge_filter']='disabled';

 
?>