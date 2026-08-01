<?php
    require_once 'HelloSign.php';
    
    $client = new HelloSign\Client('767cc19074a41528d6fa786dbfd53a1019e002da66f86d8e0787006ed4b140c9');
    $request = new HelloSign\SignatureRequest;
    $request->enableTestMode();
    $request->setTitle('MMMigration Invoice');
    $request->setSubject('Sing the invoice to continue with the process');
    $request->setMessage('Please validate and sign this invoice, then we can discuss more. Let me know if you have any questions.');
    $request->addSigner('alopez@australiaveta.com.co', 'Alfonso Lopez');
    // $request->addSigner('alopezh09@gmail.com', 'Alfonso Lopez');
    $request->addCC('alopez@australiaveta.com.co');
    $path_to_nda_pdf = "C:\AppServ\www\crmsuite\d7000d6a-e616-394a-781c-61afe63d3ef7.pdf";
    $request->addFile($path_to_nda_pdf);
    $response = $client->sendSignatureRequest($request);
    var_dump($response);

    //$signature_request = $client->getSignatureRequest('SIGNATURE_REQUEST_ID');

    
    // $client = new HelloSign\Client('767cc19074a41528d6fa786dbfd53a1019e002da66f86d8e0787006ed4b140c9');
    // $request = new HelloSign\SignatureRequest;
    // $request->enableTestMode();
    // $request->setSubject('My First embedded signature request');
    // $request->setMessage('Awesome, right?');
    // $request->addSigner('alopez@australiaveta.com.co', 'Me');
    // $request->addFile($path_to_nda_pdf);

    // $client_id = '480864d11bc7ce3d3cb8a0ceef0dc305';
    // $embedded_request = new HelloSign\EmbeddedSignatureRequest($request, $client_id);
    // $response = $client->createEmbeddedSignatureRequest($embedded_request);
?>