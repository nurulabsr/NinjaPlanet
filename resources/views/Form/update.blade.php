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
                <button class="btn btn-warning btn-sm m-md-2 m-sm-1"> Create Airbus Data</button>
                <button class="btn btn-danger btn-sm m-md-2  m-sm-1">  Airbus Data Recycle Bin</button>
                <button class="btn btn-info btn-sm m-md-2    m-sm-1">   Air Data List</button>
                <button class="btn btn-success btn-sm m-md-2 m-sm-1">Category Section</button>

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
        <form action="{{route('airbus.update', $airbus->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <img src="{{asset($airbus->airbus_image)}}" alt="" style="width: 4vw;">
                <label for="">Image</label>
                <input type="file" name="image_updated_file" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Airbus Name</label>
                <input type="text" name="airbus_updated_name" class="form-control" value="{{$airbus->airbusname}}">
            </div>
            <div class="form-group">
               <label name="" id="">Category</label>
               <select name="type_id" id="" class="form-control">
                <option value="">Select</option>
                @foreach ($types as $type)
                <option {{$type->id == $airbus->type_id?'selected':''}} value="{{$type->id}}">{{$type->type_name}}</option>
                @endforeach
               </select>
            </div>
            <div class="form-group">
                <label for="">Airbus Detail</label>
                <textarea type="text" name="airbus_updated_detail" class="form-control" rows="10">{{$airbus->airbus_description}}</textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning btn-lg">
            </div>
        </form>
    </div>
    <div></div>
   </div>
</div>
@endsection

