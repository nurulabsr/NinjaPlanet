<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RussianLanguageController extends Controller{

    public function WriteLanguageVocabulary(){
         return view('RussianLanguage.russian-language');
    }

    public function StoreLanguageVocabulary(Request $request){
            $request->validate([
                'add_russian_word' => ['required', 'string', 'regex:/^[\p{Cyrillic}]+$/u'],
            ]);
        return redirect()->route('write.russian.vocabulary');
    }

}
