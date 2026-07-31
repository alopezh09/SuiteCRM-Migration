<?php
$hook_version = 1;
$hook_array = Array();

$hook_array['process_record'] = Array();
$hook_array['process_record'][] = Array(1, 'Muestra campos de solo lectura', 'modules/Veta_Visa/Veta_VisaHooks.php', 'Veta_VisaHooks', 'procesar');

$hook_array['before_save'][] = Array(1,'Create Note','modules/Veta_Visa/Veta_VisaHooks.php','Veta_VisaHooks','create_note_pre');
$hook_array['after_save'][] = Array(1,'Create Note','modules/Veta_Visa/Veta_VisaHooks.php','Veta_VisaHooks','create_note_post');
$hook_array['after_save'][] = Array(1,'Post Sale','modules/Veta_Visa/Veta_VisaHooks.php','Veta_VisaHooks','create_post_sale_requeriment');

?>
