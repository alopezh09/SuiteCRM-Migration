<?php


require_once( 'include/MVC/View/views/view.edit.php' );
require_once ('modules/Veta_Presupuesto/clases/PresupuestoPDF.php');


class Veta_PresupuestoViewPdf extends ViewEdit
{
	/*

    function preDisplay() {
		
		global $sugar_config;
		
		$p = new Veta_Presupuesto();
        $p->retrieve($_REQUEST[ 'pid' ]);
		
		$requermimento_presupuesto = $p->get_linked_beans( 'veta_requerimiento_veta_presupuesto' , 'Veta_Presupuesto' );
        $id_requermimiento ="";
        foreach( $requermimento_presupuesto as $req_pre ) {            
            $id_requermimiento = $req_pre->id;
        }

        $requeriment = new Veta_Requerimiento();
        $requeriment->retrieve($id_requermimiento);
		

        header( "Location:" . $sugar_config[ "upload_dir" ] . "quotes/" . "QUOTE-" . $this->string_replace_pdf_name($requeriment->veta_requerimiento_leads_name) . "-" . $p->name . ".pdf" );
		//header( "Location:" . "QUOTE-" . $this->string_replace_pdf_name($requeriment->veta_requerimiento_leads_name) ."-".$p->name . ".pdf" );
		
		//header("Location:" . $_REQUEST['pid'] . ".pdf");

    }
	*/
	
	function preDisplay() {

        //header("Location:" . $_REQUEST['pid'] . ".pdf");

        global $sugar_config;
		
		$p = new Veta_Presupuesto();
        $p->retrieve($_REQUEST[ 'pid' ]);
		
		$requermimento_presupuesto = $p->get_linked_beans( 'veta_requerimiento_veta_presupuesto' , 'Veta_Presupuesto' );
        $id_requermimiento ="";
        foreach( $requermimento_presupuesto as $req_pre ) {            
            $id_requermimiento = $req_pre->id;
        }

        $requeriment = new Veta_Requerimiento();
        $requeriment->retrieve($id_requermimiento);
		
		$file_name = "QUOTE-" . $this->string_replace_pdf_name($requeriment->veta_requerimiento_leads_name) . "-" . $p->name . ".pdf";
        $file = $sugar_config[ "upload_dir" ] . "quotes/" . $file_name;
		
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
        $a = array("'","´","&#039;");
        $b = array("","","");
        return str_replace($a,$b,$str);
    }
}