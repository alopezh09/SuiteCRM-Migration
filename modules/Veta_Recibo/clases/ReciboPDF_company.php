<?php

require_once( 'modules/Veta_College/Veta_College.php' );
require_once( 'modules/Veta_Presupuesto/clases/fpdf16/fpdf.php' );

class ReciboPDF_company extends FPDF
{
    var $margen = 10;
    var $r = null;
    var $total_depositos = 0;
    var $descuento = 0;
	var $total_refunds = 0;
    
    var $total_visabuclass_fees = 0;
    var $total_visabuclass_fees_GST = 0;  
    
    var $company_total_visa = 0;
    
    var $consultation_fee = 0;
    var $lead_name = "";
    var $taxes_Department_Credit_Card = 0; //1.4
    var $taxes_GST = 0; //10%
    
    var $total_taxes_Department_Credit_Card = 0;    
    var $total_taxes_GST = 0;

    var $examen_medico = 0;

    var $curso_name = array();
    var $curso_description = array();

    var $company_name;
    var $secondary_aplicant_name;
    var $dependent_name;
    var $second_dependent_name;
    var $third_dependent_name;
	var $fourth_dependent_name;

    var $company_new_services;
	
	var $requeriment;
	var $company;
	
	var $label_invoice = "TAX INVOICE";

    public function generate_pdf( Veta_Recibo $r ) {

        global $sugar_config;
        $this->r = $r;
		
		$requermimento_presupuesto = $this->r->get_linked_beans( 'veta_requerimiento_veta_recibo' , 'Veta_Recibo' );
        $id_requermimiento ="";
        foreach( $requermimento_presupuesto as $req_pre ) {            
            $id_requermimiento = $req_pre->id;
        }

        $this->requeriment = new Veta_Requerimiento();
        $this->requeriment->retrieve($id_requermimiento);
		
		$this->company = new NVC_Companies;
		$this->company->retrieve($this->requeriment->nvc_companies_veta_requerimiento_1nvc_companies_ida);

        $taxes_fees = new NVC_Taxes_and_Fees_Config;
        $taxes_fees->retrieve("c83b8f80-f55b-6938-0b3d-6156426782bf");        
        
        $this->taxes_GST = $taxes_fees->gst /100;
        $this->taxes_Department_Credit_Card= $taxes_fees->department_cc_surcharge / 100;

        $this->SetMargins( $this->margen , $this->margen , $this->margen );
        $this->AddPage();

        $this->print_invoice_detail();
        
        $this->print_details();        
		$this->comments_notes();
        $this->print_abonos();
        $this->print_sponsored_people();
         
        // $this->print_notas();
        $this->account_data();        
        $this->print_legals($this->curso_name, $this->curso_description);
        
		$this->signature();

        //$this->Output( $this->r->id . '.pdf' );
		$this->Output( "COST AGREEMENT-" . $this->string_replace_pdf_name($this->company->name) ."-".$this->r->name . ".pdf" );
		$this->Output($sugar_config['upload_dir']  . "COST AGREEMENT-" . $this->string_replace_pdf_name($this->company->name) ."-".$this->r->name . ".pdf", 'F');

    }
	
	private function string_replace_pdf_name($str)
    {
        $a = array("'","´","&#039;","@","/");
        $b = array("","","","","");
        return str_replace($a,$b,$str);
    }

    public function header() {

        $this->SetDrawColor( 123 , 72 , 156 );
        $this->SetLineWidth( 10 );
        $this->Line( 0 , 0 , $this->w , 0 );

        $this->Image( 'company_logos.jpg' , 12 , 10 , 50 );

        $requermimento_presupuesto = $this->r->get_linked_beans( 'veta_requerimiento_veta_recibo' , 'Veta_Recibo' );
        $id_requermimiento ="";
        foreach( $requermimento_presupuesto as $req_pre ) {            
            $id_requermimiento = $req_pre->id;
        }

        $req = new Veta_Requerimiento();
        $req->retrieve($id_requermimiento);

        //Comenzamos a escribir el PDF:
        $this->SetFont( 'Arial' , 'B' , 10 );
        $this->SetTextColor( 45 , 45 , 45 );
        $this->SetLineWidth( 0.2 ); 
        $this->Ln( 5 );

        $nombre = empty( $this->r->veta_recibo_leads_name ) ? $this->r->veta_recibo_contacts_name : $this->r->veta_recibo_leads_name;

        $this->SetFont( 'Arial' , '' , 14 );
        //$this->Cell( 0 , 3 , utf8_decode( $this->label_invoice ) , 0 , 0 , 'R' );
        $this->MultiCell( 0 , 3 , utf8_decode( strtoupper( $this->label_invoice ) ) , 0 , 'R' );

        $this->Ln( 2 );

        $this->SetFont( 'Arial' , 'B' , 12 );
        $this->MultiCell( 0 , 3 , utf8_decode( strtoupper( $req->company_name ) ) , 0 , 'R' );
        $this->Ln( 2 );
        $this->SetFont( 'Arial' , 'B' , 9 );
        $this->MultiCell( 0 , 3 , utf8_decode( 'SPONSOR TO: ' . strtoupper( $req->veta_requerimiento_leads_name ) ) , 0 , 'R' ); 
		$this->Ln( 1 );
		
		if(!empty( $req->leap_id ) and (isset($req->leap_id))) 
		{
			$this->MultiCell( 0 , 3 , utf8_decode( 'APPLICANT LEAP ID: ' . strtoupper( $req->leap_id ) ) , 0 , 'R' ); 
		}
		
        $this->Ln(6);       

        
        $this->lead_name = $req->veta_requerimiento_leads_name;
        $this->company_name = $req->company_name;
        $this->secondary_aplicant_name = $req->secondary_aplicant_name;
        $this->dependent_name = $req->dependent_name;
        $this->second_dependent_name = $req->second_dependent_name;
        $this->third_dependent_name = $req->third_dependent_name;
		
		$this->fourth_dependent_name = $req->fourth_dependent_name_c;

        //$this->print_line( $this->GetY() );
        if($req->consultation_fee_to_company_c == 1){
			$this->consultation_fee = $req->consultation_fee;
		} else {
			$this->consultation_fee = 0;
		}
        // $this->Cell( 0 , 3 , utf8_decode( strtoupper( substr( $nombre , 0 , 26 ) ) ) , 0 , 0 , 'R' ); 


        // $this->print_applicantsDetails ("Company Name: ", $this->company_name);
        // $this->print_applicantsDetails ("Secondary Applicant Name: ", $this->secondary_aplicant_name);
        // $this->print_applicantsDetails ("Dependent Name: ", $this->dependent_name);
        // $this->print_applicantsDetails ("Second Dependent Name: ", $this->second_dependent_name);
        // $this->print_applicantsDetails ("Third Dependent Name: ", $this->third_dependent_name);
        // $this->MultiCell( 0 , 3 , utf8_decode( " ") , 0 , 'R' );
        // $this->Ln( 3 );
        // $this->rightTextInfo("Company Name: ", $this->company_name, "", "7");
        // $this->rightTextInfo("Secondary Applicant Name: ", $this->secondary_aplicant_name, "", "7");
        // $this->rightTextInfo("Dependent Name: ", $this->dependent_name, "", "7");
        // $this->rightTextInfo("Second Dependent Name: ", $this->second_dependent_name, "", "7");
        // $this->rightTextInfo("Third Dependent Name: ", $this->third_dependent_name, "", "7");

        //$this->print_line( $this->GetY() );

        // $this->Ln( 6 );
        $this->SetFont( 'Arial' , '' , 7 );
        //$this->Cell( 0 , 3 , utf8_decode( "Invoice Date " . substr( $this->r->date_modified , 0 , 10 ) ) , 0 , 0 , 'L' );
        
        // $this->leftTextInfo("Invoice Date ", "B", 8);
        // $this->leftTextInfo($this->r->date_modified, "", 8);
        // $this->leftTextInfo(" | Invoice Due Date ", "B", 8);
        // $this->leftTextInfo(date('d/m/Y', strtotime($this->r->date_modified. ' + 5 days')), "", 8);
        


        // $this->MultiCell( 0 , 3 , utf8_decode( " ") , 0 , 'L' );

        /*$this->Ln( 4 );
        $this->SetTextColor( 255 , 49 , 38 );
        $this->Cell( 0 , 3 , utf8_decode( "Vigencia :  1 semana" ) , 0 , 0 , 'R' );  */
        // $this->Ln( 3 );
        $this->SetTextColor( 45 , 45 , 45 );
        // $this->Cell( 0 , 3 , utf8_decode( "ID 1.603" ) , 0 , 0 , 'L' );


        // $this->MultiCell( 0 , 3 , utf8_decode( " ") , 0 , 'R' ); 
        // $this->SetFont( 'Arial' , '' , 17 );
        // $this->Cell( 0 , 3 , utf8_decode( "TAX INVOICE" ) , 0 , 0 , 'R' );

        $this->SetTextColor( 45 , 45 , 45 );
        
        // $this->Ln( 5 );
        $this->SetFont( 'Arial' , '' , 8 );
        $nombre = empty( $this->r->veta_recibo_leads_name ) ? $this->r->veta_recibo_contacts_name : $this->r->veta_recibo_leads_name;
        // $this->Cell( 30 , 6 , utf8_decode( strtoupper( substr( $nombre , 0 , 26 ) ) ) , 0 , 0 , 'L' );
        // $this->MultiCell( 0 , 3 , utf8_decode( " ") , 0 , 'L' );
        $this->MultiCell( 0 , 3 , utf8_decode( " ") , 0 , 'L' );

        // $this->Ln( 10 );
        
        // $this->additional_info_applicant("Company Name: ", $req->company_name);
        // $this->additional_info_applicant("Secondary Applicant Name: ", $req->secondary_aplicant_name);   
        // $this->additional_info_applicant("Dependent Name: ", $req->dependent_name);
        // $this->additional_info_applicant("Second Dependent Name: ", $req->second_dependent_name);
        // $this->additional_info_applicant("Third Dependent Name: ", $req->third_dependent_name);          
        // $this->MultiCell( 0 , 3 , utf8_decode( " ") , 0 , 'R' ); 
        // $this->MultiCell( 0 , 3 , utf8_decode( " ") , 0 , 'R' );         
        

        // $this->MultiCell( 0 , 3 , utf8_decode( " ") , 0 , 'L' );
        // $this->MultiCell( 0 , 3 , utf8_decode( " ") , 0 , 'L' );
        
        
        // $this->MultiCell( 0 , 3 , utf8_decode( " ") , 0 , 'R' );         
        

        // $this->MultiCell( 0 , 3 , utf8_decode( " ") , 0 , 'L' );
        // $this->MultiCell( 0 , 3 , utf8_decode( " ") , 0 , 'L' );
        

    }
    
    

