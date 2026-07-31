let addRequired = (field) => {
    if ($(`[field="${field.name}"]`).parent().find('.label>.required').length == 0) {
        let requiredSpan = $('<span/>', {
            class: 'required',
            html: '*'
        })[0]

        $(`[field="${field.name}"]`).parent().find('.label')[0].append(requiredSpan);
    }
}

let removeRequired = (field) => {
    $(`[field="${field.name}"]`).parent().find('.label>.required').remove();
}

let hideField = (field) => {
    $(`[field="${field.name}"]`).parent().addClass('hidden');
}

let showField = (field) => {
    $(`[field="${field.name}"]`).parent().removeClass('hidden');
}

function setupDependentFields(checkboxId, fields) {
    function updateFields() {
        if ($(`#${checkboxId}`).is(":checked")) {
            fields.forEach(field => {
                showField(field);
                addRequired(field);
            });
        } else {
            fields.forEach(field => {
                hideField(field);
                removeRequired(field);
                $(`#${field.name}`).val(''); // Limpia el valor del campo
            });
        }
    }

    $(`#${checkboxId}`).on('change', updateFields);
    updateFields();
}


let secondaryApplicantFields = [
    {
        "name": "visa_expire_secondary_applicant_date_c",
        "type": "date",
        "label": "Visa expire Secondary Applicant date"
    },
    {
        "name": "secondary_aplicant_name",
        "type": "text",
        "label": "Secondary Applicant Name"
    },
    {
        "name": "secondary_dob",
        "type": "date",
        "label": "Secondary DOB"
    }
];

let firstDependentFields = [
    {
        "name": "dependent_name",
        "type": "text",
        "label": "Dependent Name"
    },
    {
        "name": "visa_expire_1st_dependent_date_c",
        "type": "date",
        "label": "Visa Expire 1st Dependent Date"
    },
    {
        "name": "dependent_dob",
        "type": "date",
        "label": "Dependent DOB"
    }
];

let secondDependentFields = [
    {
        "name": "second_dependent_name",
        "type": "text",
        "label": "Second Dependent Name"
    },
    {
        "name": "visa_expire_2nd_dependent_date_c",
        "type": "date",
        "label": "Visa Expire 2nd Dependent Date"
    },
    {
        "name": "second_dependent_dob",
        "type": "date",
        "label": "Second Dependent DOB"
    }
];

let thirdDependentFields = [
    {
        "name": "third_dependent_name",
        "type": "text",
        "label": "Third Dependent Name"
    },
    {
        "name": "visa_expire_3rd_dependent_date_c",
        "type": "date",
        "label": "Visa Expire 3rd Dependent Date"
    },
    {
        "name": "third_dependent_dob_c",
        "type": "date",
        "label": "Third Dependent DOB"
    }
];

let fourthDependentFields = [
    {
        "name": "fourth_dependent_name_c",
        "type": "text",
        "label": "Fourth Dependent Name"
    },
    {
        "name": "visa_expire_4th_dependent_date_c",
        "type": "date",
        "label": "Visa Expire 4th Dependent Date"
    },
    {
        "name": "fourth_dependent_dob_c",
        "type": "date",
        "label": "Fourth Dependent DOB"
    }
];

setTimeout(() => {
    setupDependentFields('secondary_applicant_c', secondaryApplicantFields);
    setupDependentFields('first_dependent_c', firstDependentFields);
    setupDependentFields('secondary_dependent_c', secondDependentFields);
    setupDependentFields('third_dependent_c', thirdDependentFields);
	setupDependentFields('fourth_dependent_c', fourthDependentFields);
}, 100);

