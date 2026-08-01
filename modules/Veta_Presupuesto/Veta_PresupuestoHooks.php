<?php

class Veta_PresupuestoHooks
{
    public function create_note_pre($bean)
    {
        if (!empty($bean->virtual_note)) {
            $bean->note = new Note();
            $bean->note->description = $bean->virtual_note;

            $bean->virtual_note = '';
        }

        $query = "SELECT id
        FROM  veta_presupuesto
        WHERE id = '" . $bean->id . "'";

        $result = $bean->db->query(
            $query,
            true,
            "Error obteniendo informacion del contacto asociado al Presupuesto " . $bean->id
        );
        $row    = $bean->db->fetchByAssoc($result);

        if (!$row) {
            $bean->virtual_redirect = true;
        }
    }

    public function create_note_post($bean)
    {
        global $current_user;
        if (!empty($bean->note)) {

            $query = "SELECT l.contact_id FROM vetacrm2.veta_presupuesto_leads_c pl
            JOIN leads l ON l.id = pl.veta_presupuesto_leadsleads_ida 
            WHERE pl.veta_presupuesto_leadsveta_presupuesto_idb = '" . $bean->id . "' AND l.deleted = 0";

            $result = $bean->db->query(
                $query,
                true,
                "Error obteniendo informacion del contacto asociado al Presupuesto " . $bean->id
            );

            $row    = $bean->db->fetchByAssoc($result);

            $bean->note->parent_type = ' Veta_Presupuesto';
            $bean->note->parent_id = $bean->id;
            $bean->note->assigned_user_id = $current_user->id;
            $now = date('Y-m-d H:i:s');
            $bean->note->name = "Nota $bean->name $now";
            $bean->note->contact_id = $row['id'];
            $bean->note->save();
        }
        if ($bean->virtual_redirect) {
            $p = new Veta_Presupuesto();
            $p->retrieve($bean->id);
            $p->crear_relaciones();
            $p->establecer_primer_presupuesto();
            
            header("Location: /?action=ajaxui&open_tab=veta_detallepresupuesto#ajaxUILoc=index.php%3Fmodule%3DVeta_Presupuesto%26action%3DDetailView%26record%3D$bean->id");
            exit();
        }
    }
}
