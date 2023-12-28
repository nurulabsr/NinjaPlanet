<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Test Three</title>
</head>
<body>
   <div class="container d-flex justify-content-start">
    @foreach($data as $datum)
    <x-test-two-component> 
        <x-slot name="image">
            {{$datum->airbus_image}}
         </x-slot>
          <x-slot name="title">
            {{$datum->airbusname}}
         </x-slot>

         <x-slot name="description">
            {{$datum->airbus_description}}
         </x-slot> 

    </x-test-two-component>
    @endforeach
   </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>