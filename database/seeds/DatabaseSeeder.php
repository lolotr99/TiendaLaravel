<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Articulo;
use App\Historialventas;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    private function seedUsuarios() {
        User::create(array('name' => 'Manolo','email' => 'manolotoro80@gmail.com', 'password' => bcrypt('123456'), 'fechanacimiento' => date('1999-10-05'), 'rol' => 'administrador'));
        User::create(array('name' => 'Jorge','email' => 'jorge.rgdaw@gmail.com', 'password' => bcrypt('123456'), 'fechanacimiento' => date('2000-06-25'), 'rol' => 'basico'));
    }

    private function seedArticulos() {
        Articulo::create(array('nombreArticulo' => 'Camiseta Dortmund' , 'marca' => 'Puma' , 'precio' => 15.50, 'imagenArticulo' => '', 'descripcion' => 'Camiseta Borussia Dortmund temporada 2019/2020, primera equipación. Detalles negros y amarillos en honor a su escudo e historia.'));
        Articulo::create(array('nombreArticulo' => 'Balón Champions' , 'marca' => 'Adidas' , 'precio' => 20.99, 'imagenArticulo' => '', 'descripcion' => 'Balon oficial de la UEFA Champions League para la temporada 2019/2020. Road To Istambul'));
    }

    private function seedHistorialVentas() {
        Historialventas::create(array('idUsuario' => 1, 'idArticulo' => 1, 'fechacompra' => date(now()), 'cantidad' => 2));
        Historialventas::create(array('idUsuario' => 2, 'idArticulo' => 2, 'fechacompra' => date(now()), 'cantidad' => 5));
    }

    public function run()
    {
        $this->seedUsuarios();
        $this->seedArticulos();
        $this->seedHistorialventas();
    }
}

