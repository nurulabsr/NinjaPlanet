<div class="main-content m-1">
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="{{asset($image)}}" alt="Card image cap" style="height: 16vh;">
        <div class="card-body">
          <h5 class="card-title">{{Illuminate\Support\Str::limit($title, 10)}}</h5>
          <p class="card-text">{{ Illuminate\Support\Str::limit($description, 70) }}</p>
          <a href="#" class="btn btn-primary">Airbus Detail</a>
        </div>
      </div>
</div>