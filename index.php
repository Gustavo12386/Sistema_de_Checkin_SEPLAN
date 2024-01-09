<?php
ob_start();
//todas as páginas que quiser um lifetime para a sessão
ini_set('session.gc_maxlifetime', 900); 
session_start();
include ('topo.php');
if (isset($_SESSION['activity']) && (time() - $_SESSION['activity'] > 900)) {
  // Se o usuário ficou inativo por mais de 30 minutos, destrua a sessão
  session_destroy();  
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
            <h3 class="u-text u-text-1">Cadastre aqui seu Evento/Reunião</h3>
            <div class="u-form u-form-1">
              
            <form class="enviar" action="insere.php" method="post" style="padding: 15px;"  enctype="multipart/form-data">
               <div class="u-form-group u-form-name u-label-top">
                  <label for="name-6715" class="u-label">Nome evento:</label>
                  <input type="text" placeholder="Digite o nome do evento" id="nome" name="nome" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required>
                </div>
                <div class="u-form-group u-label-top u-form-group-2">
			        	 <label for="text-cce4" class="u-label">Data:</label>
                  <input type="date" placeholder="Digite a Data" id="data" name="data" oninput="limitarCaracteresData(this, 10)" class="u-border-1 u-border-grey-30 u-input u-input-rectangle_half" required>				
                  <div> <label for="text-cce4" class="u-label">Hora Início:</label>
                  <input type="time" placeholder="Digite a Hora" id="inicio" name="inicio" class="u-border-1 u-border-grey-30 u-input u-input-rectangle_half u-white">
                   <label for="text-cce4" class="u-label">Hora Fim:</label>
                   <input type="time" placeholder="Digite a Hora" id="fim" name="fim" class="u-border-1 u-border-grey-30 u-input u-input-rectangle_half u-white" required>
					        </div>
                </div>
                <div class="u-form-email u-form-group u-label-top">
                  <label for="email-6715" class="u-label">Organizador:</label>
                  <input type="text" id="organizador" name="organizador" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required>
                </div>                
                <div class="u-form-group u-form-message u-label-top">
                  <label for="message-6715" class="u-label">Observações:</label>
                  <textarea  rows="4" cols="50" maxlength="220" id="obs" name="obs" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white"></textarea>
                  <label>Caracteres Restantes: <span class="carac">220</span></label> 
                </div>
                <br>
                <div class="u-align-left u-form-group u-form-submit u-label-top">                               
                  <input id="submitb" type="submit" value="Enviar" class="u-btn u-btn-submit u-button-style">                 
  				        <input type='reset' value='Limpar' class="u-btn u-btn-submit u-button-style"/>          
                </div>      
         			</form>		
            </div>
            <div id="result" class="u-form-send-message u-form-send-success"></div>			
          </div>
        </div>
      </div>
    </section>
 
  
 
  
  
  
	
	    
    
