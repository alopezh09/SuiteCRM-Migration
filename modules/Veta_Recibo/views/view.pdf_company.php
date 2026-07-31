<?php


require_once( 'include/MVC/View/views/view.edit.php' );
require_once ('modules/Veta_Recibo/clases/ReciboPDF_company.php');



class Veta_ReciboViewPdf_company extends ViewEdit
{

    function preDisplay()
    {
        
		$r = new Veta_Recibo();
        $r->retrieve($_REQUEST[ 'rid' ]);
		
        $requeriment = new Veta_Requerimiento();
        $requeriment->retrieve($r->veta_requerimiento_veta_reciboveta_requerimiento_ida);
		
		$company = new NVC_Companies;
		$company->retrieve($requeriment->nvc_companies_veta_requerimiento_1nvc_companies_ida);		
		
        //header( "Location:" . $_REQUEST[ 'rid' ] . ".pdf" );
		error_log("company_name " . "COST AGREEMENT-" . $this->string_replace_pdf_name($company->name) ."-" . $r->name . ".pdf" );
		header( "Location:" . "COST AGREEMENT-" . $this->string_replace_pdf_name($company->name) ."-" . $r->name . ".pdf" );
		

    }
	
	private function string_replace_pdf_name($str)
    {
        $a = array("'","´","&#039;","@","/");
        $b = array("","","","","");
        return str_replace($a,$b,$str);
    }
}