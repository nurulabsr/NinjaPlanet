<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Pagination\Paginator;
class Airbus extends Model{
    use HasFactory, SoftDeletes;
    public function types(){
        return $this->belongsTo(Type::class);
    }
}
