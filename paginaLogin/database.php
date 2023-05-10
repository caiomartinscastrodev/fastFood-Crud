<?php
    //Link para acesso ao banco de dados remoto
    //https://phpmyadmin.locaweb.com.br/
    
    //Exemplo com constantes
    session_start();

    $dsn = 'mysql:host=localhost;dbname=FASTFOOD';
    $user = 'root';
    $pass = '';

    $conexao = new PDO($dsn, $user , $pass);

    