    private function additional_info_applicant ($label_title, $variable_value) {
        if (!empty($variable_value))
        {
            $this->SetFont( 'Arial' , 'B' , 8 );
            $this->Ln( 4 );
            $this->Cell( 160 , 6 , utf8_decode($label_title) , 0 , 0 , 'R' , false );  

            $this->SetFont( 'Arial' , '' , 8 );
            $this->Cell( 0 , 6 , utf8_decode($variable_value) , 0 , 0 , 'R' , false );
        }
    }

    private function print_line( $y ) {

        $this->SetDrawColor( 192 , 192 , 192 );
        $this->SetLineWidth( 0.35 );
        $this->Line( $this->margen , $y , $this->w - $this->margen , $y );
    }

    private function print_separator( $y ) {

        $this->SetDrawColor( 192 , 192 , 192 );
        $this->SetLineWidth( 1 );
        $this->Line( $this->margen , $y , $this->w - $this->margen , $y );
    }

    private function print_additional_services(){
        $this->SetFont( 'Arial' , 'B' , 9 );        
        $this->Ln( 3 );
        $this->MultiCell(0,3,utf8_decode( 'ADITIONAL SERVICES: ') , 0 , 'L' );
        $this->Ln( 3 );
        $this->print_line( $this->getY() );

        $company_aditional_services = $this->r->get_linked_beans( 'veta_recibo_nvc_other_billing_services_company_1', 'NVC_Other_Billing_Services_Company' );    
        $this->company_new_services = 0;

        foreach ( $company_aditional_services as $cas )
        {
            $this->print_billing_info($cas->description, $cas->deposit_amount, '+','',8);
            $this->company_new_services += $cas->deposit_amount * 1;
        }
        $this->print_billing_info("TOTAL ADITIONAL SERVICES", $this->company_new_services, '+','B',9);         
        $this->MultiCell( 0 , 3 , utf8_decode( " ") , 0 , 'R' );
    }

    private function print_curso( Veta_DetalleRecibo $d ) {

        global $app_list_strings;
        // ---------------------------------------------------- COLLEGE Y CURSO ----------------------------------------

        $this->SetTextColor( 45 , 45 , 45 );
        $c = new Veta_College();
        $c->retrieve( $d->veta_college_id_c );

        $curso = new Veta_Curso();
        $curso->retrieve($d->veta_curso_id_c);
        
        $this->SetFont( 'Arial' , 'B' , 9 );       

        $fees = 0;
        $fees_visasubclass = $curso->get_linked_beans( 'veta_curso_veta_college_1' , 'Veta_College' );
        $first_interaction = 0;

        // foreach( $fees_visasubclass as $fee_visa ) {  
        //     $this->print_billing_info("Fee: ". $fee_visa->name, $fee_visa->company_fee_c, '+','',8);
        //     $fees = $fees + $fee_visa->company_fee_c;
        // }

        // foreach( $fees_visasubclass as $fee_visa ) {  
        //     if ($fee_visa->type_of_fee_c == 'Company') {
        //         $this->print_billing_info("". $fee_visa->name, $fee_visa->fee, '+','',8);
        //         $fees = $fees + $fee_visa->fee;
        //     }
        // }

        foreach( $fees_visasubclass as $fee_visa ) {  
            if ($fee_visa->type_of_fee_c == 'Company') {
                if ($fee_visa->fee > 0) {
                    if ($first_interaction == 0){
                        
                        $this->SetFont( 'Arial' , 'B' , 9 );
                        
                        $this->Ln( 3 );                        
                        
						if((isset($curso->display_name_c)) and ($curso->display_name_c != '')){
							//$this->MultiCell( 0 , 3 , utf8_decode( 'VISA SUBCLASS: ' . strtoupper( htmlspecialchars_decode($curso->display_name_c) ) ) , 0 , 'L' );
							$this->MultiCell( 0 , 3 , utf8_decode( 'PROCESS: ' . strtoupper( htmlspecialchars_decode($curso->display_name_c) ) ) , 0 , 'L' );
						} else {
							//$this->MultiCell( 0 , 3 , utf8_decode( 'VISA SUBCLASS: ' . strtoupper( htmlspecialchars_decode($d->name) ) ) , 0 , 'L' );
							$this->MultiCell( 0 , 3 , utf8_decode( 'PROCESS: ' . strtoupper( htmlspecialchars_decode($d->name) ) ) , 0 , 'L' );
						}

                        $this->Ln( 4 );

                        $this->print_line( $this->getY() );
                        $first_interaction++;
                    }
                    $this->print_billing_info("". $fee_visa->name, $fee_visa->fee, '+','',8);
                    $fees = $fees + $fee_visa->fee;
                }                
            }
        }

        if ($fees > 0) {
            $this->print_billing_info("SUBTOTAL FEES", $fees, '+','B',9);  
        }
       

        $this->total_visabuclass_fees = $this->total_visabuclass_fees + $fees;

        // ---------------------------------------------------- OTROS ----------------------------------------
        $detalles = $d->get_linked_beans( 'veta_detallereciboitem_veta_detallerecibo' , 'Veta_DetalleReciboItem' );

        foreach( $detalles as $detalle ) {

            $this->Ln( 5 );
            $this->Cell( 5 );
            $this->Cell( 50 , 3 , utf8_decode( $detalle->name ) , 0 , 0 , 'L' );
            $this->Cell( 0 , 3 , utf8_decode( number_format( ( $detalle->monto * 1 ) , 2 , '.' , ',' ) ) . ' AUD' , 0 , 0 , 'R' );
        }

        
        $this->total_depositos += ( $d->deposito * 1 );
        $this->descuento += ($d->bono * 1);
        

        $this->Ln( 7 );

        $this->SetFont( 'Arial' , '' , 9 );

        
        array_push($this->curso_name, $curso->name);
        array_push($this->curso_description, $curso->terms_and_conditions_company_c);        
    }

    private function extra_fees() {
        if ($this->r->additional_cost_company_amount_c != 0) {
			
			$this->SetFont( 'Arial' , 'B' , 9 );
			$this->Ln( 3 );
			$this->MultiCell( 0 , 3 , utf8_decode( 'Additional Fees' ) , 0 , 'L' );
			$this->Ln( 4 );
			$this->print_line( $this->getY() );
			$this->print_billing_info($this->r->additional_cost_company_label_c, $this->r->additional_cost_company_amount_c, '+','',8);

        
            $this->print_billing_info("SUBTOTAL FEES", $this->r->additional_cost_company_amount_c, '+','B',9);
			
			$this->total_visabuclass_fees = $this->total_visabuclass_fees + $this->r->additional_cost_company_amount_c;    

			$this->SetFont( 'Arial' , '' , 9 );
        }
                

        

    }
    private function additional_fees() {

        global $app_list_strings;
        $additional_fees_list = $this->r->get_linked_beans( 'veta_recibo_veta_college_1' , 'Veta_College' );

        // ---------------------------------------------------- COLLEGE Y CURSO ----------------------------------------

        $first_interaction = 0;
        $fees = 0;

        foreach( $additional_fees_list as $detalle ) {
            if ($detalle->type_of_fee_c == 'Company') {
                if ($detalle->fee > 0) {
                    if ($first_interaction == 0){
                        $this->SetFont( 'Arial' , 'B' , 9 );
                        $this->Ln( 3 );
                        $this->MultiCell( 0 , 3 , utf8_decode( 'Additional Fees' ) , 0 , 'L' );
                        $this->Ln( 4 );
                        $this->print_line( $this->getY() );
                        $first_interaction++;
                    }
                    $this->print_billing_info("". $detalle->name, $detalle->fee, '+','',8);
                    
                }
                $fees = $fees + $detalle->fee;
            }
        }
        if ($fees > 0) {
            $this->print_billing_info("SUBTOTAL FEES", $fees, '+','B',9);
            $this->Ln( 7 );
            $this->SetFont( 'Arial' , '' , 9 );
        }
                

        $this->total_visabuclass_fees = $this->total_visabuclass_fees + $fees;   

    }
    
