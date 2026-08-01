<?php

class Veta_VisaViewDetail extends ViewDetail
{
    public function __construct()
    {
        parent::__construct();
    }

    public function display()
    {
        load_notes($this->bean, 'Veta_Visa', 'virtual_all_notes');
        parent::display();
    }
}
