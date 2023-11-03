<?php
include('pdo.php');
    
   $id_evento = $_POST['id'];
   $nome = $_POST['nome'];
   $rg = $_POST['rg'];
   $cpf = $_POST['cpf'];
   $email = $_POST['email'];
   $telefone = $_POST['telefone'];   
   $orgao = $_POST['orgao'];
   $cargo = $_POST['cargo'];

   $sql = $conexao_pdo->prepare("INSERT INTO participantes (id, nome, rg, cpf, email, telefone, orgao, cargo) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
   $sql->execute(array( $id_evento, $nome, $rg, $cpf, $email, $telefone, $orgao, $cargo));
      
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