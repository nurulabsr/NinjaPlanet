@extends('Home.home')
@section('section_1') 
<div class="main-content">
   <div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6"> 
                <h1 class="m-1">Edit Airbus Data</h1>
            </div>
            <div class="col-md-6 d-flex justify-content-end"> 
                <button class="btn btn-warning btn-sm m-md-2 m-sm-1">Add User</button>
                <button class="btn btn-danger btn-sm m-md-2  m-sm-1">User Recycle Bin</button>
                <button class="btn btn-info btn-sm m-md-2    m-sm-1">All User Data</button>
                <button class="btn btn-success btn-sm m-md-2 m-sm-1">User Typo</button>

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
        <form action="{{route('user.updateand.store', $userData->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <img src="{{asset($userData->user_profile_picture)}}" alt="" style="width: 4vw;">
                <label for="">Image</label>
                <input type="file" name="image_updated_file" class="form-control">
            </div>
            <div class="form-group">
                <label for="">User Name</label>
                <input type="text" name="user_name" class="form-control" value="{{$userData->name}}">
            </div>
            <div class="form-group">
               <label name="" id="">User Type</label>
               <select name="type_id" id="" class="form-control">
                <option value="">Select</option>
                @foreach ($userTypes as $userType)
                <option {{$userType->id == $userData->user_role_id?'selected':''}} value="{{$userType->id}}">{{$userType->role_type}}</option>
                @endforeach
               </select>
            </div>
            {{-- <div class="form-group">
                <label for="">User Email</label>
                <input type="email" name="user_email_address" class="form-control" value="{{$userData->email}}">
            </div> --}}
            <div class="form-group">
                <input type="submit" class="btn btn-warning btn-lg">
            </div>
        </form>
    </div>
    <div></div>
   </div>
</div>
@endsection

