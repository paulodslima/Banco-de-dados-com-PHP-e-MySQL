<?php

    $valor_pesquisa = '%' . $_POST['valor_pesquisa'] . '%';

    require_once('conectarBanco.php');

    $query = 'SELECT * FROM tb_pessoas WHERE Nome like :nome';
    $stmt = $conexao->prepare($query);
    $stmt->bindvalue(':nome', $valor_pesquisa);
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $dadosCodificadosPesquisa = http_build_query(array('dados_pesquisa' => $row));

    header("location: ../index.php?$dadosCodificadosPesquisa")
?>