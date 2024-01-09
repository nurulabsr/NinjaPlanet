<?php

namespace App\Jobs;

use App\Models\RussianLanguage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class StoreRussianWord implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

     protected $russianWord;
     protected $russianWordMeaning;
     protected $russianLanguageCategory;
     public function __construct($russianWord, $russianWordMeaning, $russianLanguageCategory){
      $this->russianWord = $russianWord;
      $this->russianWordMeaning = $russianWordMeaning;
      $this->russianLanguageCategory = $russianLanguageCategory;
    }

    /**
     * Execute the job.
     */
    public function handle(){
        echo $this->russianWord;
        Log::info('Handling StoreRussianWord job...');
        $russianLanguage = new RussianLanguage();
        $russianLanguage->russian_word = $this->russianWord;
        $russianLanguage->russian_word_meaning = $this->russianWordMeaning;
        $russianLanguage->russian_language_category_id = $this->russianLanguageCategory;
        $russianLanguage->save();
        Log::info('StoreRussianWord job completed.');


    }
}
