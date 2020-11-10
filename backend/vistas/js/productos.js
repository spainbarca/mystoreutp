/*=============================================
Tabla Usuarios
=============================================*/

// $.ajax({

//     "url":"ajax/tablaUsuarios.ajax.php",
//     success: function(respuesta){
      
//      console.log("respuesta", respuesta);

//     }

// })

/* SUBIENDO LA FOTO DEL USUARIO*/
$(".nuevaImagen").change(function(){
	var imagen = this.files[0];

	/* Validar el formato de imagen (png-jpg)*/
	if(imagen["type"]!= "image/jpeg" && imagen["type"]!= "image/png"){
		$(".nuevaImagen").val("");
			swal({
				title: 				"Error al subir la imagen",
				text: 				"¡La imagen debe estar en formato PNG o JPG!",
				type:				"error",
				confirmButtonText: 	"¡Cerrar!"   
			});

	}else if(imagen["size"] > 2000000){
		$(".nuevaImagen").val("");
			swal({
				title: 				"Error al subir imagen",
				text: 				"¡La imagen no debe pesar más de 2 MB!",
				type: 				"error",
				confirmButtonText: 	"¡Cerrar!"  
			});
	}else{
		var datosImagen = new FileReader;
		datosImagen.readAsDataURL(imagen);

		$(datosImagen).on("load", function(event){
			var rutaImagen = event.target.result;

			$(".previsualizarImagen").attr("src", rutaImagen);
		}) 
	}
})


/*=============================================
Escoger Características con ICHECK
=============================================*/

$('input[type="checkbox"], input[type="radio"]').iCheck({

	checkboxClass: 'icheckbox_flat-blue',
	radioClass   : 'iradio_flat-blue'
})

var caracteristicasProducto = [];
var editarCaracteristicasProducto = [];

$(".checkbox, .editarCheckbox").on("ifChecked", function(){

	var item = $(this).val().split(",")[0];
	var icono = $(this).val().split(",")[1];

	caracteristicasProducto.push({

		"item": item,
		"icono": icono

	})

	$("input[name='caracteristicasProducto']").val(JSON.stringify(caracteristicasProducto));

  editarCaracteristicasProducto.push({

	 	"item": item,
		"icono": icono

	})

	$("input[name='editarCaracteristicasProducto']").val(JSON.stringify( editarCaracteristicasProducto));

})

$(".checkbox, .editarCheckbox").on("ifUnchecked", function(){

	var item = $(this).val().split(",")[0];
	var icono = $(this).val().split(",")[1];

	for(var i = 0; i < caracteristicasProducto.length; i++){

		if(caracteristicasProducto[i]["item"] == item){

			caracteristicasProducto.splice(i, 1);

			$("input[name='caracteristicasProducto']").val(JSON.stringify(caracteristicasProducto));

		}

	}

	for(var i = 0; i < editarCaracteristicasProducto.length; i++){

		if(editarCaracteristicasProducto[i]["item"] == item){

      editarCaracteristicasProducto.splice(i, 1);

	      $("input[name='editarCaracteristicasProducto']").val(JSON.stringify(editarCaracteristicasProducto));

	    }

	}

})



