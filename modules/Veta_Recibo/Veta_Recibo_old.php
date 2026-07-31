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

require_once( 'modules/Veta_TRM/Veta_TRM.php' );
require_once( 'modules/ACLRoles/ACLRole.php' );
require_once( 'modules/Opportunities/Opportunity.php' );
require_once( 'modules/Veta_Aplicacion/Veta_Aplicacion.php' );
require_once( 'modules/Veta_ServicioCliente/Veta_ServicioCliente.php' );

class Veta_Recibo extends Basic
{
    public $new_schema  = true;
    public $module_dir  = 'Veta_Recibo';
    public $object_name = 'Veta_Recibo';
    public $table_name  = 'veta_recibo';
    public $importable  = false;

    public  $id;
    public  $name;
    public  $date_entered;
    public  $date_modified;
    public  $modified_user_id;
    public  $modified_by_name;
    public  $created_by;
    public  $created_by_name;
    public  $description;
    public  $deleted;
    public  $created_by_link;
    public  $modified_user_link;
    public  $assigned_user_id;
    public  $assigned_user_name;
    public  $assigned_user_link;
    public  $SecurityGroups;
    public  $pais;
    public  $departamento;
    public  $ciudad;
    public  $primer_pago;
    public  $currency_id;
    public  $subtotal;
    public  $gran_total;
    public  $pendiente_por_pagar;
    public  $pagado;
    public  $estado;
    public  $examen_medico;
    public  $seguro;
    public  $total_visa;
    public  $veta_curso_id_c;
    private $no_verificar_proceso_venta = false;
    public $components;
    public $concept;
    public $fee;
    public $visaType;
    public $total_visabuclass_fees;
    
    public $company_paid;
    public $applicant_new_services;
    public $company_new_services;
    public $total_visabuclass_fees_company;
	public $total_skill_assessmente_applicant_c;
	public $total_skill_assessmente_company_c;
	public $company_paid_c;


    public function bean_implements( $interface )
    {
        switch ( $interface )
        {
            case 'ACL':
                return true;
        }

        return false;
    }

    private function set_consecutivo()
    {

        if ( ! isset( $this->id ) || empty( $this->id ) )
        {

            //$query  = "SELECT COUNT(id) AS num FROM veta_recibo LIMIT 1";
			$query  = "SELECT name as num FROM vetacrm2.veta_recibo order by date_entered desc limit 1";
            $result = $this->db->query( $query, true, "Error obteniendo el consecutivo del recibo" );
            $row    = $this->db->fetchByAssoc( $result );

            if ( $row != null )
            {
                $this->name = $row[ 'num' ] + 1;
            }
        }
    }

    public function actualizar_oportunidad( $o )
    {

		global $timedate;
		if ( $o == null )
        {
			$o = $this->obtener_oportunidad( $this->id );
		}

        if ( $o != null )
        {
			$o->leads_opportunities_1leads_ida = $this->veta_recibo_leadsleads_ida;

            $o->estado_cartera_c    = $this->estado;
            $o->pendiente_cartera_c = $this->pendiente_por_pagar * 1;
			
			
			
			
			
			$taxes_fees = new NVC_Taxes_and_Fees_Config;
			$taxes_fees->retrieve("c83b8f80-f55b-6938-0b3d-6156426782bf");     

			$taxes_GST = $taxes_fees->gst /100;
			$taxes_Department_Credit_Card= $taxes_fees->department_cc_surcharge / 100;
			
			$requermimento_presupuesto = $this->get_linked_beans( 'veta_requerimiento_veta_recibo' , 'Veta_Recibo' );
			$id_requermimiento ="";
			foreach( $requermimento_presupuesto as $req_pre ) {            
				$id_requermimiento = $req_pre->id;
			}

			$req = new Veta_Requerimiento();
			$req->retrieve($id_requermimiento); 

			$c = new NVC_Companies();		
			$c->retrieve( $req->nvc_companies_veta_requerimiento_1nvc_companies_ida );			
			
			$total_without_gst = ($this->total_visabuclass_fees - $req->consultation_fee - $this->descuento) * 1; 
			$total_taxes_GST = ($total_without_gst) * $taxes_GST; //$total_taxes_GST = ($this->total_visabuclass_fees - $req->consultation_fee - $this->descuento) * $taxes_GST;

			$company_total_without_gst = $this->total_visabuclass_fees_company - $this->company_discount_c; 
			$company_total_taxes_GST = $company_total_without_gst * $taxes_GST;

			$total_visabuclass_fees_GST_company = $company_total_taxes_GST + ($company_total_without_gst);

			$total_visabuclass_fees_GST = $total_taxes_GST + ($total_without_gst); //$total_visabuclass_fees_GST = $total_taxes_GST + ($this->total_visabuclass_fees - $req->consultation_fee - $this->descuento);

			$total_taxes_Department_Credit_Card = $this->total_visa * ($taxes_Department_Credit_Card);

			$total_taxes_Department_Credit_Card_company = $this->total_visa_company_c * ($taxes_Department_Credit_Card); 
			
			
			$o->total = $this->gran_total;
			$o->outstanding_amount = $this->pendiente_por_pagar;
			$o->total_paid = $this->pagado;
			$o->deposit = $this->pagado;
			$o->discount = ($this->descuento * 1);
			$o->aplicant_departments_visa_fee = $this->total_visa;
			
			$o->company_deposits_c = $this->company_paid_c;
			$o->company_total_c = $this->company_grand_total_c;
			$o->company_outstanding_amount_c = $this->company_outstanding_amount_c;
			$o->company_discount_c = ($this->company_discount_c * 1);			
			$o->company_departments_visa_fee_c = $this->total_visa_company_c;		
			
			$o->insurance_value = ($this->seguro * 1);
			
			$o->aplicant_mmm_fee = $total_visabuclass_fees_GST; // Incluye el GST
			$o->gst_percentage = $total_taxes_GST;
			$o->total_without_gst = $total_without_gst;
			
			$o->department_credit_card_surcharge_percentage = $total_taxes_Department_Credit_Card;
			$o->department_visa_fee_base_application_charge = $this->total_visa + $total_taxes_Department_Credit_Card;
			
			$o->total_skill_assessmente_applicant_c = $this->total_skill_assessmente_applicant_c;
			
		
			
			
			$o->company_mmm_fee = $total_visabuclass_fees_GST_company;
			$o->company_gst_c = $company_total_taxes_GST;
			$o->company_total_without_gst_c = $company_total_without_gst;			
			
			$o->company_dept_cc_surcharge_c = $total_taxes_Department_Credit_Card_company;
			$o->company_dept_visa_fee_base_c = $this->total_visa_company_c + $total_taxes_Department_Credit_Card_company;
			
			$o->total_skill_assessmente_company_c = $this->total_skill_assessmente_company_c; 
			
			
			$o->applicant_company_total_c = $this->gran_total + $this->company_grand_total_c;
			$o->applicant_company_total_paid_c = $this->pagado + $this->company_paid_c;
			$o->applicant_company_outstanding_amount_c = ($o->outstanding_amount * 1) + ($o->company_outstanding_amount_c * 1);
			
			$o->aplicant_company_mmm_fees = ($o->aplicant_mmm_fee * 1) + ($o->company_mmm_fee * 1);
			$o->applicant_company_gst_c = $o->company_gst_c + $o->gst_percentage;
			$o->applicant_company_total_without_gst_c = $o->total_without_gst + $o->company_total_without_gst_c;
			$o->total_skill_assessmente_applicant_company_c = $o->total_skill_assessmente_company_c + $o->total_skill_assessmente_applicant_c;
			
			
			$o->applicant_company_departments_visa_fee_c = $o->aplicant_departments_visa_fee + $o->company_departments_visa_fee_c;
			$o->applicant_company_department_visa_fee_base_application_charge_c = $o->department_visa_fee_base_application_charge + $o->company_dept_cc_surcharge_c;
			$o->applicant_company_department_credit_card_surcharge_c = $o->department_credit_card_surcharge_percentage + $o->company_dept_cc_surcharge_c;
			
			
			
			
			$diferencia_aplicante = $o->total_without_gst - $o->total_paid;
			if ($diferencia_aplicante <= 0 ) {
				$monto_aplicante = $o->total_without_gst;
			} else {
				$monto_aplicante = $o->total_paid;
			}			
			
			$diferencia_company = $o->company_total_without_gst_c - $o->company_deposits_c;
			if ($diferencia_company <= 0 ) {
				$monto_company = $o->company_total_without_gst_c;
			} else {
				$monto_company = $o->company_deposits_c;
			}
			
			$o->applicant_company_total_mmm_fees_paid_c = ($monto_aplicante * 1) + ($monto_company * 1);
			$o->applicant_company_mmm_fees_outstanding_amount_c =  ($o->applicant_company_total_without_gst_c * 1) - ($o->applicant_company_total_mmm_fees_paid_c * 1);
		
		
			
			$o->email_company = $req->email_company;
			$o->consultation_fee = ($req->consultation_fee * 1); 
			$o->leap_id = $req->leap_id; 
			
			$o->recluter_name = $req->recluter_name; 
			$o->company_name = $req->company_name; 				
			$o->company_leap_id_c = $c->company_leap_id;  
			
            $o->save();
        }
    }

    public function has_proceso_ventas()
    {

        $tiene = false;

        $o = $this->obtener_oportunidad( $this->id );

        if ( $o != null )
        {

            $tiene = true;
        }

        return $tiene;
    }

