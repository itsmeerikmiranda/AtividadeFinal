<?php
include 'acesso_com.php';
include '../conn/connect.php';
// implementação backend a partir daqui...
 
if($_POST){
    if(isset($_POST['enviar']))
       
        
   
    $sigla = $conn->real_escape_string($_POST['sigla']);
    $rotulo = $conn->real_escape_string($_POST['rotulo']);
   
    $insereTipos = "INSERT tipos (sigla, rotulo)
    VALUES ('$sigla', '$rotulo')";
    $resultado = $conn-> query($insereTipos);
    
    }   
// Selecionar a lista de tipos para preencher o <select>

$listaTipo = $conn->query("select * from tipos order by rotulo");
$rowTipo = $listaTipo->fetch_assoc();
$numLinhas = $listaTipo->num_rows;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Insere - Tipos</title>
</head>
<body>
<?php include "menu_adm.php";?>
<main class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-offset-2 col-sm-6  col-md-8">
            <h2 class="breadcrumb text-danger">
                <a href="tipos_lista.php">
                    <button class="btn btn-danger">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </button>
                </a>
                Inserindo tipo
            </h2>
            <div class="thumbnail">
                <div class="alert alert-warning" role="alert">
                    <form action="tipos_insere.php" method="post"
                    name="form_insere" enctype="multipart/form-data"
                    id="form_insere">
                    <label for="descricao">Rotulo:</label>    
                        <div class="input-group">
                           <span class="input-group-addon">
                                <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
                           </span>
                           <input type="text" name="rotulo" id="rotulo"
                                class="form-control" placeholder="Digite o rotulo"
                                maxlength="100" required>
                        </div>  
                            <label for="descricao">SIGLA:</label>    
                        <div class="input-group">
                           <span class="input-group-addon">
                                <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
                           </span>
                           <input type="text" name="sigla" id="sigla"
                                class="form-control" placeholder="Digite a sigla"
                                maxlength="100" required>
                        </div>  
                       
                       
                        
                      
 
                        <br>
                        <input type="submit" name="enviar" id="enviar" class="btn btn-danger btn-block" value="Cadastrar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
 
<!-- Script para imagem -->


 
</body>
</html>