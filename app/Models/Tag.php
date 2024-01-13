<?php

namespace App\Models;

use App\Observers\FruitPivotTableObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory, SoftDeletes;

    public static function boot(){
        parent::boot();
        static::observe(FruitPivotTableObserver::class);
    }

   public function fruits(){
       return $this->belongsToMany(Fruit::class, 'fruit_tag', 'tag_id', 'fruit_id')->withTimestamps();
    }
}
