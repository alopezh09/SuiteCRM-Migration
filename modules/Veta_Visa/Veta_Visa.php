<?php
/**
 *
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 *
 * SuiteCRM is an extension to SugarCRM Community Edition developed by SalesAgility Ltd.
 * Copyright (C) 2011 - 2017 SalesAgility Ltd.
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
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
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
 * reasonably feasible for  technical reasons, the Appropriate Legal Notices must
 * display the words  "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 */


class Veta_Visa extends Basic
{
    public $new_schema = true;
    public $module_dir = 'Veta_Visa';
    public $object_name = 'Veta_Visa';
    public $table_name = 'veta_visa';
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
    public $fecha_aplicacion;
    public $fecha_avac;
    public $fecha_examenes_medicos;
    public $fecha_expiracion;
    public $fecha_firma_acta;
    public $fecha_otorgada;
    public $fecha_pago;

    public function bean_implements( $interface ) {
        switch( $interface ) {
            case 'ACL':
                return true;
        }

        return false;
    }

    /*private function establecer_estudiante() {

        $coes = $this->get_linked_beans( 'veta_visa_veta_coe' , 'Veta_COE' );

        foreach( $coes as $coe ) {
            // Obtengo la aplicacion a la que pertenece el LOO
            $aplicaciones = $coe->get_linked_beans( 'veta_coe_veta_aplicacion' , 'Veta_Aplicacion' );

            foreach( $aplicaciones as $aplicacion ) {
                $oportunidades = $aplicacion->get_linked_beans( 'veta_aplicacion_opportunities' , 'Opportunities' );

                foreach( $oportunidades as $oportunidad ) {
                    $es = $oportunidad->get_linked_beans( 'contacts_opportunities_1' , 'Contacts' );

                    foreach( $es as $e ) {
                        $this->contact_id_c = $e->id;
                    }
                }
            }
        }

        parent::save( false );
    } */

    public function obtener_oportunidad() {

        $o = null;

        $oportunidades = $this->get_linked_beans( 'veta_visa_opportunities' , 'Opportunity' );

        foreach( $oportunidades as $op ) {
            $o = $op;
        }
        return $o;
    }
	
	public function updateDraftDoneDate(&$bean, $processStageField, $draftDoneField) {
		// Verifica si el campo draft_done está vacío o es nulo
		if (empty($bean->$draftDoneField)) {
			// Obtiene el valor actual del campo process_stage
			$currentProcessStage = $bean->fetched_row[$processStageField];

			// Verifica si NO contiene "Draft_done" anteriormente y SÍ contiene "Draft_done" ahora
			if (stripos($currentProcessStage, "Draft_done") === false && stripos($bean->$processStageField, "Draft_done") !== false) {
				// Asigna la fecha de hoy al campo draft_done				
				$bean->$draftDoneField = date("Y-m-d");
			}
		}
	}
	
	
	public function updateProcessLodgedStage(&$bean, $processStageField, $draftDoneField) {
		// Verifica si el campo Lodged está vacío o es nulo
		error_log("estado_visa funcion updateProcessLodgedStage campo 1 " . $processStageField . " campo 2 " .  $draftDoneField);
		if (empty($bean->$draftDoneField)) {
			// Obtiene el valor actual del campo process_stage
			$currentProcessStage = $bean->fetched_row[$processStageField];
			error_log("estado_visa funcion updateProcessLodgedStage dentro de la condicion " .  $currentProcessStage);

			// Verifica si NO contiene "Lodged" anteriormente y SÍ contiene "Lodged" ahora			
			if (stripos($currentProcessStage, "Lodged") === false && stripos($bean->$processStageField, "Lodged") !== false) {				
				//return true;
				// Limpiamos el nombre del proceso y lo convertimos en formato legible
				$nombreProceso = str_replace('_process_stage_c', '', $processStageField);
				$nombreProceso = ucwords(str_replace('_', ' ', $nombreProceso)); // Capitaliza con espacios
				$nombreProceso = str_replace(' ', '_', $nombreProceso); // Vuelve a poner los guiones bajos
				
				return $nombreProceso . '_Process_Lodged';
			}
		}
		return false;
	}
	
	
	public function updateProcessGrantedStage(&$bean, $processStageField, $draftDoneField) {
		// Verifica si el campo draft_done está vacío o es nulo
		if (empty($bean->$draftDoneField)) {
			// Obtiene el valor actual del campo process_stage
			$currentProcessStage = $bean->fetched_row[$processStageField];

			// Verifica si NO contiene "Draft_done" anteriormente y SÍ contiene "Draft_done" ahora			
			if (stripos($currentProcessStage, "Granted") === false && stripos($bean->$processStageField, "Granted") !== false) {
				// Limpiamos el nombre del proceso y lo convertimos en formato legible
				$nombreProceso = str_replace('_process_stage_c', '', $processStageField);
				$nombreProceso = ucwords(str_replace('_', ' ', $nombreProceso)); // Capitaliza con espacios
				$nombreProceso = str_replace(' ', '_', $nombreProceso); // Vuelve a poner los guiones bajos

				return $nombreProceso . '_Process_Granted';
			}
		}
		return false;
	}

