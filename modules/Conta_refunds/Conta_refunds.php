<?php
/**
 *
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 *
 * SuiteCRM is an extension to SugarCRM Community Edition developed by SalesAgility Ltd.
 * Copyright (C) 2011 - 2018 SalesAgility Ltd.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for technical reasons, the Appropriate Legal Notices must
 * display the words "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 */

require_once( 'modules/Veta_Recibo/Veta_Recibo.php' );

class Conta_refunds extends Basic
{
    public $new_schema = true;
    public $module_dir = 'Conta_refunds';
    public $object_name = 'Conta_refunds';
    public $table_name = 'conta_refunds';
    public $importable = false;

    public $id;
    public $name;
    public $date_entered;
    public $date_modified;
    public $modified_user_id;
    public $modified_by_name;
    public $created_by;
    public $created_by_name;
    public $description;
    public $deleted;
    public $created_by_link;
    public $modified_user_link;
    public $assigned_user_id;
    public $assigned_user_name;
    public $assigned_user_link;
    public $SecurityGroups;
    public $amount;
    public $currency_id;
    public $custom_date_entered_applicant;
    public $refund_to;
	
    public function bean_implements($interface)
    {
        switch($interface)
        {
            case 'ACL':
                return true;
        }

        return false;
    }
	
	private function set_consecutivo()
    {
        if ( ! isset( $this->id ) || empty( $this->id ) )
        {
			$query  = "SELECT name as num FROM conta_refunds order by date_entered desc limit 1";
            $result = $this->db->query( $query, true, "Error obteniendo el consecutivo del recibo" );
            $row    = $this->db->fetchByAssoc( $result ); 

            if ( $row != null )
            {
                $this->name = $row[ 'num' ] + 1;
            }			
        }
    }
	
	public function save( $check_notify = false )
    {

        $r = new Veta_Recibo();

        if ( $r->is_gerente_contable() )
        {
			$recibos = $this->get_linked_beans( 'veta_recibo_conta_refunds_1', 'Conta_refunds' );
			
			$refund_requested_date = null;
			foreach ($recibos as $r) {
				$oportunidades = $r->get_linked_beans('veta_recibo_opportunities', 'Opportunity');

				foreach ($oportunidades as $op) {
					$Serv_Cliente = $op->get_linked_beans('veta_serviciocliente_opportunities', 'Veta_ServicioCliente');

					foreach ($Serv_Cliente as $sc) {
						// Consultar la auditoría del registro
						$query = "SELECT DATE(date_created) as date_only 
								  FROM veta_serviciocliente_audit 
								  WHERE parent_id = '{$sc->id}' 
									AND field_name = 'estado' 
									AND after_value_string = 'Refund' 
								  ORDER BY date_created ASC 
								  LIMIT 1";

						$result = $GLOBALS['db']->query($query);
						$row = $GLOBALS['db']->fetchByAssoc($result);

						if ($row) {
							$refund_requested_date = $row['date_only'];
							break 3; // Salir de todos los bucles si encontramos la fecha
						}
					}
				}
			}

			$this->refund_requested_date_c = $refund_requested_date;


            $this->set_consecutivo();
            $aux = parent::save( $check_notify ); // TODO: Change the autogenerated stub

            $r->id = $this->update_recibo();
            //$this->relacionar_estudiante();
			//$this->cerrar_requerimiento();
        }
        else
        {
            $r->redireccionar( 'Solo un gerente contable puede modificar un recibo', $r->id );
        }
    }
	
	private function update_recibo()
    {
        $id      = null;
        $recibos = $this->get_linked_beans( 'veta_recibo_conta_refunds_1', 'Conta_refunds' );

        foreach ( $recibos as $r )
        {
			$r->estado = "Devolucion_Proceso";
            $r->update_cartera();
			
			$oportunidades = $r->get_linked_beans( 'veta_recibo_opportunities', 'Opportunity' );

			foreach ( $oportunidades as $op )
			{
				$o = $op;
			}
			
			if (isset ($o)) {
				$r->actualizar_oportunidad($o);
			}
			
            $id = $r->id;
        }

        return $id;
    }
	
	public function mark_deleted( $id )
    {
        $rec     = new Veta_Recibo();
        $recibos = $this->get_linked_beans( 'veta_recibo_conta_refunds_1', 'Conta_refunds' );

        if ( $rec->is_gerente_contable() )
        {
            parent::mark_deleted( $id ); // TODO: Change the autogenerated stub

            foreach ( $recibos as $r )
                $r->update_cartera();
				
				$oportunidades = $r->get_linked_beans( 'veta_recibo_opportunities', 'Opportunity' );

				foreach ( $oportunidades as $op )
				{
					$o = $op;
					error_log('ALFONSO - OPPORTUNIDAD - DELETE PAGO ' . $o->name);
				}
				
				$r->actualizar_oportunidad($o);
        }
        else
        {
            $this->redireccionar( 'Solo un gerente contable puede eliminar un recibo', $id );
        }
    }
	
	public function redireccionar( $msg, $registro )
    {
        if ( ! empty( $registro ) )
        {
            $aux = "<script>
                      var registro='" . $registro . "';";

            $aux .= "alert('" . $msg . "');
                    window.location = 'index.php?module=Conta_Refunds&action=DetailView&record=' + registro;
                 </script>";

            echo $aux;
        }
        else
        {
            echo "<script>alert('" . $msg . "')</script>";
        }

        exit;
    }
	
}