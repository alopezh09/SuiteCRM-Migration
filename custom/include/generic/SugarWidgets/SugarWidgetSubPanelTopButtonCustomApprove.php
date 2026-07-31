<?php

if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}

require_once('include/generic/SugarWidgets/SugarWidgetSubPanelTopButton.php');

class SugarWidgetSubPanelTopButtonCustomApprove extends SugarWidgetSubPanelTopButton
{    
    public function display($defines, $additionalFormFields = null, $nonbutton = false)
    {
        $moduleName = $defines['module'];
        $subpanelName = $defines['subpanel_definition']->name;
        
        $html =  "<input type='button' name='Approve_Documents_Selected' id='approve_documents_selected_$subpanelName' class='button' title='Approve Documents Selected' value='Approve Documents Selected' />";
        $html .= "
		<script>
        $('#approve_documents_selected_$subpanelName').click(function (event) {
            event.preventDefault();
            let checkboxes = $('#subpanel_$subpanelName .change_status_c_checkbox');
            let reload = false;

            checkboxes.each(function (index) {
                const nameAttr = $(this).attr('name').split('_');
                const id = nameAttr[nameAttr.length - 1];
                const isChecked = !!$(this).is(':checked');
                const val = $(`#document_comment_c_\${id} `).val();
                
                if (isChecked) {
                    $.ajaxSetup({async:false});
                    reload = true
                    $.get('/approve_check_list.php', { id: id, module: '$moduleName', comment: val }, function (responseText) {
                    });
                }

                if (index === (checkboxes.length - 1) && reload){
                    $.ajaxSetup({async:true});
                    
                    location.reload()
                }
                
            })
        });
        
        
		</script>";
        return $html;
    }
}
