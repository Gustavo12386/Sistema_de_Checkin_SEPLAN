<?php 
ob_start();
//todas as páginas que quiser um lifetime para a sessão
ini_set('session.gc_maxlifetime', 1800); 
session_start();
include ('topo3.php');
include ('pdo.php');
if (isset($_SESSION['activity']) && (time() - $_SESSION['activity'] > 1800)) {
  // Se o usuário ficou inativo por mais de 30 minutos, destrua a sessão
  header("Location:login.php?motivo=inatividade");
}
$_SESSION['activity'] = time();

if(isset($_SESSION['nome']) and isset($_SESSION['senha'])){
  session_regenerate_id();  
}
//se o usuário não estiver logado
if((isset($_SESSION['nome']) == false) and (isset($_SESSION['senha']) == false))
{
  unset($_SESSION['nome']);
  unset($_SESSION['senha']);
  echo "<script language='javascript' type='text/javascript'>window.location.href='login.php'</script>";
}
//se o usuário estiver logado
$logado = $_SESSION['nome'];
// verifica se o get está vazio
if(empty($_GET['lista'])){
  echo "<script language='javascript' type='text/javascript'>window.location.href='index.php'</script>";
}
?>


<section class="u-clearfix u-image u-section-3" src="" id="sec-e0b0" data-image-width="5760" data-image-height="3840">
<div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
  <div class="u-align-center u-container-style u-group u-opacity u-opacity-70 u-white u-group-1">
    <div class="u-container-layout u-container-layout-1">      
      <?php
        //exibe informações do evento
        if(!empty($_GET['lista']))
        {
          $id = $_GET['lista'];
          $sql = $conexao_pdo->prepare("SELECT * FROM evento WHERE id=:id");
          $sql->bindparam(':id', $id);
          $sql->execute();
          if($sql->rowCount() > 0){
           while($dados = $sql->fetch(PDO::FETCH_ASSOC)){
                $nome = $dados['nome'];
                $data = $dados['data'];
                $inicio = $dados['inicio'];
                $fim = $dados['fim']; 
              ?>
              <h3 class='u-text u-text-1'><?php echo $nome;?></h3>
              <br>                 
              <h4 class='u-text u-text-1'>Data: <?php echo date('d/m/Y', strtotime($data));?></h4>                      
              <br>
              <?php             
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
  