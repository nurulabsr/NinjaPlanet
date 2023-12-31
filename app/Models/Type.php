<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Paginator;
class Type extends Model
{
    use HasFactory, SoftDeletes;
    public function airbuses(){
        return $this->hasMany(Airbus::class);
    }
}
