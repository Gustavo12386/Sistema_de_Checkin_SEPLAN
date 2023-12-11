<?php
session_start();
include('pdo.php');

$nome = addslashes($_POST['nome']);
$senha = addslashes($_POST['senha']);

//reconhece a criptografia 
$senhamd5 = md5($senha);

//localiza o email e senha e realiza o login
$sql = $conexao_pdo->prepare("SELECT * FROM usuario WHERE nome = :nome AND senha = :senha");
$sql->bindparam(':nome', $nome);
$sql->bindparam(':senha', $senhamd5);
$sql->execute();

try
{

    if($sql->rowCount() > 0)
    {        
      $sql->fetch();  
      $_SESSION['nome'] = $nome;
      $_SESSION['senha'] = $senha;   
      echo "<script language='javascript' type='text/javascript'>window.location.href='index.php'</script>";
    }

    else
    {
      echo '<script>';
      echo '$(document).ready(function(){
      swal("Usuario ou senha incorretos!","", "warning") 
      });';
      echo'</script>';  
    }

} 
catch(PDOException $e)
{
  print "Erro: " . $e->getMessage();
}
?>