    public function save( $check_notify = false )
    {        
		$this->update_closing_date($this);
		
		/*
        if( $this->has_proceso_ventas() and $this->no_verificar_proceso_venta == false) {

            $this->redireccionar( 'No se puede actualizar porque ya existe un proceso de ventas', $this->id );
        } 
		*/

        if ( $this->is_gerente_contable() )
        {
            $this->set_consecutivo();
            $this->update_totals( false );
			
			error_log("estado_recibo ". $this->estado);
			
            //if( $this->estado != 'Descartado' and $this->estado != 'Devolucion_Proceso' and $this->estado != 'Devolucion_Finalizado' and $this->estado != 'Nuevo' ) {
            if ( $this->estado == 'Nuevo' or $this->estado == 'Abono' or $this->estado == 'Pagado' )
            {

                if ( (($this->pagado * 1) + ($this->company_paid_c * 1)) > 0 )
                {
                    $this->estado = 'Abono';
                }

                if ( (($this->pendiente_por_pagar * 1) + ($this->company_outstanding_amount_c * 1)) <= 0 )
                {
                    $this->estado = 'Pagado';
                }
            }

            $this->actualizar_oportunidad( null );
            $this->no_verificar_proceso_venta = false;
			
			error_log("closing_date - FINALIZADO EL SAVE DE RECIBO");
			
            return parent::save( $check_notify ); // TODO: Change the autogenerated stub
        }
        else
        {
            $this->redireccionar( 'Solo puede salvar un recibo un gerente contable' );
        }    
    }

    public function get_person()
    {

        $p = null;

        $leads    = $this->get_linked_beans( 'veta_recibo_leads', 'Leads' );
        $contacts = $this->get_linked_beans( 'veta_recibo_contacts', 'Contacts' );

        foreach ( $leads as $lead )
        {
            $p = $lead;
        }

        foreach ( $contacts as $contact )
        {
            $p = $contact;
        }

        return $p;
    }

    /**
     * Este metodo obtiene la oportunidad relacionada al recibo
     *
     * @param string $rid Es el id del recibo
     * @return Opportunity  Es la oportunidad relacionada, retorna nulo si no hay oportunidad
     */
    public function obtener_oportunidad( $rid )
    {

        $o = null;
        $r = new Veta_Recibo();
        $r->retrieve( $rid );

        $oportunidades = $r->get_linked_beans( 'veta_recibo_opportunities', 'Opportunity' );

        foreach ( $oportunidades as $op )
        {
            $o = $op;
        }

        return $o;
    }
	
	public function update_closing_date ( $recibo = false ){		
		
		global $timedate;
		
		
		//$this->retrieve( $recibo_id );
		
		$pa = $recibo->get_primer_abono();
		$cpa = $recibo->get_company_first_payment();
		
		$o = $recibo->obtener_oportunidad( $recibo->id ); 
		
		if ( $o == null ) return false;
                
		
		if ( isset( $pa ) )
		{
			$o->date_closed = $timedate->to_db_date( $pa->date_entered );
			$o->aplicant_1st_payment_date = $timedate->to_db_date( $pa->date_entered );
			$o->fecha_cierre_c = $timedate->to_db_date( $pa->date_entered );
			$o->closing_date_applicant_c = $pa->date_entered;
			
		}		

		if ( isset( $cpa ) )
		{                
			$o->company_1st_payment_date = $cpa->date_entered;   
			$o->company_1st_payment_date = $timedate->to_db_date( $cpa->date_entered );					
			$o->company_first_payment_amount =$cpa->deposit_amount;	
			$o->closing_date_company_c = $cpa->date_entered;				
		}	
		
		
		if (isset($pa->date_entered)) {
			error_log("closing_date - PA entro");
			$o->fecha_cierre_c = substr($pa->date_entered, 0, 10);
			error_log("closing_date - pa asigno closing date pa". $o->fecha_cierre_c);
			if (isset($cpa->date_entered)) {
				
				$dateTimestamppa = strtotime($pa->date_entered);
				$dateTimestampcpa = strtotime($cpa->date_entered);
				
				if ($dateTimestamppa > $dateTimestampcpa) {
					error_log("closing_date - pa date". $pa->date_entered);
					error_log("closing_date - cpa date". $cpa->date_entered);
					$o->fecha_cierre_c = substr($cpa->date_entered, 0, 10);
					error_log("closing_date - CPA asigno closing date cpa". $o->fecha_cierre_c);
				}
			}
		} else if (isset($cpa->date_entered)) {
			$o->fecha_cierre_c = substr($cpa->date_entered, 0, 10);
			error_log("closing_date - Cpa asigno closing date Cpa". $o->fecha_cierre_c); 
		} else {
			error_log("closing_date - NO TIENE NINGUN PAGO"); 
		}
		
		$o->save(); 
		error_log("closing_date - finalizado y actualizado");
		return true;
		
		
		
		
	}

