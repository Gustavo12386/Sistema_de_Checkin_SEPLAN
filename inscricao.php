<?php
include('pdo.php');
?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="pt-br">
<head>  
  <meta charset="utf-8" name="viewport">   
  <title>Inscrição</title>  
  <link rel="stylesheet" href="css/nicepage.css" media="screen"> 
  <link rel="stylesheet" href="css/responsivo.css"> 
  <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
  <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">     
</head>
<body>  
<div class="u-clearfix u-sheet u-sheet-1">
<header class="u-clearfix u-header u-header" id="sec-a184">
        <a href="index.php" title="Home">
          <img src="images/logo-seplan-1.png" class="tamanho2">
        </a>         
	</header>       
    <section class="u-clearfix u-image u-section-3" src="" id="sec-e0b0" data-image-width="5760" data-image-height="3840">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <div class="u-align-center u-container-style u-group u-opacity u-opacity-70 u-white u-group-1">
          <div class="u-container-layout u-container-layout-1">
          <?php
              // Determina um periodo que o formulário de inscrição ficará disponível
              if(!empty($_GET['keypass'])){
                $key = $_GET['keypass'];
                $sql = $conexao_pdo->prepare("SELECT * FROM evento WHERE keypass=:keypass");
                $sql->bindparam(':keypass', $key);
                $sql->execute(); 

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
           <br><br>           
           <?php
                //exibe informações do evento
                if(!empty($_GET['keypass'])){
                  $key = $_GET['keypass'];
                  $sql = $conexao_pdo->prepare("SELECT * FROM evento WHERE keypass=:keypass");
                  $sql->bindparam(':keypass', $key);
                  $sql->execute(); 

                  if($sql->rowCount() > 0){
                    while($dados = $sql->fetch(PDO::FETCH_ASSOC)){
                      $nome = $dados['nome'];
                      $data = $dados['data'];
                      $inicio = $dados['inicio'];
                      $fim = $dados['fim']; 
                    ?>
                    <div class="div-texto">  
                      <h3 class="u-text u-text-1">Página de Inscrição</h3>
                      <h3 class="u-text u-text-1"><?php echo $nome;?></h3>              
                      <h4 class="u-text u-text-1">Data: <?php echo $data;?></h4>
                      <h4 class="u-text u-text-1">Horário: <?php echo $inicio;?> às <?php echo $fim; ?></h4>
                      <br><br>
                    </div>  
                   <?php   
                    }
                  }                               
                }   
             ?>
           <div class="u-fonte">  
            <h3 class='fonte'>Preencha seus dados</h3>
           </div> 
           <br>
          <div class="u-form u-form-1">
                              
          <form action="realizar_inscricao.php" method="post" style="padding: 15px;"  enctype="multipart/form-data">            
             <?php
              //exibe id da tabela evento para a conexão com a tabela evento por meio da chave estrangeira
              if(!empty($_GET['keypass'])){
                $key = $_GET['keypass'];
                $sql = $conexao_pdo->prepare("SELECT * FROM evento WHERE keypass=:keypass");
                $sql->bindparam(':keypass', $key);
                $sql->execute();

                if($sql->rowCount() > 0){
                  while($dados = $sql->fetch(PDO::FETCH_ASSOC)){
                    echo "<input type='hidden' name='id' value='{$dados['id']}'>";                    
                  }  
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
               <input type="text" placeholder="Digite seu telefone" id="telefone" name="telefone" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white">
               <br>              
               <label for="name-6715" class="u-label">Selecione seu Órgão:</label>
              </div>
              <br>                
              <div class="u-form-group u-form-name u-label-top">              
                    <select name="orgao" class="menu">                    
                    <?php
                    // exibe os orgãos para realizar a seleção do orgão
                      $stmt = $conexao_pdo->prepare("SELECT * FROM orgao");
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
               <input type="submit" value="Inscrever-se" name="inscrever" id="inscrever" class="u-btn u-btn-submit u-button-style">                  				     
             </div>
             </form>
             
          </div>
        </div>
      </div>
    </section>
   <style>
    .tamanho2{
    width: 320px;
    margin: 11px;
    margin-top:20px;
    }
    .u-text-1{
      font-size: 30px;   
    }
    .fonte{
    font-size: 35px;  
    }
    .menu{
    width:200px;
    height:38px;  
    }  
   </style> 
 </body>  
</html>  
 
  
  
   