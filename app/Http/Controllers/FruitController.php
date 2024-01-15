<?php

namespace App\Http\Controllers;

use App\Models\Fruit;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class FruitController extends Controller
{
    //
    public function CreateFruitDetails(){
        $tags = Tag::all();
        return view('Fruit.create-fruit', compact('tags'));
    }


    public function StoreFruitDetails(Request $request){
        $fruits = new Fruit();
        $request->validate([
            'fruit_name'                     => ['required', 'string', 'max:255'],
            'fruit_scientific_name'          => ['required', 'string', 'max:255'],
            'fruit_family'                   => ['required', 'string', 'max:255'],
            'fruit_genus'                    => ['required', 'string', 'max:255'],
            'fruit_origin'                   => ['required', 'string', 'max:255'],
            'fruit_harvest_season'           => ['required', 'date'],
            'fruit_shelf_life'               => ['required', 'string' , 'max:255'],
            'fruit_storage_conditions'       => ['required', 'string' , 'max:255'],
            'fruit_price'                    => ['required', 'numeric', 'max_digits:5'],//digits
            'fruit_nutritional_information'  => ['required', 'string' , 'max:1500'],
            'fruit_description'              => ['required', 'string' , 'max:1500'],
        ]);  
        
        //'fruit_image'  => ['required', ],

        if($request->hasFile('fruit_image')){
            $request->validate([
                  'fruit_image' => ['required', 'image', 'mimes:png,jpg', 'max:2048']
            ]);
        }
      

        $fruits->fruit_name = $request->fruit_name;
        $fruits->fruit_scientific_name = $request->fruit_scientific_name;
        $fruits->fruit_family = $request->fruit_family;
        $fruits->fruit_genus = $request->fruit_genus;
        $fruits->fruit_origin = $request->fruit_origin;
        $fruits->fruit_harvest_season = $request->fruit_harvest_season;
        $fruits->fruit_shelf_life = $request->fruit_shelf_life;
        $fruits->fruit_storage_conditions = $request->fruit_storage_conditions;
        $fruits->fruit_price = $request->fruit_price;
        $fruits->fruit_nutritional_information = $request->fruit_nutritional_information;
        $fruits->fruit_description = $request->fruit_description;

        $fruitImageFileName = Str::uuid() .'__'. Str::slug($request->fruit_image->getClientOriginalName());
        $filePath = $request->fruit_image->storeAs('Fruit', $fruitImageFileName);
        $fruits->fruit_image = 'storage/'.$filePath;
        $fruits->save();
        $tags = $request->input('fruit_tag');
        $fruits->tags()->attach($tags);

    }


    public function CreateFruitTag(){

        return view('Fruit.Tag.fruit-tag-create');
    }


    public function StoreFruitTag(Request $request){
        $tag = new Tag();
        $request->validate([
            'tag_name' =>        ['required', 'string', 'max:255'],
            'tag_color' =>       ['required', 'string', 'max:255'],
            'tag_description' => ['required', 'string', 'max:800'],
        ]);

        $tag->tag_name = $request->tag_name;
        $tag->tag_color = $request->tag_color;
        $tag->tag_description = $request->tag_description;
        $tag->save();
    }
}
