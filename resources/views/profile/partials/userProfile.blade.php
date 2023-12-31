@extends('Home.home')
@section('section_1')
  <div class="main-content">
      {{-- @foreach ($data as $datum)  --}}
      <div>
          <li>{{$data->name}}</li>
          <li>{{$data->email}}</li>
      </div>
      {{-- @endforeach --}}
  </div>
@endsection