<?php
$pdo = BancodeDados::conecta();
$doc = $_GET['a'];
if ( !empty($_POST)) {
      $nome = $_POST['vNOME'];
      $sexo = $_POST['vSEXO'];
      $nasc = $_POST['vNASC'];
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = 'UPDATE '. $BDSchema .'TB_Pessoa SET nome = ?, sexo = ?, nascimento = ? WHERE doc = ?';
      $q = $pdo->prepare($sql);
      $q->execute(array($nome,$sexo,$nasc,$doc));
      BancodeDados::desconecta();
      $url = 'tabela.php?ntb='.$_GET['ntb'].'';
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
        <h1 class="page-header">Editar entrada na tabela Pessoa</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
      <?php echo '<form role="form" action="page.php?ntb='. $_GET['ntb'] .'&tb=3&a='.$doc.'" method="post">'; ?>
          <div class="form-group">
              <label>*Digite o nome da pessoa.</label>
              <input class="form-control" name="vNOME" placeholder="John Doe (40)" required>
          </div>
          <div class="form-group">
              <label>Selecione o sexo</label>
              <select name="vSEXO" class="form-control" required>
                  <option value="">--</option>
                  <option value="M">Masculino</option>
                  <option value="F">Fêminino</option>
                  <option value="O">Outro</option>
              </select>
          </div>
          <div class="form-group">
              <label>*Data de nascimento.</label>
              <input class="form-control" name="vNASC" placeholder="1991-05-20" required>
          </div>
          <button type="submit" class="btn btn-success">Enviar</button>
          <button type="reset" class="btn btn-danger">Apagar</button>
      </form>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
