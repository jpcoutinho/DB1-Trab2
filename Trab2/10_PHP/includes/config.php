<?php
  class BancodeDados{
    private static $bdEnd = 'localhost'; // Host
    private static $bdPorta = '5432';
    private static $bdUsr = 'usuario'; // Usuário
    private static $bdUsrPsw = 'senha'; // Senha
    private static $bdNome = 'nomedb'; // Nome do banco de dados

    private static $coneccao = NULL;

    public function __construct(){
      die('Não é permitida a inicialização da função!');
    }
    /* Cria conecção */
    public static function conecta(){
      if(NULL==self::$coneccao){
        try{
          self::$coneccao =  new PDO("pgsql:host=".self::$bdEnd.";"."port=".self::$bdPorta.";"."dbname=".self::$bdNome, self::$bdUsr, self::$bdUsrPsw);
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
