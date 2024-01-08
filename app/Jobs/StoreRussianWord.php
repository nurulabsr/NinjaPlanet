<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StoreRussianWord implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

     public $russianWord;
     public $russianWordMeaning;
    public function __construct($russianWord, $russianWordMeaning){
      $this->russianWord = $russianWord;
      $this->russianWordMeaning = $russianWordMeaning;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
    }
}
