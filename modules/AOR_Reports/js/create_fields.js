let createForm = (formDef) => {
    let form = new FormData();
    form.append('module', 'ModuleBuilder');
    form.append('action', 'saveField');
    form.append('to_pdf', 'true');
    form.append('view_module', formDef.module_name);
    form.append('view_package', formDef.package_name);
    form.append('is_update', 'false');
    form.append('type', formDef.type);
    form.append('name', formDef.name);
    form.append('labelValue', formDef.labelValue);
    form.append('label', `LBL_${formDef.name.toUpperCase()}`);
    form.append('help', '');
    form.append('comments', '');
    form.append('inline_edit', '');
    form.append('audited', '1');
    form.append('inline_edit', '1');
    form.append('importable', 'true');
    form.append('duplicate_merge', '0');
    if (formDef.list_name) {
        form.append('options', formDef.list_name);
    }
    return form;
};
let sendForm = (form) => new Promise((resolve, rej) => {
    $.ajax({
        url: '/index.php?to_pdf=1&sugar_body_only=1',
        data: form,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function (data) {
            resolve(data);
        },
        error: function (error) {
            console.error(error);
            rej(error);
        }
    });
});
let runPromises = async (data) => {
    console.log("creando campos",data)
    for (let i = 0; i < data.length; i++) {
        const element = data[i];
        try {
            await sendForm(createForm(element));
            console.log(`Guardo ${element.name} ${i + 1}/${data.length}`);
        }
        catch (e) {
            console.log(`Fallo ${element.name}`);
            console.error(e);
        }
    }
};
let data = [];
$.ajax({
    url: '/modules/AOR_Reports/json/fields.json',
    dataType: 'json',
    async: false,
    data: {},
    success: function (d) {
        data = d;
        runPromises(data);
    }
});
