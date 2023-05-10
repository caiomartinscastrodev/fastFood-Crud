<?php
    require_once('database.php');

    $id = $_GET['id'];

    $conexao->query("
        delete from guilherme_latronico_pedido where id = $id;
    ");

    header('location: pedidosUser.php');

?>