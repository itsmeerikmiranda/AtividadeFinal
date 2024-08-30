<?php
 include 'acesso_com.php'; // só pode acessar usuario sup
 include '../conn/connect.php';
 $lista = $conn->query("select * from vw_reservas");
 $row = $lista->fetch_assoc();  //cria matriz associativa
 $rows = $lista->num_rows;


?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas - Lista</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body >
   <?php  include 'menu_adm.php'?>
    <main class="container">
        <h2 class="breadcrumb alert-danger">Lista de Reservas</h2>
        <table class="table table-hover table-condensed tb-opacidade bg-warning">
            <thead>
                <th class="hidden">ID</th>
                <th>NOME</th>
                <th>CPF</th>
                <th>TELEFONE</th>
                <th>EMAIL</th>
                <th>DATA</th> 
                <th>HORARIO</th> 
                <th>PESSOAS</th> 
                <th>MOTIVO</th> 
                <th>CÓDIGO</th> 
                <th>STATUS</th> 
                <th>MESA</th> 
               
                <th>DATA CRIAÇÃO</th> 
                <th>
                    <a href="reservas_insere.php" target="_self" class="btn btn-block btn-primary btn-xs" role="button">
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
                                        <?php echo $row['nome'];?>
                                        <span class="visible-xs"></span>
                                        <span class="hidden.xs"></span>
                                    </td>
                                    <td>
                                        <?php
                                     
                                        echo $row['cpf']
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo $row ['telefone'];?>

                                    </td>
                                    
                                    <td>
                                        <?php echo $row ['email'];?>

                                    </td>
                                    <td>
                                        <?php echo $row ['data'];?>

                                    </td>

                                    <td>
                                        <?php echo $row ['horario'];?>

                                    </td>

                                    <td>
                                        <?php echo $row ['numPessoas'];?>

                                    </td>

                                    <td>
                                        <?php echo $row ['motivo'];?>

                                    </td>

                                   
                                    <td>
                                        <?php echo $row ['codigoReserv'];?>

                                    </td>
                                    <td>
                                        <?php echo $row ['status'];?>

                                    </td>
                                    <td>
                                        <?php echo $row ['mesa'];?>

                                    </td>

           
                                  
        <td>
                                        <?php echo $row ['data_criacao'];?>

                                    </td>

                                    <td>
                                        <a href="statusAtualiza.php?id= <?php echo $row ['id'] ?>" role="button" class="btn btn-warning btn-block btn-xs">
                                        <span class="glyphicon glyphicon-refresh"></span>
                                        <span class="hidden-xs">APROVAR</span>
                                    </a> 
                                     <!-- Não mostrar o botão excluir se o reserva estiver em destaque -->
                                    


                                    <button 
                                    data-nome="<?php echo $row['nome']; ?>"
                                    data-id="<?php echo $row['id']; ?>"
                                    class="delete btn btn-xs btn-block btn-danger "
                                    
                                    >
                                    <span class="glyphicon glyphicon-trash"></span>
                                    <span class="hidden-xs">REPROVAR</span>

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
                    Deseja mesmo excluir a reserva ?
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
        var nome = $(this).data('nome') ; //busca o nome com a descrição (data-nome)
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