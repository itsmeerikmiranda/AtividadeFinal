<?php
include 'acesso_com.php';
include '../conn/connect.php';
if($_POST){ // Se o usuário clicou no botão atualizar

$id = $_POST['id'];


$sigla = $_POST['sigla'];
$rotulo = $_POST['rotulo'];

$update = "update tipos
            set id = $id,
            sigla = '$sigla',
            rotulo = '$rotulo'
        where id = $id;";

        
    $resultado = $conn->query($update);
    if ($resultado){

        header('location:tipos_lista.php');
    }
    }
if($_GET){
    $id_form = $_GET['id']; // ID que vai via GET - O que aparece na URL
}else{
$id_form = 0;

}

$lista = $conn->query('select * from tipos where id =' .$id_form);
$row = $lista->fetch_assoc(); // Faz o Array dos itens selecionados


//Selecionar a lista de tipos para preencher o <select>
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
    <title>Tipos - Atualiza</title>
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
                Alterando Tipo
            </h2>
            <div class="thumbnail">
                <div class="alert alert-danger" role="alert">
                    <form action="tipos_atualiza.php" method="post"
                    name="form_insere" enctype="multipart/form-data"
                    id="form_insere">
 
                    <input type="hidden" name="id" id="id" value="<?php echo $row['id']; ?>">   <!-- ID que vem do formulário-->
                   
                    
                           
                       
                        <label for="rotulo">Rotulo:</label>    
                        <div class="input-group">
                           <span class="input-group-addon">
                            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></span>
                           <input  name="rotulo" id="rotulo" class="form-control" placeholder="Digite os detalhes do rotulo" value="<?php echo $row['rotulo'];?>">
                           </input>
                            </div>
                            
                        
                       
                        <label for="sigla">Sigla:</label>    
                        <div class="input-group">
                           <span class="input-group-addon">
                                <span class="glyphicon glyphicon-list-alt" aria-hidden=""></span> </span>

                                <input  name="sigla" id="sigla"
                                
                                class="form-control" maxleght ="100" placeholder="Digite as alterações da sigla" value="<?php echo $row['sigla'];?>">
                                
                            </input>
                        </div>
                    
 
                  
 
                        <br>
                        <input type="submit" name="atualizar" id="atualizar" class="btn btn-danger btn-block" value="Atualizar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
 


 
</body>
</html>