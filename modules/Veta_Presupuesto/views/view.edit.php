<?php

class Veta_PresupuestoViewEdit extends ViewEdit
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
