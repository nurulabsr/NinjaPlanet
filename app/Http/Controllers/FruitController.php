<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FruitController extends Controller
{
    //
    public function CreateFruit(){
        return view('Fruit.create-fruit');
    }
}
