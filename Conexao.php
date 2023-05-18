<?php
class Conexao {

    private static $instancia;

     public static function getInstancia(){
        try{
            if(!isset(self::$instancia)){
                self::$instancia = new PDO('mysql:host=localhost;dbname=academiacontrol', 'root','' );

            }return self::$instancia;
            
        }catch(Exception $e) {
            throw new Exception('Erro na conexão' + $e->getMessage());
        }
     }
}