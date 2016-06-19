<?php
$pdo = BancodeDados::conecta();

if ( !empty($_POST)) {
      $snumber = $_POST['vSN'];
      $tin = $_POST['vTIN'];
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = 'INSERT INTO '. $BDSchema .'TB_Maquina (snumber,tin_fra) VALUES(?, ?)';
      $q = $pdo->prepare($sql);
      $q->execute(array($snumber,$tin));
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
        <h1 class="page-header">Inserir entrada na tabela Máquina</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
      <?php echo '<form role="form" action="page.php?ntb='. $_GET['ntb'] .'&tb=1" method="post">'; ?>
        <div class="form-group">
            <label>*Selecione onde a máquina está localizada</label>
            <select name="vTIN" class="form-control" required>
                <option value="">--SELECIONE O NOME--</option>
                <?php
                  $sql = 'SELECT * FROM '. $BDSchema .'TB_Franquia ORDER BY nome ASC';
                  foreach ($pdo->query($sql) as $row)
                    echo '<option value="'. $row['tin'] . '">'. $row['nome'] . '</option>';
                  BancodeDados::desconecta();
                ?>
            </select>
        </div>
          <div class="form-group">
              <label>*Digite o número de série.</label>
              <input class="form-control" name="vSN" placeholder="1234" required>
          </div>
          <button type="submit" class="btn btn-success">Enviar</button>
          <button type="reset" class="btn btn-danger">Apagar</button>
      </form>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
