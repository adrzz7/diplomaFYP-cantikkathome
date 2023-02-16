<?php

$data = [
    'phone' => '601158727057', // Receivers phone
    'body' => 'We have received your payment succesfully ! We will keep you updated with your order !', // Message
];
$json = json_encode($data); // Encode data to JSON
// URL for request POST /message
$token = '1tzge5q0hngi66e4';
$instanceId = '225018';
$url = 'https://api.chat-api.com/instance'.$instanceId.'/message?token='.$token;
// Make a POST request
$options = stream_context_create(['http' => [
        'method'  => 'POST',
        'header'  => 'Content-type: application/json',
        'content' => $json
    ]
]);
// Send a request
$result = file_get_contents($url, false, $options);



 ?>
