@extends('Home.home')
@section('section_1')
<main class="main-content">
      <section>
        <div class="main-content mt-5">
          <div class="card">
              <div class="card-header">
                 <div class="row">
                  <div class="col-md-6">
                    <h4 class="font-monospace">All User</h4>
                  </div>
                  <div class="col-md-6 d-flex justify-content-end">
                      <a href="" class="font-monospace btn btn-secondary mr-2 shadow-lg">Add User</a>
                      <a href="" class="font-monospace btn btn-warning shadow-lg">Recycle Bin</a>
                  </div>
                 </div>
              </div>
              <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-striped table-bordered border-dark">
                          <thead style="background: #f2f2f2">
                              <tr>
                                  <th scope="col">#</th>
                                  <th scope="col" style="width: 10%">Profile Picture</th>
                                  <th scope="col" style="width: 20%">Name</th>
                                  <th scope="col" style="width: 30%">Email</th>
                                  <th scope="col" style="width: 10%">Typo</th>
                                  <th scope="col" style="width: 10%">Create Date</th>
                                  <th scope="col" style="width: 20%">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach($data as $datum)
                              <tr>
                                  <th scope="row">{{$datum->id}}</th>
                                  <td>
                                      <img src=" " alt="" class="img-fluid" width="40">
                                  </td>
                                  <td>{{$datum->name}}</td>
                                  <td>{{Illuminate\Support\Str::limit($datum->email, 15)}}</td>
                                  <td>N/A</td>
                                  <td>{{ $datum->created_at->format('Y-m-d') }}</td>
                                  <td>
                                      <a href="" class="btn btn-success btn-sm font-monospace">Detail</a>
                                      <a href="" class="btn btn-primary btn-sm font-monospace">Update</a> {{-- {{ route('post.edit', $post->id) }} --}}
                                      <form action=" " method="POST" style="display: inline;">
                                          @csrf
                                          @method('DELETE')
                                          <button class="btn btn-danger btn-sm  d-sm-inline font-monospace">Delete</button>
                                      </form>
                                  </td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                      {{-- {{$getAllPost->links()}} --}}
                  </div>
              </div>
          </div>
      </div>
  </section>
</main>
@endsection