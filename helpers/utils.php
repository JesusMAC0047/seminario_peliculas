<?php

class utils{

    public static function deleteSession($name){

        if (isset($_SESSION[$name])) {
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }

        return $name;
    }

    public static function isAdmin(){

        if (!isset($_SESSION['admin'])) {
           header('Location:'.base_url); 
        }else{
            return true;
        }
    }

    public static function showCategorias(){

        require_once 'models/categoria.php';
        $categoria = new categoria();
        $categorias = $categoria->getAll();

        return $categorias;
    }

    public static function showActor(){

        require_once 'models/actores.php';
        $actores = new actores();
        $actor = $actores->getLast();

        return $actor;
    }

    public static function showActores(){

        require_once 'models/pelicula.php';
        $actor = new pelicula();
        $actores = $actor->getAllActores();

        return $actores;
    }

    public static function showPelicula(){

        require_once 'models/pelicula.php';
        $peliculas = new pelicula();
        $pelicula = $peliculas->getPelicula();

        return $pelicula;
    }

    public function showPeliculas(){

        require_once 'models/pelicula.php';
        $pelicula = new pelicula();
        $peliculas = $pelicula->getAllPeliculas();
        
        return $peliculas;
    }

    public function peliculaNueva(){

        require_once 'models/pelicula.pho';
        

    }
}