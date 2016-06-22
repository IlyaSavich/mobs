@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="login-box">
            <div class="login-logo">
                <a href="{{ route('index') }}">
                    <img src="{{ asset('images/logo_new.png') }}"
                         class="center-img img-responsive">
                </a>
            </div>
            <div class="login-box-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form role="form" method="POST" action="{{ url('/login') }}">
                    {!! csrf_field() !!}
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" name="email"
                               value="{{ old('email') }}" placeholder="Email">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Password"
                               name="password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox" name="remember"
                                           id="remember-me"> Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <button type="submit"
                                    class="btn btn-primary btn-block btn-flat">Sign in
                            </button>
                        </div>
                    </div>
                </form>

                <div class="social-auth-links text-center">
                    <p>- OR -</p>

                    <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i
                                class="fa fa-facebook"></i> Sign in using Facebook</a>

                    <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i
                                class="fa fa-google-plus"></i> Sign in using Google+</a>
                </div>

                <a class="forgot" href="{{ url('/password/reset') }}">Забыли пароль?</a><br>
                <a href="{{ url('/register') }}">Регистрация</a>
            </div>
        </div>
    </div>
@endsection
