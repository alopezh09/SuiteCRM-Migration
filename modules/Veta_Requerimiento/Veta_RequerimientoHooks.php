<?php

class Veta_RequerimientoHooks
{
    function procesar($focus, $event, $args)
    {
        $this->asignar_info($focus);
        $this->asignar_info_contact($focus);
        $this->asignar_info_lead($focus);
        $this->count_docs_status($focus);
        $this->assign_total_amount($focus);
        $this->assign_company_info($focus);
        $this->semaforizacion($focus);
    }

    function semaforizacion($bean)
    {
        switch ($bean->estado_semaforizacion_c) {
            case 'Verde':
                $color = '#0fcf15';
                break;
            case 'Amarillo':
                $color = '#ebb212';
                break;
            case 'Naranja':
                $color = '#ff9d24';
                break;
            case 'Rojo':
                $color = '#d66c60';
                break;

            default:
                $color = '#0fcf15';
                break;
        }

        $bean->estado_semaforizacion_c = "<div style='width: 20px;height: 20px;background: $color;border-radius: 50%;margin: auto;'></div>";
    }

    private function count_docs_status($focus)
    {
        $querySolicitados =    "SELECT SUM(T1.SUMAS) AS CUENTA FROM 
(select COUNT(*) as SUMAS from doc_docssolicitados dd , veta_requerimiento_doc_docssolicitados_1_c ddoc 
where dd.id = ddoc.veta_requerimiento_doc_docssolicitados_1doc_docssolicitados_idb 
and ddoc.deleted = 0 and dd.deleted =0
and ddoc.veta_requerimiento_doc_docssolicitados_1veta_requerimiento_ida ='" . $focus->id . "' UNION ALL
select count(*) AS SUMAS from veta_requerimiento_doc_documentos_adic_1_c ddaoc 
where ddaoc.deleted = 0 and ddaoc.veta_requerimiento_doc_documentos_adic_1veta_requerimiento_ida ='" . $focus->id . "') T1";

        $resultSolicitados = $focus->db->query($querySolicitados, true, "Error obteniendo los documentos solicitados");
        $rowSolicitados = $focus->db->fetchByAssoc($resultSolicitados);

        $docssolicitados = 0;
        if ($rowSolicitados != null) {
            $focus->soel_docs_solicitados = $rowSolicitados['CUENTA'];
            $docssolicitados = $rowSolicitados['CUENTA'];
        }

        $queryPendientes =    "SELECT SUM(T1.SUMAS) AS CUENTA FROM(
SELECT count(*) as SUMAS FROM doc_docssolicitados as a, veta_requerimiento_doc_docssolicitados_1_c as b
WHERE a.id=b.veta_requerimiento_doc_docssolicitados_1doc_docssolicitados_idb and b.deleted=0 and a.deleted=0 and a.estadodocumento= 'Aprobado' and b.veta_requerimiento_doc_docssolicitados_1veta_requerimiento_ida = '" . $focus->id . "'
UNION ALL
select count(*) as SUMAS from doc_documentos_adic dda ,veta_requerimiento_doc_documentos_adic_1_c ddaoc 
where dda.id = ddaoc.veta_requerimiento_doc_documentos_adic_1doc_documentos_adic_idb 
and dda.estadodocumento ='Aprobado' and dda.deleted = 0 and ddaoc.deleted =0 and ddaoc.veta_requerimiento_doc_documentos_adic_1veta_requerimiento_ida = '" . $focus->id . "') T1";
        $resultPendientes = $focus->db->query($queryPendientes, true, "Error obteniendo los documentos pendiente");
        $rowPendientes = $focus->db->fetchByAssoc($resultPendientes);

        if ($rowPendientes != null) {
            $focus->soel_docs_cargados = $rowPendientes['CUENTA'];
            $focus->soel_docs_pendientes = $docssolicitados - $rowPendientes['CUENTA'];
        }

