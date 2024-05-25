<header class="bg-primary text-white text-center py-3">
    <h1>Badoost</h1>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('home')}}">Головна</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link active" aria-current="page" href="#">Головна</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="#">Про нас</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="#">Послуги</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="#">Контакти</a>--}}
{{--                    </li>--}}

                    @if(!auth()->user())
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('loginForm')}}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('registerForm')}}">Register</a>
                        </li>
                    @else
                        @if(!auth()->user()->name)
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('profile')}}" >{{auth()->user()->email}}</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('profile')}}" >{{auth()->user()->name}}</a>
                            </li>
                        @endif
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-link text-white">Вийти</button>
                        </form>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
