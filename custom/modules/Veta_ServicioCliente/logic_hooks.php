<?php

$hook_version = 1;
$hook_array = Array();

$hook_array['process_record'] = Array();
$hook_array['process_record'][] = Array(1, 'Muestra campos de solo lectura', 'modules/Veta_ServicioCliente/Veta_ServicioClienteHooks.php', 'Veta_ServicioClienteHooks', 'procesar');

$hook_array['before_save'][] = Array(1,'Create Note','modules/Veta_ServicioCliente/Veta_ServicioClienteHooks.php','Veta_ServicioClienteHooks','create_note_pre');
$hook_array['after_save'][] = Array(1,'Create Note','modules/Veta_ServicioCliente/Veta_ServicioClienteHooks.php','Veta_ServicioClienteHooks','create_note_post');

?>
