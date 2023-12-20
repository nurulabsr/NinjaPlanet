<?php

namespace App\Http\Controllers;

use App\Models\Airbus;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AirbusController extends Controller{

    public function HomePage(){

        return view('Home.home');
    }
    public function createAirbusData(Request $request){

        return view('Form.create');
    }

    public function EditAirbusData(Request $request){
        return view('Form.update');
    }

    public function StoreAirBusData(Request $request){
       //
       $request->validate([
           'airbus_image_file' => ['required', 'max:4096', 'file', 'image', ],  //'mimes:jpeg,png'
           'airbus_name' => ['required', 'string', 'max:20'],
           'category_id' => ['required', 'integer', 'numeric'],
           'airbus_detail' => ['required', 'string', 'max:20'],
       ]);
       $airbusImageFile = Str::uuid() . '_' . Str::slug($request->ninja_thumnail_image->getClientOriginalName());
       $airbusImageFilePath = $request->airbus_image_file->storeAs('AirbusImageDirectory', $airbusImageFile);
       $airbus = new Airbus();
       $airbus->airbusname = $request->airbus_name;
       $airbus->airbus_description = $request->airbus_detail;
       $airbus->status = $request->airbus_status;
       $airbus->type_id = $request->category_id;
       $airbus->airbus_image = 'storage/'.$airbusImageFilePath;
       $airbus->save();
       
    }

    public function DeleteAirbusData(string $id){
      //
    }

    public function PermanentlyDeleteData(string $id){
       // 
    }


}
