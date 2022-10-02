<?php

use Illuminate\Database\Seeder;
use App\Detalles;
use App\Database;
use App\Num_fiLB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
        	NumFiLBsTableSeeder::class,
			DetalleTableSeeder::class,
        ]);
        
    }
}
