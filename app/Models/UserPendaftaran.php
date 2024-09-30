<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPendaftaran extends Model
{
    use HasFactory;
    protected $table = 'user_pendaftran';
    protected $guarded = [];

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftran::class, 'pendaftaran_id');
    }


}
