<?php
$pdo = BancodeDados::conecta();
$doc = $_GET['a'];
if ( !empty($_POST)) {
        $pseu = $_POST['vPSEUDONIMO'];
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'UPDATE '. $BDSchema .'TB_Cliente SET pseudominio = ? WHERE doc_pes = ?';
        $q = $pdo->prepare($sql);
        $q->execute(array($pseu,$doc));
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
        <h1 class="page-header">Editar entrada na tabela Cliente</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
      <?php echo '<form role="form" action="page.php?ntb='. $_GET['ntb'] .'&tb=3&a='.$doc.'" method="post">'; ?>
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
