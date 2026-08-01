<?php

class Veta_ServicioClienteViewDetail extends ViewDetail
{
    public function __construct()
    {
        parent::__construct();
    }

    public function display()
    {
		
		
		$o = new Opportunity();
		$o->retrieve($this->bean->veta_serviciocliente_opportunitiesopportunities_ida);
		
		if(isset($o) and ($o->id != '')){
			$r = new Veta_Recibo();
			$r->retrieve($o->veta_recibo_opportunitiesveta_recibo_ida);

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
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
        load_notes($this->bean, 'Veta_ServicioCliente', 'virtual_all_notes');
        parent::display();
    }
}
