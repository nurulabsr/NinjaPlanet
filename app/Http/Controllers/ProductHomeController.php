<?php

namespace App\Http\Controllers;

use App\Models\Airbus;
use App\Models\Type;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
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


    public function CreateUserRole(){

        return view('UserData.user-role');
    }


    public function StoreUserRole(Request $request){
        $userRole = new UserRole();
        $request->validate([
            'add_user_role' => ['required', 'string', 'unique:user_roles,role_type'], // Enhanced validation rule
        ]);

        try {
            $userRole->role_type = $request->add_user_role;
            $userRole->save();

            return redirect()->route('user.role.create')->with('success', 'User role added successfully!');
        } catch (QueryException $e) {
            if ($e->getCode() === '23000') { // Check for duplicate key violation
                return back()->withErrors(['add_user_role' => 'User role already exists.']);
            } else {
                throw $e; // Rethrow other exceptions
            }
        }



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

    public function UpdateUserAndStore(string $id, Request $request){
        $users = User::findOrFail($id);
        $request->validate([
          'user_name' => ['required', 'alpha', 'max:150', 'min:3'],
          // 'user_email_address' => ['required', 'email', 'unique:users,email'],
          'type_id' => ['required', 'numeric', 'integer', 'min:1'],
        ]);
        if($request->hasFile('image')){
           $request->validate([
            'image_updated_file' => ['required', 'max:2048', 'mimes:jpeg,png,jpg']
           ]);
        }

        $profileImageOFUser = Str::uuid(). '__' . Str::slug($request->image_updated_file->getClientOriginalName());
        $filePathOfImage = $request->image_updated_file->storeAs('UserProfilePicture', $profileImageOFUser);

        $users->name = $request->user_name;
        // $users->email = $request->user_email_address;
        $users->user_role_id = $request->type_id;
        $users->user_profile_picture = 'storage/'.$filePathOfImage;
        $users->save();
        return redirect()->route('userdata.test');
    }


     public function UserDetail($id){
       $userDetail = User::findOrFail($id);
       return view('UserData.user-detail', compact('userDetail'));
     }
    public function DeleteUserData(string $id){
     $deleteUser = User::findOrFail($id);
     $deleteUser->delete();
     return redirect()->route('userdata.test');
    }


}
