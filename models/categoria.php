<?php

class categoria{

    private $id;
    private $nombre;
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

    public function getAll(){

        $categorias = $this->db->query("SELECT * FROM categoria ORDER BY id DESC");
        return $categorias;
    }

    public function getCategoria($cat){

        
        $categoria = $this->db->query("SELECT * FROM categoria WHERE id = {$cat}");

        return $categoria;
    }

    public function save(){

        $sql = "INSERT INTO categoria VALUES(NULL,
                                            '{$this->getNombre()}');";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }
}