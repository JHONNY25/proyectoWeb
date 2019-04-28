<?php


//llamamos a la clase paginacion
	require_once("paginacion.php");

	//creamos una instancia
	$paginacion = new Paginacion();

	//comprobamos si han llegado las variables get para setearlas
	$offset = !isset($_GET["offset"]) || $_GET["offset"] == "undefined" ? 0 : $_GET["offset"];
	$limit = !isset($_GET["limit"]) || $_GET["limit"] == "undefined" ? 3 : $_GET["limit"];

	if(isset($_POST['dato']) && isset($_POST['tipo'])){
        $busca = trim($_POST['dato']);
        $pag = $paginacion->get_postsBuscador($offset,$limit,$_POST['dato'],$_POST['tipo']);
        
   
        $publicaciones = array("valores" => $pag);
        //echo json_encode($publicaciones);
        if($publicaciones['valores'] != null){
            //obtenemos los enlaces para estos posts
            $links = $paginacion->crea_links($_POST['tipo']);
                        
            //los devolvemos en formato json
            echo json_encode(array("publicacion_bancos" => $pag,"links" => $links));
        }else if($publicaciones['valores'] == null){
            echo json_encode(array("error" => "<div id='error' class='alert alert-danger' role='alert'>No hay datos que coincidan con su busqueda</div>"));
        }
        
    }
    
    //echo json_encode(array("error" => "No hay datos que coincidan con su busqueda"));
/*
    $pag = $paginacion->get_postsBuscador($offset,$limit,'zxc');
        
   $publicaciones = array("valores" => $pag);
   //echo json_encode($publicaciones);
    if($publicaciones['valores'] != null){
        //obtenemos los enlaces para estos posts
        $links = $paginacion->crea_links();
                
        //los devolvemos en formato json
        echo json_encode(array("publicacion_bancos" => $pag,"links" => $links));
    }else if($publicaciones['valores'] == null){
        echo json_encode(array("error" => "<div class='alert alert-danger' role='alert'>No hay datos que coincidan con su busqueda</div>"));
    }*/
