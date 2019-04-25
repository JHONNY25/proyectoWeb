<?php require_once '../vistas/cabezera.php'; ?>
<?php if($user->getTipo() == 1){?>
<?php require_once '../vistas/sidebar.php'; ?>
  
<?php require_once '../vistas/labelPerfil.php'; ?>

<div>
vista de servicios para alumno
</div>
<?php require_once '../vistas/footer.php'; ?>

<?php require_once '../vistas/bloqueScriptTabla.php'; ?>

<?php }else{
        $host  = $_SERVER['HTTP_HOST'];

        header("Location: http://$host/proyectoWeb/");
        exit;
    } ?>
