<?php require_once '../vistas/cabezera.php'; ?>

<?php require_once '../vistas/sidebar.php'; ?>
  
<?php require_once '../vistas/labelPerfil.php'; ?>


<div class="container-fluid">
<ol class="breadcrumb">
            <li class="breadcrumb-item">
            Publicación
            </li>
            <li class="breadcrumb-item active">Nueva publicación</li>
        </ol>
  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

      <div class="card o-hidden border-0 shadow-lg mb-4">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-12">
        <div class="p-5">
            <div class="text-center">
                  <h1>Nueva publicación</h1>
                </div>
            <form action="post" class="user">
              <div class="form-group">
                <p for="tipo ">
                      Tipo de publicación
                    <select name="" id="tipo" class="custom-select">
                    <option value="">
                            
                        </option>
                        <option value="">
                            Residencia
                        </option>
                        <option value="">
                            Servicio social
                        </option>
                        <option value="">
                            Bolsa de trabajo
                        </option>
                    </select>
                </p>
              </div>

                <div class="form-group">
                   <input type="text" maxlength="24" placeholder="Ingrese el titulo del proyecto" class="form-control form-control-user" aria-describedby="emailHelp">

                </div>

                <div class="form-group">
                    <P>
                        Descripción del proyecto
                    <textarea class="form-control" name="" id="" rows="7" placeholder="Ingrese la descripción de su proyecto">

                    </textarea>
                    </P>
                </div>
                <input id="" type="submit" value="Registrar publicación" href="#" class="btn btn-inicio btn-user btn-block" />
            </form>
            </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>
</div>
    
<?php require_once '../vistas/footer.php'; ?>

<?php require_once '../vistas/bloqueScriptTabla.php'; ?>