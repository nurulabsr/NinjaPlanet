<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
           'image_file' => ['required', 'max:4096', 'file', 'image', ],  //'mimes:jpeg,png'
           'airbus_name' => ['required', 'string', 'max:20'],
           'category_id' => ['required', 'integer', 'numeric']
       ]);

       
       
    }

    public function DeleteAirbusData(string $id){
      //
    }

    public function PermanentlyDeleteData(string $id){
       // 
    }


}
