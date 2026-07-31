<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1;
$hook_array = Array();
$hook_array['before_save'] = Array();

$hook_array['before_save'][] = Array(1,'Set Name','custom/modules/Veta_Profile/Veta_ProfileHooks.php','Veta_ProfileHooks','set_name');
$hook_array['after_save'] = Array();

$hook_array['after_save'][] = Array(1,'Set Relationship','custom/modules/Veta_Profile/Veta_ProfileHooks.php','Veta_ProfileHooks','set_relationship');

?>