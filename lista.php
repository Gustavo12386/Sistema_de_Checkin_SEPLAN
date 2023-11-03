<?php
include('pdo.php');		
$sql = "SELECT * FROM evento";
$result = $conexao_pdo->query($sql);
?>

<table class ='u-table' align='center' border ='1'>
        <thead style="background-color:#009999">
          <tr>
            <td>ID</td>
            <td>Nome</td>
            <td>Link</td>
            <td>Participantes</td>
            <td>Ações</td>
            <td>Editar</td>
            <td>Deletar</td>            
          </tr>
          <thead>
        <tbody>      
      <?php
      while($rows = $result->fetch(PDO::FETCH_ASSOC)) { ?>                                                                                                                                                                                                                                                        
       <tr>
           <td> <?=$rows['id'] ?></td>
           <td> <?=$rows['nome'] ?></td>
           <td><a href='inscricao.php?keypass=<?=$rows['keypass'] ?>'>Link Inscrição</a></td>
           <td><a href='lista_participantes.php?lista=<?=$rows['id'] ?>'>Visualizar</a></td>
           <td><a href='qrcode.php?key=<?=$rows['keypass'] ?>' target="_blank"><img src="images/qrimg.png"  width='32px'></a></td>
           <td><a href="editar_evento.php?editar=<?= $rows['id']?>"><img src="icons/1159633.png"  width='32px'>
           </a></td>
           <td><a class='btn btn-danger' href="deletar.php?deletar=<?= $rows['id']?>"><img src="icons/delete.png" width='25px'>
          </a></td>           
       </tr>
      <?php 
      }      
      ?>     

</table> <br><br><br>




