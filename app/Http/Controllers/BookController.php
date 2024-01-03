<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller{
    public function CreateBookData(){
        $books  = Book::all();
        $categories = Category::all();
        return view('Book.Form.create', compact('books', 'categories'));
    }

    public function StoreBookData(Request $request){
        $bookData = new Book();
        $request->validate([
           
        ]);

        if($request->hasFile('book_image')){
          $request->validate([
            'book_image' => ['required'],
          ]);
        
        }
    }

}