        $queryCargados =    "SELECT SUM(T1.SUMAS) AS CUENTA FROM(
SELECT count(*) as SUMAS FROM doc_docssolicitados as a, veta_requerimiento_doc_docssolicitados_1_c as b
WHERE a.id=b.veta_requerimiento_doc_docssolicitados_1doc_docssolicitados_idb and b.deleted=0 and a.deleted=0 and a.estadodocumento= 'Cargado' and b.veta_requerimiento_doc_docssolicitados_1veta_requerimiento_ida = '" . $focus->id . "'
UNION ALL
select count(*) as SUMAS from doc_documentos_adic dda ,veta_requerimiento_doc_documentos_adic_1_c ddaoc 
where dda.id = ddaoc.veta_requerimiento_doc_documentos_adic_1doc_documentos_adic_idb 
and dda.estadodocumento ='Cargado' and dda.deleted = 0 and ddaoc.deleted =0 and ddaoc.veta_requerimiento_doc_documentos_adic_1veta_requerimiento_ida = '" . $focus->id . "') T1";
        $resultCargados = $focus->db->query($queryCargados, true, "Error obteniendo el visto bueno comercial del requerimiento");
        $rowCargados = $focus->db->fetchByAssoc($resultCargados);

        if ($rowCargados != null) {
            $focus->soel_docs_cargados = $rowCargados['CUENTA'];
        }

        $queryAprobados =    "SELECT SUM(T1.SUMAS) AS CUENTA FROM(
			SELECT count(*) as SUMAS FROM doc_docssolicitados as a, veta_requerimiento_doc_docssolicitados_1_c as b
			WHERE a.id=b.veta_requerimiento_doc_docssolicitados_1doc_docssolicitados_idb and b.deleted=0 and a.deleted=0 and a.estadodocumento= 'Aprobado' and b.veta_requerimiento_doc_docssolicitados_1veta_requerimiento_ida = '" . $focus->id . "'
			UNION ALL
			select count(*) as SUMAS from doc_documentos_adic dda ,veta_requerimiento_doc_documentos_adic_1_c ddaoc 
			where dda.id = ddaoc.veta_requerimiento_doc_documentos_adic_1doc_documentos_adic_idb 
			and dda.estadodocumento ='Aprobado' and dda.deleted = 0 and ddaoc.deleted =0 and ddaoc.veta_requerimiento_doc_documentos_adic_1veta_requerimiento_ida = '" . $focus->id . "') T1";
        $resultAprobados = $focus->db->query($queryAprobados, true, "Error obteniendo el visto bueno comercial del requerimiento");
        $rowAprobados = $focus->db->fetchByAssoc($resultAprobados);

        if ($rowAprobados != null) {
            $focus->soel_docs_aprobados = $rowAprobados['CUENTA'];
        }
    }

    private function asignar_info($focus)
    {
        $query = "SELECT  
                    asignado.address_city AS OFICINACOMERCIAL                                   
                FROM veta_requerimiento 
                INNER JOIN users asignado ON asignado.id = veta_requerimiento.assigned_user_id AND asignado.deleted = 0 
                 WHERE veta_requerimiento.deleted = 0 AND veta_requerimiento.id = '" . $focus->id . "'";

        $result = $focus->db->query(
            $query,
            true,
            "Error obteniendo informacion del comercial asociado al requerimiento " . $focus->id
        );
        $row    = $focus->db->fetchByAssoc($result);

        if ($row != null) {

            $focus->soel_oficina_comercial = $row['OFICINACOMERCIAL'];
        }

        return $focus;
    }

    private function assign_total_amount($focus)
    {
        $query = "SELECT * FROM vetacrm2.veta_requerimiento where id = '" . $focus->id . "'";

        $result = $focus->db->query(
            $query,
            true,
            "Error obteniendo informacion del comercial asociado al requerimiento " . $focus->id
        );
        $row    = $focus->db->fetchByAssoc($result);

        if ($row != null) {

            $focus->Total = $row['Total'];
        }

        return $focus;
    }


    /**
     * Este metodo asigna el telefono de la casa del prospecto al requerimiento
     *
     * @param $focus
     */
    private function asignar_info_contact($focus)
    {
        global $app_list_strings, $current_user;
        $dateformat    = $current_user->getPreference('datef');
        $departamentos = $app_list_strings['departamentos_list'];
        $ciudades      = $app_list_strings['ciudades_list'];

        $query = "SELECT contacts.id AS ID, 
                    CONCAT(contacts.first_name, ' ' , contacts.last_name) AS NOMBRE,
                    CONCAT(asignado.first_name, ' ', asignado.last_name) AS ASIGNADO,
                    TRIM(UPPER(asignado.address_city)) AS OFICINA,
                    contacts.phone_home AS TELCASA,
                    contacts.phone_mobile AS CELULAR,
                    contacts.lead_source AS FUENTE,
                    contacts_cstm.pais_c AS PAIS,
                    contacts_cstm.departamento_c AS DEPARTAMENTO,
                    contacts_cstm.ciudad_c AS CIUDAD,     
                    contacts_cstm.fecha_expiracion_visa_c AS FECHAEXPIRACIONVISA,
                    contacts.date_modified AS FECHAMODIFICACION,
                    contacts_cstm.visa_c AS VISA,
                    contacts_cstm.carrera_universitaria_c AS CARRERAUNIVERSITARIA,
                    contacts_cstm.trabajo_actual_c AS TRABAJOACTUAL,
                    campaigns.name as CAMPANA                                   
                FROM contacts 
                INNER JOIN contacts_cstm ON contacts_cstm.id_c = contacts.id 
                INNER JOIN veta_requerimiento_contacts_c ON veta_requerimiento_contacts_c.veta_requerimiento_contactscontacts_ida = contacts.id AND veta_requerimiento_contacts_c.deleted = 0 
                INNER JOIN veta_requerimiento ON veta_requerimiento.id = veta_requerimiento_contacts_c.veta_requerimiento_contactsveta_requerimiento_idb                
                LEFT JOIN users asignado ON asignado.id = contacts.assigned_user_id AND asignado.deleted = 0
                LEFT JOIN campaigns ON campaigns.id = contacts.campaign_id AND campaigns.deleted = 0 
                 WHERE veta_requerimiento.deleted = 0 AND veta_requerimiento.id = '" . $focus->id . "'";

        $result = $focus->db->query(
            $query,
            true,
            "Error obteniendo informacion del contacto asociado al requerimiento " . $focus->id
        );
        $row    = $focus->db->fetchByAssoc($result);

        if ($row != null) {

            $focus->soel_home_phone_contact    = $row['TELCASA'];
            $focus->soel_mobile_phone_contact  = $row['CELULAR'];
            $focus->soel_fuente_contact        = $row['FUENTE'];
            $focus->soel_pais_contact          = $row['PAIS'];
            $focus->soel_departamento_contact  = $row['DEPARTAMENTO'];
            $focus->soel_ciudad_contact        = $row['CIUDAD'];
            $focus->soel_carrera_universitaria = $row['CARRERAUNIVERSITARIA'];
            $focus->soel_trabajo_actual        = $row['TRABAJOACTUAL'];

            if (!empty($row['FECHAEXPIRACIONVISA'])) {
                $aux                                       = date_create($row['FECHAEXPIRACIONVISA']);
                $focus->soel_fecha_expiracion_visa_contact = date_format($aux, $dateformat);
            }

            $focus->soel_asignado_contact = $row['ASIGNADO'];

            if (!empty($row['FECHAMODIFICACION'])) {
                $aux2                                   = date_create($row['FECHAMODIFICACION']);
                $focus->soel_fecha_modificacion_contact = date_format($aux2, $dateformat);
            }

            $focus->soel_visa_contact    = $row['VISA'];
            $focus->soel_campana_contact = $row['CAMPANA'];
        }

        return $focus;
    }

    /**
     * Este metodo asigna el telefono de la casa del prospecto al requerimiento
     *
     * @param $focus
     */
    private function asignar_info_lead($focus)
    {
        global $app_list_strings, $current_user;
        $dateformat = $current_user->getPreference('datef');

        $departamentos = $app_list_strings['departamentos_list'];
        $ciudades      = $app_list_strings['ciudades_list'];

        $query = "SELECT leads.id AS ID, 
                    CONCAT(leads.first_name, ' ' , leads.last_name) AS NOMBRE,
                    CONCAT(asignado.first_name, ' ', asignado.last_name) AS ASIGNADO,
                    TRIM(UPPER(asignado.address_city)) AS OFICINA,
                    leads.phone_home as TELCASA,
                    leads.phone_mobile as CELULAR,
                    leads_cstm.fecha_expiracion_visa_c AS FECHAEXPIRACIONVISA,
                    leads_cstm.expiracion_visa_c AS FECHAEXPIRACIONVISATEXTO,
                    leads_cstm.edad_c AS EDAD,
                    leads.date_modified AS FECHAMODIFICACION,
                    if(leads.converted = 1, \"YES\", \"NO\" )AS CONVERTIDO,
                    leads.status AS ESTADO,
                    leads.lead_source AS FUENTE,
                    leads_cstm.pais_c AS PAIS,
                    leads_cstm.departamento_c AS DPTO,
                    leads_cstm.ciudad_c AS CIUDAD,
                    leads_cstm.visa_c AS VISA,
                    leads_cstm.pasaporte_c AS PASAPORTE,
                    leads_cstm.ciudad_tmp_c AS CIUDADTMP,
                    leads_cstm.carrera_universitaria_c AS CARRERAUNIVERSITARIA,
                    leads_cstm.trabajo_actual_c AS TRABAJOACTUAL,
                    leads_cstm.currently_living_together_c AS currently_living_together_c,
                    leads_cstm.australian_citizen_partner_c AS australian_citizen_partner_c,
                    leads.current_job_position AS current_job_position,
					
					leads.month_of_experience AS month_of_experience,
					leads.industry_aplicant AS industry_aplicant,
					
					leads_cstm.marketing_question_2_c AS marketing_question_2_c,
					leads_cstm.marketing_question_1_c AS marketing_question_1_c,
                    
                    
                    campaigns.name as CAMPANA                    
                FROM leads 
                INNER JOIN leads_cstm ON leads_cstm.id_c = leads.id 
                INNER JOIN veta_requerimiento_leads_c ON veta_requerimiento_leads_c.veta_requerimiento_leadsleads_ida = leads.id AND veta_requerimiento_leads_c.deleted = 0 
                INNER JOIN veta_requerimiento ON veta_requerimiento.id = veta_requerimiento_leads_c.veta_requerimiento_leadsveta_requerimiento_idb                
                LEFT JOIN users asignado ON asignado.id = leads.assigned_user_id AND asignado.deleted = 0
                LEFT JOIN campaigns ON campaigns.id = leads.campaign_id AND campaigns.deleted = 0 
                WHERE veta_requerimiento.deleted = 0 AND veta_requerimiento.id = '" . $focus->id . "'";

        //error_log($query . PHP_EOL,3,"error_tmp");

        $result = $focus->db->query(
            $query,
            true,
            "Error obteniendo informacion del prospecto asociado al requerimiento " . $focus->id
        );
        $row    = $focus->db->fetchByAssoc($result);

        if ($row != null) {

            $lead = new Lead();
            $lead->retrieve($row['ID']);

            $query2 = "SELECT * FROM veta_requerimiento_cstm where id_c = '" . $focus->id . "'";
            $result2 = $focus->db->query(
                $query2,
                true,
                "Error obteniendo informacion del prospecto asociado al requerimiento " . $focus->id
            );
            $row2    = $focus->db->fetchByAssoc($result2);

            if ($row2 != null) {
                $focus->db->query("UPDATE veta_requerimiento_cstm SET applicant_email_c = '$lead->email1' WHERE id_c = '" . $focus->id . "'");
            } else {
                $focus->db->query("INSERT INTO veta_requerimiento_cstm (id_c, applicant_email_c) VALUES ('" . $focus->id . "', '" . $lead->email1 . "')");
            }



            $focus->db->query("UPDATE veta_requerimiento SET industry_aplicant = '" . $row['industry_aplicant'] . "', month_of_experience = '" . $row['month_of_experience'] . "' WHERE id = '" . $focus->id . "'");
            $focus->db->query("UPDATE veta_requerimiento_cstm SET marketing_question_1_c = '" . $row['marketing_question_1_c'] . "', marketing_question_2_c = '" . $row['marketing_question_2_c'] . "' WHERE id_c = '" . $focus->id . "'");


            //$focus->applicant_email_c     = $lead->email1;

            $focus->soel_home_phone_lead       = $row['TELCASA'];
            $focus->soel_mobile_phone_lead     = $row['CELULAR'];
            $focus->soel_ciudad_tmp            = $row['CIUDADTMP'];
            $focus->soel_carrera_universitaria = $row['CARRERAUNIVERSITARIA'];
            $focus->soel_trabajo_actual        = $row['TRABAJOACTUAL'];
            $focus->currently_living_together_c        = $row['currently_living_together_c'];
            $focus->australian_citizen_partner_c        = $row['australian_citizen_partner_c'];
            $focus->current_job_position       = $row['current_job_position'];

            $focus->industry_aplicant       = $row['industry_aplicant'];
            $focus->month_of_experience       = $row['month_of_experience'];

            $focus->marketing_question_1_c       = $row['marketing_question_1_c'];
            $focus->marketing_question_2_c       = $row['marketing_question_2_c'];


            if (!empty($row['FECHAEXPIRACIONVISA'])) {
                $aux                                    = date_create($row['FECHAEXPIRACIONVISA']);
                $focus->soel_fecha_expiracion_visa_lead = date_format($aux, $dateformat);
            }


            if (!empty($row['FECHAMODIFICACION'])) {
                $aux2                                = date_create($row['FECHAMODIFICACION']);
                $focus->soel_fecha_modificacion_lead = date_format($aux2, $dateformat);
            }

            $focus->soel_estado_lead                      = $row['ESTADO'];
            $focus->soel_fuente_lead                      = $row['FUENTE'];
            $focus->soel_pais_lead                        = $row['PAIS'];
            $focus->soel_departamento_lead                = $departamentos[$row['DPTO']];
            $focus->soel_ciudad_lead                      = $ciudades[$row['CIUDAD']];
            $focus->soel_visa_lead                        = $row['VISA'];
            $focus->soel_asignado_lead                    = $row['ASIGNADO'];
            $focus->soel_campana_lead                     = $row['CAMPANA'];
            $focus->soel_pasaporte_lead                   = $row['PASAPORTE'];
            $focus->soel_fecha_expiracion_visa_texto_lead = $row['FECHAEXPIRACIONVISATEXTO'];
            $focus->soel_edad_lead                        = $row['EDAD'];
            $focus->soel_convertido_lead                  = $row['CONVERTIDO'];
        }

        // $docs_portal_url = "https://mmmveta-my.sharepoint.com/personal/admin_mmmveta_onmicrosoft_com/_layouts/15/onedrive.aspx?q=Requeriment_".$focus->name."&view=7&id=/personal/admin_mmmveta_onmicrosoft_com/Documents/DocsMMMigration&searchScope=folder";
        // $focus->virtual_docs_portal_url = "<a href='{$docs_portal_url}' target=\"_blank\" style='border:none;' >Docs Portal URL</a>";

        $r = new Veta_Requerimiento();
        $r->retrieve($focus->id);
        $docs_portal_url = $r->url_c;
        if ($docs_portal_url) {
            $focus->virtual_docs_portal_url = "<a href='{$docs_portal_url}' target=\"_blank\" style='border:none;' >Docs Portal URL</a>";
        }

        return $focus;
    }

    public function assign_company_info($bean)
    {
        $requirement = new Veta_Requerimiento();
        $requirement->retrieve($bean->id);
        error_log("COMPANY - ENTRO");
        if ((isset($bean->nvc_companies_veta_requerimiento_1_name)) and ($bean->nvc_companies_veta_requerimiento_1_name != '')) {
            error_log("COMPANY - COMPAÑIA ENCONTRADA " . $bean->nvc_companies_veta_requerimiento_1nvc_companies_ida);
        }
        /*

		$query2 = "SELECT * FROM veta_requerimiento_cstm where id_c = '" . $focus->id . "'";
		$result2 = $focus->db->query(
			$query2,
			true,
			"Error obteniendo informacion del prospecto asociado al requerimiento " . $focus->id
		);
		$row2    = $focus->db->fetchByAssoc($result2);

		if ($row2 != null) {
			$focus->db->query("UPDATE veta_requerimiento_cstm SET applicant_email_c = '$lead->email1' WHERE id_c = '" . $focus->id . "'");
		} else {
			$focus->db->query("INSERT INTO veta_requerimiento_cstm (id_c, applicant_email_c) VALUES ('" . $focus->id . "', '" . $lead->email1 . "')");
		}
		*/
    }

    public function create_note_pre($bean)
    {
        if (!empty($bean->virtual_note)) {
            $bean->note = new Note();
            $bean->note->description = $bean->virtual_note;

            $bean->virtual_note = '';
        }
    }

    public function create_note_post($bean)
    {
        global $current_user;
        if (!empty($bean->note)) {

            $query = "SELECT veta_requerimiento_contactscontacts_ida as id 
            FROM  veta_requerimiento_contacts_c
            WHERE veta_requerimiento_contactsveta_requerimiento_idb = '" . $bean->id . "' AND deleted = 0";

            $result = $bean->db->query(
                $query,
                true,
                "Error obteniendo informacion del contacto asociado al Presupuesto " . $bean->id
            );

            $row    = $bean->db->fetchByAssoc($result);

            $bean->note->parent_type = 'Veta_Requerimiento';
            $bean->note->parent_id = $bean->id;
            $bean->note->assigned_user_id = $current_user->id;
            $now = date('Y-m-d H:i:s');
            $bean->note->name = "Nota $bean->name $now";
            $bean->note->contact_id = $row['id'];
            $bean->note->save();
        }
    }
}

