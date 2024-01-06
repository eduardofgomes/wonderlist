<?php

$allowedMethods = ['POST', 'PUT', 'DELETE', 'GET'];
$method = $_SERVER['REQUEST_METHOD'];
if(!in_array($method, $allowedMethods)){
    http_response_code(400);
    echo "Metódo não permitido";
    exit;
} else {
    include_once strtolower($method). ".php";
}
?>