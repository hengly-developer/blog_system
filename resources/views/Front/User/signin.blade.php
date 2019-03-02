@extends('Layout.front')
@section('title', 'Sign-in')

@section('content')
    <div class="container">
        <div class="col-sm-5 col-sm-offset-3 login-form" style="padding: 20px;">
            {{--<p class="text-center text-info">Sign in to schedule your awesome posts for Facebook and Telegram</p>--}}
            <h2 class="text-center">Logo</h2>
            <form action="{{ action('Front\User\UserController@login') }}" method="POST" autocomplete="off">
                <p>
                    <small class="text-danger">{{ $errors->first('oop') }}</small>
                </p>
                {{ csrf_field()  }}
                <label for="user">Email <span class="text-danger">*</span></label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-user"></i>
                    </span>
                    <input type="email" id="user" name="email" value="{{ old('email') }}">
                </div>
                <p>
                    <small class="text-danger">{{ $errors->first('email') }}</small>
                </p>
                <label for="password">Password <span class="text-danger">*</span></label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-lock"></i>
                    </span>

                    <input type="password" id="password" name="password">
                </div>
                <p>
                    <small class="text-danger">{{ $errors->first('password') }}</small>
                </p>
                <p class="text-right" style="margin-top: 5px;">
                    <input type="submit" value="Sign in" class="btn btn-primary btn-sm">
                </p>
            </form>
            <a href="">Forget your password?</a> or <a href="{{ action('Front\HomeController@signup') }}">Sign up</a>
            <div class="hr-or"></div>
            <div class="text-center">
                <a href="" class="btn btn-primary btn-sm">Facebook</a>
                <a href="" class="btn btn-danger btn-sm">Google</a>
            </div>
        </div>
    </div>
@endsection