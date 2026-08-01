<?php


require_once( 'include/MVC/View/views/view.edit.php' );
require_once ('modules/Veta_Presupuesto/clases/PresupuestoPDF_company.php');


class Veta_PresupuestoViewPdf_company extends ViewEdit
{

    function preDisplay() {

        header("Location:" . $_REQUEST['pid'] . ".pdf");

    }
}