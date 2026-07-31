<?php

require_once 'include/MVC/View/views/view.edit.php';

class Veta_VisaViewEdit extends ViewEdit
{
    public function display()
    {
        parent::display();
		
		
		
		//error_log("hide_procesos ". print_r($_REQUEST, true) );
		//[record] => 9852e8b9-f82c-ceaa-26a5-64246840642b
		// Inicialización del array de tipos de procesos para ser llenado dinámicamente desde PHP
        $feesProcessTypes = [];
		
		// if(isset($_REQUEST['record']) and $_REQUEST['record'] == '9852e8b9-f82c-ceaa-26a5-64246840642b'){			
		if(isset($_REQUEST['record'])){			
			$bean = BeanFactory::getBean('Veta_Visa', $_REQUEST['record']);			
			
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
			
			
			$workflow = BeanFactory::getBean('Opportunities', $bean->veta_visa_opportunitiesopportunities_ida);
			if(isset($workflow)){										
				$recibo = BeanFactory::getBean('Veta_Recibo', $workflow->veta_recibo_opportunitiesveta_recibo_ida);
				if(isset($recibo)){
					/*
					$dr = $recibo->get_linked_beans('veta_detallerecibo_veta_recibo', 'Veta_DetalleRecibo');
					//$visa_subclass = $dr[0];					
					foreach( $dr as $visa_subclass ) {						
						$curso = new Veta_Curso();
						$curso->retrieve($visa_subclass->veta_curso_id_c);
						
						
						$visaSubClassName = $visa_subclass->name;

						if ((isset($curso->display_name_c)) and ($curso->display_name_c != '')) {
							$visaSubClassName = $curso->display_name_c;
						}
						
						
						$fees = $curso->get_linked_beans('veta_curso_veta_college_1', 'Veta_College');
						//$visa_subclass = $dr[0];											
                        foreach ($fees as $fee) {
                            error_log("hide_procesos FEES procesos tipo " . $fee->process_type_c);
                            //$feesProcessTypes[] = $fee->process_type_c;
							$feesProcessTypes[] = trim($fee->process_type_c); // Aseguramos que no hay espacios en los nombres
                        }
						
						
						
					}
					*/
					
					foreach ($fees_fields as $fee_field) {
						$fee_value = $recibo->$fee_field;
						
						if (!empty($fee_value)) {														
							// Buscar si ese fee tiene el campo process_type_c asignado en el módulo Veta_TiposVisa
							$fee_visa = new Veta_TiposVisa();
							$fee_visa->retrieve($fee_value);

							if (!empty($fee_visa->process_type_c)) {
								// Usar el nombre del fee o algún identificador para mostrar en el mensaje
								//$fee_name = $fee_visa->name; // Asume que el nombre del fee está en el campo 'name'																
								$feesProcessTypes[] = trim($fee_visa->process_type_c);
								
							}
						}
					}
				}
			}
			
			// Convertimos el array PHP en JSON para pasarlo a JavaScript
			$feesProcessTypesJson = json_encode($feesProcessTypes);
            $executeJavascript = true;  // Indicador para ejecutar el script JavaScript
        } else {
            $executeJavascript = false; // No ejecutar el script JavaScript
        }
		
		
        
		echo <<<EOT
<script type="text/javascript">
  function convertMultiSelectToCheckboxes(fieldId) {
  const multiSelectElement = document.getElementById(fieldId);

  if (multiSelectElement) {
    const parentDiv = multiSelectElement.parentElement;
    const options = multiSelectElement.options;
    const table = document.createElement("table");
    table.id = fieldId + "_table";
    parentDiv.appendChild(table);

    let row1 = document.createElement("tr");
    let row2 = document.createElement("tr");
    table.appendChild(row1);
    table.appendChild(row2);

    for (let i = 0; i < options.length; i++) {
      const option = options[i];
      const cell1 = document.createElement("td");
      const cell2 = document.createElement("td");
      const checkbox = document.createElement("input");
      const label = document.createElement("label");

      checkbox.type = "checkbox";
      checkbox.name = fieldId + "_checkboxes[]";
      checkbox.value = option.value;
      checkbox.checked = option.selected;
      label.innerHTML = option.text;
      label.htmlFor = option.value;

      row1.appendChild(cell1);
      row2.appendChild(cell2);
      cell1.appendChild(checkbox);
      cell2.appendChild(label);

      checkbox.addEventListener("change", function (event) {
        const optionIndex = Array.from(options).findIndex(
          (opt) => opt.value === event.target.value
        );
        options[optionIndex].selected = event.target.checked;
      });

      if ((i + 1) % 7 === 0) {
        row1 = document.createElement("tr");
        row2 = document.createElement("tr");
        table.appendChild(row1);
        table.appendChild(row2);
      }
    }

    multiSelectElement.style.display = "none";
  }
}


	function toggleProcessStageFields(fees) {
		const processFields = {
		  'EOI': 'eoi_process_stage_c',
		  'ROI': 'roi_process_stage_c',
		  'RCB': 'rcb_process_stage_c',
		  'SBS': 'sbs_process_stage_c',
		  'Skill_Assessment': 'skill_assessment_process_stage_c',
		  'Nomination': 'nomination_process_stage_c',
		  'LMT': 'lmt_process_stage_c',
		  'TAS': 'tas_process_stage_c',
		  'State_Nomination': 'state_nomination_process_stage_c',
		  'Labor_Agreement': 'labor_agreement_process_stage_c',
		  'Endorsement': 'endorsement_process_stage_c',
		  'Citizenship': 'citizenship_process_stage_c'
		};

		Object.keys(processFields).forEach(function(processType) {
		  const fieldId = processFields[processType];
		  const fieldTableElement = document.getElementById(fieldId + "_table");

		  if (fieldTableElement) {
			const fieldContainer = fieldTableElement.closest('.edit-view-row-item');
			if (fees.includes(processType)) {
			  if (fieldContainer) fieldContainer.style.display = "block";
			} else {
			  if (fieldContainer) fieldContainer.style.display = "none";
			}
		  }
	  
		});
	  }

document.addEventListener("DOMContentLoaded", function () {
  convertMultiSelectToCheckboxes("roi_process_stage_c");
  convertMultiSelectToCheckboxes("eoi_process_stage_c");
  convertMultiSelectToCheckboxes("rcb_process_stage_c");
  convertMultiSelectToCheckboxes("sbs_process_stage_c");
  convertMultiSelectToCheckboxes("skill_assessment_process_stage_c");
  convertMultiSelectToCheckboxes("nomination_process_stage_c");
  convertMultiSelectToCheckboxes("lmt_process_stage_c");
  convertMultiSelectToCheckboxes("tas_process_stage_c");
  convertMultiSelectToCheckboxes("state_nomination_process_stage_c");
  convertMultiSelectToCheckboxes("endorsement_process_stage_c");
  convertMultiSelectToCheckboxes("labor_agreement_process_stage_c");
  convertMultiSelectToCheckboxes("citizenship_process_stage_c");
EOT;
  
   // Solo agregamos este script si la condición de $_REQUEST['record'] se cumple
        if ($executeJavascript) {
            echo <<<EOT
    var feesProcessTypes = $feesProcessTypesJson;
    toggleProcessStageFields(feesProcessTypes);
EOT;
        }
		
	echo <<<EOT
});

</script>

<style>
#roi_process_stage_c_table,
#eoi_process_stage_c_table,
#rcb_process_stage_c_table,
#sbs_process_stage_c_table,
#skill_assessment_process_stage_c_table,
#nomination_process_stage_c_table,
#lmt_process_stage_c_table,
#tas_process_stage_c_table,
#labor_agreement_process_stage_c_table,
#endorsement_process_stage_c_table,
#state_nomination_process_stage_c_table,
#citizenship_process_stage_c_table,
table#_table {
  border-collapse: separate;
  border-spacing: 10px 5px;
}

#roi_process_stage_c_table td,
#eoi_process_stage_c_table td,
#rcb_process_stage_c_table td,
#sbs_process_stage_c_table td,
#skill_assessment_process_stage_c_table td,
#nomination_process_stage_c_table td,
#lmt_process_stage_c_table td,
#tas_process_stage_c_table td,
#labor_agreement_process_stage_c_table td,
#endorsement_process_stage_c_table td,
#state_nomination_process_stage_c_table td,
#citizenship_process_stage_c_table td,
table#_table td {
  text-align: center;
  vertical-align: middle;
  padding-right: 15px; /* Agrega un margen a la derecha de cada celda */
}



</style>
EOT;

		
		
		
		
		
		
		
		
    }
}