class addTotalRequirement
{
    //     protected static $valorAPagarEmpresa = 0;
    //     protected static $empresaValorAPagar = 0;
    //     protected static $totalPagar = 0;
    //     protected static $totalPagado = 0;
    //     protected static $empresaPrimerPago = 0;

    //     protected static $aplicant_first_payment_amount = 0;
    //     protected static $company_first_payment_amount = 0;
    //     protected static $aplicant_mmm_fee = 0;
    //     protected static $aplicant_departments_visa_fee = 0;


    //     function stepOne(&$focus, $event, $arguments) { 

    //             $focus->custom_fields->retrieve();
    //             if (is_numeric($focus->company_mmm_fee)){ self::$valorAPagarEmpresa += $focus->company_mmm_fee * 1; }
    //             if (is_numeric($focus->aplicant_company_mmm)){ self::$empresaValorAPagar += $focus->aplicant_company_mmm * 1; }
    //             if (is_numeric($focus->Total)){ self::$totalPagar += $focus->Total * 1; }
    //             if (is_numeric($focus->total_paid)){ self::$totalPagado += $focus->total_paid * 1; }
    //             if (is_numeric($focus->aplicant_company_mmm_fees)){ self::$empresaPrimerPago += $focus->aplicant_company_mmm_fees * 1; }
    //             if (is_numeric($focus->aplicant_first_payment_amount)){ self::$aplicant_first_payment_amount += $focus->aplicant_first_payment_amount * 1; }
    //             if (is_numeric($focus->company_first_payment_amount)){ self::$company_first_payment_amount += $focus->company_first_payment_amount * 1; }
    //             if (is_numeric($focus->aplicant_mmm_fee)){ self::$aplicant_mmm_fee += $focus->aplicant_mmm_fee * 1; }
    //             if (is_numeric($focus->aplicant_departments_visa_fee)){ self::$aplicant_departments_visa_fee += $focus->aplicant_departments_visa_fee * 1; }            
    //     }

