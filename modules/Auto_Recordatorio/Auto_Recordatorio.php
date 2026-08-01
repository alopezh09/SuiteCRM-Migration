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


 define("NO_LEAD_ERROR", 1);
 define("NO_USER_ERROR", 2);
 define("WA_API_ERROR", 3);
 define("EMAIL_ERROR", 4);
 define("MODULE_ERROR", 5);
 define("TOKENS_ERROR", 6);
 
class Auto_Recordatorio extends Basic
{
    public $new_schema = true;
    public $module_dir = 'Auto_Recordatorio';
    public $object_name = 'Auto_Recordatorio';
    public $table_name = 'auto_recordatorio';
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
    public $lead_id_c;
    public $lead;
    public $next;
    public $type;

    public function bean_implements($interface)
    {
        switch ($interface) {
            case 'ACL':
                return true;
        }

        return false;
    }

    private function send_request($url, $data)
    {
        $additional_headers = array(
            'Accept: application/json',
            'Content-Type: application/json',
            'Cookie: PHPSESSID=crmsession'
        );

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $additional_headers);

        $server_output = curl_exec($ch);
        try {
            $res = json_decode($server_output);
            if ($res->success) {
                return $res->data;
            } else {
                return [];
            }
        } catch (Exception $e) {
            logerror($e, $server_output);
            return [];
        }
    }

    private function send_whatsapp($data, $isSim = false)
    {

        /** @var Leads $lead */
        $lead = BeanFactory::getBean("Leads", $data->lead_id_c);
        if (empty($lead->full_name)) return NO_LEAD_ERROR;

        /** @var User $user */
        $user = BeanFactory::getBean("Users", $data->user_id_c);
        if (empty($user->full_name)) return NO_USER_ERROR;

        $tokens =  json_decode(html_entity_decode($data->tokens, ENT_QUOTES), true);
        if ($tokens === NULL) {
            logerror("auto_recordatorio", $data->tokens, json_last_error());
            return TOKENS_ERROR;
        }

        $data = [
            "status" => "Outbound",
            "msg_status" => "Planned",
            "action_date" => date("c"),
            "msg" => $data->wa_template,
            "template_contentSid" => $data->wa_template,
            "template_contentVariables" => json_encode($tokens),
            "phone" => $isSim ? "+573004233919" : $lead->phone_mobile,
            "name" => $lead->full_name,
            "beanId" => $lead->id,
            "user" => $user->fetched_row,
        ];

        var_dump($data);
        // logerror("auto_recordatorio",$data);
        $callId = $this->send_request('http://localhost:6060/messages', $data);
        if (!$callId) return WA_API_ERROR;

        return true;
    }

    private function send_email($data, $isSim = false)
    {
        /** @var Leads $lead */
        $lead = BeanFactory::getBean("Leads", $data->lead_id_c);
        if (empty($lead->full_name)) return NO_LEAD_ERROR;

        /** @var User $user */
        $user = BeanFactory::getBean('Users', $data->user_id_c);
        if (empty($user->full_name)) return NO_USER_ERROR;

        /** @var SugarBean $module */
        $module = BeanFactory::getBean($data->parent_type, $data->parent_id);
        var_dump($data->parent_type, $data->parent_id);
        if (empty($module->name)) return MODULE_ERROR;

        $tokens =  json_decode(html_entity_decode($data->tokens, ENT_QUOTES), true);
        if ($tokens === NULL) {
            logerror("auto_recordatorio", $data->tokens, json_last_error());
            return TOKENS_ERROR;
        }

        // $mail = Media::prepare_email_from_template($user, ['craulhidalgop@gmail.com'], $data->emailtemplate_id_c, $tokens, $tokens);
        $mail = Media::prepare_email_from_template($user, $isSim ? ['craulhidalgop@gmail.com'] : [$lead->email1], $data->emailtemplate_id_c, $tokens, $tokens);
        $mail->assigned_user_id = $user->id;
        if ($mail->Send()) {
            sleep(1);
            $emailObj = crear_email($module, $mail, true);
            return true;
        } else {
            return EMAIL_ERROR;
        }
    }

    public function send_remainder($id)
    {
        /** @var Auto_Recordatorio $recordatorio */
        $recordatorio = BeanFactory::getBean("Auto_Recordatorio", $id);
        $recordatorio->description = "{success:'sending'}";
        $recordatorio->save();

        if (empty($recordatorio->name)) return;

        switch ($recordatorio->type) {
            case 'Whatsapp':
                $success = $this->send_whatsapp($recordatorio, false);
                break;
            case 'Email':
                $success = $this->send_email($recordatorio, false);
                break;

            default:
                $success = $this->send_whatsapp($recordatorio, false);
                $success = $this->send_email($recordatorio, false);
                break;
        }

        if ($success === true) {
            $recordatorio->description = "{status:'sent'}";
            $recordatorio->sent = 1;
            $recordatorio->save();
        } else {
            if ($success === TOKENS_ERROR) {

                $error_mesage = json_last_error_msg();
            }
            $data = html_entity_decode($recordatorio->tokens, ENT_QUOTES);
            $recordatorio->description = "{status:'failed',error_code:$success,error_message:'$error_mesage',data:'$data'}";
            $recordatorio->save();
            logerror("auto_recordatorio", $success);
        }
    }

    public function send_remainders($sim_timedate = NULL)
    {


        $sim_date = "curdate()";
        $sim_hour = "hour(now())";

        if ($sim_timedate) {

            $sim_date = "'" . $sim_timedate->format('Y-m-d') . "'";
            $sim_hour = "'" . $sim_timedate->format('H') . "'";
        }

        $query = "SELECT id FROM vetacrm2.auto_recordatorio WHERE date(send_date) = $sim_date AND hour(send_date) = $sim_hour AND sent = 0 AND deleted = 0;";
        logerror("auto_recordatorio", $query);

        $res = $this->db->query($query);
        while ($row = $this->db->fetchByAssoc($res)) {
            $this->send_remainder($row['id']);
        }
    }

    public function sim_remainders()
    {
        $current_date = new DateTime();

        for ($i = 0; $i < 168; $i++) {
            $sim_date = clone $current_date;

            $interval = DateInterval::createFromDateString("$i hour");
            $sim_date->add($interval);
            $this->send_remainders($sim_date);
        }
    }
}
