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
    <div class="card-body">
        <form action="">
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="image_file" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Airbus Name</label>
                <input type="text" name="airbus_name" class="form-control">
            </div>
            <div class="form-group">
               <label name="" id="">Category</label>
               <select name="" id="" class="form-control">
                <option value="">Select</option>
                <option value="">Option 1</option>
               </select>
            </div>
            <div class="form-group">
                <label for="">Airbus Detail</label>
                <textarea type="text" name="airbus_detail" class="form-control" rows="10"> </textarea>
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