    public function save( $check_notify = false ) {		
		
		// date -> eoi_draft_done_c
		$contieneVisa = false;
		$eoi_array = $this->fetched_row['eoi_process_stage_c'];		
		
		$this->updateDraftDoneDate($this, 'estado', 'visa_draft_done_date_c');
		$this->updateDraftDoneDate($this, 'eoi_process_stage_c', 'eoi_draft_done_c');
		$this->updateDraftDoneDate($this, 'nomination_process_stage_c', 'nomination_draft_done_c');
		$this->updateDraftDoneDate($this, 'rcb_process_stage_c', 'rcb_draft_done_c');
		$this->updateDraftDoneDate($this, 'roi_process_stage_c', 'roi_draft_done_c');
		$this->updateDraftDoneDate($this, 'sbs_process_stage_c', 'sbs_draft_done_c');
		$this->updateDraftDoneDate($this, 'skill_assessment_process_stage_c', 'skill_assessment_draft_done_c');
		$this->updateDraftDoneDate($this, 'state_nomination_process_stage_c', 'state_nomination_draft_done_c');
		$this->updateDraftDoneDate($this, 'citizenship_process_stage_c', 'citizenship_draft_done_c');		
		$this->updateDraftDoneDate($this, 'tas_process_stage_c', 'tas_draft_done_c');
		$this->updateDraftDoneDate($this, 'endorsement_process_stage_c', 'tas_draft_done_c');
		$this->updateDraftDoneDate($this, 'labor_agreement_process_stage_c', 'tas_draft_done_c');		
		
		if(($this->estado != "Visa_Aplicada") and ($this->estado != "Visa_Granted_Notified") and ($this->estado != "Visa_Otorgada") and ($this->estado != "Visa_Negada")){
			error_log("estado_visa dentro de la condicion de visas ");
			$process_lodged_sw = false;
			$process_granted_sw = false;
			$fields = [
				'eoi_process_stage_c' => 'eoi_lodged_c',
				'nomination_process_stage_c' => 'nomination_lodged_c',
				'rcb_process_stage_c' => 'rcb_lodged_c',
				'roi_process_stage_c' => 'roi_lodged_c',
				'sbs_process_stage_c' => 'sbs_lodged_c',
				'skill_assessment_process_stage_c' => 'skill_assessment_lodged_c',
				'state_nomination_process_stage_c' => 'state_nomination_lodged_c',
				'citizenship_process_stage_c' => 'citizenship_lodged_c',
				'tas_process_stage_c' => 'tas_lodged_c',
				'endorsement_process_stage_c' => 'tas_lodged_c',
				'labor_agreement_process_stage_c' => 'tas_lodged_c'
			];

			foreach ($fields as $processStageField => $draftDoneField) {
				$procesoLodged = $this->updateProcessLodgedStage($this, $processStageField, $draftDoneField);
				if ($procesoLodged) {
					$this->estado = $procesoLodged; // Ej: "Skill Assessment Granted"
					$process_lodged_sw = true;
					break; // Termina al primer proceso con estado actualizado
				}
				
			}			
			
			$fields = [
				'eoi_process_stage_c' => 'eoi_granted_c',
				'nomination_process_stage_c' => 'nomination_granted_c',
				'rcb_process_stage_c' => 'rcb_granted_c',
				'roi_process_stage_c' => 'roi_granted_c',
				'sbs_process_stage_c' => 'sbs_granted_c',
				'skill_assessment_process_stage_c' => 'skill_assessment_granted_c',
				'state_nomination_process_stage_c' => 'state_nomination_granted_c',
				'citizenship_process_stage_c' => 'citizenship_granted_c',
				'tas_process_stage_c' => 'tas_granted_c',
				'endorsement_process_stage_c' => 'tas_granted_c',
				'labor_agreement_process_stage_c' => 'tas_granted_c'
			];
			
			$ultimo_estado_granted = null;
			
			foreach ($fields as $processStageField => $draftDoneField) {
				$procesoGranted = $this->updateProcessGrantedStage($this, $processStageField, $draftDoneField);
				if ($procesoGranted) {
					$this->estado = $procesoGranted; // Ej: "Skill Assessment Granted"
					$ultimo_estado_granted = $procesoGranted;
					$process_granted_sw = true;
					break; // Termina al primer proceso con estado actualizado
				}
			}			
			$count_processes = 0; // Inicializamos el contador de procesos
			$granted_count = 0;   // Inicializamos el contador de procesos granted
			$lodged_count = 0;
			$feesProcessTypes = []; // Inicializamos el array de procesos			

			if($process_granted_sw) {	
				// Array de los campos que corresponden a cada proceso y su campo de estado "granted"
				$fields = [
					'eoi_process_stage_c' => 'eoi_granted_c',
					'nomination_process_stage_c' => 'nomination_granted_c',
					'rcb_process_stage_c' => 'rcb_granted_c',
					'roi_process_stage_c' => 'roi_granted_c',
					'sbs_process_stage_c' => 'sbs_granted_c',
					'skill_assessment_process_stage_c' => 'skill_assessment_granted_c',
					'state_nomination_process_stage_c' => 'state_nomination_granted_c',
					'citizenship_process_stage_c' => 'citizenship_granted_c',
					'tas_process_stage_c' => 'tas_granted_c',
					'endorsement_process_stage_c' => 'tas_granted_c',
					'labor_agreement_process_stage_c' => 'tas_granted_c'
				];

				if ($this->id != '9852e8b9-f82c-ceaa-26a5-64246840642b') {
					
					$workflow = BeanFactory::getBean('Opportunities', $this->veta_visa_opportunitiesopportunities_ida);
					if (isset($workflow)) {
						error_log("hide_procesos Workflow " . $workflow->id);
						$recibo = BeanFactory::getBean('Veta_Recibo', $workflow->veta_recibo_opportunitiesveta_recibo_ida);						
						if (isset($recibo)) {
							// Array con los campos de fees a validar
							$fees_fields = [
								'veta_tiposvisa_id1_c',
								'veta_tiposvisa_id2_c',
								'veta_tiposvisa_id3_c',
								'veta_tiposvisa_id4_c',
								'veta_tiposvisa_id5_c',
								'veta_tiposvisa_id6_c',
								'veta_tiposvisa_id7_c',
								'veta_tiposvisa_id8_c',
								'veta_tiposvisa_id9_c',
								'veta_tiposvisa_id10_c', 
								'veta_tiposvisa_id11_c',								
								'veta_tiposvisa_id12_c',
								'veta_tiposvisa_id13_c',
								'veta_tiposvisa_id14_c',
								'veta_tiposvisa_id15_c',
								'veta_tiposvisa_id16_c',
								'veta_tiposvisa_id17_c',
								'veta_tiposvisa_id18_c',
								'veta_tiposvisa_id19_c'
							];
							foreach ($fees_fields as $feeField) {
								$tiposVisaId = $recibo->$feeField;								
								if (!empty($tiposVisaId)) {									
									$proceso = BeanFactory::getBean('Veta_TiposVisa', $tiposVisaId);																		

									if ($proceso && !empty($proceso->process_type_c)) {																				
										$tipo = trim($proceso->process_type_c);
										// Aquí puedes agregarlo a feesProcessTypes si deseas
										// Evitar duplicados
										if (!in_array($tipo, $feesProcessTypes)) {
											// Verificar si contiene la palabra "visa" sin importar mayúsculas
											if (stripos($tipo, 'visa') !== false) {
												$contieneVisa = true;
											}
											$feesProcessTypes[] = $tipo;
											$count_processes++;
										}
										// Ahora verificamos el estado "granted" correspondiente en el objeto $this
										foreach ($fields as $processStageField => $grantedField) {
											// Verificamos si el proceso corresponde con el campo adecuado
											if (strpos($processStageField, strtolower($tipo)) !== false) {												

												// Si el campo del proceso está en estado "granted"
												if (isset($this->$processStageField) && strpos($this->$processStageField, 'Granted') !== false) {
													$granted_count++; // Incrementamos el contador de procesos granted													
													error_log("Cantidad total PROCESOSS en estado granted: " . $proceso->process_type_c);
												}
												// Si el campo del proceso está en estado "Lodged"
												if (isset($this->$processStageField) && strpos($this->$processStageField, 'Lodged') !== false) {
													$lodged_count++;
													error_log("Cantidad total PROCESOSS en estado lodged: " . $proceso->process_type_c);
												}
											}
										}
									}
								}
							}							
						}
					}

					
					
				}

			}

			error_log("PROCESOSS Cantidad total de procesos asociados: " . $count_processes);
			
			error_log("process_lodged ");
		}
		/*
		if(($this->estado != "Visa_Aplicada") and ($this->estado != "Visa_Granted_Notified") and ($this->estado != "Visa_Otorgada") and ($this->estado != "Visa_Negada")){
			$process_lodged_sw = false;
			
		}
		*/
		
		
		
		
		$save_sc = false;		
		$sc = new Veta_ServicioCliente();
		$sc->retrieve($this->veta_visa_veta_servicioclienteveta_serviciocliente_idb);
		
		if ($process_lodged_sw){			
			error_log("estado_visa estado de la visa para actualizar servicio al cliente " . $this->estado);
			//$sc->estado = "Hold_Process_Lodge";
			$sc->estado = $this->estado;

			error_log("process_lodged Hold_Process_Lodge");			
			$save_sc = true;
		}
		
		if($_REQUEST["module"] == "Veta_Visa") {
			if (stripos($this->fetched_row["estado"], "Closed") === false && stripos($this->estado, "Closed") !== false) {				
				$sc->estado = "Closed";
				$save_sc = true;
			}			
		}
		
		
		
		// Verificamos si todos los procesos están en estado "granted"
		if ($contieneVisa){
			$count_processes = $count_processes-1;
		}
		/*
		if ($contieneVisa && $count_processes > 0) {
			$count_processes--;
		}
		*/
		
		
		if ($process_granted_sw){			
			error_log("estado_visa estado de la visa para actualizar servicio al cliente " . $this->estado);
			//$sc->estado = "Hold_Process_Lodge";
			$sc->estado = $this->estado;

			error_log("process_lodged Hold_Process_Lodge");			
			$save_sc = true;
		}
		
		
		if (($granted_count >= $count_processes) && ($count_processes > 0)) {
			if ($process_granted_sw) {
				if ($contieneVisa) {
					// ✅ CON VISA: NO cerrar el estado de la visa
					// Debe quedar con el último proceso granted
					if (!empty($ultimo_estado_granted)) {
						$this->estado = $ultimo_estado_granted;
					}
					// Si no hubo granted nuevo en este save, dejamos el estado como ya estaba (NO Closed)

					
					$sc->estado = $this->estado;
					$save_sc = true;

					error_log("Estado final con VISA: se conserva ultimo granted: " . $this->estado);

				} else {
					// ✅ SIN VISA: sí se cierra
					$this->estado = "Closed";
					$sc->estado = "Closed";
					$save_sc = true;

					error_log("Estado final sin VISA: Closed");
				}
			}			
			
			
		} elseif ((($granted_count + $lodged_count) >= $count_processes) && ($count_processes > 0)) {
			// Todos los procesos están al menos en estado Lodged o Granted			
			$sc->estado = "Completed";
			$save_sc = true;
			error_log("Cantidad total Estado: Complete (granted + lodged >= total)");
		} else {
			error_log("Cantidad total Procesos Granted: $granted_count, Lodged: $lodged_count, de un total de: $count_processes");
		}
		
		
		
		
		if($this->estado == "Visa_Otorgada"){
			$sc->estado = "Visa_Otorgada";
			$save_sc = true;			
		}
		
		if($this->estado == "Visa_Negada"){
			$sc->estado = "Visa_Negada";
			$save_sc = true;			
		}
		
		if($save_sc){
			$sc->save(false);
			error_log("process_lodged estado_visa customer services save ");			
		}
		error_log("PROCESOSS Cantidad total de procesos asociados: " . $count_processes);
		error_log("PROCESOSS estados VISA: " . $this->estado);	
		error_log("PROCESOSS estados SERVICIO CLIENTE: " . $sc->estado);	
		
		$checklist = $this->get_linked_beans('veta_visa_csche_items_requested_1', 'CSChe_Items_Requested');
		foreach( $checklist as $item ){
			if($item->status == 'Pendiente'){
				if($this->estado=='Lodge_Requested'){
					error_log ("APROBACION ". $item->name);
					$this->redireccionar( 'You cannot save this record because have pending items' , $this->id );
					return;
				}
				
			}						
		}

        /*if( $this->estado == 'Aprobada' )
            $this->establecer_oportunidad_visada();*/

        //$aux = parent::save( $check_notify );
        //$this->crear_relacion_con_oportunidad();
        //$this->establecer_estudiante();

        // Ojo el orden importa no se puede actualizar la fecha de expiracion mas arriba
        /*if( $this->estado == 'Aprobada' )
            $this->actualizar_fecha_expiracion();*/
				
		


		//$this->processes_notification(); 
		
        $aux = parent::save( $check_notify );

        $oportunidades = $this->get_linked_beans( 'veta_visa_opportunities' , 'Opportunity' );


		
		
		
        // Se actualiza el estado en la oportunidad
        foreach( $oportunidades as $o ) {			
			
            $o->estado_visas_c = $this->estado;
            $o->user_id1_c = $this->assigned_user_id;
			$o->process_stages_c = $this->process_stages_c;
            $o->save();
			
			//if($_REQUEST["module"] == "Veta_Visa") {
				error_log("NOMINATION PROCESS ". $this->eoi_process_stage_c);
				$this->save_opportunity_RFI($o);
			//}
        }

        if($this->estado == 'Visa_Otorgada' ){
            $c = new Contact();
            $c->retrieve($this->contact_id_c);
			if ((isset($this->fecha_expiracion)) and ($this->fecha_expiracion != '')){
				$c->fecha_expiracion_visa_c = $this->fecha_expiracion;
			}
            
            $c->save(false);
        }
		
		$this->actualizar_fecha_expiracion_db();
		
		
		
		

        return $aux; 
    }
	