    private function string_replace($str)
    {
        $a = array("&#039;","&lt;","&gt;","&amp;","&nbsp;","&apos;","&#145;","&#146;","&quot;");
        $b = array("'","<",">","&"," ","'","'","'","'");
        return str_replace($a,$b,$str);
    }

    private function print_legals($array_name, $array_description){
		$this->label_invoice = "COST AGREEMENT";
        
        foreach( $array_description as $legales_cursos_name ) {              
            $this->AddPage();
            $this->Ln( 11 );
            $this->MultiCell( 0 , 3 , utf8_decode( " ") , 0 , 'R' );

            $this->SetFont( 'Arial' , '' , 9 );             
            $this->MultiCell( 0 , 3 ,$this->string_replace(utf8_decode( $legales_cursos_name )), 0 , 'L' );            
        }

    }
    private function print_billing_info ($label_title, $variable_value, $signo, $weight = '', $size = 8) {
        ($signo=='-') ? $signo='-' : $signo='';
        ($weight=='') ? $weight='' : $weight='B';
        $this->SetFont( 'Arial' , $weight , $size );
        $this->Ln( 5 );
        $this->Cell( 5 );
        $this->Cell( 100 , 3 ,$this->string_replace(utf8_decode($label_title)) , 0 , 0 , 'L' );
        $this->Cell( 0 , 3 , $signo.' '.utf8_decode( number_format( ( $variable_value * 1 ) , 2 , '.' , ',' ) ) . ' AUD' , 0 , 0 , 'R' );
    }

    private function print_servicios( Veta_Recibo $r ) {

        //if( ( ! empty( $r->examen_medico ) and $r->examen_medico > 0 ) or ( ! empty( $r->seguro ) and $r->seguro > 0 ) or ( ! empty( $r->total_visa ) and $r->total_visa > 0 ) ) {

            $this->Ln( 4 );
            $this->SetFont( 'Arial' , 'B' , 9 );
            $this->Cell( 0 , 3 , utf8_decode( "VISA SUBCLASS " ) , 0 , 0 , 'L' );
            $this->Ln( 4 );
            $this->print_line( $this->getY() );

            $this->SetFont( 'Arial' , '' , 8 );
            
            $this->print_billing_info ("Subtotal MMM Fees", $this->total_visabuclass_fees, '+','',8);                                 
            
			$this->print_billing_info ("Consultation Fee", $this->consultation_fee, '-','',8);            
            
            //$this->print_billing_info ("Subtotal Aditional Services", $this->r->company_aditional_services_c, '+','',8);            

            $this->descuento = ( $this->r->company_discount_c * 1 );
            $this->print_billing_info ("Discount", $this->descuento, '-','',8);            
            
            $this->print_billing_info ("TOTAL WITHOUT GST", ($this->total_visabuclass_fees - $this->descuento - $this->consultation_fee ), '+','B',9);
            
			$this->total_taxes_GST = ($this->total_visabuclass_fees - $this->consultation_fee - $this->descuento) * $this->taxes_GST;
			
			
            $this->print_billing_info ("GST (10%)", $this->total_taxes_GST, '+','',8);  
			
            $this->total_visabuclass_fees_GST = $this->total_taxes_GST + ($this->total_visabuclass_fees - $this->consultation_fee - $this->descuento);
            $this->print_billing_info ("Total MMM FEES", $this->total_visabuclass_fees_GST, '+','B',10);  
            //total_visabuclass_fees_GST


            $this->Ln( 7 );
            $this->SetFont( 'Arial' , 'B' , 9 );
            // $this->Cell( 0 , 3 , utf8_decode( "DEPARTMENTS OF HOME AFFAIRS " ) , 0 , 0 , 'L' );
			$this->Cell( 0 , 3 , utf8_decode( "DEPARTMENT " ) , 0 , 0 , 'L' );
            $this->Ln( 4 );
            $this->print_line( $this->getY() );

            $this->SetFont( 'Arial' , '' , 8 );

            if( ! empty( $r->examen_medico ) and ( $r->examen_medico * 1 ) > 0 ) {

                $this->Ln( 5 );
                $this->Cell( 5 );
                $this->Cell( 100 , 3 , utf8_decode( "Examen Médico " ) , 0 , 0 , 'L' );
                $this->Cell( 0 , 3 , utf8_decode( number_format( ( $r->examen_medico * 1 ) , 2 , '.' , ',' ) ) . ' AUD' , 0 , 0 , 'R' );
            }

            if( ! empty( $r->seguro ) and $r->seguro > 0 ) {
                $this->Ln( 5 );
                $this->Cell( 5 );

                $my_seguro = '';
                if( ! empty( $r->duracion ) )
                    $my_seguro = "( " . $r->asegurador . " " . $r->duracion . " meses " . $r->tipo_seguro . " )";

                // $this->Cell( 100 , 3 , utf8_decode( "Insurance Value " . $my_seguro . " " ) , 0 , 0 , 'L' );
                // $this->Cell( 0 , 3 , utf8_decode( number_format( ( $r->seguro * 1 ) , 2 , '.' , ',' ) ) . ' AUD' , 0 , 0 , 'R' );
            }

            //if( ! empty( $r->total_visa ) and $r->total_visa > 0 ) {

                $visa = new Veta_TiposVisa();
                $visa->retrieve($r->veta_tiposvisa_id_c);

                /* New Department Visa Fees */
                $department_visa_fee_1 = new Veta_TiposVisa();
                $department_visa_fee_1 -> retrieve($r->veta_tiposvisa_id6_c);
                $department_visa_fee_2 = new Veta_TiposVisa();
                $department_visa_fee_2 -> retrieve($r->veta_tiposvisa_id7_c);
                $department_visa_fee_3 = new Veta_TiposVisa();
                $department_visa_fee_3 -> retrieve($r->veta_tiposvisa_id8_c);
                $department_visa_fee_4 = new Veta_TiposVisa();
                $department_visa_fee_4 -> retrieve($r->veta_tiposvisa_id9_c);


                $r->company_total_visa = 0;                

                if ($department_visa_fee_1->total_visa > 0)  {
                    $this->print_billing_info (html_entity_decode($department_visa_fee_1->name), $department_visa_fee_1->total_visa, '+','',8);
                    $r->company_total_visa += $department_visa_fee_1->total_visa;
                }
                if ($department_visa_fee_2->total_visa > 0)  {
                    $this->print_billing_info (html_entity_decode($department_visa_fee_2->name), $department_visa_fee_2->total_visa, '+','',8);
                    $r->company_total_visa += $department_visa_fee_2->total_visa;
                }
                if ($department_visa_fee_3->total_visa > 0)  {
                    $this->print_billing_info (html_entity_decode($department_visa_fee_3->name), $department_visa_fee_3->total_visa, '+','',8);
                    $r->company_total_visa += $department_visa_fee_3->total_visa;
                }
                if ($department_visa_fee_4->total_visa > 0)  {
                    $this->print_billing_info (html_entity_decode($department_visa_fee_4->name), $department_visa_fee_4->total_visa, '+','',8);
                    $r->company_total_visa += $department_visa_fee_4->total_visa;
                }
				
				
				if ($this->r->additional_company_department_fees_amount_c > 0)  {
                    $this->print_billing_info ("" . html_entity_decode($this->r->additional_company_department_fees_label_c) . "", $this->r->additional_company_department_fees_amount_c, '+','',8);
                    $r->company_total_visa += $this->r->additional_company_department_fees_amount_c;
                } else {
					if ($this->r->additional_company_department_fees_amount_c < 0)  {
						$this->print_billing_info ("" . html_entity_decode($this->r->additional_company_department_fees_label_c) . "", $this->r->additional_company_department_fees_amount_c, '','',8);
						$r->company_total_visa += $this->r->additional_company_department_fees_amount_c;
					}
				}
				
				
				$this->company_total_visa = $r->company_total_visa;

                /* New Department Visa Fees */

                
                //$this->print_billing_info ("Department's Visa Fee - Base application charge ( " . $visa->name . " )", $visa->company_total_visa_c, '+','',8);
                $this->total_taxes_Department_Credit_Card += $r->company_total_visa * ($this->taxes_Department_Credit_Card);   
                //$this->company_total_visa = $visa->company_total_visa_c;             
                $this->print_billing_info ("Department's Credit Card Surcharge (1.4%)", $this->total_taxes_Department_Credit_Card, '+','',8); 
            //}    





				$this->Ln( 7 );
				$this->SetFont( 'Arial' , 'B' , 9 );
				$this->Cell( 0 , 3 , utf8_decode( "OTHERS " ) , 0 , 0 , 'L' );
				$this->Ln( 4 );
				$this->print_line( $this->getY() );
                
                /* Skill Assessments Fees */
				$skill_assessment_fee_1 = new Veta_TiposVisa();
				$skill_assessment_fee_1->retrieve($r->veta_tiposvisa_id16_c);
				$skill_assessment_fee_2 = new Veta_TiposVisa();
				$skill_assessment_fee_2->retrieve($r->veta_tiposvisa_id17_c);
				$skill_assessment_fee_3 = new Veta_TiposVisa();
				$skill_assessment_fee_3->retrieve($r->veta_tiposvisa_id18_c);
				$skill_assessment_fee_4 = new Veta_TiposVisa();
				$skill_assessment_fee_4->retrieve($r->veta_tiposvisa_id19_c);

				$r->total_skill_assessmente_company_c = 0;

				if (!empty($skill_assessment_fee_1->id)) {
					$this->print_billing_info(
						html_entity_decode($skill_assessment_fee_1->name),
						$skill_assessment_fee_1->total_visa,
						'+',
						'',
						8
					);
					if ($skill_assessment_fee_1->total_visa >= 0) {
						$r->total_skill_assessmente_company_c += $skill_assessment_fee_1->total_visa;
					}
				}

				if (!empty($skill_assessment_fee_2->id)) {
					$this->print_billing_info(
						html_entity_decode($skill_assessment_fee_2->name),
						$skill_assessment_fee_2->total_visa,
						'+',
						'',
						8
					);
					if ($skill_assessment_fee_2->total_visa >= 0) {
						$r->total_skill_assessmente_company_c += $skill_assessment_fee_2->total_visa;
					}
				}

				if (!empty($skill_assessment_fee_3->id)) {
					$this->print_billing_info(
						html_entity_decode($skill_assessment_fee_3->name),
						$skill_assessment_fee_3->total_visa,
						'+',
						'',
						8
					);
					if ($skill_assessment_fee_3->total_visa >= 0) {
						$r->total_skill_assessmente_company_c += $skill_assessment_fee_3->total_visa;
					}
				}

				if (!empty($skill_assessment_fee_4->id)) {
					$this->print_billing_info(
						html_entity_decode($skill_assessment_fee_4->name),
						$skill_assessment_fee_4->total_visa,
						'+',
						'',
						8
					);
					if ($skill_assessment_fee_4->total_visa >= 0) {
						$r->total_skill_assessmente_company_c += $skill_assessment_fee_4->total_visa;
					}
				}

                
				
                /* Skill Assessments Visa Fees */                
				
				$this->company_total_visa = $r->company_total_visa + $r->total_skill_assessmente_company_c;

            $this->Ln( 7 );
        //}
    }

