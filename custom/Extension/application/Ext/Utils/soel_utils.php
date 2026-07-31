<?php

/**
 * @param SugarBean $bean
 * @param Email $email
 * @return Note
 */
function crear_nota(Email $email)
{

	// global $sugar_config;

	// $emailObj = new Email();
	// $path_pdf = $sugar_config['upload_dir'] . $bean->id . ".pdf";

	$note = new Note();
	$note->id = create_guid();
	$note->new_with_id = true;

	$note->parent_id = $email->id;
	$note->parent_type = $email->module_name;
	$note->name = $email->name;
	// $note->filename = "Recibo.pdf";
	// $note->file_mime_type = $emailObj->email2GetMime($path_pdf);
	// $noteFile = "{$sugar_config['upload_dir']}{$note->id}";

	// if (!copy($path_pdf, $noteFile)) {
	//     $GLOBALS['log']->debug("EMAIL 2.0: could not copy attachment file to cache/upload [ {$noteFile} ]");
	// }

	$note->save();
	return $note;
}

/**
 * @param string $to
 * @param SugarBean $bean
 * @param EmailTemplate $tEmail
 * @return Email
 */
function crear_email(SugarBean $bean, PHPMailer $mail, $crearNota = false)
{

	$admin = new Administration();
	$admin->retrieveSettings();

	$emailObj = new Email();
	$emailObj->to_addrs = implode(',', $mail->getToAddresses()[0]);

	if ($ccAddresses = $mail->getCcAddresses()) {
		$emailObj->cc_addrs = "<" . implode(">,<", array_map(function ($address) {
			return implode(',', $address);
		}, $ccAddresses)) . ">";
	}

	$emailObj->bcc_addrs = implode(',', $mail->getBccAddresses()[0]);
	$emailObj->reply_to_addr = implode(',', $mail->getReplyToAddresses()[0]);
	$emailObj->type = 'archived';
	$emailObj->deleted = '0';
	$emailObj->name = $mail->Subject;
	$emailObj->description = null;
	$emailObj->description_html = $mail->Body;
	$emailObj->from_addr = $mail->From;

	if ($bean instanceof SugarBean && !empty($bean->id)) {
		$emailObj->parent_type = $bean->module_name;
		$emailObj->parent_id = $bean->id;
	}

	$emailObj->date_sent = TimeDate::getInstance()->nowDb();
	$emailObj->modified_user_id = '1';
	$emailObj->created_by = '1';
	$emailObj->status = 'sent';
	$emailObj->automatic_c = 1;

	$emailObj->save();
	if ($crearNota) {
		crear_nota($emailObj);
	}
	return $emailObj;
}


function getChecklist()
{
	static $listvalues = null;

	if (!$listvalues) {
		$beanId = $_REQUEST['return_id'];
		$beanModule = $_REQUEST['return_module'];
		logerror("getChecklist", $_REQUEST);

		if (empty($beanId)) return [];

		global $db;

		if ($beanModule === 'Veta_Requerimiento') {
			$query = "SELECT p.id,p.name
				FROM vetacrm2.veta_requerimiento_doc_plantillas_1_c rp
				JOIN doc_plantillas p ON p.id = rp.veta_requerimiento_doc_plantillas_1doc_plantillas_idb AND p.deleted = 0
				WHERE rp.veta_requerimiento_doc_plantillas_1veta_requerimiento_ida = '$beanId' AND rp.deleted = 0";
		} elseif ($beanModule === 'Opportunities') {
			$query = "SELECT p.id,p.name
				FROM doc_plantillas_opportunities_c po
				JOIN doc_plantillas p ON p.id = po.doc_plantillas_opportunitiesdoc_plantillas_ida AND p.deleted = 0
				WHERE po.doc_plantillas_opportunitiesopportunities_idb = '$beanId' AND po.deleted = 0";
		}


		$result           = $db->query($query, false);
		$listvalues       = array();
		$listvalues[''] = '';

		while (($row = $db->fetchByAssoc($result)) != null) {
			$listvalues[$row['id']] = $row['name'];
		}
	}

	return $listvalues;
}

function soel_fprueba2($param)
{

	global $app_list_strings;
	$options = $app_list_strings['lead_source_dom'];
	return $options;
}

function logerror(...$item)
{
	$debug_export = var_export($item, true);
	LoggerManager::getLogger()->error('[VETA] ' . $debug_export);
}

function load_notes($bean, $moduleName, $fieldName)
{
	$bean->{$fieldName} = '';
	$q = "SELECT * 
            FROM notes 
            WHERE parent_type = '$moduleName' 
			AND description is not null
			AND description <> ''
            AND parent_id = '" . $bean->id . "'
            ORDER BY date_entered DESC";
	$result = $bean->db->query($q, true, "Error obteniendo notas del proceso de venta " . $bean->id);

	while ($row    = $bean->db->fetchByAssoc($result)) {
		$user = new User();
		$user->retrieve($row['created_by']);


		$bean->{$fieldName} .= $row["date_entered"] . "\t$user->first_name $user->last_name:\t" . $row['description'] . "\n";
	}

	if ($bean->description) {
		$bean->{$fieldName} .= "\n\n$bean->description";
	}
}

