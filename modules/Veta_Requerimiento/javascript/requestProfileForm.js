let createForm = (formDef) => {
    let form = new FormData();
    form.append("target_module", "Veta_Profile");
    form.append("veta_requerimiento_id", formDef.id);
    form.append("veta_requerimiento_name", formDef.name);
    form.append("veta_requerimiento_veta_profile_name", formDef.name);
    form.append("to_pdf", "true");
    form.append("tpl", "QuickCreate.tpl");
    form.append("return_module", "Veta_Requerimiento");
    form.append("return_action", "DetailView");
    form.append("return_id", formDef.id);
    form.append("return_relationship", "veta_requerimiento_veta_profile");
    form.append("record", "");
    form.append("action", "SubpanelCreates");
    form.append("module", "Home");
    form.append("target_action", "QuickCreate");
    form.append("return_name", formDef.name);
    form.append("parent_type", "Veta_Requerimiento");
    form.append("parent_name", formDef.name);
    form.append("parent_id", formDef.id);
    form.append("veta_requerimiento_veta_profile_create_button", "Create");

    return form;
};


let sendForm = (form) => new Promise((resolve, rej) => {
    $.ajax({
        url: '/index.php',
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
    try {
        let output = await sendForm(createForm(data));
        let html = $(`<div id ="profile_form_hidden" class="hidden">${output}</div>
        <label for="Veta_Profile_subpanel_full_form_button"><a>Fill Form</a></label>`);



        let ffButton = $(`<label for="Veta_Profile_subpanel_full_form_button"> Fill Form</label>`);
        let form = html.find("#form_SubpanelQuickCreate_Veta_Profile");

        form.prepend(ffButton);

        $("#veta_profile_veta_requerimientoveta_profile_ida").append(html);
    }
    catch (e) {
        console.error(e);
    }
};

let viewForm = () => {
    const profileid = $("#veta_profile_veta_requerimientoveta_profile_ida").data('id-value');

    $.ajax({
        url: '/index.php',

        data: new URLSearchParams({
            "module": "Veta_Profile",
            "action": "DetailView",
            "record": profileid
        }).toString(),
        processData: false,
        contentType: false,
        type: 'GET',
        success: function (data) {
            appendProfileInfo(data)
        }
    });
};

let appendProfileInfo = (html) => {
    let detailView = $(html);
    let rows = detailView.find(".row.detail-view-row");

    $("#tab-content-7").append(rows);
}

setTimeout(() => {
    if (!$("#veta_profile_veta_requerimientoveta_profile_ida").text()) {

        const id = $(".favorite").attr("record_id");
        const name = $("#veta_requerimiento_leads_name").text();
        runPromises({ id, name });

    } else {
        viewForm();
    }
}, 500);
