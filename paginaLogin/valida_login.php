<?php
    require_once('database.php');

    $busca = $conexao->query("
        select * from guilherme_latronico_user;
    ");

    $lista = $busca->fetchAll(PDO::FETCH_ASSOC);

    $login = false;

    foreach($lista as $user){
        if($_POST['email'] == $user['email'] && $_POST['password'] == $user['senha']){
            $login = true;
            $_SESSION['adm'] = $user['adm'];
            $_SESSION['nome'] = $user['nome']; 
            $_SESSION['id'] = $user['id'];   
        }
    }

    if($login){
        if($_SESSION['adm'] == 0){
            header('location: cardapio.php');
        }else if($_SESSION['adm'] == 1){
            header('location: perfilAdm.php');
        }
    }else{
        header('location: loginPagina.php?login=fail');
    }

?>