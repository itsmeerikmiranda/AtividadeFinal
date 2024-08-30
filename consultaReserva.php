<?php
// puxando a conexão com o banco
include 'conn/connect.php';

?>




<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/icon.png" type="icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css" class="css">
<title>Consultar reserva </title>
</head>

<body class="fundofixo">
    <!-- area de menu -->
    <?php include 'menu_publico.php'; ?>    
    <a name="home">&nbsp;</a>

    <main class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-offset-2 col-sm-6  col-md-8">
            <h2 class="breadcrumb text-danger">
                <a href="consultaReserva.php">
                    <button class="btn btn-danger">
                        <span class="glyphicon glyphicon-th-list"></span>
                    </button>
                </a>
                Consultar reserva
            </h2>
            <div class="thumbnail">
                <div class="alert alert-warning" role="alert">
                    <form action="consultaReserva.php" method="post"
                    name="form_insere" enctype="multipart/form-data"
                    id="form_insere">

                        <!-- Capturar ID da Reserva -->
                        <input type="hidden" name="id" id="id" class="form-control" placeholder="" maxlength="100" required>

                

                        <label for="cpf">CPF:</label>    
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            </span>
                            <input type="text" name="cpf" id="cpf" class="form-control" placeholder="Digite o CPF" maxlength="11" required>
                        </div>  

                        <label for="telefone">Telefone:</label>    
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
                            </span>
                            <input type="tel" name="telefone" id="telefone" class="form-control" placeholder="(XX) XXXX-XXXX" maxlength="11" required>
                        </div>  

                     
                       
                        <br>
                      
                        <!-- Botão de envio usuário -->
                        <input type="submit" name="enviar" id="enviar" class="btn btn-danger btn-block" value="Consultar reserva">
                    
                        <?php 
                        // realizando a validação, fazendo dentro do formulário para exibir com mais praticidade e
                        //   para que o cliente consiga utilizar novamente o fomulário sem precisa retornar a janela
                        
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            //recebe os dados
                            $cpf = $_POST['cpf'];
                            $telefone = $_POST['telefone'];
                        
                            
                            $stmt = $conn->prepare("SELECT nome, email, data, horario, numPessoas, motivo, status FROM reservas WHERE cpf = ? AND telefone = ?");
                            
                            if ($stmt === false) {
                                die('Erro na preparação da consulta: ' . $conn->error);
                            }
                        
                         
                            $stmt->bind_param("ss", $cpf, $telefone); //ocultando dados através do bind

                            $stmt->execute();
                        
                            
                            $result = $stmt->get_result(); // recebendo a consulta pelo get
                        
                            if ($result->num_rows > 0) {
                                //  resultados - dados via html ocultados tb
                                echo "<h2>Informações da Reserva:</h2>";
                                while ($row = $result->fetch_assoc()) {
                                    echo "Nome: " . htmlspecialchars($row['nome']) . "<br>";
                                    echo "E-mail: " . htmlspecialchars($row['email']) . "<br>";
                                    echo "Data: " . htmlspecialchars($row['data']) . "<br>";
                                    echo "Horário: " . htmlspecialchars($row['horario']) . "<br>";
                                    echo "Número de Pessoas: " . htmlspecialchars($row['numPessoas']) . "<br>";
                                    echo "Motivo: " . htmlspecialchars($row['motivo']) . "<br>";
                                    echo "Status: " . htmlspecialchars($row['status']) . "<br>";
                                }
                            } else {
                                echo "Nenhuma reserva encontrada.";
                            }
                        
                            
                            $stmt->close(); // encerrando conexão
                            $conn->close();
                        }
                        
                        
                        ?>




                    </form>
                </div>
            </div>
        </div>
    </div>
    </main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).on('ready', function(){
        $(".regular").slick({
        dots:true,
        infinity:true,
        slidesToShow:3,
        slideToScroll:3
        });
    });
