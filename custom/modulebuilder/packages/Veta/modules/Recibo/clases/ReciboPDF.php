<?php

require_once( 'modules/Veta_College/Veta_College.php' );
require_once( 'modules/Veta_Presupuesto/clases/fpdf16/fpdf.php' );

class ReciboPDF extends FPDF
{
    var $margen = 10;
    var $r = null;
    var $total_depositos = 0;
    var $descuento = 0;
    
    var $total_visabuclass_fees = 0;
    var $total_visabuclass_fees_GST = 0;    
    
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

    public function generate_pdf( Veta_Recibo $r ) {

        $this->r = $r;

        $taxes_fees = new NVC_Taxes_and_Fees_Config;
        $taxes_fees->retrieve("c83b8f80-f55b-6938-0b3d-6156426782bf");        
        
        $this->taxes_GST = $taxes_fees->gst /100;
        $this->taxes_Department_Credit_Card= $taxes_fees->department_cc_surcharge / 100;

        $this->SetMargins( $this->margen , $this->margen , $this->margen );
        $this->AddPage();

        $this->print_invoice_detail();
        $this->print_details();
         $this->print_abonos();
        // $this->print_notas();
        $this->account_data();        
        $this->print_legals($this->curso_name, $this->curso_description);
        

        $this->Output( $this->r->id . '.pdf' );
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

        $this->SetFont( 'Arial' , '' , 15 );
        $this->Cell( 0 , 3 , utf8_decode( "TAX INVOICE" ) , 0 , 0 , 'R' );
        $this->MultiCell( 0 , 3 , utf8_decode( " ") , 0 , 'R' ); 

        $this->SetFont( 'Arial' , 'B' , 9 );
        $this->Cell( 0 , 3 , utf8_decode( strtoupper( substr( $req->veta_requerimiento_leads_name , 0 , 26 ) ) ) , 0 , 0 , 'R' );
        
        $this->lead_name = $req->veta_requerimiento_leads_name;
        $this->company_name = $req->company_name;
        $this->secondary_aplicant_name = $req->secondary_aplicant_name;
        $this->dependent_name = $req->dependent_name;
        $this->second_dependent_name = $req->second_dependent_name;
        $this->third_dependent_name = $req->third_dependent_name;

        //$this->print_line( $this->GetY() );
        $this->consultation_fee = $req->consultation_fee; 
        // $this->Cell( 0 , 3 , utf8_decode( strtoupper( substr( $nombre , 0 , 26 ) ) ) , 0 , 0 , 'R' ); 


        // $this->print_applicantsDetails ("Company Name: ", $this->company_name);
        // $this->print_applicantsDetails ("Secondary Applicant Name: ", $this->secondary_aplicant_name);
        // $this->print_applicantsDetails ("Dependent Name: ", $this->dependent_name);
        // $this->print_applicantsDetails ("Second Dependent Name: ", $this->second_dependent_name);
        // $this->print_applicantsDetails ("Third Dependent Name: ", $this->third_dependent_name);
        // $this->MultiCell( 0 , 3 , utf8_decode( " ") , 0 , 'R' );
        $this->Ln( 3 );
        $this->rightTextInfo("Company Name: ", $this->company_name, "", "7");
        $this->rightTextInfo("Secondary Applicant Name: ", $this->secondary_aplicant_name, "", "7");
        $this->rightTextInfo("Dependent Name: ", $this->dependent_name, "", "7");
        $this->rightTextInfo("Second Dependent Name: ", $this->second_dependent_name, "", "7");
        $this->rightTextInfo("Third Dependent Name: ", $this->third_dependent_name, "", "7");

        //$this->print_line( $this->GetY() );

        // $this->Ln( 6 );
        $this->SetFont( 'Arial' , '' , 7 );
        //$this->Cell( 0 , 3 , utf8_decode( "Invoice Date " . substr( $this->r->date_modified , 0 , 10 ) ) , 0 , 0 , 'L' );
        
        // $this->leftTextInfo("Invoice Date ", "B", 8);
        // $this->leftTextInfo($this->r->date_modified, "", 8);
        // $this->leftTextInfo(" | Invoice Due Date ", "B", 8);
        // $this->leftTextInfo(date('d-m-Y', strtotime($this->r->date_modified. ' + 5 days')), "", 8);
        


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

    private function print_curso( Veta_DetalleRecibo $d ) {

        global $app_list_strings;
        // ---------------------------------------------------- COLLEGE Y CURSO ----------------------------------------

        $this->SetTextColor( 45 , 45 , 45 );
        $c = new Veta_College();
        $c->retrieve( $d->veta_college_id_c );

        $curso = new Veta_Curso();
        $curso->retrieve($d->veta_curso_id_c);
        //$this->object_curso = $curso;

        //$this->Ln( 7 );
        $this->SetFont( 'Arial' , 'B' , 9 );
        //$this->Cell( 50 , 3 , utf8_decode( strtoupper( $c->name ) . ucwords( ' ' . $app_list_strings[ 'ciudades_list' ][ $c->ciudad ] ) . ', ' . ucwords( $app_list_strings[ 'pais_list' ][ $c->pais ] ) ) , 0 , 0 , 'L' );
        //$this->Cell( 0 , 3 , utf8_decode( 'CURSO: ' . strtoupper( $d->name ) ) , 0 , 0 , 'R' );

        //$this->MultiCell( 0 , 3 , utf8_decode( 'COLLEGE:' . strtoupper( $c->name ) . ucwords( ' ' . $app_list_strings[ 'ciudades_list' ][ $c->ciudad ] ) . ', ' . ucwords( $app_list_strings[ 'pais_list' ][ $c->pais ] ) ), 0 , 'L' );
        $this->Ln( 3 );
        $this->MultiCell(0,3,utf8_decode( 'VISA SUBCLASS: ' . strtoupper( $d->name )  ) , 0 , 'L' );

        $this->Ln( 4 );

        $this->print_line( $this->getY() );

        $fees = 0;
        $fees_visasubclass = $curso->get_linked_beans( 'veta_curso_veta_college_1' , 'Veta_College' );
        
        foreach( $fees_visasubclass as $fee_visa ) {  
            $this->print_billing_info("Fee:". $fee_visa->name, $fee_visa->fee, '+','',8);
            $fees = $fees + $fee_visa->fee;
        }
        $this->print_billing_info("TOTAL FEES", $fees, '+','B',9);        

        $this->total_visabuclass_fees = $this->total_visabuclass_fees + $fees;

        // ---------------------------------------------------- FECHA DE INICIO ----------------------------------------

        /* $this->Ln( 5 );
        $this->Cell( 5 );
        $this->Cell( 50 , 3 , utf8_decode( 'Fecha de Inicio: ' ) , 0 , 0 , 'L' );
        $this->Cell( 0 , 3 , substr( $d->intake , 0 , 10 ) , 0 , 0 , 'R' );  */

        // ---------------------------------------------------- DURACION ----------------------------------------

        // $this->Ln( 5 );
        // $this->SetFont( 'Arial' , '' , 8 );
        // $this->Cell( 5 );
        // $this->Cell( 50 , 3 , utf8_decode( $curso->tipo_curso == 'Vet' ? 'Término' :'Duración: ' ) , 0 , 0 , 'L' );
        // $this->Cell( 0 , 3 , utf8_decode( ucwords( $d->duracion ) . " semanas " ) , 0 , 0 , 'R' );

        // ---------------------------------------------------- PRECIO X SEMANA ----------------------------------------
        // $this->Ln( 5 );
        // $this->Cell( 5 );
        // $this->Cell( 100 , 3 , utf8_decode( 'Precio por Semana ' ) , 0 , 0 , 'L' );
        // $this->Cell( 0 , 3 , utf8_decode( number_format( ( $d->precio_por_semana * 1 ) , 2 , ',' , '.' ) ) . ' AUD' , 0 , 0 , 'R' );

        // ---------------------------------------------------- BONO DE DESCUENTO ----------------------------------------
        // $this->Ln( 5 );
        // $this->Cell( 5 );
        // $this->Cell( 100 , 3 , utf8_decode( 'Descuento ' . substr($d->descripcion_bono,0, 110) ) , 0 , 0 , 'L' );
        // $this->Cell( 0 , 3 , utf8_decode( '-' . number_format( ( $d->bono * 1 ) , 2 , ',' , '.' ) ) . ' AUD' , 0 , 0 , 'R' );
        //$this->MultiCell(100,3,utf8_decode( 'Descuento ' . $d->descripcion_bono ) , 1 , 'L' );
        //$this->MultiCell(20,3, utf8_decode( '-' . number_format( ( $d->bono * 1 ) ))  , 1 , 'L' );


        // ---------------------------------------------------- VALOR DEL CURSO ----------------------------------------

        // $this->Ln( 5 );
        // $this->Cell( 5 );
        // $this->Cell( 50 , 3 , utf8_decode( "Valor del Curso " ) , 0 , 0 , 'L' );
        // //$this->Cell( 0 , 3 , utf8_decode( number_format( ( $d->total_curso * 1 ) - ( $d->inscripcion * 1 ) , 2 , ',' , '.' ) ) . ' AUD' , 0 , 0 , 'R' );
        // $this->Cell( 0 , 3 , utf8_decode( number_format( ( $d->precio_curso * 1 )  , 2 , ',' , '.' ) ) . ' AUD' , 0 , 0 , 'R' );


        // ---------------------------------------------------- OTROS ----------------------------------------
        $detalles = $d->get_linked_beans( 'veta_detallereciboitem_veta_detallerecibo' , 'Veta_DetalleReciboItem' );

        foreach( $detalles as $detalle ) {

            $this->Ln( 5 );
            $this->Cell( 5 );
            $this->Cell( 50 , 3 , utf8_decode( $detalle->name ) , 0 , 0 , 'L' );
            $this->Cell( 0 , 3 , utf8_decode( number_format( ( $detalle->monto * 1 ) , 2 , ',' , '.' ) ) . ' AUD' , 0 , 0 , 'R' );
        }

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
        // $this->Cell( 100 , 3 , utf8_decode( 'Costo Extra '  ) , 0 , 0 , 'L' );
        // $this->Cell( 0 , 3 , utf8_decode(  number_format( ( $d->costo_extra * 1 ) , 2 , ',' , '.' ) ) . ' AUD' , 0 , 0 , 'R' );


        // ---------------------------------------------------- TOTAL ----------------------------------------

        // $this->Ln( 5 );
        // $this->SetFont( 'Arial' , 'B' , 9 );
        // $this->Cell( 5 );
        // $this->Cell( 100 , 3 , utf8_decode( 'TOTAL: ' ) , 0 , 0 , 'L' );
        // $this->Cell( 0 , 3 , utf8_decode( number_format( ( $fees + $this->total_taxes_Department_Credit_Card) , 2 , ',' , '.' ) ) . ' AUD' , 0 , 0 , 'R' );

        // $fees = $fees + $fee_visa->fee;
        
        // $this->print_billing_info("TOTAL FEES", $fees, '+','B',9);
        // $this->total_taxes_Department_Credit_Card += $fees * ($this->taxes_Department_Credit_Card);



        // $this->Ln( 5 );
        // $this->Cell( 5 );
        // $this->Cell( 100 , 3 , utf8_decode( 'DEPOSITO: ' ) , 0 , 0 , 'L' );
        // $this->Cell( 0 , 3 , utf8_decode( number_format( ( $d->deposito * 1 ) , 2 , ',' , '.' ) ) . ' AUD' , 0 , 0 , 'R' );
        $this->total_depositos += ( $d->deposito * 1 );
        $this->descuento += ($d->bono * 1);
        

        $this->Ln( 7 );

        $this->SetFont( 'Arial' , '' , 9 );

        
        array_push($this->curso_name, $curso->name);
        array_push($this->curso_description, $curso->description);
        //$this->MultiCell( 0 , 3 , utf8_decode( $curso->description ) , 0 , 'L' );
        //$this->MultiCell( 0 , 3 , utf8_decode( $this->curso_name[0] ) , 0 , 'L' );
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
            //$this->AddPage();
        }

    }
    private function print_billing_info ($label_title, $variable_value, $signo, $weight = '', $size = 8) {
        ($signo=='-') ? $signo='-' : $signo='';
        ($weight=='') ? $weight='' : $weight='B';
        $this->SetFont( 'Arial' , $weight , $size );
        $this->Ln( 5 );
        $this->Cell( 5 );
        $this->Cell( 100 , 3 , utf8_decode($label_title) , 0 , 0 , 'L' );
        $this->Cell( 0 , 3 , $signo.' '.utf8_decode( number_format( ( $variable_value * 1 ) , 2 , ',' , '.' ) ) . ' AUD' , 0 , 0 , 'R' );
    }

