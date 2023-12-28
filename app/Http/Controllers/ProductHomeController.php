<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductHomeController extends Controller{
   public function HomeProduct(){
    $var1 = 'Hello';
    return view('HomeProduct', compact('var1'));
   }


     public function Notfound404(){
        return view('404');
    }
}
