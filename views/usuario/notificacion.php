<h1>Notificacion</h1>
<div class="notificacion">

<?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'):?>
    <h3 class="green">Registro completado</h3>
<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
    <h3 class="red">Registro Fallido</h3>
<?php elseif(isset($errores)): ?>
    <h3 class="red"><?= $errores; ?></h3>
<?php elseif(isset($_SESSION['REVIEW']) && $_SESSION['REVIEW'] == 'complete'): ?>
    <h3 class="green">Review guardada con exito</h3>
<?php else: ?>
    <?php var_dump($_SESSION['REVIEW']);?>
<?php endif; ?>

</div>