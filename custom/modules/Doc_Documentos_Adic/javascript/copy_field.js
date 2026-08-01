let addRequired = (field) => {

    if ($(`[field="${field.name}"]`).parent().find('.label>.required').length == 0) {
        let a = addToValidateCallback('form_SubpanelQuickCreate_Doc_Documentos_Adic', field.name, field.type, true, field.label, () => !!$(`#${field.name}`).val());
        //console.log(a);
        let requiredSpan = $('<span/>', {
            class: 'required',
            html: '*'
        })[0]

        $(`[field="${field.name}"]`).parent().find('.label')[0].append(requiredSpan);
    }
}


let removeRequired = (field) => {
    //console.log("Function de remover los campos requeridos");

    removeFromValidate('form_SubpanelQuickCreate_Doc_Documentos_Adic', field.name);

    $(`[field="${field.name}"]`).parent().find('.label>.required').remove();
}



let hideField = (field) => {
    $(`[field="${field.name}"]`).parent().addClass('hidden');
}

let showField = (field) => {
    $(`[field="${field.name}"]`).parent().removeClass('hidden')
}

let expiracionField = {
    "name": "new_expiration_date_c",
    "type": "date",
    "label": "New Visa Expiration Date"
};

let grantedField = {
    "name": "granted_date_c",
    "type": "date",
    "label": "Granted Date"
};

let applicationField = {
    "name": "visa_application_date_c",
    "type": "date",
    "label": "Visa Application Date"
};

let upload_fileField = {
    "name": "uploadfile",
    "type": "file",
    "label": "Upload File"
};

let fecha_req1_Field = {
    "name": "rfi_received_date_c",
    "type": "date",
    "label": "RFI Date"
};

let fecha_exp_req1_Field = {
    "name": "rfi_deadline_date_c",
    "type": "date",
    "label": "RFI Expiration Date"
};


let rfi_name_1_Field = {
    "name": "rfi_name_c",
    "type": "text",
    "label": "RFI Name"
};

let rfi_1_types_Field = {
    "name": "rfi_type_c",
    "type": "text",
    "label": "RFI Type"
};

let expectation_date_Field = {
    "name": "expectation_date_c",
    "type": "text",
    "label": "Expectation Date"
};


let visa_trn_Field = {
    "name": "visa_trn_c",
    "type": "text",
    "label": "Visa TRN"
};

let nomination_trn_Field = {
    "name": "nomination_trn_c",
    "type": "text",
    "label": "Nomination TRN"
};

let checklist_Field = {
    "name": "checklist_c",
    "type": "text",
    "label": "Associate to Checklist"
};






setTimeout(() => {
    console.log('cpy_fld')
    hideField(expiracionField);
    hideField(grantedField);
    hideField(applicationField);
	hideField(fecha_req1_Field);
	hideField(fecha_exp_req1_Field);
	hideField(rfi_name_1_Field);
	hideField(rfi_1_types_Field);	
	hideField(expectation_date_Field);	
	hideField(visa_trn_Field);	
	hideField(nomination_trn_Field);		
	
	removeRequired(expiracionField);
	removeRequired(grantedField);
	removeRequired(applicationField);
	removeRequired(fecha_req1_Field);
	removeRequired(fecha_exp_req1_Field);
	removeRequired(rfi_name_1_Field);
	removeRequired(rfi_1_types_Field);
	removeRequired(expectation_date_Field);
	removeRequired(visa_trn_Field);
	removeRequired(nomination_trn_Field);	

    // removeRequired(upload_fileField);

    $(`#estado_de_visa_c`).on('change', check_visa);
    $(`#estado_de_visa_c`).on('change', actualizar_estado);

}, 200);




