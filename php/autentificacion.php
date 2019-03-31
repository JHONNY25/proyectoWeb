<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Vinculación</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-flex text-center align-items-center text-inicio">
                                <div class="margen-inicio">
                                    <h1 class="h2 text-gray-900 mb-4">BIENVENIDO AL SGV</h1>
                                    <P class=" h4 desc-inicio">Para ingresar debes iniciar sesión. Si aún no tienes una cuenta debes de acudir
                                        con el responsable en vinculación.</P>
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h2 text-gray-900 mb-4">BIENVENIDO</h1>
                                    </div>
                                    <div class="text-center m-3">
                                        <img src="img/squirrel.png" alt="">
                                    </div>

                                    <form class="user" method="POST" action="">

                                        <?php 
                    if(isset($errorLogin)){
                        echo  "<div class='alert alert-danger' role='alert'>". $errorLogin ."</div>";
                    } 
                  ?>

                                        <div class="form-group">
                                            <input type="text" name="usuario" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Ingrese su numero de control o clave">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="pass" class="form-control form-control-user" id="exampleInputPassword" placeholder="Ingrese su contraseña">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Recordarme</label>
                                                <hr>

                                            </div>

                                        </div>


                                        <input class="btn btn-inicio btn-user btn-block" type="submit" value="Iniciar Sesión">

                                        <hr>
                                    </form>
                                    <hr>


                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">¿Olvidaste tu contraseña?</a>

                                        <hr>
                                    </div>
                                    <!--Modal ////////////////////////////////////
                                 /////////////////////////AQUI VA/////////////////////////////////
                                 -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Registrate</button>


                                    <div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="false">





                                        <div class="modal-dialog" role="document">

                                            <div class="modal-content">








                                                <div class="container" style="margin-top: 20px;">

                                                    <ul class="nav nav-tabs ">

                                                        <li class=" nav show active"> <a href="#alumno" data-toggle="tab" aria-selected="true"><button class="btn">Alumno </button></a> </li>

                                                        <li class=""> <a href="#empresa" data-toggle="tab"><button class="btn">Empresa </button></a> </li>

                                                    </ul>

                                                    <div class="tab-content">


                                                        <div class="tab-pane fade show active " role="tabpanel" id="alumno">

                                                            <form>
                                                                <div class="col-lg-12">
                                                                    <div class="p-5">
                                                                        <h6>Como Alumno puedes enviar una solicitud de registro en este apartado..</h6>


                                                                        <hr>
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
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control form-control-user" name="nombre" aria-describedby="emailHelp" placeholder="Nombre de la empresa">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control form-control-user" name="telefono" aria-describedby="emailHelp" placeholder="Telefono">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control form-control-user" name="correo" aria-describedby="emailHelp" placeholder="Correo">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <input type="file" class="form-control form-control-user" name="correo" aria-describedby="emailHelp" placeholder="kardex">
                                                                            </div>
                                                                            <hr>

                                                                        </form>
                                                                        <hr>



                                                                    </div>
                                                                </div>
                                                            </form>

                                                        </div>


                                              <div class="tab-pane fade" id="empresa">

                                                  <div class="row">
                                                   <div class="col-lg-12">
                                                    <div class="p-5">
                                                         <h6>Como empresa puedes enviar una solicitud de registro en este apartado..</h6>

                                                         <form action="php/procesamiento/consultasEmpresa.php" class="user" method="post">
                                                                  <hr>
                                                          <h5>Datos Generales</h5>
                                                         <div class="form-group">
                                                      <input type="text" class="form-control form-control-user" name="nombre_emp"  placeholder="Nombre de la empresa" required maxlength="35" minlength="20"  >
                                                               </div>
                                                        <div class="form-group">
                                                    <input type="tel"  class="form-control form-control-user" name="telefono" maxlength="10" placeholder="Telefono" required  pattern="[0-9]{10}" >
                                                            </div>
                                                           <div class="form-group">
                                                    <input type="email" class="form-control form-control-user" name="correo" a placeholder="Correo electronico" required maxlength="40" minlength="25" >
                                                           </div>
                                                         <hr>
                                                          <button type="submit" class="btn btn-primary">Enviar Registro</button>
                                                            <hr>
                                                         </form>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <hr>
                                    <!-- final Modal ////////////////////////////-->

                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
