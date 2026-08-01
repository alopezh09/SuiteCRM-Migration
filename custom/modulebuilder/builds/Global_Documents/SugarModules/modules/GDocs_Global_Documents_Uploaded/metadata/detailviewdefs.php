<?php
$module_name = 'GDocs_Global_Documents_Uploaded';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
          3 => 'FIND_DUPLICATES',
        ),
      ),
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 'assigned_user_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'document_for',
            'studio' => 'visible',
            'label' => 'LBL_DOCUMENT_FOR',
          ),
          1 => 
          array (
            'name' => 'file_url',
            'label' => 'LBL_FILE_URL',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'onedrive_folder',
            'label' => 'LBL_ONEDRIVE_FOLDER',
          ),
          1 => 
          array (
            'name' => 'gdocs_global_documents_uploaded_leads_name',
            'label' => 'LBL_GDOCS_GLOBAL_DOCUMENTS_UPLOADED_LEADS_FROM_LEADS_TITLE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'gdocs_global_documents_uploaded_nvc_companies_name',
            'label' => 'LBL_GDOCS_GLOBAL_DOCUMENTS_UPLOADED_NVC_COMPANIES_FROM_NVC_COMPANIES_TITLE',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => '',
          1 => '',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'date_entered',
            'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
            'label' => 'LBL_DATE_ENTERED',
          ),
          1 => 
          array (
            'name' => 'date_modified',
            'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
            'label' => 'LBL_DATE_MODIFIED',
          ),
        ),
        6 => 
        array (
          0 => 'description',
        ),
      ),
    ),
  ),
);
;
?>