    private function print_total( Veta_DetalleRecibo $d ) {

        $this->Ln( 5 );
        $this->SetFillColor( 234 , 234 , 234 );
        $this->SetTextColor( 27 , 27 , 27 );
        $this->SetFont( 'Arial' , 'B' , 9 );
        $this->Cell( 0 , 8 , utf8_decode( "TOTAL" ) , 0 , 0 , 'L' , true );
        $this->Ln();
        $this->SetFont( 'Arial' , '' , 8 );
        $this->Cell( 150 , 8 , utf8_decode( $d->descripcion_bono ) , 0 , 0 , 'L' , true );
        $this->SetTextColor( 123 , 72 , 156 );
        $this->Cell( 0 , 8 , utf8_decode( number_format( ( $d->bono * 1 ) , 2 , '.' , ',' ) ) . ' AUD' , 0 , 0 , 'R' , true );
        $this->print_line( $this->GetY() );
        $this->Ln( 15 );
        $this->print_separator( $this->GetY() );
        $this->Ln( 5 );
    }

    
    private function print_details() {

        global $app_list_strings;
        $dets                  = $this->r->get_linked_beans( 'veta_detallerecibo_veta_recibo' , 'Veta_DetalleRecibo' );
        $this->total_depositos = 0;
        $this->descuento = 0;

        foreach( $dets as $d ) {

            $this->print_curso( $d );
            //$this->AddPage();
        }
		$this->extra_fees();
        $this->additional_fees();
        
        $descuento = ( $this->r->company_discount_c * 1 );        
        
        //$this->print_additional_services();

        $this->print_servicios( $this->r );
        
        $total_plus = ( $this->company_total_visa * 1 ) + ( $this->total_visabuclass_fees_GST * 1 ) + ($this->total_taxes_Department_Credit_Card * 1);
        
        $total_less = 0;
		$total_less = ($this->consultation_fee * 1) + ($this->r->descuento * 1);

        $this->SetFillColor( 123 , 72 , 156 );
        $this->SetTextColor( 255 , 255 , 255 );
        $this->SetFont( 'Arial' , 'B' , 9 );
                
        $primer_pago = $total_plus - $total_less;

        $this->r->primer_pago = ( $this->total_depositos * 1 ) + ( $this->r->examen_medico * 1 ) + ( $this->r->seguro * 1 ) + ( $this->r->total_visa * 1 ) - ($this->descuento * 1);
        //$this->Cell( 0 , 6 ,  utf8_decode( number_format( $this->r->primer_pago * 1 , 0 , '.' , ',' ) ) . ' AUD' , 0 , 0 , 'R' , true );

        $this->r->primer_pago = $primer_pago;
        $this->r->pendiente_por_pagar = $primer_pago;


        //$this->Ln( 8 );

        $this->SetFillColor( 255 , 255 , 255 );
        $this->SetTextColor( 27 , 27 , 27 );
        $this->SetFont( 'Arial' , '' , 8 );
        // $this->Cell( 130 , 3 , utf8_decode( "Total con tipo de cambio actual: " ) , 0 , 0 , 'R' , true );
        $this->SetFont( 'Arial' , 'B' , 8 );
        // $this->Cell( 20 , 3 , utf8_decode( number_format( ( $this->r->usd * 1 ) , 2 , '.' , ',' ) . ' USD' ) , 0 , 0 , 'L' , true );
        $this->SetFont( 'Arial' , '' , 8 );
        // $this->Cell( 0 , 3 , utf8_decode( "Tipo de Cambio: ( " . number_format( ( $this->r->aud_usd * 1 ) , 5 , '.' , ',' ) . ' AUD )' ) , 0 , 0 , 'R' , true );
    }

