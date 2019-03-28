<?php

require_once 'sesion.php';

$sesion = new Sesion();
$sesion->cerrarSesion();

header('Location: ../index.php');
