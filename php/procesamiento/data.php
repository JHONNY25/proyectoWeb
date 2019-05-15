<?php


//comprobamos que sea una petición ajax
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
{

	//llamamos a la clase paginacion
	require_once("paginacion.php");
	require_once '../user.php';
	
	$user = new User();

	$user->setUser($_SESSION['usuario']);
	$usuario = $user->getNombre();
	$user->getDetallesUsuario($usuario);

	$carrera = $user->getIdcarrera();

	//creamos una instancia
	$paginacion = new Paginacion();

	//comprobamos si han llegado las variables get para setearlas
	$offset = !isset($_GET["offset"]) || $_GET["offset"] == "undefined" ? 0 : $_GET["offset"];
	$limit = !isset($_GET["limit"]) || $_GET["limit"] == "undefined" ? 3 : $_GET["limit"];

	//obtenemos los posts
	$pag = $paginacion->get_posts($offset,$limit,2,$carrera);

	//obtenemos los enlaces para estos posts
	$links = $paginacion->crea_links(2,$carrera);
	
	//los devolvemos en formato json
	echo json_encode(array("publicacion_bancos" => $pag,"links" => $links));

}else{
	//si no es una petición ajax decimos que no existe 
	echo "Esta página no existe";

}