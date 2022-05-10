@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded" id="app">
        @auth
        <section style="background-color: #eee;">
            <div class="container" style="padding:0px;">
              <div class="row" style="background-color:	#DCDCDC;padding-top:10px;">
                <div class="col">
                  <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                      <li class="breadcrumb-item"><a href="/">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                    </ol>
                  </nav>
                </div>
              </div>
            <center>
              <div class="row">
                <div class="col-md-12" style="background-color:#A9A9A9;padding:10px;">
                  <div class="card mb-4 mb-md-0">
                    <div class="card-body text-center" style="background-color:#D3D3D3;padding:10px;">
                      <h5 class="my-3">{{auth()->user()->name}}</h5>
                      <div class="d-flex justify-content-center mb-2">
                        <a type="button" href="/edit-user/{{auth()->user()->id}}" class="btn btn-primary ms-1">Edit</a>
                        <a type="button" href="/delete-user/{{auth()->user()->id}}" class="btn btn-outline-danger ms-1">Delete</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row" style="margin-top: 10px;">
                <div class="col-lg-12" style="background-color:#A9A9A9;padding:10px;">
                  <div class="card mb-4">
                    <div class="card-body" style="background-color:#D3D3D3;padding:10px;">
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Name</p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0">{{auth()->user()->name}}</p>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">DNI</p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0">{{auth()->user()->dni}}</p>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Email</p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0">{{auth()->user()->email}}</p>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Phone</p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0">{{auth()->user()->phone}}</p>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Country</p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0">{{auth()->user()->country}}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12" style="background-color:#A9A9A9;padding:10px;margin-top:10px;">
                <div class="card mb-4 mb-md-0">
                  <div class="card-body">
                    <p class="mb-4"><span class="text-dark me-1">Experiences - history</span> 
                    </p>
                    @foreach(auth()->user()->valorations as $valoration)
                      <div style="background-color:#D3D3D3;padding:10px;">
                        <form method="POST" action="/save-valoration">
                            <p class="mb-1 fs-3">{{$valoration->id}}</p>
                            <input type="hidden" name="valoration_id" value="{{old('commentary',$valoration->id)}}">
                            <hr>
                            @csrf
                            <div class="form-group form-floating mb-3" style="width:40%;">
                                <input type="text" minlength="0" maxlength="50" value="{{old('commentary',$valoration->commentary)}}" class="form-control" name="commentary" placeholder="Commentary" required="required" autofocus>
                                <label for="floatingName">Commentary</label>
                            </div>
            
                            <div class="form-group form-floating mb-3" style="width:40%;">
                                <input type="number" value="{{old('points',$valoration->points)}}" max="5" min="0" class="form-control" name="points" placeholder="Points" required="required" autofocus>
                                <label for="floatingName">Points</label>
                            </div>
            
                            <button class="btn btn-success ms-1" type="submit">Save</button>
                        </form>
                        <hr>
                      </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </center>
            </div>
          </section>
          <script>
            window.posts = @json(auth()->user()->id);
          </script>
        @endauth

        @guest
        <p class="lead">You aren't logged in.</p>
        @endguest
    </div>
    @guest
    <div id="app">
        <home-component></home-component>
    </div>
    @endguest
@endsection
