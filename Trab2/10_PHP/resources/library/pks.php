<?php
<?php
  function VerificaPK($tbnome){
    if($tbnome===strtolower("CBEB4C01B2C581B42DECD055EEC9076F")) // TB_Caixa
      $t = 1;
    elseif($tbnome===strtolower("36B5B40331E8DF3F92B5CCF8685AFBF5")) // TB_Cliente
      $t = 1;
    elseif($tbnome===strtolower("5316B816DEF2BA41E0241F54DC7EFBD1")) // TB_Competiu
      $t = 2;
    elseif($tbnome===strtolower("D184455C8EB6FA3BFB9E1440AA465620")) // TB_Comprou
      $t = 3;
    elseif($tbnome===strtolower("0A258EE607F3546BD8D9050EF6697142")) // TB_ContatoFranquia
      $t = 2;
    elseif($tbnome===strtolower("4C882E4C843C6D24F0C70AD6079508E9")) // TB_ContatoPessoa
      $t = 2;
    elseif($tbnome===strtolower("607EB7714ECBA6F640DD0C1FAFB2F42C")) // TB_Franquia
      $t = 1;
    elseif($tbnome==strtolower("3ABCFCB700ACD4310C5C4D9375AD88CF")) // TB_Frequentou
      $t = 3;
    elseif($tbnome===strtolower("DBE3D143277FE8475C2E3E88ECF021F5")) // TB_Funcionario
      $t = 1;
    elseif($tbnome===strtolower("D9E35A12173A53725317FCABC563C48F")) // TB_Ganhou
      $t = 'a='. $row['id_par'] .'&b='. $row['doc_cli'] .'';
    elseif($tbnome===strtolower("4BA5A8613A22338B62A8FC77DEEABF20")) // TB_Jogada
      $t = 'a='. $row['doc_cli'] .'&b='. $row['tin_fra'] .'&c='. $row['data'] .'';
    elseif($tbnome==='bceca77ab8c59eeaf2e6d6a323be0ae7') // TB_Jogo
      $t = 'a='. $row['nome'] .'';
    elseif($tbnome===strtolower("0F46C1D95833F44BF262DBFD167EDD46")) // TB_JogoEmGrupo
      $t = 'a='. $row['nome_jgo'] .'';
    elseif($tbnome===strtolower("B6E5A04E7A1D70C4D3D9B3756973A4B5")) // TB_JogoIndividual
      $t = 'a='. $row['nome_jgo'] .'';
    elseif($tbnome===strtolower("EAFF6C1F31F280F1BD68C5D54469F61B")) // TB_Maquina
      $t = 'a='. $row['snumber'] .'';
    elseif($tbnome===strtolower("16DC2B0D9986B0EB4AD8ADFE439496E5")) // TB_Mesa
      $t = 'a='. $row['number'] .'';
    elseif($tbnome===strtolower("42533CC176FE5F805356868AEE547210")) // TB_Oferece
      $t = 'a='. $row['nome_jgi'] .'&b='. $row['snumber_maq'] .'';
    elseif($tbnome===strtolower("F3DF806DC323278B7CEEE93FF594327D")) // TB_Partida
      $t = 'a='. $row['id'] .'';
    elseif($tbnome===strtolower("05B7EA9032CCCACB4ECFA3785F42810C")) // TB_Pessoa
      $t = 'a='. $row['doc'] .'';
    elseif($tbnome===strtolower("BE5D5600F69779CAD9D135CB9B83AF79")) // TB_Vendeu
      $t = 'a='. $row['doc_cli'] .'&b='. $row['numero_cax'] .'&c='. $row['data'] .'';
    return $t;
  }
