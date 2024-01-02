<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller{
    public function CreateBookData(){
        $data  = Book::all();
        return view('Book.Form.create', compact('data'));
    }
}
