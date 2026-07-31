<?php

/**
 *
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 *
 * SuiteCRM is an extension to SugarCRM Community Edition developed by SalesAgility Ltd.
 * Copyright (C) 2011 - 2018 SalesAgility Ltd.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for technical reasons, the Appropriate Legal Notices must
 * display the words "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 */


class Doc_Documentos_Adic extends Basic
{
	public $new_schema = true;
	public $module_dir = 'Doc_Documentos_Adic';
	public $object_name = 'Doc_Documentos_Adic';
	public $table_name = 'doc_documentos_adic';
	public $importable = false;

	public $id;
	public $name;
	public $date_entered;
	public $date_modified;
	public $modified_user_id;
	public $modified_by_name;
	public $created_by;
	public $created_by_name;
	public $description;
	public $deleted;
	public $created_by_link;
	public $modified_user_link;
	public $assigned_user_id;
	public $assigned_user_name;
	public $assigned_user_link;
	public $SecurityGroups;
	public $url;
	public $fechaaprobado;
	public $estadodocumento;
	public $ayuda;
	public $solicitadopor;
	public $recursos;
	public $observaciones;
	public $fechacargado;

	public function bean_implements($interface)
	{
		switch ($interface) {
			case 'ACL':
				return true;
		}

		return false;
	}

	function save($check_notify = false)
	{
		global $current_user;
		
		$this->name = preg_replace("/[^a-zA-Z0-9-]/", " ", $this->name);
		$this->name = preg_replace("/[\s]+/", " ", $this->name);
		$this->name = trim($this->name);
		
		logerror(["estadodocumento", date('H:i:s'), $this->estadodocumento]);

		error_log("checklist " . $this->checklist_c);

		if ($this->fetched_row['checklist_c'] !== $this->checklist_c) {
			// Carga el registro del módulo 'Doc_Plantillas' utilizando el BeanFactory
			$checklistId = $this->checklist_c;

			if (!empty($checklistId)) {
				// Utiliza el BeanFactory para cargar el registro del módulo basado en el ID
				$checklistBean = BeanFactory::getBean('Doc_Plantillas', $checklistId);

				// Verifica si el bean fue cargado correctamente
				if ($checklistBean && !empty($checklistBean->id)) {
					// Asigna el nombre del checklist al campo $this->checklist_name_c
					$this->checklist_name_c = $checklistBean->name;
				} else {
					// Si no encuentra un registro, asigna un valor vacío
					$this->checklist_name_c = '';
				}
			} else {
				// Si $this->checklist_c está vacío, asigna un valor vacío a $this->checklist_name_c
				$this->checklist_name_c = '';
			}
		}


		return parent::save();
	}

	function deleteAttachment($isduplicate = "false")
	{
		if ($this->ACLAccess('edit')) {
			if ($isduplicate == "true") {
				return true;
			}
			$removeFile = "upload://{$this->id}";
		}

		if (file_exists($removeFile)) {
			if (!unlink($removeFile)) {
				$GLOBALS['log']->error("*** Could not unlink() file: [ {$removeFile} ]");
			} else {
				$this->uploadfile = '';
				$this->filename = '';
				$this->file_mime_type = '';
				$this->file = '';
				$this->save();
				return true;
			}
		} else {
			$this->uploadfile = '';
			$this->file_mime_type = '';
			$this->file = '';
			$this->save();
			return true;
		}
		return false;
	}
}
