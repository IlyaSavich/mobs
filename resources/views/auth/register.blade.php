@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="register-box">
            <div class="register-logo">
                <a href="{{ route('index') }}">
                    <span class="logo-mini">
                        <img src="{{ asset('images/mobs.png') }}" class="img-responsive">
                    </span>
                </a>
            </div>

            <div class="register-box-body">
                <p class="login-box-msg">Register a new membership</p>
                <form role="form" method="POST" action="{{ url('register') }}">
                    {!! csrf_field() !!}

                    <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" id="name" placeholder="Full name" name="name"
                               value="{{ old('name') }}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input type="email" class="form-control" name="email"
                               placeholder="Email" value="{{ old('email') }}">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group has-feedback{{ $errors->has('password_confirmation')
                     ? ' has-error' : '' }}">

                        <input type="password" class="form-control" name="password_confirmation"
                               placeholder="Retype password">
                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>

                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox"> I agree to the <a href="#">terms</a>
                                </label>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-xs-4">
                            <input type="submit" value="Register" class="btn btn-primary btn-block btn-flat">
                        </div><!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center">
                    <p>- OR -</p>

                    <a href="#" class="btn btn-block btn-social btn-facebook btn-flat">
                        <i class="fa fa-facebook"></i>Sign up using Facebook</a>

                    <a href="#" class="btn btn-block btn-social btn-google btn-flat">
                        <i class="fa fa-google-plus"></i>Sign up using Google+</a>
                </div>

                <a href="{{ url('login') }}" class="text-center">I already have a membership</a>
            </div>

            @include('errors.list')

        </div>
    </div>
@endsection
