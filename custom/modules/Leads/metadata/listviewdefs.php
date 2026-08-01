<?php
$listViewDefs ['Leads'] = 
array (
  'FULL_NAME' => 
  array (
    'type' => 'fullname',
    'studio' => 
    array (
      'listview' => false,
    ),
    'label' => 'LBL_NAME',
    'width' => '10%',
    'default' => false,
  ),
  'NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'orderBy' => 'name',
    'default' => true,
    'related_fields' => 
    array (
      0 => 'first_name',
      1 => 'last_name',
      2 => 'salutation',
    ),
  ),
  'PASAPORTE_C' =>  
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_PASAPORTE',
    'width' => '10%',
  ),
   
  'STATUS' => 
  array (
    'width' => '7%',
    'label' => 'LBL_LIST_STATUS',
    'default' => true,
  ),
  'PHONE_HOME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_HOME_PHONE',
    'default' => true,
  ),
  'PHONE_MOBILE' => 
  array (
    'width' => '10%',
    'label' => 'LBL_MOBILE_PHONE',
    'default' => true,
  ),
  'EMAIL1' => 
  array (
    'width' => '16%',
    'label' => 'LBL_LIST_EMAIL_ADDRESS',
    'sortable' => false,
    'customCode' => '{$EMAIL1_LINK}</a>',
    'default' => true,
  ),
  'EDAD_C' => 
  array (
    'type' => 'int',
    'default' => true,
    'label' => 'LBL_EDAD',
    'width' => '10%',
  ),
  'CIUDAD_TMP_C' => 
  array ( 
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_CIUDAD_TMP',
    'width' => '10%',
  ),
  'CIUDAD_C' => 
  array (
    'type' => 'dynamicenum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_CIUDAD',
    'width' => '10%',
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '5%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
  'EXPIRACION_VISA_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_EXPIRACION_VISA',
    'width' => '10%',
  ),
  'FECHA_EXPIRACION_VISA_C' => 
  array (
    'type' => 'datetimecombo',
    'default' => true,
    'label' => 'LBL_FECHA_EXPIRACION_VISA',
    'width' => '10%',
  ),
  'LEAD_SOURCE' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LEAD_SOURCE',
    'default' => true,
  ),
  'DATE_ENTERED' => 
  array (
    'width' => '10%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => true,
  ),
  'FECHA_PRIMER_PRESUPUESTO_C' => 
  array (
    'type' => 'date',
    'default' => true,
    'label' => 'LBL_FECHA_PRIMER_PRESUPUESTO',
    'width' => '10%',
  ),
  'CAMPANA_C' =>
      array (
          'type' => 'relate',
          'default' => false,
          'studio' => 'visible',
          'label' => 'LBL_CAMPANA',
          'id' => 'CAMPAIGN_ID_C',
          'link' => true,
          'width' => '10%'
  ),
  'SOEL_OFICINA_COMERCIAL' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SOEL_OFICINA_COMERCIAL',
    'width' => '10%',
    'default' => true,
    'sortable' => false,
  ),
  'SOEL_AUDITORIA' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SOEL_AUDITORIA',
    'width' => '10%',
    'default' => true,
  ),
  'VISA_C' => 
  array (
    'type' => 'varchar',
    'default' => false,
    'label' => 'LBL_VISA',
    'width' => '10%',
  ),
  'DATE_MODIFIED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'default' => false,
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
  ),
  'CREATED_BY_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_CREATED',
    'id' => 'CREATED_BY',
    'width' => '10%',
    'default' => false,
  ),
  'MODIFIED_BY_NAME' => 
  array (
    'width' => '5%',
    'label' => 'LBL_MODIFIED',
    'default' => false,
  ),
  'TRABAJO_ACTUAL_C' => 
  array (
    'type' => 'varchar',
    'default' => false,
    'label' => 'LBL_TRABAJO_ACTUAL',
    'width' => '10%',
  ),
  'CARRERA_UNIVERSITARIA_C' => 
  array (
    'type' => 'varchar',
    'default' => false,
    'label' => 'LBL_CARRERA_UNIVERSITARIA',
    'width' => '10%',
  ),
  'CONVERTED' => 
  array (
    'type' => 'bool',
    'default' => false,
    'label' => 'LBL_CONVERTED',
    'width' => '10%',
  ),
  'BIRTHDATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_BIRTHDATE',
    'width' => '10%',
    'default' => false,
  ),
  'PAIS_C' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_PAIS',
    'width' => '10%',
  ),
  'DEPARTAMENTO_C' => 
  array (
    'type' => 'dynamicenum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_DEPARTAMENTO',
    'width' => '10%',
  ),
 
  //Nuevos Fields 

 'INDUSTRY_APLICANT' =>
 array (
     'type' => 'varchar',
     'label' => 'LBL_INDUSTRY_APLICANT',
     'width' => '10%',
     'default' => true,
 ),