    private function print_servicios( Veta_Recibo $r ) {

        if( ( ! empty( $r->examen_medico ) and $r->examen_medico > 0 ) or ( ! empty( $r->seguro ) and $r->seguro > 0 ) or ( ! empty( $r->total_visa ) and $r->total_visa > 0 ) ) {

            $this->Ln( 4 );
            $this->SetFont( 'Arial' , 'B' , 9 );
            $this->Cell( 0 , 3 , utf8_decode( "VISA SUBCLASS " ) , 0 , 0 , 'L' );
            $this->Ln( 4 );
            $this->print_line( $this->getY() );

            $this->SetFont( 'Arial' , '' , 8 );
            
            $this->print_billing_info ("Subtotal Visa Subclass (MMM Fees)", $this->total_visabuclass_fees, '+','',8);                                 
            $this->print_billing_info ("Consultation Fee", $this->consultation_fee, '-','',8);            
            $this->descuento = ( $this->r->descuento * 1 );
            $this->print_billing_info ("Discount", $this->descuento, '-','',8);            
            $this->print_billing_info ("TOTAL WITHOUT GST", ($this->total_visabuclass_fees - $this->consultation_fee - $this->descuento), '+','B',9);
            $this->total_taxes_GST = ($this->total_visabuclass_fees - $this->consultation_fee - $this->descuento)* $this->taxes_GST;
            $this->print_billing_info ("GST (10%)", $this->total_taxes_GST, '+','',8);  
            $this->total_visabuclass_fees_GST = $this->total_taxes_GST + ($this->total_visabuclass_fees - $this->consultation_fee - $this->descuento);
            $this->print_billing_info ("Total Visa Subclass (MMM FEES)", $this->total_visabuclass_fees_GST, '+','B',10);  
            //total_visabuclass_fees_GST


            $this->Ln( 7 );
            $this->SetFont( 'Arial' , 'B' , 9 );
            $this->Cell( 0 , 3 , utf8_decode( "SERVICES " ) , 0 , 0 , 'L' );
            $this->Ln( 4 );
            $this->print_line( $this->getY() );

            $this->SetFont( 'Arial' , '' , 8 );

            if( ! empty( $r->examen_medico ) and ( $r->examen_medico * 1 ) > 0 ) {

                $this->Ln( 5 );
                $this->Cell( 5 );
                $this->Cell( 100 , 3 , utf8_decode( "Examen Médico " ) , 0 , 0 , 'L' );
                $this->Cell( 0 , 3 , utf8_decode( number_format( ( $r->examen_medico * 1 ) , 2 , ',' , '.' ) ) . ' AUD' , 0 , 0 , 'R' );
            }

            if( ! empty( $r->seguro ) and $r->seguro > 0 ) {
                $this->Ln( 5 );
                $this->Cell( 5 );

                $my_seguro = '';
                if( ! empty( $r->duracion ) )
                    $my_seguro = "( " . $r->asegurador . " " . $r->duracion . " meses " . $r->tipo_seguro . " )";

                $this->Cell( 100 , 3 , utf8_decode( "Insurance Value " . $my_seguro . " " ) , 0 , 0 , 'L' );
                $this->Cell( 0 , 3 , utf8_decode( number_format( ( $r->seguro * 1 ) , 2 , ',' , '.' ) ) . ' AUD' , 0 , 0 , 'R' );
            }

            if( ! empty( $r->total_visa ) and $r->total_visa > 0 ) {

                $visa = new Veta_TiposVisa();
                $visa->retrieve($r->veta_tiposvisa_id_c);

                // $this->Ln( 5 );
                // $this->Cell( 5 );
                // $this->Cell( 100 , 3 , utf8_decode( "Visa Fee ( " . $visa->name . " )" ) , 0 , 0 , 'L' );
                // $this->Cell( 0 , 3 , utf8_decode( number_format( ( $r->total_visa * 1 ) , 2 , ',' , '.' ) ) . ' AUD' , 0 , 0 , 'R' );
                $this->print_billing_info ("Department's Visa Fee - Base application charge ( " . $visa->name . " )", $r->total_visa, '+','',8);
                $this->total_taxes_Department_Credit_Card += $r->total_visa * ($this->taxes_Department_Credit_Card);                
                $this->print_billing_info ("Department's Credit Card Surcharge (1.4%) ( " . $visa->name . " )", $this->total_taxes_Department_Credit_Card, '+','',8); 
            }                       

            $this->Ln( 7 );
        }
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
        $this->Cell( 0 , 8 , utf8_decode( number_format( ( $d->bono * 1 ) , 2 , ',' , '.' ) ) . ' AUD' , 0 , 0 , 'R' , true );
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
        $descuento = ( $this->r->descuento * 1 );
        
        //$this->AddPage();
        // $this->MultiCell( 0 , 3 , utf8_decode( " ") , 0 , 'R' );
        // $this->MultiCell( 0 , 3 , utf8_decode( " ") , 0 , 'R' );


        $this->print_servicios( $this->r );
        //$total_plus = ( $this->total_depositos * 1 ) + ( $this->r->examen_medico * 1 ) + ( $this->r->seguro * 1 ) + ( $this->r->total_visa * 1 ) + ( $this->total_visabuclass_fees * 1 ) + $this->total_taxes_Department_Credit_Card;
        $total_plus = ( $this->total_depositos * 1 ) + ( $this->r->examen_medico * 1 ) + ( $this->r->seguro * 1 ) + ( $this->r->total_visa * 1 ) + ( $this->total_visabuclass_fees * 1 ) + $this->total_taxes_Department_Credit_Card;
        //$this->r->primer_pago = ( $this->total_depositos * 1 ) + ( $this->r->examen_medico * 1 ) + ( $this->r->seguro * 1 ) + ( $this->r->total_visa * 1 ) - ($this->descuento * 1);
        $total_less = ($this->consultation_fee * 1) + ($this->r->descuento * 1);  

        // $this->Ln( 11 );
        // $this->SetFont( 'Arial' , 'B' , 9 );
        // $this->Cell( 0 , 3 , utf8_decode( "TAXES " ) , 0 , 0 , 'L' );
        // $this->Ln( 4 );
        // $this->print_line( $this->getY() );

        // $this->SetFont( 'Arial' , '' , 8 );
        // //$this->taxes_GST = $taxes_fees->gst /100;
        
        // // $this->print_billing_info ("Total department", $this->total_taxes_Department_Credit_Card, '+','',8);                     
        // // $this->print_billing_info ("PLUS", $total_plus, '+','',8);                     
        
        // $this->print_billing_info ("GST (10%)", $total_plus * $this->taxes_GST, '+','',8);                     
        // $this->total_taxes_GST = $total_plus * $this->taxes_GST;
        // $this->MultiCell( 0 , 3 , utf8_decode( " ") , 0 , 'R' );   



        $this->SetFillColor( 123 , 72 , 156 );
        $this->SetTextColor( 255 , 255 , 255 );
        $this->SetFont( 'Arial' , 'B' , 9 );

        // $this->Cell( 100 , 6 , utf8_decode( "TOTAL GENERAL " ) , 0 , 0 , 'L' , true );
        // $this->SetFont( 'Arial' , 'B' , 10 );
        // $this->Cell( 0 , 6 , utf8_decode( number_format( $this->r->gran_total * 1 , 2 , ',' , '.' ) ) . ' AUD' , 0 , 0 , 'R' , true );

        /* $this->Ln( 7 );

         $this->Cell( 100 , 6 , utf8_decode( "TOTAL PESOS " ) , 0 , 0 , 'L' , true );
         $this->SetFont( 'Arial' , 'B' , 10 );
         $this->Cell( 0 , 6 , '$ ' . utf8_decode( number_format( $this->r->pesos * 1 , 0 , ',' , '.' ) ) , 0 , 0 , 'R' , true );    */

        // $this->Ln( 7 );
        
        // $this->Cell( 100 , 6 , utf8_decode( "DISCOUNT " ) , 0 , 0 , 'L' , true );
        // $this->SetFont( 'Arial' , 'B' , 10 );
        
        // $this->Cell( 0 , 6 , utf8_decode( number_format( $descuento * 1 , 0 , ',' , '.' ) ) . ' AUD' , 0 , 0 , 'R' , true );

        // $this->Ln( 7 );

        // $this->Cell( 100 , 6 , utf8_decode( "TOTAL PAYMENT " ) , 0 , 0 , 'L' , true );
        // $this->SetFont( 'Arial' , 'B' , 10 );
        
        $primer_pago = $total_plus + $this->total_taxes_GST - $total_less;

        $this->r->primer_pago = ( $this->total_depositos * 1 ) + ( $this->r->examen_medico * 1 ) + ( $this->r->seguro * 1 ) + ( $this->r->total_visa * 1 ) - ($this->descuento * 1);
        //$this->Cell( 0 , 6 ,  utf8_decode( number_format( $this->r->primer_pago * 1 , 0 , ',' , '.' ) ) . ' AUD' , 0 , 0 , 'R' , true );

        $this->r->primer_pago = $primer_pago;
        $this->r->pendiente_por_pagar = $primer_pago;

        // $this->Cell( 0 , 6 ,  utf8_decode( number_format( $primer_pago * 1 , 2 , ',' , '.' ) ) . ' AUD' , 0 , 0 , 'R' , true );



        





        //$this->Ln( 8 );

        $this->SetFillColor( 255 , 255 , 255 );
        $this->SetTextColor( 27 , 27 , 27 );
        $this->SetFont( 'Arial' , '' , 8 );
        // $this->Cell( 130 , 3 , utf8_decode( "Total con tipo de cambio actual: " ) , 0 , 0 , 'R' , true );
        $this->SetFont( 'Arial' , 'B' , 8 );
        // $this->Cell( 20 , 3 , utf8_decode( number_format( ( $this->r->usd * 1 ) , 2 , ',' , '.' ) . ' USD' ) , 0 , 0 , 'L' , true );
        $this->SetFont( 'Arial' , '' , 8 );
        // $this->Cell( 0 , 3 , utf8_decode( "Tipo de Cambio: ( " . number_format( ( $this->r->aud_usd * 1 ) , 5 , ',' , '.' ) . ' AUD )' ) , 0 , 0 , 'R' , true );
    }

