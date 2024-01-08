@extends('Home.home');
@section('section_1')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="m-2">Role Category</h1>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <a href="" class="btn btn-primary btn-sm m-3">All User List</a>
                        <a href="" class="btn btn-success btn-sm m-3">User Role</a>
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
                <form action="{{route('user.role.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                     <label for="">Add User Role</label>
                     <input type="text" name="add_user_role" class="form-control">
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
            </div>
        </div>
    </div>
@endsection
