<?php
include_once('pdo.php');
?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="pt-br">
<head>  
  <meta charset="utf-8">   
  <title>Inscrição</title>  
  <link rel="stylesheet" href="css/nicepage.css" media="screen"> 
  <script src="js/jquery-1.11.1.min.js"></script>
  <script src="js/sweet.js"></script>
  <script src="js/scripts2.js"></script>  
  <script src="js/nicepage.js"></script>    
  <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
  <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">     
</head>
<body>  
  <header class="u-clearfix u-header u-header" id="sec-a184"><div class="u-clearfix u-sheet u-sheet-1">
        <a href="index.php" class="u-image u-logo u-image-1" data-image-width="275" data-image-height="37" title="Home">
          <img src="images/logo-seplan-1.png" class="u-logo-image u-logo-image-1">
        </a>         
	</header>       
    <section class="u-clearfix u-image u-section-3" src="" id="sec-e0b0" data-image-width="5760" data-image-height="3840">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <div class="u-align-center u-container-style u-group u-opacity u-opacity-70 u-white u-group-1">
          <div class="u-container-layout u-container-layout-1">
          <?php
              // Determinar um periodo que o formulário de inscrição ficará aberto
              if(!empty($_GET['keypass'])){
                $key = $_GET['keypass'];
                $sql = $conexao_pdo->prepare("SELECT * FROM evento WHERE keypass=?");
                $sql->execute(array($key)); 

                  if($sql->rowCount() > 0)
                  {
                  while($dados = $sql->fetch(PDO::FETCH_ASSOC))
                    { 
                    $data = $dados['data'];
                    $inicio = $dados['inicio'];
                    $fim = $dados['fim'];                               
                    }
                  }
                }  
                $date_now = date("Y-m-d");
                date_default_timezone_set("America/Bahia");
                $hora = date("H:i:s");  
                if($date_now == $data and $hora > $fim)
                {
                echo "<script language='javascript' type='text/javascript'>window.location.href='mensagem.php'</script>";  
                } else if($date_now > $data)
                {
                echo "<script language='javascript' type='text/javascript'>window.location.href='mensagem.php'</script>";
                }
              ?>          
           <?php
                //exibe informações do evento
                 $sql = $conexao_pdo->prepare("SELECT nome, data, inicio, fim FROM evento ORDER BY id DESC LIMIT 1;");
                 $sql->execute(); 

                  if($sql->rowCount() > 0){
                    while($dados = $sql->fetch(PDO::FETCH_ASSOC)){
                      echo "<h3 class='u-text u-text-1'>Página de Inscrição</h3>"; 
                      echo "<h3 class='u-text u-text-1'>{$dados['nome']}</h3>";                  
                      echo "<h4 class='u-text u-text-1'>Data: {$dados['data']}</h4>";
                      echo "<h4 class='u-text u-text-1'>Horário: {$dados['inicio']} às {$dados['fim']}</h4>";
                      echo "<br><br>";
                    }  
                }
            ?> 
            <h3 class="u-text u-text-1">Preencha seus dados</h3>
            <div class="u-form u-form-1">
            <input type='hidden' name='data' value="<?php echo $data ?>">
            <input type='hidden' name='inicio' value="<?php echo $inicio ?>">
            <input type='hidden' name='fim' value="<?php echo $fim ?>">     
          <form class="form" action="realizar_inscricao.php" method="post" style="padding: 15px;"  enctype="multipart/form-data">            
             <?php
              //exibe id da tabela evento para a conexão da chave estrangeira
              $sql = $conexao_pdo->prepare("SELECT id FROM evento ORDER BY id DESC LIMIT 1");
              $sql->execute(); 
              if($sql->rowCount() > 0){
               while($dados = $sql->fetch(PDO::FETCH_ASSOC)){
                 echo "<input type='hidden' name='id' value='{$dados['id']}'>";                    
               }  
              }
             ?>                          
              <div class="u-form-group u-form-name u-label-top">
               <label for="name-6715" class="u-label">Nome:</label>
               <input type="text" placeholder="Digite seu nome" id="nome" name="nome" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white">
              </div>
              <br><br>  
              <div class="u-form-group u-form-name u-label-top">
               <label for="name-6715" class="u-label">RG:</label>
               <input type="text" placeholder="Digite seu rg" id="rg" name="rg" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white">
              </div>
              <br><br> 
              <div class="u-form-group u-form-name u-label-top">
               <label for="name-6715" class="u-label">CPF:</label>
               <input type="text" placeholder="Digite seu cpf" id="cpf" name="cpf" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white">
              </div>
              <br><br>             
              <div class="u-form-group u-form-name u-label-top">
                <label for="name-6715" class="u-label">Email:</label>
                <input type="text" placeholder="Digite seu email" id="email" name="email" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white">
              </div>
              <br><br>
              <div class="u-form-group u-form-name u-label-top">
               <label for="name-6715" class="u-label">Telefone:</label>
               <input type="text" placeholder="Digite seu Telefone" id="telefone" name="telefone" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white">
               <br>              
               <label for="name-6715" class="u-label">Selecione seu Órgão:</label>
              </div>
              <br>                
              <div class="u-form-group u-form-name u-label-top">              
                    <select name="orgao" style="width:200px; height:30px;">                    
                    <?php
                    // exibe os orgãos para realizar a seleção do orgão
                      $stmt = $conexao_pdo->prepare("SELECT nome_orgao FROM orgao");
                      $stmt->execute();
                      
                        if($stmt->rowCount() > 0){
                          while($dados = $stmt->fetch(PDO::FETCH_ASSOC)){
                            echo "<option value='{$dados['nome_orgao']}'>{$dados['nome_orgao']}</option>";
                          }
                      }

                    ?>
                    </select>                    
             </div> 
             <br><br> 
             <div class="u-form-group u-form-name u-label-top">
               <label for="name-6715" class="u-label">Cargo:</label>
               <input type="text" placeholder="Digite seu cargo" id="cargo" name="cargo" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white">
              </div>
              <br><br>                              
             <div class="u-align-left u-form-group u-form-submit u-label-top">                          
               <input type="submit" value="Registrar-se" name="inscrever" id="inscrever" class="u-btn u-btn-submit u-button-style">                  				     
             </div>
             </form>
             <div class="mostrar"></div>	  		
            </div>			
          </div>
        </div>
      </div>
    </section>
 </body>  
</html>  
 
  
  
   