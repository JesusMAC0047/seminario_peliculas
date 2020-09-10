<aside id="aside">
        <?php if(!isset($_SESSION['identity'])): ?>
        <div id="login" class="widget">
            <h3 class="blue">Iniciar Sesion</h3>
            <form action="<?=base_url?>usuario/login" method="post">

                <label for="email">Email</label>
                <input type="email" name="email">

                <label for="password">Contraseña</label>
                <input type="password" name="password">

                <input type="submit" value="enviar">
            </form>
    </div>
    <div id="registrarse" class="widget">
        <h3 class="orange">Registrate</h3>
        <form action="<?=base_url?>usuario/save" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required>

            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="password">Contraseña:</label>
            <input type="password" name="password" required>

            <input type="submit" value="Registrarse">
        </form>
    </div>
        <?php else: ?>
        <div id="inicio" class="widget">
            <h3 class="blue"><?=$_SESSION['identity']->nombre?> <?=$_SESSION['identity']->apellidos?></h3>
        <ul>
        <?php endif; ?>
            <?php if(isset($_SESSION['admin'])): ?>
                    <li><a href="<?=base_url?>categoria/index">Gestionar categorias</a></li>
            <?php endif; ?>
            <?php if(isset($_SESSION['identity'])): ?>
                    <li><a href="<?=base_url?>usuario/misReviews">Mis reviews</a></li>
                    <li><a href="<?=base_url?>review/index">Crear una review</a></li>
                    <li><a href="<?=base_url?>usuario/logout">Cerrar sesion</a></li>
        </ul>
        </div>
            <?php endif; ?>
</aside>
<!--Fin SIDEBAR-->
<!--CONTENIDO-->
<div id="central">