$(document).ready(function() {
    // Función para añadir el indicador de requerido
    let addRequired = (field) => {
        // Selector específico para el campo usando atributo personalizado `field`
        let fieldSelector = $(`[field="${field}"]`).parent().find('.label');
        if (fieldSelector.find('.required').length == 0) {
            addToValidate('EditView', field, 'varchar', true, fieldSelector.text().trim());
            let requiredSpan = $('<span/>', {
                class: 'required',
                html: '*'
            });
            fieldSelector.append(requiredSpan);
        }
    };

    // Función para remover el indicador de requerido
    let removeRequired = (field) => {
        removeFromValidate('EditView', field);
        let fieldSelector = $(`[field="${field}"]`).parent().find('.label');
        fieldSelector.find('.required').remove();
    };

    // Asignar evento al checkbox 'visa_subclass_required_c'
    $('#visa_subclass_required_c').change(function() {
        if ($(this).is(':checked')) {
            addRequired('subclass_c');
        } else {
            removeRequired('subclass_c');
        }
    });

    // Estado inicial del checkbox al cargar la página
    if ($('#visa_subclass_required_c').is(':checked')) {
        addRequired('subclass_c');
    } else {
        removeRequired('subclass_c');
    }
});


