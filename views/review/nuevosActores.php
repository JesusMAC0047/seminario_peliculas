<h1>Crear una nueva review</h1>
<!--Nuevos actores-->
<div class="form_container">
<h2>Nuevos actores</h2>
    <form action=<?=base_url."actores/saveNuevos"?> method="post" enctype="multipart/form-data">
        
        <label for="actor_nombre">Otros actores:</label>

        <label for="actor1">Actor 1</label>
        <label for="actor_nombre1">Nombre:</label>
        <input type="text" name="actor_nombre1">
        <label for="actor_apellidos1">Apellidos:</label>
        <input type="text" name="actor_apellidos1">

        <label for="actor1">Actor 2</label>
        <label for="actor_nombre2">Nombre:</label>
        <input type="text" name="actor_nombre2">
        <label for="actor_apellidos2">Apellidos:</label>
        <input type="text" name="actor_apellidos2">

        <label for="actor1">Actor 3</label>
        <label for="actor_nombre3">Nombre:</label>
        <input type="text" name="actor_nombre3">
        <label for="actor_apellidos3">Apellidos:</label>
        <input type="text" name="actor_apellidos3">

        <label for="actor1">Actor 4</label>
        <label for="actor_nombre4">Nombre:</label>
        <input type="text" name="actor_nombre4">
        <label for="actor_apellidos4">Apellidos:</label>
        <input type="text" name="actor_apellidos4">

        <input type="submit" value="Guardar actores nuevos">
    </form>
</div>