<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()//pahp artisan migrate
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('email');
            $table->text('mensaje');
            $table->timestamps();//laravel.com/docs/migrations/available column type
            //si queremos alterar una tabla se crea otra migracion 
            //php artisan make:migration add_phone_to_messages_table --table = messages
            //dropcolumn para quitar una columna
        });
        //php artisan make:migration  create_messages_table --create=messages
        //php artisan migrate
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()//php artisan migrate:rollback
    {
        Schema::dropIfExists('messages');
    }
}
