<?php
                //Chama conexão
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
<title>Fazer reserva </title>
</head>

<body class="fundofixo">
    <!-- area de menu -->
    <?php include 'menu_publico.php'; ?>    
    <a name="home">&nbsp;</a>

    <main class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-offset-2 col-sm-6  col-md-8">
            <h2 class="breadcrumb text-danger">
                <a href="cadReserva.php">
                    <button class="btn btn-danger">
                        <span class="glyphicon glyphicon-th-list"></span>
                    </button>
                </a>
                Conheça as regras da reserva !
            </h2>
            <div class="thumbnail">
                <div class="alert alert-warning" role="alert">
                    <form action="cadReserva.php" method="post"
                    name="form_insere" enctype="multipart/form-data"
                    id="form_insere">

                    <div class="regras-reserva">
                       <h2> 
            Mínimo: 36 horas antes da data desejada.<br><br>
            Máximo: 60 dias antes da data desejada.<br><br>
            Apenas um pedido de reserva por dia para um mesmo CPF.<br><br>
            A reserva não pode ser cancelada - somente o gerente pode cancelar.<br><br>
            Se sua reserva for aprovada você receberá uma confirmação por e-mail, o mesmo se for negada.<br><br>
            Estas são as regras que você deve seguir ao realizar uma reserva na churrascaria. Se precisar de mais alguma informação, é só avisar!<br>
            </h2><br>
        </div>


                        <!--  -->
                        <input type="hidden" name="codigoReserv" id="codigoReserv" class="form-control" placeholder="" maxlength="100" required>

                        <!-- Botão envia para reservas -->
                        <a href="cadReserva.php"> <input role="button" name="" id="" class="btn btn-danger btn-block" value="Condodo, quero reservar :)"></a>
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
