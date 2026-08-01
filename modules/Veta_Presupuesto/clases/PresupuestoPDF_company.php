<?php

require_once( 'modules/Veta_College/Veta_College.php' );
require_once( 'modules/Veta_Presupuesto/clases/fpdf16/fpdf.php' );

class PresupuestoPDF_company extends FPDF
{
    var $margen = 10;
    var $p = null;
    var $total_depositos = 0;
    var $descuento = 0;
    
    var $total_visabuclass_fees = 0;
    var $total_visabuclass_fees_GST = 0;

    var $company_total_visa = 0;

    var $consultation_fee = 0;
    var $lead_name = "";
    var $taxes_Department_Credit_Card = 0; //1.4
    var $taxes_GST = 0; //10%
    
    var $total_taxes_Department_Credit_Card = 0;    
    var $total_taxes_GST = 0;

    var $curso_name = array();
    var $curso_description = array();

    var $company_name;
    var $secondary_aplicant_name;
    var $dependent_name;
    var $second_dependent_name;
    var $third_dependent_name;
	var $fourth_dependent_name;
	
	var $requeriment;
	var $company;

    public function generate_pdf( Veta_Presupuesto $p ) {
		
		global $sugar_config;
        $this->p = $p;
        //$this = new PresupuestoPDF( 'P' , 'mm' , 'Letter' );
		
		$requermimento_presupuesto = $this->p->get_linked_beans( 'veta_requerimiento_veta_presupuesto' , 'Veta_Presupuesto' );
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
        
        // $this->print_aplicantsInfo ();
        $this->print_details();
        
        $this->print_notas();
        //$this->account_data();
        //$this->print_legals($this->curso_name, $this->curso_description);
		$this->Ln( 15 );
        $this->signature();

        $file_name = 'QUOTE-' . $this->string_replace_pdf_name($this->company->name) . '-' . $this->p->name . '.pdf';
        $this->Output( $sugar_config[ 'upload_dir' ] . 'quotes/' . $file_name , 'F' );
		$this->Output($sugar_config['upload_dir']  . $file_name, 'F');
		
        //$this->Output( 'QUOTE-' . $this->string_replace_pdf_name($this->company->name) . '-' . $this->p->name . '.pdf' );		
		//$this->Output( $this->p->id . '.pdf' );
		
    }

	private function string_replace_pdf_name($str)
    {
        $a = array("'","´","&#039;");
        $b = array("","","");
        return str_replace($a,$b,$str);
    }
	