    public function new_opportunity( $recibo_id = false) : Opportunity
    {

        global $timedate;
		
		
		$this->retrieve( $recibo_id );
		
		$pa = $this->get_primer_abono();
		$cpa = $this->get_company_first_payment();
		
		$sw_payments = 0;
		if (isset( $pa ))
		{
			$sw_payments = 1;		
		}
		
		if (isset( $cpa ))
		{
			$sw_payments = 1;		
		}
		
		
		if ($sw_payments == 0)
		{			
			error_log("Alfonso error- NO SE CREO EL WORKFLOW");
			$o = new Opportunity();			
			return $o;			
		}
		
		
		
        $o = $this->obtener_oportunidad( $this->id );
        // Si no existe oportunidad
        if ( $o == null )
        {
			$this->update_totals();
			//$this->update_total_visa();

            $pre = new Veta_Presupuesto();
            $pre->retrieve( $this->veta_recibo_veta_presupuestoveta_presupuesto_ida );

            $person = $this->get_person();
            $o      = new Opportunity();

            $o->sales_stage                  = "Progreso";
            $o->amount                       = $o->amount_usdollar = $this->pesos * 1;
            $o->monto_dolares_australianos_c = intval( $this->gran_total * 1 );
            $o->total = intval( $this->gran_total * 1 );
            $o->estado_cartera_c             = "Nuevo";
            $o->estado_gestion_comercial_c   = "Cotizacion";
            $o->estado_servicio_al_cliente_c = "Preparacion_Embajada";
            $o->estado_visas_c               = "Pendiente_Luz_Verde";

            $detalles = $this->get_linked_beans( 'veta_detallerecibo_veta_recibo', 'Veta_DetalleRecibo' );

            if ( count( $detalles ) > 0 ) {
                $o->estado_admisiones_c = "Aplicacion";
            }
            else {
                $o->estado_admisiones_c = "";
            }
			
			$customer_service_user = $this->get_customer_service_user();
			$o->user_id2_c = $customer_service_user;

            $o->estado_pago_institucion = "";
            $o->assigned_user_id        = $this->assigned_user_id;
            $o->pendiente_cartera_c     = $this->pendiente_por_pagar * 1;
            $o->fecha_expiracion_visa_c = $timedate->to_db( $person->fecha_expiracion_visa_c );
            $o->fecha_viaje_c           = $person->module_name == 'Leads' ? $timedate->to_db_date( $person->fecha_viaje_2_c ) : $timedate->to_db_date( $person->fecha_de_viaje_c );
            $o->fecha_presupuesto_c     = $pre->date_entered;

            

            if ( isset( $pa ) )
            {
                $o->date_closed = $timedate->to_db_date( $pa->date_entered );
				$o->aplicant_1st_payment_date = $timedate->to_db_date( $pa->date_entered );
                $o->fecha_cierre_c = $timedate->to_db_date( $pa->date_entered );
				$o->closing_date_applicant_c = $pa->date_entered;
				
            }
            

            if ( isset( $cpa ) )
            {                
                $o->company_1st_payment_date = $cpa->date_entered;   
				$o->company_1st_payment_date = $timedate->to_db_date( $cpa->date_entered );					
                $o->company_first_payment_amount =$cpa->deposit_amount;	
				$o->closing_date_company_c = $cpa->date_entered;				
            }			
			


            //$o->veta_recibo_id_c = $this->id;
            $o->asesor_servicio_cliente_c = "1";  //Todo: En una proxima fase
            //$o->pendiente_pago_a_colegios = 0; Todo: ver como se puede calcular el pago a colegios
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			$this_lead = new Lead();
			$this_lead->retrieve($this->veta_recibo_leadsleads_ida); 

			$requermimento_presupuesto = $this->get_linked_beans( 'veta_requerimiento_veta_recibo' , 'Veta_Recibo' );
			$id_requermimiento ="";
			foreach( $requermimento_presupuesto as $req_pre ) {            
				$id_requermimiento = $req_pre->id;
			}        
			
			//veta_requerimiento_veta_reciboveta_requerimiento_ida

			$this_requirement = new Veta_Requerimiento();        
			$this_requirement->retrieve($id_requermimiento);
			
			

			if ($this_requirement->id != "")
			{
				$c = new NVC_Companies();		
				$c->retrieve( $this_requirement->nvc_companies_veta_requerimiento_1nvc_companies_ida );
			
			
				$pa = $this->get_primer_abono();

				if ( isset( $pa ) )
				{
					// $o->date_closed    = $timedate->to_db_date( $pa->date_entered );
					// $o->fecha_cierre_c = $timedate->to_db( $pa->date_entered );
					$this_requirement->aplicant_1st_payment_date = $timedate->to_db_date( $pa->date_entered );
					$this_requirement->aplicant_first_payment_amount = $pa->monto * 1;                
					$o->aplicant_1st_payment_date = $timedate->to_db_date( $pa->date_entered );
					$o->aplicant_first_payment_amount = $pa->monto * 1;                                
				}

				$cpa = $this->get_company_first_payment();

				if ( isset( $cpa ) )
				{                
					$this_requirement->company_1st_payment_date = $timedate->to_db_date($cpa->date_entered);                
					$this_requirement->company_first_payment_amount = $cpa->deposit_amount * 1;
					
					//$o->company_1st_payment_date = $timedate->$cpa->date_entered; 
					$o->company_1st_payment_date = $timedate->to_db_date($cpa->date_entered); 
					$o->company_first_payment_amount = $cpa->deposit_amount * 1; 
				}
				if(($this_requirement->id != '') and (isset($this_requirement->id))) {
					error_log("Alfonso2 - ID REQUERIMIENTO EN EL RECIBO". $this_requirement->id);
					
					$this_requirement->save();
				}
				

				$o->profession = $this_requirement->profession; 
				$o->current_visa_subclass = $this_requirement->current_visa_subclass;                 
				$o->current_job_position = $this_requirement->current_job_position; 
				$o->month_of_experience = $this_requirement->month_of_experience; 
				$o->level_of_english = $this_requirement->level_of_english; 
				$o->nationality = $this_requirement->nationality; 
				$o->potential_visa_subclass = $this_requirement->potential_visa_subclass; 
				$o->cost_agrement_visa_subclass = $this_requirement->cost_agrement_visa_subclass; 
				$o->cost_agrement_number = $this_requirement->cost_agrement_number; 
				$o->quote_date = $this_requirement->quote_date;     
				$o->migration_agent_name = $this_requirement->migration_agent_name; 
				$o->leap_id = $this_requirement->leap_id; 
				$o->recluter_name = $this_requirement->recluter_name; 
				$o->company_name = $this_requirement->company_name; 
				
				$o->company_leap_id_c = $c->company_leap_id;  
				
				$o->company_city = $this_requirement->company_city; 
				$o->company_industry = $this_requirement->company_industry; 
				$o->email_company = $this_requirement->email_company; 
				$o->phone_company = $this_requirement->phone_company; 
				$o->company_sbs_expiry_date = $this_requirement->company_sbs_expiry_date; 
				$o->secondary_aplicant_name = $this_requirement->secondary_aplicant_name; 
				$o->secondary_pasport_number = $this_requirement->secondary_pasport_number; 
				$o->secondary_dob = $this_requirement->secondary_dob; 
				$o->dependent_name = $this_requirement->dependent_name; 
				$o->dependent_dob = $this_requirement->dependent_dob;              
				// $o->2nd_dependent_name = $this_lead->2nd_dependent_name; 
				// $o->2nd_dependent_dob = $this_lead->2nd_dependent_dob; 
				// $o->3nd_dependent_name = $this_lead->3nd_dependent_name; 
				$o->consultation_fee = $this_requirement->consultation_fee; 
				
				
				$o->ocupation = $this_requirement->ocupation; 
				$o->main_aplicant_name = $this_requirement->main_aplicant_name; 
				$o->current_visa_subclass = $this_requirement->current_visa_subclass; 
				$o->second_dependent_name = $this_requirement->second_dependent_name; 
				$o->second_dependent_dob = $this_requirement->second_dependent_dob; 
				//$o->third_dependent_name = $this_lead->third_dependent_name; 
				$o->third_dependent_name = $this_requirement->third_dependent_name;             

				$o->nomination_app_exp_date = $this_requirement->nomination_app_exp_date;
				$o->nomination_app_date = $this_requirement->nomination_app_date;
				$o->skill_assessment_app_exp_date = $this_requirement->skill_assessment_app_exp_date;
				$o->skill_assessment_app_date = $this_requirement->skill_assessment_app_date;
				$o->visa_app_exp_date = $this_requirement->visa_app_exp_date;
				$o->visa_app_date = $this_requirement->visa_app_date;
				$o->recruitment = $this_requirement->recruitment;
				$o->recruitment_exp_date = $this_requirement->recruitment_exp_date;

				
				$o->company_lead_id_c = $this_requirement->company_lead_id_c;
				
				
				
				
				//$this_requirement->nvc_companies_veta_requerimiento_1nvc_companies_ida
				//$query_user_company = "select user_id_c from nvc_companies_cstm where id_c = '$this_requirement->nvc_companies_veta_requerimiento_1nvc_companies_ida'";
				
				
				error_log("CASE MANAGER 1" . $c->user_id_c);
				
				$sw_assigned = 0;
				if((isset($c->assigned_case_manager_c)) and ($c->assigned_case_manager_c != '') ){
					error_log("CASE MANAGER ASIGNACION POR COMPAÑIA"); 
					$o->user_id3_c = $c->user_id_c;	
					$sw_assigned = 1;
					
				} else {
					
					$cantidad_workflows = 0;
					error_log("CASE MANAGER ASIGNACION POR ROUND ROBIN");
					
					$query_opportunities = 'select count(opportunities_cstm.user_id3_c) as cantidad
											from opportunities
											left join opportunities_cstm on opportunities.id = opportunities_cstm.id_c
											where user_id3_c is not null
											and opportunities.deleted = 0;';
					
					$result_opportunities = $this->db->query( $query_opportunities, true, "Error obteniendo el consecutivo del recibo" );
					$row    = $this->db->fetchByAssoc( $result_opportunities );

					if ( $row != null )
					{
						error_log("CASE MANAGER ASIGNACION POR ROUND ROBIN cantidad de workflows " . $row[ 'cantidad' ]);
						
						$cantidad_workflows = $row[ 'cantidad' ];
						
					}
					
					$cantidad_usuarios = 0;
					
					
					$query_count_users = "select count(*) as cantidad_usuarios
						from users_cstm
						left join users on users_cstm.id_c = users.id
						WHERE (users_cstm.user_department_c = 'Case_Manager' or users_cstm.user_department_2_c = 'Case_Manager')
						and users.status = 'Active';";
					
					$result_usuarios = $this->db->query( $query_count_users, true, "Error obteniendo el consecutivo del recibo" );
					$row    = $this->db->fetchByAssoc( $result_usuarios );

					if ( $row != null )
					{
						error_log("CASE MANAGER ASIGNACION POR ROUND ROBIN cantidad de usuarios " . $row[ 'cantidad_usuarios' ]);
						
						$cantidad_usuarios = $row[ 'cantidad_usuarios' ];
						
					}
					
					if(($cantidad_usuarios > 0) and ($cantidad_workflows >0)){
						$mod_workflows = $cantidad_workflows % $cantidad_usuarios;
						
						
						
						
						$query_user = "select users_cstm.id_c as id
							from users_cstm
							left join users on users_cstm.id_c = users.id
							WHERE (users_cstm.user_department_c = 'Case_Manager' or users_cstm.user_department_2_c = 'Case_Manager')
							and users.status = 'Active'
							order by id_c
							limit 1 offset $mod_workflows;";
						
						$result_user = $this->db->query( $query_user, true, "Error obteniendo el consecutivo del recibo" );
						$row    = $this->db->fetchByAssoc( $result_user );

						if ( $row != null )
						{
							error_log("CASE MANAGER ASIGNACION POR ROUND ROBIN A " . $row[ 'id' ]);
							$o->user_id3_c = $row[ 'id' ];
							$sw_assigned = 1;
							
						}
					}
					
				}
				
				if ($sw_assigned == 0) {
					$o->user_id3_c = "7e96e161-de8d-10cb-0b20-623e4d3b5a59";
				}
				
				
				
				
				
				$o->save();   
			} 
			
			
			
			
			
			

            //$o->save();

            $o->load_relationship( 'veta_recibo_opportunities' );
            $o->veta_recibo_opportunities->add( $this->id );


            //$this->activar_servicio_cliente( $o );
			$this->activar_servicio_cliente($o, $customer_service_user);
            $this->activar_aplicacion( $o );			
			
			$this->actualizar_oportunidad( $o );		
        }
        
		
		
		
		
		
		error_log("Alfonso error SE CREO EL WORKFLOW");
        return $o;
    }

    private function get_servicio_cliente()
    {

        $sc = new Veta_ServicioCliente();

        $query = "SELECT veta_serviciocliente.id AS ID FROM veta_serviciocliente
                    INNER JOIN veta_serviciocliente_opportunities_c ON veta_serviciocliente_opportunities_c.veta_serviciocliente_opportunitiesveta_serviciocliente_idb = veta_serviciocliente.id AND veta_serviciocliente_opportunities_c.deleted = 1
                    INNER JOIN opportunities ON opportunities.id = veta_serviciocliente_opportunities_c.veta_serviciocliente_opportunitiesopportunities_ida AND opportunities.deleted = 1 
                    INNER JOIN veta_recibo_opportunities_c ON veta_recibo_opportunities_c.veta_recibo_opportunitiesopportunities_idb = opportunities.id AND veta_recibo_opportunities_c.deleted = 1
                    INNER JOIN veta_recibo ON veta_recibo.id = veta_recibo_opportunities_c.veta_recibo_opportunitiesveta_recibo_ida AND veta_recibo.deleted = 0 AND veta_recibo.id = '" . $this->id . "' LIMIT 1";

        $result = $this->db->query( $query, true, "Error obteniendo el consecutivo del recibo" );
        $row    = $this->db->fetchByAssoc( $result );

        if ( $row != null )
        {
            $sc->retrieve( $row[ 'ID' ] );
        }

        return $sc;
    }

