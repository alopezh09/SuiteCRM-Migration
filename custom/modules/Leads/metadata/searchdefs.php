<?php
$searchdefs ['Leads'] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'search_name' => 
      array (
        'name' => 'search_name',
        'label' => 'LBL_NAME',
        'type' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'pasaporte_c' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_PASAPORTE',
        'width' => '10%',
        'name' => 'pasaporte_c',
      ),
      'current_user_only' => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
      ),
      'open_only' => 
      array (
        'name' => 'open_only',
        'label' => 'LBL_OPEN_ITEMS',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
      ),
      'favorites_only' => 
      array (
        'name' => 'favorites_only',
        'label' => 'LBL_FAVORITES_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
      ),
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'type' => 'name',
        'link' => true,
        'label' => 'LBL_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'name',
      ),
      'pasaporte_c' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_PASAPORTE',
        'width' => '10%',
        'name' => 'pasaporte_c',
      ),
      'visa_c' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_VISA',
        'width' => '10%',
        'name' => 'visa_c',
      ),
      'email' => 
      array (
        'name' => 'email',
        'label' => 'LBL_ANY_EMAIL',
        'type' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'phone' => 
      array (
        'name' => 'phone',
        'label' => 'LBL_ANY_PHONE',
        'type' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'created_by' => 
      array (
        'type' => 'assigned_user_name',
        'label' => 'LBL_CREATED',
        'width' => '10%',
        'default' => true,
        'name' => 'created_by',
      ),
      'job_is_active_c' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_JOB_IS_ACTIVE',
        'width' => '10%',
        'name' => 'job_is_active_c',
      ),
      'status' => 
      array (
        'name' => 'status',
        'default' => true,
        'width' => '10%',
      ),
      'pais_c' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PAIS',
        'width' => '10%',
        'name' => 'pais_c',
      ),
      'departamento_c' => 
      array (
        'type' => 'dynamicenum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_DEPARTAMENTO',
        'width' => '10%',
        'name' => 'departamento_c',
      ),
      'ciudad_c' => 
      array (
        'type' => 'dynamicenum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_CIUDAD',
        'width' => '10%',
        'name' => 'ciudad_c',
      ),
      'soel_oficina_comercial' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_SOEL_OFICINA_COMERCIAL',
        'width' => '10%',
        'name' => 'soel_oficina_comercial',
        'sortable' => false,
      ),
      'assigned_user_id' => 
      array (
        'name' => 'assigned_user_id',
        'type' => 'enum',
        'label' => 'LBL_ASSIGNED_TO',
        'function' => 
        array (
          'name' => 'get_user_array',
          'params' => 
          array (
            0 => false,
          ),
        ),
        'default' => true,
        'width' => '10%',
      ),
      'industry_aplicant' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_INDUSTRY_APLICANT',
        'width' => '10%',
        'name' => 'industry_aplicant',
        'sortable' => false,
      ),
      'aplicant_first_payment_amount' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_APPLICANT_FIRST_PAYMENT_AMOUNT',
        'width' => '10%',
        'name' => 'aplicant_first_payment_amount',
        'sortable' => false,
      ),
      'profession' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_PROFESSION',
        'width' => '10%',
        'name' => 'profession',
        'sortable' => false,
      ),
      'current_visa_subclass' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_CURRENT_VISA_SUBCLASS',
        'width' => '10%',
        'name' => 'current_visa_subclass',
        'sortable' => false,
      ),
      'current_job_position' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_CURRENT_JOB_POSITION',
        'width' => '10%',
        'name' => 'current_job_position',
        'sortable' => false,
      ),
      'month_of_experience' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_MONTHS_OF_EXPERIENCEL',
        'width' => '10%',
        'name' => 'month_of_experience',
        'sortable' => false,
      ),
      'level_of_english' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_LEVEL_OF_ENGLISH',
        'width' => '10%',
        'name' => 'level_of_english',
        'sortable' => false,
      ),
      'nationality' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_NATIONALITY',
        'width' => '10%',
        'name' => 'nationality',
        'sortable' => false,
      ),
      'potential_visa_subclass' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_POTENTIAL_VISA_SUBCLASS',
        'width' => '10%',
        'name' => 'potential_visa_subclass',
        'sortable' => false,
      ),
      'cost_agrement_number' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_COST_AGREMENT_NUMBER',
        'width' => '10%',
        'name' => 'cost_agrement_number',
        'sortable' => false,
      ),
      'cost_agrement_visa_subclass' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_COST_AGREMENT_VISA_SUBCLASS',
        'width' => '10%',
        'name' => 'cost_agrement_visa_subclass',
        'sortable' => false,
      ),
      'migration_agent_name' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_MIGRATION_AGENT_NAME',
        'width' => '10%',
        'name' => 'migration_agent_name',
        'sortable' => false,
      ),
      'leap_id' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_LEAP_ID',
        'width' => '10%',
        'name' => 'leap_id',
        'sortable' => false,
      ),
      'recluter_name' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_RECLUTER_NAME',
        'width' => '10%',
        'name' => 'recluter_name',
        'sortable' => false,
      ),
      'company_name' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_COMPANY_NAME',
        'width' => '10%',
        'name' => 'company_name',
        'sortable' => false,
      ),
      'company_city' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_COMPANY_CITY',
        'width' => '10%',
        'name' => 'company_city',
        'sortable' => false,
      ),
      'company_industry' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_COMPANY_INDUSTRY',
        'width' => '10%',
        'name' => 'company_industry',
        'sortable' => false,
      ),
      'email_company' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_EMAIL_COMPANY',
        'width' => '10%',
        'name' => 'email_company',
        'sortable' => false,
      ),
      'phone_company' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_PHONE_COMPANY',
        'width' => '10%',
        'name' => 'phone_company',
        'sortable' => false,
      ),
      'company_first_payment_amount' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_COMPANY_FIRST_PAYMENT_AMOUNT',
        'width' => '10%',
        'name' => 'company_first_payment_amount',
        'sortable' => false,
      ),
      'secondary_aplicant_name' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_SECONDARY_APLICANT_NAME',
        'width' => '10%',
        'name' => 'secondary_aplicant_name',
        'sortable' => false,
      ),
      'secondary_pasport_number' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_SECONDARY_PASPORT_NUMBER',
        'width' => '10%',
        'name' => 'secondary_pasport_number',
        'sortable' => false,
      ),
      'dependent_name' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_DEPENDENT_NAME',
        'width' => '10%',
        'name' => 'dependent_name',
        'sortable' => false,
      ),
      'aplicant_mmm_fee' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_APLICANT_MMM_FEE',
        'width' => '10%',
        'name' => 'aplicant_mmm_fee',
        'sortable' => false,
      ),
      'second_dependent_name' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_SECOND_DEPENDENT_NAME',
        'width' => '10%',
        'name' => 'second_dependent_name',
        'sortable' => false,
      ),
      'third_dependent_name' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_THIRD_DEPENDENT_NAME',
        'width' => '10%',
        'name' => 'third_dependent_name',
        'sortable' => false,
      ),
      'consultation_fee' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_CONSULTATION_FEE',
        'width' => '10%',
        'name' => 'consultation_fee',
        'sortable' => false,
      ),
      'aplicant_departments_visa_fee' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_APLICANT_DEPARTMENTS_VISA_FEE',
        'width' => '10%',
        'name' => 'aplicant_departments_visa_fee',
        'sortable' => false,
      ),
      'company_mmm_fee' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_COMPANY_MMM_FEE',
        'width' => '10%',
        'name' => 'company_mmm_fee',
        'sortable' => false,
      ),
      'aplicant_company_mmm' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_APLICANT_COMPANY_MMM',
        'width' => '10%',
        'name' => 'aplicant_company_mmm',
        'sortable' => false,
      ),
      'total' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_TOTAL',
        'width' => '10%',
        'name' => 'total',
        'sortable' => false,
      ),
      'aplicant_company_mmm_fees' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_APLICANT_COMPANY_MMM_FEES',
        'width' => '10%',
        'name' => 'aplicant_company_mmm_fees',
        'sortable' => false,
      ),
      'total_paid' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_TOTAL_PAID',
        'width' => '10%',
        'name' => 'total_paid',
        'sortable' => false,
      ),
      'ocupation' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_OCUPATION',
        'width' => '10%',
        'name' => 'ocupation',
        'sortable' => false,
      ),
      'main_aplicant_name' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_MAIN_APLICANT_NAME',
        'width' => '10%',
        'name' => 'main_aplicant_name',
        'sortable' => false,
      ),
      'fecha_expiracion_visa_c' => 
      array (
        'type' => 'datetimecombo',
        'default' => true,
        'label' => 'LBL_FECHA_EXPIRACION_VISA',
        'width' => '10%',
        'name' => 'fecha_expiracion_visa_c',
      ),
      'date_modified' => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_DATE_MODIFIED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_modified',
      ),
      'date_entered' => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_DATE_ENTERED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_entered',
      ),
      'fecha_primer_presupuesto_c' => 
      array (
        'type' => 'date',
        'default' => true,
        'label' => 'LBL_FECHA_PRIMER_PRESUPUESTO',
        'width' => '10%',
        'name' => 'fecha_primer_presupuesto_c',
      ),
      'campana_c' => 
      array (
        'type' => 'relate',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_CAMPANA',
        'id' => 'CAMPAIGN_ID_C',
        'link' => true,
        'width' => '10%',
        'name' => 'campana_c',
      ),
      'consultation_date' => 
      array (
        'type' => 'datetime',
        'default' => true,
        'label' => 'LBL_CONSULTATION_DATE',
        'width' => '10%',
        'name' => 'consultation_date',
        'sortable' => false,
      ),
      'aplicant_1st_payment_date' => 
      array (
        'type' => 'datetime',
        'default' => true,
        'label' => 'LBL_APPLICANT_1ST_PAYMENT_DATE',
        'width' => '10%',
        'name' => 'aplicant_1st_payment_date',
        'sortable' => false,
      ),
      'quote_date' => 
      array (
        'type' => 'datetime',
        'default' => true,
        'label' => 'LBL_QUOTE_DATE',
        'width' => '10%',
        'name' => 'quote_date',
        'sortable' => false,
      ),
      'company_1st_payment_date' => 
      array (
        'type' => 'datetime',
        'default' => true,
        'label' => 'LBL_COMPANY_1ST_PAYMENT_DATE',
        'width' => '10%',
        'name' => 'company_1st_payment_date',
        'sortable' => false,
      ),
      'company_sbs_expiry_date' => 
      array (
        'type' => 'datetime',
        'default' => true,
        'label' => 'LBL_COMPANY_SBS_EXPIRY_DATE',
        'width' => '10%',
        'name' => 'company_sbs_expiry_date',
        'sortable' => false,
      ),
      'secondary_dob' => 
      array (
        'type' => 'datetime',
        'default' => true,
        'label' => 'LBL_SECONDARY_DOB',
        'width' => '10%',
        'name' => 'secondary_dob',
        'sortable' => false,
      ),
      'dependent_dob' => 
      array (
        'type' => 'datetime',
        'default' => true,
        'label' => 'LBL_DEPENDENT_DOB',
        'width' => '10%',
        'name' => 'dependent_dob',
        'sortable' => false,
      ),
      'second_dependent_dob' => 
      array (
        'type' => 'datetime',
        'default' => true,
        'label' => 'LBL_SECOND_DEPENDENT_DOB',
        'width' => '10%',
        'name' => 'second_dependent_dob',
        'sortable' => false,
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'maxColumnsBasic' => '4',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
;
?>
