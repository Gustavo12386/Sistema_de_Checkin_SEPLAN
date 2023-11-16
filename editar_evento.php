<?php
session_start();
include "pdo.php";
include "top2.php";

//se o usuário não estiver logado
if((isset($_SESSION['nome']) == false) and (isset($_SESSION['senha']) == false))
{
   unset($_SESSION['nome']);
   unset($_SESSION['senha']);
   echo "<script language='javascript' type='text/javascript'>window.location.href='login.php'</script>";
}
$logado = $_SESSION['nome'];
?>

<?php
 //listar eventos
 if(!empty($_GET['editar'])){

  $id = $_GET['editar']; 
  $sql = $conexao_pdo->prepare("SELECT * FROM evento WHERE id=:id");
  $sql->bindparam(':id', $id);
  $sql->execute();

  if($sql->rowCount() > 0)
  {
    while($row = $sql->fetch(PDO::FETCH_ASSOC))
    {
        $nome = $row['nome'];
        $data = $row['data'];
        $inicio = $row['inicio'];
        $fim = $row['fim'];
        $organizador = $row['organizador'];
        $obs = $row['obs'];
    }
  }
  
}   
?>
    <section class="u-clearfix u-image u-section-3" src="" id="sec-e0b0" data-image-width="5760" data-image-height="3840">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <div class="u-align-center u-container-style u-group u-opacity u-opacity-70 u-white u-group-1">
          <div class="u-container-layout u-container-layout-1">
            <h3 class="u-text u-text-1">Atualize seu evento</h3>
            <div class="u-form u-form-1">
              
            <form class="aviso" id="formDados" action="editar.php" method="POST" style="padding: 15px;"  enctype="multipart/form-data">
            
                <div class="u-form-group u-form-name u-label-top">
                  <label for="name-6715" class="u-label">Nome evento:</label>
                  <input type="text" placeholder="Digite o nome do evento" id="nome" name="nome" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" value="<?php echo $nome ?>">
                </div>
                <div class="u-form-group u-label-top u-form-group-2">
			        	 <label for="text-cce4" class="u-label">Data</label>
                  <input type="date" placeholder="Digite a Data" id="data" name="data" class="u-border-1 u-border-grey-30 u-input u-input-rectangle_half" value="<?php echo $data ?>">				
                  <div> <label for="text-cce4" class="u-label">Hora Início</label>
                  <input type="time" placeholder="Digite a Hora" id="inicio" name="inicio" class="u-border-1 u-border-grey-30 u-input u-input-rectangle_half u-white" value="<?php echo $inicio ?>">
                   <label for="text-cce4" class="u-label">Hora Fim</label>
                  <input type="time" placeholder="Digite a Hora" id="fim" name="fim" class="u-border-1 u-border-grey-30 u-input u-input-rectangle_half u-white" value="<?php echo $fim ?>">
					        </div>
                </div>
                <div class="u-form-email u-form-group u-label-top">
                  <label for="email-6715" class="u-label">Organizador</label>
                  <input type="text" id="organizador" name="organizador" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" value="<?php echo $organizador ?>">
                </div>                
                <div class="u-form-group u-form-message u-label-top">
                  <label for="message-6715" class="u-label">Observações</label>
                  <textarea  rows="4" cols="50" id="obs" name="obs" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white"><?php echo $obs ?></textarea>
                </div>    
                <br>            
                <div class="u-align-left u-form-group u-form-submit u-label-top">
                  <input type="hidden" name="id" value="<?php echo $id?>">                             
                  <input id="submit" type="submit" name="update" value="Atualizar" class="u-btn u-btn-submit u-button-style">  				              
                </div>      
         			</form>			
            </div>			
            
          </div>
        </div>
      </div>
    </section>
  
 
  
  
  
	
	    
    
