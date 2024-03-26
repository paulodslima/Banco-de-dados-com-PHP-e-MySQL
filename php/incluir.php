<?php
    $valor_nome = $_POST['valor_incluir_nome'];
    $valor_idade = $_POST['valor_incluir_idade'];

    require_once('conectarBanco.php');

    $query = "INSERT INTO tb_pessoas(nome, idade) VALUES( :nome, :idade)";
    $stmt = $conexao->prepare($query);
    $stmt->bindvalue(':nome', $valor_nome);
    $stmt->bindvalue(':idade', $valor_idade);
    $stmt->execute();

    if($stmt->rowCount() > 0) {
        header("location: ../index.php?incluido=1&NomeIncluido=$valor_nome");
    }else{
        header("location: ../index.php?incluido=2&nomeAntigo=$nome_alterado");
    }
?>