'CONSULTATION_DATE' =>
array (
'type' => 'date',
'label' => 'LBL_CONSULTATION_DATE',
'width' => '10%',
'default' => true,
),    

'APPLICANT_1ST_PAYMENT_DATE' =>
array (
'type' => 'date',
'label' => 'LBL_APPLICANT_1ST_PAYMENT_DATE',
'width' => '10%',
'default' => true,
),

'APPLICANT_FIRST_PAYMENT_AMOUNT' =>
array (
'type' => 'varchar',
'label' => 'LBL_APPLICANT_FIRST_PAYMENT_AMOUNT',
'width' => '10%',
'default' => true,
),

'PROFESSION' =>
 array (
     'type' => 'varchar',
     'label' => 'LBL_PROFESSION',
     'width' => '10%',
     'default' => true,
 ),

'CURRENT_VISA_SUBCLASS' =>
array (
'type' => 'varchar',
'label' => 'LBL_CURRENT_VISA_SUBCLASS',
'width' => '10%',
'default' => true,
),

'CURRENT_JOB_POSITION' =>
 array (
     'type' => 'varchar',
     'label' => 'LBL_CURRENT_JOB_POSITION',
     'width' => '10%',
     'default' => true,
 ),

'MONTHS_OF_EXPERIENCE' =>
array (
'type' => 'varchar',
'label' => 'LBL_MONTHS_OF_EXPERIENCEL',
'width' => '10%',
'default' => true,
),

'LEVEL_OF_ENGLISH' =>
 array (
     'type' => 'varchar',
     'label' => 'LBL_LEVEL_OF_ENGLISH',
     'width' => '10%',
     'default' => true,
 ),

'NATIONALITY' =>
array (
'type' => 'varchar',
'label' => 'LBL_NATIONALITY',
'width' => '10%',
'default' => true,
),

'POTENTIAL_VISA_SUBCLASS' =>
 array (
     'type' => 'varchar',
     'label' => 'LBL_POTENTIAL_VISA_SUBCLASS',
     'width' => '10%',
     'default' => true,
 ),

'COST_AGREMENT_NUMBER' =>
array (
'type' => 'varchar',
'label' => 'LBL_COST_AGREMENT_NUMBER',
'width' => '10%',
'default' => true,
),

'COST_AGREMENT_VISA_SUBCLASS' =>
 array (
     'type' => 'varchar',
     'label' => 'LBL_COST_AGREMENT_VISA_SUBCLASS',
     'width' => '10%',
     'default' => true,
 ),

'QUOTE_DATE' =>
array (
'type' => 'date',
'label' => 'LBL_QUOTE_DATE',
'width' => '10%',
'default' => true,
),

'MIGRATION_AGENT_NAME' =>
 array (
     'type' => 'varchar',
     'label' => 'LBL_MIGRATION_AGENT_NAME',
     'width' => '10%',
     'default' => true,
 ),

'LEAP_ID' =>
array (
'type' => 'varchar',
'label' => 'LBL_LEAP_ID',
'width' => '10%',
'default' => true,
),

'RECLUTER_NAME' =>
 array (
     'type' => 'varchar',
     'label' => 'LBL_RECLUTER_NAME',
     'width' => '10%',
     'default' => true,
 ),

'COMPANY_NAME' =>
array (
'type' => 'varchar',
'label' => 'LBL_COMPANY_NAME',
'width' => '10%',
'default' => true,
),

'COMPANY_CITY' =>
 array (
     'type' => 'varchar',
     'label' => 'LBL_COMPANY_CITY',
     'width' => '10%',
     'default' => true,
 ),

'COMPANY_INDUSTRY' =>
array (
'type' => 'varchar',
'label' => 'LBL_COMPANY_INDUSTRY',
'width' => '10%',
'default' => true,
),

'EMAIL_COMPANY' =>
 array (
     'type' => 'varchar',
     'label' => 'LBL_EMAIL_COMPANY',
     'width' => '10%',
     'default' => true,
 ),

