<!doctype html>
<html lang="en">

<head>
    <title>Séries</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/global.css')}}">

    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/series.css')}}">
</head>

<body class="bg-light">

    @yield('navbar')

    <nav aria-label="breadcrumb" class="m-2">
        <ol class="breadcrumb bg-light bg-gradient text-dark">
            <li class="breadcrumb-item" aria-current="page">
                <i class="bi bi-house-door-fill"></i>
            </li>
            @yield('breadcrumb')
        </ol>
    </nav>

    <div class="contentall">
        @yield('conteudo')
    </div>

    <script src="{{URL::asset('js/jquery.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap.bundle.js')}}"></script>
</body>

</html>
