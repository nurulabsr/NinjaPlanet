@extends('Home.home')
@section('section_1')
  <div class="container">
       <div class="card">
           <div class="card-header">
              <div class="row">
                 <div class="col-md-6">
                    <h1 class="m-2">Add Fruit Details</h1>
                 </div>
                 <div class="col-md-6 justify-content-end">
                    <a href="" class="btn btn-primary btn-sm m-3">Fruit Tags</a>
                    <a href="" class="btn btn-success btn-sm m-3">Show All Fruit</a>
                 </div>
              </div>
           </div>
           <div class="card-body">
              <form action="" method="POST" enctype="multipart/form-data">
                 @csrf
                 <div class="form-group">
                    <label for=""> Fruit Name</label>
                    <input type="text" name="fruit_name" class="form-control">
                 </div>
                 <div class="form-group">
                    <label for="">Fruit Description</label>
                    <input type="text" name="fruit_scientific_name" class="form-control">
                 </div>
                 <div class="form-group">
                    <label for="">Fruit Family</label>
                    <input type="text" name="fruit_family" class="form-control">
                 </div>
                 <div class="form-group">
                    <label for="">Fruit Genus</label>
                    <input type="text" name="fruit_genus" class="form-control">
                 </div>
                 <div class="form-group">
                    <label for="">Fruit Origin</label>
                    <input type="text" name="fruit_origin" class="form-control">
                 </div>
                 <div class="form-group">
                    <label for="">Fruit Harvest Season</label>
                    <input type="date" name="fruit_harvest_season" class="form-control">
                 </div>
                 <div class="form-group">
                    
                 </div>
                
              </form>
           </div>
       </div>
  </div>
@endsection