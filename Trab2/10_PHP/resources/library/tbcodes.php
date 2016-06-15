<?php
  function ConvertCodes($tbnome){
    if($tbnome===strtolower("CBEB4C01B2C581B42DECD055EEC9076F"))
      $t = "TB_Caixa";
    elseif($tbnome===strtolower("36B5B40331E8DF3F92B5CCF8685AFBF5"))
      $t = "TB_Cliente";
    elseif($tbnome===strtolower("5316B816DEF2BA41E0241F54DC7EFBD1"))
      $t = "TB_Competiu";
    elseif($tbnome===strtolower("D184455C8EB6FA3BFB9E1440AA465620"))
      $t = "TB_Comprou";
    elseif($tbnome===strtolower("0A258EE607F3546BD8D9050EF6697142"))
      $t = "TB_ContatoFranquia";
    elseif($tbnome===strtolower("4C882E4C843C6D24F0C70AD6079508E9"))
      $t = "TB_ContatoPessoa";
    elseif($tbnome===strtolower("607EB7714ECBA6F640DD0C1FAFB2F42C"))
      $t = "TB_Franquia";
    elseif($tbnome==strtolower("3ABCFCB700ACD4310C5C4D9375AD88CF"))
      $t = "TB_Frequentou";
    elseif($tbnome===strtolower("DBE3D143277FE8475C2E3E88ECF021F5"))
      $t = "TB_Funcionario";
    elseif($tbnome===strtolower("D9E35A12173A53725317FCABC563C48F"))
      $t = "TB_Ganhou";
    elseif($tbnome===strtolower("4BA5A8613A22338B62A8FC77DEEABF20"))
      $t = "TB_Jogada";
    elseif($tbnome==='bceca77ab8c59eeaf2e6d6a323be0ae7')
      $t = "TB_Jogo";
    elseif($tbnome===strtolower("0F46C1D95833F44BF262DBFD167EDD46"))
      $t = "TB_JogoEmGrupo";
    elseif($tbnome===strtolower("B6E5A04E7A1D70C4D3D9B3756973A4B5"))
      $t = "TB_JogoIndividual";
    elseif($tbnome===strtolower("EAFF6C1F31F280F1BD68C5D54469F61B"))
      $t = "TB_Maquina";
    elseif($tbnome===strtolower("16DC2B0D9986B0EB4AD8ADFE439496E5"))
      $t = "TB_Mesa";
    elseif($tbnome===strtolower("42533CC176FE5F805356868AEE547210"))
      $t = "TB_Oferece";
    elseif($tbnome===strtolower("F3DF806DC323278B7CEEE93FF594327D"))
      $t = "TB_Partida";
    elseif($tbnome===strtolower("05B7EA9032CCCACB4ECFA3785F42810C"))
      $t = "TB_Pessoa";
    elseif($tbnome===strtolower("BE5D5600F69779CAD9D135CB9B83AF79"))
      $t = "TB_Vendeu";
    return $t;
  }
?>
