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

require_once( 'modules/Veta_Visa/Veta_Visa.php' );
require_once( 'modules/Opportunities/Opportunity.php' );

class Veta_ServicioCliente extends Basic
{
    public $new_schema = true;
    public $module_dir = 'Veta_ServicioCliente';
    public $object_name = 'Veta_ServicioCliente';
    public $table_name = 'veta_serviciocliente';
    public $importable = false;

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
    public $estado;

    public function bean_implements( $interface ) {
        switch( $interface ) {
            case 'ACL':
                return true;
        }

        return false;
    }

    private function set_consecutivo() {

        if( ! isset( $this->id ) || empty( $this->id ) ) {

            $query  = "SELECT COUNT(id) AS num from veta_serviciocliente limit 1";
            $result = $this->db->query( $query , true , "Error obteniendo el consecutivo del servicio al cliente" );
            $row    = $this->db->fetchByAssoc( $result );

            if( $row != null )
                $this->name = $row[ 'num' ] + 1;
        }
    }

    private function set_estudiante() {

        if( empty( $this->contact_id_c ) ) {

            if( ! empty( $this->lead_id_c ) ) {

                $l = new Lead();
                $l->retrieve( $this->lead_id_c );

                if( $l->converted == true ) {
                    $this->contact_id_c = $l->contact_id;
                }
            }
        }
    }

    private function obtener_recibo() {

        $r = null;
        $o = $this->obtener_oportunidad();

        if( $o != null ) {

            $recibos = $o->get_linked_beans( 'veta_recibo_opportunities' , 'Veta_Recibo' );

            foreach( $recibos as $rec )
                $r = $rec;
        }

        return $r;
    }

    /**
     * Este metodo indica si el primer pago ya fue realizado
     * @return bool
     */
    private function esta_pagado() { 
	
		//No se va a pedir pagos para generar la visa		
		return true;
		

        $pagado = false;
		$company_paid = false;

        $recibo = $this->obtener_recibo();

        if( $recibo != null ) {

			/*
            if( $recibo->pagado * 1 >= $recibo->primer_pago * 1 ) {
				$pagado = true;
			}
			*/
			
			error_log("pagado - dato aplicante". $recibo->pendiente_por_pagar);
			if( ($recibo->pendiente_por_pagar * 1) < 1){
				$pagado = true;
				error_log("pagado - aplicante");
			}
			
			if( ($recibo->company_outstanding_amount_c * 1) <= 1){
				$company_paid = true;
				error_log("pagado - compania");
			}
                
        }
		
		if( ($pagado) and ($company_paid)){
			return true;
		} else {
			return false;
		}
		//error_log("pagado: ". $recibo->pagado ." Primer pago ". $recibo->primer_pago. "Alfonso");

        return $pagado;
    }

    private function obtener_oportunidad() {

        $o             = null;
        $oportunidades = $this->get_linked_beans( 'veta_serviciocliente_opportunities' , 'Opportunity' );

        foreach( $oportunidades as $op )
            $o = $op;

        return $o;
    }

    public function actualizar_contacto( Contact $c ) {

        $db  = DBManagerFactory::getInstance();
        $sql = "UPDATE veta_serviciocliente SET contact_id_c = '" . $c->id . "' WHERE id = '" . $this->id . "'";
        $res = $db->query( $sql );

    }

