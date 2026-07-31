<?php

if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}

require_once('include/generic/SugarWidgets/SugarWidgetSubPanelTopButton.php');

class SugarWidgetSubPanelTopButtonCustomReject extends SugarWidgetSubPanelTopButton
{
    public function display($defines, $additionalFormFields = null, $nonbutton = false)
    {
        $moduleName = $defines['module'];
        $subpanelName = $defines['subpanel_definition']->name;
        
        $html = "<input type='button' id='reject_selected_documents_$subpanelName'  name='Reject_Selected_Documents' class='button' title='Reject Selected Documents' value='Reject Selected Documents' />";

        $html .= "
		<script>
        $('#reject_selected_documents_$subpanelName').click(function (event) {
            event.preventDefault();
            let chekboxes = $('#subpanel_$subpanelName .change_status_c_checkbox');
            let reload = false;
            chekboxes.each(function (index) {
                const nameAttr = $(this).attr('name').split('_');
                const id = nameAttr[nameAttr.length - 1];
                const isChecked = !!$(this).is(':checked');
                const val = $(`#document_comment_c_\${id} `).val();
                
                if (isChecked) {
                    $.ajaxSetup({async:false});
                    reload = true
                    $.get('/reject_doc.php', { id: id, module: '$moduleName', comment: val }, function (responseText) {
                    });
                }

                if (index === (chekboxes.length - 1) && reload){
                    $.ajaxSetup({async:true});
                    
                    location.reload()
                }
                
            })
        });
        
        
		</script>";
        return $html;
    }
}
