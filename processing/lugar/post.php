<?php

if(isset($_POST['cidade']) && isset($_POST['pais'])){
    $cidade = $_POST['cidade'];
    $pais = $_POST['pais'];
    $descricao = $_POST['descricao'];
    $stmt = $connection->prepare("INSERT INTO lugar(cidade, pais, descricao, token) VALUES (?,?,?,?)");
    $stmt->bind_param("ssss", $cidade, $pais, $descricao, $token);
    if($stmt->execute()){
        http_response_code(200);
        exit;
    } else {
        http_response_code(500);
        echo "Não foi possível adicionar. Tente novamente!";
    }
} else {
    http_response_code(400);
    echo "Campos obrigatórios não foram preenchidos";
}

?>