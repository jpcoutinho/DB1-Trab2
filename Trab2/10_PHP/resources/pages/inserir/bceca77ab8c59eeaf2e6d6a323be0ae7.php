<?php
$pdo = BancodeDados::conecta();

if ( !empty($_POST)) {
      $nome = $_POST['vNOME'];
      $duracao = $_POST['vDURACAO'];
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = 'INSERT INTO '. $BDSchema .'TB_Jogo (nome,duracao) VALUES(?, ?)';
      $q = $pdo->prepare($sql);
      $q->execute(array($nome,$duracao));
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
        <h1 class="page-header">Inserir entrada na tabela Jogo</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
      <?php echo '<form role="form" action="page.php?ntb='. $_GET['ntb'] .'&tb=1" method="post">'; ?>
          <div class="form-group">
              <label>*Digite o nome.</label>
              <input class="form-control" name="vNOME" placeholder="BlackJack (30)" required>
          </div>
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
