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
  'fuente' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_FUENTE',
    'width' => '10%',
    'default' => true,
  ),
  'campana' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_CAMPANA',
    'id' => 'CAMPAIGN_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'veta_requerimiento_contacts_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_VETA_REQUERIMIENTO_CONTACTS_FROM_CONTACTS_TITLE',
    'id' => 'VETA_REQUERIMIENTO_CONTACTSCONTACTS_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'veta_requerimiento_leads_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_VETA_REQUERIMIENTO_LEADS_FROM_LEADS_TITLE',
    'id' => 'VETA_REQUERIMIENTO_LEADSLEADS_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'date_entered' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => true,
    'name' => 'date_entered',
  ),
  'estado' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_ESTADO',
    'width' => '10%',
  ),
  'fecha_ultimo_contacto' => 
  array (
    'type' => 'date',
    'label' => 'LBL_FECHA_ULTIMO_CONTACTO',
    'width' => '10%',
    'default' => false,
  ),
  'fecha_proximo_contacto' => 
  array (
    'type' => 'date',
    'label' => 'LBL_FECHA_PROXIMO_CONTACTO',
    'width' => '10%',
    'default' => false,
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
  'assigned_user_name' => 
  array (
    'width' => '8%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'name' => 'assigned_user_name',
    'default' => false,
  ),
  'fecha_viaje' => 
  array (
    'type' => 'date',
    'label' => 'LBL_FECHA_VIAJE',
    'width' => '10%',
    'default' => false,
  ),
  'visto_bueno_visas' => 
  array (
    'type' => 'bool',
    'default' => false,
    'label' => 'LBL_VISTO_BUENO_VISAS',
    'width' => '10%',
  ),
  'presupuesto' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PRESUPUESTO',
    'width' => '10%',
    'default' => false,
  ),
  'visto_bueno_comercial' => 
  array (
    'type' => 'bool',
    'default' => false,
    'label' => 'LBL_VISTO_BUENO_COMERCIAL',
    'width' => '10%',
  ),
  'referido' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_REFERIDO',
    'width' => '10%',
    'default' => false,
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
     'label' => 'company_city',
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

'SECOND_DEPENDENT_NAME' =>
array (
    'type' => 'varchar',
    'label' => 'LBL_SECOND_DEPENDENT_NAME',
    'width' => '10%',
    'default' => true,
),


//NEW 11 FIELDS

'SECOND_DEPENDENT_DOB' =>
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
