<?php
$pdo = BancodeDados::conecta();
$tin = $_GET['a'];
if ( !empty($_POST)) {
        $nome = $_POST['vNOME'];
        $endereco = $_POST['vENDERECO'];
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'UPDATE '. $BDSchema .'TB_Franquia SET nome = ?, endereco = ? WHERE tin = ?';
        $q = $pdo->prepare($sql);
        $q->execute(array($nome,$endereco,$tin));
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
        <h1 class="page-header">Editar entrada na tabela Franquia</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
      <?php echo '<form role="form" action="page.php?ntb='. $_GET['ntb'] .'&tb=3&a='.$tin.'" method="post">'; ?>
          <div class="form-group">
              <label>*Nome.</label>
              <input class="form-control" name="vNOME" placeholder="Flamingo (40)" required>
          </div>
          <div class="form-group">
              <label>*Endereço.</label>
              <input class="form-control" name="vENDERECO" placeholder="Rua 123 (100)" required>
          </div>
          <button type="submit" class="btn btn-success">Enviar</button>
          <button type="reset" class="btn btn-danger">Apagar</button>
      </form>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
