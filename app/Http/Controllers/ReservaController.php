<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reserva;
use App\Computador;
use Illuminate\Support\Facades\Auth;
    
class ReservaController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function efetuar_reserva($id_computador)
    {
        $id_user =  Auth::user()->id;

        $reserva = new Reserva();
        $reserva->user_id = $id_user;
        $reserva->computador_id = $id_computador;
        $reserva->save();

        $computador = Computador::find($id_computador);
        $computador->ativo = true;
        $computador->save();

        return redirect()->route('home');
    }
}
