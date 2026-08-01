<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
$hook_version = 1;
$hook_array = array();
$hook_array['before_save'][] = array(1, 'Create Note', 'modules/Veta_Presupuesto/Veta_PresupuestoHooks.php', 'Veta_PresupuestoHooks', 'create_note_pre');
$hook_array['after_save'][] = array(1, 'Create Note', 'modules/Veta_Presupuesto/Veta_PresupuestoHooks.php', 'Veta_PresupuestoHooks', 'create_note_post');
