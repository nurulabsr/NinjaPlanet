<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FruitController extends Controller
{
    //
    public function CreateFruitDetails(){
        return view('Fruit.create-fruit');
    }


    public function StoreFruitDetails(Request $request){
      
        $request->validate([
            'fruit_name'                     => [],
            'fruit_scientific_name'          => [],
            'fruit_family'                   => [],
            'fruit_genus'                    => [],
            'fruit_origin'                   => [],
            'fruit_harvest_season'           => [],
            'fruit_shelf_life'               => [],
            'fruit_storage_conditions'       => [],
            'fruit_image'                    => [],
            'fruit_price'                    => [],
            'fruit_nutritional_information'  => [],
            'fruit_description'              => [],
        ]);           
    }
}
