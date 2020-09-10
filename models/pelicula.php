<?php

class pelicula{

    private $id;
    private $nombre;
    private $apellidos;
    private $db;

    public function __construct(){

        $this->db = Database::connect();
    }

   /* ID */
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
    
    /* Nombre */
    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);

        return $this;
    }

     /* Apellidos */
     public function getApellidos()
     {
         return $this->apellidos;
     }
 
     public function setApellidos($apellidos)
     {
         $this->apellidos = $this->db->real_escape_string($apellidos);
 
         return $this;
     }  

    public function getAllActores(){

        $actores = $this->db->query("SELECT * FROM actores ORDER BY nombre ASC");
        return $actores;
    }

    public function getPelicula(){

        $pelicula = $this->db->query("SELECT * FROM pelicula ORDER BY id DESC LIMIT 1");
        
        return $pelicula;
    }

    public function getOnePelicula($a){

    $pelicula = $this->db->query("SELECT * FROM pelicula WHERE id = {$a}");
        
        return $pelicula;
    }

    public function getAllPeliculas(){

        $pelicula = $this->db->query("SELECT * FROM pelicula ORDER BY titulo ASC");
        
        return $pelicula;
    }
}
