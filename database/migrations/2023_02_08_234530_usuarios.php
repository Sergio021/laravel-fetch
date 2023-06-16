<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function(Blueprint $table){
            $table->increments('id_Usuario');
            $table->string('app', 100);
            $table->string('apm', 100);
            $table->string('nombre', 100);
            $table->string('telefono', 10);
            $table->date('fecha_nac')->nullable();
            $table->string('sexo', 15);
            $table->string('correo', 250);
            $table->string('password', 250);
            $table->string('type', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
};
