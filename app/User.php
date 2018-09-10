<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function roles(){
        return $this->belongsToMany(Role::class);

    }

    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {
            return $this->hasAnyRole($roles) || 
                    abort(401, 'Operacao não autorizada');
        }
        return $this->hasRole($roles) || 
                abort(401, 'Operacao não autorizada');
    }

    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn('nome', $roles)->first();
    }

    public function hasRole($role)
    {
        return null !== $this->roles()->where('nome', $role)->first();
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class,'user_id');
    }
}
