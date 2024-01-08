<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RussianLanguageController extends Controller{

    public function WriteLanguageVocabulary(){
         return view('russian-language');
    }

    public function StoreLanguageVocabulary(){
          // will add logic....
        return redirect()->route('write.russian.vocabulary');
    }

}
