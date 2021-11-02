@extends('layouts.main')

@section('linkcssmain')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/series.css') }}">
@endsection

@section('conteudomain')
    @include('navbar')
    <div class="conteudoapp">
        <nav aria-label="breadcrumb" class="m-2">
            <ol class="breadcrumb bg-light bg-gradient text-dark">
                <li class="breadcrumb-item" aria-current="page">
                    <i class="bi bi-house-door-fill"></i>
                </li>
                @yield('breadcrumb')
            </ol>
        </nav>
        <div class="conteudomain bg-azure">
            @yield('conteudo')
        </div>
    </div>
@endsection
