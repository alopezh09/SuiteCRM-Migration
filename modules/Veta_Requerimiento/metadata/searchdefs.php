<?php
$module_name                 = 'Veta_Requerimiento';
$searchdefs [ $module_name ] =
    array(
        'layout'       =>
            array(
                'basic_search'    =>
                    array(
                        //region name
                        'name'                             => array(
                            'name'    => 'name',
                            'default' => true,
                            'width'   => '10%' 
                        ),
                        //endregion

                        //region estado
                        'estado'                           => array(
                            'type'    => 'enum',
                            'default' => true,
                            'studio'  => 'visible',
                            'label'   => 'LBL_ESTADO',
                            'width'   => '10%',
                            'name'    => 'estado'
                        ),
                        //endregion

                        //region fuente
                        'fuente'                           => array(
                            'type'    => 'enum',
                            'studio'  => 'visible',
                            'label'   => 'LBL_FUENTE',
                            'width'   => '10%',
                            'default' => true,
                            'name'    => 'fuente'
                        ),
                        //endregion

                        //region campana
                        'campana'                          => array(
                            'type'    => 'relate',
                            'studio'  => 'visible',
                            'label'   => 'LBL_CAMPANA',
                            'id'      => 'CAMPAIGN_ID_C',
                            'link'    => true,
                            'width'   => '10%',
                            'default' => true,
                            'name'    => 'campana'
                        ),
                        //endregion

                        //region veta_requerimiento_contacts_name
                        'veta_requerimiento_contacts_name' =>
                            array(
                                'type'    => 'relate',
                                'link'    => true,
                                'label'   => 'LBL_VETA_REQUERIMIENTO_CONTACTS_FROM_CONTACTS_TITLE',
                                'id'      => 'VETA_REQUERIMIENTO_CONTACTSCONTACTS_IDA',
                                'width'   => '10%',
                                'default' => true,
                                'name'    => 'veta_requerimiento_contacts_name',
                            ),
                        //endregion

                        //region veta_requerimiento_leads_name
                        'veta_requerimiento_leads_name'    =>
                            array(
                                'type'    => 'relate',
                                'link'    => true,
                                'label'   => 'LBL_VETA_REQUERIMIENTO_LEADS_FROM_LEADS_TITLE',
                                'id'      => 'VETA_REQUERIMIENTO_LEADSLEADS_IDA',
                                'width'   => '10%',
                                'default' => true,
                                'name'    => 'veta_requerimiento_leads_name',
                            ),
                        //endregion

                        //region assigned_user_id
                        'assigned_user_id'                 =>
                            array(
                                'name'     => 'assigned_user_id',
                                'label'    => 'LBL_ASSIGNED_TO',
                                'type'     => 'enum',
                                'function' =>
                                    array(
                                        'name'   => 'get_user_array',
                                        'params' =>
                                            array(
                                                0 => false,
                                            ),
                                    ),
                                'width'    => '10%',
                                'default'  => true,
                            ),
                        //endregion
                    ),


                     //FILTRO AVANZADO


                'advanced_search' =>
                    array(
                        //region name
                        'name'                               => array(
                            'name'    => 'name',
                            'default' => true,
                            'width'   => '10%'
                        ),
                        //endregion

                        //region created_by
                        'created_by'                         => array(
                            'type'    => 'assigned_user_name',
                            'label'   => 'LBL_CREATED',
                            'width'   => '10%',
                            'default' => true,
                            'name'    => 'created_by'
                        ),
                        //endregion

                        //region fuente
                        'fuente'                             => array(
                            'type'    => 'enum',
                            'studio'  => 'visible',
                            'label'   => 'LBL_FUENTE',
                            'width'   => '10%',
                            'default' => true,
                            'name'    => 'fuente'
                        ),
                        //endregion


                        //region campana
                        'campana'                            => array(
                            'type'    => 'relate',
                            'studio'  => 'visible',
                            'label'   => 'LBL_CAMPANA',
                            'link'    => true,
                            'width'   => '10%',
                            'default' => true,
                            'id'      => 'CAMPAIGN_ID_C',
                            'name'    => 'campana',
                        ),
                        //endregion

                        //region visto_bueno_comercial
                        'visto_bueno_comercial'              =>
                            array(
                                'type'    => 'bool',
                                'default' => true,
                                'label'   => 'LBL_VISTO_BUENO_COMERCIAL',
                                'width'   => '10%',
                                'name'    => 'visto_bueno_comercial',
                            ),
                        //endregion

                        //region visto_bueno_visas
                        'visto_bueno_visas'                  =>
                            array(
                                'type'    => 'bool',
                                'default' => true,
                                'label'   => 'LBL_VISTO_BUENO_VISAS',
                                'width'   => '10%',
                                'name'    => 'visto_bueno_visas',
                            ),
                        //endregion

                        //region estado
                        'estado'                             =>
                            array(
                                'type'    => 'enum',
                                'default' => true,
                                'studio'  => 'visible',
                                'label'   => 'LBL_ESTADO',
                                'width'   => '10%',
                                'name'    => 'estado',
                            ),
                        //endregion

                        //region referido
                        'referido'                           =>
                            array(
                                'type'    => 'varchar',
                                'label'   => 'LBL_REFERIDO',
                                'width'   => '10%',
                                'default' => true,
                                'name'    => 'referido',
                            ),
                        //endregion

                        //region veta_requerimiento_leads_name
                        'veta_requerimiento_leads_name'      =>
                            array(
                                'type'    => 'relate',
                                'link'    => true,
                                'label'   => 'LBL_VETA_REQUERIMIENTO_LEADS_FROM_LEADS_TITLE',
                                'width'   => '10%',
                                'default' => true,
                                'id'      => 'VETA_REQUERIMIENTO_LEADSLEADS_IDA',
                                'name'    => 'veta_requerimiento_leads_name',
                            ),
                        //endregion

                        //region veta_requerimiento_contacts_name
                        'veta_requerimiento_contacts_name'   =>
                            array(
                                'type'    => 'relate',
                                'link'    => true,
                                'label'   => 'LBL_VETA_REQUERIMIENTO_CONTACTS_FROM_CONTACTS_TITLE',
                                'width'   => '10%',
                                'default' => true,
                                'id'      => 'VETA_REQUERIMIENTO_CONTACTSCONTACTS_IDA',
                                'name'    => 'veta_requerimiento_contacts_name',
                            ),
                        //endregion

                        //region assigned_user_id
                        'assigned_user_id'                   =>
                            array(
                                'name'     => 'assigned_user_id',
                                'label'    => 'LBL_ASSIGNED_TO',
                                'type'     => 'enum',
                                'function' =>
                                    array(
                                        'name'   => 'get_user_array',
                                        'params' =>
                                            array(
                                                0 => false,
                                            ),
                                    ),
                                'default'  => true,
                                'width'    => '10%',
                            ),
                        //endregion

                        //region soel_home_phone_lead
                        'soel_home_phone_lead'               =>
                            array(
                                'type'     => 'varchar',
                                'default'  => true,
                                'label'    => 'LBL_SOEL_HOME_PHONE_LEAD',
                                'width'    => '10%',
                                'name'     => 'soel_home_phone_lead',
                                'sortable' => false,
                            ),
                        //endregion

                        //region soel_mobile_phone_lead
                        'soel_mobile_phone_lead'             =>
                            array(
                                'type'     => 'varchar',
                                'default'  => true,
                                'label'    => 'LBL_SOEL_MOBILE_PHONE_LEAD',
                                'width'    => '10%',
                                'name'     => 'soel_mobile_phone_lead',
                                'sortable' => false,
                            ),
                        //endregion

                        //region soel_estado_lead
                        'soel_estado_lead'                   =>
                            array(
                                'type'     => 'enum',
                                'default'  => true,
                                'label'    => 'LBL_SOEL_ESTADO_LEAD',
                                'width'    => '10%',
                                'name'     => 'soel_estado_lead',
                                'sortable' => false,
                            ),
                        //endregion

                        //region soel_fuente_lead
                        'soel_fuente_lead'                   =>
                            array(
                                'type'     => 'enum',
                                'default'  => true,
                                'label'    => 'LBL_SOEL_FUENTE_LEAD',
                                'width'    => '10%',
                                'name'     => 'soel_fuente_lead',
                                'sortable' => false,
                            ),
                        //endregion

                        //region soel_pais_lead
                        'soel_pais_lead'                     =>
                            array(
                                'type'     => 'enum',
                                'default'  => true,
                                'label'    => 'LBL_SOEL_PAIS_LEAD',
                                'width'    => '10%',
                                'name'     => 'soel_pais_lead',
                                'sortable' => false,
                            ),
                        //endregion

                        //region soel_departamento_lead
                        'soel_departamento_lead'             =>
                            array(
                                'type'     => 'enum',
                                'default'  => true,
                                'label'    => 'LBL_SOEL_DEPARTAMENTO_LEAD',
                                'width'    => '10%',
                                'name'     => 'soel_departamento_lead',
                                'sortable' => false,
                            ),
                        //endregion

                        //region soel_ciudad_lead
                        'soel_ciudad_lead'                   =>
                            array(
                                'type'     => 'enum',
                                'default'  => true,
                                'label'    => 'LBL_SOEL_CIUDAD_LEAD',
                                'width'    => '10%',
                                'name'     => 'soel_ciudad_lead',
                                'sortable' => false,
                            ),
                        //endregion

                        //region soel_visa_lead
                        'soel_visa_lead'                     =>
                            array(
                                'type'     => 'varchar',
                                'default'  => true,
                                'label'    => 'LBL_SOEL_VISA_LEAD',
                                'width'    => '10%',
                                'name'     => 'soel_visa_lead',
                                'sortable' => false,
                            ),
                        //endregion

                        //region soel_pasaporte_lead
                        'soel_pasaporte_lead'                     =>
                            array(
                                'type'     => 'varchar',
                                'default'  => true,
                                'label'    => 'LBL_SOEL_PASAPORTE_LEAD',
                                'width'    => '10%',
                                'name'     => 'soel_pasaporte_lead',
                                'sortable' => false,
                            ),
                        //endregion

                        //region soel_asignado_lead
                        'soel_asignado_lead'                 =>
                            array(
                                'type'     => 'enum',
                                'default'  => true,
                                'label'    => 'LBL_SOEL_ASIGNADO_LEAD',
                                'width'    => '10%',
                                'name'     => 'soel_asignado_lead',
                                'sortable' => false,
                                'function' => array(
                                    'name' => 'getAsignadoLeads'
                                ),
                            ),
                        //endregion

                        //region soel_campana_lead
                        'soel_campana_lead'                  =>
                            array(
                                'type'     => 'enum',
                                'default'  => true,
                                'label'    => 'LBL_SOEL_CAMPANA_LEAD',
                                'width'    => '10%',
                                'name'     => 'soel_campana_lead',
                                'sortable' => false,
                                'function' => array(
                                    'name' => 'getCampanaLeads'
                                ),
                            ),
                        //endregion

                        //region soel_convertido_lead
                        'soel_convertido_lead'                 =>
                            array(
                                'type'     => 'enum',
                                'default'  => true,
                                'label'    => 'LBL_SOEL_CONVERTIDO_LEAD',
                                'width'    => '10%',
                                'name'     => 'soel_convertido_lead',
                                'sortable' => false,
                                'function' => array(
                                    'name' => 'getYesNoOptions'
                                ),
                            ),
                        //endregion

                        //region soel_home_phone_contact
                        'soel_home_phone_contact'            =>
                            array(
                                'type'     => 'varchar',
                                'default'  => true,
                                'label'    => 'LBL_SOEL_HOME_PHONE_CONTACT',
                                'width'    => '10%',
                                'name'     => 'soel_home_phone_contact',
                                'sortable' => false,
                            ),
                        //endregion

                        //region soel_mobile_phone_contact
                        'soel_mobile_phone_contact'          =>
                            array(
                                'type'     => 'varchar',
                                'default'  => true,
                                'label'    => 'LBL_SOEL_MOBILE_PHONE_CONTACT',
                                'width'    => '10%',
                                'name'     => 'soel_mobile_phone_contact',
                                'sortable' => false,
                            ),
                        //endregion

                        //region soel_fuente_contact
                        'soel_fuente_contact'                =>
                            array(
                                'type'     => 'enum',
                                'default'  => true,
                                'label'    => 'LBL_SOEL_FUENTE_CONTACT',
                                'width'    => '10%',
                                'name'     => 'soel_fuente_contact',
                                'sortable' => false,
                            ),
                        //endregion

                        //region soel_pais_contact
                        'soel_pais_contact'                  =>
                            array(
                                'type'     => 'enum',
                                'default'  => true,
                                'label'    => 'LBL_SOEL_PAIS_CONTACT',
                                'width'    => '10%',
                                'name'     => 'soel_pais_contact',
                                'sortable' => false,
                            ),
                        //endregion

                        //region soel_departamento_contact
                        'soel_departamento_contact'          =>
                            array(
                                'type'     => 'enum',
                                'default'  => true,
                                'label'    => 'LBL_SOEL_DEPARTAMENTO_CONTACT',
                                'width'    => '10%',
                                'name'     => 'soel_departamento_contact',
                                'sortable' => false,
                            ),
                        //endregion

                        //region soel_ciudad_contact
                        'soel_ciudad_contact'                =>
                            array(
                                'type'     => 'enum',
                                'default'  => true,
                                'label'    => 'LBL_SOEL_CIUDAD_CONTACT',
                                'width'    => '10%',
                                'name'     => 'soel_ciudad_contact',
                                'sortable' => false,
                            ),
                        //endregion

                        //region soel_asignado_contact
                        'soel_asignado_contact'              =>
                            array(
                                'type'     => 'enum',
                                'default'  => true,
                                'label'    => 'LBL_SOEL_ASIGNADO_CONTACT',
                                'width'    => '10%',
                                'name'     => 'soel_asignado_contact',
                                'sortable' => false,
                                'function' => array(
                                    'name' => 'getAsignadoLeads'
                                ),
                            ),
                        //endregion

                        //region soel_visa_contact
                        'soel_visa_contact'                  =>
                            array(
                                'type'     => 'varchar',
                                'default'  => true,
                                'label'    => 'LBL_SOEL_VISA_CONTACT',
                                'width'    => '10%',
                                'name'     => 'soel_visa_contact',
                                'sortable' => false,
                            ),
                        //endregion

                        //region soel_campana_contact
                        'soel_campana_contact'               =>
                            array(
                                'type'     => 'enum',
                                'default'  => true,
                                'label'    => 'LBL_SOEL_CAMPANA_CONTACT',
                                'width'    => '10%',
                                'name'     => 'soel_campana_contact',
                                'sortable' => false,
                                'function' => array(
                                    'name' => 'getCampanaLeads'
                                ),
                            ),
                        //endregion

                        //region soel_oficina_comercial
                        'soel_oficina_comercial'             =>
                            array(
                                'type'     => 'enum',
                                'default'  => true,
                                'label'    => 'LBL_SOEL_OFICINA_COMERCIAL',
                                'width'    => '10%',
                                'name'     => 'soel_oficina_comercial',
                                'sortable' => false,
                                'function' => array(
                                    'name' => 'getOficinasComercial'
                                ),
                            ),
                        //endregion


                          //---------NUEVOS FIELDS-----------
 
                            //region industry_aplicant
                            'industry_aplicant'                  =>
                            array(
                                'type'     => 'varchar',
                                'default'  => true,
                                'label'    => 'LBL_INDUSTRY_APLICANT',
                                'width'    => '10%',
                                'name'     => 'industry_aplicant',
                                'sortable' => false,
                            ),
                             //endregion
    
    
                                //region aplicant_first_payment_amount
                            'aplicant_first_payment_amount'                  =>
                            array(
                                'type'     => 'varchar',
                                'default'  => true,
                                'label'    => 'LBL_APPLICANT_FIRST_PAYMENT_AMOUNT',
                                'width'    => '10%',
                                'name'     => 'aplicant_first_payment_amount',
                                'sortable' => false,
                            ),
                             //endregion
    
                                //region profession
                            'profession'                  =>
                            array(
                                'type'     => 'varchar',
                                'default'  => true,
                                'label'    => 'LBL_PROFESSION',
                                'width'    => '10%',
                                'name'     => 'profession',
                                'sortable' => false,
                            ),
                             //endregion
    
                                //region current_visa_subclass
                            'current_visa_subclass'                  =>
                            array(
                                'type'     => 'varchar',
                                'default'  => true,
                                'label'    => 'LBL_CURRENT_VISA_SUBCLASS',
                                'width'    => '10%',
                                'name'     => 'current_visa_subclass',
                                'sortable' => false,
                            ),
                             //endregion
    
                                //region current_job_position
                            'current_job_position'                  =>
                            array(
                                'type'     => 'varchar',
                                'default'  => true,
                                'label'    => 'LBL_CURRENT_JOB_POSITION',
                                'width'    => '10%',
                                'name'     => 'current_job_position',
                                'sortable' => false,
                            ),
                             //endregion
    
                                //region month_of_experience
                            'month_of_experience'                  =>
                            array(
                                'type'     => 'varchar',
                                'default'  => true,
                                'label'    => 'LBL_MONTHS_OF_EXPERIENCEL',
                                'width'    => '10%',
                                'name'     => 'month_of_experience',
                                'sortable' => false,
                            ),
                             //endregion
    
                                //region level_of_english
                            'level_of_english'                  =>
                            array(
                                'type'     => 'varchar',
                                'default'  => true,
                                'label'    => 'LBL_LEVEL_OF_ENGLISH',
                                'width'    => '10%',
                                'name'     => 'level_of_english',
                                'sortable' => false,
                            ),
                             //endregion
    
                                //region nationality
                            'nationality'                  =>
                            array(
                                'type'     => 'varchar',
                                'default'  => true,
                                'label'    => 'LBL_NATIONALITY',
                                'width'    => '10%',
                                'name'     => 'nationality',
                                'sortable' => false,
                            ),
                             //endregion
    
                                //region potential_visa_subclass
                            'potential_visa_subclass'                  =>
                            array(
                                'type'     => 'varchar',
                                'default'  => true,
                                'label'    => 'LBL_POTENTIAL_VISA_SUBCLASS',
                                'width'    => '10%',
                                'name'     => 'potential_visa_subclass',
                                'sortable' => false,
                            ),
                             //endregion
    
                                //region cost_agrement_number
                            'cost_agrement_number'                  =>
                            array(
                                'type'     => 'varchar',
                                'default'  => true,
                                'label'    => 'LBL_COST_AGREMENT_NUMBER',
                                'width'    => '10%',
                                'name'     => 'cost_agrement_number',
                                'sortable' => false,
                            ),
                             //endregion
    
                                //region cost_agrement_visa_subclass
                            'cost_agrement_visa_subclass'                  =>
                            array(
                                'type'     => 'varchar',
                                'default'  => true,
                                'label'    => 'LBL_COST_AGREMENT_VISA_SUBCLASS',
                                'width'    => '10%',
                                'name'     => 'cost_agrement_visa_subclass',
                                'sortable' => false,
                            ),
                             //endregion
    
    
                                //region migration_agent_name
                            'migration_agent_name'                  =>
                            array(
                                'type'     => 'varchar',
                                'default'  => true,
                                'label'    => 'LBL_MIGRATION_AGENT_NAME',
                                'width'    => '10%',
                                'name'     => 'migration_agent_name',
                                'sortable' => false,
                            ),
                             //endregion
    
                                //region leap_id
                            'leap_id'                  =>
                            array(
                                'type'     => 'varchar',
                                'default'  => true,
                                'label'    => 'LBL_LEAP_ID',
                                'width'    => '10%',
                                'name'     => 'leap_id',
                                'sortable' => false,
                            ),
                             //endregion
    
                                //region recluter_name
                            'recluter_name'                  =>
                            array(
                                'type'     => 'varchar',
                                'default'  => true,
                                'label'    => 'LBL_RECLUTER_NAME',
                                'width'    => '10%',
                                'name'     => 'recluter_name',
                                'sortable' => false,
                            ),
                             //endregion
    
                                //region company_name
                            'company_name'                  =>
                            array(
                                'type'     => 'varchar',
                                'default'  => true,
                                'label'    => 'LBL_COMPANY_NAME',
                                'width'    => '10%',
                                'name'     => 'company_name',
                                'sortable' => false,
                            ),
                             //endregion
    
                                //region company_city
                            'company_city'                  =>
                            array(
                                'type'     => 'varchar',
                                'default'  => true,
                                'label'    => 'LBL_COMPANY_CITY',
                                'width'    => '10%',
                                'name'     => 'company_city',
                                'sortable' => false,
                            ),
                             //endregion
    
                                //region company_industry
                            'company_industry'                  =>
                            array(
                                'type'     => 'varchar',
                                'default'  => true,
                                'label'    => 'LBL_COMPANY_INDUSTRY',
                                'width'    => '10%',
                                'name'     => 'company_industry',
                                'sortable' => false,
                            ),
                             //endregion
    
                                //region email_company
                            'email_company'                  =>
                            array(
                                'type'     => 'varchar',
                                'default'  => true,
                                'label'    => 'LBL_EMAIL_COMPANY',
                                'width'    => '10%',
                                'name'     => 'email_company',
                                'sortable' => false,
                            ),
                             //endregion
    
                                //region phone_company
                            'phone_company'                  =>
                            array(
                                'type'     => 'varchar',
                                'default'  => true,
                                'label'    => 'LBL_PHONE_COMPANY',
                                'width'    => '10%',
                                'name'     => 'phone_company',
                                'sortable' => false,
                            ),
                             //endregion
    
    
                                //region company_first_payment_amount
                            'company_first_payment_amount'                  =>
                            array(
                                'type'     => 'varchar',
                                'default'  => true,
                                'label'    => 'LBL_COMPANY_FIRST_PAYMENT_AMOUNT',
                                'width'    => '10%',
                                'name'     => 'company_first_payment_amount',
                                'sortable' => false,
                            ),
                             //endregion



                      //---------NUEVOS 7 FIELDS-----------

                         //region secondary_aplicant_name
                         'secondary_aplicant_name'                  =>
                         array(
                             'type'     => 'varchar',
                             'default'  => true,
                             'label'    => 'LBL_SECONDARY_APLICANT_NAME',
                             'width'    => '10%',
                             'name'     => 'secondary_aplicant_name',
                             'sortable' => false,
                         ),
                          //endregion
    
                         //region secondary_pasport_number
                         'secondary_pasport_number'                  =>
                         array(
                             'type'     => 'varchar',
                             'default'  => true,
                             'label'    => 'LBL_SECONDARY_PASPORT_NUMBER',
                             'width'    => '10%',
                             'name'     => 'secondary_pasport_number',
                             'sortable' => false,
                         ),
                          //endregion

                        
                         //region dependent_name
                         'dependent_name'                  =>
                         array(
                             'type'     => 'varchar',
                             'default'  => true,
                             'label'    => 'LBL_DEPENDENT_NAME',
                             'width'    => '10%',
                             'name'     => 'dependent_name',
                             'sortable' => false,
                         ),
                          //endregion

                        
                        
                         //region aplicant_mmm_fee
                         'aplicant_mmm_fee'                  =>
                         array(
                             'type'     => 'varchar',
                             'default'  => true,
                             'label'    => 'LBL_APLICANT_MMM_FEE',
                             'width'    => '10%',
                             'name'     => 'aplicant_mmm_fee',
                             'sortable' => false,
                         ),
                          //endregion

                        
                         //region second_dependent_name
                         'second_dependent_name'                  =>
                         array(
                             'type'     => 'varchar',
                             'default'  => true,
                             'label'    => 'LBL_SECOND_DEPENDENT_NAME',
                             'width'    => '10%',
                             'name'     => 'second_dependent_name',
                             'sortable' => false,
                         ),
                          //endregion


                          //---------NUEVOS 11 FIELDS-----------


                        //region third_dependent_name
                        'third_dependent_name'                  =>
                        array(
                            'type'     => 'varchar',
                            'default'  => true,
                            'label'    => 'LBL_THIRD_DEPENDENT_NAME',
                            'width'    => '10%',
                            'name'     => 'third_dependent_name',
                            'sortable' => false,
                        ),
                         //endregion

                         //region consultation_fee
                         'consultation_fee'                  =>
                         array(
                             'type'     => 'varchar',
                             'default'  => true,
                             'label'    => 'LBL_CONSULTATION_FEE',
                             'width'    => '10%',
                             'name'     => 'consultation_fee',
                             'sortable' => false,
                         ),
                          //endregion

                        //region aplicant_departments_visa_fee
                        'aplicant_departments_visa_fee'                  =>
                        array(
                            'type'     => 'varchar',
                            'default'  => true,
                            'label'    => 'LBL_APLICANT_DEPARTMENTS_VISA_FEE',
                            'width'    => '10%',
                            'name'     => 'aplicant_departments_visa_fee',
                            'sortable' => false,
                        ),
                         //endregion

                         //region company_mmm_fee
                         'company_mmm_fee'                  =>
                         array(
                             'type'     => 'varchar',
                             'default'  => true,
                             'label'    => 'LBL_COMPANY_MMM_FEE',
                             'width'    => '10%',
                             'name'     => 'company_mmm_fee',
                             'sortable' => false,
                         ),
                          //endregion

                        //region aplicant_company_mmm
                        'aplicant_company_mmm'                  =>
                        array(
                            'type'     => 'varchar',
                            'default'  => true,
                            'label'    => 'LBL_APLICANT_COMPANY_MMM',
                            'width'    => '10%',
                            'name'     => 'aplicant_company_mmm',
                            'sortable' => false,
                        ),
                         //endregion

                         //region Total
                         'Total'                  =>
                         array(
                             'type'     => 'varchar',
                             'default'  => true,
                             'label'    => 'LBL_TOTAL',
                             'width'    => '10%',
                             'name'     => 'Total',
                             'sortable' => false,
                         ),
                          //endregion

                        //region aplicant_company_mmm_fees
                        'aplicant_company_mmm_fees'                  =>
                        array(
                            'type'     => 'varchar',
                            'default'  => true,
                            'label'    => 'LBL_APLICANT_COMPANY_MMM_FEES',
                            'width'    => '10%',
                            'name'     => 'aplicant_company_mmm_fees',
                            'sortable' => false,
                        ),
                         //endregion

                         //region total_paid
                         'total_paid'                  =>
                         array(
                             'type'     => 'varchar',
                             'default'  => true,
                             'label'    => 'LBL_TOTAL_PAID',
                             'width'    => '10%',
                             'name'     => 'total_paid',
                             'sortable' => false,
                         ),
                          //endregion

                        //region ocupation
                        'ocupation'                  =>
                        array(
                            'type'     => 'varchar',
                            'default'  => true,
                            'label'    => 'LBL_OCUPATION',
                            'width'    => '10%',
                            'name'     => 'ocupation',
                            'sortable' => false,
                        ),
                         //endregion

                         //region main_aplicant_name
                         'main_aplicant_name'                  =>
                         array(
                             'type'     => 'varchar',
                             'default'  => true,
                             'label'    => 'LBL_MAIN_APLICANT_NAME',
                             'width'    => '10%',
                             'name'     => 'main_aplicant_name',
                             'sortable' => false,
                         ),
                          //endregion




                        //FILTROS FECHAS

                        //region date_entered
                        'date_entered'                       => array(
                            'type'    => 'datetime',
                            'label'   => 'LBL_DATE_ENTERED',
                            'width'   => '10%',
                            'default' => true,
                            'name'    => 'date_entered'
                        ),
                        //endregion

                        //region soel_fecha_modificacion_lead
                        'soel_fecha_modificacion_lead'       =>
                            array(
                                'type'     => 'datetime',
                                'default'  => true,
                                'label'    => 'LBL_SOEL_FECHA_MODIFICACION_LEAD',
                                'width'    => '10%',
                                'name'     => 'soel_fecha_modificacion_lead',
                                'sortable' => false
                            ),
                        //endregion

                        //region soel_fecha_modificacion_contact
                        'soel_fecha_modificacion_contact'    =>
                            array(
                                'type'     => 'datetime',
                                'default'  => true,
                                'label'    => 'LBL_SOEL_FECHA_MODIFICACION_CONTACT',
                                'width'    => '10%',
                                'name'     => 'soel_fecha_modificacion_contact',
                                'sortable' => false,
                            ),
                        //endregion

                        //region fecha_viaje
                        'fecha_viaje'                        => array(
                            'type'    => 'date',
                            'label'   => 'LBL_FECHA_VIAJE',
                            'width'   => '10%',
                            'default' => true,
                            'name'    => 'fecha_viaje'
                        ),
                        //endregion

                        //region fecha_proximo_contacto
                        'fecha_proximo_contacto'             =>
                            array(
                                'type'    => 'date',
                                'label'   => 'LBL_FECHA_PROXIMO_CONTACTO',
                                'width'   => '10%',
                                'default' => true,
                                'name'    => 'fecha_proximo_contacto',
                            ),
                        //endregion

                        //region fecha_ultimo_contacto
                        'fecha_ultimo_contacto'              =>
                            array(
                                'type'    => 'date',
                                'label'   => 'LBL_FECHA_ULTIMO_CONTACTO',
                                'width'   => '10%',
                                'default' => true,
                                'name'    => 'fecha_ultimo_contacto',
                            ),
                        //endregion

                        //region fecha_primer_presupuesto
                        'fecha_primer_presupuesto'           =>
                            array(
                                'type'    => 'date',
                                'label'   => 'LBL_FECHA_PRIMER_PRESUPUESTO',
                                'width'   => '10%',
                                'default' => true,
                                'name'    => 'fecha_primer_presupuesto',
                            ),
                        //endregion

                        //region soel_fecha_expiracion_visa_lead
                        'soel_fecha_expiracion_visa_lead'    =>
                            array(
                                'type'     => 'datetime',
                                'default'  => true,
                                'label'    => 'LBL_SOEL_FECHA_EXPIRACION_VISA_LEAD',
                                'width'    => '10%',
                                'name'     => 'soel_fecha_expiracion_visa_lead',
                                'sortable' => false,
                            ),
                        //endregion

                        //region soel_fecha_expiracion_visa_contact
                        'soel_fecha_expiracion_visa_contact' =>
                            array(
                                'type'     => 'datetime',
                                'default'  => true,
                                'label'    => 'LBL_SOEL_FECHA_EXPIRACION_VISA_CONTACT',
                                'width'    => '10%',
                                'name'     => 'soel_fecha_expiracion_visa_contact',
                                'sortable' => false,
                            ),
                        //endregion

                          //NEW FIELD FECHA

                          //region ..........consultation_date...........
                          'consultation_date'                  =>
                          array(
                              'type'     => 'datetime',
                              'default'  => true,
                              'label'    => 'LBL_CONSULTATION_DATE',
                              'width'    => '10%',
                              'name'     => 'consultation_date',
                              'sortable' => false,
                          ),
                           //endregion


                              //region ..........aplicant_1st_payment_date...........
                       'aplicant_1st_payment_date'                  =>
                       array(
                           'type'     => 'datetime',
                           'default'  => true,
                           'label'    => 'LBL_APPLICANT_1ST_PAYMENT_DATE',
                           'width'    => '10%',
                           'name'     => 'aplicant_1st_payment_date',
                           'sortable' => false,
                       ),
                        //endregion

                         //region ..........quote_date...........
                       'quote_date'                  =>
                       array(
                           'type'     => 'datetime',
                           'default'  => true,
                           'label'    => 'LBL_QUOTE_DATE',
                           'width'    => '10%',
                           'name'     => 'quote_date',
                           'sortable' => false,
                       ),
                        //endregion

                         //region company_1st_payment_date
                       'company_1st_payment_date'                  =>
                       array(
                           'type'     => 'datetime',
                           'default'  => true,
                           'label'    => 'LBL_COMPANY_1ST_PAYMENT_DATE',
                           'width'    => '10%',
                           'name'     => 'company_1st_payment_date',
                           'sortable' => false,
                       ),
                        //endregion
                    ),

                     //region company_sbs_expiry_date
                     'company_sbs_expiry_date'                  =>
                     array(
                         'type'     => 'datetime',
                         'default'  => true,
                         'label'    => 'LBL_COMPANY_SBS_EXPIRY_DATE',
                         'width'    => '10%',
                         'name'     => 'company_sbs_expiry_date',
                         'sortable' => false,
                     ),
                      //endregion

                
                	//region secondary_dob
                    'secondary_dob'                  =>
                    array(
                        'type'     => 'datetime',
                        'default'  => true,
                        'label'    => 'LBL_SECONDARY_DOB',
                        'width'    => '10%',
                        'name'     => 'secondary_dob',
                        'sortable' => false,
                    ),
                     //endregion
                     
                     
                     
                      //region dependent_dob
                    'dependent_dob'                  =>
                    array(
                        'type'     => 'datetime',
                        'default'  => true,
                        'label'    => 'LBL_DEPENDENT_DOB',
                        'width'    => '10%',
                        'name'     => 'dependent_dob',
                        'sortable' => false,
                    ),
                     //endregion
                     
                      
                        //region second_dependent_dob
                    'second_dependent_dob'                  =>
                    array(
                        'type'     => 'datetime',
                        'default'  => true,
                        'label'    => 'LBL_SECOND_DEPENDENT_DOB',
                        'width'    => '10%',
                        'name'     => 'second_dependent_dob',
                        'sortable' => false,
                    ),
                     //endregion



                     //Changes 08102021
                        'recruitment_exp_date'                  =>
                        array(
                            'type'     => 'datetime',
                            'default'  => true,
                            'label'    => 'LBL_RECRUITMENT_EXP_DATE',
                            'width'    => '10%',
                            'name'     => 'recruitment_exp_date',
                            'sortable' => false,
                        ),
                        'visa_app_date'                  =>
                        array(
                            'type'     => 'datetime',
                            'default'  => true,
                            'label'    => 'LBL_VISA_APP_DATE',
                            'width'    => '10%',
                            'name'     => 'visa_app_date',
                            'sortable' => false,
                        ),
                        'visa_app_exp_date'                  =>
                        array(
                            'type'     => 'datetime',
                            'default'  => true,
                            'label'    => 'LBL_VISA_APP_EXP_DATE',
                            'width'    => '10%',
                            'name'     => 'visa_app_exp_date',
                            'sortable' => false,
                        ),
                        'skill_assessment_app_date'                  =>
                        array(
                            'type'     => 'datetime',
                            'default'  => true,
                            'label'    => 'LBL_SKILL_ASSESSMENT_APP_DATE',
                            'width'    => '10%',
                            'name'     => 'skill_assessment_app_date',
                            'sortable' => false,
                        ),
                        'skill_assessment_app_exp_date'                  =>
                        array(
                            'type'     => 'datetime',
                            'default'  => true,
                            'label'    => 'LBL_SKILL_ASSESSMENT_APP_EXP_DATE',
                            'width'    => '10%',
                            'name'     => 'skill_assessment_app_exp_date',
                            'sortable' => false,
                        ),
                        'nomination_app_date'                  =>
                        array(
                            'type'     => 'datetime',
                            'default'  => true,
                            'label'    => 'LBL_NOMINATION_APP_DATE',
                            'width'    => '10%',
                            'name'     => 'nomination_app_date',
                            'sortable' => false,
                        ),
                        'nomination_app_exp_date'                  =>
                        array(
                            'type'     => 'datetime',
                            'default'  => true,
                            'label'    => 'LBL_NOMINATION_APP_EXP_DATE',
                            'width'    => '10%',
                            'name'     => 'nomination_app_exp_date',
                            'sortable' => false,
                        ),



            ),
        'templateMeta' =>
            array(
                'maxColumns'      => '3',
                'maxColumnsBasic' => '4',
                'widths'          =>
                    array(
                        'label' => '10',
                        'field' => '30',
                    ),
            ),
    );
?>
