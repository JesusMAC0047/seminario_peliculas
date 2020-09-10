<?php

//Conexion con la base de datos
class Database{

    public static function Connect(){

        $db = new mysqli('localhost','id13119385_root','\O~\q1S(^HKjMADM','id13119385_seminario_peliculas');
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}