	public function get_customer_service_user(){
		
		$requermimento_presupuesto = $this->get_linked_beans( 'veta_requerimiento_veta_recibo' , 'Veta_Recibo' );
		$id_requermimiento ="";
		foreach( $requermimento_presupuesto as $req_pre ) {            
			$id_requermimiento = $req_pre->id;
		}        
		
		//veta_requerimiento_veta_reciboveta_requerimiento_ida

		$this_requirement = new Veta_Requerimiento();        
		$this_requirement->retrieve($id_requermimiento);
		
		

		if ($this_requirement->id != "")
		{
			$c = new NVC_Companies();		
			$c->retrieve( $this_requirement->nvc_companies_veta_requerimiento_1nvc_companies_ida );
		}
		
		$sw_assigned = 0;
		if((isset($c->assigned_custome_services_c)) and ($c->assigned_custome_services_c != '') ){
			error_log("CASE MANAGER ASIGNACION POR COMPAÑIA"); 
			return $c->user_id1_c;	
		} else {		
			$q = "SELECT u.id_c as id_assigned_user, count(*)
			FROM users_cstm u
			join vetacrm2.users us on us.id=u.id_c
			LEFT JOIN veta_serviciocliente o ON o.assigned_user_id = u.id_c
			WHERE u.user_department_c = 'Customer_service'
			AND us.status = 'Active'
			AND (o.deleted = 0 or o.deleted is null) 
			AND (o.estado in (
				'Preparacion_Embajada'
				) or o.deleted is null)
			GROUP BY u.id_c
			ORDER BY COUNT(*)";

			$res = $this->db->query($q, true, "Error obteniendo el usuario : ");
			$assigned_user = $this->db->fetchByAssoc($res);
			return $assigned_user?$assigned_user['id_assigned_user']: '';
		}

		
	}

    //private function activar_servicio_cliente( Opportunity $o )
	public function activar_servicio_cliente(Opportunity $o, $customer_service_user = null)
    {

        $person = $this->get_person();

        // Se activa el area de servicio al cliente y de aplicacion.
        $sc                   = $this->get_servicio_cliente();
        //$sc->assigned_user_id = $this->get_customer_service_user();   // Todo: proxima fase ver como asignar automaticamente
		$sc->assigned_user_id = $customer_service_user;
        $sc->estado           = 'Preparacion_Embajada';

        if ( $person->module_name == 'Contacts' )
        {
            $sc->contact_id_c = $person->id;
        }

        if ( $person->module_name == 'Leads' )
        {
            $sc->lead_id_c = $person->id;
        }

        $sc->fecha_expiracion_visa = $person->fecha_expiracion_visa_c;
        //$sc->fecha_proximo_contacto = $person->fecha_proximo_contacto_c;
        //$sc->fecha_ultimo_contacto  = $person->fecha_ultimo_contacto_c;

        $sc->save( false );

        $sc->load_relationship( 'veta_serviciocliente_opportunities' );
        $sc->veta_serviciocliente_opportunities->add( $o->id );
		
		$sc->activate_visa( $o );

    }

    private function activar_aplicacion( Opportunity $o )
    {

        global $timedate;
        $person   = $this->get_person();
        $detalles = $this->get_linked_beans( 'veta_detallerecibo_veta_recibo', 'Veta_DetalleRecibo' );
        $o->load_relationship( 'veta_aplicacion_opportunities' );

        foreach ( $detalles as $d )
        {

            $college = new Veta_College();
            $college->retrieve( $d->veta_college_id_c );

            $curso = new Veta_Curso();
            $curso->retrieve( $d->veta_curso_id_c );

            $a = new Veta_Aplicacion();

            $a->name                  = $college->name;
            $a->college               = $a->name;
            $a->estado_aplicacion     = 'Aplicacion';
            $a->fecha_expiracion_visa = $timedate->to_db( $person->fecha_expiracion_visa_c );
            $a->pais                  = $college->pais;
            $a->estado                = $college->estado;
            $a->ciudad                = $college->ciudad;
            $a->curso                 = $curso->name;
            $a->jornada               = $curso->jornada;
            $a->campus                = $curso->campus;
            $a->fecha_inicio          = $curso->intake;
            $a->duracion              = $curso->duracion;
            $a->intensidad            = $curso->intensidad;
            $a->tipo_curso            = $curso->tipo_curso;
            $a->tps                   = $curso->tps;
            $a->vacaciones            = $curso->vacaciones;

            if ( ! empty( $person->id ) )
            {

                if ( $person->module_name == 'Contacts' )
                {
                    $a->contact_id_c = $person->id;
                }

                if ( $person->module_name == 'Leads' )
                {
                    $a->lead_id_c = $person->id;
                }
            }

            $this->registrar_log( "Veta_Recibo: person para " . $a->name . " person->module_name = " . $person->module_name . " person->id = " . $person->id );

            $a->save( false );
            $o->veta_aplicacion_opportunities->add( $a->id );
        }


    }

    private function update_total_visa()
    {
        $tipo_visa = new Veta_TiposVisa();
        $tipo_visa->retrieve( $this->veta_tiposvisa_id_c );

        /* New Department Visa Fees */
        $department_visa_fee_1 = new Veta_TiposVisa();
        $department_visa_fee_1 -> retrieve($this->veta_tiposvisa_id1_c);
        $department_visa_fee_2 = new Veta_TiposVisa();
        $department_visa_fee_2 -> retrieve($this->veta_tiposvisa_id2_c);
        $department_visa_fee_3 = new Veta_TiposVisa();
        $department_visa_fee_3 -> retrieve($this->veta_tiposvisa_id3_c);
        $department_visa_fee_4 = new Veta_TiposVisa();
        $department_visa_fee_4 -> retrieve($this->veta_tiposvisa_id4_c);
        $department_visa_fee_5 = new Veta_TiposVisa();
        $department_visa_fee_5 -> retrieve($this->veta_tiposvisa_id5_c); 
		$department_visa_fee_6 = new Veta_TiposVisa();
        $department_visa_fee_6 -> retrieve($this->veta_tiposvisa_id10_c); 
		$department_visa_fee_7 = new Veta_TiposVisa();
        $department_visa_fee_7 -> retrieve($this->veta_tiposvisa_id11_c); 


        $this->total_visa = 0;                
        // Applicant Department Fees
        if ($department_visa_fee_1->total_visa > 0)  {
            $this->total_visa += $department_visa_fee_1->total_visa;
        }
        if ($department_visa_fee_2->total_visa > 0)  {
            $this->total_visa += $department_visa_fee_2->total_visa;
        }
        if ($department_visa_fee_3->total_visa > 0)  {
            $this->total_visa += $department_visa_fee_3->total_visa;
        }
        if ($department_visa_fee_4->total_visa > 0)  {
            $this->total_visa += $department_visa_fee_4->total_visa;
        }
        if ($department_visa_fee_5->total_visa > 0)  {
            $this->total_visa += $department_visa_fee_5->total_visa;
        } 
		if ($department_visa_fee_6->total_visa > 0)  {
            $this->total_visa += $department_visa_fee_6->total_visa;
        } 
		if ($department_visa_fee_7->total_visa > 0)  {
            $this->total_visa += $department_visa_fee_7->total_visa;
        } 		
		
		if ($this->additional_applicant_department_fees_amount__c != 0)  {			
			$this->total_visa += $this->additional_applicant_department_fees_amount__c;
		}
        // Applicant Department Fees

        // Company Department Fees
        $department_visa_fee_c_1 = new Veta_TiposVisa();
        $department_visa_fee_c_1 -> retrieve($this->veta_tiposvisa_id6_c);
        $department_visa_fee_c_2 = new Veta_TiposVisa();
        $department_visa_fee_c_2 -> retrieve($this->veta_tiposvisa_id7_c);
        $department_visa_fee_c_3 = new Veta_TiposVisa();
        $department_visa_fee_c_3 -> retrieve($this->veta_tiposvisa_id8_c);
        $department_visa_fee_c_4 = new Veta_TiposVisa();
        $department_visa_fee_c_4 -> retrieve($this->veta_tiposvisa_id9_c);

        $this->total_visa_company_c = 0;              

        if ($department_visa_fee_c_1->total_visa > 0)  {
            $this->total_visa_company_c += $department_visa_fee_c_1->total_visa;
        }
        if ($department_visa_fee_c_2->total_visa > 0)  {
            $this->total_visa_company_c += $department_visa_fee_c_2->total_visa;
        }
        if ($department_visa_fee_c_3->total_visa > 0)  {
            $this->total_visa_company_c += $department_visa_fee_c_3->total_visa;
        }
        if ($department_visa_fee_c_4->total_visa > 0)  {
            $this->total_visa_company_c += $department_visa_fee_c_4->total_visa;
        }
		
		
		if ($this->additional_company_department_fees_amount_c != 0)  {			
			$this->total_visa_company_c += $this->additional_company_department_fees_amount_c;
		}
        // Company Department Fees
		
		/* Skill Assessments Fees */
		$skill_assessment_fee_1 = new Veta_TiposVisa();
		$skill_assessment_fee_1 -> retrieve($this->veta_tiposvisa_id12_c);
		$skill_assessment_fee_2 = new Veta_TiposVisa();
		$skill_assessment_fee_2 -> retrieve($this->veta_tiposvisa_id13_c);
		$skill_assessment_fee_3 = new Veta_TiposVisa();
		$skill_assessment_fee_3 -> retrieve($this->veta_tiposvisa_id14_c);
		$skill_assessment_fee_4 = new Veta_TiposVisa();
		$skill_assessment_fee_4 -> retrieve($this->veta_tiposvisa_id15_c);
		
		$this->total_skill_assessmente_applicant_c = 0;                

		if ($skill_assessment_fee_1->total_visa > 0)  {			
			$this->total_skill_assessmente_applicant_c += $skill_assessment_fee_1->total_visa;
		}
		if ($skill_assessment_fee_2->total_visa > 0)  {			
			$this->total_skill_assessmente_applicant_c += $skill_assessment_fee_2->total_visa;
		}
		if ($skill_assessment_fee_3->total_visa > 0)  {			
			$this->total_skill_assessmente_applicant_c += $skill_assessment_fee_3->total_visa;
		}
		if ($skill_assessment_fee_4->total_visa > 0)  {			
			$this->total_skill_assessmente_applicant_c += $skill_assessment_fee_4->total_visa;
		}
		
		//total_skill_assessmente_company_c
		
		$skill_assessment_fee_1 = new Veta_TiposVisa();
		$skill_assessment_fee_1 -> retrieve($this->veta_tiposvisa_id16_c);
		$skill_assessment_fee_2 = new Veta_TiposVisa();
		$skill_assessment_fee_2 -> retrieve($this->veta_tiposvisa_id17_c);
		$skill_assessment_fee_3 = new Veta_TiposVisa();
		$skill_assessment_fee_3 -> retrieve($this->veta_tiposvisa_id18_c);
		$skill_assessment_fee_4 = new Veta_TiposVisa();
		$skill_assessment_fee_4 -> retrieve($this->veta_tiposvisa_id19_c);
		
		$this->total_skill_assessmente_company_c = 0;                

		if ($skill_assessment_fee_1->total_visa > 0)  {			
			$this->total_skill_assessmente_company_c += $skill_assessment_fee_1->total_visa;
		}
		if ($skill_assessment_fee_2->total_visa > 0)  {			
			$this->total_skill_assessmente_company_c += $skill_assessment_fee_2->total_visa;
		}
		if ($skill_assessment_fee_3->total_visa > 0)  {			
			$this->total_skill_assessmente_company_c += $skill_assessment_fee_3->total_visa;
		}
		if ($skill_assessment_fee_4->total_visa > 0)  {			
			$this->total_skill_assessmente_company_c += $skill_assessment_fee_4->total_visa;
		}

        /* New Department Visa Fees */


        // $this->total_visa    = $tipo_visa->total_visa * 1;
        // $this->examen_medico = $tipo_visa->costo_examen * 1;
        // $this->total_visa_company_c    = $tipo_visa->company_total_visa_c * 1;
        
        $this->total_visa = $this->total_visa * 1; 
        $this->examen_medico = 0;
        $this->total_visa_company_c = $this->total_visa_company_c * 1;
		$this->total_skill_assessmente_applicant_c = $this->total_skill_assessmente_applicant_c * 1; 
		$this->total_skill_assessmente_company_c = $this->total_skill_assessmente_company_c * 1; 
    }

