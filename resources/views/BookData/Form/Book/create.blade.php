@extends('Home.home')
@section('section_1')
    <div class="container">
         <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                          <h1 class="m-2">Book Data</h1>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                         <button class="btn btn-success btn-sm m-3">View All Book Data</button>
                    </div>
                </div>
            </div>
            @if($errors->any())
            @foreach ($errors->all() as $error )
                 <div class="alert alert-danger">
                  {{$error}}
                 </div>
            @endforeach    
            @endif
            <div class="card-body">
                <form action="{{route('book.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label for="">Book Nme</label>
                    <input type="text" name="book_name" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="">Book Author Name</label>
                    <input type="text" name="book_author" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="">Book Image</label>
                    <input type="file" name="book_image" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="">Book Price</label>
                    <input type="number" name="book_price" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="">Publish Year</label>
                    <input type="text" name="publish_year" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="">Book Category</label>
                    <select name="book_category_id" class="form-control">
                        <option value="">Select</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->book_category}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Book Description</label>
                    <textarea type="text" name="book_description" class="form-control" cols="20" rows="10"></textarea>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary m-4">Submit Book Data</button>
                  </div>
                </form> 
            </div>
         </div>
    </div>
@endsection