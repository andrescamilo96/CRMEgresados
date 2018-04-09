<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateMessageRequest;

class PagesController extends Controller
{

    // public function __construct()//llamado del middleware 
   // {
     //   $this->middleware('example',['except'=>['home']]);
    //}
    // 
    //controlador que redireciona al home desde el route
    public function home(){

    	return view('home');
       // return response('Contenido de la Respuesta',201)
                   // ->header('X-TOKEN','secret')
                   // ->header('X-TOKEN','seret-2')
                    //->cookie('X-COOKIE','cookie');
    }
     //controlador que redireciona al contactos desde el route
    public function contact(){

    	return view('Contactos');
    }
     //controlador que redireciona al saludo desde el route

    public function Saludo($nombre = "Invitado"){

    	$ht = "<h2>Contenido html</html>";
		$script = "<script>alert('Problema con el pelo de gabriel')</script>";
		$consolas =[
			'Play Station 4',
			'Xbox 360'
			];
		//return view('Saludo',['nombre'=>$nombre],['ht'=>$ht]);
			return view('Saludo',compact('nombre','ht','script','consolas'));
    }
    //controlador que valida dependiendo la info que tenga el request
   // public function mensajes(Request $request){
       //return $request->all();
        //if($request-> filled('email'))//filled funcion para preguntar si existe reeemplaza el has
        //{

          //  return "Si tiene email. Es " . $request->input('email');
       //}

           // return "no tiene email";

       // $this->validate($request,[
           
            //laravel.com/docs/5.5/validation para concoer mas validaciones de los campos seleccionar available selection rules

      //  ]);// Regla validar campo obligatorio
     //  return $request ->all();
    //}
    public function mensajes(CreateMessageRequest $request)
    {//se valida los campos con el request creado por consola php arisan make request CreateMessageRequest si se cumple devuelve esta funcion

        //return $request->all();//devolver los valores del form
        //****************************************************
        //$data = $request->all();
          //   return response()->json([
               // 'data'=>$data],202)
               // ->header('TOKEN','secret'); //formato json para el response*********
         //***********************************//redireccionar
        //return 
        /////////devuelve mensaje y se valida en el formulario si existe el mensaje que quite el fomrulario
           // return redirect()
            //->route('contactos')
            //->with('info','tu mensaje se ha enviado');
        return back()->with('info','tu mensaje se ha enviado');
            //back funcion para devolver al formulario anterior
    }

}

