<?php
include('pdo.php');
if(empty($_GET['keypass'])){
  echo "<script language='javascript' type='text/javascript'>window.location.href='index.php'</script>";
}
?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="pt-br">
<head>  
  <meta charset="utf-8" name="viewport">   
  <title>Inscrição</title>  
  <link rel="stylesheet" href="css/nicepage.css" media="screen"> 
  <link rel="stylesheet" href="css/responsivo.css?<?php echo rand(1, 1000);?>"> 
  <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
  <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">     
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="js/jquery-1.11.1.min.js"></script> 
  <script src="js/inscricao.js"></script> 
  <script src="js/mascara.js"></script>
  <script src="js/mascara_telefone.js"></script>
  <script src="js/validar.js"></script>  
</head>
<body>  

<div class="u-clearfix u-sheet u-sheet-1">
<br>  
<header class="u-clearfix u-header u-header" id="sec-a184">
        <a href="index.php" title="Home">
          <img src="images/logo-seplan-1.png" class="tamanho2">
        </a>         
	</header>       
    <section class="u-clearfix u-image u-section-3" src="" id="sec-e0b0" data-image-width="5760" data-image-height="3840">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <div class="u-align-center u-container-style u-group u-opacity u-opacity-70 u-white u-group-1">
          <div class="u-container-layout u-container-layout-1">  
          <br><br>                
           <?php
                //exibe informações do evento
                if(!empty($_GET['keypass']))
                {
                  $key = $_GET['keypass'];
                  $sql = $conexao_pdo->prepare("SELECT * FROM evento WHERE keypass=:keypass");
                  $sql->bindparam(':keypass', $key);
                  $sql->execute(); 

                  if($sql->rowCount() > 0)
                  {
                    while($dados = $sql->fetch(PDO::FETCH_ASSOC))
                    {
                      $nome = $dados['nome'];
                      $data = $dados['data'];
                      $inicio = $dados['inicio'];
                      $fim = $dados['fim']; 
                    ?>
                    <div class="div-texto">  
                      <h4 class="u-text u-text-1 texto-1">CHECKIN SEPLAN</h4>
                      <h4 class="u-text u-text-1 texto-2">CONFIRME AQUI A SUA PARTICIPAÇÃO</h4>
                      <h3 class="u-text u-text-1 u-text-palette-2-base texto-3"><?php echo $nome;?></h3>              
                      <h4 class="u-text u-text-1 texto-4">Data: <?php echo date('d/m/Y', strtotime($data));?></h4>
                      <h4 class="u-text u-text-1 texto-5">Horário: <?php                                          
                      echo date('H:i',  strtotime($inicio)); ?>
                      às <?php echo date('H:i', strtotime($fim));  ?></h4>
                      <br>
                    </div>  
                   <?php   
                    }
                  }                               
                }   
             ?>             
             <?php
              // Determina um periodo que o formulário de inscrição ficará disponível
              if(!empty($_GET['keypass']))
              {
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
                  $date_now = date("Y-m-d");
                  date_default_timezone_set("America/Bahia");
                  $hora = date("H:i:s");  
                  if($date_now == $data and $hora > $fim)
                  {
                   echo'<h4 class="u-text u-text-1 u-text-palette-2-base">Esse Evento já foi Realizado!</h4>';
                  } else if($date_now > $data)
                  {
                    echo'<h1 class="u-text u-text-1 u-text-palette-2-base">Esse Evento já foi Realizado!</h1>';   
                  } else { ?>         
          <div class="u-form u-form-1">         
          <form id="meuFormulario" class="form" action="realizar_inscricao.php" method="post" style="padding: 15px;" onsubmit="validarFormulario(event);">            
             <?php
              //exibe id da tabela evento para a conexão com a tabela paricipantes por meio da chave estrangeira
              if(!empty($_GET['keypass']))
              {
                $key = $_GET['keypass'];
                $sql = $conexao_pdo->prepare("SELECT * FROM evento WHERE keypass=:keypass");
                $sql->bindparam(':keypass', $key);
                $sql->execute();

                if($sql->rowCount() > 0)
                {
                  while($dados = $sql->fetch(PDO::FETCH_ASSOC))
                  {
                    echo "<input type='hidden' name='id' value='{$dados['id']}'>"; 
                    echo "<input type='hidden' name='nome_evento' value='{$dados['nome']}'>";                    
                  }  
              }
            }
            ?>                          
              <div class="u-form-group u-form-name u-label-top">
               <label for="name-6715" class="u-label">Nome:</label>
               <input type="text" placeholder="Digite seu nome" id="nome_participante" name="nome_participante" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required>
              </div>
              <br>             
              <div class="u-form-group u-form-name u-label-top">
               <label for="name-6715" class="u-label">CPF:</label>
               <input type="text" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" placeholder="Digite o CPF no formato 000.000.000-00"
                id="cpf" oninput="validarCPF(this.value)" name="cpf" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" maxlength="14">
                <span id="cpfStatus"></span>
              </div>
              <br>       
              <div class="u-form-group u-form-name u-label-top">
                <label for="name-6715" class="u-label">Email:</label>
                <input type="email" placeholder="Digite seu email" id="email" name="email" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required>
              </div>
              <br>
              <div class="u-form-group u-form-name u-label-top">
               <label for="name-6715" class="u-label">Telefone:</label>
               <input type="text" onkeyup="handlePhone(event)" placeholder="Digite apenas numeros" maxlength="15"
               id="telefone" name="telefone" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white">
               <br>              
               <label for="name-6715" class="u-label">Selecione seu Órgão:</label>
              </div>                           
              <div class="u-form-group u-form-name u-label-top">              
                    <select name="orgao" class="menu">                    
                    <?php
                    // exibe os orgãos para realizar a seleção do orgão
                      $stmt = $conexao_pdo->prepare("SELECT * FROM orgao");
                      $stmt->execute();
                      
                        if($stmt->rowCount() > 0)
                        {
                         while($dados = $stmt->fetch(PDO::FETCH_ASSOC))
                         {
                          echo "<option value='{$dados['nome_orgao']}'>{$dados['nome_orgao']}</option>";
                        }
                      }

                    ?>
                    </select>                    
             </div> 
             <br> 
             <div class="u-form-group u-form-name u-label-top">
               <label for="name-6715" class="u-label">Cargo:</label>
               <input type="text" placeholder="Digite seu cargo" id="cargo" name="cargo" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required>
              </div>
              <br>                              
             <div class="u-align-left u-form-group u-form-submit u-label-top">                          
               <input type="submit" value="Inscrever-se" name="inscrever" id="inscrever" class="u-btn u-btn-submit u-button-style">                  				     
             </div>
             </form>    
             <div class="inscricao"></div>                      
          </div>
        </div>
      </div>
    </section>  
   <?php
      }     
    } 
   ?>   
   <style>
    .tamanho2
    {
    width: 320px;
    margin-left: 29px;
    margin-top: 20px;
    }
    .texto-1
    {
      font-size: 35px;   
    }
    .texto-2
    {
      font-size: 35px;
    }
    .texto-3
    {
      font-size: 32px;
    }
    .texto-4
    {
      font-size: 29px;
    }
    .texto-5
    {
      font-size: 29px;
    }    
    .menu
    {
    width:200px;
    height:38px;  
    margin-left: 30px;
    margin-top: 9px;
    }  
    .u-border-1
    {     
      margin-top: 6px;
      width: 86%;
      margin-left: 30px;
    }
    .u-label
    {
      margin-left: 30px;
    }
    .ins
    {
      width: 900px !important;
      height: 400px !important;
    }
    #inscrever
    {
      margin-left: 30px;
    }
    #cpfStatus{
      margin-left: 30px;
      font-size: 12px;      
    }
   </style> 
 </body> 
</html>  
 
  
  
   