<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laboratorio extends Model
{
  protected $fillable = ['nome'];

  public function computadores()
  {
    return $this->hasMany(Computador::class);
  }
}