    private function print_abonos() {

        $abonos = $this->r->get_linked_beans( 'veta_abono_veta_recibo' , 'Veta_Abono' );
        
        $company_deposits = $this->r->get_linked_beans(  'veta_recibo_nvc_deposit_company_1', 'NVC_Deposit_company' ); 
        //$req->retrieve( $this->veta_requerimiento_veta_reciboveta_requerimiento_ida );

        //if( count( $abonos ) > 0 ) {

        //$this->AddPage();
        
        $this->SetFillColor( 123 , 72 , 156 );
        $this->SetTextColor( 255 , 255 , 255 );
        $this->SetFont( 'Arial' , 'B' , 10 );

        $this->Cell( 100 , 6 , utf8_decode( "GRAND TOTAL TO PAY " ) , 0 , 0 , 'L' , true );
        $this->Cell( 0 , 6 , ' ' . utf8_decode( number_format( $this->r->company_grand_total_c * 1 , 2 , '.' , ',' ) ) . ' AUD' , 0 , 0 , 'R' , true );       
        
        $this->Ln( 6 );

        $this->SetFillColor( 123 , 72 , 156 );
        $this->SetTextColor( 255 , 255 , 255 );
        $this->SetFont( 'Arial' , 'B' , 10 );
        $this->Cell( 100 , 6 , utf8_decode( "TOTAL PAID" ) , 0 , 0 , 'L' , true );
        $this->Cell( 0 , 6 , utf8_decode( number_format( $this->r->company_paid_c * 1 , 2 , '.' , ',' ) ) . ' AUD' , 0 , 0 , 'R' , true );

        // $this->Ln( 7 );

        // $this->Cell( 100 , 6 , utf8_decode( "GRAND TOTAL TO PAY " ) , 0 , 0 , 'L' , true );
        // $this->Cell( 0 , 6 , ' ' . utf8_decode( number_format( $this->r->pendiente_por_pagar * 1 , 2 , '.' , ',' ) ) . ' AUD' , 0 , 0 , 'R' , true );

        $this->Ln( 6 );
        // VISA SUB CLASS MMM PENDING FEES
        $this->Cell( 100 , 6 , utf8_decode( "OUTSTANDING AMOUNT" ) , 0 , 0 , 'L' , true );
        $pendiente_primer_pago = ($this->r->company_paid_c * 1) > ($this->r->company_grand_total_c * 1) ? 0 : ($this->r->company_grand_total_c * 1) - ($this->r->company_paid_c * 1);
        $this->Cell( 0 , 6 , ' ' . utf8_decode( number_format( (($pendiente_primer_pago * 1)/* - ($this->get_refunds("Company") * 1)*/) , 2 , '.' , ',' ) ) . ' AUD' , 0 , 0 , 'R' , true );
		
		
		
		$this->Ln( 6 );

        $this->SetFont( 'Arial' , 'B' , 10 );
        $this->Cell( 100 , 6 , utf8_decode( "TOTAL REFUNDS" ) , 0 , 0 , 'L' , true );
        $this->Cell( 0 , 6 , utf8_decode( number_format( $this->get_refunds("Company") * 1 , 2 , '.' , ',' ) ) . ' AUD' , 0 , 0 , 'R' , true );
		
		
        
        $this->AddPage();
		
		
		
		$this->SetFillColor(255, 255, 255);
        $this->SetTextColor(27, 27, 27);
		$this->Ln(4);

        $this->SetFont('Arial', 'B', 9);
		
		$this->MultiCell(0, 3, 'Allocation of the MMM Professional Fees:', 0, 'L');				
		$this->MultiCell(0, 3, '- 50% of the professional fees are charged to send the document checklist to the client', 0, 'L');
		$this->MultiCell(0, 3, '- 75% of the professional fees are charged for completing step 1 + checklist follow up by the Case Manager', 0, 'L');
		$this->MultiCell(0, 3, '- 90% of the professional fees are charged for completing step 1 and 2 + review of the documents by the Case Manager', 0, 'L');
		$this->MultiCell(0, 3, '- 95% of the professional fees are charged for completing step 1, 2 and 3 + application drafted and prepared for the lodgement', 0, 'L');
		$this->MultiCell(0, 3, '- 100% of the professional fees are charged for completing step 1, 2, 3 and 4 + lodgement of the application', 0, 'L');	 



		/*
        $this->MultiCell(0, 3, 'Allocation of the MMM Professional Fees:', 0, 'L');				
		$this->MultiCell(0, 3, '- Checklist provided to employer (half cost of agreement) ', 0, 'L');
		$this->MultiCell(0, 3, '- Checklist follow up by Case Manager (quarter of full cost of agreement)', 0, 'L');
		$this->MultiCell(0, 3, '- Review of documents by Case Manager (half outstanding balance)', 0, 'L');
		$this->MultiCell(0, 3, '- Application prepared for lodgement (remaining balance minus $100)', 0, 'L');
		$this->MultiCell(0, 3, '- Application lodged ($100)', 0, 'L');
		*/
		
		
		$this->print_scheduled_payments();
        $this->MultiCell( 140 , 3 , "" , 0 , 'J' , false );
		
		
        $this->SetFillColor( 255 , 255 , 255 );
        $this->SetTextColor( 27 , 27 , 27 );

        $this->Ln( 5 );
        $this->SetFont( 'Arial' , 'B' , 9 );
        $this->Cell( 0 , 3 , utf8_decode( "DEPOSITS" ) , 0 , 0 , 'L' );
        $this->Ln( 4 );
        $this->print_line( $this->getY() );

        $this->Ln( 2 );

        $this->SetFillColor( 123 , 72 , 156 );
        $this->SetTextColor( 255 , 255 , 255 );

        $this->Cell( 30 , 6 , utf8_decode( 'DATE' ) , 0 , 0 , 'L' , true );
        $this->Cell( 140 , 6 , utf8_decode( 'DESCRIPTION' ) , 0 , 0 , 'L' , true );
        $this->Cell( 0 , 6 , utf8_decode( 'AMOUNT' ) , 0 , 0 , 'R' , true );

        $this->Ln( 4 );

        $this->SetFont( 'Arial' , '' , 9 );
        $this->SetFillColor( 234 , 234 , 234 );
        $this->SetTextColor( 27 , 27 , 27 );

        foreach( $company_deposits as $a ) {
            // $this->print_abono( $a );
            $this->Ln( 4 );
			if ($a->custom_date_entered_company_c) { 
				$this->Cell( 30 , 3 , utf8_decode( substr( $a->custom_date_entered_company_c , 0 , 10 ) ) , 0 , 0 , 'L' );
			} else {
				$this->Cell( 30 , 3 , utf8_decode( substr( $a->date_entered , 0 , 10 ) ) , 0 , 0 , 'L' );
			}
            
            $this->MultiCell( 140 , 3 , utf8_decode( $a->description ) , 0 , 'J' , false );
            $this->Cell( 0 , 3 , utf8_decode( number_format( ( $a->deposit_amount ) , 2 , '.' , ',' ) ) . ' AUD' , 0 , 0 , 'R' );
        }
		
		$this->Ln( 6 );
        $this->print_refunds();
        $this->MultiCell( 140 , 3 , "" , 0 , 'J' , false );


        $this->SetFillColor( 255 , 255 , 255 );
        $this->SetTextColor( 27 , 27 , 27 );

        
        // }      


        //$this->r->pendiente_por_pagar = $pendiente_primer_pago;
        //$this->r->save();
        
        // $this->r->db->query( "update veta_recibo SET pendiente_por_pagar = '" . strval( $pendiente_primer_pago) . "' WHERE id = '" . $this->r->id . "'" );             
        // $this->r->db->query( "update veta_recibo SET gran_total = '" . strval( $this->r->pendiente_por_pagar) . "' WHERE id = '" . $this->r->id . "'" );             
        

        //$this->r->save();


    }

    private function print_sponsored_people() {
		$lead = new Lead();
		$lead->retrieve( $this->requeriment->veta_requerimiento_leadsleads_ida );
        
        $this->MultiCell( 140 , 3 , "" , 0 , 'J' , false );
        $this->Ln( 10 );
        $this->SetFont( 'Arial' , 'B' , 12 );
        $this->MultiCell( 0 , 3 , utf8_decode( strtoupper( $this->company_name ) ) , 0 , 'L' );
        $this->MultiCell( 0 , 3 , utf8_decode( " ") , 0 , 'L' ); 
        $this->SetFont( 'Arial' , 'B' , 9 );
        $this->MultiCell( 0 , 3 , 'SPONSOR TO: ' , 0 , 'L' ); 
		$this->Ln( 1 );		
		$this->MultiCell( 0 , 3 , utf8_decode( strtoupper( $this->lead_name ) ) , 0 , 'L' );
		$this->Ln( 1 );		
		$this->SetFont( 'Arial' , '' , 9 );
		
		$this->MultiCell(0, 3, utf8_decode("ANZSCO Occupation: " . strtoupper($this->requeriment->ocupation)), 0, 'L');
        $this->Ln(1);
		
		$this->MultiCell(0, 3, utf8_decode("Workplace Location: " . strtoupper($this->r->workplace_location_c)), 0, 'L');
        $this->Ln(1);
		
		$this->MultiCell( 0 , 3 , utf8_decode( "Birthday: " . strtoupper( $lead->birthdate ) ) , 0 , 'L' );
		$this->Ln( 1 );		
		$this->MultiCell( 0 , 3 , utf8_decode( "Email: " . strtoupper( $lead->email1 ) ) , 0 , 'L' );
		$this->Ln( 1 );		
		$this->MultiCell( 0 , 3 , utf8_decode( "Address: " . strtoupper( $lead->primary_address_country ) . " " . strtoupper( $lead->primary_address_state ) . " " .strtoupper( $lead->primary_address_city ) . " " . strtoupper( $lead->primary_address_street )) , 0 , 'L' );

		$this->Ln(2);
		$this->SetFont('Arial', 'B', 12);
		$this->MultiCell(0, 3, utf8_decode(strtoupper("This application includes secondary applicants listed below:	")), 0, 'L');
		$this->SetFont('Arial', '', 9);
		
        $this->Ln( 4 );
		
		if($this->secondary_aplicant_name) {
			$this->leftTextInfo("Secondary Applicant Name: ". $this->secondary_aplicant_name . " Birthday: " . $this->requeriment->secondary_dob, "", "9");
			$this->Ln( 4 );
		}
		if($this->dependent_name) {
			$this->leftTextInfo("Dependent Name: ". $this->dependent_name . " Birthday: " . $this->requeriment->dependent_dob, "", "9");
			$this->Ln( 4 );
		}
		if($this->second_dependent_name) {
			$this->leftTextInfo("Second Dependent Name: ". $this->second_dependent_name . " Birthday: " . $this->requeriment->second_dependent_dob, "", "9");
			$this->Ln( 4 );
		}
		if($this->third_dependent_name) {
			$this->leftTextInfo("Third Dependent Name: ". $this->third_dependent_name . " Birthday: " . $this->requeriment->third_dependent_dob_c, "", "9");
		}
		
		if($this->fourth_dependent_name) {
			$this->leftTextInfo("Fourth Dependent Name: ". $this->fourth_dependent_name . " Birthday: " . $this->requeriment->fourth_dependent_dob_c, "", "9");
		}
		
    }

