<?php

require_once( 'include/MVC/View/views/view.edit.php' );
require_once( 'modules/Veta_Recibo/clases/Media.php' );
require_once( 'modules/EmailTemplates/EmailTemplate.php' );
require_once( 'modules/Veta_Recibo/clases/ReciboPDF.php' );

class Veta_ReciboViewSend extends ViewEdit
{

    /**
     * @param Veta_Recibo $r
     * @param Email $email
     * @return Note
     */
    private function crear_nota( Veta_Recibo $r, Email $email ) {

        global $sugar_config;

        $emailObj = new Email();
        $path_pdf = $r->id . ".pdf";

        $note = new Note();
        $note->id = create_guid();
        $note->new_with_id = true;

        $note->parent_id = $email->id;
        $note->parent_type = $email->module_dir;
        $note->name = "Recibo.pdf";
        $note->filename = "Recibo.pdf";
        $note->file_mime_type = $emailObj->email2GetMime($path_pdf);
        $noteFile = "{$sugar_config['upload_dir']}{$note->id}";

        if(!copy($path_pdf, $noteFile))
        {
            $GLOBALS['log']->debug("EMAIL 2.0: could not copy attachment file to cache/upload [ {$noteFile} ]");
        }

        $note->save();
        return $note;
    }

    /**
     * @param string $to
     * @param Veta_Recibo $r
     * @param EmailTemplate $tEmail
     * @return Email
     */
    private function crear_email( string $to, Veta_Recibo $r, EmailTemplate $tEmail ) {

        $admin = new Administration();
        $admin->retrieveSettings();

        $emailObj = new Email();
        $emailObj->to_addrs = $to;
        $emailObj->type = 'archived';
        $emailObj->deleted = '0';
        $emailObj->name = $tEmail->subject;
		
		//$emailObj->attachments = $tEmail->attachments;
		$emailObj->attachments = $tEmail->getAttachments();
        //$tEmail->getAttachments();
		
        $emailObj->description = null;
        $emailObj->description_html = $tEmail->body_html;
        $emailObj->from_addr = $admin->settings[ 'notify_fromaddress' ];

        if( $r instanceOf SugarBean && ! empty( $r->id ) ) {
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

    /*
    function preDisplay() {

		global $sugar_config, $current_user;
        $o = null;

        $r = new Veta_Recibo();
        $r->retrieve( $_REQUEST[ 'rid' ] );
		
		$requeriment = new Veta_Requerimiento();
        $requeriment->retrieve($r->veta_requerimiento_veta_reciboveta_requerimiento_ida);
		
		$company = new NVC_Companies;
		$company->retrieve($requeriment->nvc_companies_veta_requerimiento_1nvc_companies_ida);

        if( ! empty( $r->veta_recibo_contactscontacts_ida ) ) {

            $o = new Contact();
            $o->retrieve( $r->veta_recibo_contactscontacts_ida );
        }

        if( ! empty( $r->veta_recibo_leadsleads_ida ) ) {

            $o = new Lead();
            $o->retrieve( $r->veta_recibo_leadsleads_ida );
        }

        if( $o != null ) {

            $tEmail = new EmailTemplate();
			if($r->send_form_956_c == 0){
				error_log("Recibos en 0"); 
				$tEmail->retrieve('c55e4f06-e09c-026b-da3e-6787dedc8bb2');
			} else {
				$tEmail->retrieve('recibo');
				error_log("Recibos en 1");
			}
			
			if ($r->emailtemplate_id_c != "") {
				$tEmail->retrieve( $p->emailtemplate_id_c );
			}	
			
			$u = new User();
			//$u->retrieve($o->assigned_user_id);
            $u->retrieve($current_user->id); 

            $tEmail->body_html = html_entity_decode( $tEmail->body_html , ENT_COMPAT | ENT_HTML401 , "UTF-8" );
            $tEmail->body_html = str_replace( "$" . "cliente" , $o->name , $tEmail->body_html );
            $tEmail->body_html = str_replace( "$" . "assigned_user_name" , $u->name , $tEmail->body_html );

            $media = new MediaRecibo();
			
			$file_name = 'COST AGREEMENT-' . $this->string_replace_pdf_name($r->veta_recibo_leads_name) .'-'.$r->name . '.pdf';			
            
            if(empty($tEmail->id))
                $this->redireccionar('No fue posible enviar el email porque no existe la plantilla de correo con id recibo', $r->id);
	
			//if( $media->send_email( $o->email1 , $tEmail->body_html , $tEmail->subject, $r->id . '.pdf', 'Consumer_Guide_New.pdf', 'Form_956_CHOW0005_Applicant.pdf' ) ) {		
			
				
			//if($requeriment->id == '587fd756-109d-e4b6-dfce-61f1d88d1a09'){
				if((isset($requeriment->applicant_first_invoice_sent_c)) and ($requeriment->applicant_first_invoice_sent_c != 1)){						
					$db = DBManagerFactory::getInstance();
					$cambio = 1;
					$q = "UPDATE veta_requerimiento_cstm SET applicant_first_invoice_sent_c = '" . $cambio . "' WHERE id_c = '" . $requeriment->id . "'";                
					$db->query($q);
					$q = "UPDATE veta_requerimiento SET estado = 'Cost_Agreement_Sent' WHERE id = '" . $requeriment->id . "'";                
					$db->query($q);
					error_log("auto_consultation - se envio y acutalizo el estado del requerimiento " . $requeriment->name);
											
				} //else if((isset($requeriment->applicant_first_invoice_sent_c)) and ($requeriment->applicant_first_invoice_sent_c != '')){}
			//}
			//"INV-AP-".$this->r->name
			//if( $media->send_email( $o->email1 , $tEmail->body_html , $tEmail->subject, 'COST AGREEMENT-' . $this->string_replace_pdf_name($r->veta_recibo_leads_name) .'-'.$r->name . '.pdf', 'Consumer_Guide_New.pdf', 'Form_956_Applicant.pdf' ) ) {				
            if( $media->send_email( $o->email1 , $tEmail->body_html , $tEmail->subject . ' - Invoice Number: "INV-AP-' . $r->name . '" - Leap ID Number: ' . $requeriment->leap_id, $sugar_config[ "upload_dir" ]  . $file_name, 'Consumer_Guide_New.pdf', 'Form_956_Applicant-2024.pdf' ) ) {				

                $emailObj = $this->crear_email($o->email1, $r, $tEmail);
                $nota = $this->crear_nota($r, $emailObj);

                $r->load_relationship(veta_recibo_emails);
                $r->veta_recibo_emails->add($emailObj->id);
                //$r->new_opportunity();
				$this->redireccionar('Email have been sent to '.$o->email1, $r->id);
				
				
				
				

            }
            else{
                $this->redireccionar('No fue posible enviar el email por favor revisa la configuración de correo de tu cuenta', $r->id);
            }
        }

        header("Location: index.php?module=Veta_Recibo&action=DetailView&record=" . $r->id);
    }
	*/
	
	function preDisplay() {

		global $sugar_config, $current_user;
		$o = null;

		$r = new Veta_Recibo();
		$r->retrieve( $_REQUEST[ 'rid' ] );
		
		$requeriment = new Veta_Requerimiento();
		$requeriment->retrieve($r->veta_requerimiento_veta_reciboveta_requerimiento_ida);
		
		$company = new NVC_Companies;
		$company->retrieve($requeriment->nvc_companies_veta_requerimiento_1nvc_companies_ida);

		if( ! empty( $r->veta_recibo_contactscontacts_ida ) ) {
			$o = new Contact();
			$o->retrieve( $r->veta_recibo_contactscontacts_ida );
		}

		if( ! empty( $r->veta_recibo_leadsleads_ida ) ) {
			$o = new Lead();
			$o->retrieve( $r->veta_recibo_leadsleads_ida );
		}

		if( $o != null ) {

			$tEmail = new EmailTemplate();

			if($r->send_form_956_c == 0){
				error_log("Recibos en 0"); 
				// Plantilla para send_form_956_c == 0
				$tEmail->retrieve('c55e4f06-e09c-026b-da3e-6787dedc8bb2');
			} else {
				error_log("Recibos en 1");
				// Plantilla para send_form_956_c != 0
				$tEmail->retrieve('recibo');
			}
			
			if ($r->emailtemplate_id_c != "") {
				$tEmail->retrieve( $p->emailtemplate_id_c );
			}  

			error_log("email_template send" . $tEmail->id ); 			

			$u = new User();
			$u->retrieve($current_user->id); 

			// Ajuste del HTML
			$tEmail->body_html = html_entity_decode( $tEmail->body_html , ENT_COMPAT | ENT_HTML401 , "UTF-8" );
			$tEmail->body_html = str_replace( "$" . "cliente" , $o->name , $tEmail->body_html );
			$tEmail->body_html = str_replace( "$" . "assigned_user_name" , $u->name , $tEmail->body_html );

			$media = new MediaRecibo();
			
			// Nombre del PDF principal
			$file_name = 'COST AGREEMENT-' . $this->string_replace_pdf_name($r->veta_recibo_leads_name) .'-'.$r->name . '.pdf';          
			
			if(empty($tEmail->id)){
				$this->redireccionar('No fue posible enviar el email porque no existe la plantilla de correo con id recibo', $r->id);
			}

			// Marcar acciones (actualizar campos) según la lógica que ya tenías
			if((isset($requeriment->applicant_first_invoice_sent_c)) && ($requeriment->applicant_first_invoice_sent_c != 1)){                        
				$db = DBManagerFactory::getInstance();
				$cambio = 1;
				$q = "UPDATE veta_requerimiento_cstm SET applicant_first_invoice_sent_c = '" . $cambio . "' WHERE id_c = '" . $requeriment->id . "'";                
				$db->query($q);
				$q = "UPDATE veta_requerimiento SET estado = 'Cost_Agreement_Sent' WHERE id = '" . $requeriment->id . "'";                
				$db->query($q);
				error_log("auto_consultation - se envio y acutalizo el estado del requerimiento " . $requeriment->name);
			}

			// -------------------------------------
			// Envío del email con adjuntos condicionales
			// -------------------------------------
			$sendResult = false;

			// Armamos asunto
			$finalSubject = $tEmail->subject 
				. ' - Invoice Number: "INV-AP-' . $r->name 
				. '" - Leap ID Number: ' . $requeriment->leap_id;

			if ($r->send_form_956_c == 0) {
				// Si NO debemos enviar Form_956_Applicant-2024.pdf
				$sendResult = $media->send_email(
					$o->email1,
					$tEmail->body_html,
					$finalSubject,
					$sugar_config["upload_dir"] . $file_name,
					'Consumer_Guide_New.pdf'
				);
			} else {
				// Si SÍ debemos enviar Form_956_Applicant-2024.pdf
				$sendResult = $media->send_email(
					$o->email1,
					$tEmail->body_html,
					$finalSubject,
					$sugar_config["upload_dir"] . $file_name,
					'Consumer_Guide_New.pdf',
					'Form_956_Applicant-2024.pdf'
				);
			}

			// Si el envío fue exitoso
			if ($sendResult) {

				$emailObj = $this->crear_email($o->email1, $r, $tEmail);
				$nota = $this->crear_nota($r, $emailObj);

				$r->load_relationship('veta_recibo_emails');
				$r->veta_recibo_emails->add($emailObj->id);

				$this->redireccionar('Email have been sent to '.$o->email1, $r->id);

			} else {
				// Error en el envío
				$this->redireccionar('No fue posible enviar el email. Revisa la configuración de correo.', $r->id);
			}
		}

		// Redirección final
		header("Location: index.php?module=Veta_Recibo&action=DetailView&record=" . $r->id);
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