<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function computador()
    {
        return $this->belongsTo(Computador::class,'computador_id');
    }
}
