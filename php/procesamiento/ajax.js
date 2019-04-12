

function paginate(offset, limit)
{
	//obtenemos los posts via get con jQuery
	$.get("data.php/?offset=" + offset + "&limit=" + limit, function(data){
		if(data)
		{
			$html = "";
			//parseamos el json
			json = JSON.parse(data);
			//lo recorremos e insertamos en la variable $html
			for(datos in json.publicacion_bancos)
			{
				var datad= json.publicacion_bancos[datos].descripcion;
				$html += '<div class="border rounded p-3 mb-4">';
				/*$html += "<p>Id: " + json.posts[datos].id + "</p>";*/
					$html += "<h4>" + json.publicacion_bancos[datos].titulo + "</h4>"; 
					$html += '<hr class="sidebar-divider">';
					$html += "<div>" + datad.substr(0,180) +"..."+ "</div>";
					$html += '<p class="mt-2">' + json.publicacion_bancos[datos].fecha + "</p>";
					$html += '<a class="" href="" data-toggle="modal" data-target="#modalResident">';
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

//al cargar la página llamamos a la función paginate
$(window).bind("load", function(){
	paginate();
})