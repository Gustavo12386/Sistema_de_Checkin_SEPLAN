<?php 
ob_start();
//todas as páginas que quiser um lifetime para a sessão
ini_set('session.gc_maxlifetime', 1800); 
session_start();
include ('topo.php');
if (isset($_SESSION['activity']) && (time() - $_SESSION['activity'] > 1800)) {
  // Se o usuário ficou inativo por mais de 30 minutos, destrua a sessão
  header("Location:login.php?motivo=inatividade");
}
$_SESSION['activity'] = time();
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
      <h3 class="u-text u-text-1">Listagem dos Eventos Ativos</h3>
      <br>
      <?php include "lista.php"; ?>

      <br>
      <br>
                 
    </div>
      </div>
      </div>
    </section>
  
    
 	    