	public function processes_notification() {		
	
		if($this->id == '76bc5c9f-4ab5-2f14-f5c3-63975cdb8d34'){
			
			if(!$this->nomination_notification_c) {
				if(($this->nomination_app_date_c) and ($this->nomination_app_date_c != '')){
					if((!$this->nomination_approval_date_c) or ($this->nomination_approval_date_c == '')){						
						$this->estado = "Nomination_Pending";
						$this->nomination_notification_c = 1;
					}					
				}
			} 
			if(!$this->nomination_notification_approved_c) {
				if (($this->nomination_approval_date_c) and ($this->nomination_approval_date_c != '')){
					$this->estado = "Nomination_Approved";
					$this->nomination_notification_approved_c = 1;					
				}
			}
			
			if(!$this->skill_assessment_notification_c) {
				if(($this->skill_assessment_app_date_c) and ($this->skill_assessment_app_date_c != '')){
					if((!$this->skill_assessment_app_expectation_date_c) or ($this->skill_assessment_app_expectation_date_c == '')){						
						$this->estado = "Skill_Assessment_Pending";
						$this->skill_assessment_notification_c = 1;
					}					
				}
			} 
			if(!$this->skill_assessment__notification_approved_c) {
				if (($this->skill_assessment_app_expectation_date_c) and ($this->skill_assessment_app_expectation_date_c != '')){
					$this->estado = "Skill_Assessment_Approved";
					$this->skill_assessment__notification_approved_c = 1;					
				}
			}
			
			
			if(!$this->tas_notification_c) {
				if(($this->tas_application_date_c) and ($this->tas_application_date_c != '')){
					if((!$this->tas_approval_date_c) or ($this->tas_approval_date_c == '')){						
						$this->estado = "TAS_Pending";
						$this->tas_notification_c = 1;
					}					
				}
			}
			if(!$this->tas_notification_approved_c) {
				if (($this->tas_approval_date_c) and ($this->tas_approval_date_c != '')){
					$this->estado = "TAS_Approved";
					$this->tas_notification_approved_c = 1;
				}
			}
			
			
			if(!$this->eoi_notification_c) {
				if(($this->eoi_application_date_c) and ($this->eoi_application_date_c != '')){
					if((!$this->eoi_appoval_date_c) or ($this->eoi_appoval_date_c == '')){						
						$this->estado = "EOI_Pending";						
						$this->eoi_notification_c = 1;
					}					
				}
			}
			
			if(!$this->eoi_notification_c) {
				if(($this->eoi_2_application_date_c) and ($this->eoi_2_application_date_c != '')){
					if((!$this->eoi_2_appoval_date_c) or ($this->eoi_2_appoval_date_c == '')){				 		
						$this->estado = "EOI_Pending";
						$this->eoi_notification_c = 1;
					}					
				}
			}
			
			if(!$this->eoi_notification_c) {
				if(($this->eoi_3_application_date_c) and ($this->eoi_3_application_date_c != '')){
					if((!$this->eoi_3_appoval_date_c) or ($this->eoi_3_appoval_date_c == '')){						
						$this->estado = "EOI_Pending";
						$this->eoi_notification_c = 1;
					}					
				}
			}
			if(!$this->eoi_notification_approved_c) {
				if (($this->eoi_appoval_date_c) and ($this->eoi_appoval_date_c != '')){
					$this->estado = "EOI_Approved";
					$this->eoi_notification_approved_c = 1;
				}
				if (($this->eoi_2_appoval_date_c) and ($this->eoi_2_appoval_date_c != '')){
					$this->estado = "EOI_Approved";
					$this->eoi_notification_approved_c = 1;
				}
				if (($this->eoi_3_appoval_date_c) and ($this->eoi_3_appoval_date_c != '')){
					$this->estado = "EOI_Approved";
					$this->eoi_notification_approved_c = 1;
				}
			}
			
			
			if(!$this->rcb_notification_c) {
				if(($this->rcb_application_date_c) and ($this->rcb_application_date_c != '')){
					if((!$this->rcb_approval_date_c) or ($this->rcb_approval_date_c == '')){						
						$this->estado = "RCB_Pending";
						$this->rcb_notification_c = 1;
					}					
				}
			}
			if(!$this->rcb_notification_approved_c) {
				if (($this->rcb_approval_date_c) and ($this->rcb_approval_date_c != '')){
					$this->estado = "RCB_Approved";
					$this->rcb_notification_approved_c = 1;
				}
			}
			
			
			
			if(!$this->state_nomination_notification_c) {
				if(($this->state_nomination_application_date_c) and ($this->state_nomination_application_date_c != '')){
					if((!$this->state_nomination_approval_date_c) or ($this->state_nomination_approval_date_c == '')){						
						$this->estado = "State_Nomination_Pending";
						$this->state_nomination_notification_c = 1;
					}					
				}
			}
			if(!$this->state_nomination_notification_approved_c) {
				if (($this->state_nomination_approval_date_c) and ($this->state_nomination_approval_date_c != '')){
					$this->estado = "State_Nomination_Approved";
					$this->state_nomination_notification_approved_c = 1;
				}
			}
			
			
			if(!$this->roi_notification_c) {
				if(($this->roi_application_date_c) and ($this->roi_application_date_c != '')){
					if((!$this->roi_approval_date_c) or ($this->roi_approval_date_c == '')){						
						$this->estado = "ROI_Pending";
						$this->roi_notification_c = 1;
					}					
				}
			}
			if(!$this->roi_notification_approved_c) {
				if (($this->roi_approval_date_c) and ($this->roi_approval_date_c != '')){
					$this->estado = "ROI_Approved";
					$this->roi_notification_approved_c = 1;
				}
			}
										
										
										
			if(!$this->sbs_notification_c) {
				if(($this->sbs_application_date_c) and ($this->sbs_application_date_c != '')){
					if((!$this->sbs_approval_date_c) or ($this->sbs_approval_date_c == '')){						
						$this->estado = "ROI_Pending";
						$this->sbs_notification_c = 1;
					}					
				}
			}
			if(!$this->sbs_notification_approved_c) {
				if (($this->sbs_approval_date_c) and ($this->sbs_approval_date_c != '')){
					$this->estado = "ROI_Approved";
					$this->sbs_notification_approved_c = 1;
				}
			}
			
			
			if(!$this->lmt_notification_c) {
				if(($this->lmt_start_date_c) and ($this->lmt_start_date_c != '')){					
						$this->estado = "LMT_Pending";
						$this->lmt_notification_c = 1;
					
				}
			}						
			if(!$this->lmt_notification_approved_c) {
				if (($this->lmt_expectation_date_c) and ($this->lmt_expectation_date_c != '')){
					$this->estado = "LMT_Approved";
					$this->lmt_notification_approved_c = 1;
				}
			}
			
			if(!$this->labor_agreement_notification_approved_c) {
				if (($this->labor_agreement_expectation_date_c) and ($this->labor_agreement_expectation_date_c != '')){
					$this->estado = "Labor_Agreement_Approved";
					$this->labor_agreement_notification_approved_c = 1;
				}
			}
			
			if(!$this->endorsement_notification_approved_c) {
				if (($this->endorsement_expectation_date_c) and ($this->endorsement_expectation_date_c != '')){
					$this->estado = "Endorsement_Approved";
					$this->endorsement_notification_approved_c = 1;
				}
			}
			
		}
		
				
	}
	
