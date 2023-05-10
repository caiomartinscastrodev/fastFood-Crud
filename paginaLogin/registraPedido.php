<?php
    require_once('database.php');

    $id = $_SESSION['id'];
    $id_prato = $_GET['prato'];

    $busca_cardapio = $conexao->query("
        select * from guilherme_latronico_cardapio where id = $id_prato;
    ");

    $consulta_cardapio = $busca_cardapio->fetchAll(PDO::FETCH_ASSOC);

    $busca_cliente = $conexao->query("
        select * from guilherme_latronico_user where id = $id;
    ");

    $consulta_cliente = $busca_cliente->fetchAll(PDO::FETCH_ASSOC);

    foreach($consulta_cliente as $dados_cliente){
        $cep = $dados_cliente['cep'];
        $complemento = $dados_cliente['complemento'];
        
        $numero_casa = $dados_cliente['numero_casa'];
        $telefone = $dados_cliente['telefone'];
    }

    foreach($consulta_cardapio as $dados_cardapio){
        $titulo = $dados_cardapio['nome'];
        $descricao = $dados_cardapio['descricao'];
        $total_valor =10 + $dados_cardapio['preco'];
    }

    echo $cep . '<br>';
    echo $complemento . '<br>';
    echo $numero_casa . '<br>';
    echo $telefone . '<br>';
    echo $descricao . '<br>';
    echo $total_valor . '<br>';

    
    $conexao->query("
        insert into guilherme_latronico_pedido(
            cep,
            complemento,
            descricao,
            numero_casa,
            telefone,
            total_valor,
            id_user,
            titulo
        )values(
            '{$cep}',
            '{$complemento}',
            '{$descricao}',
            '{$numero_casa}',
            '{$telefone}',
            '{$total_valor}',
            '{$id}',
            '{$titulo}'
        );
    ");

    header('location: pedidosUser.php?cadastro=success');


?>