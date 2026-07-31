<?php

require_once( 'modules/Veta_Presupuesto/clases/PresupuestoPDF.php' );
require_once( 'modules/Veta_Presupuesto/clases/PresupuestoPDF_company.php' ); //Changes 15102021


class Veta_PresupuestoController extends SugarController
{
    function action_pdf() {
        $this->view = 'pdf';
        $this->generar_pdf();

    }
    //Changes 15102021
    function action_pdf_company() {
        $this->view = 'pdf_company';
        $this->generar_pdf_company();

    }

    function action_send() { 
        $this->view = 'send'; 

        //if( ! file_exists( $_REQUEST[ 'pid' ] . '.pdf' ) )
            $this->generar_pdf();

    }

    function action_send_company() { 
        $this->view = 'send_company'; 

        //if( ! file_exists( $_REQUEST[ 'pid' ] . '.pdf' ) )
            $this->generar_pdf_company();

    }

    function generar_pdf() {
        $p = new Veta_Presupuesto();
        $p->retrieve( $_REQUEST[ 'pid' ] );

        $pdf = new PresupuestoPDF( 'P' , 'mm' , 'Letter' );
        $pdf->generate_pdf( $p );
    }
    //Changes 15102021
    function generar_pdf_company() {
        $p = new Veta_Presupuesto();
        $p->retrieve( $_REQUEST[ 'pid' ] );

        $pdf = new PresupuestoPDF_company( 'P' , 'mm' , 'Letter' );
        $pdf->generate_pdf( $p );
    }


}
