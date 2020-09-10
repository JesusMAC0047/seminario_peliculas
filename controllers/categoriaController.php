<?php
require_once 'models/categoria.php';

class categoriaController{

    public function index(){

        utils::isAdmin();
        $categoria = new categoria();
        $categorias = $categoria->getAll();

        require_once 'views/categoria/index.php';
    }

    public function crear(){

        utils::isAdmin();
        require_once 'views/categoria/crear.php';
    }

    public function save(){

        utils::isAdmin();

        if (isset($_POST) && isset($_POST['nombre'])) {

            //guardar la categoria en bd
            $categoria = new categoria();
            $categoria->setNombre($_POST['nombre']);
            $categoria->save();
        }
        header('Location:'.base_url.'categoria/index');
    }
}