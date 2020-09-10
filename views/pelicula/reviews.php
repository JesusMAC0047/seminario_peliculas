<h1>Reviews</h1>

<?php 
    require_once 'models/categoria.php';
    require_once 'models/review.php';
    require_once 'models/usuario.php';
    require_once 'models/reparto.php';

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
    $usuario = new usuario();
    $user = $usuario->getUser($user_id);
    $us = $user->fetch_object();

    $reparto = new reparto();
    $elenco = $reparto->getOne($pel_id);
    $elen = $elenco->fetch_object();
    $z = $elen->id;
    
    $artistas = new reparto();
    $art = $artistas->showArtista($z);
    
?>

<div id="reseña">
        <div id="caja-imagen">
            <img src="../uploads/images/<?=$rev_p->cartel?>" alt="imagen_default" class="imagen" width='175' height='225'>
        </div>
        <div id="caja-descripcion">
            <article>

                <h2 class="titulo"><?= $rev_p->titulo ?></h2>
                <span class="span"><?= $rev_p->estreno ?> | <?= $cat_id->nombre ?> |
                    <?= $us->nombre?> <?= $us->apellidos?></span>
                <P class="texto">
                    <?= $desc->descripcion ?>
                </P>
                <p>Elenco</p>
                <ul class="elenco">
                <?php while ($act = $art->fetch_object()): ?>
                    <li> <?=$act->nombre?> <?=$act->apellidos?> </li>
                <?php endwhile;?>
                </ul>
            </article>
        </div>
</div>

<?php $a++; ?>
<?php endwhile;?>