    /**
     * Este metodo crea un nuevo recibo con los valores de un presupuesto existente
     *
     * @param Veta_Presupuesto $p : Es el presupuesto
     * @return Veta_Recibo : Es el recibo creado
     */
    public function new_recibo( Veta_Presupuesto $p ) : Veta_Recibo
    {

        $r = new Veta_Recibo();

        if ( isset( $p->id ) and ! empty( $p->id ) )
        {

            $r->assigned_user_id    = $p->assigned_user_id;
            $r->pais                = $p->pais;
            $r->departamento        = $p->departamento;
            $r->ciudad              = $p->ciudad;
            $r->primer_pago         = $p->primer_pago * 1;
            $r->subtotal            = $p->subtotal * 1;
            $r->gran_total          = $p->gran_total * 1;
            $r->description         = $p->description;
            $r->examen_medico       = $p->examen_medico * 1;
            $r->pendiente_por_pagar = $p->gran_total * 1;
            $r->seguro              = $p->seguro * 1;
            $r->asegurador          = $p->asegurador;
            $r->duracion            = $p->duracion;
            $r->tipo_seguro         = $p->tipo_seguro;
            $r->veta_tiposvisa_id_c = $p->veta_tiposvisa_id_c;





            // $r->veta_tiposvisa_id2_c = $p->veta_tiposvisa_id2_c;
            // $r->veta_tiposvisa_id3_c = $p->veta_tiposvisa_id3_c;
            // $r->veta_tiposvisa_id4_c = $p->veta_tiposvisa_id4_c;
            // $r->veta_tiposvisa_id5_c = $p->veta_tiposvisa_id5_c;
            // $r->veta_tiposvisa_id6_c = $p->veta_tiposvisa_id6_c;
            // $r->veta_tiposvisa_id7_c = $p->veta_tiposvisa_id7_c;
            // $r->veta_tiposvisa_id8_c = $p->veta_tiposvisa_id8_c;
            // $r->veta_tiposvisa_id9_c = $p->veta_tiposvisa_id9_c;
            // $r->veta_tiposvisa_id10_c = $p->veta_tiposvisa_id10_c;

            $r->veta_tiposvisa_id1_c = $p->veta_tiposvisa_id2_c;
            $r->veta_tiposvisa_id2_c = $p->veta_tiposvisa_id3_c;
            $r->veta_tiposvisa_id3_c = $p->veta_tiposvisa_id4_c;
            $r->veta_tiposvisa_id4_c = $p->veta_tiposvisa_id5_c;
            $r->veta_tiposvisa_id5_c = $p->veta_tiposvisa_id6_c;
            $r->veta_tiposvisa_id6_c = $p->veta_tiposvisa_id7_c;
            $r->veta_tiposvisa_id7_c = $p->veta_tiposvisa_id8_c;
            $r->veta_tiposvisa_id8_c = $p->veta_tiposvisa_id9_c;
            $r->veta_tiposvisa_id9_c = $p->veta_tiposvisa_id10_c;
			$r->veta_tiposvisa_id10_c = $p->veta_tiposvisa_id11_c;
			$r->veta_tiposvisa_id11_c = $p->veta_tiposvisa_id12_c;





            $r->total_visa          = $p->total_visa * 1;
            $r->assigned_user_id    = $p->assigned_user_id;
            $r->descuento           = $p->descuento * 1;
            $r->company_discount_c  = $p->company_discount_c * 1;   
            $r->total_visa_company_c = $p->total_visa_company_c * 1;
            // $r->total_visa          = $p->total_visa * 1;         

            $trm = new Veta_TRM();
            $trm = $trm->get_trm();

            $r->usd   = ( $r->gran_total * 1 ) * ( $trm->aud * 1 );
            $r->pesos = ( $r->usd * 1 ) * ( $trm->pesos * 1 );
            $r->mxn   = ( $r->usd * 1 ) * ( $trm->mxn * 1 );
            $r->clp   = ( $r->usd * 1 ) * ( $trm->clp * 1 );

            $r->aud_usd = $trm->aud;
            $r->usd_cop = $trm->pesos;
            $r->usd_mxn = $trm->mxn;
            $r->usd_clp = $trm->clp;

            $r->save( false );			

            $requerimientos = $p->get_linked_beans( 'veta_requerimiento_veta_presupuesto', 'Veta_Requerimiento' );

            foreach ( $requerimientos as $requerimiento )
            {

                $r->load_relationship( 'veta_requerimiento_veta_recibo' );
                $r->veta_requerimiento_veta_recibo->add( $requerimiento->id );
            }

            $dps = $p->get_linked_beans( 'veta_detallepresupuesto_veta_presupuesto', 'Veta_DetallePresupuesto' );

            foreach ( $dps as $d )
            {

                $dt                    = new Veta_DetalleRecibo();
                $dt->name              = $d->name;
                $dt->description       = $d->description;
                $dt->intake            = $d->intake;
                $dt->duracion          = $d->duracion * 1;
                $dt->inscripcion       = $d->inscripcion * 1;
                $dt->precio_por_semana = $d->precio_por_semana * 1;
                $dt->costo_materiales  = $d->costo_materiales * 1;
                $dt->costo_extra       = $d->costo_extra * 1;
                $dt->deposito          = $d->deposito * 1;
                $dt->total_curso       = $d->total_curso * 1;
                $dt->bono              = $d->bono * 1;
                $dt->descripcion_bono  = $d->descripcion_bono;
                $dt->veta_college_id_c = $d->veta_college_id1_c;
                $dt->precio_curso      = $d->precio_curso * 1;
                $dt->veta_curso_id_c   = $d->veta_curso_id_c;
                $dt->salvar            = false;

                $dt->save( false );

                $dt->load_relationship( 'veta_detallerecibo_veta_recibo' );
                $dt->veta_detallerecibo_veta_recibo->add( $r->id );
            }

            $p->load_relationship( 'veta_recibo_veta_presupuesto' );
            $p->veta_recibo_veta_presupuesto->add( $r->id );

            $leads    = $p->get_linked_beans( 'veta_presupuesto_leads', 'Leads' );
            $contacts = $p->get_linked_beans( 'veta_presupuesto_contacts', 'Leads' );

            foreach ( $leads as $lead )
            {
                $r->load_relationship( 'veta_recibo_leads' );
                $r->veta_recibo_leads->add( $lead->id );
            }

            foreach ( $contacts as $contact )
            {

                $r->load_relationship( 'veta_recibo_contacts' );
                $r->veta_recibo_contacts->add( $contact->id );
            }
			
			$r2 = new Veta_Recibo();
			$r2->retrieve($r->id);			
			$r2->update_totals();
        }

        return $r;
    }

