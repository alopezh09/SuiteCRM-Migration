<?php
class Veta_RequerimientoViewSend_MasterPlan extends ViewEdit
{
    private $smarty;

    function preDisplay()
    {
    }

    public function display()
    {
        global $mod_strings, $app_list_strings;
        $requerimiento = BeanFactory::getBean("Veta_Requerimiento", $_REQUEST['pid']);

        if (empty($requerimiento->name)) return;

        $user = BeanFactory::getBean("Users", $requerimiento->assigned_user_id);
        $lead = $requerimiento->get_linked_beans("veta_requerimiento_leads")[0];
        if (empty($lead)) return;


        $profiles = $requerimiento->get_linked_beans("veta_profile_veta_requerimiento");

        $profile_strings = return_module_language("en_us", "Veta_Profile");
        $template = "";
        foreach ($profiles as $profile) {
            $this->smarty = new Sugar_Smarty();

            $fetchedRow = [];
          
            foreach ($profile->fetched_row as $key => $value) {

                $listValue = $app_list_strings[$profile->field_defs[$key]['options']][$value];

                $fetchedRow[$key] = $listValue ? $listValue : $value;
            }

            $data = array_merge($fetchedRow, $profile_strings);

            $this->smarty->assign($data);
            $template .= $this->smarty->fetch('modules/Veta_Requerimiento/tpl/master_plan.tpl', null, null, false);
        }

        $mail = Media::prepare_email_from_template($user, [$lead->email1], "73b9b9bc-1bb8-9d34-040a-663cfdaa32f9", [
            '$name' => $lead->full_name,
            '$assigned_user_name' => $user->full_name,
            '$assigned_user_email' => $user->email1,
            '$master_plan' => $template
        ]);


        if ($mail->Send()) {
            // logerror("correo enviado");


            $emailObj = crear_email($requerimiento, $mail, true);

            $requerimiento->load_relationship('veta_requerimiento_activities_1_emails');
            $requerimiento->veta_requerimiento_activities_1_emails->add($emailObj->id);
            header("Location: index.php?module=Veta_Requerimiento&action=DetailView&record=" . $requerimiento->id);
        } else {
            $this->redireccionar('Sending the master plan was not possible please contact the admin', $requerimiento->id);
        }
    }


    private function redireccionar($msg, $registro)
    {

        if (!empty($registro)) {
            $aux = "<script>
                      var registro='" . $registro . "';";

            $aux .= "alert('" . $msg . "');
                    window.location = 'index.php?module=Veta_Requerimiento&action=DetailView&record=' + registro;
                 </script>";

            echo $aux;
        } else {
            echo "<script>alert('" . $msg . "')</script>";
        }

        exit;
    }
}
