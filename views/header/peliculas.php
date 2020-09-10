<h1>Lista de peliculas</h1>

<?php
$peliculas = utils::showPeliculas();
?>

<div class='lista'>
    <table>
        <tr>
            <th>Titulos</th>
        </tr>
        <?php while($pel = $peliculas->fetch_object()): ?>
            <tr>
                <td><?=$pel->titulo;?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>