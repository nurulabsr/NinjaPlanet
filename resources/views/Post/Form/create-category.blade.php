@extends('Home.home')
@section('section_1')
<div class="container">
     <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="m-2">Add Post Category</h1>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <button class="btn btn-warning btn-sm m-3">Create Post</button>
                    <button class="btn btn-success btn-sm m-3">All post</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('post.category.store')}}" method="POST" enctype="multipart/form-data">
             @csrf
             <div class="form-group">
                <label for="">Category</label>
                <input type="text" name="post_category" class="form-control">
             </div>
             <div class="form-group">
                <button class="btn btn-primary" type="submit">Submit</button>
             </div>
            </form>
        </div>
     </div>
</div>
@endsection