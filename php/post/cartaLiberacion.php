<?php require_once '../vistas/cabezera.php'; ?>
<?php if($user->getTipo() == 0 || $user->getTipo() == 1){?>
<?php require_once '../vistas/sidebar.php'; ?>
  
<?php require_once '../vistas/labelPerfil.php'; ?>

<div class="container-fluid d-flex flex-wrap">
    <div class="col-md-6">
    <form>
        <div class="form-group">
            <Strong><h4 id="section1">Agregar carta de liberación</h4></Strong>
            <input type="file" class="form-control-file btn btn-add" id="exampleFormControlFile1">
        </div>
        <div>
            <img src="../../img/carta.jpg" alt="carta liberación" class="mw-100">
        </div>
    </form>
    </div>
  <!-- Grid column -->
  <div class="col-md-6 mb-4">
   <h4 id="section1"><strong>Comentarios</strong></h4>
    <!-- Exaple 1 -->
    <div>
    <div class="card example-1 scrollbar-ripe-malinka">
      <div class="card-body">
        <div class="border rounded mt-3">
            <h5 class="ml-2">Juanito perez</h5>
            <p class="ml-2">Mi nombre esta mal</p>
        </div>
        <div class="border rounded mt-3">
            <h5 class="ml-2">Francis jimenez</h5>
            <p class="ml-2">ok, la voy a cambiar</p>
        </div>
        <div class="border rounded mt-3">
            <h5 class="ml-2">Juanito perez</h5>
            <p class="ml-2">Perfecto, ahora si</p>
        </div>
        <div class="border rounded mt-3">
            <h5 class="ml-2">Francis jimenez</h5>
            <p class="ml-2">Imprimela y me la traes</p>
        </div>
      </div>
    </div>
    <!-- Exaple 1 -->
    <form class="form-inline mt-3">
        <div class="form-group mr-2 mb-2">
            <input type="password" class="form-control w-100" id="inputPassword2" placeholder="Añadir comentario">
        </div>
        <button type="submit" class="btn btn-add mb-2">Comentar</button>
        </form>
    </div>


  </div>
  <!-- Grid column -->
  </div>

    
<?php require_once '../vistas/footer.php'; ?>

<?php require_once '../vistas/bloqueScriptView.php'; ?>

<?php }else{
        $host  = $_SERVER['HTTP_HOST'];

        header("Location: http://$host/proyectoWeb/");
        exit;
    } ?>