?>
/*
  function VerificaPK($tbnome){
    if($tbnome===strtolower("CBEB4C01B2C581B42DECD055EEC9076F")) // TB_Caixa
      $t = 'a='. $row['numero'] .'';
    elseif($tbnome===strtolower("36B5B40331E8DF3F92B5CCF8685AFBF5")) // TB_Cliente
      $t = 'a='. $row['doc_pes'] .'';
    elseif($tbnome===strtolower("5316B816DEF2BA41E0241F54DC7EFBD1")) // TB_Competiu
      $t = 'a='. $row['id_par'] .'&b='. $row['doc_cli'] .'';
    elseif($tbnome===strtolower("D184455C8EB6FA3BFB9E1440AA465620")) // TB_Comprou
      $t = 'a='. $row['numero_cax'] .'&b='. $row['doc_cli'] .'&c='. $row['data'] .'';
    elseif($tbnome===strtolower("0A258EE607F3546BD8D9050EF6697142")) // TB_ContatoFranquia
      $t = 'a='. $row['tin_fra'] .'&b='. $row['contato'] .'';
    elseif($tbnome===strtolower("4C882E4C843C6D24F0C70AD6079508E9")) // TB_ContatoPessoa
      $t = 'a='. $row['doc_pes'] .'&b='. $row['contato'] .'';
    elseif($tbnome===strtolower("607EB7714ECBA6F640DD0C1FAFB2F42C")) // TB_Franquia
      $t = 'a='. $row['tin'] .'';
    elseif($tbnome==strtolower("3ABCFCB700ACD4310C5C4D9375AD88CF")) // TB_Frequentou
      $t = 'a='. $row['doc_cli'] .'&b='. $row['tin_fra'] .'&c='. $row['data'] .'';
    elseif($tbnome===strtolower("DBE3D143277FE8475C2E3E88ECF021F5")) // TB_Funcionario
      $t = 'a='. $row['doc_pes'] .'';
    elseif($tbnome===strtolower("D9E35A12173A53725317FCABC563C48F")) // TB_Ganhou
      $t = 'a='. $row['id_par'] .'&b='. $row['doc_cli'] .'';
    elseif($tbnome===strtolower("4BA5A8613A22338B62A8FC77DEEABF20")) // TB_Jogada
      $t = 'a='. $row['doc_cli'] .'&b='. $row['tin_fra'] .'&c='. $row['data'] .'';
    elseif($tbnome==='bceca77ab8c59eeaf2e6d6a323be0ae7') // TB_Jogo
      $t = 'a='. $row['nome'] .'';
    elseif($tbnome===strtolower("0F46C1D95833F44BF262DBFD167EDD46")) // TB_JogoEmGrupo
      $t = 'a='. $row['nome_jgo'] .'';
    elseif($tbnome===strtolower("B6E5A04E7A1D70C4D3D9B3756973A4B5")) // TB_JogoIndividual
      $t = 'a='. $row['nome_jgo'] .'';
    elseif($tbnome===strtolower("EAFF6C1F31F280F1BD68C5D54469F61B")) // TB_Maquina
      $t = 'a='. $row['snumber'] .'';
    elseif($tbnome===strtolower("16DC2B0D9986B0EB4AD8ADFE439496E5")) // TB_Mesa
      $t = 'a='. $row['number'] .'';
    elseif($tbnome===strtolower("42533CC176FE5F805356868AEE547210")) // TB_Oferece
      $t = 'a='. $row['nome_jgi'] .'&b='. $row['snumber_maq'] .'';
    elseif($tbnome===strtolower("F3DF806DC323278B7CEEE93FF594327D")) // TB_Partida
      $t = 'a='. $row['id'] .'';
    elseif($tbnome===strtolower("05B7EA9032CCCACB4ECFA3785F42810C")) // TB_Pessoa
      $t = 'a='. $row['doc'] .'';
    elseif($tbnome===strtolower("BE5D5600F69779CAD9D135CB9B83AF79")) // TB_Vendeu
      $t = 'a='. $row['doc_cli'] .'&b='. $row['numero_cax'] .'&c='. $row['data'] .'';
    return $t;
  }
  */
?>
