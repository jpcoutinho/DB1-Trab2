<?php
require_once('resources/config.php');
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
        header("Location: tabela.php?ntb=05b7ea9032cccacb4ecfa3785f42810c");
      }
?>
<h1>Tabela pessoa</h1>
<div class="row">
  <div class="medium-12 columns MarginTop">
    <nav aria-label="Você está aqui:" role="navigation">
      <ul class="breadcrumbs">
        <li><a href="index.php">Home</a></li>
        <li><a href="tabela.php?ntb=05b7ea9032cccacb4ecfa3785f42810c">Tabela Pessoa</a></li>
        <li>
          <span class="show-for-sr">Atual: </span> Inserir entrada
        </li>
      </ul>
    </nav>
  </div>
</div>
<div class="row">
  <div class="medium-12 columns MarginTop">
    <form action="page.php?ntb=05b7ea9032cccacb4ecfa3785f42810c&tb=1" method="post" data-abide novalidate>
      <div data-abide-error class="alert callout" style="display: none;">
        <p><i class="fi-alert"></i> Seu formulário possue alguns erros.</p>
      </div>
      <div class="row">
        <div class="medium-6 columns">
          <label>Numero do documento.
            <input type="text" name="vDOC" placeholder="123456789 (9)" aria-describedby="Numero do documento." required pattern="number">
            <span class="form-error">
              Koé, você não pode deixar isso em branco!
            </span>
          </label>
        </div>
        <div class="medium-6 columns">
          <label>Nome da pessoa.
            <input type="text" name="vNOME" placeholder="John Doe (40)" aria-describedby="Nome da pessoa." required pattern="text">
            <span class="form-error">
              Koé, você não pode deixar isso em branco!
            </span>
          </label>
        </div>
      </div>
      <div class="row">
        <div class="medium-6 columns">
          <label>Tipo do documento.
            <input type="text" name="vTPD" placeholder="Eg:. PP,RG.. (2)" aria-describedby="Tipo do documento." required pattern="text">
            <span class="form-error">
              Koé, você não pode deixar isso em branco!
            </span>
          </label>
        </div>
        <div class="medium-6 columns">
          <label>Sexo.
            <input type="text" name="vSEXO" placeholder="Eg:. M,F,O (1)" aria-describedby="Sexo." required pattern="text">
            <span class="form-error">
              Koé, você não pode deixar isso em branco!
            </span>
          </label>
        </div>
      </div>
      <div class="row">
        <div class="medium-6 columns">
          <label>Data de nascimento.
            <input type="text" name="vNASC" placeholder="1991-05-20" aria-describedby="Data de nascimento." required pattern="date">
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