    private function print_abono( Veta_Abono $a ) {

        $this->Ln( 4 );
        $this->Cell( 30 , 3 , utf8_decode( substr( $a->date_entered , 0 , 10 ) ) , 0 , 0 , 'L' );
        $this->MultiCell( 140 , 3 , utf8_decode( $a->description ) , 0 , 'J' , false );
        $this->Cell( 0 , 3 , utf8_decode( number_format( ( $a->deposit_amount ) , 2 , '.' , ',' ) ) . ' AUD' , 0 , 0 , 'R' );

    }


    function Footer() {

        $u = new User();
        $u->retrieve( $this->r->created_by );

        $this->SetY( -22 );

        // Dibujamos una linea para pintar todo el footer de gris
        $this->SetDrawColor( 153 , 153 , 153 );
        $this->SetLineWidth( 22 );
        $this->Line( 0 , $this->GetY() + 15 , $this->w , $this->GetY() + 15 );

        $this->SetFillColor( 153 , 153 , 153 );
        $this->SetTextColor( 0 , 0 , 0 );
        $this->SetFont( 'Arial' , 'B' , 8 );

        $this->Ln( 5 );

        $this->Cell( 150 , 5 , utf8_decode( ucwords( $u->name ) ) , 0 , 0 , 'L' , true );
        $this->Cell( 0 , 5 , utf8_decode( $u->address_street ) , 0 , 0 , 'R' , true );

        $this->Ln( 5 );

        $this->Cell( 150 , 5 , utf8_decode( $u->email1 ) , 0 , 0 , 'L' , true );
        $this->Cell( 0 , 5 , utf8_decode( $u->address_city . ' - ' . $u->address_country ) , 0 , 0 , 'R' , true );

        $this->Ln( 5 );

        $this->Cell( 150 , 5 , utf8_decode( 'Tel: ' . $u->phone_mobile ) , 0 , 0 , 'L' , true );
        $this->Cell( 0 , 5 , utf8_decode( 'Tel: ' . $u->phone_work ) , 0 , 0 , 'R' , true );
    }

    private function print_notas() {

        $this->Ln( 5 );

        $this->SetFont( 'Arial' , '' , 8 );
        $this->MultiCell( 0 , 5 , utf8_decode( $this->r->description ) );

        $this->AddPage();

        $this->SetFont('Arial','',0);
        $this->SetDrawColor(0,0,0);
        $this->SetLineWidth(0.35);
        $this->SetTextColor( 0 , 0 , 0 );
        $this->MultiCell( 0 , 5 , utf8_decode( "COLOMBIA \r\n Banco: Bancolombia \r\n Beneficiario: Macfarlane Cruz & Asociados S.A.S. \r\n Cuenta de Ahorros No. : 869945231-06 \r\n \r\n  CHILE \r\n Banco: Estado \r\n Beneficiario: VETA EDUCACIÓN SPA \r\n Nº Cuenta: 33670420715 \r\n RUT: 77.098.367-3 \r\n  Tipo de Cuenta: Chequera Electrónica \r\n \r\n AUSTRALIA: Banco: ANZ Bank \r\n Nombre de la cuenta: VETA education Consultancy \r\n BSB Number: 012172 \r\n Nº Cuenta: 205041092 \r\n Swift code: ANZBAU3M  \r\n \r\n  MEXICO: Banco: Bancomer \r\n Beneficiario: VETA EDUCATION MEXICO S.A. de C.V.\r\n Nº Cuenta: 0113402258\r\n Nº Cuenta clabe: 0121 8000 1134 0225 86\r\n Sucursal Banco: 0017" ) ,1,'C');
        $this->Ln( 5 );
        //$this->MultiCell( 0 , 5 , $this->WriteHTML(utf8_decode( "COLOMBIA \r\n Banco: Bancolombia \r\n " )) ,1,'C');

    }

    private function account_data() {

        $this->Ln( 3 );

        $this->SetFont( 'Arial' , '' , 8 );
        //$this->MultiCell( 0 , 5 , utf8_decode( $this->p->description ) );

        $this->Ln( 8 );
        $this->SetFont( 'Arial' , 'B' , 9 );
        $this->SetTextColor( 45 , 45 , 45 );
        // $this->Cell( 0 , 3 , utf8_decode( "Account Info" ) , 0 , 0 , 'L' );


        $this->Ln( 4 );
        $this->print_line( $this->GetY() );

        $this->Ln( 2 );

        $this->SetFont( 'Arial' , '' , 7 );

        $column_width = ( $this->w - 30 );

    
        // $this->Cell( 0 , 3 , utf8_decode( "Direct deposit2:" ) , 0 , 0 , 'L' );
        // $this->Ln( 4 );
        // $this->Cell( 0 , 3 , utf8_decode( "ANZ Bank, Branch York and Market Street, Sydney, NSW 2000" ) , 0 , 0 , 'L' );
        // $this->Ln( 4 );
        // $this->Cell( 0 , 3 , utf8_decode( "BSB: 012172 Account Number: 3095-20987" ) , 0 , 0 , 'L' );
        // $this->Ln( 4 );
        // $this->Cell( 0 , 3 , utf8_decode( "Account Name: MMMigration" ) , 0 , 0 , 'L' );
        // $this->Ln( 4 );
    
    }

    private function MultiCellBlt( $w , $h , $blt , $txt , $border = 0 , $align = 'J' , $fill = false ) {

        //Get bullet width including margins
        $blt_width = $this->GetStringWidth( $blt ) + $this->cMargin * 2;

        //Save x
        $bak_x = $this->x;

        //Output bullet
        $this->Cell( $blt_width , $h , $blt , 0 , '' , $fill );

        //Output text
        $this->MultiCell( $w - $blt_width , $h , $txt , $border , $align , $fill );

        //Restore x
        $this->x = $bak_x;
    }

    

    private function print_invoice_detail () {
        // $this->print_applicantsDetails ("Company Name: ", $this->company_name);
        // $this->print_applicantsDetails ("Secondary Applicant Name: ", $this->secondary_aplicant_name);
        // $this->print_applicantsDetails ("Dependent Name: ", $this->dependent_name);
        // $this->print_applicantsDetails ("Second Dependent Name: ", $this->second_dependent_name);
        // $this->print_applicantsDetails ("Third Dependent Name: ", $this->third_dependent_name);
        
        // $this->MultiCell( 0 , 3 , utf8_decode( " ") , 0 , 'R' ); 
        // $this->MultiCell( 0 , 3 , utf8_decode( " ") , 0 , 'R' ); 

        $this->SetFillColor( 255 , 255 , 255 );
        $this->SetTextColor( 27 , 27 , 27 );

        // $this->leftTextInfo("Invoice Date ", "B", 8);
        // $this->leftTextInfo($this->r->date_modified, "", 8);
        // $this->leftTextInfo(" | Invoice Due Date ", "B", 8);
        // $this->leftTextInfo(date('d/m/Y', strtotime($this->r->date_modified. ' + 5 days')), "", 8);

         
        $this->treeColumnsText_billingInfo("Invoice Date:", "Invoice Date:", "MMMigration", 125, 40, 0, "B", "B", "");
		
		
		global $timedate;
			
		$fecha_ingreso = $timedate->to_db_date( $this->r->date_entered );
		
		$date = $this->r->date_entered; 
		
		$date = DateTime::createFromFormat('Y-m-d', date('Y-m-d', strtotime($fecha_ingreso)));
		//$fecha_invoice = $date->format("d/m/Y");	
		
		$fecha_invoice = $this->r->invoice_company_creation_date_c;	
		
		
		
		$date->add(new DateInterval("P10D"));		
		$fecha_sumada = $date->format("d/m/Y");
		
		
		
        //$this->treeColumnsText_billingInfo(substr( date('d/m/Y', strtotime($fecha_invoice)) , 0 , 10 ), substr( date('d/m/Y', strtotime($fecha_invoice)) , 0 , 10 ), "Suite 102", 125, 40, 0, "", "", "");
		//$this->treeColumnsText_billingInfo(substr( $fecha_invoice, 0 , 10 ), substr(  $fecha_invoice, 0 , 10 ), "Suite 102", 125, 40, 0, "", "", "");        
		$this->treeColumnsText_billingInfo(substr( $fecha_invoice, 0 , 10 ), substr(  $fecha_invoice, 0 , 10 ), "", 125, 40, 0, "", "", "");        
        $this->treeColumnsText_billingInfo("Invoice Due Date:", "Invoice Number:", "6 Cuthbert Street", 125, 40, 0, "B", "B", "");
		
        $datetime_value = strtotime($this->r->invoice_due_date_c);
		if((isset($this->r->invoice_due_date_c)) and ($this->r->invoice_due_date_c != "")) {
		//if(is_numeric($datetime_value)) {
			//$this->treeColumnsText_billingInfo(date('d/m/Y', strtotime($this->r->invoice_due_date_c)), "INV-CO-".$this->r->name, "SYDNEY NSW 2000", 125, 40, 0, "", "", "");
			$this->treeColumnsText_billingInfo(substr($this->r->invoice_due_date_c,0,10), "INV-CO-".$this->r->name, "SYDNEY NSW 2000", 125, 40, 0, "", "", "");

		} else {						
			
			$this->treeColumnsText_billingInfo($fecha_sumada, "INV-CO-".$this->r->name, "SYDNEY NSW 2000", 125, 40, 0, "", "", "");
		}
		
		
        
		$this->treeColumnsText_billingInfo("ID 1.603", "Reference:", "AUSTRALIA", 125, 40, 0, "B", "B", "");
        $this->treeColumnsText_billingInfo("MELANIE MACFARLANE PTY LTD", $this->company->company_leap_id, "", 125, 40, 0, "B", "", "");
        //$this->treeColumnsText_billingInfo("ANZ Bank, Branch York and Market Street, Sydney, NSW 2000", "Single", "", 125, 40, 0, "B", "", "");
		$this->treeColumnsText_billingInfo("WESTPAC", "ABN:", "", 125, 40, 0, "B", "B", "");
        //$this->treeColumnsText_billingInfo("BSB: 012172 Account Number: 3095-20987", "Install_Applicant-MP", "", 125, 40, 0, "B", "", "");
		//$this->treeColumnsText_billingInfo("BSB: 122-712 Account Number: 23305978", "19 623 733 077", "", 125, 40, 0, "B", "", "");
		$this->treeColumnsText_billingInfo("BSB: 032-096 Account Number: 851593", "19 623 733 077", "", 125, 40, 0, "B", "", "");
        //$this->treeColumnsText_billingInfo("Account Name: MMMigration", "ABN:", "", 125, 40, 0, "B", "B", "");
		$this->treeColumnsText_billingInfo("Account Name: MELANIE MACFARLANE PTY LTD", "", "", 125, 40, 0, "B", "B", "");
        //$this->treeColumnsText_billingInfo("", "19 623 733 077", "", 125, 40, 0, "", "", "");    
		
		
		//$this->treeColumnsText_billingInfo("SWIFT Code: QBANAU4B", "", "", 125, 40, 0, "B", "B", "");
		
        
        
        // $this->Cell( 0 , 3 , utf8_decode( "ANZ Bank, Branch York and Market Street, Sydney, NSW 2000" ) , 0 , 0 , 'L' );
        // $this->Ln( 4 );
        // $this->Cell( 0 , 3 , utf8_decode( "BSB: 012172 Account Number: 3095-20987" ) , 0 , 0 , 'L' );
        // $this->Ln( 4 );
        // $this->Cell( 0 , 3 , utf8_decode( "Account Name: MMMigration" ) , 0 , 0 , 'L' );
        // $this->Ln( 4 );
        

        $this->Ln(1);
        //$this->print_line( $this->GetY() ); 
        
        
    }

