<?php require_once '../vistas/cabezera.php'; ?>

<?php require_once '../vistas/sidebar.php'; ?>

<?php require_once '../vistas/labelPerfil.php'; ?>

<div class="container">
<ol class="breadcrumb">
            <li class="breadcrumb-item">
            Empresas
            </li>
            <li class="breadcrumb-item active">Nueva Empresa</li>
        </ol>
  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-12">
              <div class="p-5">
                <div class="text-center">
                  <h1>Nueva Empresa</h1>
                </div>

                <form action="" class="user" method="post">
                  <hr>
                  <h5>Datos Generales</h5>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="nombre" aria-describedby="emailHelp" placeholder="Nombre de la empresa">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="telefono" aria-describedby="emailHelp" placeholder="Telefono">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="correo" aria-describedby="emailHelp" placeholder="Correo">
                  </div>
                  <hr>
                  <h5>Dirección de la empresa</h5>
                  <div class="form-group">
                    <input type="email" class="form-control form-control-user" name="correo" aria-describedby="emailHelp" placeholder="Estado">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="telefono" aria-describedby="emailHelp" placeholder="Delegación / Municipio">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="telefono" aria-describedby="emailHelp" placeholder="Colonia">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="telefono" aria-describedby="emailHelp" placeholder="Calle">
                  </div>

                  <div class="form-group">
                  </div>
                  <p><input type="submit" value="Registrar Empresa" href="#" class="btn btn-inicio btn-user btn-block" />
                  </p>

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

<?php require_once '../vistas/bloqueScriptView.php'; ?>