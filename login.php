<!DOCTYPE html>
<html style="font-size: 16px;" lang="pt-br">
<head>  
  <meta charset="utf-8">   
  <title>Login</title>
  <link rel="stylesheet" href="css/nicepage.css" media="screen">
  <script src="js/jquery-1.11.1.min.js"></script>
  <script src="js/scripts.js"></script>
  <script src="js/sweet.js"></script>
  <script src="js/nicepage.js"></script>	 
  <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
  <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">     
</head>

  <header class="u-clearfix u-header u-header" id="sec-a184"><div class="u-clearfix u-sheet u-sheet-1">
        <a href="#" class="u-image u-logo u-image-1" data-image-width="275" data-image-height="37" title="Home">
          <img src="images/logo-seplan-1.png" class="u-logo-image u-logo-image-1">
        </a>         
	</header> 

    <section class="u-clearfix u-image u-section-3" src="" id="sec-e0b0" data-image-width="5760" data-image-height="3840">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <div class="u-align-center u-container-style u-group u-opacity u-opacity-70 u-white u-group-1">
          <div class="u-container-layout u-container-layout-1">                 
            <div class="u-form u-form-1">          
              <form action="realizar_login.php" method="post" style="padding: 15px;"  enctype="multipart/form-data">
              <h4 class="u-text u-text-1">Fazer Login</h4>                             
                  <div class="u-form-group u-form-name u-label-top">                   
                    <label for="name-6715" class="u-label">Nome do Usuário:</label>
                    <input type="text" placeholder="Digite o nome do usuário" id="nome" name="nome" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
                  </div>
                  <br><br>                
                  <div class="u-form-group u-form-name u-label-top">
                    <label for="name-6715" class="u-label">Senha:</label>
                    <input type="password" placeholder="Digite uma senha" id="senha" name="senha" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
                  </div>
                  <br><br>                               
                  <div class="u-align-left u-form-group u-form-submit u-label-top">                 
                    <input id="submitb" type="submit" value="Acessar" name="acesso" class="u-btn u-btn-submit u-button-style">  				     
                  </div>               
             </form>	  		
            </div>			
          </div>
        </div>
      </div>
    </section>

<style>
  .u-text-1{
    font-size: 30px;
    margin-top: 100px;  
    bottom: 30px;
    text-align: center; 
  }
  .u-container-layout{    
    top: 10px;
    right: 60px;    
  } 
  .u-label{
    margin-left: 146px;  
  }
  .u-input{
    width: 78%;
    margin-left: 146px;
    margin-top: 10px;
  }
  #submitb{
    margin-left: 146px;
  }
  .u-header .u-image-1{
    margin: 22px auto 0 0;
    margin-left: 95px;
  }
</style>  
</html>  
 
  
  
   