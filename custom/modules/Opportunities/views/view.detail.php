<?php

if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}

require_once('include/MVC/View/views/view.detail.php');



class OpportunitiesViewDetail extends ViewDetail
{
    public function __construct()
    {
        parent::__construct();
    }

    public function display()
    {	
		
        $this->load_observations();
        $this->load_requerimiento_info();
        $this->load_info();		
        load_notes($this->bean, 'Opportunities', 'virtual_all_notes'); 
		$this->load_semaforizacion();
		
		/*
		if($this->bean->id == '676980c4-c493-578a-8da0-64246887bf01'){
			if((isset($this->bean->leads_opportunities_1_name)) and ($this->bean->leads_opportunities_1_name != '')){
				error_log("conteos entro al lead " . $this->bean->leads_opportunities_1_name);
			}
			if((isset($this->bean->company_name)) and ($this->bean->company_name != '')){
				error_log("conteos entro al de companias " . $this->bean->company_name);
			}
		}
		*/
		
		
		
		
		
		if((isset($this->bean->url_c)) and ($this->bean->url_c != '')){
			//$bean->url = "<a href='$bean->url' target='_blank'>$bean->name</a>";
			//$this->bean->virtual_folder_url_c = "<a href='$this->bean->url_c' target='_blank'>Folder Link</a>"; 
			//$this->bean->virtual_folder_url_c = "Folder Link"; 
			
			$this->bean->virtual_folder_url_c = "<a href='".$this->bean->url_c."' target='_blank'>Folder Link</a>";
			
		}
		
		$this->load_lead();
		
		
		
		$r = new Veta_Recibo();
		$r->retrieve($this->bean->veta_recibo_opportunitiesveta_recibo_ida);

		if (($r->id != 'b7300140-968e-3da3-f8df-62298ea68dac')){
			$detalles = $r->get_linked_beans('veta_detallerecibo_veta_recibo', 'Veta_DetalleRecibo');
			$messages = '';  // Variable para almacenar los mensajes HTML
			$disable_button = false;  // Variable de control para deshabilitar el botón
			
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
				'veta_tiposvisa_id11_c'
			];

			foreach ($fees_fields as $fee_field) {
				// Verificar si el campo tiene un valor					
				$fee_value = $r->$fee_field;					
				
				if (!empty($fee_value)) {						
					// Buscar si ese fee tiene el campo process_type_c asignado en el módulo Veta_TiposVisa
					$fee_visa = new Veta_TiposVisa();
					$fee_visa->retrieve($fee_value);
						if (empty($fee_visa->process_type_c)) {
							// Usar el nombre del fee en lugar del ID
							$fee_name = $fee_visa->name; // Asume que el nombre del fee está en el campo 'name'
							$fee_edit_link = "index.php?module=Veta_TiposVisa&action=EditView&record={$fee_visa->id}";
						
						// Generar un mensaje HTML con el nombre del fee y el link al registro para edición
						$messages .= "<div class='alert alert-warning' style='width:100%;font-size:15px;'>
										The fee with name <strong>{$fee_name}</strong> does not have the Process Type field set. 
										<a href='{$fee_edit_link}' target='_blank'>Click here to edit it</a>.
									  </div>";

						// También puedes agregar un log para depuración
						error_log("The fee with name {$fee_name} does not have the process_type_c field set.");

						// Marcar la variable de control para deshabilitar el botón
						$disable_button = true;
					}
				}
			}

			// Si hay mensajes, agregar el título "Important" y mostrarlos en el DetailView
			if (!empty($messages)) {
				echo "<div class='alert alert-danger' style='width:100%;font-size:18px;'>
						<strong>Important: You need to make this update to be allowed to edit this Billing </strong>" .$messages. 
					  "</div>" ;
			}

			// Si es necesario deshabilitar el botón, generar un script de JavaScript para cambiar su apariencia
			if ($disable_button) {
				echo "<script>
						var buttonsToDisable = [
							'edit_button', 
							'doc_plantillas_opportunities_select_button', 
							'doc_documentos_adic_opportunities_create_button'
						];
						
						// Deshabilitar botones
						buttonsToDisable.forEach(function(buttonId) {
							var button = document.getElementById(buttonId);
							if (button) {
								button.disabled = true;
								button.style.backgroundColor = '#d3d3d3';  // Cambiar el color de fondo a gris
								button.style.borderColor = '#d3d3d3';     // Cambiar el color del borde a gris
								button.style.color = '#888';              // Cambiar el color del texto a un gris claro
								button.style.cursor = 'not-allowed';      // Cambiar el cursor para indicar que está deshabilitado
							}
						});

						// Deshabilitar el enlace que contiene 'Veta_ServicioCliente' en el href
						var hrefsToDisable = document.querySelectorAll('a[href*=\"Veta_ServicioCliente\"]');
						hrefsToDisable.forEach(function(link) {
							link.style.pointerEvents = 'none';  // Deshabilitar clicks en el enlace
							link.style.color = '#888';          // Cambiar el color del texto del enlace a gris
							link.style.cursor = 'not-allowed';  // Cambiar el cursor para indicar que está deshabilitado
						});
					  </script>";
			}
		}

		
		
		
		
		

