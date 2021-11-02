<nav class="navbar navbar-expand-xl navbar-dark" style="background-color: #246B85" id="navbarapp">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarmain"
        aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-md-start" id="navbarmain">
        <ul class="navbar-nav">
            <li class="nav-ite">
                @if (Request::segment(1) == 'home')
                    <a class="nav-link active" href="{{ route('index') }}">Home</a>
                @else
                    <a class="nav-link" href="{{ route('index') }}">Home</a>
                @endif
            </li>
            <li class="nav-item">
                @if (Request::segment(1) == 'series')
                    <a class="nav-link active" href="{{ route('listar_series') }}">Séries</a>
                @else
                    <a class="nav-link" href="{{ route('listar_series') }}">Séries</a>
                @endif
            </li>
        </ul>
    </div>
    <div class="collapse navbar-collapse justify-content-md-end" id="navbarmain">
        <ul class="navbar-nav">
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right py-1 m-0" style="background-color: #246B85"
                        aria-labelledby="navbarDropdown">
                        <a class="btn text-white text-left w-100 h-100" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="bi bi-box-arrow-left"></i>&nbsp;&nbsp;{{ __('Sair') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>
