<?php
  //Incluindo config do banco de dados
  include('includes/config.php');
  //Realisando conecção
  $dbconn = pg_connect($STRConnect) or die('Não foi possivel conectar: ' . pg_last_error());
  //Verificando o status da connecção
  $status = pg_connection_status($dbconn);
  if ($status === PGSQL_CONNECTION_OK){
    echo "Connection status OK";
  }
  else{
    echo "Connection status bad";
  }
  //Finalizando conecção
  pg_close($dbconn);
?>
