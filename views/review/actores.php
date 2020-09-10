<?php if(isset($edit) && isset($pro) && is_object($pro)): ?>
<h1>Editar review <?=$pro->nombre?></h1>
<?php $url_action = base_url."review/save&id=".$pro->id; ?>
<?php else: ?>
<h1>Crear una nueva review</h1>
<?php $url_action = base_url."review/save"; ?>
<?php endif; ?>

<div class="form_container">
    <!--Ingresa datos de los actores-->
    <h2>Ingrese datos de los actores</h2>
    <form action=<?=base_url."actores/save"?> method="post" enctype="multipart/form-data">

        <label for="actores">Lista de Actores</label>

    <!--Actor 1-->
        <label for="actor1">Actor 1:</label>
        <?php $actores = utils::showActores(); ?>
        <select name="actor1">
            <option>Ninguno</option>
            <?php while ($act = $actores->fetch_object()): ?>
            <option value="<?=$act->id?>"
                <?=isset($pro) && is_object($pro) && $cat->id == $pro->categoria_id ? 'selected' : ''; ?>>
                <?=$act->nombre?> <?=$act->apellidos?>
            </option>
            <?php endwhile;?>
        </select>

    <!--Actor 2-->
        <label for="actor2">Actor 2:</label>
        <?php $actores = utils::showActores(); ?>
        <select name="actor2">
            <option>Ninguno</option>
            <?php while ($act = $actores->fetch_object()): ?>
            <option value="<?=$act->id?>"
                <?=isset($pro) && is_object($pro) && $cat->id == $pro->categoria_id ? 'selected' : ''; ?>>
                <?=$act->nombre?> <?=$act->apellidos?>
            </option>
            <?php endwhile;?>
        </select>

    <!--Actor 3-->
        <label for="actor3">Actor 3:</label>
        <?php $actores = utils::showActores(); ?>
        <select name="actor3">
            <option>Ninguno</option>
            <?php while ($act = $actores->fetch_object()): ?>
            <option value="<?=$act->id?>"
                <?=isset($pro) && is_object($pro) && $cat->id == $pro->categoria_id ? 'selected' : ''; ?>>
                <?=$act->nombre?> <?=$act->apellidos?>
            </option>
            <?php endwhile;?>
        </select>

    <!--Actor 4-->
        <label for="actor4">Actor 4:</label>
        <?php $actores = utils::showActores(); ?>
        <select name="actor4">
            <option>Ninguno</option>
            <?php while ($act = $actores->fetch_object()): ?>
            <option value="<?=$act->id?>"
                <?=isset($pro) && is_object($pro) && $cat->id == $pro->categoria_id ? 'selected' : ''; ?>>
                <?=$act->nombre?> <?=$act->apellidos?>
            </option>
            <?php endwhile;?>
        </select>

        <input type="submit" value="Siguiente">
    </form>
</div>