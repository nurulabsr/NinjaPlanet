@extends('Home.home')
@section('section_1')
  <div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h1 class="m-2">Add Russian Word</h1>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <a href="" class="btn btn-success btn-sm m-3">Language Note</a>
                <a href="" class="btn btn-primary btn-sm m-3">Russian Language Category</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="">
            @csrf
            <div class="form-group">
                <label for="">Add Russian Word</label>
                <input type="text" name="add_russian_word" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Russian Word Meaning</label>
                <input type="text" name="russian_word_meaning" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Category</label>
                <select name="russian_language_category_id" id="">
                    <option value="">value one</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
            </div>
        </form>
    </div>
  </div>
@endsection
