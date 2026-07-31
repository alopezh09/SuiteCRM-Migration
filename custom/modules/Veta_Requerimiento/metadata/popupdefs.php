<?php
$popupMeta = array (
    'moduleMain' => 'Veta_Requerimiento',
    'varName' => 'Veta_Requerimiento',
    'orderBy' => 'veta_requerimiento.name',
    'whereClauses' => array (
  'name' => 'veta_requerimiento.name',
  'assigned_user_id' => 'veta_requerimiento.assigned_user_id',
  'fuente' => 'veta_requerimiento.fuente',
  'fecha_viaje' => 'veta_requerimiento.fecha_viaje',
  'estado' => 'veta_requerimiento.estado',
  'campana' => 'veta_requerimiento.campana',
  'veta_requerimiento_contacts_name' => 'veta_requerimiento.veta_requerimiento_contacts_name',
  'veta_requerimiento_leads_name' => 'veta_requerimiento.veta_requerimiento_leads_name',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'assigned_user_id',
  5 => 'fuente',
  6 => 'fecha_viaje',
  7 => 'estado',
  8 => 'campana',
  9 => 'veta_requerimiento_contacts_name',
  10 => 'veta_requerimiento_leads_name',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'assigned_user_id' => 
  array (
    'name' => 'assigned_user_id',
    'label' => 'LBL_ASSIGNED_TO',
    'type' => 'enum',
    'function' => 
    array (
      'name' => 'get_user_array',
      'params' => 
      array (
        0 => false,
      ),
    ),
    'width' => '10%',
  ),
  'fuente' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_FUENTE',
    'width' => '10%',
    'name' => 'fuente',
  ),
  'fecha_viaje' => 
  array (
    'type' => 'date',
    'label' => 'LBL_FECHA_VIAJE',
    'width' => '10%',
    'name' => 'fecha_viaje',
  ),
  'estado' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_ESTADO',
    'width' => '10%',
    'name' => 'estado',
  ),
  'campana' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_CAMPANA',
    'id' => 'CAMPAIGN_ID_C',
    'link' => true,
    'width' => '10%',
    'name' => 'campana',
  ),
  'veta_requerimiento_contacts_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_VETA_REQUERIMIENTO_CONTACTS_FROM_CONTACTS_TITLE',
    'id' => 'VETA_REQUERIMIENTO_CONTACTSCONTACTS_IDA',
    'width' => '10%',
    'name' => 'veta_requerimiento_contacts_name',
  ),
  'veta_requerimiento_leads_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_VETA_REQUERIMIENTO_LEADS_FROM_LEADS_TITLE',
    'id' => 'VETA_REQUERIMIENTO_LEADSLEADS_IDA',
    'width' => '10%',
    'name' => 'veta_requerimiento_leads_name',
  ),
),
    'listviewdefs' => array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
    'name' => 'name',
  ),
  'VETA_REQUERIMIENTO_CONTACTS_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_VETA_REQUERIMIENTO_CONTACTS_FROM_CONTACTS_TITLE',
    'id' => 'VETA_REQUERIMIENTO_CONTACTSCONTACTS_IDA',
    'width' => '10%',
    'default' => true,
    'name' => 'veta_requerimiento_contacts_name',
  ),
  'VETA_REQUERIMIENTO_LEADS_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_VETA_REQUERIMIENTO_LEADS_FROM_LEADS_TITLE',
    'id' => 'VETA_REQUERIMIENTO_LEADSLEADS_IDA',
    'width' => '10%',
    'default' => true,
    'name' => 'veta_requerimiento_leads_name',
  ),
  'LEAP_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_LEAP_ID',
    'width' => '10%',
    'default' => true,
    'name' => 'leap_id',
  ),
  'COMPANY_LEAD_ID_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_COMPANY_LEAD_ID',
    'width' => '10%',
    'name' => 'company_lead_id_c',
  ),
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
    'name' => 'date_entered',
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
    'name' => 'assigned_user_name',
  ),
  'FUENTE' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_FUENTE',
    'width' => '10%',
    'default' => true,
    'name' => 'fuente',
  ),
  'CAMPANA' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_CAMPANA',
    'id' => 'CAMPAIGN_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'name' => 'campana',
  ),
  'FECHA_VIAJE_TXT' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_FECHA_VIAJE_TXT',
    'width' => '10%',
    'default' => true,
    'name' => 'fecha_viaje_txt',
  ),
  'FECHA_VIAJE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_FECHA_VIAJE',
    'width' => '10%',
    'default' => true,
    'name' => 'fecha_viaje',
  ),
  'VISTO_BUENO_COMERCIAL' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_VISTO_BUENO_COMERCIAL',
    'width' => '10%',
    'name' => 'visto_bueno_comercial',
  ),
  'VISTO_BUENO_VISAS' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_VISTO_BUENO_VISAS',
    'width' => '10%',
    'name' => 'visto_bueno_visas',
  ),
  'PRESUPUESTO' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PRESUPUESTO',
    'width' => '10%',
    'default' => true,
    'name' => 'presupuesto',
  ),
  'FECHA_PROXIMO_CONTACTO' => 
  array (
    'type' => 'date',
    'label' => 'LBL_FECHA_PROXIMO_CONTACTO',
    'width' => '10%',
    'default' => true,
    'name' => 'fecha_proximo_contacto',
  ),
  'FECHA_ULTIMO_CONTACTO' => 
  array (
    'type' => 'date',
    'label' => 'LBL_FECHA_ULTIMO_CONTACTO',
    'width' => '10%',
    'default' => true,
    'name' => 'fecha_ultimo_contacto',
  ),
  'FECHA_PRIMER_PRESUPUESTO' => 
  array (
    'type' => 'date',
    'label' => 'LBL_FECHA_PRIMER_PRESUPUESTO',
    'width' => '10%',
    'default' => true,
    'name' => 'fecha_primer_presupuesto',
  ),
  'REFERIDO' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_REFERIDO',
    'width' => '10%',
    'default' => true,
    'name' => 'referido',
  ),
  'ESTADO' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_ESTADO',
    'width' => '10%',
    'name' => 'estado',
  ),
  'APPLICANT_EMAIL_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_APPLICANT_EMAIL',
    'width' => '10%',
    'name' => 'applicant_email_c',
  ),
  'SOEL_HOME_PHONE_LEAD' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SOEL_HOME_PHONE_LEAD',
    'width' => '10%',
    'default' => true,
    'sortable' => false,
    'name' => 'soel_home_phone_lead',
  ),
  'SOEL_MOBILE_PHONE_LEAD' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SOEL_MOBILE_PHONE_LEAD',
    'width' => '10%',
    'default' => true,
    'sortable' => false,
    'name' => 'soel_mobile_phone_lead',
  ),
  'SOEL_FECHA_EXPIRACION_VISA_LEAD' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SOEL_FECHA_EXPIRACION_VISA_LEAD',
    'width' => '10%',
    'default' => true,
    'sortable' => false,
    'name' => 'soel_fecha_expiracion_visa_lead',
  ),
  'SOEL_FECHA_EXPIRACION_VISA_TEXTO_LEAD' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SOEL_EXPIRACION_VISA_TEXTO_LEAD',
    'width' => '10%',
    'default' => true,
    'sortable' => false,
    'name' => 'soel_fecha_expiracion_visa_texto_lead',
  ),
  'SOEL_EDAD_LEAD' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SOEL_EDAD_LEAD',
    'width' => '10%',
    'default' => true,
    'sortable' => false,
    'name' => 'soel_edad_lead',
  ),
  'INDUSTRY_APLICANT' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INDUSTRY_APLICANT',
    'width' => '10%',
    'default' => true,
    'name' => 'industry_aplicant',
  ),
  'SOEL_TRABAJO_ACTUAL' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TRABAJO_ACTUAL',
    'width' => '10%',
    'default' => true,
    'sortable' => false,
    'name' => 'soel_trabajo_actual',
  ),
  'SOEL_CARRERA_UNIVERSITARIA' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CARRERA_UNIVERSITARIA',
    'width' => '10%',
    'default' => true,
    'sortable' => false,
    'name' => 'soel_carrera_universitaria',
  ),
  'CURRENTLY_LIVING_TOGETHER_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_CURRENTLY_LIVING_TOGETHER',
    'width' => '10%',
    'name' => 'currently_living_together_c',
  ),
  'AUSTRALIAN_CITIZEN_PARTNER_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_AUSTRALIAN_CITIZEN_PARTNER',
    'width' => '10%',
    'name' => 'australian_citizen_partner_c',
  ),
  'CONSULTATION_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_CONSULTATION_DATE',
    'width' => '10%',
    'default' => true,
    'name' => 'consultation_date',
  ),
  'APLICANT_1ST_PAYMENT_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_APPLICANT_1ST_PAYMENT_DATE',
    'width' => '10%',
    'default' => true,
    'name' => 'aplicant_1st_payment_date',
  ),
  'APLICANT_FIRST_PAYMENT_AMOUNT' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_APPLICANT_FIRST_PAYMENT_AMOUNT',
    'default' => true,
    'currency_format' => true,
    'width' => '10%',
    'name' => 'aplicant_first_payment_amount',
  ),
  'APPLICANT_1ST_PAYMENT_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_APPLICANT_1ST_PAYMENT_DATE',
    'width' => '10%',
    'default' => true,
    'name' => 'applicant_1st_payment_date',
  ),
  'APPLICANT_FIRST_PAYMENT_AMOUNT' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_APPLICANT_FIRST_PAYMENT_AMOUNT',
    'default' => true,
    'currency_format' => true,
    'width' => '10%',
    'name' => 'applicant_first_payment_amount',
  ),
  'PROFESSION' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PROFESSION',
    'width' => '10%',
    'default' => true,
    'name' => 'profession',
  ),
  'CURRENT_VISA_SUBCLASS' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CURRENT_VISA_SUBCLASS',
    'width' => '10%',
    'default' => true,
    'name' => 'current_visa_subclass',
  ),
  'CURRENT_JOB_POSITION' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CURRENT_JOB_POSITION',
    'width' => '10%',
    'default' => true,
    'name' => 'current_job_position',
  ),
  'MONTH_OF_EXPERIENCE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_MONTHS_OF_EXPERIENCEL',
    'width' => '10%',
    'default' => true,
    'name' => 'month_of_experience',
  ),
  'LEVEL_OF_ENGLISH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_LEVEL_OF_ENGLISH',
    'width' => '10%',
    'default' => true,
    'name' => 'level_of_english',
  ),
  'NATIONALITY' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_NATIONALITY',
    'width' => '10%',
    'default' => true,
    'name' => 'nationality',
  ),
  'POTENTIAL_VISA_SUBCLASS' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_POTENTIAL_VISA_SUBCLASS',
    'width' => '10%',
    'default' => true,
    'name' => 'potential_visa_subclass',
  ),
  'COST_AGREMENT_NUMBER' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_COST_AGREMENT_NUMBER',
    'width' => '10%',
    'default' => true,
    'name' => 'cost_agrement_number',
  ),
  'COST_AGREMENT_VISA_SUBCLASS' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_COST_AGREMENT_VISA_SUBCLASS',
    'width' => '10%',
    'default' => true,
    'name' => 'cost_agrement_visa_subclass',
  ),
  'QUOTE_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_QUOTE_DATE',
    'width' => '10%',
    'default' => true,
    'name' => 'quote_date',
  ),
  'MIGRATION_AGENT_NAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_MIGRATION_AGENT_NAME',
    'width' => '10%',
    'default' => true,
    'name' => 'migration_agent_name',
  ),
  'RECLUTER_NAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_RECLUTER_NAME',
    'width' => '10%',
    'default' => true,
    'name' => 'recluter_name',
  ),
  'COMPANY_NAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_COMPANY_NAME',
    'width' => '10%',
    'default' => true,
    'name' => 'company_name',
  ),
  'COMPANY_CITY' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_COMPANY_CITY',
    'width' => '10%',
    'default' => true,
    'name' => 'company_city',
  ),
  'COMPANY_INDUSTRY' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_COMPANY_INDUSTRY',
    'width' => '10%',
    'default' => true,
    'name' => 'company_industry',
  ),
  'EMAIL_COMPANY' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_EMAIL_COMPANY',
    'width' => '10%',
    'default' => true,
    'name' => 'email_company',
  ),
  'PHONE_COMPANY' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PHONE_COMPANY',
    'width' => '10%',
    'default' => true,
    'name' => 'phone_company',
  ),
  'COMPANY_1ST_PAYMENT_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_COMPANY_1ST_PAYMENT_DATE',
    'width' => '10%',
    'default' => true,
    'name' => 'company_1st_payment_date',
  ),
  'COMPANY_FIRST_PAYMENT_AMOUNT' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_COMPANY_FIRST_PAYMENT_AMOUNT',
    'default' => true,
    'currency_format' => true,
    'width' => '10%',
    'name' => 'company_first_payment_amount',
  ),
  'COMPANY_SBS_EXPIRY_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_COMPANY_SBS_EXPIRY_DATE',
    'width' => '10%',
    'default' => true,
    'name' => 'company_sbs_expiry_date',
  ),
  'SECONDARY_APLICANT_NAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SECONDARY_APLICANT_NAME',
    'width' => '10%',
    'default' => true,
    'name' => 'secondary_aplicant_name',
  ),
  'SECONDARY_PASPORT_NUMBER' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SECONDARY_PASPORT_NUMBER',
    'width' => '10%',
    'default' => true,
    'name' => 'secondary_pasport_number',
  ),
  'SECONDARY_DOB' => 
  array (
    'type' => 'date',
    'label' => 'LBL_SECONDARY_DOB',
    'width' => '10%',
    'default' => true,
    'name' => 'secondary_dob',
  ),
  'DEPENDENT_NAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_DEPENDENT_NAME',
    'width' => '10%',
    'default' => true,
    'name' => 'dependent_name',
  ),
  'DEPENDENT_DOB' => 
  array (
    'type' => 'date',
    'label' => 'LBL_DEPENDENT_DOB',
    'width' => '10%',
    'default' => true,
    'name' => 'dependent_dob',
  ),
  'APLICANT_MMM_FEE' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_APLICANT_MMM_FEE',
    'default' => true,
    'currency_format' => true,
    'width' => '10%',
    'name' => 'aplicant_mmm_fee',
  ),
  'VISA_EXPIRE_SECONDARY_APPLICANT_DATE_C' => 
  array (
    'type' => 'date',
    'default' => true,
    'label' => 'LBL_VISA_EXPIRE_SECONDARY_APPLICANT_DATE',
    'width' => '10%',
    'name' => 'visa_expire_secondary_applicant_date_c',
  ),
  'VISA_EXPIRE_1ST_DEPENDENT_DATE_C' => 
  array (
    'type' => 'date',
    'default' => true,
    'label' => 'LBL_VISA_EXPIRE_1ST_DEPENDENT_DATE',
    'width' => '10%',
    'name' => 'visa_expire_1st_dependent_date_c',
  ),
  'SECOND_DEPENDENT_NAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SECOND_DEPENDENT_NAME',
    'width' => '10%',
    'default' => true,
    'name' => 'second_dependent_name',
  ),
  'SECOND_DEPENDENT_DOB' => 
  array (
    'type' => 'date',
    'label' => 'LBL_SECOND_DEPENDENT_DOB',
    'width' => '10%',
    'default' => true,
    'name' => 'second_dependent_dob',
  ),
  'VISA_EXPIRE_2ND_DEPENDENT_DATE_C' => 
  array (
    'type' => 'date',
    'default' => true,
    'label' => 'LBL_VISA_EXPIRE_2ND_DEPENDENT_DATE',
    'width' => '10%',
    'name' => 'visa_expire_2nd_dependent_date_c',
  ),
  'THIRD_DEPENDENT_NAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_THIRD_DEPENDENT_NAME',
    'width' => '10%',
    'default' => true,
    'name' => 'third_dependent_name',
  ),
  'THIRD_DEPENDENT_DOB_C' => 
  array (
    'type' => 'date',
    'default' => true,
    'label' => 'LBL_THIRD_DEPENDENT_DOB',
    'width' => '10%',
    'name' => 'third_dependent_dob_c',
  ),
  'VISA_EXPIRE_3RD_DEPENDENT_DATE_C' => 
  array (
    'type' => 'date',
    'default' => true,
    'label' => 'LBL_VISA_EXPIRE_3RD_DEPENDENT_DATE',
    'width' => '10%',
    'name' => 'visa_expire_3rd_dependent_date_c',
  ),
  'CONSULTATION_FEE' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_CONSULTATION_FEE',
    'default' => true,
    'currency_format' => true,
    'width' => '10%',
    'name' => 'consultation_fee',
  ),
  'APLICANT_DEPARTMENTS_VISA_FEE' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_APLICANT_DEPARTMENTS_VISA_FEE',
    'default' => true,
    'currency_format' => true,
    'width' => '10%',
    'name' => 'aplicant_departments_visa_fee',
  ),
  'COMPANY_MMM_FEE' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_COMPANY_MMM_FEE',
    'default' => true,
    'currency_format' => true,
    'width' => '10%',
    'name' => 'company_mmm_fee',
  ),
  'APLICANT_COMPANY_MMM' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_APLICANT_COMPANY_MMM',
    'default' => true,
    'currency_format' => true,
    'width' => '10%',
    'name' => 'aplicant_company_mmm',
  ),
  'TOTAL' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_TOTAL',
    'default' => true,
    'currency_format' => true,
    'width' => '10%',
    'name' => 'total',
  ),
  'APLICANT_COMPANY_MMM_FEES' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_APLICANT_COMPANY_MMM_FEES',
    'default' => true,
    'currency_format' => true,
    'width' => '10%',
    'name' => 'aplicant_company_mmm_fees',
  ),
  'TOTAL_PAID' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_TOTAL_PAID',
    'default' => true,
    'currency_format' => true,
    'width' => '10%',
    'name' => 'total_paid',
  ),
  'OCUPATION' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_OCUPATION',
    'width' => '10%',
    'default' => true,
    'name' => 'ocupation',
  ),
  'MAIN_APLICANT_NAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_MAIN_APLICANT_NAME',
    'width' => '10%',
    'default' => true,
    'name' => 'main_aplicant_name',
  ),
  'DISCOUNT' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_DISCOUNT',
    'default' => true,
    'currency_format' => true,
    'width' => '10%',
    'name' => 'discount',
  ),
  'OUTSTANDING_AMOUNT' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_OUTSTANDING_AMOUNT',
    'default' => true,
    'currency_format' => true,
    'width' => '10%',
    'name' => 'outstanding_amount',
  ),
  'DEPOSIT' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_DEPOSIT',
    'default' => true,
    'currency_format' => true,
    'width' => '10%',
    'name' => 'deposit',
  ),
  'TOTAL_WITHOUT_GST' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_TOTAL_WITHOUT_GST',
    'default' => true,
    'currency_format' => true,
    'width' => '10%',
    'name' => 'total_without_gst',
  ),
  'GST_PERCENTAGE' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_GST_PERCENTAGE',
    'default' => true,
    'currency_format' => true,
    'width' => '10%',
    'name' => 'gst_percentage',
  ),
  'DEPARTMENT_CREDIT_CARD_SURCHARGE_PERCENTAGE' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_DEPARTMENT_CREDIT_CARD_SURCHARGE_PERCENTAGE',
    'default' => true,
    'currency_format' => true,
    'width' => '10%',
    'name' => 'department_credit_card_surcharge_percentage',
  ),
  'DEPARTMENT_VISA_FEE_BASE_APPLICATION_CHARGE' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_DEPARTMENT_VISA_FEE_BASE_APPLICATION_CHARGE',
    'default' => true,
    'currency_format' => true,
    'width' => '10%',
    'name' => 'department_visa_fee_base_application_charge',
  ),
  'INSURANCE_VALUE' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_INSURANCE_VALUE',
    'default' => true,
    'currency_format' => true,
    'width' => '10%',
    'name' => 'insurance_value',
  ),
  'NOMINATION_APP_EXP_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_NOMINATION_APP_EXP_DATE',
    'width' => '10%',
    'default' => true,
    'name' => 'nomination_app_exp_date',
  ),
  'NOMINATION_APP_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_NOMINATION_APP_DATE',
    'width' => '10%',
    'default' => true,
    'name' => 'nomination_app_date',
  ),
  'SKILL_ASSESSMENT_APP_EXP_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_SKILL_ASSESSMENT_APP_EXP_DATE',
    'width' => '10%',
    'default' => true,
    'name' => 'skill_assessment_app_exp_date',
  ),
  'SKILL_ASSESSMENT_APP_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_SKILL_ASSESSMENT_APP_DATE',
    'width' => '10%',
    'default' => true,
    'name' => 'skill_assessment_app_date',
  ),
  'VISA_APP_EXP_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_VISA_APP_EXP_DATE',
    'width' => '10%',
    'default' => true,
    'name' => 'visa_app_exp_date',
  ),
  'VISA_APP_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_VISA_APP_DATE',
    'width' => '10%',
    'default' => true,
    'name' => 'visa_app_date',
  ),
  'RECRUITMENT' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_RECRUITMENT',
    'width' => '10%',
    'default' => true,
    'name' => 'recruitment',
  ),
  'RECRUITMENT_EXP_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_RECRUITMENT_EXP_DATE',
    'width' => '10%',
    'default' => true,
    'name' => 'recruitment_exp_date',
  ),
  'COMPANY_DISCOUNT_C' => 
  array (
    'type' => 'currency',
    'default' => true,
    'label' => 'LBL_COMPANY_DISCOUNT',
    'currency_format' => true,
    'width' => '10%',
    'name' => 'company_discount_c',
  ),
  'COMPANY_GST_C' => 
  array (
    'type' => 'currency',
    'default' => true,
    'label' => 'LBL_COMPANY_GST',
    'currency_format' => true,
    'width' => '10%',
    'name' => 'company_gst_c',
  ),
  'COMPANY_OUTSTANDING_AMOUNT_C' => 
  array (
    'type' => 'currency',
    'default' => true,
    'label' => 'LBL_COMPANY_OUTSTANDING_AMOUNT',
    'currency_format' => true,
    'width' => '10%',
    'name' => 'company_outstanding_amount_c',
  ),
  'COMPANY_TOTAL_C' => 
  array (
    'type' => 'currency',
    'default' => true,
    'label' => 'LBL_COMPANY_TOTAL',
    'currency_format' => true,
    'width' => '10%',
    'name' => 'company_total_c',
  ),
  'COMPANY_TOTAL_WITHOUT_GST_C' => 
  array (
    'type' => 'currency',
    'default' => true,
    'label' => 'LBL_COMPANY_TOTAL_WITHOUT_GST',
    'currency_format' => true,
    'width' => '10%',
    'name' => 'company_total_without_gst_c',
  ),
  'COMPANY_DEPT_VISA_FEE_BASE_C' => 
  array (
    'type' => 'currency',
    'default' => true,
    'label' => 'LBL_COMPANY_DEPT_VISA_FEE_BASE',
    'currency_format' => true,
    'width' => '10%',
    'name' => 'company_dept_visa_fee_base_c',
  ),
  'COMPANY_DEPT_CC_SURCHARGE_C' => 
  array (
    'type' => 'currency',
    'default' => true,
    'label' => 'LBL_COMPANY_DEPT_CC_SURCHARGE',
    'currency_format' => true,
    'width' => '10%',
    'name' => 'company_dept_cc_surcharge_c',
  ),
  'COMPANY_DEPOSITS_C' => 
  array (
    'type' => 'currency',
    'default' => true,
    'label' => 'LBL_COMPANY_DEPOSITS',
    'currency_format' => true,
    'width' => '10%',
    'name' => 'company_deposits_c',
  ),
  'APPLICANT_COMPANY_MMM_FEES_WITHOUT_GST_C' => 
  array (
    'type' => 'currency',
    'default' => true,
    'label' => 'LBL_APPLICANT_COMPANY_MMM_FEES_WITHOUT_GST',
    'currency_format' => true,
    'width' => '10%',
    'name' => 'applicant_company_mmm_fees_without_gst_c',
  ),
  'APPLICANT_COMPANY_OUTSTANDING_C' => 
  array (
    'type' => 'currency',
    'default' => true,
    'label' => 'LBL_APPLICANT_COMPANY_OUTSTANDING',
    'currency_format' => true,
    'width' => '10%',
    'name' => 'applicant_company_outstanding_c',
  ),
  'APPLICANT_COMPANY_TOTAL_C' => 
  array (
    'type' => 'currency',
    'default' => true,
    'label' => 'LBL_APPLICANT_COMPANY_TOTAL',
    'currency_format' => true,
    'width' => '10%',
    'name' => 'applicant_company_total_c',
  ),
  'APPLICANT_COMPANY_TOTAL_PAID_C' => 
  array (
    'type' => 'currency',
    'default' => true,
    'label' => 'LBL_APPLICANT_COMPANY_TOTAL_PAID',
    'currency_format' => true,
    'width' => '10%',
    'name' => 'applicant_company_total_paid_c',
  ),
),
);
