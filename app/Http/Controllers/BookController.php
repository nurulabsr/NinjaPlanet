<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request, Illuminate\Support\Str;

class BookController extends Controller{
    public function CreateBookData(){
        $books  = Book::all();
        $categories = Category::all();
        return view('BookData.Form.Book.create', compact('books', 'categories'));
    }

    public function StoreBookData(Request $request){
        $bookData = new Book();
        $request->validate([
            'book_name'     =>    [ 'required',  'string'  ,   'regex:/^[A-Za-z0-9\s]+$/',  'max:255'  ],
            'book_author'   =>    [ 'required',  'string'  ,   'regex:/^[A-Za-z0-9\s]+$/',  'max:255'  ],
            'book_price'    =>    [ 'required',  'integer' ,   'numeric',    'min:0'                   ],
            'publish_year'  =>    [ 'required',  'string'  ,   'numeric',    'integer'                 ],
            'book_category_id' =>    [ 'required',  'string'  ,   'regex:/^[A-Za-z0-9\s]+$/',  'max:256'  ],
            'book_description' => [ 'required',  'string',  'max:5000' ],
  
        ]);

        if($request->hasFile('book_image')){
          $request->validate([
            'book_image' => ['required', 'max:2048', 'mimes:png,jpg, jpeg'],
          ]); 
        }
        $chnage_book_image_file_name = Str::uuid() .'_Ninja_'. Str::slug($request->book_image->getClientOriginalName());
        $book_image_path = $request->book_image->storeAs('BookImage', $chnage_book_image_file_name);

        $bookData->book_name        = $request->book_name;     
        $bookData->book_authors     = $request->book_author;
        $bookData->publish_year     = $request->publish_year;
        $bookData->book_description = $request->book_description;
        $bookData->book_price       = $request->book_price;
        $bookData->category_id      = $request->book_category_id;
        $bookData->book_image       = 'storage/'.$book_image_path;

        $bookData->save();
        return redirect()->route('book.create');
    } 


    public function CreateBookCategoryData(){
       return view('BookData.Form.Category.create');
    }

    public function StroreBookCategoryData(Request $request){
        $categoryData = New Category();
        $request->validate([
            'book_category_name' => ['required', 'string', 'regex:/^[A-Za-z0-9\s]+$/'],
        ]);
       $categoryData->book_category = $request->book_category_name;
       $categoryData->save();
       return redirect()->route('book.category.create');
    }

}
