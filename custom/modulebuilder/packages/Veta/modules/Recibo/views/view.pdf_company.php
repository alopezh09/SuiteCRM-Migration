<?php


require_once( 'include/MVC/View/views/view.edit.php' );
require_once ('modules/Veta_Recibo/clases/ReciboPDF_company.php');



class Veta_ReciboViewPdf_company extends ViewEdit
{

    function preDisplay()
    {

        header( "Location:" . $_REQUEST[ 'rid' ] . ".pdf" );

    }
}