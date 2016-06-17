<?php
require_once('resources/config.php');
$pdo = BancodeDados::conecta();

if ( !empty($_POST)) {
        $nome = $_POST['vNOME'];
        $jmin = $_POST['vJMIN'];
        $jmax = $_POST['vJMAX'];
        $equipes = $_POST['vEQUIPES'];
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'INSERT INTO '. $BDSchema .'TB_JogoEmGrupo (nome_jgo,jogadores_min,jogadores_max,equipes) VALUES(?, ?, ?, ?)';
        $q = $pdo->prepare($sql);
        $q->execute(array($nome,$jmin,$jmax,$equipes));
        header("Location: tabela.php?ntb=0f46c1d95833f44bf262dbfd167edd46");
      }
?>
<h1>Tabela jogo em grupo</h1>
<div class="row">
  <div class="medium-12 columns MarginTop">
    <nav aria-label="Você está aqui:" role="navigation">
      <ul class="breadcrumbs">
        <li><a href="index.php">Home</a></li>
        <li><a href="tabela.php?ntb=0f46c1d95833f44bf262dbfd167edd46">Tabela Jogo em Grupo</a></li>
        <li>
          <span class="show-for-sr">Atual: </span> Inserir entrada
        </li>
      </ul>
    </nav>
  </div>
</div>
<div class="row">
  <div class="medium-12 columns MarginTop">
    <form action="page.php?ntb=0f46c1d95833f44bf262dbfd167edd46&tb=1" method="post" data-abide novalidate>
      <div data-abide-error class="alert callout" style="display: none;">
        <p><i class="fi-alert"></i> Seu formulário possue alguns erros.</p>
      </div>
      <div class="row">
        <div class="medium-6 columns">
          <label>*Selecione o nome do jogo
            <select id="select" name="vNOME" required>
              <option value="">--SELECIONE O NOME--</option>
              <?php
                $sql = 'SELECT * FROM '. $BDSchema .'TB_Jogo ORDER BY nome ASC';
                foreach ($pdo->query($sql) as $row) {
                  echo '<option value="'. $row['nome'] . '">'. $row['nome'] . '</option>';
                }
              ?>
            </select>
            <span class="form-error">
              Koé, você não pode deixar isso em branco!
            </span>
          </label>
        </div>
        <div class="medium-6 columns">
          <label>*Digite o numero de equipes.
            <input type="text" name="vEQUIPES" placeholder="3" aria-describedby="Digite o numero de equipes." required pattern="number">
            <span class="form-error">
              Koé, você não pode deixar isso em branco!
            </span>
          </label>
        </div>
      </div>
      <div class="row">
        <div class="medium-6 columns">
          <label>*Digite quantidade minima de jogadores
            <input type="text" name="vJMIN" placeholder="1" aria-describedby="Digite quantidade minima de jogadores." required pattern="number">
            <span class="form-error">
              Koé, você não pode deixar isso em branco!
            </span>
          </label>
        </div>
        <div class="medium-6 columns">
          <label>*Digite quantidade máxima de jogadores
            <input type="text" name="vJMAX" placeholder="4" aria-describedby="Digite quantidade máxima de jogadores." required pattern="number">
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