    public function save( $check_notify = false ) {
		
		
		$checklist = $this->get_linked_beans('csche_items_requested_veta_serviciocliente', 'Veta_ServicioCliente');
		foreach( $checklist as $item ){
			if($item->status == 'Pendiente'){
				error_log ("APROBACION ". $item->name);
				$this->redireccionar( 'You cannot this record because have pending items' , $this->id );
				return;
			}						
		}
			
				
        $tmp_id = null;
        $this->set_consecutivo();
        $this->set_estudiante();
		
		if($_REQUEST["module"] == "Veta_ServicioCliente") {
			$save_visa = false;
			$visa = new Veta_Visa();
			$visa->retrieve($this->veta_visa_veta_servicioclienteveta_visa_ida);
			
			if($this->estado == 'Hold'){
				if(($visa->estado != "Visa_Aplicada") and ($visa->estado != "Visa_Granted_Notified") and ($visa->estado != "Visa_Otorgada") and ($visa->estado != "Visa_Negada")){
					$visa->estado = "Hold";			
					$save_visa = true;
				}
			}			
			
			if (stripos($this->fetched_row["estado"], "Closed") === false && stripos($this->estado, "Closed") !== false) {			
				$visa->estado = "Closed";			
				$save_visa = true;
			}			
			if($save_visa){
				$visa->save(false);
			}
			
		}

        if( $this->estado == 'Visa' and $this->esta_pagado() == false ) {
            $this->redireccionar( 'you can assign Visa Stage because it have a pending payment' , $this->id );
        }
        else {
            $tmp_id = parent::save( $check_notify ); // TODO: Change the autogenerated stub
            $o      = $this->obtener_oportunidad();


            if( $o != null ) {
				$this->activate_visa( $o );

                // Se actualiza el estado en la oportunidad
                $o->estado_servicio_al_cliente_c = $this->estado;
                $o->fecha_proximo_contacto_c     = $this->fecha_proximo_contacto;
                $o->fecha_ultimo_contacto_c      = $this->fecha_ultimo_contacto;
                $o->user_id2_c                   = $this->assigned_user_id;

                $o->save();
            }
        }		
		
		/*
		if( !$this->tiene_visa()) { 		
			$o = null;		
			$o = new Opportunity();
			$o = $this->obtener_oportunidad();			
			echo ("VISA PROCESO DE VENTAS ". $o->name);
			$this->activate_visa( $o );
			$o->save();
		}
		*/
		error_log("VISA CREO SERVICIO AL CLIENTE");

        return $tmp_id;
    }

    private function tiene_visa()
    {
        $tiene =false;
        $visas = $this->get_linked_beans( 'veta_visa_veta_serviciocliente' , 'Veta_Visa' );

        if(count($visas) > 0)
            $tiene = true;

		error_log("VISA Entro a Tiene Visa con valor". $tiene);
        return $tiene;

    }
	
