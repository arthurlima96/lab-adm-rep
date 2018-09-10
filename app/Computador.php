<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Computador extends Model
{
        protected $fillable = ['nome','descricao','ativo','laboratorio_id'];
        protected $table = 'computadores';


        public function laboratorio()
        {
           return $this->belongsTo(Laboratorio::class);
        }

        public function reservas()
        {
                return $this->hasMany(Reserva::class,'computador_id');
        }
}
