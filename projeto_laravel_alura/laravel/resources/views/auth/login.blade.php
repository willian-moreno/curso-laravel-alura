@extends('layouts.main')

@section('conteudomain')
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="col-lg-4">
            <div class="card text-left text-white">
                <div class="card-body rounded shadow" style="background-color: #246B85">
                    <h4 class="card-title text-center my-2 font-weight-bold">Curso Laravel Alura</h4>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email" class="h5 font-weight-bold">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror my-1 w-100"
                                name="email" id="email" placeholder="Informe o seu email" required>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> {{-- input email --}}

                        <div class="form-group">
                            <label for="password" class="h5 font-weight-bold">Senha</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror my-1 w-100"
                                name="password" id="password" placeholder="Informe a sua senha" required>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> {{-- input senha --}}

                        <div class="form-group">
                            @if (Route::has('password.request'))
                                <a class="btn my-1 w-100 text-white font-weight-bold"
                                    href="{{ route('password.request') }}">
                                    {{ __('Esqueceu sua senha?') }}
                                </a>
                            @endif

                            <button type="submit" class="btn btn-darkslateblue font-weight-bold my-1 w-100">
                                {{ __('Login') }}
                            </button>
                        </div> {{-- botão enviar --}}

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
