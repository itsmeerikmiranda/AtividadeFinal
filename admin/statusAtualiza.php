<?php
include 'acesso_com.php';
include '../conn/connect.php';

$id_form = 0;
if ($_GET) {

$id_form = $_GET['id'];

}
$listaReservas = $conn->query("SELECT * FROM reservas where id = $id_form");
$row = $listaReservas->fetch_assoc();

if ($_POST) { // Se o usuário clicou no botão atualizar
    $id = $_POST['id'];
    $mesa = $_POST['mesa'];
    $status = $_POST['status'];

    $update = "UPDATE reservas
    SET mesa = '$mesa',
        status = '$status'
    WHERE id = $id";

    $resultado = $conn->query($update);
    if ($resultado) {
        header('Location:reservas_lista.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Reservas - Confirma</title>
</head>
<body>
<?php include "menu_adm.php";?>
<main class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-offset-2 col-sm-6 col-md-8">
            <h2 class="breadcrumb text-danger">
                <a href="reservas_lista.php">
                    <button class="btn btn-danger">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </button>
                </a>
                Confirmando reserva
            </h2>
            <div class="thumbnail">
                <div class="alert alert-danger" role="alert">
                    <form action="statusAtualiza.php" method="post"
                          name="form_insere" enctype="multipart/form-data"
                          id="form_insere">
                        <input type="hidden" name="id" id="id" value="<?php echo $row ['id'] ?> "> 

                        <label for="mesa">Mesa:</label>    
                        <div class="input-group">
                           <span class="input-group-addon">
                            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                           </span>
                           <input name="mesa" id="mesa" class="form-control" placeholder="Digite os detalhes da mesa" value="">
                        </div>
                            
                        <label for="status">Status:</label>    
                        <div class="input-group">
                           <span class="input-group-addon">
                            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                           </span>
                           <input name="status" id="status" class="form-control" placeholder="Digite o status" value="">
                        
                           </div>
                        <input type="submit" name="Confirmar" id="Confirmar" class="btn btn-danger btn-block" value="Confirmar">
                    </form> 
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
