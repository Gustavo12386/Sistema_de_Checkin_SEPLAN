<?php
include('pdo.php');

if(!empty($_GET['deletar']))
{  
  $id = $_GET['deletar'];
     
  $deletar = $conexao_pdo->prepare("DELETE FROM evento WHERE id=?");  
  $deletar->execute(array($id));

  //verfica se o campo foi deletado
  if($deletar->rowCount() > 0)
  {
   echo "<script language='javascript' type='text/javascript'>window.location.href='eventos.php'</script>";     
  }
  else
  {
   echo '<script>';
   echo '$(document).ready(function(){
   swal("Ocorreu Um erro!","", "warning");        
   })';
   echo'</script>';
  } 
}

?>