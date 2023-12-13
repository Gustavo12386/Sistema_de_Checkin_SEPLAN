<?php
include('pdo.php');

if(!empty($_GET['deletar']))
{  
  $id = $_GET['deletar'];
     
  $deletar = $conexao_pdo->prepare("DELETE FROM evento WHERE id=:id");  
  $deletar->bindparam(':id', $id);
  $deletar->execute();

  //verfica se o campo foi deletado
try
{
  if($deletar->rowCount() > 0)
  {   
    header("Location: eventos.php");    
  }
} 
catch(PDOException $e)
{
  print "Erro: " . $e->getMessage();

} 
}
 
?>