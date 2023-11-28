<?php 
session_start();
include ('topo3.php');
include ('pdo.php');
//se o usuário não estiver logado
if((isset($_SESSION['nome']) == false) and (isset($_SESSION['senha']) == false))
{
   unset($_SESSION['nome']);
   unset($_SESSION['senha']);
   echo "<script language='javascript' type='text/javascript'>window.location.href='login.php'</script>";
}
//se o usuário estiver logado
$logado = $_SESSION['nome'];
?>


<section class="u-clearfix u-image u-section-3" src="" id="sec-e0b0" data-image-width="5760" data-image-height="3840">
<div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
  <div class="u-align-center u-container-style u-group u-opacity u-opacity-70 u-white u-group-1">
    <div class="u-container-layout u-container-layout-1">      
      <?php
                //exibe informações do evento
                if(!empty($_GET['lista'])){
                  $id = $_GET['lista'];
                  $sql = $conexao_pdo->prepare("SELECT * FROM evento WHERE id=:id");
                  $sql->bindparam(':id', $id);
                  $sql->execute();

                  if($sql->rowCount() > 0){
                    while($dados = $sql->fetch(PDO::FETCH_ASSOC)){                       
                      echo "<h3 class='u-text u-text-1'>{$dados['nome']}</h3>"; 
                      echo "<br>";                 
                      echo "<h4 class='u-text u-text-1'>Data: {$dados['data']}</h4>";                      
                      echo "<br>";
                    }
                  }
                               
                }   
      ?>
      <h3 class="u-text u-text-1">Participantes Presentes</h3> 
      <br>
      <?php include "lista2.php"; ?>
      <br>
      <br>
                 
    </div>
      </div>
      </div>
    </section>
  