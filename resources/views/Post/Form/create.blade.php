@extends('Home.home')
@section('section_1')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h1>Add post</h1>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                       <button class="btn btn-success btn-sm">View All Post</button>
                       <button class="btn btn-warning btn-sm">Recycle Bin</button>
                    </div>
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Post Title</label>
                            <input type="text" name="post_title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Post Category</label>
                            <select name="post_category" class="form-control">
                                <option value="">Select</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </div> 
@endsection