    private function print_abonos() {

        $abonos = $this->r->get_linked_beans( 'veta_abono_veta_recibo' , 'Veta_Abono' );

        //if( count( $abonos ) > 0 ) {

        //$this->AddPage();
        
        $this->SetFillColor( 123 , 72 , 156 );
        $this->SetTextColor( 255 , 255 , 255 );
        $this->SetFont( 'Arial' , 'B' , 10 );

        $this->Cell( 100 , 6 , utf8_decode( "GRAND TOTAL TO PAY " ) , 0 , 0 , 'L' , true );
        $this->Cell( 0 , 6 , ' ' . utf8_decode( number_format( $this->r->pendiente_por_pagar * 1 , 2 , ',' , '.' ) ) . ' AUD' , 0 , 0 , 'R' , true );       
        
        $this->Ln( 6 );

        $this->SetFillColor( 123 , 72 , 156 );
        $this->SetTextColor( 255 , 255 , 255 );
        $this->SetFont( 'Arial' , 'B' , 10 );
        $this->Cell( 100 , 6 , utf8_decode( "TOTAL PAID" ) , 0 , 0 , 'L' , true );
        $this->Cell( 0 , 6 , utf8_decode( number_format( $this->r->pagado * 1 , 2 , ',' , '.' ) ) . ' AUD' , 0 , 0 , 'R' , true );

        // $this->Ln( 7 );

        // $this->Cell( 100 , 6 , utf8_decode( "GRAND TOTAL TO PAY " ) , 0 , 0 , 'L' , true );
        // $this->Cell( 0 , 6 , ' ' . utf8_decode( number_format( $this->r->pendiente_por_pagar * 1 , 2 , ',' , '.' ) ) . ' AUD' , 0 , 0 , 'R' , true );

        $this->Ln( 6 );
        // VISA SUB CLASS MMM PENDING FEES
        $this->Cell( 100 , 6 , utf8_decode( "OUTSTANDING AMOUNT" ) , 0 , 0 , 'L' , true );
        $pendiente_primer_pago = ($this->r->pagado * 1) > ($this->r->primer_pago * 1) ? 0 : ($this->r->primer_pago * 1) - ($this->r->pagado * 1);
        $this->Cell( 0 , 6 , ' ' . utf8_decode( number_format( $pendiente_primer_pago * 1 , 2 , ',' , '.' ) ) . ' AUD' , 0 , 0 , 'R' , true );

        
        $this->MultiCell( 0 , 3 , utf8_decode( " ") , 0 , 'R' );  
        $this->MultiCell( 0 , 3 , utf8_decode( " ") , 0 , 'R' ); 
        $this->MultiCell( 0 , 3 , utf8_decode( " ") , 0 , 'R' ); 

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

        foreach( $abonos as $a ) {
            $this->print_abono( $a );
        }

        
        // }      


        //$this->r->pendiente_por_pagar = $pendiente_primer_pago;
        //$this->r->save();
        
        $this->r->db->query( "update veta_recibo SET pendiente_por_pagar = '" . strval( $pendiente_primer_pago) . "' WHERE id = '" . $this->r->id . "'" );             
        $this->r->db->query( "update veta_recibo SET gran_total = '" . strval( $this->r->pendiente_por_pagar) . "' WHERE id = '" . $this->r->id . "'" );             
        

        //$this->r->save();


    }

