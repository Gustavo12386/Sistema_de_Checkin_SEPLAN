<?php include('pdo.php')?>
<table class ='u-table' align='center' border ='0' cellspacing="10" cellpadding="6">
        <thead style="background-color:#009999">
          <tr>            
            <td>ID_Participante</td>            
            <td>Nome</td>
            <td>Email</td>
            <td>Telefone</td>
            <td>Keypass</td>
            <td>Orgão</td>                      
          </tr>
          <thead>
        <tbody>
<?php
// exibe informações dos participantes		
if(!empty($_GET['lista'])){
   $id = $_GET['lista'];
   $sql = $conexao_pdo->prepare("SELECT * FROM participantes WHERE id=?");
   $sql->execute(array($id));

    if($sql->rowCount() > 0){
      while($rows = $sql->fetch(PDO::FETCH_ASSOC)) { ?>       
       <tr>           
           <td> <?=$rows['id_participante'] ?></td>
           <td> <?=$rows['nome'] ?></td>
           <td> <?=$rows['email'] ?></td>
           <td> <?=$rows['telefone'] ?></td>
           <td> <?=$rows['keypass'] ?></td>
           <td> <?=$rows['orgao'] ?></td>                           
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
 <input type="button" class="botao2" value="Imprimir" onClick="window.print()">
</td>
</tr>
</table>
<style>
.botao2{  
  background-color: #232b79;
  border-width: 0px; 
  color: white;
  width: 110px;
  height: 40px;
  font-size: 14px;
  cursor: pointer;
}
.botao2:hover{
  background-color: #20286E;
}
</style>