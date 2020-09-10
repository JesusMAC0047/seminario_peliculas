<?php
require_once 'models/review.php';
require_once 'models/actores.php';
require_once 'models/reparto.php';
require_once 'models/pelicula.php';
require_once 'helpers/utils.php';

class reviewController{

    public function index(){
        
        require_once 'views/review/crear.php';
    }

    public function Actor(){
        require_once 'views/review/actores.php';
    }

    public function save(){

        if (isset($_POST)) {

            $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : false;
            $review = isset($_POST['review']) ? $_POST['review'] : false;
            $estreno = isset($_POST['estreno']) ? $_POST['estreno'] : false;
            $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
            

            if ($titulo && $review && $estreno && $categoria) {

                $pelicula = utils::showPelicula();
                $peli_id = $pelicula->fetch_object();
                $peli = $peli_id->id;
                $pel_id = $peli + 1;

                $sess_id = $_SESSION['identity']->id;
                
                $producto = new review();
                $producto->setUsuario_id($sess_id);
                $producto->setPelicula_id($pel_id);
                $producto->setCategoria_id($categoria);
                $producto->setTitulo($titulo);
                $producto->setReview($review);
                $producto->setEstreno($estreno);

                //guardar la imagen
                if(isset($_FILES['imagen'])){

                    $file = $_FILES['imagen'];
                    $fileName = $file['name'];
                    $mimeType = $file['type'];

                    //se comprueba ti el tipo de archivo es el de una imagen
                    if ($mimeType == "image/jpg" ||
                        $mimeType == "image.jpeg" ||
                        $mimeType == "image/png" ||
                        $mimeType == "image/gif") {
                        
                        //comprueba si existe un directorio para las uploads 
                        if (!is_dir('uploads/images')) {
                            //si no existe la crea
                            mkdir('uploads/images', 0777, true);
                        }
                        //mueve el archivo a la carpeta
                        move_uploaded_file($file['tmp_name'], 'uploads/images/'.$fileName);
                        $producto->setImagen($fileName);
                    }
                }

                //se verifica si llega el metodo get id se edita, de lo contrario se guarda
                if (isset($_GET['id'])) {
                    
                    $id = $_GET['id'];
                    $producto->setId($id);

                    $save = $producto->edit();
                }else{
                    $save = $producto->save();
                }

                if ($save) {
                    $_SERVER['review'] = "guardado";
                }else {
                    $_SESSION['review'] = "fallo";
                }
            }else {
                $_SESSION['producto'] = "failed";
            }
        }else {
            $_SESSION['producto'] = "failed";
        }

    header('Location:'.base_url.'review/actor');
    }
}