<?php 
session_start();
include "top3.php";

//se o usuário não estiver logado
if((isset($_SESSION['nome']) == false) and (isset($_SESSION['senha']) == false))
{
   unset($_SESSION['nome']);
   unset($_SESSION['senha']);
   echo "<script language='javascript' type='text/javascript'>window.location.href='login.php'</script>";
}
$logado = $_SESSION['nome'];
?>


<section class="u-clearfix u-image u-section-3" src="" id="sec-e0b0" data-image-width="5760" data-image-height="3840">
<div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
  <div class="u-align-center u-container-style u-group u-opacity u-opacity-70 u-white u-group-1">
    <div class="u-container-layout u-container-layout-1">
      <h3 class="u-text u-text-1">Participantes Presentes</h3>
      <br>
      <?php include "lista2.php"; ?>
      <br>
      <br>
                 
    </div>
      </div>
      </div>
    </section>
  