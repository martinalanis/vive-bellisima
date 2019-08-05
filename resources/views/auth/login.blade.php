@extends('layouts.login')

@section('content')
<div class="row" style="margin-top: 5%;">
    <div class="col-sm-4 offset-sm-4">
        <div class="card card-chart">
            <div class="card-header card-header-info">
                <h3 style="text-align: center">INICIAR SESIÓN</h3>
            </div>
            <div class="loginform">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Usuario">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">

                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-info btnlogin">Entrar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row" style="margin-top: 5%;">
    <div class="col-sm-4 offset-sm-4">
        <img src="{{ asset('img/logo.png') }}" alt="" class="logoside"/>
    </div>
</div>
@endsection
