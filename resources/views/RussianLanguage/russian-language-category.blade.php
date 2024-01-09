@extends('Home.home')
@section('section_1')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="m-2">Add Language Category</h1>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <a href="" class="btn btn-primary btn-sm m-3">All Russian Language Data</a>
                        <a href="" class="btn btn-success btn-sm m-3">Create Rule</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Add Russian Language Category</label>
                        <input type="text" name="add_russian_language_category" class="form-control">
                    </div>
                    <div class="form-group">
                       <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection