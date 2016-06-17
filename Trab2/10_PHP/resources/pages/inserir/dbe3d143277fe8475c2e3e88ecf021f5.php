<?php
require_once('resources/config.php');
$pdo = BancodeDados::conecta();

if ( !empty($_POST)) {
        $doc = $_POST['vDOC'];
        $ri = $_POST['vRI'];
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'INSERT INTO '. $BDSchema .'TB_Funcionario (doc_PES,ri) VALUES(?, ?)';
        $q = $pdo->prepare($sql);
        $q->execute(array($doc,$ri));
        header("Location: tabela.php?ntb=dbe3d143277fe8475c2e3e88ecf021f5");
      }
?>
<h1>Tabela funcionário</h1>
<div class="row">
  <div class="medium-12 columns MarginTop">
    <nav aria-label="Você está aqui:" role="navigation">
      <ul class="breadcrumbs">
        <li><a href="index.php">Home</a></li>
        <li><a href="tabela.php?ntb=dbe3d143277fe8475c2e3e88ecf021f5">Tabela Funcionario</a></li>
        <li>
          <span class="show-for-sr">Atual: </span> Inserir entrada
        </li>
      </ul>
    </nav>
  </div>
</div>
<div class="row">
  <div class="medium-12 columns MarginTop">
    <form action="page.php?ntb=dbe3d143277fe8475c2e3e88ecf021f5&tb=1" method="post" data-abide novalidate>
      <div data-abide-error class="alert callout" style="display: none;">
        <p><i class="fi-alert"></i> Seu formulário possue alguns erros.</p>
      </div>
      <div class="row">
        <div class="medium-6 columns">
          <label>*Selecione a pessoa
            <select id="select" name="vDOC" required>
              <option value="">--SELECIONE O NOME--</option>
              <?php
                $sql = 'SELECT * FROM '. $BDSchema .'TB_Pessoa ORDER BY nome ASC';
                foreach ($pdo->query($sql) as $row) {
                  echo '<option value="'. $row['doc'] . '">'. $row['nome'] . '</option>';
                }
              ?>
            </select>
            <span class="form-error">
              Koé, você não pode deixar isso em branco!
            </span>
          </label>
        </div>
        <div class="medium-6 columns">
          <label>*Digite o RI
            <input type="text" name="vRI" placeholder="4" aria-describedby="Digite o RI" required pattern="number">
            <span class="form-error">
              Koé, você não pode deixar isso em branco!
            </span>
          </label>
        </div>
      </div>
      <div class="row">
        <fieldset class="large-6 columns">
          <button class="alert button" type="reset" value="Reset">Apagar</button>
        </fieldset>
        <fieldset class="large-6 columns">
          <button class="success button" type="submit" value="Submit">Enviar</button>
        </fieldset>
      </div>
    </form>
  </div>
</div>
<?php
BancodeDados::desconecta();
?>
