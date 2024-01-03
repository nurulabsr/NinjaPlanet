@extends('Home.home')
@section('section_1')
    <div class="container">
         <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                          <h1>Book Data</h1>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                         <button class="btn btn-success btn-sm">View</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
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
                    <select name="book_category" id="">
                        @foreach ($categories as $category)
                            <option value=""></option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Book Description</label>
                    <textarea type="text" name="book_description" class="form-control" cols="20" rows="10"></textarea>
                  </div>
                  <div class="form-control">
                    <button class="btn btn-primary">Submit</button>
                  </div>
                </form> 
            </div>
         </div>
    </div>
@endsection