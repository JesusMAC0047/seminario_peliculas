<?php
require_once 'helpers/utils.php';
require_once 'models/actores.php';
require_once 'models/reparto.php';

class actoresController{

    public function index(){
        
        require_once 'views/review/nuevosActores.php';
    }

    public function notificacion(){

        require_once 'views/usuario/notificacion.php';
    }

    public function save(){

        //Actores seleccionados con opcion multiple
        $actor1 = isset($_POST['actor1']) ? $_POST['actor1'] : false;
        $actor2 = isset($_POST['actor2']) ? $_POST['actor2'] : false;
        $actor3 = isset($_POST['actor3']) ? $_POST['actor3'] : false;
        $actor4 = isset($_POST['actor4']) ? $_POST['actor4'] : false;

        //Recoge el id de la ultima pelicula
        $pelicula = utils::showPelicula();
        $peli_id = $pelicula->fetch_object();
        $peli = $peli_id->id;

        //Actor 1
       if ($actor1 && $actor1 != 'Ninguno') {

            $reparto = new reparto();
            $reparto->setId_pelicula($peli);
            $reparto->setId_actor($actor1);
            $reparto->save();

        }

        //Actor 2
       if ($actor2 && $actor2 != 'Ninguno') {

            $reparto = new reparto();
            $reparto->setId_pelicula($peli);
            $reparto->setId_actor($actor2);
            $reparto->save();
        }

        //Actor 3
       if ($actor3 && $actor3 != 'Ninguno') {

            $reparto = new reparto();
            $reparto->setId_pelicula($peli);
            $reparto->setId_actor($actor3);
            $reparto->save();
        }

        //Actor 4
       if ($actor4 && $actor4 != 'Ninguno') {

            $reparto = new reparto();
            $reparto->setId_pelicula($peli);
            $reparto->setId_actor($actor4);
            $reparto->save();
        }

        header('Location:'.base_url.'actores/index');
    }

    public function saveNuevos(){

        $pelicula = utils::showPelicula();
        $peli_id = $pelicula->fetch_object();
        $peli = $peli_id->id;

        if (isset($_POST)) {
         
            for ($i=1; $i <= 4 ; $i++) { 
                
                $nombre = isset($_POST['actor_nombre'.$i]) ? $_POST['actor_nombre'.$i] : false;
                $apellidos = isset($_POST['actor_apellidos'.$i]) ? $_POST['actor_apellidos'.$i] : false;

                if ($nombre && $apellidos) {

                    $actor = utils::showActor();
                    $actor_id = $actor->id;
                    $act_id = $actor_id + 1;
                    
                    $actores = new actores();
                    $actores->setId($act_id);
                    $actores->setId_pelicula($peli);
                    $actores->setNombre($nombre);
                    $actores->setApellidos($apellidos);
                    $actores->save();
                } 
            }
            $_SESSION['REVIEW'] = 'complete';
        }else {
            $_SESSION['REVIEW'] = 'incomplete';
        }

        header('Location:'.base_url.'actores/notificacion');        
    }
}