	public function activate_visa( Opportunity $o ){
		// Se crea la visa
		//if( $this->estado == 'Visa' and $this->esta_pagado() and !$this->tiene_visa()) {
		error_log ("VISA INICIO A LA CREACION DE LA VISA");
		if( !$this->tiene_visa()) {
			error_log ("VISA ENTRO A LA CREACION DE LA VISA");

			$c = new Contact();
			$c->retrieve( $this->contact_id_c );

			$visa                        = new Veta_Visa();
			$visa->name                  = 'Pending to Apply';
			//$visa->name                  = 'Visa Draft Request';  
			//$visa->estado                = 'HAP_ID_Solicitar';
			$visa->estado                = 'Pendiente_Luz_Verde';
			
			$visa->fecha_expiracion_visa = $this->fecha_expiracion_visa;
			$visa->contact_id_c          = $this->contact_id_c;
			$visa->user_id_c             = $c->assigned_user_id;
			
			
			
			$recibos = $o->get_linked_beans('veta_recibo_opportunities', 'Veta_Recibo');
			foreach ($recibos as $rec) {
				$recibo = $rec;
			}
			if ($recibo) {
				$requerimientos = $recibo->get_linked_beans('veta_requerimiento_veta_recibo', 'Veta_requerimiento');
				if (count($requerimientos)) {
					$visa->user_id_c = $requerimientos[0]->assigned_user_id;
				}
				
				$detalles = $recibo->get_linked_beans('veta_detallerecibo_veta_recibo', 'Veta_DetalleRecibo');
				foreach( $detalles as $detalle ){
					
					$curso = new Veta_Curso();
					$curso->retrieve($detalle->veta_curso_id_c);		
		
					/*
					error_log("PROCESOS " . $curso->processes_c);
					error_log("PROCESOS ID " . $curso->id);
					*/
					$visa->process_stages_c = $curso->processes_c;
				}
				
				
				
			}



			$q = "SELECT us.last_name, u.id_c as id_assigned_user,count(*)
			FROM users_cstm u
			join vetacrm2.users us on us.id=u.id_c
			LEFT JOIN veta_visa o ON o.assigned_user_id = u.id_c AND o.estado = 'HAP_ID_Solicitar' AND o.deleted = 0
			WHERE (
					u.user_department_c = 'Visas' 
					or u.user_department_2_c = 'Visas'
				)
			AND us.status = 'Active'
			GROUP BY u.id_c
			ORDER BY COUNT(*)";

			$res = $this->db->query($q, true, "Error obteniendo el usuario : ");
			
			
			// Obtener los usuarios del departamento 'Visas'
			$sql_users = "SELECT id, first_name FROM users_cstm u 
				join users us on us.id=u.id_c    
				WHERE user_department_c = 'Visas' OR user_department_2_c = 'Visas'
				and us.status = 'Active'";
			$result_users = $this->db->query($sql_users);

			// Crear un array de usuarios y almacenar los IDs
			$visa_users = array();
			while ($row = $this->db->fetchByAssoc($result_users)) {
				$visa_users[] = $row['id'];
			}
			
			
			
			// Obtener el contador actual para el módulo Veta_Visa
			$sql_counter = "SELECT counter FROM round_round_robin_management WHERE name = 'Veta_Visa'";
			$result_counter = $this->db->query($sql_counter);
			$row = $this->db->fetchByAssoc($result_counter);
			$current_counter = $row['counter'];
			
			
			// Calcular el índice del usuario a asignar en el array de usuarios
			$user_index = $current_counter % count($visa_users);

			// Asignar el usuario al registro Veta_Visa
			$visa->assigned_user_id = $visa_users[$user_index];

			// Actualizar el contador en la tabla round_round_robin_management
			$new_counter = $current_counter + 1;
			$sql_update = "UPDATE round_round_robin_management SET counter = $new_counter WHERE name = 'Veta_Visa'";
			$this->db->query($sql_update);
			
			/*
			if ($assigned_user = $this->db->fetchByAssoc($res)) {
				$visa->assigned_user_id = $assigned_user['id_assigned_user'];
			} else {
				$visa->assigned_user_id = '';
			}
			*/
			
			
			
			
			
			
			$visa->fecha_response_req1_c = $o->fecha_response_req1_c; 
			$visa->fecha_response_req2_c = $o->fecha_response_req2_c;
			$visa->fecha_response_req3_c = $o->fecha_response_req3_c;
			$visa->fecha_response_req4_c = $o->fecha_response_req4_c;
			$visa->fecha_response_req5_c = $o->fecha_response_req5_c;
			$visa->fecha_req1 = $o->fecha_req1_c;
			$visa->fecha_req2 = $o->fecha_req2_c;
			$visa->fecha_req3 = $o->fecha_req3_c;
			$visa->fecha_req4_c = $o->fecha_req4_c;
			$visa->fecha_req5_c = $o->fecha_req5_c;
			$visa->fecha_exp_req1 = $o->fecha_exp_req1_c;
			$visa->fecha_exp_req2 = $o->fecha_exp_req2_c;
			$visa->fecha_exp_req3 = $o->fecha_exp_req3_c;
			$visa->fecha_exp_req4_c = $o->fecha_exp_req4_c;
			$visa->fecha_exp_req5_c = $o->fecha_exp_req5_c;
			$visa->rfi_name_1_c = $o->rfi_name_1_c;
			$visa->rfi_name_2_c = $o->rfi_name_2_c;
			$visa->rfi_name_3_c = $o->rfi_name_3_c;
			$visa->rfi_name_4_c = $o->rfi_name_4_c;
			$visa->rfi_name_5_c = $o->rfi_name_5_c;
			$visa->rfi_1_types_c = $o->rfi_1_types_c;
			$visa->rfi_2_types_c = $o->rfi_2_types_c;
			$visa->rfi_3_types_c = $o->rfi_3_types_c;
			$visa->rfi_4_types_c = $o->rfi_4_types_c;
			$visa->rfi_5_types_c = $o->rfi_5_types_c;
			
			
			
			$visa->nomination_app_date_c = $o->nomination_app_date_visa_c;
			$visa->nomination_app_expectation_date_c = $o->nomination_app_expectation_date_c;
			$visa->nomination_approval_date_c = $o->nomination_approval_date_c;
			$visa->skill_assessment_app_expectation_date_c = $o->skill_assessment_app_expectation_date_c;
			$visa->lmt_start_date_c = $o->lmt_start_date_c;
			$visa->lmt_expectation_date_c = $o->lmt_expectation_date_c;
			$visa->skill_assessment_app_date_c = $o->skill_assessment_app_date_visa_c;
			$visa->tas_application_date_c = $o->tas_application_date_c;
			$visa->tas_expectation_date_c = $o->tas_expectation_date_c;
			$visa->tas_approval_date_c = $o->tas_approval_date_c;
			$visa->eoi_application_date_c = $o->eoi_application_date_c;
			$visa->eoi_expectation_date_c = $o->eoi_expectation_date_c;
			$visa->eoi_appoval_date_c = $o->eoi_appoval_date_c;
			
			$visa->eoi_2_application_date_c = $o->eoi_2_application_date_c;
			$visa->eoi_2_expectation_date_c = $o->eoi_2_expectation_date_c;
			$visa->eoi_2_appoval_date_c = $o->eoi_2_appoval_date_c;
			$visa->eoi_3_application_date_c = $o->eoi_3_application_date_c;
			$visa->eoi_3_expectation_date_c = $o->eoi_3_expectation_date_c;
			$visa->eoi_3_appoval_date_c = $o->eoi_3_appoval_date_c;
			
			$visa->rcb_application_date_c = $o->rcb_application_date_c;
			$visa->rcb_expectation_date_c = $o->rcb_expectation_date_c;
			$visa->rcb_approval_date_c = $o->rcb_approval_date_c;
			$visa->roi_application_date_c = $o->roi_application_date_c;
			$visa->roi_expectation_date_c = $o->roi_expectation_date_c;
			$visa->roi_approval_date_c = $o->roi_approval_date_c;
			$visa->recruitment_expectation_date_c = $o->recruitment_expectation_date_c;
			
			
			
			
			

			$estudiantes = $o->get_linked_beans( 'contacts_opportunities_1' , 'Contacts' );

			foreach( $estudiantes as $e )
				$visa->contact_id_c = $e->id;




			error_log("RECIBO IMPRIME LA VISAS ". $visa->id);
			
			$visa->save( false );

			// Creamos relacion entre visa y servicio al cliente
			$visa->load_relationship( 'veta_visa_veta_serviciocliente' );
			$visa->veta_visa_veta_serviciocliente->add( $this->id );

			// Creamos relacion entre visa y oportunidad
			$visa->load_relationship( 'veta_visa_opportunities' );
			$visa->veta_visa_opportunities->add( $o->id );
			
			
			//Busca detalle recibo y requerimiento
			$r = $o->get_linked_beans('veta_recibo_opportunities', 'Veta_Recibo');
			$recibo = $r[0];
			if (is_null($recibo)) {
				logerror('is_null($recibo)');
				return;
			}
			
			if($recibo->name == '210'){
				
				error_log("RECIBO SE CREA LA RELACION CON LAS VISAS ". $visa->id);
				$visa->load_relationship( 'veta_visa_csche_cs_checklist_1' );
				$visa->veta_visa_csche_cs_checklist_1->add('19dde433-126d-f0de-5cf1-6408dddb4488'); 
				
			}
			
			

			$o->estado_visas_c = $visa->estado;
			$o->user_id2_c     = $this->assigned_user_id;
			$o->user_id1_c     = $visa->assigned_user_id;
			
		}
	}

    public function redireccionar( $msg , $registro ) {
        if( ! empty( $registro ) ) {
            $aux = "<script>
                      var registro='" . $registro . "';";

            $aux .= "alert('" . $msg . "');
                    window.location = 'index.php?module=Veta_ServicioCliente&action=DetailView&record=' + registro;
                 </script>";

            echo $aux;
        }
        else {
            echo "<script>alert('" . $msg . "')</script>";
        }

        exit;
    }

    /**
     * Este metodo establece como descartado el Servicio al Cliente y sus Visas
     */
    public function descartar() {

        $this->estado = 'Descartado';
        parent::save(false);

        $visas = $this->get_linked_beans( 'veta_visa_veta_serviciocliente' , 'Veta_Visa' );

        foreach($visas as $v) {
            $v->descartar();
        }
    }


}