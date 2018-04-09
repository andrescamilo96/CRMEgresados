<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    // messages 
    // protected $table = 'nombre_de_la_tabla';
    protected $fillable = ['nombre','email','mensaje'];
    //make:model
}
