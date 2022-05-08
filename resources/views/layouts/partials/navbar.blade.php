<style>
</style>

<header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="/" class="nav-link px-2 text-secondary">Home</a></li>
          @auth
          @if(auth()->user()->role == 'User')
          <li><a href="/reserve" class="nav-link btn-outline-secondary px-2 text-light">Reserve</a></li>
          <li><a href="/reserve-list/{{auth()->user()->id}}" class="nav-link btn-outline-secondary px-2 text-light">My reserves</a></li>
          @endif
          @if(auth()->user()->role == 'Admin')
            <li><a href="/game-list" class="nav-link btn-outline-secondary px-2 text-light">Games</a></li>
            <li><a href="/room-list" class="nav-link btn-outline-secondary px-2 text-light">Rooms</a></li>
            <li><a href="/staff-list" class="nav-link btn-outline-secondary px-2 text-light">Staff</a></li>
            <li><a href="/users-list" class="nav-link btn-outline-secondary px-2 text-light">Users</a></li>
            <li><a href="/reserve-list-all" class="nav-link btn-outline-secondary px-2 text-light">Reserves</a></li>
          @endif
          @endauth
        </ul>
        @auth
          @if(auth()->user()->role == 'User')
          <a href="/show-user/{{auth()->user()->id}}" class="btn btn-outline-light me-2"><span id="profile">{{auth()->user()->name}}</span></a>
          @endif
          <div class="text-end">
            <a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2">Logout</a>
          </div>
        @endauth

        @guest
          <div class="text-end">
            <a href="{{ route('login.perform') }}" class="btn btn-outline-light me-2">Login</a>
            <a href="{{ route('register.perform') }}" class="btn btn-warning">Sign-up</a>
          </div>
        @endguest
      </div>
    </div>
  </header>
