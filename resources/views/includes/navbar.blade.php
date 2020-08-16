<div class="container fixed-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-white col-md-12"
        style="border-radius:8px;margin:auto;margin-top:14px;">
        <a href="" class="navbar-brand">
            <img src="assets/frontend/bootstrap/img/logo.png" class="image-fluid" alt="logo">
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav ml-auto mr-3">
                <li class="nav-item mx-md-2 align-self-center">
                    <a href="{{ route("home") }}" class="nav-link align-self-center {{ Request::is('/')?'active':'' }}">
                        Home
                    </a>
                </li>
                <li class="nav-item mx-md-2 align-self-center">
                    <a href="{{ route("paket-travel") }}"
                        class="nav-link {{ Request::is('paket-travel')?'active':'' }}">
                        Paket Travel
                    </a>
                </li>
                <li class="nav-item dropdown align-self-center">
                    <a href="#" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">
                        Service
                    </a>
                    <div class="dropdown-menu align-self-center">
                        <a href="" class="dropdown-item">Link 1</a>
                        <a href="" class="dropdown-item">Link 2</a>
                        <a href="" class="dropdown-item">Link 3</a>
                    </div>
                </li>
                <li class="nav-item mx-md-2 align-self-center">
                    <a href="" class="nav-link">
                        Testimonial
                    </a>
                </li>

                <!-- Mobile Button -->
                @guest
                <form action="" class="form-inline d-sm-block d-md-none none" style="text-align: center">
                    <button class="btn btn-login my-2 my-sm-0 px-4" type="button"
                        onclick="event.preventDefault();location.href='{{ url('login') }}'">Masuk</button>
                </form>

                <form action="" class="form-inline d-none my-2 my-lg-0 d-md-block" style="text-align: center">
                    <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="button"
                        style="border-radius:0 8px 8px 0"
                        onclick="event.preventDefault();location.href='{{ url('login') }}'">Masuk</button>
                </form>
                @endguest

                @auth
                <form action="{{ url('logout') }}" class="form-inline d-sm-block d-md-none none" method="POST">
                    @csrf
                    <button class="btn btn-login my-2 my-sm-0 px-4">Keluar</button>
                </form>

                <form action="{{ url('logout') }}" class="form-inline d-none my-2 my-lg-0 d-md-block" method="POST">
                    @csrf
                    <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4"
                        style="border-radius:0 8px 8px 0">Keluar</button>
                </form>
                @endauth
            </ul>
        </div>
    </nav>
</div>
