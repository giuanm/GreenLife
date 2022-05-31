<DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>GreenLife</title>
<link rel="shortcut icon" href="Logo1.png"/>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
                <?php

            if (isset($_GET['p'])) {
            $url = $_GET['p'];

            if ($url == 'logado') {
                include('conteudo/logado.php');
            } elseif ($url == 'pagina_criacao_email_senha') {
                include('conteudo/pagina_criacao_email_senha.php');
            } elseif ($url == 'pagina_inicial') {
                include('conteudo/pagina_inicial.php');
            }elseif ($url == 'agendamento') {
                include('conteudo/agendamento.php');
            }elseif ($url == 'pagina_inicial') {
                include('conteudo/pagina_inicial.php');
            }elseif ($url == 'cliente') {
                include('conteudo/cliente.php');
            }elseif ($url == 'endereco') {
                include('conteudo/endereco.php');
            } else {include('conteudo/principal.html');
            }
            }  else {include('conteudo/principal.html');}
            //include('conteudo/pagina_inicial.php'
                ?>
            <script src="js/jquery-3.6.0.min.js"></script>
            <script src="js/jquery.mask.min.js"></script>
            <script src="js/bootstrap.bundle.min.js"></script>
            <script src="js/popper.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
        </div>
    </div>
</body>
</html>