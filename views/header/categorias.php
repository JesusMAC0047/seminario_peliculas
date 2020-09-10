<h1>Lista de categorias</h1>

<?php
    $categorias = utils::showCategorias();
?>

<div class='lista'>
    <table>
        <?php while($cat = $categorias->fetch_object()): ?>
            <tr>
            <a href="<?=base_url.'pelicula/showCategoria'?>">
            <td><?=$cat->nombre;?></td>
            </a>
            </tr>
        <?php endwhile; ?>
    </table>
</div>