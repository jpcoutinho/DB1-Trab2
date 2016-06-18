<?php
$pdo = BancodeDados::conecta();

if ( !empty($_POST)) {
      $doc = $_POST['vDOC'];
      $nome = $_POST['vNOME'];
      $tipod = $_POST['vTPD'];
      $sexo = $_POST['vSEXO'];
      $nasc = $_POST['vNASC'];
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = 'INSERT INTO '. $BDSchema .'TB_Pessoa (doc,nome,tipodoc,sexo,nascimento) VALUES(?, ?, ?, ?, ?)';
      $q = $pdo->prepare($sql);
      $q->execute(array($doc,$nome,$tipod,$sexo,$nasc));
      BancodeDados::desconecta();
      header('Location: tabela.php?ntb='. $_GET['ntb'] .'');
      }
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Inserir entrada na tabela Pessoa</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
      <?php echo '<form role="form" action="page.php?ntb='. $_GET['ntb'] .'&tb=1" method="post">'; ?>
          <div class="form-group">
              <label>*Número do Documento.</label>
              <input class="form-control" name="vDOC" placeholder="123456789 (9)" required>
          </div>
          <div class="form-group">
              <label>Selecione o tipo do documento</label>
              <select name="vTPD" class="form-control" required>
                  <option value="">--</option>
                  <option value="PP">Passaporte</option>
                  <option value="RG">Idêntidade</option>
              </select>
          </div>
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
