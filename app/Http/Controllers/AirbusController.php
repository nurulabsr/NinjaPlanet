<?php

namespace App\Http\Controllers;

use App\Models\Airbus;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AirbusController extends Controller{

    public function HomePage(){

        return view('Home.home');
    }
    public function createAirbusData(Request $request){
        $types = Type::all();
        return view('Form.create', compact('types'));
    }

    public function EditAirbusData(string $id){
     $airbus = Airbus::findOrFail($id);
     $types =  Type::all();
        return view('Form.update', compact('airbus', 'types'));
    }

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

    public function UpdateAirBusData(string $id, Request $request){

        $update = Airbus::findOrFail($id);
        $request->validate([
            'airbus_name' => ['required', 'string', 'max:50000'],
            'type_id' => ['required', 'integer', 'numeric'],
            'airbus_detail' => ['required', 'string', 'min:20'],
        ]);

        if ($request->hasFile('airbus_image_file')) {
            $request->validate([
                'airbus_image_file' => ['required', 'max:4096', 'image'],
            ]);
            // Process the file
            $airbusImageFile = time() . '_' . Str::slug($request->file('airbus_image_file')->getClientOriginalName()); //Str::uuid()
            $airbusImageFilePath = $request->file('airbus_image_file')->storeAs('AirbusImageDirectory', $airbusImageFile);
            $update->airbus_image = 'storage/'.$airbusImageFilePath;
       } 

       $update->airbusname = $request->airbus_updated_name;
       $update->airbus_description = $request->airbus_updated_detail;
       $update->type_id = $request->type_id;
       $update->save();
       return redirect()->route('create');
         
    }
    public function DeleteAirbusData(string $id){
      //
    }

    public function PermanentlyDeleteData(string $id){
       // 
    }


}
