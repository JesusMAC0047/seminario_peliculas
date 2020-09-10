<h1>Ultimo agregado</h1>

<?php 
    require_once 'models/categoria.php';
    require_once 'models/review.php';
    require_once 'models/usuario.php';

    $pelicula = utils::showPelicula();
    $pel = $pelicula->fetch_object(); 
    $cat = $pel->id_categoria;
    
    $categoria = new categoria();
    $categ = $categoria->getCategoria($cat);
    $cat_id = $categ->fetch_object();

    $pel_id = $pel->id;
    $review = new review();
    $rev = $review->getOne($pel_id);
    $desc = $rev->fetch_object();

    $user_id = $desc->id_usuario;
    $usuario = new usuario();
    $user = $usuario->getUser($user_id);
    $us = $user->fetch_object();
 ?>

<div id="reseña">
        <div id="caja-imagen">
            <img src="uploads/images/<?=$pel->cartel?>" alt="imagen_default" class="imagen" width='175' height='225'>
        </div>
        <div id="caja-descripcion">
            <article>

                <h2 class="titulo"><?= $pel->titulo ?></h2>
                <span class="span"><?= $pel->estreno ?> | <?= $cat_id->nombre ?> |
                    <?= $us->nombre?> <?= $us->apellidos?></span>
                <P class="texto">
                    <?= $desc->descripcion ?>
                </P>

            </article>
        </div>
</div>
<form action="<?=base_url?>pelicula/reviews" method="post">
    <input type="submit" value="Ver todas las reviews" class="centrado">
</form>