function getTRNs()
{
	static $listvalues = null;

	if (!$listvalues) {
		$visaId = $_REQUEST['record'];
		logerror("getTRNs", $_REQUEST);

		if (empty($visaId)) return [];

		global $db;
		$query            = "SELECT e.trn_c as id,e.trn_c as name FROM veta_visa v
		JOIN veta_visa_opportunities_c vo on vo.veta_visa_opportunitiesveta_visa_idb = v.id AND vo.deleted = 0
		JOIN veta_recibo_opportunities_c ro on ro.veta_recibo_opportunitiesopportunities_idb = vo.veta_visa_opportunitiesopportunities_ida AND ro.deleted = 0
		JOIN veta_requerimiento_veta_recibo_c rr ON rr.veta_requerimiento_veta_reciboveta_recibo_idb = ro.veta_recibo_opportunitiesveta_recibo_ida AND rr.deleted = 0
		JOIN nvc_companies_veta_requerimiento_1_c cr ON cr.nvc_companies_veta_requerimiento_1veta_requerimiento_idb = rr.veta_requerimiento_veta_reciboveta_requerimiento_ida AND cr.deleted = 0
		JOIN veta_endorsements_nvc_companies_c ec ON ec.veta_endorsements_nvc_companiesnvc_companies_ida = cr.nvc_companies_veta_requerimiento_1nvc_companies_ida AND ec.deleted = 0
		JOIN veta_endorsements_cstm e ON e.id_c = ec.veta_endorsements_nvc_companiesveta_endorsements_idb
		WHERE v.id = '$visaId'";

		logerror("getTRNs", $query);
		$result           = $db->query($query, false);
		$listvalues       = array();
		$listvalues[''] = '';

		while (($row = $db->fetchByAssoc($result)) != null) {
			$listvalues[$row['id']] = $row['name'];
		}
	}

	return $listvalues;
}
function getRegion()
{
	static $listvalues = null;

	if (!$listvalues) {

		global $db;
		$query            = "SELECT id, name  FROM util_region WHERE deleted = 0 ORDER BY name ASC ";
		$result           = $db->query($query, false);
		$listvalues       = array();
		$listvalues[''] = '';

		while (($row = $db->fetchByAssoc($result)) != null) {
			$listvalues[$row['id']] = $row['name'];
		}
	}

	return $listvalues;
}

function getAsignadoLeads()
{
	static $listvalues = null;

	if (!$listvalues) {

		global $db;
		$query            = "SELECT id,CONCAT(first_name , ' ' , last_name, ' (' ,  user_name  , ')') AS name  FROM users WHERE deleted = 0 ORDER BY name ASC ";
		$result           = $db->query($query, false);
		$listvalues       = array();
		$listvalues[''] = '';

		while (($row = $db->fetchByAssoc($result)) != null) {
			$listvalues[$row['id']] = $row['name'];
		}
	}
	return $listvalues;
}

function getCampanaLeads()
{
	static $listvalues = null;

	if (!$listvalues) {

		global $db;
		$query            = "SELECT id, name  FROM campaigns WHERE deleted = 0 ORDER BY name ASC ";
		$result           = $db->query($query, false);
		$listvalues       = array();
		$listvalues[''] = '';

		while (($row = $db->fetchByAssoc($result)) != null) {
			$listvalues[$row['id']] = $row['name'];
		}
	}
	return $listvalues;
}

function getOficinasComercial()
{
	static $listvalues = null;

	if (!$listvalues) {

		global $db;
		$query            = "SELECT DISTINCT users.address_city AS id , users.address_city AS name
                            FROM users
                            WHERE deleted = 0 AND users.address_city IS NOT NULL
                            ORDER BY users.address_city";
		$result           = $db->query($query, false);
		$listvalues       = array();
		$listvalues[''] = '';

		while (($row = $db->fetchByAssoc($result)) != null) {
			$listvalues[$row['id']] = $row['name'];
		}
	}
	return $listvalues;
}

function getAseguradores()
{
	$listvalues = null;

	if (!$listvalues) {

		global $db;
		$query            = "SELECT id, name  FROM veta_seguro WHERE deleted = 0 ORDER BY name ASC ";
		$result           = $db->query($query, false);
		$listvalues       = array();
		$listvalues[''] = '';

		while (($row = $db->fetchByAssoc($result)) != null) {
			$listvalues[$row['id']] = $row['name'];
		}
	}
	return $listvalues;
}

function getYesNoOptions()
{
	$listvalues        = array();
	$listvalues['1'] = 'Yes';
	$listvalues['0'] = 'No';

	return $listvalues;
}