/* CARGAR LA TABLA DINÁMICA DE PRODUCTOS*/
$('.tablaProductos').DataTable( {
    
  "ajax":"ajax/tablaProductos.ajax.php",
  "deferRender": true,
  "retrieve": true,
  "processing": true,
  "language": {
      "sProcessing": "Procesando...",
      "sSearch": "Buscar:",
      "sSearchPlaceholder": "Término de búsqueda",
      "sZeroRecords": "No se encontraron resultados",
      "sEmptyTable": "Ningún dato disponible en esta tabla",
      "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
      "sInfoPostFix": "",
      "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
      "sLoadingRecords": "Cargando...",
      "sLengthMenu": "Mostrar _MENU_ registros",
      "oPaginate": {
          "sFirst": "Primero",
          "sLast": "Último",
          "sNext": "Siguiente",
          "sPrevious": "Anterior"
      },
      "oAria": {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
}
} 
); 


/*=============================================
SELECTS ANIDADOS
=============================================*/

$(".selectTipoProducto").change(function(){

  var ruta = $(this).val();

  if(ruta != ""){

    $(".selectTemaProducto").html("");

  }else{

    $(".selectTemaProducto").html('<option>Temática de producto</option>')

  }

  var datos = new FormData();
  datos.append("ruta", ruta);
  console.log("ruta", ruta);

  $.ajax({

    url:"ajax/habitaciones.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType:"json",
    success:function(respuesta){

      

      $("input[name='id']").val(respuesta[0]["id"]);

      //console.log("respuesta", respuesta[1]["estilo"]);
      
      for(var i = 0; i < respuesta.length; i++){

        $(".selectTemaProducto").append('<option value="'+respuesta[i]["id_h"]+'">'+respuesta[i]["estilo"]+'</option>')

      }

    }

  })
})


/* Agregando nuevo precio de venta */
$("#nuevoPrecioCompra, #editarPrecioCompra").change(function(){
    
  if($(".porcentaje").prop("checked")){

      var valorPorcentaje = $(".nuevoPorcentaje").val();
      
      var porcentaje = Number(($("#nuevoPrecioCompra").val()*valorPorcentaje/100))+Number($("#nuevoPrecioCompra").val());
      
      var editarPorcentaje = Number(($("#editarPrecioCompra").val()*valorPorcentaje/100))+Number($("#editarPrecioCompra").val());
      
      $("#nuevoPrecioVenta").val(porcentaje);
      $("#nuevoPrecioVenta").prop("readonly", true);

      $("#editarPrecioVenta").val(editarPorcentaje);
      $("#editarPrecioVenta").prop("readonly", true);
  }
})

/* Cambio de porcentaje */
$(".nuevoPorcentaje").change(function(){
    
  if($(".porcentaje").prop("checked")){

      var valorPorcentaje = $(this).val();
      
      var porcentaje = Number(($("#nuevoPrecioCompra").val()*valorPorcentaje/100))+Number($("#nuevoPrecioCompra").val());
      //console.log("porcentaje", porcentaje);
      var editarPorcentaje = Number(($("#editarPrecioCompra").val()*valorPorcentaje/100))+Number($("#editarPrecioCompra").val());
      
      $("#nuevoPrecioVenta").val(porcentaje);
      $("#nuevoPrecioVenta").prop("readonly", true);

      $("#editarPrecioVenta").val(editarPorcentaje);
      $("#editarPrecioVenta").prop("readonly", true);
  }
})

$(".porcentaje").on("ifUnchecked",function(){
  $("#nuevoPrecioVenta").prop("readonly", false);
  $("#editarPrecioVenta").prop("readonly", false);
})

$(".porcentaje").on("ifChecked",function(){
  $("#nuevoPrecioVenta").prop("readonly", true);
  $("#editarPrecioVenta").prop("readonly", true);
})


/* SUBIENDO LA IMAGEN DEL PRODUCTO*/
$(".nuevaImagen").change(function(){
	var imagen = this.files[0];

	/* Validar el formato de imagen (png-jpg)*/
	if(imagen["type"]!= "image/jpeg" && imagen["type"]!= "image/png"){
		$(".nuevaImagen").val("");
			swal({
				title: 				"Error al subir la imagen",
				text: 				"¡La imagen debe estar en formato PNG o JPG!",
				type:				"error",
				confirmButtonText: 	"¡Cerrar!"   
			});

	}else if(imagen["size"] > 2000000){
		$(".nuevaImagen").val("");
			swal({
				title: 				"Error al subir imagen",
				text: 				"¡La imagen no debe pesar más de 2 MB!",
				type: 				"error",
				confirmButtonText: 	"¡Cerrar!"  
			});
	}else{
		var datosImagen = new FileReader;
		datosImagen.readAsDataURL(imagen);

		$(datosImagen).on("load", function(event){
			var rutaImagen = event.target.result;

			$(".previsualizar").attr("src", rutaImagen);
		}) 
	}
})

/* EDITAR PRODUCTO */
$(".tablaProductos tbody").on("click", "button.btnEditarProducto", function(){

  var idProducto = $(this).attr("idProducto");
  //console.log("idProducto", idProducto);

  var datos = new FormData();
  datos.append("idProducto", idProducto);

  $.ajax({

      url:"ajax/productos.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
      
          var datosCategoria = new FormData();
          datosCategoria.append("idCategoria",respuesta["id_categoria"]);

          

          $.ajax({

              url:"ajax/categorias.ajax.php",
              method: "POST",
              data: datosCategoria,
              cache: false,
              contentType: false,
              processData: false,
              dataType:"json",
              success:function(respuesta){
                  
                  //console.log("respuesta", respuesta);
                  $("#editarCategoria").val(respuesta["id"]);
                  $("#editarCategoria").html(respuesta["tipo"]);

              }
          })


          var datosSubcategoria = new FormData();
          datosSubcategoria.append("idSubcategoria",respuesta["id_subcategoria"]);
          

        console.log("idsubcat",respuesta["id_subcategoria"]);

          $.ajax({

            url:"ajax/habitaciones.ajax.php",
            method: "POST",
            data: datosSubcategoria,
            cache: false,
            contentType: false,
            processData: false,
            dataType:"json",
            success:function(respuesta){
                
                //console.log("respuesta", respuesta);
                $("#editarSubcategoria").val(respuesta["id_h"]);
                $("#editarSubcategoria").html(respuesta["estilo"]);

                console.log("idsubcat",respuesta["estilo"]);

            }
        })

          $("#editarCodigo").val(respuesta["codigo"]);
          $("#editarDescripcion").val(respuesta["descripcion"]);
          $("#editarStock").val(respuesta["stock"]);
          $("#editarPrecioCompra").val(respuesta["precio_compra"]);
          $("#editarPrecioVenta").val(respuesta["precio_venta"]);

          if(respuesta["imagen"] != ""){

              $("#imagenActual").val(respuesta["imagen"]);
              $(".previsualizarImagen").attr("src",  respuesta["imagen"]);
              
          }
      }
  })
})

