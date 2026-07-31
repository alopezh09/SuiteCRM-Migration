<?php


class Veta_VisaController extends SugarController
{
    function action_is_dama()
    {

        $bean = BeanFactory::getBean("Veta_Visa", $_REQUEST['record']);


        $workflow = $bean->get_linked_beans("veta_visa_opportunities")[0];
        if (empty($workflow)) {
            echo 0;
            die;
        }

        $bill = $workflow->get_linked_beans("veta_recibo_opportunities")[0];
        if (empty($bill)) {
            echo 0;
            die;
        }

        $fees = $bill->get_linked_beans("veta_recibo_veta_college_1", '', '', 0, -1, 0, 'name LIKE "%DAMA%"');

        if (empty($fees)) {
            echo 0;
            die;
        }

        echo 1;
        die;
    }
}
