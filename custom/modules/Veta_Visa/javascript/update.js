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
    //$(`#fecha_aplicacion_date`).on('change', actualizar_estado_aplicada);
    $(`#fecha_aplicacion_trigger`).click(actualizar_estado_aplicada);

}, 100);

setTimeout(() => {
    $(`#fecha_otorgada_trigger`).click(actualizar_estado_otorgada);

}, 100);

setTimeout(() => {
    $(`#rejected_date_c_trigger`).click(actualizar_estado_rechazado);

}, 100);

function actualizar_estado_aplicada() {

    var name = $("#fecha_aplicacion_date").val();
    console.log(name);

    //assigned_user_name
    //SuperUser SuitCRM		
    $('#estado').val('Visa_Aplicada');
    $("#estado option[value=Visa_Aplicada]").attr('selected', 'selected');
    $('#estado').css('pointer-events', 'none');

}

function actualizar_estado_otorgada() {


    var name = $("#fecha_otorgada_date").val();
    console.log(name);

    //assigned_user_name
    //SuperUser SuitCRM		
    $('#estado').val('Visa_Otorgada');
    $("#estado option[value=Visa_Otorgada]").attr('selected', 'selected');
    $('#estado').css('pointer-events', 'none');

}

function actualizar_estado_rechazado() {


    var name = $("#rejected_date_c").val();
    console.log(name);

    //assigned_user_name
    //SuperUser SuitCRM		
    $('#estado').val('Visa_Negada');
    $("#estado option[value=Visa_Negada]").attr('selected', 'selected');
    $('#estado').css('pointer-events', 'none');

}

let addRequired = (field) => {
    if ($(`[field="${field.name}"]`).parent().find('.label>.required').length == 0) {
        addToValidateCallback('EditView', field.name, field.type, true, field.label, () => !!$(`#${field.name}`).val());
        let requiredSpan = $('<span/>', {
            class: 'required',
            html: '*'
        })[0]
        $(`[field="${field.name}"]`).parent().find('.label')[0].append(requiredSpan);
    }
}

let removeRequired = (field) => {
    if (!$(`[field="${field.name}"]`).length) return;
    removeFromValidate('EditView', field.name);
    $(`[field="${field.name}"]`).parent().find('.label>.required').remove();
}

function conditionalRequireByDate(name, fieldArr) {
    console.log(name, fieldArr);

    function check() {
        if ($(`#${name}`).val()) {
            fieldArr.forEach(field => {
                addRequired(field);
            });
            return;
        }

        fieldArr.forEach(field => {
            removeRequired(field);
        });
    }

    check();

    $(`#${name}`).on('change', check)
    $(`#${name}`).on('click', () => {
        setTimeout(
            () => {
                $(`#${name}_div_t .calcell.selectable`).on('click', () => {
                    fieldArr.forEach(field => {
                        addRequired(field);
                    });
                })
            }, 100)
    })

    $(`#${name}_date`).on('change', check)
    $(`#${name}_trigger`).on('click', () => {
        setTimeout(
            () => {
                $(`#${name}_trigger_div_t .calcell.selectable`).on('click', () => {
                    fieldArr.forEach(field => {
                        addRequired(field);
                    });
                })
            }, 100)
    })
}