/* Eliminar producto */
$(".tablaProductos tbody").on("click", "button.btnEliminarProducto", function(){

	var idProducto = $(this).attr("idProducto");
    //console.log("idProducto", idProducto);
    var codigo = $(this).attr("codigo");
	var imagen = $(this).attr("imagen");
	
	swal({

		title: '¿Está seguro de borrar el producto?',
		text: "¡Si no lo está puede cancelar la accíón!",
		type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar producto!'
        }).then(function(result){
        if (result.value) {

        	window.location = "index.php?ruta=productos&idProducto="+idProducto+"&imagen="+imagen+"&codigo="+codigo;
        }


	})
})


/* Eliminar producto */
$(document).on("click", ".btnEliminarProducto", function(){

	var idProducto = $(this).attr("idProducto");

	swal({
	    title: '¿Está seguro de eliminar el producto?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, eliminar producto!'
	  }).then(function(result){
		
		if(result.value){

	    	var datos = new FormData();
       		datos.append("idEliminar", idProducto);

       		$.ajax({

	          url:"ajax/productos.ajax.php",
	          method: "POST",
	          data: datos,
	          cache: false,
	          contentType: false,
	          processData: false,
	          success:function(respuesta){

	          	if(respuesta == "ok"){

	          		swal({
	                  type: "success",
	                  title: "¡CORRECTO!",
	                  text: "El producto ha sido borrado correctamente",
	                  showConfirmButton: true,
	                  confirmButtonText: "Cerrar",
	                  closeOnConfirm: false
	                 }).then(function(result){

	                    if(result.value){

	                      window.location = "productos";

	                    }
	                
	                })

	          	}

	          }

	        })  

	    }

	})

})
	
	