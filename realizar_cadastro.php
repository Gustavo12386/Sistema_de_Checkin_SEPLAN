<?php
include('pdo.php');

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

//criptografa a senha
$senhamd5 = md5($senha);

//realiza cadastro
$sql = $conexao_pdo->prepare("INSERT INTO usuario (nome,email,senha) VALUES ( :nome, :email, :senha)");
$sql->bindParam(':nome', $nome);
$sql->bindParam(':email', $email);
$sql->bindParam(':senha', $senhamd5);
$sql->execute();

//verfica se os dados foram cadastrados
try
{
  echo '<script>';
  echo '$(document).ready(function(){
  swal("Cadastro Realizado com Sucesso!","", "success").then(function(value){
    if(value){        
    window.location = "login.php"
    }           
  });  
  });';
  echo'</script>';  
} 
catch(PDOException $e)
{
  print "Erro: " . $e->getMessage();
}

?>