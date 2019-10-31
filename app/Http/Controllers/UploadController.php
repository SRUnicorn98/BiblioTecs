<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Publicaciones;
use App\TipoPublicaciones;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('uploads');
       /* ->with("usuario",$usuario)
       ->with("tipopublicaciones", $tipopublicaciones)
       ->with("publicaciones",$publicaciones) 
       ->with("rutaarchivos",$rutaarchivos);*/
    }

    public function subir_archivo(Request $request)
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
            $rutadeldoc="storage/archivos/".$nuevo_nombre;
            return"Se ha subido documento correctamente.";
	    
		   /* if ($r1){

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
		    	

		    }*/


        }


	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
