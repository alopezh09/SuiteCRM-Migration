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

if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}

require_once 'modules/Emails/include/ListView/ListViewSmartyEmails.php';

class EmailsViewList extends ViewList
{
    /**
     * @var Email
     */
    public $seed;

    function getCurrentMailbox()
    {
        global $current_user;
        $inboundEmailID = $current_user->getPreference('defaultIEAccount', 'Emails');
		// var_dump($inboundEmailID);die;
        return BeanFactory::getBean('InboundEmail',  $_REQUEST['folders_id'] ?  $_REQUEST['folders_id'] : $inboundEmailID);
    }

    function update($folder)
    {
        global $current_user;


        /**
         * @var InboundEmail $inboundEmail
         */
        $mailbox = $this->getCurrentMailbox();
        if (!$mailbox) {
            $this->redireccionar("Mailbox no configurado, por favor contacte al administrador");
            return;
        }
        logerror(['update emails',$mailbox->email_user]);
        
        // $email = $current_user->email1;
        $email = $mailbox->email_user;

        $url = 'http://localhost:3030/emails';
        $additional_headers = array(
            'Accept: application/json',
            'Content-Type: application/json'
        );
        $data = [
            'user' => $email,
            'folder' => $folder
        ];
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $additional_headers);

        $server_output = curl_exec($ch);
        logerror(['update emails',$server_output]);
    }

    /**
     * setup display
     */
    public function preDisplay()
    {

        $this->update(NULL);
        $this->lv = new ListViewSmartyEmails();
    }
    public function display()
    {
        global $current_user;
        $ret =  parent::display();

        if (!$this->lv->data['data'][0]['ID']) return $ret;

        $email = new Email();
        $email->retrieve($this->lv->data['data'][0]['ID']);

        if ($email->folder_c == 'inbox') {
            $this->createTickets($this->lv->data['data']);
        } elseif ($this->lv->data['data'][0]['FOLDER'] == 'Elementos enviados') {
            // $this->updateAnsweredTickets($this->lv->data['data']);   
        }
        return $ret;
    }

    public function updateAnsweredTickets($data)
    {
        $regex = "/\[(" . implode("|", array_keys(Auto_Tickets::$module_dict)) . ") - \d+\]/i";

        foreach ($data as $email) {
            if (preg_match($regex, $email['NAME'], $matches)) {
                [$bean, $module] = $this->getRelatedBean($matches[0]);

                /** @var Auto_Tickets[] $tickets */
                $tickets = Auto_Tickets::getTicketsBySubject($email['NAME']);
                if (!count($tickets)) continue;

                $ticket = $tickets[0];

                $ticket->answer();
                $ticket->importEmail($email, $bean);
            }
        }
    }

    public function getRelatedBean($regMatch)
    {
        $matches = explode(' - ', preg_replace('/[\[\]]/i', '', $regMatch));
        $module = Auto_Tickets::$module_dict[$matches[0]];
        $moduleName = $matches[1];

        $moduleInstance = new $module['module']();

        $filter = $module['table'] . ".name = '$moduleName'  AND " . $module['table'] . ".deleted = 0";
        $beanList = $moduleInstance->get_full_list('date_entered', $filter);
        if (!count($beanList)) return [NULL, NULL];
        return [$beanList[0], $module];
    }

    public function findLastestModule($requerimientoId)
    {
        $bean = new Veta_Requerimiento();
        $bean->retrieve($requerimientoId);

        $r = $bean->get_linked_beans('veta_requerimiento_veta_presupuesto', 'Veta_Presupuesto');
        if (!count($r)) return ['REQ', $bean];

        $bean = $r[0];

        $r = $bean->get_linked_beans('veta_recibo_veta_presupuesto', 'Veta_Recibo');
        if (!count($r)) return ['BDG', $bean];

        $bean = $r[0];

        $r = $bean->get_linked_beans('veta_recibo_opportunities', 'Opportunities');
        if (!count($r)) return  ['BLL', $bean];

        $bean = $r[0];

        return  ['WRK', $bean];
    }

    public function createTickets($data)
    {
        $emails = implode(",", array_unique(array_map(function ($email) {

            $regex = '/([a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z0-9_-]+)/';
            preg_match($regex, $email['FROM_ADDR_NAME'], $matches);
            return "'" . $matches[0] . "'";
        }, $data)));

        if (!$emails) return;

        $query = "SELECT 
        eabr.bean_id, eabr.bean_module, email_address,r.id
        FROM
            email_addresses
                JOIN
            email_addr_bean_rel eabr ON eabr.email_address_id = email_addresses.id
                AND eabr.bean_module = 'Leads'
                AND email_addresses.invalid_email = 0
                AND eabr.deleted = 0
                AND eabr.primary_address = 1    
                JOIN veta_requerimiento_leads_c rl ON rl.veta_requerimiento_leadsleads_ida = eabr.bean_id AND rl.deleted = 0
                JOIN veta_requerimiento r ON r.id = rl.veta_requerimiento_leadsveta_requerimiento_idb AND r.deleted = 0
        WHERE
            LOWER(email_address) IN ($emails)
            AND r.estado <> 'Descartado'
            ORDER BY rl.date_modified DESC";

        $res = $this->bean->db->query($query, true, "Error obteniendo un prospecto por su email : ");
        $req = [];

        while ($row = $this->bean->db->fetchByAssoc($res)) {

            if (empty($req[$row['email_address']])) {
                $req[$row['email_address']] = $row['id'];
            }
        }


        foreach ($data as $email) {

            $regex = '/([a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z0-9_-]+)/';
            preg_match($regex, $email['FROM_ADDR_NAME'], $matches);
            $emailAddr = $matches[0];

            if ($req[$emailAddr]) {

                $regexSubject = "/\[(" . implode("|", array_keys(Auto_Tickets::$module_dict)) . ") - \d+\]/i";
                $hasTag = preg_match($regexSubject, $email['NAME'], $subjectMatches);

                if (!$hasTag) {

                    [$mod, $bean] = Auto_Tickets::findLastestModule($req[$emailAddr]);
                    $module = Auto_Tickets::$module_dict[$mod];

                    $email['NAME'] .= " [$mod - $bean->name" . "]";
                } else {
                    [$bean, $module] = $this->getRelatedBean($subjectMatches[0]);
                }

                $emailBean = BeanFactory::getBean('Emails', $email['ID']);
                if (!$emailBean->parent_type) {
                    $emailBean->parent_type = $bean->module_name;
                    $emailBean->parent_id = $bean->id;
                    $emailBean->save();
                }


                if (!$bean) continue;




                $tickets = Auto_Tickets::createNew($email);
                foreach ($tickets as $ticket) {
                    $this->setSemaforizacion($bean, $ticket, $email);

                    $ticket->load_relationship('auto_tickets_emails');
                    $ticket->auto_tickets_emails->add($email['ID']);


                    $ticket->load_relationship($module['relationship']);
                    $ticket->{$module['relationship']}->add($bean->id);
                }
            }
        }

        return;
    }

    public function setSemaforizacion($bean, $ticket, $email)
    {
        // $emails = $ticket->get_linked_beans('auto_tickets_emails');
        // $emails = array_filter($emails, function ($e) use ($email) {
        //     return $e->id === $email['ID'];
        // });
        // if (count($emails)) return;
        switch ($bean->module_name) {
            case 'Veta_Requerimiento':
            case 'Opportunities':
                // $this->actualizar_estado($bean, $ticket->id);
                break;

            default:
                break;
        }
    }

    function actualizar_estado($bean, $id)
    {


        $detalle = json_decode($bean->detalle_semaforizacion_c);
        $table = $bean->get_custom_table_name();

        if (is_null($detalle))
            $detalle = [];
        $detalle->{"ticket_" . "$id"} = true;

        $bean->detalle_semaforizacion_c = json_encode($detalle);


        $query = "UPDATE $table SET estado_semaforizacion_c = 'Amarillo', detalle_semaforizacion_c = '$bean->detalle_semaforizacion_c' WHERE id_c = '$bean->id'";

        $db = DBManagerFactory::getInstance();
        $res = $db->query($query);
    }

    public function redireccionar($msg)
    {
        $aux = "<script>
                    alert('" . $msg . "');
                    window.location = 'index.php?module=Home&action=index';
                 </script>";

        echo $aux;

        exit;
    }
}
