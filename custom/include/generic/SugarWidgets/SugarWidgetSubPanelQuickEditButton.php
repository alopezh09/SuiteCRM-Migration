<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');


class SugarWidgetSubPanelQuickEditButton extends SugarWidgetField
{
    function displayList($layout_def)
	{
		global $app_strings;
        global $subpanel_item_count;
		$return_module = $_REQUEST['module'];
		$return_id = $_REQUEST['record']; 
		$module_name = $layout_def['module'];
		$record_id = $layout_def['fields']['ID'];
		$subpanel = $layout_def['subpanel_id'];
        $unique_id = $layout_def['subpanel_id']."_form_".$subpanel_item_count; //bug 51512
		
		// @see SugarWidgetSubPanelTopButtonQuickCreate::get_subpanel_relationship_name()
		$relationship_name = '';
		if (!empty($layout_def['linked_field'])) {
			$relationship_name = $layout_def['linked_field'];
			$bean = BeanFactory::getBean($layout_def['module']);
			if (!empty($bean->field_defs[$relationship_name]['relationship'])) {
				$relationship_name = $bean->field_defs[$relationship_name]['relationship'];
			}
		}

		
		$subpanel = $layout_def['subpanel_id'];
		if (isset($layout_def['linked_field_set']) && !empty($layout_def['linked_field_set'])) {
			$linked_field= $layout_def['linked_field_set'] ;
		} else {
			$linked_field = $layout_def['linked_field'];
		}
		

		$html = '
		<form onsubmit="return SUGAR.subpanelUtils.sendAndRetrieve(this.id, \'subpanel_'.$subpanel.'\', \'Loading ...\');" action="index.php" method="post" name="form" id="'.$unique_id.'">
		<input type="hidden" name="record" value="'.$record_id.'">
		<input type="hidden" name="target_module" value="'.$module_name.'">
		<input type="hidden" name="tpl" value="QuickCreate.tpl">
		<input type="hidden" name="return_module" value="'.$return_module.'">
		<input type="hidden" name="return_action" value="SubPanelViewer">
		<input type="hidden" name="return_id" value="'.$return_id.'">
		<input type="hidden" name="return_relationship" value="'.$relationship_name.'">
		<input type="hidden" name="action" value="SubpanelCreates">
		<input type="hidden" name="module" value="Home">
		<input type="hidden" name="target_action" value="QuickCreate">
		<input type="hidden" name="return_name" value="XXXX">
		<input type="hidden" name="parent_type" value="'.$return_module.'">
		<input type="hidden" name="parent_name" value="XXXX">
		<input type="hidden" name="parent_id" value="'.$return_id.'">
		<input title="Quick Edit" accesskey="N" class="button" type="submit" name="projects_opportunities_create_button" id="projects_opportunities_create_button" value="Quick Edit">
		</form>';
		
				
		return $html;

	}
	

}

