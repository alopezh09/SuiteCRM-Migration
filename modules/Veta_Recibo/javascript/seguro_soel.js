// CREADO POR SOEL PARA INTERACTUAR CON EL SEGURO EN EL RECIBO Y EN LA CUENTA DE COBRO

YAHOO.util.Event.onDOMReady(function () {

    // Establecemos el valor por defecto
    $("#soel_asegurador option").filter(function() {
        return $(this).text() == document.getElementById('asegurador').value;
    }).attr('selected', true);

    $("#seguro").attr('readonly', 'readonly');
    $("input[name='Veta_Recibo_subpanel_full_form_button']").hide();
    YAHOO.util.Event.addListener('soel_asegurador', 'change', actualizar_seguro);
    YAHOO.util.Event.addListener('duracion', 'change', actualizar_seguro);
    YAHOO.util.Event.addListener('tipo_seguro', 'change', actualizar_seguro);
    
    YAHOO.util.Event.addListener('additional_cost_company_amount_c', 'change', update_addtional_MMMfees_applicant);
    YAHOO.util.Event.addListener('additional_cost_applicant_amount_c', 'change', update_addtional_MMMfees_company);
    YAHOO.util.Event.addListener('additional_company_department_fees_amount_c', 'change', update_addtional_department_applicant);
    YAHOO.util.Event.addListener('additional_applicant_department_fees_amount__c', 'change', update_addtional_department_company);
    

    //console.log('Valor por defecto 2' ,   document.getElementById('soel_asegurador').value ,  document.getElementById('asegurador').value);


});

function actualizar_seguro() {

    var asegurador = $("#soel_asegurador option:selected").text();
    asegurador = encodeURIComponent(asegurador);
    var duracion = document.getElementById('duracion').value;
    var tipo = document.getElementById('tipo_seguro').value;

    if (asegurador != '' && duracion != '') {

        $("input[name='Veta_Recibo_subpanel_save_button']").hide();

        //var url = window.location.protocol + '//' + window.location.hostname + '/index.php?entryPoint=obtenerseguro&asegurador=' + asegurador + '&duracion=' + duracion + '&tipo=' + tipo;


        document.getElementById('asegurador').value = $("#soel_asegurador option:selected").text();

        var url = window.location.protocol + '//' + window.location.hostname + window.location.pathname + '?entryPoint=obtenerseguro&asegurador=' + asegurador + '&duracion=' + duracion + '&tipo=' + tipo;
        var req = new XMLHttpRequest();

        req.open('GET', url, false);
        req.send(null);

        if (req.status == 200) {

            try {
                var result = JSON.parse(req.responseText);
                document.getElementById('seguro').value = result;
                $("input[name='Veta_Recibo_subpanel_save_button']").show();

            } catch (e) {
                $("input[name='Veta_Recibo_subpanel_save_button']").hide();
                window.alert('Imposible conectarse al servidor para obtener el valor del seguro ');
            }
        }
    }
}

function update_addtional_MMMfees_applicant() {
	    
    var fee = parseFloat(document.getElementById('additional_cost_company_amount_c').value);  
    var signo ="";

    //if (fee != '' && fee != 0) {        
		if (fee > 0) {
			signo = "-";
		}
		
		try {                
			document.getElementById('additional_cost_applicant_amount_c').value = signo + document.getElementById('additional_cost_company_amount_c').value.replace('-', '');                

		} catch (e) {                
			window.alert('Please insert a valid amount in Additional Company MMM fee Amount ');
		}        
		
    //}
}

function update_addtional_MMMfees_company() {
	    
    var fee = parseFloat(document.getElementById('additional_cost_applicant_amount_c').value);  
    var signo ="";

    //if (fee != '' && fee != 0) {        
		if (fee > 0) {
			signo = "-";
		}
		
		try {                
			document.getElementById('additional_cost_company_amount_c').value = signo + document.getElementById('additional_cost_applicant_amount_c').value.replace('-', '');

		} catch (e) {                
			window.alert('Please insert a valid amount in Additional Applicant MMM fee Amount ');
		}        
		
    //}
}

function update_addtional_department_company() {
	    
    var fee = parseFloat(document.getElementById('additional_applicant_department_fees_amount__c').value);  
    var signo ="";

    //if (fee != '' && fee != 0) {        
		if (fee > 0) {
			signo = "-";
		}
		
		try {                
			document.getElementById('additional_company_department_fees_amount_c').value = signo + document.getElementById('additional_applicant_department_fees_amount__c').value.replace('-', '');

			//parseFloat(str.replace(',','.').replace(' ',''))
			

		} catch (e) {                
			window.alert('Please insert a valid amount in Additional Company Department fee Amount ');
		}        
		
    //}
}

function update_addtional_department_applicant() {
	    
    var fee = parseFloat(document.getElementById('additional_company_department_fees_amount_c').value);  
    var signo ="";

    //if (fee != '' && fee != 0) {        
		if (fee > 0) {
			signo = "-";
		}
		
		try {                
			document.getElementById('additional_applicant_department_fees_amount__c').value = signo + document.getElementById('additional_company_department_fees_amount_c').value.replace('-', '');                

		} catch (e) {                
			window.alert('Please insert a valid amount in Additional Company MMM fee Amount ');
		}        
		
    //}
}


