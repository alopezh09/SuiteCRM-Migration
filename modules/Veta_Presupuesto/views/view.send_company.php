<?php

require_once('include/MVC/View/views/view.edit.php');
require_once('modules/Veta_Presupuesto/clases/Media.php');
require_once('modules/EmailTemplates/EmailTemplate.php');
require_once('modules/Veta_Presupuesto/clases/PresupuestoPDF_company.php');

class Veta_PresupuestoViewSend_company extends ViewEdit
{

    /**
     * @param Veta_Presupuesto $p
     * @param Email $email
     * @return Note
     */
    private function crear_nota(Veta_Presupuesto $p, Email $email)
    {

        global $sugar_config;

        $emailObj = new Email();
        $path_pdf = $p->id . ".pdf";

        $note = new Note();
        $note->id = create_guid();
        $note->new_with_id = true;

        $note->parent_id = $email->id;
        $note->parent_type = $email->module_dir;
        $note->name = "Presupuesto.pdf";
        $note->filename = "Presupuesto.pdf";
        $note->file_mime_type = $emailObj->email2GetMime($path_pdf);
        $noteFile = "{$sugar_config['upload_dir']}{$note->id}";

        if (!copy($path_pdf, $noteFile)) {
            $GLOBALS['log']->debug("EMAIL 2.0: could not copy attachment file to cache/upload [ {$noteFile} ]");
        }

        $note->save();
        return $note;
    }

    /**
     * @param Veta_Presupuesto $p
     * @param EmailTemplate $tEmail
     * @return Email
     */
    private function crear_email(string $to, Veta_Presupuesto $p, EmailTemplate $tEmail)
    {

        $admin = new Administration();
        $admin->retrieveSettings();

        $emailObj = new Email();
        $emailObj->to_addrs = $to;
        $emailObj->type = 'archived';
        $emailObj->deleted = '0';
        $emailObj->name = $tEmail->subject;
        $emailObj->description = null;
        $emailObj->description_html = $tEmail->body_html;
        $emailObj->from_addr = $admin->settings['notify_fromaddress'];

        if ($p instanceof SugarBean && !empty($p->id)) {
            $emailObj->parent_type = $p->module_dir;
            $emailObj->parent_id = $p->id;
        }

        $emailObj->date_sent = TimeDate::getInstance()->nowDb();
        $emailObj->modified_user_id = '1';
        $emailObj->created_by = '1';
        $emailObj->status = 'sent';

        $emailObj->save();

        return $emailObj;
    }


