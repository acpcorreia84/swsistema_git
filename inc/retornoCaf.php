<?php

$result = file_get_contents('php://input');

$retorno = json_decode($result);


$curl = curl_init();
$uploadFilePath = '/home/swsistema/public_html/temp/PlurioSign-Modelos1assinatura.pdf';

if (!file_exists($uploadFilePath)) {
    throw new Exception('File not found: ' . $uploadFilePath);
}

$uploadFileMimeType = mime_content_type($uploadFilePath);
$uploadFilePostKey = 'file';

$uploadFile = new CURLFile(
    $uploadFilePath,
    $uploadFileMimeType,
    $uploadFilePostKey
);


curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://quicksign.pluriosign.com.br/assinarasync',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array('documentFile'=> $uploadFile,'quickSignRequest' => '{
    "documentInformation": {
        "title": "Contrato 123",
        "summary": "Sumário ABC"
    },
    "signatureSetup": {
        "signatory": {
            "uid": "51397862220",
            "name": "Antonio Carlos Correia",
            "email": "antonio.correia@plurio.com.br",
            "cellphone": "11997963124",
            "identityConfirmationPolicy": 0
        },
        "signatureStampConfig": {
            "allPagesSettings": {
                "placeHolderType": "keyword",
                "keyword": "{assinatura1}",
                "width": 144,
                "height": 81,
                "showEvidences": true
            },
            "singlePageSettings": [
                {
                    "pageNumber": 1,
                    "placeHolderType": "coordinates",
                    "x": 200,
                    "y": 500,
                    "width": 144,
                    "height": 81,
                    "showEvidences": true
                }
            ]
        }
    },
    "signatureEvidences": {
        "thumbnailImageData": "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",
        "latitude": -23.598106,
        "longitude": -46.68348,
        "timestamp": "17/04/2024 16:38:23",
        "ipAddr": "201.43.135.166",
        "customEvidences": {
            "myCustomEvidence01": "customEvidence01",
            "myCustomEvidence02": "customEvidence02"
        }
    }
}'),
    CURLOPT_HTTPHEADER => array(
        'Authorization:Basic YXBpQHBsdXJpb3NtYXJ0ZG9jcy5jb20uYnI6aVk5MFBsdXIxT1NtQGFydEQwYzFz'
    ),
));

$response = curl_exec($curl);

curl_close($curl);


$arquivo = fopen("teste.txt", "a");
fwrite($arquivo, "\r\n \r\n \r\n" .date('d/m/Y H:i:s') . ": \r\n" .$response . "\r\n");
fclose($arquivo);

http_response_code(200);
echo 'ok3=> '.$response;



?>