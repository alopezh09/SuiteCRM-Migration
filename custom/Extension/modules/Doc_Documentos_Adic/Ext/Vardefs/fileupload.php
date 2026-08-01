<?php
$dictionary['Doc_Documentos_Adic']['fields']['filename']=array(
    'name' => 'filename',
    'vname' => 'LBL_FILENAME',
    'type' => 'varchar',
    'required'=>true,
    'importable' => 'required',
    'len' => '255',
    'studio' => 'false',
);
$dictionary['Doc_Documentos_Adic']['fields']['file_ext']=array(
    'name' => 'file_ext',
    'vname' => 'LBL_FILE_EXTENSION',
    'type' => 'varchar',
    'len' => 100,
);
$dictionary['Doc_Documentos_Adic']['fields']['file_mime_type']=array(
    'name' => 'file_mime_type',
    'vname' => 'LBL_MIME',
    'type' => 'varchar',
    'len' => '100',
);
$dictionary['Doc_Documentos_Adic']['fields']['uploadfile']=array(
    'name'=>'uploadfile',
    'vname' => 'LBL_FILE_UPLOAD',
    'type' => 'file',
    'len' => '255',
    'dbType' => 'varchar',
); 