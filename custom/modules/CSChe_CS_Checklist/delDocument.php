<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

/*
 * Copyright 2014 BoredWookie
 *
 * Special thanks to this guy: http://cheleguanaco.blogspot.de/2009/06/simple-sugarcrm-logic-hook-example.html
 *
 * License: MIT
 * Disclaimer: For educational purposes, be sure you know what you are doing!
 */

// This class deals with attaching a URL to the case so the agent can generate a work agreement
class delChecklistRequestedClass {
    
    function delChecklistRequested($bean, $event, $arguments){
		if ($_REQUEST[ 'module' ] == "Veta_Visa") {
            
			$idProceso = $arguments['related_id'];
			$idPlantilla = $arguments['id'];
			
			$GLOBALS['log']-> error("el total es ".$idProceso);   
			$GLOBALS['log']-> error("Plantilla".$id);

			$sql = "select * from csche_cs_checklist_csche_items_c dpddc 
	where dpddc.csche_cs_checklist_csche_itemscsche_cs_checklist_ida ='".$idPlantilla."'";

			$result = $GLOBALS['db']->query($sql);

			while($row = $GLOBALS['db']->fetchByAssoc($result) )
			{
						
				//Use $row['id'] to grab the id fields value
				$idDocumento = $row['csche_cs_checklist_csche_itemscsche_items_idb'];
				$GLOBALS['log']-> error("Primero".$idDocumento);
				$sqlDocsSolicitados = "select ddddc.* from csche_items_requested_csche_items_c ddddc , veta_visa_csche_items_requested_1_c ddoc 
	where ddddc.csche_items_requested_csche_itemscsche_items_idb = '".$idDocumento."' and ddddc.csche_items_requested_csche_itemscsche_items_requested_ida = ddoc.veta_visa_csche_items_requested_1csche_items_requested_idb
	and ddoc.veta_visa_csche_items_requested_1veta_visa_ida ='".$idProceso."'";


				
				$resultDocsSolicitados = $GLOBALS['db']->query($sqlDocsSolicitados);
				
				while($rowDocsSolicitados = $GLOBALS['db']->fetchByAssoc($resultDocsSolicitados) )
				{
					
					$idDocSolicitado = $rowDocsSolicitados['csche_items_requested_csche_itemscsche_items_requested_ida'];
					$GLOBALS['log']-> error("Segundo".$idDocSolicitado);
						$queryInsert = "UPDATE csche_items_requested docsol set deleted=1 where docsol.id= '".$idDocSolicitado."'";
						$GLOBALS['db']->query($queryInsert);
						
						$queryInsertDocOpp = "UPDATE veta_visa_csche_items_requested_1_c set deleted = 1 where veta_visa_csche_items_requested_1csche_items_requested_idb ='".$idDocSolicitado."'";
						$GLOBALS['db']->query($queryInsertDocOpp);
						
						$queryInsertDocsDocs = "UPDATE csche_items_requested_csche_items_c set deleted = 1 where csche_items_requested_csche_itemscsche_items_requested_ida ='".$idDocSolicitado."'";
						$GLOBALS['db']->query($queryInsertDocsDocs);
										
					
					
				}
			}    
		}
        
    }	
	
	
    
    
}
?>