    public function header() {

        $this->SetDrawColor( 123 , 72 , 156 );
        $this->SetLineWidth( 10 );
        $this->Line( 0 , 0 , $this->w , 0 );

        $this->Image( 'company_logos.jpg' , 12 , 10 , 50 );

        $requermimento_presupuesto = $this->p->get_linked_beans( 'veta_requerimiento_veta_presupuesto' , 'Veta_Presupuesto' );
        $id_requermimiento ="";
        foreach( $requermimento_presupuesto as $req_pre ) {            
            $id_requermimiento = $req_pre->id;
        }

        $r = new Veta_Requerimiento();
        $r->retrieve($id_requermimiento);

        //Comenzamos a escribir el PDF:
        $this->SetFont( 'Arial' , 'B' , 12 );
        $this->SetTextColor( 45 , 45 , 45 );
        $this->SetLineWidth( 0.2 ); 
        $this->Ln( 5 );
        $nombre = empty( $this->p->veta_presupuesto_leads_name ) ? $this->p->veta_presupuesto_contacts_name : $this->p->veta_presupuesto_leads_name;
        // $this->Cell( 0 , 3 , utf8_decode( strtoupper( substr( $r->company_name , 0 , 26 ) ) ) , 0 , 0 , 'R' );
        $this->MultiCell( 0 , 3 , utf8_decode( $r->company_name ) , 0 , 'R' );        
        $this->SetFont( 'Arial' , 'B' , 9 );        
        // $this->Cell( 0 , 3 , utf8_decode( strtoupper( substr( $r->veta_requerimiento_leads_name , 0 , 26 ) ) ) , 0 , 0 , 'R' );
        $this->Ln( 2 );
        $this->MultiCell( 0 , 3 , utf8_decode( 'SPONSOR TO: ' . $this->string_replace(strtoupper( $r->veta_requerimiento_leads_name )) ) , 0 , 'R' );        
        $this->lead_name = $r->veta_requerimiento_leads_name;
        $this->Ln( 6 );


        $this->SetFont( 'Arial' , '' , 7 );
        $this->Cell( 0 , 3 , utf8_decode( "Quote Made on " . substr( $this->p->date_modified , 0 , 10 ) ) , 0 , 0 , 'R' );
        /*$this->Ln( 4 );
        $this->SetTextColor( 255 , 49 , 38 );
        $this->Cell( 0 , 3 , utf8_decode( "Vigencia :  1 semana" ) , 0 , 0 , 'R' ); */
        $this->Ln( 4 );
        $this->SetTextColor( 45 , 45 , 45 );
        $this->Cell( 0 , 3 , utf8_decode( "ID 1.603" ) , 0 , 0 , 'R' );
        

        $this->Ln( 10 );
        //$this->print_line( $this->GetY() );
        
        // $this->additional_info_applicant("Company Name: ", $r->company_name);
        // $this->additional_info_applicant("Secondary Applicant Name: ", $r->secondary_aplicant_name);   
        // $this->additional_info_applicant("Dependent Name: ", $r->dependent_name);
        // $this->additional_info_applicant("Second Dependent Name: ", $r->second_dependent_name);
        // $this->additional_info_applicant("Third Dependent Name: ", $r->third_dependent_name);          
        // $this->MultiCell( 0 , 3 , utf8_decode( " ") , 0 , 'R' );            
        // $r->company_name = "Newton Vision Corp";
        // $this->additional_info_applicant("Company Name: ", $r->company_name);
        // $r->save();

        $this->company_name = $r->company_name;
        $this->secondary_aplicant_name = $r->secondary_aplicant_name;
        $this->dependent_name = $r->dependent_name;
        $this->second_dependent_name = $r->second_dependent_name;
        $this->third_dependent_name = $r->third_dependent_name;
		
		$this->fourth_dependent_name = $r->fourth_dependent_name_c;

        $this->consultation_fee = $r->consultation_fee;          
        //$this->taxes_Department_Credit_Card = $this->consultation_fee * $this->taxes_consultation_percentage;   
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
	/** Jonny Pacheco Moreno */
    private function string_replace($str)
    {
        $a = array("&#039;","&lt;","&gt;","&amp;","&nbsp;","&apos;");
        $b = array("'","<",">","&"," ","'");
        return str_replace($a,$b,$str);
    }

    private function print_billing_info ($label_title, $variable_value, $signo, $weight = '', $size = 8) {
        ($signo=='-') ? $signo='-' : $signo='';
        ($weight=='') ? $weight='' : $weight='B';
        $this->SetFont( 'Arial' , $weight , $size );
        $this->Ln( 5 );
        $this->Cell( 5 );
        $this->Cell( 100 , 3 ,$this->string_replace(utf8_decode($label_title)) , 0 , 0 , 'L' );
        $this->Cell( 0 , 3 , $signo.' '.utf8_decode( number_format( ( $variable_value * 1 ) , 2 , ',' , '.' ) ) . ' AUD' , 0 , 0 , 'R' );
    }
    
    private function print_taxes_percentage ($label_title, $variable_value, $signo) {
        ($signo=='-') ? $signo='-' : $signo='';
        $this->SetFont( 'Arial' , '' , 8 );
        $this->Ln( 5 );
        $this->Cell( 5 );
        $this->Cell( 100 , 3 , utf8_decode($label_title) , 0 , 0 , 'L' );
        $this->Cell( 0 , 3 , $signo.' '.utf8_decode($variable_value).' %' , 0 , 0 , 'R'  );
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

    function strrevpos($instr, $needle)

    {

        $rev_pos = strpos (strrev($instr), strrev($needle));

        if ($rev_pos===false) return false;

        else return strlen($instr) - $rev_pos - strlen($needle);

    }



    function after_last ($dato, $inthat)

    {

        if (!is_bool($this->strrevpos($inthat, $dato)))

        return substr($inthat, $this->strrevpos($inthat, $dato)+strlen($dato));

    }

    private function print_curso( Veta_DetallePresupuesto $d ) {

        global $app_list_strings;
        // ---------------------------------------------------- COLLEGE Y CURSO ----------------------------------------

        $this->SetTextColor( 45 , 45 , 45 );
        $c = new Veta_College();
        $c->retrieve( $d->veta_college_id1_c );

        $curso = new Veta_Curso();
        $curso->retrieve($d->veta_curso_id_c);

        $x = new Veta_Presupuesto();
        $x->retrieve($this->after_last ('=', $_SERVER['REQUEST_URI']));

        $this->Ln( 7 );
        $this->SetFont( 'Arial' , 'B' , 9 );
        //$this->Cell( 50 , 3 , utf8_decode( strtoupper( $c->name ) . ucwords( ' ' . $app_list_strings[ 'ciudades_list' ][ $c->ciudad ] ) . ', ' . ucwords( $app_list_strings[ 'pais_list' ][ $c->pais ] ) ) , 0 , 0 , 'L' );
        //$this->Cell( 0 , 3 , utf8_decode( 'CURSO: ' . strtoupper( $d->name ) ) , 0 , 0 , 'R' );
        //$this->MultiCell( 0 , 3 , utf8_decode( 'FEES:' . strtoupper( $c->name ) . ucwords( ' ' . $app_list_strings[ 'ciudades_list' ][ $c->ciudad ] ) . ', ' . ucwords( $app_list_strings[ 'pais_list' ][ $c->pais ] ) ) , 0 , 'L' );
        $this->Ln( 3 );
        $this->MultiCell( 0 , 3 , utf8_decode( 'VISA SUBCLASS: ' . strtoupper( htmlspecialchars_decode($d->name) ) ) , 0 , 'L' );
        $this->Ln( 4 );

        $this->print_line( $this->getY() );

        //$this->Ln( 5 );

        $this->SetFont( 'Arial' , '' , 8 );

        // ---------------------------------------------------- FECHA DE INICIO ----------------------------------------


        /*$this->Cell( 5 );
        $this->Cell( 50 , 3 , utf8_decode( 'Fecha de Inicio: ' ) , 0 , 0 , 'L' );
        $this->Cell( 0 , 3 , substr( $d->intake , 0 , 10 ) , 0 , 0 , 'R' );   */

        // ---------------------------------------------------- COMPONENT ----------------------------------------

        //   // $this->Ln( 5 );
        //   $this->Cell( 5 );
        //   $this->Cell( 50 , 3 , utf8_decode( 'Component: ' ) , 0 , 0 , 'L' );
        //   $this->Cell( 0 , 3 , utf8_decode( $x->components ) , 0 , 0 , 'R'  );
  
        //   // ---------------------------------------------------- CONCEPT ----------------------------------------
        //   $this->Ln( 5 );
        //   $this->Cell( 5 );
        //   $this->Cell( 100 , 3 , utf8_decode( 'Concept ' ) , 0 , 0 , 'L' );
        //   $this->Cell( 0 , 3 , utf8_decode( $x->concept ) , 0 , 0 , 'R'  );
  
          // ---------------------------------------------------- FEE ----------------------------------------
        $fees = 0;
        $fees_visasubclass = $curso->get_linked_beans( 'veta_curso_veta_college_1' , 'Veta_College' );
        
        // foreach( $fees_visasubclass as $fee_visa ) {  
        //     $this->print_billing_info("Fee: ". $fee_visa->name, $fee_visa->company_fee_c, '+','',8);
        //     $fees = $fees + $fee_visa->company_fee_c;
        // }
        foreach( $fees_visasubclass as $fee_visa ) {  
            if ($fee_visa->type_of_fee_c == 'Company') {
                $this->print_billing_info("". $fee_visa->name, $fee_visa->fee, '+','',8);
                $fees = $fees + $fee_visa->fee;
            }
        }
        $this->print_billing_info("TOTAL MMM FEES FOR: ".$d->name, $fees, '+','B',9);
        //$this->total_taxes_Department_Credit_Card += $fees * ($this->taxes_Department_Credit_Card);
        //$this->print_billing_info("Department's Credit Card Surcharge (1.4%)", $fees * ($this->taxes_Department_Credit_Card), '+','B',9);

        $this->total_visabuclass_fees = $this->total_visabuclass_fees + $fees;

        // $this->taxes_GST = $taxes_fees->gst /100;
        // $this->taxes_Department_Credit_Card= $taxes_fees->department_cc_surcharge / 100;
        

           // ---------------------------------------------------- BONO DE DESCUENTO ----------------------------------------
        // $this->Ln( 5 );
        // $this->Cell( 5 );
        // $this->Cell( 100 , 3 , utf8_decode( 'Discount '  ) , 0 , 0 , 'L' );
        // $this->Cell( 0 , 3 , utf8_decode( '-' . number_format( ( $d->bono * 1 ) , 2 , ',' , '.' ) ) . ' AUD' , 0 , 0 , 'R' );

        // ---------------------------------------------------- VALOR DEL CURSO ----------------------------------------

        // $this->Ln( 5 );
        // $this->Cell( 5 );
        // $this->Cell( 50 , 3 , utf8_decode( "Valor del Curso " ) , 0 , 0 , 'L' );
        //$this->Cell( 0 , 3 , utf8_decode( number_format( ( $d->total_curso * 1 ) - ( $d->inscripcion * 1 ) , 2 , ',' , '.' ) ) . ' AUD' , 0 , 0 , 'R' );
        //$this->Cell( 0 , 3 , utf8_decode( number_format( ( $d->precio_curso * 1 ) , 2 , ',' , '.' ) ) . ' AUD' , 0 , 0 , 'R' );


        // ---------------------------------------------------- INSCRIPCION ----------------------------------------

        // $this->Ln( 5 );
        // $this->Cell( 5 );
        // $this->Cell( 100 , 3 , utf8_decode( "Valor de la Inscripción " ) , 0 , 0 , 'L' );
        // $this->Cell( 0 , 3 , utf8_decode( number_format( $d->inscripcion * 1 , 2 , ',' , '.' ) ) . ' AUD' , 0 , 0 , 'R' );


        // ---------------------------------------------------- COSTO MATERIALES ----------------------------------------
        // $this->Ln( 5 );
        // $this->Cell( 5 );
        // $this->Cell( 100 , 3 , utf8_decode( 'Costo Materiales ' ) , 0 , 0 , 'L' );
        // $this->Cell( 0 , 3 , utf8_decode( number_format( ( $d->costo_materiales * 1 ) , 2 , ',' , '.' ) ) . ' AUD' , 0 , 0 , 'R' );

        // ---------------------------------------------------- COSTO EXTRA ----------------------------------------
        // $this->Ln( 5 );
        // $this->Cell( 5 );
        // $this->Cell( 100 , 3 , utf8_decode( 'Extra Cost ' ) , 0 , 0 , 'L' );
        // $this->Cell( 0 , 3 , utf8_decode( number_format( ( $d->costo_extra * 1 ) , 2 , ',' , '.' ) ) . ' AUD' , 0 , 0 , 'R' );


        // ---------------------------------------------------- TOTAL ----------------------------------------

        // $this->Ln( 5 );
        // $this->SetFont( 'Arial' , 'B' , 9 );
        // $this->Cell( 5 );
        // $this->Cell( 100 , 3 , utf8_decode( 'TOTAL: ' ) , 0 , 0 , 'L' );
        // $this->Cell( 0 , 3 , utf8_decode( number_format( ( ($d->total_curso * 1) + $fees ) , 2 , ',' , '.' ) ) . ' AUD' , 0 , 0 , 'R' );

        // $this->Cell( 0 , 3 , utf8_decode( number_format( ( ($d->total_curso * 1)  ) , 2 , ',' , '.' ) ) . ' AUD' , 0 , 0 , 'R' );

        // $this->Ln( 5 );
        // $this->Cell( 5 );
        // $this->Cell( 100 , 3 , utf8_decode( 'DEPOSIT: ' ) , 0 , 0 , 'L' );
        // $this->Cell( 0 , 3 , utf8_decode( number_format( ( $d->deposito * 1 ) , 2 , ',' , '.' ) ) . ' AUD' , 0 , 0 , 'R' );
        $this->total_depositos += ( $d->deposito * 1 );
        $this->descuento += ($d->bono * 1);
    

        $this->SetFont( 'Arial' , '' , 9 );

        array_push($this->curso_name, $curso->name);
        array_push($this->curso_description, $curso->terms_and_conditions_company_c);
        //$this->MultiCell( 0 , 3 , utf8_decode( $curso->description ) , 0 , 'L' );
    }

    private function print_legals($array_name, $array_description){
        
        foreach( $array_description as $legales_cursos_name ) {              
            $this->AddPage();
            $this->Ln( 11 );
            $this->MultiCell( 0 , 3 , utf8_decode( " ") , 0 , 'R' );

            $this->SetFont( 'Arial' , '' , 9 );             
            $this->MultiCell( 0 , 3 , utf8_decode( $legales_cursos_name ) , 0 , 'L' );
            // $this->MultiCell( 0 , 3 , utf8_decode( " ") , 0 , 'R' );
            // $this->MultiCell( 0 , 3 , utf8_decode( " ") , 0 , 'R' );
            // $this->MultiCell( 0 , 3 , utf8_decode( $legales_cursos_name ) , 0 , 'L' );
            // $this->AddPage();
        }

    }

    private function print_servicios( Veta_Presupuesto $p ) {

        //if( ( ! empty( $p->examen_medico ) and $p->examen_medico > 0 ) or ( ! empty( $p->seguro ) and $p->seguro > 0 ) or ( ! empty( $p->total_visa ) and $p->total_visa > 0 ) ) {
            //$this->Ln( 8 );
            
            //$this->Ln( 11 );
            $this->SetFont( 'Arial' , 'B' , 9 );
            // $this->Cell( 0 , 3 , utf8_decode( "VISA SUBCLASS " ) , 0 , 0 , 'L' );
            $this->Ln( 6 );
            $this->print_line( $this->getY() );

            $this->SetFont( 'Arial' , '' , 8 );
            
            // $this->print_billing_info ("Subtotal Visa Subclass (MMM Fees)", $this->total_visabuclass_fees, '+','',8);                                 
            // $this->print_billing_info ("Consultation Fee", $this->consultation_fee, '-','',8);            
            $this->descuento = ( $this->p->company_discount_c * 1 );
            $this->print_billing_info ("Discount", $this->descuento, '-','',8);            
            // $this->print_billing_info ("TOTAL WITHOUT GST", ($this->total_visabuclass_fees - $this->consultation_fee - $this->descuento), '+','B',9);
            $this->print_billing_info ("TOTAL WITHOUT GST", ($this->total_visabuclass_fees - $this->descuento), '+','B',9);
            $this->total_taxes_GST = ($this->total_visabuclass_fees - $this->descuento)* $this->taxes_GST;
            $this->print_billing_info ("GST (10%)", $this->total_taxes_GST, '+','',8);  
            // $this->total_visabuclass_fees_GST = $this->total_taxes_GST + ($this->total_visabuclass_fees - $this->consultation_fee - $this->descuento);
            $this->total_visabuclass_fees_GST = $this->total_taxes_GST + ($this->total_visabuclass_fees - $this->descuento);
            $this->print_billing_info ("Total Visa Subclass (MMM FEES)", $this->total_visabuclass_fees_GST, '+','B',10);  
            //total_visabuclass_fees_GST                   
            

            $this->Ln( 7 );
            $this->Ln( 7 );
            $this->SetFont( 'Arial' , 'B' , 9 );
            $this->Cell( 0 , 3 , utf8_decode( "DEPARTMENTS OF HOME AFFAIRS " ) , 0 , 0 , 'L' );
            $this->Ln( 4 );
            $this->print_line( $this->getY() );

            $this->SetFont( 'Arial' , '' , 8 );

            if( ! empty( $p->examen_medico ) and ( $p->examen_medico * 1 ) > 0 ) {

                $this->Ln( 5 );
                $this->Cell( 5 );
                $this->Cell( 100 , 3 , utf8_decode( "Medical Exam " ) , 0 , 0 , 'L' );
                $this->Cell( 0 , 3 , utf8_decode( number_format( ( $p->examen_medico * 1 ) , 2 , ',' , '.' ) ) . ' AUD' , 0 , 0 , 'R' );
            }

            if( ! empty( $p->seguro ) and $p->seguro > 0 ) {
                $this->Ln( 5 );
                $this->Cell( 5 );

                $my_seguro = '';
                if( ! empty( $p->duracion ) )
                    $my_seguro = "( " . $p->asegurador . " " . $p->duracion . " month " . $p->tipo_seguro . " )";

                // $this->Cell( 100 , 3 , utf8_decode( "Insurance Value  " . $my_seguro . " " ) , 0 , 0 , 'L' );
                // $this->Cell( 0 , 3 , utf8_decode( number_format( ( $p->seguro * 1 ) , 2 , ',' , '.' ) ) . ' AUD' , 0 , 0 , 'R' );
            }           

            // if( ! empty( $p->descuento ) and $p->descuento > 0 ) {
            //     $this->Ln( 5 );
            //     $this->Cell( 5 );

            //     $my_seguro = '';
            //     if( ! empty( $p->duracion ) )
            //         $my_seguro = "( " . $p->asegurador . " " . $p->duracion . " month " . $p->tipo_seguro . " )";

            //     $this->Cell( 100 , 3 , utf8_decode( "Insurance Value  " . $my_seguro . " " ) , 0 , 0 , 'L' );
            //     $this->Cell( 0 , 3 , utf8_decode( number_format( ( $p->seguro * 1 ) , 2 , ',' , '.' ) ) . ' AUD' , 0 , 0 , 'R' );
            // }


            //if( ! empty( $p->total_visa ) and $p->total_visa > 0 ) {

                $visa = new Veta_TiposVisa();
                $visa->retrieve($p->veta_tiposvisa_id_c);  
                
                /* New Department Visa Fees */
                $department_visa_fee_1 = new Veta_TiposVisa();
                $department_visa_fee_1 -> retrieve($p->veta_tiposvisa_id7_c);
                $department_visa_fee_2 = new Veta_TiposVisa();
                $department_visa_fee_2 -> retrieve($p->veta_tiposvisa_id8_c);
                $department_visa_fee_3 = new Veta_TiposVisa();
                $department_visa_fee_3 -> retrieve($p->veta_tiposvisa_id9_c);
                $department_visa_fee_4 = new Veta_TiposVisa();
                $department_visa_fee_4 -> retrieve($p->veta_tiposvisa_id10_c);


                $this->company_total_visa = 0;                

                if ($department_visa_fee_1->total_visa > 0)  {
                    $this->print_billing_info (html_entity_decode($department_visa_fee_1->name), $department_visa_fee_1->total_visa, '+','',8);
                    $this->company_total_visa += $department_visa_fee_1->total_visa;
                }
                if ($department_visa_fee_2->total_visa > 0)  {
                    $this->print_billing_info (html_entity_decode($department_visa_fee_2->name), $department_visa_fee_2->total_visa, '+','',8);
                    $this->company_total_visa += $department_visa_fee_2->total_visa;
                }
                if ($department_visa_fee_3->total_visa > 0)  {
                    $this->print_billing_info (html_entity_decode($department_visa_fee_3->name), $department_visa_fee_3->total_visa, '+','',8);
                    $this->company_total_visa += $department_visa_fee_3->total_visa;
                }
                if ($department_visa_fee_4->total_visa > 0)  {
                    $this->print_billing_info (html_entity_decode($department_visa_fee_4->name), $department_visa_fee_4->total_visa, '+','',8);
                    $this->company_total_visa += $department_visa_fee_4->total_visa;
                }

                /* New Department Visa Fees */

                // $this->Ln( 5 );
                // $this->Cell( 5 );
                // $this->Cell( 100 , 3 , utf8_decode( "Department’s Visa Fee - Base application charge ( " . $visa->name . " )" ) , 0 , 0 , 'L' );
                // $this->Cell( 0 , 3 , utf8_decode( number_format( ( $p->total_visa * 1 ) , 2 , ',' , '.' ) ) . ' AUD' , 0 , 0 , 'R' );
                // $this->print_billing_info ("Department's Visa Fee - Base application charge ( " . $visa->name . " )", $p->total_visa, '+','',8);
                //$this->print_billing_info ("Department's Visa Fee - Base application charge ( " . $visa->name . " )", $visa->company_total_visa_c, '+','',8);
                $this->total_taxes_Department_Credit_Card += $this->company_total_visa * ($this->taxes_Department_Credit_Card); 
                
                $this->print_billing_info ("Department's Credit Card Surcharge (1.4%)", $this->total_taxes_Department_Credit_Card, '+','',8); 
                //Department’s Credit Card Surcharge (1.4%)

                //$this->print_billing_info ("Department's Credit Card Surcharge (1.4%)", ($p->total_visa * $this->taxes_GST_percentage), '','',8);
                //$this->taxes_GST = $p->total_visa * $this->taxes_GST_percentage;
            //}

            // $this->Ln( 11 );
            // $this->SetFont( 'Arial' , 'B' , 9 );
            // $this->Cell( 0 , 3 , utf8_decode( "OTHERS " ) , 0 , 0 , 'L' );
            // $this->Ln( 4 );
            // $this->print_line( $this->getY() );

            // $this->SetFont( 'Arial' , '' , 8 );
            
            // $this->print_billing_info ("Consultation Fee", $this->consultation_fee, '-','',8);                                 

            $this->Ln( 7 );
        //}
    }

    private function print_total( Veta_DetallePresupuesto $d ) {

        $this->Ln( 5 );
        $this->SetFillColor( 234 , 234 , 234 );
        $this->SetTextColor( 27 , 27 , 27 );
        $this->SetFont( 'Arial' , 'B' , 9 );
        $this->Cell( 0 , 8 , utf8_decode( "TOTAL" ) , 0 , 0 , 'L' , true );
        $this->Ln();
        $this->SetFont( 'Arial' , '' , 8 );
        $this->Cell( 150 , 8 , utf8_decode( $d->descripcion_bono ) , 0 , 0 , 'L' , true );
        $this->SetTextColor( 123 , 72 , 156 );
        $this->Cell( 0 , 8 , utf8_decode( number_format( ( $d->bono * 1 ) , 2 , ',' , '.' ) ) . ' AUD' , 0 , 0 , 'R' , true );
        $this->print_line( $this->GetY() );
        $this->Ln( 15 );
        $this->print_separator( $this->GetY() );
        $this->Ln( 5 );
    }

    private function print_details() {

        global $app_list_strings;
        $dets                  = $this->p->get_linked_beans( 'veta_detallepresupuesto_veta_presupuesto' , 'Veta_DetallePresupuesto' );
        $this->total_depositos = 0;
        $this->descuento = 0;

        foreach( $dets as $d ) {

            $this->print_curso( $d );
            //$this->AddPage();
        }       

        //$this->AddPage();

        $this->print_servicios( $this->p );

        $this->descuento = ( $this->p->company_discount_c * 1 );
        $descuento = ( $this->p->company_discount_c * 1 );
        //$total_plus = ($this->total_depositos * 1 ) + ( $this->p->examen_medico * 1 ) + ( $this->p->seguro * 1 ) + ( $this->p->total_visa * 1 ) + ( $this->total_visabuclass_fees_GST * 1 ) + ($this->total_taxes_Department_Credit_Card * 1);
        $total_plus = ( $this->company_total_visa * 1 ) + ( $this->total_visabuclass_fees_GST * 1 ) + ($this->total_taxes_Department_Credit_Card * 1);
        $total_less = 0;
        //$total_less = ($this->descuento * 1) + ($this->consultation_fee * 1);        
        //$total_less = $this->consultation_fee * 1;        

        
        //$this->total_taxes_GST = ($total_plus * $this->taxes_GST);


        $primer_pago = $total_plus - $total_less;
        
        // $this->print_billing_info ("Total less", $total_less, '+','',8);   
        // $this->print_billing_info ("Total GST", $this->total_taxes_GST, '+','',8);   
        // $this->print_billing_info ("Total department", $this->total_taxes_Department_Credit_Card, '+','',8);   
        // $this->print_billing_info("TOTAL depositos", $this->total_depositos, '+','B',9);
        // $this->print_billing_info("TOTAL examen_medico", $this->p->examen_medico, '+','B',9);
        // $this->print_billing_info("TOTAL seguro", $this->p->seguro, '+','B',9);
        // $this->print_billing_info("TOTAL total_visa", $this->p->total_visa, '+','B',9);
        // $this->print_billing_info("TOTAL taxes_GST", $this->taxes_GST, '+','B',9);
        // $this->print_billing_info("TOTAL total_visabuclass_fees", $this->total_visabuclass_fees, '+','B',9);
        // $this->print_billing_info("TOTAL descuento", $descuento, '+','B',9);
        // $this->print_billing_info("TOTAL consutation_fee", $this->consultation_fee, '+','B',9);        

        $this->MultiCell( 0 , 3 , utf8_decode( " ") , 0 , 'R' );      

        

        $this->SetFillColor( 123 , 72 , 156 );
        $this->SetTextColor( 255 , 255 , 255 );
        $this->SetFont( 'Arial' , 'B' , 9 );
        // $this->Cell( 100 , 6 , utf8_decode( "GRAND TOTAL" ) , 0 , 0 , 'L' , true );
        // $this->SetFont( 'Arial' , 'B' , 10 );
        // $this->Cell( 0 , 6 , utf8_decode( number_format( ($this->p->gran_total * 1) + $this->total_visabuclass_fees , 2 , ',' , '.' ) ) . ' AUD' , 0 , 0 , 'R' , true );

        // $this->Ln( 7 );

        // /*$this->Cell( 100 , 6 , utf8_decode( "TOTAL PESOS " ) , 0 , 0 , 'L' , true );
        // $this->SetFont( 'Arial' , 'B' , 10 );
        // $this->Cell( 0 , 6 , '$ ' . utf8_decode( number_format( $this->p->pesos * 1 , 0 , ',' , '.' ) )  , 0 , 0 , 'R' , true );   */

        // $this->Cell( 100 , 6 , utf8_decode( "DISCOUNT" ) , 0 , 0 , 'L' , true );
        // $this->SetFont( 'Arial' , 'B' , 10 );
        // $this->Cell( 0 , 6 , utf8_decode( number_format( $descuento * 1 , 0 , ',' , '.' ) ) . ' AUD' , 0 , 0 , 'R' , true );

        $this->Ln( 7 );
        $this->SetFont( 'Arial' , 'B' , 10 );
        $this->Cell( 100 , 6 , utf8_decode( "TOTAL TO PAY " ) , 0 , 0 , 'L' , true );
        $this->SetFont( 'Arial' , 'B' , 10 );
        $this->Cell( 0 , 6 , utf8_decode( number_format( $primer_pago * 1 , 2 , ',' , '.' ) ) . ' AUD' , 0 , 0 , 'R' , true );

        



        
        
        $requermimento_presupuesto = $this->p->get_linked_beans( 'veta_requerimiento_veta_presupuesto' , 'Veta_Presupuesto' );
        $id_requermimiento ="";
        foreach( $requermimento_presupuesto as $req_pre ) {            
            $id_requermimiento = $req_pre->id;
        }

        $r = new Veta_Requerimiento();

        $r->retrieve($id_requermimiento);        
        
        
        $r->company_mmm_fee = $this->total_visabuclass_fees;
        //$r->main_aplicant_name = $this->lead_name;
        //$this->additional_info_applicant("Company Name FEE2: ", $r->aplicant_mmm_fee);
        $r->save();


        // $this->Ln( 8 );

        $this->SetFillColor( 255 , 255 , 255 );
        $this->SetTextColor( 27 , 27 , 27 );
        $this->SetFont( 'Arial' , '' , 8 );
        // $this->Cell( 130 , 3 , utf8_decode( "Total con tipo de cambio actual: " ) , 0 , 0 , 'R' , true );
        $this->SetFont( 'Arial' , 'B' , 8 );
        // $this->Cell( 20 , 3 , utf8_decode( number_format( ( $this->p->usd * 1 ) , 2 , ',' , '.' ) . ' USD' ) , 0 , 0 , 'L' , true );
        $this->SetFont( 'Arial' , '' , 8 );
        // $this->Cell( 0 , 3 , utf8_decode( "Tipo de Cambio: ( " . number_format( ( $this->p->aud_usd * 1 ) , 5 , ',' , '.' ) . ' AUD )' ) , 0 , 0 , 'R' , true );
    }

    private function print_notas() {

        // $this->Ln( 8 );

        $this->SetFont( 'Arial' , '' , 8 );
        $this->MultiCell( 0 , 5 , utf8_decode( $this->p->description ) );

        /*$this->Ln( 8 );
        $this->SetFont( 'Arial' , 'B' , 9 );
        $this->SetTextColor( 45 , 45 , 45 );
        $this->Cell( 0 , 3 , utf8_decode( "NOTAS" ) , 0 , 0 , 'L' );


        $this->Ln( 4 );
        $this->print_line( $this->GetY() );

        $this->Ln( 4 );

        $this->SetFont( 'Arial' , '' , 7 );

        $column_width = ( $this->w - 30 );

        $this->MultiCellBlt( $column_width , 4 , chr( 149 ) , 'For courses dates in 2020, prices could increase. School can change prices without notice. Final prices will be reflected in the school\'s invoice.' );
        $this->MultiCellBlt( $column_width , 4 , chr( 149 ) , 'ACCOMMODATION NOTES: Twin Room Option, must be booked by students travelling together.' );
        $this->MultiCellBlt( $column_width , 4 , chr( 149 ) , 'Minimum age 16 years (Students under 18 must book homestay half-board for the duration of their course, return airport transfers and require a parental/guardian consent form)' );
        $this->MultiCellBlt( $column_width , 4 , chr( 149 ) , 'Cambridge Exam fees and dates subject to change (refer to http://cambridgeesol-centres.org) // IELTS EXAM to be booked by students directly. Current price is $330 (GST free only for academic purposes) - for up-to-date fees and dates check ielts.org / Promotion IELTS FREE EXAM only Programs LSA the promotion is valid from July 1 to September 30.' );
        $this->MultiCellBlt( $column_width , 4 , chr( 149 ) , 'Public holidays on a weekday (School Closure): 01 Jan, 28 Jan, 19 Apr, 22 Apr, 25 Apr, 10 Jun, 07 Oct and 23 - 27 Dec 2019.' );
        $this->MultiCellBlt( $column_width , 4 , chr( 149 ) , 'Student Insurance: Only available to student visa holders, price subject to change.' );
        $this->MultiCellBlt( $column_width , 4 , chr( 149 ) , 'Cambridge Exam fees and dates subject to change (refer to http://cambridgeesol-centres.org) // IELTS EXAM to be booked by students directly. Current price is $330 (GST free only for academic purposes) - for up-to-date fees and dates check ielts.org' );
        $this->MultiCellBlt( $column_width , 4 , chr( 149 ) , 'In case the student is a minor, it is COMPULSORY add the additional service "1257 Welfare Undertaking Fee" when quoting. Textbooks and course materials (text books and course materials are available for use during studies but will be recycled for other students to use once a student has finished their course. Should students wish to purchase their own books they are able to do so at a cost of AUS $25 per level)' );
        $this->MultiCellBlt( $column_width , 4 , chr( 149 ) , 'Prices are estimates and are subject to change without notice due to course and housing availability and exchange rate fluctuations. Prices do not include flight cost Additional charges may apply.' );    */
    }

    private function account_data() {

        $this->Ln( 4 );

        $this->SetFont( 'Arial' , '' , 8 );
        $this->MultiCell( 0 , 5 , utf8_decode( $this->p->description ) );

        $this->Ln( 4 );
        $this->SetFont( 'Arial' , 'B' , 9 );
        $this->SetTextColor( 45 , 45 , 45 );
        // $this->Cell( 0 , 3 , utf8_decode( "Account Info" ) , 0 , 0 , 'L' );


        $this->print_line( $this->GetY() );

        $this->Ln( 4 );

        $this->SetFont( 'Arial' , 'B' , 8 );

        $column_width = ( $this->w - 30 );

        $this->Cell( 0 , 3 , utf8_decode( "Direct deposit:" ) , 0 , 0 , 'L' );
        $this->Ln( 4 );
        $this->Cell( 0 , 3 , utf8_decode( "ANZ Bank, Branch York and Market Street, Sydney, NSW 2000" ) , 0 , 0 , 'L' );
        $this->Ln( 4 );
        $this->Cell( 0 , 3 , utf8_decode( "BSB: 012172 Account Number: 3095-20987" ) , 0 , 0 , 'L' );
        $this->Ln( 4 );
        $this->Cell( 0 , 3 , utf8_decode( "Account Name: MMMigration" ) , 0 , 0 , 'L' );
        $this->Ln( 4 );
    }

    function Footer() {

        $u = new User();
        $u->retrieve( $this->p->created_by );

        $this->SetY( -20 );

        // Dibujamos una linea para pintar todo el footer de gris
        $this->SetDrawColor( 153 , 153 , 153 );
        $this->SetLineWidth( 25 );
        $this->Line( 0 , $this->GetY() + 15 , $this->w , $this->GetY() + 15 );

        $this->SetFillColor( 153 , 153 , 153 );
        $this->SetTextColor( 0 , 0 , 0 );
        $this->SetFont( 'Arial' , 'B' , 9 );

        $this->Ln( 4 );

        $this->Cell( 150 , 5 , utf8_decode( ucwords( $u->name ) ) , 0 , 0 , 'L' , true );
        $this->Cell( 0 , 5 , utf8_decode( $u->address_street ) , 0 , 0 , 'R' , true );

        $this->Ln( 4 );

        $this->Cell( 150 , 5 , utf8_decode( $u->email1 ) , 0 , 0 , 'L' , true );
        $this->Cell( 0 , 5 , utf8_decode( $u->address_city . ' - ' . $u->address_country ) , 0 , 0 , 'R' , true );

        $this->Ln( 4 );

        $this->Cell( 150 , 5 , utf8_decode( 'Tel: ' . $u->phone_mobile ) , 0 , 0 , 'L' , true );
        $this->Cell( 0 , 5 , utf8_decode( 'Tel: ' . $u->phone_work ) , 0 , 0 , 'R' , true );


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

    private function print_aplicantsInfo () {
        $this->SetFillColor( 255 , 255 , 255 );
        $this->SetTextColor( 27 , 27 , 27 );
        $this->print_applicantsDetails ("Company Name: ", $this->company_name);
        $this->print_applicantsDetails ("Secondary Applicant Name: ", $this->secondary_aplicant_name);
        $this->print_applicantsDetails ("Dependent Name: ", $this->dependent_name);
        $this->print_applicantsDetails ("Second Dependent Name: ", $this->second_dependent_name);		
        $this->print_applicantsDetails ("Third Dependent Name: ", $this->third_dependent_name);
		
		$this->print_applicantsDetails ("Fourth Dependent Name: ", $this->fourth_dependent_name);
		

        $this->Ln( 0 );
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
	
	private function signature() {

        //$this->Image( 'melanie_signature.png' , 12 , 10 , 50 );
        $image1 = 'melanie_signature.png';
        $this->Ln( 8 );
        $this->Cell( 40, 40, $this->Image($image1, $this->GetX(), $this->GetY(), 40), 0, 0, 'L', false );
        $this->Ln( 14 );        
        $this->Cell( 0 , 3 , utf8_decode( "Melanie Macfarlane " ) , 0 , 0 , 'L' );
        $this->Ln( 4 );
        $this->Cell( 0 , 3 , utf8_decode( "Principal Migration Agent (MARN 0319166) " ) , 0 , 0 , 'L' );
        $this->Ln( 4 );
        $this->Cell( 0 , 3 , utf8_decode( "MMMigration" ) , 0 , 0 , 'L' );
        

        /*Melanie Macfarlane 
         
         
        */
    }

}