    /**
     * Este metodo actualiza los totales usando los detalles asociados al recibo
     */
    public function update_totals( $save = true )
    {
        global $timedate;
        $this->update_total_visa();

        $this->primer_pago = 0;
        $this->subtotal    = 0;
        $this->gran_total  = 0;
		$total_visabuclass_fees_GST = 0;
		//error_log("GRAND TOTAL -> UPDATE_TOTALS valor 0 - ". $this->gran_total);

        $company_mmm_fee = 0;
        $company_first_payment_amount = 0;
        
        $taxes_fees = new NVC_Taxes_and_Fees_Config;
        $taxes_fees->retrieve("c83b8f80-f55b-6938-0b3d-6156426782bf");     

        $taxes_GST = $taxes_fees->gst /100;
        $taxes_Department_Credit_Card= $taxes_fees->department_cc_surcharge / 100;

        
        $requermimento_presupuesto = $this->get_linked_beans( 'veta_requerimiento_veta_recibo' , 'Veta_Recibo' );
        $id_requermimiento ="";
        foreach( $requermimento_presupuesto as $req_pre ) {            
            $id_requermimiento = $req_pre->id;
        }

        $req = new Veta_Requerimiento();
        $req->retrieve($id_requermimiento);          

        
        $pa = $this->get_primer_abono();

        if ( isset( $pa ) )
        {
            // $o->date_closed    = $timedate->to_db_date( $pa->date_entered );
            // $o->fecha_cierre_c = $timedate->to_db( $pa->date_entered );
            $req->aplicant_1st_payment_date = $pa->date_entered;
			$req->aplicant_1st_payment_date = $timedate->to_db_date( $pa->date_entered );
            $req->aplicant_first_payment_amount = $pa->monto;
        }

        $cpa = $this->get_company_first_payment();

        if ( isset( $cpa ) )
        {                
            $req->company_1st_payment_date = $cpa->date_entered; 
			$req->company_1st_payment_date = $timedate->to_db_date($cpa->date_entered); 			
            $req->company_first_payment_amount = $cpa->deposit_amount;
        }

        

        
        $dets = $this->get_linked_beans( 'veta_detallerecibo_veta_recibo', 'Veta_DetalleRecibo' );
		$this->total_visabuclass_fees = 0;
		$this->total_visabuclass_fees_company = 0;
        foreach ( $dets as $d ) {

            $this->primer_pago += ( $d->deposito * 1 ) - ( $d->bono * 1 );
            //$this->subtotal    += ( $d->total_curso * 1 );
            $this->get_visasubclass_fees( $d );
        }
        $this->additional_fees();
        //company_total_without_gst        
        
		//error_log("this->total_visabuclass_fees -> SUMATORIA PARA DAR total_visabuclass_fees_GST - ". $this->total_visabuclass_fees);
		//error_log("req->consultation_fee -> SUMATORIA PARA DAR total_visabuclass_fees_GST - ". $req->consultation_fee);
		//error_log("this->descuento -> SUMATORIA PARA DAR total_visabuclass_fees_GST - ". $this->descuento);
		
        $total_without_gst = (($this->total_visabuclass_fees * 1) - ($req->consultation_fee * 1) - ($this->descuento * 1)) * 1; 
		//error_log("total_without_gst -> SUMATORIA total_visabuclass_fees + consultation_fee + descuento - ". $total_without_gst);
		
        $total_taxes_GST = ($total_without_gst) * $taxes_GST; //$total_taxes_GST = ($this->total_visabuclass_fees - $req->consultation_fee - $this->descuento) * $taxes_GST;
		//error_log("total_taxes_GST -> SUMATORIA total_without_gst + taxes_GST - ". $total_taxes_GST);

        $company_total_without_gst = $this->total_visabuclass_fees_company - $this->company_discount_c;  
        $company_total_taxes_GST = $company_total_without_gst * $taxes_GST;

        $total_visabuclass_fees_GST_company = $company_total_taxes_GST + ($company_total_without_gst);

        $total_visabuclass_fees_GST = $total_taxes_GST + ($total_without_gst); //$total_visabuclass_fees_GST = $total_taxes_GST + ($this->total_visabuclass_fees - $req->consultation_fee - $this->descuento);
		//error_log("total_taxes_GST -> SUMATORIA PARA DAR total_visabuclass_fees_GST - ". $total_taxes_GST);
		//error_log("total_without_gst -> SUMATORIA PARA DAR total_visabuclass_fees_GST - ". $total_without_gst);

        $total_taxes_Department_Credit_Card = $this->total_visa * ($taxes_Department_Credit_Card);

        $total_taxes_Department_Credit_Card_company = $this->total_visa_company_c * ($taxes_Department_Credit_Card);  

        //$this->total_taxes_Department_Credit_Card += $p->total_visa * ($this->taxes_Department_Credit_Card);      

        //$this->primer_pago += ( $this->examen_medico * 1 ) + ( $this->seguro * 1 ) + ( $this->total_visa * 1 );
        $this->primer_pago += ( $this->examen_medico * 1 ) + ( $this->seguro * 1 ) + ( $this->total_visa * 1 ) + ($total_taxes_Department_Credit_Card * 1) + ($this->total_skill_assessmente_applicant_c * 1);

        $trm = new Veta_TRM();
        $trm = $trm->get_trm();
		
		//error_log("this->total_visa -> SUMATORIA VISAS, SEGURO, VISASUBCLASS, TAXES, SKILL ASSESMENT - ". $this->total_visa);
		//error_log("this->seguro -> SUMATORIA VISAS, SEGURO, VISASUBCLASS, TAXES, SKILL ASSESMENT - ". $this->seguro);
		//error_log("total_visabuclass_fees_GST -> SUMATORIA VISAS, SEGURO, VISASUBCLASS, TAXES, SKILL ASSESMENT - ". $total_visabuclass_fees_GST);
		//error_log("total_taxes_Department_Credit_Card -> SUMATORIA VISAS, SEGURO, VISASUBCLASS, TAXES, SKILL ASSESMENT - ". $total_taxes_Department_Credit_Card);
		//error_log("this->total_skill_assessmente_applicant_c -> SUMATORIA VISAS, SEGURO, VISASUBCLASS, TAXES, SKILL ASSESMENT - ". $this->total_skill_assessmente_applicant_c);
		
        $total_plus = ( $this->total_visa * 1 ) + ( $this->seguro * 1 )  + ($total_visabuclass_fees_GST * 1) + ($total_taxes_Department_Credit_Card * 1) + ($this->total_skill_assessmente_applicant_c * 1);
        $total_less = ( $this->descuento * 1 ) + ( $req->consultation_fee); 
        $total_less = 0;
        //$this->gran_total = $total_plus - $total_less;
		//error_log("TOTAL PLUS -> SUMATORIA VISAS, SEGURO, VISASUBCLASS, TAXES, SKILL ASSESMENT - ". $total_plus);
        $this->gran_total = $total_plus;
		//error_log("GRAND TOTAL -> UPDATE_TOTALS asignacion total_plus - ". $this->gran_total);
        $total_plus_company = ( $this->total_visa_company_c * 1 )  + ($total_visabuclass_fees_GST_company * 1) + ($total_taxes_Department_Credit_Card_company * 1);
        //$total_plus_company = ($this->total_visabuclass_fees_company * 1) ;
        $this->company_grand_total_c = $total_plus_company + $this->total_skill_assessmente_company_c;
		
		
		error_log("Alfonso - refund Applicant: ".$this->get_refunds("Applicant"));
		//$this->gran_total = ($this->gran_total * 1) - ($this->get_refunds("Applicant") * 1);
		error_log("Alfonso - refund Company: ".$this->get_refunds("Company"));
		//$this->company_grand_total_c = ($this->company_grand_total_c * 1) - ($this->get_refunds("Company") * 1);
		
		
        //$this->gran_total = $this->subtotal + ( $this->total_visa * 1 ) + ( $this->examen_medico * 1 ) + ( $this->seguro * 1 ) - ( $this->descuento * 1 );
        $this->usd        = $this->gran_total * $trm->aud;
        $this->pesos      = $this->usd * $trm->pesos * 1;
        $this->mxn        = $this->usd * $trm->mxn * 1;
        $this->clp        = $this->usd * $trm->clp * 1;

        $this->aud_usd = $trm->aud;
        $this->usd_cop = $trm->pesos;
        $this->usd_mxn = $trm->mxn;
        $this->usd_clp = $trm->clp;

        //$req->aplicant_first_payment_amount = number_format(($this->gran_total), 2,",",".");
        $req->aplicant_mmm_fee = number_format(($total_visabuclass_fees_GST), 2,",",".");
        
        $req->Total = number_format(($this->gran_total), 2,",",".");        

        //$req->company_mmm_fee = number_format(($company_mmm_fee), 2,",",".");        
        //$req->company_first_payment_amount = $company_first_payment_amount * 1;
        
        //$req->company_mmm_fee = number_format(($this->total_visabuclass_fees_company), 2,",",".");
        $req->company_mmm_fee = number_format(($company_total_without_gst + $company_total_taxes_GST), 2,",",".");

        $req->company_total_without_gst_c = number_format(($company_total_without_gst), 2,",",".");
        $req->company_gst_c = number_format(($company_total_taxes_GST), 2,",",".");
        $req->company_total_c = number_format(($total_plus_company), 2,",",".");
        $req->company_discount_c = number_format(($this->company_discount_c), 2,",",".");
        $req->company_dept_cc_surcharge_c = number_format(($this->total_visa_company_c), 2,",",".");
        $req->company_dept_visa_fee_base_c = number_format(($total_taxes_Department_Credit_Card_company), 2,",",".");
        //$req->company_first_payment_amount = number_format(($total_plus_company), 2,",",".");

        // $req->aplicant_company_mmm_fees = number_format(($req->company_mmm_fee + $req->aplicant_mmm_fee), 2,",",".");
        $req->aplicant_company_mmm_fees = number_format((($req->company_mmm_fee + $req->aplicant_mmm_fee) * 1), 2,",",".");
        // company_mmm_fee
        // aplicant_mmm_fee

        //$r->total_paid = $this->gran_total;
        if ($req->total_paid == 0 ) {
            $req->total_paid = number_format((0), 2,",",".");
        }        
        //$req->consultation_fee = number_format(($req->consultation_fee), 2,",",".");
        $req->discount = number_format(($this->descuento), 2,",",".");

        

        // $req->total_without_gst = number_format(($total_without_gst), 2,",",".");
        $req->total_without_gst = number_format(($total_without_gst), 2,",",".");
        $req->gst_percentage = number_format(($total_taxes_GST), 2,",",".");
        $req->department_visa_fee_base_application_charge = number_format(($this->total_visa), 2,",",".");
        $req->department_credit_card_surcharge_percentage = number_format(($total_taxes_Department_Credit_Card), 2,",",".");
        $req->insurance_value = number_format(($this->seguro), 2,",",".");   
        
        $req->applicant_company_total_c = ($this->gran_total + $total_plus_company) * 1;
        $req->applicant_company_total_paid_c = $this->pagado + $this->company_paid_c;
        $req->applicant_company_mmm_fees_without_gst_c = number_format(($req->total_without_gst + $req->company_total_without_gst_c), 2,",",".");
        $req->applicant_company_outstanding_c = $this->pendiente_por_pagar + $this->company_outstanding_amount_c;
        
		
		if(($req->id != '') and (isset($req->id))) {
			error_log("Alfonso2 - ID REQUERIMIENTO EN EL RECIBO". $req->id);
			$req->save(); 
		}		
        
		

        $this->update_cartera( $save ); // Este metodo salva la cuenta de cobro

        //parent::save( false );
    }

