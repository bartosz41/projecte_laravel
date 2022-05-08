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
                      <li class="breadcrumb-item"> <a href="/show-user/{{auth()->user()->id}}">User Profile</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
                    </ol>
                  </nav>
                </div>
              </div>
          
              <div class="row">
                <div class="col-lg-8">
                  <div class="card mb-4">
                    <div class="card-body">
                      <div class="row">
                        <center>
                          <form method="POST" action="/save-edit-user/{{$user->id}}">
                              <input type="hidden" value="{{$user->id}}" name="user_id">
                            @csrf
                    
                            <div class="form-group form-floating mb-3" style="width:70%;">
                                <input type="text" class="form-control" name="name" value="{{ old('name',$user->name) }}" placeholder="Name"  autofocus>
                                <label for="floatingName">Name</label>
                                @if ($errors->has('name'))
                                    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                    
                            <div class="form-group form-floating mb-3" style="width:70%;">
                                <input type="text" class="form-control" name="organization" value="{{ old('organization',$user->organization) }}" placeholder="Organization"  autofocus>
                                <label for="floatingName">Organization</label>
                                @if ($errors->has('organization'))
                                    <span class="text-danger text-left">{{ $errors->first('organization') }}</span>
                                @endif
                            </div>
                    
                            <div class="form-group form-floating mb-3" style="width:70%;">
                                <input type="text" class="form-control" name="phone" value="{{ old('phone',$user->phone) }}" placeholder="Phone"  autofocus>
                                <label for="floatingName">Phone</label>
                                @if ($errors->has('phone'))
                                    <span class="text-danger text-left">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                    
                            <div class="form-group form-floating mb-3" style="width:70%;">
                                <input type="text" class="form-control" name="country" value="{{ old('country',$user->country) }}" placeholder="Country"  autofocus>
                                <label for="floatingName">Country</label>
                                @if ($errors->has('country'))
                                    <span class="text-danger text-left">{{ $errors->first('country') }}</span>
                                @endif
                            </div>
                    
                            <div class="form-group form-floating mb-3" style="width:70%;">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                                @if ($errors->has('password'))
                                    <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <button class="btn btn-success ms-1" style="width:20%;" type="submit">Save</button>
                          </form>
                        </center>
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
