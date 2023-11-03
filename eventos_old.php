<?php 

include "top.php"; 
include "classes/evento.class.php"; 
$objE = new evento();
$objE->listar();

?>


<section class="u-clearfix u-image u-section-3" src="" id="sec-e0b0" data-image-width="5760" data-image-height="3840">
<div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
  <div class="u-align-center u-container-style u-group u-opacity u-opacity-70 u-white u-group-1">
    <div class="u-container-layout u-container-layout-1">
      <h3 class="u-text u-text-1">Listagem dos Eventos</h3>
      
      <table class ='u-table' align='center' border ='1'>
        <thead>
          <tr>
          <td>ID</td><td>Nome</td><td>Ações</td>
          </tr>
          <thead>
        <tbody>
      
      <?php
      while($row = $objE->res->fetch(PDO::FETCH_ASSOC)) { ?>
       
       <tr>
           <td> <?=$row['id'] ?> </td> <td> <?=$row['nome'] ?> </td> <td><a href='qrcode.php?key=<?=md5($row['id']); ?>' target="_blank"><img src="images/qrimg.png"  width='32px'></a></td>
       </tr>
      <?php } ?>
      
      <tbody></table> <br><br><br>
                 
    </div>
      </div>
      </div>
    </section>
  
    
 	    
<?php include "rodape.php"; ?>