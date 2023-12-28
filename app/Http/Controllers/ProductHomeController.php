<?php

namespace App\Http\Controllers;

use App\Models\Airbus;
use Illuminate\Http\Request;

class ProductHomeController extends Controller{

  public function HomePage(){

    return view('Home.home');
}
  public function HomeProduct(){
    $var1 = 'Hello';
    return view('HomeProduct', compact('var1'));
   }


     public function Notfound404(){
        return view('404');
    }


    public function Test2(){
      return view('TestTwo');
    }

    public function TestThree(){

      $data = Airbus::all();
      return view('Home.testThree', compact('data'));
    }
}
