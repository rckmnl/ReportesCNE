<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Numero;
use App\Num_fiLB;
use App\Detalle;


class Detalle extends Model
{
	protected $table = 'detalles';
	protected $fillable = ['numero_id','numerodellamada','hora','duracion'];

    public function numero()
    {
    	return $this->belongsTo(Numero::class,'numero_id');
     }

      public function numfiLB()
    {
    	return $this->belongsTo(Num_fiLB::class,'numero_id');
     }
}
