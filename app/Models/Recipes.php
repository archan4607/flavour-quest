<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipes extends Model
{
    use HasFactory,SoftDeletes;
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
