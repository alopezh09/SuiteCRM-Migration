<?php

class VetaHooksDepositCompany
{
	function post_save( &$bean, $event, $arguments )
    {	
		error_log('POST SAVE ACTIVATED - DEPOSIT COMPANY');
		/*
        $r = new Veta_Recibo();
        $r->retrieve( $_GET[ "rid" ] );

        if ( $r != null )
        {
            $lead = $r->get_lead();
            $contact = $r->get_contact();

            // Crear relacion con el prospecto o con el estudiante
            if ( isset( $lead ) && $lead->module_name == "Leads" )
            {

                $aux1 = $bean->load_relationship( 'leads_opportunities_1' );
                $aux2 = $bean->leads_opportunities_1->add( $lead->id );
            }

            if ( isset( $contact ) && $contact->module_name == "Contacts" )
            {

                $bean->load_relationship( 'contacts_opportunities_1' );
                $bean->contacts_opportunities_1->add( $contact->id );
            }
        }
		*/
    }
	
	function pre_save( &$bean, $event, $arguments )
    {
		error_log('PRESAVE ACTIVATED - DEPOSIT COMPANY');
        /*global $timedate;
        $r = new Veta_Recibo();
        $r->retrieve( $_GET[ "rid" ] );

        if ( ! isset( $r->id ) )
        {
            $r = $this->get_recibo( $bean );
        }

        $this->set_consecutivo( $bean );

        if ( isset( $r ) )
        {
            $p = $r->get_person();
        }

        if ( isset( $p ) )
        {
            if ( empty( $bean->fecha_expiracion_visa_c ) )
            {
                $bean->fecha_expiracion_visa_c = $timedate->to_db( $p->fecha_expiracion_visa_c );
            }

            if ( empty( $bean->fecha_ultimo_contacto_c ) )
            {
                $bean->fecha_ultimo_contacto_c = $timedate->to_db( $p->fecha_ultimo_contacto_c );
            }

            if ( empty( $bean->fecha_proximo_contacto_c ) )
            {
                $bean->fecha_proximo_contacto_c = $timedate->to_db( $p->fecha_proximo_contacto_c );
            }

            if ( empty( $bean->fecha_viaje_c ) and isset( $p->fecha_viaje_2_c ) )
            {
                $bean->fecha_viaje_c = $timedate->to_db_date( $p->fecha_viaje_2_c );
            }

            if ( empty( $bean->lead_source ) and isset( $p->lead_source ) )
            {
                $bean->lead_source = $p->lead_source;
            }

            if ( empty( $bean->campaign_id ) and isset( $p->campaign_id ) )
            {
                $bean->campaign_id = $p->campaign_id;
            }


        }

        if ( isset( $r ) )
        {
            $pa = $r->get_primer_abono();
        }

        if ( isset( $pa ) )
        {
            $bean->fecha_cierre_c = $timedate->to_db( $pa->date_entered );
            $bean->date_closed    = substr( $timedate->to_db( $pa->date_entered ), 0, 10 );
        }

        if ( $this->es_descartado( $bean ) )
        {
            $bean->sales_stage = 'Descartado';
        }

        if ( isset( $this->estado_admisiones_c ) && $this->estado_admisiones_c == 'COE_Guardado_Enviado' )
        {
            $this->sales_stage = 'Finalizado';
        }

        if ( isset( $r->id ) )
        {
            $bean->estado_cartera_c = $r->estado;
        }

        $bean->pendiente_pago_colegios_c = $this->get_pendiente_pago_colegios( $bean );

        /*if ( ! empty( $bean->date_closed ) )
        {
            $bean->date_closed = $timedate->to_db( $bean->date_closed );
        }*/
    }
	
}