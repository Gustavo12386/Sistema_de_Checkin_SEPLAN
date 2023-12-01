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
   echo "<script language='javascript' type='text/javascript'>window.location.href='eventos.php'</script>";     
  }
} 
catch(PDOException $e)
{
  print "Erro: " . $e->getMessage();

} 
}
 
?>