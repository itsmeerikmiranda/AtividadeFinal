<?php
 include 'acesso_com.php'; // só pode acessar usuario sup
 include '../conn/connect.php';
 $lista = $conn->query("select * from usuarios ");
 $row = $lista->fetch_assoc();  //cria matriz associativa
 $rows = $lista->num_rows;


?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios - Lista</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body >
   <?php  include 'menu_adm.php'?>
    <main class="container">
        <h2 class="breadcrumb alert-danger">Lista de Usuarios</h2>
        <table class="table table-hover table-condensed tb-opacidade bg-info">
            <thead>
                <th class="hidden">ID</th>
                <th>Nome</th>
                <th>Nivel</th>
               
                <th>
                    <a href="usuarios_insere.php" target="_self" class="btn btn-block btn-info btn-xs" role="button">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        <span class="hidden-xs">ADICIONAR</span>
                    </a>
                </th>
            </thead>
           
            <tbody> <!-- início corpo da tabela -->
                    <!-- início estrutura repetição -->
                            
                        <?php do{ ?>
                            <tr>
                                    <td class="hidden">
                                        <?php echo $row ['id'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['login'];?>
                                        <span class="visible-xs"></span>
                                        <span class="hidden.xs"></span>
                                    </td>
                                    
                                    <td>
                                        <?php echo $row ['nivel'];?>

                                    </td>
                                    
                                   
                                    <td>
                                        <a href="produtos_atualiza.php?id= <?php echo $row ['id'] ?>" role="button" class="btn btn-warning btn-block btn-xs">
                                        <span class="glyphicon glyphicon-refresh"></span>
                                        <span class="hidden-xs">Alterar</span>
                                    </a> 
                                     <!-- Não mostrar o botão excluir se o produto estiver em destaque -->
                                    


                                    <button 
                                    data-nome="<?php echo $row['login']; ?>"
                                    data-id="<?php echo $row['id']; ?>"
                                    class="delete btn btn-xs btn-block btn-danger ?>"
                                    
                                    >
                                    <span class="glyphicon glyphicon-trash"></span>
                                    <span class="hidden-xs">Excluir</span>

                                    </button>

                                    </td>
                                </tr>
                <?php } while ($row =$lista->fetch_assoc());?>   <!-- Retorna uma linha para cada vez que retorna um resultado-->

            </tbody><!-- final corpo da tabela -->
        </table>
    </main>
    <!-- inicio do modal para excluir... -->
    <div class="modal fade" id="modalEdit" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Vamos deletar?</h4>
                    <button class="close" data-dismiss="modal" type="button">
                        &times;
 
                    </button>
                </div>
                <div class="modal-body">
                    Deseja mesmo excluir o item?
                    <h4><span class="nome text-danger"></span></h4>
                </div>
                <div class="modal-footer">
                    <a href="#" type="button" class="btn btn-danger delete-yes">
                        Confirmar
                    </a>
                    <button class="btn btn-success" data-dismiss="modal">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script type="text/javascript">
    $('.delete').on('click',function(){
        var nome = $(this).data('nome'); //busca o nome com a descrição (data-nome)
        var id = $(this).data('id'); // busca o id (data-id)
        //console.log(id + ' - ' + nome); //exibe no console
        $('span.nome').text(nome); // insere o nome do item na confirmação
        $('a.delete-yes').attr('href','produtos_excluir.php?id='+id); //chama o arquivo php para excluir o produto
        $('#modalEdit').modal('show'); // chamar o modal
    });
</script>
 
<?php
 
?>
</html>