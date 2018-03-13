# AmazonApiGatewaySigV4AwsSdkPHP
This is a small sample application in php for fetching results from Amazon API Gateway using the AWS SDK for PHP. This script uses Signature v4 authentication (IAM user) in combination with an api token from Amazon API gateway. In the default setup of this script, it uses a JSON payload as the body over the POST method and generates all the required headers.


# Installation

This installation guide has been testet on an Ubuntu server v16.04 with PHP running a standard LAMP (LinuxApacheMysqlPhp) configuration. LAMP is not required, only PHP.


1. Install AWS SDK (we are using the composer method in this example. For other methods see the additional resources in the bottom of this file.)

 a. Install Composer from the root folder of this project.

    curl -sS https://getcomposer.org/installer | php
  
 b. Run the Composer command to install the latest stable version of the SDK:

    php composer.phar require aws/aws-sdk-php


# Configuration

1. Edit the api.php file with your own values between the // EDIT START and // EDIT END line. Example:

    // EDIT START
    $access_key = 'MYACCESSKEYLS9B9AS';
    $secret_key = 'MYSECRETKEYACj+H0Shhf/88d6D3aAdaf7C4SAC';
    $xapikey    = 'MYAPITOKENKdJBGv7vXCK2gfsV7Sd8KCA3dn2dS';
    $url        = 'https://MYAPI.execute-api.eu-west-1.amazonaws.com/MYSTAGE/MYRESOURCE';
    $region     = 'eu-west-1';
    $json       = '{"a":"4","b":"5","op":"+"}';
    // EDIT END


# Usage

1. From CLI in root folder

    php api.php
    
2. From browser

    //YOURSERVER/api.php


# Additional resources for AWS SDK PHP

https://aws.amazon.com/sdk-for-php/
https://docs.aws.amazon.com/aws-sdk-php/v3/guide/getting-started/
https://docs.aws.amazon.com/aws-sdk-php/v3/guide/getting-started/installation.html
https://docs.aws.amazon.com/aws-sdk-php/v3/guide/getting-started/installation.html#installing-via-composer


# Getting started with Amazon API Gateway

https://docs.aws.amazon.com/apigateway/latest/developerguide/getting-started.html


# Amazon API Gateway and Lambda integration

https://docs.aws.amazon.com/apigateway/latest/developerguide/getting-started-with-lambda-integration.html


# A small test calculation function for Lambda and Node.js
A small Node.js script that will return output on the json payload in the configuration example.

https://docs.aws.amazon.com/apigateway/latest/developerguide/integrating-api-with-aws-services-lambda.html


# For AWS SDK's in other languages

https://aws.amazon.com/tools/
