<?php
extract($_GET); // Transforma em variável
include_once('pdo.php');

//exit();
include 'composer/vendor/autoload.php';

use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use BaconQrCode\Renderer\Color\Rgb;
use BaconQrCode\Renderer\RendererStyle\Fill;

// Configurações
$tamanho = 450;
$margem  = 5;
//$cod = "apikey".md5($key);

$renderer = new ImageRenderer(
    new RendererStyle($tamanho),
    new SvgImageBackEnd()
);
$writer = new Writer($renderer);
//Exibe o QR code na tela
//echo ($writer->writeString('http://www.seplan.ba.gov.br'));
//$writer->writeFile('http://www.seplan.ba.gov.br', 'qrcode.png');

?>
    
<table align="center" border="0">
<tr>
<td align="center">
<div>
CHECKING SEPLAN
</div>
</td>
</tr>
<tr>
<td align="center">
CONFIRME AQUI A SUA PARTICIPAÇÃO
</td>
</tr>
<tr>
<td align="center">
<div>

<?php
  //Exibe nome do evento
  if(!empty($_GET['key'])){
  $keypass = $_GET['key'];  
  $sql = $conexao_pdo->prepare("SELECT * FROM evento WHERE keypass=:keypass");
  $sql->bindparam(':keypass', $keypass);
  $sql->execute(); 

  if($sql->rowCount() > 0){
   while($dados = $sql->fetch(PDO::FETCH_ASSOC)){
        echo "{$dados['nome']}";
      }  
    }
  }  
?>
                
</div>
</td>
</tr>
<tr>
<td align="center">
<br><br>
<?php echo ($writer->writeString('http://10.22.12.5/checking/inscricao.php?keypass='.$key));?>
</td>
</tr>
<tr>
<td align="center">
 <img src="images/logo-seplan-1.png" width="50%" /> 
</td>
</tr>
<tr>
<td align="center">
<br /> <br />
</td>
</tr>
<tr>
<td align="center">
 <input type="button" id="botao" value="Imprimir" onClick="window.print()">
</td>
</tr>
</table>
<style>
@media print{
 #botao { display:none; }
}  
#botao{  
  background-color: #232b79;
  border-width: 0px; 
  color: white;
  width: 100px;
  height: 35px;
  cursor: pointer;
}
#botao:hover{
  background-color: #20286E;
}
</style>
