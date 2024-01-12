<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \App\Models\Tag;
use App\Observers\FruitPivotTableObserver;

class Fruit extends Model
{
    use HasFactory, SoftDeletes;

    public static function boot()
    {
        parent::boot();

        // Attach the observer to the pivot table events
        static::observe(FruitPivotTableObserver::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class)->withPivot('id');
    }
}
