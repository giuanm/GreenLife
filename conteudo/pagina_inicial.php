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
    <!-- o include fica no body ou no  head -->
    <?php include("connection/conexao.php"); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 col-sm-12 mb-3 ">
                <header class="mx-auto text-center" style="width: 100%;">
                    <h1 class="fs-1" class="fw-bold" id="titulo" >Caso tenha cadastro
                    faça seu login!!</h1><br><br><br>
                    <form action="../index.php?p=pagina_inicial" method="POST">
                    <label for="Email">Email</label><br>
                    <input name="email" value=""   required  type="text">
                    <br><br>
                    <label for="Senha">Senha</label><br>
                    <input name="senha" value=""   required  type="password">
                    <br><br>
                    <input value="Entrar" name="confirmar" type="submit">
                    </form>
                    <br><br><br>
                    <a class="esp_link" href="../index.php?p=pagina_criacao_email_senha">Primeiro acesso</a>
                    <a class="esp_link" href="../index.php?p=principal">Voltar</a>
                </header>
            </div>
            <script src="js/jquery-3.6.0.min.js"></script>
            <script src="js/jquery.mask.min.js"></script>
            <script src="js/bootstrap.bundle.min.js"></script>
            <script src="js/popper.min.js"></script>
            <script src="js/bootstrap.min.js"></script>

        </div>
        <?php
        if (isset($_POST['confirmar'])) {
            //1 registro dos dados
            if (!isset($_SESSION))
                session_start();
                unset($_SESSION['id']);
            foreach ($_POST as $chave => $valor) {
                $_SESSION[$chave] = $valor;
            }
                //validação se usuario e senha correto
                $email = $_SESSION['email'];
                $senha = $_SESSION['senha'];
                $sql_code= "select id_cadastro FROM cadastro where email like '$email' and senha like '$senha'";
                $sql_query=$db->query($sql_code) or die ($db->error);
                $linha = $sql_query -> fetch();
                $idddd=intval($linha);
                if ($idddd > 0) {
                    if (!isset($_SESSION)) 
                    session_start(); 
                    $_SESSION['id'] = $linha[0];
                unset(
                    $_SESSION[email],
                    $_SESSION[senha],
                );
                //usuario e senha correto, avança para a pagina de logado
                    echo "<script> location.href='index.php?p=logado'; </script>";
                } else {echo "Usuario ou Senha não Localizados.";
                }
            }
        ?>
    </div>
</body>
</html>