    function preDisplay()
    {

        global $sugar_config;
        $o = null;

        $p = new Veta_Presupuesto();
        $p->retrieve($_REQUEST['pid']);


        $requermimento_presupuesto = $p->get_linked_beans('veta_requerimiento_veta_presupuesto', 'Veta_Presupuesto');
        $id_requermimiento = "";
        foreach ($requermimento_presupuesto as $req_pre) {
            $id_requermimiento = $req_pre->id;
        }

        $requeriment = new Veta_Requerimiento();
        $requeriment->retrieve($id_requermimiento);

        $company = new NVC_Companies;
        $company->retrieve($requeriment->nvc_companies_veta_requerimiento_1nvc_companies_ida);

        $toemail = null;
        if (!empty($company->cost_agreetment_signature_email_c)) {
            $toemail = $company->cost_agreetment_signature_email_c;
        } else {
            if (!empty($r->veta_recibo_leadsleads_ida)) {
                $toemail = $company->email1;
            }
        }

        if ($toemail != null) {

            $u = new User();
            $u->retrieve($p->assigned_user_id);

            $tEmail = new EmailTemplate();
            $tEmail->retrieve('afc859df-8a31-7f97-d79b-6201802a6349');

            if ($p->emailtemplate_id2_c != "") {
                $tEmail->retrieve($p->emailtemplate_id2_c);
            }

            $tEmail->body_html = html_entity_decode($tEmail->body_html, ENT_COMPAT | ENT_HTML401, "UTF-8");
            $tEmail->body_html = str_replace("$" . "cliente", $company->name, $tEmail->body_html);
            $tEmail->body_html = str_replace("$" . "assigned_user_name", $u->name, $tEmail->body_html);

            $media = new Media();
            $file_name = 'QUOTE-' . $this->string_replace_pdf_name($company->name) . '-' . $p->name . '.pdf';
            if (empty($tEmail->id))
                $this->redireccionar('No fue posible enviar el email porque no existe la plantilla de correo con id presupuesto', $p->id);

            // $append = ' - Invoice Number: "INV-AP-' . $r->name . '" - Leap ID Number: ' . $requeriment->leap_id;
            $mail = Media::prepare_email_from_template(NULL, [$toemail], 'afc859df-8a31-7f97-d79b-6201802a6349', [
                '$cliente' => $company->name,
                '$assigned_user_name' => $u->name,
                '$rid' => $p->id,

            ], ['$append' => '']);

            // $mail->addAttachment($sugar_config['upload_dir'] . $r->id . '.pdf',  $file_name, 'base64', 'application/pdf');

            $mail->addAttachment($sugar_config["upload_dir"]  . $file_name,  $file_name, 'base64', 'application/pdf');
            if ($mail->send()) {
            // if ($media->send_email($toemail, $tEmail->body_html, $tEmail->subject, $sugar_config["upload_dir"] . "quotes/" . $file_name)) {

                $emailObj = $this->crear_email($toemail, $p, $tEmail);
                $nota = $this->crear_nota($p, $emailObj);

                $p->load_relationship(veta_presupuesto_emails);
                $p->veta_presupuesto_emails->add($emailObj->id);

                if ($p->send_both_quote_to_company_c) {

                    if (!empty($p->veta_presupuesto_contactscontacts_ida)) {

                        $o = new Contact();
                        $o->retrieve($p->veta_presupuesto_contactscontacts_ida);
                    }

                    if (!empty($p->veta_presupuesto_leadsleads_ida)) {

                        $o = new Lead();
                        $o->retrieve($p->veta_presupuesto_leadsleads_ida);
                    }


                    if ($o != null) {
                        $this->generar_pdf();
                        $u = new User();
                        $u->retrieve($o->assigned_user_id);

                        $tEmail = new EmailTemplate();
                        $tEmail->retrieve('presupuesto');

                        if ($p->emailtemplate_id1_c != "") {
                            $tEmail->retrieve($p->emailtemplate_id1_c);
                        }

                        $tEmail->body_html = html_entity_decode($tEmail->body_html, ENT_COMPAT | ENT_HTML401, "UTF-8");
                        $tEmail->body_html = str_replace("$" . "cliente", $o->name, $tEmail->body_html);
                        $tEmail->body_html = str_replace("$" . "assigned_user_name", $u->name, $tEmail->body_html);

                        $media = new Media();
                        $file_name = 'QUOTE-' . $this->string_replace_pdf_name($requeriment->veta_requerimiento_leads_name) . '-' . $p->name . '.pdf';

                        if ($media->send_email($o->email1, $tEmail->body_html, $tEmail->subject, $sugar_config["upload_dir"] . "quotes/" . $file_name)) {

                            $emailObj = $this->crear_email($o->email1, $p, $tEmail);
                            $nota = $this->crear_nota($p, $emailObj);

                            $p->load_relationship(veta_presupuesto_emails);
                            $p->veta_presupuesto_emails->add($emailObj->id);
                            $this->redireccionar('Email have been sent to Applicant ' . $o->email1 . ' And Company ' . $toemail, $p->id);
                        }
                    }
                } else {
                    $this->redireccionar('Email have been sent to Company ' . toemail, $p->id);
                }
                //$this->redireccionar('Email have been sent to '.$toemail, $p->id);
            } else {
                $this->redireccionar('No fue posible enviar el email por favor revisa la configuración de correo de tu cuenta', $p->id);
            }
        }

        header("Location: index.php?module=Veta_Presupuesto&action=DetailView&record=" . $p->id);
    }

    private function redireccionar($msg, $registro)
    {
        if (!empty($registro)) {
            $aux = "<script>
                      var registro='" . $registro . "';";

            $aux .= "alert('" . $msg . "');
                    window.location = 'index.php?module=Veta_Presupuesto&action=DetailView&record=' + registro;
                 </script>";

            echo $aux;
        } else {
            echo "<script>alert('" . $msg . "')</script>";
        }

        exit;
    }

    private function string_replace_pdf_name($str)
    {
        $a = array("'", "´", "&#039;");
        $b = array("", "", "");
        return str_replace($a, $b, $str);
    }

    function generar_pdf()
    {
        $p = new Veta_Presupuesto();
        $p->retrieve($_REQUEST['pid']);

        $pdf = new PresupuestoPDF('P', 'mm', 'Letter');
        $pdf->generate_pdf($p);
    }
}
