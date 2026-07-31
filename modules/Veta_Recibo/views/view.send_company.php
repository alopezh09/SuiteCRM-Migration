<?php

require_once('include/MVC/View/views/view.edit.php');
require_once('modules/Veta_Presupuesto/clases/Media.php');
require_once('modules/EmailTemplates/EmailTemplate.php');
require_once('modules/Veta_Recibo/clases/ReciboPDF.php');

class Veta_ReciboViewSend_company extends ViewEdit
{

    /**
     * @param Veta_Recibo $r
     * @param Email $email
     * @return Note
     */
    private function crear_nota(Veta_Recibo $r, Email $email)
    {

        global $sugar_config;

        $emailObj = new Email();
        $path_pdf = $r->id . ".pdf";

        $note = new Note();
        $note->id = create_guid();
        $note->new_with_id = true;

        $note->parent_id = $email->id;
        $note->parent_type = $email->module_dir;
        $note->name = "Recibo.pdf";
        $note->filename = "Recibo.pdf";
        $note->file_mime_type = $emailObj->email2GetMime($path_pdf);
        $noteFile = "{$sugar_config['upload_dir']}{$note->id}";

        if (!copy($path_pdf, $noteFile)) {
            $GLOBALS['log']->debug("EMAIL 2.0: could not copy attachment file to cache/upload [ {$noteFile} ]");
        }

        $note->save();
        return $note;
    }

    /**
     * @param string $to
     * @param Veta_Recibo $r
     * @param EmailTemplate $tEmail
     * @return Email
     */
    private function crear_email(string $to, Veta_Recibo $r, EmailTemplate $tEmail)
    {

        $admin = new Administration();
        $admin->retrieveSettings();

        $emailObj = new Email();
        $emailObj->to_addrs = $to;
        $emailObj->type = 'archived';
        $emailObj->deleted = '0';
        $emailObj->name = $tEmail->subject;

        //$emailObj->attachments = $tEmail->attachments;
        $emailObj->attachments = $tEmail->getAttachments();
        //$tEmail->getAttachments();

        $emailObj->description = null;
        $emailObj->description_html = $tEmail->body_html;
        $emailObj->from_addr = $admin->settings['notify_fromaddress'];

        if ($r instanceof SugarBean && !empty($r->id)) {
            $emailObj->parent_type = $r->module_dir;
            $emailObj->parent_id = $r->id;
        }

        $emailObj->date_sent = TimeDate::getInstance()->nowDb();
        $emailObj->modified_user_id = '1';
        $emailObj->created_by = '1';
        $emailObj->status = 'sent';

        $emailObj->save();

        return $emailObj;
    }

    function create_registry($r)
    {

        $requeriment = new Veta_Requerimiento();
        $requeriment->retrieve($r->veta_requerimiento_veta_reciboveta_requerimiento_ida);

        $company = new NVC_Companies;
        $company->retrieve($requeriment->nvc_companies_veta_requerimiento_1nvc_companies_ida);

        $pdfName = "COST AGREEMENT-" . $this->string_replace_pdf_name($r->veta_recibo_leads_name) . "-" . $r->name . ".pdf";
        $pdfNameCompany = "COST AGREEMENT-" . $this->string_replace_pdf_name($company->name) . "-" . $r->name . ".pdf";

        $requermimento_presupuesto = $r->get_linked_beans('veta_requerimiento_veta_recibo', 'Veta_Recibo');
        $id_requermimiento = "";
        foreach ($requermimento_presupuesto as $req_pre) {
            $id_requermimiento = $req_pre->id;
        }

        $requeriment = new Veta_Requerimiento();
        $requeriment->retrieve($id_requermimiento);

        $noApplicants = 1;

        if (!empty($requeriment->third_dependent_name)) {
            $noApplicants = 5;
        } elseif (!empty($requeriment->second_dependent_name)) {
            $noApplicants = 4;
        } elseif (!empty($requeriment->dependent_name)) {
            $noApplicants = 3;
        } elseif (!empty($requeriment->secondary_aplicant_name)) {
            $noApplicants = 2;
        }


        $q = "INSERT INTO `firmas-db`.contract (id,pdflink,pdfcompanylink,date_created,signatures_no,veta_recibo) VALUES (
            '{$r->id}',
            'http://ec2-34-239-163-93.compute-1.amazonaws.com:4040/upload/invoices/$pdfName',
            'http://ec2-34-239-163-93.compute-1.amazonaws.com/$pdfNameCompany',
            NOW(),
            $noApplicants,
            '{$r->id}'
        ) ON DUPLICATE KEY UPDATE
		pdflink = VALUES(pdflink),
		pdfcompanylink = VALUES(pdfcompanylink),
		date_modified = VALUES(date_created),
		signatures_no = VALUES(signatures_no)";

