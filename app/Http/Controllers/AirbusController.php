<?php

namespace App\Http\Controllers;

use App\Http\Middleware\GlobalNinjaMiddleware;
use App\Models\Airbus;
use App\Models\Type;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AirbusController extends Controller{


    // public function RetrivAirbuseData(){
    //  //demo
    //    $data = Airbus::all();
    //    return view('create', compact('data'));
    // }


    // public function __construct(){
    //     $this->middleware('constructmiddleware');
    // }

    public function HomePage(){

        return view('Home.home');
    }
    public function createAirbusData(Request $request){
        $data = Airbus::all();
        $types = Type::all();
        return view('Form.create', compact('types', 'data'));
    }

    public function EditAirbusData(string $id){
     $airbus = Airbus::findOrFail($id);
     $types =  Type::all();
        return view('Form.update', compact('airbus', 'types'));
    }


    // store Airbus data
    public function StoreAirBusData(Request $request){
        Log::info('Form submitted');
       
       $request->validate([
           'airbus_image_file' => ['required', 'max:4096', 'file', 'image', ],  //'mimes:jpeg,png'
           'airbus_name' => ['required', 'string'],
           'type_id' => ['required', 'integer', 'numeric'],
           'airbus_detail' => ['required', 'string', 'min:20'],
       ]);
       if ($request->hasFile('airbus_image_file')) {
        // Process the file
        $airbusImageFile = time() . '_' . Str::slug($request->file('airbus_image_file')->getClientOriginalName()); //Str::uuid()
        $airbusImageFilePath = $request->file('airbus_image_file')->storeAs('AirbusImageDirectory', $airbusImageFile);
       } 
       $airbus = new Airbus();
       $airbus->airbusname = $request->airbus_name;
       $airbus->airbus_description = $request->airbus_detail;
       $airbus->status = $request->airbus_status;
       $airbus->type_id = $request->type_id;
       $airbus->airbus_image = 'storage/'.$airbusImageFilePath;
       $airbus->save();
       return redirect()->route('create');
    }


    //update airbus data
    public function UpdateAirBusData(string $id, Request $request){

        $update = Airbus::findOrFail($id);
        $request->validate([
            'airbus_updated_name' => ['required', 'string'],
            'type_id' => ['required', 'integer', 'numeric'],
            'airbus_updated_detail' => ['required', 'string', 'min:20'],
        ]);

        if ($request->hasFile('airbus_image_file')) {  //chech either it was image file or not, if file then validate others such as requred, max size how much, and image then rename the file, because some time malicious code come with file name
            $request->validate([
                'image_updated_file' => ['required', 'max:4096', 'image'],
            ]);
            // Process the file
            $airbusImageFile = time() . '_' . Str::slug($request->file('image_updated_file')->getClientOriginalName()); //Str::uuid()
            $airbusImageFilePath = $request->file('image_updated_file')->storeAs('AirbusImageDirectory', $airbusImageFile);
            File::delete(public_path($update->airbus_image));
            $update->airbus_image = 'storage/'.$airbusImageFilePath;
       } 

       $update->airbusname = $request->airbus_updated_name;  // take other attributes data from input filled 
       $update->airbus_description = $request->airbus_updated_detail;
       $update->type_id = $request->type_id;
       $update->save();
       return redirect()->route('create');
         
    }
    public function DeleteAirbusData(string $id){
      $deleteAirbusData = Airbus::findOrFail($id);
      $deleteAirbusData->delete();
      return redirect()->route('create');
    }

    public function PermanentlyDeleteData(string $id){
       // 'success', 'Airbus deleted successfully'
    }


    public function Hello(){
        return view('hello');
    }



    public function TestFunction(){
        $data = Airbus::all();
        return view('test', compact('data'));
    }
    public function Notfound404(){
        return view('404');
    }


}
