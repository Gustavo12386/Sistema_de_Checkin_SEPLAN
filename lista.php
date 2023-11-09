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
            <td>Participantes</td>
            <td>Link</td>
            <td>Ações</td>
            <td>Editar</td>
            <td>Deletar</td>            
          </tr>
          <thead>
        <tbody>      
      <?php
      $date_now = date("Y-m-d");
      date_default_timezone_set("America/Bahia");
      $hora = date("H:i:s");      
      while($rows = $result->fetch(PDO::FETCH_ASSOC)) { 
          $data = $rows['data'];
          $inicio = $rows['inicio'];
          $fim = $rows['fim'];  
      ?>                                                                                                                                                                                                                                                        
       <tr>
           <td> <?=$rows['id'] ?></td>
           <td> <?=$rows['nome'] ?></td>
           <td><a href='lista_participantes.php?lista=<?=$rows['id'] ?>'>Visualizar</a></td>
           <td><a href='inscricao.php?keypass=<?=$rows['keypass'] ?>'>Link Inscrição</a></td>           
        <?php
        if($date_now == $data and $hora > $inicio and $hora < $fim) {
        ?>   
        <td><a class='btn btn-secondary' href='#' ><img src="images/qrimg.png"  width='25px'></a></td>
         <td><a class='btn btn-secondary' href="#"><img src="icons/1159633.png"  width='25px'>
         </a></td>
         <td><a class='btn btn-secondary' href="#"><img src="icons/delete.png" width='25px'>
         </a></td>
         </tr> 
       <?php 
        } else if($date_now == $data and $hora > $fim) {      
       ?>           
       <td><a class='btn btn-secondary' href='#'><img src="images/qrimg.png"  width='25px'></a></td>
        <td><a class='btn btn-secondary' href="#"><img src="icons/1159633.png"  width='25px'>
        </a></td>
        <td><a class='btn btn-secondary' href="#"><img src="icons/delete.png" width='25px'>
        </a></td>                           
      </tr>
      <?php 
       } else if($date_now > $data) {     
      ?> 
        <td><a class='btn btn-secondary' href='#'><img src="images/qrimg.png"  width='25px'></a></td>
        <td><a class='btn btn-secondary' href="#"><img src="icons/1159633.png"  width='25px'>
        </a></td>
        <td><a class='btn btn-secondary' href="#"><img src="icons/delete.png" width='25px'>
        </a></td>                           
      </tr>
      <?php
       } else {   
      ?> 
      <td><a href='qrcode.php?key=<?=$rows['keypass'] ?>' target="_blank"><img src="images/qrimg.png"  width='32px'></a></td>
        <td><a class='btn btn-primary' href="editar_evento.php?editar=<?= $rows['id']?>"><img src="icons/1159633.png"  width='25px'>
        </a></td>
        <td><a class='btn btn-danger' href="deletar.php?deletar=<?= $rows['id']?>" onclick="return confirm('Deseja deletar o evento?')"><img src="icons/delete.png" width='25px'>
        </a></td>                           
      </tr>
      <?php
        }
       }          
      ?>     

</table> <br><br><br>




