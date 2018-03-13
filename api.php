<?php

require 'vendor/autoload.php';

use Aws\Credentials\Credentials;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Aws\Signature\SignatureV4;


// EDIT START
$access_key = '';
$secret_key = '';
$xapikey    = '';
$url        = '';
$region     = '';
$json       = '';
// EDIT END


/* MAKE CREDENTIALS */
$credentials = new Credentials($access_key, $secret_key);
// var_dump($credentials);

/* PREPARE THE REQUEST */
$client = new Client();
$request = new Request('POST', $url, ['x-api-key' => $xapikey ,'Content-Type' => 'application/json'], $json);
//var_dump($request);

/* MAKE SIGNATURE V4 */
$s4 = new SignatureV4("execute-api", $region);
$signedrequest = $s4->signRequest($request, $credentials);

/* MAKE REQUEST AND ECHO RESPONSE */
$response = $client->send($signedrequest);
echo $response->getBody();
