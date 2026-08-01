<?php

class Veta_PresupuestoViewDetail extends ViewDetail
{
    public function __construct()
    {
        parent::__construct();
    }

    public function display()
    {
        load_notes($this->bean, 'Veta_Presupuesto', 'virtual_all_notes');
        parent::display();
    }
}
