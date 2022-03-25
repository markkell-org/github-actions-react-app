<?php

require_once 'vendor/autoload.php';
Requests::register_autoloader();

// var_dump($argv);
// var_dump($_ENV);

echo "::debug ::Sending a request to slack";

$response = Requests::post(
    $_ENV['INPUT_SLACK_WEBHOOK'],
    array(
        'Content-type' => 'application/json'
    ),
    json_encode(array(
        'text' => $_ENV['INPUT_MESSAGE'],
        'repository' => $_ENV['GITHUB_REPOSITORY'],
        'event' => $_ENV['GITHUB_EVENT_NAME'],
        'ref' => $_ENV['GITHUB_REF'],
        'sha' => $_ENV['GITHUB_SHA'],
        ))
    );

echo "::group::Slack Responses\n";
var_dump($response);
echo "::endgroup::\n";

if(!$resposne->success) {
    echo $response->body;
    // exit(1);

}