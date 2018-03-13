# AmazonApiGatewaySigV4AwsSdkPHP
This is a small sample application in php for fetching results from Amazon API Gateway using the AWS SDK for PHP. This script uses Signature v4 authentication (IAM user) in combination with an api token from Amazon API gateway. In the default setup of this script, it uses a JSON payload as the body over the POST method and generates all the required headers.

This guide was latest installed and tested by the author: `2018-03-13`


## Installation

This installation guide has been testet on an Ubuntu server v14.04 with PHP running a standard LAMP (LinuxApacheMysqlPhp) configuration. Neighter Linux, Ubuntu or LAMP is required, only `PHP`. This script and the following installation guide is however only testet in this configuration. This guide should work on most linux configurations with PHP installed and an optional webserver installed for non-cli usage. Installation should have simular steps for most platforms including Windows and Mac's. 


1. Install `AWS SDK` (we are using the composer method in this example. For other methods see the additional resources in the bottom of this file.)

 a. Install `Composer` from the root folder of this project.

```
curl -sS https://getcomposer.org/installer | php
```
  
 b. Run the Composer command to install the latest stable version of the `SDK`:

```
php composer.phar require aws/aws-sdk-php
```

## Amazon API Gateway and Lambda example setup (optional)

In this example we are using a small test calculation function for `Lambda` and `Node.js` behind `Amazon API Gateway`. This is a small Node.js script that will return output on the json payload in the configuration example we are using for the basic setup of this script. Note that we by default are using the `POST example` in this script. Edit the script to allow other methods.

https://docs.aws.amazon.com/apigateway/latest/developerguide/integrating-api-with-aws-services-lambda.html


## Configuration

1. Edit the `api.php` file with your own values between the `// EDIT START` and `// EDIT END` line. Example:

```
$access_key = 'MYACCESSKEYLS9B9AS';
$secret_key = 'MYSECRETKEYACj+H0Shhf/88d6D3aAdaf7C4SAC';
$xapikey    = 'MYAPITOKENKdJBGv7vXCK2gfsV7Sd8KCA3dn2dS';
$url        = 'https://MYAPI.execute-api.eu-west-1.amazonaws.com/MYSTAGE/MYRESOURCE';
$region     = 'eu-west-1';
$json       = '{"a":"4","b":"5","op":"+"}';
```

Please note that none of the url, keys or tokens in this example are valid.


## Usage

1. From CLI in root folder

```
php api.php
```
    
2. From browser
```
//YOURSERVER/api.php
```


## Error codes

#### `429 Too Many Requests`
 - Description: See https://docs.aws.amazon.com/apigateway/latest/developerguide/api-gateway-request-throttling.html?icmpid=docs_apigateway_console
 - How to fix: Sleep script or wait, then retry script
#### `403 Forbidden` with Message “…not authorized to perform: execute-api:Invoke…”
 - Description: The `IAM user` linked to the signature does not have permission to run the api or last part of url endpoint misspelled.
 - How to fix: Check endpoint, check upper-case letters in url or contact the administrator in charge of the api if you dont have access to the `IAM settings` in the Amazon account. The IAM user needs to have permission to `Invoke` the `execute-api` action on the `Amazon ARN`.
 
 #### `403 Forbidden` with Message “Forbidden”
 - Description: Wrong token used, wrong url or missing `x-api-key` header.
 - How to fix: Please check all headers above, including use of upper-case letters in url.
 
  #### `403 Forbidden` with Message “Credential should be scoped to a valid region…”
 - Description: Region misspelled or wrong region used.
 - How to fix: Set to correct region, eg. `eu-west-1`
 
  #### `415 Unsupported Media Type`
 - Description: `Content-Type` header is not correctly set.
 - How to fix: In this example correct header should be `application/json` for `Content-Type`.
 
  #### `5XX Bad gateway` and similar
 - Description: Something probably went wrong on the server or Amazon side.
 - How to fix: Contact the administrator in charge of the api if you dont have access to debugging on the api side.
 
  #### The request signature we calculated does not match the signature you provided...
 - Description: If using the AWS SDK this usually means that your access_key and secret_key (not the token) is invalid. Non SDK users might get this for other reasons.
 - How to fix: Check access_key og secret_key.
 
  #### `400 Invalid Input`
 - Description: Your JSON is invalid if you are using the calculation example with `Lambda` and `node.js`.
 - How to fix: Correct the JSON payload. In out example we are using `$json = '{"a":"4","b":"5","op":"+"}';`
 

## Additional resources

#### AWS SDK PHP

https://aws.amazon.com/sdk-for-php/
https://docs.aws.amazon.com/aws-sdk-php/v3/guide/getting-started/
https://docs.aws.amazon.com/aws-sdk-php/v3/guide/getting-started/installation.html
https://docs.aws.amazon.com/aws-sdk-php/v3/guide/getting-started/installation.html#installing-via-composer


#### Getting started with Amazon API Gateway

https://docs.aws.amazon.com/apigateway/latest/developerguide/getting-started.html


#### Amazon API Gateway and Lambda integration

https://docs.aws.amazon.com/apigateway/latest/developerguide/getting-started-with-lambda-integration.html


#### About Amazon Signature version 4

https://docs.aws.amazon.com/general/latest/gr/signature-version-4.html


#### For AWS SDK's in other languages

https://aws.amazon.com/tools/


#### Debugging with Postman
A nice app for testing API with Amazon Signature version 4 support.

https://www.getpostman.com/
