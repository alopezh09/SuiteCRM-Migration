<?php
// created: 2023-04-17 22:58:09
$dictionary["GDocs_Global_Documents_Uploaded"]["fields"]["gdocs_global_documents_uploaded_nvc_companies"] = array (
  'name' => 'gdocs_global_documents_uploaded_nvc_companies',
  'type' => 'link',
  'relationship' => 'gdocs_global_documents_uploaded_nvc_companies',
  'source' => 'non-db',
  'module' => 'NVC_Companies',
  'bean_name' => 'NVC_Companies',
  'vname' => 'LBL_GDOCS_GLOBAL_DOCUMENTS_UPLOADED_NVC_COMPANIES_FROM_NVC_COMPANIES_TITLE',
  'id_name' => 'gdocs_global_documents_uploaded_nvc_companiesnvc_companies_ida',
);
$dictionary["GDocs_Global_Documents_Uploaded"]["fields"]["gdocs_global_documents_uploaded_nvc_companies_name"] = array (
  'name' => 'gdocs_global_documents_uploaded_nvc_companies_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GDOCS_GLOBAL_DOCUMENTS_UPLOADED_NVC_COMPANIES_FROM_NVC_COMPANIES_TITLE',
  'save' => true,
  'id_name' => 'gdocs_global_documents_uploaded_nvc_companiesnvc_companies_ida',
  'link' => 'gdocs_global_documents_uploaded_nvc_companies',
  'table' => 'nvc_companies',
  'module' => 'NVC_Companies',
  'rname' => 'name',
);
$dictionary["GDocs_Global_Documents_Uploaded"]["fields"]["gdocs_global_documents_uploaded_nvc_companiesnvc_companies_ida"] = array (
  'name' => 'gdocs_global_documents_uploaded_nvc_companiesnvc_companies_ida',
  'type' => 'link',
  'relationship' => 'gdocs_global_documents_uploaded_nvc_companies',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GDOCS_GLOBAL_DOCUMENTS_UPLOADED_NVC_COMPANIES_FROM_GDOCS_GLOBAL_DOCUMENTS_UPLOADED_TITLE',
);
