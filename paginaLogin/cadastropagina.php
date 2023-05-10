<?php
    if(isset($_GET['cadastro']) && $_GET['cadastro'] == 'erro1'){
?>
    <script>
        alert('preencha todos os campos para fazer o cadastro!!!');
    </script>
<?php    
    }
    if(isset($_GET['cadastro']) && $_GET['cadastro'] == 'erro2'){
?>
    <script>
        alert('As senha precisam ser iguais para fazer o cadastro');
    </script>
<?php    
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina de Login</title>
    <!--PRESTA ATENÇÂO: Quando foi inserir o CSS no SEU projeto confere se está linkado corretamente-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/favi.jpeg" type="image/x-icon">

    <style>

        body , html , .box{
            height: 100%;
            background-color: black;
            width: 100%;
        }

        * {
            padding: 0px;
            margin: 0px;
        }

        .box{
            background-image: url('img/panda.jpeg');
            background-repeat: no-repeat;
            background-position: center top;
            background-size: cover  ;
            color: white;
            background-attachment: fixed;
            padding: 1px;
        }

        form {
            max-width: 600px;
            min-width: none;
            margin: 300px auto;
            text-align: center;
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            justify-content: space-around;
            align-items: center;
            background-color: rgba(0, 0, 0, 0.842);
            padding: 20px;
        }

        .login input {
            display: block;
            width: 80%;
            padding: 10px 30px;
            font-size: 20px;
            outline: none;
            border: none;
            border-radius: 30px;
            margin: 20px;
        }

        #logo {
            width: 150px;
            height: 150px;
            border-radius: 100%;
            margin-top: -100px;
        }

        

    </style>
</head>
<body>
    <div class="box">
        <form class="login" action="cadastra_login.php" method="post">
            <h1>
                <img id="logo" src="img/favi.jpeg" alt="">
            </h1>

            <input type="text" name="nome" id="nome" placeholder="Digite o seu nome..." size="122">

            <input type="email" name="email" id="email" placeholder="Digite o seu email..." size="122">

            <input type="tell" name="tell" id="tell" placeholder="Digite o seu telefone..." size="11">

            <input type="number" name="cep" id="cep" placeholder="Digite o seu cep..." min="0" max="99999999" size="8">

            <input type="text" name="complemento" id="complemento" placeholder="Ex: casa...">

            <input type="number" name="numero_casa" id="numero_casa" placeholder="Ex: 81 , 89" size="4">

            <input type="password" name="password" id="password" placeholder="Digite a sua  senha...">

            <input type="password" name="passwordC" id="passwordC" placeholder="Digite a sua senha novamente...">

            <div class="d-flex w-100 justify-content-around">
                <button class="btn btn-outline-light d-block w-25">Cadastrar</button>
                <a href="loginPagina.php" class="btn btn-outline-light d-block w-25">Voltar</a>
            </div>


        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
