<?php
header('Content-type: text/html; charset=utf-8');
ini_set("soap.wsdl_cache_enabled", "0");
require_once 'UserList.php';
require_once 'lib/nusoap.php';

$server = new nusoap_server();

$server->configureWSDL("userListesi", "urn:userListesi");

$server->register(
        "UserListe", 
        array("name" => "xsd:string"),
        array("return" => "xsd:Array"),
        "userListesi",
        "urn:userListesi",
        "rpc",
        "encoded"
);
 
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);