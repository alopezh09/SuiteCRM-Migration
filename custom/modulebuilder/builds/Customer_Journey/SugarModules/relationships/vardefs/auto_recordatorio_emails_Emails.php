<?php
// created: 2025-03-05 17:24:22
$dictionary["Email"]["fields"]["auto_recordatorio_emails"] = array (
  'name' => 'auto_recordatorio_emails',
  'type' => 'link',
  'relationship' => 'auto_recordatorio_emails',
  'source' => 'non-db',
  'module' => 'Auto_Recordatorio',
  'bean_name' => 'Auto_Recordatorio',
  'vname' => 'LBL_AUTO_RECORDATORIO_EMAILS_FROM_AUTO_RECORDATORIO_TITLE',
  'id_name' => 'auto_recordatorio_emailsauto_recordatorio_ida',
);
$dictionary["Email"]["fields"]["auto_recordatorio_emails_name"] = array (
  'name' => 'auto_recordatorio_emails_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_AUTO_RECORDATORIO_EMAILS_FROM_AUTO_RECORDATORIO_TITLE',
  'save' => true,
  'id_name' => 'auto_recordatorio_emailsauto_recordatorio_ida',
  'link' => 'auto_recordatorio_emails',
  'table' => 'auto_recordatorio',
  'module' => 'Auto_Recordatorio',
  'rname' => 'name',
);
$dictionary["Email"]["fields"]["auto_recordatorio_emailsauto_recordatorio_ida"] = array (
  'name' => 'auto_recordatorio_emailsauto_recordatorio_ida',
  'type' => 'link',
  'relationship' => 'auto_recordatorio_emails',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_AUTO_RECORDATORIO_EMAILS_FROM_EMAILS_TITLE',
);
