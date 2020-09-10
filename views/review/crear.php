<?php if(isset($edit) && isset($pro) && is_object($pro)): ?>
<h1>Editar review <?=$pro->nombre?></h1>
<?php $url_action = base_url."review/save&id=".$pro->id; ?>
<?php else: ?>
<h1>Crear una nueva review</h1>
<?php $url_action = base_url."review/save"; ?>
<?php endif; ?>

<div class="form_container">
    <!--Ingresa datos de la pelicula-->
    <h2>Inserte los datos de la pelicula</h2>
    <form action="<?=$url_action?>" method="post" enctype="multipart/form-data">
        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" value="<?=isset($pro) && is_object($pro) ? $pro->titulo : ''; ?>" required>

        <label for="estreno">Fecha de estreno:</label>
        <input type="date" name="estreno" value="<?=isset($pro) && is_object($pro) ? $pro->estreno : ''; ?>" required>

        <label for="review">Review:</label>
        <textarea name="review" cols="30" rows="10" required><?=isset($pro) && is_object($pro) ? $pro->review : ''; ?></textarea>

        <label for="categoria">Categoria:</label>
        <?php $categorias = utils::showCategorias();?>
        <select name="categoria" required>
            <?php while ($cat = $categorias->fetch_object()): ?>
            <option value="<?=$cat->id?>"
                <?=isset($pro) && is_object($pro) && $cat->id == $pro->categoria_id ? 'selected' : ''; ?>>
                <?=$cat->nombre?>
            </option>
            <?php endwhile;?>
        </select>

        <label for="imagen">Cartel:</label>
        <p>*Solo se podran subir imagenes en formato .png</p>
        </br>
        <?php if(isset($pro) && is_object($pro) && !empty($pro->imagen)): ?>
        <img src="<?=base_url?>uploads/images/<?=$pro->cartel?>" class="thumb">
        <?php endif; ?>
        <input type="file" name="imagen">

        <input type="submit" value="Siguiente">
    </form>
</div>