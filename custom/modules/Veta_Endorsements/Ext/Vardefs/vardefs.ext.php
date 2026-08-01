<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2024-07-03 18:26:04
$dictionary["Veta_Endorsements"]["fields"]["veta_endorsements_nvc_companies"] = array (
  'name' => 'veta_endorsements_nvc_companies',
  'type' => 'link',
  'relationship' => 'veta_endorsements_nvc_companies',
  'source' => 'non-db',
  'module' => 'NVC_Companies',
  'bean_name' => 'NVC_Companies',
  'vname' => 'LBL_VETA_ENDORSEMENTS_NVC_COMPANIES_FROM_NVC_COMPANIES_TITLE',
  'id_name' => 'veta_endorsements_nvc_companiesnvc_companies_ida',
);
$dictionary["Veta_Endorsements"]["fields"]["veta_endorsements_nvc_companies_name"] = array (
  'name' => 'veta_endorsements_nvc_companies_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VETA_ENDORSEMENTS_NVC_COMPANIES_FROM_NVC_COMPANIES_TITLE',
  'save' => true,
  'id_name' => 'veta_endorsements_nvc_companiesnvc_companies_ida',
  'link' => 'veta_endorsements_nvc_companies',
  'table' => 'nvc_companies',
  'module' => 'NVC_Companies',
  'rname' => 'name',
);
$dictionary["Veta_Endorsements"]["fields"]["veta_endorsements_nvc_companiesnvc_companies_ida"] = array (
  'name' => 'veta_endorsements_nvc_companiesnvc_companies_ida',
  'type' => 'link',
  'relationship' => 'veta_endorsements_nvc_companies',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VETA_ENDORSEMENTS_NVC_COMPANIES_FROM_VETA_ENDORSEMENTS_TITLE',
);


 // created: 2024-07-11 13:49:36
$dictionary['Veta_Endorsements']['fields']['visa_type']['options']='dama_visa_type_list';

 

 // created: 2024-07-03 20:18:59
$dictionary['Veta_Endorsements']['fields']['endorsement_date_c']['inline_edit']='1';
$dictionary['Veta_Endorsements']['fields']['endorsement_date_c']['labelValue']='Endorsement date';

 

 // created: 2024-07-11 13:46:40
$dictionary['Veta_Endorsements']['fields']['trn_c']['inline_edit']='1';
$dictionary['Veta_Endorsements']['fields']['trn_c']['labelValue']='TRN';

 

 // created: 2024-07-31 17:53:25
$dictionary['Veta_Endorsements']['fields']['region_c']['inline_edit']='1';
$dictionary['Veta_Endorsements']['fields']['region_c']['labelValue']='Region';

 
?>