<?php
// created: 2022-02-03 23:11:13
$dictionary["veta_recibo_spay_schedule_payment_applicant_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'veta_recibo_spay_schedule_payment_applicant_1' => 
    array (
      'lhs_module' => 'Veta_Recibo',
      'lhs_table' => 'veta_recibo',
      'lhs_key' => 'id',
      'rhs_module' => 'Spay_Schedule_Payment_Applicant',
      'rhs_table' => 'spay_schedule_payment_applicant',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'veta_recibo_spay_schedule_payment_applicant_1_c',
      'join_key_lhs' => 'veta_recibo_spay_schedule_payment_applicant_1veta_recibo_ida',
      'join_key_rhs' => 'veta_recib5ff0plicant_idb',
    ),
  ),
  'table' => 'veta_recibo_spay_schedule_payment_applicant_1_c',
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
      'name' => 'veta_recibo_spay_schedule_payment_applicant_1veta_recibo_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'veta_recib5ff0plicant_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'veta_recibo_spay_schedule_payment_applicant_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'veta_recibo_spay_schedule_payment_applicant_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'veta_recibo_spay_schedule_payment_applicant_1veta_recibo_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'veta_recibo_spay_schedule_payment_applicant_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'veta_recib5ff0plicant_idb',
      ),
    ),
  ),
);