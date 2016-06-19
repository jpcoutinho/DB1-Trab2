<?php
$pdo = BancodeDados::conecta();

if ( !empty($_POST)) {
        $pseu = $_POST['vPSEUDONIMO'];
        $doc = $_POST['vDOC'];
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'INSERT INTO '. $BDSchema .'TB_Cliente (doc_pes,pseudominio) VALUES(?, ?)';
        $q = $pdo->prepare($sql);
        $q->execute(array($doc,$pseu));
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
        <h1 class="page-header">Inserir entrada na tabela Cliente</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
      <?php echo '<form role="form" action="page.php?ntb='. $_GET['ntb'] .'&tb=1" method="post">'; ?>
          <div class="form-group">
              <label>Selecione o nome da pessoa</label>
              <select name="vDOC" class="form-control" required>
                  <option value="">--SELECIONE O NOME--</option>
                  <?php
                  $sql = 'SELECT * FROM '. $BDSchema .'TB_Pessoa ORDER BY nome ASC';
                  foreach ($pdo->query($sql) as $row)
                    echo '<option value="'. $row['doc'] . '">'. $row['nome'] . '</option>';
                  BancodeDados::desconecta();
                  ?>
              </select>
          </div>
          <div class="form-group">
              <label>*Pseudominio.</label>
              <input class="form-control" type="text" name="vPSEUDONIMO" placeholder="Don Corleone (20)" aria-describedby="Digite o pseudonimo">
              <p class="help-block">Caso deseje permanecer anônimo, por favor preencha este campo!</p>
          </div>
          <button type="submit" class="btn btn-success">Enviar</button>
          <button type="reset" class="btn btn-danger">Apagar</button>
      </form>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
