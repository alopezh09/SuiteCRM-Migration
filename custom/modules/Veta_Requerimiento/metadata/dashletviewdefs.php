<?php
$dashletData['Veta_RequerimientoDashlet']['searchFields'] = array (
  'name' => 
  array (
    'default' => '',
  ),
  'fuente' => 
  array (
    'default' => '',
  ),
  'estado' => 
  array (
    'default' => '',
  ),
  'date_entered' => 
  array (
    'default' => '',
  ),
  'fecha_proximo_contacto' => 
  array (
    'default' => '',
  ),
  'assigned_user_id' => 
  array (
    'default' => '',
  ),
);
$dashletData['Veta_RequerimientoDashlet']['columns'] = array (
  'name' => 
  array (
    'width' => '40%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'default' => true,
    'name' => 'name',
  ),
  'veta_requerimiento_leads_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_VETA_REQUERIMIENTO_LEADS_FROM_LEADS_TITLE',
    'id' => 'VETA_REQUERIMIENTO_LEADSLEADS_IDA',
    'width' => '10%',
    'default' => true,
    'name' => 'veta_requerimiento_leads_name',
  ),
  'estado' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_ESTADO',
    'width' => '10%',
    'name' => 'estado',
  ),
  'fecha_proximo_contacto' => 
  array (
    'type' => 'date',
    'label' => 'LBL_FECHA_PROXIMO_CONTACTO',
    'width' => '10%',
    'default' => true,
    'name' => 'fecha_proximo_contacto',
  ),
  'assigned_user_name' => 
  array (
    'width' => '8%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'name' => 'assigned_user_name',
    'default' => true,
  ),
  'fecha_ultimo_contacto' => 
  array (
    'type' => 'date',
    'label' => 'LBL_FECHA_ULTIMO_CONTACTO',
    'width' => '10%',
    'default' => false,
    'name' => 'fecha_ultimo_contacto',
  ),
  'veta_requerimiento_contacts_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_VETA_REQUERIMIENTO_CONTACTS_FROM_CONTACTS_TITLE',
    'id' => 'VETA_REQUERIMIENTO_CONTACTSCONTACTS_IDA',
    'width' => '10%',
    'default' => false,
    'name' => 'veta_requerimiento_contacts_name',
  ),
  'campana' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_CAMPANA',
    'id' => 'CAMPAIGN_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => false,
    'name' => 'campana',
  ),
  'main_aplicant_name' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_MAIN_APLICANT_NAME',
    'width' => '10%',
    'default' => false,
    'name' => 'main_aplicant_name',
  ),
  'secondary_pasport_number' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SECONDARY_PASPORT_NUMBER',
    'width' => '10%',
    'default' => false,
    'name' => 'secondary_pasport_number',
  ),
  'company_sbs_expiry_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_COMPANY_SBS_EXPIRY_DATE',
    'width' => '10%',
    'default' => false,
    'name' => 'company_sbs_expiry_date',
  ),
  'total_paid' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TOTAL_PAID',
    'width' => '10%',
    'default' => false,
    'name' => 'total_paid',
  ),
  'aplicant_company_mmm_fees' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_APLICANT_COMPANY_MMM_FEES',
    'width' => '10%',
    'default' => false,
    'name' => 'aplicant_company_mmm_fees',
  ),
  'ocupation' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_OCUPATION',
    'width' => '10%',
    'default' => false,
    'name' => 'ocupation',
  ),
  'consultation_fee' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CONSULTATION_FEE',
    'width' => '10%',
    'default' => false,
    'name' => 'consultation_fee',
  ),
  'third_dependent_name' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_THIRD_DEPENDENT_NAME',
    'width' => '10%',
    'default' => false,
    'name' => 'third_dependent_name',
  ),
  'total' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TOTAL',
    'width' => '10%',
    'default' => false,
    'name' => 'total',
  ),
  'aplicant_company_mmm' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_APLICANT_COMPANY_MMM',
    'width' => '10%',
    'default' => false,
    'name' => 'aplicant_company_mmm',
  ),
  'company_mmm_fee' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_COMPANY_MMM_FEE',
    'width' => '10%',
    'default' => false,
    'name' => 'company_mmm_fee',
  ),
  'aplicant_departments_visa_fee' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_APLICANT_DEPARTMENTS_VISA_FEE',
    'width' => '10%',
    'default' => false,
    'name' => 'aplicant_departments_visa_fee',
  ),
  'dependent_dob' => 
  array (
    'type' => 'date',
    'label' => 'LBL_DEPENDENT_DOB',
    'width' => '10%',
    'default' => false,
    'name' => 'dependent_dob',
  ),
  'dependent_name' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_DEPENDENT_NAME',
    'width' => '10%',
    'default' => false,
    'name' => 'dependent_name',
  ),
  'second_dependent_dob' => 
  array (
    'type' => 'date',
    'label' => 'LBL_SECOND_DEPENDENT_DOB',
    'width' => '10%',
    'default' => false,
    'name' => 'second_dependent_dob',
  ),
  'second_dependent_name' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SECOND_DEPENDENT_NAME',
    'width' => '10%',
    'default' => false,
    'name' => 'second_dependent_name',
  ),
  'aplicant_mmm_fee' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_APLICANT_MMM_FEE',
    'width' => '10%',
    'default' => false,
    'name' => 'aplicant_mmm_fee',
  ),
  'secondary_dob' => 
  array (
    'type' => 'date',
    'label' => 'LBL_SECONDARY_DOB',
    'width' => '10%',
    'default' => false,
    'name' => 'secondary_dob',
  ),
  'company_1st_payment_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_COMPANY_1ST_PAYMENT_DATE',
    'width' => '10%',
    'default' => false,
    'name' => 'company_1st_payment_date',
  ),
  'secondary_aplicant_name' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SECONDARY_APLICANT_NAME',
    'width' => '10%',
    'default' => false,
    'name' => 'secondary_aplicant_name',
  ),
  'company_first_payment_amount' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_COMPANY_FIRST_PAYMENT_AMOUNT',
    'width' => '10%',
    'default' => false,
    'name' => 'company_first_payment_amount',
  ),
  'phone_company' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PHONE_COMPANY',
    'width' => '10%',
    'default' => false,
    'name' => 'phone_company',
  ),
  'email_company' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_EMAIL_COMPANY',
    'width' => '10%',
    'default' => false,
    'name' => 'email_company',
  ),
  'company_industry' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_COMPANY_INDUSTRY',
    'width' => '10%',
    'default' => false,
    'name' => 'company_industry',
  ),
  'recluter_name' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_RECLUTER_NAME',
    'width' => '10%',
    'default' => false,
    'name' => 'recluter_name',
  ),
  'company_city' => 
  array (
    'type' => 'varchar',
    'label' => 'company_city',
    'width' => '10%',
    'default' => false,
    'name' => 'company_city',
  ),
  'migration_agent_name' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_MIGRATION_AGENT_NAME',
    'width' => '10%',
    'default' => false,
    'name' => 'migration_agent_name',
  ),
  'company_name' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_COMPANY_NAME',
    'width' => '10%',
    'default' => false,
    'name' => 'company_name',
  ),
  'leap_id' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_LEAP_ID',
    'width' => '10%',
    'default' => false,
    'name' => 'leap_id',
  ),
  'quote_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_QUOTE_DATE',
    'width' => '10%',
    'default' => false,
    'name' => 'quote_date',
  ),
  'cost_agrement_visa_subclass' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_COST_AGREMENT_VISA_SUBCLASS',
    'width' => '10%',
    'default' => false,
    'name' => 'cost_agrement_visa_subclass',
  ),
  'cost_agrement_number' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_COST_AGREMENT_NUMBER',
    'width' => '10%',
    'default' => false,
    'name' => 'cost_agrement_number',
  ),
  'potential_visa_subclass' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_POTENTIAL_VISA_SUBCLASS',
    'width' => '10%',
    'default' => false,
    'name' => 'potential_visa_subclass',
  ),
  'nationality' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_NATIONALITY',
    'width' => '10%',
    'default' => false,
    'name' => 'nationality',
  ),
  'level_of_english' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_LEVEL_OF_ENGLISH',
    'width' => '10%',
    'default' => false,
    'name' => 'level_of_english',
  ),
  'months_of_experience' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_MONTHS_OF_EXPERIENCEL',
    'width' => '10%',
    'default' => false,
    'name' => 'months_of_experience',
  ),
  'current_job_position' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CURRENT_JOB_POSITION',
    'width' => '10%',
    'default' => false,
    'name' => 'current_job_position',
  ),
  'industry_aplicant' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INDUSTRY_APLICANT',
    'width' => '10%',
    'default' => false,
    'name' => 'industry_aplicant',
  ),
  'consultation_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_CONSULTATION_DATE',
    'width' => '10%',
    'default' => false,
    'name' => 'consultation_date',
  ),
  'current_visa_subclass' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CURRENT_VISA_SUBCLASS',
    'width' => '10%',
    'default' => false,
    'name' => 'current_visa_subclass',
  ),
  'profession' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PROFESSION',
    'width' => '10%',
    'default' => false,
    'name' => 'profession',
  ),
  'applicant_first_payment_amount' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_APPLICANT_FIRST_PAYMENT_AMOUNT',
    'width' => '10%',
    'default' => false,
    'name' => 'applicant_first_payment_amount',
  ),
  'applicant_1st_payment_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_APPLICANT_1ST_PAYMENT_DATE',
    'width' => '10%',
    'default' => false,
    'name' => 'applicant_1st_payment_date',
  ),
  'date_entered' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => false,
    'name' => 'date_entered',
  ),
  'fuente' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_FUENTE',
    'width' => '10%',
    'default' => false,
    'name' => 'fuente',
  ),
  'date_modified' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_MODIFIED',
    'name' => 'date_modified',
    'default' => false,
  ),
  'created_by' => 
  array (
    'width' => '8%',
    'label' => 'LBL_CREATED',
    'name' => 'created_by',
    'default' => false,
  ),
  'fecha_viaje' => 
  array (
    'type' => 'date',
    'label' => 'LBL_FECHA_VIAJE',
    'width' => '10%',
    'default' => false,
    'name' => 'fecha_viaje',
  ),
  'visto_bueno_visas' => 
  array (
    'type' => 'bool',
    'default' => false,
    'label' => 'LBL_VISTO_BUENO_VISAS',
    'width' => '10%',
    'name' => 'visto_bueno_visas',
  ),
  'presupuesto' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PRESUPUESTO',
    'width' => '10%',
    'default' => false,
    'name' => 'presupuesto',
  ),
  'visto_bueno_comercial' => 
  array (
    'type' => 'bool',
    'default' => false,
    'label' => 'LBL_VISTO_BUENO_COMERCIAL',
    'width' => '10%',
    'name' => 'visto_bueno_comercial',
  ),
  'referido' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_REFERIDO',
    'width' => '10%',
    'default' => false,
    'name' => 'referido',
  ),
);
