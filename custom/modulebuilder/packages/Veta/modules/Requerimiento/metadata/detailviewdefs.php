<?php
$module_name = 'Veta_Requerimiento';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
          3 => 'FIND_DUPLICATES',
        ),
      ),
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => '',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'referido',
            'label' => 'LBL_REFERIDO',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'veta_requerimiento_contacts_name',
            'label' => 'LBL_VETA_REQUERIMIENTO_CONTACTS_FROM_CONTACTS_TITLE',
          ),
          1 => 
          array (
            'name' => 'veta_requerimiento_leads_name',
            'label' => 'LBL_VETA_REQUERIMIENTO_LEADS_FROM_LEADS_TITLE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'campana',
            'studio' => 'visible',
            'label' => 'LBL_CAMPANA',
          ),
          1 => 
          array (
            'name' => 'fuente',
            'studio' => 'visible',
            'label' => 'LBL_FUENTE',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'fecha_proximo_contacto',
            'label' => 'LBL_FECHA_PROXIMO_CONTACTO',
          ),
          1 => 
          array (
            'name' => 'fecha_ultimo_contacto',
            'label' => 'LBL_FECHA_ULTIMO_CONTACTO',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'fecha_viaje_txt',
            'label' => 'LBL_FECHA_VIAJE_TXT',
          ),
          1 => 
          array (
            'name' => 'fecha_viaje',
            'label' => 'LBL_FECHA_VIAJE',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'fecha_primer_presupuesto',
            'label' => 'LBL_FECHA_PRIMER_PRESUPUESTO',
          ),
          1 => '',
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'estado',
            'studio' => 'visible',
            'label' => 'LBL_ESTADO',
          ),
          1 => 
          array (
            'name' => 'presupuesto',
            'label' => 'LBL_PRESUPUESTO',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'visto_bueno_comercial',
            'label' => 'LBL_VISTO_BUENO_COMERCIAL',
          ),
          1 => 
          array (
            'name' => 'visto_bueno_visas',
            'label' => 'LBL_VISTO_BUENO_VISAS',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'date_entered',
            'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
            'label' => 'LBL_DATE_ENTERED',
          ),
          1 => 
          array (
            'name' => 'date_modified',
            'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
            'label' => 'LBL_DATE_MODIFIED',
          ),
        ),
        11 => 
        array (
          0 => 
          array (
            'name' => 'industry_aplicant',
            'label' => 'LBL_INDUSTRY_APLICANT',
          ),
          1 => 
          array (
            'name' => 'consultation_date',
            'label' => 'LBL_CONSULTATION_DATE',
          ),
        ),
        12 => 
        array (
          0 => 
          array (
            'name' => 'industry_aplicant',
            'label' => 'LBL_INDUSTRY_APLICANT',
          ),
          1 => 
          array (
            'name' => 'consultation_date',
            'label' => 'LBL_CONSULTATION_DATE',
          ),
        ),
        13 => 
        array (
          0 => 
          array (
            'name' => 'aplicant_1st_payment_date',
            'label' => 'LBL_APPLICANT_1ST_PAYMENT_DATE',
          ),
          1 => 
          array (
            'name' => 'aplicant_first_payment_amount',
            'label' => 'LBL_APPLICANT_FIRST_PAYMENT_AMOUNT',
          ),
        ),
        14 => 
        array (
          0 => 
          array (
            'name' => 'profession',
            'label' => 'LBL_PROFESSION',
          ),
          1 => 
          array (
            'name' => 'current_visa_subclass',
            'label' => 'LBL_CURRENT_VISA_SUBCLASS',
          ),
        ),
        15 => 
        array (
          0 => 
          array (
            'name' => 'current_job_position',
            'label' => 'LBL_CURRENT_JOB_POSITION',
          ),
          1 => 
          array (
            'name' => 'month_of_experience',
            'label' => 'LBL_MONTHS_OF_EXPERIENCEL',
          ),
        ),
        16 => 
        array (
          0 => 
          array (
            'name' => 'level_of_english',
            'label' => 'LBL_LEVEL_OF_ENGLISH',
          ),
          1 => 
          array (
            'name' => 'nationality',
            'label' => 'LBL_NATIONALITY',
          ),
        ),
        17 => 
        array (
          0 => 
          array (
            'name' => 'potential_visa_subclass',
            'label' => 'LBL_POTENTIAL_VISA_SUBCLASS',
          ),
          1 => 
          array (
            'name' => 'cost_agrement_visa_subclass',
            'label' => 'LBL_COST_AGREMENT_NUMBER',
          ),
        ),
        18 => 
        array (
          0 => 
          array (
            'name' => 'cost_agrement_number',
            'label' => 'LBL_COST_AGREMENT_NUMBER',
          ),
          1 => 
          array (
            'name' => 'quote_date',
            'label' => 'LBL_QUOTE_DATE',
          ),
        ),
        19 => 
        array (
          0 => 
          array (
            'name' => 'migration_agent_name',
            'label' => 'LBL_MIGRATION_AGENT_NAME',
          ),
          1 => 
          array (
            'name' => 'leap_id',
            'label' => 'LBL_LEAP_ID',
          ),
        ),
        20 => 
        array (
          0 => 
          array (
            'name' => 'recluter_name',
            'label' => 'LBL_RECLUTER_NAME',
          ),
          1 => 
          array (
            'name' => 'company_name',
            'label' => 'LBL_COMPANY_NAME',
          ),
        ),
        21 => 
        array (
          0 => 
          array (
            'name' => 'company_city',
            'label' => 'LBL_COMPANY_CITY',
          ),
          1 => 
          array (
            'name' => 'company_industry',
            'label' => 'LBL_COMPANY_INDUSTRY',
          ),
        ),
        22 => 
        array (
          0 => 
          array (
            'name' => 'email_company',
            'label' => 'LBL_EMAIL_COMPANY',
          ),
          1 => 
          array (
            'name' => 'phone_company',
            'label' => 'LBL_PHONE_COMPANY',
          ),
        ),
        23 => 
        array (
          0 => 
          array (
            'name' => 'company_1st_payment_date',
            'label' => 'LBL_COMPANY_1ST_PAYMENT_DATE',
          ),
          1 => 
          array (
            'name' => 'company_first_payment_amount',
            'label' => 'LBL_COMPANY_FIRST_PAYMENT_AMOUNT',
          ),
        ),
        24 => 
        array (
          0 => 
          array (
            'name' => 'company_sbs_expiry_date',
            'label' => 'LBL_COMPANY_SBS_EXPIRY_DATE',
          ),
          1 => 
          array (
            'name' => 'secondary_aplicant_name',
            'label' => 'LBL_SECONDARY_APLICANT_NAME',
          ),
        ),
        25 => 
        array (
          0 => 
          array (
            'name' => 'secondary_pasport_number',
            'label' => 'LBL_SECONDARY_PASPORT_NUMBER',
          ),
          1 => 
          array (
            'name' => 'secondary_dob',
            'label' => 'LBL_SECONDARY_DOB',
          ),
        ),
        26 => 
        array (
          0 => 
          array (
            'name' => 'dependent_name',
            'label' => 'LBL_DEPENDENT_NAME',
          ),
          1 => 
          array (
            'name' => 'dependent_dob',
            'label' => 'LBL_DEPENDENT_DOB',
          ),
        ),
        27 => 
        array (
          0 => 
          array (
            'name' => 'aplicant_mmm_fee',
            'label' => 'LBL_APLICANT_MMM_FEE',
          ),
          1 => 
          array (
            'name' => 'second_dependent_name',
            'label' => 'LBL_SECOND_DEPENDENT_NAME',
          ),
        ),
        28 => 
        array (
          0 => 
          array (
            'name' => 'second_dependent_dob',
            'label' => 'LBL_SECOND_DEPENDENT_DOB',
          ),
          1 => 
          array (
            'name' => 'third_dependent_name',
            'label' => 'LBL_THIRD_DEPENDENT_NAME',
          ),
        ),
        29 => 
        array (
          0 => 
          array (
            'name' => 'company_mmm_fee',
            'label' => 'LBL_COMPANY_MMM_FEE',
          ),
          1 => 
          array (
            'name' => 'aplicant_company_mmm',
            'label' => 'LBL_APLICANT_COMPANY_MMM',
          ),
        ),
        30 => 
        array (
          0 => 
          array (
            'name' => 'Total',
            'label' => 'LBL_TOTAL',
          ),
          1 => 
          array (
            'name' => 'aplicant_company_mmm_fees',
            'label' => 'LBL_APLICANT_COMPANY_MMM_FEES',
          ),
        ),
        31 => 
        array (
          0 => 
          array (
            'name' => 'total_paid',
            'label' => 'LBL_TOTAL_PAID',
          ),
          1 => 
          array (
            'name' => 'ocupation',
            'label' => 'LBL_OCUPATION',
          ),
        ),
        32 => 
        array (
          0 => 
          array (
            'name' => 'main_aplicant_name',
            'label' => 'LBL_MAIN_APLICANT_NAME',
          ),
        ),
      ),
    ),
  ),
);
;
?>
