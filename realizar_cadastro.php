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
    $mensagem = "Cadastro Realizado com Sucesso!";
    echo "<script language='javascript'>";
    echo "alert('".$mensagem."');";
    echo "</script>";
    echo "<script language='javascript' type='text/javascript'>window.location.href='login.php'</script>";
} 
catch(PDOException $e)
{
  print "Erro: " . $e->getMessage();
}

?>