<?php
// created: 2023-01-16 03:09:34
$dictionary["auto_tickets_emails"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'auto_tickets_emails' => 
    array (
      'lhs_module' => 'Auto_Tickets',
      'lhs_table' => 'auto_tickets',
      'lhs_key' => 'id',
      'rhs_module' => 'Emails',
      'rhs_table' => 'emails',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'auto_tickets_emails_c',
      'join_key_lhs' => 'auto_tickets_emailsauto_tickets_ida',
      'join_key_rhs' => 'auto_tickets_emailsemails_idb',
    ),
  ),
  'table' => 'auto_tickets_emails_c',
  'fields' => 
  array (
    0 => 
    array (
      'name' => 'id',
      'type' => 'varchar',
      'len' => 36,
    ),
    1 => 
    array (
      'name' => 'date_modified',
      'type' => 'datetime',
    ),
    2 => 
    array (
      'name' => 'deleted',
      'type' => 'bool',
      'len' => '1',
      'default' => '0',
      'required' => true,
    ),
    3 => 
    array (
      'name' => 'auto_tickets_emailsauto_tickets_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'auto_tickets_emailsemails_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'auto_tickets_emailsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'auto_tickets_emails_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'auto_tickets_emailsauto_tickets_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'auto_tickets_emails_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'auto_tickets_emailsemails_idb',
      ),
    ),
  ),
);