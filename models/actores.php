<?php

class actores{

    //variables de la base de datos
    private $id;
    private $id_pelicula;
    private $nombre;
    private $apellidos;

    private $db;
    //constructor para conectarse a la base de datos
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

     /* Id_Pelicula */ 
     public function getId_pelicula()
     {
         return $this->id_pelicula;
     }
 
     public function setId_pelicula($id_pelicula)
     {
         $this->id_pelicula = $id_pelicula;
 
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

    //se utiliza para obtener todos los actores de la base de datos
    public function getAll(){

        $actores = $this->db->query("SELECT * FROM actores ORDER BY id DESC");

        return $actores;
    }

    public function getLast(){

        $actor = $this->db->query("SELECT * FROM actores ORDER BY id DESC LIMIT 1");

        return $actor->fetch_object();
    }

    public function save(){

        $sql = "INSERT INTO actores VALUES(NULL,
                                            '{$this->getNombre()}',
                                            '{$this->getApellidos()}');";
        $save = $this->db->query($sql);

        $result = false;

        if ($save) {
            
            $sql2 = "INSERT INTO reparto VALUES(NULL,
                                                {$this->getId_pelicula()},
                                                {$this->getId()});";
            $save2 = $this->db->query($sql2);

            $result = false;
            
            if ($save2) {
                
                $result = true;
            }
        }

        return $result;
    }
}