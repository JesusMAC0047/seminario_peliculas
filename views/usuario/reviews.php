<h1>Mis reviews</h1>

<?php 
    require_once 'models/categoria.php';
    require_once 'models/review.php';
    require_once 'models/usuario.php';

    $sess_id = $_SESSION['identity']->id;

    $pelicula = utils::showPelicula();
    $pel = $pelicula->fetch_object(); 
    $id_pel = $pel->id;
    $a = 1;
 ?>

<?php while ($a <= $id_pel): ?>
<?php

    $pelicula_rev = new pelicula();
    $pel_rev = $pelicula_rev->getOnePelicula($a);
    $rev_p = $pel_rev->fetch_object();
    $pel_id = $rev_p->id;
    $cat = $rev_p->id_categoria;

    $categoria = new categoria();
    $categ = $categoria->getCategoria($cat);
    $cat_id = $categ->fetch_object();

    $review = new review();
    $rev = $review->getOne($pel_id);
    $desc = $rev->fetch_object();

    $user_id = $desc->id_usuario;
?>
<?php    if ($user_id == $sess_id): ?>

<?php     
        $usuario = new usuario();
        $user = $usuario->getUser($user_id);
        $us = $user->fetch_object();
?>

<div id="reseña">
    <a href="">
        <div id="caja-imagen">
            <img src="<?= $rev_p->cartel?>" alt="imagen_default" class="imagen">
        </div>
        <div id="caja-descripcion">
            <article>

                <h2 class="titulo"><?= $rev_p->titulo ?></h2>
                <span class="span"><?= $rev_p->estreno ?> | <?= $cat_id->nombre ?> |
                    <?= $us->nombre?><?= $us->apellidos?></span>
                <P class="texto">
                    <?= $desc->descripcion ?>
                </P>

            </article>
        </div>
    </a>
</div>

<?php endif; ?>
<?php $a++; ?>
<?php endwhile;?>