<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\softDeletes;
use Tymon\JWTAuth\Contracts\JWTSubject;
class User extends Authenticatable implements JWTSubject
{
    // use HasApiTokens, HasFactory, Notifiable;
    use HasFactory, Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'NombreCompleto',
        'Habilitado',
        'NombreUsuario',
        'Instalacion_id',
        'DNI',
        'Telefono',
        'Direccion',
        'Descripcion',
        'Rol_id',
        'Causa',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function concesionario()
    {
        return $this->hasOne(Concessionaire::class);
    }
    
    public function guardiacivil()
    {
        return $this->hasOne(CivilGuard::class);
    }
    
    public function administrativo()
    {
        return $this->hasOne(Administrative::class);
    }
    
    public function guardamuelles()
    {
        return $this->hasOne(DockWorker::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class,'Rol_id');
    }

    public function facility(){

        return $this->belongsTo(Facility::class, 'Instalacion_id');
    }

    public function getJWTIdentifier() {
        return $this->getKey();
    }


    public function getJWTCustomClaims() {
        return [];
    }  


}
