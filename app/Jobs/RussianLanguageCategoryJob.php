<?php

namespace App\Jobs;

use App\Models\LanguageCategory;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class RussianLanguageCategoryJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $russianLanguageCategory;
    public function __construct($russianLanguageCategory){  
      $this->russianLanguageCategory = $russianLanguageCategory;
    }

    /**
     * Execute the job.
     */
    public function handle(): void{
        $russianLanguageCategoryData = new LanguageCategory();
        $russianLanguageCategoryData->language_categories = $this->russianLanguageCategory;
        $russianLanguageCategoryData->save();
    }
}
