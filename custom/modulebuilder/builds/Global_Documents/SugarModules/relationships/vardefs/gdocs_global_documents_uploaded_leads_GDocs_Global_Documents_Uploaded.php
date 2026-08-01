<?php
// created: 2023-04-17 22:58:09
$dictionary["GDocs_Global_Documents_Uploaded"]["fields"]["gdocs_global_documents_uploaded_leads"] = array (
  'name' => 'gdocs_global_documents_uploaded_leads',
  'type' => 'link',
  'relationship' => 'gdocs_global_documents_uploaded_leads',
  'source' => 'non-db',
  'module' => 'Leads',
  'bean_name' => 'Lead',
  'vname' => 'LBL_GDOCS_GLOBAL_DOCUMENTS_UPLOADED_LEADS_FROM_LEADS_TITLE',
  'id_name' => 'gdocs_global_documents_uploaded_leadsleads_ida',
);
$dictionary["GDocs_Global_Documents_Uploaded"]["fields"]["gdocs_global_documents_uploaded_leads_name"] = array (
  'name' => 'gdocs_global_documents_uploaded_leads_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GDOCS_GLOBAL_DOCUMENTS_UPLOADED_LEADS_FROM_LEADS_TITLE',
  'save' => true,
  'id_name' => 'gdocs_global_documents_uploaded_leadsleads_ida',
  'link' => 'gdocs_global_documents_uploaded_leads',
  'table' => 'leads',
  'module' => 'Leads',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["GDocs_Global_Documents_Uploaded"]["fields"]["gdocs_global_documents_uploaded_leadsleads_ida"] = array (
  'name' => 'gdocs_global_documents_uploaded_leadsleads_ida',
  'type' => 'link',
  'relationship' => 'gdocs_global_documents_uploaded_leads',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GDOCS_GLOBAL_DOCUMENTS_UPLOADED_LEADS_FROM_GDOCS_GLOBAL_DOCUMENTS_UPLOADED_TITLE',
);
