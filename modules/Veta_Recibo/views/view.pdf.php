<?php


require_once( 'include/MVC/View/views/view.edit.php' );
require_once( 'modules/Veta_Recibo/clases/ReciboPDF.php' );
require_once( 'modules/Veta_College/Veta_College.php' );


class Veta_ReciboViewPdf extends ViewEdit
{

    function preDisplay()
    {
		global $sugar_config;
		$r = new Veta_Recibo();
        $r->retrieve($_REQUEST[ 'rid' ]);
        //header( "Location:" . $_REQUEST[ 'rid' ] . ".pdf" );		
		$file_name = "COST AGREEMENT-" . $this->string_replace_pdf_name($r->veta_recibo_leads_name) . "-" . $r->name . ".pdf";		
        $file = $sugar_config[ "upload_dir" ] . "invoices/" . $file_name;
		// echo  $file;die;
		
        header("Content-type: application/pdf");

        header("Content-Length: " . filesize($file));
        header('Expires: ' . gmdate('D, d M Y H:i:s \G\M\T', time() + 2592000));
		header('Content-Disposition: inline; filename="'.basename($file_name).'";');
        set_time_limit(0);

        // When output_buffering = On, ob_get_level() may return 1 even if ob_end_clean() returns false
        // This happens on some QA stacks. See Bug#64860
        while (ob_get_level() && @ob_end_clean()) {
            ;
        }

        readfile($file);		

    }
	
	private function string_replace_pdf_name($str) 
    {
        $a = array("'","´","&#039;","@","/");  
        $b = array("","","","","");
        return str_replace($a,$b,$str);
    }
}