'PHONE_COMPANY' =>
array (
'type' => 'varchar',
'label' => 'LBL_PHONE_COMPANY',
'width' => '10%',
'default' => true,
),

'COMPANY_1ST_PAYMENT_DATE' =>
array (
'type' => 'date',
'label' => 'LBL_COMPANY_1ST_PAYMENT_DATE',
'width' => '10%',
'default' => true,
),

'COMPANY_FIRST_PAYMENT_AMOUNT' =>
array (
'type' => 'varchar',
'label' => 'LBL_COMPANY_FIRST_PAYMENT_AMOUNT',
'width' => '10%',
'default' => true,
),

'COMPANY_SBS_EXPIRY_DATE' =>
array (
'type' => 'date',
'label' => 'LBL_COMPANY_SBS_EXPIRY_DATE',
'width' => '10%',
'default' => true,
),

//NEW 7 FIELDS

'SECONDARY_APLICANT_NAME' =>
array (
    'type' => 'varchar',
    'label' => 'LBL_SECONDARY_APLICANT_NAME',
    'width' => '10%',
    'default' => true,
),

'SECONDARY_PASPORT_NUMBER' =>
array (
    'type' => 'varchar',
    'label' => 'LBL_SECONDARY_PASPORT_NUMBER',
    'width' => '10%',
    'default' => true,
),

'SECONDARY_DOB' =>
array (
    'type' => 'date',
    'label' => 'LBL_SECONDARY_DOB',
    'width' => '10%',
    'default' => true,
),

'DEPENDENT_NAME' =>
array (
    'type' => 'varchar',
    'label' => 'LBL_DEPENDENT_NAME',
    'width' => '10%',
    'default' => true,
),

'DEPENDENT_DOB' =>
array (
    'type' => 'date',
    'label' => 'LBL_DEPENDENT_DOB',
    'width' => '10%',
    'default' => true,
),

'APLICANT_MMM_FEE' =>
array (
    'type' => 'varchar',
    'label' => 'LBL_APLICANT_MMM_FEE',
    'width' => '10%',
    'default' => true,
),

'second_dependent_name' =>
array (
    'type' => 'varchar',
    'label' => 'LBL_SECOND_DEPENDENT_NAME',
    'width' => '10%',
    'default' => true,
),

//NEW 11 FIELDS

'second_dependent_dob' =>
array (
    'type' => 'date',
    'label' => 'LBL_SECOND_DEPENDENT_DOB',
    'width' => '10%',
    'default' => true,
),

'THIRD_DEPENDENT_NAME' =>
array (
    'type' => 'varchar',
    'label' => 'LBL_THIRD_DEPENDENT_NAME',
    'width' => '10%',
    'default' => true,
),

'CONSULTATION_FEE' =>
array (
    'type' => 'varchar',
    'label' => 'LBL_CONSULTATION_FEE',
    'width' => '10%',
    'default' => true,
),

'APLICANT_DEPARTMENTS_VISA_FEE' =>
array (
    'type' => 'varchar',
    'label' => 'LBL_APLICANT_DEPARTMENTS_VISA_FEE',
    'width' => '10%',
    'default' => true,
),

'COMPANY_MMM_FEE' =>
array (
    'type' => 'varchar',
    'label' => 'LBL_COMPANY_MMM_FEE',
    'width' => '10%',
    'default' => true,
),

'APLICANT_COMPANY_MMM' =>
array (
    'type' => 'varchar',
    'label' => 'LBL_APLICANT_COMPANY_MMM',
    'width' => '10%',
    'default' => true,
),

'TOTAL' =>
array (
    'type' => 'varchar',
    'label' => 'LBL_TOTAL',
    'width' => '10%',
    'default' => true,
),

'APLICANT_COMPANY_MMM_FEES' =>
array (
    'type' => 'varchar',
    'label' => 'LBL_APLICANT_COMPANY_MMM_FEES',
    'width' => '10%',
    'default' => true,
),

'TOTAL_PAID' =>
array (
    'type' => 'varchar',
    'label' => 'LBL_TOTAL_PAID',
    'width' => '10%',
    'default' => true,
),

'OCUPATION' =>
array (
    'type' => 'varchar',
    'label' => 'LBL_OCUPATION',
    'width' => '10%',
    'default' => true,
),

'MAIN_APLICANT_NAME' =>
array (
    'type' => 'varchar',
    'label' => 'LBL_MAIN_APLICANT_NAME',
    'width' => '10%',
    'default' => true,
),

  
);
;
?>
