<!DOCTYPE html>
<html>
<?php require_once 'procesamiento/NuevoUsuario.php' ?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Vinculación</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
                                    <P class=" h4 desc-inicio">Para ingresar debes iniciar sesión. Si aún no tienes una cuenta puedes registrarte como alumno o como empresa, posteriormente te será notificado mediante correo.</P>
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

                                        <input class="btn btn-inicio btn-user btn-block" type="submit" value="Iniciar Sesión">

                                        <hr>
                                    </form>
                                    
                                    <!--Modal ////////////////////////////////////
                                 /////////////////////////AQUI VA/////////////////////////////////
                                 -->

                                 <div class="form-group text-center">
                                    <a href="" class="text-primary d-block" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Registrate</a>
                                </div>

                                    <div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="false">


                                        <div class="modal-dialog" role="document">

                                            <div class="modal-content">

                                                <div class="container" style="margin-top: 20px;">


            <ul class="nav nav-pills mb-3 selects" id="pills-tab" role="tablist">
            <li class="nav-item item1">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#alumno" role="tab" aria-controls="pills-home" aria-selected="true">Alumno</a>
            </li>
            <li class="nav-item item1">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#empresa" role="tab" aria-controls="pills-profile" aria-selected="false">Empresa</a>
            </li>

            </ul>
            <div class="tab-content" id="pills-tabContent">



                                                        <div class="tab-pane fade show active " role="tabpanel" id="alumno" role="tabpanel" aria-labelledby="pills-profile-tab">


                                                                <div class="col-lg-12">
                                                                    <div class="p-5">
                                                                        <h6>Como Alumno puedes enviar una solicitud de registro en este apartado..</h6>




                                                                        <?php require_once 'vistas/registrarUsuario.php'?>

                                                                        <hr>



                                                                    </div>
                                                                </div>

                                                        </div>


                                              <div class="tab-pane fade" id="empresa" role="tabpanel" aria-labelledby="pills-profile-tab">

                                 <div class="row">
                                      <div class="col-lg-12">
                                       <div class="p-5">
                                      <h6>Como empresa puedes enviar una solicitud de registro en este apartado..</h6>

                            <?php require_once 'vistas/registrarEmpresa.php'?>

                                                                    </div>
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
