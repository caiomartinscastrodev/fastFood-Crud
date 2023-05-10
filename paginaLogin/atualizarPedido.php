<?php
    require_once('database.php');
    if(empty($_GET['prato'])){
        header('location: pedidosUser.php?pedido=empty');
    }
    
    $prato = $_GET['prato'];
    $pedido = $_SESSION['pedido'];

    $busca = $conexao->query("
        select * from guilherme_latronico_cardapio where id = $prato;
    ");

    $consulta = $busca->fetchAll(PDO::FETCH_ASSOC);

    foreach($consulta as $prato){
        $titulo = $prato['nome'];
        $total_valor = 10 + $prato['preco'];
        $descricao = $prato['descricao'];
    }
    echo $titulo . '<br>';
    echo $total_valor . '<br>';
    echo $descricao . '<br>';
    echo $pedido. '<br>';

    $conexao->query("
    UPDATE `guilherme_latronico_pedido` SET `titulo` = '{$titulo}' WHERE `guilherme_latronico_pedido`.`id` = $pedido;
    ");

    $conexao->query("
    UPDATE `guilherme_latronico_pedido` SET `total_valor` = '{$total_valor}' WHERE `guilherme_latronico_pedido`.`id` = $pedido;
    ");

    $conexao->query("
    UPDATE `guilherme_latronico_pedido` SET `descricao` = '{$descricao}' WHERE `guilherme_latronico_pedido`.`id` = $pedido;
    ");

    header('location: pedidosUser.php');

?>