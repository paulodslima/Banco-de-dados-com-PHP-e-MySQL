<?php require_once('php/conectarBanco.php') ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conectar Banco</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
</head>
<body class="bg-secondary">
    <h1 class="text-center p-3">Banco de dados com PHP e MySQL</h1>
    <div class="container py-3">
        <!-- Mostrar informações contidas no banco de dados -->
        <div class="row">
            <div class="col-12">
                <form action="php/mostrar.php" method="POST">
                    <div class="form-group">
                        <label for="mostrar" class="h3">mostrar informações do banco de dados</label>
                        <input class="btn btn-primary" type="submit" value="Clique no botão para mostrar">
                    </div>
                </form>

                <div class="border border-5 border-black mt-4 p-2">
                        <?php
                            // Verifica se os dados foram enviados via GET
                            if(isset($_GET['dados'])) {
                                // Acessa os dados enviados via GET
                                $dados_geral = $_GET['dados'];

                                // Faça o que deseja com os dados recebidos
                                foreach($dados_geral as $indice => $valor){
                                    echo '<div class="bg-info border border-black border-2 p-3 my-3"><p class="mb-0">';
                                    echo 'ID: ' . $valor['id'] . '<br>Nome: ' . $valor['Nome'] . '<br>Idade: ' . $valor['idade'];
                                    echo '</p></div>';
                                }
                            }else{
                            echo '<p class="mb-0">Resultado...</p>'; 
                            }
                        ?>
                </div>
            </div>
        </div>

        <hr class="border border-2 border-black my-5">

        <!-- Mostrar informações contidas no banco de dados do usuário pesquisado -->
        <div class="row">
            <div class="col-12">
                <form action="php/pesquisar.php" method="post">
                    <div class="form-group">
                        <label for="pesquisar" class="h3">Pesquisar no banco de dados</label>
                        <input class="form-control" type="text" name="valor_pesquisa" id="pesquisar">
                    </div>
                </form>

                <div class="border border-5 border-black mt-4 p-2">
                        <?php
                            // Verifica se os dados foram enviados via GET
                            if(isset($_GET['dados_pesquisa'])) {
                                // Acessa os dados enviados via GET
                                $dados_pesquisa = $_GET['dados_pesquisa'];

                                // Faça o que deseja com os dados recebidos
                                foreach($dados_pesquisa as $indice => $valor){
                                    echo '<div class="bg-info border border-black border-2 p-3 my-3"><p class="mb-0">';
                                    echo 'Nome: ' . $valor['Nome'] . '<br>Idade: ' . $valor['idade'];
                                    echo '</p></div>';
                                }
                            }else{
                            echo '<p class="mb-0">Resultado...</p>'; 
                            }
                        ?>
                </div>
            </div>
        </div>

        <hr class="border border-2 border-black my-5">
        
        <!-- Deletar usuários apontados pelo nome do banco de dados -->
        <div class="row">
            <div class="col-12">
                <form action="php/deletar.php" method="post">
                    <div class="form-group">
                        <label for="deletar" class="h3">Deletar do banco de dados</label>
                        <input class="form-control" type="text" name="valor_deletar" id="deletar">
                    </div>
                </form>

                <div class="border border-5 border-black mt-4 p-2">
                        <?php
                            // Verifica se os dados foram enviados via GET
                            if(isset($_GET['deletado']) && $_GET['deletado'] == '1') {
                                // Acessa os dados enviados via GET
                                $usuario_deletado = $_GET['usuario_deletado'];

                                // Faça o que deseja com os dados recebidos
                                    echo '<div class="bg-info border border-black border-2 p-3 my-3"><p class="mb-0">';
                                    echo "Usuário $usuario_deletado foi deletado do banco de dados";
                                    echo '</p></div>';
                            }elseif(isset($_GET['deletado']) && $_GET['deletado'] == '2') {
                               // Acessa os dados enviados via GET
                               $usuario_deletado = $_GET['usuario_deletado'];

                               // Faça o que deseja com os dados recebidos
                                   echo '<div class="bg-info border border-black border-2 p-3 my-3"><p class="mb-0">';
                                   echo "não foi possível deletar o usuário $usuario_deletado";
                                   echo '</p></div>'; 
                            }
                            else{
                                echo '<p class="mb-0">Resultado...</p>'; 
                            }
                        ?>
                </div>
            </div>
        </div>

        <hr class="border border-2 border-black my-5">
        
        <!-- Alterar informação do usuário apontado pelo id do banco de dados -->
        <div class="row">
            <div class="col-12">
                <form action="php/alterar.php" method="post">
                    <div class="form-group">
                        <label for="alterar" class="h3">Alterar informação do banco de dados</label>
                        <input class="form-control" type="number" name="valor_alterar_id" id="alterar" placeholder="Informe o id do cliente a ser alterado">
                    </div>
                    
                    
                    <div class="container px-5 py-3 my-5 border">
                        <h3>Preencha as novas informações a baixo:</h3>
                        <div class="form-group">
                            <label for="alterar_nome" class="h3">Novo nome</label>
                            <input class="form-control" type="text" name="valor_alterar_nome" id="alterar_nome" placeholder="Escreva o novo nome">
                        </div>

                        <div class="form-group">
                            <label for="alterar_idade" class="h3">Nova idade</label>
                            <input class="form-control" type="text" name="valor_alterar_idade" id="alterar_idade" placeholder="informe a nova idade">
                        </div>
                    </div>
                    <input type="submit" value="Alterar">
                </form>

                <div class="border border-5 border-black mt-4 p-2">
                    <?php
                            // Verifica se os dados foram enviados via GET
                            if(isset($_GET['alterado']) && $_GET['alterado'] == '1') {
                                // Acessa os dados enviados via GET
                                $usuario_alterado = $_GET['nomeAntigo'];
                                $nome_novo = $_GET['novoNome'];
                                $idade_nova = $_GET['novaIdade'];

                                // Faça o que deseja com os dados recebidos
                                    echo '<div class="bg-info border border-black border-2 p-3 my-3"><p class="mb-0">';
                                    echo "Os dados do usuário $usuario_alterado foram alterados para:<br>Nome: $nome_novo<br>Idade: $idade_nova";
                                    echo '</p></div>';
                            }elseif(isset($_GET['alterado']) && $_GET['alterado'] == '2') {
                               // Acessa os dados enviados via GET
                               $usuario_alterado = $_GET['nomeAntigo'];
                               $nome_novo = $_GET['novoNome'];
                               $idade_nova = $_GET['novaIdade'];

                               // Faça o que deseja com os dados recebidos
                                   echo '<div class="bg-info border border-black border-2 p-3 my-3"><p class="mb-0">';
                                   echo "Não foi possível alterar os dados do usuário $usuario_alterado";
                                   echo '</p></div>';
                            }
                            else{
                                echo '<p class="mb-0">Resultado...</p>'; 
                            }
                        ?>
                </div>
            </div>

            <hr class="border border-2 border-black my-5">

            <!-- Incluir um novo usuário no do banco de dados -->
            <div class="row">
                <div class="col-12">
                    <form action="php/incluir.php" method="post">
                        
                        <h3 class="h3">Incluir usuário novo</h3>
                        <div class="container px-5 py-3 my-5 border">
                            <h3>Preencha as informações a baixo:</h3>
                            <div class="form-group">
                                <label for="incluir_nome" class="h3">Nome</label>
                                <input class="form-control" type="text" name="valor_incluir_nome" id="incluir_nome" placeholder="Escreva o novo nome">
                            </div>

                            <div class="form-group">
                                <label for="incluir_idade" class="h3">Idade</label>
                                <input class="form-control" type="text" name="valor_incluir_idade" id="incluir_idade" placeholder="informe a nova idade">
                            </div>
                        </div>
                        <input type="submit" value="Incluir">
                    </form>

                    <div class="border border-5 border-black mt-4 p-2">
                        <?php
                                // Verifica se os dados foram enviados via GET
                                if(isset($_GET['incluido']) && $_GET['incluido'] == '1') {
                                    // Acessa os dados enviados via GET
                                    $usuario_novo = $_GET['NomeIncluido'];

                                    // Faça o que deseja com os dados recebidos
                                        echo '<div class="bg-info border border-black border-2 p-3 my-3"><p class="mb-0">';
                                        echo "O usuário $usuario_novo foi cadastrado com sucesso";
                                        echo '</p></div>';
                                }elseif(isset($_GET['incluido']) && $_GET['incluido'] == '2') {
                                    echo '<div class="bg-info border border-black border-2 p-3 my-3"><p class="mb-0">';
                                    echo "Não foi possível cadastrar O usuário $usuario_novo";
                                    echo '</p></div>';
                                }
                                else{
                                    echo '<p class="mb-0">Resultado...</p>'; 
                                }
                            ?>
                    </div>
                </div>
            </div>
    </div>
</body>
</html>