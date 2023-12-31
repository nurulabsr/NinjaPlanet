@extends('Home.home')
@section('section_1')
   <div class="main-content">
       @foreach ($data as $datum)
            <div>
                <h1>{{$datum->airbusname}}</h1>
            </div>
       @endforeach
   </div>
   {{$data->links()}}
@endsection