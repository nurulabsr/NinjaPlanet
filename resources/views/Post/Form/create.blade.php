@extends('Home.home')
@section('section_1')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="m-2">Add post</h1>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                       <button class="btn btn-success btn-sm m-3">View All Post</button>
                       <button class="btn btn-warning btn-sm m-3">Recycle Bin</button>
                    </div>
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
                        <div class="form-group">
                            <label for="">Post Thumnail</label>
                            <input type="file" name="post_thumnail" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Post Image</label>
                            <input type="file" name="post_image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Post Video</label>
                            <input type="file" name="post_video" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Post Description</label>
                            <textarea name="post_description" class="form-control" cols="20" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
        </div>    
    </div> 
@endsection