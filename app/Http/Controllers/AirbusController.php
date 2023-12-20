<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AirbusController extends Controller{

    public function createAirbusData(){

        return view('Form.create');
    }

    public function HomePage(){
        
        return view('Home.home');
    }

}
