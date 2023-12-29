<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title_of_heading}}</title>
</head>
<body>
    @foreach ($data as $datum)
    <x-test3>
        <x-slot name="title">
          {{$datum->airbus_description}}
        </x-slot>
    </x-test3>
    @endforeach



</body>
</html>