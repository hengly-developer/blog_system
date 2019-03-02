@extends('Layout.front')
@section('title', 'Sign-up')

@section('content')
    <div class="container">
        <div class="col-sm-12 col-sm-offset-0 col-md-5 col-md-offset-3 login-form" style="padding: 20px;">
            {{--<p class="text-center text-info">Sign in to schedule your awesome posts for Facebook and Telegram</p>--}}
            <h2 class="text-center">Logo</h2>
            <form action="{{ action('Front\User\UserController@register') }}" method="POST" autocomplete="off">
                {{ csrf_field() }}
                <p>
                    <small class="text-danger">{{ $errors->first('oop') }}</small>
                </p>
                <label for="name">Name <span class="text-danger">*</span></label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-envelope"></i>
                    </span>
                    <input type="text" id="name" name="name" value="{{ old('name') }}">
                </div>
                <p>
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                </p>
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

                <label for="password-confirm">Retype password <span class="text-danger">*</span></label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-lock"></i>
                    </span>
                    <input type="password" id="password-confirm" name="password_confirmation">
                </div>
                <p>
                    <small class="text-danger">{{ $errors->first('password') }}</small>
                </p>
                <p class="text-right" style="margin-top: 5px;">
                    <input type="submit" value="Sign up" class="btn btn-primary btn-sm">
                </p>
            </form>
            <a href="{{ action('Front\HomeController@signin') }}">Sign in</a>
        </div>
    </div>
@endsection