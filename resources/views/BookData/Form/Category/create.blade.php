@extends('Home.home')
@section('section_1')
    <section class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="m-2">Add Category</h1>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                       <button class="btn btn-warning btn-sm m-3">Create Book Data</button>
                       <button class="btn btn-success btn-sm m-3">All Books</button>
                    </div>
                </div>
            </div>
            <div class="card-header">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                   <div class="form-group">
                     <label for="">Category Name</label>
                     <input type="text" name="book_category" class="form-control">
                   </div>
                   <div class="form-group">
                     <button class="btn btn-primary">Submit</button>
                   </div>
                </form>
            </div>
        </div>
    </section>
@endsection