<DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="screen" href="estilo.php"/>

    <title>GreenLife</title>
    <link rel="icon" type="imagem/png" href="../img/Logo1.png" />
</head>
<body>
<br><a class="voltar" href="../index.php?p=pagina_inicial">Voltar</a><br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 col-sm-12 mb-3 ">
                <header class="mx-auto text-center" style="width: 100%;">
                    <p class=espaco></p>
                    <h1 class="fs-1" class="fw-bold" id="titulo" >Cadastre-se para continuar!!!</h1><br><br><br>
                    <form action="../index.php?p=pagina_criacao_email_senha" method="POST">
                    <label for="nome">Nome</label><br>
                    <input name="nome" value=""   required  type="text"><br><br>
                    <label for="email">Email</label><br>
                    <input name="email" value=""   required  type="text"><br><br>
                    <label for="senha">Senha com Quatro Números</label><br>
                    <input name="senha" value=""   required  type="password"><br><br>
                    <label for="Senha2">Repetir Senha</label><br>
                    <input name="senha2" value=""   required  type="password"><br><br><br><br><br>
                    <input value="Cadastrar" name="confirmar" type="submit">
                    </form>
                </header>
                <!-- o include fica no body ou no  head -->
                <?php include("connection/conexao.php"); ?>
                <?php
                //2 validação dos dados
                if (isset($_POST['confirmar'])) {
                    //1 registro dos dados
                    if (!isset($_SESSION))
                        session_start();
                        foreach ($_POST as $chave => $valor) {
                                $_SESSION[$chave] = $valor;
                    }
                    if (strlen($_SESSION['nome']) == 0)
                        $erro[] = "Preencha o seu nome. ";   
                    if (    
                        substr_count($_SESSION['email'], '@') != 1
                        || substr_count($_SESSION['email'], '.') < 1
                        || substr_count($_SESSION['email'], '.') > 2
                        )
                        $erro[] = "Preencha o e-mail corretamente. ";
                    if (strlen($_SESSION['senha']) < 4 || strlen($_SESSION['senha']) > 4)
                        $erro[] = "A senha deve ter 4 numeros. ";
                    if (strlen($_SESSION['senha']) !== strlen($_SESSION['senha2']))
                        $erro[] = "A senha deve ser igual. ";
                    if (!isset($erro) || count($erro) == 0 ) {
                        $sql_code = "INSERT INTO cadastro (
                            nome,
                            email,
                            senha,
                            data_cadastro)
                        VALUES(
                            '$_SESSION[nome]',
                            '$_SESSION[email]',
                            '$_SESSION[senha]',
                            NOW()
                        )";
                        $confirma = $db->query($sql_code) or die($db->error);
                        if ($confirma) {
                            unset(
                                $_SESSION[nome],
                                $_SESSION[email],
                                $_SESSION[senha]
                            );
                            echo "<script> location.href='index.php?p=logado'; </script>";
                        } else
                            $erro[] = $confirma;
                    } 
                    foreach ($erro as $chave => $valor) {
                        echo  $valor;
                    }
                }
                ?>
            </div>
            <script src="js/jquery-3.6.0.min.js"></script>
            <script src="js/jquery.mask.min.js"></script>
            <script src="js/bootstrap.bundle.min.js"></script>
            <script src="js/popper.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
        </div>
    </div>
</body>
</html>