	public function save_opportunity_RFI($o) {
		
		/*
		$o->db->query("UPDATE opportunities
						SET 
							date_entered = '26-07-2022'
							
						WHERE 
							id = '" . $o->id . "'");	
		*/
		
		$o->db->query("UPDATE 
					opportunities_cstm 
				SET 
					fecha_response_req1_c = '" . $this->fecha_response_req1_c . "',  
					fecha_response_req2_c = '" . $this->fecha_response_req2_c . "', 
					fecha_response_req3_c = '" . $this->fecha_response_req3_c . "', 
					fecha_response_req4_c = '" . $this->fecha_response_req4_c . "', 
					fecha_response_req5_c = '" . $this->fecha_response_req5_c . "', 
					fecha_req1_c = '" . $this->fecha_req1 . "', 
					fecha_req2_c = '" . $this->fecha_req2 . "', 
					fecha_req3_c = '" . $this->fecha_req3 . "', 
					fecha_req4_c = '" . $this->fecha_req4_c . "', 
					fecha_req5_c = '" . $this->fecha_req5_c . "', 
					fecha_exp_req1_c = '" . $this->fecha_exp_req1 . "', 
					fecha_exp_req2_c = '" . $this->fecha_exp_req2 . "', 
					fecha_exp_req3_c = '" . $this->fecha_exp_req3 . "', 
					fecha_exp_req4_c = '" . $this->fecha_exp_req4_c . "', 
					fecha_exp_req5_c = '" . $this->fecha_exp_req5_c . "', 
					rfi_name_1_c = '" . $this->rfi_name_1_c . "', 
					rfi_name_2_c = '" . $this->rfi_name_2_c . "', 
					rfi_name_3_c = '" . $this->rfi_name_3_c . "', 
					rfi_name_4_c = '" . $this->rfi_name_4_c . "', 
					rfi_name_5_c = '" . $this->rfi_name_5_c . "', 
					rfi_1_types_c = '" . $this->rfi_1_types_c . "', 
					rfi_2_types_c = '" . $this->rfi_2_types_c . "', 
					rfi_3_types_c = '" . $this->rfi_3_types_c . "', 
					rfi_4_types_c = '" . $this->rfi_4_types_c . "', 
					rfi_5_types_c = '" . $this->rfi_5_types_c . "',
					
					rfi_1_ext_request_c = '" . $this->rfi_1_ext_request_c . "',
					rfi_2_ext_request_c = '" . $this->rfi_2_ext_request_c . "',
					rfi_3_ext_request_c = '" . $this->rfi_3_ext_request_c . "',
					rfi_4_ext_request_c = '" . $this->rfi_4_ext_request_c . "',
					rfi_5_ext_request_c = '" . $this->rfi_5_ext_request_c . "',
					
					nomination_app_date_visa_c = '" . $this->nomination_app_date_c . "',
					nomination_app_expectation_date_c = '" . $this->nomination_app_expectation_date_c . "',
					nomination_approval_date_c = '" . $this->nomination_approval_date_c . "',
					skill_assessment_app_expectation_date_c = '" . $this->skill_assessment_app_expectation_date_c . "',
					lmt_start_date_c = '" . $this->lmt_start_date_c . "',
					lmt_expectation_date_c = '" . $this->lmt_expectation_date_c . "',
					lmt_url_c = '" . $this->lmt_url_c . "',
					lmt_finished_c = '" . $this->lmt_finished_c . "',
					
					lmt_start_date_2_c = '" . $this->lmt_start_date_2_c . "',
					lmt_expectation_date_2_c = '" . $this->lmt_expectation_date_2_c . "',
					lmt_url_2_c = '" . $this->lmt_url_2_c . "',
					
					lmt_start_date_3_c = '" . $this->lmt_start_date_3_c . "',
					lmt_expectation_date_3_c = '" . $this->lmt_expectation_date_3_c . "',
					lmt_url_3_c = '" . $this->lmt_url_3_c . "',
					
					
					
					
					
					
					
					skill_assessment_app_date_visa_c = '" . $this->skill_assessment_app_date_c . "',
					tas_application_date_c = '" . $this->tas_application_date_c . "',
					tas_expectation_date_c = '" . $this->tas_expectation_date_c . "',
					tas_approval_date_c = '" . $this->tas_approval_date_c . "',
					eoi_application_date_c = '" . $this->eoi_application_date_c . "',
					eoi_expectation_date_c = '" . $this->eoi_expectation_date_c . "',
					eoi_appoval_date_c = '" . $this->eoi_appoval_date_c . "',
					
					eoi_2_application_date_c = '" . $this->eoi_2_application_date_c . "',
					eoi_2_expectation_date_c = '" . $this->eoi_2_expectation_date_c . "',
					eoi_2_appoval_date_c = '" . $this->eoi_2_appoval_date_c . "',
					eoi_3_application_date_c = '" . $this->eoi_3_application_date_c . "',
					eoi_3_expectation_date_c = '" . $this->eoi_3_expectation_date_c . "',
					eoi_3_appoval_date_c = '" . $this->eoi_3_appoval_date_c . "',
					
					rcb_application_date_c = '" . $this->rcb_application_date_c . "',
					rcb_expectation_date_c = '" . $this->rcb_expectation_date_c . "',
					rcb_approval_date_c = '" . $this->rcb_approval_date_c . "',
					
					state_nomination_application_date_c = '" . $this->state_nomination_application_date_c . "',
					state_nomination_expectation_date_c = '" . $this->state_nomination_expectation_date_c . "',
					state_nomination_approval_date_c = '" . $this->state_nomination_approval_date_c . "',
					
					
					roi_application_date_c = '" . $this->roi_application_date_c . "',
					roi_expectation_date_c = '" . $this->roi_expectation_date_c . "',
					roi_approval_date_c = '" . $this->roi_approval_date_c . "',
					
					sbs_application_date_c = '" . $this->sbs_application_date_c . "',
					sbs_expectation_date_c = '" . $this->sbs_expectation_date_c . "',
					sbs_approval_date_c = '" . $this->sbs_approval_date_c . "',
					
					endorsement_application_date_c = '" . $this->endorsement_application_date_c . "',
					endorsement_expectation_date_c = '" . $this->endorsement_expectation_date_c . "',
					endorsement_approval_date_c = '" . $this->endorsement_approval_date_c . "',
					
					labor_agreement_application_date_c = '" . $this->sbs_application_date_c . "',
					labor_agreement_expectation_date_c = '" . $this->sbs_expectation_date_c . "',
					labor_agreement_approval_date_c = '" . $this->sbs_approval_date_c . "',
					
										
					
					recruitment_expectation_date_c = '" . $this->recruitment_expectation_date_c . "',
					
					process_stages_c = '" . $this->process_stages_c . "',
					
					visa_trn_c = '" . $this->visa_trn_c . "',
					nomination_trn_c = '" . $this->nomination_trn_c . "',
					
					fecha_aplicacion_visa_c = '" . substr($this->fecha_aplicacion, 0, 10) . "',
					
					visa_expectation_date_c = '" . substr($this->visa_expectation_date_c, 0, 10) . "',
					
					virtual_visa_exp_date_c = '" . substr($this->fecha_expiracion_visa, 0, 10) . "',
					
					tas_process_stage_c = '" . $this->tas_process_stage_c . "',
					state_nomination_process_stage_c = '" . $this->state_nomination_process_stage_c . "',
					
					citizenship_process_stage_c = '" . $this->citizenship_process_stage_c . "',
					
					
					
					
					skill_assessment_process_stage_c = '" . $this->skill_assessment_process_stage_c . "',
					sbs_process_stage_c = '" . $this->sbs_process_stage_c . "',
					roi_process_stage_c = '" . $this->roi_process_stage_c . "',
					rcb_process_stage_c = '" . $this->rcb_process_stage_c . "',
					nomination_process_stage_c = '" . $this->nomination_process_stage_c . "',
					lmt_process_stage_c = '" . $this->lmt_process_stage_c . "',
					eoi_process_stage_c = '" . $this->eoi_process_stage_c . "',
					endorsement_process_stage_c = '" . $this->endorsement_process_stage_c . "',
					labor_agreement_process_stage_c = '" . $this->labor_agreement_process_stage_c . "'
					
					

					
					
				WHERE 
					id_c = '" . $o->id . "'");	
		
	}
	
	private function actualizar_fecha_expiracion_db()
	{
		global $db;

		// Ejecutar solo si la fecha cambió
		if ($this->fetched_row['fecha_expiracion'] === $this->fecha_expiracion) return;

		$visaId = $this->id;
		$fecha  = $this->fecha_expiracion;

		if (empty($visaId) || empty($fecha)) return;

		$visaIdQ = $db->quote($visaId);
		$fechaQ  = $db->quote($fecha);

		// 1) veta_visa
		$db->query("
			UPDATE veta_visa
			SET fecha_expiracion_visa = '{$fechaQ}'
			WHERE id = '{$visaIdQ}' AND deleted = 0
		");

		// 2) leads_cstm (siempre por opportunity)
		$db->query("
			UPDATE leads_cstm lc
			INNER JOIN (
				SELECT DISTINCT l.id
				FROM leads l
				INNER JOIN leads_opportunities_1_c lo
					ON lo.leads_opportunities_1leads_ida = l.id
				   AND lo.deleted = 0
				INNER JOIN veta_visa_opportunities_c vo
					ON vo.veta_visa_opportunitiesopportunities_ida = lo.leads_opportunities_1opportunities_idb
				   AND vo.deleted = 0
				WHERE vo.veta_visa_opportunitiesveta_visa_idb = '{$visaIdQ}'
				  AND l.deleted = 0
			) x ON x.id = lc.id_c
			SET lc.fecha_expiracion_visa_c = '{$fechaQ}'
		");

		// 3) contacts_cstm (puede que no existan)
		$db->query("
			UPDATE contacts_cstm cc
			INNER JOIN (
				SELECT DISTINCT c.id
				FROM contacts c
				INNER JOIN contacts_opportunities_1_c co
					ON co.contacts_opportunities_1contacts_ida = c.id
				   AND co.deleted = 0
				INNER JOIN veta_visa_opportunities_c vo
					ON vo.veta_visa_opportunitiesopportunities_ida = co.contacts_opportunities_1opportunities_idb
				   AND vo.deleted = 0
				WHERE vo.veta_visa_opportunitiesveta_visa_idb = '{$visaIdQ}'
				  AND c.deleted = 0
			) y ON y.id = cc.id_c
			SET cc.fecha_expiracion_visa_c = '{$fechaQ}'
		");
	}



    /***
     * Este metodo actualiza la fecha de expiracion de la visa en los modulos de prospecto, estudiante, oportunidad, aplicacion, loo, coe y liquidacion
     */
    /*private function actualizar_fecha_expiracion() {
        $coes = $this->get_linked_beans( 'veta_visa_veta_coe' , 'Veta_COE' );

        foreach( $coes as $coe ) {
            $coe->fecha_expiracion_visa = $this->fecha_expiracion;
            $coe->save( false );

            $apps = $coe->get_linked_beans( 'veta_coe_veta_aplicacion' , 'Veta_Aplicacion' );

            foreach( $apps as $app ) {
                $app->fecha_expiracion_visa = $this->fecha_expiracion;
                $app->save();

                $loos = $app->get_linked_beans( 'veta_loo_veta_aplicacion' , 'Veta_Loo' );

                foreach( $loos as $loo ) {
                    $loo->fecha_expiracion_visa = $this->fecha_expiracion;
                    $loo->save( false );
                }

                $ops = $app->get_linked_beans( 'veta_aplicacion_opportunities' , 'Opportunities' );

                foreach( $ops as $o ) {
                    $o->fecha_expiracion_visa_c = $this->fecha_expiracion;
                    $o->save( false );

                    $lqs = $o->get_linked_beans( 'veta_liquidacion_opportunities' , 'Veta_Liquidacion' );

                    foreach( $lqs as $l ) {
                        $l->fecha_expiracion_visa = $this->fecha_expiracion;
                        //$l->save(false);
                        $l->salvar();
                    }

                    $es = $o->get_linked_beans( 'contacts_opportunities_1' , 'Contacts' );

                    foreach( $es as $e ) {
                        $e->fecha_expiracion_visa_c = $this->fecha_expiracion;
                        $e->save( false );

                        $ps = $e->get_linked_beans( 'leads' , 'Lead' );

                        foreach( $ps as $p ) {
                            $p->fecha_expiracion_visa_c = $this->fecha_expiracion;
                            $p->save( false );
                        }
                    }
                }
            }
        }
    }  */

    private function redireccionar( $msg , $registro ) {
        if( ! empty( $registro ) ) {
            $aux = "<script>
                      var registro='" . $registro . "';";

            $aux .= "alert('" . $msg . "');
                    window.location = 'index.php?module=Veta_Visa&action=DetailView&record=' + registro;
                 </script>";

            echo $aux;
        }
        else {
            echo "<script>alert('" . $msg . "')</script>";
        }

        exit;
    }

    /*private function establecer_oportunidad_visada() {

        $v = new Veta_Visa();
        $v->retrieve( $this->id );

        if( $v->estado != 'Aprobada' and $v->estado != 'Pagado' ) {

            $msg = 'No se puede salvar porque no se ha pagado';

            if( $_REQUEST[ 'return_action' ] == 'DetailView' )
                $this->redireccionar( $msg , $_REQUEST[ 'return_id' ] );
            else
                $this->redireccionar( $msg , null );
        }

        $coes = $this->get_linked_beans( 'veta_visa_veta_coe' , 'Veta_COE' );

        foreach( $coes as $coe ) {

            $apps = $coe->get_linked_beans( 'veta_coe_veta_aplicacion' , 'Veta_Aplicacion' );

            foreach( $apps as $app ) {

                $ops = $app->get_linked_beans( 'veta_aplicacion_opportunities' , 'Opportunities' );

                foreach( $ops as $o ) {

                    $o->estado_visas_c = $this->estado;
                    $o->save( false );
                }
            }
        }
    }  */

    /*private function crear_relacion_con_oportunidad() {

        $coes = $this->get_linked_beans( 'veta_visa_veta_coe' , 'Veta_COE' );

        foreach( $coes as $coe ) {

            $apps = $coe->get_linked_beans( 'veta_coe_veta_aplicacion' , 'Veta_Aplicacion' );

            foreach( $apps as $app ) {

                $ops = $app->get_linked_beans( 'veta_aplicacion_opportunities' , 'Opportunities' );

                foreach( $ops as $o ) {

                    $o->load_relationship( 'veta_visa_opportunities' );
                    $o->veta_visa_opportunities->add( $this->id );
                    $o->sales_stage = 'Preparacion_Embajada';
                    $o->save( false );
                }
            }
        }
    } */

    /**
     * Este metodo establece el estado de una visa como descartada.
     */
    public function descartar(){

        $this->estado = 'Descartada';
        parent::save(false);
    }
}