<?php

/**
 *
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 *
 * SuiteCRM is an extension to SugarCRM Community Edition developed by SalesAgility Ltd.
 * Copyright (C) 2011 - 2018 SalesAgility Ltd.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for technical reasons, the Appropriate Legal Notices must
 * display the words "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 */

require_once('modules/Veta_Presupuesto/clases/Media.php');

class Veta_Requerimiento extends Basic
{
    #region Atributos
    public $new_schema  = true;
    public $module_dir  = 'Veta_Requerimiento';
    public $object_name = 'Veta_Requerimiento';
    public $table_name  = 'veta_requerimiento';
    public $importable  = false;

    public $id;
    public $name;
    public $date_entered;
    public $date_modified;
    public $modified_user_id;
    public $modified_by_name;
    public $created_by;
    public $created_by_name;
    public $description;
    public $deleted;
    public $created_by_link;
    public $modified_user_link;
    public $assigned_user_id;
    public $assigned_user_name;
    public $assigned_user_link;
    public $SecurityGroups;
    public $fuente;
    public $fecha_viaje_txt;
    public $fecha_viaje;
    public $presupuesto;
    public $visto_bueno_comercial;
    public $visto_bueno_visas;
    public $estado;
    public $fecha_proximo_contacto;
    public $fecha_ultimo_contacto;
    public $campaign_id_c;
    public $campana;
    public $referido;
    //NEW fIELDS
    public $industry_aplicant;
    public $consultation_date;
    public $aplicant_1st_payment_date;
    public $aplicant_first_payment_amount;
    public $profession;
    public $current_job_position;
    public $month_of_experience;
    public $level_of_english;
    public $nationality;
    public $potential_visa_subclass;
    public $cost_agrement_number;
    public $cost_agrement_visa_subclass;
    public $quote_date;
    public $migration_agent_name;
    public $leap_id;
    public $recluter_name;
    public $company_name;
    public $company_city;
    public $company_industry;
    public $email_company;
    public $phone_company;
    public $company_1st_payment_date;
    public $company_first_payment_amount;
    public $company_sbs_expiry_date;
    //NEW 7 fIELDS 
    public $secondary_aplicant_name;
    public $secondary_pasport_number;
    public $secondary_dob;
    public $dependent_name;
    public $dependent_dob;
    public $aplicant_mmm_fee;
    public $second_dependent_name;
    //NEW 11 fIELDS     
    public $second_dependent_dob;
    public $third_dependent_namee;
    public $consultation_fee;
    public $aplicant_departments_visa_fee;
    public $company_mmm_fee;
    public $aplicant_company_mmm;
    public $Total;
    public $aplicant_company_mmm_fees;
    public $total_paid;
    public $ocupation;
    public $main_aplicant_name;






    #endregion

    public function bean_implements($interface)
    {
        switch ($interface) {
            case 'ACL':
                return true;
        }
        return false;
    }

    /**
     * Este metodo obtiene el consecutivo para un nuevo registro
     *
     * @return int El proximo consecutivo
     */
    private function get_consecutive()
    {
        $index = 0;

        $results = $this->db->query("SELECT MAX(CAST(name AS SIGNED)) AS max_name FROM veta_requerimiento LIMIT 1");

        while ($row = $this->db->fetchByAssoc($results)) {
            $index = $row['max_name'];
        }

        $index = ($index * 1) + 1;

        return $index;
    }