    //     function stepTwo($event, $arguments) {
    //             if ($GLOBALS['action'] == 'index' || $GLOBALS['action'] == 'ListView') {
    //                     $valorAPagarEmpresa = self::$valorAPagarEmpresa;
    //                     $empresaValorAPagar = self::$empresaValorAPagar;
    //                     $totalPagar = self::$totalPagar;
    //                     $totalPagado = self::$totalPagado;
    //                     $empresaPrimerPago = self::$empresaPrimerPago;

    //                     $aplicant_first_payment_amount = self::$aplicant_first_payment_amount;
    //                     $company_first_payment_amount = self::$company_first_payment_amount;
    //                     $aplicant_mmm_fee = self::$aplicant_mmm_fee;
    //                     $aplicant_departments_visa_fee = self::$aplicant_departments_visa_fee;

    //                     echo <<<EOHTML
    // <script type="text/javascript">
    // <!--
    // $('<td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"> <b>Applicant First Payment Date: {$aplicant_first_payment_amount}</b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"> <b>Company First Payment: {$company_first_payment_amount}</b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="1%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"> <b>Applicant Payment: {$aplicant_mmm_fee}</b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="1%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"> <b>Visa Fee Aplicant: {$aplicant_departments_visa_fee}</b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"> <b>Valor A Pagar Empresa: {$valorAPagarEmpresa}</b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"> <b>Company Payment: {$empresaValorAPagar}</b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="1%"> <b>Total to pay: {$totalPagar}</b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"><b>Company First Payment: {$empresaPrimerPago}</b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="1%"><b>Total Paid: {$totalPagado}</b></td>').insertBefore('.paginationChangeButtons');
    // -->
    // </script>
    // EOHTML;
    //             }
    //     }

