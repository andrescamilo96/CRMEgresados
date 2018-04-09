<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Message;
use Carbon\Carbon;


class MessagesController extends Controller
{
    /*COMNDO PARA CREAR LAS FUNCIONES REST php artisan make:controller MessagesController -- resource */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __Construct()
    {
        $this->middleware('auth',['except' =>['create','store']]);//proteger la ruta mensajes
    }
    public function index()///Todos los mensajes get
    {
        //
       // $messages = db::table('messages')->get(); Uso queryBuilder
        $messages = Message::all();
        return view('messages.index',compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()//formulario de creacion get
    {
        // 
        return view('Messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //Guarda mensajes y redirecciona post
    {
        //GUARDAR MENSAJE por Query Builder
     /*   DB::table('messages')->insert([
             "nombre"=>$request->input('nombre'),
             "email" =>$request ->input('email'),
             "mensaje" =>$request->input('mensaje'),
             "created_at" => Carbon::now(),
             "updated_at" => Carbon::now(),
        ]);
*/
        //Guardar por eloquent
      /*  $message = new Message;
        $message->nombre = $request->input('nombre');
        $message->email = $request->input('email');
        $message->mensaje = $request->input('mensaje');
        $message->save();*/
        Message::create($request->all());

        //REDIRECCIONAR
        return redirect()->route('mensajes.create')->with('info','hemos recibido su mensaje');
        //return $request->input("nombre"); para devolver un solo campo
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)//un mensaje en especifico
    {
        //
        //$message = db::table('messages')->where('id', $id)->first();
        $message = Message::findOrFail($id);

        return view('messages.show',compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)//formulario de edicion Get 
    {
        //
         //$message = db::table('messages')->where('id', $id)->first();
        $message = Message::findOrFail($id);
        return view('messages.edit',compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)//actualiza mensaje y redirecciona Put/Patch
    {
        //Actualizar
      /*  db::table('messages')->where('id',$id)->update([
             "nombre"=>$request->input('nombre'),
             "email" =>$request ->input('email'),
             "mensaje" =>$request->input('mensaje'),
             "updated_at" => Carbon::now(),
        ]);*/
        $message = Message::findOrFail($id)->update($request->all());
        
        //Redireccionar
        return redirect()->route('mensajes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)//elimina un mensaje y redirercciona Delete 
    {
        //
        //db::table('messages')->where('id',$id)->delete();
        $message = Message::findOrFail($id)->delete();
        return redirect()-> route('mensajes.index');
    }
}