setTimeout(() => {
    // let grantedDateField =

    conditionalRequireByDate('fecha_otorgada', [{
        "name": "fecha_expiracion",
        "type": "datetime",
        "label": "Expiration Date"
    }]);

    for (let i = 1; i <= 3; i++) {
        conditionalRequireByDate(`fecha_req${i}`, [{
            "name": `rfi_name_${i}_c`,
            "type": "enum",
            "label": `RFI Name ${i}`
        }, {
            "name": `rfi_${i}_types_c`,
            "type": "enum",
            "label": `RFI ${i} Types`
        }, {
            "name": `fecha_exp_req${i}`,
            "type": "datetime",
            "label": `RFI ${i} Deadline Date`
        }, {
            "name": `fecha_req${i}`,
            "type": "datetime",
            "label": `RFI ${i} Received Date`
        }]);
    }

    for (let i = 4; i <= 5; i++) {
        conditionalRequireByDate(`fecha_req${i}_c`, [{
            "name": `rfi_name_${i}_c`,
            "type": "enum",
            "label": `RFI Name ${i}`
        }, {
            "name": `rfi_${i}_types_c`,
            "type": "enum",
            "label": `RFI ${i} Types`
        }, {
            "name": `fecha_exp_req${i}_c`,
            "type": "datetime",
            "label": `RFI ${i} Deadline Date`
        }, {
            "name": `fecha_req${i}_c`,
            "type": "datetime",
            "label": `RFI ${i} Received Date`
        }]);
    }


    for (let i = 1; i <= 3; i++) {
        conditionalRequireByDate(`fecha_exp_req${i}`, [{
            "name": `rfi_name_${i}_c`,
            "type": "enum",
            "label": `RFI Name ${i}`
        }, {
            "name": `rfi_${i}_types_c`,
            "type": "enum",
            "label": `RFI ${i} Types`
        }, {
            "name": `fecha_exp_req${i}`,
            "type": "datetime",
            "label": `RFI ${i} Deadline Date`
        }, {
            "name": `fecha_req${i}`,
            "type": "datetime",
            "label": `RFI ${i} Received Date`
        }]);
    }

    for (let i = 4; i <= 5; i++) {
        conditionalRequireByDate(`fecha_exp_req${i}_c`, [{
            "name": `rfi_name_${i}_c`,
            "type": "enum",
            "label": `RFI Name ${i}`
        }, {
            "name": `rfi_${i}_types_c`,
            "type": "enum",
            "label": `RFI ${i} Types`
        }, {
            "name": `fecha_exp_req${i}_c`,
            "type": "datetime",
            "label": `RFI ${i} Deadline Date`
        }, {
            "name": `fecha_req${i}_c`,
            "type": "datetime",
            "label": `RFI ${i} Received Date`
        }]);
    }

    for (let i = 1; i <= 3; i++) {
        conditionalRequireByDate(`rfi_name_${i}_c`, [{
            "name": `rfi_name_${i}_c`,
            "type": "enum",
            "label": `RFI Name ${i}`
        }, {
            "name": `rfi_${i}_types_c`,
            "type": "enum",
            "label": `RFI ${i} Types`
        }, {
            "name": `fecha_exp_req${i}`,
            "type": "datetime",
            "label": `RFI ${i} Deadline Date`
        }, {
            "name": `fecha_req${i}`,
            "type": "datetime",
            "label": `RFI ${i} Received Date`
        }]);
    }

    for (let i = 4; i <= 5; i++) {
        conditionalRequireByDate(`rfi_name_${i}_c`, [{
            "name": `rfi_name_${i}_c`,
            "type": "enum",
            "label": `RFI Name ${i}`
        }, {
            "name": `rfi_${i}_types_c`,
            "type": "enum",
            "label": `RFI ${i} Types`
        }, {
            "name": `fecha_exp_req${i}_c`,
            "type": "datetime",
            "label": `RFI ${i} Deadline Date`
        }, {
            "name": `fecha_req${i}_c`,
            "type": "datetime",
            "label": `RFI ${i} Received Date`
        }]);
    }

    for (let i = 1; i <= 3; i++) {
        conditionalRequireByDate(`rfi_${i}_types_c`, [{
            "name": `rfi_name_${i}_c`,
            "type": "enum",
            "label": `RFI Name ${i}`
        }, {
            "name": `rfi_${i}_types_c`,
            "type": "enum",
            "label": `RFI ${i} Types`
        }, {
            "name": `fecha_exp_req${i}`,
            "type": "datetime",
            "label": `RFI ${i} Deadline Date`
        }, {
            "name": `fecha_req${i}`,
            "type": "datetime",
            "label": `RFI ${i} Received Date`
        }]);
    }

    for (let i = 4; i <= 5; i++) {
        conditionalRequireByDate(`rfi_${i}_types_c`, [{
            "name": `rfi_name_${i}_c`,
            "type": "enum",
            "label": `RFI Name ${i}`
        }, {
            "name": `rfi_${i}_types_c`,
            "type": "enum",
            "label": `RFI ${i} Types`
        }, {
            "name": `fecha_exp_req${i}_c`,
            "type": "datetime",
            "label": `RFI ${i} Deadline Date`
        }, {
            "name": `fecha_req${i}_c`,
            "type": "datetime",
            "label": `RFI ${i} Received Date`
        }]);
    }

    function checkgrantedDate() {

        if ($(`#estado`).val() == 'Visa_Aplicada') {


            addRequired({
                "name": "visa_value_c",
                "type": "varchar",
                "label": "Valor real visa",
                "required": true
            });

            setTimeout(() => {
                const id = $(`[name="record"]`).val()
                $.ajax({
                    url: `/index.php?module=Veta_Visa&action=is_dama&record=${id}`,
                    method: "GET",
                    contentType: "application/json",
                    success: function (data) {
                        console.log(data, !!+data);
                        if (!!+data && false) {

                            addRequired({
                                "name": "dama_trn_c",
                                "type": "enum",
                                "label": "DAMA TRN",
                                "required": true
                            });
                        }
                    },
                    error: function (errMsg) {
                        alert(JSON.stringify(errMsg));
                    }
                });
            }, 500);
            return;
        } else {

            removeRequired({
                "name": "visa_value_c",
                "type": "varchar",
                "label": "Valor real visa",
                "required": true
            });

            removeRequired({
                "name": "dama_trn_c",
                "type": "enum",
                "label": "DAMA TRN",
                "required": true
            });
        }

    }


    checkgrantedDate();
    $(`#estado`).on('change', checkgrantedDate)

}, 500)