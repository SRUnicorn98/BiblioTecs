function cargarformulario(arg){
//funcion que carga todos los formularios del sistema
 
		if(arg==1){ var url = "form_nuevo_usuario"; }
    if(arg==2){ var url = "form_cargar_datos_usuarios";  }
		$("#contenido_principal").html($("#cargador_empresa").html());   
		$.get(url,function(resul){
      $("#contenido_principal").html(resul);
    })
        

}





function cargarlistado(listado){

    //funcion para cargar los diferentes  en general
if(listado==1){ var url = "listado_usuarios"; }
if(listado==2){ var url = "listado_publicaciones/0"; }

$("#contenido_principal").html($("#cargador_empresa").html());
$.get(url,function(resul){

        $("#contenido_principal").html(resul); 
})

}




 $(document).on("submit",".form_entrada",function(e){

//funcion para atrapar los formularios y enviar los datos

       e.preventDefault();
        
        $('html, body').animate({scrollTop: '0px'}, 200);
        
        var formu=$(this);
        var quien=$(this).attr("id");
        var rs=false; //leccion 10
        var seccion_sel=  $("#seccion_seleccionada").val();
        var varurl;
        var divresul;
        
        if(quien=="f_nuevo_usuario"){  varurl="agregar_nuevo_usuario";  divresul="notificacion_resul_fanu";  rs=true;}
        if(quien=="f_editar_usuario"){  varurl="editar_usuario";  divresul="notificacion_resul_feu"; }
        if(quien=="f_cambiar_password"){  varurl="cambiar_password";  divresul="notificacion_resul_fcp";  }
        if(quien=="f_agregar_educacion"){  varurl="agregar_educacion_usuario";  divresul="notificacion_resul_faedu";  rs=true; }  //leccion 10
   
   
        $("#"+divresul+"").html($("#cargador_empresa").html());

              $.ajax({

                    type: "POST",
                    url : varurl,
                    datatype:'json',
                    data : formu.serialize(),
                    success : function(resul){
                        $("#"+divresul+"").html(resul);
                        if(rs ){
                         $('#'+quien+'').trigger("reset");
                         mostrarseccion(seccion_sel);
                        }
                    }

                });


})


$(document).on("click",".pagination li a",function(e){
//para que la pagina se cargen los elementos
 e.preventDefault();
 var url =$( this).attr("href");
 $("#contenido_principal").html($("#cargador_empresa").html());
 $.get(url,function(resul){
    $("#contenido_principal").html(resul); 
 })

})


  //leccion 7 
function mostrarficha(id_usuario) {
  //funcion para mostrar y etditar la informacion del usuario
  $("#usuario_seleccionado").val(id_usuario); // leccion10
  $("#capa_modal").show();
  $("#capa_para_edicion").show();
  var url = "form_editar_usuario/"+id_usuario+""; 
  $("#contenido_capa_edicion").html($("#cargador_empresa").html());  //leccion 10
  $.get(url,function(resul){
  $("#contenido_capa_edicion").html(resul);  //leccion 10
  })

}


$(document).on("click",".div_modal",function(e){
 //funcion para ocultar las capas modales
 $("#capa_modal").hide();
 $("#capa_para_edicion").hide();
 $("#contenido_capa_edicion").html("");  //leccion 10

})  


  //leccion 8 y 9
$(document).on("submit",".formarchivo",function(e){

    
        e.preventDefault();
        var formu=$(this);
        var nombreform=$(this).attr("id");
        if(nombreform=="f_subir_imagen" ){ var miurl="subir_imagen_usuario";  var divresul="notificacion_resul_fci"; }
        if(nombreform=="f_cargar_datos_usuarios" ){ var miurl="cargar_datos_usuarios";  var divresul="notificacion_resul_fcdu"; }
        if(nombreform=="f_agregar_publicacion" ){ var miurl="agregar_publicacion_usuario";  var divresul="notificacion_resul_fap"; }

        //información del formulario
        var formData = new FormData($("#"+nombreform+"")[0]);

        //hacemos la petición ajax   
        $.ajax({
            url: miurl,  
            type: 'POST',
     
            // Form data
            //datos del formulario
            data: formData,
            //necesario para subir archivos via ajax
            cache: false,
            contentType: false,
            processData: false,
            //mientras enviamos el archivo
            beforeSend: function(){
              $("#"+divresul+"").html($("#cargador_empresa").html());                
            },
            //una vez finalizado correctamente
            success: function(data){
              $("#"+divresul+"").html(data);
              $("#fotografia_usuario").attr('src', $("#fotografia_usuario").attr('src') + '?' + Math.random() );               
            },
            //si ha ocurrido un error
            error: function(data){
               alert("ha ocurrido un error") ;
                
            }
        });
});

//leccion  10
 
function mostrarseccion(arg){
  var id_usuario=$("#usuario_seleccionado").val(); 
  $("#seccion_seleccionada").val(arg);
  if(arg==1){ var url = "form_editar_usuario/"+id_usuario+""; }
  if(arg==2){ var url = "form_educacion_usuario/"+id_usuario+""; }
  if(arg==3){ var url = "form_publicaciones_usuario/"+id_usuario+""; } //leccion 11
  $("#contenido_capa_edicion").html($("#cargador_empresa").html());
  $.get(url,function(resul){
  $("#contenido_capa_edicion").html(resul);
  })

}


function borrareducacion(arg){
var url="borrar_educacion/"+arg+"" ;
var divresul="notificacion_resul_edu";
$("#"+divresul+"").html($("#cargador_empresa").html());

$.get(url,function(resul){
  $("#"+divresul+"").html(resul);
  mostrarseccion(2);
})

}


function mostrardiv_publicaciones(arg){
  $("#info_libro").hide();
  $("#info_revista").hide();
  if(arg==5){ $("#info_libro").show(); $("#info_revista").hide();  } 
  if(arg==4){ $("#info_libro").hide(); $("#info_revista").show();  } 

}

function borrarpublicacion(arg){
var url="borrar_publicacion/"+arg+"" ;
var divresul="notificacion_resul_fapu";
$("#"+divresul+"").html($("#cargador_empresa").html());

$.get(url,function(resul){
  $("#"+divresul+"").html(resul);
  mostrarseccion(3);
  cargarlistado(2,1);
})
}






