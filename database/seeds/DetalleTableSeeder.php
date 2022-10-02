<?php

use Illuminate\Database\Seeder;
use App\Detalle;

class DetalleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Detalle::class, 500)->create();
    }
}
