<?php

use Illuminate\Database\Seeder;
use App\Detalle;


class NumFiLBsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
   
   factory(App\Num_fiLB::class, 189)->create();   
    
    }
}
