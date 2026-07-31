<?php

require_once('include/MVC/View/views/view.edit.php');
require_once('modules/Veta_Presupuesto/clases/Media.php');
require_once('modules/EmailTemplates/EmailTemplate.php');
require_once('modules/Veta_Recibo/clases/ReciboPDF.php');

class Veta_ReciboViewCopy_company_link extends ViewEdit
{


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
        $this->create_registry($r);

        header("Location: index.php?module=Veta_Recibo&action=DetailView&record=" . $r->id);
    }

    private function string_replace_pdf_name($str)
    {
        $a = array("'", "´", "&#039;", "@", "/");
        $b = array("", "", "", "", "");
        return str_replace($a, $b, $str);
    }
}
