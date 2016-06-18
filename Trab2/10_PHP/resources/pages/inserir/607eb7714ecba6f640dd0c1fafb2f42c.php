<?php
$pdo = BancodeDados::conecta();

if ( !empty($_POST)) {
        $tin = $_POST['vTIN'];
        $nome = $_POST['vNOME'];
        $endereco = $_POST['vENDERECO'];
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'INSERT INTO '. $BDSchema .'TB_Franquia (tin,nome,endereco) VALUES(?, ?, ?)';
        $q = $pdo->prepare($sql);
        $q->execute(array($tin,$nome,$endereco));
        BancodeDados::desconecta();
        header('Location: tabela.php?ntb='. $_GET['ntb'] .'');
      }
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Inserir entrada na tabela Franquia</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
      <?php echo '<form role="form" action="page.php?ntb='. $_GET['ntb'] .'&tb=1" method="post">'; ?>
          <div class="form-group">
              <label>*TIN da franquia.</label>
              <input class="form-control" type="text" name="vTIN" placeholder="0123456789" required>
          </div>
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
