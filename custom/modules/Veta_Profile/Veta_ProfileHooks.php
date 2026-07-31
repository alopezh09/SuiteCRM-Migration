<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');


class Veta_ProfileHooks
{
    public function set_name($bean)
    {
        // if (!empty($bean->fetched_row) || $bean->name || empty($_REQUEST['veta_requerimiento_name'])) return;

        if ($_REQUEST['relate_id'] && !$bean->fetched_row['name']) {
            $req = BeanFactory::getBean("Veta_Requerimiento", $_REQUEST['relate_id']);
            $subclass = $bean->visa_type ? $bean->visa_type : $bean->subclass;
            $bean->name = "profile_$req->name" . "_$subclass";
        }
    }

    public function set_relationship($bean)
    {
        if ($_REQUEST['relate_id']) {
            $req = BeanFactory::getBean("Veta_Requerimiento", $_REQUEST['relate_id']);
            $bean->load_relationship('veta_profile_veta_requerimiento');
            $bean->veta_profile_veta_requerimiento->add($req->id);
        }
    }
}
