<?php
// custom/modules/Veta_Recibo/views/view.send_company_new.php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('include/MVC/View/views/view.edit.php');
require_once('modules/Veta_Presupuesto/clases/Media.php');
require_once('modules/EmailTemplates/EmailTemplate.php');
require_once('modules/Veta_Recibo/clases/ReciboPDF.php');

class Veta_ReciboViewSend_company_new extends ViewEdit
{
    public function display()
    {
        global $current_user;

        $rid = isset($_REQUEST['rid']) ? $_REQUEST['rid'] : '';
        if (empty($rid)) $this->alertAndBack('Missing rid');

        $r = new Veta_Recibo();
        $r->retrieve($rid);
        if (empty($r->id)) $this->alertAndBack('Recibo not found');

        $requeriment = new Veta_Requerimiento();
        $requeriment->retrieve($r->veta_requerimiento_veta_reciboveta_requerimiento_ida);

        $company = new NVC_Companies();
        $company->retrieve($requeriment->nvc_companies_veta_requerimiento_1nvc_companies_ida);

        $lead = new Lead();
        $lead->retrieve($requeriment->veta_requerimiento_leadsleads_ida);

        $emails = $this->getCompanyEmails($company->id, $company->email1);

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send_company_invoice']) && $_POST['send_company_invoice'] === '1') {

            $to = $this->pickEmails('to');
            $cc = $this->pickEmails('cc');
			/*
            $toExtra = $this->parseExtraEmails(isset($_POST['to_extra']) ? $_POST['to_extra'] : '');
            $ccExtra = $this->parseExtraEmails(isset($_POST['cc_extra']) ? $_POST['cc_extra'] : '');
			*/
			
			$toExtra = $this->parseExtraEmailsArray(isset($_POST['to_extra']) ? $_POST['to_extra'] : []);
			$ccExtra = $this->parseExtraEmailsArray(isset($_POST['cc_extra']) ? $_POST['cc_extra'] : []);



            $to = array_values(array_unique(array_merge($to, $toExtra)));
            $cc = array_values(array_unique(array_merge($cc, $ccExtra)));

            $cc = array_values(array_diff($cc, $to));

            if (empty($to)) {
                $this->redirectWithMsg('Please select at least one TO email', $r->id);
            }

            $tEmail = new EmailTemplate();
            if ((int)$r->send_form_956_c === 0) {
                $tEmail->retrieve('b5ebe54b-b0d3-2826-16f7-679a8ca3b635');
            } else {
                $tEmail->retrieve('9acb0e59-d298-2c31-da4a-6201806a1854');
            }
            if (empty($tEmail->id)) $this->redirectWithMsg('Email template not found', $r->id);

            $u = new User();
            $u->retrieve($current_user->id);

            $tEmail->body_html = html_entity_decode($tEmail->body_html, ENT_COMPAT | ENT_HTML401, "UTF-8");
            $tEmail->body_html = str_replace('$' . 'cliente', $company->name, $tEmail->body_html);
            $tEmail->body_html = str_replace('$' . 'assigned_user_name', $u->name, $tEmail->body_html);
            $tEmail->body_html = str_replace('$' . 'rid', $r->id, $tEmail->body_html);

            $file_name = "COST AGREEMENT-" . $this->string_replace_pdf_name($company->name) . "-" . $r->name . ".pdf";

            $this->create_registry($r, $company, $requeriment);

            if (isset($requeriment->company_first_invoice_sent_c) && $requeriment->company_first_invoice_sent_c != 1) {
                $db = DBManagerFactory::getInstance();
                $db->query("UPDATE veta_requerimiento_cstm SET company_first_invoice_sent_c='1' WHERE id_c='{$requeriment->id}'");
                $db->query("UPDATE veta_requerimiento_cstm SET company_stage_c='Company_Cost_Agree_Sent' WHERE id_c='{$requeriment->id}'");
            }

            $append = ' - Invoice Number: "INV-CO-' . $r->name . '" - For: ' . $company->company_leap_id . '" - Applicant Leap ID Number: ' . $requeriment->leap_id . ' - ' . $lead->first_name . ' ' . $lead->last_name;

            $mail = Media::prepare_email_from_template(
                $u,
                $to,
                $tEmail->id,
                [
                    '$cliente' => $company->name,
                    '$assigned_user_name' => $u->name,
                    '$rid' => $r->id,
                ],
                ['$append' => $append]
            );

            foreach ($cc as $ccAddr) {
                if (!empty($ccAddr)) $mail->addCC($ccAddr);
            }

            $pdfPath = "/var/www/crm.australiaveta.com.develop/MMMigration/$file_name";
            if (file_exists($pdfPath)) {
                $mail->addAttachment($pdfPath, $file_name, 'base64', 'application/pdf');
            }

            if ($mail->send()) {
                $emailObj = $this->crear_email(implode(',', $to), $r, $tEmail);

                $r->load_relationship('veta_recibo_emails');
                if (!empty($emailObj->id)) $r->veta_recibo_emails->add($emailObj->id);

                $this->redirectWithMsg('Email have been sent to ' . implode(', ', $to), $r->id);
            } else {
                $this->redirectWithMsg('No fue posible enviar el email por favor revisa la configuración de correo de tu cuenta', $r->id);
            }
        }

