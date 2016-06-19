<?php
$pdo = BancodeDados::conecta();
$tin = $_GET['a'];

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'DELETE FROM '. $BDSchema .'TB_Franquia  WHERE tin = ?';
$q = $pdo->prepare($sql);
$q->execute(array($tin));
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