        parent::display();
    }	
	
	

	public function load_semaforizacion()
	{

		switch ($this->bean->estado_semaforizacion_c) {
			case 'Verde':
				$color = '#0fcf15';
				break;
			case 'Amarillo':
				$color = '#ebb212';
				break;
			case 'Rojo':
				$color = '#d66c60';
				break;

			default:
				$color = '#0fcf15';
				break;
		}

		$this->bean->estado_semaforizacion_c = $color;


		$detalle = json_decode(htmlspecialchars_decode($this->bean->detalle_semaforizacion_c));

		if (is_null($detalle) || !count($detalle)) {
			$this->bean->detalle_semaforizacion_c = '';
			return;
		}

		$detalleDict = [
			'ticket' => 'Ticket <a href="/index.php?module=Auto_Tickets&action=DetailView&record={{id}}">{{name}}</a> pending',
            'documentos' => 'Documents without check ',
            'inmediato' => 'Immediate without contact',
            'potencial' => 'Potential without contact',
            'next' => 'Next Contact date expired',
            'abono' => '2 days after deposit without contact',
		];

		$this->bean->detalle_semaforizacion_c = '<ul>';

		foreach ($detalle as $key => $value) {
			[$detalle_item, $id] = explode('_', $key);

			$str = $detalleDict[$detalle_item];
			if ($detalle_item == 'ticket') {
				$ticket = new Auto_Tickets();
				$ticket->retrieve($id);
				$str = str_replace('{{name}}', $ticket->name, str_replace('{{id}}', $ticket->id, $str));
			}

			$this->bean->detalle_semaforizacion_c .= "<li>$str</li>";
		}

		$this->bean->detalle_semaforizacion_c .= '</ul>';


		// "<div style='width: 20px;height: 20px;background: $color;border-radius: 50%;margin: auto;'></div>";
	}
	private function load_lead()
    {
        //$this->bean->leads_opportunities_1leads_ida->email1;

		$lead = new Lead();
		$lead->retrieve($this->bean->leads_opportunities_1leads_ida);		
		
        $this->bean->virtual_lead_email_c = $lead->email1;
		$this->bean->virtual_lead_phone_c = $lead->phone_mobile;
		
		$campaign = new Campaign;
		$campaign->retrieve($lead->campaign_id_c);
		$this->bean->campaign_name = $campaign->name;
		$this->bean->lead_source = $lead->lead_source;
		
		//$this->bean->virtual_visa_exp_date_c = $lead->fecha_expiracion_visa_c.".";
		$this->bean->lead_visa_expiration_date_c = substr($lead->fecha_expiracion_visa_c, 0, 10);
		
		
		
        
    }

    private function load_info()
    {
        $query = "
SELECT DISTINCT veta_requerimiento.id,
				veta_requerimiento.name,
				veta_requerimiento.secondary_aplicant_name,
				veta_requerimiento.secondary_dob,
				veta_requerimiento_cstm.visa_expire_secondary_applicant_date_c,
				veta_requerimiento.dependent_name,
				veta_requerimiento.second_dependent_name,
				veta_requerimiento.third_dependent_name,
				veta_requerimiento_cstm.visa_expire_2nd_dependent_date_c,
				veta_requerimiento_cstm.visa_expire_1st_dependent_date_c,
				veta_requerimiento.dependent_dob,
				veta_requerimiento.second_dependent_dob,
				veta_requerimiento_cstm.third_dependent_dob_c,
				veta_requerimiento_cstm.visa_expire_3rd_dependent_date_c,
				nvc_companies.id as company_id,
				nvc_companies.name as company_name,
				nvc_companies_cstm.tas_expectation_date_c,
				nvc_companies_cstm.tas_approval_date_c,
				nvc_companies_cstm.tas_application_date_c
			FROM opportunities venta   
                LEFT JOIN veta_recibo_opportunities_c ON veta_recibo_opportunities_c.veta_recibo_opportunitiesopportunities_idb = venta.id AND veta_recibo_opportunities_c.deleted =0
                LEFT JOIN veta_requerimiento_veta_recibo_c ON veta_requerimiento_veta_recibo_c.veta_requerimiento_veta_reciboveta_recibo_idb = veta_recibo_opportunities_c.veta_recibo_opportunitiesveta_recibo_ida AND veta_requerimiento_veta_recibo_c.deleted = 0
                LEFT JOIN veta_requerimiento ON veta_requerimiento.id = veta_requerimiento_veta_recibo_c.veta_requerimiento_veta_reciboveta_requerimiento_ida AND veta_requerimiento.deleted = 0 
                LEFT JOIN veta_requerimiento_cstm ON veta_requerimiento_cstm.id_c = veta_requerimiento.id
                left join nvc_companies_veta_requerimiento_1_c on nvc_companies_veta_requerimiento_1_c.nvc_companies_veta_requerimiento_1veta_requerimiento_idb = veta_requerimiento.id
                left join nvc_companies on nvc_companies.id = nvc_companies_veta_requerimiento_1_c.nvc_companies_veta_requerimiento_1nvc_companies_ida
				left join nvc_companies_cstm on nvc_companies.id = nvc_companies_cstm.id_c
			WHERE venta.deleted = 0 AND venta.id = '" . $this->bean->id . "'";

        $result = $this->bean->db->query($query, true, "Error obteniendo informacion del requerimiento asociado a la oportunidad " . $this->bean->id);
        $row = $this->bean->db->fetchByAssoc($result);

        if ($row != null) {
            $this->bean->secondary_aplicant_name = $row['secondary_aplicant_name'];
            $this->bean->visa_expire_secondary_applic_c = $row['visa_expire_secondary_applicant_date_c'];
            $this->bean->secondary_dob = $row['secondary_dob'];

            $this->bean->dependent_name = $row['dependent_name'];
            $this->bean->second_dependent_name = $row['second_dependent_name'];
            $this->bean->third_dependent_name = $row['third_dependent_name'];
            $this->bean->visa_expire_1st_dependent_da_c = $row['visa_expire_1st_dependent_date_c'];
            $this->bean->visa_expire_2st_dependent_da_c = $row['visa_expire_2nd_dependent_date_c'];
            $this->bean->visa_expire_3st_dependent_da_c = $row['visa_expire_3rd_dependent_date_c'];
            $this->bean->dependent_dob = $row['dependent_dob'];
            $this->bean->second_dependent_dob = $row['second_dependent_dob'];
            $this->bean->third_dependent_dob_c = $row['third_dependent_dob_c'];
			
			$this->bean->virtual_requeriment_c = "<a target='_blank' href='index.php?action=DetailView&module=Veta_Requerimiento&record={$row['id']}'>".$row['name']."</a>";
			
			$this->bean->company_name = "<a target='_blank' href='index.php?action=DetailView&module=NVC_Companies&record={$row['company_id']}'>".$row['company_name']."</a>";
			
			$orgDate = $row['tas_application_date_c'];  
			$newDate = date("d/m/Y", strtotime($orgDate));  	
			$this->bean->tas_application_date_c = $newDate;
			
			$orgDate = $row['tas_expectation_date_c'];  
			$newDate = date("d/m/Y", strtotime($orgDate));  	
			$this->bean->tas_expectation_date_c = $newDate;
			
			$orgDate = $row['tas_approval_date_c'];  
			$newDate = date("d/m/Y", strtotime($orgDate));  	
			$this->bean->tas_approval_date_c = $newDate;			
			
			
			
        }
    }

    /**
     * Carga informaciòn del requerimiento asociado a la oportunidad
     */
    private function load_requerimiento_info()
    {
        $q = "SELECT v.fecha_req1,
        v.fecha_exp_req1,
        v.fecha_req2,
        v.fecha_exp_req2,
        v.fecha_req3,
        v.fecha_exp_req3,
        vc.fecha_response_req1_c,
        vc.fecha_response_req2_c,
        vc.fecha_response_req3_c
        FROM vetacrm2.veta_visa_opportunities_c vo
        JOIN veta_visa v ON vo.veta_visa_opportunitiesveta_visa_idb = v.id
        JOIN veta_visa_cstm vc ON vo.veta_visa_opportunitiesveta_visa_idb = vc.id_c
        WHERE vo.veta_visa_opportunitiesopportunities_ida = '" . $this->bean->id . "'";


        $result = $this->bean->db->query($q, true, "Error obteniendo informacion del requerimiento asociado a la oportunidad " . $this->bean->id);
        $row = $this->bean->db->fetchByAssoc($result);

        if ($row != null) {
            /*$this->bean->fecha_req1_c = $row['fecha_req1'];
            $this->bean->fecha_exp_req1_c = $row['fecha_exp_req1'];
            $this->bean->fecha_response_req1_c = $row['fecha_response_req1_c'];

            $this->bean->fecha_req2_c = $row['fecha_req2'];
            $this->bean->fecha_exp_req2_c = $row['fecha_exp_req2'];
            $this->bean->fecha_response_req2_c = $row['fecha_response_req2_c'];

            $this->bean->fecha_req3_c = $row['fecha_req3'];
            $this->bean->fecha_exp_req3_c = $row['fecha_exp_req3'];
            $this->bean->fecha_response_req3_c = $row['fecha_response_req3_c'];
			*/
        }
    }

    private function load_observations()
    {
        $q = "SELECT * FROM notes where (parent_type,parent_id) in (
            SELECT module_name,module_id FROM (SELECT 
                    o.id,'veta_recibo' as module_name,ro.veta_recibo_opportunitiesveta_recibo_ida as module_id
                    FROM opportunities o
                    LEFT JOIN veta_recibo_opportunities_c ro on ro.veta_recibo_opportunitiesopportunities_idb = o.id
            UNION
            SELECT 
                    o.id,'veta_presupuesto' as module_name,rp.veta_recibo_veta_presupuestoveta_presupuesto_ida as module_id
                    FROM opportunities o
                    LEFT JOIN veta_recibo_opportunities_c ro on ro.veta_recibo_opportunitiesopportunities_idb = o.id
                    LEFT JOIN veta_recibo_veta_presupuesto_c rp on rp.veta_recibo_veta_presupuestoveta_recibo_idb = ro.veta_recibo_opportunitiesveta_recibo_ida
            UNION
            SELECT 
                    o.id,'veta_requerimiento' as module_name,rqr.veta_requerimiento_veta_reciboveta_requerimiento_ida as module_id
                    FROM opportunities o
                    LEFT JOIN veta_recibo_opportunities_c ro on ro.veta_recibo_opportunitiesopportunities_idb = o.id
                    LEFT JOIN veta_requerimiento_veta_recibo_c rqr on rqr.veta_requerimiento_veta_reciboveta_recibo_idb = ro.veta_recibo_opportunitiesveta_recibo_ida
            UNION
            SELECT 
                    o.id,'veta_serviciocliente' as module_name,so.veta_serviciocliente_opportunitiesveta_serviciocliente_idb as module_id
                    FROM opportunities o
                    LEFT JOIN veta_serviciocliente_opportunities_c so on so.veta_serviciocliente_opportunitiesopportunities_ida = o.id
            UNION
            SELECT 
                    o.id,'veta_visa' as module_name,vo.veta_visa_opportunitiesveta_visa_idb as module_id
                    FROM opportunities o
                    LEFT JOIN veta_visa_opportunities_c vo on vo.veta_visa_opportunitiesopportunities_ida = o.id
                    ) a
            WHERE a.id = '" . $this->bean->id . "' AND description <> '' AND module_id is not null)
            ORDER BY date_entered DESC";

        $result = $this->bean->db->query($q, true, "Error obteniendo informacion del presupuesto asociado al proceso de venta " . $this->bean->id);

        $res = [
            "Veta_Recibo" => '',
            "Veta_Presupuesto" => '',
            "Veta_Requerimiento" => '',
            "Veta_ServicioCliente" => '',
            "Veta_Visa" => '',
            "Veta_PagoColegio" => '',
            "Veta_Loo" => ''
        ];

        while ($row  = $this->bean->db->fetchByAssoc($result)) {
            $user = new User();
            $user->retrieve($row['assigned_user_id']);
            $res[$row['parent_type']] .= $row["date_entered"] . "\t$user->first_name $user->last_name:\t" . $row['description'] . "\n";
        }



        $this->bean->requirement_description_c = $res['Veta_Requerimiento'];
        $this->bean->budget_description_c = $res['Veta_Presupuesto'];
        $this->bean->billingstatement_description_c = $res['Veta_Recibo'];
        $this->bean->customerservice_description_c = $res['Veta_ServicioCliente'];
        $this->bean->visa_description_c = $res['Veta_Visa'];
        $this->bean->pagocolegios_description_c = $res['Veta_PagoColegio'];
    }
}
