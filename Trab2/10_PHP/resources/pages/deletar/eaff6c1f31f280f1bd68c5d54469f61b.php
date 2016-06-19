<?php
$pdo = BancodeDados::conecta();
$snumber = $_GET['a'];

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'DELETE FROM '. $BDSchema .'TB_Maquina  WHERE snumber = ?';
$q = $pdo->prepare($sql);
$q->execute(array($snumber));
BancodeDados::desconecta();
$url = 'tabela.php?ntb='.$_GET['ntb'].'';
if (!headers_sent()) {
  header('Location: '.$url);
exit;
}else{
  echo '<script type="text/javascript">';
  echo 'window.location.href="'.$url.'";';
  echo '</script>';
  exit;
}
?>
