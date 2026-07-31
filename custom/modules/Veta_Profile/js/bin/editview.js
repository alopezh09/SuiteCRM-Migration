let addRequired = (field) => {
    if ($(`[field="${field.name}"]`).parent().find('.label>.required').length == 0) {
        addToValidateCallback('form_SubpanelQuickCreate_Veta_Profile', field.name, field.type, true, field.label, () => !!$(`#${field.name}`).val());
        let requiredSpan = $('<span/>', {
            class: 'required',
            html: '*'
        })[0];
        $(`[field="${field.name}"]`).parent().find('.label')[0].append(requiredSpan);
    }
};
let removeRequired = (field) => {
    if (!$(`[field="${field.name}"]`).length)
        return;
    removeFromValidate('form_SubpanelQuickCreate_Veta_Profile', field.name);
    $(`[field="${field.name}"]`).parent().find('.label>.required').remove();
};
let hide = (field) => {
    $(`[field="${field.name}"]`).parent().addClass('hidden');
};
let show = (field) => {
    $(`[field="${field.name}"]`).parent().removeClass('hidden');
};
let initForm = (formData) => {
    let fieldNames = Object.keys(formData);
    let fields2Hide = fieldNames.slice(4);
    let fields2Show = fieldNames.slice(0, 4);
    // let fields2Show = fields2Hide.slice(0, 2);
    console.log(fields2Show);
    fieldNames.forEach((fieldName) => {
        let rawVal = $(`#${fieldName}`).val();
        let val = rawVal + '';
        if (Array.isArray(rawVal)) {
            val = `[[${rawVal[0]}]]`;
        }
        else if (formData[fieldName].field.type == 'bool') {
            val = $(`#${fieldName}`)[0]['checked'] + '';
        }
        if (formData[fieldName].dynamics) {
            let fields = formData[fieldName].dynamics[val];
            if (formData[fieldName].dynamics[val]) {
                fields2Show = [].concat.apply(formData[fieldName].dynamics[val], fields2Show);
                fields2Hide = fields2Hide.filter(el => {
                    return fields.indexOf(el) === -1;
                });
            }
        }
    });
    fields2Hide.forEach(fieldName => {
        if (formData[fieldName].field.required) {
            removeRequired(formData[fieldName].field);
        }
        hide(formData[fieldName].field);
    });
    fields2Show.forEach(fieldName => {
        console.log(fieldName);
        if (formData[fieldName].field.required) {
            addRequired(formData[fieldName].field);
        }
        show(formData[fieldName].field);
    });
};
let watchForm = (formData) => {
    let fieldNames = Object.keys(formData);
    fieldNames.forEach((fieldName, idx) => {
        if (formData[fieldName].dynamics) {
            $(`#${fieldName}`).on('change', function () {
                initForm(formData);
            });
        }
    });
};
let formReq = {
    "subclass": {
        "field": {
            "name": "subclass",
            "type": "enum",
            "label": "English test",
            "required": true
        },
        "dynamics": {
            // '485': ['q_1', 'q_2', 'q_3', 'q_4', 'q_5', 'q_6'],
            '407': ['q_1', 'q_9', 'q_10', 'q_11'],
            // '186': ['q_1', 'q_11', 'q_13', 'q_14', 'q_15', 'q_19'],
            '801': ['q_20', 'q_25'],
            '820': ['q_20', 'q_21', 'q_22', 'q_23', 'q_24'],
            '491': ['q_1'],
            '189': ['q_1'],
            '190': ['q_1'],
            '494': ['q_1', 'q_13', 'q_14', 'q_15', 'q_18'],
            '482': ['q_1', 'q_11', 'q_12', 'q_13', 'q_14', 'q_15', 'q_16', 'q_17'],
            "143": ["q_1", "q_2", "q_3", "q_4", "q_5", "q_6", "q_7", "q_8", "q_9", "q_10", "q_11", "q_12", "q_13", "q_14", "q_15", "q_16", "q_17", "q_18", "q_19", "q_20", "q_21", "q_22", "q_23", "q_24", "q_25"],
            "155": ["q_1", "q_2", "q_3", "q_4", "q_5", "q_6", "q_7", "q_8", "q_9", "q_10", "q_11", "q_12", "q_13", "q_14", "q_15", "q_16", "q_17", "q_18", "q_19", "q_20", "q_21", "q_22", "q_23", "q_24", "q_25"],
            "309": ["q_1", "q_2", "q_3", "q_4", "q_5", "q_6", "q_7", "q_8", "q_9", "q_10", "q_11", "q_12", "q_13", "q_14", "q_15", "q_16", "q_17", "q_18", "q_19", "q_20", "q_21", "q_22", "q_23", "q_24", "q_25"],
            "400": ["q_1", "q_2", "q_3", "q_4", "q_5", "q_6", "q_7", "q_8", "q_9", "q_10", "q_11", "q_12", "q_13", "q_14", "q_15", "q_16", "q_17", "q_18", "q_19", "q_20", "q_21", "q_22", "q_23", "q_24", "q_25"],
            "408": ["q_1", "q_2", "q_3", "q_4", "q_5", "q_6", "q_7", "q_8", "q_9", "q_10", "q_11", "q_12", "q_13", "q_14", "q_15", "q_16", "q_17", "q_18", "q_19", "q_20", "q_21", "q_22", "q_23", "q_24", "q_25"],
            "417": ["q_1", "q_2", "q_3", "q_4", "q_5", "q_6", "q_7", "q_8", "q_9", "q_10", "q_11", "q_12", "q_13", "q_14", "q_15", "q_16", "q_17", "q_18", "q_19", "q_20", "q_21", "q_22", "q_23", "q_24", "q_25"],
            "461": ["q_1", "q_2", "q_3", "q_4", "q_5", "q_6", "q_7", "q_8", "q_9", "q_10", "q_11", "q_12", "q_13", "q_14", "q_15", "q_16", "q_17", "q_18", "q_19", "q_20", "q_21", "q_22", "q_23", "q_24", "q_25"],
            "500": ["q_1", "q_2", "q_3", "q_4", "q_5", "q_6", "q_7", "q_8", "q_9", "q_10", "q_11", "q_12", "q_13", "q_14", "q_15", "q_16", "q_17", "q_18", "q_19", "q_20", "q_21", "q_22", "q_23", "q_24", "q_25"],
            "590": ["q_1", "q_2", "q_3", "q_4", "q_5", "q_6", "q_7", "q_8", "q_9", "q_10", "q_11", "q_12", "q_13", "q_14", "q_15", "q_16", "q_17", "q_18", "q_19", "q_20", "q_21", "q_22", "q_23", "q_24", "q_25"],
            "600": ["q_1", "q_2", "q_3", "q_4", "q_5", "q_6", "q_7", "q_8", "q_9", "q_10", "q_11", "q_12", "q_13", "q_14", "q_15", "q_16", "q_17", "q_18", "q_19", "q_20", "q_21", "q_22", "q_23", "q_24", "q_25"],
            "601": ["q_1", "q_2", "q_3", "q_4", "q_5", "q_6", "q_7", "q_8", "q_9", "q_10", "q_11", "q_12", "q_13", "q_14", "q_15", "q_16", "q_17", "q_18", "q_19", "q_20", "q_21", "q_22", "q_23", "q_24", "q_25"],
            "602": ["q_1", "q_2", "q_3", "q_4", "q_5", "q_6", "q_7", "q_8", "q_9", "q_10", "q_11", "q_12", "q_13", "q_14", "q_15", "q_16", "q_17", "q_18", "q_19", "q_20", "q_21", "q_22", "q_23", "q_24", "q_25"],
            "804": ["q_1", "q_2", "q_3", "q_4", "q_5", "q_6", "q_7", "q_8", "q_9", "q_10", "q_11", "q_12", "q_13", "q_14", "q_15", "q_16", "q_17", "q_18", "q_19", "q_20", "q_21", "q_22", "q_23", "q_24", "q_25"],
            "AASW": ["q_1", "q_2", "q_3", "q_4", "q_5", "q_6", "q_7", "q_8", "q_9", "q_10", "q_11", "q_12", "q_13", "q_14", "q_15", "q_16", "q_17", "q_18", "q_19", "q_20", "q_21", "q_22", "q_23", "q_24", "q_25"],
            "BVB": ["q_1", "q_2", "q_3", "q_4", "q_5", "q_6", "q_7", "q_8", "q_9", "q_10", "q_11", "q_12", "q_13", "q_14", "q_15", "q_16", "q_17", "q_18", "q_19", "q_20", "q_21", "q_22", "q_23", "q_24", "q_25"],
            "Skill_Assessment": ["q_1", "q_2", "q_3", "q_4", "q_5", "q_6", "q_7", "q_8", "q_9", "q_10", "q_11", "q_12", "q_13", "q_14", "q_15", "q_16", "q_17", "q_18", "q_19", "q_20", "q_21", "q_22", "q_23", "q_24", "q_25"],
            "Australian_Citizenship": ["q_1", "q_2", "q_3", "q_4", "q_5", "q_6", "q_7", "q_8", "q_9", "q_10", "q_11", "q_12", "q_13", "q_14", "q_15", "q_16", "q_17", "q_18", "q_19", "q_20", "q_21", "q_22", "q_23", "q_24", "q_25"],
            "Submission": ["q_1", "q_2", "q_3", "q_4", "q_5", "q_6", "q_7", "q_8", "q_9", "q_10", "q_11", "q_12", "q_13", "q_14", "q_15", "q_16", "q_17", "q_18", "q_19", "q_20", "q_21", "q_22", "q_23", "q_24", "q_25"],
            "BVE": ["q_1", "q_2", "q_3", "q_4", "q_5", "q_6", "q_7", "q_8", "q_9", "q_10", "q_11", "q_12", "q_13", "q_14", "q_15", "q_16", "q_17", "q_18", "q_19", "q_20", "q_21", "q_22", "q_23", "q_24", "q_25"],
            "8101_Waiver_Application": ["q_1", "q_2", "q_3", "q_4", "q_5", "q_6", "q_7", "q_8", "q_9", "q_10", "q_11", "q_12", "q_13", "q_14", "q_15", "q_16", "q_17", "q_18", "q_19", "q_20", "q_21", "q_22", "q_23", "q_24", "q_25"],
            "RFI": ["q_1", "q_2", "q_3", "q_4", "q_5", "q_6", "q_7", "q_8", "q_9", "q_10", "q_11", "q_12", "q_13", "q_14", "q_15", "q_16", "q_17", "q_18", "q_19", "q_20", "q_21", "q_22", "q_23", "q_24", "q_25"],
            "": ["q_1", "q_2", "q_3", "q_4", "q_5", "q_6", "q_7", "q_8", "q_9", "q_10", "q_11", "q_12", "q_13", "q_14", "q_15", "q_16", "q_17", "q_18", "q_19", "q_20", "q_21", "q_22", "q_23", "q_24", "q_25"],
        }
    },
    "q_7": {
        "field": {
            "name": "q_7",
            "type": "enum",
            "label": "Do you have previous criminal history in your home country or in Australia ?",
            "required": true
        },
        "dynamics": {
            "yes": [
                "q_7_1",
            ]
        }
    },
    "q_8": {
        "field": {
            "name": "q_8",
            "type": "enum",
            "label": "Do you have any medical problem?",
            "required": true
        },
        "dynamics": {
            "yes": [
                "q_8_1",
            ]
        }
    },
    "visa_type": {
        "field": {
            "name": "visa_type",
            "type": "enum",
            "label": "Visa Type",
            "required": true
        },
        "dynamics": {
            '485_GW': ['q_1', 'q_2', 'q_3', 'q_4', 'q_5', 'q_6'],
            '485_PSW': ['q_1', 'q_2', 'q_6'],
            '186_DE': ['q_1', 'q_11', 'q_13', 'q_14', 'q_15'],
            '186_TRT': ['q_1', 'q_13', 'q_14', 'q_15', 'q_17', 'q_19'],
        }
    },
    "q_1": {
        "field": {
            "name": "q_1",
            "type": "enum",
            "label": "English test",
            "required": true
        },
        "dynamics": {
            "IELTS": [
                "q_1_1",
                "q_1_2",
                "q_1_3",
                "q_1_4"
            ],
            "PTE_Academic": [
                "q_1_1",
                "q_1_2",
                "q_1_3",
                "q_1_4"
            ]
        }
    },
    "q_9": {
        "field": {
            "name": "q_9",
            "type": "enum",
            "label": "Does company already have TAS",
            "required": true
        },
        "dynamics": {
            "yes": [
                "q_9_1",
            ]
        }
    },
    "q_19": {
        "field": {
            "name": "q_19",
            "type": "enum",
            "label": "Check any leave without pay (except for covid related stand down or reduced hours) Do you have any?",
            "required": true
        },
        "dynamics": {
            "yes": [
                "q_19_1",
            ]
        }
    },
    "q_20": {
        "field": {
            "name": "q_20",
            "type": "enum",
            "label": "Do your Australian Sponsor have previous criminal history in his/her home country or in Australia ?",
            "required": true
        },
        "dynamics": {
            "yes": [
                "q_20_1",
            ]
        }
    },
    "q_2": {
        "field": {
            "name": "q_2",
            "type": "number",
            "label": "Meets Australian Study Requirement criteria",
            "required": true
        }
    },
    "q_3": {
        "field": {
            "name": "q_3",
            "type": "number",
            "label": "Home Country Studies",
            "required": true
        }
    },
    "q_4": {
        "field": {
            "name": "q_4",
            "type": "number",
            "label": "Australian Studies",
            "required": true
        }
    },
    "q_5": {
        "field": {
            "name": "q_5",
            "type": "number",
            "label": "Must check on CRICOS that course is at least 96 weeks or more",
            "required": true
        }
    },
    "q_6": {
        "field": {
            "name": "q_6",
            "type": "number",
            "label": "Do you hold a 500 visa or have held a 500 visa within the last 6 months ?",
            "required": true
        }
    },
    "q_10": {
        "field": {
            "name": "q_10",
            "type": "number",
            "label": "How many moths do the you have of experience?",
            "required": true
        }
    },
    "q_11": {
        "field": {
            "name": "q_11",
            "type": "number",
            "label": "Are you s48 banned?",
            "required": true
        }
    },
    "q_21": {
        "field": {
            "name": "q_21",
            "type": "number",
            "label": "Has the Australian partner sponsored in the last 5 years or ever before?",
            "required": true
        }
    },
    "q_22": {
        "field": {
            "name": "q_22",
            "type": "number",
            "label": "Has the sponsor been sponsored by another partner for their own partner visa in the past?",
            "required": true
        }
    },
    "q_23": {
        "field": {
            "name": "q_23",
            "type": "number",
            "label": "Are the couple living together currently (and being able to show evidence) and have been in last 12 months or do they have a relationship certificate? ",
            "required": true
        }
    },
    "q_24": {
        "field": {
            "name": "q_24",
            "type": "number",
            "label": "How long have you been living together?",
            "required": true
        }
    },
    "q_25": {
        "field": {
            "name": "q_25",
            "type": "number",
            "label": "Have the couple been living together since original 820 application?",
            "required": true
        }
    },
    "q_18": {
        "field": {
            "name": "q_18",
            "type": "number",
            "label": "Does company already have SBS?",
            "required": true
        }
    },
    "q_12": {
        "field": {
            "name": "q_12",
            "type": "number",
            "label": "Does Company already have Standard Business Sponsorship?  ",
            "required": true
        }
    },
    "q_13": {
        "field": {
            "name": "q_13",
            "type": "number",
            "label": "Company may be sole trader or Pty Ltd or trust ",
            "required": true
        }
    },
    "q_14": {
        "field": {
            "name": "q_14",
            "type": "number",
            "label": "Company must pay SAF - Training Contribution fee ",
            "required": true
        }
    },
    "q_15": {
        "field": {
            "name": "q_15",
            "type": "number",
            "label": "Have you been working for the same company for 2 years",
            "required": true
        }
    },
    "q_16": {
        "field": {
            "name": "q_16",
            "type": "number",
            "label": "How long have you been working in this occupation for?",
            "required": true
        }
    },
    "q_17": {
        "field": {
            "name": "q_17",
            "type": "number",
            "label": "Applicant needs a Skill Assessment",
            "required": true
        }
    },
    "q_1_1": {
        "field": {
            "name": "q_1_1",
            "type": "number",
            "label": "Speaking",
            "required": true
        }
    },
    "q_1_2": {
        "field": {
            "name": "q_1_2",
            "type": "number",
            "label": "Listening",
            "required": true
        }
    },
    "q_1_3": {
        "field": {
            "name": "q_1_3",
            "type": "number",
            "label": "Reading",
            "required": true
        }
    },
    "q_1_4": {
        "field": {
            "name": "q_1_4",
            "type": "number",
            "label": "Writing",
            "required": true
        }
    },
    "q_7_1": {
        "field": {
            "name": "q_7_1",
            "type": "text",
            "label": "Detail",
            "required": true
        }
    },
    "q_8_1": {
        "field": {
            "name": "q_8_1",
            "type": "text",
            "label": "Detail",
            "required": true
        }
    },
    "q_9_1": {
        "field": {
            "name": "q_9_1",
            "type": "date",
            "label": "TAS Expiration date",
            "required": true
        }
    },
    "q_19_1": {
        "field": {
            "name": "q_19_1",
            "type": "text",
            "label": "how long for?",
            "required": true
        }
    },
    "q_20_1": {
        "field": {
            "name": "q_20_1",
            "type": "text",
            "label": "Detail",
            "required": true
        }
    },
};
let form = JSON.parse(JSON.stringify(formReq));
form = Object.keys(form)
    .map(key => {
    form[key]['field']['required'] = false;
    return form[key];
})
    .reduce((obj, val) => {
    obj[val['field']['name']] = val;
    return obj;
}, {});
console.log("cargo");
setTimeout(() => {
    function checkProbableClosingDate() {
        Object.keys(form).forEach(key => {
            form[key]['field']['required'] = false;
            removeRequired(form[key]['field']);
        });
        initForm(form);
        // $(".hide_field").each(function () {
        // 	$(this).parent().parent().addClass('hidden');
        // })
        // if ($('#detailpanel_0 .tab-content .row.edit-view-row').children(':visible').length === 0) {
        // 	$('#detailpanel_0').addClass('hidden');
        // }
        // if ($('#detailpanel_1 .tab-content .row.edit-view-row').children(':visible').length === 0) {
        // 	$('#detailpanel_1').addClass('hidden');
        // }
        watchForm(form);
    }
    checkProbableClosingDate();
    $(`#estado`).on('change', checkProbableClosingDate);
}, 1000);
// $('#detailpanel_0 .tab-content .row.edit-view-row').children(':visible').length
