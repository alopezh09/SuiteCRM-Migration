<?php
if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}

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

/*********************************************************************************

 * Description: This file is used to override the default Meta-data DetailView behavior
 * to provide customization specific to the Campaigns module.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/



class OpportunitiesViewDetail extends ViewDetail
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @deprecated deprecated since version 7.6, PHP4 Style Constructors are deprecated and will be remove in 7.8, please update your code, use __construct instead
     */
    public function OpportunitiesViewDetail()
    {
        $deprecatedMessage = 'PHP4 Style Constructors are deprecated and will be remove in 7.8, please update your code';
        if (isset($GLOBALS['log'])) {
            $GLOBALS['log']->deprecated($deprecatedMessage);
        } else {
            trigger_error($deprecatedMessage, E_USER_DEPRECATED);
        }
        self::__construct();
    }


    public function display()
    {
        $currency = new Currency();
        if (isset($this->bean->currency_id) && !empty($this->bean->currency_id)) {
            $currency->retrieve($this->bean->currency_id);
            if ($currency->deleted != 1) {
                $this->ss->assign('CURRENCY', $currency->iso4217 .' '.$currency->symbol);
            } else {
                $this->ss->assign('CURRENCY', $currency->getDefaultISO4217() .' '.$currency->getDefaultCurrencySymbol());
            }
        } else {
            $this->ss->assign('CURRENCY', $currency->getDefaultISO4217() .' '.$currency->getDefaultCurrencySymbol());
        }
        $this->load_observations();

        parent::display();
    }

    
    private function load_observations()
    {
        $q = "SELECT 
        r.name as recibo_id,
        r.description as recibo_observation,
        p.name as presupuesto_id,
        p.description as presupuesto_observation,
        rq.name as requerimiento_id,
        rq.description as requerimiento_observation,
        s.name as serviciocliente_id,
        s.description as serviciocliente_observation,
        v.name as visa_id,
        v.description as visa_observation,
        pc.name as pagocolegio_id,
        pc.description as pagocolegio_observation
        FROM opportunities o
        LEFT JOIN veta_recibo_opportunities_c ro on ro.veta_recibo_opportunitiesopportunities_idb = o.id
        LEFT JOIN veta_recibo r on r.id = ro.veta_recibo_opportunitiesveta_recibo_ida and r.deleted = 0
        LEFT JOIN veta_recibo_veta_presupuesto_c rp on rp.veta_recibo_veta_presupuestoveta_recibo_idb = r.id
        LEFT JOIN veta_presupuesto p on p.id = rp.veta_recibo_veta_presupuestoveta_presupuesto_ida and p.deleted = 0
        LEFT JOIN veta_requerimiento_veta_recibo_c rqr on rqr.veta_requerimiento_veta_reciboveta_recibo_idb = r.id
        LEFT JOIN veta_requerimiento rq on rq.id = rqr.veta_requerimiento_veta_reciboveta_requerimiento_ida and rq.deleted = 0
        LEFT JOIN veta_serviciocliente_opportunities_c so on so.veta_serviciocliente_opportunitiesopportunities_ida = o.id
        LEFT JOIN veta_serviciocliente s on s.id = so.veta_serviciocliente_opportunitiesveta_serviciocliente_idb and s.deleted = 0
        LEFT JOIN veta_visa_opportunities_c vo on vo.veta_visa_opportunitiesopportunities_ida = o.id
        LEFT JOIN veta_visa v on v.id = vo.veta_visa_opportunitiesveta_visa_idb and v.deleted = 0
        LEFT JOIN veta_pagocolegios_opportunities_c pco on pco.veta_pagocolegios_opportunitiesopportunities_ida = o.id
        LEFT JOIN veta_pagocolegios pc ON pc.id = pco.veta_pagocolegios_opportunitiesveta_pagocolegios_idb and pc.deleted = 0
        WHERE o.id ='" . $this->bean->id . "'";

        $result = $this->bean->db->query($q, true, "Error obteniendo informacion del presupuesto asociado al proceso de venta " . $this->bean->id);

        $res = [
            "recibo" => ["ids" => [], "description" => ''],
            "presupuesto" => ["ids" => [], "description" => ''],
            "requerimiento" => ["ids" => [], "description" => ''],
            "serviciocliente" => ["ids" => [], "description" => ''],
            "visa" => ["ids" => [], "description" => ''],
            "pagocolegio" => ["ids" => [], "description" => '']
        ];

        function concat_description($registro, $modulo, $i, &$res)
        {
            $id = $registro[$modulo . "_id"];
            $observacion = $registro[$modulo . "_observation"];
            if (array_search($id, $res["$modulo"]["ids"]) === false) {
                $res[$modulo]["description"] .= ($res[$modulo]["description"] === "" ? "" : "\n\n") . "Description $id: \n\n$observacion";
                $res["$modulo"]["ids"][] = $id;
            } else if ($i == 1) {
                $res[$modulo]["description"] = "Description $id: \n\n$observacion";
            }
        }
        $i = 1;
        while ($row  = $this->bean->db->fetchByAssoc($result)) {
            concat_description($row, "recibo", $i, $res);
            concat_description($row, "presupuesto", $i, $res);
            concat_description($row, "requerimiento", $i, $res);
            concat_description($row, "serviciocliente", $i, $res);
            concat_description($row, "visa", $i, $res);
            concat_description($row, "pagocolegio", $i, $res);
            $i++;
        }



        $this->bean->requirement_description_c = $res['requerimiento']['description'];
        $this->bean->budget_description_c = $res['presupuesto']['description'];
        $this->bean->billingstatement_description_c = $res['recibo']['description'];
        $this->bean->customerservice_description_c = $res['serviciocliente']['description'];
        $this->bean->visa_description_c = $res['visa']['description'];
        $this->bean->pagocolegios_description_c = $res['pagocolegio']['description'];
    }

}