    private function print_applicantsDetails ($label, $info) {
        if (!empty($info))
        {
            $this->leftTextInfo($label, "B", 8);
            $this->leftTextInfo($info, "", 8);
            $this->MultiCell( 0 , 3 , utf8_decode( " ") , 0 , 'L' );
        }
    }

    private function treeColumnsText_billingInfo($first_text, $second_text, $third_text, $wfirst, $wsecond, $wthird, $boldfirst, $boldsecond, $boldthird) {
        
        $this->SetFont( 'Arial' , $boldfirst , 7 );        
        $this->Cell( $wfirst , 6 , utf8_decode( $first_text ) , 0 , 0 , 'L' , true );
        $this->SetFont( 'Arial' , $boldsecond , 7 );
        $this->Cell( $wsecond , 6 , utf8_decode( $second_text) , 0 , 0 , 'L' , false );  

        $this->SetFont( 'Arial' , $boldthird , 7 );
        $this->Cell( $wthird , 6 , utf8_decode( $third_text ) , 0 , 0 , 'R' , false );
        $this->Ln( 4 );
    }
    private function leftTextInfo($text, $weight, $size){
        $this->SetFont('Arial',$weight,$size);
        $this->Write(5,$text);
    }
    
    private function rightTextInfo($text, $variable, $weight, $size){
        if (!empty($variable))
        {
            $this->SetFont('Arial',$weight,$size);
            // $this->Write(5,$text);
            $this->Cell( 0 , 6 , utf8_decode( $text ."".$variable ) , 0 , 0 , 'R' , false );
            $this->Ln( 4 );
        }
    }
	

    private function getSignatures()
    {
        $query = "SELECT * FROM `firmas-db`.contract WHERE veta_recibo = '{$this->r->id}'";
        $firmas = [];
        // var_dump($query);die;
        $result = $this->r->db->query($query, true, "Error obteniendo el consecutivo del recibo");
        $contrato    = $this->r->db->fetchByAssoc($result);

        if (empty($contrato)) return 'line_signature.png';

        return !empty($contrato['signature_company_path']) ? $contrato['signature_company_path'] : 'line_signature.png';
    }

	private function signature() {
		$this->SetFillColor( 255 , 255 , 255 );
        $this->SetTextColor( 27 , 27 , 27 );
        //$this->Image( 'melanie_signature.png' , 12 , 10 , 50 );
        $image1 = 'melanie_signature.png';
        $line_signature =  $this->getSignatures();
		$line_signing_date = 'line_signature_date.png';
		
		$this->Ln( 6 );
		
		$this->MultiCell(0, 3, 'NOTE:', 0, 'L');		
		$this->MultiCell(0, 3, '- For Form 956: please fill in information, hand sign on and send the coloured scan (or take a photo) of the full form to us.', 0, 'L');
		
		$this->Ln(4);
		
		$this->SetFont( 'Arial' , 'B' , 9 );             
		$this->MultiCell( 0 , 3 ,'I authorise MMMigration to conduct a VEVO check on my visa status from my passport details' , 0 , 'L' );
		
		
        $this->Ln( 8 );
        $this->Cell( 40, 40, $this->Image($image1, $this->GetX(), $this->GetY(), 40), 0, 0, 'L', false );
		$this->Cell( 40, 40, $this->Image($line_signature, $this->GetX()+125-40, $this->GetY(), 40), 0, 0, 'R', false );		
        $this->Ln( 14 );        
		$this->treeColumnsText_billingInfo("Melanie Macfarlane ", $this->company->cost_agreetment_signature_name_c, "", 125, 40, 0, "", "", "");
        //$this->Cell( 0 , 3 , utf8_decode( "Melanie Macfarlane " ) , 0 , 0 , 'L' );		
        //$this->Ln( 4 );
		$this->treeColumnsText_billingInfo("Principal Migration Agent (MARN 0319166) ", $this->company->cost_agreetment_signature_position_c, "", 125, 40, 0, "", "", "");
        //$this->Cell( 0 , 3 , utf8_decode( "Principal Migration Agent (MARN 0319166) " ) , 0 , 0 , 'L' );
        //$this->Ln( 4 );
		$this->treeColumnsText_billingInfo("MMMigration ", $this->company->name, "", 125, 40, 0, "", "", "");
        //$this->Cell( 0 , 3 , utf8_decode( "MMMigration" ) , 0 , 0 , 'L' );
		
		$this->Cell( 40, 40, $this->Image($line_signing_date, $this->GetX()+125, $this->GetY(), 40), 0, 0, 'R', false );

		$this->Ln( 7 );
		
		$this->SetFont( 'Arial' , 'B' , 9 );             
		$this->MultiCell( 0 , 3 ,'MM Migration Agents' , 0 , 'L' );
		$this->Ln( 2 );
		
		$this->treeColumnsText_billingInfo("Audrey Cikla", "", "", 125, 40, 0, "", "", "");
        //$this->Cell( 0 , 3 , utf8_decode( "Melanie Macfarlane " ) , 0 , 0 , 'L' );		
        //$this->Ln( 4 );
		$this->treeColumnsText_billingInfo("Senior Migration Consultant (MARN 1794523) ", "", "", 125, 40, 0, "", "", "");
		$this->Ln( 1 );
		/*
		$this->treeColumnsText_billingInfo("Miguel Valderrama ", "", "", 125, 40, 0, "", "", "");
        //$this->Cell( 0 , 3 , utf8_decode( "Melanie Macfarlane " ) , 0 , 0 , 'L' );		
        //$this->Ln( 4 );
		$this->treeColumnsText_billingInfo("Senior Migration Agent (MARN 1387539) ", "", "", 125, 40, 0, "", "", "");
		$this->Ln( 1 );
		*/
		
		
		
		
		
		/*
		$this->treeColumnsText_billingInfo("Katerina Ladygo ", "", "", 125, 40, 0, "", "", "");
        //$this->Cell( 0 , 3 , utf8_decode( "Melanie Macfarlane " ) , 0 , 0 , 'L' );		
        //$this->Ln( 4 );
		$this->treeColumnsText_billingInfo("Senior Migration Agent / Operation Manager (MARN 1806599) ", "", "", 125, 40, 0, "", "", "");
		$this->Ln( 1 );
		*/
		/*
		$this->treeColumnsText_billingInfo("Zana Serdar ", "", "", 125, 40, 0, "", "", "");
        //$this->Cell( 0 , 3 , utf8_decode( "Melanie Macfarlane " ) , 0 , 0 , 'L' );		
        //$this->Ln( 4 );
        $this->treeColumnsText_billingInfo("Case Manager and Registered Migration Agent Sydney (MARN 2015236) ", "", "", 125, 40, 0, "", "", "");
        $this->Ln(1);
		*/
		$this->treeColumnsText_billingInfo("Laura Vizza ", "", "", 125, 40, 0, "", "", "");
        //$this->Cell( 0 , 3 , utf8_decode( "Melanie Macfarlane " ) , 0 , 0 , 'L' );		
        //$this->Ln( 4 );
        $this->treeColumnsText_billingInfo("Case Manager and Registered Migration Agent (MARN 1382818) ", "", "", 125, 40, 0, "", "", "");
        $this->Ln(1);
		
		$this->treeColumnsText_billingInfo("Sima Zeinali ", "", "", 125, 40, 0, "", "", "");
        //$this->Cell( 0 , 3 , utf8_decode( "Melanie Macfarlane " ) , 0 , 0 , 'L' );		
        //$this->Ln( 4 );
        $this->treeColumnsText_billingInfo("Case Manager and Registered Migration Agent (MARN 1807481) ", "", "", 125, 40, 0, "", "", "");
        $this->Ln(1);
		 
		
		/*
		$this->treeColumnsText_billingInfo("Christine Marie Vaseer ", "", "", 125, 40, 0, "", "", "");
        //$this->Cell( 0 , 3 , utf8_decode( "Melanie Macfarlane " ) , 0 , 0 , 'L' );		
        //$this->Ln( 4 );
        $this->treeColumnsText_billingInfo("Migration Consultant (MARN 0640357) ", "", "", 125, 40, 0, "", "", "");
        $this->Ln(1);
		*/
		
		
		
		/*
		$this->treeColumnsText_billingInfo("Lina Li ", "", "", 125, 40, 0, "", "", "");
        //$this->Cell( 0 , 3 , utf8_decode( "Melanie Macfarlane " ) , 0 , 0 , 'L' );		
        //$this->Ln( 4 );
		$this->treeColumnsText_billingInfo("Case Manager (MARN 1683761) ", "", "", 125, 40, 0, "", "", "");
		$this->Ln( 1 );
		*/
		
		
		
		/*
		$this->treeColumnsText_billingInfo("Laura Vizza ", "", "", 125, 40, 0, "", "", "");
        //$this->Cell( 0 , 3 , utf8_decode( "Melanie Macfarlane " ) , 0 , 0 , 'L' );		
        //$this->Ln( 4 );
		$this->treeColumnsText_billingInfo("Case Manager & Registered Migration Agent (MARN 1382818) ", "", "", 125, 40, 0, "", "", "");
		*/
		
		
		$this->Line($x + 3.25, $y + 2.225, $x + 3.25 + 2.375, $y + 2.225);		
		
        

        /*Melanie Macfarlane 
         
         
        */
    }	
	
