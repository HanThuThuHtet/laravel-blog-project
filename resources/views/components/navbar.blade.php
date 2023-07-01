{{-- <nav>
    <li><a href="">Home</a></li>
    <li><a href="">About</a></li>
    <li><a href="">Contact</a></li>
</nav> --}}

<!-- navbar -->
<nav class="navbar navbar-white bg-white shadow-sm">
    <div class="container py-2">

      <a class="navbar-brand fw-bolder" href="/"><h4>Yumeno Nihon</h4></a>
      <div class="d-flex nav">
        <a href="/" class="nav-link  text-dark fw-bold">Home</a>
        <a href="/#blogs" class="nav-link text-dark fw-bold">Blogs</a>
        {{-- @if (!auth()->check()) --}}
        @guest
            <a href="/register" class="nav-link text-dark fw-bold">Register</a>
            <a href="/login" class="nav-link text-dark fw-bold">Login</a>
        @endguest
        @auth
            @can('admin')
                <a href="/admin/blogs" class="nav-link text-dark fw-bold">Dashboard</a>
            @endcan
            <div class="dropdown">
                <button class="btn  dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{auth()->user()->avatar}}" width="35" height="35" class="rounded-circle" alt="">
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a href="" class="nav-link btn btn-link text-dark text-start">
                            <p class="mb-0">Logged in as </p>
                            <p class="mb-0 fw-bold">{{auth()->user()->username}}</p>
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link text-dark ">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        @endauth
        {{-- <a href="#subscribe" class="nav-link text-dark fw-bold">Subscribe</a> --}}
      </div>
    </div>
  </nav>
