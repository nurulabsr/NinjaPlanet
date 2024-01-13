<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FruitController extends Controller
{
    //
    public function CreateFruitDetails(){
        return view('Fruit.create-fruit');
    }


    public function StoreFruitDetails(){
        
    }
}
