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
            'fruit_name'                     => ['required', ],
            'fruit_scientific_name'          => ['required', ],
            'fruit_family'                   => ['required', ],
            'fruit_genus'                    => ['required', ],
            'fruit_origin'                   => ['required', ],
            'fruit_harvest_season'           => ['required', ],
            'fruit_shelf_life'               => ['required', ],
            'fruit_storage_conditions'       => ['required', ],
            'fruit_image'                    => ['required', ],
            'fruit_price'                    => ['required', ],
            'fruit_nutritional_information'  => ['required', ],
            'fruit_description'              => ['required', ],
        ]);           
    }
}
