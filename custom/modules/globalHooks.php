<?php
class GlobalHooks
{
	function updateCacheWhatsapp($focus)
	{
		global $current_user;
		if ($current_user->id === 'd4d57357-a02e-7157-9357-5f60016daaca') return;
		if ($focus->module_name !== 'Leads' && $focus->module_name !== 'Users' && $focus->module_name !== 'Veta_Requerimiento') return;

		if ($focus->module_name == 'Veta_Requerimiento') {
			if ($focus->fetched_row['assigned_user_id'] == $focus->assigned_user_id)
				return;
		}


		$url = 'http://localhost:6060/cache/update';
		$additional_headers = array(
			'Accept: application/json',
			'Content-Type: application/json'
		);

		$data = ['module' => $focus->module_name == 'Veta_Requerimiento' ? 'Leads' : $focus->module_name];

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $additional_headers);

		$server_output = curl_exec($ch);
		logerror($server_output);

		// logerror($server_output);
	}
}
