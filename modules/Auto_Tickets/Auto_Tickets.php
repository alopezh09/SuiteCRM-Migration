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


class Auto_Tickets extends Basic
{
    public $new_schema = true;
    public $module_dir = 'Auto_Tickets';
    public $object_name = 'Auto_Tickets';
    public $table_name = 'auto_tickets';
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
    public $last_answered;
    public $date_sent;
    public $status;

    public function bean_implements($interface)
    {
        switch ($interface) {
            case 'ACL':
                return true;
        }

        return false;
    }

    public static $module_dict = [
        "REQ" => [
            "relationship" => "auto_tickets_veta_requerimiento",
            "module" => "Veta_Requerimiento",
            "table" => "veta_requerimiento"
        ],
        "WRK" => [
            "relationship" => "auto_tickets_opportunities",
            "module" => "Opportunity",
            "table" => "opportunities"
        ],
        "BLL" => [
            "relationship" => "auto_tickets_veta_recibo",
            "module" => "Veta_Recibo",
            "table" => "veta_recibo"
        ],
        "BDG" => [
            "relationship" => "auto_tickets_veta_presupuesto",
            "module" => "Veta_Presupuesto",
            "table" => "veta_presupuesto"
        ],
        "APP" => [
            "relationship" => "auto_tickets_veta_aplicacion",
            "module" => "Veta_Aplicacion",
            "table" => "veta_aplicacion"
        ],
        "CUS" => [
            "relationship" => "auto_tickets_veta_serviciocliente",
            "module" => "Veta_ServicioCliente",
            "table" => "veta_servicioclient"
        ]
    ];

    public static function getTicketsBySubject($subject)
    {
        $asunto = preg_replace("/([\[\(] *)?(RE|FWD?) *([-:;)\]][ :;\])-]*|$)|\]+ *$/i", '', $subject);
        $ticket = new Auto_Tickets();
        return $ticket->get_full_list('date_entered', "auto_tickets.name = '$asunto' AND auto_tickets.deleted = 0");
    }

    public static function get_requerimiento_by_email($address)
    {
        global $db;
        $query = "SELECT r.id
        FROM veta_requerimiento r
        JOIN veta_requerimiento_leads_c rl ON rl.veta_requerimiento_leadsveta_requerimiento_idb = r.id AND rl.deleted = 0
        JOIN email_addr_bean_rel eabr ON eabr.bean_id = rl.veta_requerimiento_leadsleads_ida AND eabr.bean_module = 'Leads' AND eabr.deleted = 0
        JOIN email_addresses ea ON ea.id = eabr.email_address_id AND ea.deleted = 0
        WHERE r.estado <> 'Descartado' AND r.deleted = 0 AND ea.email_address = '$address'
        ORDER BY r.date_modified DESC";
        $res = $db->query($query, true, "Error obteniendo un prospecto por su email : ");
        $req = [];

        if ($row = $db->fetchByAssoc($res)) {
            return BeanFactory::getBean('Veta_Requerimiento', $row['id']);
        }

        return;
    }

    public static function findLastestModule($requerimientoId)
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

    public static function createNew($emailData, $user = NULL)
    {
        global $current_user;

        // revisar si ya existe ticket por asunto
        $asunto = preg_replace("/(RE|FWD?) *([-:;][ :;]*|$)/i", '', $emailData['NAME']);
        // $asunto = preg_replace("/([\[\(] *)?(RE|FWD?) *([-:;)\]][ :;\])-]*|$)|\]+ *$/i", '', $emailData['NAME']);

        $ticketList = self::getTicketList($asunto);

        if (count($ticketList)) return $ticketList;

        // crear ticket
        $ticket = new Auto_Tickets();
        $ticket->name = $asunto;
        $ticket->date_sent = $emailData['DATE_SENT_RECEIVED'];
        $ticket->assigned_user_id = is_null($user) ? $current_user->id : $user->id;
        $ticket->status = 'Pendiente';
        $ticket->save();

        return [$ticket];
    }

    public static function getTicketList($asunto)
    {
        $ticket = new Auto_Tickets();
        return $ticket->get_full_list('date_entered', "auto_tickets.name = '$asunto' AND auto_tickets.deleted = 0");
    }

    public function importEmail($emailData, $bean = NULL)
    {
        $inboundEmail = new InboundEmail();
        $inboundEmail->retrieve($emailData['INBOUND_EMAIL_RECORD'], true, true);
        $inboundEmail->connectMailserver();
        $importedEmailId = $inboundEmail->returnImportedEmail($emailData['MSGNO'], $emailData['UID']);

        $this->load_relationship('auto_tickets_emails');
        $this->auto_tickets_emails->add($importedEmailId);

        if ($bean instanceof SugarBean && !empty($bean->id)) {
            $email = new Email();
            $email->retrieve($importedEmailId);
            $email->parent_type = $bean->module_name;
            $email->parent_id = $bean->id;
            $email->save();
        }

        return $importedEmailId;
    }


    public function answer($date = null)
    {
        $this->status = 'Contestado';
        $this->last_answered = $date ? $date : date('Y-m-d H:i:s');
        $this->save();
    }
}
