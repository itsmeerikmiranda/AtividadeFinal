<?php 

//faz a validação de usuário para ADM, o que permite dar acesso á área administrativa;
session_name('chulettaaa');
if (!isset($_SESSION)) {                   // Se não está atribuido -> !- < Negação
    session_start(); //Se não houver valor irá iniciar sessão
}
// Segurança digital
//Verificar se o usuário está logado na sessão.
if(!isset($_SESSION['login_usuario'])){
// Se não existir, redirecionamos a sessão por segurança.
// header('location:login.php'); // Redirecionamento de página
// exit;
}
$nome_da_sessao = session_name();
if(!isset($_SESSION['nome_da_sessao']) or 
($_SESSION['nome_da_sessao']!= $nome_da_sessao))
{
session_destroy();
header('location:login.php');

}

?>