<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Storage;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Publicaciones;
use App\TipoPublicaciones;



class PublicacionesController extends Controller
{
    
        public function __construct()
    {
        $this->middleware('auth');
    }

    
            //leccion 11

    public function form_publicaciones_usuario($id){

       $usuario=User::find($id);
       $tipopublicaciones=TipoPublicaciones::all();
       $publicaciones= $usuario->publicaciones();
       $rutaarchivos= "../storage/archivos/";

       return view("formularios.form_publicaciones_usuario")
       ->with("usuario",$usuario)
       ->with("tipopublicaciones", $tipopublicaciones)
       ->with("publicaciones",$publicaciones) 
       ->with("rutaarchivos",$rutaarchivos);

    }

 
    public function agregar_publicacion(Request $request)
    {
  
        //$id=$request->input('id_usuario_foto');
      $archivo = $request->file('archivo');
          $input  = array('image' => $archivo) ;
          $reglas = array('image' => 'required|mimes:pdf|max:90000');
          $validacion = Validator::make($input,  $reglas);
          if ($validacion->fails())
          {
            return view("mensajes.msj_rechazado")->with("msj","El archivo no es una imagen valida");
          }
          else
          {
  
            $nombre_original=$archivo->getClientOriginalName();
           $extension=$archivo->getClientOriginalExtension();
          $nuevo_nombre="user_doc.".$nombre_original.$extension;
          $r1=Storage::disk('archivos')->put($nuevo_nombre,  \File::get($archivo) );
          $rutadeldoc="storage/archivos".$nuevo_nombre;
        
          if ($r1){
  
              $publicacion= new Publicaciones;
             $publicacion->idUsuario= $request->input("id_usuario");
             $publicacion->idTipopublicacion= $request->input("tipo_publicacion");
             $publicacion->titulo=$request->input("titulo_publicacion");
             $publicacion->autores=$request->input("autores_publicacion");
             $publicacion->universidad=$request->input("universidad_publicacion");
             $publicacion->anio=$request->input("anio_publicacion");
             $publicacion->pais=$request->input("pais_publicacion");
             $publicacion->revista=$request->input("revista_publicacion");
             $publicacion->volumen=$request->input("volumen_publicacion");
             $publicacion->numero=$request->input("numero_publicacion");
             $publicacion->pageI=$request->input("pageI_publicacion");
             $publicacion->pageF=$request->input("pageF_publicacion");
             $publicacion->volumenL=$request->input("vlibro_publicacion");
             $publicacion->numeroL=$request->input("nlibro_publicacion");
             $publicacion->ciudad=$request->input("ISBN_publicacion");
             $publicacion->edicion=$request->input("edicion_publicacion");
               $publicacion->editorial=$request->input("editorial_publicacion");
                $publicacion->ruta=$rutadeldoc;
           // $usuario=User::find($id);
           // $usuario->imagenurl=$rutadelaimagen;
                 // $r2=$usuario->save();
                 $resul= $publicacion->save();
              return view("mensajes.msj_correcto")->with("msj","Imagen agregada correctamente");
          }
          else
          {
            
  
          }
  
  
          }
  
  
    }

    public function borrar_publicacion($id){

       $publicacion=Publicaciones::find($id);
       $resul=$publicacion->delete();
        if($resul){            
            return view("mensajes.msj_correcto")->with("msj","Borrado correctamente");   
        }
        else
        {            
             return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  
        }

    }


       public function listado_publicaciones($id){

         $publicaciones=Publicaciones::paginate(25);
         $rutaarchivos= "../storage/archivos/";
         return view("listados.listado_publicaciones")
         ->with("publicaciones", $publicaciones)
         ->with("rutaarchivos", $rutaarchivos);      
       }

       public function descargar_publicacion($id){

         $publicacion=Publicaciones::find($id);
         $rutaarchivo= "../storage/archivos/".$publicacion->ruta;
         return response()->download($rutaarchivo);

       }


}