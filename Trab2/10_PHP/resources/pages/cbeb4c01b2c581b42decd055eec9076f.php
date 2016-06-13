<form data-abide novalidate>
  <div data-abide-error class="alert callout" style="display: none;">
    <p><i class="fi-alert"></i> There are some errors in your form.</p>
  </div>
  <div class="row">
    <div class="medium-6 columns">
      <label>Número do caixa
        <input type="text" placeholder="1234" aria-describedby="Digite o numero da caixa" required pattern="number">
        <span class="form-error">
          Yo, you had better fill this out, it's required.
        </span>
      </label>
      <p class="help-text" id="exampleHelpText">Por favor digite o numero do caixa!</p>
    </div>
    <div class="medium-6 columns">
      <label>Selecione em qual franquia o Caixa está localizado
        <select id="select" required>
          <option value="">--SELECIONE O NOME--</option>
          <?php
                   require_once('resources/config.php');
                   $pdo = BancodeDados::conecta();
                   $sql = 'SELECT * FROM '. $BDSchema .'TB_Franquia ORDER BY nome ASC';
                   foreach ($pdo->query($sql) as $row) {
                     echo '<option value="'. $row['tin'] . '">'. $row['nome'] . '</option>';
                   }
                   BancodeDados::desconecta();
                  ?>
        </select>
        <span class="form-error">
          Yo, you had better fill this out, it's required.
        </span>
      </label>
    </div>
  </div>
  <div class="row">
    <fieldset class="large-6 columns">
      <button class="button" type="submit" value="Submit">Submit</button>
    </fieldset>
    <fieldset class="large-6 columns">
      <button class="button" type="reset" value="Reset">Reset</button>
    </fieldset>
  </div>
</form>
