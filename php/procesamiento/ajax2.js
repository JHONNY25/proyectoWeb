

$('.alerta').hide();

String.prototype.trim = function() { return this.replace(/^\s+|\s+$/g, ""); };

$(document).on('keyup', '#buscador', function(){
	var busqueda = $(this).val().trim();
	if (!$('#noData').length) {
			if(busqueda != ''){
				buscador(busqueda,3);
			}else{
				$('.alerta').hide();
				paginate();
			}
	  }

});

$(document).on('click', '.page-link', function(){

	if ($('#error').length) {
		$('.alerta').hide();
	  }
});

function buscador(dato,tipo){

	$.ajax({
		url: 'buscador.php',
		type: 'POST',
		data: {dato: dato,
					tipo: tipo},
		dataType:"json",  
        success:function(data){  
			if(data.publicacion_bancos){
				$html = "";
				//parseamos el json
				//json = JSON.parse(data);
				//lo recorremos e insertamos en la variable $html
				for(datos in data.publicacion_bancos){
					var datad= data.publicacion_bancos[datos].descripcion;
					$html += '<div class="border rounded p-3 mb-4" >';
					/*$html += "<p>Id: " + json.posts[datos].id + "</p>";*/
						$html += "<h4>" + data.publicacion_bancos[datos].titulo + "</h4>"; 
						$html += '<hr class="sidebar-divider">';
						$html += "<div>" + datad.substr(0,180) +"..."+ "</div>";
						$html += '<p class="mt-2">' + data.publicacion_bancos[datos].fecha + "</p>";
						$html += '<a id="'+ data.publicacion_bancos[datos].id_publicacion_bancos +'" class="detalle" href="" data-toggle="modal" data-target="#modalResident">';
						$html += '<i class="fas fa-eye"></i>';
						$html += ' '+'Ver detalles</a>';
					$html += "</div>";
				}
				$('.alerta').hide();
				//cargamos los posts en el div paginacion
				$(".paginacion").html("");
				$(".paginacion").html($html);
				//cargamos los links en el div links
				$(".links").html("");
				$(".links").html(data.links);

			}else if(data.error){
				$(".paginacion").html("");
				$('.alerta').html(data.error);
				$('.alerta').show();
			}

        }  
	})

	
}

function paginate(offset, limit){
	//obtenemos los posts via get con jQuery
	$.get("data2.php/?offset=" + offset + "&limit=" + limit, function(data){
		if(data){
			$html = "";
			//parseamos el json
			json = JSON.parse(data);
			//lo recorremos e insertamos en la variable $html
			for(datos in json.publicacion_bancos){
				var datad= json.publicacion_bancos[datos].descripcion;
				$html += '<div class="border rounded p-3 mb-4" >';
				/*$html += "<p>Id: " + json.posts[datos].id + "</p>";*/
					$html += "<h4>" + json.publicacion_bancos[datos].titulo + "</h4>"; 
					$html += '<hr class="sidebar-divider">';
					$html += "<div>" + datad.substr(0,180) +"..."+ "</div>";
					$html += '<p class="mt-2">' + json.publicacion_bancos[datos].fecha + "</p>";
					$html += '<a id="'+ json.publicacion_bancos[datos].id_publicacion_bancos +'" class="detalle" href="" data-toggle="modal" data-target="#modalResident">';
					$html += '<i class="fas fa-eye"></i>';
					$html += ' '+'Ver detalles</a>';
            	$html += "</div>";
			}

			//cargamos los posts en el div paginacion
			$(".paginacion").html("");
			$(".paginacion").html($html);
			//cargamos los links en el div links
			$(".links").html("");
			$(".links").html(json.links);
			
		}
	})
}

$(document).on('click', '.detalle', function(){  
    var dato = $(this).attr("id");  

    if(dato != '') {  
         $.ajax({  
              url:"../procesamiento/jsonPublicacion.php",  
              method:"POST",  
              data:{dato:dato},
              dataType:"json",  
              success:function(data){  
				$('#titulo').html(data.titulo);
                   $('#empresa').html(data.empresa);
                   $('#descripcion').html(data.descripcion); 
                   $('#fecha').html(data.fecha);  
                   $('#modalResident').modal('show');  
              }  
         });  
    }            
  });


//al cargar la página llamamos a la función paginate
$(window).bind("load", function(){
	paginate();
})