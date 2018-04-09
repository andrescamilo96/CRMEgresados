<?php

/*App\User::create([
	'name'=> 'administrador2',
	'email'=>'administrador2@gmail.com',
	'password'=> bcrypt('123123'),
	
]);*/
/*App\User::create([
	'name'=> 'moderador',
	'email'=>'moderador@gmail.com',
	'password'=> bcrypt('123123'),
	
]);*/

/*App\User::create([
	'name'=> 'estudiante',
	'email'=>'estudiante@gmail.com',
	'password'=> bcrypt('123123'),
	
]);*/
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
route::get('roles',function(){
return \App\Role::with('user')->get();
});
///EJEMPLO DE RUTA  PARA EL HOME USANDO CONTROLADOR
Route::get('/', ['as'=>'inicio', 'uses' => 'PagesController@Home']);

Route::get('contacto', ['as'=>'contactos', 'uses' => 'PagesController@contact']);

route::get('Saludo/{nombre?}',[ 'as' => 'saludo','uses'=>'PagesController@Saludo'])->where('nombre',"[A-Za-z]+");
///RUTAS PARA LAS ACCIONES DEL FOMULARIO MENSAJES
	//RUTA DE RECUROS EN UNA SOLA LINEA 
	Route::resource('mensajes','MessagesController');
	Route::resource('usuarios','UsersController');
	///RUTA POR MEDIO ROUTE Y EL CONTROLADOR
	/*route::get('mensajes/',['as'=>'messages.index','uses'=>'MessagesController@index']);

	route::get('mensajes/create',['as'=>'messages.create','uses'=>'MessagesController@create']);

	route::post('mensajes',['as'=>'messages.store','uses'=>'MessagesController@store']);

	route::get('mensajes/{id}',['as'=>'messages.show','uses'=>'MessagesController@show']);

	route::get('mensajes/{id}/edit',['as'=>'messages.edit','uses'=>'MessagesController@edit']);

	route::put('mensajes/{id}',['as'=>'messages.update','uses'=>'MessagesController@update']);

	route::delete('mensajes/{id}',['as'=>'messages.destroy','uses'=>'MessagesController@destroy']);*/
//////////////////////////////////////////////////////////////////
	//****************RUTA DEL LOGIN
	route::get('login','Auth\loginController@showLoginForm');
//RUTA USANDO EL METODO POST//////////////////////////////////////
//Route::post('contacto', 'PagesController@mensajes');
//////////////////////////////////////////////////////////////////////
///EJEMPLO DE RUTAS EN EL ROUTE
//route::get('sontactame',function(){
// echo "<a href=".route('contactos') .">Contacto</a><br>";
   // echo "<a href=".route('contactos') .">Contacto</a><br>";
   // echo "<a href=".route('contactos') .">Contacto</a><br>"; 
   // echo "<a href=".route('contactos') .">Contacto</a><br>";
   // echo "<a href=".route('contactos') .">Contacto</a><br>";
//});

//Route::geT('/contactemeeee',['as' => 'contactos',function(){
	//return view('Contactos');
//}]);


///EJEMPLO DE RUTAS EN EL ROUTE CON LECTOR DE VARIABLES
/*route::get('Saludo/{nombre?}',[ 'as' => 'saludo',function($nombre = "Invitado"){
	$ht = "<h2>Contenido html</html>";
	$script = "<script>alert('Problema con el pelo de gabriel')</script>";
	$consolas =[
			'Play Station 4',
			'Xbox 360'
	];
//return view('Saludo',['nombre'=>$nombre],['ht'=>$ht]);
return view('Saludo',compact('nombre','ht','script','consolas'));

}])->where('nombre',"[A-Za-z]+");
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
