<?php

    $valor_deletar = $_POST['valor_deletar'];

    require_once('conectarBanco.php');

    $query = 'SELECT * FROM tb_pessoas WHERE Nome = :nome';
    $stmt = $conexao->prepare($query);
    $stmt->bindvalue(':nome', $valor_deletar);
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $usuario_deletado = $row[0]['Nome'];

    $query = 'DELETE FROM tb_pessoas WHERE Nome = :nome';
    $stmt = $conexao->prepare($query);
    $stmt->bindvalue(':nome', $valor_deletar);
    $stmt->execute();

    if($stmt->rowCount() > 0) {
        header("location: ../index.php?deletado=1&usuario_deletado=$usuario_deletado");
    }else{
        header("location: ../index.php?deletado=2&usuario_deletado=$usuario_deletado");
    }
?>