<?php
include('pdo.php');

if(!empty($_GET['deletar']))
{  
  $id = $_GET['deletar'];
  $sql = $conexao_pdo->prepare("SELECT * FROM evento WHERE id=?");
  $sql->execute(array($id));

  if($sql->rowCount() > 0)
  {
    while($row = $sql->fetch(PDO::FETCH_ASSOC))
    {        
      $data = $row['data'];   
      $inicio = $row['inicio'];
      $fim = $row['fim'];   
    }
  }
  //Só é permitido fazer a deletação em um determinado período
  $date_now = date("Y-m-d"); 
  date_default_timezone_set("America/Bahia");
  $hora = date("H:i:s"); 
  if($date_now == $data and $hora > $inicio and $hora < $fim)
  {                
    echo "<script language='javascript' type='text/javascript'>window.location.href='eventos.php'</script>";      
  }
  else if($date_now == $data and $hora > $fim)
  {
    echo "<script language='javascript' type='text/javascript'>window.location.href='eventos.php'</script>";  
  }
  else if($date_now > $data)
  {
    echo "<script language='javascript' type='text/javascript'>window.location.href='eventos.php'</script>";  
  }
  else
  {    
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
}
?>