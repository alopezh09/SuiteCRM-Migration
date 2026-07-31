<?php

require_once('modules/Veta_Recibo/clases/ReciboPDF.php');
require_once('modules/Veta_Recibo/clases/ReciboPDF_company.php'); //Changes 15102021
require_once('modules/Veta_Recibo/clases/Send_PDF_for_Signature.php');
require_once('modules/Veta_Recibo/clases/PDF_Signature_Status.php');

class Veta_ReciboController extends SugarController
{
    function action_observaciones()
    {
        $this->view = 'observaciones';
    }

    function action_recibo()
    {
        $this->view = 'recibo';
    }

    function action_pdf()
    {
        $this->view = 'pdf';
        $this->generar_pdf();
    }

    //Changes 15102021
    function action_pdf_company()
    {
        $this->view = 'pdf_company';
        $this->generar_pdf_company();
    }

    function action_create_workflow()
    {
        $this->view = 'create_workflow';
    }
    function action_clear_signature()
    {
        global $db;
        $this->generar_pdf_company();

        $id = $_REQUEST['rid'];
        // $db = DBManagerFactoryCustom::getInstance();
        $q = "SELECT id FROM `firmas-db`.contract WHERE id = '$id'";

        $result = $db->query($q, true, "Error obteniendo el consecutivo del recibo");
        $id = null;
        if ($row = $db->fetchByAssoc($result)) {
            $id = $row['id'];
        }
        // var_dump($q);die;

        if (!$id) {
            $this->view = 'copy_company_link';
            return;
        }

        $field = $_REQUEST['company'] ? 'signature_company_path' : 'signature_path';


        $q = "UPDATE `firmas-db`.contract SET  $field = NULL WHERE id = '$id'";

        $result = $db->query($q, true, "Error obteniendo el consecutivo del recibo");
        // $this->view = 'detail';
        $this->generar_pdf_company();

        header("Location: index.php?module=Veta_Recibo&action=DetailView&record=$id");
    }

    function action_send()
    {
        $this->view = 'send';

        //if( ! file_exists( $_REQUEST[ 'rid' ] . '.pdf' ) )
        $this->generar_pdf();
    }

    function action_send_signature()
    {
        $this->view = 'send_signature';
        $this->generar_pdf();
    }

    function action_send_company()
    {
        $this->view = 'send_company';

        //if( ! file_exists( $_REQUEST[ 'rid' ] . '.pdf' ) )
        $this->generar_pdf_company();
    }
	
	function action_send_company_new()
    {
        $this->view = 'send_company_new';

        //if( ! file_exists( $_REQUEST[ 'rid' ] . '.pdf' ) )
        $this->generar_pdf_company();
    }
	
	
    function action_copy_company_link()
    {
        $this->view = 'copy_company_link';

        //if( ! file_exists( $_REQUEST[ 'rid' ] . '.pdf' ) )
        $this->generar_pdf_company();
    }

    function action_send_for_signature()
    {
        $this->view = 'send_for_signature';
        $this->send_for_signature();
    }

    function action_pdf_signature_status()
    {
        $this->view = 'pdf_signature_status';
        $this->pdf_signature_status();
    }

    function generar_pdf()
    {

        $r = new Veta_Recibo();
        $r->retrieve($_REQUEST['rid']);

        $pdf = new ReciboPDF('P', 'mm', 'Letter');
        $pdf->generate_pdf($r);
    }

    //Changes 15102021
    function generar_pdf_company()
    {
        $r = new Veta_Recibo();
        $r->retrieve($_REQUEST['rid']);

        $pdf = new ReciboPDF_company('P', 'mm', 'Letter');
        $pdf->generate_pdf($r);
    }

    function send_for_signature()
    {
        $r = new Veta_Recibo();
        $r->retrieve($_REQUEST['rid']);

        $pdf = new HelloSign_API('P', 'mm', 'Letter');
        $pdf->connectToAPI($r);
    }

    function pdf_signature_status()
    {
        $r = new Veta_Recibo();
        $r->retrieve($_REQUEST['rid']);

        $pdf = new HelloSign_API_Update_Status('P', 'mm', 'Letter');
        $pdf->signatureStatus($r);
    }

    function action_SubPanelViewer()
    {
        require_once 'include/SubPanel/SubPanelViewer.php';

        $js = <<<EOQ
<script>
window.location.reload();
</script>
EOQ;
        echo $js;
    }
}
