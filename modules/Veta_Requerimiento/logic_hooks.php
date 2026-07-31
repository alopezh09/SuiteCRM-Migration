<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will
// be automatically rebuilt in the future.
$hook_version = 1;
$hook_array = Array();
// position, file, function
$hook_array['before_save'] = Array();
$hook_array['after_retrieve'] = Array();
$hook_array['process_record'] = Array();
$hook_array['after_ui_frame'] = Array();
$hook_array['process_record'][] = Array(1, 'Muestra campos de solo lectura', 'modules/Veta_Requerimiento/Veta_RequerimientoHooks.php', 'Veta_RequerimientoHooks', 'procesar');


$hook_array['process_record'][] = Array(1, 'addTotalRequirement', 'modules/Veta_Requerimiento/Veta_RequerimientoHooks.php','addTotalRequirement', 'stepOne');
$hook_array['after_ui_frame'][] = Array(1, 'addTotalRequirement', 'modules/Veta_Requerimiento/Veta_RequerimientoHooks.php','addTotalRequirement', 'stepTwo');
$hook_array['after_retrieve'][] = Array(1, 'Muestra campos de solo lectura', 'modules/Veta_Requerimiento/Veta_RequerimientoHooks.php', 'Veta_RequerimientoHooks', 'procesar');

?>
