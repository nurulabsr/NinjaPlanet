<?php

namespace App\Observers;
use Illuminate\Support\Facades\Log;
class FruitPivotTableObserver{
    //

    public function attached($model, $relationName, $attributes){
        $fruitId = $model->fruit_id;
        $tagId = $model->tag_id;
        Log::info("Fruit ID '{$fruitId}' attached to Tag ID '{$tagId}'", $attributes);
    }


    public function detached($model, $relationName, $attributes){
        $fruitId = $model->fruit_id;
        $tagId = $model->tag_id;
        Log::info("Fruit ID '{$fruitId}' detached from Tag ID '{$tagId}'", $attributes);
    }
}
