<?php

namespace App\Models;

use App\Traits\Uuid;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Cache;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, SoftDeletes, HasFactory, Notifiable,Uuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];
    protected $guarded = [];

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

    public function UserOnline(){
        return Cache::has('user-is-online' . $this->id);
    }
    public function lembaga()
    {
        return $this->belongsTo(Lembaga::class);
    }

    public function pelatihan()
    {
        return $this->belongsToMany(Pelatihan::class, 'user_id', 'pelatihan_id');
    }

    public function createdPelatihan()
    {
        return $this->hasMany(Pelatihan::class, 'user_id');
    }
    public function data_user()
    {
    return $this->hasOne(DataUser::class);
    }

    public function kecamatan()
    {
        return $this->hasMany(Kecamatan::class);
    }

    public function desa()
    {
        return $this->hasMany(Desa::class);
    }
}
