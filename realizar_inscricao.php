<?php
include('pdo.php');
    
   $id_evento = $_POST['id'];
   $nome = $_POST['nome'];
   $email = $_POST['email'];
   $telefone = $_POST['telefone'];
   $keypass = $_POST['keypass'];
   $orgao = $_POST['orgao'];
   
   $sql = $conexao_pdo->prepare("INSERT INTO participantes (id, nome, email, telefone, keypass, orgao) VALUES (?, ?, ?, ?, ?, ?)");
   $sql->execute(array( $id_evento, $nome, $email, $telefone, $keypass, $orgao));
      
   //verfica se a inscrição foi realizada
   if($sql->rowCount() > 0)
   {
    echo '<script>';
    echo '$(document).ready(function(){
    swal("Inscricao Realizada com Sucesso!","", "success");        
    })';
    echo'</script>';        
   } else
   {
    echo '<script>';
    echo '$(document).ready(function(){
    swal("Ocorreu Um erro!","", "warning");        
    })';
    echo'</script>';
   }

                      
      
     



  
   
?>