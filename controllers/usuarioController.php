<?php

require_once 'models/usuario.php';

class usuarioController{

    public function index(){
        
        require_once 'views/usuario/notificacion.php';
    }

    public function misReviews(){

        require_once 'views/usuario/reviews.php';
    }

    //realiza el guardado en la base de datos
    public function save(){
        
        if (isset($_POST)) {
            
            $usuario = new Usuario();

            $usuario->setNombre($_POST['nombre']);
            $usuario->setApellidos($_POST['apellidos']);
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);
            
            $save = $usuario->save();
            
            if ($save) {
                $_SESSION['register'] = "complete";
            }else {
                $_SESSION['register'] = "failed";
            }
        }else {
            $_SESSION['register'] = "failed";
        }
        //reedireccion
        //header("Location:".base_url."usuario/index");
        header("Location:".base_url."usuario/index");
    }

    public function login(){

        if (isset($_POST)) {
            //identificar al usuario
            //consulta a la base de datos
            $usuario = new usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);

            $identity = $usuario->login();
            
            //crear una session
            if ($identity && is_object($identity)) {
                
                $_SESSION['identity'] = $identity;

                if ($identity->rol == 'admin') {
                    $_SESSION['admin'] = true;
                }
            }else {
                $_SESSION['error_login'] = 'Identificacion fallida !!';
            }
        }
        header('Location:'.base_url);
        //require_once 'index-php';
    }

    public function logout(){

        if (isset($_SESSION['identity'])) {
            unset($_SESSION['identity']);
        }

        if (isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
        }
        header('Location:'.base_url);
        //require_once 'index.php';
    }
}
