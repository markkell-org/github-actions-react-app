<?php

require_once 'vendor/autoload.php';
Requests::register_autoloader();

var_dump($argv);
var_dump($_ENV);

$response = Requests::post(
    "",
    array(
        'Content-type' => 'application/json'
    ),
    json_encode(array(
        'text' => 'Some message'
        ))
    );


var_dump($response);

if(!$resposne->success) {
    echo $response->body;
}