    /**
     * Este metodo salva un requerimiento
     *
     * @param false $check_notify
     * @return string : Es el id del requerimiento recien salvado
     */
    public function save($check_notify = false)
    {
        global $current_user;

        	// if (!$this->inSync) {
		$detalle = json_decode(htmlspecialchars_decode($this->detalle_semaforizacion_c));


		if (is_null($detalle))
			$detalle = [];

		if (
			($detalle->{"inmediato_$this->id"} || $detalle->{"potencial_$this->id"} || $detalle->{"asignado_$this->id"} || $detalle->{"next_contact_date_$this->id"} || $detalle->{"next_$this->id"})
			&& !empty($this->note_c)
		) {
			unset($detalle->{"inmediato_$this->id"});
			unset($detalle->{"potencial_$this->id"});
			unset($detalle->{"asignado_$this->id"});
			unset($detalle->{"next_contact_date_$this->id"});
			unset($detalle->{"next_$this->id"});
		}


		if (!count(get_object_vars($detalle))) {
			$this->estado_semaforizacion_c = 'Verde';
		}

		$this->detalle_semaforizacion_c = json_encode($detalle);

        //if($this->id = '587fd756-109d-e4b6-dfce-61f1d88d1a09'){
        error_log("auto_consultation - old " . $this->fetched_row['consultation_date']);
        error_log("auto_consultation - new " . $this->consultation_date);
        if ($this->fetched_row['consultation_date'] == '') {
            if ($this->consultation_date != '') {
                //$this->estado = "Consultation_Follow_Up";
				$this->estado = "Consultation_Book";
				
                error_log("auto_consultation - ENTRO a cambiar la informacion y el estado");

                $replace = [];
                $this_lead = new Lead();
                $this_lead->retrieve($this->veta_requerimiento_leadsleads_ida);

                error_log("auto_consultation - Email prospecto " . $this_lead->email1);
                error_log("auto_consultation - Email usuario " . $current_user->email1);


                $email = Media::prepare_email_from_template(null, [$this_lead->email1], '58057461-c0a1-9a9d-23d9-62429d5db4a4', $replace);

                $emailFrom = $current_user->email1;

                //$email->AddCC("alopez@australiaveta.com.co");
                $email->AddBCC("alopez@australiaveta.com.co");
                // $email->addReplyTo($caseManager->email1);

                $email->From = $emailFrom;



                //$email->AddAttachment("/var/www/crm.australiaveta.com.develop/upload/" . $bean->id, $doc_name_attach  . "." . $bean->file_ext, 'base64', $bean->file_mime_type);													


                /*
					if ($email->send()) {
						//Logea en historial
						crear_email($this, $email, true);
						logerror("Correo enviado");
						error_log("auto_consultation - SE ENVIO CORREO DE " . $emailFrom);
					} else {
						logerror(["Correo no enviado", $email->ErrorInfo]);
						error_log("auto_consultation - NO ENVIO CORREO DE " . $emailFrom);
					}
					*/
            }

            $this->load_relationship('veta_requerimiento_doc_plantillas_1');
            $this->veta_requerimiento_doc_plantillas_1->add("42ed4f96-da25-3f2d-5877-624299285f89");
            error_log("auto_consultation - se debio haber creado la relacion ");
        }
        //}

        if (($_REQUEST['return_module'] == 'NVC_Companies') and ($_REQUEST['return_id'] != '') and (isset($_REQUEST['return_id']))) {
            error_log("REGISTRO DE COMPAÑIA");
            $this->from_a_company_c = 1;
            $company = new NVC_Companies();
            $company->retrieve($_REQUEST['return_id']);

            if (!empty($this->referido)) {
                $this->referido = $this->referido;
            } else {
                if (!empty($this->campana)) {
                    $this->referido = $this->campana;
                }
            }

            if (!empty($company->id)) {
                $this->phone_company = $company->phone_office;
                $this->company_name = $company->name;
                $this->company_sbs_expiry_date = $company->company_sbs_expiry_date;
                $this->company_industry = $company->industry;
                $this->company_city = $company->billing_address_city;
                $this->company_lead_id_c = $company->company_leap_id;
                $this->company_turnover_c = $company->turnover_c;
            } else {
				$this->phone_company = "";
                $this->company_name = "";
                $this->company_sbs_expiry_date = "";
                $this->company_industry = "";
                $this->company_city = "";
                $this->company_lead_id_c = "";
                $this->company_turnover_c = "";
			}
            $id = parent::save($check_notify); // TODO: Change the autogenerated stub

            if (empty($this->name)) {
                $result     = $this->db->query('FLUSH TABLES WITH READ LOCK');
                $this->name = $this->get_consecutive();
                $this->db->query('UNLOCK TABLES');
                $this->db->query("UPDATE veta_requerimiento SET name = '" . $this->name . "' WHERE id = '" . $id . "'");
            }
            return $id;
        }

        $lead = $this->find_lead($this);


        if (isset($lead)) {
            error_log("REQUERIMIENTO - se encontro el lead" . $lead->id . " campana " . $lead->campaign_id_c . " source " . $lead->lead_source);

            if ((isset($this->campaign_id_c)) and ($this->campaign_id_c != '')) {
            } else {
                $this->campaign_id_c = $lead->campaign_id_c;
            }

            if ((isset($this->fuente)) and ($this->fuente != '')) {
            } else {
                $this->fuente = $lead->lead_source;
            }
			
			/*
			if ((isset($this->current_visa_subclass)) and ($this->current_visa_subclass != '')) {			
				$this->current_visa_subclass = $lead->visa_c;
			}
			*/


            //$this->db->query("UPDATE veta_requerimiento SET campana_id_c = '" . $this->campana_id_c . "' WHERE id = '" . $id . "'");



        }

        $budgets = $this->get_linked_beans('veta_requerimiento_veta_presupuesto', 'Veta_Presupuesto');

        foreach ($budgets as $budget) {
            if ($this->sponsored_australian_citizen_c) {
                $budget->sponsored_australian_citizen_c = 1;
            } else {
                $budget->sponsored_australian_citizen_c = 0;
            }
            $this->db->query("UPDATE veta_presupuesto_cstm SET sponsored_australian_citizen_c = ' .$this->sponsored_australian_citizen_c. ' WHERE id_c = '" . $budget->id . "'");
            /**
             * Agregar Logica para los invoces, de tal forma que se actualicen al momento de modificar un requermimiento
             * $budgets = $this->get_linked_beans( 'veta_recibo_veta_presupuesto', 'Veta_Recibo' );  
             * 
             */
        }
		
		$company = new NVC_Companies();
        $company->retrieve($this->nvc_companies_veta_requerimiento_1nvc_companies_ida);
		
		
        $billing_statements = $this->get_linked_beans('veta_requerimiento_veta_recibo', 'Veta_Recibo');
        foreach ($billing_statements as $billing_statement) {
            if ($this->sponsored_australian_citizen_c) {
                $billing_statement->sponsored_australian_citizen_c = 1;
            } else {
                $billing_statement->sponsored_australian_citizen_c = 0;
            }
            $this->db->query("UPDATE veta_recibo_cstm SET sponsored_australian_citizen_c = ' .$this->sponsored_australian_citizen_c. ' WHERE id_c = '" . $billing_statement->id . "'");
			
			if (!empty($company->id)) {				
				$this->db->query("UPDATE vetacrm2.nvc_companies_veta_recibo_1_c SET nvc_companies_veta_recibo_1nvc_companies_ida = '" . $company->id . "' WHERE nvc_companies_veta_recibo_1veta_recibo_idb = '" . $billing_statement->id . "';");				
				//error_log("UPDATE vetacrm2.nvc_companies_veta_recibo_1_c SET nvc_companies_veta_recibo_1nvc_companies_ida = '" . $company->id . "' WHERE nvc_companies_veta_recibo_1veta_recibo_idb = '" . $billing_statement->id . "';");
			} else {
				$this->db->query("UPDATE vetacrm2.nvc_companies_veta_recibo_1_c SET nvc_companies_veta_recibo_1nvc_companies_ida = '' WHERE nvc_companies_veta_recibo_1veta_recibo_idb = '" . $billing_statement->id . "';");				
				
			}
			
			
            /**
             * Agregar Logica para los invoces, de tal forma que se actualicen al momento de modificar un requermimiento
             * $budgets = $this->get_linked_beans( 'veta_recibo_veta_presupuesto', 'Veta_Recibo' );  
             * 
             */
        }


        

        if (!empty($this->referido)) {
            $this->referido = $this->referido;
        } else {
            if (!empty($this->campana)) {
                $this->referido = $this->campana;
            }
        }

        if (!empty($company->id)) {
            $this->phone_company = $company->phone_office;
            $this->company_name = $company->name;
            $this->company_sbs_expiry_date = $company->company_sbs_expiry_date;
            $this->company_industry = $company->industry;
            $this->company_city = $company->billing_address_city;
            $this->company_lead_id_c = $company->company_leap_id;
            $this->company_turnover_c = $company->turnover_c;
            $this->email_company = $company->email1;
            
        } else {
			$this->phone_company = "";
			$this->company_name = "";
			$this->company_sbs_expiry_date = ""; 
			$this->company_industry = "";
			$this->company_city = "";
			$this->company_lead_id_c = "";
			$this->company_turnover_c = "";				
			$this->email_company = "";
		}

        $this->asignar_comercial();

        $id = parent::save($check_notify); // TODO: Change the autogenerated stub

        if (empty($this->name)) {
            $result     = $this->db->query('FLUSH TABLES WITH READ LOCK');
            $this->name = $this->get_consecutive();
            $this->db->query('UNLOCK TABLES');
            $this->db->query("UPDATE veta_requerimiento SET name = '" . $this->name . "' WHERE id = '" . $id . "'");
        }

        if (!empty($this->veta_requerimiento_leads_name)) {
            $this->db->query("UPDATE veta_requerimiento SET main_aplicant_name = '" . $this->veta_requerimiento_leads_name . "' WHERE id = '" . $id . "'");
        }

        if (!empty($this->fecha_primer_presupuesto)) {
            $this->db->query("UPDATE veta_requerimiento SET quote_date = '" . $this->fecha_primer_presupuesto . "' WHERE id = '" . $id . "'");
        }

        $this_lead = new Lead();
        $this_lead->retrieve($this->veta_requerimiento_leadsleads_ida);

        if ($this_lead->id != "") {
            /*
            $this->db->query( "UPDATE leads SET profession = '" . strval( $this->profession) . "' WHERE id = '" . $this_lead->id . "'" );     
            $this->db->query( "UPDATE leads SET current_visa_subclass = '" . strval( $this->current_visa_subclass) . "' WHERE id = '" . $this_lead->id . "'" );                 
            $this->db->query( "UPDATE leads SET current_job_position = '" . strval( $this->current_job_position) . "' WHERE id = '" . $this_lead->id . "'" ); 
            $this->db->query( "UPDATE leads SET month_of_experience = '" . strval( $this->month_of_experience) . "' WHERE id = '" . $this_lead->id . "'" ); 
            $this->db->query( "UPDATE leads SET level_of_english = '" . strval( $this->level_of_english) . "' WHERE id = '" . $this_lead->id . "'" ); 
            $this->db->query( "UPDATE leads SET nationality = '" . strval( $this->nationality) . "' WHERE id = '" . $this_lead->id . "'" ); 
            $this->db->query( "UPDATE leads SET potential_visa_subclass = '" . strval( $this->potential_visa_subclass) . "' WHERE id = '" . $this_lead->id . "'" ); 
            $this->db->query( "UPDATE leads SET cost_agrement_visa_subclass = '" . strval( $this->cost_agrement_visa_subclass) . "' WHERE id = '" . $this_lead->id . "'" ); 
            $this->db->query( "UPDATE leads SET cost_agrement_number = '" . strval( $this->cost_agrement_number) . "' WHERE id = '" . $this_lead->id . "'" ); 
            //$this->db->query( "UPDATE leads SET quote_date = '" . strval( $this->quote_date) . "' WHERE id = '" . $this_lead->id . "'" );     

            
            $this->db->query( "UPDATE leads SET migration_agent_name = '" . strval( $this->migration_agent_name) . "' WHERE id = '" . $this_lead->id . "'" ); 
            $this->db->query( "UPDATE leads SET leap_id = '" . strval( $this->leap_id) . "' WHERE id = '" . $this_lead->id . "'" ); 
            $this->db->query( "UPDATE leads SET recluter_name = '" . strval( $this->recluter_name) . "' WHERE id = '" . $this_lead->id . "'" ); 
            $this->db->query( "UPDATE leads SET company_name = '" . strval( $this->company_name) . "' WHERE id = '" . $this_lead->id . "'" ); 
            $this->db->query( "UPDATE leads SET company_city = '" . strval( $this->company_city) . "' WHERE id = '" . $this_lead->id . "'" ); 
            $this->db->query( "UPDATE leads SET company_industry = '" . strval( $this->company_industry) . "' WHERE id = '" . $this_lead->id . "'" ); 
            $this->db->query( "UPDATE leads SET email_company = '" . strval( $this->email_company) . "' WHERE id = '" . $this_lead->id . "'" ); 
            $this->db->query( "UPDATE leads SET phone_company = '" . strval( $this->phone_company) . "' WHERE id = '" . $this_lead->id . "'" ); 
            $this->db->query( "UPDATE leads SET company_1st_payment_date = '" . strval( $this->company_1st_payment_date) . "' WHERE id = '" . $this_lead->id . "'" ); 
            $this->db->query( "UPDATE leads SET company_first_payment_amount = '" . strval( $this->company_first_payment_amount) . "' WHERE id = '" . $this_lead->id . "'" ); 
            $this->db->query( "UPDATE leads SET company_sbs_expiry_date = '" . strval( $this->company_sbs_expiry_date) . "' WHERE id = '" . $this_lead->id . "'" ); 
            $this->db->query( "UPDATE leads SET secondary_aplicant_name = '" . strval( $this->secondary_aplicant_name) . "' WHERE id = '" . $this_lead->id . "'" ); 
            $this->db->query( "UPDATE leads SET secondary_pasport_number = '" . strval( $this->secondary_pasport_number) . "' WHERE id = '" . $this_lead->id . "'" ); 
            $this->db->query( "UPDATE leads SET secondary_dob = '" . strval( $this->secondary_dob) . "' WHERE id = '" . $this_lead->id . "'" ); 
            $this->db->query( "UPDATE leads SET dependent_name = '" . strval( $this->dependent_name) . "' WHERE id = '" . $this_lead->id . "'" ); 
            $this->db->query( "UPDATE leads SET dependent_dob = '" . strval( $this->dependent_dob) . "' WHERE id = '" . $this_lead->id . "'" ); 
            $this->db->query( "UPDATE leads SET aplicant_mmm_fee = '" . strval( $this->aplicant_mmm_fee) . "' WHERE id = '" . $this_lead->id . "'" ); 
            // $this->db->query( "UPDATE leads SET 2nd_dependent_name = '" . strval( $this->2nd_dependent_name) . "' WHERE id = '" . $this_lead->id . "'" ); 
            // $this->db->query( "UPDATE leads SET 2nd_dependent_dob = '" . strval( $this->2nd_dependent_dob) . "' WHERE id = '" . $this_lead->id . "'" ); 
            // $this->db->query( "UPDATE leads SET 3nd_dependent_name = '" . strval( $this->3nd_dependent_name) . "' WHERE id = '" . $this_lead->id . "'" ); 
            $this->db->query( "UPDATE leads SET consultation_fee = '" . strval( $this->consultation_fee) . "' WHERE id = '" . $this_lead->id . "'" ); 
            $this->db->query( "UPDATE leads SET aplicant_departments_visa_fee = '" . strval( $this->aplicant_departments_visa_fee) . "' WHERE id = '" . $this_lead->id . "'" ); 
            $this->db->query( "UPDATE leads SET company_mmm_fee = '" . strval( $this->company_mmm_fee) . "' WHERE id = '" . $this_lead->id . "'" ); 
            $this->db->query( "UPDATE leads SET aplicant_company_mmm = '" . strval( $this->aplicant_company_mmm) . "' WHERE id = '" . $this_lead->id . "'" ); 
            $this->db->query( "UPDATE leads SET Total = '" . strval( $this->Total) . "' WHERE id = '" . $this_lead->id . "'" ); 
            $this->db->query( "UPDATE leads SET aplicant_company_mmm_fees = '" . strval( $this->aplicant_company_mmm_fees) . "' WHERE id = '" . $this_lead->id . "'" ); 
            $this->db->query( "UPDATE leads SET total_paid = '" . strval( $this->total_paid) . "' WHERE id = '" . $this_lead->id . "'" ); 
            $this->db->query( "UPDATE leads SET ocupation = '" . strval( $this->ocupation) . "' WHERE id = '" . $this_lead->id . "'" ); 
            $this->db->query( "UPDATE leads SET main_aplicant_name = '" . strval( $this->main_aplicant_name) . "' WHERE id = '" . $this_lead->id . "'" ); 
            $this->db->query( "UPDATE leads SET current_visa_subclass = '" . strval( $this->current_visa_subclass) . "' WHERE id = '" . $this_lead->id . "'" ); 
            $this->db->query( "UPDATE leads SET second_dependent_name = '" . strval( $this->second_dependent_name) . "' WHERE id = '" . $this_lead->id . "'" ); 
            $this->db->query( "UPDATE leads SET second_dependent_dob = '" . strval( $this->second_dependent_dob) . "' WHERE id = '" . $this_lead->id . "'" ); 
            $this->db->query( "UPDATE leads SET third_dependent_name = '" . strval( $this->third_dependent_name) . "' WHERE id = '" . $this_lead->id . "'" ); 

            $this_lead->aplicant_mmm_fee = $this->aplicant_mmm_fee;
			*/
            //$this_lead->save();



        }


        // $this->db->query( "UPDATE leads SET total = '" . strval( $this->total) . "' WHERE id = '" . $this_lead->id . "'" ); 
        // $this->db->query( "UPDATE veta_requerimiento SET total_paid = '" . strval( $this->total) . "' WHERE id = '" . $id . "'" );            

        // $this_lead->total = $this->total;
        // $this_lead->save();


        //$this->db->query( "UPDATE veta_requerimiento SET total = '" . $this_lead->id . "' WHERE id = '" . $id . "'" );  


        $this->relacionar_con_estudiante();

        $this->update_workflow();

        return $id;
    }

