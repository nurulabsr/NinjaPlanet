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
            'fruit_name'                     => ['required', 'string', 'max:255'],
            'fruit_scientific_name'          => ['required', 'string', 'max:255'],
            'fruit_family'                   => ['required', 'string', 'max:255'],
            'fruit_genus'                    => ['required', 'string', 'max:255'],
            'fruit_origin'                   => ['required', 'string', 'max:255'],
            'fruit_harvest_season'           => ['required', 'date', 'date_format:Y-m-d'],
            'fruit_shelf_life'               => ['required', 'string' , 'max:255'],
            'fruit_storage_conditions'       => ['required', 'string' , 'max:255'],
            'fruit_price'                    => ['required', 'numeric', 'digits:5'],//digits
            'fruit_nutritional_information'  => ['required', 'string' , 'max:1500'],
            'fruit_description'              => ['required', 'string' , 'max:1500'],
        ]);  
        
        //'fruit_image'  => ['required', ],

        if($request->hasFile('fruit_image')){
            $request->validate([
                  'fruit_image' => ['required', 'image', 'mimes:png,jpg', 'max:2048']
            ]);
        }
    }
}
