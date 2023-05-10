<?php
    require_once('database.php');

    if(isset($_GET['pedido']) && $_GET['pedido'] == 'empty'){

?>
    <script>
        alert('Selecione oque deseja mudar primeiro!')
    </script>
<?php
    }

    $id = $_SESSION['id'];

    $busca = $conexao->query("
        select * from guilherme_latronico_pedido where id_user = $id;
    ");

    $consulta = $busca->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cardapio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
    <link rel="shortcut icon" href="img/favi.jpeg" type="image/x-icon">
    <script>
        function saudacoes(nome){
            alert(`Olá ${nome}, como vai? espero que esteja gostando do software`);
        }
    </script>
    <style>

        

        .cardapio  {
            max-width: 800px;
            min-width: none;
            margin: 20px auto;
            border: 1px solid white;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: space-around;
            align-items: center;
            padding: 10px;
            box-shadow: 0px 0px 10px white;
        }

        .menu button {
            display: block;
            width: 50%;
            margin: 20px  auto;
            background-color: rgba(255, 0, 0, 0.558);
            color: white;
            padding: 4px 20px;
            border-radius: 30px;
            font-size: 25px;
            border: none;
        }

        input[type="checkbox"] {
            
            background-color: #fff;
            margin: 0;
            font: inherit;
            color: currentColor;
            width: 1.55em;
            height: 1.55em;
            border: 0.15em solid currentColor;
            border-radius: 0.15em;
            transform: translateY(-0.075em);
        }

        .form-control + .form-control {
            margin-top: 1em;
        }

        .menu button:hover{
            background-color: rgb(255, 0, 0);
            color: white;
            transition: 1s;
        }

        .principal{
            background-image: url('img/panda.jpeg');
            background-repeat: no-repeat;
            background-position: center top;
            background-size: cover  ;
            color: white;
            background-attachment: fixed;
        }

        .menu{
            background-color: rgba(0, 0, 0, 0.784);
            width: 70%;
            margin: 100px auto;
            padding: 20px;
            box-shadow: 0px 0px 10px white;
        }

        .prato{
            width: 200px;
            height: 200px;
            padding: 9px;
            border-radius: 100%;
        }

        .logo {
            display: block;
            width: 130px;
            height: 130px;
            border-radius: 100%;
        }

        header{
            background-color: rgba(255, 0, 0, 0.74);
            box-shadow: 0px 0px 10px white;
        }

        .desc{
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: space-around;
            align-items: center;
            width: 100%;
        }

        .title{
            width: 200px;
            padding: 20px;
        }

        a {
            text-decoration: none;
        }

    </style>
</head>
<body class="principal">
    <header>
        <nav class="navbar navegacao container">
            <a href="#">
                <img class="logo navbar-brand" src="img/favi.jpeg" alt="">
            </a>

            <ul class="nav ">
                <a href="#" class="nav-link text-light"><li class="nav-item">Bem vindo(a) <?php echo $_SESSION['nome'];?> | </li></a>
                <a href="pedidosUser.php" class="nav-link text-light"><li class="nav-item"> Pedidos | </li></a>
                <a href="loginPagina.php" class="nav-link text-light"><li class="nav-item"> Sair</li></a>
            </ul>

        </nav>
    </header>
    <div action="pedidosUser.php" class="menu box-principal">
        <h1 class="text-center p-5 text-uppercase">Seus pedidos</h1>

        <?php
            foreach($consulta as $pedidos){

            
        ?>
                <div class="cardapio">
                    <div class="desc">
                        <h1 class="d-block title">Obrigado pelo seu pedido</h1>

                        <div class="w-75 mx-auto">
                            <h1 class="h3"> <?php echo $pedidos['titulo'];?> </h1>
                            <p><?php echo $pedidos['descricao'];?></p>
                            <p>Total do pedido: R$<?php echo $pedidos['total_valor'];?></p>
                            <p>Já registrado R$10.00 de frete</p>
                            <br>
                            <a class="btn btn-outline-danger d-block mx-auto my-3" href="cancelar.php?id=<?php echo $pedidos['id']?>">Cancelar pedido</a>

                            <a class="btn btn-outline-success d-block mx-auto my-3" href="atualizar.php?id=<?php echo $pedidos['id']?>">Atualizar pedido</a>
                        </div>
                    </div>
                </div>
        <?php
            }
        ?>


        <a href="cardapio.php">
            <button type="submit">Voltar</button>
        </a>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>