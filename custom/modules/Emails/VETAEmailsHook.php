<?php

//require_once('modules/Opportunities/Opportunities.php');

if (!defined('sugarEntry') || !sugarEntry) {
	die('Not A Valid Entry Point');
}

class VETAEmailsHook
{

	function __construct() {}


	function post_save($bean)
	{
		global $current_user;
		// if ($current_user->id !== 'da846b07-4c23-0e40-426d-629fbca0e0c6' && $current_user->id !== 'af54b5d9-e7ce-2047-b1c5-6243340c1ab6') {
		// 	return;
		// }
		$this->relate_to_workflow($bean);

		$regex = "/\[(" . implode("|", array_keys(Auto_Tickets::$module_dict)) . ") - \d+\]/i";

		if (empty($bean->fetched_row['id'])) return;

		//revisar si tiene tag
		if ($bean->status === 'sent' && preg_match($regex, $bean->name, $matches)) {
			//get ticket
			$email = new Email();
			$email->retrieve($bean->fetched_row['id']);

			/** @var Auto_Tickets[] $tickets */
			$tickets = $email->get_linked_beans('auto_tickets_emails', 'Auto_Tickets');

			if (!count($tickets)) return;
			$ticket = $tickets[0];
			$ticket->answer();
		}
	}

	function process($bean)
	{
		global $app_list_strings;

		$email = BeanFactory::getBean('Emails', $bean->id);

		$bean->date_entered = $app_list_strings['dom_email_status'][$email->status];

		$email = BeanFactory::getBean("Emails", $bean->id);
		if ($email->automatic_c) {
			$bean->date_entered = "$bean->date_entered Automatic";
		}
		if (str_contains($email->folder_c, "outlook")) {
			$bean->date_entered = "$bean->date_entered Automatic";
		}
	}

	function relate_to_workflow($bean)
	{
		logerror("relate_emails relate_to_workflow");

		switch ($bean->parent_type) {
			case 'Veta_Recibo':
				$recibo = BeanFactory::getBean('Veta_Recibo', $bean->parent_id);

				$opporturnity = $recibo->get_linked_beans('veta_recibo_opportunities')[0];
				if (empty($opporturnity)) {
					logerror("relate_emails Veta_Recibo opporturnity");
					return;
				}

				break;

			case 'Veta_Requerimiento':
				$requerimiento = BeanFactory::getBean('Veta_Requerimiento', $bean->parent_id);

				$recibo = $requerimiento->get_linked_beans('veta_requerimiento_veta_recibo')[0];
				if (empty($recibo)) {
					logerror("relate_emails Veta_Requerimiento recibo");
					return;
				}

				$opporturnity = $recibo->get_linked_beans('veta_recibo_opportunities')[0];
				if (empty($opporturnity)) {
					logerror("relate_emails Veta_Requerimiento opporturnity");
					return;
				}

				break;
			case 'Leads':
				$leads = BeanFactory::getBean('Leads', $bean->parent_id);

				$opporturnity = $leads->get_linked_beans('leads_opportunities_1', '', 'date_entered DESC')[0];
				if (empty($opporturnity)) {
					logerror("relate_emails Leads opporturnity");
					return;
				}
				break;


			default:
				logerror("relate_emails default");

				return;
		}
		logerror("relate_emails | $opporturnity->name");

		$opporturnity->load_relationship('emails');
		$opporturnity->emails->add($bean->id);
	}

	function save_sent_date(&$bean, $event, $arguments)
	{
		global $current_user;

		error_log("EMAILS Se envio el email ");
		error_log("EMAILS REQUEST " . print_r($_REQUEST, TRUE));
		error_log("EMAILS FECHA " . date('Y-m-d H:i:s'));
		/*
		email template 97ca24bd-9773-d7af-68e0-638915df50fb
		[emails_email_templates_idb] => 97ca24bd-9773-d7af-68e0-638915df50fb
		[parent_type] => Opportunities
		[parent_name] => 233
		[parent_id] => e1dcd2a9-3469-76e8-c149-637bacf2a4ec
        */


		if (($_REQUEST["emails_email_templates_idb"] == "97ca24bd-9773-d7af-68e0-638915df50fb" /*id template Checklist */) and ($_REQUEST["parent_type"] == "Opportunities")) {

			$o = new Opportunity();
			$o->retrieve($_REQUEST["parent_id"]);

			error_log("EMAILS Proceso de ventas " . $o->name);
			//error_log("EMAILS Proceso de ventas ". $o->name . "FECHA " . date('Y-m-d H:i:s'));
			//2022-11-29 00:44:36


			$docs_solicitados = $o->get_linked_beans('doc_docssolicitados_opportunities', 'Doc_DocsSolicitados');
			foreach ($docs_solicitados as $documento) {
				error_log("EMAILS - DOCUMENTOS SOLICITADOS " . $documento->name);
				//$documentos[] = $documento;
			}
			/*
			if ( ! class_exists( 'DBManagerFactory' ) ) {
				require( 'include/database/DBManagerFactory.php' );
			}
			
			$q   = "UPDATE opportunities SET sales_stage = 'Perdido' WHERE sales_stage NOT IN ('Perdido', 'Entrega_Australia') AND DATEDIFF(CURDATE(), date_modified) > 60";
			$db  = DBManagerFactory::getInstance();
			$res = $db->query( $q );
			
			
			
			$o->db->query("UPDATE 
					opportunities_cstm 
				SET 
					checklist_sent_date_c = '" . $this->fecha_response_req1_c . "'
				WHERE 
					id_c = '" . $o->id . "'");	
			*/
		}
	}
}
