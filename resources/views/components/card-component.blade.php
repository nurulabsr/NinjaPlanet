<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
      <section class="mt-4">
        <div class="container">
          <div class="card" style="width: 18rem;">
            <img src="https://placekitten.com/300/200" class="card-img-top" alt="Image Alt Text">
            <div class="card-body">
              <h5 class="card-title">{{$datum->airbusname}}</h5>
              <p class="card-text">{{$datum->airbus_description}}</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
      </section>

</body>
</html>