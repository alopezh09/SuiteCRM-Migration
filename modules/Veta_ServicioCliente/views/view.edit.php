<?php

class Veta_ServicioClienteViewEdit extends ViewEdit
{

    function display(){
        load_notes($this->bean, 'Veta_ServicioCliente', 'virtual_all_notes');
        parent::display(); 
    }
}