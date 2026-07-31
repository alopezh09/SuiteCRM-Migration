<?php
/*
$dictionary['Doc_Documentos_Adic']['fields']['document_comment_c']=array( 
    'name' => 'document_comment_c',
    'vname' => 'LBL_DOCUMENT_COMMENT',
    'type' => 'text',
    'required'=>true,
    'importable' => 'required',
    'len' => '255',
    //'studio' => 'false',
	'studio' => true,
);
*/
$dictionary['Doc_Documentos_Adic']['fields']['document_comment_c'] = array(
    'name' => 'document_comment_c',
    'vname' => 'LBL_DOCUMENT_COMMENT',
    'type' => 'varchar',
    'len' => '255',
	'inline_edit' => true,   
    'studio' => array(
        'editview' => false,
        'detailview' => false,
        'quickcreate' => false,
    ),
); 
