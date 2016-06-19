<?php
$pdo = BancodeDados::conecta();
$nome = $_GET['a'];

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'DELETE FROM '. $BDSchema .'TB_Jogo  WHERE nome = ?';
$q = $pdo->prepare($sql);
$q->execute(array($nome));
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
