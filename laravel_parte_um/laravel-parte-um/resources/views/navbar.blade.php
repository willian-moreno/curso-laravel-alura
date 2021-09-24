<nav class="navbar navbar-expand-xl navbar-dark" style="background-color: #246B85">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample06"
        aria-controls="navbarsExample06" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample06">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                @if(Request::segment(1) == '')
                    <a class="nav-link active" href="{{ url('/') }}">Home</a>
                @else
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                @endif
            </li>
            <li class="nav-item">
                @if(Request::segment(1) == 'series')
                    <a class="nav-link active" href="{{ url('/series') }}">Series</a>
                @else
                    <a class="nav-link" href="{{ url('/series') }}">Series</a>
                @endif
            </li>
        </ul>
    </div>
</nav>