    public function update_workflow()
    {
        $invoice = $this->get_linked_beans('veta_requerimiento_veta_recibo', 'Veta_Recibo');
        foreach ($invoice as $i) {

            $workflow = new Opportunity();
            $workflow->retrieve($i->veta_recibo_opportunitiesopportunities_idb);

            if ((isset($workflow->id) and ($workflow->id != ""))) {

                /*
				$this->db->query("UPDATE 
						opportunities
					SET 
						current_visa_subclass = '" . $this->current_visa_subclass . "'
					WHERE 
						id = '" . $workflow->id . "'");
				*/

                $workflow->ocupation = $this->ocupation;
                $workflow->current_visa_subclass = $this->current_visa_subclass;

                $workflow->consultation_fee = $this->consultation_fee;
                $workflow->consultation_date = $this->consultation_date;
                $workflow->profession = $this->profession;
                $workflow->current_job_position = $this->current_job_position;
                $workflow->month_of_experience = $this->month_of_experience;
                $workflow->level_of_english = $this->level_of_english;
                $workflow->nationality = $this->nationality;
                $workflow->potential_visa_subclass = $this->potential_visa_subclass;
                $workflow->migration_agent_name = $this->migration_agent_name;
                $workflow->leap_id = $this->leap_id;
                $workflow->recluter_name = $this->recluter_name;
                $workflow->applicant_industry_c = $this->industry_aplicant;
                $workflow->secondary_aplicant_name = $this->secondary_aplicant_name;
                $workflow->virtual_visa_expire_secondary_applicant_date_c = $this->visa_expire_secondary_applicant_date_c;
                $workflow->secondary_dob = $this->secondary_dob;
                $workflow->secondary_pasport_number = $this->secondary_pasport_number;

                $workflow->dependent_name = $this->dependent_name;
                $workflow->visa_expire_1st_dependent_date_c = $this->virtual_visa_expire_1st_dependent_date_c;
                $workflow->dependent_dob = $this->dependent_dob;
				
                $workflow->second_dependent_name = $this->second_dependent_name;
                $workflow->virtual_visa_expire_2nd_dependent_date_c = $this->visa_expire_2nd_dependent_date_c;
                $workflow->second_dependent_dob = $this->second_dependent_dob;
                
				$workflow->third_dependent_name = $this->third_dependent_name;
                $workflow->virtual_visa_expire_3rd_dependent_date_c = $this->visa_expire_3rd_dependent_date_c;
                $workflow->third_dependent_dob_c = $this->third_dependent_dob_c;
				
				$workflow->fourth_dependent_name_c = $this->fourth_dependent_name_c;
                $workflow->virtual_visa_expire_4th_dependent_date_c = $this->visa_expire_4th_dependent_date_c;
                $workflow->fourth_dependent_dob_c = $this->fourth_dependent_dob_c;

                /*
				
				
				$workflow->secondary_pasport_number = $this->secondary_pasport_number;
				$workflow->secondary_pasport_number = $this->secondary_pasport_number;
				$workflow->secondary_pasport_number = $this->secondary_pasport_number;
				$workflow->secondary_pasport_number = $this->secondary_pasport_number;
				$workflow->secondary_pasport_number = $this->secondary_pasport_number;
				
				
				*/


                $company = new NVC_Companies();
                $company->retrieve($this->nvc_companies_veta_requerimiento_1nvc_companies_ida);
                if (!empty($company->id)) {
                    $workflow->phone_company = $company->phone_office;
                    $workflow->company_name = $company->name;
                    $workflow->company_sbs_expiry_date = $company->company_sbs_expiry_date;
                    $workflow->company_industry = $company->industry;
                    $workflow->email_company = $company->email1;
                    $workflow->company_leap_id_c = $company->company_leap_id;
                    $workflow->company_city = $company->billing_address_city;
                    $workflow->email_docs_portal_c = $company->email_docs_portal_c;
                }
                $workflow->save();
            }
        }



        return true;
    }

