<?php

class review{

    //son las variables que estan en la base de datos
    private $id;
    private $usuario_id;
    private $pelicula_id;
    private $categoria_id;
    private $titulo;
    private $review;
    private $estreno;
    private $imagen;
    
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

    /* Usuario */ 
    public function getUsuario_id()
    {
        return $this->usuario_id;
    }

    public function setUsuario_id($usuario_id)
    {
        $this->usuario_id = $usuario_id;

        return $this;
    }

    /* Pelicula */ 
    public function getPelicula_id()
    {
        return $this->pelicula_id;
    }

    public function setPelicula_id($pelicula_id)
    {
        $this->pelicula_id = $pelicula_id;

        return $this;
    }

    /* Categoria */ 
    public function getCategoria_id()
    {
        return $this->categoria_id;
    }

    public function setCategoria_id($categoria_id)
    {
        $this->categoria_id = $categoria_id;

        return $this;
    }

    /* Titulo */ 
    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $this->db->real_escape_string($titulo);

        return $this;
    }

    /* Review */ 
    public function getReview()
    {
        return $this->review;
    }

    public function setReview($review)
    {
        $this->review = $this->db->real_escape_string($review);

        return $this;
    }

    /* Fecha */ 
    public function getEstreno()
    {
        return $this->estreno;
    }

    public function setEstreno($estreno)
    {
        $this->estreno = $estreno;

        return $this;
    }

    /* Imagen */ 
    public function getImagen()
    {
        return $this->imagen;
    }

    public function setImagen($imagen)
    {
        $this->imagen = $this->db->real_escape_string($imagen);

        return $this;
    }

    public function getOne($pel_id){

        $review = $this->db->query("SELECT * FROM review r WHERE r.id_pelicula =
                                     (SELECT id FROM pelicula WHERE id = {$pel_id})");

        return $review;
    }

    public function save(){

        $sql = "INSERT INTO pelicula VALUES(NULL,
                                            {$this->getCategoria_id()},
                                            '{$this->getTitulo()}',
                                            '{$this->getEstreno()}',
                                            '{$this->getImagen()}');";
        $save = $this->db->query($sql);

        $result = false;

        if ($save) {

            $sql2 = "INSERT INTO review VALUES(NULL,
                                              {$this->getUsuario_id()},
                                              {$this->getPelicula_id()},
                                              '{$this->getReview()}');";
            $save2 = $this->db->query($sql2);
            
            if ($save2) {
                
                $result = true;
            }
        }

        return $result;
    }
}