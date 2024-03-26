<?php

    require_once('conectarBanco.php');

    $query = 'SELECT * FROM tb_pessoas';
    $stmt = $conexao->query($query);
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $dados = http_build_query(array('dados' => $row));

    header("location: ../index.php?$dados");
?>