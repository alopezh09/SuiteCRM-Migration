<?php 
 //WARNING: The contents of this file are auto-generated


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


 // created: 2024-04-08 16:35:12
$dictionary['GDocs_Global_Documents_Uploaded']['fields']['lead_c']['inline_edit']='1';
$dictionary['GDocs_Global_Documents_Uploaded']['fields']['lead_c']['labelValue']='lead';

 

 // created: 2024-04-08 16:36:11
$dictionary['GDocs_Global_Documents_Uploaded']['fields']['doc_documentos_id_c']['inline_edit']=1;

 

 // created: 2024-04-08 16:36:32
$dictionary['GDocs_Global_Documents_Uploaded']['fields']['nvc_companies_id_c']['inline_edit']=1;

 

 // created: 2024-04-08 16:35:12
$dictionary['GDocs_Global_Documents_Uploaded']['fields']['lead_id_c']['inline_edit']=1;

 

 // created: 2024-04-08 16:36:11
$dictionary['GDocs_Global_Documents_Uploaded']['fields']['doc_document_c']['inline_edit']='1';
$dictionary['GDocs_Global_Documents_Uploaded']['fields']['doc_document_c']['labelValue']='doc document';

 

 // created: 2024-04-08 16:34:26
$dictionary['GDocs_Global_Documents_Uploaded']['fields']['ms_id_c']['inline_edit']='1';
$dictionary['GDocs_Global_Documents_Uploaded']['fields']['ms_id_c']['labelValue']='ms id';

 

 // created: 2024-04-08 16:36:32
$dictionary['GDocs_Global_Documents_Uploaded']['fields']['company_c']['inline_edit']='1';
$dictionary['GDocs_Global_Documents_Uploaded']['fields']['company_c']['labelValue']='company';

 
?>