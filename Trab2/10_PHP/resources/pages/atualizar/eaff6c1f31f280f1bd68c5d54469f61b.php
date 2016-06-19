<?php
$pdo = BancodeDados::conecta();
$snumber = $_GET['a'];
if ( !empty($_POST)) {
      $tin = $_POST['vTIN'];
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = 'UPDATE '. $BDSchema .'TB_Maquina SET tin_fra = ? WHERE snumber = ?';
      $q = $pdo->prepare($sql);
      $q->execute(array($tin,$snumber));
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
        <h1 class="page-header">Editar entrada na tabela Máquina</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
      <?php echo '<form role="form" action="page.php?ntb='. $_GET['ntb'] .'&tb=3&a='.$snumber.'" method="post">'; ?>
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
        <button type="submit" class="btn btn-success">Enviar</button>
        <button type="reset" class="btn btn-danger">Apagar</button>
      </form>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
