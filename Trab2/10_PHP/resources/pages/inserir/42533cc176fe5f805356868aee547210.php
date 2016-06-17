<?php
require_once('resources/config.php');
$pdo = BancodeDados::conecta();

if ( !empty($_POST)) {
        $nome = $_POST['vNOME'];
        $sn = $_POST['vSN'];
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'INSERT INTO '. $BDSchema .'TB_Oferece (nome_JGI,snumber_MAQ) VALUES(?, ?)';
        $q = $pdo->prepare($sql);
        $q->execute(array($nome,$sn));
        header("Location: tabela.php?ntb=42533cc176fe5f805356868aee547210");
      }
?>
<h1>Tabela jogo individual</h1>
<div class="row">
  <div class="medium-12 columns MarginTop">
    <nav aria-label="Você está aqui:" role="navigation">
      <ul class="breadcrumbs">
        <li><a href="index.php">Home</a></li>
        <li><a href="tabela.php?ntb=42533cc176fe5f805356868aee547210">Tabela Oferece</a></li>
        <li>
          <span class="show-for-sr">Atual: </span> Inserir entrada
        </li>
      </ul>
    </nav>
  </div>
</div>
<div class="row">
  <div class="medium-12 columns MarginTop">
    <form action="page.php?ntb=42533cc176fe5f805356868aee547210&tb=1" method="post" data-abide novalidate>
      <div data-abide-error class="alert callout" style="display: none;">
        <p><i class="fi-alert"></i> Seu formulário possue alguns erros.</p>
      </div>
      <div class="row">
        <div class="medium-6 columns">
          <label>*Selecione qual é o nome do jogo
            <select id="select" name="vNOME" required>
              <option value="">--SELECIONE O NOME--</option>
              <?php
                $sql = 'SELECT * FROM '. $BDSchema .'TB_JogoIndividual ORDER BY nome_jgo ASC';
                foreach ($pdo->query($sql) as $row) {
                  echo '<option value="'. $row['nome_jgo'] . '">'. $row['nome_jgo'] . '</option>';
                }
              ?>
            </select>
            <span class="form-error">
              Koé, você não pode deixar isso em branco!
            </span>
          </label>
        </div>
        <div class="medium-6 columns">
          <label>*Selecione em qual máquina está este jogo
            <select id="select" name="vSN" required>
              <option value="">--SELECIONE A MÁQUINA--</option>
              <?php
                $sql = 'SELECT * FROM '. $BDSchema .'TB_Maquina ORDER BY snumber ASC';
                foreach ($pdo->query($sql) as $row) {
                  echo '<option value="'. $row['snumber'] . '">'. $row['tin_fra'] . '</option>';
                }
              ?>
            </select>
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
