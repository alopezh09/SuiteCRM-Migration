<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2021-12-13 16:27:10
$dictionary["Veta_College"]["fields"]["veta_recibo_veta_college_1"] = array (
  'name' => 'veta_recibo_veta_college_1',
  'type' => 'link',
  'relationship' => 'veta_recibo_veta_college_1',
  'source' => 'non-db',
  'module' => 'Veta_Recibo',
  'bean_name' => 'Veta_Recibo',
  'vname' => 'LBL_VETA_RECIBO_VETA_COLLEGE_1_FROM_VETA_RECIBO_TITLE',
  'id_name' => 'veta_recibo_veta_college_1veta_recibo_ida',
);
$dictionary["Veta_College"]["fields"]["veta_recibo_veta_college_1_name"] = array (
  'name' => 'veta_recibo_veta_college_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VETA_RECIBO_VETA_COLLEGE_1_FROM_VETA_RECIBO_TITLE',
  'save' => true,
  'id_name' => 'veta_recibo_veta_college_1veta_recibo_ida',
  'link' => 'veta_recibo_veta_college_1',
  'table' => 'veta_recibo',
  'module' => 'Veta_Recibo',
  'rname' => 'name',
);
$dictionary["Veta_College"]["fields"]["veta_recibo_veta_college_1veta_recibo_ida"] = array (
  'name' => 'veta_recibo_veta_college_1veta_recibo_ida',
  'type' => 'link',
  'relationship' => 'veta_recibo_veta_college_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VETA_RECIBO_VETA_COLLEGE_1_FROM_VETA_COLLEGE_TITLE',
);


// created: 2021-09-27 20:02:26
$dictionary["Veta_College"]["fields"]["veta_curso_veta_college_1"] = array (
  'name' => 'veta_curso_veta_college_1',
  'type' => 'link',
  'relationship' => 'veta_curso_veta_college_1',
  'source' => 'non-db',
  'module' => 'Veta_Curso',
  'bean_name' => 'Veta_Curso',
  'vname' => 'LBL_VETA_CURSO_VETA_COLLEGE_1_FROM_VETA_CURSO_TITLE',
  'id_name' => 'veta_curso_veta_college_1veta_curso_ida',
);
$dictionary["Veta_College"]["fields"]["veta_curso_veta_college_1_name"] = array (
  'name' => 'veta_curso_veta_college_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VETA_CURSO_VETA_COLLEGE_1_FROM_VETA_CURSO_TITLE',
  'save' => true,
  'id_name' => 'veta_curso_veta_college_1veta_curso_ida',
  'link' => 'veta_curso_veta_college_1',
  'table' => 'veta_curso',
  'module' => 'Veta_Curso',
  'rname' => 'name',
);
$dictionary["Veta_College"]["fields"]["veta_curso_veta_college_1veta_curso_ida"] = array (
  'name' => 'veta_curso_veta_college_1veta_curso_ida',
  'type' => 'link',
  'relationship' => 'veta_curso_veta_college_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VETA_CURSO_VETA_COLLEGE_1_FROM_VETA_COLLEGE_TITLE',
);


 // created: 2024-09-18 12:40:01
$dictionary['Veta_College']['fields']['process_type_c']['inline_edit']='1';
$dictionary['Veta_College']['fields']['process_type_c']['labelValue']='Process Type';

 

 // created: 2021-11-18 23:41:49
$dictionary['Veta_College']['fields']['type_of_fee_c']['inline_edit']='1';
$dictionary['Veta_College']['fields']['type_of_fee_c']['labelValue']='Type of Fee';

 

 // created: 2021-10-14 15:37:51
$dictionary['Veta_College']['fields']['company_fee_c']['inline_edit']='1';
$dictionary['Veta_College']['fields']['company_fee_c']['labelValue']='Company Fee';

 

 // created: 2024-09-25 22:06:56
$dictionary['Veta_College']['fields']['fee']['required']=true;

 

 // created: 2022-02-17 19:19:17
$dictionary['Veta_College']['fields']['apply_gst_c']['inline_edit']='1';
$dictionary['Veta_College']['fields']['apply_gst_c']['labelValue']='Apply GST';

 

 // created: 2021-09-15 22:24:12
$dictionary['Veta_College']['fields']['tipovisa']['options']='tipo_visa_list';

 

 // created: 2021-10-14 15:30:39
$dictionary['Veta_College']['fields']['currency_id']['inline_edit']=1;

 
?>