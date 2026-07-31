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
            
        $idProceso = $arguments['related_id'];

        $sql = "SELECT * FROM doc_plantillas_opportunities_c WHERE doc_plantillas_opportunitiesopportunities_idb = '".$idProceso."'";

        $result = $GLOBALS['db']->query($sql);

        while($row = $GLOBALS['db']->fetchByAssoc($result) )
        {
            //Use $row['id'] to grab the id fields value
            $idPlantilla = $row['doc_plantillas_opportunitiesdoc_plantillas_ida'];
            
            $sqlPlantilla = "SELECT * FROM doc_plantillas_doc_documentos_c WHERE doc_plantillas_doc_documentosdoc_plantillas_ida = '".$idPlantilla."'";
            
            $resultPlantillas = $GLOBALS['db']->query($sqlPlantilla);
            
            while($rowPlantilla = $GLOBALS['db']->fetchByAssoc($resultPlantillas) )
            {
                $idDocumento = $rowPlantilla['doc_plantillas_doc_documentosdoc_documentos_idb'];
                //Consulta el documento por ID Documento
                $sqlDocumentos = "SELECT * FROM doc_documentos WHERE id = '".$idDocumento."'";
                
                $queryConsultaDoc = "SELECT count(*) as total FROM doc_docssolicitados_doc_documentos_c WHERE doc_docssolicitados_doc_documentosdoc_documentos_idb='".$idDocumento."'";
                
                $resultQueryConsultaDoc =$GLOBALS['db']->query($queryConsultaDoc);
                
                $row = $GLOBALS['db']->fetchByAssoc($resultQueryConsultaDoc);

                $total = $row['total'];
    $GLOBALS['log']-> info("el total es ".$total);   
    
                if($total == 0 || $total == "0"){
                
                $resultDocumentos = $GLOBALS['db']->query($sqlDocumentos);
                
                while($rowDocumento = $GLOBALS['db']->fetchByAssoc($resultDocumentos) )
                {
                    $idDocsolicitado = '';
                    $idDocsOpp = '';
                    $idDocsDocs = '';
                    $pattern = '1234567890abcdefghijklmnopqrstuvwxyz----';
                    $max = strlen($pattern)-1;
                    for($i=0;$i < 36;$i++) $idDocsolicitado .= $pattern{mt_rand(0,$max)};
                    for($i=0;$i < 36;$i++) $idDocsOpp .= $pattern{mt_rand(0,$max)};
                    for($i=0;$i < 36;$i++) $idDocsDocs .= $pattern{mt_rand(0,$max)};
    
                    $nombre = $rowDocumento['name'];
                    $queryInsert = "INSERT INTO doc_docssolicitados (id,name,estadodocumento) VALUES ('".$idDocsolicitado."','".$nombre."','Pendiente')";
                    $GLOBALS['db']->query($queryInsert);
                    
                    $queryInsertDocOpp = "INSERT INTO doc_docssolicitados_opportunities_c (id,doc_docssolicitados_opportunitiesopportunities_ida,doc_docssolicitados_opportunitiesdoc_docssolicitados_idb) VALUES ('".$idDocsOpp."','".$idProceso."','".$idDocsolicitado."')";
                    $GLOBALS['db']->query($queryInsertDocOpp);
                    
                    $queryInsertDocsDocs = "INSERT INTO doc_docssolicitados_doc_documentos_c (id,doc_docssolicitados_doc_documentosdoc_documentosdoc_idb,doc_docssolicitados_doc_documentosdoc_docssolicitados_ida) VALUES ('".$idDocsDocs."','".$idDocumento."','".$idDocsolicitado."')";
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
}
?>