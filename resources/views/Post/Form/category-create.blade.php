@extends('Home.home')
@section('section_1')
<div class="container">
  <div class="card">
    <div class="card-header">
     <div class="row">
         <div class="col-md-6">
            <h1>All Category</h1>
         </div>
         <div class="col-md-6">
            <button type="submit" class="btn btn-worning btn-sm">Create Post</button>
            <button type="submit" class="btn btn-success btn-sm">View All Post</button>
         </div>
     </div>
    </div>  
    <div class="card-body">
       <form action="{{route('post.category.store')}}" method="POST" enctype="multipart/form-data">
         @csrf
         <div class="form-group">
            <label for="">Post Category</label>
            <input type="text" name="post_category" class="form-control">
         </div>
         <div class="form-group">
          <button type="submit" class="btn btn-primary">Submit</button>
         </div>
      </form>
    </div> 
 </div>    
</div>    
@endsection