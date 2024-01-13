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
    protected $fillable = [
        'fruit_name', 'fruit_description', 'fruit_scientific_name',
        'fruit_family', 'fruit_genus', 'fruit_origin', 'fruit_harvest_season',
        'fruit_nutritional_information', 'fruit_storage_conditions', 'fruit_shelf_life',
        'fruit_price'
    ];
    public static function boot(){
        parent::boot();

        // Attach the observer to the pivot table events
        static::observe(FruitPivotTableObserver::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'fruit_tag', 'fruit_id', 'tag_id')->withTimestamps();
    }
}
