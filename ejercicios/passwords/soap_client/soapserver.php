<?php
// https://www.php.net/manual/en/soapserver.soapserver

require 'class-random-password.php';

$params = array('uri' => 'http://localhost/DAW/password/soap_client/soapserver.php');

$server = new SoapServer(null, $params);
$server->setClass('RandomPassword');
$server->handle();
    
?>

