@extends('Home.home')
@section('section_1')
    <div class="container">
        @foreach ($data as $datum)
            <div style="border: 15px;">
                <h1>{{$datum->airbusname}}</h1>
                <p>{{$datum->airbus_description}}</p>
            </div>
        @endforeach
    </div>

    {{$data->links()}}
@endsection
