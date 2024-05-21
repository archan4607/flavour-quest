<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder;

class Ingredients extends Model
{
    use HasFactory;
    public function setNameAttribute($value){
        $this->attributes['name']=ucwords($value);
    }
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('published', function (Builder $builder) {
            $builder->where('status', 0);
        });
    }
}
