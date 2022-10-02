<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use DB;
use Validator;
use App\Numero;
use App\Detalle;
use App\Num_fiLB;
use App\Movilesnegra;
use App\Fijosnegra;


class BaseDeDatosController extends Controller
{
	
  public function TablamovLB()
  {
    $total = Numero::where('deleted_at',null)->get();
//       $eliminados = Numero::onlyTrashed()->get();
// return $eliminados;
    foreach ($total as $i => $value) 
    {
      
     $llamNF = Detalle::where('numero_id', $i)->whereTime('duracion', '<=' ,'00:03:00')->count();
 
     $llamEF = Detalle::where('numero_id', $i)->whereTime('duracion', '>' ,'00:03:00')->count();

     $numero = Numero::find($value->id);

     $numero->llam_ef = $llamEF;
     $numero->llam_no_ef = $llamNF;

     $numero->total = $llamNF + $llamEF;

     $numero->save();
    }
      $Datos = Numero::all();

   return view ('vistasnum.NumMovLB', compact('Datos'));
  }

   public function filistaB()
  {
   
    $fijo = Num_fiLB::where('deleted_at',null)->get();

   foreach ($fijo as $i => $value)  { 
       $llamNF = Detalle::where('numero_id', $i)->whereTime('duracion', '<=' ,'00:03:00')->count();

       $llamEF = Detalle::where('numero_id', $i)->whereTime('duracion', '>' ,'00:03:00')->count();

       $numfi = Num_fiLB::find($value->id);

       $numfi->llam_ef = $llamEF;
       $numfi->llam_no_ef = $llamNF;

       $numfi->total = $llamNF + $llamEF;

       $numfi->save();
   }
     $fijos = Num_fiLB::all();
    return view ('vistasnum.NumFiLB', compact('fijos'));
    
  }
       

	
	public function showform()
    {
        return view ('vistasnum.cargarlista');
    }


    public function store (Request $request)
    {
    		$rules = array ('listablanca' => 'mimes:txt');

    			$validator = validator::make(Input::all(), $rules);

    	if($validator->fails()){

    			return back()->with('validar', 'Archivo no permitido');
    			
    		}
    		else
            {
    			$file = $request->file('listablanca');
    		    $name= $file->getClientOriginalName();
    		    $file->move(public_path().'/elecciones/',$name);
    		    $name= 'elecciones/' . $name;

    		 $prueba=fopen($name, "r") or die (error);
    		
	    		while (!feof($prueba)) {
	    			$linea=fgets($prueba);
	    			$salto=nl2br($linea);
	    			$numeral=substr($salto, 0, -9);
	    			

	    			DB::table('numeros')->insert(['numlista'=> $numeral]);

	    		}	
	    		fclose($prueba);
				return back()->with('status','La lista ha sido cargada con exito');
    	    }
    } 

    public function prueba(Request $request)
    {   
        $Detallado = Detalle::with('numero')->where('numero_id',$request->id)->get();
        return response()->json([
            "prueba" => $Detallado
        ]);

    }
    public function graficas()
    {
      $vari = Detalle::all()->count();
      $hora = 0;
        while ($hora <= 23){
          $cero[] = Detalle::select('numero_id')->whereTime('hora', '>=' , $hora.':00:00')->whereTime('hora', '<=' , $hora.':59:59')->count();
            $hora++;
        }
          return view ('historico', compact('cero'));
    }

    public function destroymoviles (Request $request)
    {
      if (Numero::where('numlista',$request->numero)) {
        $eliminados = Numero::where('numlista',$request->numero)->get();

        foreach ($eliminados as $eliminado) {
          $lisNG = new Movilesnegra;

          $lisNG->numlista = $eliminado->numlista;
          

          $lisNG->save();
        }

      $elimar = Numero::where('numlista', $request->numero)->delete();

      return redirect('NumMovLN')->with('status1','el numero ahora pertenece a lista negra');
      }
      if (Num_fiLB::where('numlista',$request->numero)) {
      $eliminas = Num_fiLB::where('numlista',$request->numero)->get();

        foreach ($eliminas as $elimina) {
          $lisNG = new Fijosnegra;

          $lisNG->id = $elimina->id;
          $lisNG->numlista = $elimina->numlista;
          $lisNG->llam_ef = $elimina->llam_ef;
          $lisNG->llam_no_ef = $elimina->llam_no_ef;
          $lisNG->total = $elimina->total;

          $lisNG->save();
        }

      
      $elimar = Num_fiLB::where('numlista', $request->numero)->delete();

      return redirect('NumFiLN')->with('status1','el numero ahora pertenece a lista negra');
    }

      
     
    }

  

}    
