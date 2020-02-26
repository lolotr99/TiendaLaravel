<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersAddFechanacimiento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Crear un campo nuevo para la fecha de nacimiento
        Schema::table('users', function(Blueprint $table)
        {
            $table->date('fechanacimiento');
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
            $table->dropColumn('fechanacimiento');
        });
    }
}
