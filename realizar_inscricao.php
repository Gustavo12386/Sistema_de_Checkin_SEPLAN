<?php  
  include('pdo.php');   
  
  $id_evento = $_POST['id'];
  $nome = $_POST['nome'];
  $rg = $_POST['rg'];
  $cpf = $_POST['cpf'];
  $email = $_POST['email'];
  $telefone = $_POST['telefone'];   
  $orgao = $_POST['orgao'];
  $cargo = $_POST['cargo'];

  $sql = $conexao_pdo->prepare("INSERT INTO participantes (id, nome, rg, cpf, email, telefone, orgao, cargo) VALUES
  (:id, :nome, :rg, :cpf, :email, :telefone, :orgao, :cargo)");
  $sql->bindparam(':id', $id_evento);
  $sql->bindparam(':nome', $nome);
  $sql->bindparam(':rg', $rg);
  $sql->bindparam(':cpf', $cpf);
  $sql->bindparam(':email', $email);
  $sql->bindparam(':telefone', $telefone);
  $sql->bindparam(':orgao', $orgao);
  $sql->bindparam(':cargo', $cargo);
  $sql->execute();
         
  //verfica se a inscrição foi realizada
  try
  {    
   header("Location: confirmacao.php");     
  }  
  catch(PDOException $e)
  {
   print "Erro: " . $e->getMessage();
  } 

?>