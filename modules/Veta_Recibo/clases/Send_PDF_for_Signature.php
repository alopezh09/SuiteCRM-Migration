<?php

require_once( 'modules/Veta_College/Veta_College.php' );
require_once( 'modules/Veta_Presupuesto/clases/fpdf16/fpdf.php' );
require_once( 'modules/Veta_Recibo/clases/hellosign/HelloSign.php' );

class HelloSign_API
{
    var $margen = 10;    
    var $client;
	var $p;
	var $r;
	

    public function connectToAPI( Veta_Recibo $r ) {
		$this->r=$r;
		
        $this->client = new HelloSign\Client('767cc19074a41528d6fa786dbfd53a1019e002da66f86d8e0787006ed4b140c9');
        
        //$signature_request = $this->client->getSignatureRequest('456b391b2c5e2e3b2d852b328156ccd2ce33b2cb');
	
        //var_dump($signature_request);
		/*
        echo "<br><br><br>".$this->r->id;		
		echo "<br><br><br>".$this->r->veta_recibo_veta_presupuestoveta_presupuesto_ida;
		*/
	
        $this->sendPDFToSign();
		/*
        echo "<br><br><br>";
        echo $this->getLead($this->getRequirement())->email1;
        echo "<br><br><br>";
        echo $this->getRequirement()->veta_requerimiento_leads_name;
		*/

    }

    private function sendPDFToSign() {
        
        //$pdf_file = "C:\\AppServ\\www\\crmsuite\\".$this->p->id.".pdf";		
		//$pdf_file = "/var/www/crm.australiaveta.com.develop/MMMigration/". $this->r->id . ".pdf"; 
		$pdf_file = "/var/www/crm.australiaveta.com.develop/MMMigration/". "COST AGREEMENT-" . $this->r->veta_recibo_leads_name . "-". $this->r->id . ".pdf";
		
		//$this->Output( $this->r->veta_recibo_leads_name.'-Invoice-'.$this->r->id . '.pdf' );
		echo "<br><br><br><br><br><br><br><br><br>";		
		
		
        if (file_exists($pdf_file)) {
            $request = new HelloSign\SignatureRequest;
            $request->enableTestMode();
            $request->setTitle('MMMigration cost agreement - '. $this->r->veta_recibo_leads_name. '');
            $request->setSubject('Please sign the cost agreement.');
            $request->setMessage('Once we receive all signed documentation and the payment, we will provide you with the Document Checklist.');
            $request->addSigner('alopez@australiaveta.com.co', $this->r->veta_recibo_leads_name);
            //$request->addSigner($this->getLead()->email1, $this->getRequirement()->veta_requerimiento_leads_name);
            
            $request->addCC('alopez@australiaveta.com.co');	
            //$path_to_nda_pdf = "C:\\AppServ\\www\\crmsuite\\".$this->p->id.".pdf";
            $path_to_nda_pdf = $pdf_file;
            
            $request->addFile($path_to_nda_pdf);
            $response = $this->client->sendSignatureRequest($request);
			$query = "UPDATE veta_recibo_cstm SET 
						signature_request_id_c = '$response->signature_request_id',
						signature_status_c = 'Awaiting Signature',
						signature_url_c = ''
						WHERE id_c = '".$this->r->id."'";
			//echo "<br><br><br>".$query."<br><br>"; 
			$this->r->db->query( $query );
            //var_dump($response); 
			$this->redireccionar( "The pdf was sent to the client for digital signature" , $this->r->id );

        } else {
            echo "El fichero $pdf_file no existe";
        }   
		//echo "El fichero $pdf_file no existe";
    } 
    
    private function getRequirement() {
		$p = new Veta_Presupuesto();
        $p = retrieve($this->r->veta_recibo_veta_presupuestoveta_presupuesto_ida);
		
        $requerimiento_presupuesto = $p->get_linked_beans( 'veta_requerimiento_veta_presupuesto' , 'Veta_Presupuesto' );
        $id_requermimiento ="";
        foreach( $requerimiento_presupuesto as $req_pre ) {            
            $id_requermimiento = $req_pre->id;
        }

        $req = new Veta_Requerimiento();
        $req->retrieve($id_requermimiento);
        
        return $req;
    }

    private function getLead( $requirement ) {
        
        $this->getRequirement();

        $lead = new Lead();
        $lead->retrieve($requirement->veta_requerimiento_leadsleads_ida);

        return $lead;
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


}
