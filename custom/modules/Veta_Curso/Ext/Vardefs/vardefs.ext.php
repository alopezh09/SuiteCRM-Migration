<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2022-12-27 17:54:17
$dictionary["Veta_Curso"]["fields"]["veta_curso_doc_plantillas_1"] = array (
  'name' => 'veta_curso_doc_plantillas_1',
  'type' => 'link',
  'relationship' => 'veta_curso_doc_plantillas_1',
  'source' => 'non-db',
  'module' => 'Doc_Plantillas',
  'bean_name' => 'Doc_Plantillas',
  'vname' => 'LBL_VETA_CURSO_DOC_PLANTILLAS_1_FROM_DOC_PLANTILLAS_TITLE',
);


// created: 2021-09-27 20:02:26
$dictionary["Veta_Curso"]["fields"]["veta_curso_veta_college_1"] = array (
  'name' => 'veta_curso_veta_college_1',
  'type' => 'link',
  'relationship' => 'veta_curso_veta_college_1',
  'source' => 'non-db',
  'module' => 'Veta_College',
  'bean_name' => 'Veta_College',
  'side' => 'right',
  'vname' => 'LBL_VETA_CURSO_VETA_COLLEGE_1_FROM_VETA_COLLEGE_TITLE',
);


// created: 2023-03-14 16:55:32
$dictionary["Veta_Curso"]["fields"]["veta_curso_csche_cs_checklist_1"] = array (
  'name' => 'veta_curso_csche_cs_checklist_1',
  'type' => 'link',
  'relationship' => 'veta_curso_csche_cs_checklist_1',
  'source' => 'non-db',
  'module' => 'CSChe_CS_Checklist',
  'bean_name' => 'CSChe_CS_Checklist',
  'vname' => 'LBL_VETA_CURSO_CSCHE_CS_CHECKLIST_1_FROM_CSCHE_CS_CHECKLIST_TITLE',
);




$dictionary[ 'Veta_Curso' ][ 'fields' ][ 'jornada' ][ 'type' ]    = 'enum';
$dictionary[ 'Veta_Curso' ][ 'fields' ][ 'jornada' ][ 'options' ] = 'jornada_list';
$dictionary[ 'Veta_Curso' ][ 'fields' ][ 'campus' ][ 'type' ]    = 'enum';
$dictionary[ 'Veta_Curso' ][ 'fields' ][ 'campus' ][ 'options' ] = 'ciudades_list';


$dictionary['Veta_Curso']['fields']['tipovisa']['options']='tipo_visa_list';

 // created: 2023-05-11 21:45:34
$dictionary['Veta_Curso']['fields']['turnover_c']['inline_edit']='1';
$dictionary['Veta_Curso']['fields']['turnover_c']['labelValue']='Turnover';

 

 // created: 2023-05-18 18:22:12
$dictionary['Veta_Curso']['fields']['tipo_curso']['massupdate']=0;

 

 // created: 2021-10-14 20:53:00

 

 // created: 2024-04-17 22:17:42
$dictionary['Veta_Curso']['fields']['visa_subclass_required_c']['inline_edit']='';
$dictionary['Veta_Curso']['fields']['visa_subclass_required_c']['labelValue']='Visa Subclass Required';

 

 // created: 2023-11-15 01:45:02
$dictionary['Veta_Curso']['fields']['subclass_c']['inline_edit']='1';
$dictionary['Veta_Curso']['fields']['subclass_c']['labelValue']='Subclass';

 

 // created: 2023-11-15 02:40:52
$dictionary['Veta_Curso']['fields']['process_type_c']['inline_edit']='1';
$dictionary['Veta_Curso']['fields']['process_type_c']['labelValue']='Process Type';

 

 // created: 2024-01-31 21:24:50
$dictionary['Veta_Curso']['fields']['name']['audited']=true;
$dictionary['Veta_Curso']['fields']['name']['inline_edit']=true;
$dictionary['Veta_Curso']['fields']['name']['duplicate_merge']='disabled';
$dictionary['Veta_Curso']['fields']['name']['duplicate_merge_dom_value']='0';
$dictionary['Veta_Curso']['fields']['name']['merge_filter']='disabled';
$dictionary['Veta_Curso']['fields']['name']['unified_search']=false;

 

 // created: 2023-05-18 17:16:29
$dictionary['Veta_Curso']['fields']['processes_c']['inline_edit']='1';
$dictionary['Veta_Curso']['fields']['processes_c']['labelValue']='Processes';

 

 // created: 2022-11-17 01:14:15
$dictionary['Veta_Curso']['fields']['is_consultation_fee_c']['inline_edit']='1';
$dictionary['Veta_Curso']['fields']['is_consultation_fee_c']['labelValue']='Is Consultation Fee';

 

 // created: 2023-11-15 01:44:39

 

 // created: 2023-05-16 22:07:19
$dictionary['Veta_Curso']['fields']['display_name_c']['inline_edit']='1';
$dictionary['Veta_Curso']['fields']['display_name_c']['labelValue']='Display Name';

 

 // created: 2021-10-14 20:52:09
$dictionary['Veta_Curso']['fields']['terms_and_conditions_company_c']['inline_edit']='';
$dictionary['Veta_Curso']['fields']['terms_and_conditions_company_c']['labelValue']='Company Terms and conditions';

 
?>