    private function print_abono( Veta_Abono $a ) {

        $this->Ln( 4 );
        $this->Cell( 30 , 3 , utf8_decode( substr( $a->date_entered , 0 , 10 ) ) , 0 , 0 , 'L' );
        $this->MultiCell( 140 , 3 , utf8_decode( $a->description ) , 0 , 'J' , false );
        $this->Cell( 0 , 3 , utf8_decode( number_format( ( $a->monto ) , 2 , ',' , '.' ) ) . ' AUD' , 0 , 0 , 'R' );

    }


    function Footer() {

        $u = new User();
        $u->retrieve( $this->r->created_by );

        $this->SetY( -25 );

        // Dibujamos una linea para pintar todo el footer de gris
        $this->SetDrawColor( 153 , 153 , 153 );
        $this->SetLineWidth( 25 );
        $this->Line( 0 , $this->GetY() + 15 , $this->w , $this->GetY() + 15 );

        $this->SetFillColor( 153 , 153 , 153 );
        $this->SetTextColor( 0 , 0 , 0 );
        $this->SetFont( 'Arial' , 'B' , 9 );

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
        // $this->leftTextInfo(date('d-m-Y', strtotime($this->r->date_modified. ' + 5 days')), "", 8);

         
        $this->treeColumnsText_billingInfo("Invoice Date:", "Invoice Date:", "MMMigration", 125, 40, 0, "B", "B", "");
        $this->treeColumnsText_billingInfo(substr( $this->r->date_modified , 0 , 10 ), substr( $this->r->date_modified , 0 , 10 ), "Suite 102", 125, 40, 0, "", "", "");
        $this->treeColumnsText_billingInfo("Invoice Due Date:", "Invoice Number:", "22 Market Street", 125, 40, 0, "B", "B", "");
        $this->treeColumnsText_billingInfo(date('d-m-Y', strtotime($this->r->date_modified. ' + 5 days')), "INV-8432", "SYDNEY NSW 2000", 125, 40, 0, "", "", "");
        $this->treeColumnsText_billingInfo("ID 1.603", "Reference:", "AUSTRALIA", 125, 40, 0, "B", "B", "");
        $this->treeColumnsText_billingInfo("", "MASS0005-AD_408_1", "", 125, 40, 0, "", "", "");
        $this->treeColumnsText_billingInfo("ANZ Bank, Branch York and Market Street, Sydney, NSW 2000", "Single", "", 125, 40, 0, "B", "", "");
        $this->treeColumnsText_billingInfo("BSB: 012172 Account Number: 3095-20987", "Install_Applicant-MP", "", 125, 40, 0, "B", "", "");
        $this->treeColumnsText_billingInfo("Account Name: MMMigration", "ABN:", "", 125, 40, 0, "B", "B", "");
        $this->treeColumnsText_billingInfo("", "19 623 733 077", "", 125, 40, 0, "", "", "");    
        
        
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
    

}