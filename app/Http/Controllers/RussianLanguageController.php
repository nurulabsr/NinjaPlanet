<?php

namespace App\Http\Controllers;

use App\Jobs\StoreRussianWord;
use App\Models\LanguageCategory;
use App\Models\RussianLanguage;
use Illuminate\Http\Request;

class RussianLanguageController extends Controller{

    public function WriteLanguageVocabulary(){
        $categories = LanguageCategory::all();
        return view('RussianLanguage.russian-language', compact('categories'));
    }

    public function StoreLanguageVocabulary(Request $request){
            $russianLanguage = new RussianLanguage();
            $request->validate([
                'add_russian_word' => ['required', 'string', 'regex:/^[\p{Cyrillic}]+$/u'],
                'russian_word_meaning' => ['required', 'string', 'regex:/^[A-Za-z]+$/'],
                'russian_language_category_id' => ['required', 'integer']
            ]);

            // $russianLanguage->russian_word = $request->add_russian_word;
            // $russianLanguage->russian_word_meaning = $request->russian_word_meaning;
            // $russianLanguage->russian_language_category_id = $request->russian_language_category_id;
            // $russianLanguage->save();

            $russianword = $request->add_russian_word;
            $russianwordmeaning = $request->russian_word_meaning;
            $categoryid = $request->russian_language_category_id;
            StoreRussianWord::dispatch($russianword, $russianwordmeaning, $categoryid);

        return redirect()->route('write.russian.vocabulary');
    }

    public function MessageFunction(){
        return view('message');
    }

}
