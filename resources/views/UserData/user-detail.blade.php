@extends('Home.home')
@section('section_1')
    <section class="container">
       <div>
           {{$userDetail->name}}
           {{$userDetail->email}}
           {{$userDetail->userRoles->role_type}}
       </div>
    </section>
@endsection