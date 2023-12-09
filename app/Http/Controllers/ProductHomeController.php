<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductHomeController extends Controller{
   public function ProductHome(){
      
    return view('HomeProduct');

   }
}
