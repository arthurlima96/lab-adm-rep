<?php

namespace App\Http\Controllers;

use App\Laboratorio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Reserva;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $labs = Laboratorio::all(['id','nome']);
        $id_user = Auth::user()->id;

        $reserva = Reserva::where('user_id',$id_user)->whereNull('saida')->first();

        if($reserva){
            return view('home')->with('reserva', $reserva);
        }

        return view('home')->with('laboratorios',  $labs);
    }
}
