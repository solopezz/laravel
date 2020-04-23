<?php

use App\Jobs\SendEmail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('job', function(){
	dispatch(new SendEmail);
	return "Listo";
});

DB::listen(function($query){
  //Imprimimos la consulta ejecutada
	// echo "<pre> {$query->sql } </pre>";
});
//Parametro obligatorio 
Route::get('contact/{user}', function($user){
	return "Saludos " . $user;
});

//Parametro opcional 
Route::get('name/{user?}', function($user = "Invitado"){
	return "Saludos " . $user ;
});

//Rutas con nombres-> si se requiere cambiar la url contactame ya no sera necesario mdificar los href 
//hacemos refer al nombre de la ruta y no de la url  
Route::get('/contactame', function(){
	return "Seleccion de contactos";
})->name('contactos');

Route::get('/contactos', function () {
	echo "<a href='". route('contactos')."'>Contactos 1<a><br>";
	echo "<a href='". route('contactos')."'>Contactos 2<a><br>";
	echo "<a href='". route('contactos')."'>Contactos 3<a><br>";
	echo "<a href='". route('contactos')."'>Contactos 4<a><br>";
	echo "<a href='". route('contactos')."'>Contactos 5<a><br>";
});

//Cómo mostrar HTML con las vistas y pasar paramtros desde una vista
Route::get('/', function() {
	// $nombre = "Jorge";

	return view('layout', compact('nombre'));
})->name('home');

//blade
Route::view('layout', 'layout')->name('layout');
Route::view('about', 'about')->name('about');
Route::view('info', 'info')->name('info');

//Estructuras de control y controloadores
Route::get('portafolio', 'PortafolioController')->name('portafolio');

//Controladores resource
Route::resource('projects', 'ProjectController');

//Contolador resource con parametros y nombre diferente solo es mejor seguir convenciones
// Route::resource('cars', 'ProjectController')->names('projects')->parameters(['car'=>'project']);

//::apiResource -> excluye los metodos create y edit que son los que muestras la vista en los formularios
// project/edit -> cambiar edit AppServiceproviders boot() ResorceVervs edit-> editar esto cambia la url  

//Email
Route::get('view_email', 'SendMailClientController@show')->name('mail.show');
Route::get('mail', 'SendMailClientController@view')->name('mail');
Route::post('mail', 'SendMailClientController@send')->name('mail.send');


Auth::routes();

Route::resource('users', 'UsersController');