function check_visa() {
    //console.log("ENTRO", $("#estado_de_visa_c").val());
    $("#requested_to_c option[value='']").attr("selected", true);
    // addRequired(upload_fileField);
    if ($("#estado_de_visa_c").val() === 'Visa_Granted_Letter') {

        addRequired(grantedField);
        showField(grantedField);
        addRequired(expiracionField);
        showField(expiracionField);

        //$('#requested_to_c option[value="Applicant"]');
        $("#requested_to_c").val("Applicant");
		$("#estadodocumento").val("Aprobado");
        // $("#requested_to_c option[value='Applicant']").attr("selected", true);

    } else {

        removeRequired(grantedField);
        hideField(grantedField);
        removeRequired(expiracionField);
        hideField(expiracionField);
    }

    if ($("#estado_de_visa_c").val() === 'Visa_Application_Acknowledgement_Letter') {

        addRequired(applicationField);
        showField(applicationField);
		
		//addRequired(visa_trn_Field);
        showField(visa_trn_Field);
		
		
        //console.log("antes Entro", $("#requested_to_c option").val());
        $("#requested_to_c").val("Applicant");
		$("#estadodocumento").val("Aprobado");

        // $("#requested_to_c option[value='Applicant']").attr("selected", true);
        //console.log("Entro", $("#requested_to_c option").val());


    } else {

        removeRequired(applicationField);
        hideField(applicationField);
		
		removeRequired(visa_trn_Field);
        hideField(visa_trn_Field);

    }
	
	

    if ($("#estado_de_visa_c").val() === 'New_Additional_Doc') {
        
        $("#requested_to_c").val(undefined);
		showField(checklist_Field);		
    } else {
		removeRequired(checklist_Field);
        hideField(checklist_Field);
	}
	if ($("#estado_de_visa_c").val() === 'LMT_Lodged') {
        
        $("#requested_to_c").val("Company");
		$("#estadodocumento").val("Aprobado");
    }
	
	if (
		($("#estado_de_visa_c").val() === 'Nomination_Lodged') || 
		($("#estado_de_visa_c").val() === 'Nomination_Approved') ||
		($("#estado_de_visa_c").val() === 'SBS_Lodged') ||
		($("#estado_de_visa_c").val() === 'SBS_Approved') ||
		($("#estado_de_visa_c").val() === 'TAS_Lodged') ||
		($("#estado_de_visa_c").val() === 'TAS_Approved') ||
		
		
		($("#estado_de_visa_c").val() === 'Labor_Agreement_Lodged') ||
		($("#estado_de_visa_c").val() === 'Labor_Agreement_Approved') ||
		($("#estado_de_visa_c").val() === 'Endorsement_Lodged') ||
		($("#estado_de_visa_c").val() === 'Endorsement_Approved') ||
		
		
		($("#estado_de_visa_c").val() === 'RCB_Lodged') ||
		($("#estado_de_visa_c").val() === 'RCB_Approved')
		){
        
        $("#requested_to_c").val("Company");
		$("#estadodocumento").val("Aprobado");
    }
	
	if (
		($("#estado_de_visa_c").val() === 'Nomination_Lodged') ||
		($("#estado_de_visa_c").val() === 'SBS_Lodged') ||
		($("#estado_de_visa_c").val() === 'TAS_Lodged') ||		
		
		($("#estado_de_visa_c").val() === 'Labor_Agreement_Lodged') ||		
		($("#estado_de_visa_c").val() === 'Endorsement_Lodged') ||		
		
		($("#estado_de_visa_c").val() === 'State_Nomination_Lodged') ||
		($("#estado_de_visa_c").val() === 'Skill_Assessment_Lodged') ||
		($("#estado_de_visa_c").val() === 'EOI_Lodged') ||
		($("#estado_de_visa_c").val() === 'EOI_2_Lodged') ||
		($("#estado_de_visa_c").val() === 'EOI_3_Lodged') ||
		($("#estado_de_visa_c").val() === 'RCB_Lodged') || 
		($("#estado_de_visa_c").val() === 'ROI_Lodged') 		
		){
			
		$("#estadodocumento").val("Aprobado");

        addRequired(expectation_date_Field);
        showField(expectation_date_Field);        
    } else {
        removeRequired(expectation_date_Field);
        hideField(expectation_date_Field);
    }
	
	
	if ($("#estado_de_visa_c").val() === 'Nomination_Lodged') {		
		
        showField(nomination_trn_Field);

    } else {
        
		removeRequired(nomination_trn_Field);
        hideField(nomination_trn_Field);

    }
	

			
			
			
			
	
	if (($("#estado_de_visa_c").val() === 'Skill_Assessment_Lodged') || ($("#estado_de_visa_c").val() === 'Skill_Assessment_Approved')) {
        
        $("#requested_to_c").val("Applicant");
		$("#estadodocumento").val("Aprobado");
    }
	
	
	if (($("#estado_de_visa_c").val() === 'RFI_1') || ($("#estado_de_visa_c").val() === 'RFI_2') || ($("#estado_de_visa_c").val() === 'RFI_3') || ($("#estado_de_visa_c").val() === 'RFI_4') || ($("#estado_de_visa_c").val() === 'RFI_5')) {

		console.log("Entro RFI 1", $("#estado_de_visa_c").val());
		
        addRequired(fecha_req1_Field);
        showField(fecha_req1_Field);
        addRequired(fecha_exp_req1_Field);
        showField(fecha_exp_req1_Field);
		
		addRequired(rfi_name_1_Field);
        showField(rfi_name_1_Field);
		
		addRequired(rfi_1_types_Field);
        showField(rfi_1_types_Field);
		
		
        
        //$("#requested_to_c").val("Applicant");
        

    } else {

        removeRequired(fecha_req1_Field);
        hideField(fecha_req1_Field);
        removeRequired(fecha_exp_req1_Field);
        hideField(fecha_exp_req1_Field);
		
		removeRequired(rfi_name_1_Field);
        hideField(rfi_name_1_Field);
		
		removeRequired(rfi_1_types_Field);
        hideField(rfi_1_types_Field);
		
    }




}