        $result = $r->db->query($q, true, "Error obteniendo el consecutivo del recibo");
    }

    function preDisplay()
    {

        global $sugar_config, $current_user;

        $o = null;
        $toemail = null;

        $r = new Veta_Recibo();
        $r->retrieve($_REQUEST['rid']);

        $requeriment = new Veta_Requerimiento();
        $requeriment->retrieve($r->veta_requerimiento_veta_reciboveta_requerimiento_ida);

        $company = new NVC_Companies;
        $company->retrieve($requeriment->nvc_companies_veta_requerimiento_1nvc_companies_ida);
		
		$lead = new Lead();
		$lead->retrieve($requeriment->veta_requerimiento_leadsleads_ida);

        /*
		$o = new NVC_Companies();
		$o = $company;
		*/

        if (!empty($company->cost_agreetment_signature_email_c)) {
            $toemail = $company->cost_agreetment_signature_email_c;
        } else {
            if (!empty($r->veta_recibo_leadsleads_ida)) {
                $toemail = $company->email1;
            }
        }



        if ($toemail != null) {

            $tEmail = new EmailTemplate();
            
			
			if($r->send_form_956_c == 0){
				error_log("Recibos en 0"); 
				// Plantilla para send_form_956_c == 0
				$tEmail->retrieve('b5ebe54b-b0d3-2826-16f7-679a8ca3b635');
			} else {
				error_log("Recibos en 1");
				// Plantilla para send_form_956_c != 0
				$tEmail->retrieve('9acb0e59-d298-2c31-da4a-6201806a1854');
			}
			
			

            if ($p->emailtemplate_id1_c != "") {
                $tEmail->retrieve($p->emailtemplate_id1_c);
            }

            $templateId = $p->emailtemplate_id1_c != "" ? $p->emailtemplate_id1_c : $tEmail->id;

            $u = new User();
            //$u->retrieve($r->assigned_user_id);
            $u->retrieve($current_user->id);

            $tEmail->body_html = html_entity_decode($tEmail->body_html, ENT_COMPAT | ENT_HTML401, "UTF-8");
            $tEmail->body_html = str_replace("$" . "cliente", $company->name, $tEmail->body_html);
            $tEmail->body_html = str_replace("$" . "assigned_user_name", $u->name, $tEmail->body_html);
            $tEmail->body_html = str_replace("$" . "rid", "$r->id", $tEmail->body_html);

            $media = new Media();
            if (empty($tEmail->id))
                $this->redireccionar('No fue posible enviar el email porque no existe la plantilla de correo con id recibo', $r->id);

			$file_name = "COST AGREEMENT-" . $this->string_replace_pdf_name($company->name) ."-".$r->name . ".pdf";
            $this->create_registry($r);

            //if($requeriment->id == '587fd756-109d-e4b6-dfce-61f1d88d1a09'){
            if ((isset($requeriment->company_first_invoice_sent_c)) and ($requeriment->company_first_invoice_sent_c != 1)) {
                $db = DBManagerFactory::getInstance();
                $cambio = 1;
                $q = "UPDATE veta_requerimiento_cstm SET company_first_invoice_sent_c = '" . $cambio . "' WHERE id_c = '" . $requeriment->id . "'";
                $db->query($q);
                $q = "UPDATE veta_requerimiento_cstm SET company_stage_c = 'Company_Cost_Agree_Sent' WHERE id_c = '" . $requeriment->id . "'";
                $db->query($q);
                error_log("auto_consultation - se envio y acutalizo el estado del requerimiento " . $requeriment->name);
            } //else if((isset($requeriment->company_first_invoice_sent_c)) and ($requeriment->company_first_invoice_sent_c != '')){}
            //}

            $append = ' - Invoice Number: "INV-CO-' . $r->name . '" - For: ' . $company->company_leap_id . '" - Applicant Leap ID Number: ' . $requeriment->leap_id . ' - ' . $lead->first_name . ' ' . $lead->last_name;

            $mail = Media::prepare_email_from_template($u, [$toemail], $tEmail->id, [
                '$cliente' => $company->name,
                '$assigned_user_name' => $u->name,
                '$rid' => $r->id,

            ], ['$append' => $append]);


            $mail->addAttachment("/var/www/crm.australiaveta.com.develop/MMMigration/$file_name",  $file_name, 'base64', 'application/pdf');
            logerror(["cost_agreement", "/var/www/crm.australiaveta.com.develop/MMMigration/$file_name"]);

            //if( $media->send_email( $o->email1 , $tEmail->body_html , $tEmail->subject, $r->id . '.pdf', 'Consumer_Guide_New.pdf', 'Form_956_CHOW0005_Applicant.pdf' ) ) {
            // if( $media->send_email( $toemail , $tEmail->body_html , $tEmail->subject. ' - Invoice Number: "INV-CO-' . $r->name . '" - For: ' . $company->company_leap_id . '" - Applicant Leap ID Number: ' . $requeriment->leap_id, 'COST AGREEMENT-' . $this->string_replace_pdf_name($company->name) .'-'.$r->name . '.pdf', 'Consumer_Guide_New.pdf', 'Form_956_Employer-2024.pdf' ) ) {	
            if ($mail->send()) {

                
				$emailObj = crear_email($r, $mail, true);

                $r->load_relationship(veta_recibo_emails);
                $r->veta_recibo_emails->add($emailObj->id);
                //$r->new_opportunity();
                $this->redireccionar('Email have been sent to ' . $toemail, $r->id);
            } else {
                $this->redireccionar('No fue posible enviar el email por favor revisa la configuración de correo de tu cuenta', $r->id);
            }
        }

        header("Location: index.php?module=Veta_Recibo&action=DetailView&record=" . $r->id);
    }

    private function redireccionar($msg, $registro)
    {

        if (!empty($registro)) {
            $aux = "<script>
                      var registro='" . $registro . "';";

            $aux .= "alert('" . $msg . "');
                    window.location = 'index.php?module=Veta_Recibo&action=DetailView&record=' + registro;
                 </script>";

            echo $aux;
        } else {
            echo "<script>alert('" . $msg . "')</script>";
        }

        exit;
    }

    private function string_replace_pdf_name($str)
    {
        $a = array("'", "´", "&#039;", "@", "/");
        $b = array("", "", "", "", "");
        return str_replace($a, $b, $str);
    }
}
