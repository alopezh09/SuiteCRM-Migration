<?php
// created: 2023-03-14 17:11:40
$dictionary["veta_visa_csche_cs_checklist_1"] = array (
  'true_relationship_type' => 'many-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'veta_visa_csche_cs_checklist_1' => 
    array (
      'lhs_module' => 'Veta_Visa',
      'lhs_table' => 'veta_visa',
      'lhs_key' => 'id',
      'rhs_module' => 'CSChe_CS_Checklist',
      'rhs_table' => 'csche_cs_checklist',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'veta_visa_csche_cs_checklist_1_c',
      'join_key_lhs' => 'veta_visa_csche_cs_checklist_1veta_visa_ida',
      'join_key_rhs' => 'veta_visa_csche_cs_checklist_1csche_cs_checklist_idb',
    ),
  ),
  'table' => 'veta_visa_csche_cs_checklist_1_c',
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
      'name' => 'veta_visa_csche_cs_checklist_1veta_visa_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'veta_visa_csche_cs_checklist_1csche_cs_checklist_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'veta_visa_csche_cs_checklist_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'veta_visa_csche_cs_checklist_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'veta_visa_csche_cs_checklist_1veta_visa_ida',
        1 => 'veta_visa_csche_cs_checklist_1csche_cs_checklist_idb',
      ),
    ),
  ),
);