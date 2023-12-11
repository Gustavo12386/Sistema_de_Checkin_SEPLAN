<?php include('pdo.php')?>
<table class ='u-table' align='center' border ='0' cellspacing="14" cellpadding="8">
        <thead style="background-color:#B5B5B5">
          <tr>
            <td class="d-print-none">ID_Evento</td>            
            <td>N°Inscrição</td>            
            <td>Nome</td>
            <td>RG</td>
            <td>CPF</td>
            <td>Email</td>
            <td>Telefone</td>            
            <td>Orgão</td> 
            <td>Cargo<td>                     
          </tr>
          <thead>
        <tbody>
<?php
// exibe informações dos participantes		
if(!empty($_GET['lista'])){
   $id = $_GET['lista'];
   $sql = $conexao_pdo->prepare("SELECT * FROM participantes WHERE id=:id");
   $sql->bindparam(':id', $id);
   $sql->execute();

    if($sql->rowCount() > 0){
      while($rows = $sql->fetch(PDO::FETCH_ASSOC)) { ?>       
       <tr>
       <td class="d-print-none"> <?=$rows['id'] ?></td>        
           <td> <?=$rows['id_participante'] ?></td>
           <td> <?=$rows['nome'] ?></td>
           <td> <?=$rows['rg'] ?></td>
           <td> <?=$rows['cpf'] ?></td>
           <td> <?=$rows['email'] ?></td>
           <td> <?=$rows['telefone'] ?></td>           
           <td> <?=$rows['orgao'] ?></td>   
           <td> <?=$rows['cargo'] ?></td>                        
       </tr>
      <?php 
     }
   } 
  }
  ?>      
  <tbody>

</table> <br><br><br>
	
<table align="center" border="0">
<tr>
<td align="center" bordercolor="#000000">
 <input type="button" id="botao2" value="Imprimir" onClick="window.print()">
 <input type="button" id="botao2" value="Voltar" onClick="window.location.href='eventos.php'">
</td>
</tr>
</table>
<style>
@media print
{
 #botao2
 {
  display:none;
 }   
@page
{
  size: landscape;
}
}
#botao2
{  
  background-color: #232b79;
  border-width: 0px; 
  color: white;
  width: 110px;
  height: 40px;
  font-size: 14px;
  cursor: pointer;
  margin: 0 18px;
}
#botao2:hover
{
  background-color: #20286E;
}
.tamanho
{
  width: 300px;
} 
</style>