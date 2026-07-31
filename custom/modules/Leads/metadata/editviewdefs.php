<?php
$viewdefs ['Leads'] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'hidden' => 
        array (
          0 => '<input type="hidden" name="prospect_id" value="{if isset($smarty.request.prospect_id)}{$smarty.request.prospect_id}{else}{$bean->prospect_id}{/if}">',
          1 => '<input type="hidden" name="account_id" value="{if isset($smarty.request.account_id)}{$smarty.request.account_id}{else}{$bean->account_id}{/if}">',
          2 => '<input type="hidden" name="contact_id" value="{if isset($smarty.request.contact_id)}{$smarty.request.contact_id}{else}{$bean->contact_id}{/if}">',
          3 => '<input type="hidden" name="opportunity_id" value="{if isset($smarty.request.opportunity_id)}{$smarty.request.opportunity_id}{else}{$bean->opportunity_id}{/if}">',
        ),
        'buttons' => 
        array (
          0 => 'SAVE',
          1 => 'CANCEL',
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
      'javascript' => '<script type="text/javascript" language="Javascript">function copyAddressRight(form)  {ldelim} form.alt_address_street.value = form.primary_address_street.value;form.alt_address_city.value = form.primary_address_city.value;form.alt_address_state.value = form.primary_address_state.value;form.alt_address_postalcode.value = form.primary_address_postalcode.value;form.alt_address_country.value = form.primary_address_country.value;return true; {rdelim} function copyAddressLeft(form)  {ldelim} form.primary_address_street.value =form.alt_address_street.value;form.primary_address_city.value = form.alt_address_city.value;form.primary_address_state.value = form.alt_address_state.value;form.primary_address_postalcode.value =form.alt_address_postalcode.value;form.primary_address_country.value = form.alt_address_country.value;return true; {rdelim} </script>',
      'useTabs' => true,
      'tabDefs' => 
      array (
        'LBL_CONTACT_INFORMATION' => 
        array (
          'newTab' => true,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL2' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_PANEL_ADVANCED' => 
        array (
          'newTab' => true,
          'panelDefault' => 'expanded',
        ),
      ),
    ),
    'panels' => 
    array (
      'LBL_CONTACT_INFORMATION' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'first_name',
            'customCode' => '{html_options name="salutation" id="salutation" options=$fields.salutation.options selected=$fields.salutation.value}&nbsp;<input name="first_name"  id="first_name" size="25" maxlength="25" type="text" value="{$fields.first_name.value}">',
          ),
          1 => 'last_name',
        ),
        1 => 
        array (
          0 => 'phone_mobile',
          1 => 
          array (
            'name' => 'phone_home',
            'comment' => 'Home phone number of the contact',
            'label' => 'LBL_HOME_PHONE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'pasaporte_c',
            'label' => 'LBL_PASAPORTE',
          ),
          1 => 
          array (
            'name' => 'visa_c',
            'label' => 'LBL_VISA',
          ),
        ),
        3 => 
        array (
          0 => 'email1',
          1 => 
          array (
            'name' => 'ciudad_tmp_c',
            'label' => 'LBL_CIUDAD_TMP',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'pais_c',
            'studio' => 'visible',
            'label' => 'LBL_PAIS',
          ),
          1 => 
          array (
            'name' => 'departamento_c',
            'studio' => 'visible',
            'label' => 'LBL_DEPARTAMENTO',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'ciudad_c',
            'studio' => 'visible',
            'label' => 'LBL_CIUDAD',
          ),
          1 => 
          array (
            'name' => 'birthdate',
            'comment' => 'The birthdate of the contact',
            'label' => 'LBL_BIRTHDATE',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'primary_address_postalcode',
            'comment' => 'Postal code for primary address',
            'label' => 'LBL_PRIMARY_ADDRESS_POSTALCODE',
          ),
          1 => 
          array (
            'name' => 'primary_address_street',
            'hideLabel' => true,
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'primary',
              'rows' => 2,
              'cols' => 30,
              'maxlength' => 150,
            ),
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'expiracion_visa_c',
            'label' => 'LBL_EXPIRACION_VISA',
          ),
          1 => 
          array (
            'name' => 'fecha_expiracion_visa_c',
            'label' => 'LBL_FECHA_EXPIRACION_VISA',
          ),
        ),
        8 => 
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
        9 => 
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
        10 => 
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
        11 => 
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
        12 => 
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
        13 => 
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
        14 => 
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
        15 => 
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
        16 => 
        array (
          0 => 
          array (
            'name' => 'main_aplicant_name',
            'label' => 'LBL_MAIN_APLICANT_NAME',
          ),
        ),
        17 => 
        array (
          0 => 'description',
        ),
        18 => 
        array (
          0 => 
          array (
            'name' => 'nvc_companies_leads_1_name',
            'label' => 'LBL_NVC_COMPANIES_LEADS_1_FROM_NVC_COMPANIES_TITLE',
          ),
          1 => '',
        ),
      ),
      'lbl_editview_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'campana_c',
            'studio' => 'visible',
            'label' => 'LBL_CAMPANA',
            'customCode' => '{if $fields.campana_c.value}{$fields.campana_c.value}{else}@@FIELD@@{/if}',
          ),
        ),
      ),
      'LBL_PANEL_ADVANCED' => 
      array (
        0 => 
        array (
          0 => 'status',
          1 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'carrera_universitaria_c',
            'label' => 'LBL_CARRERA_UNIVERSITARIA',
          ),
          1 => 
          array (
            'name' => 'trabajo_actual_c',
            'label' => 'LBL_TRABAJO_ACTUAL',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'australian_citizen_partner_c',
            'label' => 'LBL_AUSTRALIAN_CITIZEN_PARTNER',
          ),
          1 => 
          array (
            'name' => 'currently_living_together_c',
            'label' => 'LBL_CURRENTLY_LIVING_TOGETHER',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'marketing_question_1_c',
            'label' => 'LBL_MARKETING_QUESTION_1',
          ),
          1 => 
          array (
            'name' => 'marketing_question_2_c',
            'label' => 'LBL_MARKETING_QUESTION_2',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'edad_c',
            'label' => 'LBL_EDAD',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
;
?>
