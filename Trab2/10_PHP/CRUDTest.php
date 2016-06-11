<?php
  include('includes/config.php');

  class CRUDTest{
    private $msg = "";
    public funcion getMsg (){
      return $this->msg;
    }
    public funcion criaPessoa($doc,$nome,$tipoDoc,$sexo,$nascimento){
      $id = -1;
      try{
        global $STRConnect;
        $conn = pg_connect($STRConnect);
        if $conn === false{
          $this->msg = "Não foi possivel conectar ao servidor";
          return $id;
        }
        $query = "INSERT INTO TB_Pessoa(doc,nome,tipoDoc,sexo,nascimento) VALUES ($1,$2,$3,$4,$5)";
        $parametros = array(&$doc,&$nome,&$tipoDoc,&$sexo,&$nascimento);

        $res = pg_query_params($conn,$query,$parametros);
        $row = pg_fetch_row($res);
        $id = $row[0];

        pg_close($conn);
      }
      catch (Exception $e){
        $this->msg = $e->getMessage();
        $id = -1;
      }
      return $id;
    }
  }
?>
