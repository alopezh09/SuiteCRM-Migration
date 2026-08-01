<?php
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
