<?php
require_once( 'modules/Veta_Recibo/clases/hellosign/HelloSign.php' );

class HelloSign_API_Update_Status
{
    var $margen = 10;    
    var $client;
	var $p;
	

    public function signatureStatus( Veta_Recibo $r ) {
		$this->r=$r;
		
        $this->client = new HelloSign\Client('767cc19074a41528d6fa786dbfd53a1019e002da66f86d8e0787006ed4b140c9');		
		
		$signature_request = $this->client->getSignatureRequest($this->r->signature_request_id_c);
		//var_dump($signature_request);
		echo "<br><br><br>";
		$status_code = $signature_request->signatures[0]->status_code;
		$url;
		if($status_code == "signed"){
			$url = "https://app.hellosign.com/attachment/downloadCopy/guid/".$this->r->signature_request_id_c;
		}
			
		
		$query = "UPDATE veta_recibo_cstm SET 						
						signature_status_c = '$status_code',
						signature_url_c = '$url'
						WHERE id_c = '".$this->r->id."'";
			
		$this->r->db->query( $query );
		//echo "<br><br><br>".$query."<br><br>"; 
		$this->r->db->query( $query );
            
		$this->redireccionar( "The Fields where updated" , $this->r->id );
	
        
        //$signature_request = $this->client->getSignatureRequest('456b391b2c5e2e3b2d852b328156ccd2ce33b2cb');
	
        //var_dump($signature_request);
        /*
		echo "<br><br><br>".$this->r->id;		
		echo "<br><br><br>".$this->r->veta_recibo_veta_presupuestoveta_presupuesto_ida;

	
        $this->sendPDFToSign();
        echo "<br><br><br>";
        echo $this->getLead($this->getRequirement())->email1;
        echo "<br><br><br>";
        echo $this->getRequirement()->veta_requerimiento_leads_name;
		*/

    }

    private function sendPDFToSign() {
        
        //$pdf_file = "C:\\AppServ\\www\\crmsuite\\".$this->p->id.".pdf";
		$pdf_file = "/var/www/crm.australiaveta.com.develop/MMMigration/".$this->r->id.".pdf";
		

        if (file_exists($pdf_file)) {
            $request = new HelloSign\SignatureRequest;
            $request->enableTestMode();
            $request->setTitle('MMMigration Invoice');
            $request->setSubject('Sing the invoice to continue with the process');
            $request->setMessage('Please validate and sign this invoice, then we can discuss more. Let me know if you have any questions.');
            $request->addSigner('alopez@australiaveta.com.co', 'Jonny Pacheco Moreno');
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
			echo "<br><br><br>".$query."<br><br>"; 
			$this->r->db->query( $query );
            var_dump($response); 
			$this->redireccionar( "The pdf was sent to the client for digital signature" , $this->r->id );

        } else {
            echo "El fichero $pdf_file no existe";
        }                
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
