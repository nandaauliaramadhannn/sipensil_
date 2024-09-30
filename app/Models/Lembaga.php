<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\Uuid;

class Lembaga extends Model
{
    use Uuid, HasFactory;

    protected $table  = 'lembaga';
    protected $guarded = [];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
