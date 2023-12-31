@extends('Home.home')
@section('section_1')
 @foreach ($data as $datum)
     <h1>{{$datum->airbusname}}</h1>
 @endforeach
@endsection