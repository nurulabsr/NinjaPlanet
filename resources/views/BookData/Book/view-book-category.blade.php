@extends('Home.home')
@section('section_1')
    @foreach ($BookCategories as $BookCategory)
       <div class="container">
        <p>{{$BookCategory->book_category??'N/A'}}</p>
       </div>
    @endforeach
@endsection