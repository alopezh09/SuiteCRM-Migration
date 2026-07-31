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
class addChecklistRequestedClass {
    
    function addChecklistRequested($bean, $event, $arguments){
		if ($_REQUEST[ 'module' ] == "Veta_Visa") {
				
            $GLOBALS['log']-> error("estamos en 1"); 
			$idProceso = $arguments['related_id'];
			$idPlantilla = $arguments['id'];


        
            //Use $row['id'] to grab the id fields value
            
            $sqlPlantilla = "SELECT * FROM csche_cs_checklist_csche_items_c WHERE deleted = 0 and csche_cs_checklist_csche_itemscsche_cs_checklist_ida = '".$idPlantilla."'";
            
            $resultPlantillas = $GLOBALS['db']->query($sqlPlantilla);
            
            while($rowPlantilla = $GLOBALS['db']->fetchByAssoc($resultPlantillas) )
            {

                $idDocumento = $rowPlantilla['csche_cs_checklist_csche_itemscsche_items_idb'];
                //Consulta el documento por ID Documento
                $sqlDocumentos = "SELECT * 
                                    FROM 
                                        csche_items 
                                    /*
										left join 
											doc_documentos_cstm on doc_documentos_cstm.id_c = doc_documentos.id 
									*/
                                    WHERE 
                                        id = '".$idDocumento."'";
                //Verifica si el documento ya está asociado a esta oportunidad
                $queryConsultaDoc = "SELECT count(*) as total FROM csche_items_requested_csche_items_c,
		veta_visa_csche_items_requested_1_c ddoc WHERE 
		csche_items_requested_csche_items_c.deleted = 0 and ddoc.deleted =0
		and csche_items_requested_csche_itemscsche_items_idb='".$idDocumento."' 
		and ddoc.veta_visa_csche_items_requested_1veta_visa_ida ='".$idProceso."' 
		and csche_items_requested_csche_itemscsche_items_requested_ida = ddoc.veta_visa_csche_items_requested_1csche_items_requested_idb";
                
                $resultQueryConsultaDoc =$GLOBALS['db']->query($queryConsultaDoc);
                
                $row = $GLOBALS['db']->fetchByAssoc($resultQueryConsultaDoc);

                $total = $row['total'];

    
                if($total == 0 || $total == "0"){
                
					$resultDocumentos = $GLOBALS['db']->query($sqlDocumentos);
					
					while($rowDocumento = $GLOBALS['db']->fetchByAssoc($resultDocumentos) )
					{
						$GLOBALS['log']-> error("estamos en 4"); 
						$idDocsolicitado = '';
						$idDocsOpp = '';
						$idDocsDocs = '';
						$pattern = '1234567890abcdefghijklmnopqrstuvwxyz----';
						$max = strlen($pattern)-1;
		
						/*
						for($i=0;$i < 36;$i++) $idDocsolicitado .= $pattern{mt_rand(0,$max)};
						for($i=0;$i < 36;$i++) $idDocsOpp .= $pattern{mt_rand(0,$max)};
						for($i=0;$i < 36;$i++) $idDocsDocs .= $pattern{mt_rand(0,$max)};
						*/
						
						
						//error_log("UUID - ". $this->get_uuid());
						$idDocsolicitado = $this->get_uuid();
						$idDocsOpp = $this->get_uuid();
						$idDocsDocs = $this->get_uuid();
						
						
						
						
						
						$nombre = $rowDocumento['name'];
						
						$internal_document = $rowDocumento['internal_document_c'];
						$requested_to = $rowDocumento['requested_to_c'];
						
						$GLOBALS['log']-> info("el nombre es ".$nombre); 
						$queryInsert = "INSERT INTO csche_items_requested (id,name,status) VALUES ('".$idDocsolicitado."','".$nombre."','Pendiente')";
						$GLOBALS['db']->query($queryInsert);
						
						/*
							$queryInsert_cstm = "INSERT INTO doc_docssolicitados_cstm (id_c,internal_document_c,requested_to_c) VALUES ('".$idDocsolicitado."','".$internal_document."','".$requested_to."')";
							$GLOBALS['db']->query($queryInsert_cstm);
						*/
						
						
						$queryInsertDocOpp = "INSERT INTO veta_visa_csche_items_requested_1_c (id,veta_visa_csche_items_requested_1veta_visa_ida,veta_visa_csche_items_requested_1csche_items_requested_idb) VALUES ('".$idDocsOpp."','".$idProceso."','".$idDocsolicitado."')";
						$GLOBALS['db']->query($queryInsertDocOpp);
						
						$queryInsertDocsDocs = "INSERT INTO csche_items_requested_csche_items_c (id,csche_items_requested_csche_itemscsche_items_idb,csche_items_requested_csche_itemscsche_items_requested_ida) VALUES ('".$idDocsDocs."','".$idDocumento."','".$idDocsolicitado."')";
						$GLOBALS['db']->query($queryInsertDocsDocs);
										
					}
                }
            }
            
		}
    }
	
	function relatePlantillas($bean, $event, $arguments){
		// if ($_REQUEST[ 'module' ] == "Veta_College") {
		// 	$q = "UPDATE veta_college_doc_plantillas_1_c SET deleted = 0 WHERE deleted = 1";
        //     $resultPlantillas = $GLOBALS['db']->query($q);
		// }
	}
	
	
    
    function generarCodigo($longitud) {
		$key = '';
		$pattern = '1234567890abcdefghijklmnopqrstuvwxyz-';
		$max = strlen($pattern)-1;
		for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
		return $key;
	}  
	
	function get_uuid() {
		$query_uuid = "select UUID() as uuid limit 1";
		$result_query_uuid = $GLOBALS['db']->query($query_uuid, true, "Error obteniendo UUID");
		$row_query_uuid = $GLOBALS['db']->fetchByAssoc($result_query_uuid);
		if ($row_query_uuid != null) {
			
			//$idDocsolicitado = $row_query_uuid['uuid'];
			
			return $row_query_uuid['uuid'];
		} else {
			return null;
		}
	}
}
?>