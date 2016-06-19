<?php
$pdo = BancodeDados::conecta();
$nome = $_GET['a'];
if ( !empty($_POST)) {
      $duracao = $_POST['vDURACAO'];
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = 'UPDATE '. $BDSchema .'TB_Jogo SET duracao = ? WHERE nome = ?';
      $q = $pdo->prepare($sql);
      $q->execute(array($duracao,$nome));
      BancodeDados::desconecta();
      if (!headers_sent()) {
          header('Location: '.$url);
          exit;
      } else {
              echo '<script type="text/javascript">';
              echo 'window.location.href="'.$url.'";';
              echo '</script>';
              exit;
      }
      }
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Editar entrada na tabela Jogo</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
      <?php echo '<form role="form" action="page.php?ntb='. $_GET['ntb'] .'&tb=3&a='.$nome.'" method="post">'; ?>
          <div class="form-group">
              <label>*Digite a duração do jogo em min.</label>
              <input class="form-control" name="vDURACAO" placeholder="120.2" required>
          </div>
          <button type="submit" class="btn btn-success">Enviar</button>
          <button type="reset" class="btn btn-danger">Apagar</button>
      </form>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
