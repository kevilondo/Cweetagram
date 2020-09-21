@extends('layouts.auth')

@section('title')
{{ config('app.name', 'Laravel') }} | Reset Password
@endsection

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <img src="/dist/img/AdminLTELogo.png" alt="{{config('app.name')}} Logo" class="img-circle elevation-3" width="100px" height="100px">
        <a href="../../index2.html"><b>{{config('app.name')}}</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
            
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('password.email') }}" method="post">
                @csrf
            <div class="input-group mb-3">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                
                <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">Request new password</button>
                </div>
                <!-- /.col -->
            </div>
            </form>
    
            <p class="mt-3 mb-1">
            <a href="{{ route('login') }}">Log In</a>
            </p>
            
        </div>
        <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
@endsection