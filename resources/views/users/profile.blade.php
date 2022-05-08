@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded" id="app">
        @auth
        <section style="background-color: #eee;">
            <div class="container py-5">
              <div class="row">
                <div class="col">
                  <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                      <li class="breadcrumb-item"><a href="/">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                    </ol>
                  </nav>
                </div>
              </div>
          
              <div class="row">
                <div class="col-md-6">
                  <div class="card mb-4 mb-md-0">
                    <div class="card-body text-center">
                      <h5 class="my-3">{{auth()->user()->name}}</h5>
                      <p class="text-muted mb-1">{{auth()->user()->role}}</p>
                      <div class="d-flex justify-content-center mb-2">
                        <a type="button" href="/edit-user/{{auth()->user()->id}}" class="btn btn-primary ms-1">Edit</a>
                        <a type="button" href="/delete-user/{{auth()->user()->id}}" class="btn btn-outline-danger ms-1">Delete</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card mb-4 mb-md-0">
                    <div class="card-body">
                      <p class="mb-4"><span class="text-primary font-italic me-1">Experiences</span> History
                      </p>
                        <experiences-component></experiences-component>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row" style="margin-top: 10px;">
                <div class="col-lg-12">
                  <div class="card mb-4">
                    <div class="card-body">
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
            </div>
          </section>
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