    private function get_visasubclass_fees( Veta_DetalleRecibo $d ) {

        $curso = new Veta_Curso();
        $curso->retrieve($d->veta_curso_id_c);        
        
        $fees = 0;
        $fees_company = 0;
        $fees_visasubclass = $curso->get_linked_beans( 'veta_curso_veta_college_1' , 'Veta_College' );
        
        // foreach( $fees_visasubclass as $fee_visa ) {              
        //     $fees = $fees + $fee_visa->fee;
        //     $fees_company = $fees_company + $fee_visa->company_fee_c;
        // }        

        foreach( $fees_visasubclass as $fee_visa ) {  
            if ($fee_visa->type_of_fee_c == 'Applicant') {
                $fees = $fees + $fee_visa->fee;
            }
            if ($fee_visa->type_of_fee_c == 'Company') {
                $fees_company = $fees_company + $fee_visa->fee;
            }
        }
		
		if ($this->additional_cost_applicant_amount_c != 0) {
			$fees = $fees + $this->additional_cost_applicant_amount_c;                
        }
		if ($this->additional_cost_company_amount_c != 0) {
			$fees_company = $fees_company + $this->additional_cost_company_amount_c;   			
        }
		

        
        //$this->company_total_without_gst = $this->total_visabuclass_fees + $fees;   
        $this->total_visabuclass_fees = $this->total_visabuclass_fees + $fees;   
		//error_log("AQUIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII this->total_visabuclass_fees -> get_visasubclass_fees - ". $this->total_visabuclass_fees);
        $this->total_visabuclass_fees_company = $this->total_visabuclass_fees_company + $fees_company; 
		//error_log("AQUIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII this->total_visabuclass_fees_company -> get_visasubclass_fees - ". $this->total_visabuclass_fees_company);
    }

    private function additional_fees() {

        global $app_list_strings;
        $additional_fees_list = $this->get_linked_beans( 'veta_recibo_veta_college_1' , 'Veta_College' );

        // ---------------------------------------------------- COLLEGE Y CURSO ----------------------------------------

        $fees = 0;
        $fees_company = 0;
             
        foreach( $additional_fees_list as $fee_visa ) {  
            if ($fee_visa->type_of_fee_c == 'Applicant') {
                $fees = $fees + $fee_visa->fee;
            }
            if ($fee_visa->type_of_fee_c == 'Company') {
                $fees_company = $fees_company + $fee_visa->fee;
            }
        }           

        $this->total_visabuclass_fees = $this->total_visabuclass_fees + $fees; 
		//error_log("AQUIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII this->total_visabuclass_fees -> get_visasubclass_fees - ". $this->total_visabuclass_fees);		
        $this->total_visabuclass_fees_company = $this->total_visabuclass_fees_company + $fees_company; 
		//error_log("AQUIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII this->total_visabuclass_fees_company -> get_visasubclass_fees - ". $this->total_visabuclass_fees_company);		

    }

    public function update_cartera( $save = true )
    {
        global $timedate;			

        $taxes_fees = new NVC_Taxes_and_Fees_Config;
        $taxes_fees->retrieve("c83b8f80-f55b-6938-0b3d-6156426782bf");     

        $taxes_GST = $taxes_fees->gst /100;
        //$taxes_Department_Credit_Card= $taxes_fees->department_cc_surcharge / 100;

        $abonos       = $this->get_linked_beans( 'veta_abono_veta_recibo', 'Veta_Abono' );
        $this->pagado = 0;

        $company_deposits = $this->get_linked_beans( 'veta_recibo_nvc_deposit_company_1', 'NVC_Deposit_company' );    
        $this->company_paid = 0;    

        $applicant_aditional_services = $this->get_linked_beans( 'veta_recibo_nvc_other_billing_services_applicant_1', 'NVC_Other_Billing_Services_Applicant' );    
        $this->applicant_new_services = 0;    

        $company_aditional_services = $this->get_linked_beans( 'veta_recibo_nvc_other_billing_services_company_1', 'NVC_Other_Billing_Services_Company' );    
        $this->company_new_services = 0;    

        foreach ( $abonos as $a )
        {
            $this->pagado += $a->monto * 1;
        }

        foreach ( $company_deposits as $cd )
        {
            $this->company_paid += $cd->deposit_amount * 1;
        }

        foreach ( $applicant_aditional_services as $aas )
        {
            $this->applicant_new_services += $aas->deposit_amount * 1;
        }

        foreach ( $company_aditional_services as $cas )
        {
            $this->company_new_services += $cas->deposit_amount * 1;
        }

        $this->applicant_aditional_services_c = $this->applicant_new_services;
        $this->company_aditional_services_c = $this->company_new_services;
		
		$this->pagado = ($this->pagado * 1) - ($this->get_refunds("Applicant") * 1);

        $this->pendiente_por_pagar        = ( $this->gran_total * 1 ) - ( $this->pagado * 1 ) - ($this->get_refunds("Applicant") * 1);                
        $this->no_verificar_proceso_venta = true;
        
        
        $this->gran_total = $this->gran_total + $this->applicant_aditional_services_c + ($this->applicant_aditional_services_c * $taxes_GST) ;
		//error_log("GRAND TOTAL -> UPDATE_CARTERA Sumatoria servicios adicionales aplicante - ". $this->gran_total);
        $this->outstanding_amount = ($this->gran_total * 1) - ($this->pagado * 1);

        $this->company_grand_total_c = $this->company_grand_total_c + $this->company_aditional_services_c + ($this->company_aditional_services_c * $taxes_GST) ;
        
		$this->company_paid = ($this->company_paid * 1) - ($this->get_refunds("Company") * 1);
		
		$this->company_outstanding_amount_c = ($this->company_grand_total_c * 1) - ($this->company_paid * 1) - ($this->get_refunds("Company") * 1);
        $this->company_paid_c = ($this->company_paid  * 1);         

        
        $req = new Veta_Requerimiento();
        $req->retrieve( $this->veta_requerimiento_veta_reciboveta_requerimiento_ida );
        
        $pa = $this->get_primer_abono();

        if ( isset( $pa ) )
        {
            // $o->date_closed    = $timedate->to_db_date( $pa->date_entered );
            // $o->fecha_cierre_c = $timedate->to_db( $pa->date_entered );
            $req->aplicant_1st_payment_date = $pa->date_entered;
			$req->aplicant_1st_payment_date = $timedate->to_db_date($pa->date_entered);            
            $req->aplicant_first_payment_amount = $pa->monto;
        }

        $cpa = $this->get_company_first_payment();

        if ( isset( $cpa ) )
        {                
            $req->company_1st_payment_date = $cpa->date_entered;
			$req->company_1st_payment_date = $timedate->to_db_date($cpa->date_entered);			
            $req->company_first_payment_amount =$cpa->deposit_amount;
        }

        

                        

            $req->Total = $this->gran_total;
            $req->outstanding_amount = $this->outstanding_amount;
            
            $req->total_without_gst = ($this->total_visabuclass_fees - $req->consultation_fee - $this->descuento) * 1;
			
			//$req->gst_percentage = $o->gst_percentage;			
			$req->gst_percentage = ($req->total_without_gst) * $taxes_GST; //$total_taxes_GST = ($this->total_visabuclass_fees - $req->consultation_fee - $this->descuento) * $taxes_GST;			
			
            $req->total_without_gst = number_format(($req->total_without_gst), 2,",",".");            

            $req->outstanding_amount = number_format(($this->pendiente_por_pagar * 1), 2,",",".");
            $req->deposit = number_format(($this->pagado * 1), 2,",",".");
            $req->total_paid = number_format(($this->pagado * 1), 2,",",".");            

            $req->company_deposits_c = $this->company_paid_c;
            $req->company_outstanding_amount_c = $this->company_outstanding_amount_c;
            $req->company_total_c = $this->company_grand_total_c;
			
			
			//$req->company_gst_c = $o->company_gst_c;
			$company_total_without_gst = ($this->total_visabuclass_fees_company - $this->company_discount_c) * 1; 
			$req->company_gst_c = $company_total_without_gst * $taxes_GST;		
			
			//$req->company_total_without_gst_c = $o->company_total_without_gst_c;
			$req->company_total_without_gst_c = $company_total_without_gst;
			
            
            $req->applicant_aditional_services_c = $this->applicant_new_services;
            $req->company_aditional_services_c = $this->company_new_services;

            $req->applicant_company_mmm_fees_without_gst_c = ((($this->total_visabuclass_fees - $req->consultation_fee - $this->descuento) * 1) * 1) + ($req->company_total_without_gst_c * 1);

            //$o->applicant_company_mmm_fees_without_gst_c = ((($this->total_visabuclass_fees - $req->consultation_fee - $this->descuento) * 1) * 1) + ($req->company_total_without_gst_c * 1);
            
            //$o->save();
                       
        if(($req->id != '') and (isset($req->id))) {			
			$req->save(); 
		}
        

        if ( $save )
        {
            $this->save( false );
        }

    }

