<?php

$host = "localhost";
$user = "root";
$password = "root";

$connection = mysqli_connect($host, $user, $password) or die ("Erro ao conectar");
$database = mysqli_select_db($connection, "api") or die ("Erro ao selecionar banco de dados");


?>