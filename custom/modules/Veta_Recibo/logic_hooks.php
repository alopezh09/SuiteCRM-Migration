<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
$hook_version = 1;
$hook_array = array();
// position, file, function
$hook_array['before_save'] = [];
$hook_array['after_save'] = [];

$hook_array['before_save'][] = array(1, 'Create Note', 'custom/modules/Veta_Recibo/Veta_ReciboHooks.php', 'Veta_ReciboHooks', 'create_note_pre');
$hook_array['after_save'][] = array(1, 'Create Note', 'custom/modules/Veta_Recibo/Veta_ReciboHooks.php', 'Veta_ReciboHooks', 'create_note_post');
$hook_array['after_save'][] = array(1, 'Validate Transferred Billing', 'custom/modules/Veta_Recibo/Veta_ReciboHooks.php', 'Veta_ReciboHooks', 'validate_transferred_billing');
