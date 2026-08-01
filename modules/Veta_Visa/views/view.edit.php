<?php

class Veta_VisaViewEdit extends ViewEdit
{

    function display(){
        load_notes($this->bean, 'Veta_Visa', 'virtual_all_notes');
        parent::display(); 
    }
}