    public function find_lead($veta_requerimiento = false)
    {
        //error_log("requerimientos ". print_r($_REQUEST, TRUE) );
        if (($_REQUEST['return_module'] == 'Leads') and ($_REQUEST['return_id'] != '') and (isset($_REQUEST['return_id']))) {
            $lead = new Lead();
            $lead->retrieve($_REQUEST['return_id']);
            error_log("REQUERIMIENTO - ENCONTRO EL LEAD POR EL LEAD RETURN ID" . $_REQUEST['return_id']);
            error_log("REQUERIMIENTO - ENCONTRO EL LEAD POR EL LEAD" . $lead->id);
            return $lead;
        }
        if (isset($veta_requerimiento)) {
            $leads = $veta_requerimiento->get_linked_beans('veta_requerimiento_leads', 'Lead', 'date_entered');
            $lead = null;
            foreach ($leads as $l) {
                $lead = $l;
                error_log("REQUERIMIENTO - ENCONTRO EL LEAD POR EL REQEURIMIENTO " . $lead->id);
                return $lead;
            }
        }
    }
    /*
    private function asignar_comercial()
    {
        if ( empty( $this->id ) and ! isset( $_REQUEST[ "relate_id" ] ) )
        {
            $campaign = new Campaign();
            $campaign->retrieve( $this->campaign_id_c );
            $campaign->load_relationship( 'prospectlists' );

            $target_lists = $campaign->prospectlists->getBeans();

            if ( count( $target_lists ) > 0 )
            {
                foreach ( $target_lists as $list )
                {
                    if ( $list->list_type == 'Comerciales' )
                    {
                        $q = "SELECT DISTINCT related_id, COUNT(veta_requerimiento.id) AS CONT 
                                FROM prospect_lists_prospects
                                INNER JOIN users ON users.id = prospect_lists_prospects.related_id AND prospect_lists_prospects.deleted = 0
                                LEFT JOIN veta_requerimiento ON veta_requerimiento.assigned_user_id = users.id AND veta_requerimiento.deleted = 0 AND veta_requerimiento.estado = 'Asignado' 
                                WHERE related_type = 'Users'
                                  AND prospect_list_id =  '" . $list->id . "' 
                                  AND users.status = 'Active'
                                  AND users.deleted = 0                                   
                                GROUP BY related_id 
                                ORDER BY CONT ASC LIMIT 1";

                        $res = $this->db->query( $q, true, "Error obteniendo el usuario : " );

                        while ( $row = $this->db->fetchByAssoc( $res ) )
                        {
                            $this->assigned_user_id = $row[ 'related_id' ];
                        }
                    }
                }
            }
        }
    }
	*/
    private function asignar_comercial()
    {
        global $current_user;

        if (empty($this->fetched_row)) {

            if ($this->virtual_lead_id &&  $this->referido === 'Leads Bridge') {
                $lead = new Lead();
                $lead->retrieve($this->virtual_lead_id);

                if (!empty($lead)) {
                    $r = $lead->get_linked_beans('veta_requerimiento_leads', 'Veta_Requerimiento', 'date_modified DESC');

                    if (count($r) && $this->estado !== 'Asignado_Posventa') {
                        foreach ($r as $requerimiento) {
                            if ($requerimiento->estado !== 'Descartado') {
                                $this->assigned_user_id = $requerimiento->assigned_user_id;
                                return;
                            }
                        }
                    }
                }
            }

            if (!empty($this->assigned_user_id)) return;

            $campaign = new Campaign();
            $campaign->retrieve($this->campaign_id_c);
            $campaign->load_relationship('prospectlists');

            $target_lists = $campaign->prospectlists->getBeans();
            if (count($target_lists) > 0) {
                foreach ($target_lists as $list) {

                    if ($list->list_type == 'Comerciales') {

                        $q = "SELECT COUNT(*) as count
                        FROM prospect_lists_prospects plp
                        JOIN veta_requerimiento r on r.assigned_user_id = plp.related_id AND r.deleted = 0
                        WHERE plp.deleted = 0 AND r.referido = 'Leads Bridge' AND plp.prospect_list_id = '" . $list->id . "'";

                        $res = $this->db->query($q, true, "Error obteniendo el usuario : ");

                        if ($count = $this->db->fetchByAssoc($res)) {
                            $q = "SELECT plp.related_id  as user_id
                            FROM prospect_lists_prospects plp
                            WHERE plp.deleted = 0 AND plp.prospect_list_id = '" . $list->id . "'
                            ORDER BY related_id desc";

                            $res = $this->db->query($q, true, "Error obteniendo el usuario : ");
                            $users = [];

                            while ($u = $this->db->fetchByAssoc($res)) {
                                $users[] = $u;
                            }

                            logerror([$users, $count, $count['count'] % count($users)]);

                            if (count($users)) {
                                $this->assigned_user_id = $users[$count['count'] % count($users)]['user_id'];
                            } else {
                                $this->assigned_user_id = $current_user->id;
                            }
                        } else {
                            $this->assigned_user_id = $current_user->id;
                        }
                    } else {
                        $this->assigned_user_id = $current_user->id;
                    }
                }
            } else {
                $this->assigned_user_id = $current_user->id;
            }
        }
    }