function actualizar_estado() {

    var name = $("#estado_de_visa_c option:selected").text();
    //console.log(name);	

    if (name != '') {

        if (($('form#form_SubpanelQuickCreate_Doc_Documentos_Adic #estado_de_visa_c').val() != "New_Additional_Doc") && ($('form#form_SubpanelQuickCreate_Doc_Documentos_Adic #estado_de_visa_c').val() != "New_RFI_Document")){
			
            document.getElementById("name").disabled = true;
            $("form#form_SubpanelQuickCreate_Doc_Documentos_Adic #name").prop("disabled", true);            
            if ($('form#form_SubpanelQuickCreate_Doc_Documentos_Adic #estado_de_visa_c').val().indexOf('LOO') > - 1) {
                $('form#form_SubpanelQuickCreate_Doc_Documentos_Adic #description').val("Descargue el documento luego firmelo, al momento de tenerlo firmado debe ser cargado");
                $('form#form_SubpanelQuickCreate_Doc_Documentos_Adic #name').val(name);
            } else {
                $('form#form_SubpanelQuickCreate_Doc_Documentos_Adic #description').val("");
                $('form#form_SubpanelQuickCreate_Doc_Documentos_Adic #name').val(name);
            }            



            $("#internal_document_c").prop('checked', true);
            $("#restricted_document_c").prop('checked', false);
        } else {            
            $('form#form_SubpanelQuickCreate_Doc_Documentos_Adic #description').val("");            
            $("form#form_SubpanelQuickCreate_Doc_Documentos_Adic #name").prop("disabled", false);
            $("#internal_document_c").prop('checked', false);
            $("#restricted_document_c").prop('checked', false);


        }

        if ($('form#form_SubpanelQuickCreate_Doc_Documentos_Adic #estado_de_visa_c').val() == "payment_advice") {
            $("#restricted_document_c").prop('checked', true);
        }
        if ($('form#form_SubpanelQuickCreate_Doc_Documentos_Adic #estado_de_visa_c').val() == "invoice") {
            $("#restricted_document_c").prop('checked', true);
        }

        if ($('form#form_SubpanelQuickCreate_Doc_Documentos_Adic #estado_de_visa_c').val() == "OSHC_RECEIPT") {
            $("#restricted_document_c").prop('checked', true);
        }





        //document.getElementById("name").value = name;

    } else {
        $("form#form_SubpanelQuickCreate_Doc_Documentos_Adic #name").prop("disabled", false);
        $("#internal_document_c").prop('checked', false);
        $("#restricted_document_c").prop('checked', false);

    }
}