    protected static $valorAPagarEmpresa = 0;
    protected static $empresaValorAPagar = 0;
    protected static $totalPagar = 0;
    protected static $totalPagado = 0;
    protected static $empresaPrimerPago = 0;

    protected static $aplicant_first_payment_amount = 0;
    protected static $company_first_payment_amount = 0;
    protected static $aplicant_mmm_fee = 0;
    protected static $aplicant_departments_visa_fee = 0;

    protected static $outstanding_amount = 0;
    protected static $deposit = 0;
    protected static $department_credit_card_surcharge_percentage = 0;
    protected static $monto_dolares_australianos_c = 0;
    protected static $department_visa_fee_base_application_charge = 0;
    protected static $insurance_value = 0;
    protected static $consultation_fee = 0;
    protected static $gst_percentage = 0;
    protected static $total_without_gst = 0;
    protected static $discount = 0;

    protected static $company_deposits_c = 0;
    protected static $company_dept_cc_surcharge_c = 0;
    protected static $company_dept_visa_fee_base_c = 0;
    protected static $company_discount_c = 0;
    protected static $company_gst_c = 0;
    protected static $company_outstanding_amount_c = 0;
    protected static $company_total_c = 0;
    protected static $company_total_without_gst_c = 0;





    function stepOne(&$focus, $event, $arguments)
    {

        $focus->custom_fields->retrieve();
        self::$valorAPagarEmpresa += intval($focus->company_mmm_fee);
        self::$empresaValorAPagar += intval($focus->aplicant_company_mmm);
        self::$totalPagar += intval($focus->Total);
        self::$totalPagado += intval($focus->total_paid);
        self::$empresaPrimerPago += intval($focus->aplicant_company_mmm_fees);
        self::$aplicant_first_payment_amount += intval($focus->aplicant_first_payment_amount);
        self::$company_first_payment_amount += intval($focus->company_first_payment_amount);
        self::$aplicant_mmm_fee += intval($focus->aplicant_mmm_fee);
        self::$aplicant_departments_visa_fee += intval($focus->aplicant_departments_visa_fee);
        self::$outstanding_amount += intval($focus->outstanding_amount);
        self::$deposit += intval($focus->deposit);
        self::$department_credit_card_surcharge_percentage += intval($focus->department_credit_card_surcharge_percentage);
        self::$monto_dolares_australianos_c += intval($focus->monto_dolares_australianos_c);
        self::$department_visa_fee_base_application_charge += intval($focus->department_visa_fee_base_application_charge);
        self::$insurance_value += intval($focus->insurance_value);
        self::$consultation_fee += intval($focus->consultation_fee);
        self::$gst_percentage += intval($focus->gst_percentage);
        self::$total_without_gst += intval($focus->total_without_gst);
        self::$discount += intval($focus->discount);

        self::$company_deposits_c += intval($focus->company_deposits_c);
        self::$company_dept_cc_surcharge_c += intval($focus->company_dept_cc_surcharge_c);
        self::$company_dept_visa_fee_base_c += intval($focus->company_dept_visa_fee_base_c);
        self::$company_discount_c += intval($focus->company_discount_c);
        self::$company_gst_c += intval($focus->company_gst_c);
        self::$company_outstanding_amount_c += intval($focus->company_outstanding_amount_c);
        self::$company_total_c += intval($focus->company_total_c);
        self::$company_total_without_gst_c += intval($focus->company_total_without_gst_c);
    }

