<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

//RUTAS DE LOGUEO
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', ['as' =>'login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);
 
//RUTAS DE REGISTRO DE USUARIO
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@postRegister']);

//RUTAS DE HOME
Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');

//RUTAS PARA AGREGAR NUEVO USUARIO AL SISTEMA
Route::get('form_nuevo_usuario', 'FormulariosController@form_nuevo_usuario');
Route::post('agregar_nuevo_usuario', 'UsuariosController@agregar_nuevo_usuario');
//RUTAS DE LISTADO DE USUARIOS
Route::get('listado_usuarios/{page?}', 'ListadoController@listado_usuarios');
        //Esta ruta nos retorna al listado de usuarios
Route::get('retornar_listado_usuarios/{page?}', 'ListadoController@retornar_listado_usuarios');
//RUTAS PARA EDITAR DATOS DE LOS USUARIOS
Route::get('form_editar_usuario/{id}', 'UsuariosController@form_editar_usuario');
Route::post('editar_usuario', 'UsuariosController@editar_usuario');
    //sube foto de usuario
Route::post('subir_imagen_usuario', 'UsuariosController@subir_imagen_usuario');
    //cambia la contraseña del usuario
Route::post('cambiar_password', 'UsuariosController@cambiar_password');

//RUTAS PARA AGREGAR EL NIVEL EDUCATIVO DEL USUARIO
Route::get('form_educacion_usuario/{id}', 'EducacionController@form_educacion_usuario');
Route::post('agregar_educacion_usuario', 'EducacionController@agregar_educacion');
Route::get('borrar_educacion/{id}', 'EducacionController@borrar_educacion');

//RUTAS DE PUBLICACION DE ARCHIVOS
Route::get('form_publicaciones_usuario/{id}', 'PublicacionesController@form_publicaciones_usuario');
Route::resource('agregar_publicacion_usuario', 'PublicacionesController@agregar_publicacion');
Route::get('borrar_publicacion/{id}', 'PublicacionesController@borrar_publicacion');
Route::get('listado_publicaciones/{id?}', 'PublicacionesController@listado_publicaciones');
Route::get('descargar_publicacion/{id}', 'PublicacionesController@descargar_publicacion');

//SUBIR ARCHIVO
Route::get('upload','UploadController@index'); //Lanza la vista
Route::post('upload','UploadController@subir_archivo'); //Guarda los Archivos
