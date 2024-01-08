<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RussianLanguageController extends Controller{

    public function WriteLanguageRule(){
         return view('russian-language');
    }

}
