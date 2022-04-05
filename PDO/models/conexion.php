<?php

class Conexion{
    public static function conectar() {
        $Link = new PDO("mysql:host=localhost:3306;dbname=pdophp","root","");
        //var_dump($Link);
       return $Link;
    }
}

/*$a = new Conexion();
$a ->conectar();
 * 
 * 
 * 
class Conexion{
    public static function conectar() {
        $Link = new PDO("mysql:host=localhost:3308;dbname=pdophp","root","");
        //var_dump($Link);
       return $Link;
    }
}

 */
