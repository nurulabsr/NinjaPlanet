@extends('Home.home')
@section('section_1')
<div class="conatainer">
     <div class="card">
         <div class="card-header">
             <div class="row">
                 <div class="col-md-6">
                    <h1>Add Fruit Tag</h1>
                 </div>
                 <div class="col-md-6 d-flex justify-content-end">
                     <a href="" class="btn btn-success">All Fruit Tag</a>
                     <a href="" class="btn btn-warning">Tag Trashed</a>
                 </div>
             </div>
         </div>
         <div class="card-body">
             <form action="">
                @csrf
                <div class="form-group">
                    <label for="">Tag Name</label>
                    <input type="text" name="tag_name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Tag Color</label>
                    <input type="text" name="tag_color" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Tag Description</label>
                    <textarea name="tag_description" class="form-control" cols="20" rows="10"></textarea>                
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </div>
             </form>
         </div>
     </div>
</div>
@endsection