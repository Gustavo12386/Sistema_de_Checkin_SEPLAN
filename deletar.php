<?php
include('pdo.php');

if(empty($_GET['deletar']))
{
  echo "<script language='javascript' type='text/javascript'>window.location.href='eventos.php'</script>";  
}
else
{ 
$id = $_GET['deletar'];  
try
{
  $deletar = $conexao_pdo->prepare("DELETE FROM evento WHERE id=:id");  
  $deletar->bindparam(':id', $id);
  $deletar->execute();

  //verfica se o campo foi deletado
  if($deletar->rowCount() > 0)
  {   
    header("Location: eventos.php");    
  }
} 
catch(PDOException)
{
  print "<div class='container'>";
  print "<h2 class='mensagem'>Não foi possível deletar o evento, 
  para deletar o evento é preciso que não tenha inscrições relacionadas ao evento.</h2>";
  print '<a href="eventos.php"><button id="botao">Voltar</button></a>';
  print '</div>';
} 
} 
?>
<style>
.container{
  margin-top: 100px;
  margin-left: 120px; 
  display: grid;
}  
.mensagem
{ 
  font-weight: normal;
}  
#botao
{
  background-color: #232b79;
  border-width: 0px; 
  color: white;
  width: 100px;
  height: 35px;
  cursor: pointer; 
  font-size: 16px;
  margin-left: 469px;
  margin-top: 20px;
}
#botao:hover
{
  background-color: #20286E;
}
</style>