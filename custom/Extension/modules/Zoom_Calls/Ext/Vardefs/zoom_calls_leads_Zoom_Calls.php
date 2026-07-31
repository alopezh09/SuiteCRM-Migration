<?php
// created: 2025-05-29 21:21:08
$dictionary["Zoom_Calls"]["fields"]["zoom_calls_leads"] = array (
  'name' => 'zoom_calls_leads',
  'type' => 'link',
  'relationship' => 'zoom_calls_leads',
  'source' => 'non-db',
  'module' => 'Leads',
  'bean_name' => 'Lead',
  'vname' => 'LBL_ZOOM_CALLS_LEADS_FROM_LEADS_TITLE',
  'id_name' => 'zoom_calls_leadsleads_ida',
);
$dictionary["Zoom_Calls"]["fields"]["zoom_calls_leads_name"] = array (
  'name' => 'zoom_calls_leads_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ZOOM_CALLS_LEADS_FROM_LEADS_TITLE',
  'save' => true,
  'id_name' => 'zoom_calls_leadsleads_ida',
  'link' => 'zoom_calls_leads',
  'table' => 'leads',
  'module' => 'Leads',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Zoom_Calls"]["fields"]["zoom_calls_leadsleads_ida"] = array (
  'name' => 'zoom_calls_leadsleads_ida',
  'type' => 'link',
  'relationship' => 'zoom_calls_leads',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_ZOOM_CALLS_LEADS_FROM_ZOOM_CALLS_TITLE',
);
