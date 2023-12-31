<?php

namespace App\Http\Controllers;

use App\Models\Airbus;
use App\Models\Type;
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


    public function TestThree3(){
       $data = Airbus::all();
       return view('test3', compact('data'));
    }

    public function TestFour(){
      $data = Type::all();
      return view('test4', compact('data'));
    }


    public function retriveSession(Request $request){
        $data = $request->session()->all();
        dd($data);
    }

    public function storingSession(Request $request){
       $request->session()->put(['email' => 'user@edu.com', 'ip_address' => '192.168.5.21', 'location' => 'Dhacca']);
       return redirect('session');
    }


    public function deleteSession(Request $request){
      $request->session()->forget('location');
      return redirect('session');
    }

    public function deleteSession_Version2(){
      session()->flush(); // all session will flush.
      return redirect('session');
    }

}
