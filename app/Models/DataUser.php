<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataUser extends Model
{
    use HasFactory;

    protected $table = 'data_user';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isComplete()
    {
    return !empty($this->jenis_kelamin) && !empty($this->tempat_lahir) && !empty($this->pendidikan) && !empty($this->umur)
    && !empty($this->kecamatan_id) && !empty($this->desa_id) && !empty($this->tinggi_badan) && !empty($this->berat_badan);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
