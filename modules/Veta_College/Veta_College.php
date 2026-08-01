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

require_once ('modules/Veta_TiposVisa/Veta_TiposVisa.php');


class Veta_College extends Basic
{
    public $new_schema = true;
    public $module_dir = 'Veta_College';
    public $object_name = 'Veta_College';
    public $table_name = 'veta_college';
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
    public $pais;
    public $estado;
    public $ciudad;
    public $components;
    public $concept;
    public $fee;
    public $visaType;
	
    public function bean_implements($interface)
    {
        switch($interface)
        {
            case 'ACL':
                return true;
        }

        return false;
    }

    private function update_total_visa()
    {
        $tipo_visa = new Veta_TiposVisa();
        $tipo_visa->retrieve( $this->veta_tiposvisa_id_c );

    }
	
}


class addTotalCollege {
    protected static $fee = 0;
   

    function stepOne(&$focus, $event, $arguments) {

            $focus->custom_fields->retrieve();
            self::$fee += $focus->fee; 
    }

    function stepTwo($event, $arguments) {
            if ($GLOBALS['action'] == 'index' || $GLOBALS['action'] == 'ListView') {
                  
                    $fee = self::$fee;

                    echo <<<EOHTML
<script type="text/javascript">
<!--
$('<td nowrap="nowrap" align="center" class="paginationChangeButtons" width="2%"> <b>Fee: {$fee}</b></td>').insertBefore('.paginationChangeButtons');
--> 
</script>
EOHTML;
            }
    }
}