<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pendaftran extends Model
{
    use HasFactory,Uuid, SoftDeletes;

    protected $table = 'pendaftaran';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

   public function pelatihan()
   {
       return $this->belongsTo(Pelatihan::class);
   }

   protected $casts = [
    'periode_awal' => 'datetime',
    'periode_akhir' => 'datetime',
];

   public function peserta()
   {
       return $this->belongsToMany(User::class, 'user_pendaftaran', 'pendaftaran_id', 'user_id');
   }

   public function userPendaftaran()
    {
        return $this->hasMany(UserPendaftaran::class, 'pendaftaran_id');
    }

}
