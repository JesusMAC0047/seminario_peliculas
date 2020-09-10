<h1>Lista de artistas</h1>

<?php
$actores = utils::showActores();
?>

<div class='lista'>
    <table>
        <tr>
            <th>Artistas</th>
        </tr>
        <?php while($act = $actores->fetch_object()): ?>
            <tr>
                <td><?=$act->nombre;?> <?=$act->apellidos;?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>