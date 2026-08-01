/*YAHOO.util.Event.onDOMReady(function() {

    // Establecemos el valor por defecto
    /*$("#soel_asegurador option").filter(function() {
        return $(this).text() == document.getElementById('asegurador').value;
    }).attr('selected', true);*/

//$("#seguro").attr('readonly', 'readonly');
//$("input[name='Veta_Recibo_subpanel_full_form_button']").hide();
//YAHOO.util.Event.addListener('estado_de_visa_c', 'change', actualizar_estado);


//console.log('Valor por defecto 2', document.getElementById('estado_de_visa_c').value);


// });
setTimeout(() => {

    $(`#department_c`).on('change', actualizar_estado);

}, 100);

function actualizar_estado() {

    var name = $("#department_c option:selected").text();
    console.log(name);	
    if (name != '') {
		document.getElementById("assigned_user_name").disabled = true;		
		$("form#form_SubpanelQuickCreate_Cases #btn_assigned_user_name").prop("disabled", true);
		$("form#form_SubpanelQuickCreate_Cases #btn_clr_assigned_user_name").prop("disabled", true);
		
		//$("form#form_SubpanelQuickCreate_Cases #name").prop("disabled", true);
		
		if($('form#form_SubpanelQuickCreate_Cases #department_c').val() == "Case_Manager"){							
			if(document.querySelector("#user_id3_c").innerText != '') {				
				$('form#form_SubpanelQuickCreate_Cases #assigned_user_name').val(document.querySelector("#user_id3_c").innerText);	
				$('form#form_SubpanelQuickCreate_Cases #assigned_user_id').val(document.querySelector("#user_id3_c").getAttribute("data-id-value"));	  
			} else {
				/*$('form#form_SubpanelQuickCreate_Cases #assigned_user_name').val('Natalia Gallego');	
				$('form#form_SubpanelQuickCreate_Cases #assigned_user_id').val('ddf7d53f-c62a-55dc-79e9-5a998da0c7ab');	
				*/
			}
		}
		
		
		if($('form#form_SubpanelQuickCreate_Cases #department_c').val() == "Admissions"){
			if($('#user_id_c').text() != '') {
				$('form#form_SubpanelQuickCreate_Cases #assigned_user_name').val($('#user_id_c').text());	
				$('form#form_SubpanelQuickCreate_Cases #assigned_user_id').val($('#user_id_c').attr("data-id-value"));	
			} else {
				$('form#form_SubpanelQuickCreate_Cases #assigned_user_name').val('Arantxa Díaz');	
				$('form#form_SubpanelQuickCreate_Cases #assigned_user_id').val('c0cf8663-e101-a79f-a745-5a94a4eeda94');	
			}
		}
		if($('form#form_SubpanelQuickCreate_Cases #department_c').val() == "Customer_Services"){						
			if($('#user_id2_c').text() != '') {

				$('form#form_SubpanelQuickCreate_Cases #assigned_user_name').val($('#user_id2_c').text());	
				$('form#form_SubpanelQuickCreate_Cases #assigned_user_id').val($('#user_id2_c').attr("data-id-value"));	
			} else {
				/*$('form#form_SubpanelQuickCreate_Cases #assigned_user_name').val('Laura Carolina Paz Porras');	
				$('form#form_SubpanelQuickCreate_Cases #assigned_user_id').val('c129127a-3441-1fe5-55a3-5e309f94849a');	
				*/
			}
		}
		if($('form#form_SubpanelQuickCreate_Cases #department_c').val() == "Sales"){						
			$('form#form_SubpanelQuickCreate_Cases #assigned_user_name').val($('#assigned_user_id').text());	
			$('form#form_SubpanelQuickCreate_Cases #assigned_user_id').val($('#assigned_user_id').attr("data-id-value"));	
		}
		if($('form#form_SubpanelQuickCreate_Cases #department_c').val() == "Visas"){	
			if($('#user_id1_c').text() != '') {
				$('form#form_SubpanelQuickCreate_Cases #assigned_user_name').val($('#user_id1_c').text());	
				$('form#form_SubpanelQuickCreate_Cases #assigned_user_id').val($('#user_id1_c').attr("data-id-value"));	   
			} else {
				/*$('form#form_SubpanelQuickCreate_Cases #assigned_user_name').val('Natalia Gallego');	
				$('form#form_SubpanelQuickCreate_Cases #assigned_user_id').val('ddf7d53f-c62a-55dc-79e9-5a998da0c7ab');	
				*/
			}
		}
		
		if($('form#form_SubpanelQuickCreate_Cases #department_c').val() == "Accounting"){						
			//$('form#form_SubpanelQuickCreate_Cases #assigned_user_name').val('Juan Sebastian Vaquiro');	
			//$('form#form_SubpanelQuickCreate_Cases #assigned_user_id').val('6e598ac4-6f1b-c209-ed61-5be362ee977e');	
			$('form#form_SubpanelQuickCreate_Cases #assigned_user_name').val('Brigitte Tatiana Bustos Tapiero');	
			$('form#form_SubpanelQuickCreate_Cases #assigned_user_id').val('ce1ca8d7-2076-6f6a-911d-636e6d17fc15');	
			
		}
		
		if($('form#form_SubpanelQuickCreate_Cases #department_c').val() == "Payments"){						
			$('form#form_SubpanelQuickCreate_Cases #assigned_user_name').val('Daniel Felipe Vargas');	
			$('form#form_SubpanelQuickCreate_Cases #assigned_user_id').val('2d52fbf1-a7f2-414b-b7c5-633ca26fd515');	
		}
		
		if($('form#form_SubpanelQuickCreate_Cases #department_c').val() == "Migration_Agent"){						
			$('form#form_SubpanelQuickCreate_Cases #assigned_user_name').val('Audrey Cikla');	
			$('form#form_SubpanelQuickCreate_Cases #assigned_user_id').val('40f17204-ab5e-b629-c728-5f8647105a78');	
		}
		
		
		
		
		
		/*
		ASIGNAR A JUAN SEBASTIAN CUANDO SEA CONTABILIDA
		*/
		
    } 
}