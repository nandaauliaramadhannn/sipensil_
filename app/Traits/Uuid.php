<?php

namespace App\Traits;

use Illuminate\Support\Str;


trait Uuid
{
    protected static function bootUsesUuid()
    {
        static::creating(function ($model) {
            if (!$model->getKey()) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    /**
     * Inform Laravel that the primary key is not an incrementing integer.
     *
     * @return bool
     */
    public function getIncrementing()
    {
        return false;
    }
    public function getKeyType()
    {
        return 'string';
    }
}
