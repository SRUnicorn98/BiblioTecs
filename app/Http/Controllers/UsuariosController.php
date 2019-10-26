<?php namespace App\Http\Controllers;

use App\User;
use Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class UsuariosController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}


	//presenta el formulario para nuevo usuario
	public function agregar_nuevo_usuario(Request $request)
	{

		$data=$request->all();
      	$usuario= new User;
		$usuario->nombres  =  $data["nombres"];
		$usuario->apellidos=$data["apellidos"];
		$usuario->pais=$data["pais"];
		$usuario->ciudad=$data["ciudad"];
		$usuario->email=$data["email"];
		$usuario->institucion=$data["institucion"];
		$usuario->ocupacion=$data["ocupacion"];
		$usuario->password=bcrypt($data["password"]);

		$resul= $usuario->save();

		if($resul){
            
            return view("mensajes.msj_correcto")->with("msj","Usuario Registrado Correctamente");   
		}
		else
		{
             
            return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  

		}
	}

//leccion 7
		public function form_editar_usuario($id)
	{
		//funcion para cargar los datos de cada usuario en la ficha
		$usuario=User::find($id);
		$contador=isset($usuario);
		if($contador>0){          
            return view("formularios.form_editar_usuario")->with("usuario",$usuario);   
		}
		else
		{            
            return view("mensajes.msj_rechazado")->with("msj","el usuario con ese id no existe o fue borrado");  
		}
	}




		public function editar_usuario(Request $request)
	{

		$data=$request->all();
		$idUsuario=$data["id_usuario"];
		$usuario=User::find($idUsuario);
        $usuario->nombres  =  $data["nombres"];
		$usuario->apellidos=$data["apellidos"];
		$usuario->pais=$data["pais"];
		$usuario->ciudad=$data["ciudad"];
		$usuario->email=$data["email"];
		$usuario->institucion=$data["institucion"];
		$usuario->ocupacion=$data["ocupacion"];
		
		$resul= $usuario->save();

		if($resul){            
            return view("mensajes.msj_correcto")->with("msj","Datos actualizados Correctamente");   
		}
		else
		{            
            return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  
		}
	}

//leccion 8
		public function subir_imagen_usuario(Request $request)
	{

	    $id=$request->input('id_usuario_foto');
		$archivo = $request->file('archivo');
        $input  = array('image' => $archivo) ;
        $reglas = array('image' => 'required|image|mimes:jpeg,jpg,bmp,png,gif|max:2000');
        $validacion = Validator::make($input,  $reglas);
        if ($validacion->fails())
        {
          return view("mensajes.msj_rechazado")->with("msj","El archivo no es una imagen valida");
        }
        else
        {

	        $nombre_original=$archivo->getClientOriginalName();
			$extension=$archivo->getClientOriginalExtension();
			$nuevo_nombre="userimagen-".$id.".".$extension;
		    $r1=Storage::disk('fotografias')->put($nuevo_nombre,  \File::get($archivo) );
		    $rutadelaimagen="storage/fotografias/".$nuevo_nombre;
	    
		    if ($r1){

			    $usuario=User::find($id);
			    $usuario->imagenurl=$rutadelaimagen;
			    $r2=$usuario->save();
		        return view("mensajes.msj_correcto")->with("msj","Imagen agregada correctamente");
		    }
		    else
		    {
		    	

		    }


        }


	}


	public function cambiar_password(Request $request){

		$id=$request->input("id_usuario_password");
		$email=$request->input("email_usuario");
		$password=$request->input("password_usuario");
		$usuario=User::find($id);
	    $usuario->email=$email;
	    $usuario->password=bcrypt($password);
	    $r=$usuario->save();

	    if($r){
           return view("mensajes.msj_correcto")->with("msj","password actualizado");
	    }
	    else
	    {
	    	return view("mensajes.msj_rechazado")->with("msj","Error al actualizar el password");
	    }



	}




}