<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RussianLanguage extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'russian_languages';
    protected $fillable = ['russian_word', 'russian_word_meaning', 'russian_language_category_id'];

}
