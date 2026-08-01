<?php
// created: 2023-01-16 03:09:34
$dictionary["Email"]["fields"]["auto_tickets_emails"] = array (
  'name' => 'auto_tickets_emails',
  'type' => 'link',
  'relationship' => 'auto_tickets_emails',
  'source' => 'non-db',
  'module' => 'Auto_Tickets',
  'bean_name' => 'Auto_Tickets',
  'vname' => 'LBL_AUTO_TICKETS_EMAILS_FROM_AUTO_TICKETS_TITLE',
  'id_name' => 'auto_tickets_emailsauto_tickets_ida',
);
$dictionary["Email"]["fields"]["auto_tickets_emails_name"] = array (
  'name' => 'auto_tickets_emails_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_AUTO_TICKETS_EMAILS_FROM_AUTO_TICKETS_TITLE',
  'save' => true,
  'id_name' => 'auto_tickets_emailsauto_tickets_ida',
  'link' => 'auto_tickets_emails',
  'table' => 'auto_tickets',
  'module' => 'Auto_Tickets',
  'rname' => 'name',
);
$dictionary["Email"]["fields"]["auto_tickets_emailsauto_tickets_ida"] = array (
  'name' => 'auto_tickets_emailsauto_tickets_ida',
  'type' => 'link',
  'relationship' => 'auto_tickets_emails',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_AUTO_TICKETS_EMAILS_FROM_EMAILS_TITLE',
);
