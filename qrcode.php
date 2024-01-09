<?php
ob_start();
ini_set('session.gc_maxlifetime', 900); 
session_start();
extract($_GET); // Transforma em variável
include('topo4.php');
include('pdo.php');

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

$renderer = new ImageRenderer(
    new RendererStyle($tamanho),
    new SvgImageBackEnd()
);
$writer = new Writer($renderer);
if (isset($_SESSION['activity']) && (time() - $_SESSION['activity'] > 900)) {
  // Se o usuário ficou inativo por mais de 30 minutos, destrua a sessão
  header("Location:login.php?motivo=inatividade");
}
$_SESSION['activity'] = time();
//se o usuário não estiver logado
if((isset($_SESSION['nome']) == false) and (isset($_SESSION['senha']) == false))
{
   unset($_SESSION['nome']);
   unset($_SESSION['senha']);
   echo "<script language='javascript' type='text/javascript'>window.location.href='login.php'</script>";
}
$logado = $_SESSION['nome'];
?>

<table align="center" border="0">
<tr>
<td align="center">
<div>
<h5 class="u-text u-text-1 texto-1">CHECKIN SEPLAN</h5>
</div>
</td>
</tr>
<tr>
<td align="center">
<h5 class="u-text u-text-1 texto-2">CONFIRME AQUI A SUA PARTICIPAÇÃO</h5>
</td>
</tr>
<tr>
<td align="center">
<div>

<?php
  if(empty($_GET['key'])){
    echo "<script language='javascript' type='text/javascript'>window.location.href='index.php'</script>";
  }
  //Exibe nome do evento
  if(!empty($_GET['key'])){
    $keypass = $_GET['key'];  
    $sql = $conexao_pdo->prepare("SELECT * FROM evento WHERE keypass=:keypass");
    $sql->bindparam(':keypass', $keypass);
    $sql->execute(); 

    if($sql->rowCount() > 0){
    while($dados = $sql->fetch(PDO::FETCH_ASSOC)){
      $nome = $dados['nome'];        
      $inicio = $dados['inicio'];
    ?>  
     <h5 class='u-text u-text-1 texto-3 u-text-palette-2-base'><?php echo $nome; ?></h5><br>
     <h5 class='u-text u-text-1 texto-4'>Horário de início: <?php echo date('H:i', strtotime($inicio)); ?></h5>
    <?php  
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
<?php echo ($writer->writeString('http://10.22.12.5:8080/checking/inscricao.php?keypass='.$key));?>
</td>
</tr>
<tr>
<td align="center">
 <img class="logo" src="images/logo-seplan-1.png" width="50%" /> 
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

