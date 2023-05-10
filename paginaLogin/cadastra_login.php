<?php 

    require_once('database.php');

    if((empty($_POST['password']) && empty($_POST['passwordC']) && empty($_POST['email'])) || $_POST['password'] == '' || $_POST['passwordC'] == ''){
        header('location: cadastroPagina.php?cadastro=erro1');    
    }else if($_POST['password'] == $_POST['passwordC']){
        
        $conexao->query("
            insert into guilherme_latronico_user(
                nome,
                email,
                senha,
                complemento,
                numero_casa,
                telefone,
                cep
            )values(
                '{$_POST['nome']}',
                '{$_POST['email']}',
                '{$_POST['password']}',
                '{$_POST['complemento']}',
                '{$_POST['numero_casa']}',
                '{$_POST['tell']}',
                '{$_POST['cep']}'
            );
        ");

        header('location: loginPagina.php?cadastro=success');

    }else{
        header('location: cadastroPagina.php?cadastro=erro2');
    }

    