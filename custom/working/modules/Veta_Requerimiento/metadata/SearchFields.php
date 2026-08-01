<?php
// created: 2021-10-19 18:57:23
$searchFields['Veta_Requerimiento'] = array (
  'name' => 
  array (
    'query_type' => 'default',
  ),
  'assigned_user_id' => 
  array (
    'query_type' => 'default',
  ),
  'current_user_only' => 
  array (
    'query_type' => 'default',
    'db_field' => 
    array (
      0 => 'assigned_user_id',
    ),
    'my_items' => true,
    'vname' => 'LBL_INDUSTRY_APLICANT',
    'type' => 'bool',
  ),
  'soel_home_phone_lead' => 
  array (
    'query_type' => 'format',
    'operator' => 'subquery',
    'subquery' => 'SELECT veta_requerimiento.id AS ID FROM veta_requerimiento
                            INNER JOIN veta_requerimiento_leads_c ON veta_requerimiento_leads_c.veta_requerimiento_leadsveta_requerimiento_idb = veta_requerimiento.id AND veta_requerimiento_leads_c.deleted = 0 
                            INNER JOIN leads ON leads.id = veta_requerimiento_leads_c.veta_requerimiento_leadsleads_ida
                         WHERE leads.deleted = 0 AND TRIM(UPPER(leads.phone_home)) LIKE  \'{0}\'',
    'db_field' => 
    array (
      0 => 'id',
    ),
  ),
  'soel_mobile_phone_lead' => 
  array (
    'query_type' => 'format',
    'operator' => 'subquery',
    'subquery' => 'SELECT veta_requerimiento.id AS ID FROM veta_requerimiento
                            INNER JOIN veta_requerimiento_leads_c ON veta_requerimiento_leads_c.veta_requerimiento_leadsveta_requerimiento_idb = veta_requerimiento.id AND veta_requerimiento_leads_c.deleted = 0 
                            INNER JOIN leads ON leads.id = veta_requerimiento_leads_c.veta_requerimiento_leadsleads_ida
                         WHERE leads.deleted = 0 AND TRIM(UPPER(leads.phone_mobile)) LIKE  \'{0}\'',
    'db_field' => 
    array (
      0 => 'id',
    ),
  ),
  'soel_estado_lead' => 
  array (
    'query_type' => 'format',
    'operator' => 'subquery',
    'subquery' => 'SELECT veta_requerimiento.id AS ID FROM veta_requerimiento
                            INNER JOIN veta_requerimiento_leads_c ON veta_requerimiento_leads_c.veta_requerimiento_leadsveta_requerimiento_idb = veta_requerimiento.id AND veta_requerimiento_leads_c.deleted = 0 
                            INNER JOIN leads ON leads.id = veta_requerimiento_leads_c.veta_requerimiento_leadsleads_ida
                         WHERE leads.deleted = 0 AND TRIM(leads.status) IN  (\'{0}\')',
    'db_field' => 
    array (
      0 => 'id',
    ),
  ),
  'soel_fuente_lead' => 
  array (
    'query_type' => 'format',
    'operator' => 'subquery',
    'subquery' => 'SELECT veta_requerimiento.id AS ID FROM veta_requerimiento
                            INNER JOIN veta_requerimiento_leads_c ON veta_requerimiento_leads_c.veta_requerimiento_leadsveta_requerimiento_idb = veta_requerimiento.id AND veta_requerimiento_leads_c.deleted = 0 
                            INNER JOIN leads ON leads.id = veta_requerimiento_leads_c.veta_requerimiento_leadsleads_ida
                         WHERE leads.deleted = 0 AND TRIM(leads.lead_source) IN  (\'{0}\')',
    'db_field' => 
    array (
      0 => 'id',
    ),
  ),
  'soel_pais_lead' => 
  array (
    'query_type' => 'format',
    'operator' => 'subquery',
    'subquery' => 'SELECT veta_requerimiento.id AS ID FROM veta_requerimiento
                            INNER JOIN veta_requerimiento_leads_c ON veta_requerimiento_leads_c.veta_requerimiento_leadsveta_requerimiento_idb = veta_requerimiento.id AND veta_requerimiento_leads_c.deleted = 0 
                            INNER JOIN leads ON leads.id = veta_requerimiento_leads_c.veta_requerimiento_leadsleads_ida
                            INNER JOIN leads_cstm ON leads_cstm.id_c = leads.id
                         WHERE leads.deleted = 0 AND TRIM(leads_cstm.pais_c) IN  (\'{0}\')',
    'db_field' => 
    array (
      0 => 'id',
    ),
  ),
  'soel_departamento_lead' => 
  array (
    'query_type' => 'format',
    'operator' => 'subquery',
    'subquery' => 'SELECT veta_requerimiento.id AS ID FROM veta_requerimiento
                            INNER JOIN veta_requerimiento_leads_c ON veta_requerimiento_leads_c.veta_requerimiento_leadsveta_requerimiento_idb = veta_requerimiento.id AND veta_requerimiento_leads_c.deleted = 0 
                            INNER JOIN leads ON leads.id = veta_requerimiento_leads_c.veta_requerimiento_leadsleads_ida
                            INNER JOIN leads_cstm ON leads_cstm.id_c = leads.id
                         WHERE leads.deleted = 0 AND TRIM(leads_cstm.departamento_c) IN  (\'{0}\')',
    'db_field' => 
    array (
      0 => 'id',
    ),
  ),
  'soel_ciudad_lead' => 
  array (
    'query_type' => 'format',
    'operator' => 'subquery',
    'subquery' => 'SELECT veta_requerimiento.id AS ID FROM veta_requerimiento
                            INNER JOIN veta_requerimiento_leads_c ON veta_requerimiento_leads_c.veta_requerimiento_leadsveta_requerimiento_idb = veta_requerimiento.id AND veta_requerimiento_leads_c.deleted = 0 
                            INNER JOIN leads ON leads.id = veta_requerimiento_leads_c.veta_requerimiento_leadsleads_ida
                            INNER JOIN leads_cstm ON leads_cstm.id_c = leads.id
                         WHERE leads.deleted = 0 AND TRIM(leads_cstm.ciudad_c) IN  (\'{0}\')',
    'db_field' => 
    array (
      0 => 'id',
    ),
  ),
  'soel_visa_lead' => 
  array (
    'query_type' => 'format',
    'operator' => 'subquery',
    'subquery' => 'SELECT veta_requerimiento.id AS ID FROM veta_requerimiento
                            INNER JOIN veta_requerimiento_leads_c ON veta_requerimiento_leads_c.veta_requerimiento_leadsveta_requerimiento_idb = veta_requerimiento.id AND veta_requerimiento_leads_c.deleted = 0 
                            INNER JOIN leads ON leads.id = veta_requerimiento_leads_c.veta_requerimiento_leadsleads_ida
                            INNER JOIN leads_cstm ON leads_cstm.id_c = leads.id
                         WHERE leads.deleted = 0 AND TRIM(leads_cstm.visa_c) LIKE  (\'{0}\')',
    'db_field' => 
    array (
      0 => 'id',
    ),
  ),
  'soel_pasaporte_lead' => 
  array (
    'query_type' => 'format',
    'operator' => 'subquery',
    'subquery' => 'SELECT veta_requerimiento.id AS ID FROM veta_requerimiento
                            INNER JOIN veta_requerimiento_leads_c ON veta_requerimiento_leads_c.veta_requerimiento_leadsveta_requerimiento_idb = veta_requerimiento.id AND veta_requerimiento_leads_c.deleted = 0 
                            INNER JOIN leads ON leads.id = veta_requerimiento_leads_c.veta_requerimiento_leadsleads_ida
                            INNER JOIN leads_cstm ON leads_cstm.id_c = leads.id
                         WHERE leads.deleted = 0 AND TRIM(leads_cstm.pasaporte_c) LIKE  (\'{0}\')',
    'db_field' => 
    array (
      0 => 'id',
    ),
  ),
  'soel_asignado_lead' => 
  array (
    'query_type' => 'format',
    'operator' => 'subquery',
    'subquery' => 'SELECT veta_requerimiento.id AS ID FROM veta_requerimiento
                            INNER JOIN veta_requerimiento_leads_c ON veta_requerimiento_leads_c.veta_requerimiento_leadsveta_requerimiento_idb = veta_requerimiento.id AND veta_requerimiento_leads_c.deleted = 0 
                            INNER JOIN leads ON leads.id = veta_requerimiento_leads_c.veta_requerimiento_leadsleads_ida
                            INNER JOIN users asignado ON asignado.id = leads.assigned_user_id AND asignado.deleted = 0
                         WHERE leads.deleted = 0 AND asignado.id IN  (\'{0}\')',
    'db_field' => 
    array (
      0 => 'id',
    ),
  ),
  'soel_campana_lead' => 
  array (
    'query_type' => 'format',
    'operator' => 'subquery',
    'subquery' => 'SELECT veta_requerimiento.id AS ID FROM veta_requerimiento
                            INNER JOIN veta_requerimiento_leads_c ON veta_requerimiento_leads_c.veta_requerimiento_leadsveta_requerimiento_idb = veta_requerimiento.id AND veta_requerimiento_leads_c.deleted = 0 
                            INNER JOIN leads ON leads.id = veta_requerimiento_leads_c.veta_requerimiento_leadsleads_ida
                            INNER JOIN campaigns ON campaigns.id = leads.campaign_id AND campaigns.deleted = 0
                         WHERE leads.deleted = 0 AND campaigns.id IN  (\'{0}\')',
    'db_field' => 
    array (
      0 => 'id',
    ),
  ),
  'soel_convertido_lead' => 
  array (
    'query_type' => 'format',
    'operator' => 'subquery',
    'subquery' => 'SELECT veta_requerimiento.id AS ID FROM veta_requerimiento
                            INNER JOIN veta_requerimiento_leads_c ON veta_requerimiento_leads_c.veta_requerimiento_leadsveta_requerimiento_idb = veta_requerimiento.id AND veta_requerimiento_leads_c.deleted = 0 
                            INNER JOIN leads ON leads.id = veta_requerimiento_leads_c.veta_requerimiento_leadsleads_ida
                         WHERE leads.deleted = 0 AND leads.converted IN  (\'{0}\')',
    'db_field' => 
    array (
      0 => 'id',
    ),
  ),
  'soel_home_phone_contact' => 
  array (
    'query_type' => 'format',
    'operator' => 'subquery',
    'subquery' => 'SELECT veta_requerimiento.id AS ID FROM veta_requerimiento
                            INNER JOIN veta_requerimiento_contacts_c ON veta_requerimiento_contacts_c.veta_requerimiento_contactsveta_requerimiento_idb = veta_requerimiento.id AND veta_requerimiento_contacts_c.deleted = 0 
                            INNER JOIN contacts ON contacts.id = veta_requerimiento_contacts_c.veta_requerimiento_contactscontacts_ida
                         WHERE contacts.deleted = 0 AND TRIM(UPPER(contacts.phone_home)) LIKE  \'{0}\'',
    'db_field' => 
    array (
      0 => 'id',
    ),
  ),
  'soel_mobile_phone_contact' => 
  array (
    'query_type' => 'format',
    'operator' => 'subquery',
    'subquery' => 'SELECT veta_requerimiento.id AS ID FROM veta_requerimiento
                            INNER JOIN veta_requerimiento_contacts_c ON veta_requerimiento_contacts_c.veta_requerimiento_contactsveta_requerimiento_idb = veta_requerimiento.id AND veta_requerimiento_contacts_c.deleted = 0 
                            INNER JOIN contacts ON contacts.id = veta_requerimiento_contacts_c.veta_requerimiento_contactscontacts_ida
                         WHERE contacts.deleted = 0 AND TRIM(UPPER(contacts.phone_mobile)) LIKE  \'{0}\'',
    'db_field' => 
    array (
      0 => 'id',
    ),
  ),
  'soel_fuente_contact' => 
  array (
    'query_type' => 'format',
    'operator' => 'subquery',
    'subquery' => 'SELECT veta_requerimiento.id AS ID FROM veta_requerimiento
                            INNER JOIN veta_requerimiento_contacts_c ON veta_requerimiento_contacts_c.veta_requerimiento_contactsveta_requerimiento_idb = veta_requerimiento.id AND veta_requerimiento_contacts_c.deleted = 0 
                            INNER JOIN contacts ON contacts.id = veta_requerimiento_contacts_c.veta_requerimiento_contactscontacts_ida
                         WHERE contacts.deleted = 0 AND TRIM(contacts.lead_source) IN  (\'{0}\')',
    'db_field' => 
    array (
      0 => 'id',
    ),
  ),
  'soel_pais_contact' => 
  array (
    'query_type' => 'format',
    'operator' => 'subquery',
    'subquery' => 'SELECT veta_requerimiento.id AS ID FROM veta_requerimiento
                            INNER JOIN veta_requerimiento_contacts_c ON veta_requerimiento_contacts_c.veta_requerimiento_contactsveta_requerimiento_idb = veta_requerimiento.id AND veta_requerimiento_contacts_c.deleted = 0 
                            INNER JOIN contacts ON contacts.id = veta_requerimiento_contacts_c.veta_requerimiento_contactscontacts_ida
                            INNER JOIN contacts_cstm ON contacts_cstm.id_c = contacts.id
                         WHERE contacts.deleted = 0 AND TRIM(contacts_cstm.pais_c) IN  (\'{0}\')',
    'db_field' => 
    array (
      0 => 'id',
    ),
  ),
  'soel_departamento_contact' => 
  array (
    'query_type' => 'format',
    'operator' => 'subquery',
    'subquery' => 'SELECT veta_requerimiento.id AS ID FROM veta_requerimiento
                            INNER JOIN veta_requerimiento_contacts_c ON veta_requerimiento_contacts_c.veta_requerimiento_contactsveta_requerimiento_idb = veta_requerimiento.id AND veta_requerimiento_contacts_c.deleted = 0 
                            INNER JOIN contacts ON contacts.id = veta_requerimiento_contacts_c.veta_requerimiento_contactscontacts_ida
                            INNER JOIN contacts_cstm ON contacts_cstm.id_c = contacts.id
                         WHERE contacts.deleted = 0 AND TRIM(contacts_cstm.departamento_c) IN  (\'{0}\')',
    'db_field' => 
    array (
      0 => 'id',
    ),
  ),
  'soel_ciudad_contact' => 
  array (
    'query_type' => 'format',
    'operator' => 'subquery',
    'subquery' => 'SELECT veta_requerimiento.id AS ID FROM veta_requerimiento
                            INNER JOIN veta_requerimiento_contacts_c ON veta_requerimiento_contacts_c.veta_requerimiento_contactsveta_requerimiento_idb = veta_requerimiento.id AND veta_requerimiento_contacts_c.deleted = 0 
                            INNER JOIN contacts ON contacts.id = veta_requerimiento_contacts_c.veta_requerimiento_contactscontacts_ida
                            INNER JOIN contacts_cstm ON contacts_cstm.id_c = contacts.id
                         WHERE contacts.deleted = 0 AND TRIM(contacts_cstm.ciudad_c) IN  (\'{0}\')',
    'db_field' => 
    array (
      0 => 'id',
    ),
  ),
  'soel_asignado_contact' => 
  array (
    'query_type' => 'format',
    'operator' => 'subquery',
    'subquery' => 'SELECT veta_requerimiento.id AS ID FROM veta_requerimiento
                            INNER JOIN veta_requerimiento_contacts_c ON veta_requerimiento_contacts_c.veta_requerimiento_contactsveta_requerimiento_idb = veta_requerimiento.id AND veta_requerimiento_contacts_c.deleted = 0 
                            INNER JOIN contacts ON contacts.id = veta_requerimiento_contacts_c.veta_requerimiento_contactscontacts_ida
                            INNER JOIN users asignado ON asignado.id = contacts.assigned_user_id AND asignado.deleted = 0
                         WHERE contacts.deleted = 0 AND asignado.id IN  (\'{0}\')',
    'db_field' => 
    array (
      0 => 'id',
    ),
  ),
  'soel_visa_contact' => 
  array (
    'query_type' => 'format',
    'operator' => 'subquery',
    'subquery' => 'SELECT veta_requerimiento.id AS ID FROM veta_requerimiento
                            INNER JOIN veta_requerimiento_contacts_c ON veta_requerimiento_contacts_c.veta_requerimiento_contactsveta_requerimiento_idb = veta_requerimiento.id AND veta_requerimiento_contacts_c.deleted = 0 
                            INNER JOIN contacts ON contacts.id = veta_requerimiento_contacts_c.veta_requerimiento_contactscontacts_ida
                            INNER JOIN contacts_cstm ON contacts_cstm.id_c = contacts.id
                         WHERE contacts.deleted = 0 AND TRIM(contacts_cstm.visa_c) LIKE  (\'{0}\')',
    'db_field' => 
    array (
      0 => 'id',
    ),
  ),
  'soel_campana_contact' => 
  array (
    'query_type' => 'format',
    'operator' => 'subquery',
    'subquery' => 'SELECT veta_requerimiento.id AS ID FROM veta_requerimiento
                            INNER JOIN veta_requerimiento_contacts_c ON veta_requerimiento_contacts_c.veta_requerimiento_contactsveta_requerimiento_idb = veta_requerimiento.id AND veta_requerimiento_contacts_c.deleted = 0 
                            INNER JOIN contacts ON contacts.id = veta_requerimiento_contacts_c.veta_requerimiento_contactscontacts_ida
                            INNER JOIN campaigns ON campaigns.id = contacts.campaign_id AND campaigns.deleted = 0
                         WHERE contacts.deleted = 0 AND campaigns.id IN  (\'{0}\')',
    'db_field' => 
    array (
      0 => 'id',
    ),
  ),
  'soel_oficina_comercial' => 
  array (
    'query_type' => 'format',
    'operator' => 'subquery',
    'subquery' => 'SELECT veta_requerimiento.id AS ID FROM veta_requerimiento
                            INNER JOIN users ON users.id = veta_requerimiento.assigned_user_id 
                            WHERE users.deleted = 0 AND users.address_city IN  (\'{0}\')',
    'db_field' => 
    array (
      0 => 'id',
    ),
  ),
  'range_date_entered' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'start_range_date_entered' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'end_range_date_entered' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'range_date_modified' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'start_range_date_modified' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'end_range_date_modified' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'range_fecha_viaje' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'start_range_fecha_viaje' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'end_range_fecha_viaje' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'range_fecha_proximo_contacto' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'start_range_fecha_proximo_contacto' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'end_range_fecha_proximo_contacto' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'range_fecha_ultimo_contacto' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'start_range_fecha_ultimo_contacto' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'end_range_fecha_ultimo_contacto' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'range_fecha_primer_presupuesto' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'start_range_fecha_primer_presupuesto' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'end_range_fecha_primer_presupuesto' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'range_nomination_app_exp_date' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'start_range_nomination_app_exp_date' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'end_range_nomination_app_exp_date' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'range_nomination_app_date' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'start_range_nomination_app_date' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'end_range_nomination_app_date' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'range_skill_assessment_app_exp_date' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'start_range_skill_assessment_app_exp_date' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'end_range_skill_assessment_app_exp_date' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'range_skill_assessment_app_date' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'start_range_skill_assessment_app_date' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'end_range_skill_assessment_app_date' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'range_visa_app_exp_date' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'start_range_visa_app_exp_date' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'end_range_visa_app_exp_date' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'range_visa_app_date' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'start_range_visa_app_date' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'end_range_visa_app_date' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'range_recruitment_exp_date' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'start_range_recruitment_exp_date' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'end_range_recruitment_exp_date' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'range_quote_date' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'start_range_quote_date' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'end_range_quote_date' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'range_soel_fecha_expiracion_visa_lead' => 
  array (
    'query_type' => 'format',
    'operator' => 'subquery',
    'subquery' => 'SELECT veta_requerimiento.id AS ID FROM veta_requerimiento
                            INNER JOIN veta_requerimiento_leads_c ON veta_requerimiento_leads_c.veta_requerimiento_leadsveta_requerimiento_idb = veta_requerimiento.id AND veta_requerimiento_leads_c.deleted = 0 
                            INNER JOIN leads ON leads.id = veta_requerimiento_leads_c.veta_requerimiento_leadsleads_ida
                            INNER JOIN leads_cstm ON leads_cstm.id_c = leads.id
                         WHERE leads.deleted = 0 AND leads_cstm.fecha_expiracion_visa_c >=  CONCAT(STR_TO_DATE(\'{0}\', \'%d-%m-%Y\') , \' 00:00:00\') AND leads_cstm.fecha_expiracion_visa_c <= CONCAT(STR_TO_DATE(\'{0}\', \'%d-%m-%Y\') , \' 23:59:59\')',
    'db_field' => 
    array (
      0 => 'id',
    ),
  ),
  'start_range_soel_fecha_expiracion_visa_lead' => 
  array (
    'query_type' => 'format',
    'operator' => 'subquery',
    'subquery' => 'SELECT veta_requerimiento.id AS ID FROM veta_requerimiento
                            INNER JOIN veta_requerimiento_leads_c ON veta_requerimiento_leads_c.veta_requerimiento_leadsveta_requerimiento_idb = veta_requerimiento.id AND veta_requerimiento_leads_c.deleted = 0 
                            INNER JOIN leads ON leads.id = veta_requerimiento_leads_c.veta_requerimiento_leadsleads_ida
                            INNER JOIN leads_cstm ON leads_cstm.id_c = leads.id
                         WHERE leads.deleted = 0 AND leads_cstm.fecha_expiracion_visa_c >=  CONCAT(STR_TO_DATE(\'{0}\', \'%d-%m-%Y\') , \' 00:00:00\')',
    'db_field' => 
    array (
      0 => 'id',
    ),
  ),
  'end_range_soel_fecha_expiracion_visa_lead' => 
  array (
    'query_type' => 'format',
    'operator' => 'subquery',
    'subquery' => 'SELECT veta_requerimiento.id AS ID FROM veta_requerimiento
                            INNER JOIN veta_requerimiento_leads_c ON veta_requerimiento_leads_c.veta_requerimiento_leadsveta_requerimiento_idb = veta_requerimiento.id AND veta_requerimiento_leads_c.deleted = 0 
                            INNER JOIN leads ON leads.id = veta_requerimiento_leads_c.veta_requerimiento_leadsleads_ida
                            INNER JOIN leads_cstm ON leads_cstm.id_c = leads.id
                         WHERE leads.deleted = 0 AND leads_cstm.fecha_expiracion_visa_c <= CONCAT(STR_TO_DATE(\'{0}\', \'%d-%m-%Y\') , \' 23:59:59\')',
    'db_field' => 
    array (
      0 => 'id',
    ),
  ),
  'range_soel_fecha_modificacion_lead' => 
  array (
    'query_type' => 'format',
    'operator' => 'subquery',
    'subquery' => 'SELECT veta_requerimiento.id AS ID FROM veta_requerimiento
                            INNER JOIN veta_requerimiento_leads_c ON veta_requerimiento_leads_c.veta_requerimiento_leadsveta_requerimiento_idb = veta_requerimiento.id AND veta_requerimiento_leads_c.deleted = 0 
                            INNER JOIN leads ON leads.id = veta_requerimiento_leads_c.veta_requerimiento_leadsleads_ida
                         WHERE leads.deleted = 0 AND leads.date_modified >=  CONCAT(STR_TO_DATE(\'{0}\', \'%d-%m-%Y\') , \' 00:00:00\') AND leads.date_modified <= CONCAT(STR_TO_DATE(\'{0}\', \'%d-%m-%Y\') , \' 23:59:59\')',
    'db_field' => 
    array (
      0 => 'id',
    ),
  ),
  'start_range_soel_fecha_modificacion_lead' => 
  array (
    'query_type' => 'format',
    'operator' => 'subquery',
    'subquery' => 'SELECT veta_requerimiento.id AS ID FROM veta_requerimiento
                            INNER JOIN veta_requerimiento_leads_c ON veta_requerimiento_leads_c.veta_requerimiento_leadsveta_requerimiento_idb = veta_requerimiento.id AND veta_requerimiento_leads_c.deleted = 0 
                            INNER JOIN leads ON leads.id = veta_requerimiento_leads_c.veta_requerimiento_leadsleads_ida
                         WHERE leads.deleted = 0 AND leads.date_modified >= CONCAT(STR_TO_DATE(\'{0}\', \'%d-%m-%Y\') , \' 00:00:00\')',
    'db_field' => 
    array (
      0 => 'id',
    ),
  ),
  'end_range_soel_fecha_modificacion_lead' => 
  array (
    'query_type' => 'format',
    'operator' => 'subquery',
    'subquery' => 'SELECT veta_requerimiento.id AS ID FROM veta_requerimiento
                            INNER JOIN veta_requerimiento_leads_c ON veta_requerimiento_leads_c.veta_requerimiento_leadsveta_requerimiento_idb = veta_requerimiento.id AND veta_requerimiento_leads_c.deleted = 0 
                            INNER JOIN leads ON leads.id = veta_requerimiento_leads_c.veta_requerimiento_leadsleads_ida
                         WHERE leads.deleted = 0 AND leads.date_modified <= CONCAT(STR_TO_DATE(\'{0}\', \'%d-%m-%Y\') , \' 23:59:59\')',
    'db_field' => 
    array (
      0 => 'id',
    ),
  ),
  'range_soel_fecha_expiracion_visa_contact' => 
  array (
    'query_type' => 'format',
    'operator' => 'subquery',
    'subquery' => 'SELECT veta_requerimiento.id AS ID FROM veta_requerimiento
                            INNER JOIN veta_requerimiento_contacts_c ON veta_requerimiento_contacts_c.veta_requerimiento_contactsveta_requerimiento_idb = veta_requerimiento.id AND veta_requerimiento_contacts_c.deleted = 0 
                            INNER JOIN contacts ON contacts.id = veta_requerimiento_contacts_c.veta_requerimiento_contactscontacts_ida
                            INNER JOIN contacts_cstm ON contacts_cstm.id_c = contacts.id
                         WHERE contacts.deleted = 0 AND contacts_cstm.fecha_expiracion_visa_c >=  CONCAT(STR_TO_DATE(\'{0}\', \'%d-%m-%Y\') , \' 00:00:00\') AND contacts_cstm.fecha_expiracion_visa_c <= CONCAT(STR_TO_DATE(\'{0}\', \'%d-%m-%Y\') , \' 23:59:59\')',
    'db_field' => 
    array (
      0 => 'id',
    ),
  ),
  'start_range_soel_fecha_expiracion_visa_contact' => 
  array (
    'query_type' => 'format',
    'operator' => 'subquery',
    'subquery' => 'SELECT veta_requerimiento.id AS ID FROM veta_requerimiento
                            INNER JOIN veta_requerimiento_contacts_c ON veta_requerimiento_contacts_c.veta_requerimiento_contactsveta_requerimiento_idb = veta_requerimiento.id AND veta_requerimiento_contacts_c.deleted = 0 
                            INNER JOIN contacts ON contacts.id = veta_requerimiento_contacts_c.veta_requerimiento_contactscontacts_ida
                            INNER JOIN contacts_cstm ON contacts_cstm.id_c = contacts.id
                         WHERE contacts.deleted = 0 AND contacts_cstm.fecha_expiracion_visa_c >=  CONCAT(STR_TO_DATE(\'{0}\', \'%d-%m-%Y\') , \' 00:00:00\')',
    'db_field' => 
    array (
      0 => 'id',
    ),
  ),
  'end_range_soel_fecha_expiracion_visa_contact' => 
  array (
    'query_type' => 'format',
    'operator' => 'subquery',
    'subquery' => 'SELECT veta_requerimiento.id AS ID FROM veta_requerimiento
                            INNER JOIN veta_requerimiento_contacts_c ON veta_requerimiento_contacts_c.veta_requerimiento_contactsveta_requerimiento_idb = veta_requerimiento.id AND veta_requerimiento_contacts_c.deleted = 0 
                            INNER JOIN contacts ON contacts.id = veta_requerimiento_contacts_c.veta_requerimiento_contactscontacts_ida
                            INNER JOIN contacts_cstm ON contacts_cstm.id_c = contacts.id
                         WHERE contacts.deleted = 0 AND contacts_cstm.fecha_expiracion_visa_c <= CONCAT(STR_TO_DATE(\'{0}\', \'%d-%m-%Y\') , \' 23:59:59\')',
    'db_field' => 
    array (
      0 => 'id',
    ),
  ),
  'range_soel_fecha_modificacion_contact' => 
  array (
    'query_type' => 'format',
    'operator' => 'subquery',
    'subquery' => 'SELECT veta_requerimiento.id AS ID FROM veta_requerimiento
                            INNER JOIN veta_requerimiento_contacts_c ON veta_requerimiento_contacts_c.veta_requerimiento_contactsveta_requerimiento_idb = veta_requerimiento.id AND veta_requerimiento_contacts_c.deleted = 0 
                            INNER JOIN contacts ON contacts.id = veta_requerimiento_contacts_c.veta_requerimiento_contactscontacts_ida
                         WHERE contacts.deleted = 0 AND contacts.date_modified >=  CONCAT(STR_TO_DATE(\'{0}\', \'%d-%m-%Y\') , \' 00:00:00\') AND contacts.date_modified <= CONCAT(STR_TO_DATE(\'{0}\', \'%d-%m-%Y\') , \' 23:59:59\')',
    'db_field' => 
    array (
      0 => 'id',
    ),
  ),
  'start_range_soel_fecha_modificacion_contact' => 
  array (
    'query_type' => 'format',
    'operator' => 'subquery',
    'subquery' => 'SELECT veta_requerimiento.id AS ID FROM veta_requerimiento
                            INNER JOIN veta_requerimiento_contacts_c ON veta_requerimiento_contacts_c.veta_requerimiento_contactsveta_requerimiento_idb = veta_requerimiento.id AND veta_requerimiento_contacts_c.deleted = 0 
                            INNER JOIN contacts ON contacts.id = veta_requerimiento_contacts_c.veta_requerimiento_contactscontacts_ida
                         WHERE contacts.deleted = 0 AND contacts.date_modified >=  CONCAT(STR_TO_DATE(\'{0}\', \'%d-%m-%Y\') , \' 00:00:00\')',
    'db_field' => 
    array (
      0 => 'id',
    ),
  ),
  'end_range_soel_fecha_modificacion_contact' => 
  array (
    'query_type' => 'format',
    'operator' => 'subquery',
    'subquery' => 'SELECT veta_requerimiento.id AS ID FROM veta_requerimiento
                            INNER JOIN veta_requerimiento_contacts_c ON veta_requerimiento_contacts_c.veta_requerimiento_contactsveta_requerimiento_idb = veta_requerimiento.id AND veta_requerimiento_contacts_c.deleted = 0 
                            INNER JOIN contacts ON contacts.id = veta_requerimiento_contacts_c.veta_requerimiento_contactscontacts_ida
                         WHERE contacts.deleted = 0 AND contacts.date_modified <= CONCAT(STR_TO_DATE(\'{0}\', \'%d-%m-%Y\') , \' 23:59:59\')',
    'db_field' => 
    array (
      0 => 'id',
    ),
  ),
);