        $this->renderSelector($r, $company, $emails);
    }

    private function renderSelector(Veta_Recibo $r, NVC_Companies $company, array $emails)
{
    $rows = '';
    foreach ($emails as $i => $addr) {
        $safe = htmlspecialchars($addr, ENT_QUOTES, 'UTF-8');
        $rows .= "
            <tr>
                <td style=\"padding:6px 10px;\">{$safe}</td>
                <td style=\"padding:6px 10px;\">
                    <label style=\"margin-right:10px;\">
                        <input type=\"radio\" name=\"pick[{$i}]\" value=\"to\"> TO
                    </label>
                    <label style=\"margin-right:10px;\">
                        <input type=\"radio\" name=\"pick[{$i}]\" value=\"cc\"> CC
                    </label>
                    <label>
                        <input type=\"radio\" name=\"pick[{$i}]\" value=\"no\" checked> NO
                    </label>
                    <input type=\"hidden\" name=\"addr[{$i}]\" value=\"{$safe}\">
                </td>
            </tr>
        ";
    }

    $companyName = htmlspecialchars($company->name, ENT_QUOTES, 'UTF-8');

    echo "
    <script>
    function closeEmailModal(){
        var m=document.getElementById('emailModal');
        if(m){ m.style.display='none'; }
        window.location='index.php?module=Veta_Recibo&action=DetailView&record={$r->id}';
    }
    window.onload = function(){
        var m=document.getElementById('emailModal');
        if(m){ m.style.display='block'; }
    };

    function addRow(containerId, name){
        var c=document.getElementById(containerId);
        if(!c) return;
        var div=document.createElement('div');
        div.className='dynRow';
        div.innerHTML='<input type=\"text\" name=\"'+name+'[]\" class=\"dynInput\" placeholder=\"email@domain.com\" /> '+
                      '<input type=\"button\" class=\"button\" value=\"-\" onclick=\"this.parentNode.remove();\" />';
        c.appendChild(div);
    }
    </script>

    <style>
    #emailModal{display:none;position:fixed;z-index:999999;left:0;top:0;width:100%;height:100%;background:rgba(0,0,0,.45);}
    #emailModal .box{background:#fff;width:900px;max-width:95%;margin:60px auto;padding:15px;border-radius:6px;}
    #emailModal .head{display:flex;justify-content:space-between;align-items:center;margin-bottom:10px;}
    #emailModal .body{max-height:50vh;overflow:auto;border:1px solid #ddd;}

    .extraBox{border:1px solid #ddd;padding:10px;margin-top:10px;}
    .extraBox .top{display:flex;justify-content:space-between;align-items:center;margin-bottom:8px;}
    .extraBox .title{font-weight:bold;}
    .dynRow{margin-bottom:6px;}
    .dynInput{width:70%;max-width:520px;padding:6px;}
    </style>

    <div id=\"emailModal\">
        <div class=\"box\">
            <div class=\"head\">
                <div><b>Send Company Invoice</b> - {$companyName}</div>
                <input type=\"button\" class=\"button\" value=\"X\" onclick=\"closeEmailModal()\" />
            </div>

            <form method=\"POST\" action=\"index.php?module=Veta_Recibo&action=send_company_new&rid={$r->id}\">
                <input type=\"hidden\" name=\"send_company_invoice\" value=\"1\" />

                <div class=\"body\">
                    <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%;\">
                        <thead>
                            <tr>
                                <th style=\"text-align:left; padding:8px 10px; border-bottom:1px solid #ddd;\">Email</th>
                                <th style=\"text-align:left; padding:8px 10px; border-bottom:1px solid #ddd;\">Send as</th>
                            </tr>
                        </thead>
                        <tbody>
                            {$rows}
                        </tbody>
                    </table>
                </div>

                <div class=\"extraBox\">
                    <div class=\"top\">
                        <div class=\"title\">Extra TO emails</div>
                        <input type=\"button\" class=\"button\" value=\"+\" onclick=\"addRow('toExtraBox','to_extra')\" />
                    </div>
                    <div id=\"toExtraBox\">
                        <div class=\"dynRow\">
                            <input type=\"text\" name=\"to_extra[]\" class=\"dynInput\" placeholder=\"email@domain.com\" />
                            <input type=\"button\" class=\"button\" value=\"-\" onclick=\"this.parentNode.remove();\" />
                        </div>
                    </div>
                </div>

                <div class=\"extraBox\">
                    <div class=\"top\">
                        <div class=\"title\">Extra CC emails</div>
                        <input type=\"button\" class=\"button\" value=\"+\" onclick=\"addRow('ccExtraBox','cc_extra')\" />
                    </div>
                    <div id=\"ccExtraBox\">
                        <div class=\"dynRow\">
                            <input type=\"text\" name=\"cc_extra[]\" class=\"dynInput\" placeholder=\"email@domain.com\" />
                            <input type=\"button\" class=\"button\" value=\"-\" onclick=\"this.parentNode.remove();\" />
                        </div>
                    </div>
                </div>

                <div style=\"margin-top:12px;\">
                    <input type=\"submit\" class=\"button\" value=\"Send\" />
                    <input type=\"button\" class=\"button\" value=\"Cancel\" onclick=\"closeEmailModal()\" />
                </div>
            </form>
        </div>
    </div>
    ";
}

private function parseExtraEmailsArray($raw): array
{
    if (!is_array($raw)) return [];
    $out = [];
    foreach ($raw as $p) {
        $p = trim((string)$p);
        if ($p !== '' && filter_var($p, FILTER_VALIDATE_EMAIL)) {
            $out[] = $p;
        }
    }
    return array_values(array_unique($out));
}


	/*
    private function parseExtraEmails(string $raw): array
    {
        $raw = trim($raw);
        if ($raw === '') return [];

        $parts = preg_split('/[\s,;]+/', $raw);
        $out = [];
        foreach ($parts as $p) {
            $p = trim($p);
            if ($p !== '' && filter_var($p, FILTER_VALIDATE_EMAIL)) {
                $out[] = $p;
            }
        }
        return array_values(array_unique($out));
    }
	*/
    private function pickEmails(string $mode): array
    {
        $out = [];
        $pick = isset($_POST['pick']) && is_array($_POST['pick']) ? $_POST['pick'] : [];
        $addr = isset($_POST['addr']) && is_array($_POST['addr']) ? $_POST['addr'] : [];

        foreach ($addr as $i => $email) {
            $sel = isset($pick[$i]) ? $pick[$i] : 'no';
            if ($sel === $mode) {
                $email = trim($email);
                if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $out[] = $email;
                }
            }
        }
        return array_values(array_unique($out));
    }

    private function getCompanyEmails(string $companyId, string $primary = ''): array
    {
        $db = DBManagerFactory::getInstance();

        $list = [];
        if (!empty($primary) && filter_var($primary, FILTER_VALIDATE_EMAIL)) {
            $list[] = $primary;
        }

        $companyIdQuoted = $db->quote($companyId);

        $q = "
            SELECT ea.email_address
            FROM email_addr_bean_rel eabr
            INNER JOIN email_addresses ea ON ea.id = eabr.email_address_id AND ea.deleted = 0
            WHERE eabr.bean_id = '{$companyIdQuoted}'
              AND eabr.bean_module = 'NVC_Companies'
              AND eabr.deleted = 0
        ";
        $res = $db->query($q);
        while ($row = $db->fetchByAssoc($res)) {
            if (!empty($row['email_address'])) {
                $addr = trim($row['email_address']);
                if (filter_var($addr, FILTER_VALIDATE_EMAIL)) {
                    $list[] = $addr;
                }
            }
        }

        $list = array_values(array_unique($list));
        sort($list);
        return $list;
    }

    private function crear_email(string $to, Veta_Recibo $r, EmailTemplate $tEmail)
    {
        $admin = new Administration();
        $admin->retrieveSettings();

        $emailObj = new Email();
        $emailObj->to_addrs = $to;
        $emailObj->type = 'archived';
        $emailObj->deleted = '0';
        $emailObj->name = $tEmail->subject;

        $emailObj->attachments = $tEmail->getAttachments();
        $emailObj->description = null;
        $emailObj->description_html = $tEmail->body_html;
        $emailObj->from_addr = isset($admin->settings['notify_fromaddress']) ? $admin->settings['notify_fromaddress'] : '';

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

    private function create_registry(Veta_Recibo $r, NVC_Companies $company, Veta_Requerimiento $requeriment)
    {
        $pdfName = "COST AGREEMENT-" . $this->string_replace_pdf_name($r->veta_recibo_leads_name) . "-" . $r->name . ".pdf";
        $pdfNameCompany = "COST AGREEMENT-" . $this->string_replace_pdf_name($company->name) . "-" . $r->name . ".pdf";

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
            'http://ec2-34-239-163-93.compute-1.amazonaws.com:4040/upload/invoices/{$pdfName}',
            'http://ec2-34-239-163-93.compute-1.amazonaws.com/{$pdfNameCompany}',
            NOW(),
            {$noApplicants},
            '{$r->id}'
        ) ON DUPLICATE KEY UPDATE
            pdflink = VALUES(pdflink),
            pdfcompanylink = VALUES(pdfcompanylink),
            date_modified = VALUES(date_created),
            signatures_no = VALUES(signatures_no)";

        $r->db->query($q, true, "Error creando registry");
    }

    private function redirectWithMsg(string $msg, string $recordId)
    {
        $msg = addslashes($msg);
        echo "<script>alert('{$msg}');window.location='index.php?module=Veta_Recibo&action=DetailView&record={$recordId}';</script>";
        exit;
    }

    private function alertAndBack(string $msg)
    {
        $msg = addslashes($msg);
        echo "<script>alert('{$msg}');window.history.back();</script>";
        exit;
    }

    private function string_replace_pdf_name($str)
	{
		$a = array("'", "´", "&#039;", "@", "/");
		$b = array("", "", "", "", "");
		return str_replace($a, $b, $str);
	}
}