    /**
     * Esta funcion devuelve siempre true porque ya no se valida el gerente contable
     *
     * @return bool
     */
    public function is_gerente_contable()
    {

        /*$is = false;
        global $current_user;

        $roles = ACLRole::getUserRoleNames( $current_user->id );

        foreach( $roles as $rol ) {

            if( $rol == 'Gerente Contable' ) {
                $is = true;
            }
        }

        return $is;*/

        return true;
    }

    public function redireccionar( $msg, $registro )
    {
        if ( ! empty( $registro ) )
        {
            $aux = "<script>
                      var registro='" . $registro . "';";

            $aux .= "alert('" . $msg . "');
                    window.location = 'index.php?module=Veta_Recibo&action=DetailView&record=' + registro;
                 </script>";

            echo $aux;
        }
        else
        {
            echo "<script>alert('" . $msg . "')</script>";
        }

        exit;
    }

    public function convertir_prospecto()
    {

        global $timedate;
        $leads = $this->get_linked_beans( 'veta_recibo_leads', 'Lead' );

        foreach ( $leads as $l )
        {

            if ( empty( $l->contact_id ) )
            {

                $c                          = new Contact();
                $c->first_name              = $l->first_name;
                $c->last_name               = $l->last_name;
                $c->phone_home              = $l->phone_home;
                $c->phone_mobile            = $l->phone_mobile;
                $c->phone_work              = $l->phone_work;
                $c->pais_c                  = $l->pais_c;
                $c->departamento_c          = $l->departamento_c;
                $c->ciudad_c                = $l->ciudad_c;
                $c->birthdate               = $l->birthdate;
                $c->email1                  = $l->email1;
                $c->pasaporte_c             = $l->pasaporte_c;
                $c->fecha_expiracion_visa_c = $l->fecha_expiracion_visa_c;
                $c->fecha_viaje_c           = $l->fecha_viaje_c;
                $c->description             = $l->description; 

                //$c->pais_nacimiento_c = '';
                // $c->departamento_nacimiento_c = '';
                // $c->nombre_conyuge_c = '';
                // $c->ocupacion_conyuge_c = '';
                // $c->nacimiento_conyuge_c = '';
                //$c->contacto_emergencia_c = '';
                //$c->relacion_contacto_emergencia_c = '' ;
                //$c->email_contacto_emergencia_c = '';
                // $c->celular_contacto_emergencia_c = '';
                // $c->nivel_ingles_c = '';
                // $c->anos_sin_estudiar_c = '';
                // $c->institucion_australia_c = '';
                // $c->identificacion_australia_c = '';
                // $c->celular_australia_c = '';
                // $c->cuenta_bancaria_australia_c = '';

                $c->lead_source = $l->lead_source;

                if ( isset( $l->campana_id_c ) )
                {
                    $c->campaign_id = $l->campana_id_c;
                }

                if ( isset( $l->assigned_user_id ) )
                {
                    $c->assigned_user_id = $l->assigned_user_id;
                }

                if ( isset( $l->carrera_universitaria_c ) )
                {
                    $c->carrera_universitaria_c = $l->carrera_universitaria_c;
                }

                if ( isset( $l->trabajo_actual_c ) )
                {
                    $c->trabajo_actual_c = $l->trabajo_actual_c;
                }

                $c->save( false );

                $l->contact_id = $c->id;
                $l->converted  = true;
                $l->status     = 'Converted';

                $l->save( false );

                $c->load_relationship( 'veta_recibo_contacts' );
                $c->veta_recibo_contacts->add( $this->id );

                $o = $this->obtener_oportunidad( $this->id );

                if ( $o != null )
                {

                    $o->load_relationship( 'contacts_opportunities_1' );
                    $o->contacts_opportunities_1->add( $c->id );
                    $o->date_closed    = $timedate->to_db_date( date( $timedate->get_date_time_format() ) );
                    $o->fecha_cierre_c = $timedate->to_db( date( $timedate->get_date_time_format() ) );
                    $o->save( false );
                    $this->heredar_info( $o, $c );
                }
            }
        }
    }

    private function heredar_info( Opportunity $o, Contact $c )
    {

        $this->actualizar_contacto_aplicaciones( $o, $c );
        $this->actualizar_contacto_servicio_cliente( $o, $c );
        $this->actualizar_contacto_coes( $o, $c );
        $this->actualizar_contacto_casos( $o, $c );

    }

    private function actualizar_contacto_aplicaciones( Opportunity $o, Contact $c )
    {

        $aplicaciones = $o->get_linked_beans( 'veta_aplicacion_opportunities', 'Veta_Aplicacion' );

        foreach ( $aplicaciones as $a )
        {
            $a->actualizar_contacto( $c );
        }
    }

    private function actualizar_contacto_servicio_cliente( Opportunity $o, Contact $c )
    {

        $scs = $o->get_linked_beans( 'veta_serviciocliente_opportunities', 'Veta_ServicioCliente' );

        foreach ( $scs as $sc )
        {
            $sc->actualizar_contacto( $c );
        }
    }

    private function actualizar_contacto_coes( Opportunity $o, Contact $c )
    {

        $coes = $o->get_linked_beans( 'veta_coe_opportunities', 'Veta_COE' );

        foreach ( $coes as $coe )
        {
            $coe->actualizar_contacto( $c );
        }
    }

    private function actualizar_contacto_casos( Opportunity $o, Contact $c )
    {

        $db    = DBManagerFactory::getInstance();
        $casos = $o->get_linked_beans( 'opportunities_cases_1', 'Case' );

        foreach ( $casos as $caso )
        {
            $sql = "UPDATE cases_cstm SET contact_id_c = '" . $c->id . "' WHERE id_c = '" . $caso->id . "'";
            $res = $db->query( $sql );
        }
    }

    public function get_primer_abono()
    {
        $abono        = null;
        $abonos       = $this->get_linked_beans( 'veta_abono_veta_recibo', 'Veta_Abono', 'date_entered ASC' );
		//$abonos       = $this->get_linked_beans( 'veta_abono_veta_recibo', 'Veta_Abono' );
        //$this->pagado = 0;

        foreach ( $abonos as $a )
        {
            $abono = $a;
            break;
        }

        return $abono;
    }
	
	public function get_refunds($refund_to) {

        $refunds = $this->get_linked_beans( 'veta_recibo_conta_refunds_1' , 'Conta_refunds' );
		$total_refunds = 0;
		
        foreach( $refunds as $a ) {      
			if($a->refund_to == $refund_to) {
				$total_refunds = ($total_refunds * 1) + ($a->amount * 1);
			}
        }
		error_log("Refund Alfonso - veta_recibo.php - ". $total_refunds);
		return $total_refunds;
    }

    public function get_company_first_payment()
    {
        $abono        = null;
        $abonos       = $this->get_linked_beans( 'veta_recibo_nvc_deposit_company_1', 'NVC_Deposit_company', 'date_entered ASC' );

        //$this->company_paid_c = 0;

        foreach ( $abonos as $a )
        {
            $abono = $a;
            break;
        }

        return $abono;
    }

    private function registrar_log( $msg )
    {
        $path = date( "Y-m-d" ) . "_soel.log";
        $msg  = '[' . date( "Y-m-d H:i:s" ) . '] ' . $msg;
        //error_log( $msg . PHP_EOL . PHP_EOL, 3, $path );
    }

    public function mark_deleted( $id )
    {

        $r = new Veta_Recibo();
        $r->retrieve( $id );

        if ( $r->has_proceso_ventas() )
        {

            $r->redireccionar( 'No se puede eliminar porque ya existe un proceso de ventas', $r->id );
        }
        parent::mark_deleted( $id ); // TODO: Change the autogenerated stub
    }

}