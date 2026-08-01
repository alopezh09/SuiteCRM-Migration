<?php

class SOELAuditoria
{

    function add_boton_observaciones( $focus , $event , $args ) {

        global $app_list_strings;
        $options = $app_list_strings[ 'lead_source_dom' ];

        $modulo                = $focus->table_name;
        $id                    = $focus->id;
        $name                  = $focus->name;
        $loc                   = "index.php?action=observaciones&module=Veta_Recibo&modulo={$modulo}&id={$id}&name={$name}";
        $focus->soel_auditoria = "<a href='{$loc}' target=\"_blank\" style='border:none;' class=\"suitepicon suitepicon-action-view-record\">&nbsp;</a>";

        $this->asignar_oficina($focus);

        
        /*$query  = "SELECT leads.lead_source, leads.date_entered , leads.id, campaigns.name as campana
                    from leads 
                    left join leads_cstm on leads_cstm.id_c = leads.id
                    left join campaigns on campaigns.id = leads_cstm.campaign_id_c and campaigns.deleted = 0 
                    where contact_id = '" . $focus->id . "' and leads.deleted = 0";

        $result = $focus->db->query( $query , true , "Error obteniendo la toma de contacto del prospecto" );
        $row    = $focus->db->fetchByAssoc( $result );

        if( $row != null ) {

            $focus->soel_fuente   = $options[ $row[ 'lead_source' ] ];
            $focus->soel_creacion =  substr($row[ 'date_entered' ],0,10)  ;
            $focus->soel_campana =  $row[ 'campana' ]  ;
        } */


    }

    /**
     * Este metodo asigna la oficina del asesor comercial a un prospecto
     * @param $focus
     */
    private function asignar_oficina($focus){

        $query = "SELECT leads.id AS ID, CONCAT(leads.first_name, ' ' , leads.last_name) AS NOMBRE,CONCAT(asignado.first_name, ' ', asignado.last_name) AS ASIGNADO_A,TRIM(UPPER(asignado.address_city)) AS OFICINA
                FROM leads INNER JOIN leads_cstm ON leads_cstm.id_c = leads.id LEFT JOIN users asignado ON asignado.id = leads.assigned_user_id
                WHERE leads.deleted = 0 AND leads.id = '" . $focus->id . "'";

        $result = $focus->db->query( $query , true , "Error obteniendo la oficina del comercial asignado a el prospecto" );
        $row    = $focus->db->fetchByAssoc( $result );

        if( $row != null ) {

            $focus->soel_oficina_comercial   = $row[ 'OFICINA' ] ;
        }

        return $focus;
    }
}


class addTotalLeads {
    protected static $valorAPagarEmpresa = 0;
    protected static $empresaValorAPagar = 0;
    protected static $totalPagar = 0;
    protected static $totalPagado = 0;
    protected static $empresaPrimerPago = 0;

    protected static $aplicant_first_payment_amount = 0;
    protected static $company_first_payment_amount = 0;
    protected static $aplicant_mmm_fee = 0;
    protected static $aplicant_departments_visa_fee = 0;

    function stepOne(&$focus, $event, $arguments) {

            $focus->custom_fields->retrieve();
            if (is_numeric($focus->company_mmm_fee)){ self::$valorAPagarEmpresa += $focus->company_mmm_fee * 1; }
            if (is_numeric($focus->aplicant_company_mmm)){ self::$empresaValorAPagar += $focus->aplicant_company_mmm * 1; }
            if (is_numeric($focus->Total)){ self::$totalPagar += $focus->Total * 1; }
            if (is_numeric($focus->total_paid)){ self::$totalPagado += $focus->total_paid * 1; }
            if (is_numeric($focus->aplicant_company_mmm_fees)){ self::$empresaPrimerPago += $focus->aplicant_company_mmm_fees * 1; }
            if (is_numeric($focus->aplicant_first_payment_amount)){ self::$aplicant_first_payment_amount += $focus->aplicant_first_payment_amount * 1; }
            if (is_numeric($focus->company_first_payment_amount)){ self::$company_first_payment_amount += $focus->company_first_payment_amount * 1; }
            if (is_numeric($focus->aplicant_mmm_fee)){ self::$aplicant_mmm_fee += $focus->aplicant_mmm_fee * 1; }
            if (is_numeric($focus->aplicant_departments_visa_fee)){ self::$aplicant_departments_visa_fee += $focus->aplicant_departments_visa_fee * 1; }
            // self::$valorAPagarEmpresa += $focus->company_mmm_fee;
            // self::$empresaValorAPagar += $focus->aplicant_company_mmm;
            // self::$totalPagar += $focus->Total;
            // self::$totalPagado += $focus->total_paid;
            // self::$empresaPrimerPago += $focus->aplicant_company_mmm_fees;

            // self::$aplicant_first_payment_amount += $focus->aplicant_first_payment_amount; 
            // self::$company_first_payment_amount += $focus->company_first_payment_amount; 
            // self::$aplicant_mmm_fee += $focus->aplicant_mmm_fee; 
            // self::$aplicant_departments_visa_fee += $focus->aplicant_departments_visa_fee; 
    }

    function stepTwo($event, $arguments) {
            if ($GLOBALS['action'] == 'index' || $GLOBALS['action'] == 'ListView') {
                    $valorAPagarEmpresa = self::$valorAPagarEmpresa;
                    $empresaValorAPagar = self::$empresaValorAPagar;
                    $totalPagar = self::$totalPagar;
                    $totalPagado = self::$totalPagado;
                    $empresaPrimerPago = self::$empresaPrimerPago;

                    $aplicant_first_payment_amount = self::$aplicant_first_payment_amount;
                    $company_first_payment_amount = self::$company_first_payment_amount;
                    $aplicant_mmm_fee = self::$aplicant_mmm_fee;
                    $aplicant_departments_visa_fee = self::$aplicant_departments_visa_fee;

                    echo <<<EOHTML
<script type="text/javascript">
<!--
$('<td nowrap="nowrap" align="left" class="paginationChangeButtons" width="2%"> <b>pplicant First Payment Date: {$aplicant_first_payment_amount}</b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="1%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"> <b>Company First Payment: {$company_first_payment_amount}</b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"> <b>Applicant Payment: {$aplicant_mmm_fee}</b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"> <b>Visa Fee Aplicant: {$aplicant_departments_visa_fee}</b></td><td nowrap="nowrap" align="left" class="paginationChangeButtons" width="2%"> <b>Valor A Pagar Empresa: {$valorAPagarEmpresa}</b></td><td nowrap="nowrap" align="left" class="paginationChangeButtons" width="2%"> <b>Company Payment: {$empresaValorAPagar}</b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="1%"> <b>Empresa Valor A Pagar:	 {$totalPagar}</b></td><td nowrap="nowrap" align="right" class="paginationChangeButtons" width="2%"><b>Company First Payment:{$empresaPrimerPago}</b></td><td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"><b>Total Paid: {$totalPagado}</b></td>').insertBefore('.paginationChangeButtons');
-->
</script>
EOHTML;
            }
    }
}

