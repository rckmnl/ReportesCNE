<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Detalle;

class Movilesnegra extends Model
{
    use SoftDeletes;
	
	protected $table = 'movilesnegras';
	protected $fillable = ['numlista'];
	protected $dates = ['deleted_at'];

    public function Detalle()
    {
    	return $this->hasMany(Detalle::class,'numero_id');
    }
}
