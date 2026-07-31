<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['after_save'] = Array(); 
$hook_array['after_save'][] = Array(10, 'Save email case updates', 'modules/AOP_Case_Updates/CaseUpdatesHook.php','CaseUpdatesHook', 'saveEmailUpdate');
//$hook_array['after_save'][] = Array(10, 'Save sent date for checklist', 'custom/modules/Emails/VETAEmailsHook.php','VETAEmailsHook', 'save_sent_date');  
$hook_array['after_save'][] = Array(10, 'Save email case updates', 'custom/modules/Emails/VETAEmailsHook.php','VETAEmailsHook', 'post_save'); 

$hook_array['process_record'] = Array(); 

$hook_array['process_record'][] = Array(10, 'Save email case updates', 'custom/modules/Emails/VETAEmailsHook.php','VETAEmailsHook', 'process'); 

?>