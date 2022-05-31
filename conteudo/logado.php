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
    <a class="voltar" href="../index.php?p=pagina_inicial">Voltar</a>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 col-sm-12 mb-3 ">
                <header class="mx-auto text-center" style="width: 100%;">
                    <h1 class="fs-1" class="fw-bold" id="titulo" >Agendamentos Realizados</h1><br><br><br>
                    <?php include("connection/conexao.php"); ?>
                    <?php 
                        if (!isset($_SESSION)) 
                            session_start(); 
                            $id = intval($_SESSION['id']);

                    ?>
                    <?php
                        $linha2 = 0;
                        $sql_code="SELECT cep, rua, numero, bairro, cidade, uf, ponto_referencia FROM endereco WHERE id_cadastro = $id LIMIT 1";        
                        $sql_query=$db->query($sql_code) or die ($db->error);
                        $linha2 = $sql_query -> fetch();
                    ?>
                        <?php
                        $linha1 = 0;
                        $sql_code="SELECT id_cadastro FROM agendamento WHERE id_cadastro = $id LIMIT 1";        
                        $sql_query=$db->query($sql_code) or die ($db->error);
                        $linha1 = $sql_query -> fetch();
                    ?>
                    <?php
                        $sql_code="SELECT data_agendamento, horario_agendamento, fornecedor FROM agendamento WHERE id_cadastro = $id";        
                        $sql_query=$db->query($sql_code) or die ($db->error);
                        $linha = $sql_query -> fetch();
                    ?>
                    <?php
                    $idd=intval($linha1);
                    if ($idd > 0) { ?>
                        <table border=1 cellpading=10>
                            <tr class=titulo> 
                                <td>Data do Agendamento</td>
                                <td>Horário do Agendamento</td>
                                <td>Fornecedor</td>
                            </tr>
                            <?php
                            do{
                            ?>
                            <tr>
                                <td><?php echo $linha['data_agendamento']; ?></td>
                                <td><?php echo $linha['horario_agendamento']; ?></td>
                                <td><?php echo $linha['fornecedor']; ?></td>
                            </tr>
                            <?php } while($linha = $sql_query->fetch());  
                            } else {echo "Não encontramos agendamentos para este usuario.";}
                            ?>
                        </table>
                    <br><a class="esp_link" href="../index.php?p=agendamento">criar agendamento</a>
                    <br><br><br>
                    <?php
                    $iddd=intval($linha2);
                    if ($iddd > 0) { ?>
                        <table border=1 cellpading=10>
                            <tr class=titulo> 
                                <td>Cep</td>
                                <td>Rua</td>
                                <td>Numero</td>
                                <td>Bairro</td>
                                <td>Cidade</td>
                                <td>UF</td>
                                <td>Ponto Referencia</td>
                            </tr>
                            <?php
                            do{
                            ?>
                            <tr>
                                <td><?php echo $linha2['cep']; ?></td>
                                <td><?php echo $linha2['rua']; ?></td>
                                <td><?php echo $linha2['numero']; ?></td>
                                <td><?php echo $linha2['bairro']; ?></td>
                                <td><?php echo $linha2['cidade']; ?></td>
                                <td><?php echo $linha2['uf']; ?></td>
                                <td><?php echo $linha2['ponto_referencia']; ?></td>
                            </tr>
                            <?php } while($linha2 = $sql_query->fetch());  
                            } else {echo "Não encontramos endereço cadastrado.";}
                            ?>
                        </table>
                    <br><a class="esp_link" href="../index.php?p=endereco">cadastrar/atualizar endereço</a>
                </header>
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
