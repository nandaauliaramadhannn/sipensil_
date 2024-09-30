<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    protected $table = 'kecamatan';
    protected $guarded = [];

    public function desa()
    {
        return $this->hasMany(Desa::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function datauser()
    {
        return $this->hasMany(DataUser::class);
    }
}
