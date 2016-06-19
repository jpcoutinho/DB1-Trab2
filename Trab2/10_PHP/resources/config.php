<?php
    $BDSchema = 'trab2teste.';
    $Moeda = 'US$ ';
  class BancodeDados{
    private static $bdEnd = '127.0.0.1'; // Host
    private static $bdUsr = 'postgres'; // Usuário
    private static $bdUsrPsw = '12345'; // Senha
    private static $bdNome = 'bd1a3wb161018'; // Nome do banco de dados

    private static $coneccao = NULL;

    public function __construct(){
      die('Não é permitida a inicialização da função!');
    }
    /* Cria conecção */
    public static function conecta(){
      if(NULL==self::$coneccao){
        try{
          self::$coneccao =  new PDO("pgsql:host=".self::$bdEnd.";"."dbname=".self::$bdNome, self::$bdUsr, self::$bdUsrPsw);
        }
        /* Caso haja algum erro na conecção */
        catch(PDOException $e){
          die($e->getMessage());
        }
      }
      return self::$coneccao;
    }
    /* Cancela a conecção */
    public static function desconecta(){
      self::$coneccao = NULL;
    }
  }
?>
