<?php

namespace App\Http\Controllers;

use App\Models\Airbus;
use App\Models\Type;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

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
      session()->flush(); // all session will flush...
      return redirect('session');
    }
   
    // note: session()->all() or put([]) / put('airbus_id', 'asdqwer1234569872YxBLTYPER') or forget() or flush()
    // note (Alternative method): $request->session()->all() or put([]) / put('airbus_id', 'asdqwer1234569872YxBLTYPER') or forget() or flush()


    public function HomeWithoutPaginator(){
      $data = Cache::remember('airbuses', 3600, function(){  // ::remember() or ::rememberForever()
        return Airbus::with('types')->paginate(1);
      });

      return view('Product.Home', compact('data'));
    }

    public function Home(){
      $data = Cache::remember('airbuses-page'.request('page', 1), 60, function(){
        return Airbus::with('types')->paginate(1);
      });
      return view('Product.AirbusHomeData', compact('data'));
    }
   
    public function data(){
      $data = User::all();
    }

    public function UserData(){
      $data = Auth::user();
      return view('profile.partials.userProfile', compact('data'));
    }


    public function ShowUserData(){
      $data = User::all();
      return view('UserData.show-user-data', compact('data'));
    }


    public function UpdateUserData(string $id){
      $userData = User::findOrFail($id);
      $userTypes = UserRole::all();
      return view('UserData.update-user-data', compact('userData', 'userTypes'));
    }
}
