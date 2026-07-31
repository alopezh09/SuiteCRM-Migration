<?php
    require_once 'HelloSign.php';
    $client = new HelloSign\Client('767cc19074a41528d6fa786dbfd53a1019e002da66f86d8e0787006ed4b140c9');
    //0956cbd8c33c3324926a757a95a73c3e2325e446
    //ed1aa3a1e8f0161b023437b5c01cb55f2065c0a2
    $signature_request = $client->getSignatureRequest('ed1aa3a1e8f0161b023437b5c01cb55f2065c0a2');
    var_dump($signature_request);
?>
