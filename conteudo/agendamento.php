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
                    <br><h1>Realizar Agendamento</h1><br><br><br>
                    <?php

                    if (isset($erro) && count($erro) > 0) {
                        echo "<div class='erro'>";
                        foreach ($erro as $valor)
                            echo "$valor <br>";
                        echo "</div>";
                    }
                    ?>
                    <form action="../index.php?p=agendamento" method="POST">
                        <!-- <form action="input.php?p=cadastrar" method="POST"> -->
                        <label for="telefone_agendamento">Telefone para contato</label><br>
                        <input name="telefone_agendamento" value=""   required  type="text"><br><br>
                        <label for="tipo_material_predominante">Tipo do material predominante</label><br>
                        <select name="tipo_material_predominante">
                            <option value="">Selecione</option>
                            <option value="1">Papel</option>
                            <option value="2">Vidro</option>
                            <option value="2">Metal</option>
                            <option value="2">Orgânico</option>
                        </select><br><br>
                        <label for="data_agendamento">Data para a coleta</label><br>
                        <input name="data_agendamento" value=""   required  type="text"><br><br>
                        <label for="horario_agendamento">Horário para a coleta</label><br>
                        <input name="horario_agendamento" value=""   required  type="text"><br><br>
                        <label for="fornecedor">Fornecedor</label><br>
                        <select name="fornecedor">
                            <option value="">Selecione</option>
                            <option value="1">Fornecedor 1</option>
                            <option value="2">Fornecedor 2</option>
                        </select><br><br><br>
                        <input value="Agendar" name="confirmar" type="submit">

                    </form>
                </header>
                
                <?php
                // require_once "conexão.php";

                include("connection/conexao.php");

                if (isset($_POST['confirmar'])) {
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
                        var_dump($id);
                    //2 validação dos dados
                    if (strlen($_SESSION['telefone_agendamento']) == 0)
                        $erro[] = "Preencha o telefone.";
                    if (strlen($_SESSION['tipo_material_predominante']) == 0)
                        $erro[] = "Preencha o tipo de material.";
                    if (strlen($_SESSION['data_agendamento']) == 0)
                        $erro[] = "Preencha a data do agendamento.";
                    if (strlen($_SESSION['horario_agendamento']) == 0)
                        $erro[] = "Preencha o horário do agendamento.";
                    if (strlen($_SESSION['fornecedor']) == 0)
                        $erro[] = "Escolha o fornecedor.";
                    //3 inserção no banco e redirecionamento

                    if (!isset($erro) || count($erro) == 0 ) {
                        $sql_code = "INSERT INTO agendamento (
                            telefone_agendamento,
                            tipo_material_predominante,
                            data_agendamento,
                            horario_agendamento,
                            fornecedor,
                            observacao,
                            situacao,
                            data_cadastro,
                            id_cadastro)
                        VALUES(
                            '$_SESSION[telefone_agendamento]',
                            '$_SESSION[tipo_material_predominante]',
                            '$_SESSION[data_agendamento]',
                            '$_SESSION[horario_agendamento]',
                            '$_SESSION[fornecedor]',
                            'retirar esta coluna do banco',
                            1,
                            NOW(),
                            $id
                        )";
                        $confirma = $db->query($sql_code) or die($db->error);

                        if ($confirma) {
                            unset(
                                $_SESSION[telefone_agendamento],
                                $_SESSION[tipo_material_predominante],
                                $_SESSION[data_agendamento],
                                $_SESSION[horario_agendamento],
                                $_SESSION[fornecedor]
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