	/*
	private function treeColumnsText_billingInfo($first_text, $second_text, $third_text, $wfirst, $wsecond, $wthird, $boldfirst, $boldsecond, $boldthird) {
        
        $this->SetFont( 'Arial' , $boldfirst , 7 );        
        $this->Cell( $wfirst , 6 , utf8_decode( $first_text ) , 0 , 0 , 'L' , true );
        $this->SetFont( 'Arial' , $boldsecond , 7 );
        $this->Cell( $wsecond , 6 , utf8_decode( $second_text) , 0 , 0 , 'L' , false );  

        $this->SetFont( 'Arial' , $boldthird , 7 );
        $this->Cell( $wthird , 6 , utf8_decode( $third_text ) , 0 , 0 , 'R' , false );
        $this->Ln( 4 );
    }
	*/
	
	
	
	private function comments_notes() {
        if ($this->r->company_comments_c != '') {
            
            $this->SetFont( 'Arial' , 'B' , 9 );
            $this->Cell( 0 , 3 , utf8_decode( "Notes and Comments " ) , 0 , 0 , 'L' );
            $this->Ln( 4 );
            $this->print_line( $this->getY() );

            $this->Ln(1);            
            $this->SetFont( 'Arial' , '' , 9 );             
            $this->MultiCell( 0 , 4 , utf8_decode( $this->r->company_comments_c ) , 0 , 'J' );
            $this->MultiCell( 0 , 3 , utf8_decode( " ") , 0 , 'R' ); 
        }       
    }

    private function print_scheduled_payments() {

        $scheduled_payments = $this->r->get_linked_beans( 'veta_recibo_spay_schedule_payment_company_1' , 'Spay_Schedule_Payment_Company', 'payment_date' );

        //if( count( $abonos ) > 0 ) {

        //$this->AddPage();
        
                
        $this->SetFillColor( 255 , 255 , 255 );
        $this->SetTextColor( 27 , 27 , 27 );
        $this->SetFont( 'Arial' , 'B' , 9 );
        $this->Cell( 0 , 3 , utf8_decode( "SCHEDULED PAYMENTS" ) , 0 , 0 , 'L' );
        $this->Ln( 4 );
        $this->print_line( $this->getY() );

        $this->Ln( 2 );

        $this->SetFillColor( 123 , 72 , 156 );
        $this->SetTextColor( 255 , 255 , 255 );

        $this->Cell( 30 , 6 , utf8_decode( 'DATE' ) , 0 , 0 , 'L' , true );
        $this->Cell( 140 , 6 , utf8_decode( 'DESCRIPTION' ) , 0 , 0 , 'L' , true );
        $this->Cell( 0 , 6 , utf8_decode( 'AMOUNT' ) , 0 , 0 , 'R' , true );

        $this->Ln( 4 );

        $this->SetFont( 'Arial' , '' , 9 );
        $this->SetFillColor( 234 , 234 , 234 );
        $this->SetTextColor( 27 , 27 , 27 );

        foreach( $scheduled_payments as $a ) {            
            $this->Ln( 4 );
            $this->Cell( 30 , 3 , utf8_decode( substr( $a->payment_date , 0 , 10 ) ) , 0 , 0 , 'L' );
            $this->MultiCell( 140 , 3 , utf8_decode( $a->description ) , 0 , 'J' , false );
            $this->Cell( 0 , 3 , utf8_decode( number_format( ( $a->amount ) , 2 , '.' , ',' ) ) . ' AUD' , 0 , 0 , 'R' );
        }

    }
	
	private function print_refunds() {

        $refunds = $this->r->get_linked_beans( 'veta_recibo_conta_refunds_1' , 'Conta_refunds' );
		$this->total_refunds = 0;

        //if( count( $abonos ) > 0 ) {

        //$this->AddPage();
        
                
        $this->SetFillColor( 255 , 255 , 255 );
        $this->SetTextColor( 27 , 27 , 27 );
        $this->SetFont( 'Arial' , 'B' , 9 );
        $this->Cell( 0 , 3 , utf8_decode( "REFUNDS" ) , 0 , 0 , 'L' );
        $this->Ln( 4 );
        $this->print_line( $this->getY() );

        $this->Ln( 2 );

        $this->SetFillColor( 123 , 72 , 156 );
        $this->SetTextColor( 255 , 255 , 255 );

        $this->Cell( 30 , 6 , utf8_decode( 'DATE' ) , 0 , 0 , 'L' , true );
        $this->Cell( 140 , 6 , utf8_decode( 'DESCRIPTION' ) , 0 , 0 , 'L' , true );
        $this->Cell( 0 , 6 , utf8_decode( 'AMOUNT' ) , 0 , 0 , 'R' , true );

        $this->Ln( 4 );

        $this->SetFont( 'Arial' , '' , 9 );
        $this->SetFillColor( 234 , 234 , 234 );
        $this->SetTextColor( 27 , 27 , 27 );

        foreach( $refunds as $a ) {      
			if($a->refund_to == 'Company') {
				$this->Ln( 4 );
				$this->Cell( 30 , 3 , utf8_decode( substr( $a->date_entered , 0 , 10 ) ) , 0 , 0 , 'L' );
				$this->MultiCell( 140 , 3 , utf8_decode( $a->description ) , 0 , 'J' , false );
				$this->Cell( 0 , 3 , utf8_decode( number_format( ( $a->amount ) , 2 , '.' , ',' ) ) . ' AUD' , 0 , 0 , 'R' );
				$this->total_refunds = ($this->total_refunds * 1) + ($a->amount * 1);
			}
        }
		//error_log("Refund Company Alfonso - ". $this->total_refunds);

    }
	
	public function get_refunds($refund_to) {

        $refunds = $this->r->get_linked_beans( 'veta_recibo_conta_refunds_1' , 'Conta_refunds' );
		$total_refunds = 0;
		
        foreach( $refunds as $a ) {      
			if($a->refund_to == $refund_to) {
				$total_refunds = ($total_refunds * 1) + ($a->amount * 1);
			}
        }
		return $total_refunds;
    }
    

}