    function stepTwo($event, $arguments)
    {
        if ($GLOBALS['action'] == 'index' || $GLOBALS['action'] == 'ListView') {
            $valorAPagarEmpresa = self::$valorAPagarEmpresa;
            $empresaValorAPagar = self::$empresaValorAPagar;
            $totalPagar = self::$totalPagar;
            $totalPagado = self::$totalPagado;
            $deposit = self::$deposit;

            $outstanding_amount = self::$outstanding_amount;
            $company_first_payment_amount = self::$company_first_payment_amount;
            $aplicant_mmm_fee = self::$aplicant_mmm_fee;
            $aplicant_departments_visa_fee = self::$aplicant_departments_visa_fee;

            $department_credit_card_surcharge_percentage = self::$department_credit_card_surcharge_percentage;
            $monto_dolares_australianos_c = self::$monto_dolares_australianos_c;
            $department_visa_fee_base_application_charge = self::$department_visa_fee_base_application_charge;
            $insurance_value = self::$insurance_value;
            $consultation_fee = self::$consultation_fee;
            $gst_percentage = self::$gst_percentage;
            $total_without_gst = self::$total_without_gst;
            $discount = self::$discount;

            $company_deposits_c = self::$company_deposits_c;
            $company_dept_cc_surcharge_c = self::$company_dept_cc_surcharge_c;
            $company_dept_visa_fee_base_c = self::$company_dept_visa_fee_base_c;
            $company_discount_c = self::$company_discount_c;
            $company_gst_c = self::$company_gst_c;
            $company_outstanding_amount_c = self::$company_outstanding_amount_c;
            $company_total_c = self::$company_total_c;
            $company_total_without_gst_c = self::$company_total_without_gst_c;


            echo <<<EOHTML
<script type="text/javascript">
<!--
$('<td nowrap="nowrap" align="left" class="paginationChangeButtons" width="2%"> <b>Applicant Outstanding Amount: {$outstanding_amount}</b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"> <b>Company First Payment: {$company_first_payment_amount}</b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="1%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="1%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"> <b>Company Discount: {$company_discount_c}</b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"> <b>Company Discount: {$company_deposits_c}</b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"> <b>department´s credit card surcharge: {$company_dept_cc_surcharge_c}</b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"> <b>Applicant Department´s Visa Fee - Base application charge: {$company_dept_visa_fee_base_c}</b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"> <b>Company Outstanding Amount: {$company_outstanding_amount_c}</b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"> <b>Company GST: {$company_gst_c}</b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"> <b>Company Total Without GST: {$company_total_without_gst_c}</b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"> <b>Compnay total to pay: {$company_total_c}</b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"> <b>Discount: {$discount}</b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"> <b>Total without GST: {$total_without_gst}</b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"> <b>Applicant Payment: {$aplicant_mmm_fee}</b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="1%"> <b>GST: {$gst_percentage}</b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="1%"> <b>Consultation Fee: {$consultation_fee}</b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"> <b>Insurance Value: {$insurance_value}</b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"> <b>Applicant Department´s Visa Fee - Base application charge: {$department_visa_fee_base_application_charge}</b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="1%"> <b>department´s credit card surcharge: {$department_credit_card_surcharge_percentage}</b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"><b>Grand Total: {$monto_dolares_australianos_c}</b></td></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"><b>Deposit: {$deposit}</b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="1%"><b>Applicant Outstanding Amount: {$outstanding_amount}</b></td>').insertBefore('.paginationChangeButtons');
-->
</script>
EOHTML;
        }
    }
}
