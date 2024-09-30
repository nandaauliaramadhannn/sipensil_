<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use SoftDeletes,HasFactory,Uuid;

    protected $table = 'kategori';
    protected $guarded = [];

    public function pelatihan()
    {
        return $this->hasMany(Pelatihan::class, 'kategori_id');
    }
}