    public function relacionar_con_estudiante()
    {
        $leads = $this->get_linked_beans('veta_requerimiento_leads', 'Lead');

        foreach ($leads as $lead) {

            if (isset($lead->contact_id)) {
                $this->load_relationship('veta_requerimiento_contacts');
                $this->veta_requerimiento_contacts->add($lead->contact_id);
            }
        }
    }

    /**
     * Este metodo obtiene los requerimientos cuya fecha de expiracion de la visa es menor a 4 meses y el estado es largo plazo
     * @return array
     */
    public function getRequerimientosFechaExpiracionVencida($meses)
    {
        $requerimientos_vencidos = array();

        // Obtenemos los requerimientos a largo plazo asociados con el prospecto
        $q = "SELECT veta_requerimiento.id FROM veta_requerimiento 
          INNER JOIN veta_requerimiento_leads_c ON veta_requerimiento_leads_c.veta_requerimiento_leadsveta_requerimiento_idb = veta_requerimiento.id and veta_requerimiento_leads_c.deleted = 0
          INNER JOIN leads ON leads.id = veta_requerimiento_leads_c.veta_requerimiento_leadsleads_ida AND leads.deleted = 0  
          INNER JOIN leads_cstm ON leads_cstm.id_c = leads.id AND leads_cstm.fecha_expiracion_visa_c IS NOT NULL
          WHERE veta_requerimiento.deleted = 0 AND veta_requerimiento.estado = 'Largo_Plazo' AND TIMESTAMPDIFF(MONTH,NOW(), leads_cstm.fecha_expiracion_visa_c) < " . $meses . " AND leads_cstm.fecha_expiracion_visa_c > NOW()";

        $db  = DBManagerFactory::getInstance();
        $res = $db->query($q);

        while ($row = $db->fetchByAssoc($res)) {
            $requerimiento = new Veta_Requerimiento();
            $requerimiento->retrieve($row['id']);
            $requerimientos_vencidos[$row['id']] = $requerimiento;
        }

        $q = "SELECT veta_requerimiento.id FROM veta_requerimiento 
          INNER JOIN veta_requerimiento_contacts_c ON veta_requerimiento_contacts_c.veta_requerimiento_contactsveta_requerimiento_idb = veta_requerimiento.id and veta_requerimiento_contacts_c.deleted = 0
          INNER JOIN contacts ON contacts.id = veta_requerimiento_contacts_c.veta_requerimiento_contactscontacts_ida AND contacts.deleted = 0  
          INNER JOIN contacts_cstm ON contacts_cstm.id_c = contacts.id AND contacts_cstm.fecha_expiracion_visa_c IS NOT NULL
          WHERE veta_requerimiento.deleted = 0 AND veta_requerimiento.estado = 'Largo_Plazo' AND TIMESTAMPDIFF(MONTH, NOW(), contacts_cstm.fecha_expiracion_visa_c) < " . $meses . " AND contacts_cstm.fecha_expiracion_visa_c > NOW()";

        $db  = DBManagerFactory::getInstance();
        $res = $db->query($q);

        while ($row = $db->fetchByAssoc($res)) {
            $requerimiento = new Veta_Requerimiento();
            $requerimiento->retrieve($row['id']);
            $requerimientos_vencidos[$row['id']] = $requerimiento;
        }

        return $requerimientos_vencidos;
    }

