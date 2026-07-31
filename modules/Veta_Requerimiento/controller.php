<?php


class Veta_RequerimientoController extends SugarController
{

    public function action_editview()
    {

        $this->view = 'new';
        
        if(!empty($this->bean->id)){
            $this->view = 'edit';
        }
    }

    public function action_send_masterplan(){
      
        $this->view = 'send_masterplan';  
    }
	
	/*
	public function action_CloneRequerimiento()
    {
        // Recuperamos los parámetros que vienen por GET o POST
        $reciboId = $_REQUEST['reciboId'];
        $requerimientoId = $_REQUEST['requerimientoId'];

        // Instanciamos la clase donde está la función
        $vr = new Veta_Requerimiento();

        // Invocamos tu función que clona el registro
        // El primer parámetro es el ID del Requerimiento original
        // El segundo es el ID de Veta_Recibo, que se asigna a transferred_from_billing_c
        $newId = $vr->cloneVetaRequerimiento($requerimientoId, $reciboId);

        // Redirigimos de vuelta al DetailView del Veta_Recibo        
        $this->redirect("index.php?module=Veta_Recibo&action=DetailView&record={$reciboId}");
    }
	*/
	
	public function action_CloneRequerimiento()
	{
		// Recuperar parámetros desde GET/POST
		$reciboId = $_REQUEST['reciboId'];
		$requerimientoId = $_REQUEST['requerimientoId'];

		// Instanciar la clase donde está definida la función de clonación
		$vr = new Veta_Requerimiento();

		// Llamar a la función que clona el registro
		$newId = $vr->cloneVetaRequerimiento($requerimientoId, $reciboId);

		// En lugar de redirigir con header o $this->redirect(), 
		// se envía una página HTML que incluye un script de JavaScript
		// que escribe en la consola los parámetros y redirige.
		echo "<html>
				<head>
					<script>
						console.log('Recibo ID: " . $reciboId . "');
						console.log('Requerimiento ID: " . $requerimientoId . "');
						console.log('New cloned record ID: " . $newId . "');
						/* window.location.href = 'index.php?module=Veta_Recibo&action=DetailView&record=" . $reciboId . "'; */
					</script>
				</head>
				<body></body>
			  </html>";
		exit;
	}




}
