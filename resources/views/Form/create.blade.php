@extends('Home.home')
@section('section_1') 
<div class="main-content">
    <section>
        <div class="row">
            <div class="card">
                <div class="card-body">
                    @foreach ($airbusData as $datum)
                    <div class="d-flex justify-content-space-between">
                            <img src="{{asset($datum->airbus_image)}}" alt="" style="width: 4vw;"> <br>
                            <h1>{{$datum->airbusname}}</h1>
                            <p>{{$datum->airbus_description}}</p>
                            <form action="{{route('airbus.deletedata', $datum->id)}}" method="POST" class="d-inline">
                             @csrf
                             @method('DELETE')
                               <button class="btn btn-danger btn-sm d-none d-sm-inline">Delete</button> 
                            </form>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
   <div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6"> 
                <h1 class="m-1">Create Airbus Data</h1>
            </div>
            <div class="col-md-6 d-flex justify-content-end"> 
                <button class="btn btn-danger btn-sm m-2"> Recycle Bin</button>
                <button class="btn btn-warning btn-sm m-2"> Edit Database</button>
                <button class="btn btn-info btn-sm m-2"> Data List </button>
                <button class="btn btn-success btn-sm m-2">Category Section</button>

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
        <form action="{{ route('airbus.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="airbus_image_file" id="airbus_image_file" class="form-control">
                {{-- @error('airbus_image_file')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror --}}
            </div>            
            <div class="form-group">
                <label for="">Airbus Name</label>
                <input type="text" name="airbus_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Airbus Status</label>
                <input type="text" name="airbus_status" class="form-control">
            </div>
            <div class="form-group">
               <label name="" id="">Category</label>
               <select name="type_id" id="" class="form-control">
                <option value="">Select</option>
                @foreach ($types as $type)
                <option value="{{$type->id}}">{{$type->type_name}}</option>
                @endforeach
               </select>
            </div>
            <div class="form-group">
                <label for="">Airbus Detail</label>
                <textarea type="text" name="airbus_detail" class="form-control" rows="10"> </textarea>
            </div>
            @can('create')
            <div class="form-group mt-3">
                <button class="btn btn-primary">Submit</button>
            </div>
            @endcan
        </form>
    </div>
   </div>
</div>
@endsection