    /**
     * Este metodo obtiene los requerimientos cuya fecha de viaje no supera los X meses en el futuro y el estado es largo plazo
     * @return array
     */
    public function getRequerimientosFechaViajeVencida($meses)
    {
        $_meses                  = 4;
        $requerimientos_vencidos = array();

        // Obtenemos los requerimientos a largo plazo asociados con el prospecto
        $q = "SELECT veta_requerimiento.id FROM veta_requerimiento 
          WHERE veta_requerimiento.deleted = 0 AND veta_requerimiento.estado = 'Largo_Plazo' AND 
          TIMESTAMPDIFF(MONTH,NOW(), fecha_viaje) < " . $_meses . " AND fecha_viaje > NOW()";

        $db  = DBManagerFactory::getInstance();
        $res = $db->query($q);

        while ($row = $db->fetchByAssoc($res)) {
            $requerimiento = new Veta_Requerimiento();
            $requerimiento->retrieve($row['id']);
            $requerimientos_vencidos[$row['id']] = $requerimiento;
        }

        return $requerimientos_vencidos;
    }
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function cloneVetaRequerimiento($originalId, $transferredFromId) {
        /*
		echo "<html>
				<head>
					<script>
						console.log('en requerimiento Recibo ID: " . $transferredFromId . "');
						console.log('en requerimiento Requerimiento ID: " . $originalId . "');
						console.log('en requerimiento New cloned record ID: " . $newId . "');						
					</script>
				</head>
				<body></body>
			  </html>";
		*/
		
		// 1. Obtener el registro original
        $originalBean = BeanFactory::getBean('Veta_Requerimiento', $originalId);
        if(empty($originalBean)) {
            return false;
        }
        
        // 2. Crear un nuevo bean de Veta_Requerimiento
        $newBean = BeanFactory::newBean('Veta_Requerimiento');
        
        // 3. Copiar campos del registro original (omitimos id, date_entered, date_modified, etc.)
        foreach($originalBean->fetched_row as $field => $value) {
            if(in_array($field, ['id', 'date_entered', 'date_modified', 'name', 'consultation_fee', 'consultation_fee_to_company_c', 'consultation_date', 'url_c'])) {
                continue;
            }
            $newBean->$field = $value;
        }
        
        // 4. Asignar el valor en transferred_from_billing_c
        //$newBean->transferred_from_billing_c = $transferredFromId;
		$newBean->veta_recibo_id_c = $transferredFromId;
		
        
        // 5. Guardar el nuevo registro
        $newBean->save();
        
        // 6. Clonar relaciones
        // reemplazar 'nombre_relacion1', 'nombre_relacion2', etc. por los nombres reales de las relaciones definidas en Veta_Requerimiento.
		//$relaciones = ['nombre_relacion1', 'nombre_relacion2']; 
        $relaciones = ['veta_requerimiento_leads', 'nvc_companies_veta_requerimiento_1', 'veta_requerimiento_contacts']; 
		
		//'veta_requerimiento_veta_recibo'
        
        foreach($relaciones as $relName) {
            if($originalBean->load_relationship($relName)) {
                // Obtiene todos los beans relacionados
                $relatedBeans = $originalBean->$relName->getBeans();
                foreach($relatedBeans as $relatedBean) {
                    // Agrega cada bean relacionado al nuevo registro
                    $newBean->$relName->add($relatedBean->id);
                }
            }
        }
        
        return $newBean->id;
		
    }
}
