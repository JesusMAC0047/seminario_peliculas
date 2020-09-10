<?php

class peliculaController{

    public function index(){
        
        //renderizar vista
        require_once 'views/pelicula/estrenos.php';
    }

    public function peliculas(){

        require_once 'views/header/peliculas.php';
    }

    public function artistas(){

        require_once 'views/header/artistas.php';
    }

    public function categorias(){

        require_once 'views/header/categorias.php';
    }

    public function informacion(){

        require_once 'views/header/informacion.php';
    }

    public function reviews(){

        require_once 'views/pelicula/reviews.php';
    }

    public function showCategoria(){

        require_once '/public_html/views/pelicula/categoria.php';
    }
}