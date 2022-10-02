<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Numero;
use App\Num_fiLB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

            $movilLB = Numero::where('deleted_at',null)->get();
            $cantmovLB = $movilLB->count();
            $fijoLB =  Num_fiLB::where('deleted_at',null)->get();
            $cantfiLB = $fijoLB->count();
        
        $totalNum = $cantmovLB + $cantfiLB;

            return view('home', compact('cantmovLB', 'cantfiLB', 'totalNum'));

    }

    // public function showform()
    // {
    //     return view ('vistasnum.NumFiLB');
    // }

     public function delete()
    {
        return view ('vistasnum.NumMovLN');
    }

    public function create()
    {
        return view ('vistasnum.NumFiLN');
    }
}   
