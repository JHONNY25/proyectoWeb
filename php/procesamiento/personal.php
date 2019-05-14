<?php
require_once '../path.php';
require_once DIR_CONTROLLERS . 'PersonalController.php';

$controller = new PersonalController();

if (isset($_GET['action']) && !empty($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case "registrar":
            $controller->registrar();
            break;
        case "actualizar":
            $controller->actualizar();
            break;
        case "detalles":
            $controller->detalles();
            break;
        case "deshabilitar":
            $controller->deshabilitar();
            break;
        case "existe-usuario":
            $controller->existeUsuario();
            break;
        case "lista":
            $controller->getListaPersonas();
        case "existe-correo":
            $controller->existeCorreo();
    }

} else {
    $controller->index();
}