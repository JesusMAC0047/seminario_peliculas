<?php

class Usuario{

    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $rol;

    private $db;
    //se conecta con la base de datos
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

    /* Email */
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $this->db->real_escape_string($email);

        return $this;
    }

    /* Password */
    public function getPassword()
    {
        return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT,['cost' => 4]);
    }

    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /* Rol */
    public function getRol()
    {
        return $this->rol;
    }

    public function setRol($rol)
    {
        $this->rol = $rol;

        return $this;
    }

    public function getUser($user_id){

        $usuario = $this->db->query("SELECT * FROM usuario WHERE id = {$user_id}");

        return $usuario;
    }

    public function getReview($user_id){

        $reviews = $this->db->query("SELECT COUNT(id) FROM review WHERE id_usuario = {$user_id}");
        
        return $reviews;
    }


    //guarda el objeto en la base de datos
    public function save(){

        //validar los datos antes de guardarlos en BD
        $nombre = $this->getNombre();
        $apellidos = $this->getApellidos();
        $email = $this->getEmail();
        $password = $this->getPassword();

        //nombre
        if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
            $nombre_validado = true;
        }else {
            $nombre_validado = false;
            $errores['nombre'] = "El nombre no es valido";
        }

        //apellidos
        if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)) {
            $apellidos_validado = true;
        }else {
            $apellidos_validado = false;
            $errores['apellidos'] = "El apellido no es valido";
        }

        //Email
        if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_validado = true;
        }else {
            $email_validado = false;
            $errores['email'] = "El email no es valido";
        }

        //password
        if (!empty($password) ) {
            $password_validado = true;
        }else {
            $password_validado = false;
            $errores['password'] = "La contraseña esta vacia";
        }      
        
        if (count($errores) == 0) {
            //Inserta los datos en la BD
            $sql = "INSERT INTO usuario VALUES(NULL,
                                          '{$this->getNombre()}',
                                          '{$this->getApellidos()}',
                                          '{$this->getEmail()}',
                                          '{$this->getPassword()}',
                                          'user');";
            $save = $this->db->query($sql);
            
            $result = false;

            if ($save) {
                $result = true;
            }
            return $result;
        }else {
            return $errores;
            //reedireccion
            header("Location:".base_url."usuario/index");
        }
    }

    public function login(){

        $result = false;
        $email = $this->email;
        $password = $this->password;

        //comprobar si existe el usuario
        $sql =  "SELECT * FROM usuario WHERE email = '$email'";
        $login = $this->db->query($sql);

        if ($login && $login->num_rows == 1) {

            $usuario = $login->fetch_object();

            //verificar la contraseña
            $verify = password_verify($password, $usuario->password);

            if ($verify) {
                $result = $usuario;
            }
        }
        return $result;
    }
}