<?php
$pdo = BancodeDados::conecta();

if ( !empty($_POST)) {
      $doc = $_POST['vDOC'];
      $ri = $_POST['vRI'];
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = 'INSERT INTO '. $BDSchema .'TB_Funcionario (doc_PES,ri) VALUES(?, ?)';
      $q = $pdo->prepare($sql);
      $q->execute(array($doc,$ri));
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
              <label>*Digite o RI.</label>
              <input class="form-control" name="vRI" placeholder="4" required>
          </div>
          <button type="submit" class="btn btn-success">Enviar</button>
          <button type="reset" class="btn btn-danger">Apagar</button>
      </form>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
