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
class addDocumentoSolicitadoClass {
    
    function addDocumentoSolicitado($bean, $event, $arguments){
		if ($_REQUEST[ 'module' ] == "Opportunities") {
				
            $GLOBALS['log']-> error("estamos en 1"); 
			$idProceso = $arguments['related_id'];
			$idPlantilla = $arguments['id'];

			$wf = new Opportunity();
			$wf->retrieve($idProceso);
			$nameWf = $wf->name;
			error_log("pending_docs - Workflow: " . $wf->name);   
			
			error_log("pending_docs - Lead ID: " . $wf->leads_opportunities_1leads_ida);   
			
			$leadId = '';
			if((isset($wf->leads_opportunities_1leads_ida) and ($wf->leads_opportunities_1leads_ida != ''))){
				$leadId = $wf->leads_opportunities_1leads_ida;				
			} else {
				$query = "
					SELECT DISTINCT veta_requerimiento.id,
					veta_requerimiento.name,
					nvc_companies.id as company_id,
					nvc_companies.name as company_name
					
				FROM opportunities venta   
					LEFT JOIN veta_recibo_opportunities_c ON veta_recibo_opportunities_c.veta_recibo_opportunitiesopportunities_idb = venta.id AND veta_recibo_opportunities_c.deleted =0
					LEFT JOIN veta_requerimiento_veta_recibo_c ON veta_requerimiento_veta_recibo_c.veta_requerimiento_veta_reciboveta_recibo_idb = veta_recibo_opportunities_c.veta_recibo_opportunitiesveta_recibo_ida AND veta_requerimiento_veta_recibo_c.deleted = 0
					LEFT JOIN veta_requerimiento ON veta_requerimiento.id = veta_requerimiento_veta_recibo_c.veta_requerimiento_veta_reciboveta_requerimiento_ida AND veta_requerimiento.deleted = 0 
					LEFT JOIN veta_requerimiento_cstm ON veta_requerimiento_cstm.id_c = veta_requerimiento.id
					left join nvc_companies_veta_requerimiento_1_c on nvc_companies_veta_requerimiento_1_c.nvc_companies_veta_requerimiento_1veta_requerimiento_idb = veta_requerimiento.id
					left join nvc_companies on nvc_companies.id = nvc_companies_veta_requerimiento_1_c.nvc_companies_veta_requerimiento_1nvc_companies_ida
					left join nvc_companies_cstm on nvc_companies.id = nvc_companies_cstm.id_c
				WHERE venta.deleted = 0 AND venta.id = '" . $idProceso . "'";

				$result = $GLOBALS['db']->query($query, true, "Error obteniendo informacion del requerimiento asociado a la oportunidad " . $idProceso);
				$row = $GLOBALS['db']->fetchByAssoc($result);

				if ($row != null) {
					$leadId = $row['id'];
				}
			}
			
			
			error_log("pending_docs - Company ID: " . $wf->leads_opportunities_1leads_ida);   
			
			

            //Use $row['id'] to grab the id fields value
            
            $sqlPlantilla = "SELECT * 
								FROM 
									doc_plantillas_doc_documentos_c 
								left join 
									doc_plantillas on doc_plantillas.id = doc_plantillas_doc_documentos_c.doc_plantillas_doc_documentosdoc_plantillas_ida
							WHERE 
								doc_plantillas.deleted = 0 AND doc_plantillas_doc_documentos_c.deleted = 0
							and 
								doc_plantillas_doc_documentosdoc_plantillas_ida = '".$idPlantilla."'";
            
            $resultPlantillas = $GLOBALS['db']->query($sqlPlantilla);
            $counter = 0;
            while($rowPlantilla = $GLOBALS['db']->fetchByAssoc($resultPlantillas) )
            {

                $idDocumento = $rowPlantilla['doc_plantillas_doc_documentosdoc_documentos_idb'];
				$namePlantilla = $rowPlantilla['name'];
				error_log("pending_docs - plantilla: " . $namePlantilla);   
                //Consulta el documento por ID Documento
                $sqlDocumentos = "SELECT * 
                                    FROM 
                                        doc_documentos 
                                    left join 
                                        doc_documentos_cstm on doc_documentos_cstm.id_c = doc_documentos.id 
                                    WHERE 
                                        id = '".$idDocumento."'";
                //Verifica si el documento ya está asociado a esta oportunidad
                $queryConsultaDoc = "SELECT count(*) as total FROM doc_docssolicitados_doc_documentos_c,
		doc_docssolicitados_opportunities_c ddoc WHERE 
		doc_docssolicitados_doc_documentos_c.deleted = 0 and ddoc.deleted =0
		and doc_docssolicitados_doc_documentosdoc_documentos_idb='".$idDocumento."' 
		and ddoc.doc_docssolicitados_opportunitiesopportunities_ida ='".$idProceso."' 
		and doc_docssolicitados_doc_documentosdoc_docssolicitados_ida = ddoc.doc_docssolicitados_opportunitiesdoc_docssolicitados_idb";
                
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
						
						
						if($idProceso == '676980c4-c493-578a-8da0-64246887bf01'){							
							
							$url = 'http://127.0.0.1:8080/upload';
							/*
							$data = [
								"fileName" => $rowDocumento['name'],
								"moduleName" => "Workflow",
								"moduleNumber" => "233",
								"templates" => "Pending",
								"leadName" => "cb9e4c01-fdb3-800c-5095-61f08cb1a5d4",
								"requestTo" => "Applicant"
							];
							*/
								
							$wait = false;
							if($counter == 0){
								$wait = true;
								//$wait = false;
								$counter = 1;								
							} else {
								$wait = false; 								
							}							
							
							error_log("pending_docs - Variables - moduleNumber: " . $nameWf . " templates " . $namePlantilla . " leadname " . $leadId);						
							$data = [
								"fileName" => $rowDocumento['name'].'.txt',  
								"moduleName" => 'Workflow',
								"moduleNumber" => $nameWf,
								"templates" => [$namePlantilla],
								"leadName" => $leadId,
								"upload" => "/var/www/crm.australiaveta.com.develop/upload/pending_document_template.txt",
								"not_approved" => true,
								"wait" => $wait,
								//"requestTo" => "Aplicant", // parametros a recibir "Applicant" o "Company"
								"status" => "Pendiente", 
								"use_sharepoint" => true
							];
							
							
							
							//while ($row = $bean->db->fetchByAssoc($res)) {
							//	$data['templates'][] = $folder;
							//}
							


							$additional_headers = array(
								'Accept: application/json', 
								'Content-Type: application/json'
							);
							
							logerror($data);

							$ch = curl_init($url);
							curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
							curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($ch, CURLOPT_HTTPHEADER, $additional_headers);

							$server_output = curl_exec($ch);
							
							
							$out_parsed = json_decode($server_output);
							logerror($out_parsed);
							$one_drive_url = $out_parsed->url;
							
							
							error_log("pending_docs - server error: " . print_r($server_output, true) );						
							//error_log("pending_docs - finalizo la ejecucion - documento " . $rowDocumento['name'] . " URL " . $one_drive_url);

						}
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						$nombre = $rowDocumento['name'];
						
						$internal_document = $rowDocumento['internal_document_c'];
						$requested_to = $rowDocumento['requested_to_c'];
						
						$GLOBALS['log']-> info("el nombre es ".$nombre); 
						$queryInsert = "INSERT INTO doc_docssolicitados (id,name,estadodocumento,assigned_user_id) VALUES ('".$idDocsolicitado."','".$nombre."','Pendiente','$wf->user_id2_c')";
						$GLOBALS['db']->query($queryInsert);
						
						$queryInsert_cstm = "INSERT INTO doc_docssolicitados_cstm (id_c,internal_document_c,requested_to_c) VALUES ('".$idDocsolicitado."','".$internal_document."','".$requested_to."')";
						$GLOBALS['db']->query($queryInsert_cstm);
						
						$queryInsertDocOpp = "INSERT INTO doc_docssolicitados_opportunities_c (id,doc_docssolicitados_opportunitiesopportunities_ida,doc_docssolicitados_opportunitiesdoc_docssolicitados_idb) VALUES ('".$idDocsOpp."','".$idProceso."','".$idDocsolicitado."')";
						$GLOBALS['db']->query($queryInsertDocOpp);
						
						$queryInsertDocsDocs = "INSERT INTO doc_docssolicitados_doc_documentos_c (id,doc_docssolicitados_doc_documentosdoc_documentos_idb,doc_docssolicitados_doc_documentosdoc_docssolicitados_ida) VALUES ('".$idDocsDocs."','".$idDocumento."','".$idDocsolicitado."')";
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
	
	function addDocumentoSolicitado_Requeriments($bean, $event, $arguments){
		if ($_REQUEST[ 'module' ] == "Veta_Requerimiento") {
				
            $GLOBALS['log']-> error("estamos en 1"); 
			$idRequeriment = $arguments['related_id'];
			$idPlantilla = $arguments['id'];


        
            //Use $row['id'] to grab the id fields value
            
            $sqlPlantilla = "SELECT * FROM doc_plantillas_doc_documentos_c WHERE deleted = 0 and doc_plantillas_doc_documentosdoc_plantillas_ida = '".$idPlantilla."'";
            
            $resultPlantillas = $GLOBALS['db']->query($sqlPlantilla);
            
            while($rowPlantilla = $GLOBALS['db']->fetchByAssoc($resultPlantillas) )
            {

                $idDocumento = $rowPlantilla['doc_plantillas_doc_documentosdoc_documentos_idb'];
                //Consulta el documento por ID Documento
                $sqlDocumentos = "SELECT * FROM doc_documentos WHERE id = '".$idDocumento."'";
                //Verifica si el documento ya está asociado a esta oportunidad
                $queryConsultaDoc = "SELECT count(*) as total FROM doc_docssolicitados_doc_documentos_c,
		veta_requerimiento_doc_docssolicitados_1_c ddoc WHERE 
		doc_docssolicitados_doc_documentos_c.deleted = 0 and ddoc.deleted =0
		and doc_docssolicitados_doc_documentosdoc_documentos_idb='".$idDocumento."' 
		and ddoc.veta_requerimiento_doc_docssolicitados_1veta_requerimiento_ida ='".$idRequeriment."' 
		and doc_docssolicitados_doc_documentosdoc_docssolicitados_ida = ddoc.veta_requerimiento_doc_docssolicitados_1doc_docssolicitados_idb";
                
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
					$GLOBALS['log']-> info("el nombre es ".$nombre); 
                    $queryInsert = "INSERT INTO doc_docssolicitados (id,name,estadodocumento) VALUES ('".$idDocsolicitado."','".$nombre."','Pendiente')";
                    $GLOBALS['db']->query($queryInsert);
                    
                    $queryInsertDocOpp = "INSERT INTO veta_requerimiento_doc_docssolicitados_1_c (id,veta_requerimiento_doc_docssolicitados_1veta_requerimiento_ida,veta_requerimiento_doc_docssolicitados_1doc_docssolicitados_idb) VALUES ('".$idDocsOpp."','".$idRequeriment."','".$idDocsolicitado."')";
                    $GLOBALS['db']->query($queryInsertDocOpp);
                    
                    $queryInsertDocsDocs = "INSERT INTO doc_docssolicitados_doc_documentos_c (id,doc_docssolicitados_doc_documentosdoc_documentos_idb,doc_docssolicitados_doc_documentosdoc_docssolicitados_ida) VALUES ('".$idDocsDocs."','".$idDocumento."','".$idDocsolicitado."')";
                    $GLOBALS['db']->query($queryInsertDocsDocs);
                                    
                }
                }
            }
            
		}
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