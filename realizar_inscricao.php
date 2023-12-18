<?php  
  include('pdo.php');   
  
  if(isset($_POST['inscrever'])){
  $id_evento = $_POST['id'];
  $nome = $_POST['nome'];  
  $cpf = $_POST['cpf'];
  $email = $_POST['email'];
  $telefone = $_POST['telefone'];   
  $orgao = $_POST['orgao'];
  $cargo = $_POST['cargo'];
  
  try
  {
  $sql = $conexao_pdo->prepare("INSERT INTO participantes (id, nome, cpf, email, telefone, orgao, cargo) VALUES
  (:id, :nome, :cpf, :email, :telefone, :orgao, :cargo)");
  $sql->bindValue(':id', $id_evento);
  $sql->bindValue(':nome', $nome); 
  $sql->bindValue(':cpf', $cpf);
  $sql->bindValue(':email', $email);
  $sql->bindValue(':telefone', $telefone);
  $sql->bindValue(':orgao', $orgao);
  $sql->bindValue(':cargo', $cargo);
  $sql->execute();  
  header("Location: confirmacao.php?keypass=true");
  }  
  catch(PDOException $e)
  {
   print "Erro: " . $e->getMessage();
  } 
}
?>