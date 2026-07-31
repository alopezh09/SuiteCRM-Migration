<?php

require_once( 'include/MVC/View/views/view.edit.php' );
require_once( 'modules/EmailTemplates/EmailTemplate.php' );
require_once( 'modules/Veta_Recibo/clases/ReciboPDF.php' );

class Veta_ReciboViewCreate_workflow extends ViewEdit {   

    function preDisplay() {

		global $sugar_config;
        $o = null;

        $r = new Veta_Recibo();
        $r->retrieve( $_REQUEST[ 'rid' ] );		
        if ($r) {
			
			$result = $r->new_opportunity( $r->id );
			//error_log("Alfonso - ENTRO PREDISPLAY". $result);
			//error_log( "Alfonso error - Opportunity ".print_r($result, TRUE) );
			//error_log( "Alfonso error - Opportunity id ". $result->id );
			if($result->id){ 				
				$this->redireccionar('Workflow Created', $r->id);
				error_log("Alfonso error - SI CREO WORKFLOW");
			} else {
				error_log("Alfonso error - NO CREO WORKFLOW ENTRO No depisit");
				$this->redireccionar('There is no deposit for this Invoice', $r->id);				
			}
			
			header("Location: index.php?module=Veta_Recibo&action=DetailView&record=" . $r->id);
		}
    }

    private function redireccionar( $msg , $registro ) {

        if( ! empty( $registro ) ) {
            $aux = "<script>
                      var registro='" . $registro . "';";

            $aux .= "alert('" . $msg . "');
                    window.location = 'index.php?module=Veta_Recibo&action=DetailView&record=' + registro;
                 </script>";

            echo $aux;
        }
        else {
            echo "<script>alert('" . $msg . "')</script>";
        }

        exit;
    }
	
	private function string_replace_pdf_name($str)
    {
        $a = array("'","´","&#039;");
        $b = array("","","");
        return str_replace($a,$b,$str);
    }
}