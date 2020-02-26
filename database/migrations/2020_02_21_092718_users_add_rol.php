<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersAddRol extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Crear un campo nuevo para el rol de usuario
        Schema::table('users', function(Blueprint $table)
        {
            $table->enum('rol',['administrador','basico']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Borrar el nuevo campo creado
        Schema::table('users', function(Blueprint $table)
        {
            $table->dropColumn('rol');
        });
    }
}
