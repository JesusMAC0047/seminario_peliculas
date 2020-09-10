<?php
require_once 'controllers/actoresController.php';

class reparto{

    private $id;
    private $id_pelicula;
    private $id_actor;

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

    /* ID pelicula */ 
    public function getId_peliula()
    {
        return $this->id_pelicula;
    }

    public function setId_pelicula($id_pelicula)
    {
        $this->id_pelicula = $id_pelicula;

        return $this;
    }

    /* ID actor */ 
    public function getId_actor()
    {
        return $this->id_actor;
    }

    public function setId_actor($id_actor)
    {
        $this->id_actor = $id_actor;

        return $this;
    }

    //se utiliza para obtener todos los actores de la base de datos
    public function getAll(){

        $elenco = $this->db->query("SELECT * FROM reparto ORDER BY id DESC");

        return $elenco;
    }

    public function getOne($pel_id){

        $elenco = $this->db->query("SELECT * FROM reparto WHERE id_pelicula = {$pel_id}");

        return $elenco;
    }

    public function showArtista($z){

        $artista = $this->db->query("SELECT * FROM actores WHERE id = {$z}"); 

        return $artista;
    }

    public function save(){

        $sql = "INSERT INTO reparto VALUES(NULL,
                                            {$this->getId_peliula()},
                                            {$this->getId_actor()});";
        $save = $this->db->query($sql);

        $result = false;

        if ($save) {
            
            $result = true;
        }
        
        return $result;
    }
}