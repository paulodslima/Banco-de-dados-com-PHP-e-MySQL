<?php

    $valor_alterar_id = $_POST['valor_alterar_id'];
    $valor_alterar_nome = $_POST['valor_alterar_nome'];
    $valor_alterar_idade = $_POST['valor_alterar_idade'];

    require_once('conectarBanco.php');

    $query = 'SELECT * FROM tb_pessoas WHERE id = :id';
    $stmt = $conexao->prepare($query);
    $stmt->bindvalue(':id', $valor_alterar_id);
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $nome_alterado = $row[0]['Nome'];
    $idade_alterado = $row[0]['idade'];

    $query = 'UPDATE tb_pessoas SET Nome = :nomeNovo, idade = :idadeNova WHERE id = :id';
    $stmt = $conexao->prepare($query);
    $stmt->bindvalue(':nomeNovo', $valor_alterar_nome);
    $stmt->bindvalue(':idadeNova', $valor_alterar_idade);
    $stmt->bindvalue(':id', $valor_alterar_id);
    $stmt->execute();

    if($stmt->rowCount() > 0) {
        header("location: ../index.php?alterado=1&nomeAntigo=$nome_alterado&novoNome=$valor_alterar_nome&novaIdade=$valor_alterar_idade");
    }else{
        header("location: ../index.php?alterado=2&nomeAntigo=$nome_alterado");
    }
?>