<?php

if(isset($_GET['parametros'])){
    $parametros = explode("/", $_GET['parametros']);
} else {
    http_response_code(400);
    echo "A url informada está incompleta";
    exit;
}

if(!isset($parametros[0])) {
    http_response_code(400);
    echo "A url não possui token";
    exit;
} else {
    include_once("./libs/connection.php");
    $token = $parametros[0];
    $selectToken = mysqli_query($connection, "SELECT * FROM usuario WHERE token = '$token'") or die(mysqli_error($connection));

    if(!$selectToken || mysqli_num_rows($selectToken) < 1){
        http_response_code(400);
        echo "Token informado é inválido";
        exit;
    }
}

$allowedResources = ["lugar", "usuario"];
if(isset($parametros[1]) && in_array($parametros[1], $allowedResources)){
    $resource = $parametros[1];
} else {
    http_response_code(400);
    echo "A funcionalidade ". $resource . "não existe";
    exit;
}

include_once("./processing/".$resource."/index.php");

?>