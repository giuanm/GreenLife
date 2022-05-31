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
    <a class="voltar" href="../index.php?p=logado">Voltar</a>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 col-sm-12 mb-3 ">
                <header class="mx-auto text-center" style="width: 100%;">
                    <p class=espaco></p>
                    <h1 class="fs-1" class="fw-bold" id="titulo" >Cadastro do Endereço</h1><br><br><br>
                    <form action="../index.php?p=endereco" method="POST">
                    <label for="cep">CEP</label><br>
                    <input name="cep" value=""   required  type="text"><br><br>
                    <label for="rua">Logradouro</label><br>
                    <input name="rua" value=""   required  type="text"><br><br>
                    <label for="numero">Numero</label><br>
                    <input name="numero" value=""   required  type="text"><br><br>
                    <label for="ponto_referencia">Ponto de referência</label><br>
                    <input name="ponto_referencia" value=""   required  type="text"><br><br>
                    <label for="bairro">Bairro</label><br>
                    <input name="bairro" value=""   required  type="text"><br><br>
                    <label for="cidade">Cidade</label><br>
                    <input name="cidade" value=""   required  type="text"><br><br>
                    <label for="uf">Estado</label><br>
                    <input name="uf" value=""   required  type="text"><br><br><br>
                    <input value="Cadastrar" name="cadastro_endereco" type="submit">
                    </form>
                </header>
                <!-- o include fica no body ou no  head -->
                <?php include("connection/conexao.php"); ?>
                <?php
                //2 validação dos dados
                if (isset($_POST['cadastro_endereco'])) {
                    //1 registro dos dados
                    if (!isset($_SESSION))
                        session_start();
                    foreach ($_POST as $chave => $valor) {
                        $_SESSION[$chave] = $valor;
                        // $_SESSION[$chave] = $db->real_escape_string($valor);
                    }
                    if (!isset($_SESSION)) 
                        session_start(); 
                        $id = intval($_SESSION['id']);
                //var_dump($_SESSION['confirmar']);
                    if (strlen($_SESSION['cep']) == 0)
                        $erro[] = "Preencha o nome.";
                    if (strlen($_SESSION['rua']) == 0)
                        $erro[] = "Escolha o sexo.";
                    if (strlen($_SESSION['numero']) == 0)
                        $erro[] = "Preencha o telefone.";
                    if (strlen($_SESSION['ponto_referencia']) == 0)
                        $erro[] = "Preencha o telefone.";
                    if (strlen($_SESSION['bairro']) == 0)
                        $erro[] = "Preencha o telefone.";
                    if (strlen($_SESSION['cidade']) == 0)
                        $erro[] = "Preencha o telefone.";
                    if (strlen($_SESSION['uf']) == 0)
                    $erro[] = "Preencha o telefone.";
                    if (!isset($erro) || count($erro) == 0 ) {
                    $sql_code = "INSERT INTO endereco (
                        cep,
                        rua,
                        numero,
                        bairro,
                        cidade,
                        uf,
                        ponto_referencia,
                        data_cadastro,
                        id_cadastro
                        )
                    VALUES(
                        '$_SESSION[cep]',
                        '$_SESSION[rua]',
                        '$_SESSION[numero]',
                        '$_SESSION[bairro]',
                        '$_SESSION[cidade]',
                        '$_SESSION[uf]',
                        '$_SESSION[ponto_referencia]',
                        NOW(),
                        $id
                    )";
                    $confirma = $db->query($sql_code) or die($db->error);
                    if ($confirma) {
                        unset(
                            $_SESSION[cep],
                            $_SESSION[rua],
                            $_SESSION[numero],
                            $_SESSION[bairro],
                            $_SESSION[cidade],
                            $_SESSION[uf],
                            $_SESSION[ponto_referencia],
                        );
                        echo "<script> location.href='index.php?p=logado'; </script>";
                    } else
                        $erro[] = $confirma;
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